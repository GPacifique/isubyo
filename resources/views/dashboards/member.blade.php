@extends('layouts.app')

@section('title', 'My Dashboard - Member')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-900">My Dashboard</h1>
                    <p class="text-gray-600 mt-2">View your loans, savings, and group activities</p>
                </div>

                <!-- Dashboard Switcher -->
                @php
                    $canAccessSystemAdmin = auth()->user()->is_admin;
                    $canAccessGroupAdmin = auth()->user()->isGroupAdminOfAny();
                @endphp

                @if($canAccessSystemAdmin || $canAccessGroupAdmin)
                    <div class="ml-6" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition font-medium text-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.5 1.5H3.75A2.25 2.25 0 001.5 3.75v12.5A2.25 2.25 0 003.75 18.5h12.5a2.25 2.25 0 002.25-2.25V9.5"></path>
                                <path d="M6.5 10.5h7M6.5 14h4"></path>
                            </svg>
                            Switch
                            <svg class="w-4 h-4 transition" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <div @click.away="open = false" class="absolute right-4 mt-2 w-56 bg-white rounded-lg shadow-xl hidden z-50" :class="{ 'hidden': !open }">
                            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                                <p class="text-xs font-semibold text-gray-600 uppercase">Available Dashboards</p>
                            </div>

                            @if($canAccessSystemAdmin)
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 border-b transition">
                                    <div class="flex-1">
                                        <div class="font-semibold text-blue-600">System Admin</div>
                                        <p class="text-xs text-gray-500">System-wide management</p>
                                    </div>
                                </a>
                            @endif

                            @if($canAccessGroupAdmin)
                                <a href="{{ route('group-admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 border-b transition">
                                    <div class="flex-1">
                                        <div class="font-semibold text-green-600">Group Admin</div>
                                        <p class="text-xs text-gray-500">Manage assigned groups</p>
                                    </div>
                                </a>
                            @endif

                            <a href="{{ route('member.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 transition">
                                <div class="flex-1">
                                    <div class="font-semibold text-purple-600">Member</div>
                                    <p class="text-xs text-gray-500">Currently active</p>
                                </div>
                                <span class="inline-block w-3 h-3 bg-purple-600 rounded-full"></span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Quick Stats Cards - Compact Square Design -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
            <!-- Total Savings -->
            <div class="bg-white rounded-lg shadow border-l-4 border-green-500 h-32 p-4 flex flex-col justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase">Total Savings</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">{{ number_format($savings_stats['total_balance'] ?? 0, 0) }}</p>
                </div>
                <p class="text-xs text-gray-600">{{ $account_stats['total_savings_accounts'] ?? 0 }} accounts</p>
            </div>

            <!-- Outstanding Debt -->
            <div class="bg-white rounded-lg shadow border-l-4 border-red-500 h-32 p-4 flex flex-col justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase">Outstanding Debt</p>
                    <p class="text-2xl font-bold text-red-600 mt-1">{{ number_format($loan_stats['outstanding'] ?? 0, 0) }}</p>
                </div>
                <p class="text-xs text-gray-600">{{ $loan_stats['active_count'] ?? 0 }} active loans</p>
            </div>

            <!-- Total Penalties -->
            <div class="bg-white rounded-lg shadow border-l-4 border-orange-500 h-32 p-4 flex flex-col justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase">Penalties Outstanding</p>
                    <p class="text-2xl font-bold text-orange-600 mt-1">{{ number_format($penalties_stats['outstanding'] ?? 0, 0) }}</p>
                </div>
                <p class="text-xs text-gray-600">{{ $penalties_stats['pending_count'] ?? 0 }} pending</p>
            </div>

            <!-- Net Worth -->
            <div class="bg-white rounded-lg shadow border-l-4 border-emerald-500 h-32 p-4 flex flex-col justify-between">
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase">Net Worth</p>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">{{ number_format($account_stats['net_worth'] ?? 0, 0) }}</p>
                </div>
                <p class="text-xs text-gray-600">Savings - Debt</p>
            </div>
        </div>
        <!-- Account Details Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content Area (2/3) -->
            <div class="lg:col-span-2">
                <!-- Loans Overview -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-gray-900">My Loans</h2>
                        <span class="text-2xl font-bold text-blue-600">{{ $loan_stats['active_count'] ?? 0 }}</span>
                    </div>

                    @if($loans->count() > 0)
                        <!-- Loan Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-4">
                            <div class="bg-blue-50 rounded p-3">
                                <p class="text-xs text-gray-600 uppercase">Total Loaned</p>
                                <p class="text-xl font-bold text-blue-600">{{ number_format($loan_stats['total_loaned'] ?? 0, 0) }}</p>
                            </div>
                            <div class="bg-green-50 rounded p-3">
                                <p class="text-xs text-gray-600 uppercase">Total Paid</p>
                                <p class="text-xl font-bold text-green-600">{{ number_format($loan_stats['total_paid'] ?? 0, 0) }}</p>
                            </div>
                            <div class="bg-purple-50 rounded p-3">
                                <p class="text-xs text-gray-600 uppercase">Completed</p>
                                <p class="text-xl font-bold text-purple-600">{{ $loan_stats['completed_count'] ?? 0 }}</p>
                            </div>
                        </div>

                        <!-- Recent Loans -->
                        <div class="space-y-2 border-t pt-4">
                            @foreach($loans->take(5) as $loan)
                                <div class="border rounded p-3 hover:bg-gray-50 flex items-center justify-between">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">{{ $loan->group->name }}</h4>
                                        <p class="text-xs text-gray-500">Principal: {{ number_format($loan->principal_amount, 0) }}</p>
                                        <p class="text-xs text-gray-600">Paid: {{ number_format($loan->total_principal_paid ?? 0, 0) }} / Remaining: {{ number_format($loan->remaining_balance ?? 0, 0) }}</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-1 rounded text-xs font-bold {{ $loan->status === 'active' ? 'bg-green-100 text-green-800' : ($loan->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                        @if($loan->status === 'active' && ($loan->remaining_balance ?? 0) > 0)
                                            <a href="{{ route('member.loans.pay', $loan->id) }}" class="px-2 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded transition">
                                                Pay
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($loans->count() > 5)
                            <div class="text-center mt-3 pt-3 border-t">
                                <a href="{{ route('member.loans') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">View All Loans →</a>
                            </div>
                        @endif
                    @else
                        <p class="text-gray-500 text-center py-6">You have no loans.</p>
                    @endif
                </div>

                <!-- Savings Overview -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-gray-900">My Savings</h2>
                        <span class="text-2xl font-bold text-green-600">{{ $account_stats['total_savings_accounts'] ?? 0 }}</span>
                    </div>

                    @if($savings->count() > 0)
                        <!-- Savings Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-4">
                            <div class="bg-green-50 rounded p-3">
                                <p class="text-xs text-gray-600 uppercase">Total Accumulated</p>
                                <p class="text-xl font-bold text-green-600">{{ number_format($savings_stats['total_accumulated'] ?? 0, 0) }}</p>
                            </div>
                            <div class="bg-emerald-50 rounded p-3">
                                <p class="text-xs text-gray-600 uppercase">Interest Earned</p>
                                <p class="text-xl font-bold text-emerald-600">{{ number_format($savings_stats['total_interest_earned'] ?? 0, 0) }}</p>
                            </div>
                            <div class="bg-teal-50 rounded p-3">
                                <p class="text-xs text-gray-600 uppercase">Weekly Deposits</p>
                                <p class="text-xl font-bold text-teal-600">{{ number_format($savings_stats['total_weekly_deposits'] ?? 0, 0) }}</p>
                            </div>
                        </div>

                        <!-- Recent Savings Accounts -->
                        <div class="space-y-2 border-t pt-4">
                            @foreach($savings->take(5) as $saving)
                                <div class="border rounded p-3 hover:bg-gray-50">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <h4 class="font-semibold text-gray-900">{{ $saving->group->name }}</h4>
                                            <p class="text-xs text-gray-500">Current Balance: {{ number_format($saving->balance, 0) }}</p>
                                        </div>
                                        <span class="px-2 py-1 rounded text-xs font-bold bg-green-100 text-green-800">Active</span>
                                    </div>
                                    <p class="text-xs text-gray-600">Total Deposited: {{ number_format($saving->total_deposits ?? 0, 0) }} | Weekly: {{ number_format($saving->current_balance, 0) }}</p>
                                </div>
                            @endforeach
                        </div>
                        @if($savings->count() > 5)
                            <div class="text-center mt-3 pt-3 border-t">
                                <a href="{{ route('member.savings') }}" class="text-green-600 hover:text-green-800 text-sm font-semibold">View All Savings →</a>
                            </div>
                        @endif
                    @else
                        <p class="text-gray-500 text-center py-6">You have no savings accounts.</p>
                    @endif
                </div>

                <!-- Penalties & Social Support Overview -->
                @if($penalties->count() > 0 || $socialSupport->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Penalties -->
                        @if($penalties->count() > 0)
                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-bold text-gray-900">Penalties</h2>
                                    <span class="text-2xl font-bold text-orange-600">{{ $penalties_stats['pending_count'] ?? 0 }}</span>
                                </div>

                                <div class="space-y-2 mb-4">
                                    @foreach($penalties->take(3) as $penalty)
                                        <div class="border rounded p-3 hover:bg-gray-50">
                                            <div class="flex justify-between items-start mb-1">
                                                <div class="text-sm">
                                                    <p class="font-semibold text-gray-900">{{ $penalty->group->name }}</p>
                                                    <p class="text-xs text-gray-500">{{ $penalty->penalty_type ?? 'Late Payment' }}</p>
                                                </div>
                                                <span class="px-2 py-1 rounded text-xs font-bold {{ $penalty->status === 'pending' ? 'bg-orange-100 text-orange-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ ucfirst($penalty->status) }}
                                                </span>
                                            </div>
                                            <p class="text-xs text-gray-600">Amount: {{ number_format($penalty->amount ?? 0, 0) }} | Paid: {{ number_format($penalty->amount_paid ?? 0, 0) }}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="border-t pt-3 text-sm">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-600">Total Penalties:</span>
                                        <span class="font-bold text-orange-600">{{ number_format($penalties_stats['total_amount'] ?? 0, 0) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Outstanding:</span>
                                        <span class="font-bold text-red-600">{{ number_format($penalties_stats['outstanding'] ?? 0, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Social Support -->
                        @if($socialSupport->count() > 0)
                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-lg font-bold text-gray-900">Support Requests</h2>
                                    <span class="text-2xl font-bold text-blue-600">{{ $support_stats['pending_count'] ?? 0 }}</span>
                                </div>

                                <div class="space-y-2 mb-4">
                                    @foreach($socialSupport->take(3) as $support)
                                        <div class="border rounded p-3 hover:bg-gray-50">
                                            <div class="flex justify-between items-start mb-1">
                                                <div class="text-sm">
                                                    <p class="font-semibold text-gray-900">{{ $support->group->name }}</p>
                                                    <p class="text-xs text-gray-500">{{ ucfirst($support->request_type ?? 'General') }}</p>
                                                </div>
                                                <span class="px-2 py-1 rounded text-xs font-bold {{ $support->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($support->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                                    {{ ucfirst($support->status) }}
                                                </span>
                                            </div>
                                            <p class="text-xs text-gray-600">Requested: {{ number_format($support->requested_amount ?? 0, 0) }}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="border-t pt-3 text-sm">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-600">Total Requested:</span>
                                        <span class="font-bold text-blue-600">{{ number_format($support_stats['total_amount_requested'] ?? 0, 0) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Approved:</span>
                                        <span class="font-bold text-green-600">{{ number_format($support_stats['total_amount_disbursed'] ?? 0, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Recent Transactions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Recent Transactions</h2>

                    @if($transactions->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Date</th>
                                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Type</th>
                                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Group</th>
                                        <th class="px-4 py-2 text-right text-sm font-semibold text-gray-700">Amount</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($transactions as $transaction)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ $transaction->created_at->format('M d, Y') }}</td>
                                            <td class="px-4 py-3 text-sm">
                                                <span class="px-2 py-1 rounded text-xs font-semibold {{ $transaction->type === 'loan_payment' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ ucfirst(str_replace('_', ' ', $transaction->type)) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ $transaction->group->name ?? 'N/A' }}</td>
                                            <td class="px-4 py-3 text-sm font-semibold text-right">{{ number_format($transaction->amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $transactions->links() }}
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No transactions yet.</p>
                    @endif
                </div>
            </div>

            <!-- Right Sidebar (1/3) -->
            <div>
                <!-- My Groups -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">My Groups</h2>

                    @if($groups->count() > 0)
                        <div class="space-y-3">
                            @foreach($groups->take(5) as $group)
                                <div class="border rounded p-3 hover:bg-gray-50">
                                    <p class="font-semibold text-gray-900 text-sm">{{ $group->name }}</p>
                                    <p class="text-xs text-gray-600 mt-1">{{ $group->members_count ?? 0 }} members</p>
                                    <p class="text-xs text-gray-500 mt-1">Joined: {{ $group->pivot->created_at->format('M d, Y') }}</p>
                                </div>
                            @endforeach
                        </div>

                        @if($groups->count() > 5)
                            <div class="text-center mt-4 pt-4 border-t">
                                <a href="{{ route('member.groups') }}" class="text-blue-600 hover:text-blue-800 text-xs font-semibold">View All Groups →</a>
                            </div>
                        @endif
                    @else
                        <p class="text-gray-500 text-center py-6">You haven't joined any groups yet.</p>
                    @endif
                </div>

                <!-- Profile Info -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Profile</h2>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Name</p>
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Email</p>
                            <p class="text-sm text-gray-600 break-words">{{ Auth::user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Member Since</p>
                            <p class="text-sm text-gray-600">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="mt-4 block px-3 py-2 bg-blue-50 hover:bg-blue-100 rounded text-blue-600 text-sm font-semibold text-center transition">
                        Edit Profile
                    </a>
                </div>

                <!-- Quick Links -->
                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                    <h3 class="font-semibold text-blue-900 mb-3">Quick Links</h3>
                    <div class="space-y-2">
                        <a href="{{ route('member.loans') }}" class="block text-blue-600 hover:text-blue-800 text-sm font-semibold">→ My Loans</a>
                        <a href="{{ route('member.savings') }}" class="block text-green-600 hover:text-green-800 text-sm font-semibold">→ My Savings</a>
                        <a href="{{ route('member.transactions') }}" class="block text-purple-600 hover:text-purple-800 text-sm font-semibold">→ Transactions</a>
                        <a href="{{ route('member.groups') }}" class="block text-blue-600 hover:text-blue-800 text-sm font-semibold">→ My Groups</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
