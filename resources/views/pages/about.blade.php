@extends('layouts.guest')

@section('title', 'About Us - Our Mission & Story')
@section('description', 'Learn about isubyo, the leading savings and loans management platform empowering communities in Rwanda and Africa. Discover our mission to provide transparent financial tools for groups and SACCOs.')
@section('keywords', 'about isubyo, savings platform, community finance, Rwanda fintech, SACCO management, microfinance technology, financial transparency')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header with semantic markup -->
    <header class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <nav aria-label="Breadcrumb" class="mb-4">
                <ol class="flex items-center space-x-2 text-sm text-green-100" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ route('pages.index') }}" itemprop="item" class="hover:text-white"><span itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li><span aria-hidden="true">/</span></li>
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="name" class="text-white">About Us</span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </nav>
            <h1 class="text-4xl font-bold">About isubyo</h1>
            <p class="text-green-100 mt-2">Empowering Communities Through Financial Transparency</p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-16 px-4">
        <!-- Mission Section -->
        <section class="bg-white rounded-lg shadow p-8 mb-12" aria-labelledby="mission-heading">
            <h2 id="mission-heading" class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
            <p class="text-gray-600 mb-4">
                At isubyo, we believe that every community deserves access to transparent, secure, and easy-to-use financial management tools.
                We are committed to empowering groups, associations, and organizations to manage their collective finances efficiently.
            </p>
            <p class="text-gray-600">
                Our platform combines simplicity with powerful features, allowing communities to focus on what matters most:
                building stronger financial relationships and achieving shared goals.
            </p>
        </section>

        <!-- Values Section -->
        <section aria-labelledby="values-heading">
            <h2 id="values-heading" class="text-2xl font-bold text-gray-900 mb-8">Our Core Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <article class="bg-white rounded-lg shadow p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Transparency</h3>
                    <p class="text-gray-600">
                        We believe in complete transparency in all financial transactions and group operations.
                    </p>
                </article>

                <article class="bg-white rounded-lg shadow p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Security</h3>
                    <p class="text-gray-600">
                        Your financial data is protected with bank-level encryption and security measures.
                    </p>
                </article>

                <article class="bg-white rounded-lg shadow p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Community</h3>
                    <p class="text-gray-600">
                        We support communities in building trust and achieving financial goals together.
                    </p>
                </article>
            </div>
        </section>

        <!-- Story Section -->
        <section class="bg-white rounded-lg shadow p-8" aria-labelledby="story-heading">
            <h2 id="story-heading" class="text-2xl font-bold text-gray-900 mb-4">Our Story</h2>
            <p class="text-gray-600 mb-4">
                isubyo was founded with a vision to solve the challenges faced by community groups in managing their collective finances.
                What started as a simple spreadsheet solution has grown into a comprehensive platform trusted by thousands of groups worldwide.
            </p>
            <p class="text-gray-600 mb-4">
                Today, we continue to innovate and improve our platform to meet the evolving needs of modern communities.
            </p>
        </section>
    </main>
</div>

{{-- Organization Schema --}}
@push('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AboutPage",
    "name": "About isubyo",
    "description": "Learn about isubyo, the leading savings and loans management platform empowering communities.",
    "url": "{{ url()->current() }}",
    "mainEntity": {
        "@type": "Organization",
        "name": "isubyo",
        "description": "Smart group savings and loans management platform empowering communities with transparent financial tools.",
        "foundingDate": "2024",
        "areaServed": {
            "@type": "Place",
            "name": "Africa"
        },
        "knowsAbout": ["Financial Technology", "Microfinance", "Community Savings", "Group Lending"]
    }
}
</script>
@endpush
@endsection
