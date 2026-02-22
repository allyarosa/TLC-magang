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
    @livewireStyles
</head>
<style>
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

<body>
    <header class="mb-16">
        <nav
            class="fixed w-full z-20 top-0 start-0 bg-white/95 backdrop-blur-[20px] shadow-md border-b border-white/20 overflow-visible">
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
                    <!-- Notification Icon for Mob  ile -->
                    <livewire:notification-modal />
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
                <div class="hidden lg:flex items-center justify-center gap-1 flex-1">
                    @php
                        $navs = [
                            ['name' => 'Dashboard', 'route' => 'asesi.dashboard'],
                            ['name' => 'Sertifikasi', 'route' => 'asesi.sertifikasi'],
                            ['name' => 'Transaksi', 'route' => 'asesi.transaksi'],
                        ];
                    @endphp

                    @foreach ($navs as $nav)
                        @php
                            $isActive = request()->routeIs($nav['route']);
                        @endphp

                        <a href="{{ route($nav['route']) }}"
                            class="px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200
                        {{ $isActive
                            ? 'bg-blue-50 text-blue-700'
                            : 'text-slate-600 hover:text-blue-700 hover:bg-slate-100' }}">
                            {{ $nav['name'] }}
                        </a>
                    @endforeach
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

                    @livewire('notification-modal')

                    <!-- Messages -->

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profile-button-asesi"
                            class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 transition-all focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                            <img src="{{ asset('storage/' . (Auth::user()->userProfile->profile_image ?? 'blankProfile.png')) }}"
                                alt="Profile Image" class="w-9 h-9 rounded-full object-cover border-2 border-blue-500">
                            <svg id="profile-arrow" class="w-4 h-4 text-gray-600 transition-transform duration-300"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
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
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <span class="font-medium">Lihat Profil</span>
                                </a>

                                <div class="border-t border-gray-100 my-1"></div>

                                {{-- <a href="{{ route('asesi.profile') }}"
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
                                </a> --}}

                                {{-- <div class="border-t border-gray-100 my-1"></div> --}}

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
                            class="nav-link w-full text-center px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->routeIs('asesi.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-100' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('asesi.sertifikasi') }}"
                            class="nav-link w-full text-center px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->routeIs('asesi.sertifikasi') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-100' }}">
                            Sertifikasi
                        </a>

                        <a href="{{ route('asesi.transaksi') }}"
                            class="nav-link w-full text-center px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->routeIs('asesi.transaksi') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-100' }}">
                            Transaksi
                        </a>

                        <a href="{{ route('asesi.profile') }}"
                            class="nav-link w-full text-center px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->routeIs('asesi.profile') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-100' }}">
                            Profile
                        </a>

                        <a href="{{ route('asesi.profile') }}"
                            class="nav-link w-full text-center px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->routeIs('asesi.profile') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-100' }}">
                            Sertifikat Saya
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit"
                                class="nav-link w-full text-center px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 text-red-600 hover:text-red-700 hover:bg-red-50">
                                Logout
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


                if (profileButton && profileMenu && profileArrow) {
                    profileButton.addEventListener('click', function() {
                        profileMenu.classList.toggle('hidden');
                        profileArrow.classList.toggle('rotate-180');
                    });

                    document.addEventListener('click', function(event) {
                        if (!profileButton.contains(event.target)) {
                            profileMenu.classList.add('hidden');
                            profileArrow.classList.remove('rotate-180');
                        }
                    });
                }

                // Notification modal functionality
                const notificationButton = document.getElementById('notification-button');
                const notificationModal = document.getElementById('notification-modal');

                if (notificationButton && notificationModal) {
                    notificationButton.addEventListener('click', function(event) {
                        event.stopPropagation();
                        notificationModal.classList.toggle('hidden');
                    });

                    document.addEventListener('click', function(event) {
                        if (!notificationModal.contains(event.target) && !notificationButton.contains(event
                                .target)) {
                            notificationModal.classList.add('hidden');
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

    <main class="bg-gray-50">
        @yield('content')
    </main>
        
    @include('layouts.footer')

    @livewireScripts
</body>

</html>
