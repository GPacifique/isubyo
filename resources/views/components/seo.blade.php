{{--
    SEO Component

    Comprehensive SEO meta tags component for optimal search engine visibility and social media sharing.

    Props:
    - title: Page title (defaults to app name)
    - description: Meta description for search results (max 160 chars recommended)
    - keywords: Comma-separated keywords for SEO
    - image: Open Graph image URL (defaults to isubyo logo)
    - type: Open Graph type (website, article, etc.)
    - noindex: Boolean to prevent search engine indexing (for admin/private pages)

    Features:
    - Basic SEO meta tags (description, keywords, author)
    - Robots directives (index/noindex control)
    - Open Graph tags for Facebook/LinkedIn sharing
    - Twitter Card meta tags for Twitter previews
    - Favicon configuration
    - Canonical URL for duplicate content prevention
--}}

@props([
    'title' => null,
    'description' => 'isubyo - Smart group savings and loans management platform',
    'keywords' => 'savings groups, loan management, community finance',
    'image' => null,
    'type' => 'website',
    'noindex' => false,
])

@php
    // Set default values for SEO elements
    $pageTitle = $title ?: config('app.name', 'isubyo');
    $ogImage = $image ?: asset('images/isubyo.png');
    $currentUrl = url()->current();
@endphp

<!-- SEO Meta Tags - Help search engines understand page content -->
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="isubyo">

{{-- Robots meta tag - Control search engine crawling and indexing --}}
@if($noindex)
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
@endif

<!-- Open Graph / Facebook - Rich previews when shared on Facebook, LinkedIn, etc. -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="isubyo">

<!-- Twitter Card - Rich previews when shared on Twitter/X -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $currentUrl }}">
<meta property="twitter:title" content="{{ $pageTitle }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $ogImage }}">

<!-- Favicon - Browser tab and bookmark icons -->
<link rel="icon" type="image/png" href="{{ asset('images/isubyo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('images/isubyo.png') }}">

<!-- Canonical URL - Prevent duplicate content issues in search engines -->
<link rel="canonical" href="{{ $currentUrl }}">
