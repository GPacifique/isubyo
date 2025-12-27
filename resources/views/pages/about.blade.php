@extends('layouts.guest')

@section('title', 'About Us - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">About isubyo</h1>
            <p class="text-green-100 mt-2">Empowering Communities Through Financial Transparency</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Mission Section -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
            <p class="text-gray-600 mb-4">
                At isubyo, we believe that every community deserves access to transparent, secure, and easy-to-use financial management tools.
                We are committed to empowering groups, associations, and organizations to manage their collective finances efficiently.
            </p>
            <p class="text-gray-600">
                Our platform combines simplicity with powerful features, allowing communities to focus on what matters most:
                building stronger financial relationships and achieving shared goals.
            </p>
        </div>

        <!-- Values Section -->
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Our Core Values</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white rounded-lg shadow p-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Transparency</h3>
                <p class="text-gray-600">
                    We believe in complete transparency in all financial transactions and group operations.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow p-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Security</h3>
                <p class="text-gray-600">
                    Your financial data is protected with bank-level encryption and security measures.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow p-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Community</h3>
                <p class="text-gray-600">
                    We support communities in building trust and achieving financial goals together.
                </p>
            </div>
        </div>

        <!-- Story Section -->
        <div class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Story</h2>
            <p class="text-gray-600 mb-4">
                isubyo was founded with a vision to solve the challenges faced by community groups in managing their collective finances.
                What started as a simple spreadsheet solution has grown into a comprehensive platform trusted by thousands of groups worldwide.
            </p>
            <p class="text-gray-600 mb-4">
                Today, we continue to innovate and improve our platform to meet the evolving needs of modern communities.
            </p>
        </div>
    </div>
</div>
@endsection
