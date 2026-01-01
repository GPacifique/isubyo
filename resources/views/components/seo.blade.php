@props([
    'title' => null,
    'description' => 'isubyo - Smart group savings and loans management platform',
    'keywords' => 'savings groups, loan management, community finance',
    'image' => null,
    'type' => 'website',
    'noindex' => false,
])

@php
    $pageTitle = $title ?: config('app.name', 'isubyo');
    $ogImage = $image ?: asset('images/isubyo.png');
    $currentUrl = url()->current();
@endphp

<!-- SEO Meta Tags -->
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="isubyo">

@if($noindex)
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
@endif

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="isubyo">

<!-- Twitter Card -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $currentUrl }}">
<meta property="twitter:title" content="{{ $pageTitle }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $ogImage }}">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('images/isubyo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('images/isubyo.png') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $currentUrl }}">
