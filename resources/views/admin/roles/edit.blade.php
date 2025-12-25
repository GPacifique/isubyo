@extends('layouts.app')

@section('title', 'Edit Role - ' . $role->display_name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white shadow">
        <div class="max-w-4xl mx-auto py-8 px-4">
            <a href="{{ route('admin.roles.index') }}" class="text-indigo-100 hover:text-white flex items-center mb-4">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"/></svg>
                Back to Roles
            </a>
            <h1 class="text-4xl font-bold">Edit Role: {{ $role->display_name }}</h1>
            <p class="text-indigo-100 mt-2">Update role details and permissions</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        @if($message = session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
                <p class="text-green-800 font-medium">{{ $message }}</p>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-8">
            <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Display Name -->
                <div>
                    <label for="display_name" class="block text-sm font-semibold text-gray-700 mb-2">Display Name</label>
                    <input type="text" id="display_name" name="display_name" value="{{ old('display_name', $role->display_name) }}"
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
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description', $role->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permissions -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Permissions</label>
                    <div class="space-y-4">
                        @foreach($permissions as $category => $permissionGroup)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-gray-800 mb-3 capitalize">{{ str_replace('_', ' ', $category) }} Management</h3>
                                <div class="space-y-2 ml-4">
                                    @foreach($permissionGroup as $permission)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                class="w-4 h-4 text-indigo-600 rounded focus:ring-indigo-500 border-gray-300"
                                                @if(in_array($permission->id, $rolePermissions)) checked @endif>
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
                </div>

                <!-- Role Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <p class="text-sm text-blue-800">
                        <strong>Role Name:</strong> {{ $role->name }}<br>
                        <strong>Type:</strong> <span class="inline-block bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">System</span><br>
                        <strong>Created:</strong> {{ $role->created_at->format('M d, Y H:i A') }}
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex gap-4 pt-6 border-t">
                    <a href="{{ route('admin.roles.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">
                        Update Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
