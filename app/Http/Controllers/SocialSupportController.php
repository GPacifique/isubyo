<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\SocialSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ];

        return view('dashboards.group-social-supports', compact('group', 'supports', 'stats'));
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

        $support->update([
            'status' => 'disbursed',
            'disbursed_at' => now(),
        ]);

        return back()->with('success', 'Support disbursed successfully.');
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
