@extends('layouts.app')

@section('title', 'Imitungo y\'Itsinda - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white shadow">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold">Imitungo y'Itsinda</h1>
            <p class="text-green-100 mt-2">{{ $group->name }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12 px-4">
        <!-- Back Link and Action Buttons -->
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('group-admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Subira ku Kibaho
            </a>
            <a href="{{ route('group-admin.record-savings', $group) }}" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Andika Imitungo
            </a>
        </div>

        <!-- Search Box -->
        <div class="mb-6">
            <form method="GET" class="flex gap-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Shakisha ku izina cyangwa imeyili..."
                    class="flex-1 px-4 py-2 text-sm text-gray-900 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                />
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition"
                >
                    Shakisha
                </button>
                @if(request('search'))
                    <a href="{{ route('group-admin.savings', $group) }}" class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg hover:bg-gray-500 transition">
                        Siba
                    </a>
                @endif
            </form>
        </div>

        <!-- Savings Table -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900">Konti z'Imitungo Zose</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umutungo Uriho</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Imitungo Yose</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Byakuwe Byose</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Inyungu Yakuwe</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Byahinduwe</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($savings as $saving)
                            <tr class="hover:bg-blue-50 transition cursor-pointer" onclick="window.location.href='{{ route('group-admin.savings.history', [$group, $saving]) }}'">
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">{{ $saving->member->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-600">{{ number_format($saving->current_balance, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ number_format($saving->total_deposits, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ number_format($saving->total_withdrawals ?? 0, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ number_format($saving->interest_earned ?? 0, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $saving->updated_at->format('M d, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    Nta konti z'imitungo zabonetse
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($savings->hasPages())
                <div class="px-6 py-4 border-t">
                    {{ $savings->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
