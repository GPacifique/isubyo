<?php

namespace App\Http\Controllers;

use App\Models\LoanRequest;
use App\Models\Loan;
use App\Models\Group;
use App\Models\GroupMember;
use App\Services\ActivityLoggerService;
use App\Notifications\LoanRequestSubmittedNotification;
use App\Notifications\LoanRequestApprovedNotification;
use App\Notifications\LoanRequestRejectedNotification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoanRequestController extends Controller
{
    /**
     * Show pending loan requests for a group admin
     */
    public function index(Request $request, Group $group): View
    {
        // Get the group from route parameter
        $groupId = $group->id;

        // Check if user is an admin of this group
        $isGroupAdmin = auth()->user()->adminGroups()->where('group_id', $groupId)->exists();
        if (!$isGroupAdmin) {
            abort(403, 'Unauthorized');
        }

        // Get pending requests
        $pendingRequests = LoanRequest::where('group_id', $groupId)
            ->where('status', 'pending')
            ->with(['member.user', 'group'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Get approved requests
        $approvedRequests = LoanRequest::where('group_id', $groupId)
            ->where('status', 'approved')
            ->with(['member.user', 'group', 'reviewer'])
            ->orderBy('reviewed_at', 'desc')
            ->paginate(15);

        // Get rejected requests
        $rejectedRequests = LoanRequest::where('group_id', $groupId)
            ->where('status', 'rejected')
            ->with(['member.user', 'group', 'reviewer'])
            ->orderBy('reviewed_at', 'desc')
            ->paginate(15);

        return view('loan-requests.index', compact('pendingRequests', 'approvedRequests', 'rejectedRequests', 'group', 'groupId'));
    }

    /**
     * Store a new loan request from member
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'requested_amount' => 'required|numeric|min:100|max:999999.99',
            'requested_duration_months' => 'required|integer|min:1|max:60',
            'reason' => 'nullable|string|max:500',
        ]);

        // Verify user is a member of this group
        $member = GroupMember::where('user_id', auth()->id())
            ->where('group_id', $validated['group_id'])
            ->where('status', 'active')
            ->firstOrFail();

        // Check if member already has pending request for this group
        $existingRequest = LoanRequest::where('group_id', $validated['group_id'])
            ->where('member_id', $member->id)
            ->where('status', 'pending')
            ->first();

        if ($existingRequest) {
            return back()->withErrors(['error' => 'You already have a pending loan request for this group.']);
        }

        // Create loan request
        $loanRequest = LoanRequest::create([
            'group_id' => $validated['group_id'],
            'member_id' => $member->id,
            'requested_amount' => $validated['requested_amount'],
            'requested_duration_months' => $validated['requested_duration_months'],
            'reason' => $validated['reason'] ?? '',
            'status' => 'pending',
        ]);

        // Log activity
        ActivityLoggerService::log(
            action: 'loan_request_created',
            description: "Member requested loan of " . number_format($validated['requested_amount'], 2) . " for " . $validated['requested_duration_months'] . " months",
            modelType: 'LoanRequest',
            modelId: $loanRequest->id,
            data: [
                'member_name' => $member->user->name,
                'group_name' => $loanRequest->group->name,
                'requested_amount' => $validated['requested_amount'],
                'requested_duration_months' => $validated['requested_duration_months'],
                'reason' => $validated['reason'] ?? '',
            ]
        );

        // Send notification to member
        $member->user->notify(new LoanRequestSubmittedNotification($loanRequest));

        return back()->with('success', 'Loan request submitted successfully. Wait for group admin approval.');
    }

    /**
     * Approve a loan request
     */
    public function approve(Request $request, LoanRequest $loanRequest): RedirectResponse
    {
        // Check if user is admin of the group
        $isGroupAdmin = auth()->user()->adminGroups()->where('group_id', $loanRequest->group_id)->exists();
        if (!$isGroupAdmin) {
            abort(403, 'Unauthorized');
        }

        if (!$loanRequest->isPending()) {
            return back()->withErrors(['error' => 'This request has already been reviewed.']);
        }

        $validated = $request->validate([
            'review_notes' => 'nullable|string|max:500',
        ]);

        // Approve the request
        $loanRequest->approve(auth()->id(), $validated['review_notes'] ?? '');

        // Create the loan from approved request
        $monthlyCharge = ($loanRequest->requested_amount * 0.05) / $loanRequest->requested_duration_months;

        try {
            $loan = Loan::create([
                'group_id' => $loanRequest->group_id,
                'member_id' => $loanRequest->member_id,
                'principal_amount' => $loanRequest->requested_amount,
                'monthly_charge' => $monthlyCharge,
                'remaining_balance' => $loanRequest->requested_amount,
                'duration_months' => $loanRequest->requested_duration_months,
                'months_paid' => 0,
                'total_charged' => 0,
                'total_principal_paid' => 0,
                'issued_at' => now(),
                'maturity_date' => now()->addMonths((int) $loanRequest->requested_duration_months),
                'status' => 'active',
                'notes' => 'Created from approved loan request #' . $loanRequest->id,
            ]);

            // Log activity
            ActivityLoggerService::log(
                action: 'loan_request_approved',
                description: "Loan request of " . number_format($loanRequest->requested_amount, 2) . " approved and loan created",
                modelType: 'LoanRequest',
                modelId: $loanRequest->id,
                data: [
                    'reviewer' => auth()->user()->name,
                    'member_name' => $loanRequest->member->user->name,
                    'group_name' => $loanRequest->group->name,
                    'loan_id' => $loan->id,
                    'review_notes' => $validated['review_notes'] ?? '',
                ]
            );

            // Send approval notification to member
            $loanRequest->member->user->notify(new LoanRequestApprovedNotification($loanRequest));

            return back()->with('success', 'Loan request approved and loan has been created.');
        } catch (\Exception $e) {
            \Log::error('Loan creation failed for request #' . $loanRequest->id, [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => [
                    'group_id' => $loanRequest->group_id,
                    'member_id' => $loanRequest->member_id,
                    'requested_amount' => $loanRequest->requested_amount,
                    'duration_months' => $loanRequest->requested_duration_months,
                ]
            ]);
            return back()->withErrors(['error' => 'Failed to create loan: ' . $e->getMessage()]);
        }
    }

    /**
     * Reject a loan request
     */
    public function reject(Request $request, LoanRequest $loanRequest): RedirectResponse
    {
        // Check if user is admin of the group
        $isGroupAdmin = auth()->user()->adminGroups()->where('group_id', $loanRequest->group_id)->exists();
        if (!$isGroupAdmin) {
            abort(403, 'Unauthorized');
        }

        if (!$loanRequest->isPending()) {
            return back()->withErrors(['error' => 'This request has already been reviewed.']);
        }

        $validated = $request->validate([
            'review_notes' => 'required|string|max:500',
        ]);

        // Reject the request
        $loanRequest->reject(auth()->id(), $validated['review_notes']);

        // Log activity
        ActivityLoggerService::log(
            action: 'loan_request_rejected',
            description: "Loan request of " . number_format($loanRequest->requested_amount, 2) . " rejected",
            modelType: 'LoanRequest',
            modelId: $loanRequest->id,
            data: [
                'reviewer' => auth()->user()->name,
                'member_name' => $loanRequest->member->user->name,
                'group_name' => $loanRequest->group->name,
                'reason' => $validated['review_notes'],
            ]
        );

        // Send rejection notification to member
        $loanRequest->member->user->notify(new LoanRequestRejectedNotification($loanRequest));

        return back()->with('success', 'Loan request rejected.');
    }

    /**
     * Show member loan requests
     */
    public function myRequests(): View
    {
        // Get all member records for this user (may belong to multiple groups)
        $memberIds = GroupMember::where('user_id', auth()->id())
            ->where('status', 'active')
            ->pluck('id');

        $requests = LoanRequest::whereIn('member_id', $memberIds)
            ->with(['group', 'reviewer'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('loan-requests.my-requests', compact('requests'));
    }
}
