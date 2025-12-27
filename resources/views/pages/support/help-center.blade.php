@extends('layouts.guest')

@section('title', 'Help Center - isubyo Support')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Help Center</h1>
            <p class="text-green-100 mt-2">Find answers to common questions and get support</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Search Box -->
        <div class="mb-12">
            <input type="search" placeholder="Search help articles..." class="w-full px-6 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <!-- Help Categories -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <a href="#" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Getting Started</h3>
                <p class="text-gray-600 text-sm mb-4">New to isubyo? Learn the basics and get up and running quickly.</p>
                <span class="text-green-600 font-semibold text-sm">View Articles →</span>
            </a>

            <a href="#" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Group Management</h3>
                <p class="text-gray-600 text-sm mb-4">Create groups, manage members, and set up group settings.</p>
                <span class="text-green-600 font-semibold text-sm">View Articles →</span>
            </a>

            <a href="#" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Savings & Loans</h3>
                <p class="text-gray-600 text-sm mb-4">Understand savings accounts, loans, and how to manage them.</p>
                <span class="text-green-600 font-semibold text-sm">View Articles →</span>
            </a>

            <a href="#" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Account & Security</h3>
                <p class="text-gray-600 text-sm mb-4">Manage your account, passwords, and security settings.</p>
                <span class="text-green-600 font-semibold text-sm">View Articles →</span>
            </a>

            <a href="#" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Reports & Analytics</h3>
                <p class="text-gray-600 text-sm mb-4">Generate and understand financial reports and analytics.</p>
                <span class="text-green-600 font-semibold text-sm">View Articles →</span>
            </a>

            <a href="#" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Troubleshooting</h3>
                <p class="text-gray-600 text-sm mb-4">Solutions to common issues and problems.</p>
                <span class="text-green-600 font-semibold text-sm">View Articles →</span>
            </a>
        </div>

        <!-- Popular Articles -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Popular Articles</h2>
            <ul class="space-y-4">
                <li>
                    <a href="#" class="text-green-600 font-semibold hover:text-green-700">How do I create a new group?</a>
                    <p class="text-gray-600 text-sm mt-1">Step-by-step guide to setting up your first group.</p>
                </li>
                <li>
                    <a href="#" class="text-green-600 font-semibold hover:text-green-700">How do I request a loan?</a>
                    <p class="text-gray-600 text-sm mt-1">Learn how to submit a loan request and track its status.</p>
                </li>
                <li>
                    <a href="#" class="text-green-600 font-semibold hover:text-green-700">What payment methods are supported?</a>
                    <p class="text-gray-600 text-sm mt-1">Overview of available payment methods and how to use them.</p>
                </li>
                <li>
                    <a href="#" class="text-green-600 font-semibold hover:text-green-700">How secure is my data?</a>
                    <p class="text-gray-600 text-sm mt-1">Learn about our security measures and data protection.</p>
                </li>
            </ul>
        </div>

        <!-- Support CTA -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Can't find what you're looking for?</h2>
            <p class="text-green-100 mb-6">Contact our support team for personalized assistance</p>
            <a href="{{ route('pages.contact') }}" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Contact Support
            </a>
        </div>
    </div>
</div>
@endsection
