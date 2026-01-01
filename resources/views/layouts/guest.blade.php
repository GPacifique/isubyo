<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- SEO Meta Tags --}}
        <x-seo
            :title="View::yieldContent('title')"
            :description="View::yieldContent('description', 'isubyo - Smart group savings and loans management platform. Empower your community with transparent financial tools.')"
            :keywords="View::yieldContent('keywords', 'savings groups, loan management, community finance, group savings, microfinance')"
            :image="View::yieldContent('og_image')"
            :type="View::yieldContent('og_type', 'website')"
            :noindex="View::yieldContent('noindex', false)"
        />

        <title>@yield('title', config('app.name', 'isubyo')) - isubyo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('head')
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @yield('content')

        <!-- Footer -->
        @include('components.footer')

        @stack('scripts')
    </body>
</html>
