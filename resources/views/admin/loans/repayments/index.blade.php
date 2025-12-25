@extends('layouts.admin')

@section('title', 'Loan Repayments - ' . $loan->id)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Loan Repayments</h1>
            <p class="text-gray-600 mt-2">
                Loan #{{ $loan->id }} -
                {{ $loan->member?->user?->name ?? 'N/A' }}
                ({{ $loan->group?->name ?? 'N/A' }})
            </p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.loans.repayments.create', $loan) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"></path>
                </svg>
                ➕ Record Payment
            </a>
            <a href="{{ route('admin.loans.show', $loan) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Loan
            </a>
        </div>
    </div>

    <!-- Loan Summary -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-gray-600 text-sm font-semibold">Principal Amount</p>
            <p class="text-2xl font-bold text-gray-900 mt-2">{{ number_format($loan->principal_amount, 2) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-gray-600 text-sm font-semibold">Paid</p>
            <p class="text-2xl font-bold text-green-600 mt-2">{{ number_format($loan->total_principal_paid ?? 0, 2) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-gray-600 text-sm font-semibold">Remaining</p>
            <p class="text-2xl font-bold text-red-600 mt-2">{{ number_format($loan->remaining_balance ?? 0, 2) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-gray-600 text-sm font-semibold">Progress</p>
            <div class="mt-2">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ min(100, ($loan->total_principal_paid / $loan->principal_amount) * 100) }}%"></div>
                </div>
                <p class="text-xs text-gray-600 mt-1">{{ round(($loan->total_principal_paid / $loan->principal_amount) * 100, 1) }}%</p>
            </div>
        </div>
    </div>

    <!-- Repayments Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-900 to-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Payment Date</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Principal Paid</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Charges Paid</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Total Paid</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Method</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Recorded By</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($repayments as $payment)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">#{{ $payment->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $payment->payment_date->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-green-600">{{ number_format($payment->principal_paid, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ number_format($payment->charges_paid, 2) }}</td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">{{ number_format($payment->total_paid, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $payment->payment_method ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $payment->recordedByUser?->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('admin.loans.repayments.edit', [$loan, $payment]) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Edit</a>
                            <form method="POST" action="{{ route('admin.loans.repayments.destroy', [$loan, $payment]) }}" class="inline" onsubmit="return confirm('Delete this payment record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center text-gray-600">
                            No repayments recorded yet.
                            <a href="{{ route('admin.loans.repayments.create', $loan) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Record first payment</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50 border-t">
            {{ $repayments->links() }}
        </div>
    </div>
</div>
@endsection
