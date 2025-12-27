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
            <div class="bg-gradient-to-br from-blue-100 to-cyan-100 rounded-lg h-80"></div>
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
