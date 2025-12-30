@extends('layouts.app')

@section('title', 'Amateka y\'Ubwizigame')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Amateka y'Ubwizigame</h1>
                    <p class="text-gray-600 mt-2">{{ $saving->group->name }} - Amateka y'ibikorwa byose</p>
                </div>
                <a href="{{ route('member.savings') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                    ← Subira ku Bwizigame
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Account Summary -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Amafaranga Ariho</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ number_format($stats['current_balance'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Byashyizweho Byose</p>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ number_format($stats['total_deposited'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Byakuwe Byose</p>
                <p class="text-3xl font-bold text-red-600 mt-2">{{ number_format($stats['total_withdrawn'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Inyungu Zabonetse</p>
                <p class="text-3xl font-bold text-emerald-600 mt-2">{{ number_format($stats['interest_earned'] ?? 0, 0) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-xs text-gray-500 uppercase font-semibold">Ibikorwa</p>
                <p class="text-3xl font-bold text-purple-600 mt-2">{{ $stats['deposit_count'] + $stats['withdrawal_count'] }}</p>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-900">Amateka y'Ibikorwa</h2>
            </div>

            @if($transactions->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Itariki</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Ubwoko</th>
                                <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">Amafaranga</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Ibisobanuro</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 rounded text-xs font-semibold {{ $transaction->type === 'deposit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst(str_replace('_', ' ', $transaction->type)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-right {{ $transaction->type === 'deposit' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $transaction->type === 'deposit' ? '+' : '-' }}{{ number_format($transaction->amount, 0) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction->description ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t">
                    {{ $transactions->links() }}
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <p class="text-gray-500 text-lg">Nta gikorwa cyabonetse kuri iyi konti y'ubwizigame.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
