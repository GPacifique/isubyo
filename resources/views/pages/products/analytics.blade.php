@extends('layouts.guest')

@section('title', 'Reports & Analytics - isubyo Products')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-600 to-orange-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Reports & Analytics</h1>
            <p class="text-yellow-100 mt-2">Deep insights into your group's financial health</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Hero Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Make Data-Driven Decisions</h2>
                <p class="text-gray-600 mb-4">
                    Comprehensive reports and analytics help group leaders understand financial trends,
                    identify patterns, and make informed decisions.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Savings and loan analytics</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Member contribution reports</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Custom date range filtering</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Export reports as PDF/Excel</span>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-yellow-100 to-orange-100 rounded-lg h-80"></div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Available Reports</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">💰 Financial Summary</h3>
                    <p class="text-gray-600">Overview of total savings, disbursed loans, total interest earned, and outstanding balances.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">👥 Member Analytics</h3>
                    <p class="text-gray-600">Analyze individual member contributions, loan history, and payment compliance.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">📊 Transaction Reports</h3>
                    <p class="text-gray-600">Detailed logs of all deposits, withdrawals, payments, and interest distributions.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">📈 Growth Analytics</h3>
                    <p class="text-gray-600">Visualize savings growth trends, loan disbursement patterns, and member engagement.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Unlock valuable insights</h2>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-yellow-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Try Analytics Free
            </a>
        </div>
    </div>
</div>
@endsection
