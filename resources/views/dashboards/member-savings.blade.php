@extends('layouts.app')

@section('title', 'Ubwizigame Bwanjye')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Ubwizigame Bwanjye</h1>
                    <p class="text-gray-600 mt-2">Reba konti z'ubwizigame n'amafaranga ariho</p>
                </div>
                <a href="{{ route('member.dashboard') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                    ← Subira ku Kibaho
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Amafaranga Yose</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ number_format($stats['total_balance'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Byizigamwe Byose</p>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ number_format($stats['total_saved'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Inyungu Zabonetse</p>
                <p class="text-3xl font-bold text-emerald-600 mt-2">{{ number_format($stats['total_interest'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Konti</p>
                <p class="text-3xl font-bold text-purple-600 mt-2">{{ $stats['account_count'] ?? 0 }}</p>
            </div>
        </div>

        <!-- Savings Accounts -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-900">Konti z'Ubwizigame Zose</h2>
            </div>

            @if($savings->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Itsinda</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Ubwizigame bwa Buri Cyumweru</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Byashyizweho Byose</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Byakuwe</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Inyungu Zabonetse</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Amafaranga Ariho</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Yafunguwe</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($savings as $saving)
                                <tr class="hover:bg-blue-50 cursor-pointer transition" onclick="window.location.href='{{ route('member.savings.history', $saving->id) }}'">
                                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $saving->group->name }}</td>
                                    <td class="px-6 py-4 text-sm text-blue-600 font-semibold">{{ number_format($saving->current_balance ?? 0, 0) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ number_format($saving->total_deposits ?? 0, 0) }}</td>
                                    <td class="px-6 py-4 text-sm text-red-600">{{ number_format($saving->total_withdrawals ?? 0, 0) }}</td>
                                    <td class="px-6 py-4 text-sm text-emerald-600 font-semibold">{{ number_format($saving->interest_earned ?? 0, 0) }}</td>
                                    <td class="px-6 py-4 text-sm text-green-600 font-bold">{{ number_format($saving->balance ?? 0, 0) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $saving->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t">
                    {{ $savings->links() }}
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <p class="text-gray-500 text-lg">Nta konti y'ubwizigame ufite.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
