@extends('layouts.admin')

@section('title', 'Gushyiraho Itsinda Rishya')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Gushyiraho Itsinda Rishya</h1>
        <a href="{{ route('admin.groups.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Subira ku Matsinda
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.groups.store') }}">
            @csrf

            <!-- Group Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Izina ry'Itsinda</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                    placeholder="Andika izina ry'itsinda"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Ibisobanuro</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                    placeholder="Andika ibisobanuro by'itsinda"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meeting Frequency -->
            <div class="mb-6">
                <label for="meeting_frequency" class="block text-sm font-bold text-gray-700 mb-2">Igihe cyo Guhurira</label>
                <select
                    id="meeting_frequency"
                    name="meeting_frequency"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('meeting_frequency') border-red-500 @enderror"
                    required
                >
                    <option value="weekly" {{ old('meeting_frequency') === 'weekly' ? 'selected' : '' }}>Buri Cyumweru</option>
                    <option value="monthly" {{ old('meeting_frequency', 'monthly') === 'monthly' ? 'selected' : '' }}>Buri Kwezi</option>
                </select>
                @error('meeting_frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-xs mt-2">Inshuro itsinda rihurira kugira ngo ryakire imisanzu no gucunga amafaranga</p>
            </div>

            <!-- Group Administrator -->
            <div class="mb-6">
                <label for="admin_id" class="block text-sm font-bold text-gray-700 mb-2">Umuyobozi w'Itsinda</label>
                <select
                    id="admin_id"
                    name="admin_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('admin_id') border-red-500 @enderror"
                >
                    <option value="">Hitamo Umuyobozi (Ntibisabwa)</option>
                    @foreach($admins as $admin)
                        <option value="{{ $admin->id }}" {{ old('admin_id') == $admin->id ? 'selected' : '' }}>
                            {{ $admin->name }} ({{ $admin->email }})
                        </option>
                    @endforeach
                </select>
                @error('admin_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Imiterere</label>
                <select
                    id="status"
                    name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                    required
                >
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Rirakora</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Ntirikora</option>
                    <option value="suspended" {{ old('status') === 'suspended' ? 'selected' : '' }}>Rirahagaritswe</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mt-8">
                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded transition"
                >
                    Shyiraho Itsinda
                </button>
                <a href="{{ route('admin.groups.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded transition text-center">
                    Hagarika
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
