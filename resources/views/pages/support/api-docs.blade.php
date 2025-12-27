@extends('layouts.guest')

@section('title', 'API Documentation - isubyo')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">API Documentation</h1>
            <p class="text-green-100 mt-2">Build integrations with isubyo API</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Getting Started -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Getting Started</h2>
            <p class="text-gray-600 mb-4">
                The isubyo API allows you to programmatically access and manage group finances.
                All API requests require authentication using API keys.
            </p>
            <h3 class="font-semibold text-gray-900 mb-2">Base URL</h3>
            <code class="bg-gray-100 px-3 py-1 rounded text-gray-700">https://api.isubyo.com/v1</code>
        </div>

        <!-- Authentication -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Authentication</h2>
            <p class="text-gray-600 mb-4">
                Include your API key in the Authorization header of every request.
            </p>
            <div class="bg-gray-100 p-4 rounded mb-4">
                <pre class="text-sm text-gray-700"><code>Authorization: Bearer YOUR_API_KEY</code></pre>
            </div>
            <p class="text-gray-600">
                Get your API key from your account settings dashboard.
            </p>
        </div>

        <!-- Main Endpoints -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">API Endpoints</h2>

            <!-- Groups -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Groups</h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-green-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">GET /groups</p>
                        <p class="text-gray-600 text-sm">List all groups</p>
                    </div>
                    <div class="border-l-4 border-green-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">GET /groups/{id}</p>
                        <p class="text-gray-600 text-sm">Get group details</p>
                    </div>
                    <div class="border-l-4 border-blue-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">POST /groups</p>
                        <p class="text-gray-600 text-sm">Create new group</p>
                    </div>
                    <div class="border-l-4 border-yellow-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">PUT /groups/{id}</p>
                        <p class="text-gray-600 text-sm">Update group</p>
                    </div>
                </div>
            </div>

            <!-- Savings -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Savings</h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-green-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">GET /groups/{id}/savings</p>
                        <p class="text-gray-600 text-sm">Get group savings account</p>
                    </div>
                    <div class="border-l-4 border-blue-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">POST /groups/{id}/savings/deposit</p>
                        <p class="text-gray-600 text-sm">Record savings deposit</p>
                    </div>
                    <div class="border-l-4 border-blue-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">POST /groups/{id}/savings/withdraw</p>
                        <p class="text-gray-600 text-sm">Record withdrawal</p>
                    </div>
                </div>
            </div>

            <!-- Loans -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Loans</h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-green-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">GET /groups/{id}/loans</p>
                        <p class="text-gray-600 text-sm">List group loans</p>
                    </div>
                    <div class="border-l-4 border-blue-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">POST /groups/{id}/loan-requests</p>
                        <p class="text-gray-600 text-sm">Create loan request</p>
                    </div>
                    <div class="border-l-4 border-yellow-600 pl-4">
                        <p class="font-mono text-sm text-gray-700">PUT /loan-requests/{id}/approve</p>
                        <p class="text-gray-600 text-sm">Approve loan request</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error Handling -->
        <div class="bg-white rounded-lg shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Error Responses</h2>
            <p class="text-gray-600 mb-4">Error responses include a status code and error message:</p>
            <div class="bg-gray-100 p-4 rounded">
                <pre class="text-sm text-gray-700"><code>{
  "status": 400,
  "error": "Bad Request",
  "message": "Invalid group ID"
}</code></pre>
            </div>
        </div>

        <!-- Support -->
        <div class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Need Help?</h2>
            <p class="text-green-100 mb-6">Contact our API support team for technical assistance</p>
            <a href="mailto:api-support@isubyo.com" class="px-6 py-2 bg-white text-green-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                api-support@isubyo.com
            </a>
        </div>
    </div>
</div>
@endsection
