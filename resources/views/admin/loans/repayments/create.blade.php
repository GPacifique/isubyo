@extends('layouts.admin')

@section('title', 'Record Loan Repayment')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Record Loan Repayment</h1>
            <p class="text-gray-600 mt-2">Loan #{{ $loan->id }} - {{ $loan->member?->user?->name ?? 'N/A' }}</p>
        </div>
        <a href="{{ route('admin.loans.repayments.index', $loan) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Repayments
        </a>
    </div>

    <!-- Loan Info Card -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div>
                <p class="text-blue-600 text-xs font-bold uppercase tracking-wide">Principal Amount</p>
                <p class="text-xl font-bold text-gray-900 mt-1">{{ number_format($loan->principal_amount, 2) }}</p>
            </div>
            <div>
                <p class="text-blue-600 text-xs font-bold uppercase tracking-wide">Already Paid</p>
                <p class="text-xl font-bold text-green-600 mt-1">{{ number_format($loan->total_principal_paid ?? 0, 2) }}</p>
            </div>
            <div>
                <p class="text-blue-600 text-xs font-bold uppercase tracking-wide">Remaining Balance</p>
                <p class="text-xl font-bold text-red-600 mt-1">{{ number_format($loan->remaining_balance ?? 0, 2) }}</p>
            </div>
            <div>
                <p class="text-blue-600 text-xs font-bold uppercase tracking-wide">Loan Status</p>
                <p class="text-xl font-bold text-gray-900 mt-1">{{ ucfirst($loan->status) }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.loans.repayments.store', $loan) }}">
            @csrf

            <!-- Payment Date -->
            <div class="mb-6">
                <label for="payment_date" class="block text-sm font-bold text-gray-700 mb-2">Payment Date</label>
                <input
                    type="date"
                    id="payment_date"
                    name="payment_date"
                    value="{{ old('payment_date', now()->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('payment_date') border-red-500 @enderror"
                    required
                >
                @error('payment_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Principal Paid -->
            <div class="mb-6">
                <label for="principal_paid" class="block text-sm font-bold text-gray-700 mb-2">Principal Paid</label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-gray-500 font-bold">₦</span>
                    <input
                        type="number"
                        id="principal_paid"
                        name="principal_paid"
                        value="{{ old('principal_paid', 0) }}"
                        step="0.01"
                        min="0"
                        max="{{ $loan->remaining_balance }}"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('principal_paid') border-red-500 @enderror"
                        placeholder="0.00"
                        required
                    >
                </div>
                <p class="text-xs text-gray-500 mt-1">Max: {{ number_format($loan->remaining_balance ?? 0, 2) }}</p>
                @error('principal_paid')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Charges Paid -->
            <div class="mb-6">
                <label for="charges_paid" class="block text-sm font-bold text-gray-700 mb-2">Charges Paid</label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-gray-500 font-bold">₦</span>
                    <input
                        type="number"
                        id="charges_paid"
                        name="charges_paid"
                        value="{{ old('charges_paid', 0) }}"
                        step="0.01"
                        min="0"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('charges_paid') border-red-500 @enderror"
                        placeholder="0.00"
                        required
                    >
                </div>
                @error('charges_paid')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Total Paid -->
            <div class="mb-6">
                <label for="total_paid" class="block text-sm font-bold text-gray-700 mb-2">Total Paid</label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-gray-500 font-bold">₦</span>
                    <input
                        type="number"
                        id="total_paid"
                        name="total_paid"
                        value="{{ old('total_paid', 0) }}"
                        step="0.01"
                        min="0"
                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 bg-gray-100 @error('total_paid') border-red-500 @enderror"
                        placeholder="0.00"
                        readonly
                    >
                </div>
                <p class="text-xs text-gray-500 mt-1">Automatically calculated</p>
                @error('total_paid')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Payment Method -->
            <div class="mb-6">
                <label for="payment_method" class="block text-sm font-bold text-gray-700 mb-2">Payment Method (Optional)</label>
                <select
                    id="payment_method"
                    name="payment_method"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('payment_method') border-red-500 @enderror"
                >
                    <option value="">-- Select Payment Method --</option>
                    <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="check" {{ old('payment_method') == 'check' ? 'selected' : '' }}>Check</option>
                    <option value="mobile_money" {{ old('payment_method') == 'mobile_money' ? 'selected' : '' }}>Mobile Money</option>
                    <option value="other" {{ old('payment_method') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('payment_method')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Notes -->
            <div class="mb-6">
                <label for="notes" class="block text-sm font-bold text-gray-700 mb-2">Notes (Optional)</label>
                <textarea
                    id="notes"
                    name="notes"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('notes') border-red-500 @enderror"
                    placeholder="Add any additional notes..."
                >{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between gap-3 pt-6 border-t">
                <a href="{{ route('admin.loans.repayments.index', $loan) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded"
                >
                    Record Payment
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Auto-calculate total paid
    document.getElementById('principal_paid').addEventListener('change', calculateTotal);
    document.getElementById('charges_paid').addEventListener('change', calculateTotal);

    function calculateTotal() {
        const principal = parseFloat(document.getElementById('principal_paid').value) || 0;
        const charges = parseFloat(document.getElementById('charges_paid').value) || 0;
        document.getElementById('total_paid').value = (principal + charges).toFixed(2);
    }
</script>
@endsection
