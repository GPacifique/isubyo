@extends('layouts.app')

@section('title', 'User Assignments - ' . $role->display_name)

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white shadow">
        <div class="max-w-7xl mx-auto py-8 px-4">
            <a href="{{ route('admin.roles.index') }}" class="text-indigo-100 hover:text-white flex items-center mb-4">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"/></svg>
                Back to Roles
            </a>
            <h1 class="text-4xl font-bold">User Assignments: {{ $role->display_name }}</h1>
            <p class="text-indigo-100 mt-2">View users with this role assignment</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4">
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow-sm p-5 border-l-4 border-indigo-500">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Total Users</p>
                <p class="text-3xl font-bold text-indigo-600 mt-3">{{ $users->total() }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-5 border-l-4 border-blue-500">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Role</p>
                <p class="text-lg font-bold text-blue-600 mt-3">{{ $role->display_name }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-5 border-l-4 border-green-500">
                <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Permissions</p>
                <p class="text-3xl font-bold text-green-600 mt-3">{{ $role->permissions()->count() }}</p>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Assigned At</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Assigned By</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($users as $userRole)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $userRole->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $userRole->user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $userRole->assigned_at->format('M d, Y H:i A') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                @if($userRole->assignedBy)
                                    {{ $userRole->assignedBy->name }}
                                @else
                                    <span class="text-gray-500">System</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin.user-roles.edit', $userRole->user) }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded transition text-xs">
                                    Manage
                                </a>
                                <form method="POST" action="{{ route('admin.user-roles.revoke', [$userRole->user, $role]) }}" class="inline-block" onsubmit="return confirm('Revoke this role?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition text-xs">
                                        Revoke
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                No users assigned to this role
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
