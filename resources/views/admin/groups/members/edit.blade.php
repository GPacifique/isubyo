@extends('layouts.admin')

@section('title', 'Edit Member Role - ' . $member->user->name)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Edit Member: {{ $member->user->name }}</h1>
        <a href="{{ route('admin.groups.members.index', $group) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Members
        </a>
    </div>

    <!-- Member Info Card -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Member Name</p>
                <p class="text-lg font-semibold text-gray-900">{{ $member->user->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Email</p>
                <p class="text-lg font-semibold text-gray-900">{{ $member->user->email }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Group</p>
                <p class="text-lg font-semibold text-gray-900">{{ $group->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Joined</p>
                <p class="text-lg font-semibold text-gray-900">{{ $member->joined_at ? $member->joined_at->format('M d, Y') : 'N/A' }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.groups.members.update', [$group, $member]) }}">
            @csrf
            @method('PUT')

            <!-- Member Role -->
            <div class="mb-6">
                <label for="role" class="block text-sm font-bold text-gray-700 mb-2">Member Role</label>
                <select
                    id="role"
                    name="role"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 @error('role') border-red-500 @enderror"
                    required
                >
                    <option value="member" {{ old('role', $member->role) == 'member' ? 'selected' : '' }}>Member</option>
                    <option value="treasurer" {{ old('role', $member->role) == 'treasurer' ? 'selected' : '' }}>Treasurer</option>
                    <option value="admin" {{ old('role', $member->role) == 'admin' ? 'selected' : '' }}>Group Admin</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mt-3 p-3 bg-blue-50 rounded text-sm text-gray-600">
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
                    <option value="active" {{ old('status', $member->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $member->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="suspended" {{ old('status', $member->status) == 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <p class="text-xs text-gray-500 mt-1">Active members can participate in group activities. Inactive or suspended members lose access temporarily.</p>
            </div>

            <!-- Member Statistics -->
            <div class="grid grid-cols-2 gap-4 mb-6 p-4 bg-gray-50 rounded">
                <div>
                    <p class="text-xs text-gray-600 mb-1">Current Savings</p>
                    <p class="text-xl font-bold text-green-600">GHS {{ number_format($member->current_savings, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-600 mb-1">Total Contributed</p>
                    <p class="text-xl font-bold text-blue-600">GHS {{ number_format($member->total_contributed, 2) }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-600 mb-1">Active Loans</p>
                    <p class="text-xl font-bold text-orange-600">{{ $member->getActiveLoanCount() }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-600 mb-1">Outstanding Balance</p>
                    <p class="text-xl font-bold text-red-600">GHS {{ number_format($member->getTotalOutstandingLoans(), 2) }}</p>
                </div>
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
                    Update Member Role
                </button>
            </div>
        </form>

        <!-- Remove Member Section -->
        <div class="mt-8 pt-6 border-t">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Danger Zone</h3>
            <p class="text-gray-600 text-sm mb-4">Removing a member will delete them from the group permanently. This action cannot be undone.</p>
            <form action="{{ route('admin.groups.members.destroy', [$group, $member]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this member from the group? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                >
                    Remove Member from Group
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
