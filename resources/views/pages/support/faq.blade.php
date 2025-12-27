@extends('layouts.guest')

@section('title', 'FAQ - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Frequently Asked Questions</h1>
            <p class="text-green-100 mt-2">Quick answers to common questions</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Search Bar -->
        <div class="mb-12">
            <input type="text" placeholder="Search FAQ..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <!-- FAQ Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Pricing & Billing -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">💰 Pricing & Billing</h2>
                <div class="space-y-4">
                    <details class="border-l-4 border-green-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Is isubyo free to use?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes, isubyo is completely free for groups. We don't charge any membership or usage fees. You can create unlimited groups and manage all your finances without any cost.</p>
                    </details>
                    <details class="border-l-4 border-green-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">How much does the mobile app cost?</summary>
                        <p class="text-gray-600 pl-4 mt-2">The mobile app is also free! Download it from the App Store or Google Play at no cost. You'll have access to all features on both web and mobile platforms.</p>
                    </details>
                    <details class="border-l-4 border-green-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Are there hidden fees?</summary>
                        <p class="text-gray-600 pl-4 mt-2">No hidden fees. Our pricing is transparent. Any costs will be clearly communicated before you incur them. We believe in honest business practices.</p>
                    </details>
                </div>
            </div>

            <!-- Security & Privacy -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">🔐 Security & Privacy</h2>
                <div class="space-y-4">
                    <details class="border-l-4 border-blue-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Is my data secure?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes, we use 256-bit encryption to protect all your data. Your information is securely stored on our servers and never shared with third parties without your permission.</p>
                    </details>
                    <details class="border-l-4 border-blue-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Can I use biometric authentication?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes! Both the web and mobile platforms support fingerprint and face recognition for added security and convenience.</p>
                    </details>
                    <details class="border-l-4 border-blue-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">How is my password protected?</summary>
                        <p class="text-gray-600 pl-4 mt-2">We use industry-standard hashing algorithms and salt your password to ensure it's stored securely. We never store plain-text passwords.</p>
                    </details>
                </div>
            </div>

            <!-- Data Retention -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">📊 Data Retention</h2>
                <div class="space-y-4">
                    <details class="border-l-4 border-purple-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">How long is my data kept?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Your data is retained as long as your account is active. After account deletion, we retain transaction records for 7 years for legal compliance.</p>
                    </details>
                    <details class="border-l-4 border-purple-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Can I export my data?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes, you can export all your data in standard formats (PDF, Excel, CSV) at any time from your account settings.</p>
                    </details>
                    <details class="border-l-4 border-purple-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Can I delete my account?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes, you can request account deletion. However, we'll retain transaction records as required by law. Non-transaction data is completely removed.</p>
                    </details>
                </div>
            </div>

            <!-- Technical Requirements -->
            <div class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">🖥️ Technical Requirements</h2>
                <div class="space-y-4">
                    <details class="border-l-4 border-amber-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">What devices are supported?</summary>
                        <p class="text-gray-600 pl-4 mt-2">You can access isubyo from any modern web browser on desktop, tablet, or smartphone. The mobile app works on iOS 12+ and Android 6+.</p>
                    </details>
                    <details class="border-l-4 border-amber-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">What's the minimum internet speed needed?</summary>
                        <p class="text-gray-600 pl-4 mt-2">A basic internet connection is sufficient. Our platform is optimized to work smoothly even on 3G networks.</p>
                    </details>
                    <details class="border-l-4 border-amber-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Can I use it offline?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes! The mobile app has offline mode. You can view data and record transactions offline, which sync automatically when you go online.</p>
                    </details>
                </div>
            </div>

            <!-- Compliance -->
            <div class="bg-white rounded-lg shadow p-8 md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">⚖️ Compliance & Legal</h2>
                <div class="space-y-4">
                    <details class="border-l-4 border-red-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Is isubyo compliant with regulations?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes, isubyo complies with applicable financial regulations in all jurisdictions where we operate. We're committed to maintaining the highest standards of regulatory compliance.</p>
                    </details>
                    <details class="border-l-4 border-red-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">Is data protected under GDPR?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Yes, we fully comply with GDPR regulations. Your data rights are protected, and you can request access, modification, or deletion at any time.</p>
                    </details>
                    <details class="border-l-4 border-red-600">
                        <summary class="font-semibold text-gray-900 cursor-pointer pl-4">What's your refund policy?</summary>
                        <p class="text-gray-600 pl-4 mt-2">Since isubyo is free, there are no refunds to process. However, you can cancel your account at any time without penalty.</p>
                    </details>
                </div>
            </div>
        </div>

        <!-- Still Need Help -->
        <div class="mt-12 bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Still need help?</h2>
            <p class="mb-6">Can't find what you're looking for? Contact our support team.</p>
            <a href="{{ route('pages.contact') }}" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Get Help
            </a>
        </div>

        <!-- Back Link -->
        <div class="mt-12">
            <a href="{{ route('pages.support.documentation') }}" class="text-green-600 font-semibold hover:text-green-700">← Back to Documentation</a>
        </div>
    </div>
</div>
@endsection
