@extends('layouts.guest')

@section('title', 'Features - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Platform Features</h1>
            <p class="text-green-100 mt-2">Everything you need to manage group finances effectively</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Feature Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- Group Management -->
            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 20H9m8 0a3 3 0 01-6 0m6 0H9m6 0a3 3 0 00-5.856-1.487M9 20H4v-2a3 3 0 015.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Group Management</h3>
                <p class="text-gray-600">
                    Create and manage multiple groups with detailed member profiles and roles.
                </p>
            </div>

            <!-- Savings Management -->
            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Group Savings</h3>
                <p class="text-gray-600">
                    Track collective savings with automatic balance calculations and history.
                </p>
            </div>

            <!-- Loan Management -->
            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Loan Management</h3>
                <p class="text-gray-600">
                    Request, approve, and track loans with automated repayment schedules.
                </p>
            </div>

            <!-- Real-time Analytics -->
            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Analytics & Reports</h3>
                <p class="text-gray-600">
                    Comprehensive reports and analytics for financial insights and decision-making.
                </p>
            </div>

            <!-- Notifications -->
            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Notifications</h3>
                <p class="text-gray-600">
                    Real-time email and in-app notifications for all financial activities.
                </p>
            </div>

            <!-- Security -->
            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Bank-Level Security</h3>
                <p class="text-gray-600">
                    Encryption and compliance measures to protect all financial data.
                </p>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Ready to experience all features?</h2>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Start Your Free Trial
            </a>
        </div>
    </div>
</div>
@endsection
