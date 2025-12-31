@extends('layouts.app')

@section('title', 'Raporo y\'Imari y\'Itsinda - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-600 to-yellow-800 text-white shadow">
        <div class="max-w-7xl mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold">Raporo y'Imari</h1>
            <p class="text-yellow-100 mt-2">{{ $group->name }}</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4">
        <!-- Back Link -->
        <div class="mb-6">
            <a href="{{ route('group-admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Subira ku Kibaho
            </a>
        </div>

        <!-- Loan Statistics Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Imibare y'Inguzanyo</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Inguzanyo Zatanzwe</p>
                    <p class="text-xl font-bold text-blue-600">{{ number_format($stats['total_loans'], 2) }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-green-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Umutwe Wishyuwe</p>
                    <p class="text-xl font-bold text-green-600">{{ number_format($stats['total_principal_paid'], 2) }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-red-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Amafaranga Asigaye</p>
                    <p class="text-xl font-bold text-red-600">{{ number_format($stats['outstanding'], 2) }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-yellow-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Inguzanyo Zikorera</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $stats['active_loans'] }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-orange-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Umubare w'Inguzanyo</p>
                    <p class="text-2xl font-bold text-orange-600">{{ $stats['total_loan_count'] }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 {{ $stats['overdue_loans'] > 0 ? 'border-red-600' : 'border-gray-300' }} flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Inguzanyo Zirenze Igihe</p>
                    <p class="text-2xl font-bold {{ $stats['overdue_loans'] > 0 ? 'text-red-600' : 'text-gray-600' }}">{{ $stats['overdue_loans'] }}</p>
                </div>
            </div>
        </div>

        <!-- Savings & Member Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Imitungo n'Abanyamuryango</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-purple-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Imigabane y'Abanyamuryango</p>
                    <p class="text-xl font-bold text-purple-600">{{ number_format($stats['total_member_shares'], 2) }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-cyan-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Imitungo ya Uyu Munsi</p>
                    <div>
                        <p class="text-xl font-bold text-cyan-600">{{ number_format($stats['daily_savings'], 2) }}</p>
                        <p class="text-xs text-gray-500">{{ now()->format('M d') }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-indigo-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Imitungo ya Uku Kwezi</p>
                    <div>
                        <p class="text-xl font-bold text-indigo-600">{{ number_format($stats['monthly_savings'], 2) }}</p>
                        <p class="text-xs text-gray-500">{{ now()->format('F') }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-600 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Abanyamuryango Bose</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $stats['total_members'] }}</p>
                </div>
            </div>
        </div>

        <!-- Financial Pool Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Amafaranga y'Itsinda n'Ubufasha</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-red-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Ibihano Byose</p>
                    <div>
                        <p class="text-xl font-bold text-red-600">{{ number_format($stats['total_penalties'], 2) }}</p>
                        <p class="text-xs text-gray-500">Bikorera</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-orange-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Inyungu Zose</p>
                    <div>
                        <p class="text-xl font-bold text-orange-600">{{ number_format($stats['total_interests'], 2) }}</p>
                        <p class="text-xs text-gray-500">Z'Inguzanyo</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-pink-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Ubufasha Buboneka</p>
                    <p class="text-xl font-bold text-pink-600">{{ number_format($stats['support_fund_available'], 2) }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-green-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Ubufasha Bwatanzwe</p>
                    <div>
                        <p class="text-xl font-bold text-green-600">{{ number_format($stats['total_support_disbursed'], 2) }}</p>
                        <p class="text-xs text-gray-500">Mu Kayi</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-yellow-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Ubusabe Butarakorwa</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $stats['total_pending_requests'] }}</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-500 flex flex-col justify-between h-32">
                    <p class="text-gray-500 text-xs font-semibold uppercase">Ubusabe Bwemejwe</p>
                    <p class="text-2xl font-bold text-blue-500">{{ $stats['total_approved_requests'] }}</p>
                </div>
            </div>
        </div>

        <!-- Top Savers -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Abazigama Cyane</h2>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                @if($topSavers->count() > 0)
                    <table class="w-full">
                        <thead class="bg-purple-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase">Umutungo</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($topSavers as $saving)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">{{ $saving->member->user->name }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <p class="text-lg font-bold text-purple-600">{{ number_format($saving->current_balance, 2) }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="px-6 py-8 text-gray-500 text-center">Nta mitungo iranditswe</p>
                @endif
            </div>
        </div>

        <!-- Pending Support Requests -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Ubusabe bw'Ubufasha Butarakorwa</h2>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                @if($pendingSupport->count() > 0)
                    <table class="w-full">
                        <thead class="bg-yellow-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Ubwoko</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase">Amafaranga</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Itariki</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($pendingSupport as $support)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">{{ $support->member->user->name }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold {{ $support->type === 'death' ? 'bg-gray-100 text-gray-800' : ($support->type === 'marriage' ? 'bg-pink-100 text-pink-800' : 'bg-blue-100 text-blue-800') }}">
                                            @if($support->type === 'death')
                                                ☠️ Urupfu
                                            @elseif($support->type === 'marriage')
                                                💍 Ubukwe
                                            @else
                                                🏥 Uburwayi
                                            @endif
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <p class="font-bold text-yellow-600">{{ number_format($support->amount, 2) }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $support->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="px-6 py-8 text-gray-500 text-center">Nta busabe bw'ubufasha butarakorwa</p>
                @endif
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Ibikorwa Biheruka</h2>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                @if($transactions->count() > 0)
                    <table class="w-full">
                        <thead class="bg-gray-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Ubwoko</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase">Amafaranga</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Itariki</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">{{ $transaction->member->user->name }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold {{ $transaction->type === 'deposit' ? 'bg-green-100 text-green-800' : ($transaction->type === 'interest' ? 'bg-orange-100 text-orange-800' : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($transaction->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <p class="font-bold {{ $transaction->type === 'deposit' ? 'text-green-600' : 'text-orange-600' }}">{{ number_format($transaction->amount, 2) }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $transaction->transaction_date->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="px-6 py-8 text-gray-500 text-center">Nta bikorwa bihari</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
