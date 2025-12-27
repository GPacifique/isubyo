@extends('layouts.guest')

@section('title', 'Pricing - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Simple, Transparent Pricing</h1>
            <p class="text-green-100 mt-2">Choose the plan that fits your community's needs</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Free Plan -->
            <div class="bg-white rounded-lg shadow p-8 flex flex-col">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Starter</h3>
                <p class="text-gray-600 mb-6">For small groups just getting started</p>
                <div class="text-4xl font-bold text-gray-900 mb-1">Free</div>
                <p class="text-gray-600 mb-8">Forever free for groups up to 10 members</p>

                <ul class="space-y-3 mb-8 flex-grow">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Up to 10 members</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Basic savings tracking</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Email notifications</span>
                    </li>
                </ul>

                <a href="{{ route('register') }}" class="w-full px-4 py-2 bg-gray-200 text-gray-900 font-semibold rounded-lg hover:bg-gray-300 transition">
                    Get Started
                </a>
            </div>

            <!-- Professional Plan -->
            <div class="bg-gradient-to-br from-green-600 to-blue-600 rounded-lg shadow p-8 flex flex-col relative border-2 border-green-600">
                <div class="absolute -top-4 left-8 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                    Most Popular
                </div>
                <h3 class="text-2xl font-bold text-white mb-2 pt-4">Professional</h3>
                <p class="text-green-100 mb-6">For growing community groups</p>
                <div class="text-4xl font-bold text-white mb-1">$5</div>
                <p class="text-green-100 mb-8">Per month, billed annually</p>

                <ul class="space-y-3 mb-8 flex-grow">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-white">Unlimited members</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-white">Advanced loan management</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-white">Analytics & reports</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-300 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-white">Priority support</span>
                    </li>
                </ul>

                <a href="{{ route('register') }}" class="w-full px-4 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition">
                    Start Free Trial
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white rounded-lg shadow p-8 flex flex-col">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                <p class="text-gray-600 mb-6">For large organizations and networks</p>
                <div class="text-4xl font-bold text-gray-900 mb-1">Custom</div>
                <p class="text-gray-600 mb-8">Contact us for custom pricing</p>

                <ul class="space-y-3 mb-8 flex-grow">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Everything in Professional</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Custom integrations</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Dedicated support</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">SLA guarantee</span>
                    </li>
                </ul>

                <a href="{{ route('pages.contact') }}" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                    Contact Sales
                </a>
            </div>
        </div>

        <!-- FAQ -->
        <div class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Can I cancel anytime?</h3>
                    <p class="text-gray-600">Yes, you can cancel your subscription anytime without any penalties.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Do you offer discounts for annual billing?</h3>
                    <p class="text-gray-600">Yes, we offer 20% discount when you choose annual billing.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Is there a free trial?</h3>
                    <p class="text-gray-600">Yes, all paid plans come with a 14-day free trial, no credit card required.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
