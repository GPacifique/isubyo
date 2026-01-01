@extends('layouts.guest')

@section('title', 'Smart Savings & Loans Management Platform')
@section('description', 'isubyo is a comprehensive savings and loans management platform for community groups, SACCOs, and microfinance. Manage ikimina, tontine, and group savings with transparency.')
@section('keywords', 'savings groups, loan management, community finance, group savings, microfinance, ikimina, tontine, SACCO, Rwanda fintech, financial transparency, group lending')
@section('og_image', asset('images/isubyo-og.png'))

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
    <!-- Hero Section with H1 for SEO -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white">
        <div class="max-w-7xl mx-auto py-20 px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Smart Savings & Loans Management for Communities</h1>
            <p class="text-xl text-gray-100 mb-8">Empower your community groups, SACCOs, and ikimina with transparent financial management tools</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="px-8 py-3 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block" aria-label="Get started with isubyo">
                    Get Started
                </a>
                <a href="{{ route('pages.about') }}" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-green-600 transition inline-block" aria-label="Learn more about isubyo">
                    Learn More
                </a>
            </div>
        </div>
    </div>

    <!-- Features Overview with Semantic HTML -->
    <section class="max-w-7xl mx-auto py-16 px-4" aria-labelledby="features-heading">
        <h2 id="features-heading" class="text-3xl font-bold text-gray-900 mb-12 text-center">Why Choose isubyo for Your Savings Group?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <article class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4" aria-hidden="true">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Easy to Use Interface</h3>
                <p class="text-gray-600">Intuitive interface designed for seamless financial management and group coordination. No technical expertise required.</p>
            </article>

            <article class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4" aria-hidden="true">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Bank-Level Security</h3>
                <p class="text-gray-600">Enterprise-grade encryption and compliance standards to protect your community's financial data.</p>
            </article>

            <article class="bg-white rounded-lg shadow p-8 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4" aria-hidden="true">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Real-Time Financial Analytics</h3>
                <p class="text-gray-600">Track savings contributions, loan repayments, and group finances with detailed analytics and reports.</p>
            </article>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16" aria-labelledby="cta-heading">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 id="cta-heading" class="text-3xl font-bold mb-4">Ready to Transform Your Community's Finance?</h2>
            <p class="text-lg text-gray-100 mb-8">Join thousands of savings groups already managing their finances transparently with isubyo.</p>
            <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block" aria-label="Start your free trial with isubyo">
                Start Free Trial
            </a>
        </div>
    </section>
</div>

{{-- FAQ Schema for SEO --}}
@push('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "What is isubyo?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "isubyo is a comprehensive savings and loans management platform designed for community groups, SACCOs, ikimina, and tontine. It helps groups manage member contributions, loans, and financial records with complete transparency."
            }
        },
        {
            "@type": "Question",
            "name": "Is isubyo secure for financial data?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, isubyo uses bank-level encryption and security measures to protect all financial data. We comply with international data protection standards to ensure your community's financial information is safe."
            }
        },
        {
            "@type": "Question",
            "name": "Can I try isubyo for free?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, isubyo offers a free tier that allows you to manage your savings group with essential features. You can upgrade to premium plans for advanced features as your group grows."
            }
        }
    ]
}
</script>
@endpush
@endsection
