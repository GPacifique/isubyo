@extends('layouts.guest')

@section('title', 'Group Savings - isubyo Products')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Group Savings</h1>
            <p class="text-green-100 mt-2">Manage collective savings efficiently and transparently</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Hero Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Build Financial Discipline Together</h2>
                <p class="text-gray-600 mb-4">
                    Group Savings is designed to help communities save money collectively while maintaining complete transparency
                    and accountability.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Real-time balance tracking</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Automated transaction records</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Email notifications for deposits</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Generate financial reports</span>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-green-100 to-blue-100 rounded-lg h-80"></div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Flexible Contribution</h3>
                    <p class="text-gray-600">Set minimum and maximum contribution amounts. Support both fixed and variable contribution schedules.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Interest Calculation</h3>
                    <p class="text-gray-600">Automatically calculate and distribute interest on group savings. Support multiple interest rate models.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Withdrawal Management</h3>
                    <p class="text-gray-600">Control withdrawal rules. Require approvals for large withdrawals. Maintain audit trails.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Ready to start group savings?</h2>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Get Started Today
            </a>
        </div>
    </div>
</div>
@endsection
