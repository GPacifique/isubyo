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
            <div class="bg-gradient-to-br from-pink-100 to-red-100 rounded-lg h-80 p-6 flex flex-col items-center justify-center">
                <svg class="w-32 h-32 text-pink-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <p class="text-pink-600 font-medium">Mobile App Screens</p>
            </div>
        </div>

        <!-- Screenshot Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">App Screenshots</h2>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-pink-600 to-red-600 px-6 py-4 flex items-center">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                    <span class="ml-4 text-white font-semibold text-sm">isubyo mobile app</span>
                </div>
                <div class="p-8 bg-gray-50">
                    <!-- Phone Grid Display -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Home Screen -->
                        <div class="bg-white rounded-3xl shadow-xl border-8 border-gray-900 overflow-hidden" style="aspect-ratio: 9/18">
                            <div class="bg-gradient-to-b from-pink-600 to-red-600 text-white p-6 text-center">
                                <p class="text-xs font-semibold mt-8">09:41</p>
                                <h3 class="text-lg font-bold mt-6">Dashboard</h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <div class="bg-gradient-to-br from-pink-50 to-red-50 rounded-lg p-4 border border-pink-200">
                                    <p class="text-xs text-gray-600">Total Balance</p>
                                    <p class="text-2xl font-bold text-pink-600 mt-1">376,000 RWF</p>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="bg-gray-100 rounded-lg p-3">
                                        <p class="text-xs text-gray-600">Savings</p>
                                        <p class="text-lg font-bold text-gray-900 mt-1">264K RWF</p>
                                    </div>
                                    <div class="bg-gray-100 rounded-lg p-3">
                                        <p class="text-xs text-gray-600">Loans</p>
                                        <p class="text-lg font-bold text-gray-900 mt-1">110K RWF</p>
                                    </div>
                                </div>
                                <button class="w-full py-2 bg-pink-600 text-white rounded-lg text-sm font-semibold">Record Savings</button>
                            </div>
                        </div>

                        <!-- Transactions Screen -->
                        <div class="bg-white rounded-3xl shadow-xl border-8 border-gray-900 overflow-hidden" style="aspect-ratio: 9/18">
                            <div class="bg-gradient-to-b from-pink-600 to-red-600 text-white p-6">
                                <p class="text-xs font-semibold mt-8">09:41</p>
                                <h3 class="text-lg font-bold mt-6">Transactions</h3>
                            </div>
                            <div class="p-4 space-y-3 overflow-y-auto max-h-96">
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm">Savings Deposit</p>
                                        <p class="text-xs text-gray-500">Today, 10:30 AM</p>
                                    </div>
                                    <p class="font-bold text-green-600">+22,000 RWF</p>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm">Loan Payment</p>
                                        <p class="text-xs text-gray-500">Dec 26, 2:15 PM</p>
                                    </div>
                                    <p class="font-bold text-red-600">-15,400 RWF</p>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm">Interest Earned</p>
                                        <p class="text-xs text-gray-500">Dec 25, 9:00 AM</p>
                                    </div>
                                    <p class="font-bold text-green-600">+1,080 RWF</p>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm">Group Contribution</p>
                                        <p class="text-xs text-gray-500">Dec 24, 1:45 PM</p>
                                    </div>
                                    <p class="font-bold text-red-600">-8,800 RWF</p>
                                </div>
                            </div>
                        </div>

                        <!-- Settings Screen -->
                        <div class="bg-white rounded-3xl shadow-xl border-8 border-gray-900 overflow-hidden" style="aspect-ratio: 9/18">
                            <div class="bg-gradient-to-b from-pink-600 to-red-600 text-white p-6">
                                <p class="text-xs font-semibold mt-8">09:41</p>
                                <h3 class="text-lg font-bold mt-6">Profile</h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <div class="text-center py-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-pink-400 to-red-400 rounded-full mx-auto mb-3"></div>
                                    <p class="font-bold text-gray-900">John Doe</p>
                                    <p class="text-xs text-gray-600">Member since Dec 2023</p>
                                </div>
                                <div class="space-y-2">
                                    <button class="w-full py-2 px-3 bg-gray-100 text-gray-900 rounded-lg text-sm text-left">📱 Notifications</button>
                                    <button class="w-full py-2 px-3 bg-gray-100 text-gray-900 rounded-lg text-sm text-left">🔐 Security</button>
                                    <button class="w-full py-2 px-3 bg-gray-100 text-gray-900 rounded-lg text-sm text-left">ℹ️ Help & Support</button>
                                    <button class="w-full py-2 px-3 bg-gray-100 text-gray-900 rounded-lg text-sm text-left">📋 About App</button>
                                    <button class="w-full py-2 px-3 bg-red-100 text-red-700 rounded-lg text-sm text-left font-semibold mt-2">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features List -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-lg p-6 border border-pink-200">
                            <h4 class="font-semibold text-gray-900 mb-3">✨ Key Features</h4>
                            <ul class="text-sm text-gray-700 space-y-2">
                                <li>• Real-time balance updates</li>
                                <li>• Quick transaction recording</li>
                                <li>• Push notifications</li>
                                <li>• Biometric login (Face/Touch ID)</li>
                                <li>• Offline mode support</li>
                                <li>• Transaction history search</li>
                            </ul>
                        </div>
                        <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-lg p-6 border border-red-200">
                            <h4 class="font-semibold text-gray-900 mb-3">📦 What You Get</h4>
                            <ul class="text-sm text-gray-700 space-y-2">
                                <li>• iOS 12+ compatibility</li>
                                <li>• Android 6+ compatibility</li>
                                <li>• Auto-sync when online</li>
                                <li>• 256-bit encryption</li>
                                <li>• Multi-language support</li>
                                <li>• 24/7 customer support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
