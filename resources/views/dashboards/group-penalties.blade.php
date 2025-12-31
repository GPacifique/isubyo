@extends('layouts.app')

@section('title', 'Ibihano by\'Itsinda - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-red-800 text-white shadow">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold">Gucunga Ibihano</h1>
            <p class="text-red-100 mt-2">{{ $group->name }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12 px-4">
        <!-- Back Link & Create Button -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('group-admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Subira ku Kibaho
            </a>
            <button
                onclick="showCreatePenaltyModal()"
                class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition flex items-center"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ongeraho Igihano
            </button>
        </div>

        <!-- Filters -->
        <div class="mb-6 bg-white rounded-lg shadow-sm p-4">
            <form method="GET" class="flex gap-2 flex-wrap">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Shakisha ku izina cyangwa imeyili..."
                    class="flex-1 min-w-48 px-4 py-2 text-sm text-gray-900 placeholder-gray-500 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none"
                />
                <select
                    name="status"
                    class="px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none"
                >
                    <option value="">Imimerere Yose</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Gikorera</option>
                    <option value="waived" {{ request('status') === 'waived' ? 'selected' : '' }}>Byakuweho</option>
                </select>
                <select
                    name="type"
                    class="px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none"
                >
                    <option value="">Ubwoko Bwose</option>
                    <option value="late_payment" {{ request('type') === 'late_payment' ? 'selected' : '' }}>Kutishyura ku Gihe</option>
                    <option value="violation" {{ request('type') === 'violation' ? 'selected' : '' }}>Kwica Amategeko</option>
                    <option value="default" {{ request('type') === 'default' ? 'selected' : '' }}>Kutishyura</option>
                    <option value="other" {{ request('type') === 'other' ? 'selected' : '' }}>Ibindi</option>
                </select>
                <button
                    type="submit"
                    class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition"
                >
                    Shaka
                </button>
                @if(request('search') || request('status') || request('type'))
                    <a href="{{ route('group-admin.penalties', $group) }}" class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-lg hover:bg-gray-500 transition">
                        Siba Byose
                    </a>
                @endif
            </form>
        </div>

        <!-- Stats Cards -->
        @php
            $activePenalties = $penalties->count();
            $totalAmount = $group->penalties()->where('waived', false)->sum('amount');
            $waivedCount = $group->penalties()->where('waived', true)->count();
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-red-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Ibihano Bikorera</h3>
                <p class="text-3xl font-bold text-red-600">{{ $activePenalties }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-orange-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Amafaranga Yose (Bikorera)</h3>
                <p class="text-3xl font-bold text-orange-600">{{ number_format($totalAmount, 2) }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                <h3 class="text-sm font-medium text-gray-600 mb-2">Ibihano Byakuweho</h3>
                <p class="text-3xl font-bold text-green-600">{{ $waivedCount }}</p>
            </div>
        </div>

        <!-- Penalties Table -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-900">Ibihano Byose</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-red-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Umunyamuryango</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Ubwoko</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Amafaranga</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Impamvu</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Itariki</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Imimerere</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Ibikorwa</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($penalties as $penalty)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">
                                    {{ $penalty->member->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        {{ str_replace('_', ' ', ucfirst($penalty->type)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{ number_format($penalty->amount, 2) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ Str::limit($penalty->reason, 30) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $penalty->applied_at?->format('M d, Y') ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($penalty->waived)
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                            ✓ Byakuweho
                                        </span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                            ⚠️ Gikorera
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex gap-2">
                                        @if(!$penalty->waived)
                                            <button
                                                onclick="showWaivePenaltyModal({{ $penalty->id }}, '{{ $penalty->member->user->name }}', '{{ number_format($penalty->amount, 2) }}')"
                                                class="px-3 py-1 bg-green-100 hover:bg-green-200 text-green-700 font-semibold rounded text-xs transition"
                                            >
                                                Kuraho
                                            </button>
                                            <button
                                                onclick="showEditPenaltyModal({{ $penalty->id }}, '{{ $penalty->type }}', '{{ $penalty->amount }}', '{{ $penalty->reason }}')"
                                                class="px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold rounded text-xs transition"
                                            >
                                                Hindura
                                            </button>
                                        @endif
                                        <button
                                            onclick="showDeletePenaltyModal({{ $penalty->id }}, '{{ $penalty->member->user->name }}')"
                                            class="px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 font-semibold rounded text-xs transition"
                                        >
                                            Siba
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    Nta bihano byabonetse
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($penalties->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $penalties->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Create Penalty Modal -->
<div id="createPenaltyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 max-h-screen overflow-y-auto">
        <div class="bg-red-600 text-white p-6">
            <h2 class="text-xl font-bold">Ongeraho Igihano Gishya</h2>
        </div>
        <form method="POST" action="{{ route('group-admin.penalties.store', $group) }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Umunyamuryango *</label>
                <select name="member_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <option value="">Hitamo umunyamuryango</option>
                    @foreach($group->members()->where('status', 'active')->with('user')->get() as $member)
                        <option value="{{ $member->id }}">{{ $member->user->name }}</option>
                    @endforeach
                </select>
                @error('member_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ubwoko bw'Igihano *</label>
                <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                    <option value="">Hitamo ubwoko</option>
                    <option value="late_payment">Kutishyura ku Gihe</option>
                    <option value="violation">Kwica Amategeko</option>
                    <option value="default">Kutishyura</option>
                    <option value="other">Ibindi</option>
                </select>
                @error('type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Amafaranga *</label>
                <input
                    type="number"
                    name="amount"
                    step="0.01"
                    min="0"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    placeholder="0.00"
                />
                @error('amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Impamvu *</label>
                <textarea
                    name="reason"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    rows="3"
                    placeholder="Ibisobanuro by'igihano..."
                ></textarea>
                @error('reason') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('createPenaltyModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Hagarika
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition"
                >
                    Kora Igihano
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Waive Penalty Modal -->
<div id="waivePenaltyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="bg-green-600 text-white p-6">
            <h2 class="text-xl font-bold">Kuraho Igihano</h2>
        </div>
        <form id="waivePenaltyForm" method="POST" class="p-6 space-y-4">
            @csrf
            <p class="text-gray-600">
                <strong>Umunyamuryango:</strong> <span id="waiveMemberName"></span><br>
                <strong>Amafaranga:</strong> <span id="waiveAmount"></span>
            </p>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Impamvu yo Gukuraho *</label>
                <textarea
                    name="waived_reason"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    rows="3"
                    placeholder="Kuki iki gihano gikuweho?"
                ></textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('waivePenaltyModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Hagarika
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition"
                >
                    Emeza Gukuraho
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Penalty Modal -->
<div id="editPenaltyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 max-h-screen overflow-y-auto">
        <div class="bg-blue-600 text-white p-6">
            <h2 class="text-xl font-bold">Hindura Igihano</h2>
        </div>
        <form id="editPenaltyForm" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ubwoko bw'Igihano *</label>
                <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="late_payment">Kutishyura ku Gihe</option>
                    <option value="violation">Kwica Amategeko</option>
                    <option value="default">Kutishyura</option>
                    <option value="other">Ibindi</option>
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
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="0.00"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Impamvu *</label>
                <textarea
                    name="reason"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    rows="3"
                    placeholder="Ibisobanuro by'igihano..."
                ></textarea>
            </div>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('editPenaltyModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Hagarika
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition"
                >
                    Hindura Igihano
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Penalty Modal -->
<div id="deletePenaltyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="bg-red-600 text-white p-6">
            <h2 class="text-xl font-bold">Siba Igihano</h2>
        </div>
        <form id="deletePenaltyForm" method="POST" class="p-6 space-y-4">
            @csrf
            @method('DELETE')

            <p class="text-gray-600">
                Uremeza ko ushaka gusiba igihano cya <strong id="deleteMemberName"></strong>?<br>
                Iki gikorwa ntigishobora gusubirwaho.
            </p>

            <div class="flex gap-2 pt-4">
                <button
                    type="button"
                    onclick="hideModal('deletePenaltyModal')"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition"
                >
                    Hagarika
                </button>
                <button
                    type="submit"
                    class="flex-1 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition"
                >
                    Siba
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showCreatePenaltyModal() {
        document.getElementById('createPenaltyModal').classList.remove('hidden');
    }

    function showWaivePenaltyModal(penaltyId, memberName, amount) {
        document.getElementById('waiveMemberName').textContent = memberName;
        document.getElementById('waiveAmount').textContent = amount;
        document.getElementById('waivePenaltyForm').action = `{{ route('group-admin.penalties.waive', 'PENALTY_ID') }}`.replace('PENALTY_ID', penaltyId);
        document.getElementById('waivePenaltyModal').classList.remove('hidden');
    }

    function showEditPenaltyModal(penaltyId, type, amount, reason) {
        document.getElementById('editPenaltyForm').action = `{{ route('group-admin.penalties.update', 'PENALTY_ID') }}`.replace('PENALTY_ID', penaltyId);
        document.querySelector('#editPenaltyModal input[name="amount"]').value = amount;
        document.querySelector('#editPenaltyModal select[name="type"]').value = type;
        document.querySelector('#editPenaltyModal textarea[name="reason"]').value = reason;
        document.getElementById('editPenaltyModal').classList.remove('hidden');
    }

    function showDeletePenaltyModal(penaltyId, memberName) {
        document.getElementById('deleteMemberName').textContent = memberName;
        document.getElementById('deletePenaltyForm').action = `{{ route('group-admin.penalties.destroy', 'PENALTY_ID') }}`.replace('PENALTY_ID', penaltyId);
        document.getElementById('deletePenaltyModal').classList.remove('hidden');
    }

    function hideModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Close modal when clicking outside
    document.querySelectorAll('[id$="Modal"]').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    });
</script>
@endsection
