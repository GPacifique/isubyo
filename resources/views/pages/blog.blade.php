@extends('layouts.guest')

@section('title', 'Blog - isubyo')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100">
    <!-- Header with enhanced styling -->
    <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-green-900 to-slate-900 text-white py-24">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-green-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 relative">
            <div class="space-y-2 mb-6">
                <span class="inline-block px-3 py-1 bg-green-500 bg-opacity-20 text-green-300 text-xs font-semibold rounded-full border border-green-500 border-opacity-30">Knowledge Hub</span>
            </div>
            <h1 class="text-6xl lg:text-7xl font-black mb-4 tracking-tight">isubyo Blog</h1>
            <p class="text-xl text-slate-200 max-w-2xl">Expert insights, inspiring community stories, and actionable financial wisdom for group savings and lending</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-20 px-4">
        <!-- Featured Post - Enhanced -->
        <div class="group mb-20 cursor-pointer">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-0">
                    <div class="lg:col-span-2 h-80 lg:h-auto bg-gradient-to-br from-emerald-400 via-green-500 to-teal-600 relative overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute inset-0 bg-gradient-to-t from-black"></div>
                        </div>
                        <div class="text-center text-white relative z-10">
                            <svg class="w-40 h-40 mx-auto opacity-70 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="lg:col-span-3 p-10 lg:p-12 flex flex-col justify-between">
                        <div>
                            <div class="flex flex-wrap items-center gap-3 mb-6">
                                <span class="inline-flex items-center px-4 py-1.5 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full uppercase tracking-wide">Featured Article</span>
                                <span class="text-slate-500 text-sm font-medium">December 27, 2024</span>
                                <span class="text-slate-300">•</span>
                                <span class="text-slate-500 text-sm font-medium">8 min read</span>
                            </div>
                            <h2 class="text-4xl lg:text-5xl font-black text-slate-900 mb-5 leading-tight group-hover:text-green-600 transition-colors">Getting Started with Group Savings: A Complete Guide</h2>
                            <p class="text-slate-600 text-lg mb-8 leading-relaxed">
                                Group savings is one of the most powerful ways to build community wealth and financial resilience. Learn how successful groups are transforming their financial futures together with proven strategies and best practices.
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                            <div class="flex items-center space-x-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-full ring-2 ring-emerald-200"></div>
                                <div>
                                    <p class="font-bold text-slate-900">Sarah Johnson</p>
                                    <p class="text-sm text-slate-600">Financial Advisor</p>
                                </div>
                            </div>
                            <a href="{{ route('pages.blog.article-savings-strategies') }}" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-300 group/btn">
                                Read Article
                                <svg class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Filter - Refined -->
        <div class="mb-16">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-black text-slate-900">Latest Articles</h2>
                <div class="hidden lg:block text-sm text-slate-500 font-medium">Explore our collection</div>
            </div>
            <div class="flex flex-wrap gap-3">
                <button class="px-6 py-2.5 bg-green-600 text-white rounded-full text-sm font-semibold hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg">All Articles</button>
                <button class="px-6 py-2.5 bg-white text-slate-700 rounded-full text-sm font-semibold hover:bg-slate-100 border border-slate-200 transition-all duration-300">Savings Tips</button>
                <button class="px-6 py-2.5 bg-white text-slate-700 rounded-full text-sm font-semibold hover:bg-slate-100 border border-slate-200 transition-all duration-300">Loan Management</button>
                <button class="px-6 py-2.5 bg-white text-slate-700 rounded-full text-sm font-semibold hover:bg-slate-100 border border-slate-200 transition-all duration-300">Community Stories</button>
                <button class="px-6 py-2.5 bg-white text-slate-700 rounded-full text-sm font-semibold hover:bg-slate-100 border border-slate-200 transition-all duration-300">Education</button>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            <!-- Article 1 -->
            <article class="group bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 border border-slate-100 hover:border-slate-200 flex flex-col h-full">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 relative overflow-hidden flex items-center justify-center">
                    <svg class="w-32 h-32 opacity-20 text-white group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <div class="p-7 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-purple-100 text-purple-700 text-xs font-bold rounded-full uppercase tracking-wide">Savings Tips</span>
                        <span class="text-slate-400 text-xs">Dec 20</span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3 group-hover:text-green-600 transition-colors line-clamp-2">5 Proven Strategies to Increase Your Group's Savings Rate</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow line-clamp-3">
                        Discover practical strategies that successful groups use to boost their savings rate and achieve their financial goals faster.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-500 font-medium">5 min read</span>
                        <a href="{{ route('pages.blog.article-savings-strategies') }}" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 transition-colors text-sm">
                            Read <span class="ml-1">→</span>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="group bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 border border-slate-100 hover:border-slate-200 flex flex-col h-full">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-500 relative overflow-hidden flex items-center justify-center">
                    <svg class="w-32 h-32 opacity-20 text-white group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="p-7 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full uppercase tracking-wide">Best Practices</span>
                        <span class="text-slate-400 text-xs">Dec 18</span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3 group-hover:text-green-600 transition-colors line-clamp-2">Best Practices for Loan Management: Avoiding Common Pitfalls</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow line-clamp-3">
                        Loan defaults can threaten group harmony and financial stability. Learn how to implement robust approval processes and handle delinquencies tactfully.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-500 font-medium">7 min read</span>
                        <a href="{{ route('pages.blog.article-loan-management') }}" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 transition-colors text-sm">
                            Read <span class="ml-1">→</span>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="group bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 border border-slate-100 hover:border-slate-200 flex flex-col h-full">
                <div class="h-48 bg-gradient-to-br from-amber-400 to-orange-500 relative overflow-hidden flex items-center justify-center">
                    <svg class="w-32 h-32 opacity-20 text-white group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="p-7 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-full uppercase tracking-wide">Finance Tips</span>
                        <span class="text-slate-400 text-xs">Dec 15</span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3 group-hover:text-green-600 transition-colors line-clamp-2">Building Financial Literacy in Your Group</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow line-clamp-3">
                        A financially literate community makes better decisions. Explore practical workshops, resources, and activities for member education.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-500 font-medium">6 min read</span>
                        <a href="{{ route('pages.blog.article-financial-literacy') }}" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 transition-colors text-sm">
                            Read <span class="ml-1">→</span>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 4 -->
            <article class="group bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 border border-slate-100 hover:border-slate-200 flex flex-col h-full">
                <div class="h-48 bg-gradient-to-br from-red-400 to-rose-500 relative overflow-hidden flex items-center justify-center">
                    <svg class="w-32 h-32 opacity-20 text-white group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM9 20H4v-2a6 6 0 0112 0v2H9z"></path>
                    </svg>
                </div>
                <div class="p-7 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full uppercase tracking-wide">Community Stories</span>
                        <span class="text-slate-400 text-xs">Dec 12</span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3 group-hover:text-green-600 transition-colors line-clamp-2">How a Lagos Women's Group Built ₦5M Savings Fund in 18 Months</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow line-clamp-3">
                        Meet 45 inspiring women who transformed their financial futures through disciplined saving and smart group management.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-500 font-medium">8 min read</span>
                        <a href="{{ route('pages.blog.article-community-story') }}" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 transition-colors text-sm">
                            Read <span class="ml-1">→</span>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 5 -->
            <article class="group bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 border border-slate-100 hover:border-slate-200 flex flex-col h-full">
                <div class="h-48 bg-gradient-to-br from-indigo-400 to-purple-600 relative overflow-hidden flex items-center justify-center">
                    <svg class="w-32 h-32 opacity-20 text-white group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div class="p-7 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-bold rounded-full uppercase tracking-wide">Analytics</span>
                        <span class="text-slate-400 text-xs">Dec 10</span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3 group-hover:text-green-600 transition-colors line-clamp-2">Understanding Group Financial Metrics: A Data-Driven Approach</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow line-clamp-3">
                        What metrics matter most for group financial health? Learn how to track savings rate, loan default ratio, and ROI effectively.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-500 font-medium">6 min read</span>
                        <a href="{{ route('pages.blog.article-financial-metrics') }}" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 transition-colors text-sm">
                            Read <span class="ml-1">→</span>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Article 6 -->
            <article class="group bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 border border-slate-100 hover:border-slate-200 flex flex-col h-full">
                <div class="h-48 bg-gradient-to-br from-teal-400 to-emerald-600 relative overflow-hidden flex items-center justify-center">
                    <svg class="w-32 h-32 opacity-20 text-white group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="p-7 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-teal-100 text-teal-700 text-xs font-bold rounded-full uppercase tracking-wide">Technology</span>
                        <span class="text-slate-400 text-xs">Dec 8</span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-3 group-hover:text-green-600 transition-colors line-clamp-2">Digitizing Your Group: From Ledgers to isubyo Platform</h3>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-grow line-clamp-3">
                        Transitioning from manual record-keeping to digital tools can seem daunting. Discover the benefits and migration strategies.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-500 font-medium">5 min read</span>
                        <a href="{{ route('pages.blog.article-digitization') }}" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 transition-colors text-sm">
                            Read <span class="ml-1">→</span>
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <!-- Pagination - Refined -->
        <div class="flex justify-center items-center gap-2 mb-24">
            <button class="w-10 h-10 flex items-center justify-center text-slate-600 hover:bg-slate-200 rounded-lg transition-colors font-semibold">←</button>
            <button class="w-10 h-10 flex items-center justify-center bg-green-600 text-white rounded-lg font-bold shadow-md">1</button>
            <button class="w-10 h-10 flex items-center justify-center text-slate-700 hover:bg-slate-200 rounded-lg transition-colors font-semibold">2</button>
            <button class="w-10 h-10 flex items-center justify-center text-slate-700 hover:bg-slate-200 rounded-lg transition-colors font-semibold">3</button>
            <button class="w-10 h-10 flex items-center justify-center text-slate-600 hover:bg-slate-200 rounded-lg transition-colors font-semibold">→</button>
        </div>

        <!-- Newsletter Signup - Enhanced -->
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-green-900 to-slate-900 rounded-2xl p-12 lg:p-16 text-white shadow-2xl border border-green-800 border-opacity-30">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-green-500 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-blue-500 rounded-full blur-3xl"></div>
            </div>
            <div class="relative max-w-2xl mx-auto text-center">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">Stay Updated</h2>
                <p class="text-slate-200 text-lg mb-8 leading-relaxed">
                    Subscribe to our newsletter for curated insights, member success stories, and platform updates delivered weekly.
                </p>
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input type="email" placeholder="your@email.com" class="flex-grow px-5 py-3.5 rounded-lg text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-slate-900 placeholder-slate-500" required>
                    <button type="submit" class="px-8 py-3.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl whitespace-nowrap">
                        Subscribe
                    </button>
                </form>
                <p class="text-sm text-slate-300 mt-4">We respect your privacy. Unsubscribe anytime with one click.</p>
            </div>
        </div>
    </div>
</div>
@endsection
