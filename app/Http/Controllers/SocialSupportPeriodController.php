<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\SocialSupport;
use App\Models\SocialSupportContribution;
use App\Models\SocialSupportDistribution;
use App\Models\SocialSupportPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SocialSupportPeriodController extends Controller
{
    /**
     * Show periods list with current period details
     */
    public function index(Group $group)
    {
        $this->authorizeGroupAdmin($group);

        $periods = $group->socialSupportPeriods()
            ->with(['createdBy', 'closedBy'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $activePeriod = $group->activeSocialSupportPeriod();
        $activeMembers = $group->members()->where('status', 'active')->count();

        $stats = [
            'total_periods' => $group->socialSupportPeriods()->count(),
            'closed_periods' => $group->socialSupportPeriods()->where('status', 'closed')->count(),
            'total_collected_all_time' => $group->socialSupportContributions()->sum('amount'),
            'total_disbursed_all_time' => $group->socialSupports()->where('status', 'disbursed')->sum('amount'),
            'total_distributed_all_time' => $group->socialSupportDistributions()->sum('amount'),
            'fund_balance' => $group->social_support_fund ?? 0,
        ];

        return view('dashboards.group-social-support-periods', compact(
            'group', 'periods', 'activePeriod', 'activeMembers', 'stats'
        ));
    }

    /**
     * Show form to create new period
     */
    public function create(Group $group)
    {
        $this->authorizeGroupAdmin($group);

        // Check if there's already an active period
        $activePeriod = $group->activeSocialSupportPeriod();
        if ($activePeriod) {
            return back()->with('error', 'There is already an active period. Please close it before creating a new one.');
        }

        $activeMembers = $group->members()->where('status', 'active')->count();

        return view('dashboards.group-social-support-period-create', compact('group', 'activeMembers'));
    }

    /**
     * Store a new period
     */
    public function store(Request $request, Group $group)
    {
        $this->authorizeGroupAdmin($group);

        // Check if there's already an active period
        $activePeriod = $group->activeSocialSupportPeriod();
        if ($activePeriod) {
            return back()->with('error', 'There is already an active period. Please close it before creating a new one.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'contribution_amount' => 'required|numeric|min:0.01',
            'notes' => 'nullable|string|max:500',
        ]);

        $activeMembers = $group->members()->where('status', 'active')->count();

        $period = $group->socialSupportPeriods()->create([
            'name' => $validated['name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'contribution_amount' => $validated['contribution_amount'],
            'expected_contributors' => $activeMembers,
            'status' => 'active',
            'notes' => $validated['notes'] ?? null,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('group-admin.social-support-periods.show', [$group, $period])
            ->with('success', 'Social support period created successfully. You can now start collecting contributions.');
    }

    /**
     * Show period details with contributions and disbursements
     */
    public function show(Group $group, SocialSupportPeriod $period)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id) {
            abort(404);
        }

        $contributions = $period->contributions()
            ->with(['member.user', 'recordedBy'])
            ->orderBy('created_at', 'desc')
            ->get();

        $supports = $period->supports()
            ->with(['member.user', 'approvedBy'])
            ->orderBy('created_at', 'desc')
            ->get();

        $distributions = $period->distributions()
            ->with(['member.user', 'distributedBy'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Get members who haven't contributed yet
        $contributedMemberIds = $contributions->pluck('member_id')->toArray();
        $nonContributors = $group->members()
            ->where('status', 'active')
            ->whereNotIn('id', $contributedMemberIds)
            ->with('user')
            ->get();

        $activeMembers = $group->members()->where('status', 'active')->get();

        $stats = [
            'total_collected' => $period->total_collected,
            'total_disbursed' => $period->total_disbursed,
            'total_distributed' => $period->total_distributed,
            'remaining_balance' => $period->getRemainingBalance(),
            'contribution_progress' => $period->getContributionProgress(),
            'contributors' => $period->actual_contributors,
            'expected' => $period->expected_contributors,
            'pending_supports' => $supports->where('status', 'pending')->count(),
            'approved_supports' => $supports->where('status', 'approved')->count(),
        ];

        return view('dashboards.group-social-support-period-show', compact(
            'group', 'period', 'contributions', 'supports', 'distributions',
            'nonContributors', 'activeMembers', 'stats'
        ));
    }

    /**
     * Record bulk contributions for all members
     */
    public function bulkContribute(Request $request, Group $group, SocialSupportPeriod $period)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id) {
            abort(404);
        }

        if ($period->isClosed()) {
            return back()->with('error', 'This period is closed. No more contributions can be recorded.');
        }

        $validated = $request->validate([
            'member_ids' => 'required|array|min:1',
            'member_ids.*' => 'exists:group_members,id',
            'amount' => 'nullable|numeric|min:0.01', // If null, use period's contribution_amount
            'notes' => 'nullable|string|max:500',
        ]);

        $amount = $validated['amount'] ?? $period->contribution_amount;
        $memberIds = $validated['member_ids'];

        // Verify all members belong to this group
        $validMembers = $group->members()->whereIn('id', $memberIds)->count();
        if ($validMembers !== count($memberIds)) {
            return back()->with('error', 'Some members do not belong to this group.');
        }

        // Check for duplicates (members who already contributed in this period)
        $alreadyContributed = $period->contributions()
            ->whereIn('member_id', $memberIds)
            ->pluck('member_id')
            ->toArray();

        $newContributorIds = array_diff($memberIds, $alreadyContributed);

        if (empty($newContributorIds)) {
            return back()->with('error', 'All selected members have already contributed to this period.');
        }

        $totalAmount = $amount * count($newContributorIds);

        DB::transaction(function () use ($group, $period, $newContributorIds, $amount, $validated, $totalAmount) {
            foreach ($newContributorIds as $memberId) {
                $period->contributions()->create([
                    'group_id' => $group->id,
                    'member_id' => $memberId,
                    'amount' => $amount,
                    'notes' => $validated['notes'] ?? null,
                    'recorded_by' => Auth::id(),
                ]);
            }

            // Update period stats
            $period->increment('total_collected', $totalAmount);
            $period->increment('actual_contributors', count($newContributorIds));

            // Update group fund balance
            $group->increment('social_support_fund', $totalAmount);
        });

        $skippedCount = count($alreadyContributed);
        $addedCount = count($newContributorIds);
        $message = "Successfully recorded contributions for {$addedCount} members (Total: " . number_format($totalAmount, 2) . ").";

        if ($skippedCount > 0) {
            $message .= " {$skippedCount} members skipped (already contributed).";
        }

        return back()->with('success', $message);
    }

    /**
     * Record individual contribution
     */
    public function singleContribute(Request $request, Group $group, SocialSupportPeriod $period)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id) {
            abort(404);
        }

        if ($period->isClosed()) {
            return back()->with('error', 'This period is closed.');
        }

        $validated = $request->validate([
            'member_id' => 'required|exists:group_members,id',
            'amount' => 'required|numeric|min:0.01',
            'notes' => 'nullable|string|max:500',
        ]);

        // Verify member belongs to group
        $member = $group->members()->find($validated['member_id']);
        if (!$member) {
            return back()->with('error', 'Member does not belong to this group.');
        }

        // Check if already contributed
        $exists = $period->contributions()->where('member_id', $validated['member_id'])->exists();
        if ($exists) {
            return back()->with('error', 'This member has already contributed to this period.');
        }

        DB::transaction(function () use ($group, $period, $validated) {
            $period->contributions()->create([
                'group_id' => $group->id,
                'member_id' => $validated['member_id'],
                'amount' => $validated['amount'],
                'notes' => $validated['notes'] ?? null,
                'recorded_by' => Auth::id(),
            ]);

            // Update period stats
            $period->increment('total_collected', $validated['amount']);
            $period->increment('actual_contributors', 1);

            // Update group fund balance
            $group->increment('social_support_fund', $validated['amount']);
        });

        return back()->with('success', 'Contribution recorded successfully.');
    }

    /**
     * Create support request for a member in need
     */
    public function createSupport(Request $request, Group $group, SocialSupportPeriod $period)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id) {
            abort(404);
        }

        if ($period->isClosed()) {
            return back()->with('error', 'This period is closed.');
        }

        $validated = $request->validate([
            'member_id' => 'required|exists:group_members,id',
            'type' => 'required|in:death,marriage,sickness',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:1000',
        ]);

        // Verify member belongs to group
        $member = $group->members()->find($validated['member_id']);
        if (!$member) {
            return back()->with('error', 'Member does not belong to this group.');
        }

        $period->supports()->create([
            'group_id' => $group->id,
            'member_id' => $validated['member_id'],
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Support request created successfully.');
    }

    /**
     * Approve and disburse support
     */
    public function disburseSupport(Request $request, Group $group, SocialSupportPeriod $period, SocialSupport $support)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id || $support->period_id !== $period->id) {
            abort(404);
        }

        if ($support->status !== 'pending' && $support->status !== 'approved') {
            return back()->with('error', 'This support request cannot be disbursed.');
        }

        $remainingBalance = $period->getRemainingBalance();
        $requestAmount = (float) $support->amount;

        if ($remainingBalance < $requestAmount) {
            return back()->with('error', "Insufficient fund balance. Available: " . number_format($remainingBalance, 2) . ", Required: " . number_format($requestAmount, 2));
        }

        $validated = $request->validate([
            'approval_notes' => 'nullable|string|max:500',
        ]);

        DB::transaction(function () use ($group, $period, $support, $validated, $requestAmount) {
            // Update support record
            $support->update([
                'status' => 'disbursed',
                'approved_by' => Auth::id(),
                'approved_at' => now(),
                'disbursed_at' => now(),
                'approval_notes' => $validated['approval_notes'] ?? null,
            ]);

            // Update period stats
            $period->increment('total_disbursed', $requestAmount);

            // Deduct from group fund
            $group->decrement('social_support_fund', $requestAmount);
        });

        return back()->with('success', 'Support disbursed successfully to ' . ($support->member->user->name ?? 'member') . '.');
    }

    /**
     * Reject support request
     */
    public function rejectSupport(Request $request, Group $group, SocialSupportPeriod $period, SocialSupport $support)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id || $support->period_id !== $period->id) {
            abort(404);
        }

        if ($support->status !== 'pending') {
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
     * Distribute remaining funds to all contributing members
     */
    public function distribute(Request $request, Group $group, SocialSupportPeriod $period)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id) {
            abort(404);
        }

        if ($period->isClosed()) {
            return back()->with('error', 'This period is already closed.');
        }

        // Check for pending support requests
        $pendingSupports = $period->supports()->where('status', 'pending')->count();
        if ($pendingSupports > 0) {
            return back()->with('error', "There are {$pendingSupports} pending support requests. Please process them first.");
        }

        $remainingBalance = $period->getRemainingBalance();
        $contributors = $period->contributions()->distinct('member_id')->count();

        if ($contributors === 0) {
            return back()->with('error', 'No contributors found for this period.');
        }

        if ($remainingBalance <= 0) {
            return back()->with('error', 'No remaining balance to distribute.');
        }

        $amountPerMember = round($remainingBalance / $contributors, 2);
        // Handle rounding remainder by giving it to the last person
        $totalToDistribute = $amountPerMember * $contributors;
        $remainder = $remainingBalance - $totalToDistribute;

        $validated = $request->validate([
            'notes' => 'nullable|string|max:500',
        ]);

        DB::transaction(function () use ($group, $period, $amountPerMember, $remainder, $validated, $remainingBalance) {
            $contributorIds = $period->contributions()
                ->distinct()
                ->pluck('member_id')
                ->toArray();

            $lastMemberId = end($contributorIds);

            foreach ($contributorIds as $memberId) {
                $amount = $amountPerMember;
                // Add remainder to last member
                if ($memberId === $lastMemberId && $remainder > 0) {
                    $amount += $remainder;
                }

                $period->distributions()->create([
                    'group_id' => $group->id,
                    'member_id' => $memberId,
                    'amount' => $amount,
                    'notes' => $validated['notes'] ?? null,
                    'distributed_by' => Auth::id(),
                ]);
            }

            // Update period stats
            $period->update([
                'total_distributed' => $remainingBalance,
                'status' => 'distributing',
            ]);

            // Deduct from group fund
            $group->decrement('social_support_fund', $remainingBalance);
        });

        return back()->with('success', "Successfully distributed " . number_format($remainingBalance, 2) . " to {$contributors} members ({$amountPerMember} each).");
    }

    /**
     * Close the period
     */
    public function close(Request $request, Group $group, SocialSupportPeriod $period)
    {
        $this->authorizeGroupAdmin($group);

        if ($period->group_id !== $group->id) {
            abort(404);
        }

        if ($period->isClosed()) {
            return back()->with('error', 'This period is already closed.');
        }

        // Check for pending supports
        $pendingSupports = $period->supports()->where('status', 'pending')->count();
        if ($pendingSupports > 0) {
            return back()->with('error', "Cannot close period with {$pendingSupports} pending support requests.");
        }

        $validated = $request->validate([
            'notes' => 'nullable|string|max:500',
        ]);

        $period->update([
            'status' => 'closed',
            'closed_by' => Auth::id(),
            'closed_at' => now(),
            'notes' => $validated['notes'] ?? $period->notes,
        ]);

        return redirect()->route('group-admin.social-support-periods.index', $group)
            ->with('success', 'Period closed successfully.');
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
