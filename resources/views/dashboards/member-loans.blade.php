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
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Paid</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Remaining</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Issued Date</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Due Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($loans as $loan)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $loan->group->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ number_format($loan->principal_amount, 0) }}</td>
                                    <td class="px-6 py-4 text-sm text-green-600 font-semibold">{{ number_format($loan->total_principal_paid ?? 0, 0) }}</td>
                                    <td class="px-6 py-4 text-sm text-red-600 font-semibold">{{ number_format($loan->remaining_balance ?? 0, 0) }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $loan->status === 'active' ? 'bg-green-100 text-green-800' : ($loan->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $loan->issued_at ? \Carbon\Carbon::parse($loan->issued_at)->format('M d, Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $loan->maturity_date ? \Carbon\Carbon::parse($loan->maturity_date)->format('M d, Y') : 'N/A' }}</td>
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
