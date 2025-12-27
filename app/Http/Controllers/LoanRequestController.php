<?php

namespace App\Http\Controllers;

use App\Models\LoanRequest;
use App\Models\Loan;
use App\Models\GroupMember;
use App\Services\ActivityLoggerService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoanRequestController extends Controller
{
    /**
     * Show pending loan requests for a group admin
     */
    public function index(Request $request): View
    {
        // Get the group from query parameter or route
        $groupId = $request->query('group_id');

        if (!$groupId) {
            abort(400, 'Group ID is required');
        }

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

        return view('loan-requests.index', compact('pendingRequests', 'approvedRequests', 'rejectedRequests', 'groupId'));
    }

    /**
     * Store a new loan request from member
     */
    public function store(Request $request): RedirectResponse
    {
        // Get current member record
        $member = GroupMember::where('user_id', auth()->id())
            ->where('status', 'active')
            ->firstOrFail();

        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'requested_amount' => 'required|numeric|min:100|max:999999.99',
            'requested_duration_months' => 'required|integer|min:1|max:60',
            'reason' => 'nullable|string|max:500',
        ]);

        // Verify member belongs to this group
        if ($member->group_id != $validated['group_id']) {
            abort(403, 'Unauthorized');
        }

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
            model_type: 'LoanRequest',
            model_id: $loanRequest->id,
            description: "Member requested loan of " . number_format($validated['requested_amount'], 2) . " for " . $validated['requested_duration_months'] . " months",
            data: [
                'member_name' => $member->user->name,
                'group_name' => $loanRequest->group->name,
                'requested_amount' => $validated['requested_amount'],
                'requested_duration_months' => $validated['requested_duration_months'],
                'reason' => $validated['reason'] ?? '',
            ]
        );

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
            'issued_at' => now()->date(),
            'maturity_date' => now()->addMonths($loanRequest->requested_duration_months)->date(),
            'status' => 'active',
            'notes' => 'Created from approved loan request #' . $loanRequest->id,
        ]);

        // Log activity
        ActivityLoggerService::log(
            action: 'loan_request_approved',
            model_type: 'LoanRequest',
            model_id: $loanRequest->id,
            description: "Loan request of " . number_format($loanRequest->requested_amount, 2) . " approved and loan created",
            data: [
                'reviewer' => auth()->user()->name,
                'member_name' => $loanRequest->member->user->name,
                'group_name' => $loanRequest->group->name,
                'loan_id' => $loan->id,
                'review_notes' => $validated['review_notes'] ?? '',
            ]
        );

        return back()->with('success', 'Loan request approved and loan has been created.');
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
            model_type: 'LoanRequest',
            model_id: $loanRequest->id,
            description: "Loan request of " . number_format($loanRequest->requested_amount, 2) . " rejected",
            data: [
                'reviewer' => auth()->user()->name,
                'member_name' => $loanRequest->member->user->name,
                'group_name' => $loanRequest->group->name,
                'reason' => $validated['review_notes'],
            ]
        );

        return back()->with('success', 'Loan request rejected.');
    }

    /**
     * Show member loan requests
     */
    public function myRequests(): View
    {
        $member = GroupMember::where('user_id', auth()->id())
            ->where('status', 'active')
            ->first();

        $requests = [];
        if ($member) {
            $requests = LoanRequest::where('member_id', $member->id)
                ->with(['group', 'reviewer'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('loan-requests.my-requests', compact('requests'));
    }
}
