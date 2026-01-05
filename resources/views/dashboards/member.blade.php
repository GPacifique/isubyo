@extends('layouts.app')

@section('title', 'Ikibaho Cyanjye - Umunyamuryango')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-purple-50">
    <!-- Premium Header -->
    <div class="relative overflow-hidden bg-gradient-to-r from-purple-600 via-blue-600 to-purple-700 text-white">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative px-6 py-16">
            <div class="container mx-auto max-w-7xl">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="p-3 bg-purple-500 rounded-xl">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block bg-purple-400 text-purple-900 px-4 py-2 rounded-full text-sm font-bold">Ikibaho cy'Umunyamuryango</span>
                            </div>
                        </div>
                        <h1 class="text-5xl font-bold mb-3">Murakaza neza, {{ auth()->user()->name }}</h1>
                        <p class="text-purple-100 text-lg">Gucunga inguzanyo, ubwizigame, n'ibikorwa by'itsinda</p>
                        <p class="text-purple-200 text-sm mt-2">Byaheruka kuvugururwa: {{ now()->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto max-w-7xl px-4 py-12">
        <!-- Quick Stats Cards Grid -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Incamake Yawe</h2>
                    <p class="text-gray-600 text-sm mt-1">Amakuru y'amafaranga mu maso hamwe</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Savings Card -->
                <a href="{{ route('member.savings') }}" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-100 group-hover:bg-green-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 5a2 2 0 012-2h6a2 2 0 012 2v9h2a1 1 0 110 2h-2v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2H3a1 1 0 110-2h2V5zm8 1v7H7V6h6z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">{{ $account_stats['total_savings_accounts'] ?? 0 }} konti</span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Ubwizigame Bwose</h3>
                        <p class="text-4xl font-bold text-gray-900">{{ number_format($savings_stats['total_balance'] ?? 0, 0) }}</p>
                        <p class="text-gray-500 text-xs mt-2">+ {{ number_format($savings_stats['total_interest_earned'] ?? 0, 0) }} inyungu zinjiye</p>
                    </div>
                </a>

                <!-- Outstanding Debt Card -->
                <a href="{{ route('member.loans') }}" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-red-100 group-hover:bg-red-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">{{ $loan_stats['active_count'] ?? 0 }} zibaraka</span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Ideni Risigaye</h3>
                        <p class="text-4xl font-bold text-gray-900">{{ number_format($loan_stats['outstanding'] ?? 0, 0) }}</p>
                        <p class="text-gray-500 text-xs mt-2">Byishyuwe: {{ number_format($loan_stats['total_paid'] ?? 0, 0) }}</p>
                    </div>
                </a>

                <!-- Penalties Card -->
                <a href="{{ route('member.dashboard') }}#penalties" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-orange-100 group-hover:bg-orange-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 2.522a6 6 0 018.367 8.368zM9 13a3 3 0 110-6 3 3 0 010 6zm7-6a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-red-600 bg-red-50 px-2 py-1 rounded-full">{{ $penalties_stats['pending_count'] ?? 0 }} bitegereje</span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Ibihano Bisigaye</h3>
                        <p class="text-4xl font-bold text-gray-900">{{ number_format($penalties_stats['outstanding'] ?? 0, 0) }}</p>
                        <p class="text-gray-500 text-xs mt-2">Byose hamwe: {{ number_format($penalties_stats['total_amount'] ?? 0, 0) }}</p>
                    </div>
                </a>

                <!-- Net Worth Card -->
                <a href="{{ route('member.dashboard') }}" class="group">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all p-6 border border-gray-100 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-emerald-100 group-hover:bg-emerald-200 rounded-xl transition">
                                <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h.01a1 1 0 110 2H12zm-2 2a1 1 0 100-2 1 1 0 000 2zm4 0a1 1 0 100-2 1 1 0 000 2zm2-4a1 1 0 100-2 1 1 0 000 2zm-6 6a1 1 0 110-2h.01a1 1 0 110 2H10zm0 2a1 1 0 100-2 1 1 0 000 2zm6 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full">Incamake</span>
                        </div>
                        <h3 class="text-gray-600 text-sm font-semibold mb-1">Umutungo Mwiza</h3>
                        <p class="text-4xl font-bold text-gray-900">{{ number_format($account_stats['net_worth'] ?? 0, 0) }}</p>
                        <p class="text-gray-500 text-xs mt-2">Ubwizigame - Amadeni</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- My Loans Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between bg-gradient-to-r from-gray-50 to-white">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Inguzanyo Zanjye</h3>
                            <p class="text-gray-500 text-xs mt-1">Kurikirana inguzanyo zibaraka n'izarangiye</p>
                        </div>
                        <a href="{{ route('member.loan-requests') }}" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm font-semibold">
                            + Saba Inguzanyo
                        </a>
                    </div>

                    @if($loans->count() > 0)
                        <div class="divide-y">
                            @foreach($loans->take(6) as $loan)
                                <div class="px-6 py-4 hover:bg-gray-50 transition flex items-center justify-between group">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold">
                                                {{ substr($loan->group->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900 group-hover:text-blue-600">{{ $loan->group->name }}</p>
                                                <p class="text-sm text-gray-600">Principal: {{ number_format($loan->principal_amount, 0) }}</p>
                                                <p class="text-xs text-gray-500">Paid: {{ number_format($loan->total_principal_paid ?? 0, 0) }} / Remaining: {{ number_format($loan->remaining_balance ?? 0, 0) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $loan->status === 'active' ? 'bg-green-100 text-green-800' : ($loan->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $loan->status === 'active' ? 'Irakora' : ($loan->status === 'completed' ? 'Yarangiye' : ucfirst($loan->status)) }}
                                        </span>
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($loans->count() > 6)
                            <div class="px-6 py-4 bg-gray-50 border-t">
                                <a href="{{ route('member.loans') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Reba Inguzanyo Zose →</a>
                            </div>
                        @endif
                    @else
                        <div class="px-6 py-12 text-center">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-gray-500 mb-4">Nta nguzanyo ufite</p>
                            <a href="{{ route('member.loan-requests') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Saba inguzanyo yawe ya mbere →</a>
                        </div>
                    @endif
                </div>

                <!-- My Savings Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between bg-gradient-to-r from-gray-50 to-white">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Ubwizigame Bwanjye</h3>
                            <p class="text-gray-500 text-xs mt-1">Konti z'ubwizigame zibaraka mu matsinda yawe</p>
                        </div>
                        <a href="{{ route('member.savings') }}" class="text-green-600 hover:text-green-800 font-semibold text-sm">Reba Byose</a>
                    </div>

                    @if($savings->count() > 0)
                        <div class="divide-y">
                            @foreach($savings->take(6) as $saving)
                                <div class="px-6 py-4 hover:bg-gray-50 transition flex items-center justify-between group">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold">
                                                {{ substr($saving->group->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900 group-hover:text-green-600">{{ $saving->group->name }}</p>
                                                <p class="text-sm text-gray-600">Amafaranga Ariho: {{ number_format($saving->balance, 0) }}</p>
                                                <p class="text-xs text-gray-500">Byashyizwe: {{ number_format($saving->total_deposits ?? 0, 0) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">Kirakora</span>
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($savings->count() > 6)
                            <div class="px-6 py-4 bg-gray-50 border-t">
                                <a href="{{ route('member.savings') }}" class="text-green-600 hover:text-green-800 text-sm font-semibold">Reba Ubwizigame Bwose →</a>
                            </div>
                        @endif
                    @else
                        <div class="px-6 py-12 text-center">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h6a2 2 0 012 2v9h2a1 1 0 110 2h-2v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2H3a1 1 0 110-2h2V5z"></path>
                            </svg>
                            <p class="text-gray-500 mb-4">Nta konti y'ubwizigame ufite</p>
                            <a href="{{ route('member.groups') }}" class="text-green-600 hover:text-green-800 font-semibold">Injira mu itsinda kugira ngo wize →</a>
                        </div>
                    @endif
                </div>

                <!-- Recent Transactions -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between bg-gradient-to-r from-gray-50 to-white">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Ibyakozwe Vuba</h3>
                            <p class="text-gray-500 text-xs mt-1">Ibikorwa byawe bya vuba</p>
                        </div>
                        <a href="{{ route('member.transactions') }}" class="text-purple-600 hover:text-purple-800 font-semibold text-sm">Reba Byose</a>
                    </div>

                    @if($transactions->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Itariki</th>
                                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Ubwoko</th>
                                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Itsinda</th>
                                        <th class="px-6 py-3 text-right font-semibold text-gray-700">Amafaranga</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($transactions->take(8) as $transaction)
                                        <tr class="hover:bg-gray-50 transition cursor-pointer">
                                            <td class="px-6 py-3 text-gray-600">{{ $transaction->created_at->format('M d, Y') }}</td>
                                            <td class="px-6 py-3">
                                                <span class="px-2 py-1 rounded text-xs font-bold {{ $transaction->type === 'loan_payment' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                    @php
                                                        $typeTranslations = [
                                                            'loan_payment' => 'Kwishyura Inguzanyo',
                                                            'savings_deposit' => 'Kubika Ubwizigame',
                                                            'savings_withdrawal' => 'Gukura',
                                                            'penalty_payment' => 'Kwishyura Igihano',
                                                            'interest_earned' => 'Inyungu',
                                                        ];
                                                    @endphp
                                                    {{ $typeTranslations[$transaction->type] ?? ucfirst(str_replace('_', ' ', $transaction->type)) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 text-gray-600">{{ $transaction->group->name ?? 'N/A' }}</td>
                                            <td class="px-6 py-3 text-right font-semibold text-gray-900">{{ number_format($transaction->amount, 0) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="px-6 py-12 text-center text-gray-500">
                            Nta byakozwe bihari
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-8">
                <!-- My Groups -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Amatsinda Yanjye</h3>

                    @if($groups->count() > 0)
                        <div class="space-y-3">
                            @foreach($groups->take(5) as $group)
                                <div class="block p-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition group cursor-pointer">
                                    <p class="font-semibold text-gray-900 group-hover:text-blue-600">{{ $group->name }}</p>
                                    <p class="text-xs text-gray-600 mt-1">👥 {{ $group->members_count ?? 0 }} members</p>
                                    <p class="text-xs text-gray-500 mt-1">Joined: {{ $group->pivot->created_at->format('M d, Y') }}</p>
                                </div>
                            @endforeach
                        </div>

                        @if($groups->count() > 5)
                            <a href="{{ route('member.groups') }}" class="block mt-4 pt-4 border-t text-blue-600 hover:text-blue-800 font-semibold text-sm">Reba Amatsinda Yose →</a>
                        @endif
                    @else
                        <div class="text-center py-6">
                            <p class="text-gray-500 mb-4">Nta matsinda ufite</p>
                            <a href="{{ route('member.groups') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Shakira Amatsinda →</a>
                        </div>
                    @endif
                </div>

                <!-- Penalties & Support -->
                @if($penalties->count() > 0 || $socialSupport->count() > 0)
                    @if($penalties->count() > 0)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6" id="penalties">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Ibihano Bitegereje</h3>

                            <div class="space-y-3">
                                @foreach($penalties->take(4) as $penalty)
                                    <a href="#" class="block p-3 border border-orange-200 rounded-xl hover:bg-orange-50 transition group">
                                        <div class="flex items-center justify-between mb-1">
                                            <p class="font-semibold text-gray-900 group-hover:text-orange-600">{{ $penalty->group->name }}</p>
                                            <span class="px-2 py-1 rounded text-xs font-bold bg-orange-100 text-orange-800">Bitegereje</span>
                                        </div>
                                        <p class="text-xs text-gray-600">Amafaranga: {{ number_format($penalty->amount ?? 0, 0) }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($socialSupport->count() > 0)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Ubufasha bw'Imibereho</h3>

                            <div class="space-y-3">
                                @foreach($socialSupport->take(4) as $support)
                                    <a href="#" class="block p-3 border border-blue-200 rounded-xl hover:bg-blue-50 transition group">
                                        <div class="flex items-center justify-between mb-1">
                                            <p class="font-semibold text-gray-900 group-hover:text-blue-600">{{ $support->group->name }}</p>
                                            <span class="px-2 py-1 rounded text-xs font-bold {{ $support->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($support->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($support->status) }}
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-600">Byasabwe: {{ number_format($support->requested_amount ?? 0, 0) }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif

                <!-- Quick Actions -->
                <div class="bg-gradient-to-br from-purple-600 to-blue-600 rounded-2xl shadow-sm p-6 text-white">
                    <h3 class="text-lg font-bold mb-4">Ibikorwa Byihuse</h3>
                    <div class="space-y-3">
                        <a href="{{ route('member.loans') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 rounded-xl transition font-semibold text-center text-sm">
                            💰 Inguzanyo Zanjye
                        </a>
                        <a href="{{ route('member.savings') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 rounded-xl transition font-semibold text-center text-sm">
                            🏦 Ubwizigame Bwanjye
                        </a>
                        <a href="{{ route('member.groups') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 rounded-xl transition font-semibold text-center text-sm">
                            👥 Amatsinda Yanjye
                        </a>
                        <a href="{{ route('member.transactions') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 rounded-xl transition font-semibold text-center text-sm">
                            📊 Ibyakozwe
                        </a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-3 bg-white/10 hover:bg-white/20 rounded-xl transition font-semibold text-center text-sm">
                            ⚙️ Igenamiterere
                        </a>
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Umwirondoro</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Izina</p>
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Imeyili</p>
                            <p class="text-sm text-gray-600 break-all">{{ Auth::user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Umunyamuryango Kuva</p>
                            <p class="text-sm text-gray-600">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }
</style>

@endsection

@section('chat-widget')
<!-- Floating Chat Support Widget -->
<div id="chat-widget" class="fixed bottom-6 right-6 z-50">
    <a href="{{ route('chat.show') }}"
       class="group flex items-center justify-center w-14 h-14 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full shadow-lg hover:shadow-xl hover:scale-110 transition-all duration-300"
       title="Ubufasha bwo Kuganira">
        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
        <span class="absolute right-16 bg-gray-900 text-white text-sm px-3 py-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-lg">
            💬 Ubufasha bwo Kuganira
        </span>
    </a>
</div>
@endsection
