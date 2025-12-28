@extends('layouts.guest')

@section('title', 'Member Dashboard - isubyo Products')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Member Dashboard</h1>
            <p class="text-blue-100 mt-2">Personal financial hub for group members</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Hero Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Your Personal Financial Center</h2>
                <p class="text-gray-600 mb-4">
                    Each member gets a personalized dashboard to view their savings, loans, and transaction history across all groups they belong to.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">View all your savings accounts</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Monitor active loans and payments</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Track transaction history</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Receive payment notifications</span>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-blue-100 to-cyan-100 rounded-lg h-80 p-6 flex flex-col items-center justify-center">
                <svg class="w-32 h-32 text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <p class="text-blue-600 font-medium">Dashboard Screenshot</p>
            </div>
        </div>

        <!-- Screenshot Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Dashboard Preview</h2>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-4 flex items-center">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                    <span class="ml-4 text-white font-semibold text-sm">member.isubyo.com/dashboard</span>
                </div>
                <div class="p-8 bg-gray-50">
                    <!-- Dashboard Header -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Welcome, Jean Pierre</h3>
                        <p class="text-gray-600">December 27, 2025</p>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Total Savings</p>
                            <p class="text-2xl font-bold text-green-600 mt-2">550,000 RWF</p>
                            <p class="text-xs text-gray-500 mt-1">+2.5% this month</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Active Loans</p>
                            <p class="text-2xl font-bold text-blue-600 mt-2">3</p>
                            <p class="text-xs text-gray-500 mt-1">200,000 RWF outstanding</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Groups</p>
                            <p class="text-2xl font-bold text-purple-600 mt-2">5</p>
                            <p class="text-xs text-gray-500 mt-1">All groups active</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Next Payment</p>
                            <p class="text-2xl font-bold text-amber-600 mt-2">Dec 31</p>
                            <p class="text-xs text-gray-500 mt-1">65,000 RWF due</p>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-4">Savings Trend</h4>
                            <div class="h-32 bg-gradient-to-t from-blue-100 to-blue-50 rounded flex items-end justify-around px-4">
                                <div class="w-8 h-16 bg-blue-500 rounded-t"></div>
                                <div class="w-8 h-20 bg-blue-500 rounded-t"></div>
                                <div class="w-8 h-24 bg-blue-500 rounded-t"></div>
                                <div class="w-8 h-28 bg-blue-500 rounded-t"></div>
                                <div class="w-8 h-32 bg-green-500 rounded-t"></div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-4">Transaction Activity</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 text-sm">Savings Deposit</span>
                                    <span class="text-green-600 font-semibold">+₦5,000</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 text-sm">Loan Payment</span>
                                    <span class="text-red-600 font-semibold">-₦3,500</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 text-sm">Interest Earned</span>
                                    <span class="text-green-600 font-semibold">+1,080 RWF</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 text-sm">Group Contribution</span>
                                    <span class="text-red-600 font-semibold">-8,800 RWF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Dashboard Components</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Account Overview</h3>
                    <p class="text-gray-600">Quick summary of total savings, active loans, and upcoming payments across all your groups.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Transaction History</h3>
                    <p class="text-gray-600">Complete record of all deposits, withdrawals, loan payments, and other transactions.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Personal Reports</h3>
                    <p class="text-gray-600">Generate and download personal financial reports for your own records or analysis.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Take control of your finances</h2>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Start Today
            </a>
        </div>
    </div>
</div>
@endsection
