<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Teaching and Learning Certification')</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    @stack('scripts')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

<body>
    <header class="mb-16">
        <nav
            class="fixed w-full z-20 top-0 start-0 bg-white/95 backdrop-blur-[20px] shadow-lg border-b border-white/20 overflow-visible">
            <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto py-3 px-4 lg:px-8">
                <!-- Brand Section -->
                <div class="flex items-center space-x-2 sm:space-x-3 group flex-1 min-w-0 lg:flex-none">
                    <div class="relative flex-shrink-0">
                        <img src="{{ asset('assets/img/tlc.png') }}"
                            class="h-8 w-8 sm:h-10 sm:w-10 md:h-12 md:w-12 rounded-lg drop-shadow-[0_0_15px_rgba(29,78,137,0.2)] transition-all duration-300 group-hover:drop-shadow-[0_0_20px_rgba(29,78,137,0.4)] group-hover:scale-103"
                            alt="TLC Logo">
                    </div>
                    <div class="select-none min-w-0 flex-1 lg:flex-none">
                        <h1
                            class="text-sm sm:text-lg md:text-2xl font-black bg-gradient-to-br from-[#1D4E89] to-[#667eea] bg-clip-text text-transparent tracking-tight capitalize truncate">
                            TLC Program
                        </h1>
                        <p class="text-[10px] sm:text-xs text-slate-600 font-medium tracking-wide capitalize truncate">
                            Teaching & Learning Certification
                        </p>
                    </div>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="lg:hidden flex items-center space-x-2 sm:space-x-4 flex-shrink-0">
                    <!-- Notification Icon for Mobile -->
                    <div class="relative">
                        <button
                            class="p-1.5 sm:p-2 rounded-full bg-white/60 backdrop-blur-sm border border-white/30 hover:bg-white/80 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500/20">
                            <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-700" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.149.757-.405 1.035L4 17h5m6 0a3 3 0 11-6 0">
                                </path>
                            </svg>
                            <span
                                class="absolute -top-1 -right-1 sm:-top-1.5 sm:-right-1.5 bg-gradient-to-r from-red-500 to-pink-500 text-white text-[10px] sm:text-xs font-bold rounded-full px-1 sm:px-1.5 py-0.5 shadow-lg animate-pulse">
                                3
                            </span>
                        </button>
                    </div>
                    <button id="mobile-menu-toggle"
                        class="p-2 sm:p-2.5 rounded-lg bg-white/90 backdrop-blur-[10px] border border-[#1D4E89]/10 hover:bg-white hover:scale-105 transition-all duration-300 text-slate-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20">
                        <svg id="hamburger-icon" class="h-4 w-4 sm:h-5 sm:w-5 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg id="close-icon" class="h-4 w-4 sm:h-5 sm:w-5 transition-transform duration-300 hidden"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Menu for Desktop - Centered -->
                <div class="hidden lg:flex items-center justify-center space-x-6 flex-1">
                    <a href="{{ route('asesi.dashboard') }}"
                        class="nav-link text-base font-semibold transition-all duration-300 relative {{ request()->routeIs('asesi.dashboard') ? 'text-[#1D4E89] font-bold' : 'text-gray-600 hover:text-[#1D4E89]' }}">
                        Dashboard
                        <span
                            class="{{ request()->routeIs('asesi.dashboard') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                    </a>

                    <a href="{{ route('asesi.sertifikasi') }}"
                        class="nav-link text-base font-semibold transition-all duration-300 relative {{ request()->routeIs('asesi.sertifikasi') ? 'text-[#1D4E89] font-bold' : 'text-gray-600 hover:text-[#1D4E89]' }}">
                        Sertifikasi
                        <span
                            class="{{ request()->routeIs('asesi.sertifikasi') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                    </a>

                    <a href="{{ route('asesi.transaksi') }}"
                        class="nav-link text-base font-semibold transition-all duration-300 relative {{ request()->routeIs('asesi.transaksi') ? 'text-[#1D4E89] font-bold' : 'text-gray-600 hover:text-[#1D4E89]' }}">
                        Transaksi
                        <span
                            class="{{ request()->routeIs('asesi.transaksi') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                    </a>
                </div>

                <!-- Right Section (Profile & Notifications) for Desktop -->
                <div class="hidden lg:flex items-center space-x-4 flex-shrink-0">
                    <!-- Welcome Message -->
                    <div
                        class="bg-gradient-to-br from-[#1D4E89]/10 to-[#667eea]/10 border border-[#1D4E89]/20 hover:bg-gradient-to-br hover:from-[#1D4E89]/15 hover:to-[#667eea]/15 hover:translate-y-[-1px] hover:shadow-[0_4px_15px_rgba(29,78,137,0.08)] rounded-lg px-3 py-2 transition-all duration-300">
                        <div class="flex items-center space-x-2">
                            <div class="relative">
                                <svg class="h-5 w-5 text-[#1D4E89]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                    </path>
                                </svg>
                                <div
                                    class="absolute -top-0.5 -right-0.5 w-1.5 h-1.5 bg-blue-400 rounded-full animate-ping">
                                </div>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-700">Selamat datang,</span>
                                <span class="ml-1 font-bold text-[#1D4E89]">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Notification -->
                    {{-- <div class="relative">
                        <button
                            class="p-2.5 rounded-full bg-white/60 backdrop-blur-sm border border-white/30 hover:bg-white/80 hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500/20">
                            <svg class="h-5 w-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.149.757-.405 1.035L4 17h5m6 0a3 3 0 11-6 0">
                                </path>
                            </svg>
                        </button>
                        <span
                            class="absolute -top-1.5 -right-1.5 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold rounded-full px-1.5 py-0.5 shadow-lg animate-pulse">
                            3
                        </span>
                    </div> --}}

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profile-button-asesi"
                            class="flex items-center space-x-2 p-1.5 rounded-xl hover:bg-white/50 backdrop-blur-sm transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-500/20">
                            <div
                                class="p-[2px] bg-gradient-to-br from-[#1D4E89] to-[#667eea] rounded-full transition-all duration-300 hover:scale-105 hover:shadow-[0_4px_15px_rgba(29,78,137,0.2)]">
                                <img src="{{ asset('storage/' . (Auth::user()->userProfile->profile_image ?? 'blankProfile.png')) }}"
                                    alt="Profile Image" class="w-9 h-9 rounded-full object-cover">
                            </div>
                            <svg id="profile-arrow" class="h-4 w-4 text-gray-600 transition-transform duration-300"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="profile-menu-asesi"
                            class="absolute right-0 top-12 mt-2 w-48 bg-white/95 backdrop-blur-[20px] rounded-xl shadow-xl border border-white/20 hidden overflow-hidden z-[999]">
                            <div class="py-2">
                                <a href="{{ route('asesi.profile') }}"
                                    class="flex items-center space-x-3 px-4 py-3 transition-all duration-300 group {{ request()->routeIs('asesi.profile') ? 'text-[#1D4E89] font-bold bg-gradient-to-r from-blue-50 to-purple-50' : 'text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-[#1D4E89]' }}">
                                    <div
                                        class="p-1.5 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-blue-600">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Lihat Profil</span>
                                </a>

                                <div class="border-t border-gray-100 my-1"></div>

                                <a href="{{ route('asesi.profile') }}"
                                    class="flex items-center space-x-3 px-4 py-3 transition-all duration-300 group {{ request()->routeIs('asesi.profile') ? 'text-[#1D4E89] font-bold bg-gradient-to-r from-blue-50 to-purple-50' : 'text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-[#1D4E89]' }}">
                                    <div
                                        class="p-1.5 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-blue-600">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Riwayat Transaksi</span>
                                </a>

                                <div class="border-t border-gray-100 my-1"></div>

                                <a href="{{ route('asesi.profile') }}"
                                    class="flex items-center space-x-3 px-4 py-3 transition-all duration-300 group {{ request()->routeIs('asesi.profile') ? 'text-[#1D4E89] font-bold bg-gradient-to-r from-blue-50 to-purple-50' : 'text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-[#1D4E89]' }}">
                                    <div
                                        class="p-1.5 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-blue-600">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13">
                                            </line>
                                            <line x1="16" y1="17" x2="8" y2="17">
                                            </line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Sertifikat Saya</span>
                                </a>

                                <div class="border-t border-gray-100 my-1"></div>

                                <div>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="w-full flex items-center space-x-3 px-4 py-3 text-red-500 hover:bg-red-50 transition-all duration-300 group">
                                            <div
                                                class="p-1.5 bg-red-100 rounded-lg group-hover:bg-red-200 transition-colors duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="text-red-600">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9"
                                                        y2="12"></line>
                                                </svg>
                                            </div>
                                            <span class="font-medium">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu for Mobile -->
                <div id="mobile-menu"
                    class="lg:hidden fixed inset-x-0 top-16 bg-white/95 backdrop-blur-[20px] border border-gray-200/50 mx-4 rounded-2xl shadow-xl transition-all duration-300 overflow-hidden opacity-0 -translate-y-4 pointer-events-none z-50 lg:opacity-100 lg:translate-y-0 lg:pointer-events-auto lg:static lg:flex lg:bg-transparent lg:border-0 lg:mx-0 lg:rounded-none lg:shadow-none">
                    <div
                        class="container mx-auto px-6 lg:px-0 flex flex-col lg:flex-row items-center space-y-1 lg:space-y-0 lg:space-x-6 py-6 lg:py-0">
                        <a href="{{ route('asesi.dashboard') }}"
                            class="nav-link w-full lg:w-auto text-center lg:text-left px-4 py-3 lg:p-0 text-base font-semibold rounded-xl lg:rounded-none transition-all duration-300 relative {{ request()->routeIs('asesi.dashboard') ? 'text-[#1D4E89] font-bold bg-blue-50/50 lg:bg-transparent' : 'text-gray-600 hover:text-[#1D4E89] hover:bg-gray-50/50 lg:hover:bg-transparent' }}">
                            Dashboard
                            <span
                                class="{{ request()->routeIs('asesi.dashboard') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                        </a>

                        <a href="{{ route('asesi.sertifikasi') }}"
                            class="nav-link w-full lg:w-auto text-center lg:text-left px-4 py-3 lg:p-0 text-base font-semibold rounded-xl lg:rounded-none transition-all duration-300 relative {{ request()->routeIs('asesi.sertifikasi') ? 'text-[#1D4E89] font-bold bg-blue-50/50 lg:bg-transparent' : 'text-gray-600 hover:text-[#1D4E89] hover:bg-gray-50/50 lg:hover:bg-transparent' }}">
                            Sertifikasi
                            <span
                                class="{{ request()->routeIs('asesi.sertifikasi') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                        </a>

                        <a href="{{ route('asesi.transaksi') }}"
                            class="nav-link w-full lg:w-auto text-center lg:text-left px-4 py-3 lg:p-0 text-base font-semibold rounded-xl lg:rounded-none transition-all duration-300 relative {{ request()->routeIs('asesi.transaksi') ? 'text-[#1D4E89] font-bold bg-blue-50/50 lg:bg-transparent' : 'text-gray-600 hover:text-[#1D4E89] hover:bg-gray-50/50 lg:hover:bg-transparent' }}">
                            Transaksi
                            <span
                                class="{{ request()->routeIs('asesi.transaksi') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                        </a>

                        <a href="{{ route('asesi.profile') }}"
                            class="nav-link w-full lg:w-auto text-center lg:text-left px-4 py-3 lg:p-0 text-base font-semibold rounded-xl lg:rounded-none transition-all duration-300 relative {{ request()->routeIs('asesi.profile') ? 'text-[#1D4E89] font-bold bg-blue-50/50 lg:bg-transparent' : 'text-gray-600 hover:text-[#1D4E89] hover:bg-gray-50/50 lg:hover:bg-transparent' }}">
                            Profile
                            <span
                                class="{{ request()->routeIs('asesi.profile') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                        </a>

                        <a href="{{ route('asesi.profile') }}"
                            class="nav-link w-full lg:w-auto text-center lg:text-left px-4 py-3 lg:p-0 text-base font-semibold rounded-xl lg:rounded-none transition-all duration-300 relative {{ request()->routeIs('asesi.profile') ? 'text-[#1D4E89] font-bold bg-blue-50/50 lg:bg-transparent' : 'text-gray-600 hover:text-[#1D4E89] hover:bg-gray-50/50 lg:hover:bg-transparent' }}">
                            Sertifikat Saya
                            <span
                                class="{{ request()->routeIs('asesi.profile') ? 'absolute bottom-[-6px] left-1/2 w-full h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2' : 'absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-[#1D4E89] to-[#667eea] rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full' }}"></span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit"
                                class="nav-link w-full lg:w-auto text-center lg:text-left px-4 py-3 lg:p-0 text-base font-semibold rounded-xl lg:rounded-none transition-all duration-300 relative text-red-500 hover:text-red-600 hover:bg-red-50/50 lg:hover:bg-transparent group">
                                Logout
                                <span
                                    class="absolute bottom-[-6px] left-1/2 w-0 h-[2px] bg-gradient-to-r from-red-400 to-red-600 rounded-[2px] transition-all duration-300 transform -translate-x-1/2 group-hover:w-full"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mobile menu toggle functionality
                const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
                const mobileMenu = document.getElementById('mobile-menu');
                const hamburgerIcon = document.getElementById('hamburger-icon');
                const closeIcon = document.getElementById('close-icon');

                // if (mobileMenuToggle && mobileMenu) {
                if (mobileMenuToggle && mobileMenu && hamburgerIcon && closeIcon) {
                    mobileMenuToggle.addEventListener('click', function() {
                        // Check if menu is currently hidden
                        const isHidden = mobileMenu.classList.contains('opacity-0');

                        if (isHidden) {
                            // Show menu
                            mobileMenu.classList.remove('opacity-0', '-translate-y-4', 'pointer-events-none');
                            mobileMenu.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');

                            // Switch icons
                            hamburgerIcon.classList.add('hidden');
                            closeIcon.classList.remove('hidden');
                        } else {
                            // Hide menu
                            mobileMenu.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                            mobileMenu.classList.add('opacity-0', '-translate-y-4', 'pointer-events-none');

                            // Switch icons
                            hamburgerIcon.classList.remove('hidden');
                            closeIcon.classList.add('hidden');
                        }
                    });

                    // Close mobile menu when clicking outside
                    document.addEventListener('click', function(event) {
                        if (!mobileMenuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
                            // Hide menu
                            mobileMenu.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                            mobileMenu.classList.add('opacity-0', '-translate-y-4', 'pointer-events-none');

                            // Reset icons
                            hamburgerIcon.classList.remove('hidden');
                            closeIcon.classList.add('hidden');
                        }
                    });
                }

                // Profile dropdown functionality
                const profileButton = document.getElementById('profile-button-asesi');
                const profileMenu = document.getElementById('profile-menu-asesi');
                const profileArrow = document.getElementById('profile-arrow');

                // if (profileButton && profileMenu) {
                if (profileButton && profileMenu && profileArrow) {
                    profileButton.addEventListener('click', function() {
                        profileMenu.classList.toggle('hidden');
                        profileArrow.classList.toggle('rotate-180');
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(event) {
                        if (!profileButton.contains(event.target)) {
                            profileMenu.classList.add('hidden');
                            profileArrow.classList.remove('rotate-180');
                        }
                    });
                }

                // Close mobile menu when a nav link is clicked (for better UX)
                const navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        // Check if we're in mobile view and menu is open
                        if (window.innerWidth < 1024 && !mobileMenu.classList.contains('opacity-0')) {
                            // Hide menu
                            mobileMenu.classList.remove('opacity-100', 'translate-y-0',
                                'pointer-events-auto');
                            mobileMenu.classList.add('opacity-0', '-translate-y-4',
                                'pointer-events-none');

                            // Reset icons
                            hamburgerIcon.classList.remove('hidden');
                            closeIcon.classList.add('hidden');
                        }
                    });
                });
            });
        </script>

    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-[#0D3B66] text-white py-10 relative">
        <!-- Border Top -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500">
        </div>

        <div class="absolute inset-0 opacity-5">
            <div
                class="w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYtMi42ODYgNi02cy0yLjY4Ni02LTYtNmMtMy4zMTQgMC02IDIuNjg2LTYgNnMyLjY4NiA2IDYgNnptMCAwIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0yNCAzNmMzLjMxNCAwIDYtMi42ODYgNi02cy0yLjY4Ni02LTYtNmMtMy4zMTQgMC02IDIuNjg2LTYgNnMyLjY4NiA2IDYgNnptMCAwIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuNSIvPjwvZz48L3N2Zz4=')]">
            </div>
        </div>

        <div class="container max-w-6xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- TLC Program - kiri -->
                <div class="space-y-3">
                    <h2 class="text-xl font-bold mb-3 pb-2 border-b-2 border-orange-400 inline-block">
                        TLC Program
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4 text-sm">
                        Program sertifikasi untuk memberdayakan pendidik dengan pengetahuan dan
                        keterampilan mengajar yang efektif.
                    </p>
                    <div class="flex space-x-4 mt-3">
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Tautan Cepat - Middle -->
                <div class="md:flex md:justify-center">
                    <div class="space-y-3">
                        <h2 class="text-xl font-bold mb-3 pb-2 border-b-2 border-orange-400 inline-block">
                            Tautan Cepat
                        </h2>
                        <ul class="space-y-2 text-sm">
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Tentang TLC
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Manfaat
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Kurikulum
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Paket Harga
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Pendaftaran
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Kontak - Kanan -->
                <div class="md:text-right space-y-3">
                    <h2 class="text-xl font-bold mb-3 pb-2 border-b-2 border-orange-400 md:ml-auto md:inline-block">
                        Kontak
                    </h2>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start md:justify-end group">
                            <i
                                class="fas fa-map-marker-alt text-orange-400 text-lg mt-1 md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span class="ml-3 md:ml-0 text-gray-300 md:text-right md:order-1">
                                Jl. Pendidikan No. 123, Jakarta Pusat, Indonesia
                            </span>
                        </li>
                        <li class="flex items-center md:justify-end group">
                            <i
                                class="fas fa-phone-alt text-orange-400 text-lg md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span
                                class="ml-3 md:ml-0 text-gray-300 hover:text-orange-400 transition-colors md:order-1">
                                <a href="tel:+6221123456789">+62 21 1234 5678</a>
                            </span>
                        </li>
                        <li class="flex items-center md:justify-end group">
                            <i
                                class="fas fa-envelope text-orange-400 text-lg md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span
                                class="ml-3 md:ml-0 text-gray-300 hover:text-orange-400 transition-colors md:order-1">
                                <a href="mailto:info@tlcprogram.id">info@tlcprogram.id</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-4 border-t border-gray-500 text-center text-gray-400 text-sm">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>© 2025 Teaching and Learning Certification Program. All rights reserved.</p>
                    <div class="mt-2 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-orange-400 mx-2 transition-colors">Kebijakan
                            Privasi</a>
                        <span class="mx-2">|</span>
                        <a href="#" class="text-gray-400 hover:text-orange-400 mx-2 transition-colors">Syarat
                            & Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FontAwesome Script untuk Icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('sweetalert::alert')
    </footer>

    @livewireScripts
</body>

</html>
