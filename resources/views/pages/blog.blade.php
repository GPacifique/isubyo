@extends('layouts.guest')

@section('title', 'Blog - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Blog</h1>
            <p class="text-green-100 mt-2">Tips, insights, and updates from the isubyo team</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Featured Post -->
        <div class="bg-white rounded-lg shadow overflow-hidden mb-12">
            <div class="h-64 bg-gradient-to-r from-green-400 to-blue-400"></div>
            <div class="p-8">
                <div class="flex items-center space-x-4 mb-3">
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Featured</span>
                    <span class="text-gray-600 text-sm">December 27, 2024</span>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Getting Started with Group Savings</h2>
                <p class="text-gray-600 mb-6">
                    Learn how to set up your first group savings account and start building financial discipline with your community.
                </p>
                <a href="#" class="text-green-600 font-semibold hover:text-green-700">Read Article →</a>
            </div>
        </div>

        <!-- Blog Grid -->
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Latest Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-gradient-to-r from-purple-400 to-pink-400"></div>
                <div class="p-6">
                    <span class="text-gray-600 text-sm">December 20, 2024</span>
                    <h3 class="text-lg font-bold text-gray-900 mt-2 mb-3">Best Practices for Loan Management</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Discover proven strategies for managing group loans effectively and minimizing defaults.
                    </p>
                    <a href="#" class="text-green-600 font-semibold text-sm hover:text-green-700">Read More →</a>
                </div>
            </article>

            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-gradient-to-r from-yellow-400 to-orange-400"></div>
                <div class="p-6">
                    <span class="text-gray-600 text-sm">December 15, 2024</span>
                    <h3 class="text-lg font-bold text-gray-900 mt-2 mb-3">Financial Transparency in Groups</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Why transparency matters and how isubyo helps build trust within your community.
                    </p>
                    <a href="#" class="text-green-600 font-semibold text-sm hover:text-green-700">Read More →</a>
                </div>
            </article>

            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-gradient-to-r from-blue-400 to-cyan-400"></div>
                <div class="p-6">
                    <span class="text-gray-600 text-sm">December 10, 2024</span>
                    <h3 class="text-lg font-bold text-gray-900 mt-2 mb-3">Mobile App Launch Announcement</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        We're excited to announce the launch of the isubyo mobile app for iOS and Android.
                    </p>
                    <a href="#" class="text-green-600 font-semibold text-sm hover:text-green-700">Read More →</a>
                </div>
            </article>
        </div>

        <!-- Newsletter Signup -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-lg p-8 text-white text-center mt-12">
            <h2 class="text-2xl font-bold mb-4">Stay Updated</h2>
            <p class="mb-6">Subscribe to our newsletter for the latest tips and updates.</p>
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
