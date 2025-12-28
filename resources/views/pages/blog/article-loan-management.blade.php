@extends('layouts.guest')

@section('title', 'Best Practices for Loan Management - isubyo Blog')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-400 to-cyan-500 text-white py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex items-center space-x-2 mb-4">
                <span class="px-4 py-1 bg-white bg-opacity-20 rounded-full text-sm font-semibold">Best Practices</span>
                <span class="text-blue-100">December 18, 2024</span>
                <span class="text-blue-100">•</span>
                <span class="text-blue-100">7 min read</span>
            </div>
            <h1 class="text-5xl font-bold mb-4">Best Practices for Loan Management: Avoiding Common Pitfalls</h1>
            <p class="text-blue-100 text-lg">Learn how to implement robust approval processes and handle delinquencies while maintaining group harmony.</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <!-- Author Info -->
        <div class="flex items-center space-x-4 mb-12 pb-12 border-b border-gray-200">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full"></div>
            <div>
                <p class="font-bold text-gray-900">Dr. Amara Mensah</p>
                <p class="text-gray-600">Microfinance Specialist & Group Finance Consultant</p>
            </div>
        </div>

        <!-- Article Content -->
        <article class="prose prose-lg max-w-none mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">The Challenge of Group Lending</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Group savings and lending schemes can be transformative, but they're also vulnerable to mismanagement.
                Defaulted loans have destroyed more group savings initiatives than any other factor. This guide shares proven
                practices from successful groups across Africa on how to lend responsibly.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">1. Establish Clear Loan Policies</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Before approving the first loan, your group needs written policies covering:
            </p>
            <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                <li>Maximum loan amount (typically 1-3x annual savings)</li>
                <li>Interest rate (usually 10-15% annually for groups)</li>
                <li>Repayment period (3-24 months depending on loan size)</li>
                <li>Consequences for late payments</li>
                <li>What happens if a member defaults completely</li>
            </ul>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Have all members sign and acknowledge these policies to ensure buy-in.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">2. Use a Rigorous Approval Process</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Not everyone who asks for a loan should receive one. Implement a three-step approval process:
            </p>
            <div class="bg-blue-50 p-6 rounded-lg mb-6">
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-900">Step 1: Application & Documentation</h4>
                    <p class="text-gray-700 mt-2">Require a written application with: purpose of loan, requested amount, proposed repayment schedule, collateral offered</p>
                </div>
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-900">Step 2: Committee Review</h4>
                    <p class="text-gray-700 mt-2">Have a loan committee (3-5 members) review applications, assess member history, and verify information</p>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900">Step 3: Group Approval</h4>
                    <p class="text-gray-700 mt-2">Present to the full group for discussion and vote. Requires 75%+ approval for loans above certain thresholds</p>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">3. Require Collateral or Guarantors</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Collateral (an asset pledged as security) or guarantors (other members who vouch for the borrower)
                significantly reduce default rates. This creates accountability and ensures the borrower takes the obligation seriously.
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Common collateral includes: land documents, savings certificates, household items, or personal guarantees from other members.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">4. Set Up Automated Payment Schedules</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Just like with savings, automated loan payments are more reliable than manual collections.
                Set up monthly automatic transfers from the borrower's bank account to the group account.
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                This removes the awkwardness of personal collection and ensures payments happen consistently.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">5. Handle Delinquency Compassionately But Firmly</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Despite best efforts, some members will fall behind. Handle this with empathy but firmness:
            </p>
            <ul class="list-disc list-inside space-y-2 text-gray-700 mb-6">
                <li>First missed payment: Private, friendly reminder</li>
                <li>Second missed payment: Formal written notice with 7-day deadline</li>
                <li>Third missed payment: Discussion with guarantor or seize collateral</li>
                <li>Persistent default: Group discussion on next steps</li>
            </ul>
            <p class="text-gray-700 mb-6 leading-relaxed">
                The key is consistency—apply the same standard to all members regardless of their closeness to leadership.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">6. Maintain Transparency</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Keep detailed records of every loan approved, payment made, and delinquency. Present this information
                monthly to all members. Transparency builds trust and makes it harder for corruption to take root.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Conclusion</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Successful group lending combines clear policies, rigorous processes, and consistent enforcement.
                These practices might seem strict initially, but they protect both the group's assets and each member's
                long-term financial security. Start implementing them today, and your group will maintain strong financial health for years to come.
            </p>
        </article>

        <!-- Related Articles -->
        <div class="bg-white rounded-lg p-8 mt-12 border-t-4 border-blue-400">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-500 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">5 Proven Savings Strategies</h4>
                        <p class="text-sm text-gray-600">Boost your group's savings rate consistently</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Understanding Financial Metrics</h4>
                        <p class="text-sm text-gray-600">Track the metrics that matter for group health</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Link -->
        <div class="mt-12">
            <a href="{{ route('pages.blog') }}" class="text-blue-600 font-semibold hover:text-blue-700 flex items-center group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Blog
            </a>
        </div>
    </div>
</div>
@endsection
