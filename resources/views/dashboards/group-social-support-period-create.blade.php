@extends('layouts.app')

@section('title', 'Gushyiraho Igihe cy\'Ubufasha - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50 py-6">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-6">
            <a href="{{ route('group-admin.social-support-periods.index', $group) }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 mb-4">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Subira ku Bihe
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Gushyiraho Igihe Gishya</h1>
            <p class="text-gray-500 mt-1">{{ $group->name }}</p>
        </div>

        <!-- Flash Messages -->
        @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
        @endif

        <!-- Info Card -->
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
            <div class="flex">
                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="text-sm text-blue-700">
                    <p class="font-medium">Uko Ibihe by'Ubufasha Bikora:</p>
                    <ol class="list-decimal ml-4 mt-2 space-y-1">
                        <li><strong>Kwakira:</strong> Buri munyamuryango atanga umusanzu ugenwe</li>
                        <li><strong>Ubufasha:</strong> Abanyamuryango bakeneye (urupfu, ubukwe, uburwayi) bahabwa ubufasha</li>
                        <li><strong>Kugabana:</strong> Igihe kirangiye, amafaranga asigaye agabanwa ku batanze imisanzu</li>
                    </ol>
                    <p class="mt-2 text-blue-600 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                        Itsinda rihurira: <strong class="uppercase">{{ ($group->meeting_frequency ?? 'monthly') === 'weekly' ? 'BURI CYUMWERU' : 'BURI KWEZI' }}</strong>
                    </p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <form action="{{ route('group-admin.social-support-periods.store', $group) }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <!-- Period Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Izina ry'Igihe <span class="text-red-500">*</span>
                        </label>
                        @php
                            $isWeekly = ($group->meeting_frequency ?? 'monthly') === 'weekly';
                            $defaultName = $isWeekly ? 'Icyumweru cya ' . now()->weekOfYear . ' - ' . now()->format('Y') : now()->format('F Y');
                            $startDate = $isWeekly ? now()->startOfWeek()->format('Y-m-d') : now()->startOfMonth()->format('Y-m-d');
                            $endDate = $isWeekly ? now()->endOfWeek()->format('Y-m-d') : now()->endOfMonth()->format('Y-m-d');
                        @endphp
                        <input type="text" name="name" id="name" value="{{ old('name', $defaultName) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror"
                            placeholder="{{ $isWeekly ? 'urugero: Icyumweru cya 1 - 2026' : 'urugero: Mutarama 2026' }}">
                        @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date Range -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">
                                Itariki y'Itangira <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $startDate) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('start_date') border-red-500 @enderror">
                            @error('start_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">
                                Itariki y'Iherezo <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $endDate) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('end_date') border-red-500 @enderror">
                            @error('end_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $isWeekly ? '(Iminsi 7 ku nama buri cyumweru)' : '(Iminsi ~30 ku nama buri kwezi)' }}
                            </p>
                        </div>
                    </div>

                    <!-- Contribution Amount -->
                    <div>
                        <label for="contribution_amount" class="block text-sm font-medium text-gray-700 mb-1">
                            Umusanzu ku Munyamuryango <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">{{ $group->currency ?? 'RWF' }}</span>
                            <input type="number" name="contribution_amount" id="contribution_amount" value="{{ old('contribution_amount', 1000) }}" step="0.01" min="0.01"
                                class="w-full pl-14 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('contribution_amount') border-red-500 @enderror"
                                placeholder="1000">
                        </div>
                        @error('contribution_amount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">
                            Igiteganijwe cyose: {{ number_format(old('contribution_amount', 1000) * $activeMembers, 0) }} ({{ $activeMembers }} abanyamuryango barakora × {{ old('contribution_amount', 1000) }})
                        </p>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">
                            Ibisobanuro (Ntibisabwa)
                        </label>
                        <textarea name="notes" id="notes" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('notes') border-red-500 @enderror"
                            placeholder="Ibisobanuro byinyongera kuri iki gihe...">{{ old('notes') }}</textarea>
                        @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Summary -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Incamake y'Igihe</h3>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">Abanyamuryango Barakora:</span>
                                <span class="font-medium text-gray-900 ml-2">{{ $activeMembers }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Umusanzu ku Muntu:</span>
                                <span class="font-medium text-gray-900 ml-2" id="summaryContribution">{{ number_format(old('contribution_amount', 1000), 0) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-3 mt-6 pt-6 border-t border-gray-200">
                    <button type="submit" class="inline-flex items-center justify-center px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 font-medium transition order-1 sm:order-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Shyiraho Igihe
                    </button>
                    <a href="{{ route('group-admin.social-support-periods.index', $group) }}" class="inline-flex items-center justify-center px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition order-2 sm:order-1">
                        Hagarika
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('contribution_amount').addEventListener('input', function() {
    document.getElementById('summaryContribution').textContent = new Intl.NumberFormat().format(this.value || 0);
});
</script>
@endsection
