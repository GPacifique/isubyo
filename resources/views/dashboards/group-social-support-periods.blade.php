@extends('layouts.app')

@section('title', 'Ibihe by\'Ubufasha - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl sm:rounded-2xl p-6 sm:p-8 mb-6 text-white">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold">Ibihe by'Ubufasha</h1>
                    <p class="text-purple-100 mt-1 text-sm sm:text-base">{{ $group->name }} - Gucunga ibihe by'imisanzu</p>
                </div>
                <div class="flex flex-wrap gap-2 sm:gap-3">
                    <a href="{{ route('group-admin.dashboard', $group) }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg text-sm font-medium transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Subira
                    </a>
                    @if(!$activePeriod)
                    <a href="{{ route('group-admin.social-support-periods.create', $group) }}" class="inline-flex items-center px-4 py-2 bg-white text-purple-600 hover:bg-purple-50 rounded-lg text-sm font-medium transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Igihe Gishya
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
        @endif

        <!-- Stats Overview -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Ibihe Byose</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $stats['total_periods'] }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Byafunze</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $stats['closed_periods'] }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Imisanzu Yose</p>
                <p class="text-xl sm:text-2xl font-bold text-green-600">{{ number_format($stats['total_collected_all_time'], 0) }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Ubufasha Bwatanzwe</p>
                <p class="text-xl sm:text-2xl font-bold text-red-600">{{ number_format($stats['total_disbursed_all_time'], 0) }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Byagabanyijwe</p>
                <p class="text-xl sm:text-2xl font-bold text-blue-600">{{ number_format($stats['total_distributed_all_time'], 0) }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Ikigega Gisigaye</p>
                <p class="text-xl sm:text-2xl font-bold text-purple-600">{{ number_format($stats['fund_balance'], 0) }}</p>
            </div>
        </div>

        <!-- Active Period Card -->
        @if($activePeriod)
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl p-6 mb-6 text-white">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="inline-flex items-center px-2 py-1 rounded-full bg-white/20 text-xs font-medium">
                            🟢 Igihe Kirakora
                        </span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold">{{ $activePeriod->name }}</h2>
                    <p class="text-green-100 text-sm mt-1">
                        {{ $activePeriod->start_date->format('M d, Y') }} - {{ $activePeriod->end_date->format('M d, Y') }}
                    </p>
                    <div class="flex flex-wrap gap-4 mt-3 text-sm">
                        <span>💰 Imisanzu: {{ number_format($activePeriod->total_collected, 0) }}</span>
                        <span>💸 Ubufasha: {{ number_format($activePeriod->total_disbursed, 0) }}</span>
                        <span>👥 {{ $activePeriod->actual_contributors }}/{{ $activePeriod->expected_contributors }} batanze</span>
                    </div>
                </div>
                <a href="{{ route('group-admin.social-support-periods.show', [$group, $activePeriod]) }}" class="inline-flex items-center px-4 py-2 bg-white text-green-600 hover:bg-green-50 rounded-lg font-medium transition">
                    Gucunga Igihe
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <!-- Progress Bar -->
            <div class="mt-4">
                <div class="flex justify-between text-sm text-green-100 mb-1">
                    <span>Imisanzu Yatanzwe</span>
                    <span>{{ $activePeriod->getContributionProgress() }}%</span>
                </div>
                <div class="w-full bg-white/20 rounded-full h-2">
                    <div class="bg-white rounded-full h-2" style="width: {{ $activePeriod->getContributionProgress() }}%"></div>
                </div>
            </div>
        </div>
        @else
        <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl p-8 mb-6 text-center">
            <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Nta Gihe Kirakora</h3>
            <p class="text-gray-500 mb-4">Shyiraho igihe gishya cy'imisanzu kugira ngo utangire kwakira ku banyamuryango.</p>
            <a href="{{ route('group-admin.social-support-periods.create', $group) }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white hover:bg-purple-700 rounded-lg font-medium transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Shyiraho Igihe Gishya
            </a>
        </div>
        @endif

        <!-- Periods List -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Ibihe Byose</h2>
            </div>

            @if($periods->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Igihe</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Amatariki</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imisanzu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Ubufasha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Byagabanyijwe</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imiterere</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ibikorwa</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($periods as $period)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $period->name }}</div>
                                <div class="text-xs text-gray-500 sm:hidden">
                                    {{ $period->start_date->format('M d') }} - {{ $period->end_date->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                <div class="text-sm text-gray-900">{{ $period->start_date->format('M d, Y') }}</div>
                                <div class="text-xs text-gray-500">to {{ $period->end_date->format('M d, Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-green-600">{{ number_format($period->total_collected, 0) }}</div>
                                <div class="text-xs text-gray-500">{{ $period->actual_contributors }}/{{ $period->expected_contributors }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm font-medium text-red-600">{{ number_format($period->total_disbursed, 0) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap hidden lg:table-cell">
                                <div class="text-sm font-medium text-blue-600">{{ number_format($period->total_distributed, 0) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ \App\Models\SocialSupportPeriod::getStatusColor($period->status) }}">
                                    {{ \App\Models\SocialSupportPeriod::getStatusLabel($period->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('group-admin.social-support-periods.show', [$group, $period]) }}" class="text-purple-600 hover:text-purple-900 text-sm font-medium">
                                    Reba →
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-100">
                {{ $periods->links() }}
            </div>
            @else
            <div class="px-6 py-12 text-center text-gray-500">
                Nta bihe byarashyizweho.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
