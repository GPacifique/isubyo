@extends('layouts.guest')

@section('title', 'How a Lagos Women\'s Group Built ₦5M Savings - isubyo Blog')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-red-400 to-rose-500 text-white py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex items-center space-x-2 mb-4">
                <span class="px-4 py-1 bg-white bg-opacity-20 rounded-full text-sm font-semibold">Community Stories</span>
                <span class="text-red-100">December 12, 2024</span>
                <span class="text-red-100">•</span>
                <span class="text-red-100">8 min read</span>
            </div>
            <h1 class="text-5xl font-bold mb-4">How a Lagos Women's Group Built ₦5M Savings Fund in 18 Months</h1>
            <p class="text-red-100 text-lg">An inspiring case study of 45 women who transformed their financial futures through disciplined saving.</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <!-- Author Info -->
        <div class="flex items-center space-x-4 mb-12 pb-12 border-b border-gray-200">
            <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-rose-500 rounded-full"></div>
            <div>
                <p class="font-bold text-gray-900">Chioma Adeyemi</p>
                <p class="text-gray-600">Community Development Officer & Case Study Documentarian</p>
            </div>
        </div>

        <!-- Article Content -->
        <article class="prose prose-lg max-w-none mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">The Beginning: A Vision Shared</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                In January 2023, 45 women from Yaba, Lagos came together with a bold vision: to collectively save ₦5,000,000
                in 18 months. Most were petty traders, market women, and small business owners earning between ₦20,000-₦100,000 monthly.
                Many had never participated in formal savings before. Yet they believed that together, they could achieve what seemed impossible individually.
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                This is their story—and the strategies that made it possible.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">The Strategy: Break It Down</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The first thing the group did was break their ambitious goal into manageable pieces:
            </p>
            <div class="bg-red-50 p-6 rounded-lg mb-6">
                <ul class="space-y-3">
                    <li className="flex items-start">
                        <span className="font-bold text-red-600 mr-3">Target:</span>
                        <span>₦5,000,000 in 18 months</span>
                    </li>
                    <li className="flex items-start">
                        <span className="font-bold text-red-600 mr-3">Monthly:</span>
                        <span>₦277,778 (about ₦6,173 per person weekly)</span>
                    </li>
                    <li className="flex items-start">
                        <span className="font-bold text-red-600 mr-3">Weekly:</span>
                        <span>Each of 45 members saves ₦2,500 minimum</span>
                    </li>
                    <li className="flex items-start">
                        <span className="font-bold text-red-600 mr-3">Extra:</span>
                        <span>Members could contribute additional amounts beyond the minimum</span>
                    </li>
                </ul>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Key Success Factors</h2>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">1. Strong Leadership & Clear Rules</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The group elected a 5-member management committee with clear roles: chairperson, treasurer, secretary, loan officer, and auditor.
                They created detailed written rules covering contributions, penalties, loan policies, and meeting procedures.
                Every member signed the rules document, creating accountability from day one.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">2. Weekly Meetings & Accountability</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Every Thursday evening, all members met to make their weekly contributions. These weren't boring transactions—they were community gatherings.
                The group added social elements: light refreshments, birthday celebrations, and informal financial discussions.
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The regular rhythm created peer pressure in a positive way. Missing a contribution meant explaining yourself to your peers.
                Members didn't want to let their "sisters" down.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">3. Financial Transparency</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The treasurer maintained a detailed ledger, and monthly statements were shared with all members.
                The group also hired an independent auditor quarterly. This transparency prevented corruption and built trust.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">4. Penalties for Non-Compliance</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                While the group was supportive, they also enforced rules fairly:
            </p>
            <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                <li>Missing one week: ₦500 fine</li>
                <li>Missing two consecutive weeks: ₦1,000 fine + meeting with committee</li>
                <li>Missing three weeks: Suspension pending review</li>
            </ul>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Penalties were harsh enough to matter, but fair. Over 18 months, the group only suspended one member
                (who was dealing with serious family issues and eventually rejoined after three months).
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">5. Interest Distribution</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The group lent some of their accumulated savings to members at 12% annual interest.
                They distributed the earned interest back to members quarterly. This incentivized more savings and showed
                members the power of their collective money working for them.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">The Results: Beyond the Money</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                By June 2024 (18 months later), the group had achieved ₦5,200,000. But the real impact went far beyond the numbers:
            </p>
            <div class="bg-rose-50 p-6 rounded-lg mb-6">
                <h4 className="font-bold text-gray-900 mb-4">Impact Statistics:</h4>
                <ul className="space-y-3">
                    <li className="flex items-start">
                        <span className="font-bold text-rose-600 mr-3">•</span>
                        <span>28 members accessed loans for business expansion or emergencies</span>
                    </li>
                    <li className="flex items-start">
                        <span className="font-bold text-rose-600 mr-3">•</span>
                        <span>Average member income increased by 35% within two years</span>
                    </li>
                    <li className="flex items-start">
                        <span className="font-bold text-rose-600 mr-3">•</span>
                        <span>12 members invested in small businesses (eateries, tailoring, phone shops)</span>
                    </li>
                    <li className="flex items-start">
                        <span className="font-bold text-rose-600 mr-3">•</span>
                        <span>15 members invested in children's education</span>
                    </li>
                    <li className="flex items-start">
                        <span className="font-bold text-rose-600 mr-3">•</span>
                        <span>42 out of 45 members said it transformed their financial confidence</span>
                    </li>
                </ul>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Lessons for Your Group</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                What can your group learn from the Yaba Women's Group's success?
            </p>
            <ol className="list-decimal list-inside space-y-3 text-gray-700 mb-6">
                <li>Set ambitious but achievable goals with clear timelines</li>
                <li>Create and enforce fair rules that apply to everyone</li>
                <li>Meet frequently (weekly is ideal) to maintain momentum and accountability</li>
                <li>Practice radical transparency with financial records</li>
                <li>Reward members with interest distribution—make savings tangible</li>
                <li>Build community, not just a savings scheme</li>
            </ol>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">The Future</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The Yaba Women's Group didn't stop at ₦5M. They've since:
            </p>
            <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                <li>Started a second savings cycle targeting ₦10M</li>
                <li>Created a mentorship program for newer groups</li>
                <li>Partnered with a microfinance bank for larger loans</li>
                <li>Established a scholarship fund for members' children</li>
            </ul>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Conclusion</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The Yaba Women's Group proves what's possible when women come together with a vision, clear strategies,
                and unwavering commitment. ₦5 million wasn't built overnight—it was built ₦2,500 at a time, week after week,
                by women who believed in themselves and each other.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Your group can achieve something similar. Start today, commit to the process, and watch your collective dreams become reality.
            </p>
        </article>

        <!-- Related Articles -->
        <div class="bg-white rounded-lg p-8 mt-12 border-t-4 border-red-400">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-500 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">5 Proven Savings Strategies</h4>
                        <p class="text-sm text-gray-600">Learn proven techniques for consistent saving</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Loan Management Best Practices</h4>
                        <p class="text-sm text-gray-600">Manage group loans effectively and fairly</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Link -->
        <div class="mt-12">
            <a href="{{ route('pages.blog') }}" class="text-red-600 font-semibold hover:text-red-700 flex items-center group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Blog
            </a>
        </div>
    </div>
</div>
@endsection
