<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Welcome') - {{ config('app.name', 'isubyo') }}</title>

        <!-- Meta Description -->
        <meta name="description" content="@yield('description', 'isubyo - Transparent financial management and group savings solutions')">
        <meta name="keywords" content="group savings, loans, financial management, community, cooperative">
        <meta name="author" content="isubyo">

        <!-- Open Graph / Social Media -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', 'Welcome') - {{ config('app.name', 'isubyo') }}">
        <meta property="og:description" content="@yield('description', 'isubyo - Transparent financial management and group savings solutions')">
        <meta property="og:image" content="{{ asset('images/isubyo.svg') }}">
        <meta property="og:site_name" content="{{ config('app.name', 'isubyo') }}">

        <!-- Twitter Card -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="@yield('title', 'Welcome') - {{ config('app.name', 'isubyo') }}">
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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/isubyo.svg') }}" alt="isubyo Logo" class="w-20 h-20 mb-4">
                <a href="/" class="text-2xl font-bold text-gray-900">isubyo</a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        @include('components.footer')
    </body>
</html>
