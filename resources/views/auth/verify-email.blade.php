@extends('layouts.guest')

@section('title', 'Emeza Imeyili - ' . config('app.name'))

@section('content')
<div class="min-h-screen flex bg-slate-950">
    <!-- Left Side - Premium Branding -->
    <div class="hidden lg:flex lg:w-[55%] relative overflow-hidden">
        <!-- Sophisticated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>

        <!-- Elegant Geometric Pattern -->
        <div class="absolute inset-0 opacity-[0.03]">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="hexagons" width="50" height="43.4" patternUnits="userSpaceOnUse" patternTransform="scale(2)">
                        <polygon points="24.8,22 37.3,29.2 37.3,43.7 24.8,50.9 12.3,43.7 12.3,29.2" fill="none" stroke="white" stroke-width="0.5"/>
                        <polygon points="24.8,-6.9 37.3,0.3 37.3,14.8 24.8,22 12.3,14.8 12.3,0.3" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hexagons)"/>
            </svg>
        </div>

        <!-- Refined Gradient Orbs -->
        <div class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-gradient-to-r from-emerald-600/20 to-teal-500/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-1/4 right-0 w-[400px] h-[400px] bg-gradient-to-l from-cyan-500/15 to-emerald-600/10 rounded-full blur-[80px]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-emerald-500/5 rounded-full blur-[60px]"></div>

        <!-- Accent Lines -->
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-emerald-500/30 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-emerald-500/30 to-transparent"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center px-16 xl:px-24 w-full">
            <!-- Premium Logo -->
            <div class="mb-12">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl flex items-center justify-center shadow-2xl shadow-emerald-500/25">
                            <img src="{{ asset('images/isubyo.png') }}" alt="isubyo Logo" class="w-10 h-10 rounded-full object-contain">
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-400 rounded-full border-4 border-slate-900"></div>
                    </div>
                    <div>
                        <span class="text-3xl font-bold bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent tracking-tight">{{ config('app.name', 'itSinda') }}</span>
                        <p class="text-emerald-400/80 text-sm font-medium tracking-widest uppercase mt-0.5">Financial Platform</p>
                    </div>
                </div>
            </div>

            <!-- Elegant Heading -->
            <div class="mb-10">
                <p class="text-emerald-400 font-semibold tracking-wider uppercase text-sm mb-4">Intambwe imwe gusa isigaye</p>
                <h1 class="text-5xl xl:text-6xl font-bold text-white leading-[1.1] tracking-tight">
                    Emeza<br>
                    <span class="bg-gradient-to-r from-emerald-400 via-teal-400 to-cyan-400 bg-clip-text text-transparent">Imeyili Yawe</span>
                </h1>
            </div>

            <p class="text-slate-400 text-lg leading-relaxed max-w-lg mb-12">
                Twakwohereje ubutumwa bwo kwemeza. Kanda kuri link iri muri imeyili yawe kugira ngo urangize kwiyandikisha.
            </p>

            <!-- Feature Card -->
            <div class="max-w-lg">
                <div class="group flex items-center space-x-4 p-4 rounded-2xl bg-white/[0.03] border border-white/[0.05] hover:bg-white/[0.05] hover:border-emerald-500/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500/20 to-emerald-600/10 rounded-xl flex items-center justify-center border border-emerald-500/20 group-hover:border-emerald-500/40 transition-colors">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Reba Imeyili Yawe</h3>
                        <p class="text-slate-500 text-sm">Reba muri inbox cyangwa spam folder</p>
                    </div>
                </div>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-12 pt-8 border-t border-white/[0.05]">
                <div class="flex items-center space-x-8">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">10K+</p>
                        <p class="text-slate-500 text-xs uppercase tracking-wider">Abanyamuryango</p>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">99.9%</p>
                        <p class="text-slate-500 text-xs uppercase tracking-wider">Uptime</p>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">5M+</p>
                        <p class="text-slate-500 text-xs uppercase tracking-wider">Ibikorwa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Verification Content -->
    <div class="w-full lg:w-[45%] flex items-center justify-center p-6 sm:p-8 lg:p-12 bg-white dark:bg-slate-900">
        <div class="w-full max-w-[420px]">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-10">
                <div class="inline-flex items-center space-x-3 mb-2">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-xl shadow-emerald-500/20">
                        <img src="{{ asset('images/isubyo.png') }}" alt="isubyo Logo" class="w-9 h-9 rounded-full object-contain">
                    </div>
                    <span class="text-2xl font-bold text-slate-800 dark:text-white">{{ config('app.name', 'itSinda') }}</span>
                </div>
            </div>

            <!-- Email Icon -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 rounded-full mb-6">
                    <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white mb-3 tracking-tight">Emeza Imeyili</h2>
                <p class="text-slate-500 dark:text-slate-400">Intambwe imwe gusa isigaye!</p>
            </div>

            <!-- Message -->
            <div class="bg-slate-50 dark:bg-slate-800/50 rounded-2xl p-6 mb-6 border-2 border-slate-200 dark:border-slate-700">
                <p class="text-slate-600 dark:text-slate-300 text-center leading-relaxed">
                    Urakoze kwiyandikisha! Mbere yo gutangira, emeza imeyili yawe ukanda kuri link twakwohereje. Niba utayibonye, tuzakwoherera indi.
                </p>
            </div>

            <!-- Success Message -->
            @if (session('status') == 'verification-link-sent')
                <div class="bg-emerald-50 dark:bg-emerald-500/10 rounded-2xl p-4 mb-6 border-2 border-emerald-200 dark:border-emerald-500/30">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <p class="text-emerald-700 dark:text-emerald-400 text-sm font-medium">
                            Link nshya yo kwemeza yoherejwe kuri imeyili yawe.
                        </p>
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="space-y-4">
                <!-- Resend Button -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                            class="relative w-full py-4 px-6 bg-gradient-to-r from-emerald-600 via-emerald-500 to-teal-500 text-white font-semibold rounded-xl overflow-hidden group focus:outline-none focus:ring-4 focus:ring-emerald-500/30 transition-all duration-300">
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span>Ongera Wohereze Imeyili</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-700 via-emerald-600 to-teal-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </form>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex items-center justify-center w-full py-4 px-6 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold rounded-xl hover:border-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 hover:text-red-600 dark:hover:text-red-400 focus:outline-none focus:ring-4 focus:ring-red-500/20 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Sohoka
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="mt-10 text-center">
                <p class="text-xs text-slate-400 dark:text-slate-500">
                    Ufite ikibazo? Twandikire kuri
                    <a href="mailto:support@itsinda.com" class="text-emerald-600 dark:text-emerald-400 hover:underline">support@itsinda.com</a>
                </p>
                <p class="text-xs text-slate-400 dark:text-slate-500 mt-4">
                    &copy; {{ date('Y') }} {{ config('app.name', 'itSinda') }}. Uburenganzira bwose burabitswe.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
