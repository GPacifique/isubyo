@extends('layouts.guest')

@section('title', 'Cookie Policy - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Cookie Policy</h1>
            <p class="text-green-100 mt-2">Last Updated: December 27, 2024</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-16 px-4">
        <!-- What Are Cookies -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">What Are Cookies?</h2>
            <p class="text-gray-600 mb-4">
                Cookies are small pieces of text stored on your device when you visit a website. They help websites
                remember information about your visit, such as your preferences or login status.
            </p>
            <p class="text-gray-600">
                Cookies can be either "persistent" cookies (which remain on your device until you delete them)
                or "session" cookies (which are deleted when you close your browser).
            </p>
        </div>

        <!-- Types of Cookies We Use -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Types of Cookies We Use</h2>

            <div class="space-y-6">
                <!-- Essential Cookies -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Essential Cookies</h3>
                    <p class="text-gray-600">
                        These cookies are necessary for the website to function properly. They enable basic functions
                        like page navigation and access to secure areas. The website cannot function properly without these cookies.
                    </p>
                </div>

                <!-- Performance Cookies -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Performance Cookies</h3>
                    <p class="text-gray-600">
                        These cookies collect information about how visitors use our website, such as which pages are
                        visited most often and how visitors navigate the site. This information helps us improve our website performance.
                    </p>
                </div>

                <!-- Functional Cookies -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Functional Cookies</h3>
                    <p class="text-gray-600">
                        These cookies remember your choices and preferences to provide personalized features and content.
                        They may remember your language, region, or other settings.
                    </p>
                </div>

                <!-- Marketing Cookies -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Marketing Cookies</h3>
                    <p class="text-gray-600">
                        These cookies track your online activity to display relevant advertisements and measure the
                        effectiveness of advertising campaigns.
                    </p>
                </div>
            </div>
        </div>

        <!-- How to Control Cookies -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">How to Control Cookies</h2>
            <p class="text-gray-600 mb-4">
                You can control and/or delete cookies as you wish. Most web browsers allow some level of control
                over cookies through their settings preferences. However, if you limit the ability of websites to set cookies,
                you may worsen your overall user experience.
            </p>
            <h3 class="font-semibold text-gray-900 mb-2">Browser Controls:</h3>
            <ul class="list-disc list-inside text-gray-600 space-y-2 mb-4">
                <li>Chrome: Settings → Privacy and security → Clear browsing data</li>
                <li>Firefox: Options → Privacy & Security → Cookies and Site Data</li>
                <li>Safari: Preferences → Privacy → Manage Website Data</li>
                <li>Edge: Settings → Privacy, search, and services → Clear browsing data</li>
            </ul>
        </div>

        <!-- Opt-Out -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Opting Out</h2>
            <p class="text-gray-600 mb-4">
                You can opt out of cookies through your account settings on our website. Even if you delete cookies,
                we will still record your website visit, but without storing information about your preferences.
            </p>
            <div class="bg-blue-50 border border-blue-200 rounded p-4">
                <p class="text-blue-900">
                    <strong>Note:</strong> Most of our cookies are necessary for the site to function.
                    Disabling essential cookies may prevent you from using certain features of our website.
                </p>
            </div>
        </div>

        <!-- Policy Updates -->
        <div class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Policy Updates</h2>
            <p class="text-gray-600 mb-4">
                We may update this Cookie Policy from time to time. When we do, we will revise the "Last Updated" date
                at the top of this page and notify you of significant changes.
            </p>
            <p class="text-gray-600">
                Your continued use of the website following any changes signifies your acceptance of the updated Cookie Policy.
            </p>
        </div>

        <!-- Contact -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center mt-8">
            <h2 class="text-2xl font-bold mb-4">Questions About Cookies?</h2>
            <p class="text-green-100 mb-6">Contact us for more information</p>
            <a href="{{ route('pages.contact') }}" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Contact Us
            </a>
        </div>
    </div>
</div>
@endsection
