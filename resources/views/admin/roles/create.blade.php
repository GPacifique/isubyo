@extends('layouts.app')

@section('title', 'Create New Role - Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white shadow">
        <div class="max-w-4xl mx-auto py-8 px-4">
            <a href="{{ route('admin.roles.index') }}" class="text-indigo-100 hover:text-white flex items-center mb-4">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"/></svg>
                Back to Roles
            </a>
            <h1 class="text-4xl font-bold">Create New Role</h1>
            <p class="text-indigo-100 mt-2">Define a new system role with specific permissions</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <div class="bg-white rounded-lg shadow-md p-8">
            <form method="POST" action="{{ route('admin.roles.store') }}" class="space-y-6">
                @csrf

                <!-- Role Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Role Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        placeholder="e.g., content_manager" required>
                    <p class="text-xs text-gray-500 mt-1">Use lowercase letters and underscores only</p>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Display Name -->
                <div>
                    <label for="display_name" class="block text-sm font-semibold text-gray-700 mb-2">Display Name</label>
                    <input type="text" id="display_name" name="display_name" value="{{ old('display_name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 @error('display_name') border-red-500 @enderror"
                        placeholder="e.g., Content Manager" required>
                    @error('display_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 @error('description') border-red-500 @enderror"
                        placeholder="Describe the purpose of this role...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permissions -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Assign Permissions</label>
                    <div class="space-y-4">
                        @foreach($permissions as $category => $permissionGroup)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-gray-800 mb-3 capitalize">{{ str_replace('_', ' ', $category) }} Management</h3>
                                <div class="space-y-2 ml-4">
                                    @foreach($permissionGroup as $permission)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                class="w-4 h-4 text-indigo-600 rounded focus:ring-indigo-500 border-gray-300"
                                                @if(in_array($permission->id, old('permissions', []))) checked @endif>
                                            <span class="ml-3 text-sm text-gray-700">
                                                <span class="font-medium">{{ $permission->display_name }}</span>
                                                @if($permission->description)
                                                    <span class="text-gray-500"> - {{ $permission->description }}</span>
                                                @endif
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('permissions')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex gap-4 pt-6 border-t">
                    <a href="{{ route('admin.roles.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">
                        Create Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
