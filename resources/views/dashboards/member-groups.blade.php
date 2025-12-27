@extends('layouts.app')

@section('title', 'My Groups')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">My Groups</h1>
                    <p class="text-gray-600 mt-2">View all groups you belong to</p>
                </div>
                <a href="{{ route('member.dashboard') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Groups Grid -->
        @if($groups->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($groups as $group)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
                        <div class="mb-4">
                            <h3 class="text-lg font-bold text-gray-900">{{ $group->name }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $group->description ?? 'No description' }}</p>
                        </div>

                        <div class="space-y-3 border-t pt-4">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Members</p>
                                <p class="text-xl font-bold text-blue-600">{{ $group->members_count ?? 0 }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Your Role</p>
                                <p class="text-sm font-semibold text-gray-900 capitalize">{{ $group->pivot->role ?? 'member' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Member Status</p>
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $group->pivot->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($group->pivot->status ?? 'active') }}
                                </span>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Joined</p>
                                <p class="text-sm text-gray-600">{{ $group->pivot->created_at ? \Carbon\Carbon::parse($group->pivot->created_at)->format('M d, Y') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $groups->links() }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <p class="text-gray-500 text-lg mb-4">You haven't joined any groups yet.</p>
                <a href="{{ route('admin.groups.index') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                    Browse Groups
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
