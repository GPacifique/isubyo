@extends('layouts.app')

@section('title', 'Loan Requests - Group Admin')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <h1 class="text-3xl font-bold text-gray-900">Loan Requests</h1>
            <p class="text-gray-600 mt-2">Manage loan requests for <span class="font-semibold text-blue-600">{{ $group->name ?? 'Group #' . $groupId }}</span></p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                @foreach ($errors->all() as $error)
                    <p class="text-red-700 text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Tabs -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="border-b border-gray-200">
                <div class="flex gap-0">
                    <button onclick="switchTab('pending')" class="flex-1 px-6 py-4 text-center font-medium text-gray-700 border-b-2 border-blue-500 hover:border-blue-600 focus:outline-none tab-btn active" data-tab="pending">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            Pending ({{ $pendingRequests->total() }})
                        </span>
                    </button>
                    <button onclick="switchTab('approved')" class="flex-1 px-6 py-4 text-center font-medium text-gray-700 border-b-2 border-transparent hover:border-green-500 focus:outline-none tab-btn" data-tab="approved">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Approved ({{ $approvedRequests->total() }})
                        </span>
                    </button>
                    <button onclick="switchTab('rejected')" class="flex-1 px-6 py-4 text-center font-medium text-gray-700 border-b-2 border-transparent hover:border-red-500 focus:outline-none tab-btn" data-tab="rejected">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            Rejected ({{ $rejectedRequests->total() }})
                        </span>
                    </button>
                </div>
            </div>

            <!-- Pending Requests Tab -->
            <div id="pending-tab" class="tab-content">
                @if($pendingRequests->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($pendingRequests as $request)
                            <div class="p-6 hover:bg-gray-50 transition">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-900">{{ $request->member->user->name }}</h3>
                                        <p class="text-sm text-gray-600">Requested on {{ $request->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">Pending Review</span>
                                </div>

                                <div class="grid grid-cols-3 gap-4 mb-4">
                                    <div class="bg-blue-50 rounded-lg p-3">
                                        <p class="text-xs font-semibold text-gray-600 uppercase">Requested Amount</p>
                                        <p class="text-2xl font-bold text-blue-600">{{ number_format($request->requested_amount, 2) }}</p>
                                    </div>
                                    <div class="bg-green-50 rounded-lg p-3">
                                        <p class="text-xs font-semibold text-gray-600 uppercase">Duration</p>
                                        <p class="text-2xl font-bold text-green-600">{{ $request->requested_duration_months }} mo</p>
                                    </div>
                                    <div class="bg-purple-50 rounded-lg p-3">
                                        <p class="text-xs font-semibold text-gray-600 uppercase">Est. Monthly Charge</p>
                                        <p class="text-2xl font-bold text-purple-600">{{ number_format(($request->requested_amount * 0.05) / $request->requested_duration_months, 2) }}</p>
                                    </div>
                                </div>

                                @if($request->reason)
                                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                                        <p class="text-sm text-gray-700"><strong>Reason:</strong> {{ $request->reason }}</p>
                                    </div>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex gap-3">
                                    <button type="button" onclick="openApproveModal({{ $request->id }}, '{{ $request->member->user->name }}', {{ $request->requested_amount }})" class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                                        ✓ Approve
                                    </button>
                                    <button type="button" onclick="openRejectModal({{ $request->id }}, '{{ $request->member->user->name }}')" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                                        ✗ Reject
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($pendingRequests->hasPages())
                        <div class="bg-white border-t border-gray-200 px-6 py-4">
                            {{ $pendingRequests->links() }}
                        </div>
                    @endif
                @else
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">All pending requests have been reviewed</p>
                    </div>
                @endif
            </div>

            <!-- Approved Requests Tab -->
            <div id="approved-tab" class="tab-content hidden">
                @if($approvedRequests->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($approvedRequests as $request)
                            <div class="p-6 hover:bg-gray-50 transition border-l-4 border-green-500">
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-900">{{ $request->member->user->name }}</h3>
                                        <p class="text-sm text-gray-600">Approved on {{ $request->reviewed_at->format('M d, Y') }} by {{ $request->reviewer->name ?? 'System' }}</p>
                                    </div>
                                    <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">Approved</span>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Amount</p>
                                        <p class="font-bold text-gray-900">{{ number_format($request->requested_amount, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Duration</p>
                                        <p class="font-bold text-gray-900">{{ $request->requested_duration_months }} months</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Notes</p>
                                        <p class="font-bold text-gray-900">{{ $request->review_notes ?: 'None' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($approvedRequests->hasPages())
                        <div class="bg-white border-t border-gray-200 px-6 py-4">
                            {{ $approvedRequests->links() }}
                        </div>
                    @endif
                @else
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">No approved requests yet</p>
                    </div>
                @endif
            </div>

            <!-- Rejected Requests Tab -->
            <div id="rejected-tab" class="tab-content hidden">
                @if($rejectedRequests->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($rejectedRequests as $request)
                            <div class="p-6 hover:bg-gray-50 transition border-l-4 border-red-500">
                                <div class="flex items-start justify-between mb-3">
                                    <div>
                                        <h3 class="font-bold text-lg text-gray-900">{{ $request->member->user->name }}</h3>
                                        <p class="text-sm text-gray-600">Rejected on {{ $request->reviewed_at->format('M d, Y') }} by {{ $request->reviewer->name ?? 'System' }}</p>
                                    </div>
                                    <span class="inline-block px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-semibold">Rejected</span>
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Amount</p>
                                        <p class="font-bold text-gray-900">{{ number_format($request->requested_amount, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Duration</p>
                                        <p class="font-bold text-gray-900">{{ $request->requested_duration_months }} months</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Reason</p>
                                        <p class="font-bold text-gray-900">{{ $request->review_notes ?: 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($rejectedRequests->hasPages())
                        <div class="bg-white border-t border-gray-200 px-6 py-4">
                            {{ $rejectedRequests->links() }}
                        </div>
                    @endif
                @else
                    <div class="p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">No rejected requests yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div id="approveModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="px-6 py-4 border-b border-gray-200 bg-green-50">
            <h3 class="font-bold text-lg text-gray-900">Approve Loan Request</h3>
        </div>
        <form id="approveForm" method="POST" class="p-6">
            @csrf
            <input type="hidden" id="approveRequestId" name="request_id">
            <div class="mb-4">
                <p class="text-gray-700 mb-2">Approve loan request for <strong id="approveMemberName"></strong>?</p>
                <label for="approveNotes" class="block text-sm font-medium text-gray-700 mb-1">Optional Notes</label>
                <textarea name="review_notes" id="approveNotes" rows="3" placeholder="Add any notes..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="closeApproveModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">Approve Loan</button>
            </div>
        </form>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="px-6 py-4 border-b border-gray-200 bg-red-50">
            <h3 class="font-bold text-lg text-gray-900">Reject Loan Request</h3>
        </div>
        <form id="rejectForm" method="POST" class="p-6">
            @csrf
            <input type="hidden" id="rejectRequestId" name="request_id">
            <div class="mb-4">
                <p class="text-gray-700 mb-2">Reject loan request for <strong id="rejectMemberName"></strong>?</p>
                <label for="rejectNotes" class="block text-sm font-medium text-gray-700 mb-1">Reason for Rejection</label>
                <textarea name="review_notes" id="rejectNotes" rows="3" placeholder="Explain why you're rejecting this request..." required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"></textarea>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="closeRejectModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">Reject Request</button>
            </div>
        </form>
    </div>
</div>

<script>
    function switchTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-b-2');
            btn.classList.add('border-transparent');
        });

        document.getElementById(tabName + '-tab').classList.remove('hidden');
        const btn = document.querySelector(`[data-tab="${tabName}"]`);
        btn.classList.remove('border-transparent');
        btn.classList.add('border-b-2');
        if (tabName === 'pending') btn.classList.add('border-yellow-500');
        else if (tabName === 'approved') btn.classList.add('border-green-500');
        else if (tabName === 'rejected') btn.classList.add('border-red-500');
    }

    function openApproveModal(requestId, memberName, amount) {
        document.getElementById('approveRequestId').value = requestId;
        document.getElementById('approveMemberName').textContent = memberName + ' (' + amount + ')';
        document.getElementById('approveForm').action = '{{ route("group-admin.loan-requests.approve", ":id") }}'.replace(':id', requestId);
        document.getElementById('approveModal').classList.remove('hidden');
    }

    function closeApproveModal() {
        document.getElementById('approveModal').classList.add('hidden');
        document.getElementById('approveNotes').value = '';
    }

    function openRejectModal(requestId, memberName) {
        document.getElementById('rejectRequestId').value = requestId;
        document.getElementById('rejectMemberName').textContent = memberName;
        document.getElementById('rejectForm').action = '{{ route("group-admin.loan-requests.reject", ":id") }}'.replace(':id', requestId);
        document.getElementById('rejectModal').classList.remove('hidden');
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
        document.getElementById('rejectNotes').value = '';
    }

    // Close modals on escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeApproveModal();
            closeRejectModal();
        }
    });
</script>
@endsection
