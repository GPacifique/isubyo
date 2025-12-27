@extends('layouts.guest')

@section('title', 'Administrator Guide - isubyo Documentation')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Administrator Guide</h1>
            <p class="text-green-100 mt-2">Complete guide for group and system administrators</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Table of Contents -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    <h3 class="font-bold text-gray-900 mb-4">Contents</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#group-admin" class="text-green-600 hover:text-green-700">Group Admin Basics</a></li>
                        <li><a href="#member-mgmt" class="text-green-600 hover:text-green-700">Member Management</a></li>
                        <li><a href="#loan-approval" class="text-green-600 hover:text-green-700">Loan Approvals</a></li>
                        <li><a href="#reports" class="text-green-600 hover:text-green-700">Reports & Analytics</a></li>
                        <li><a href="#settings" class="text-green-600 hover:text-green-700">System Settings</a></li>
                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="md:col-span-3 space-y-8">
                <!-- Group Administration -->
                <section id="group-admin" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Group Administration</h2>
                    <p class="text-gray-600 mb-4">As a group administrator, you have access to powerful tools to manage your group effectively.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">Administrator responsibilities include:</h3>
                    <ul class="list-disc list-inside space-y-3 text-gray-700 mb-6">
                        <li>Setting and managing group policies</li>
                        <li>Approving or rejecting loan requests</li>
                        <li>Managing group finances and accounts</li>
                        <li>Recording group transactions</li>
                        <li>Generating group reports</li>
                        <li>Managing group members</li>
                    </ul>
                </section>

                <!-- Member Management -->
                <section id="member-mgmt" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Member Management</h2>
                    <p class="text-gray-600 mb-4">Keep your group organized by managing member access and responsibilities.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">Managing members:</h3>
                    <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-6">
                        <li>View all member profiles and contribution history</li>
                        <li>Add new members via email invitations</li>
                        <li>Suspend or remove inactive members</li>
                        <li>Adjust member roles and permissions</li>
                        <li>Track member compliance and attendance</li>
                    </ol>
                    <p class="text-gray-600">Use the member analytics dashboard to identify top contributors and members who need support.</p>
                </section>

                <!-- Loan Approval Workflows -->
                <section id="loan-approval" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Loan Approval Workflows</h2>
                    <p class="text-gray-600 mb-4">The loan approval process ensures fairness and transparency in your group.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">Approval workflow steps:</h3>
                    <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-6">
                        <li>Review pending loan requests in the admin dashboard</li>
                        <li>Examine member history and eligibility criteria</li>
                        <li>Approve or reject with detailed feedback</li>
                        <li>System automatically creates repayment schedules</li>
                        <li>Monitor repayment progress</li>
                    </ol>
                    <p class="text-gray-600 mb-4">All decisions are logged and members are notified automatically.</p>
                </section>

                <!-- Generating Reports -->
                <section id="reports" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Generating Reports</h2>
                    <p class="text-gray-600 mb-4">Access comprehensive analytics to understand your group's financial health.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">Available reports:</h3>
                    <ul class="list-disc list-inside space-y-3 text-gray-700 mb-6">
                        <li>Financial Summary - Total savings, disbursed loans, interest earned</li>
                        <li>Member Analytics - Contribution history, loan records, compliance</li>
                        <li>Transaction Reports - Detailed logs of all financial activities</li>
                        <li>Growth Analytics - Trends and projections for your group</li>
                        <li>Compliance Reports - Member participation and payment compliance</li>
                    </ul>
                    <p class="text-gray-600">All reports can be exported as PDF or Excel for sharing and archiving.</p>
                </section>

                <!-- System Settings -->
                <section id="settings" class="bg-white rounded-lg shadow p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">System Settings</h2>
                    <p class="text-gray-600 mb-4">Customize your group's configuration to match your specific needs.</p>
                    <h3 class="font-semibold text-gray-900 mb-3">Key settings to configure:</h3>
                    <ul class="list-disc list-inside space-y-3 text-gray-700">
                        <li>Group name and description</li>
                        <li>Contribution amounts and frequency</li>
                        <li>Loan policies and interest rates</li>
                        <li>Member approval process</li>
                        <li>Notification preferences</li>
                        <li>Currency and language settings</li>
                    </ul>
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
