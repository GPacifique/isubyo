{{--
    SEO Component - Comprehensive Meta Tags for Search Engine Optimization

    Usage:
    <x-seo
        title="Page Title"
        description="Page description"
        keywords="keyword1, keyword2"
        image="/path/to/image.jpg"
        type="website"
        :article="['published_time' => '2024-01-01', 'author' => 'Author Name']"
        :breadcrumbs="[['name' => 'Home', 'url' => '/'], ['name' => 'Current Page']]"
    />
--}}

@props([
    'title' => null,
    'description' => 'isubyo - Smart group savings and loans management platform. Empower your community with transparent financial tools for savings, loans, and member management.',
    'keywords' => 'savings groups, loan management, community finance, group savings, microfinance, financial transparency, Rwanda fintech, ikimina, tontine',
    'image' => null,
    'type' => 'website',
    'article' => null,
    'breadcrumbs' => null,
    'noindex' => false,
    'canonical' => null,
])

@php
    $siteName = config('app.name', 'isubyo');
    $siteUrl = config('app.url', 'https://isubyo.com');

    // Build full title
    $fullTitle = $title ? $title . ' - ' . $siteName : $siteName . ' - Smart Savings & Loans Management';

    // Get current URL for canonical
    $currentUrl = $canonical ?? url()->current();

    // Default OG image
    $ogImage = $image ? (str_starts_with($image, 'http') ? $image : asset($image)) : asset('images/isubyo-og.png');

    // Truncate description for meta (max 160 characters)
    $metaDescription = Str::limit($description, 160);
@endphp

{{-- Primary Meta Tags --}}
<meta name="title" content="{{ $fullTitle }}">
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="isubyo">
<meta name="robots" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' }}">
<meta name="googlebot" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">
<meta name="bingbot" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $currentUrl }}">

{{-- Language and Locale --}}
<meta name="language" content="{{ app()->getLocale() }}">
<link rel="alternate" hreflang="en" href="{{ $currentUrl }}">
<link rel="alternate" hreflang="rw" href="{{ $currentUrl }}">
<link rel="alternate" hreflang="x-default" href="{{ $currentUrl }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $fullTitle }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}">
<meta property="og:locale:alternate" content="en_US">
<meta property="og:locale:alternate" content="rw_RW">

{{-- Article specific Open Graph (for blog posts) --}}
@if($article && $type === 'article')
<meta property="article:published_time" content="{{ $article['published_time'] ?? now()->toIso8601String() }}">
<meta property="article:modified_time" content="{{ $article['modified_time'] ?? now()->toIso8601String() }}">
<meta property="article:author" content="{{ $article['author'] ?? $siteName }}">
<meta property="article:section" content="{{ $article['section'] ?? 'Finance' }}">
@if(isset($article['tags']))
@foreach($article['tags'] as $tag)
<meta property="article:tag" content="{{ $tag }}">
@endforeach
@endif
@endif

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $currentUrl }}">
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta name="twitter:description" content="{{ $metaDescription }}">
<meta name="twitter:image" content="{{ $ogImage }}">
<meta name="twitter:image:alt" content="{{ $fullTitle }}">
<meta name="twitter:site" content="@isubyo">
<meta name="twitter:creator" content="@isubyo">

{{-- Additional SEO Meta Tags --}}
<meta name="theme-color" content="#10b981">
<meta name="msapplication-TileColor" content="#10b981">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="apple-mobile-web-app-title" content="{{ $siteName }}">
<meta name="application-name" content="{{ $siteName }}">
<meta name="format-detection" content="telephone=no">

{{-- Geo Tags (for local SEO - Rwanda focused) --}}
<meta name="geo.region" content="RW">
<meta name="geo.placename" content="Kigali">
<meta name="geo.position" content="-1.9403;29.8739">
<meta name="ICBM" content="-1.9403, 29.8739">

{{-- Favicons --}}
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('manifest.json') }}">

{{-- Preconnect for Performance --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn.tailwindcss.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//cdn.tailwindcss.com">

{{-- JSON-LD Structured Data --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{ $siteName }}",
    "alternateName": ["isubyo", "Smart Savings Platform"],
    "url": "{{ $siteUrl }}",
    "description": "{{ $metaDescription }}",
    "potentialAction": {
        "@type": "SearchAction",
        "target": {
            "@type": "EntryPoint",
            "urlTemplate": "{{ $siteUrl }}/search?q={search_term_string}"
        },
        "query-input": "required name=search_term_string"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ $siteName }}",
        "url": "{{ $siteUrl }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('images/isubyo.png') }}",
            "width": 512,
            "height": 512
        },
        "sameAs": [
            "https://twitter.com/isubyo",
            "https://www.facebook.com/isubyo",
            "https://www.linkedin.com/company/isubyo"
        ]
    }
}
</script>

{{-- Organization Schema --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ $siteName }}",
    "url": "{{ $siteUrl }}",
    "logo": "{{ asset('images/isubyo.png') }}",
    "description": "Smart group savings and loans management platform empowering communities with transparent financial tools.",
    "foundingDate": "2024",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Kigali",
        "addressCountry": "RW"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer service",
        "email": "support@isubyo.com",
        "availableLanguage": ["English", "Kinyarwanda"]
    },
    "sameAs": [
        "https://twitter.com/isubyo",
        "https://www.facebook.com/isubyo",
        "https://www.linkedin.com/company/isubyo"
    ]
}
</script>

{{-- SoftwareApplication Schema --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "{{ $siteName }}",
    "applicationCategory": "FinanceApplication",
    "operatingSystem": "Web",
    "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD",
        "description": "Free tier available"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "ratingCount": "500",
        "bestRating": "5",
        "worstRating": "1"
    },
    "featureList": [
        "Group Savings Management",
        "Loan Tracking",
        "Member Management",
        "Financial Reports",
        "Transaction History",
        "Multi-language Support"
    ]
}
</script>

{{-- Breadcrumb Schema (if provided) --}}
@if($breadcrumbs && count($breadcrumbs) > 0)
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        @foreach($breadcrumbs as $index => $crumb)
        {
            "@type": "ListItem",
            "position": {{ $index + 1 }},
            "name": "{{ $crumb['name'] }}",
            "item": "{{ isset($crumb['url']) ? (str_starts_with($crumb['url'], 'http') ? $crumb['url'] : url($crumb['url'])) : url()->current() }}"
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endif

{{-- Article Schema (for blog posts) --}}
@if($article && $type === 'article')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ $title }}",
    "description": "{{ $metaDescription }}",
    "image": "{{ $ogImage }}",
    "author": {
        "@type": "Organization",
        "name": "{{ $article['author'] ?? $siteName }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ $siteName }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('images/isubyo.png') }}"
        }
    },
    "datePublished": "{{ $article['published_time'] ?? now()->toIso8601String() }}",
    "dateModified": "{{ $article['modified_time'] ?? now()->toIso8601String() }}",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $currentUrl }}"
    }
}
</script>
@endif
