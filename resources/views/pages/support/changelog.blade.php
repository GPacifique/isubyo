@extends('layouts.guest')

@section('title', 'Changelog - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Changelog</h1>
            <p class="text-green-100 mt-2">Version history and release notes</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Latest Version -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Version 2.5.0</h2>
                <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full font-semibold text-sm">Latest</span>
            </div>
            <p class="text-gray-600 mb-4">Released: December 27, 2025</p>
            <h3 class="font-semibold text-gray-900 mb-3">✨ New Features:</h3>
            <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                <li>Enhanced analytics dashboard with real-time updates</li>
                <li>Improved member invitation system with bulk import</li>
                <li>Mobile app offline mode with automatic sync</li>
                <li>New biometric authentication options</li>
                <li>Advanced loan management workflows</li>
            </ul>
            <h3 class="font-semibold text-gray-900 mb-3">🐛 Bug Fixes:</h3>
            <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                <li>Fixed transaction filtering in analytics</li>
                <li>Corrected interest calculation for certain loan types</li>
                <li>Improved email notification reliability</li>
                <li>Fixed mobile app crash on Android 10</li>
            </ul>
            <h3 class="font-semibold text-gray-900 mb-3">📈 Improvements:</h3>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li>Faster report generation</li>
                <li>Improved UI responsiveness</li>
                <li>Better error messages for users</li>
                <li>Enhanced security protocols</li>
            </ul>
        </div>

        <!-- Previous Versions -->
        <div class="space-y-6">
            <!-- v2.4.0 -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Version 2.4.0</h2>
                <p class="text-gray-600 mb-4">Released: October 15, 2025</p>
                <h3 class="font-semibold text-gray-900 mb-3">✨ New Features:</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Role-based access control (RBAC)</li>
                    <li>Custom report builder for admins</li>
                    <li>SMS notifications for important updates</li>
                    <li>Improved group dashboard customization</li>
                </ul>
            </div>

            <!-- v2.3.0 -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Version 2.3.0</h2>
                <p class="text-gray-600 mb-4">Released: August 20, 2025</p>
                <h3 class="font-semibold text-gray-900 mb-3">✨ New Features:</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Multi-group member support</li>
                    <li>Advanced transaction filters</li>
                    <li>Group audit logs for transparency</li>
                    <li>Improved mobile app performance</li>
                </ul>
            </div>

            <!-- v2.2.0 -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Version 2.2.0</h2>
                <p class="text-gray-600 mb-4">Released: June 10, 2025</p>
                <h3 class="font-semibold text-gray-900 mb-3">✨ New Features:</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>API access for developers</li>
                    <li>Webhook integration support</li>
                    <li>Email campaign management</li>
                    <li>Enhanced security with 2FA</li>
                </ul>
            </div>

            <!-- v2.1.0 -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Version 2.1.0</h2>
                <p class="text-gray-600 mb-4">Released: April 5, 2025</p>
                <h3 class="font-semibold text-gray-900 mb-3">✨ New Features:</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Loan repayment schedules</li>
                    <li>Automated payment reminders</li>
                    <li>Group member analytics</li>
                    <li>Improved transaction recording</li>
                </ul>
            </div>

            <!-- v2.0.0 -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Version 2.0.0 (Initial Release)</h2>
                <p class="text-gray-600 mb-4">Released: January 1, 2025</p>
                <h3 class="font-semibold text-gray-900 mb-3">Initial Features:</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Group creation and management</li>
                    <li>Savings account management</li>
                    <li>Loan request and approval system</li>
                    <li>Basic analytics and reports</li>
                    <li>Member dashboard</li>
                    <li>Mobile app (iOS and Android)</li>
                </ul>
            </div>
        </div>

        <!-- Back Link -->
        <div class="mt-12">
            <a href="{{ route('pages.support.documentation') }}" class="text-green-600 font-semibold hover:text-green-700">← Back to Documentation</a>
        </div>
    </div>
</div>
@endsection
