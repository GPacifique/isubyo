@extends('layouts.guest')

@section('title', 'Documentation - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Documentation</h1>
            <p class="text-green-100 mt-2">Comprehensive guides and tutorials for isubyo</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Documentation Sections -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <!-- User Guide -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">User Guide</h2>
                <p class="text-gray-600 mb-6">Complete guide for end users covering all features and functionality.</p>
                <ul class="space-y-2 mb-6">
                    <li><a href="{{ route('pages.support.user-guide') }}#account-setup" class="text-green-600 hover:text-green-700">Setting up your account</a></li>
                    <li><a href="{{ route('pages.support.user-guide') }}#creating-groups" class="text-green-600 hover:text-green-700">Creating and managing groups</a></li>
                    <li><a href="{{ route('pages.support.user-guide') }}#savings" class="text-green-600 hover:text-green-700">Savings account management</a></li>
                    <li><a href="{{ route('pages.support.user-guide') }}#loans" class="text-green-600 hover:text-green-700">Loan requests and repayment</a></li>
                    <li><a href="{{ route('pages.support.user-guide') }}#mobile" class="text-green-600 hover:text-green-700">Using the mobile app</a></li>
                </ul>
                <a href="{{ route('pages.support.user-guide') }}" class="text-green-600 font-semibold hover:text-green-700">Read Full Guide →</a>
            </div>

            <!-- Administrator Guide -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Administrator Guide</h2>
                <p class="text-gray-600 mb-6">Guide for group administrators and system administrators.</p>
                <ul class="space-y-2 mb-6">
                    <li><a href="{{ route('pages.support.admin-guide') }}#group-admin" class="text-green-600 hover:text-green-700">Group administration</a></li>
                    <li><a href="{{ route('pages.support.admin-guide') }}#member-mgmt" class="text-green-600 hover:text-green-700">Member management</a></li>
                    <li><a href="{{ route('pages.support.admin-guide') }}#loan-approval" class="text-green-600 hover:text-green-700">Loan approval workflows</a></li>
                    <li><a href="{{ route('pages.support.admin-guide') }}#reports" class="text-green-600 hover:text-green-700">Generating reports</a></li>
                    <li><a href="{{ route('pages.support.admin-guide') }}#settings" class="text-green-600 hover:text-green-700">System settings</a></li>
                </ul>
                <a href="{{ route('pages.support.admin-guide') }}" class="text-green-600 font-semibold hover:text-green-700">Read Full Guide →</a>
            </div>

            <!-- API Documentation -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">API Reference</h2>
                <p class="text-gray-600 mb-6">Technical documentation for developers integrating with isubyo.</p>
                <ul class="space-y-2 mb-6">
                    <li><a href="#" class="text-green-600 hover:text-green-700">Authentication</a></li>
                    <li><a href="#" class="text-green-600 hover:text-green-700">REST API endpoints</a></li>
                    <li><a href="#" class="text-green-600 hover:text-green-700">Webhooks</a></li>
                    <li><a href="#" class="text-green-600 hover:text-green-700">Rate limiting</a></li>
                    <li><a href="#" class="text-green-600 hover:text-green-700">Code examples</a></li>
                </ul>
                <a href="{{ route('pages.support.api-docs') }}" class="text-green-600 font-semibold hover:text-green-700">View API Docs →</a>
            </div>

            <!-- FAQ -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600 mb-6">Quick answers to common questions about isubyo.</p>
                <ul class="space-y-2 mb-6">
                    <li><a href="{{ route('pages.support.faq') }}" class="text-green-600 hover:text-green-700">Pricing and billing</a></li>
                    <li><a href="{{ route('pages.support.faq') }}" class="text-green-600 hover:text-green-700">Security and privacy</a></li>
                    <li><a href="{{ route('pages.support.faq') }}" class="text-green-600 hover:text-green-700">Data retention</a></li>
                    <li><a href="{{ route('pages.support.faq') }}" class="text-green-600 hover:text-green-700">Technical requirements</a></li>
                    <li><a href="{{ route('pages.support.faq') }}" class="text-green-600 hover:text-green-700">Compliance</a></li>
                </ul>
                <a href="{{ route('pages.support.faq') }}" class="text-green-600 font-semibold hover:text-green-700">View All FAQs →</a>
            </div>
        </div>

        <!-- Version Info -->
        <div class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Latest Version</h2>
            <p class="text-gray-600 mb-3">Current Version: <span class="font-semibold text-gray-900">2.5.0</span></p>
            <p class="text-gray-600">Last Updated: December 27, 2025</p>
            <a href="{{ route('pages.support.changelog') }}" class="text-green-600 font-semibold hover:text-green-700 mt-4 inline-block">View Changelog →</a>
        </div>
    </div>
</div>
@endsection
