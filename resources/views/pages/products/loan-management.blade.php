@extends('layouts.guest')

@section('title', 'Loan Management - isubyo Products')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Loan Management</h1>
            <p class="text-indigo-100 mt-2">Streamline loan requests, approvals, and repayments</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Hero Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Efficient Loan Lifecycle Management</h2>
                <p class="text-gray-600 mb-4">
                    Manage the complete loan lifecycle from request to repayment with transparent workflows,
                    automated approvals, and comprehensive tracking.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Loan request submission and tracking</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Approval workflow with notifications</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Automated repayment schedules</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-indigo-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Payment tracking and reminders</span>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-lg h-80"></div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Request Management</h3>
                    <p class="text-gray-600">Members submit loan requests with specified amounts and terms. Automatic calculation of interest and payment schedules.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Approval Workflow</h3>
                    <p class="text-gray-600">Group admins review and approve/reject requests. Transparent decision reasons. Email notifications at each step.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Repayment Tracking</h3>
                    <p class="text-gray-600">Record payments easily. Track outstanding balance. Send automatic payment reminders. Generate repayment reports.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Simplify your loan management</h2>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-indigo-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Start Your Free Trial
            </a>
        </div>
    </div>
</div>
@endsection
