@extends('layouts.guest')

@section('title', 'About Us - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Header -->
    <div class="bg-gradient-to-br from-green-600 via-green-700 to-blue-700 text-white py-10 sm:py-16 lg:py-20 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-32 h-32 sm:w-48 sm:h-48 lg:w-72 lg:h-72 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-40 h-40 sm:w-56 sm:h-56 lg:w-96 lg:h-96 bg-white rounded-full translate-x-1/3 translate-y-1/3"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">About isubyo</h1>
                <p class="text-green-100 mt-3 sm:mt-4 text-base sm:text-lg lg:text-xl max-w-2xl mx-auto">
                    Empowering Communities Through Financial Transparency
                </p>

                <!-- Stats Pills -->
                <div class="mt-6 sm:mt-8 flex flex-wrap justify-center gap-2 sm:gap-4">
                    <span class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-full bg-white/20 backdrop-blur-sm text-xs sm:text-sm font-medium">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        10,000+ Groups
                    </span>
                    <span class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-full bg-white/20 backdrop-blur-sm text-xs sm:text-sm font-medium">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        $5M+ Managed
                    </span>
                    <span class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-full bg-white/20 backdrop-blur-sm text-xs sm:text-sm font-medium">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        15+ Countries
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 sm:py-12 lg:py-16 px-4 sm:px-6 lg:px-8">
        <!-- Mission Section -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden mb-8 sm:mb-12">
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-1/2 p-6 sm:p-8 lg:p-10">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs sm:text-sm font-medium mb-4">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Our Mission
                    </div>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Building Financial Trust in Communities</h2>
                    <p class="text-gray-600 mb-4 text-sm sm:text-base leading-relaxed">
                        At isubyo, we believe that every community deserves access to transparent, secure, and easy-to-use financial management tools.
                        We are committed to empowering groups, associations, and organizations to manage their collective finances efficiently.
                    </p>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Our platform combines simplicity with powerful features, allowing communities to focus on what matters most:
                        building stronger financial relationships and achieving shared goals.
                    </p>
                </div>
                <div class="lg:w-1/2 bg-gradient-to-br from-green-500 to-blue-600 p-6 sm:p-8 lg:p-10 flex items-center justify-center min-h-[200px] sm:min-h-[250px] lg:min-h-0">
                    <div class="text-center text-white">
                        <svg class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 mx-auto mb-4 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <p class="text-lg sm:text-xl font-semibold">Community First</p>
                        <p class="text-green-100 text-sm sm:text-base mt-1">Every feature built with you in mind</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="mb-8 sm:mb-12">
            <div class="text-center mb-6 sm:mb-8">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">Our Core Values</h2>
                <p class="text-gray-600 mt-2 text-sm sm:text-base">The principles that guide everything we do</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                <!-- Transparency Card -->
                <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 lg:p-8 hover:shadow-xl transition-all duration-300 group border border-gray-100 hover:border-green-200">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2 sm:mb-3">Transparency</h3>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        We believe in complete transparency in all financial transactions and group operations. Every member can see exactly where funds go.
                    </p>
                </div>

                <!-- Security Card -->
                <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 lg:p-8 hover:shadow-xl transition-all duration-300 group border border-gray-100 hover:border-blue-200">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2 sm:mb-3">Security</h3>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Your financial data is protected with bank-level encryption and security measures. We take data protection seriously.
                    </p>
                </div>

                <!-- Community Card -->
                <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 lg:p-8 hover:shadow-xl transition-all duration-300 group border border-gray-100 hover:border-purple-200 sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2 sm:mb-3">Community</h3>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        We support communities in building trust and achieving financial goals together. Your success is our success.
                    </p>
                </div>
            </div>
        </div>

        <!-- Story Timeline Section -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-5 sm:p-8 lg:p-10 mb-8 sm:mb-12">
            <div class="text-center mb-6 sm:mb-8">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">Our Journey</h2>
                <p class="text-gray-600 mt-2 text-sm sm:text-base">From a simple idea to a trusted platform</p>
            </div>

            <div class="relative">
                <!-- Timeline Line - Hidden on mobile, shown on larger screens -->
                <div class="hidden sm:block absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-green-500 via-blue-500 to-purple-500 rounded-full"></div>

                <!-- Mobile Timeline Line -->
                <div class="sm:hidden absolute left-4 top-0 w-0.5 h-full bg-gradient-to-b from-green-500 via-blue-500 to-purple-500 rounded-full"></div>

                <!-- Timeline Items -->
                <div class="space-y-6 sm:space-y-8">
                    <!-- 2024 -->
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="sm:w-1/2 sm:pr-8 sm:text-right pl-10 sm:pl-0 order-2 sm:order-1">
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">The Beginning</h3>
                            <p class="text-gray-600 text-sm sm:text-base">Started as a simple spreadsheet solution for local savings groups.</p>
                        </div>
                        <div class="absolute left-0 sm:left-1/2 sm:-translate-x-1/2 w-8 h-8 sm:w-10 sm:h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-xs sm:text-sm shadow-lg z-10 order-1 sm:order-2">
                            '24
                        </div>
                        <div class="hidden sm:block sm:w-1/2 sm:pl-8 order-3"></div>
                    </div>

                    <!-- 2025 -->
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="hidden sm:block sm:w-1/2 sm:pr-8"></div>
                        <div class="absolute left-0 sm:left-1/2 sm:-translate-x-1/2 w-8 h-8 sm:w-10 sm:h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xs sm:text-sm shadow-lg z-10">
                            '25
                        </div>
                        <div class="sm:w-1/2 sm:pl-8 pl-10 sm:text-left">
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Platform Launch</h3>
                            <p class="text-gray-600 text-sm sm:text-base">Full platform launch with loans, savings, and social support features.</p>
                        </div>
                    </div>

                    <!-- 2026 -->
                    <div class="relative flex flex-col sm:flex-row items-start sm:items-center">
                        <div class="sm:w-1/2 sm:pr-8 sm:text-right pl-10 sm:pl-0 order-2 sm:order-1">
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Global Expansion</h3>
                            <p class="text-gray-600 text-sm sm:text-base">Expanding to serve communities across 15+ countries worldwide.</p>
                        </div>
                        <div class="absolute left-0 sm:left-1/2 sm:-translate-x-1/2 w-8 h-8 sm:w-10 sm:h-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-xs sm:text-sm shadow-lg z-10 order-1 sm:order-2">
                            '26
                        </div>
                        <div class="hidden sm:block sm:w-1/2 sm:pl-8 order-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-xl sm:rounded-2xl p-6 sm:p-8 lg:p-12 text-center text-white">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-3 sm:mb-4">Ready to Get Started?</h2>
            <p class="text-green-100 mb-6 sm:mb-8 max-w-2xl mx-auto text-sm sm:text-base lg:text-lg">
                Join thousands of communities already using isubyo to manage their finances transparently.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 sm:px-8 py-3 bg-white text-green-600 rounded-xl font-semibold hover:bg-green-50 transition-colors duration-300 text-sm sm:text-base">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Create Free Account
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-6 sm:px-8 py-3 border-2 border-white text-white rounded-xl font-semibold hover:bg-white/10 transition-colors duration-300 text-sm sm:text-base">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
