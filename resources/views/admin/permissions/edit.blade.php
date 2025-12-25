@extends('layouts.app')

@section('title', 'Edit Permission - ' . $permission->display_name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white shadow">
        <div class="max-w-4xl mx-auto py-8 px-4">
            <a href="{{ route('admin.permissions.index') }}" class="text-indigo-100 hover:text-white flex items-center mb-4">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"/></svg>
                Back to Permissions
            </a>
            <h1 class="text-4xl font-bold">Edit Permission</h1>
            <p class="text-indigo-100 mt-2">Update permission details</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        @if($message = session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
                <p class="text-green-800 font-medium">{{ $message }}</p>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-8">
            <form method="POST" action="{{ route('admin.permissions.update', $permission) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Permission Name (Read-only) -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Permission Name</label>
                    <input type="text" id="name" value="{{ $permission->name }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-700" readonly>
                    <p class="text-xs text-gray-500 mt-1">Permission names cannot be changed</p>
                </div>

                <!-- Display Name -->
                <div>
                    <label for="display_name" class="block text-sm font-semibold text-gray-700 mb-2">Display Name</label>
                    <input type="text" id="display_name" name="display_name" value="{{ old('display_name', $permission->display_name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 @error('display_name') border-red-500 @enderror"
                        required>
                    @error('display_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description', $permission->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permission Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <p class="text-sm text-blue-800">
                        <strong>Used by {{ $permission->roles()->count() }} role(s)</strong><br>
                        <strong>Created:</strong> {{ $permission->created_at->format('M d, Y H:i A') }}
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex gap-4 pt-6 border-t">
                    <a href="{{ route('admin.permissions.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">
                        Update Permission
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
