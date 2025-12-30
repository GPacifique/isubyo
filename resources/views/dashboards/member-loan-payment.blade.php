@extends('layouts.app')

@section('title', 'Kwandika Kwishyura Inguzanyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-4xl mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Kwandika Kwishyura Inguzanyo</h1>
                    <p class="text-gray-600 mt-2">{{ $loan->group->name }} - Ifishi yo Kwishyura Inguzanyo</p>
                </div>
                <a href="{{ route('member.loans') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition">
                    ← Subira ku Nguzanyo
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-8 px-4">
        <!-- Loan Summary Card -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Ibisobanuro by'Inguzanyo</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold">Amafaranga y'Ibanze</p>
                    <p class="text-2xl font-bold text-blue-600 mt-1">{{ number_format($loan->principal_amount, 0) }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold">Byishyuwe Byose</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">{{ number_format($loan->total_principal_paid ?? 0, 0) }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold">Amafaranga Asigaye</p>
                    <p class="text-2xl font-bold text-red-600 mt-1">{{ number_format($loan->remaining_balance ?? 0, 0) }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold">Imiterere</p>
                    <p class="text-lg font-bold mt-1">
                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $loan->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $loan->status === 'active' ? 'Iracyakora' : ucfirst($loan->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-6">Amakuru yo Kwishyura</h2>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <p class="text-red-800 font-semibold">Ikosa ryo Kwemeza:</p>
                    <ul class="text-red-700 text-sm mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('member.loans.pay.store', $loan->id) }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Principal Paid -->
                    <div>
                        <label for="principal_paid" class="block text-sm font-semibold text-gray-700 mb-2">
                            Amafaranga y'Ibanze Wishyura <span class="text-red-600">*</span>
                        </label>
                        <input
                            type="number"
                            id="principal_paid"
                            name="principal_paid"
                            step="0.01"
                            min="0"
                            max="{{ $loan->remaining_balance }}"
                            value="{{ old('principal_paid', 0) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('principal_paid') border-red-500 @enderror"
                            placeholder="0.00"
                            required
                        >
                        <p class="text-xs text-gray-600 mt-1">Ntarengwa: {{ number_format($loan->remaining_balance, 0) }}</p>
                        @error('principal_paid')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Charges Paid -->
                    <div>
                        <label for="charges_paid" class="block text-sm font-semibold text-gray-700 mb-2">
                            Ibihembo/Inyungu Wishyura <span class="text-red-600">*</span>
                        </label>
                        <input
                            type="number"
                            id="charges_paid"
                            name="charges_paid"
                            step="0.01"
                            min="0"
                            value="{{ old('charges_paid', 0) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('charges_paid') border-red-500 @enderror"
                            placeholder="0.00"
                            required
                        >
                        <p class="text-xs text-gray-600 mt-1">Ibihembo cyangwa inyungu byiyongereyeho</p>
                        @error('charges_paid')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Payment Method -->
                <div>
                    <label for="payment_method" class="block text-sm font-semibold text-gray-700 mb-2">
                        Uburyo bwo Kwishyura <span class="text-red-600">*</span>
                    </label>
                    <select
                        id="payment_method"
                        name="payment_method"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('payment_method') border-red-500 @enderror"
                        required
                    >
                        <option value="">-- Hitamo Uburyo bwo Kwishyura --</option>
                        <option value="cash" {{ old('payment_method') === 'cash' ? 'selected' : '' }}>Amafaranga Cash</option>
                        <option value="bank_transfer" {{ old('payment_method') === 'bank_transfer' ? 'selected' : '' }}>Kohereza kuri Banki</option>
                        <option value="mobile_money" {{ old('payment_method') === 'mobile_money' ? 'selected' : '' }}>Mobile Money</option>
                    </select>
                    @error('payment_method')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">
                        Ibisobanuro (Ntibisabwa)
                    </label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('notes') border-red-500 @enderror"
                        placeholder="Ongeraho ibisobanuro kuri iki gikorwa..."
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Total Payment Display -->
                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                    <p class="text-sm text-gray-600 mb-2">Amafaranga Yose yo Kwishyura:</p>
                    <p class="text-3xl font-bold text-blue-600">
                        <span id="total_payment">0</span>
                    </p>
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t">
                    <button
                        type="submit"
                        class="flex-1 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition"
                    >
                        ✓ Andika Kwishyura
                    </button>
                    <a
                        href="{{ route('member.loans') }}"
                        class="flex-1 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition text-center"
                    >
                        Hagarika
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const principalInput = document.getElementById('principal_paid');
    const chargesInput = document.getElementById('charges_paid');
    const totalDisplay = document.getElementById('total_payment');

    function updateTotal() {
        const principal = parseFloat(principalInput.value) || 0;
        const charges = parseFloat(chargesInput.value) || 0;
        const total = principal + charges;
        totalDisplay.textContent = total.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
    }

    principalInput.addEventListener('input', updateTotal);
    chargesInput.addEventListener('input', updateTotal);
    updateTotal();
</script>
@endsection
