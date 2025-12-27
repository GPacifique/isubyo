@extends('layouts.app')

@section('title', 'Social Support - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white shadow">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold">Manage Social Support</h1>
            <p class="text-purple-100 mt-2">{{ $group->name }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12 px-4">
        <!-- Back Link & Create Button -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('group-admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Dashboard
            </a>
            <button
                onclick="showCreateModal()"
                class="px-6 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition flex items-center"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Support Request
            </button>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Pending</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Approved</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $stats['approved'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Disbursed</h3>
                <p class="text-3xl font-bold text-green-600">{{ $stats['disbursed'] }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Total Disbursed</h3>
                <p class="text-3xl font-bold text-purple-600">{{ number_format($stats['total_disbursed'], 2) }}</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-6 bg-white rounded-lg shadow-sm p-4">
            <form method="GET" class="flex gap-2 flex-wrap">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by member name or email..."
                    class="flex-1 min-w-48 px-4 py-2 text-sm text-gray-900 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none"
                />
                <select
                    name="status"
                    class="px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none"
                >
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="disbursed" {{ request('status') === 'disbursed' ? 'selected' : '' }}>Disbursed</option>
                </select>
                <select
                    name="type"
                    class="px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none"
                >
                    <option value="">All Types</option>
                    <option value="death" {{ request('type') === 'death' ? 'selected' : '' }}>Death</option>
                    <option value="marriage" {{ request('type') === 'marriage' ? 'selected' : '' }}>Marriage</option>
                    <option value="sickness" {{ request('type') === 'sickness' ? 'selected' : '' }}>Sickness</option>
                </select>
                <button
                    type="submit"
                    class="px-6 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition"
                >
                    Filter
                </button>
                @if(request('search') || request('status') || request('type'))
                    <a href="{{ route('group-admin.social-supports', $group) }}" class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg hover:bg-gray-500 transition">
                        Clear All
                    </a>
                @endif
            </form>
        </div>

        <!-- Social Supports Table -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900">Social Support Requests</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Member</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Reason</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($supports as $support)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                    {{ $support->member->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800">
                                        {{ \App\Models\SocialSupport::getTypeLabel($support->type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{ number_format($support->amount, 2) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ Str::limit($support->description, 40) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $support->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        @if($support->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($support->status === 'approved') bg-blue-100 text-blue-800
                                        @elseif($support->status === 'rejected') bg-red-100 text-red-800
                                        @elseif($support->status === 'disbursed') bg-green-100 text-green-800
                                        @endif
                                    ">
                                        {{ \App\Models\SocialSupport::getStatusLabel($support->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex gap-2">
                                        @if($support->status === 'pending')
                                            <button
                                                onclick="showApproveModal({{ $support->id }}, '{{ $support->member->user->name }}', '{{ number_format($support->amount, 2) }}')"
                                                class="px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold rounded text-xs transition"
                                            >
                                                Approve
                                            </button>
                                            <button
                                                onclick="showRejectModal({{ $support->id }}, '{{ $support->member->user->name }}')"
                                                class="px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 font-semibold rounded text-xs transition"
                                            >
                                                Reject
                                            </button>
                                        @elseif($support->status === 'approved')
                                            <form
                                                method="POST"
                                                action="{{ route('group-admin.social-supports.disburse', [$group, $support]) }}"
                                                style="display:inline"
                                            >
                                                @csrf
                                                <button
                                                    type="submit"
                                                    class="px-3 py-1 bg-green-100 hover:bg-green-200 text-green-700 font-semibold rounded text-xs transition"
                                                >
                                                    Disburse
                                                </button>
                                            </form>
                                        @endif
                                        @if($support->status === 'pending')
                                            <button
                                                onclick="showDeleteModal({{ $support->id }}, '{{ $support->member->user->name }}')"
                                                class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded text-xs transition"
                                            >
                                                Delete
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    No support requests found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($supports->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $supports->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 max-h-screen overflow-y-auto">
        <div class="bg-purple-600 text-white p-6">
            <h2 class="text-xl font-bold">New Support Request</h2>
        </div>
        <form method="POST" action="{{ route('group-admin.social-supports.store', $group) }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Member *</label>
                <select name="member_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="">Select a member</option>
                    @foreach($group->members()->where('status', 'active')->with('user')->get() as $member)
                        <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Support Type *</label>
                <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="">Select type</option>
                    <option value="death">☠️ Death of Loved One</option>
                    <option value="marriage">💍 Marriage</option>
                    <option value="sickness">🏥 Sickness/Medical</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Amount *</label>
                <input
                    type="number"
                    name="amount"
                    step="0.01"
                    min="0"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                    placeholder="0.00"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Reason/Description *</label>
                <textarea
                    name="description"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                    rows="3"
                    placeholder="Provide details about the support request..."
                ></textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('createModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition"
                >
                    Create Request
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Approve Modal -->
<div id="approveModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="bg-blue-600 text-white p-6">
            <h2 class="text-xl font-bold">Approve Request</h2>
        </div>
        <form id="approveForm" method="POST" class="p-6 space-y-4">
            @csrf
            <p class="text-gray-600">
                <strong>Member:</strong> <span id="approveMemberName"></span><br>
                <strong>Amount:</strong> <span id="approveAmount"></span>
            </p>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Approval Notes</label>
                <textarea
                    name="approval_notes"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    rows="3"
                    placeholder="Optional notes about approval..."
                ></textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('approveModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition"
                >
                    Approve
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="bg-red-600 text-white p-6">
            <h2 class="text-xl font-bold">Reject Request</h2>
        </div>
        <form id="rejectForm" method="POST" class="p-6 space-y-4">
            @csrf
            <p class="text-gray-600 mb-4">
                <strong>Member:</strong> <span id="rejectMemberName"></span><br>
                You are about to reject this request.
            </p>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Rejection Reason *</label>
                <textarea
                    name="approval_notes"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    rows="3"
                    placeholder="Why is this request being rejected?"
                ></textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('rejectModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition"
                >
                    Reject
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="bg-red-600 text-white p-6">
            <h2 class="text-xl font-bold">Delete Request</h2>
        </div>
        <form id="deleteForm" method="POST" class="p-6 space-y-4">
            @csrf
            @method('DELETE')

            <p class="text-gray-600">
                Are you sure you want to delete the support request for <strong id="deleteMemberName"></strong>?<br>
                This action cannot be undone.
            </p>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('deleteModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition"
                >
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }

    function showApproveModal(supportId, memberName, amount) {
        document.getElementById('approveMemberName').textContent = memberName;
        document.getElementById('approveAmount').textContent = amount;
        document.getElementById('approveForm').action = `{{ route('group-admin.social-supports.approve', [$group, 'SUPPORT_ID']) }}`.replace('SUPPORT_ID', supportId);
        document.getElementById('approveModal').classList.remove('hidden');
    }

    function showRejectModal(supportId, memberName) {
        document.getElementById('rejectMemberName').textContent = memberName;
        document.getElementById('rejectForm').action = `{{ route('group-admin.social-supports.reject', [$group, 'SUPPORT_ID']) }}`.replace('SUPPORT_ID', supportId);
        document.getElementById('rejectModal').classList.remove('hidden');
    }

    function showDeleteModal(supportId, memberName) {
        document.getElementById('deleteMemberName').textContent = memberName;
        document.getElementById('deleteForm').action = `{{ route('group-admin.social-supports.destroy', [$group, 'SUPPORT_ID']) }}`.replace('SUPPORT_ID', supportId);
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function hideModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Close modal when clicking outside
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    });
</script>
@endsection
