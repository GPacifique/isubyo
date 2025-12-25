@extends('layouts.admin')

@section('title', 'Record Transaction')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Record New Transaction</h1>
        <a href="{{ route('admin.transactions.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Transactions
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.transactions.store') }}">
            @csrf

            <!-- Group Selection -->
            <div class="mb-6">
                <label for="group_id" class="block text-sm font-bold text-gray-700 mb-2">Group</label>
                <select
                    id="group_id"
                    name="group_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('group_id') border-red-500 @enderror"
                    required
                >
                    <option value="">-- Select a Group --</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
                @error('group_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Member Selection (Optional) -->
            <div class="mb-6">
                <label for="member_id" class="block text-sm font-bold text-gray-700 mb-2">Member (Optional)</label>
                <select
                    id="member_id"
                    name="member_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('member_id') border-red-500 @enderror"
                >
                    <option value="">-- Select a Member --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->user->name }} ({{ $member->group->name }})
                        </option>
                    @endforeach
                </select>
                @error('member_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Transaction Type -->
            <div class="mb-6">
                <label for="type" class="block text-sm font-bold text-gray-700 mb-2">Transaction Type</label>
                <select
                    id="type"
                    name="type"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('type') border-red-500 @enderror"
                    required
                >
                    <option value="">-- Select Type --</option>
                    <option value="deposit" {{ old('type') == 'deposit' ? 'selected' : '' }}>Deposit</option>
                    <option value="withdrawal" {{ old('type') == 'withdrawal' ? 'selected' : '' }}>Withdrawal</option>
                    <option value="transfer" {{ old('type') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="loan_disbursement" {{ old('type') == 'loan_disbursement' ? 'selected' : '' }}>Loan Disbursement</option>
                    <option value="loan_repayment" {{ old('type') == 'loan_repayment' ? 'selected' : '' }}>Loan Repayment</option>
                    <option value="charge" {{ old('type') == 'charge' ? 'selected' : '' }}>Charge</option>
                    <option value="interest" {{ old('type') == 'interest' ? 'selected' : '' }}>Interest</option>
                    <option value="adjustment" {{ old('type') == 'adjustment' ? 'selected' : '' }}>Adjustment</option>
                </select>
                @error('type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Amount -->
            <div class="mb-6">
                <label for="amount" class="block text-sm font-bold text-gray-700 mb-2">Amount</label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-gray-500 font-bold">₦</span>
                    <input
                        type="number"
                        id="amount"
                        name="amount"
                        value="{{ old('amount') }}"
                        step="0.01"
                        min="0.01"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('amount') border-red-500 @enderror"
                        placeholder="0.00"
                        required
                    >
                </div>
                @error('amount')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Balance After (Optional) -->
            <div class="mb-6">
                <label for="balance_after" class="block text-sm font-bold text-gray-700 mb-2">Balance After (Optional)</label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-gray-500 font-bold">₦</span>
                    <input
                        type="number"
                        id="balance_after"
                        name="balance_after"
                        value="{{ old('balance_after') }}"
                        step="0.01"
                        min="0"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('balance_after') border-red-500 @enderror"
                        placeholder="0.00"
                    >
                </div>
                @error('balance_after')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Transaction Date -->
            <div class="mb-6">
                <label for="transaction_date" class="block text-sm font-bold text-gray-700 mb-2">Transaction Date</label>
                <input
                    type="date"
                    id="transaction_date"
                    name="transaction_date"
                    value="{{ old('transaction_date', now()->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('transaction_date') border-red-500 @enderror"
                    required
                >
                @error('transaction_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Reference -->
            <div class="mb-6">
                <label for="reference" class="block text-sm font-bold text-gray-700 mb-2">Reference (Optional)</label>
                <input
                    type="text"
                    id="reference"
                    name="reference"
                    value="{{ old('reference') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('reference') border-red-500 @enderror"
                    placeholder="Loan #123, Check #456, etc."
                    maxlength="100"
                >
                @error('reference')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Description (Optional)</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                    placeholder="Add transaction details..."
                    maxlength="500"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between gap-3 pt-6 border-t">
                <a href="{{ route('admin.transactions.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded"
                >
                    Record Transaction
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
