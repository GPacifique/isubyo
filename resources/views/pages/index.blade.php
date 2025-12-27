@extends('layouts.guest')

@section('title', 'Home - isubyo Financial Management')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white">
        <div class="max-w-7xl mx-auto py-20 px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Welcome to isubyo</h1>
            <p class="text-xl text-gray-100 mb-8">Empower Your Community Through Smart Financial Management</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="px-8 py-3 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                    Get Started
                </a>
                <a href="{{ route('pages.about') }}" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-green-600 transition inline-block">
                    Learn More
                </a>
            </div>
        </div>
    </div>

    <!-- Features Overview -->
    <div class="max-w-7xl mx-auto py-16 px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Why Choose isubyo?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Easy to Use</h3>
                <p class="text-gray-600">Intuitive interface designed for seamless financial management and group coordination.</p>
            </div>

            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Secure & Safe</h3>
                <p class="text-gray-600">Bank-level security with encryption and compliance to protect your financial data.</p>
            </div>

            <div class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Real-Time Analytics</h3>
                <p class="text-gray-600">Track savings, loans, and group finances with detailed analytics and reports.</p>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Transform Your Community's Finance?</h2>
            <p class="text-lg text-gray-100 mb-8">Join thousands of groups already managing their finances transparently with isubyo.</p>
            <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Start Free Trial
            </a>
        </div>
    </div>
</div>
@endsection
