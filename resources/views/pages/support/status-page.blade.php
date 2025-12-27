@extends('layouts.guest')

@section('title', 'Status Page - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">System Status</h1>
            <p class="text-green-100 mt-2">Real-time status of isubyo services</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Overall Status -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Overall Status</h2>
                    <p class="text-gray-600 mt-2">All systems operational</p>
                </div>
                <div class="text-center">
                    <div class="inline-block px-4 py-2 bg-green-100 text-green-800 rounded-full font-semibold">
                        ✓ Operational
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Status -->
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Service Status</h2>
        <div class="space-y-4 mb-8">
            <!-- API -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-gray-900">API Services</h3>
                    <p class="text-gray-600 text-sm">Core API and endpoints</p>
                </div>
                <div class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                    ✓ Operational
                </div>
            </div>

            <!-- Web Platform -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-gray-900">Web Platform</h3>
                    <p class="text-gray-600 text-sm">Dashboard and web application</p>
                </div>
                <div class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                    ✓ Operational
                </div>
            </div>

            <!-- Mobile Apps -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-gray-900">Mobile Apps</h3>
                    <p class="text-gray-600 text-sm">iOS and Android applications</p>
                </div>
                <div class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                    ✓ Operational
                </div>
            </div>

            <!-- Database -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-gray-900">Database</h3>
                    <p class="text-gray-600 text-sm">Data storage and retrieval</p>
                </div>
                <div class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                    ✓ Operational
                </div>
            </div>

            <!-- Email Service -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-gray-900">Email Notifications</h3>
                    <p class="text-gray-600 text-sm">Email delivery system</p>
                </div>
                <div class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                    ✓ Operational
                </div>
            </div>
        </div>

        <!-- Incidents -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Incidents</h2>
            <p class="text-gray-600 text-center py-8">No recent incidents. All systems running smoothly.</p>
        </div>

        <!-- Maintenance Schedule -->
        <div class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Scheduled Maintenance</h2>
            <p class="text-gray-600 text-center py-8">No scheduled maintenance at this time.</p>
        </div>

        <!-- Subscribe -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center mt-8">
            <h2 class="text-2xl font-bold mb-4">Stay Updated</h2>
            <p class="text-green-100 mb-6">Subscribe to status updates and incident notifications</p>
            <div class="flex gap-2 max-w-md mx-auto">
                <input type="email" placeholder="Your email" class="flex-grow px-4 py-2 rounded-lg text-gray-900 focus:outline-none">
                <button type="submit" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition">
                    Subscribe
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
