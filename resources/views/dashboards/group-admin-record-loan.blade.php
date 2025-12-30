@extends('layouts.app')

@section('title', 'Record Member Loan - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white shadow">
        <div class="max-w-4xl mx-auto py-8 px-4">
            <div class="flex items-center space-x-4 mb-4">
                <img src="{{ asset('images/isubyo.svg') }}" alt="Ikirango cya isubyo" class="h-12 w-12">
                <span class="text-sm font-semibold text-indigo-100">ISUBYO</span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">Record Member Loan</h1>
                    <p class="text-indigo-100 mt-2">{{ $group->name }}</p>
                </div>
                <a href="{{ route('group-admin.loans', $group) }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-400 text-white rounded-lg font-semibold transition">
                    ← Back to Loans
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-8 px-4">
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <p class="text-red-800 font-semibold">Validation Errors:</p>
                <ul class="text-red-700 text-sm mt-2 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Loan Information</h2>

            <form action="{{ route('group-admin.store-member-loan', $group) }}" method="POST" class="space-y-6">
                @csrf

                <!-- Member Selection -->
                <div>
                    <label for="member_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Select Member <span class="text-red-600">*</span>
                    </label>
                    <select
                        id="member_id"
                        name="member_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('member_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">-- Select a Member --</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                {{ $member->user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('member_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Loan Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Principal Amount -->
                    <div>
                        <label for="principal_amount" class="block text-sm font-semibold text-gray-700 mb-2">
                            Principal Amount <span class="text-red-600">*</span>
                        </label>
                        <input
                            type="number"
                            id="principal_amount"
                            name="principal_amount"
                            step="0.01"
                            min="100"
                            value="{{ old('principal_amount', 0) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('principal_amount') border-red-500 @enderror"
                            placeholder="e.g., 500000"
                            required
                        >
                        <p class="text-xs text-gray-600 mt-1">Minimum: 100</p>
                        @error('principal_amount')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Monthly Charge -->
                    <div>
                        <label for="monthly_charge" class="block text-sm font-semibold text-gray-700 mb-2">
                            Monthly Charge <span class="text-red-600">*</span>
                        </label>
                        <input
                            type="number"
                            id="monthly_charge"
                            name="monthly_charge"
                            step="0.01"
                            min="0"
                            value="{{ old('monthly_charge', 0) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('monthly_charge') border-red-500 @enderror"
                            placeholder="e.g., 50000"
                            required
                        >
                        <p class="text-xs text-gray-600 mt-1">Interest or charge per month</p>
                        @error('monthly_charge')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Duration -->
                <div>
                    <label for="duration_months" class="block text-sm font-semibold text-gray-700 mb-2">
                        Loan Duration (Months) <span class="text-red-600">*</span>
                    </label>
                    <input
                        type="number"
                        id="duration_months"
                        name="duration_months"
                        min="1"
                        max="60"
                        value="{{ old('duration_months', 12) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('duration_months') border-red-500 @enderror"
                        placeholder="e.g., 12"
                        required
                    >
                    <p class="text-xs text-gray-600 mt-1">Duration between 1 and 60 months</p>
                    @error('duration_months')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Loan Summary Card -->
                <div class="bg-indigo-50 rounded-lg p-4 border border-indigo-200">
                    <p class="text-sm text-gray-700 mb-3">
                        <span class="font-semibold">Loan Summary:</span>
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <p class="text-xs text-gray-600">Principal Amount</p>
                            <p class="text-lg font-bold text-indigo-600" id="summary_principal">0</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">Total Charges (over duration)</p>
                            <p class="text-lg font-bold text-orange-600" id="summary_charges">0</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">Total Payback</p>
                            <p class="text-lg font-bold text-green-600" id="summary_total">0</p>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">
                        Notes (Optional)
                    </label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('notes') border-red-500 @enderror"
                        placeholder="Add any notes about this loan..."
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t">
                    <button
                        type="submit"
                        class="flex-1 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition"
                    >
                        ✓ Record Loan
                    </button>
                    <a
                        href="{{ route('group-admin.loans', $group) }}"
                        class="flex-1 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition text-center"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const principalInput = document.getElementById('principal_amount');
    const chargeInput = document.getElementById('monthly_charge');
    const durationInput = document.getElementById('duration_months');

    const summaryPrincipal = document.getElementById('summary_principal');
    const summaryCharges = document.getElementById('summary_charges');
    const summaryTotal = document.getElementById('summary_total');

    function updateSummary() {
        const principal = parseFloat(principalInput.value) || 0;
        const monthlyCharge = parseFloat(chargeInput.value) || 0;
        const months = parseInt(durationInput.value) || 0;

        const totalCharges = monthlyCharge * months;
        const totalPayback = principal + totalCharges;

        summaryPrincipal.textContent = principal.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        summaryCharges.textContent = totalCharges.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        summaryTotal.textContent = totalPayback.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
    }

    principalInput.addEventListener('input', updateSummary);
    chargeInput.addEventListener('input', updateSummary);
    durationInput.addEventListener('input', updateSummary);
    updateSummary();
</script>
@endsection
