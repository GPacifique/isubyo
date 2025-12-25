@extends('layouts.app')

@section('title', 'Edit User Roles - ' . $user->name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white shadow">
        <div class="max-w-4xl mx-auto py-8 px-4">
            <a href="{{ route('admin.user-roles.index') }}" class="text-indigo-100 hover:text-white flex items-center mb-4">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"/></svg>
                Back to User Roles
            </a>
            <h1 class="text-4xl font-bold">Edit Roles for {{ $user->name }}</h1>
            <p class="text-indigo-100 mt-2">Assign or revoke roles for this user</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-12 px-4">
        @if($message = session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
                <p class="text-green-800 font-medium">{{ $message }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.user-roles.update', $user) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- User Info -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <p class="text-sm text-blue-800">
                    <strong>User:</strong> {{ $user->name }}<br>
                    <strong>Email:</strong> {{ $user->email }}<br>
                    <strong>System Admin:</strong> <span class="font-semibold">{{ $user->is_admin ? 'Yes' : 'No' }}</span>
                </p>
            </div>

            <!-- Available Roles -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Available Roles</h2>

                @if($roles->isEmpty())
                    <p class="text-gray-500">No roles available.</p>
                @else
                    <div class="space-y-3">
                        @foreach($roles as $role)
                            <label class="flex items-start p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition cursor-pointer">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    class="w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500 border-gray-300 mt-1"
                                    @if(in_array($role->id, $userRoles)) checked @endif>
                                <div class="ml-4 flex-1">
                                    <p class="font-semibold text-gray-900">{{ $role->display_name }}</p>
                                    @if($role->description)
                                        <p class="text-sm text-gray-600 mt-1">{{ $role->description }}</p>
                                    @endif
                                    <div class="mt-2">
                                        <span class="inline-block text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded">
                                            {{ $role->permissions()->count() }} permissions
                                        </span>
                                        @if($role->is_system)
                                            <span class="inline-block text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded ml-2">
                                                System Role
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    @error('roles')
                        <p class="text-red-600 text-sm mt-4">{{ $message }}</p>
                    @enderror
                @endif
            </div>

            <!-- Current Roles -->
            @if($user->userRoles()->exists())
                <div class="bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Current Roles</h2>
                    <div class="space-y-3">
                        @foreach($user->userRoles as $userRole)
                            <div class="flex items-center justify-between p-4 bg-indigo-50 border border-indigo-200 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $userRole->role->display_name }}</p>
                                    <p class="text-sm text-gray-600">
                                        Assigned {{ $userRole->assigned_at->diffForHumans() }}
                                        @if($userRole->assignedBy)
                                            by {{ $userRole->assignedBy->name }}
                                        @endif
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('admin.user-roles.revoke', [$user, $userRole->role]) }}"
                                    class="inline" onsubmit="return confirm('Remove this role?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition text-xs">
                                        Revoke
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="flex gap-4 pt-6 border-t">
                <a href="{{ route('admin.user-roles.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">
                    Update Roles
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
