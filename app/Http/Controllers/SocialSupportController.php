<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\SocialSupport;
use App\Models\SocialSupportContribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SocialSupportController extends Controller
{
    /**
     * Show social supports for a group
     */
    public function index(Group $group)
    {
        $this->authorizeGroupAdmin($group);

        $query = $group->socialSupports()->with(['member.user', 'approvedBy']);

        // Search functionality
        if (request('search')) {
            $search = request('search');
            $query->whereHas('member.user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if (request('status')) {
            $query->where('status', request('status'));
        }

        // Filter by type
        if (request('type')) {
            $query->where('type', request('type'));
        }

        $supports = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get statistics
        $stats = [
            'pending' => $group->socialSupports()->where('status', 'pending')->count(),
            'approved' => $group->socialSupports()->where('status', 'approved')->count(),
            'disbursed' => $group->socialSupports()->where('status', 'disbursed')->count(),
            'total_disbursed' => $group->socialSupports()->where('status', 'disbursed')->sum('amount'),
            'fund_balance' => $group->social_support_fund ?? 0,
            'total_contributions' => $group->socialSupportContributions()->sum('amount'),
            'contributions_this_month' => $group->socialSupportContributions()->thisMonth()->sum('amount'),
        ];

        // Get recent contributions for display
        $recentContributions = $group->socialSupportContributions()
            ->with(['member.user', 'recordedBy'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('dashboards.group-social-supports', compact('group', 'supports', 'stats', 'recentContributions'));
    }

    /**
     * Store new social support request
     */
    public function store(Request $request, Group $group)
    {
        $this->authorizeGroupAdmin($group);

        $validated = $request->validate([
            'member_id' => 'required|exists:group_members,id',
            'type' => 'required|in:death,marriage,sickness',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:1000',
        ]);

        // Verify member belongs to group
        $member = GroupMember::findOrFail($validated['member_id']);
        if ($member->group_id !== $group->id) {
            return back()->with('error', 'Member does not belong to this group.');
        }

        $support = $group->socialSupports()->create([
            'member_id' => $validated['member_id'],
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Social support request created successfully.');
    }

    /**
     * Approve social support
     */
    public function approve(Request $request, Group $group, SocialSupport $support)
    {
        $this->authorizeGroupAdmin($group);

        if ($support->group_id !== $group->id) {
            return back()->with('error', 'Support not found.');
        }

        if (!$support->isPending()) {
            return back()->with('error', 'Only pending requests can be approved.');
        }

        $validated = $request->validate([
            'approval_notes' => 'nullable|string|max:500',
        ]);

        $support->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'approval_notes' => $validated['approval_notes'] ?? null,
        ]);

        return back()->with('success', 'Support request approved successfully.');
    }

    /**
     * Reject social support
     */
    public function reject(Request $request, Group $group, SocialSupport $support)
    {
        $this->authorizeGroupAdmin($group);

        if ($support->group_id !== $group->id) {
            return back()->with('error', 'Support not found.');
        }

        if (!$support->isPending()) {
            return back()->with('error', 'Only pending requests can be rejected.');
        }

        $validated = $request->validate([
            'approval_notes' => 'required|string|max:500',
        ]);

        $support->update([
            'status' => 'rejected',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'approval_notes' => $validated['approval_notes'],
        ]);

        return back()->with('success', 'Support request rejected.');
    }

    /**
     * Disburse social support
     */
    public function disburse(Request $request, Group $group, SocialSupport $support)
    {
        $this->authorizeGroupAdmin($group);

        if ($support->group_id !== $group->id) {
            return back()->with('error', 'Support not found.');
        }

        if (!$support->isApproved()) {
            return back()->with('error', 'Only approved requests can be disbursed.');
        }

        $fundBalance = (float) ($group->social_support_fund ?? 0);
        $requestAmount = (float) $support->amount;

        // Check if there's enough fund balance
        if ($fundBalance < $requestAmount) {
            return back()->with('error', 'Insufficient social support fund. Available: ' . number_format($fundBalance, 2) . ', Required: ' . number_format($requestAmount, 2));
        }

        DB::transaction(function () use ($group, $requestAmount, $support) {
            // Deduct from the fund
            $group->decrement('social_support_fund', $requestAmount);

            // Mark as disbursed
            $support->update([
                'status' => 'disbursed',
                'disbursed_at' => now(),
            ]);
        });

        return back()->with('success', 'Support disbursed successfully. Fund balance updated.');
    }

    /**
     * Store a new contribution to the social support fund
     */
    public function storeContribution(Request $request, Group $group)
    {
        $this->authorizeGroupAdmin($group);

        $validated = $request->validate([
            'member_id' => 'required|exists:group_members,id',
            'amount' => 'required|numeric|min:0.01',
            'notes' => 'nullable|string|max:500',
        ]);

        // Verify member belongs to group
        $member = GroupMember::findOrFail($validated['member_id']);
        if ($member->group_id !== $group->id) {
            return back()->with('error', 'Member does not belong to this group.');
        }

        DB::transaction(function () use ($group, $validated) {
            // Create contribution record
            $group->socialSupportContributions()->create([
                'member_id' => $validated['member_id'],
                'amount' => $validated['amount'],
                'notes' => $validated['notes'] ?? null,
                'recorded_by' => Auth::id(),
            ]);

            // Update fund balance
            $group->increment('social_support_fund', $validated['amount']);
        });

        return back()->with('success', 'Contribution recorded successfully. Fund balance updated.');
    }

    /**
     * Show contribution history
     */
    public function contributions(Group $group)
    {
        $this->authorizeGroupAdmin($group);

        $contributions = $group->socialSupportContributions()
            ->with(['member.user', 'recordedBy'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'fund_balance' => $group->social_support_fund ?? 0,
            'total_contributions' => $group->socialSupportContributions()->sum('amount'),
            'contributions_this_month' => $group->socialSupportContributions()->thisMonth()->sum('amount'),
            'contributors_count' => $group->socialSupportContributions()->distinct('member_id')->count('member_id'),
        ];

        return view('dashboards.group-social-support-contributions', compact('group', 'contributions', 'stats'));
    }

    /**
     * Delete social support (only pending)
     */
    public function destroy(Group $group, SocialSupport $support)
    {
        $this->authorizeGroupAdmin($group);

        if ($support->group_id !== $group->id) {
            return back()->with('error', 'Support not found.');
        }

        if (!$support->isPending()) {
            return back()->with('error', 'Only pending requests can be deleted.');
        }

        $support->delete();

        return back()->with('success', 'Support request deleted.');
    }

    /**
     * Authorize that user is admin of the group
     */
    private function authorizeGroupAdmin(Group $group)
    {
        $user = Auth::user();

        $isAdmin = GroupMember::where('user_id', $user->id)
            ->where('group_id', $group->id)
            ->where('role', 'admin')
            ->where('status', 'active')
            ->exists();

        if (!$isAdmin) {
            abort(403, 'You are not authorized to manage this group.');
        }
    }
}
