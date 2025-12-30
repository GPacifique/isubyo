@extends('layouts.app')

@section('title', 'Ikibaho cy\'Umuyobozi w\'Itsinda - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white shadow">
        <div class="max-w-7xl mx-auto py-8 px-4">
            <div class="flex items-center space-x-4 mb-4">
                <img src="{{ asset('images/isubyo.svg') }}" alt="isubyo Logo" class="h-12 w-12">
                <span class="text-sm font-semibold text-indigo-100">ISUBYO</span>
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex-1">
                    <h1 class="text-4xl font-bold">{{ $group->name }} - Ikibaho cy'Umuyobozi</h1>
                    <p class="text-indigo-100 mt-2">Gucunga abanyamuryango, inguzanyo, ubwizigame, n'inyandiko z'imari</p>
                </div>

                <!-- Dashboard Switcher -->
                @php
                    $canAccessSystemAdmin = auth()->user()->is_admin;
                    $canAccessMember = auth()->user()->isMemberOfGroup();
                @endphp

                @if($canAccessSystemAdmin || $canAccessMember)
                    <div class="ml-6 flex items-center gap-4">
                        @if($adminGroups && count($adminGroups) > 0)
                            <div>
                                <div class="flex items-center gap-2">
                                    <label for="groupSelect" class="text-indigo-100 text-sm font-semibold">Itsinda:</label>
                                    <select
                                        id="groupSelect"
                                        class="px-3 py-2 bg-indigo-700 text-white border border-indigo-400 rounded-lg hover:bg-indigo-600 transition text-sm font-medium cursor-pointer"
                                        onchange="switchGroup(this.value)"
                                    >
                                        @foreach($adminGroups as $availableGroup)
                                            <option value="{{ $availableGroup->id }}" {{ $availableGroup->id === $group->id ? 'selected' : '' }}>
                                                {{ $availableGroup->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif

                        <div class="border-l border-indigo-400 pl-4">
                            <button id="ga-switcher-btn" class="flex items-center gap-2 hover:text-indigo-200 transition text-sm font-medium">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.5 1.5H3.75A2.25 2.25 0 001.5 3.75v12.5A2.25 2.25 0 003.75 18.5h12.5a2.25 2.25 0 002.25-2.25V9.5"></path>
                                    <path d="M6.5 10.5h7M6.5 14h4"></path>
                                </svg>
                                Hindura
                                <svg id="ga-switcher-chevron" class="w-4 h-4 transition" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <div id="ga-switcher-menu" class="absolute right-4 mt-2 w-56 bg-white rounded-lg shadow-xl hidden z-50">
                                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                                    <p class="text-xs font-semibold text-gray-600 uppercase">Ibikaho Bihari</p>
                                </div>

                                @if($canAccessSystemAdmin)
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 border-b transition">
                                        <div class="flex-1">
                                            <div class="font-semibold text-blue-600">Umuyobozi Mukuru</div>
                                            <p class="text-xs text-gray-500">Kuyobora sisitemu yose</p>
                                        </div>
                                    </a>
                                @endif

                                <a href="{{ route('group-admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 border-b transition">
                                    <div class="flex-1">
                                        <div class="font-semibold text-green-600">Umuyobozi w'Itsinda</div>
                                        <p class="text-xs text-gray-500">Bikoreshwa ubu</p>
                                    </div>
                                    <span class="inline-block w-3 h-3 bg-green-600 rounded-full"></span>
                                </a>

                                @if($canAccessMember)
                                    <a href="{{ route('member.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 transition">
                                        <div class="flex-1">
                                            <div class="font-semibold text-purple-600">Umunyamuryango</div>
                                            <p class="text-xs text-gray-500">Reba konti yawe</p>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @elseif($adminGroups && count($adminGroups) > 0)
                    <div class="ml-6">
                        <div class="flex items-center gap-2">
                            <label for="groupSelect" class="text-indigo-100 text-sm font-semibold">Group:</label>
                            <select
                                id="groupSelect"
                                class="px-3 py-2 bg-indigo-700 text-white border border-indigo-400 rounded-lg hover:bg-indigo-600 transition text-sm font-medium cursor-pointer"
                                onchange="switchGroup(this.value)"
                            >
                                @foreach($adminGroups as $availableGroup)
                                    <option value="{{ $availableGroup->id }}" {{ $availableGroup->id === $group->id ? 'selected' : '' }}>
                                        {{ $availableGroup->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4">
        <!-- All Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Abanyamuryango Bose</p>
                <p class="text-2xl font-bold text-blue-600">{{ $stats['total_members'] }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-green-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Inguzanyo Ziracyakora</p>
                <div>
                    <p class="text-2xl font-bold text-green-600">{{ $stats['active_loans'] }}</p>
                    <p class="text-xs text-gray-500">muri {{ $stats['total_loans'] }} zose</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-yellow-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Inguzanyo Zatanzwe</p>
                <p class="text-xl font-bold text-yellow-600">{{ number_format($stats['total_loan_amount'], 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-purple-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Imigabane y'Abanyamuryango</p>
                <p class="text-xl font-bold text-purple-600">{{ number_format($stats['total_member_shares'], 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-cyan-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Ubwizigame bw'Uyu Munsi</p>
                <div>
                    <p class="text-xl font-bold text-cyan-600">{{ number_format($stats['daily_savings'], 2) }}</p>
                    <p class="text-xs text-gray-500">{{ now()->format('M d') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-indigo-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Ubwizigame bw'Uku Kwezi</p>
                <div>
                    <p class="text-xl font-bold text-indigo-600">{{ number_format($stats['monthly_savings'], 2) }}</p>
                    <p class="text-xs text-gray-500">{{ now()->format('F') }}</p>
                </div>
            </div>
        </div>

        <!-- Financial Pool & Alerts Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-red-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Ibihano Byose</p>
                <div>
                    <p class="text-xl font-bold text-red-600">{{ number_format($stats['total_penalties'], 2) }}</p>
                    <p class="text-xs text-gray-500">Biracyakora</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-orange-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Inyungu Zose</p>
                <div>
                    <p class="text-xl font-bold text-orange-600">{{ number_format($stats['total_interests'], 2) }}</p>
                    <p class="text-xs text-gray-500">Ku Nguzanyo</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-pink-500 flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Ubufasha Buhari</p>
                <p class="text-xl font-bold text-pink-600">{{ number_format($stats['support_fund_available'], 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 {{ $stats['overdue_loans'] > 0 ? 'border-red-600' : 'border-green-500' }} flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Ubufasha Bwatanzwe</p>
                <div>
                    <p class="text-xl font-bold {{ $stats['overdue_loans'] > 0 ? 'text-red-600' : 'text-green-600' }}">{{ number_format($stats['total_support_disbursed'], 2) }}</p>
                    <p class="text-xs text-gray-500">Mu Isanduku</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 {{ $stats['overdue_loans'] > 0 ? 'border-red-500' : 'border-gray-300' }} flex flex-col justify-between h-32">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Inguzanyo Zirenze Igihe</p>
                <p class="text-2xl font-bold {{ $stats['overdue_loans'] > 0 ? 'text-red-600' : 'text-gray-600' }}">{{ $stats['overdue_loans'] }}</p>
            </div>
        </div>

        <!-- Alert Section -->
        @if($overdue_loans->count() > 0)
            <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-6 mb-8">
                <div class="flex items-start">
                    <svg class="h-6 w-6 text-red-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-lg font-bold text-red-900">⚠️ Inguzanyo Zirenze Igihe</h3>
                        <p class="text-red-700 mt-2">Ufite inguzanyo {{ $overdue_loans->count() }} zirenze itariki yo kwishyura. Nyamuneka fata ingamba vuba.</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content (Left 2/3) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Upcoming Deadlines -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">📅 Inguzanyo Zigiye Kugera</h2>
                            <p class="text-sm text-gray-600 mt-1">Mu minsi 30 iri imbere</p>
                        </div>
                        <a href="{{ route('group-admin.loans', $group) }}" class="text-blue-500 hover:text-blue-700 font-semibold text-sm">Reba Zose</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amafaranga</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Itariki yo Kwishyura</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Iminsi Isigaye</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($upcoming_loans as $loan)
                                    @php
                                        $daysLeft = now()->diffInDays($loan->maturity_date);
                                    @endphp
                                    <tr class="{{ $daysLeft <= 7 ? 'bg-yellow-50' : 'hover:bg-gray-50' }} transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <p class="font-semibold text-gray-900">{{ $loan->member->user->name }}</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                            {{ number_format($loan->principal_amount, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            {{ $loan->maturity_date->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $daysLeft <= 7 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                Iminsi {{ $daysLeft }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                            ✓ Nta nguzanyo igiye kugera mu minsi 30 iri imbere
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Overdue Loans Table -->
                @if($overdue_loans->count() > 0)
                    <div class="bg-white rounded-lg shadow-sm border-l-4 border-red-500">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h2 class="text-xl font-bold text-red-900">⚠️ Inguzanyo Zirenze Igihe</h2>
                            <p class="text-sm text-red-700 mt-1">Izi nguzanyo zarenze itariki yo kwishyura</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-red-600 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amafaranga</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Itariki Yari</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Iminsi Irenze</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Hasigaye</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($overdue_loans as $loan)
                                        @php
                                            $daysOverdue = $loan->maturity_date->diffInDays(now());
                                        @endphp
                                        <tr class="bg-red-50 hover:bg-red-100 transition">
                                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-red-900">{{ $loan->member->user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ number_format($loan->principal_amount, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-700">{{ $loan->maturity_date->format('M d, Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-200 text-red-900">
                                                    Iminsi {{ $daysOverdue }}+
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-900">
                                                {{ number_format($loan->remaining_balance, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- Members with Deadline Info -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">👥 Urutonde rw'Abanyamuryango</h2>
                        <div class="flex gap-3">
                            <a href="{{ route('group-admin.record-member-loan', $group) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded-lg transition">+ Andika Inguzanyo</a>
                            <a href="{{ route('group-admin.record-savings', $group) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold text-sm rounded-lg transition">+ Andika Ubwizigame</a>
                            <a href="{{ route('group-admin.members', $group) }}" class="text-blue-500 hover:text-blue-700 font-semibold text-sm">Reba Bose</a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Izina</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umwanya</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Inguzanyo Ziracyakora</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amafaranga y'Inguzanyo</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Ubwizigame</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Uko Bihagaze</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($member_details as $detail)
                                    <tr class="{{ $detail['has_overdue'] ? 'bg-red-50' : 'hover:bg-gray-50' }} transition">
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold {{ $detail['has_overdue'] ? 'text-red-900' : 'text-gray-900' }}">
                                            {{ $detail['user']->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                                {{ ucfirst($detail['member']->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                            {{ $detail['active_loans'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                            {{ number_format($detail['total_loan_amount'], 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                            {{ number_format($detail['savings_balance'], 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($detail['has_overdue'])
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">⚠️ Yirenze</span>
                                            @elseif($detail['upcoming_deadline'])
                                                @php $daysUntil = now()->diffInDays($detail['upcoming_deadline']); @endphp
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $daysUntil <= 7 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                    Iminsi {{ $daysUntil }}
                                                </span>
                                            @else
                                                <span class="text-gray-500 text-xs">Neza</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                            Nta munyamuryango aheruka kuboneka
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Right 1/3) -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-t-4 border-indigo-500">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.5 13a3 3 0 01-.369-5.98 5 5 0 1111.753.102A4.5 4.5 0 2815.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" clip-rule="evenodd"></path>
                        </svg>
                        Gucunga
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('group-admin.loan-requests', $group->id) }}" class="block px-4 py-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg text-yellow-600 font-medium transition text-sm">
                            ✉️ Ibyo Basaba Inguzanyo (Birategereje)
                        </a>
                        <a href="{{ route('group-admin.loans', $group) }}" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm">
                            📊 Reba Inguzanyo Zose
                        </a>
                        <a href="{{ route('group-admin.savings', $group) }}" class="block px-4 py-3 bg-green-50 hover:bg-green-100 rounded-lg text-green-600 font-medium transition text-sm">
                            💾 Reba Ubwizigame Bwose
                        </a>
                        <a href="{{ route('group-admin.members', $group) }}" class="block px-4 py-3 bg-purple-50 hover:bg-purple-100 rounded-lg text-purple-600 font-medium transition text-sm">
                            👥 Gucunga Abanyamuryango
                        </a>
                        <a href="{{ route('group-admin.transactions', $group) }}" class="block px-4 py-3 bg-indigo-50 hover:bg-indigo-100 rounded-lg text-indigo-600 font-medium transition text-sm">
                            📋 Reba Ibikorwa
                        </a>
                        <a href="{{ route('group-admin.penalties', $group) }}" class="block px-4 py-3 bg-red-50 hover:bg-red-100 rounded-lg text-red-600 font-medium transition text-sm">
                            ⚖️ Gucunga Ibihano
                        </a>
                        <a href="{{ route('group-admin.social-supports', $group) }}" class="block px-4 py-3 bg-pink-50 hover:bg-pink-100 rounded-lg text-pink-600 font-medium transition text-sm">
                            ❤️ Gucunga Ubufasha
                        </a>
                        <a href="{{ route('group-admin.reports', $group) }}" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm">
                            📈 Reba Raporo
                        </a>
                        <a href="{{ route('admin.groups.edit', $group) }}" class="block px-4 py-3 bg-orange-50 hover:bg-orange-100 rounded-lg text-orange-600 font-medium transition text-sm">
                            ⚙️ Hindura Igenamigani ry'Itsinda
                        </a>
                    </div>
                </div>

                <!-- Record Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-t-4 border-orange-500">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                        Kwandika Ibikorwa
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('group-admin.record-member-loan', $group) }}" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            💳 Andika Inguzanyo y'Umunyamuryango
                        </a>
                        <a href="{{ route('group-admin.record-savings', $group) }}" class="block px-4 py-3 bg-green-50 hover:bg-green-100 rounded-lg text-green-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 5a2 2 0 012-2h6a2 2 0 012 2v9h2a1 1 0 110 2h-2v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2H3a1 1 0 110-2h2V5zm8 1v7H7V6h6z"></path>
                            </svg>
                            💰 Andika Ubwizigame
                        </a>
                        <a href="{{ route('group-admin.record-interest', $group) }}" class="block px-4 py-3 bg-red-50 hover:bg-red-100 rounded-lg text-red-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            📈 Andika Inyungu y'Inguzanyo
                        </a>
                    </div>
                </div>

                <!-- Support Actions -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-t-4 border-pink-500">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                        </svg>
                        Social Support Actions
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('group-admin.social-supports', $group) }}" class="block px-4 py-3 bg-pink-50 hover:bg-pink-100 rounded-lg text-pink-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            📋 Reba Ibyo Basaba Byose
                        </a>
                        <button onclick="showCreateSocialSupportModal()" class="w-full px-4 py-3 bg-purple-50 hover:bg-purple-100 rounded-lg text-purple-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            ➕ Icyifuzo Gishya cy'Ubufasha
                        </button>
                        <a href="{{ route('group-admin.social-supports', $group) }}?status=pending" class="block px-4 py-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg text-yellow-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"></path>
                            </svg>
                            ⏳ Birategereje
                        </a>
                        <a href="{{ route('group-admin.social-supports', $group) }}?status=approved" class="block px-4 py-3 bg-blue-50 hover:bg-blue-100 rounded-lg text-blue-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            ✓ Byemejwe
                        </a>
                        <a href="{{ route('group-admin.social-supports', $group) }}?status=disbursed" class="block px-4 py-3 bg-green-50 hover:bg-green-100 rounded-lg text-green-600 font-medium transition text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            💳 Byishyuwe
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Ubwizigame bwa Vuba</h3>
                    <div class="space-y-3 max-h-80 overflow-y-auto">
                        @forelse($recent_savings as $saving)
                            <div class="border-l-4 border-green-500 pl-3 py-2">
                                <p class="font-semibold text-gray-900 text-sm">{{ $saving->member->user->name }}</p>
                                <p class="text-xs text-gray-600">Agaciro: {{ number_format($saving->current_balance, 2) }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $saving->updated_at->diffForHumans() }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4 text-sm">Nta bwizigame bwanditswe ubu</p>
                        @endforelse
                    </div>
                </div>

                <!-- Group Info -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Ibisobanuro by'Itsinda</h3>
                        <a href="{{ route('admin.groups.edit', $group) }}" class="text-orange-500 hover:text-orange-700 font-semibold text-sm">
                            <svg class="w-4 h-4 inline" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                            Hindura
                        </a>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Izina</p>
                            <p class="font-semibold text-gray-900 mt-1">{{ $group->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Uko Bihagaze</p>
                            <span class="inline-flex mt-1 px-2 py-1 rounded-full text-xs font-bold {{ $group->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $group->status === 'active' ? 'Birakora' : ucfirst($group->status) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Byaremwe</p>
                            <p class="text-gray-600 mt-1">{{ $group->created_at->format('M d, Y') }}</p>
                        </div>
                        @if($group->description)
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-semibold">Ibisobanuro</p>
                            <p class="text-gray-600 mt-1 text-xs">{{ $group->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Create Social Support Modal -->
<div id="quickCreateSocialSupportModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 max-h-screen overflow-y-auto">
        <div class="bg-pink-600 text-white p-6">
            <h2 class="text-xl font-bold">Icyifuzo Gishya cy'Ubufasha</h2>
        </div>
        <form method="POST" action="{{ route('group-admin.social-supports.store', $group) }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Umunyamuryango *</label>
                <select name="member_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">Hitamo umunyamuryango</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ubwoko bw'Ubufasha *</label>
                <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">Hitamo ubwoko</option>
                    <option value="death">☠️ Urupfu rw'Umukunzi</option>
                    <option value="marriage">💍 Ubukwe</option>
                    <option value="sickness">🏥 Uburwayi/Ubuvuzi</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Amafaranga *</label>
                <input
                    type="number"
                    name="amount"
                    step="0.01"
                    min="0"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    placeholder="0.00"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ibisobanuro *</label>
                <textarea
                    name="description"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                    rows="3"
                    placeholder="Tanga ibisobanuro..."
                ></textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideCreateSocialSupportModal()"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Hagarika
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-pink-600 text-white font-semibold rounded-lg hover:bg-pink-700 transition"
                >
                    Kora Icyifuzo
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showCreateSocialSupportModal() {
        document.getElementById('quickCreateSocialSupportModal').classList.remove('hidden');
    }

    function hideCreateSocialSupportModal() {
        document.getElementById('quickCreateSocialSupportModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('quickCreateSocialSupportModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });

    // Group switching function
    function switchGroup(groupId) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("group-admin.switch-group", ":groupId") }}'.replace(':groupId', groupId);

        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_token';
            input.value = csrfToken.getAttribute('content');
            form.appendChild(input);
        }

        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    }

    // Group Admin Dashboard Switcher
    document.addEventListener('DOMContentLoaded', function() {
        const gaSwitcherBtn = document.getElementById('ga-switcher-btn');
        const gaSwitcherMenu = document.getElementById('ga-switcher-menu');
        const gaSwitcherChevron = document.getElementById('ga-switcher-chevron');

        if (gaSwitcherBtn && gaSwitcherMenu) {
            gaSwitcherBtn.addEventListener('click', function(e) {
                e.preventDefault();
                gaSwitcherMenu.classList.toggle('hidden');
                gaSwitcherChevron.style.transform = gaSwitcherMenu.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
            });

            const gaSwitcherLinks = gaSwitcherMenu.querySelectorAll('a');
            gaSwitcherLinks.forEach(link => {
                link.addEventListener('click', function() {
                    gaSwitcherMenu.classList.add('hidden');
                    gaSwitcherChevron.style.transform = 'rotate(0deg)';
                });
            });

            document.addEventListener('click', function(event) {
                const isClickInsideMenu = gaSwitcherMenu.contains(event.target);
                const isClickInsideButton = gaSwitcherBtn.contains(event.target);
                if (!isClickInsideMenu && !isClickInsideButton) {
                    gaSwitcherMenu.classList.add('hidden');
                    gaSwitcherChevron.style.transform = 'rotate(0deg)';
                }
            });

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    gaSwitcherMenu.classList.add('hidden');
                    gaSwitcherChevron.style.transform = 'rotate(0deg)';
                }
            });
        }
    });
</script>
@endsection
