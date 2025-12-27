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
            <div class="bg-gradient-to-br from-indigo-100 to-purple-100 rounded-lg h-80 p-6 flex flex-col items-center justify-center">
                <svg class="w-32 h-32 text-indigo-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-indigo-600 font-medium">Loan Management Dashboard</p>
            </div>
        </div>

        <!-- Screenshot Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Loan Management Interface</h2>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 flex items-center">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                    <span class="ml-4 text-white font-semibold text-sm">admin.isubyo.com/loans</span>
                </div>
                <div class="p-8 bg-gray-50">
                    <!-- Dashboard Header -->
                    <div class="mb-8 flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Loan Management</h3>
                            <p class="text-gray-600">Group: Women Empowerment Initiative</p>
                        </div>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm font-semibold">+ New Loan Request</button>
                    </div>

                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Total Disbursed</p>
                            <p class="text-2xl font-bold text-indigo-600 mt-2">₦850,000</p>
                            <p class="text-xs text-gray-500 mt-1">12 active loans</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Outstanding Balance</p>
                            <p class="text-2xl font-bold text-amber-600 mt-2">₦385,400</p>
                            <p class="text-xs text-gray-500 mt-1">45% repaid</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Pending Approval</p>
                            <p class="text-2xl font-bold text-purple-600 mt-2">3</p>
                            <p class="text-xs text-gray-500 mt-1">₦125,000 total</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                            <p class="text-gray-500 text-sm font-medium">Default Rate</p>
                            <p class="text-2xl font-bold text-green-600 mt-2">0%</p>
                            <p class="text-xs text-gray-500 mt-1">Perfect track record</p>
                        </div>
                    </div>

                    <!-- Loan Requests Table -->
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h4 class="font-semibold text-gray-900">Recent Loan Requests</h4>
                        </div>
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Member</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Amount</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Term</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Status</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Amina Johnson</td>
                                    <td class="px-6 py-4 text-gray-700">₦50,000</td>
                                    <td class="px-6 py-4 text-gray-700">12 months</td>
                                    <td class="px-6 py-4"><span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Pending</span></td>
                                    <td class="px-6 py-4"><button class="text-indigo-600 hover:text-indigo-700 font-semibold text-xs">Review</button></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Grace Okafor</td>
                                    <td class="px-6 py-4 text-gray-700">₦75,000</td>
                                    <td class="px-6 py-4 text-gray-700">18 months</td>
                                    <td class="px-6 py-4"><span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Approved</span></td>
                                    <td class="px-6 py-4"><button class="text-indigo-600 hover:text-indigo-700 font-semibold text-xs">View</button></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Zainab Hassan</td>
                                    <td class="px-6 py-4 text-gray-700">₦40,000</td>
                                    <td class="px-6 py-4 text-gray-700">12 months</td>
                                    <td class="px-6 py-4"><span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Active</span></td>
                                    <td class="px-6 py-4"><button class="text-indigo-600 hover:text-indigo-700 font-semibold text-xs">Manage</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
