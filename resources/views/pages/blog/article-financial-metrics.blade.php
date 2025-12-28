@extends('layouts.guest')

@section('title', 'Understanding Financial Metrics - isubyo Blog')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-400 to-purple-600 text-white py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex items-center space-x-2 mb-4">
                <span class="px-4 py-1 bg-white bg-opacity-20 rounded-full text-sm font-semibold">Analytics</span>
                <span class="text-indigo-100">December 10, 2024</span>
                <span class="text-indigo-100">•</span>
                <span class="text-indigo-100">6 min read</span>
            </div>
            <h1 class="text-5xl font-bold mb-4">Understanding Group Financial Metrics: A Data-Driven Approach</h1>
            <p class="text-indigo-100 text-lg">Learn which metrics matter most for group financial health and how to track them effectively.</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <!-- Author Info -->
        <div class="flex items-center space-x-4 mb-12 pb-12 border-b border-gray-200">
            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full"></div>
            <div>
                <p class="font-bold text-gray-900">Dr. Emmanuel Obi</p>
                <p class="text-gray-600">Data Analytics & Financial Modeling Specialist</p>
            </div>
        </div>

        <!-- Article Content -->
        <article class="prose prose-lg max-w-none mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Why Metrics Matter</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                "You can't improve what you don't measure." This famous management principle applies perfectly to group savings.
                By tracking the right financial metrics, your group can identify problems early, celebrate progress, and make data-driven decisions
                instead of emotional ones.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">The Essential Metrics Every Group Should Track</h2>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">1. Savings Rate</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Formula:</strong> (Total Savings Made ÷ Total Target Savings) × 100%
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>What it means:</strong> Are you on track to hit your savings goals?
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Target:</strong> 100%+ (exceeding your target is even better)
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Example:</strong> If your group targeted ₦1,000,000 in 12 months and achieved ₦850,000, your savings rate is 85%.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">2. Member Participation Rate</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Formula:</strong> (Number of Active Members ÷ Total Members) × 100%
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>What it means:</strong> What percentage of your members are actively contributing?
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Target:</strong> 90%+ (some members will have legitimate reasons to pause)
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">3. Loan Default Rate</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Formula:</strong> (Number of Defaulted Loans ÷ Total Loans Issued) × 100%
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>What it means:</strong> What percentage of your loans ended in default?
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Target:</strong> Below 5% (microfinance institutions typically have 2-5% rates)
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">4. Payment Compliance Rate</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Formula:</strong> (On-Time Payments ÷ Total Due Payments) × 100%
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>What it means:</strong> Of all loan payments that came due, what percentage were paid on time?
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Target:</strong> 95%+ (this shows your members respect financial obligations)
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">5. Return on Investment (ROI)</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Formula:</strong> (Interest Earned ÷ Total Savings) × 100%
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>What it means:</strong> How much profit did your savings earn through loans?
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Target:</strong> 8-15% annually (depends on your interest rates and loan volume)
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">6. Per Member Average Savings</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>Formula:</strong> Total Group Savings ÷ Number of Active Members
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                <strong>What it means:</strong> On average, how much has each member saved?
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                This helps identify members who contribute significantly less than others and may need support or encouragement.
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Creating a Metrics Dashboard</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                You don't need expensive software. A simple Excel spreadsheet or even a ledger can track these metrics. Here's what to include:
            </p>
            <div class="bg-indigo-50 p-6 rounded-lg mb-6">
                <h4 className="font-bold text-gray-900 mb-4">Monthly Metrics Report Should Show:</h4>
                <ul className="space-y-2">
                    <li>✓ Current month savings</li>
                    <li>✓ Cumulative savings (YTD)</li>
                    <li>✓ Member participation count</li>
                    <li>✓ Loans issued this month</li>
                    <li>✓ Loans repaid on time</li>
                    <li>✓ Interest earned</li>
                    <li>✓ Comparison to previous month (↑ or ↓)</li>
                </ul>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Using Metrics to Make Decisions</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Metrics are only useful if you act on them. Here's how:
            </p>
            <ul class="list-disc list-inside space-y-3 text-gray-700 mb-6">
                <li><strong>Low Savings Rate?</strong> Review your contribution level. Is ₦5,000 monthly realistic for most members? Consider reducing it.</li>
                <li><strong>Low Participation?</strong> Reach out to inactive members. Are they facing challenges? Can the group help?</li>
                <li><strong>High Default Rate?</strong> Your loan approval process is too lenient. Tighten eligibility criteria and require collateral.</li>
                <li><strong>Low ROI?</strong> You're not lending enough. Consider adjusting interest rates or increasing loan amounts available.</li>
            </ul>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Communicating Metrics to Members</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Share metrics with your group monthly, but make them easy to understand:
            </p>
            <ul class="list-disc list-inside space-y-3 text-gray-700 mb-6">
                <li>Use simple language, not jargon</li>
                <li>Show charts or visuals (even hand-drawn ones help)</li>
                <li>Celebrate progress: "We're 78% toward our ₦2M goal!"</li>
                <li>Explain the implications: "Our 3% loan default rate is excellent and means we're careful about who we lend to"</li>
                <li>Invite feedback: "Does this metric concern you? Let's discuss how to improve it"</li>
            </ul>

            <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-10">Conclusion</h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Financial metrics transform your group from operating on hunches to operating on facts. By tracking just these six key metrics,
                you'll have visibility into your group's financial health and the information you need to make smart decisions.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Start tracking one month of data today, and you'll immediately see where your group stands and what to improve next.
            </p>
        </article>

        <!-- Related Articles -->
        <div class="bg-white rounded-lg p-8 mt-12 border-t-4 border-indigo-400">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-500 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">5 Proven Savings Strategies</h4>
                        <p class="text-sm text-gray-600">Proven ways to increase savings rates</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-red-400 to-rose-500 rounded-lg flex-shrink-0"></div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Lagos Women's Group Story</h4>
                        <p class="text-sm text-gray-600">How they built ₦5M in savings</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Link -->
        <div class="mt-12">
            <a href="{{ route('pages.blog') }}" class="text-indigo-600 font-semibold hover:text-indigo-700 flex items-center group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Blog
            </a>
        </div>
    </div>
</div>
@endsection
