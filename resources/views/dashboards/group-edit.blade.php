@extends('layouts.app')

@section('title', 'Hindura Itsinda - ' . $group->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-600 to-orange-800 text-white shadow">
        <div class="max-w-4xl mx-auto py-8 px-4">
            <h1 class="text-3xl font-bold">Hindura Igenamiterere ry'Itsinda</h1>
            <p class="text-orange-100 mt-2">{{ $group->name }}</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <!-- Back Link -->
        <div class="mb-6">
            <a href="{{ route('group-admin.dashboard') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Subira ku Kibaho
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm p-8">
            <form action="{{ route('admin.groups.update', $group) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Group Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Izina ry'Itsinda
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('name') border-red-500 @enderror"
                        value="{{ old('name', $group->name) }}"
                        placeholder="Andika izina ry'itsinda">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Group Type -->
                <div>
                    <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                        Ubwoko bw'Itsinda
                        <span class="text-red-600">*</span>
                    </label>
                    <select name="type" id="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('type') border-red-500 @enderror">
                        <option value="itsinda" {{ old('type', $group->type) === 'itsinda' ? 'selected' : '' }}>Itsinda (Ry'Imitungo)</option>
                        <option value="umurenge" {{ old('type', $group->type) === 'umurenge' ? 'selected' : '' }}>Umurenge (Koperative)</option>
                        <option value="other" {{ old('type', $group->type) === 'other' ? 'selected' : '' }}>Ibindi</option>
                    </select>
                    @error('type')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Ibisobanuro
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('description') border-red-500 @enderror"
                        placeholder="Andika ibisobanuro by'itsinda...">{{ old('description', $group->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                        Imimerere
                        <span class="text-red-600">*</span>
                    </label>
                    <select name="status" id="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('status') border-red-500 @enderror">
                        <option value="active" {{ old('status', $group->status) === 'active' ? 'selected' : '' }}>Birakora</option>
                        <option value="inactive" {{ old('status', $group->status) === 'inactive' ? 'selected' : '' }}>Ntibikora</option>
                        <option value="suspended" {{ old('status', $group->status) === 'suspended' ? 'selected' : '' }}>Byahagaritswe</option>
                    </select>
                    @error('status')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Approval Status (Read-only) -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Imimerere y'Icyemezo</p>
                    <p class="text-lg font-bold text-gray-900">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $group->approval_status === 'approved' ? 'bg-green-100 text-green-800' : ($group->approval_status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($group->approval_status) }}
                        </span>
                    </p>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6 border-t">
                    <button type="submit" class="flex-1 px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Bika Impinduka
                    </button>
                    <a href="{{ route('group-admin.dashboard') }}" class="flex-1 px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Hagarika
                    </a>
                </div>
            </form>
        </div>

        <!-- Info Box -->
        <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-blue-900 mb-2">ℹ️ Igenamiterere ry'Itsinda</h3>
            <ul class="text-blue-800 space-y-2 text-sm">
                <li>• <strong>Izina ry'Itsinda:</strong> Izina ryemewe ry'itsinda ryawe</li>
                <li>• <strong>Ubwoko bw'Itsinda:</strong> Icyiciro cy'itsinda (Itsinda, Umurenge, n'ibindi)</li>
                <li>• <strong>Ibisobanuro:</strong> Ibisobanuro bigufi ku ntego n'imigambi by'itsinda</li>
                <li>• <strong>Imimerere:</strong> Igenzura niba itsinda rikora, ntirirakora, cyangwa ryahagaritswe</li>
                <li>• <strong>Imimerere y'Icyemezo:</strong> Yerekana niba itsinda ryemejwe n'umuyobozi mukuru wa sisitemu</li>
            </ul>
        </div>
    </div>
</div>
@endsection
