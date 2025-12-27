@extends('layouts.guest')

@section('title', 'Contact Us - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Contact Us</h1>
            <p class="text-green-100 mt-2">We'd love to hear from you. Get in touch with us today.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <!-- Contact Info -->
            <div class="md:col-span-1">
                <div class="space-y-8">
                    <!-- Email -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Email</h3>
                        <p class="text-gray-600">support@isubyo.com</p>
                        <p class="text-gray-600">sales@isubyo.com</p>
                    </div>

                    <!-- Phone -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Phone</h3>
                        <p class="text-gray-600">+1 (555) 123-4567</p>
                        <p class="text-gray-600">Available Mon-Fri, 9am-5pm EST</p>
                    </div>

                    <!-- Address -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Office</h3>
                        <p class="text-gray-600">123 Financial Street</p>
                        <p class="text-gray-600">New York, NY 10001</p>
                        <p class="text-gray-600">United States</p>
                    </div>

                    <!-- Social -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-3">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-700">Twitter</a>
                            <a href="#" class="text-blue-600 hover:text-blue-700">LinkedIn</a>
                            <a href="#" class="text-blue-600 hover:text-blue-700">Facebook</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow p-8">
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-green-800">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <ul class="text-red-800 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pages.contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" name="first_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" name="last_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="tel" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <select name="subject" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Select a subject</option>
                                <option value="support">Technical Support</option>
                                <option value="sales">Sales Inquiry</option>
                                <option value="partnership">Partnership</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea name="message" rows="6" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                        </div>

                        <button type="submit" class="w-full px-6 py-2 bg-gradient-to-r from-green-600 to-blue-600 text-white font-semibold rounded-lg hover:from-green-700 hover:to-blue-700 transition">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">What is your response time?</h3>
                    <p class="text-gray-600">We typically respond to inquiries within 24 hours during business days.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Do you offer customer support?</h3>
                    <p class="text-gray-600">Yes, we offer 24/7 email support and phone support during business hours.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">How can I report a bug?</h3>
                    <p class="text-gray-600">Please email support@isubyo.com with details about the bug and we'll investigate immediately.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">Can I schedule a demo?</h3>
                    <p class="text-gray-600">Absolutely! Contact our sales team at sales@isubyo.com to schedule a personalized demo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
