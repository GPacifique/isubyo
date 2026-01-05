@extends('layouts.app')

@section('title', 'Imisanzu y\'Ubufasha - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 text-white shadow">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold">Imisanzu y'Ikigega cy'Ubufasha</h1>
            <p class="text-emerald-100 mt-2">{{ $group->name }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12 px-4">
        <!-- Back Link -->
        <div class="mb-6">
            <a href="{{ route('group-admin.social-supports', $group) }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Subira ku Busabe bw'Ubufasha
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg shadow-lg p-6 text-white">
                <h3 class="text-sm font-medium text-emerald-100 mb-2">Ikigega Gihari</h3>
                <p class="text-3xl font-bold">{{ number_format($stats['fund_balance'], 0) }}</p>
                <p class="text-xs text-emerald-100 mt-1">RWF</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Imisanzu Yose</h3>
                <p class="text-3xl font-bold text-blue-600">{{ number_format($stats['total_contributions'], 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Uku Kwezi</h3>
                <p class="text-3xl font-bold text-purple-600">{{ number_format($stats['contributions_this_month'], 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-orange-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Abatanze</h3>
                <p class="text-3xl font-bold text-orange-600">{{ $stats['contributors_count'] }}</p>
            </div>
        </div>

        <!-- Add Contribution Quick Form -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Ongeramo Umusanzu Mushya</h3>
            <form method="POST" action="{{ route('group-admin.social-support-contributions.store', $group) }}" class="flex flex-wrap gap-4 items-end">
                @csrf
                <div class="flex-1 min-w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Umunyamuryango</label>
                    <select name="member_id" required class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <option value="">Hitamo...</option>
                        @foreach($group->members()->where('status', 'active')->with('user')->get() as $member)
                            <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-36">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Amafaranga</label>
                    <input type="number" name="amount" step="1" min="1" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        placeholder="0" />
                </div>
                <div class="flex-1 min-w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Inyandiko</label>
                    <input type="text" name="notes"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                        placeholder="Urugero: Umusanzu wa Mutarama" />
                </div>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition">
                    Emeza
                </button>
            </form>
        </div>

        <!-- Contributions Table -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900">Amateka y'Imisanzu</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-emerald-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Itariki</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amafaranga</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Inyandiko</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Wanditswe na</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($contributions as $contribution)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $contribution->created_at->format('M d, Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                    {{ $contribution->member->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-bold text-emerald-600">+{{ number_format($contribution->amount, 0) }} RWF</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $contribution->notes ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $contribution->recordedBy->name ?? 'N/A' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Nta misanzu yabonetse
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($contributions->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $contributions->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
