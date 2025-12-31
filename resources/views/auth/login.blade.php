@extends('layouts.guest')

@section('title', 'Login - ' . config('app.name'))

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
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
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
                <p class="text-emerald-400 font-semibold tracking-wider uppercase text-sm mb-4">Murakaza neza mu bukungu bw'ejo</p>
                <h1 class="text-5xl xl:text-6xl font-bold text-white leading-[1.1] tracking-tight">
                    Elevate Your<br>
                    <span class="bg-gradient-to-r from-emerald-400 via-teal-400 to-cyan-400 bg-clip-text text-transparent">Financial Journey</span>
                </h1>
            </div>

            <p class="text-slate-400 text-lg leading-relaxed max-w-lg mb-12">
                Experience seamless savings management, intelligent loan processing, and community-driven growth with our enterprise-grade SACCO platform.
            </p>

            <!-- Premium Feature Cards -->
            <div class="grid grid-cols-1 gap-4 max-w-lg">
                <div class="group flex items-center space-x-4 p-4 rounded-2xl bg-white/[0.03] border border-white/[0.05] hover:bg-white/[0.05] hover:border-emerald-500/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-500/20 to-emerald-600/10 rounded-xl flex items-center justify-center border border-emerald-500/20 group-hover:border-emerald-500/40 transition-colors">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Bank-Grade Security</h3>
                        <p class="text-slate-500 text-sm">256-bit encryption & multi-factor authentication</p>
                    </div>
                </div>

                <div class="group flex items-center space-x-4 p-4 rounded-2xl bg-white/[0.03] border border-white/[0.05] hover:bg-white/[0.05] hover:border-emerald-500/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500/20 to-teal-600/10 rounded-xl flex items-center justify-center border border-teal-500/20 group-hover:border-teal-500/40 transition-colors">
                        <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Smart Analytics</h3>
                        <p class="text-slate-500 text-sm">Real-time insights & portfolio tracking</p>
                    </div>
                </div>

                <div class="group flex items-center space-x-4 p-4 rounded-2xl bg-white/[0.03] border border-white/[0.05] hover:bg-white/[0.05] hover:border-emerald-500/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-gradient-to-br from-cyan-500/20 to-cyan-600/10 rounded-xl flex items-center justify-center border border-cyan-500/20 group-hover:border-cyan-500/40 transition-colors">
                        <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-semibold">Community Network</h3>
                        <p class="text-slate-500 text-sm">Connect & grow with fellow members</p>
                    </div>
                </div>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-12 pt-8 border-t border-white/[0.05]">
                <div class="flex items-center space-x-8">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">10K+</p>
                        <p class="text-slate-500 text-xs uppercase tracking-wider">Active Members</p>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">99.9%</p>
                        <p class="text-slate-500 text-xs uppercase tracking-wider">Uptime</p>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">5M+</p>
                        <p class="text-slate-500 text-xs uppercase tracking-wider">Transactions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Premium Login Form -->
    <div class="w-full lg:w-[45%] flex items-center justify-center p-6 sm:p-8 lg:p-12 bg-white dark:bg-slate-900">
        <div class="w-full max-w-[420px]">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-10">
                <div class="inline-flex items-center space-x-3 mb-2">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-xl shadow-emerald-500/20">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-800 dark:text-white">{{ config('app.name', 'itSinda') }}</span>
                </div>
            </div>

            <!-- Welcome Text -->
            <div class="text-center lg:text-left mb-10">
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white mb-3 tracking-tight">Murakaza neza</h2>
                <p class="text-slate-500 dark:text-slate-400">Injiza amakuru yawe kugira ngo winjire kuri konti yawe</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">
                        Email Address
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               class="w-full pl-12 pr-4 py-4 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white dark:focus:bg-slate-800 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-200"
                               placeholder="name@company.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">
                        Password
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               class="w-full pl-12 pr-14 py-4 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-xl text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white dark:focus:bg-slate-800 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-200"
                               placeholder="Enter your password">
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg id="eye-icon" class="w-5 h-5 text-slate-400 hover:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <div class="relative">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="peer sr-only">
                            <div class="w-5 h-5 border-2 border-slate-300 dark:border-slate-600 rounded-md peer-checked:border-emerald-500 peer-checked:bg-emerald-500 transition-all duration-200">
                                <svg class="w-full h-full text-white scale-0 peer-checked:scale-100 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <span class="ml-3 text-sm text-slate-600 dark:text-slate-400 group-hover:text-slate-800 dark:group-hover:text-slate-200 transition-colors">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 dark:text-emerald-400 dark:hover:text-emerald-300 transition-colors">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="relative w-full py-4 px-6 bg-gradient-to-r from-emerald-600 via-emerald-500 to-teal-500 text-white font-semibold rounded-xl overflow-hidden group focus:outline-none focus:ring-4 focus:ring-emerald-500/30 transition-all duration-300">
                    <span class="relative z-10 flex items-center justify-center space-x-2">
                        <span>Sign In</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-700 via-emerald-600 to-teal-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-200 dark:border-slate-700"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-4 bg-white dark:bg-slate-900 text-sm text-slate-500 dark:text-slate-400">
                        Don't have an account?
                    </span>
                </div>
            </div>

            <!-- Register Link -->
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="flex items-center justify-center w-full py-4 px-6 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold rounded-xl hover:border-emerald-500 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-600 dark:hover:text-emerald-400 focus:outline-none focus:ring-4 focus:ring-emerald-500/20 transition-all duration-300">
                    Create an account
                </a>
            @endif

            <!-- Footer -->
            <div class="mt-10 text-center">
                <p class="text-xs text-slate-400 dark:text-slate-500">
                    By signing in, you agree to our
                    <a href="#" class="text-emerald-600 dark:text-emerald-400 hover:underline">Terms of Service</a>
                    and
                    <a href="#" class="text-emerald-600 dark:text-emerald-400 hover:underline">Privacy Policy</a>
                </p>
                <p class="text-xs text-slate-400 dark:text-slate-500 mt-4">
                    &copy; {{ date('Y') }} {{ config('app.name', 'itSinda') }}. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
</style>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
            `;
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            `;
        }
    }
</script>
@endsection
