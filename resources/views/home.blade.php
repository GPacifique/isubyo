<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isubyo - Smart Savings & Loans Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        * { font-family: 'Inter', sans-serif; }

        .gradient-primary {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #ec4899 100%);
        }
        .gradient-text {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .hero-bg {
            background: linear-gradient(180deg, #f0f9ff 0%, #fdf4ff 50%, #fef2f2 100%);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: -3s;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }
        .blob {
            border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
            animation: morph 8s ease-in-out infinite;
        }
        @keyframes morph {
            0%, 100% { border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%; }
            50% { border-radius: 58% 42% 30% 70% / 55% 55% 45% 45%; }
        }
        .nav-blur {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
        }
        /* Screenshot Slider Styles */
        .slider-container {
            overflow: hidden;
        }
        .slider-track {
            transition: transform 0.5s ease-in-out;
        }
        .slider-dot.active {
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 100%);
        }
        @keyframes autoScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-3232px); }
        }
        .animate-scroll {
            animation: autoScroll 30s linear infinite;
        }
        .slider-container:hover .animate-scroll {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-white antialiased">
    <!-- Navigation -->
    <nav class="nav-blur fixed w-full top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 gradient-primary rounded-xl flex items-center justify-center shadow-lg">
                        <img src="{{ asset('images/isubyo.png') }}" alt="isubyo" class="h-6 w-6 rounded-full">
                    </div>
                    <span class="text-2xl font-bold text-gray-900">isubyo</span>
                </div>

                <div class="hidden md:flex items-center space-x-10">
                    <a href="#features" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Features</a>
                    <a href="#how-it-works" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">How It Works</a>
                    <a href="#benefits" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Benefits</a>
                </div>

                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 font-medium">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-500 hover:text-gray-700 font-medium">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 font-medium hidden sm:inline">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="gradient-primary text-white px-6 py-2.5 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen hero-bg pt-32 pb-20 overflow-hidden">
        <!-- Decorative blobs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-sky-300 opacity-30 blob blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-300 opacity-30 blob blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-pink-300 opacity-20 blob blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8 animate-fade-in">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-white shadow-md border border-gray-100">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-sm font-medium text-gray-600">Trusted by 500+ savings groups</span>
                    </div>

                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight">
                        Smart <span class="gradient-text">Financial</span> Management for Groups
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                        Empower your savings group with modern tools for tracking contributions, managing loans, and building wealth together.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="gradient-primary text-white px-8 py-4 rounded-full font-semibold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 text-center inline-flex items-center justify-center">
                                <span>Go to Dashboard</span>
                                <i class="fas fa-arrow-right ml-3"></i>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="gradient-primary text-white px-8 py-4 rounded-full font-semibold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 text-center inline-flex items-center justify-center">
                                <span>Start Free Trial</span>
                                <i class="fas fa-arrow-right ml-3"></i>
                            </a>
                            <a href="{{ route('login') }}" class="bg-white text-gray-900 px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 text-center border border-gray-200">
                                Sign In
                            </a>
                        @endauth
                    </div>

                    <div class="flex items-center gap-8 pt-6">
                        <div class="flex -space-x-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-sky-400 to-sky-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">JK</div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">AM</div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-400 to-pink-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">PN</div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">+</div>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span class="font-semibold text-gray-900">2,500+</span> active members
                        </div>
                    </div>
                </div>

                <!-- Right - Dashboard Preview -->
                <div class="relative lg:pl-8 animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="relative animate-float">
                        <!-- Main Card -->
                        <div class="glass-card rounded-3xl shadow-2xl p-8 space-y-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Total Group Balance</p>
                                    <p class="text-4xl font-bold text-gray-900 mt-1">RWF 12,450,000</p>
                                </div>
                                <div class="w-14 h-14 gradient-primary rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-wallet text-white text-xl"></i>
                                </div>
                            </div>

                            <div class="h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gradient-to-br from-sky-50 to-sky-100 p-5 rounded-2xl">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 bg-sky-500 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-piggy-bank text-white text-sm"></i>
                                        </div>
                                        <span class="text-xs text-sky-700 font-medium">Savings</span>
                                    </div>
                                    <div class="text-2xl font-bold text-gray-900">8.2M</div>
                                    <div class="text-xs text-green-600 font-medium mt-1">
                                        <i class="fas fa-arrow-up mr-1"></i>+12.5%
                                    </div>
                                </div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-5 rounded-2xl">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-hand-holding-dollar text-white text-sm"></i>
                                        </div>
                                        <span class="text-xs text-purple-700 font-medium">Loans</span>
                                    </div>
                                    <div class="text-2xl font-bold text-gray-900">4.2M</div>
                                    <div class="text-xs text-gray-500 font-medium mt-1">Active loans</div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-4 rounded-2xl flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">45 Members</p>
                                        <p class="text-xs text-gray-500">All contributions up to date</p>
                                    </div>
                                </div>
                                <div class="text-green-600">
                                    <i class="fas fa-check-circle text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Floating notification card -->
                        <div class="absolute -right-4 top-1/4 glass-card rounded-2xl shadow-xl p-4 animate-float-delayed">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Payment Received</p>
                                    <p class="text-xs text-gray-500">RWF 50,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center p-6">
                    <div class="text-5xl font-bold gradient-text mb-2">99.9%</div>
                    <p class="text-gray-600 font-medium">Uptime Guarantee</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-5xl font-bold gradient-text mb-2">500+</div>
                    <p class="text-gray-600 font-medium">Active Groups</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-5xl font-bold gradient-text mb-2">2.5K+</div>
                    <p class="text-gray-600 font-medium">Happy Members</p>
                </div>
                <div class="text-center p-6">
                    <div class="text-5xl font-bold gradient-text mb-2">50M+</div>
                    <p class="text-gray-600 font-medium">RWF Managed</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Screenshot Slider Section -->
    <section class="py-24 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-sm font-semibold text-purple-600 tracking-wider uppercase">Platform Preview</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6">See It In Action</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Explore our intuitive interface designed for effortless group financial management.</p>
            </div>

            <!-- Slider Container -->
            <div class="relative">
                <!-- Gradient Overlays -->
                <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-gray-50 to-transparent z-10 pointer-events-none"></div>

                <!-- Slider Track -->
                <div class="slider-container relative">
                    <div class="slider-track flex gap-8 animate-scroll">
                        <!-- Screenshot 1: Dashboard -->
                        <div class="slider-slide flex-shrink-0 w-[800px]">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                                <div class="bg-gray-100 px-4 py-3 flex items-center gap-2 border-b border-gray-200">
                                    <div class="flex gap-2">
                                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                    </div>
                                    <div class="flex-1 text-center">
                                        <span class="text-xs text-gray-500">isubyo - Member Dashboard</span>
                                    </div>
                                </div>
                                <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-[400px]">
                                    <!-- Mock Dashboard Content -->
                                    <div class="grid grid-cols-3 gap-4 mb-6">
                                        <div class="bg-white p-4 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500 mb-1">My Savings</p>
                                            <p class="text-2xl font-bold text-gray-900">RWF 1.2M</p>
                                            <p class="text-xs text-green-600"><i class="fas fa-arrow-up"></i> +15%</p>
                                        </div>
                                        <div class="bg-white p-4 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500 mb-1">Active Loans</p>
                                            <p class="text-2xl font-bold text-gray-900">RWF 500K</p>
                                            <p class="text-xs text-blue-600">2 loans</p>
                                        </div>
                                        <div class="bg-white p-4 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500 mb-1">Interest Earned</p>
                                            <p class="text-2xl font-bold text-gray-900">RWF 45K</p>
                                            <p class="text-xs text-purple-600">This month</p>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-xl shadow-sm p-4">
                                        <div class="flex justify-between items-center mb-4">
                                            <h4 class="font-semibold text-gray-900">Recent Transactions</h4>
                                            <span class="text-xs text-sky-600">View All</span>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                        <i class="fas fa-arrow-down text-green-600 text-xs"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-900">Savings Deposit</p>
                                                        <p class="text-xs text-gray-500">Dec 28, 2025</p>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold text-green-600">+RWF 50,000</span>
                                            </div>
                                            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                        <i class="fas fa-arrow-up text-blue-600 text-xs"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-900">Loan Payment</p>
                                                        <p class="text-xs text-gray-500">Dec 25, 2025</p>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold text-blue-600">-RWF 25,000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center mt-4 text-sm font-medium text-gray-600">Member Dashboard</p>
                        </div>

                        <!-- Screenshot 2: Admin Dashboard -->
                        <div class="slider-slide flex-shrink-0 w-[800px]">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                                <div class="bg-gray-100 px-4 py-3 flex items-center gap-2 border-b border-gray-200">
                                    <div class="flex gap-2">
                                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                    </div>
                                    <div class="flex-1 text-center">
                                        <span class="text-xs text-gray-500">isubyo - Admin Panel</span>
                                    </div>
                                </div>
                                <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-[400px]">
                                    <!-- Mock Admin Content -->
                                    <div class="grid grid-cols-4 gap-4 mb-6">
                                        <div class="bg-gradient-to-br from-sky-500 to-sky-600 p-4 rounded-xl text-white">
                                            <p class="text-xs opacity-80 mb-1">Total Members</p>
                                            <p class="text-2xl font-bold">245</p>
                                        </div>
                                        <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-xl text-white">
                                            <p class="text-xs opacity-80 mb-1">Active Groups</p>
                                            <p class="text-2xl font-bold">12</p>
                                        </div>
                                        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 p-4 rounded-xl text-white">
                                            <p class="text-xs opacity-80 mb-1">Total Savings</p>
                                            <p class="text-2xl font-bold">45M</p>
                                        </div>
                                        <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-4 rounded-xl text-white">
                                            <p class="text-xs opacity-80 mb-1">Loans Issued</p>
                                            <p class="text-2xl font-bold">18M</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="bg-white rounded-xl shadow-sm p-4">
                                            <h4 class="font-semibold text-gray-900 mb-3">Pending Approvals</h4>
                                            <div class="space-y-2">
                                                <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                                                    <span class="text-sm">New Member Request</span>
                                                    <span class="text-xs bg-orange-200 text-orange-800 px-2 py-1 rounded">Pending</span>
                                                </div>
                                                <div class="flex items-center justify-between p-2 bg-blue-50 rounded-lg">
                                                    <span class="text-sm">Loan Application</span>
                                                    <span class="text-xs bg-blue-200 text-blue-800 px-2 py-1 rounded">Review</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-white rounded-xl shadow-sm p-4">
                                            <h4 class="font-semibold text-gray-900 mb-3">Quick Actions</h4>
                                            <div class="grid grid-cols-2 gap-2">
                                                <button class="p-2 bg-sky-100 text-sky-700 rounded-lg text-xs font-medium">Add Member</button>
                                                <button class="p-2 bg-purple-100 text-purple-700 rounded-lg text-xs font-medium">New Loan</button>
                                                <button class="p-2 bg-emerald-100 text-emerald-700 rounded-lg text-xs font-medium">Record Payment</button>
                                                <button class="p-2 bg-amber-100 text-amber-700 rounded-lg text-xs font-medium">Reports</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center mt-4 text-sm font-medium text-gray-600">Admin Dashboard</p>
                        </div>

                        <!-- Screenshot 3: Loan Management -->
                        <div class="slider-slide flex-shrink-0 w-[800px]">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                                <div class="bg-gray-100 px-4 py-3 flex items-center gap-2 border-b border-gray-200">
                                    <div class="flex gap-2">
                                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                    </div>
                                    <div class="flex-1 text-center">
                                        <span class="text-xs text-gray-500">isubyo - Loan Management</span>
                                    </div>
                                </div>
                                <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-[400px]">
                                    <!-- Mock Loan Content -->
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-lg font-bold text-gray-900">Active Loans</h3>
                                        <button class="px-4 py-2 bg-gradient-to-r from-sky-500 to-purple-500 text-white text-sm rounded-lg">+ New Loan</button>
                                    </div>
                                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                        <table class="w-full">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Member</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Amount</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Interest</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Status</th>
                                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Progress</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-100">
                                                <tr>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center gap-2">
                                                            <div class="w-8 h-8 bg-sky-100 rounded-full flex items-center justify-center text-sky-600 font-bold text-xs">JM</div>
                                                            <span class="text-sm font-medium">Jean Marie</span>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">RWF 500,000</td>
                                                    <td class="px-4 py-3 text-sm">10%</td>
                                                    <td class="px-4 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Active</span></td>
                                                    <td class="px-4 py-3">
                                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-green-500 h-2 rounded-full" style="width: 65%"></div>
                                                        </div>
                                                        <span class="text-xs text-gray-500">65% paid</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center gap-2">
                                                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold text-xs">AN</div>
                                                            <span class="text-sm font-medium">Alice N.</span>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm">RWF 300,000</td>
                                                    <td class="px-4 py-3 text-sm">8%</td>
                                                    <td class="px-4 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Active</span></td>
                                                    <td class="px-4 py-3">
                                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-green-500 h-2 rounded-full" style="width: 30%"></div>
                                                        </div>
                                                        <span class="text-xs text-gray-500">30% paid</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center mt-4 text-sm font-medium text-gray-600">Loan Management</p>
                        </div>

                        <!-- Screenshot 4: Reports & Analytics -->
                        <div class="slider-slide flex-shrink-0 w-[800px]">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                                <div class="bg-gray-100 px-4 py-3 flex items-center gap-2 border-b border-gray-200">
                                    <div class="flex gap-2">
                                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                    </div>
                                    <div class="flex-1 text-center">
                                        <span class="text-xs text-gray-500">isubyo - Analytics</span>
                                    </div>
                                </div>
                                <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-[400px]">
                                    <!-- Mock Analytics Content -->
                                    <div class="flex justify-between items-center mb-6">
                                        <h3 class="text-lg font-bold text-gray-900">Financial Analytics</h3>
                                        <select class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm">
                                            <option>Last 6 Months</option>
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div class="bg-white rounded-xl shadow-sm p-4">
                                            <h4 class="font-semibold text-gray-900 mb-4">Savings Growth</h4>
                                            <!-- Chart Placeholder -->
                                            <div class="h-40 flex items-end gap-2 px-4">
                                                <div class="flex-1 bg-gradient-to-t from-sky-500 to-sky-300 rounded-t-lg" style="height: 40%"></div>
                                                <div class="flex-1 bg-gradient-to-t from-sky-500 to-sky-300 rounded-t-lg" style="height: 55%"></div>
                                                <div class="flex-1 bg-gradient-to-t from-sky-500 to-sky-300 rounded-t-lg" style="height: 45%"></div>
                                                <div class="flex-1 bg-gradient-to-t from-sky-500 to-sky-300 rounded-t-lg" style="height: 70%"></div>
                                                <div class="flex-1 bg-gradient-to-t from-sky-500 to-sky-300 rounded-t-lg" style="height: 85%"></div>
                                                <div class="flex-1 bg-gradient-to-t from-purple-500 to-purple-300 rounded-t-lg" style="height: 100%"></div>
                                            </div>
                                            <div class="flex justify-between text-xs text-gray-500 mt-2 px-4">
                                                <span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span>
                                            </div>
                                        </div>
                                        <div class="bg-white rounded-xl shadow-sm p-4">
                                            <h4 class="font-semibold text-gray-900 mb-4">Loan Distribution</h4>
                                            <!-- Donut Chart Placeholder -->
                                            <div class="flex items-center justify-center">
                                                <div class="relative w-32 h-32">
                                                    <svg class="w-full h-full" viewBox="0 0 36 36">
                                                        <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#e5e7eb" stroke-width="3"/>
                                                        <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#0ea5e9" stroke-width="3" stroke-dasharray="45, 100"/>
                                                        <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#8b5cf6" stroke-width="3" stroke-dasharray="30, 100" stroke-dashoffset="-45"/>
                                                        <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#10b981" stroke-width="3" stroke-dasharray="25, 100" stroke-dashoffset="-75"/>
                                                    </svg>
                                                </div>
                                                <div class="ml-4 space-y-2">
                                                    <div class="flex items-center gap-2 text-xs">
                                                        <div class="w-3 h-3 bg-sky-500 rounded"></div>
                                                        <span>Personal (45%)</span>
                                                    </div>
                                                    <div class="flex items-center gap-2 text-xs">
                                                        <div class="w-3 h-3 bg-purple-500 rounded"></div>
                                                        <span>Business (30%)</span>
                                                    </div>
                                                    <div class="flex items-center gap-2 text-xs">
                                                        <div class="w-3 h-3 bg-emerald-500 rounded"></div>
                                                        <span>Emergency (25%)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center mt-4 text-sm font-medium text-gray-600">Reports & Analytics</p>
                        </div>

                        <!-- Duplicate slides for infinite loop -->
                        <!-- Screenshot 1 Clone -->
                        <div class="slider-slide flex-shrink-0 w-[800px]">
                            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                                <div class="bg-gray-100 px-4 py-3 flex items-center gap-2 border-b border-gray-200">
                                    <div class="flex gap-2">
                                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                    </div>
                                    <div class="flex-1 text-center">
                                        <span class="text-xs text-gray-500">isubyo - Member Dashboard</span>
                                    </div>
                                </div>
                                <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-[400px]">
                                    <div class="grid grid-cols-3 gap-4 mb-6">
                                        <div class="bg-white p-4 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500 mb-1">My Savings</p>
                                            <p class="text-2xl font-bold text-gray-900">RWF 1.2M</p>
                                            <p class="text-xs text-green-600"><i class="fas fa-arrow-up"></i> +15%</p>
                                        </div>
                                        <div class="bg-white p-4 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500 mb-1">Active Loans</p>
                                            <p class="text-2xl font-bold text-gray-900">RWF 500K</p>
                                            <p class="text-xs text-blue-600">2 loans</p>
                                        </div>
                                        <div class="bg-white p-4 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500 mb-1">Interest Earned</p>
                                            <p class="text-2xl font-bold text-gray-900">RWF 45K</p>
                                            <p class="text-xs text-purple-600">This month</p>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-xl shadow-sm p-4">
                                        <div class="flex justify-between items-center mb-4">
                                            <h4 class="font-semibold text-gray-900">Recent Transactions</h4>
                                            <span class="text-xs text-sky-600">View All</span>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                        <i class="fas fa-arrow-down text-green-600 text-xs"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-900">Savings Deposit</p>
                                                        <p class="text-xs text-gray-500">Dec 28, 2025</p>
                                                    </div>
                                                </div>
                                                <span class="text-sm font-semibold text-green-600">+RWF 50,000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center mt-4 text-sm font-medium text-gray-600">Member Dashboard</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Dots -->
                <div class="flex justify-center gap-3 mt-8">
                    <button class="slider-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition active" data-slide="0"></button>
                    <button class="slider-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition" data-slide="1"></button>
                    <button class="slider-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition" data-slide="2"></button>
                    <button class="slider-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition" data-slide="3"></button>
                </div>

                <!-- Navigation Arrows -->
                <button id="slider-prev" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white shadow-lg rounded-full flex items-center justify-center hover:bg-gray-50 transition">
                    <i class="fas fa-chevron-left text-gray-600"></i>
                </button>
                <button id="slider-next" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white shadow-lg rounded-full flex items-center justify-center hover:bg-gray-50 transition">
                    <i class="fas fa-chevron-right text-gray-600"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="text-sm font-semibold text-sky-600 tracking-wider uppercase">Features</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6">Everything You Need</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Powerful tools designed to simplify savings group management and maximize your financial growth.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-sky-400 to-sky-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-hand-holding-dollar text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Smart Loan Management</h3>
                    <p class="text-gray-600 mb-6">Automate loan processing with flexible terms, automatic interest calculations, and payment tracking.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-sky-500"></i>
                            <span>Customizable interest rates</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-sky-500"></i>
                            <span>Automated payment schedules</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-sky-500"></i>
                            <span>Default alerts & tracking</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-piggy-bank text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Savings Tracking</h3>
                    <p class="text-gray-600 mb-6">Track every contribution with precision. Monitor individual and group savings in real-time.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-purple-500"></i>
                            <span>Individual member accounts</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-purple-500"></i>
                            <span>Automatic interest accrual</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-purple-500"></i>
                            <span>Withdrawal management</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Financial Reports</h3>
                    <p class="text-gray-600 mb-6">Get comprehensive insights with beautiful reports and analytics dashboards.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-pink-500"></i>
                            <span>Real-time dashboards</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-pink-500"></i>
                            <span>Exportable statements</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-pink-500"></i>
                            <span>Performance analytics</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Multi-Group Support</h3>
                    <p class="text-gray-600 mb-6">Manage multiple savings groups from a single dashboard with ease.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-amber-500"></i>
                            <span>Unlimited groups</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-amber-500"></i>
                            <span>Role-based permissions</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-amber-500"></i>
                            <span>Independent accounting</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-bell text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Smart Notifications</h3>
                    <p class="text-gray-600 mb-6">Stay informed with automated reminders for payments, meetings, and important updates.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-emerald-500"></i>
                            <span>Payment reminders</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-emerald-500"></i>
                            <span>Meeting alerts</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-emerald-500"></i>
                            <span>Custom notifications</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-gray-100">
                    <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-shield-halved text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Bank-Level Security</h3>
                    <p class="text-gray-600 mb-6">Your data is protected with enterprise-grade encryption and security protocols.</p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-red-500"></i>
                            <span>256-bit encryption</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-red-500"></i>
                            <span>Two-factor auth</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-red-500"></i>
                            <span>Complete audit trails</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="text-sm font-semibold text-purple-600 tracking-wider uppercase">Process</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6">How It Works</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Get started in minutes with our simple and intuitive workflow.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Loan Workflow -->
                <div class="relative">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 gradient-primary rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-hand-holding-dollar text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Loan Process</h3>
                    </div>

                    <div class="space-y-8 relative">
                        <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-sky-500 to-purple-500"></div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-sky-100 rounded-full flex items-center justify-center text-sky-600 font-bold shrink-0 z-10 border-4 border-white shadow">1</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Apply for Loan</h4>
                                <p class="text-gray-600 mt-1">Member submits loan request with desired amount and terms</p>
                            </div>
                        </div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold shrink-0 z-10 border-4 border-white shadow">2</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Admin Review</h4>
                                <p class="text-gray-600 mt-1">Group administrator reviews and approves the application</p>
                            </div>
                        </div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center text-pink-600 font-bold shrink-0 z-10 border-4 border-white shadow">3</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Disbursement</h4>
                                <p class="text-gray-600 mt-1">Funds are released and payment schedule is generated</p>
                            </div>
                        </div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 font-bold shrink-0 z-10 border-4 border-white shadow">4</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Repayment</h4>
                                <p class="text-gray-600 mt-1">Track and record payments automatically</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Savings Workflow -->
                <div class="relative">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-piggy-bank text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Savings Process</h3>
                    </div>

                    <div class="space-y-8 relative">
                        <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-emerald-500 to-teal-500"></div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 font-bold shrink-0 z-10 border-4 border-white shadow">1</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Join a Group</h4>
                                <p class="text-gray-600 mt-1">Register and join your savings group</p>
                            </div>
                        </div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center text-teal-600 font-bold shrink-0 z-10 border-4 border-white shadow">2</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Account Setup</h4>
                                <p class="text-gray-600 mt-1">Your personal savings account is automatically created</p>
                            </div>
                        </div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center text-cyan-600 font-bold shrink-0 z-10 border-4 border-white shadow">3</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Contribute</h4>
                                <p class="text-gray-600 mt-1">Make regular deposits to grow your savings</p>
                            </div>
                        </div>

                        <div class="flex gap-6 relative">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold shrink-0 z-10 border-4 border-white shadow">4</div>
                            <div class="pt-2">
                                <h4 class="font-semibold text-gray-900 text-lg">Earn & Grow</h4>
                                <p class="text-gray-600 mt-1">Watch your savings grow with interest over time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 left-20 w-64 h-64 bg-sky-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-64 h-64 bg-purple-500 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-20">
                <span class="text-sm font-semibold text-sky-400 tracking-wider uppercase">Why Choose Us</span>
                <h2 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-6">Built for Success</h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">Experience the difference with features designed to help your group thrive.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white/5 backdrop-blur-lg p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-12 h-12 bg-sky-500/20 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bolt text-sky-400 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Lightning Fast</h3>
                    <p class="text-gray-400">Get up and running in minutes, not days. Our intuitive setup makes it easy.</p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-lock text-purple-400 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Bank-Level Security</h3>
                    <p class="text-gray-400">Your data is protected with enterprise-grade encryption and security measures.</p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-12 h-12 bg-pink-500/20 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-chart-pie text-pink-400 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Real-time Analytics</h3>
                    <p class="text-gray-400">Get instant insights into your group's financial health with live dashboards.</p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-headset text-amber-400 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">24/7 Support</h3>
                    <p class="text-gray-400">Our dedicated support team is always ready to help you succeed.</p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-expand text-emerald-400 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Unlimited Scale</h3>
                    <p class="text-gray-400">Grow without limits. Support unlimited groups and members.</p>
                </div>

                <div class="bg-white/5 backdrop-blur-lg p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-screen text-red-400 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Access Anywhere</h3>
                    <p class="text-gray-400">Manage your group from any device, anywhere in the world.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-sm font-semibold text-pink-600 tracking-wider uppercase">Testimonials</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6">Loved by Groups</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"isubyo has transformed how we manage our savings group. Everything is now transparent and easy to track."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center text-white font-bold">JM</div>
                        <div>
                            <p class="font-semibold text-gray-900">Jean Marie</p>
                            <p class="text-sm text-gray-500">Group Administrator</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"The loan management feature is incredible. Automatic calculations and reminders save us so much time."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">AN</div>
                        <div>
                            <p class="font-semibold text-gray-900">Alice Niyonzima</p>
                            <p class="text-sm text-gray-500">Treasurer</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"Finally, a system that understands savings groups! The reports help us make better financial decisions."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-bold">PM</div>
                        <div>
                            <p class="font-semibold text-gray-900">Patrick Mugabo</p>
                            <p class="text-sm text-gray-500">Group Member</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 gradient-primary"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Ready to Transform Your Group?</h2>
            <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto">Join hundreds of groups already using isubyo to manage their savings and loans more efficiently.</p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-white text-gray-900 px-10 py-4 rounded-full font-semibold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 inline-flex items-center justify-center">
                        Go to Dashboard
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-white text-gray-900 px-10 py-4 rounded-full font-semibold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 inline-flex items-center justify-center">
                        Start Free Trial
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                    <a href="{{ route('login') }}" class="border-2 border-white text-white px-10 py-4 rounded-full font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300">
                        Sign In
                    </a>
                @endauth
            </div>

            <p class="text-white/60 text-sm mt-8">No credit card required • Free 14-day trial • Cancel anytime</p>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });

        // Screenshot Slider
        const sliderTrack = document.querySelector('.slider-track');
        const slides = document.querySelectorAll('.slider-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const prevBtn = document.getElementById('slider-prev');
        const nextBtn = document.getElementById('slider-next');
        let currentSlide = 0;
        const totalSlides = 4;
        const slideWidth = 832; // 800px + 32px gap

        function updateSlider(index, stopAnimation = true) {
            if (stopAnimation) {
                sliderTrack.classList.remove('animate-scroll');
            }
            sliderTrack.style.transform = `translateX(-${index * slideWidth}px)`;
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            currentSlide = index;
        }

        prevBtn.addEventListener('click', () => {
            const newIndex = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
            updateSlider(newIndex);
        });

        nextBtn.addEventListener('click', () => {
            const newIndex = currentSlide === totalSlides - 1 ? 0 : currentSlide + 1;
            updateSlider(newIndex);
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                updateSlider(index);
            });
        });

        // Auto-advance slider every 5 seconds when not hovered
        let autoSlideInterval;
        const sliderContainer = document.querySelector('.slider-container');

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                const newIndex = currentSlide === totalSlides - 1 ? 0 : currentSlide + 1;
                updateSlider(newIndex, false);
            }, 5000);
        }

        sliderContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        sliderContainer.addEventListener('mouseleave', () => {
            startAutoSlide();
        });

        // Initialize without auto-scroll animation, use interval instead
        sliderTrack.classList.remove('animate-scroll');
        startAutoSlide();
    </script>
</body>
</html>
