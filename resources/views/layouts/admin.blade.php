<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - isubyo</title>

    <!-- Meta Description -->
    <meta name="description" content="@yield('description', 'isubyo Admin Dashboard - Manage users, groups, loans, savings, and transactions')">
    <meta name="keywords" content="admin, dashboard, group management, loans, savings">
    <meta name="author" content="isubyo">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Admin Dashboard') - isubyo">
    <meta property="og:description" content="@yield('description', 'isubyo Admin Dashboard - Manage users, groups, loans, savings, and transactions')">
    <meta property="og:image" content="{{ asset('images/isubyo.svg') }}">
    <meta property="og:site_name" content="isubyo">

    <!-- Twitter Card -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Admin Dashboard') - isubyo">
    <meta property="twitter:description" content="@yield('description', 'isubyo Admin Dashboard - Manage users, groups, loans, savings, and transactions')">
    <meta property="twitter:image" content="{{ asset('images/isubyo.svg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/isubyo.svg') }}" alt="isubyo Logo" class="h-12 w-12">
                    <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-green-100">
                        isubyo Admin
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.dashboard') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.users.*') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Users
                    </a>
                    <a href="{{ route('admin.groups.index') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.groups.*') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Groups
                    </a>
                    <a href="{{ route('admin.loans.index') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.loans.*') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Loans
                    </a>
                    <a href="{{ route('admin.savings.index') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.savings.*') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Savings
                    </a>
                    <a href="{{ route('admin.transactions.index') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.transactions.*') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Transactions
                    </a>
                    <a href="{{ route('admin.reports') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.reports') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Reports
                    </a>
                    <a href="{{ route('admin.chats.index') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.chats.*') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Chat
                    </a>
                    <a href="{{ route('admin.activity-logs') }}" class="hover:text-green-200 transition font-medium {{ request()->routeIs('admin.activity-logs') ? 'text-green-200 border-b-2 border-green-200' : '' }}">
                        Logs
                    </a>

                    <!-- Dashboard Switcher Dropdown -->
                    @php
                        $canAccessGroupAdmin = auth()->user()->isGroupAdminOfAny();
                        $canAccessMember = auth()->user()->isMemberOfGroup();
                    @endphp

                    @if($canAccessGroupAdmin || $canAccessMember)
                        <div class="relative ml-6 border-l border-green-500 pl-6" x-data="{ open: false }">
                            <button @click="open = !open" class="hover:text-green-200 transition font-medium flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.5 1.5H3.75A2.25 2.25 0 001.5 3.75v12.5A2.25 2.25 0 003.75 18.5h12.5a2.25 2.25 0 002.25-2.25V9.5"></path>
                                    <path d="M6.5 10.5h7M6.5 14h4"></path>
                                </svg>
                                Switch
                                <svg class="w-4 h-4 transition" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div @click.away="open = false" class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl hidden z-50" :class="{ 'hidden': !open }">
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <p class="text-xs font-semibold text-gray-600 uppercase">Available Dashboards</p>
                                </div>

                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 border-b transition">
                                    <div class="flex-1">
                                        <div class="font-semibold text-blue-600">System Admin</div>
                                        <p class="text-xs text-gray-500">System-wide management</p>
                                    </div>
                                    @if(request()->routeIs('admin.*'))
                                        <span class="inline-block w-3 h-3 bg-blue-600 rounded-full"></span>
                                    @endif
                                </a>

                                @if($canAccessGroupAdmin)
                                    <a href="{{ route('group-admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 border-b transition">
                                        <div class="flex-1">
                                            <div class="font-semibold text-green-600">Group Admin</div>
                                            <p class="text-xs text-gray-500">Manage assigned groups</p>
                                        </div>
                                        @if(request()->routeIs('group-admin.*'))
                                            <span class="inline-block w-3 h-3 bg-green-600 rounded-full"></span>
                                        @endif
                                    </a>
                                @endif

                                @if($canAccessMember)
                                    <a href="{{ route('member.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 transition">
                                        <div class="flex-1">
                                            <div class="font-semibold text-purple-600">Member</div>
                                            <p class="text-xs text-gray-500">View your account</p>
                                        </div>
                                        @if(request()->routeIs('member.*'))
                                            <span class="inline-block w-3 h-3 bg-purple-600 rounded-full"></span>
                                        @endif
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Search Box -->
                <div class="hidden md:flex md:items-center md:flex-1 md:max-w-xs md:mx-4">
                    <form method="GET" action="#" class="w-full">
                        <div class="relative">
                            <input
                                type="text"
                                name="q"
                                placeholder="Search..."
                                class="w-full px-3 py-2 text-sm text-gray-900 placeholder-gray-400 rounded-lg bg-green-50 focus:ring-2 focus:ring-green-300 focus:border-transparent outline-none"
                            />
                            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center space-x-2 hover:text-green-200 transition text-white">
                            <span class="font-medium">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="user-menu-dropdown" class="absolute right-0 w-64 bg-white text-gray-900 rounded-lg shadow-xl hidden z-50 overflow-hidden">
                            <!-- Dashboard Links -->
                            <div class="border-b px-4 py-3 bg-gray-50">
                                <p class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Available Dashboards</p>
                            </div>

                            @if(auth()->user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-blue-50 border-b transition group">
                                    <div class="flex-1">
                                        <div class="font-semibold text-blue-600">System Admin</div>
                                        <p class="text-xs text-gray-500">System-wide management</p>
                                    </div>
                                    @if(request()->routeIs('admin.*') && !request()->routeIs('admin.dashboard'))
                                        <span class="inline-block w-3 h-3 bg-blue-600 rounded-full ml-2"></span>
                                    @elseif(request()->routeIs('admin.dashboard'))
                                        <span class="inline-block w-3 h-3 bg-blue-600 rounded-full ml-2"></span>
                                    @endif
                                </a>
                            @endif

                            @if(auth()->user()->isGroupAdminOfAny())
                                <a href="{{ route('group-admin.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-green-50 border-b transition">
                                    <div class="flex-1">
                                        <div class="font-semibold text-green-600">Group Admin</div>
                                        <p class="text-xs text-gray-500">Manage assigned groups</p>
                                    </div>
                                    @if(request()->routeIs('group-admin.*'))
                                        <span class="inline-block w-3 h-3 bg-green-600 rounded-full ml-2"></span>
                                    @endif
                                </a>
                            @endif

                            @if(auth()->user()->isMemberOfGroup())
                                <a href="{{ route('member.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-purple-50 border-b transition">
                                    <div class="flex-1">
                                        <div class="font-semibold text-purple-600">Member</div>
                                        <p class="text-xs text-gray-500">View your account</p>
                                    </div>
                                    @if(request()->routeIs('member.*'))
                                        <span class="inline-block w-3 h-3 bg-purple-600 rounded-full ml-2"></span>
                                    @endif
                                </a>
                            @endif

                            <!-- Divider -->
                            <div class="border-t border-gray-200"></div>

                            <!-- Other Options -->
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 hover:bg-gray-100 text-gray-700 border-b transition">
                                <div class="font-medium">My Profile</div>
                                <p class="text-xs text-gray-500">Account settings</p>
                            </a>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-3 hover:bg-red-50 text-red-600 font-semibold transition flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 100-2H4V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg m-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg m-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- User Menu Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenuDropdown = document.getElementById('user-menu-dropdown');

            if (userMenuButton && userMenuDropdown) {
                // Toggle menu on button click
                userMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    userMenuDropdown.classList.toggle('hidden');
                });

                // Close menu when clicking on menu items
                const menuLinks = userMenuDropdown.querySelectorAll('a, button[type="submit"]');
                menuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        userMenuDropdown.classList.add('hidden');
                    });
                });

                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    const isClickInsideMenu = userMenuDropdown.contains(event.target);
                    const isClickInsideButton = userMenuButton.contains(event.target);

                    if (!isClickInsideMenu && !isClickInsideButton) {
                        userMenuDropdown.classList.add('hidden');
                    }
                });

                // Close menu with Escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        userMenuDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
