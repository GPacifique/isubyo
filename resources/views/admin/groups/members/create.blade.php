@extends('layouts.admin')

@section('title', 'Add Member to ' . $group->name)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Add Member to {{ $group->name }}</h1>
        <a href="{{ route('admin.groups.members.index', $group) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Members
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.groups.members.store', $group) }}">
            @csrf

            <!-- User Selection -->
            <div class="mb-6">
                <label for="user_id" class="block text-sm font-bold text-gray-700 mb-2">Select User</label>
                <select
                    id="user_id"
                    name="user_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('user_id') border-red-500 @enderror"
                    required
                >
                    <option value="">-- Choose a user --</option>
                    @foreach ($availableUsers as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                @if ($availableUsers->isEmpty())
                    <p class="text-yellow-600 text-sm mt-2">No available users to add. All users may already be members of this group.</p>
                @endif
            </div>

            <!-- Member Role -->
            <div class="mb-6">
                <label for="role" class="block text-sm font-bold text-gray-700 mb-2">Member Role</label>
                <select
                    id="role"
                    name="role"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('role') border-red-500 @enderror"
                    required
                >
                    <option value="">-- Select Role --</option>
                    <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                    <option value="treasurer" {{ old('role') == 'treasurer' ? 'selected' : '' }}>Treasurer</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Group Admin</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-2 p-3 bg-blue-50 rounded text-sm text-gray-600">
                    <p class="font-semibold mb-2">Role Descriptions:</p>
                    <ul class="space-y-1 text-xs">
                        <li><strong>Member:</strong> Regular group member with basic access</li>
                        <li><strong>Treasurer:</strong> Manages financial records and transactions</li>
                        <li><strong>Group Admin:</strong> Full control over group operations</li>
                    </ul>
                </div>
            </div>

            <!-- Member Status -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                <select
                    id="status"
                    name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                    required
                >
                    <option value="">-- Select Status --</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <p class="text-xs text-gray-500 mt-1">Active members can participate in group activities</p>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between gap-3 pt-6 border-t">
                <a href="{{ route('admin.groups.members.index', $group) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded"
                >
                    Add Member to Group
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
