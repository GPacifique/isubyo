@extends('layouts.app')

@section('title', 'My Loans')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">My Loans</h1>
                    <p class="text-gray-600 mt-2">View all your loans and repayment details</p>
                </div>
                <a href="{{ route('member.dashboard') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Total Loaned</p>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ number_format($stats['total_loaned'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Total Paid</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ number_format($stats['total_paid'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Outstanding</p>
                <p class="text-3xl font-bold text-red-600 mt-2">{{ number_format($stats['outstanding'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Active Loans</p>
                <p class="text-3xl font-bold text-purple-600 mt-2">{{ $stats['active_count'] ?? 0 }}</p>
            </div>
        </div>

        <!-- Loans List -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-900">All Loans</h2>
            </div>

            @if($loans->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Group</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Principal</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Payment Progress</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Timeline</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($loans as $loan)
                                @php
                                    $principalAmount = $loan->principal_amount ?? 0;
                                    $paidAmount = $loan->total_principal_paid ?? 0;
                                    $remainingBalance = $loan->remaining_balance ?? 0;
                                    $progressPercent = $principalAmount > 0 ? min(100, ($paidAmount / $principalAmount) * 100) : 0;
                                    $isOverdue = $loan->maturity_date && \Carbon\Carbon::parse($loan->maturity_date)->isPast() && $loan->status === 'active';
                                    $daysUntilDue = $loan->maturity_date ? \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($loan->maturity_date), false) : null;
                                @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $loan->group->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $loan->duration_months }} month term</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-gray-900">{{ number_format($principalAmount, 0) }}</div>
                                        <div class="text-xs text-gray-500">Monthly: {{ number_format($loan->monthly_charge ?? 0, 0) }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full max-w-xs">
                                            <!-- Progress Bar -->
                                            <div class="flex items-center justify-between mb-1">
                                                <span class="text-xs font-semibold text-gray-700">{{ number_format($progressPercent, 0) }}% Paid</span>
                                                <span class="text-xs text-gray-500">{{ number_format($paidAmount, 0) }} / {{ number_format($principalAmount, 0) }}</span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                                                <div class="h-2.5 rounded-full transition-all duration-500 {{ $progressPercent >= 100 ? 'bg-green-500' : ($progressPercent >= 75 ? 'bg-emerald-500' : ($progressPercent >= 50 ? 'bg-blue-500' : ($progressPercent >= 25 ? 'bg-yellow-500' : 'bg-red-500'))) }}"
                                                     style="width: {{ $progressPercent }}%"></div>
                                            </div>
                                            <!-- Remaining Balance -->
                                            <div class="flex items-center justify-between mt-1">
                                                <span class="text-xs text-gray-500">Remaining:</span>
                                                <span class="text-xs font-semibold {{ $remainingBalance > 0 ? 'text-red-600' : 'text-green-600' }}">{{ number_format($remainingBalance, 0) }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($loan->status === 'completed' || $progressPercent >= 100)
                                            <div class="flex items-center space-x-2">
                                                <span class="flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Fully Paid
                                                </span>
                                            </div>
                                            @if($loan->paid_off_at)
                                                <div class="text-xs text-gray-500 mt-1">Cleared {{ \Carbon\Carbon::parse($loan->paid_off_at)->format('M d, Y') }}</div>
                                            @endif
                                        @elseif($isOverdue)
                                            <div class="flex items-center space-x-2">
                                                <span class="flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Overdue
                                                </span>
                                            </div>
                                            <div class="text-xs text-red-600 mt-1 font-medium">{{ abs($daysUntilDue) }} days overdue</div>
                                        @elseif($loan->status === 'active')
                                            <div class="flex items-center space-x-2">
                                                <span class="flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $daysUntilDue !== null && $daysUntilDue <= 7 ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800' }}">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $daysUntilDue !== null && $daysUntilDue <= 7 ? 'Due Soon' : 'Active' }}
                                                </span>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-1">{{ $loan->months_paid ?? 0 }}/{{ $loan->duration_months }} months paid</div>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-800">
                                                {{ ucfirst($loan->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-xs">
                                            <div class="flex items-center text-gray-600 mb-1">
                                                <svg class="w-3 h-3 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <span>Issued: {{ $loan->issued_at ? \Carbon\Carbon::parse($loan->issued_at)->format('M d, Y') : 'N/A' }}</span>
                                            </div>
                                            <div class="flex items-center {{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-600' }}">
                                                <svg class="w-3 h-3 mr-1.5 {{ $isOverdue ? 'text-red-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span>Due: {{ $loan->maturity_date ? \Carbon\Carbon::parse($loan->maturity_date)->format('M d, Y') : 'N/A' }}</span>
                                            </div>
                                            @if($daysUntilDue !== null && $loan->status === 'active' && !$isOverdue)
                                                <div class="text-xs text-blue-600 mt-1">{{ $daysUntilDue }} days remaining</div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($loan->status === 'active' && $remainingBalance > 0)
                                            <a href="{{ route('member.loans.pay', $loan->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg transition shadow-sm">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                </svg>
                                                Make Payment
                                            </a>
                                        @elseif($progressPercent >= 100)
                                            <span class="inline-flex items-center text-green-600 text-xs font-semibold">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Completed
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-xs">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t">
                    {{ $loans->links() }}
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <p class="text-gray-500 text-lg">You have no loans.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
