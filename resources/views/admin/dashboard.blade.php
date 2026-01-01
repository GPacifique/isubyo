@extends('layouts.admin')

@section('title', 'System Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
    <!-- Premium Header -->
    <div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 text-white">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative px-6 py-16">
            <div class="container mx-auto max-w-7xl">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="p-3 bg-indigo-500 rounded-xl">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 17v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.381z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block bg-indigo-400 text-indigo-900 px-4 py-2 rounded-full text-sm font-bold">System Administrator</span>
                            </div>
                        </div>
                        <h1 class="text-5xl font-bold mb-3">System Administration</h1>
                        <p class="text-indigo-100 text-lg">Welcome back, <span class="font-semibold">{{ auth()->user()->name }}</span></p>
                        <p class="text-indigo-200 text-sm mt-2">Full system access with complete control • Last login: {{ auth()->user()->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto max-w-7xl px-4 py-12">
        <!-- KPI Cards Grid -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">System Overview</h2>
                    <p class="text-gray-600 text-sm mt-1">Real-time statistics and key metrics</p>
                </div>
                <div class="text-gray-400 text-sm">Last updated: {{ now()->format('M d, Y H:i') }}</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Users Card -->
                <a href="{{ route('admin.users.index') }}" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-blue-100 group-hover:bg-blue-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full">+12% </span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Total Users</h3>
                        <p class="text-4xl font-bold text-gray-900">{{ $stats['total_users'] }}</p>
                        <p class="text-gray-500 text-xs mt-2">Active system users</p>
                    </div>
                </a>

                <!-- Groups Card -->
                <a href="{{ route('admin.groups.index') }}" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-100 group-hover:bg-green-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 3a2 2 0 00-2 2v6h6V5a2 2 0 00-2-2H5zm6 0a2 2 0 00-2 2v6h6V5a2 2 0 00-2-2h-2zm0 10a2 2 0 00-2 2v2h2v-2zm-6 2a2 2 0 00-2 2v2h6v-2a2 2 0 00-2-2H5z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">{{ $stats['active_groups'] ?? 0 }} active</span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Groups</h3>
                        <p class="text-4xl font-bold text-gray-900">{{ $stats['total_groups'] }}</p>
                        <p class="text-gray-500 text-xs mt-2">Registered groups</p>
                    </div>
                </a>

                <!-- Active Loans Card -->
                <a href="{{ route('admin.loans.index') }}" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-purple-100 group-hover:bg-purple-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">{{ $stats['total_loans'] ?? 0 }} total</span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Active Loans</h3>
                        <p class="text-4xl font-bold text-gray-900">{{ $stats['active_loans'] }}</p>
                        <p class="text-gray-500 text-xs mt-2">Outstanding loans</p>
                    </div>
                </a>

                <!-- Savings Card -->
                <a href="{{ route('admin.savings.index') }}" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-yellow-100 group-hover:bg-yellow-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 5a2 2 0 012-2h6a2 2 0 012 2v9h2a1 1 0 110 2h-2v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2H3a1 1 0 110-2h2V5zm8 1v7H7V6h6z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2 py-1 rounded-full">Total</span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Savings Balance</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_savings'] ?? 0, 0) }}</p>
                        <p class="text-gray-500 text-xs mt-2">Across all members</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Recent Users Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between bg-gradient-to-r from-gray-50 to-white">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Recent Users</h3>
                            <p class="text-gray-500 text-xs mt-1">Latest registered members</p>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 text-sm font-semibold">
                            View All
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 border-b">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Name</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Email</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Role</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Joined</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($recent_users as $user)
                                    <tr class="hover:bg-gray-50 transition cursor-pointer" onclick="window.location='{{ route('admin.users.edit', $user) }}'">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-400 to-purple-400 flex items-center justify-center text-white font-bold">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                                <span class="font-medium text-gray-900">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                                        <td class="px-6 py-4">
                                            @if($user->is_admin)
                                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800">Admin</span>
                                            @else
                                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">User</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">{{ $user->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">No users found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Groups Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between bg-gradient-to-r from-gray-50 to-white">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Active Groups</h3>
                            <p class="text-gray-500 text-xs mt-1">Groups with recent activity</p>
                        </div>
                        <a href="{{ route('admin.groups.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 text-sm font-semibold">
                            View All
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="divide-y">
                        @forelse($recent_groups as $group)
                            <a href="{{ route('admin.groups.show', $group) }}" class="px-6 py-4 hover:bg-gray-50 transition flex items-center justify-between group">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">{{ $group->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $group->description ?? 'No description' }}</p>
                                    <div class="flex gap-4 mt-2 text-xs text-gray-500">
                                        <span>👥 {{ $group->members()->count() }} members</span>
                                        <span>💰 {{ number_format($group->total_savings ?? 0, 0) }} savings</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">{{ $group->status ?? 'Active' }}</span>
                                </div>
                            </a>
                        @empty
                            <div class="px-6 py-12 text-center text-gray-500">No groups found</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-8">
                <!-- System Health -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">System Health</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 text-sm">Database</span>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">Healthy</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 text-sm">API Server</span>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">Online</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 text-sm">Cache</span>
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">Active</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.users.create') }}" class="w-full px-4 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition font-medium text-center text-sm">
                            + Add New User
                        </a>
                        <a href="{{ route('admin.groups.create') }}" class="w-full px-4 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition font-medium text-center text-sm">
                            + Create Group
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="w-full px-4 py-3 bg-gray-100 text-gray-900 rounded-xl hover:bg-gray-200 transition font-medium text-center text-sm">
                            View Reports
                        </a>
                    </div>
                </div>

                <!-- Statistics Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Statistics</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl">
                            <span class="text-sm text-gray-700">Pending Approvals</span>
                            <span class="font-bold text-blue-600">{{ $stats['pending_approvals'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-orange-50 rounded-xl">
                            <span class="text-sm text-gray-700">Overdue Loans</span>
                            <span class="font-bold text-orange-600">{{ $stats['overdue_loans'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                            <span class="text-sm text-gray-700">Total Transactions</span>
                            <span class="font-bold text-green-600">{{ $stats['total_transactions'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }
</style>

@endsection
