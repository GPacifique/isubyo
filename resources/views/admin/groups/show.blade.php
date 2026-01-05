@extends('layouts.admin')

@section('title', 'Reba Itsinda - ' . $group->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Itsinda: {{ $group->name }}</h1>
        <div class="space-x-4">
            <a href="{{ route('admin.groups.members.index', $group) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                Gucunga Abanyamuryango
            </a>
            <a href="{{ route('admin.groups.edit', $group) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Hindura Itsinda
            </a>
            <a href="{{ route('admin.groups.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Subira ku Matsinda
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Group Info -->
        <div class="md:col-span-2 bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Amakuru y'Itsinda</h2>
            <div class="space-y-3">
                <div class="py-2 border-b">
                    <p class="text-xs text-gray-500 uppercase">Nomero y'Itsinda</p>
                    <p class="text-lg font-semibold text-gray-900">#{{ $group->id }}</p>
                </div>
                <div class="py-2 border-b">
                    <p class="text-xs text-gray-500 uppercase">Izina</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $group->name }}</p>
                </div>
                <div class="py-2 border-b">
                    <p class="text-xs text-gray-500 uppercase">Ibisobanuro</p>
                    <p class="text-sm text-gray-700">{{ $group->description ?? 'Nta bisobanuro byatanzwe' }}</p>
                </div>
                <div class="py-2 border-b">
                    <p class="text-xs text-gray-500 uppercase">Igihe cyo Guhurira</p>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold {{ $group->meeting_frequency === 'weekly' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                        📅 {{ ($group->meeting_frequency ?? 'monthly') === 'weekly' ? 'Buri Cyumweru' : 'Buri Kwezi' }}
                    </span>
                </div>
                <div class="py-2 border-b">
                    <p class="text-xs text-gray-500 uppercase">Abayobozi</p>
                    @if($group->admins->count() > 0)
                        <div class="space-y-2 mt-2">
                            @foreach($group->admins as $admin)
                                <div class="inline-block px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold mr-2">
                                    {{ $admin->name }}
                                    <span class="text-purple-600">({{ $admin->email }})</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-600 mt-1">Nta bayobozi bashyizweho</p>
                    @endif
                </div>
                <div class="py-2 border-b">
                    <p class="text-xs text-gray-500 uppercase">Imiterere</p>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold {{ $group->status === 'active' ? 'bg-green-100 text-green-800' : ($group->status === 'suspended' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                        {{ ucfirst($group->status) }}
                    </span>
                </div>
                <div class="py-2">
                    <p class="text-xs text-gray-500 uppercase">Ryashyizweho</p>
                    <p class="text-sm text-gray-700">{{ $group->created_at->format('M d, Y H:i A') }}</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Imibare y'Ibanze</h3>
            <div class="space-y-3">
                <div class="text-center py-2 bg-blue-50 rounded-lg">
                    <p class="text-xl font-bold text-blue-600">{{ $totalMembers }}</p>
                    <p class="text-xs text-gray-600">Abanyamuryango Bose</p>
                    <p class="text-xs text-blue-600 mt-1">{{ $activeMembers }} barakora</p>
                </div>
                <div class="text-center py-2 bg-green-50 rounded-lg">
                    <p class="text-xl font-bold text-green-600">{{ $totalLoans }}</p>
                    <p class="text-xs text-gray-600">Inguzanyo Zose</p>
                    <p class="text-xs text-green-600 mt-1">{{ $activeLoans }} zirakora</p>
                </div>
                <div class="text-center py-2 bg-purple-50 rounded-lg">
                    <p class="text-lg font-bold text-purple-600">{{ number_format($totalLoanAmount, 0) }}</p>
                    <p class="text-xs text-gray-600">Amafaranga y'Inguzanyo</p>
                </div>
                <div class="text-center py-2 bg-yellow-50 rounded-lg">
                    <p class="text-xl font-bold text-yellow-600">{{ $activeSavings }}</p>
                    <p class="text-xs text-gray-600">Konti z'Ubwizigame</p>
                    <p class="text-xs text-yellow-600 mt-1">{{ number_format($totalSavingsAmount, 0) }}</p>
                </div>
                <div class="text-center py-2 bg-red-50 rounded-lg">
                    <p class="text-lg font-bold text-red-600">{{ number_format($totalPenalties, 0) }}</p>
                    <p class="text-xs text-gray-600">Ibihano Bitegereje</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Members Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-bold text-gray-900">Group Members ({{ $members->total() }})</h2>
        </div>
        <table class="w-full">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Member Name</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Role</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Joined</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($members as $member)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">#{{ $member->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $member->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $member->user->email }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                {{ ucfirst($member->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $member->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-{{ $member->status == 'active' ? 'green' : 'gray' }}-100 text-{{ $member->status == 'active' ? 'green' : 'gray' }}-800">
                                {{ ucfirst($member->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No members found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $members->links() }}
    </div>
</div>
@endsection
