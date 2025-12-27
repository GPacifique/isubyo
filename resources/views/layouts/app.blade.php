<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Dashboard') - {{ config('app.name', 'isubyo') }}</title>

        <!-- Meta Description -->
        <meta name="description" content="@yield('description', 'isubyo - Transparent financial management and group savings solutions')">
        <meta name="keywords" content="group savings, loans, financial management, community, cooperative">
        <meta name="author" content="isubyo">

        <!-- Open Graph / Social Media -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', 'Dashboard') - {{ config('app.name', 'isubyo') }}">
        <meta property="og:description" content="@yield('description', 'isubyo - Transparent financial management and group savings solutions')">
        <meta property="og:image" content="{{ asset('images/isubyo.svg') }}">
        <meta property="og:site_name" content="{{ config('app.name', 'isubyo') }}">

        <!-- Twitter Card -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="@yield('title', 'Dashboard') - {{ config('app.name', 'isubyo') }}">
        <meta property="twitter:description" content="@yield('description', 'isubyo - Transparent financial management and group savings solutions')">
        <meta property="twitter:image" content="{{ asset('images/isubyo.svg') }}">

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Alpine.js for interactivity -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content', $slot ?? '')
            </main>

            <!-- Footer -->
            @include('components.footer')
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Member Dashboard Switcher
                const memberSwitcherBtn = document.getElementById('member-switcher-btn');
                const memberSwitcherMenu = document.getElementById('member-switcher-menu');
                const memberSwitcherChevron = document.getElementById('member-switcher-chevron');

                if (memberSwitcherBtn && memberSwitcherMenu) {
                    memberSwitcherBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        memberSwitcherMenu.classList.toggle('hidden');
                        memberSwitcherChevron.style.transform = memberSwitcherMenu.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
                    });

                    const memberSwitcherLinks = memberSwitcherMenu.querySelectorAll('a');
                    memberSwitcherLinks.forEach(link => {
                        link.addEventListener('click', function() {
                            memberSwitcherMenu.classList.add('hidden');
                            memberSwitcherChevron.style.transform = 'rotate(0deg)';
                        });
                    });

                    document.addEventListener('click', function(event) {
                        const isClickInsideMenu = memberSwitcherMenu.contains(event.target);
                        const isClickInsideButton = memberSwitcherBtn.contains(event.target);
                        if (!isClickInsideMenu && !isClickInsideButton) {
                            memberSwitcherMenu.classList.add('hidden');
                            memberSwitcherChevron.style.transform = 'rotate(0deg)';
                        }
                    });

                    document.addEventListener('keydown', function(event) {
                        if (event.key === 'Escape') {
                            memberSwitcherMenu.classList.add('hidden');
                            memberSwitcherChevron.style.transform = 'rotate(0deg)';
                        }
                    });
                }
            });
        </script>
    </body>
</html>
