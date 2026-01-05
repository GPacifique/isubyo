@extends('layouts.app')

@section('title', $period->name . ' - Ubufasha')

@section('content')
<div class="min-h-screen bg-gray-50 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl sm:rounded-2xl p-6 sm:p-8 mb-6 text-white">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <a href="{{ route('group-admin.social-support-periods.index', $group) }}" class="inline-flex items-center text-purple-200 hover:text-white text-sm mb-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Subira ku Bihe
                    </a>
                    <div class="flex items-center gap-3 mb-2">
                        <h1 class="text-2xl sm:text-3xl font-bold">{{ $period->name }}</h1>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white/20">
                            {{ \App\Models\SocialSupportPeriod::getStatusLabel($period->status) }}
                        </span>
                    </div>
                    <p class="text-purple-100">{{ $group->name }}</p>
                    <p class="text-purple-200 text-sm mt-1">
                        {{ $period->start_date->format('M d, Y') }} - {{ $period->end_date->format('M d, Y') }}
                    </p>
                </div>

                @if(!$period->isClosed())
                <div class="flex flex-wrap gap-2">
                    @if($stats['remaining_balance'] > 0 && $stats['pending_supports'] == 0)
                    <button onclick="document.getElementById('distributeModal').classList.remove('hidden')"
                        class="inline-flex items-center px-4 py-2 bg-white text-purple-600 hover:bg-purple-50 rounded-lg text-sm font-medium transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                        Gabanya Ibisigaye
                    </button>
                    @endif
                    <button onclick="document.getElementById('closeModal').classList.remove('hidden')"
                        class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg text-sm font-medium transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Funga Igihe
                    </button>
                </div>
                @endif
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

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Imisanzu Yose</p>
                <p class="text-xl sm:text-2xl font-bold text-green-600">{{ number_format($stats['total_collected'], 0) }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ $stats['contributors'] }}/{{ $stats['expected'] }} abanyamuryango</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Ubufasha Bwatanzwe</p>
                <p class="text-xl sm:text-2xl font-bold text-red-600">{{ number_format($stats['total_disbursed'], 0) }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Byasubijwe</p>
                <p class="text-xl sm:text-2xl font-bold text-blue-600">{{ number_format($stats['total_distributed'], 0) }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                <p class="text-xs sm:text-sm text-gray-500">Ibisigaye</p>
                <p class="text-xl sm:text-2xl font-bold text-purple-600">{{ number_format($stats['remaining_balance'], 0) }}</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 col-span-2 lg:col-span-1">
                <p class="text-xs sm:text-sm text-gray-500">Imisanzu Yatanzwe</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $stats['contribution_progress'] }}%</p>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-purple-600 rounded-full h-2" style="width: {{ $stats['contribution_progress'] }}%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Contributions Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Imisanzu ({{ $contributions->count() }})
                        </h2>
                        @if(!$period->isClosed() && $nonContributors->count() > 0)
                        <button onclick="document.getElementById('bulkContributeModal').classList.remove('hidden')"
                            class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Andika Imisanzu
                        </button>
                        @endif
                    </div>

                    @if($contributions->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Umunyamuryango</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amafaranga</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden sm:table-cell">Itariki</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($contributions as $contribution)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $contribution->member->user->name ?? 'Unknown' }}</div>
                                        <div class="text-xs text-gray-500 sm:hidden">{{ $contribution->created_at->format('M d, Y') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium text-green-600">{{ number_format($contribution->amount, 0) }}</span>
                                    </td>
                                    <td class="px-6 py-4 hidden sm:table-cell">
                                        <span class="text-sm text-gray-500">{{ $contribution->created_at->format('M d, Y H:i') }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="px-6 py-12 text-center text-gray-500">
                        Nta misanzu yanditswe.
                    </div>
                    @endif
                </div>

                <!-- Support Requests Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Ubufasha Busabwe ({{ $supports->count() }})
                            @if($stats['pending_supports'] > 0)
                            <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                {{ $stats['pending_supports'] }} bitegereje
                            </span>
                            @endif
                        </h2>
                        @if(!$period->isClosed())
                        <button onclick="document.getElementById('supportModal').classList.remove('hidden')"
                            class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Ubufasha Bushya
                        </button>
                        @endif
                    </div>

                    @if($supports->count() > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($supports as $support)
                        <div class="p-4 sm:p-6 hover:bg-gray-50">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-lg">{{ \App\Models\SocialSupport::getTypeLabel($support->type) }}</span>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                            {{ $support->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $support->status === 'approved' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $support->status === 'disbursed' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $support->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                            {{ ucfirst($support->status) }}
                                        </span>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">{{ $support->member->user->name ?? 'Unknown' }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($support->description, 100) }}</p>
                                    <p class="text-sm font-semibold text-red-600 mt-1">Amount: {{ number_format($support->amount, 0) }}</p>
                                </div>

                                @if(!$period->isClosed() && $support->status === 'pending')
                                <div class="flex gap-2">
                                    <form action="{{ route('group-admin.social-support-periods.disburse', [$group, $period, $support]) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white rounded text-xs font-medium hover:bg-green-700">
                                            Tanga
                                        </button>
                                    </form>
                                    <button onclick="openRejectModal({{ $support->id }})" class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded text-xs font-medium hover:bg-red-200">
                                        Hakanira
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="px-6 py-12 text-center text-gray-500">
                        Nta bufasha busabwe muri iki gihe.
                    </div>
                    @endif
                </div>

                <!-- Distributions Section -->
                @if($distributions->count() > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Byagabanyijwe ({{ $distributions->count() }})
                        </h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Umunyamuryango</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amafaranga Yasubijwe</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden sm:table-cell">Itariki</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($distributions as $distribution)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $distribution->member->user->name ?? 'Unknown' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium text-blue-600">{{ number_format($distribution->amount, 0) }}</span>
                                    </td>
                                    <td class="px-6 py-4 hidden sm:table-cell">
                                        <span class="text-sm text-gray-500">{{ $distribution->created_at->format('M d, Y H:i') }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Period Info -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Amakuru y'Igihe</h3>
                    <dl class="space-y-3">
                        <div class="flex justify-between">
                            <dt class="text-sm text-gray-500">Umusanzu</dt>
                            <dd class="text-sm font-medium text-gray-900">{{ number_format($period->contribution_amount, 0) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm text-gray-500">Abateganijwe</dt>
                            <dd class="text-sm font-medium text-gray-900">{{ $period->expected_contributors }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm text-gray-500">Abatanze</dt>
                            <dd class="text-sm font-medium text-gray-900">{{ $period->actual_contributors }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm text-gray-500">Iguteganijwe</dt>
                            <dd class="text-sm font-medium text-gray-900">{{ number_format($period->contribution_amount * $period->expected_contributors, 0) }}</dd>
                        </div>
                        @if($period->notes)
                        <div class="pt-3 border-t border-gray-200">
                            <dt class="text-sm text-gray-500 mb-1">Ibisobanuro</dt>
                            <dd class="text-sm text-gray-700">{{ $period->notes }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>

                <!-- Non-Contributors -->
                @if($nonContributors->count() > 0 && !$period->isClosed())
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-yellow-800 mb-3">
                        ⚠️ Batanze Nta Musanzu ({{ $nonContributors->count() }})
                    </h3>
                    <ul class="space-y-2">
                        @foreach($nonContributors->take(10) as $member)
                        <li class="text-sm text-yellow-700 flex items-center gap-2">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
                            {{ $member->user->name ?? 'Unknown' }}
                        </li>
                        @endforeach
                        @if($nonContributors->count() > 10)
                        <li class="text-sm text-yellow-600 font-medium">
                            +{{ $nonContributors->count() - 10 }} more...
                        </li>
                        @endif
                    </ul>
                </div>
                @endif

                <!-- Quick Actions -->
                @if(!$period->isClosed())
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ibikorwa Byihuse</h3>
                    <div class="space-y-3">
                        <button onclick="document.getElementById('singleContributeModal').classList.remove('hidden')"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-100 text-green-700 rounded-lg text-sm font-medium hover:bg-green-200 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Andika Umusanzu Umwe
                        </button>
                        <button onclick="document.getElementById('supportModal').classList.remove('hidden')"
                            class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-100 text-red-700 rounded-lg text-sm font-medium hover:bg-red-200 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            Saba Ubufasha
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Bulk Contribute Modal -->
<div id="bulkContributeModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black/50" onclick="document.getElementById('bulkContributeModal').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-xl shadow-xl max-w-lg w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Andika Imisanzu Myinshi</h3>
            <form action="{{ route('group-admin.social-support-periods.bulk-contribute', [$group, $period]) }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hitamo Abanyamuryango</label>
                        <div class="max-h-48 overflow-y-auto border border-gray-200 rounded-lg p-2 space-y-1">
                            @foreach($nonContributors as $member)
                            <label class="flex items-center p-2 hover:bg-gray-50 rounded cursor-pointer">
                                <input type="checkbox" name="member_ids[]" value="{{ $member->id }}" class="rounded border-gray-300 text-purple-600 mr-3" checked>
                                <span class="text-sm text-gray-700">{{ $member->user->name ?? 'Unknown' }}</span>
                            </label>
                            @endforeach
                        </div>
                        <button type="button" onclick="toggleAllCheckboxes()" class="mt-2 text-sm text-purple-600 hover:text-purple-800">Hitamo Bose/Kura Bose</button>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Umusanzu ku Munyamuryango</label>
                        <div class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 font-semibold">
                            {{ number_format($period->contribution_amount, 0) }} {{ $group->currency ?? 'RWF' }}
                        </div>
                        <input type="hidden" name="amount" value="{{ $period->contribution_amount }}">
                        <p class="text-xs text-gray-500 mt-1">Abanyamuryango bose batanga amafaranga amwe</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ibisobanuro (Ntibisabwa)</label>
                        <input type="text" name="notes" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="urugero: Umusanzu wa buri kwezi">
                    </div>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700">
                        Andika Imisanzu
                    </button>
                    <button type="button" onclick="document.getElementById('bulkContributeModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
                        Hagarika
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Single Contribute Modal -->
<div id="singleContributeModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black/50" onclick="document.getElementById('singleContributeModal').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-xl shadow-xl max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Andika Umusanzu Umwe</h3>
            <form action="{{ route('group-admin.social-support-periods.contribute', [$group, $period]) }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Umunyamuryango</label>
                        <select name="member_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">Hitamo umunyamuryango</option>
                            @foreach($nonContributors as $member)
                            <option value="{{ $member->id }}">{{ $member->user->name ?? 'Unknown' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Umusanzu Ugenwe</label>
                        <div class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 font-semibold">
                            {{ number_format($period->contribution_amount, 0) }} {{ $group->currency ?? 'RWF' }}
                        </div>
                        <input type="hidden" name="amount" value="{{ $period->contribution_amount }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ibisobanuro (Ntibisabwa)</label>
                        <input type="text" name="notes" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700">
                        Andika
                    </button>
                    <button type="button" onclick="document.getElementById('singleContributeModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
                        Hagarika
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Support Request Modal -->
<div id="supportModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black/50" onclick="document.getElementById('supportModal').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-xl shadow-xl max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Saba Ubufasha</h3>
            <form action="{{ route('group-admin.social-support-periods.support', [$group, $period]) }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Umunyamuryango Ukeneye</label>
                        <select name="member_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">Hitamo umunyamuryango</option>
                            @foreach($activeMembers as $member)
                            <option value="{{ $member->id }}">{{ $member->user->name ?? 'Unknown' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ubwoko bw'Ubufasha</label>
                        <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="death">☠️ Urupfu</option>
                            <option value="marriage">💍 Ubukwe</option>
                            <option value="sickness">🏥 Uburwayi</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Amafaranga Asabwa</label>
                        <input type="number" name="amount" step="0.01" min="0.01" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Andika amafaranga">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ibisobanuro</label>
                        <textarea name="description" rows="3" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Sobanura imimerere..."></textarea>
                    </div>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700">
                        Saba Ubufasha
                    </button>
                    <button type="button" onclick="document.getElementById('supportModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
                        Hagarika
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Distribute Modal -->
<div id="distributeModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black/50" onclick="document.getElementById('distributeModal').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-xl shadow-xl max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Gabanya Amafaranga Asigaye</h3>
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                <p class="text-sm text-blue-700">
                    Ibi bizagabanya <strong>{{ number_format($stats['remaining_balance'], 0) }}</strong> ku buryo bungana ku
                    <strong>{{ $stats['contributors'] }}</strong> abatanze imisanzu
                    (≈ {{ number_format($stats['contributors'] > 0 ? $stats['remaining_balance'] / $stats['contributors'] : 0, 0) }} buri wese).
                </p>
            </div>
            <form action="{{ route('group-admin.social-support-periods.distribute', [$group, $period]) }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ibisobanuro (Ntibisabwa)</label>
                    <input type="text" name="notes" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="urugero: Kugabanya ku iherezo ry'igihe">
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700">
                        Gabanya Nonaha
                    </button>
                    <button type="button" onclick="document.getElementById('distributeModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
                        Hagarika
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Close Period Modal -->
<div id="closeModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black/50" onclick="document.getElementById('closeModal').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-xl shadow-xl max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Funga Igihe</h3>
            @if($stats['pending_supports'] > 0)
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                <p class="text-sm text-yellow-700">
                    ⚠️ Hari ubufasha {{ $stats['pending_supports'] }} butegereje. Bubanze mbere yo gufunga.
                </p>
            </div>
            @else
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4">
                <p class="text-sm text-gray-700">
                    Uzi neza ko ushaka gufunga iki gihe? Iki gikorwa ntikishobora gusubizwaho.
                </p>
            </div>
            <form action="{{ route('group-admin.social-support-periods.close', [$group, $period]) }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ibisobanuro byo Gufunga (Ntibisabwa)</label>
                    <textarea name="notes" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"></textarea>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="flex-1 px-4 py-2 bg-gray-800 text-white rounded-lg font-medium hover:bg-gray-900">
                        Funga Igihe
                    </button>
                    <button type="button" onclick="document.getElementById('closeModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
                        Hagarika
                    </button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>

<!-- Reject Support Modal (Dynamic) -->
<div id="rejectModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black/50" onclick="document.getElementById('rejectModal').classList.add('hidden')"></div>
        <div class="relative bg-white rounded-xl shadow-xl max-w-md w-full p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Hakanira Ubufasha Busabwe</h3>
            <form id="rejectForm" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Impamvu yo Guhakanira</label>
                    <textarea name="approval_notes" rows="3" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500" placeholder="Tanga impamvu..."></textarea>
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700">
                        Hakanira
                    </button>
                    <button type="button" onclick="document.getElementById('rejectModal').classList.add('hidden')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200">
                        Hagarika
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleAllCheckboxes() {
    const checkboxes = document.querySelectorAll('input[name="member_ids[]"]');
    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
    checkboxes.forEach(cb => cb.checked = !allChecked);
}

function openRejectModal(supportId) {
    const form = document.getElementById('rejectForm');
    form.action = '{{ route("group-admin.social-support-periods.reject", [$group, $period, ""]) }}/' + supportId;
    document.getElementById('rejectModal').classList.remove('hidden');
}
</script>
@endsection
