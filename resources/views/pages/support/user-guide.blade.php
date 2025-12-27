@extends('layouts.guest')

@section('title', 'User Guide - isubyo Documentation')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">User Guide</h1>
            <p class="text-green-100 mt-2">Complete guide for getting started with isubyo</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Table of Contents -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    <h3 class="font-bold text-gray-900 mb-4">Contents</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#account-setup" class="text-green-600 hover:text-green-700">Account Setup</a></li>
                        <li><a href="#creating-groups" class="text-green-600 hover:text-green-700">Creating Groups</a></li>
                        <li><a href="#savings" class="text-green-600 hover:text-green-700">Savings Management</a></li>
                        <li><a href="#loans" class="text-green-600 hover:text-green-700">Loan Management</a></li>
                        <li><a href="#mobile" class="text-green-600 hover:text-green-700">Mobile App</a></li>
                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="md:col-span-3 space-y-8">
                <!-- Account Setup -->
                <section id="account-setup" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Setting up Your Account</h2>
                    <p class="text-gray-600 mb-4">Getting started with isubyo is quick and easy. Follow these steps to set up your account:</p>
                    <ol class="list-decimal list-inside space-y-3 text-gray-700">
                        <li>Visit the registration page and enter your email address</li>
                        <li>Create a strong password and confirm it</li>
                        <li>Verify your email by clicking the confirmation link</li>
                        <li>Complete your profile with your name and phone number</li>
                        <li>Set up your preferred notification preferences</li>
                    </ol>
                </section>

                <!-- Creating Groups -->
                <section id="creating-groups" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Creating and Managing Groups</h2>
                    <p class="text-gray-600 mb-4">Groups are the core of isubyo. They allow you to collaborate with others on savings and lending.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">To create a new group:</h3>
                    <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-6">
                        <li>Click "Create New Group" on your dashboard</li>
                        <li>Enter a descriptive group name</li>
                        <li>Set group savings goal and contribution amount</li>
                        <li>Invite members using their email addresses</li>
                        <li>Set group policies and rules</li>
                    </ol>
                    <p class="text-gray-600">Once created, you can manage group members, modify settings, and monitor group activities from the group dashboard.</p>
                </section>

                <!-- Savings Management -->
                <section id="savings" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Savings Account Management</h2>
                    <p class="text-gray-600 mb-4">Each group maintains a shared savings account where members contribute regularly.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">Recording a savings deposit:</h3>
                    <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-6">
                        <li>Go to your group's savings page</li>
                        <li>Click "Record Savings"</li>
                        <li>Enter the amount you're depositing</li>
                        <li>Confirm the transaction</li>
                    </ol>
                    <p class="text-gray-600 mb-4">Your savings will be credited immediately and visible in your account balance and group statements.</p>
                </section>

                <!-- Loan Management -->
                <section id="loans" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Loan Requests and Repayment</h2>
                    <p class="text-gray-600 mb-4">Need a loan? isubyo makes the process transparent and straightforward.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">To request a loan:</h3>
                    <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-6">
                        <li>Navigate to the loans section</li>
                        <li>Click "Request Loan"</li>
                        <li>Specify the amount and repayment term</li>
                        <li>Provide a brief description (optional)</li>
                        <li>Submit for approval</li>
                    </ol>
                    <p class="text-gray-600">The group admin will review your request and you'll be notified of the decision. Once approved, funds are disbursed to your account and a repayment schedule is created.</p>
                </section>

                <!-- Mobile App -->
                <section id="mobile" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Using the Mobile App</h2>
                    <p class="text-gray-600 mb-4">The isubyo mobile app brings financial management to your pocket.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">Getting started with the app:</h3>
                    <ol class="list-decimal list-inside space-y-3 text-gray-700">
                        <li>Download from App Store (iOS) or Google Play (Android)</li>
                        <li>Log in with your isubyo credentials</li>
                        <li>Set up biometric authentication for security</li>
                        <li>View your balances and transaction history</li>
                        <li>Record transactions on the go</li>
                    </ol>
                </section>
            </div>
        </div>

        <!-- Back Link -->
        <div class="mt-12">
            <a href="{{ route('pages.support.documentation') }}" class="text-green-600 font-semibold hover:text-green-700">← Back to Documentation</a>
        </div>
    </div>
</div>
@endsection
