@extends('layouts.app')

@section('title', 'Imitungo y\'Umunyamuryango - ' . $saving->member->user->name . ' - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white shadow">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold">Imitungo y'{{ $saving->member->user->name }}</h1>
            <p class="text-green-100 mt-2">{{ $group->name }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12 px-4">
        <!-- Back Link -->
        <div class="mb-6">
            <a href="{{ route('group-admin.savings', $group) }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Subira ku Imitungo Byose
            </a>
        </div>

        <!-- Savings Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Umutungo Uriho</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ number_format($saving->current_balance, 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Imitungo Yose</p>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ number_format($saving->total_deposits, 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-orange-500">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Byakuwe Byose</p>
                <p class="text-3xl font-bold text-orange-600 mt-2">{{ number_format($saving->total_withdrawals ?? 0, 2) }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Inyungu Yakuwe</p>
                <p class="text-3xl font-bold text-purple-600 mt-2">{{ number_format($saving->interest_earned ?? 0, 2) }}</p>
            </div>
        </div>

        <!-- Member Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Member Details -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Ibisobanuro by'Umunyamuryango</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Izina</p>
                        <p class="text-lg font-semibold text-gray-900 mt-1">{{ $saving->member->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Imeyili</p>
                        <p class="text-gray-600 mt-1">{{ $saving->member->user->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Umwanya</p>
                        <p class="text-gray-600 mt-1">{{ ucfirst($saving->member->role) }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Byahinduwe</p>
                        <p class="text-gray-600 mt-1">{{ $saving->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Account Stats -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Imibare y'Akawunti</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Umutungo Uriho:</span>
                        <span class="font-semibold text-green-600">{{ number_format($saving->current_balance, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Imitungo Yose:</span>
                        <span class="font-semibold text-blue-600">{{ number_format($saving->total_deposits, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Byakuwe Byose:</span>
                        <span class="font-semibold text-orange-600">{{ number_format($saving->total_withdrawals ?? 0, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">Inyungu Yakuwe:</span>
                        <span class="font-semibold text-purple-600">{{ number_format($saving->interest_earned ?? 0, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900">Imbaraga y'Ibikorwa</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Itariki</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Ubwoko bw'Igikorwa</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amafaranga</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umutungo Nyuma</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Ibisobanuro</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($transactions as $transaction)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $transaction->created_at->format('M d, Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $transaction->type === 'deposit' ? 'bg-green-100 text-green-800' : ($transaction->type === 'withdrawal' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }}">
                                        {{ $transaction->type === 'deposit' ? 'Imitungo' : ($transaction->type === 'withdrawal' ? 'Byakuwe' : 'Inyungu') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                    {{ number_format($transaction->amount, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ number_format($transaction->balance_after, 2) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $transaction->description ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Nta bikorwa byabonetse
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($transactions->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $transactions->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
