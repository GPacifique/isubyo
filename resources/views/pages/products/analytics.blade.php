@extends('layouts.guest')

@section('title', 'Reports & Analytics - isubyo Products')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-600 to-orange-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">Reports & Analytics</h1>
            <p class="text-yellow-100 mt-2">Deep insights into your group's financial health</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4">
        <!-- Hero Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Make Data-Driven Decisions</h2>
                <p class="text-gray-600 mb-4">
                    Comprehensive reports and analytics help group leaders understand financial trends,
                    identify patterns, and make informed decisions.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Savings and loan analytics</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Member contribution reports</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Custom date range filtering</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">Export reports as PDF/Excel</span>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-yellow-100 to-orange-100 rounded-lg h-80 p-6 flex flex-col items-center justify-center">
                <svg class="w-32 h-32 text-yellow-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <p class="text-yellow-600 font-medium">Analytics Dashboard</p>
            </div>
        </div>

        <!-- Screenshot Section -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Analytics Dashboard Preview</h2>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="bg-gradient-to-r from-yellow-600 to-orange-600 px-6 py-4 flex items-center">
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                    <span class="ml-4 text-white font-semibold text-sm">admin.isubyo.com/reports</span>
                </div>
                <div class="p-8 bg-gray-50">
                    <!-- Dashboard Header -->
                    <div class="mb-8 flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Analytics & Reports</h3>
                            <p class="text-gray-600">Women Empowerment Initiative - December 2025</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="px-3 py-2 bg-gray-200 text-gray-700 rounded text-sm font-semibold hover:bg-gray-300">PDF</button>
                            <button class="px-3 py-2 bg-yellow-600 text-white rounded text-sm font-semibold hover:bg-yellow-700">Excel</button>
                        </div>
                    </div>

                    <!-- Key Metrics -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4 border border-green-200">
                            <p class="text-green-700 text-sm font-medium">Total Savings</p>
                            <p class="text-2xl font-bold text-green-700 mt-2">₦2,450,000</p>
                            <p class="text-xs text-green-600 mt-1">↑ 12.5% from Nov</p>
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-200">
                            <p class="text-blue-700 text-sm font-medium">Total Disbursed</p>
                            <p class="text-2xl font-bold text-blue-700 mt-2">₦1,850,000</p>
                            <p class="text-xs text-blue-600 mt-1">↑ 8.2% from Nov</p>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-4 border border-purple-200">
                            <p class="text-purple-700 text-sm font-medium">Interest Earned</p>
                            <p class="text-2xl font-bold text-purple-700 mt-2">₦125,400</p>
                            <p class="text-xs text-purple-600 mt-1">↑ 5.8% from Nov</p>
                        </div>
                        <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg p-4 border border-amber-200">
                            <p class="text-amber-700 text-sm font-medium">Active Members</p>
                            <p class="text-2xl font-bold text-amber-700 mt-2">48</p>
                            <p class="text-xs text-amber-600 mt-1">2 new members</p>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Savings Trend Chart -->
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-4">Savings Growth Trend</h4>
                            <div class="h-40 flex items-end justify-around px-4 bg-gradient-to-t from-yellow-50 to-transparent rounded">
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-12 bg-yellow-400 rounded-t"></div>
                                    <span class="text-xs text-gray-600 mt-2">Jan</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-16 bg-yellow-400 rounded-t"></div>
                                    <span class="text-xs text-gray-600 mt-2">Apr</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-20 bg-yellow-400 rounded-t"></div>
                                    <span class="text-xs text-gray-600 mt-2">Jul</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-28 bg-yellow-500 rounded-t"></div>
                                    <span class="text-xs text-gray-600 mt-2">Oct</span>
                                </div>
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-32 bg-orange-500 rounded-t"></div>
                                    <span class="text-xs text-gray-600 mt-2">Dec</span>
                                </div>
                            </div>
                        </div>

                        <!-- Member Distribution -->
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-4">Member Distribution by Status</h4>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm text-gray-600">Active (48)</span>
                                        <span class="text-sm font-semibold text-gray-900">92%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: 92%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm text-gray-600">Inactive (2)</span>
                                        <span class="text-sm font-semibold text-gray-900">4%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 4%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm text-gray-600">Suspended (2)</span>
                                        <span class="text-sm font-semibold text-gray-900">4%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-red-500 h-2 rounded-full" style="width: 4%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Contributors -->
                    <div class="mt-8 bg-white rounded-lg border border-gray-200 overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <h4 class="font-semibold text-gray-900">Top 5 Contributors</h4>
                        </div>
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Member Name</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Total Saved</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Contributions</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Compliance</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Amina Johnson</td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">₦85,500</td>
                                    <td class="px-6 py-4 text-gray-700">34 months</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-semibold">100%</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Grace Okafor</td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">₦78,200</td>
                                    <td class="px-6 py-4 text-gray-700">32 months</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-semibold">100%</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Zainab Hassan</td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">₦72,900</td>
                                    <td class="px-6 py-4 text-gray-700">30 months</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-semibold">100%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-lg shadow p-8 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Available Reports</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">💰 Financial Summary</h3>
                    <p class="text-gray-600">Overview of total savings, disbursed loans, total interest earned, and outstanding balances.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">👥 Member Analytics</h3>
                    <p class="text-gray-600">Analyze individual member contributions, loan history, and payment compliance.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">📊 Transaction Reports</h3>
                    <p class="text-gray-600">Detailed logs of all deposits, withdrawals, payments, and interest distributions.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">📈 Growth Analytics</h3>
                    <p class="text-gray-600">Visualize savings growth trends, loan disbursement patterns, and member engagement.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Unlock valuable insights</h2>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-yellow-600 font-semibold rounded-lg hover:bg-gray-100 transition inline-block">
                Try Analytics Free
            </a>
        </div>
    </div>
</div>
@endsection
