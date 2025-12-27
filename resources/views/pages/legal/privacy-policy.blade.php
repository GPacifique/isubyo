@extends('layouts.guest')

@section('title', 'Privacy Policy - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Privacy Policy</h1>
            <p class="text-green-100 mt-2">Last Updated: December 27, 2024</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-16 px-4">
        <!-- TOC -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Table of Contents</h2>
            <ul class="space-y-2 text-gray-700">
                <li><a href="#introduction" class="text-green-600 hover:text-green-700">1. Introduction</a></li>
                <li><a href="#information-we-collect" class="text-green-600 hover:text-green-700">2. Information We Collect</a></li>
                <li><a href="#how-we-use" class="text-green-600 hover:text-green-700">3. How We Use Your Information</a></li>
                <li><a href="#data-security" class="text-green-600 hover:text-green-700">4. Data Security</a></li>
                <li><a href="#your-rights" class="text-green-600 hover:text-green-700">5. Your Rights</a></li>
                <li><a href="#contact-us" class="text-green-600 hover:text-green-700">6. Contact Us</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="space-y-8">
            <!-- Introduction -->
            <div id="introduction" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Introduction</h2>
                <p class="text-gray-600 mb-4">
                    isubyo ("we", "us", "our", or "Company") operates the isubyo.com website and isubyo application.
                    This page informs you of our policies regarding the collection, use, and disclosure of personal data
                    when you use our Service and the choices you have associated with that data.
                </p>
                <p class="text-gray-600">
                    We use your data to provide and improve the Service. By using the Service, you agree to the collection
                    and use of information in accordance with this policy.
                </p>
            </div>

            <!-- Information We Collect -->
            <div id="information-we-collect" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Information We Collect</h2>
                <h3 class="font-semibold text-gray-900 mb-2">Personal Data</h3>
                <p class="text-gray-600 mb-4">
                    While using our Service, we may ask you to provide us with certain personally identifiable information
                    that can be used to contact or identify you ("Personal Data"). This may include, but is not limited to:
                </p>
                <ul class="list-disc list-inside text-gray-600 space-y-2 mb-4">
                    <li>Email address</li>
                    <li>First name and last name</li>
                    <li>Phone number</li>
                    <li>Address, State, Province, ZIP/Postal code, City</li>
                    <li>Cookies and Usage Data</li>
                </ul>

                <h3 class="font-semibold text-gray-900 mb-2">Usage Data</h3>
                <p class="text-gray-600">
                    We may also collect information on how the Service is accessed and used ("Usage Data").
                    This may include information such as your computer's Internet Protocol address, browser type,
                    browser version, the pages you visit, and other diagnostic data.
                </p>
            </div>

            <!-- How We Use -->
            <div id="how-we-use" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">3. How We Use Your Information</h2>
                <p class="text-gray-600 mb-4">isubyo uses the collected data for various purposes:</p>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>To provide and maintain our Service</li>
                    <li>To notify you about changes to our Service</li>
                    <li>To allow you to participate in interactive features of our Service</li>
                    <li>To provide customer support</li>
                    <li>To gather analysis or valuable information so that we can improve our Service</li>
                    <li>To monitor the usage of our Service</li>
                    <li>To detect, prevent and address technical and security issues</li>
                </ul>
            </div>

            <!-- Data Security -->
            <div id="data-security" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Data Security</h2>
                <p class="text-gray-600 mb-4">
                    The security of your data is important to us, but remember that no method of transmission
                    over the Internet or method of electronic storage is 100% secure. While we strive to use
                    commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.
                </p>
                <p class="text-gray-600">
                    We implement bank-level encryption, regular security audits, and compliance with international
                    data protection standards to safeguard your information.
                </p>
            </div>

            <!-- Your Rights -->
            <div id="your-rights" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Your Rights</h2>
                <p class="text-gray-600 mb-4">
                    You have the right to request access to, correction of, or deletion of your personal data.
                    You can also request that we restrict the processing of your information or request portability of your data.
                </p>
                <p class="text-gray-600">
                    To exercise any of these rights, please contact us using the information provided in the "Contact Us" section.
                </p>
            </div>

            <!-- Contact Us -->
            <div id="contact-us" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Contact Us</h2>
                <p class="text-gray-600 mb-4">
                    If you have any questions about this Privacy Policy, please contact us at:
                </p>
                <div class="bg-gray-100 p-4 rounded">
                    <p class="text-gray-700 font-semibold">isubyo</p>
                    <p class="text-gray-700">Email: privacy@isubyo.com</p>
                    <p class="text-gray-700">Address: 123 Financial Street, New York, NY 10001, USA</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
