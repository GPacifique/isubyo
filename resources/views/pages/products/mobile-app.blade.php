@extends('layouts.guest')

@section('title', 'Mobile App - isubyo Products')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-pink-600 to-red-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Mobile App</h1>
            <p class="text-pink-100 mt-2">Manage finances on the go, anytime, anywhere</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Hero Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Financial Management in Your Pocket</h2>
                <p class="text-gray-600 mb-4">
                    The isubyo mobile app brings the power of our platform to your smartphone,
                    allowing you to manage savings, loans, and transactions on the go.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-pink-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">View savings and loan balances</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-pink-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Record transactions instantly</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-pink-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Get push notifications</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-pink-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Biometric authentication</span>
                    </li>
                </ul>
                <div class="flex gap-4">
                    <a href="#" class="inline-block">
                        <img src="https://via.placeholder.com/150x45?text=App+Store" alt="Download on App Store" class="h-12">
                    </a>
                    <a href="#" class="inline-block">
                        <img src="https://via.placeholder.com/150x45?text=Google+Play" alt="Get it on Google Play" class="h-12">
                    </a>
                </div>
            </div>
            <div class="bg-gradient-to-br from-pink-100 to-red-100 rounded-lg h-80"></div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">App Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Offline Mode</h3>
                    <p class="text-gray-600">View your data and perform transactions even without internet connectivity. Syncs automatically when connected.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Push Notifications</h3>
                    <p class="text-gray-600">Receive instant notifications for savings deposits, loan approvals, payment reminders, and group activities.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Secure Authentication</h3>
                    <p class="text-gray-600">Fingerprint and face recognition for quick and secure access to your financial information.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Transaction History</h3>
                    <p class="text-gray-600">Easy-to-browse transaction history with filtering and search capabilities for specific transactions.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-pink-600 to-red-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Download the isubyo Mobile App</h2>
            <p class="text-pink-100 mb-6">Available on iOS and Android</p>
            <div class="flex justify-center gap-4">
                <a href="#" class="px-6 py-2 bg-white text-pink-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                    App Store
                </a>
                <a href="#" class="px-6 py-2 bg-white text-pink-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                    Google Play
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
