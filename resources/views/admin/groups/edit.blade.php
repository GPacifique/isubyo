@extends('layouts.admin')

@section('title', 'Edit Group - ' . $group->name)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Edit Group: {{ $group->name }}</h1>
        <a href="{{ route('admin.groups.show', $group) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Group
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.groups.update', $group) }}">
            @csrf
            @method('PUT')

            <!-- Group Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Group Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $group->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                >{{ old('description', $group->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meeting Frequency -->
            <div class="mb-6">
                <label for="meeting_frequency" class="block text-sm font-bold text-gray-700 mb-2">Meeting Frequency</label>
                <select
                    id="meeting_frequency"
                    name="meeting_frequency"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('meeting_frequency') border-red-500 @enderror"
                    required
                >
                    <option value="weekly" {{ old('meeting_frequency', $group->meeting_frequency) === 'weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="monthly" {{ old('meeting_frequency', $group->meeting_frequency) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                </select>
                @error('meeting_frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-xs mt-2">How often the group meets to collect contributions and manage funds</p>
            </div>

            <!-- Group Administrator(s) -->
            <div class="mb-6">
                <label for="admin_ids" class="block text-sm font-bold text-gray-700 mb-2">Group Administrators (Select one or more)</label>
                <select
                    id="admin_ids"
                    name="admin_ids[]"
                    multiple
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('admin_ids') border-red-500 @enderror"
                >
                    @foreach($admins as $admin)
                        <option value="{{ $admin->id }}" {{ in_array($admin->id, old('admin_ids', $group->admins->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $admin->name }} ({{ $admin->email }})
                        </option>
                    @endforeach
                </select>
                @error('admin_ids')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-xs mt-2">Hold Ctrl (Cmd on Mac) to select multiple administrators</p>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                <select
                    id="status"
                    name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                    required
                >
                    <option value="active" {{ old('status', $group->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $group->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="suspended" {{ old('status', $group->status) === 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Info -->
            <div class="mb-6 p-4 bg-gray-100 rounded-lg">
                <p class="text-sm text-gray-600"><strong>Created:</strong> {{ $group->created_at->format('M d, Y H:i A') }}</p>
                <p class="text-sm text-gray-600"><strong>Last Updated:</strong> {{ $group->updated_at->format('M d, Y H:i A') }}</p>
                <p class="text-sm text-gray-600"><strong>Total Members:</strong> {{ $group->members_count ?? 0 }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mt-8">
                <button
                    type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded transition"
                >
                    Save Changes
                </button>
                <a
                    href="{{ route('admin.groups.show', $group) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded transition"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
