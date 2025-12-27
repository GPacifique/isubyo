@extends('layouts.app')

@section('title', 'My Loan Requests')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <h1 class="text-3xl font-bold text-gray-900">Loan Requests</h1>
            <p class="text-gray-600 mt-2">View and manage your loan requests</p>
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

        <!-- Request New Loan Button -->
        <div class="mb-8">
            <button type="button" onclick="document.getElementById('requestForm').classList.toggle('hidden')" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Request New Loan
            </button>
        </div>

        <!-- Request Form (Initially Hidden) -->
        <div id="requestForm" class="hidden bg-white rounded-lg shadow-md p-6 mb-8 border-l-4 border-blue-500">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Submit Loan Request</h2>

            <form action="{{ route('member.loan-requests.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Select Group -->
                <div>
                    <label for="group_id" class="block text-sm font-medium text-gray-700 mb-1">Select Group</label>
                    <select name="group_id" id="group_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">-- Choose a group --</option>
                        @foreach(\App\Models\GroupMember::where('user_id', auth()->id())->where('status', 'active')->with('group')->get() as $memberRecord)
                            <option value="{{ $memberRecord->group_id }}">{{ $memberRecord->group->name }}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Requested Amount -->
                <div>
                    <label for="requested_amount" class="block text-sm font-medium text-gray-700 mb-1">Loan Amount</label>
                    <input type="number" name="requested_amount" id="requested_amount" step="0.01" min="100" required placeholder="Enter amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('requested_amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Duration -->
                <div>
                    <label for="requested_duration_months" class="block text-sm font-medium text-gray-700 mb-1">Duration (Months)</label>
                    <input type="number" name="requested_duration_months" id="requested_duration_months" min="1" max="60" required placeholder="Number of months to repay" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('requested_duration_months')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Reason -->
                <div>
                    <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">Reason for Loan (Optional)</label>
                    <textarea name="reason" id="reason" rows="3" placeholder="Tell the group admin why you need this loan..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    @error('reason')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="flex gap-2">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">Submit Request</button>
                    <button type="button" onclick="document.getElementById('requestForm').classList.toggle('hidden')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">Cancel</button>
                </div>
            </form>
        </div>

        <!-- Requests Tabs -->
        <div class="bg-white rounded-lg shadow">
            <div class="border-b border-gray-200">
                <div class="flex gap-0">
                    <button onclick="switchTab('pending')" class="flex-1 px-6 py-4 text-center font-medium text-gray-700 border-b-2 border-transparent hover:border-blue-500 focus:outline-none tab-btn active" data-tab="pending">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                            </svg>
                            Pending
                        </span>
                    </button>
                    <button onclick="switchTab('approved')" class="flex-1 px-6 py-4 text-center font-medium text-gray-700 border-b-2 border-transparent hover:border-green-500 focus:outline-none tab-btn" data-tab="approved">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Approved
                        </span>
                    </button>
                    <button onclick="switchTab('rejected')" class="flex-1 px-6 py-4 text-center font-medium text-gray-700 border-b-2 border-transparent hover:border-red-500 focus:outline-none tab-btn" data-tab="rejected">
                        <span class="inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            Rejected
                        </span>
                    </button>
                </div>
            </div>

            <!-- Pending Requests -->
            <div id="pending-tab" class="tab-content p-6">
                @if($requests->where('status', 'pending')->count() > 0)
                    <div class="space-y-4">
                        @foreach($requests->where('status', 'pending') as $request)
                            <div class="border border-yellow-200 bg-yellow-50 rounded-lg p-4">
                                <div class="flex items-start justify-between mb-2">
                                    <div>
                                        <h3 class="font-bold text-gray-900">{{ $request->group->name }}</h3>
                                        <p class="text-sm text-gray-600">Requested {{ $request->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <span class="inline-block px-3 py-1 bg-yellow-200 text-yellow-900 rounded-full text-sm font-semibold">Pending</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-3">
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Amount</p>
                                        <p class="text-lg font-bold text-gray-900">{{ number_format($request->requested_amount, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Duration</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $request->requested_duration_months }} months</p>
                                    </div>
                                </div>
                                @if($request->reason)
                                    <p class="text-sm text-gray-700 mb-2"><strong>Reason:</strong> {{ $request->reason }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-gray-500">No pending loan requests</p>
                    </div>
                @endif
            </div>

            <!-- Approved Requests -->
            <div id="approved-tab" class="tab-content hidden p-6">
                @if($requests->where('status', 'approved')->count() > 0)
                    <div class="space-y-4">
                        @foreach($requests->where('status', 'approved') as $request)
                            <div class="border border-green-200 bg-green-50 rounded-lg p-4">
                                <div class="flex items-start justify-between mb-2">
                                    <div>
                                        <h3 class="font-bold text-gray-900">{{ $request->group->name }}</h3>
                                        <p class="text-sm text-gray-600">Approved on {{ $request->reviewed_at->format('M d, Y') }} by {{ $request->reviewer->name ?? 'System' }}</p>
                                    </div>
                                    <span class="inline-block px-3 py-1 bg-green-200 text-green-900 rounded-full text-sm font-semibold">Approved</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-3">
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Amount</p>
                                        <p class="text-lg font-bold text-gray-900">{{ number_format($request->requested_amount, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Duration</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $request->requested_duration_months }} months</p>
                                    </div>
                                </div>
                                @if($request->review_notes)
                                    <p class="text-sm text-gray-700 mb-2"><strong>Admin Notes:</strong> {{ $request->review_notes }}</p>
                                @endif
                                <div class="bg-blue-100 border border-blue-200 rounded p-2 text-sm text-blue-700">
                                    ✓ Your loan has been created and is now active. Check your loans section to start making payments.
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-gray-500">No approved loan requests</p>
                    </div>
                @endif
            </div>

            <!-- Rejected Requests -->
            <div id="rejected-tab" class="tab-content hidden p-6">
                @if($requests->where('status', 'rejected')->count() > 0)
                    <div class="space-y-4">
                        @foreach($requests->where('status', 'rejected') as $request)
                            <div class="border border-red-200 bg-red-50 rounded-lg p-4">
                                <div class="flex items-start justify-between mb-2">
                                    <div>
                                        <h3 class="font-bold text-gray-900">{{ $request->group->name }}</h3>
                                        <p class="text-sm text-gray-600">Rejected on {{ $request->reviewed_at->format('M d, Y') }} by {{ $request->reviewer->name ?? 'System' }}</p>
                                    </div>
                                    <span class="inline-block px-3 py-1 bg-red-200 text-red-900 rounded-full text-sm font-semibold">Rejected</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-3">
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Amount</p>
                                        <p class="text-lg font-bold text-gray-900">{{ number_format($request->requested_amount, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase">Duration</p>
                                        <p class="text-lg font-bold text-gray-900">{{ $request->requested_duration_months }} months</p>
                                    </div>
                                </div>
                                @if($request->review_notes)
                                    <p class="text-sm text-gray-700 mb-2"><strong>Reason:</strong> {{ $request->review_notes }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="text-gray-500">No rejected loan requests</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'border-b-2', 'border-blue-500', 'border-green-500', 'border-red-500');
            btn.classList.add('border-b-2', 'border-transparent');
        });

        // Show selected tab
        document.getElementById(tabName + '-tab').classList.remove('hidden');

        // Highlight selected button
        const btn = document.querySelector(`[data-tab="${tabName}"]`);
        btn.classList.add('active');
        if (tabName === 'pending') btn.classList.add('border-b-2', 'border-yellow-500');
        else if (tabName === 'approved') btn.classList.add('border-b-2', 'border-green-500');
        else if (tabName === 'rejected') btn.classList.add('border-b-2', 'border-red-500');
    }
</script>
@endsection
