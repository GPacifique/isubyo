@extends('layouts.guest')

@section('title', 'Terms of Service - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Terms of Service</h1>
            <p class="text-green-100 mt-2">Last Updated: December 27, 2024</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-16 px-4">
        <!-- TOC -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Table of Contents</h2>
            <ul class="space-y-2 text-gray-700">
                <li><a href="#terms" class="text-green-600 hover:text-green-700">1. Terms and Conditions</a></li>
                <li><a href="#use-license" class="text-green-600 hover:text-green-700">2. Use License</a></li>
                <li><a href="#disclaimer" class="text-green-600 hover:text-green-700">3. Disclaimer</a></li>
                <li><a href="#limitations" class="text-green-600 hover:text-green-700">4. Limitations of Liability</a></li>
                <li><a href="#accuracy" class="text-green-600 hover:text-green-700">5. Accuracy of Materials</a></li>
                <li><a href="#governing-law" class="text-green-600 hover:text-green-700">6. Governing Law</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="space-y-8">
            <!-- Terms -->
            <div id="terms" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Terms and Conditions</h2>
                <p class="text-gray-600 mb-4">
                    By accessing and using this website and service, you accept and agree to be bound by the terms and provision
                    of this agreement. If you do not agree to abide by the above, please do not use this service.
                </p>
            </div>

            <!-- Use License -->
            <div id="use-license" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Use License</h2>
                <p class="text-gray-600 mb-4">
                    Permission is granted to temporarily download one copy of the materials (information or software)
                    on isubyo's website for personal, non-commercial transitory viewing only. This is the grant of a license,
                    not a transfer of title, and under this license you may not:
                </p>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>Modify or copy the materials</li>
                    <li>Use the materials for any commercial purpose or for any public display</li>
                    <li>Attempt to decompile or reverse engineer any software contained on the website</li>
                    <li>Remove any copyright or other proprietary notations from the materials</li>
                    <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
                </ul>
            </div>

            <!-- Disclaimer -->
            <div id="disclaimer" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Disclaimer</h2>
                <p class="text-gray-600 mb-4">
                    The materials on isubyo's website are provided on an 'as is' basis. isubyo makes no warranties,
                    expressed or implied, and hereby disclaims and negates all other warranties including, without limitation,
                    implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.
                </p>
            </div>

            <!-- Limitations -->
            <div id="limitations" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Limitations of Liability</h2>
                <p class="text-gray-600 mb-4">
                    In no event shall isubyo or its suppliers be liable for any damages (including, without limitation,
                    damages for loss of data or profit, or due to business interruption) arising out of the use or
                    inability to use the materials on isubyo's website.
                </p>
            </div>

            <!-- Accuracy -->
            <div id="accuracy" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Accuracy of Materials</h2>
                <p class="text-gray-600">
                    The materials appearing on isubyo's website could include technical, typographical, or photographic errors.
                    isubyo does not warrant that any of the materials on its website are accurate, complete, or current.
                    isubyo may make changes to the materials contained on its website at any time without notice.
                </p>
            </div>

            <!-- Governing Law -->
            <div id="governing-law" class="bg-white rounded-lg shadow p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Governing Law</h2>
                <p class="text-gray-600 mb-4">
                    These terms and conditions are governed by and construed in accordance with the laws of the United States,
                    and you irrevocably submit to the exclusive jurisdiction of the courts in that location.
                </p>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center mt-8">
            <h2 class="text-2xl font-bold mb-4">Questions About Our Terms?</h2>
            <p class="text-green-100 mb-6">Contact our legal team for clarification</p>
            <a href="mailto:legal@isubyo.com" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Contact Legal
            </a>
        </div>
    </div>
</div>
@endsection
