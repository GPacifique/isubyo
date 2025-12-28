@extends('layouts.guest')

@section('title', 'Blog - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-5xl font-bold mb-2">isubyo Blog</h1>
            <p class="text-green-100 text-lg">Financial insights, community stories, and product updates</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Featured Post -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                <div class="h-96 md:h-auto bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center">
                    <div class="text-center text-white">
                        <svg class="w-32 h-32 mx-auto opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="px-4 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Featured</span>
                        <span class="text-gray-500 text-sm">December 27, 2024</span>
                        <span class="text-gray-500 text-sm">•</span>
                        <span class="text-gray-500 text-sm">8 min read</span>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Getting Started with Group Savings: A Complete Guide</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Group savings is one of the most powerful ways to build community wealth and financial resilience. In this comprehensive guide,
                        we walk you through the essential steps to launch your first group savings initiative, from setting clear goals to managing contributions
                        and distributing returns. Learn how successful groups are transforming their financial futures together.
                    </p>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-500 rounded-full"></div>
                        <div>
                            <p class="font-semibold text-gray-900">Sarah Johnson</p>
                            <p class="text-sm text-gray-600">Financial Advisor at isubyo</p>
                        </div>
                    </div>
                    <a href="{{ route('pages.blog.article-savings-strategies') }}" class="text-green-600 font-semibold hover:text-green-700 inline-flex items-center group">
                        Read Full Article
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Category Tags -->
        <div class="flex flex-wrap gap-2 mb-12">
            <button class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold hover:bg-green-200 transition">All</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-semibold hover:bg-gray-300 transition">Savings Tips</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-semibold hover:bg-gray-300 transition">Loan Management</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-semibold hover:bg-gray-300 transition">Community Stories</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-semibold hover:bg-gray-300 transition">Financial Education</button>
        </div>

        <!-- Blog Grid -->
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Latest Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Article 1 -->
            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 opacity-30 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-xs font-semibold text-green-600 uppercase tracking-wider">Savings Tips</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600 text-xs">December 20, 2024</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">5 Proven Strategies to Increase Your Group's Savings Rate</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Discover practical strategies that successful groups use to boost their savings rate and achieve their financial goals faster.
                        From setting realistic targets to celebrating milestones, learn how behavioral psychology can accelerate your savings journey.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">5 min read</span>
                        <a href="{{ route('pages.blog.article-savings-strategies') }}" class="text-green-600 font-semibold text-sm hover:text-green-700">Read →</a>
                    </div>
            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-500 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 opacity-30 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-xs font-semibold text-blue-600 uppercase tracking-wider">Best Practices</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600 text-xs">December 18, 2024</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">Best Practices for Loan Management: Avoiding Common Pitfalls</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Loan defaults can threaten group harmony and financial stability. Learn how to implement robust approval processes,
                        set clear repayment terms, and handle delinquencies tactfully while maintaining strong member relationships.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">7 min read</span>
                        <a href="{{ route('pages.blog.article-loan-management') }}" class="text-green-600 font-semibold text-sm hover:text-green-700">Read →</a>
                    </div>
            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-amber-400 to-orange-500 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 opacity-30 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-xs font-semibold text-amber-600 uppercase tracking-wider">Finance Tips</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600 text-xs">December 15, 2024</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">Building Financial Literacy in Your Group</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        A financially literate community makes better decisions and achieves stronger results. Explore practical workshops,
                        resources, and activities you can use to educate members about budgeting, investing, and wealth building.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">6 min read</span>
                        <a href="{{ route('pages.blog.article-financial-literacy') }}" class="text-green-600 font-semibold text-sm hover:text-green-700">Read →</a>
                    </div>
            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-red-400 to-rose-500 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 opacity-30 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM9 20H4v-2a6 6 0 0112 0v2H9z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-xs font-semibold text-red-600 uppercase tracking-wider">Community Stories</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600 text-xs">December 12, 2024</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">How a Lagos Women's Group Built ₦5M Savings Fund in 18 Months</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Meet the inspiring story of 45 women who transformed their financial futures through disciplined saving and
                        smart group management. Learn from their successes, challenges, and the strategies that helped them achieve remarkable growth.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">8 min read</span>
                        <a href="{{ route('pages.blog.article-community-story') }}" class="text-green-600 font-semibold text-sm hover:text-green-700">Read →</a>
                    </div>
            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-indigo-400 to-purple-600 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 opacity-30 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-xs font-semibold text-indigo-600 uppercase tracking-wider">Analytics</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600 text-xs">December 10, 2024</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">Understanding Group Financial Metrics: A Data-Driven Approach</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        What metrics matter most for group financial health? Learn how to track savings rate, loan default ratio, member engagement,
                        and ROI. Use data to make smarter decisions and communicate progress transparently.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">6 min read</span>
                        <a href="{{ route('pages.blog.article-financial-metrics') }}" class="text-green-600 font-semibold text-sm hover:text-green-700">Read →</a>
                    </div>
            <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-teal-400 to-emerald-600 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 opacity-30 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="text-xs font-semibold text-teal-600 uppercase tracking-wider">Technology</span>
                        <span class="text-gray-400">•</span>
                        <span class="text-gray-600 text-xs">December 8, 2024</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-600 transition">Digitizing Your Group: From Ledgers to isubyo Platform</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Transitioning from manual record-keeping to digital tools can seem daunting, but it's easier than you think.
                        Discover the benefits of digitization, how to migrate your existing data, and tips for training group members.
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">5 min read</span>
                        <a href="{{ route('pages.blog.article-digitization') }}" class="text-green-600 font-semibold text-sm hover:text-green-700">Read →</a>
                    </div>
                </div>
            </article>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center space-x-2 mb-16">
            <button class="px-3 py-2 text-gray-700 hover:bg-gray-200 rounded">←</button>
            <button class="px-4 py-2 bg-green-600 text-white rounded font-semibold">1</button>
            <button class="px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">2</button>
            <button class="px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">3</button>
            <button class="px-3 py-2 text-gray-700 hover:bg-gray-200 rounded">→</button>
        </div>

        <!-- Newsletter Signup -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-lg p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-3">Stay Informed</h2>
            <p class="text-green-100 mb-8 max-w-2xl mx-auto">
                Subscribe to our weekly newsletter for expert tips, community stories, and product updates delivered to your inbox.
            </p>
            <form class="flex gap-2 max-w-md mx-auto mb-3">
                <input type="email" placeholder="Enter your email" class="flex-grow px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-400">
                <button type="submit" class="px-8 py-3 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition">
                    Subscribe
                </button>
            </form>
            <p class="text-sm text-green-100">We respect your privacy. Unsubscribe anytime.</p>
        </div>
    </div>
</div>
@endsection
