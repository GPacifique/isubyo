@extends('layouts.admin')

@section('title', 'Activity Logs')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Activity Logs</h1>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Dashboard
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <form method="GET" action="{{ route('admin.activity-logs') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Filter by Action -->
            <div>
                <label for="action" class="block text-sm font-bold text-gray-700 mb-2">Filter by Action</label>
                <select name="action" id="action" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">All Actions</option>
                    <option value="login" {{ request('action') == 'login' ? 'selected' : '' }}>Login</option>
                    <option value="logout" {{ request('action') == 'logout' ? 'selected' : '' }}>Logout</option>
                    <option value="create_group" {{ request('action') == 'create_group' ? 'selected' : '' }}>Create Group</option>
                    <option value="update_group" {{ request('action') == 'update_group' ? 'selected' : '' }}>Update Group</option>
                    <option value="delete_group" {{ request('action') == 'delete_group' ? 'selected' : '' }}>Delete Group</option>
                    <option value="create_loan" {{ request('action') == 'create_loan' ? 'selected' : '' }}>Create Loan</option>
                    <option value="record_loan_payment" {{ request('action') == 'record_loan_payment' ? 'selected' : '' }}>Loan Payment</option>
                    <option value="add_member" {{ request('action') == 'add_member' ? 'selected' : '' }}>Add Member</option>
                    <option value="remove_member" {{ request('action') == 'remove_member' ? 'selected' : '' }}>Remove Member</option>
                </select>
            </div>

            <!-- Filter by User -->
            <div>
                <label for="user_id" class="block text-sm font-bold text-gray-700 mb-2">Filter by User</label>
                <select name="user_id" id="user_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    <option value="">All Users</option>
                    @foreach(\App\Models\User::orderBy('name')->get() as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter by Date -->
            <div>
                <label for="date" class="block text-sm font-bold text-gray-700 mb-2">Date</label>
                <input type="date" name="date" id="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ request('date') }}">
            </div>

            <!-- Submit Button -->
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Filter
                </button>
                <a href="{{ route('admin.activity-logs') }}" class="flex-1 bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded text-center">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Activity Logs Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Time</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">User</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Action</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Description</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">IP Address</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Details</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($activities as $activity)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900" title="{{ $activity->performed_at->format('d/m/Y H:i:s') }}">
                            {{ $activity->performed_at->format('d/H:i:s') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            @if($activity->user)
                                <div class="font-semibold">{{ $activity->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $activity->user->email }}</div>
                            @else
                                <span class="text-gray-400">System</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{
                                $activity->action == 'login' ? 'bg-green-100 text-green-800' :
                                ($activity->action == 'logout' ? 'bg-gray-100 text-gray-800' :
                                ($activity->action == 'delete_group' || str_contains($activity->action, 'delete') ? 'bg-red-100 text-red-800' :
                                ($activity->action == 'create_group' || str_contains($activity->action, 'create') ? 'bg-blue-100 text-blue-800' :
                                'bg-yellow-100 text-yellow-800')))
                            }}">
                                {{ str_replace('_', ' ', ucwords($activity->action, '_')) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $activity->description }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-mono">
                            {{ $activity->ip_address }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            @if($activity->data)
                                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-xs" onclick="showData({{ $activity->id }})">
                                    View Data
                                </button>
                                <div id="data-{{ $activity->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" onclick="closeData({{ $activity->id }})">
                                    <div class="bg-white rounded-lg p-6 max-w-2xl w-full mx-4" onclick="event.stopPropagation()">
                                        <h3 class="text-lg font-bold mb-4">Activity Data</h3>
                                        <pre class="bg-gray-100 p-4 rounded overflow-auto max-h-96 text-sm">{{ json_encode($activity->data, JSON_PRETTY_PRINT) }}</pre>
                                        <button type="button" class="mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="closeData({{ $activity->id }})">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No activity logs found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $activities->links() }}
    </div>
</div>

<script>
function showData(id) {
    document.getElementById('data-' + id).classList.remove('hidden');
}

function closeData(id) {
    document.getElementById('data-' + id).classList.add('hidden');
}
</script>
@endsection
