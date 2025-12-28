@extends('layouts.guest')

@section('title', 'Building Financial Literacy in Your Group - isubyo Blog')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-amber-400 to-orange-500 text-white py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex items-center space-x-2 mb-4">
                <span class="px-4 py-1 bg-white bg-opacity-20 rounded-full text-sm font-semibold">Finance Tips</span>
                <span class="text-amber-100">December 15, 2024</span>
                <span class="text-amber-100">•</span>
                <span class="text-amber-100">6 min read</span>
            </div>
            <h1 class="text-5xl font-bold mb-4">Building Financial Literacy in Your Group</h1>
            <p class="text-amber-100 text-lg">Explore practical workshops and resources to educate members about budgeting and wealth building.</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <!-- Author Info -->
        <div class="flex items-center space-x-4 mb-12 pb-12 border-b border-gray-200">
            <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-full"></div>
            <div>
                <p class="font-bold text-gray-900">Rosette Karangwa</p>
                <p class="text-gray-600">Financial Education Expert & Curriculum Developer</p>
            </div>
        </div>

        <!-- Article Content -->
        <article class="prose prose-lg max-w-none mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Why Financial Literacy Matters</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                A financially literate group makes better decisions, avoids costly mistakes, and achieves stronger results.
                Yet many groups skip financial education, assuming everyone already understands money management.
                This article shows you how to build a culture of financial learning in your group.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">What Should Members Learn?</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Start with these core topics:
            </p>
            <ul class="list-disc list-inside space-y-3 text-gray-700 mb-6">
                <li><strong>Personal Budgeting:</strong> How to track income and expenses</li>
                <li><strong>The Power of Compound Interest:</strong> How savings grow over time</li>
                <li><strong>Debt Management:</strong> When borrowing is smart vs. risky</li>
                <li><strong>Group Finance Basics:</strong> How your specific group works</li>
                <li><strong>Entrepreneurship Fundamentals:</strong> Starting small businesses</li>
                <li><strong>Investment Basics:</strong> Beyond group savings</li>
            </ul>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">How to Organize Financial Literacy Sessions</h2>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Option 1: Monthly Workshops</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Host a 60-minute financial education workshop each month before (or after) your regular group meeting.
                Keep it practical and interactive with real-world examples relevant to your group members.
            </p>
            <div class="bg-amber-50 p-6 rounded-lg mb-6">
                <h4 class="font-semibold text-gray-900 mb-3">Sample Workshop Schedule:</h4>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>January: "Personal Budgeting Basics"</li>
                    <li>February: "Understanding Interest & Compound Growth"</li>
                    <li>March: "Smart Borrowing & Loan Management"</li>
                    <li>April: "Growing Beyond Savings - Investment Options"</li>
                </ul>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Option 2: Guest Speakers</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Invite local finance professionals, successful entrepreneurs, or government financial advisors to speak to your group.
                This brings fresh perspectives and credibility that members appreciate.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Option 3: Digital Learning</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                If in-person meetings are difficult, create a WhatsApp group or email list where you share daily financial tips,
                calculation examples, or short videos on key topics.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Practical Activities for Learning</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Don't just lecture—engage members with interactive activities:
            </p>
            <ul class="list-disc list-inside space-y-3 text-gray-700 mb-6">
                <li><strong>Budget Challenge:</strong> Have members create personal budgets and share insights</li>
                <li><strong>Savings Goal Game:</strong> Use a calculator to show how different contribution rates lead to different outcomes</li>
                <li><strong>Case Study Discussion:</strong> Present real scenarios (like dealing with loan defaults) and brainstorm solutions</li>
                <li><strong>Financial Goals Mapping:</strong> Help each member define 5-year financial objectives</li>
            </ul>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Overcoming Common Challenges</h2>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Challenge: Low Attendance at Sessions</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Solution:</strong> Tie financial education to existing meetings. Don't create a separate event—integrate it into your regular gatherings.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Challenge: Different Education Levels</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Solution:</strong> Use visual aids, real examples, and group discussion rather than complex theory.
                Pair literate and less-literate members to support each other.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Challenge: Skepticism About Usefulness</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Solution:</strong> Show immediate, tangible benefits. If a workshop on interest calculation helps members
                decide on a smarter loan offer, share that success story.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Resources to Get Started</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                You don't need to create everything from scratch. Many organizations provide free financial education materials:
            </p>
            <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                <li>World Bank's "Start Your Own Business" guides</li>
                <li>Central Bank educational pamphlets</li>
                <li>NGO financial literacy programs</li>
                <li>YouTube channels on personal finance</li>
            </ul>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Conclusion</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Financial literacy is an investment in your group's future. Members who understand money management make better
                decisions, save more consistently, and handle loans responsibly. Start small—even one workshop a month will yield
                dramatic improvements in your group's financial health over a year.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Remember: Your goal isn't to make everyone a CPA. It's to help members make smart financial decisions
                that improve their lives and strengthen your group.
            </p>
        </article>

        <!-- Related Articles -->
        <div class="bg-white rounded-lg p-8 mt-12 border-t-4 border-amber-400">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-500 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">5 Proven Savings Strategies</h4>
                        <p class="text-sm text-gray-600">Practical ways to increase savings rates</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Understanding Financial Metrics</h4>
                        <p class="text-sm text-gray-600">Key metrics for measuring group success</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Link -->
        <div class="mt-12">
            <a href="{{ route('pages.blog') }}" class="text-amber-600 font-semibold hover:text-amber-700 flex items-center group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Blog
            </a>
        </div>
    </div>
</div>
@endsection
