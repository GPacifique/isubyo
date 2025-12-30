@extends('layouts.app')

@section('title', 'Ibyakozwe Byanjye')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Ibyakozwe Byanjye</h1>
                    <p class="text-gray-600 mt-2">Reba ibikorwa byose by'amafaranga yawe</p>
                </div>
                <a href="{{ route('member.dashboard') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                    ← Subira ku Kibaho
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Transactions List -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-900">Ibyakozwe Byose</h2>
            </div>

            @if($transactions->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Itariki</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Itsinda</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Ubwoko</th>
                                <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">Amafaranga</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Ibisobanuro</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $transaction->group->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 rounded text-xs font-semibold {{ $transaction->type === 'loan_payment' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                            {{ ucfirst(str_replace('_', ' ', $transaction->type)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-right {{ $transaction->type === 'loan_payment' ? 'text-red-600' : 'text-green-600' }}">
                                        {{ $transaction->type === 'loan_payment' ? '-' : '+' }}{{ number_format($transaction->amount, 0) }}
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
                    <p class="text-gray-500 text-lg">Nta gikorwa cyabonetse.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
