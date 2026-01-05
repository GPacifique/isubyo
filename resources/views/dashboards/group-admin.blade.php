@extends('layouts.app')

@section('title', 'Group Admin Dashboard - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-indigo-50">
    <!-- Top Navigation Bar -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left: Logo & Brand -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('group-admin.dashboard') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('images/isubyo.png') }}" alt="isubyo" class="h-10 w-10 rounded-xl shadow-sm">
                        <div class="hidden sm:block">
                            <span class="text-lg font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">isubyo</span>
                            <span class="text-xs text-gray-500 block -mt-1">Group Admin</span>
                        </div>
                    </a>

                    <!-- Group Selector -->
                    @if($adminGroups && count($adminGroups) > 0)
                    <div class="hidden md:block border-l border-gray-200 pl-4 ml-4">
                        <select id="groupSelect" onchange="switchGroup(this.value)"
                            class="text-sm font-medium text-gray-700 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 hover:bg-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent cursor-pointer transition">
                            @foreach($adminGroups as $availableGroup)
                                <option value="{{ $availableGroup->id }}" {{ $availableGroup->id === $group->id ? 'selected' : '' }}>
                                    {{ $availableGroup->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                </div>

                <!-- Center: Main Navigation -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('group-admin.dashboard') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-indigo-600 bg-indigo-50 transition">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('group-admin.members', $group) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                        Members
                    </a>
                    <a href="{{ route('group-admin.loans', $group) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"/></svg>
                        Loans
                    </a>
                    <a href="{{ route('group-admin.savings', $group) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>
                        Savings
                    </a>
                    <a href="{{ route('group-admin.social-supports', $group) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                        Support
                    </a>
                    <a href="{{ route('group-admin.transactions', $group) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                        Transactions
                    </a>
                    <a href="{{ route('group-admin.reports', $group) }}" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 transition">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd"/></svg>
                        Reports
                    </a>
                </div>

                <!-- Right: Actions & Profile -->
                <div class="flex items-center space-x-3">
                    <!-- Quick Actions Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button id="quickActionsBtn" class="flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-medium hover:from-indigo-700 hover:to-purple-700 shadow-lg shadow-indigo-500/25 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Quick Add
                            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                        <div id="quickActionsMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                            <a href="{{ route('group-admin.record-member-loan', $group) }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 transition">
                                <span class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">💳</span>
                                <span class="font-medium">Record Loan</span>
                            </a>
                            <a href="{{ route('group-admin.record-savings', $group) }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 transition">
                                <span class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">💰</span>
                                <span class="font-medium">Record Savings</span>
                            </a>
                            <a href="{{ route('group-admin.record-interest', $group) }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 transition">
                                <span class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">📈</span>
                                <span class="font-medium">Record Interest</span>
                            </a>
                            <div class="border-t border-gray-100 my-2"></div>
                            <a href="{{ route('group-admin.members.create', $group) }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 transition">
                                <span class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">👤</span>
                                <span class="font-medium">Add Member</span>
                            </a>
                            <button onclick="showCreateSocialSupportModal()" class="w-full flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 transition">
                                <span class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3">❤️</span>
                                <span class="font-medium">Social Support</span>
                            </button>
                        </div>
                    </div>

                    <!-- Dashboard Switcher -->
                    @php
                        $canAccessSystemAdmin = auth()->user()->is_admin;
                        $canAccessMember = auth()->user()->isMemberOfGroup();
                    @endphp
                    @if($canAccessSystemAdmin || $canAccessMember)
                    <div class="relative">
                        <button id="ga-switcher-btn" class="flex items-center px-3 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z"/></svg>
                            Switch
                        </button>
                        <div id="ga-switcher-menu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50">
                            <div class="px-4 py-3 bg-gradient-to-r from-gray-50 to-gray-100 border-b">
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Switch Dashboard</p>
                            </div>
                            @if($canAccessSystemAdmin)
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-blue-50 transition border-b">
                                <span class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-3 text-blue-600">🔧</span>
                                <div>
                                    <div class="font-semibold text-gray-900">System Admin</div>
                                    <p class="text-xs text-gray-500">Manage entire system</p>
                                </div>
                            </a>
                            @endif
                            <a href="{{ route('group-admin.dashboard') }}" class="flex items-center px-4 py-3 bg-indigo-50 border-b">
                                <span class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center mr-3 text-indigo-600">👥</span>
                                <div class="flex-1">
                                    <div class="font-semibold text-indigo-600">Group Admin</div>
                                    <p class="text-xs text-gray-500">Currently active</p>
                                </div>
                                <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                            </a>
                            @if($canAccessMember)
                            <a href="{{ route('member.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-purple-50 transition">
                                <span class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center mr-3 text-purple-600">👤</span>
                                <div>
                                    <div class="font-semibold text-gray-900">Member</div>
                                    <p class="text-xs text-gray-500">View your account</p>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Mobile Menu Toggle -->
                    <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobileMenu" class="hidden lg:hidden border-t border-gray-200 bg-white">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ route('group-admin.dashboard') }}" class="block px-4 py-2 rounded-lg text-indigo-600 bg-indigo-50 font-medium">Dashboard</a>
                <a href="{{ route('group-admin.members', $group) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">Members</a>
                <a href="{{ route('group-admin.loans', $group) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">Loans</a>
                <a href="{{ route('group-admin.savings', $group) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">Savings</a>
                <a href="{{ route('group-admin.social-supports', $group) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">Social Support</a>
                <a href="{{ route('group-admin.transactions', $group) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">Transactions</a>
                <a href="{{ route('group-admin.reports', $group) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">Reports</a>
                <a href="{{ route('group-admin.penalties', $group) }}" class="block px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-50">Penalties</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700"></div>
        <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/20"></div>

        <div class="relative max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center space-x-3 mb-2">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur rounded-full text-xs font-semibold text-white">
                            {{ $group->status === 'active' ? '🟢 Active' : '⚪ ' . ucfirst($group->status) }}
                        </span>
                        <span class="text-indigo-200 text-sm">{{ $group->created_at->format('M Y') }}</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $group->name }}</h1>
                    <p class="text-indigo-200 max-w-xl">Manage your group's finances, members, loans, and social support funds efficiently.</p>
                </div>

                <!-- Quick Stats Pills -->
                <div class="flex flex-wrap gap-3">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
                        <div class="text-2xl font-bold text-white">{{ $stats['total_members'] }}</div>
                        <div class="text-xs text-indigo-200">Members</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
                        <div class="text-2xl font-bold text-white">{{ $stats['active_loans'] }}</div>
                        <div class="text-xs text-indigo-200">Active Loans</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
                        <div class="text-2xl font-bold text-white">{{ number_format($stats['support_fund_available']/1000, 0) }}K</div>
                        <div class="text-xs text-indigo-200">Support Fund</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Alert Section -->
        @if($overdue_loans->count() > 0)
        <div class="mb-6 bg-gradient-to-r from-red-500 to-rose-500 rounded-2xl p-1">
            <div class="bg-white rounded-xl p-4 flex items-center">
                <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-red-900">⚠️ {{ $overdue_loans->count() }} Overdue Loans Require Attention</h3>
                    <p class="text-red-700 text-sm">These loans have passed their due date. Please take action immediately.</p>
                </div>
                <a href="{{ route('group-admin.loans', $group) }}?status=overdue" class="px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition">View Now</a>
            </div>
        </div>
        @endif

        <!-- Main Statistics Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-5 border border-gray-100 group hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total_members'] }}</p>
                <p class="text-xs text-gray-500 font-medium">Total Members</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-5 border border-gray-100 group hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['active_loans'] }}</p>
                <p class="text-xs text-gray-500 font-medium">Active Loans</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-5 border border-gray-100 group hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                <p class="text-xl font-bold text-gray-900">{{ number_format($stats['total_loan_amount']/1000, 0) }}K</p>
                <p class="text-xs text-gray-500 font-medium">Loans Disbursed</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-5 border border-gray-100 group hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                <p class="text-xl font-bold text-gray-900">{{ number_format($stats['total_member_shares']/1000, 0) }}K</p>
                <p class="text-xs text-gray-500 font-medium">Member Shares</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-5 border border-gray-100 group hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-cyan-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 text-cyan-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                <p class="text-xl font-bold text-gray-900">{{ number_format($stats['monthly_savings']/1000, 0) }}K</p>
                <p class="text-xs text-gray-500 font-medium">This Month</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 p-5 border border-gray-100 group hover:-translate-y-1 {{ $stats['overdue_loans'] > 0 ? 'ring-2 ring-red-200' : '' }}">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 {{ $stats['overdue_loans'] > 0 ? 'bg-red-100' : 'bg-gray-100' }} rounded-xl flex items-center justify-center group-hover:scale-110 transition">
                        <svg class="w-5 h-5 {{ $stats['overdue_loans'] > 0 ? 'text-red-600' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold {{ $stats['overdue_loans'] > 0 ? 'text-red-600' : 'text-gray-900' }}">{{ $stats['overdue_loans'] }}</p>
                <p class="text-xs text-gray-500 font-medium">Overdue</p>
            </div>
        </div>

        <!-- Secondary Stats Row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl p-5 text-white">
                <p class="text-red-100 text-xs font-medium mb-1">Total Penalties</p>
                <p class="text-2xl font-bold">{{ number_format($stats['total_penalties'], 0) }}</p>
            </div>
            <div class="bg-gradient-to-br from-orange-500 to-amber-600 rounded-2xl p-5 text-white">
                <p class="text-orange-100 text-xs font-medium mb-1">Total Interest</p>
                <p class="text-2xl font-bold">{{ number_format($stats['total_interests'], 0) }}</p>
            </div>
            <div class="bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl p-5 text-white">
                <p class="text-emerald-100 text-xs font-medium mb-1">Support Fund</p>
                <p class="text-2xl font-bold">{{ number_format($stats['support_fund_available'], 0) }}</p>
            </div>
            <div class="bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl p-5 text-white">
                <p class="text-pink-100 text-xs font-medium mb-1">Support Disbursed</p>
                <p class="text-2xl font-bold">{{ number_format($stats['total_support_disbursed'], 0) }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Total Loans Disbursed</p>
                <p class="text-xl font-bold text-yellow-600">{{ number_format($stats['total_loan_amount'], 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-purple-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Member Shares</p>
                <p class="text-xl font-bold text-purple-600">{{ number_format($stats['total_member_shares'], 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-cyan-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Daily Savings</p>
                <div>
                    <p class="text-xl font-bold text-cyan-600">{{ number_format($stats['daily_savings'], 2) }}</p>
                    <p class="text-xs text-gray-500">{{ now()->format('M d') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-indigo-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Monthly Savings</p>
                <div>
                    <p class="text-xl font-bold text-indigo-600">{{ number_format($stats['monthly_savings'], 2) }}</p>
                    <p class="text-xs text-gray-500">{{ now()->format('F') }}</p>
                </div>
            </div>
        </div>

        <!-- Financial Pool & Alerts Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-red-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Total Penalties</p>
                <div>
                    <p class="text-xl font-bold text-red-600">{{ number_format($stats['total_penalties'], 2) }}</p>
                    <p class="text-xs text-gray-500">Active</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-orange-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Total Interest</p>
                <div>
                    <p class="text-xl font-bold text-orange-600">{{ number_format($stats['total_interests'], 2) }}</p>
                    <p class="text-xs text-gray-500">On Loans</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-pink-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Support Fund Available</p>
                <p class="text-xl font-bold text-pink-600">{{ number_format($stats['support_fund_available'], 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 {{ $stats['overdue_loans'] > 0 ? 'border-red-600' : 'border-green-500' }} flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Support Disbursed</p>
                <div>
                    <p class="text-xl font-bold {{ $stats['overdue_loans'] > 0 ? 'text-red-600' : 'text-green-600' }}">{{ number_format($stats['total_support_disbursed'], 2) }}</p>
                    <p class="text-xs text-gray-500">From Fund</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 {{ $stats['overdue_loans'] > 0 ? 'border-red-500' : 'border-gray-300' }} flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Overdue Loans</p>
                <p class="text-2xl font-bold {{ $stats['overdue_loans'] > 0 ? 'text-red-600' : 'text-gray-600' }}">{{ $stats['overdue_loans'] }}</p>
            </div>
        </div>

        <!-- Alert Section -->
        @if($overdue_loans->count() > 0)
            <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-6 mb-8">
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-red-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-lg font-bold text-red-900">⚠️ Overdue Loans Alert</h3>
                        <p class="text-red-700 mt-2">You have {{ $overdue_loans->count() }} loans past their due date. Please take action immediately.</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content (Left 2/3) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Upcoming Deadlines -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">📅 Upcoming Loan Deadlines</h2>
                            <p class="text-sm text-gray-600 mt-1">Within the next 30 days</p>
                        </div>
                        <a href="{{ route('group-admin.loans', $group) }}" class="text-blue-500 hover:text-blue-700 font-semibold text-sm">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Member</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Due Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Days Left</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($upcoming_loans as $loan)
                                    @php
                                        $daysLeft = now()->diffInDays($loan->maturity_date);
                                    @endphp
                                    <tr class="{{ $daysLeft <= 7 ? 'bg-yellow-50' : 'hover:bg-gray-50' }} transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <p class="font-semibold text-gray-900">{{ $loan->member->user->name }}</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                            {{ number_format($loan->principal_amount, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            {{ $loan->maturity_date->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $daysLeft <= 7 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                {{ $daysLeft }} days
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                            ✓ No loans due within the next 30 days
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Overdue Loans Table -->
                @if($overdue_loans->count() > 0)
                    <div class="bg-white rounded-lg shadow-sm border-l-4 border-red-500">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h2 class="text-xl font-bold text-red-900">⚠️ Overdue Loans</h2>
                            <p class="text-sm text-red-700 mt-1">These loans have passed their due date</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-red-600 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Member</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amount</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Was Due</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Days Overdue</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Remaining</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($overdue_loans as $loan)
                                        @php
                                            $daysOverdue = $loan->maturity_date->diffInDays(now());
                                        @endphp
                                        <tr class="bg-red-50 hover:bg-red-100 transition">
                                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-red-900">{{ $loan->member->user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ number_format($loan->principal_amount, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-700">{{ $loan->maturity_date->format('M d, Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-200 text-red-900">
                                                    {{ $daysOverdue }}+ days
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-900">
                                                {{ number_format($loan->remaining_balance, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- Members with Deadline Info -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">👥 Members List</h2>
                        <div class="flex gap-3">
                            <a href="{{ route('group-admin.record-member-loan', $group) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded-lg transition">+ Record Loan</a>
                            <a href="{{ route('group-admin.record-savings', $group) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold text-sm rounded-lg transition">+ Record Savings</a>
                            <a href="{{ route('group-admin.members', $group) }}" class="text-blue-500 hover:text-blue-700 font-semibold text-sm">View All</a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Role</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Active Loans</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Loan Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Savings</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($member_details as $detail)
                                    <tr class="{{ $detail['has_overdue'] ? 'bg-red-50' : 'hover:bg-gray-50' }} transition">
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold {{ $detail['has_overdue'] ? 'text-red-900' : 'text-gray-900' }}">
                                            {{ $detail['user']->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                                {{ ucfirst($detail['member']->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                            {{ $detail['active_loans'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                            {{ number_format($detail['total_loan_amount'], 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                            {{ number_format($detail['savings_balance'], 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($detail['has_overdue'])
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">⚠️ Overdue</span>
                                            @elseif($detail['upcoming_deadline'])
                                                @php $daysUntil = now()->diffInDays($detail['upcoming_deadline']); @endphp
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $daysUntil <= 7 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ $daysUntil }} days
                                                </span>
                                            @else
                                                <span class="text-gray-500 text-xs">Good</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                            No members found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Social Support Fund Section -->
                <div class="bg-white rounded-lg shadow-sm mt-6">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">❤️ Social Support Fund</h2>
                            <p class="text-sm text-gray-600 mt-1">Fund balance, contributions & disbursements</p>
                        </div>
                        <a href="{{ route('group-admin.social-supports', $group) }}" class="text-pink-500 hover:text-pink-700 font-semibold text-sm">View All</a>
                    </div>

                    <!-- Social Support Stats -->
                    @if(isset($socialSupportStats))
                    <div class="p-6">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg p-4 text-white">
                                <p class="text-xs font-medium text-emerald-100 mb-1">Fund Balance</p>
                                <p class="text-2xl font-bold">{{ number_format($socialSupportStats['fund_balance'], 0) }}</p>
                                <p class="text-xs text-emerald-100">RWF</p>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <p class="text-xs font-medium text-gray-500 mb-1">Total Contributions</p>
                                <p class="text-xl font-bold text-blue-600">{{ number_format($socialSupportStats['total_contributions'], 0) }}</p>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <p class="text-xs font-medium text-gray-500 mb-1">Total Disbursed</p>
                                <p class="text-xl font-bold text-red-600">{{ number_format($socialSupportStats['total_disbursed'], 0) }}</p>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <p class="text-xs font-medium text-gray-500 mb-1">Pending Requests</p>
                                <p class="text-xl font-bold text-yellow-600">{{ $socialSupportStats['pending_requests'] }}</p>
                            </div>
                        </div>

                        <!-- Monthly Breakdown -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- This Month Summary -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-3">📅 This Month</h4>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Contributions</span>
                                        <span class="font-semibold text-green-600">+{{ number_format($socialSupportStats['contributions_this_month'], 0) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Disbursements</span>
                                        <span class="font-semibold text-red-600">-{{ number_format($socialSupportStats['disbursed_this_month'], 0) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Support Type Breakdown -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-3">📊 By Type (Disbursed)</h4>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">☠️ Death</span>
                                        <span class="font-semibold">{{ number_format($socialSupportStats['death_amount'], 0) }} <span class="text-xs text-gray-400">({{ $socialSupportStats['death_count'] }})</span></span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">💍 Marriage</span>
                                        <span class="font-semibold">{{ number_format($socialSupportStats['marriage_amount'], 0) }} <span class="text-xs text-gray-400">({{ $socialSupportStats['marriage_count'] }})</span></span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">🏥 Sickness</span>
                                        <span class="font-semibold">{{ number_format($socialSupportStats['sickness_amount'], 0) }} <span class="text-xs text-gray-400">({{ $socialSupportStats['sickness_count'] }})</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly History Chart Data -->
                        @if(isset($socialSupportHistory) && $socialSupportHistory->count() > 0)
                        <div class="mt-6">
                            <h4 class="font-semibold text-gray-900 mb-3">📈 12-Month History</h4>
                            <div class="overflow-x-auto">
                                <table class="w-full text-xs">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="px-2 py-2 text-left font-semibold text-gray-600">Month</th>
                                            @foreach($socialSupportHistory as $month)
                                                <th class="px-2 py-2 text-center font-semibold text-gray-600">{{ $month['month_short'] }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-2 py-2 text-green-600 font-medium">In</td>
                                            @foreach($socialSupportHistory as $month)
                                                <td class="px-2 py-2 text-center {{ $month['contributions'] > 0 ? 'text-green-600 font-semibold' : 'text-gray-400' }}">
                                                    {{ $month['contributions'] > 0 ? number_format($month['contributions']/1000, 0).'K' : '-' }}
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-red-600 font-medium">Out</td>
                                            @foreach($socialSupportHistory as $month)
                                                <td class="px-2 py-2 text-center {{ $month['disbursements'] > 0 ? 'text-red-600 font-semibold' : 'text-gray-400' }}">
                                                    {{ $month['disbursements'] > 0 ? number_format($month['disbursements']/1000, 0).'K' : '-' }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        <!-- Recent Activity -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <!-- Recent Contributions -->
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <h4 class="font-semibold text-gray-900">Recent Contributions</h4>
                                    <a href="{{ route('group-admin.social-support-contributions', $group) }}" class="text-xs text-emerald-600 hover:text-emerald-800">View All →</a>
                                </div>
                                @if(isset($recentSocialContributions) && $recentSocialContributions->count() > 0)
                                <div class="space-y-2 max-h-48 overflow-y-auto">
                                    @foreach($recentSocialContributions as $contribution)
                                    <div class="flex items-center justify-between p-2 bg-green-50 rounded text-sm">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $contribution->member->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $contribution->created_at->format('M d') }}</p>
                                        </div>
                                        <span class="font-bold text-green-600">+{{ number_format($contribution->amount, 0) }}</span>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <p class="text-gray-500 text-sm text-center py-4">No contributions yet</p>
                                @endif
                            </div>

                            <!-- Recent Requests -->
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <h4 class="font-semibold text-gray-900">Recent Requests</h4>
                                    <a href="{{ route('group-admin.social-supports', $group) }}" class="text-xs text-pink-600 hover:text-pink-800">View All →</a>
                                </div>
                                @if(isset($recentSocialSupports) && $recentSocialSupports->count() > 0)
                                <div class="space-y-2 max-h-48 overflow-y-auto">
                                    @foreach($recentSocialSupports as $support)
                                    <div class="flex items-center justify-between p-2 rounded text-sm {{ $support->status === 'pending' ? 'bg-yellow-50' : ($support->status === 'disbursed' ? 'bg-green-50' : 'bg-gray-50') }}">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $support->member->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ App\Models\SocialSupport::getTypeLabel($support->type) }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="font-bold text-gray-900">{{ number_format($support->amount, 0) }}</span>
                                            <p class="text-xs {{ $support->status === 'pending' ? 'text-yellow-600' : ($support->status === 'disbursed' ? 'text-green-600' : 'text-gray-500') }}">
                                                {{ ucfirst($support->status) }}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <p class="text-gray-500 text-sm text-center py-4">No requests yet</p>
                                @endif
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="flex gap-3 mt-6 pt-4 border-t border-gray-200">
                            <a href="{{ route('group-admin.social-support-contributions', $group) }}" class="flex-1 px-4 py-2 bg-emerald-600 text-white text-center font-semibold rounded-lg hover:bg-emerald-700 transition text-sm">
                                + Add Contribution
                            </a>
                            <a href="{{ route('group-admin.social-supports', $group) }}" class="flex-1 px-4 py-2 bg-pink-600 text-white text-center font-semibold rounded-lg hover:bg-pink-700 transition text-sm">
                                + New Request
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar (Right 1/3) -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-t-4 border-indigo-500">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.5 13a3 3 0 01-.369-5.98 5 5 0 1111.753.102A4.5 4.5 0 2815.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" clip-rule="evenodd"></path>
                        </svg>
                        Management
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('group-admin.loan-requests', $group->id) }}" class="block px-4 py-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg text-yellow-600 font-medium transition text-sm">
                            ✉️ Loan Requests (Pending)
                        </a>
                        <a href="{{ route('group-admin.loans', $group) }}" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm">
                            📊 View All Loans
                        </a>
                        <a href="{{ route('group-admin.savings', $group) }}" class="block px-4 py-3 bg-green-50 hover:bg-green-100 rounded-lg text-green-600 font-medium transition text-sm">
                            💾 View All Savings
                        </a>
                        <a href="{{ route('group-admin.members', $group) }}" class="block px-4 py-3 bg-purple-50 hover:bg-purple-100 rounded-lg text-purple-600 font-medium transition text-sm">
                            👥 Manage Members
                        </a>
                        <a href="{{ route('group-admin.transactions', $group) }}" class="block px-4 py-3 bg-indigo-50 hover:bg-indigo-100 rounded-lg text-indigo-600 font-medium transition text-sm">
                            📋 View Transactions
                        </a>
                        <a href="{{ route('group-admin.penalties', $group) }}" class="block px-4 py-3 bg-red-50 hover:bg-red-100 rounded-lg text-red-600 font-medium transition text-sm">
                            ⚖️ Manage Penalties
                        </a>
                        <a href="{{ route('group-admin.social-supports', $group) }}" class="block px-4 py-3 bg-pink-50 hover:bg-pink-100 rounded-lg text-pink-600 font-medium transition text-sm">
                            ❤️ Manage Social Support
                        </a>
                        <a href="{{ route('group-admin.reports', $group) }}" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm">
                            📈 View Reports
                        </a>
                        <a href="{{ route('admin.groups.edit', $group) }}" class="block px-4 py-3 bg-orange-50 hover:bg-orange-100 rounded-lg text-orange-600 font-medium transition text-sm">
                            ⚙️ Edit Group Settings
                        </a>
                    </div>
                </div>

                <!-- Record Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-t-4 border-orange-500">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                        Record Transactions
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('group-admin.record-member-loan', $group) }}" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            💳 Record Member Loan
                        </a>
                        <a href="{{ route('group-admin.record-savings', $group) }}" class="block px-4 py-3 bg-green-50 hover:bg-green-100 rounded-lg text-green-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 5a2 2 0 012-2h6a2 2 0 012 2v9h2a1 1 0 110 2h-2v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2H3a1 1 0 110-2h2V5zm8 1v7H7V6h6z"></path>
                            </svg>
                            💰 Record Savings
                        </a>
                        <a href="{{ route('group-admin.record-interest', $group) }}" class="block px-4 py-3 bg-red-50 hover:bg-red-100 rounded-lg text-red-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            📈 Record Loan Interest
                        </a>
                    </div>
                </div>

                <!-- Support Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-t-4 border-pink-500">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                        </svg>
                        Social Support Actions
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('group-admin.social-supports', $group) }}" class="block px-4 py-3 bg-pink-50 hover:bg-pink-100 rounded-lg text-pink-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            📋 View All Requests
                        </a>
                        <button onclick="showCreateSocialSupportModal()" class="w-full px-4 py-3 bg-purple-50 hover:bg-purple-100 rounded-lg text-purple-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            ➕ New Support Request
                        </button>
                        <a href="{{ route('group-admin.social-supports', $group) }}?status=pending" class="block px-4 py-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg text-yellow-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"></path>
                            </svg>
                            ⏳ Pending
                        </a>
                        <a href="{{ route('group-admin.social-supports', $group) }}?status=approved" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            ✓ Approved
                        </a>
                        <a href="{{ route('group-admin.social-supports', $group) }}?status=disbursed" class="block px-4 py-3 bg-green-50 hover:bg-green-100 rounded-lg text-green-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            💳 Disbursed
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Savings</h3>
                    <div class="space-y-3 max-h-80 overflow-y-auto">
                        @forelse($recent_savings as $saving)
                            <div class="border-l-4 border-green-500 pl-3 py-2">
                                <p class="font-semibold text-gray-900 text-sm">{{ $saving->member->user->name }}</p>
                                <p class="text-xs text-gray-600">Balance: {{ number_format($saving->current_balance, 2) }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $saving->updated_at->diffForHumans() }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4 text-sm">No savings recorded yet</p>
                        @endforelse
                    </div>
                </div>

                <!-- Group Info -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Group Information</h3>
                        <a href="{{ route('admin.groups.edit', $group) }}" class="text-orange-500 hover:text-orange-700 font-semibold text-sm">
                            <svg class="w-4 h-4 inline" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                            Edit
                        </a>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Name</p>
                            <p class="font-semibold text-gray-900 mt-1">{{ $group->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Status</p>
                            <span class="inline-flex mt-1 px-2 py-1 rounded-full text-xs font-bold {{ $group->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $group->status === 'active' ? 'Active' : ucfirst($group->status) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Created</p>
                            <p class="text-gray-600 mt-1">{{ $group->created_at->format('M d, Y') }}</p>
                        </div>
                        @if($group->description)
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Description</p>
                            <p class="text-gray-600 mt-1 text-xs">{{ $group->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Create Social Support Modal -->
<div id="quickCreateSocialSupportModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 max-h-screen overflow-y-auto">
        <div class="bg-pink-600 text-white p-6">
            <h2 class="text-xl font-bold">New Support Request</h2>
        </div>
        <form method="POST" action="{{ route('group-admin.social-supports.store', $group) }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Member *</label>
                <select name="member_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">Select member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Support Type *</label>
                <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">Select type</option>
                    <option value="death">☠️ Death of Loved One</option>
                    <option value="marriage">💍 Marriage</option>
                    <option value="sickness">🏥 Sickness/Medical</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Amount *</label>
                <input
                    type="number"
                    name="amount"
                    step="0.01"
                    min="0"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    placeholder="0.00"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea
                    name="description"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    rows="3"
                    placeholder="Provide description..."
                ></textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideCreateSocialSupportModal()"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-pink-600 text-white font-semibold rounded-lg hover:bg-pink-700 transition"
                >
                    Submit Request
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showCreateSocialSupportModal() {
        document.getElementById('quickCreateSocialSupportModal').classList.remove('hidden');
    }

    function hideCreateSocialSupportModal() {
        document.getElementById('quickCreateSocialSupportModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('quickCreateSocialSupportModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });

    // Group switching function
    function switchGroup(groupId) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("group-admin.switch-group", ":groupId") }}'.replace(':groupId', groupId);

        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_token';
            input.value = csrfToken.getAttribute('content');
            form.appendChild(input);
        }

        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    }

    // Initialize all dropdowns and interactive elements
    document.addEventListener('DOMContentLoaded', function() {
        // Quick Actions Dropdown
        const quickActionsBtn = document.getElementById('quickActionsBtn');
        const quickActionsMenu = document.getElementById('quickActionsMenu');

        if (quickActionsBtn && quickActionsMenu) {
            quickActionsBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                quickActionsMenu.classList.toggle('hidden');
            });
        }

        // Group Admin Dashboard Switcher
        const gaSwitcherBtn = document.getElementById('ga-switcher-btn');
        const gaSwitcherMenu = document.getElementById('ga-switcher-menu');

        if (gaSwitcherBtn && gaSwitcherMenu) {
            gaSwitcherBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                gaSwitcherMenu.classList.toggle('hidden');
            });
        }

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function(e) {
                e.preventDefault();
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Close all dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            // Quick Actions
            if (quickActionsMenu && !quickActionsMenu.contains(event.target) && !quickActionsBtn?.contains(event.target)) {
                quickActionsMenu.classList.add('hidden');
            }
            // Switcher Menu
            if (gaSwitcherMenu && !gaSwitcherMenu.contains(event.target) && !gaSwitcherBtn?.contains(event.target)) {
                gaSwitcherMenu.classList.add('hidden');
            }
        });

        // Close dropdowns on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                quickActionsMenu?.classList.add('hidden');
                gaSwitcherMenu?.classList.add('hidden');
                mobileMenu?.classList.add('hidden');
            }
        });

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
</script>
@endsection
