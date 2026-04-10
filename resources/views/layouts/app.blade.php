<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Teaching and Learning Certification')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-abu font-sans">
    <!-- Navbar -->
    <header>
        <nav id="main-nav" class="fixed w-full z-20 top-0 start-0 transition-all duration-500 ease-in-out"
            style="background: transparent;">
            <div
                class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto py-3 px-4 sm:px-6 lg:px-12">
                <a href="{{ route('register') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.svg') }}" class="h-10 w-10 scale-125 bg-white rounded-md"
                        alt="TLC Logo" loading="lazy" target="TLC logo">
                    <div class="flex flex-col">
                        <span class="text-lg font-extrabold transition-colors duration-500 text-white"
                            id="nav-brand-name">
                            TLC Program
                        </span>
                        <span class="text-sm font-medium sm:block transition-colors duration-500 text-white"
                            id="nav-brand-sub">
                            Teaching & Learning Certification
                        </span>
                    </div>
                </a>

                <!-- Hamburger Menu Button -->
                <button id="menu-toggle" class="lg:hidden text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex lg:items-center lg:space-x-10 text-sm font-semibold" id="menu">
                    <a href="{{ route('home') }}#home"
                        class="nav-link transition-colors duration-300 hover:text-[#f1e686] text-white">Beranda</a>
                    <a href="{{ route('home') }}#about"
                        class="nav-link transition-colors duration-300 hover:text-[#f1e686] text-white">Tentang TLC</a>
                    <a href="{{ route('home') }}#skema"
                        class="nav-link transition-colors duration-300 hover:text-[#f1e686] text-white">Skema</a>
                    <a href="{{ route('home') }}#harga"
                        class="nav-link transition-colors duration-300 hover:text-[#f1e686] text-white">Harga</a>
                    <a href="{{ route('home') }}#faq"
                        class="nav-link transition-colors duration-300 hover:text-[#f1e686] text-white">FAQ</a>
                    <a href="{{ route('contact-us') }}"
                        class="nav-link transition-colors duration-300 hover:text-[#f1e686] text-white">Hubungi Kami</a>
                    {{-- <a href="#proses" class="nav-link transition-colors duration-300 hover:text-[#f1e686]">Sertifikasi</a> --}}
                </div>

                <!-- Authentication Buttons -->
                <div class="hidden lg:flex lg:items-center lg:space-x-4">
                    <a href="{{ route('login') }}">
                        <button id="nav-btn-login"
                            class="border-2 font-bold text-sm px-3 py-1.5 rounded-lg transition-all duration-500 border-white text-white hover:border-[#f1e686] hover:text-[#f1e686]">
                            Masuk</button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button id="nav-btn-register"
                            class="border-2 font-bold text-white text-sm px-3 py-1.5 rounded-lg transition-all duration-500 border-white/60 bg-white/20 backdrop-blur-sm hover:bg-white hover:text-brandBlue">
                            Daftar Sekarang
                        </button>
                    </a>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="hidden lg:hidden flex flex-col items-center space-y-4 py-6 bg-brandBlue border-t border-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}#home"
                    class="text-white hover:text-[#f1e686] transition duration-300">Beranda</a>
                <a href="{{ route('home') }}#about"
                    class="text-white hover:text-[#f1e686] transition duration-300">Tentang TLC</a>
                <a href="{{ route('home') }}#skema"
                    class="text-white hover:text-[#f1e686] transition duration-300">Skema</a>
                <a href="{{ route('home') }}#harga"
                    class="text-white hover:text-[#f1e686] transition duration-300">Harga</a>
                {{-- <a href="#proses" class="text-white hover:text-[#f1e686] transition duration-300">Sertifikasi</a> --}}
                <a href="{{ route('home') }}#faq"
                    class="text-white hover:text-[#f1e686] transition duration-300">FAQ</a>
                <a href="{{ route('contact-us') }}"
                    class="text-white hover:text-[#f1e686] transition duration-300">Hubungi Kami</a>

                <div class="flex flex-col space-y-3 pt-4 w-full max-w-xs">
                    <a href="{{ route('login') }}" class="w-full">
                        <button
                            class="border-2 border-white font-bold text-white text-sm px-3 py-1.5 rounded-lg hover:bg-[#f1e686] hover:text-white hover:font-bold transition duration-300 w-full">Masuk
                        </button>
                    </a>
                    <a href="{{ route('register') }}" class="w-full">
                        <button
                            class="border-2 border-white font-bold text-white text-sm px-3 py-1.5 rounded-lg hover:bg-[#90BE6D] hover:text-white hover:font-bold transition duration-300 w-full">Daftar
                            Sekarang
                        </button>
                    </a>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const menuToggle = document.getElementById('menu-toggle');
                    const mobileMenu = document.getElementById('mobile-menu');
                    const nav = document.getElementById('main-nav');
                    const navLinks = document.querySelectorAll('.nav-link');
                    const brandName = document.getElementById('nav-brand-name');
                    const brandSub = document.getElementById('nav-brand-sub');
                    const btnLogin = document.getElementById('nav-btn-login');
                    const btnRegister = document.getElementById('nav-btn-register');
                    const hamburgerIcon = menuToggle ? menuToggle.querySelector('svg') : null;

                    function setNavTransparent() {
                        const isMobile = window.innerWidth < 768;

                        nav.style.background = 'transparent';
                        nav.style.boxShadow = 'none';
                        navLinks.forEach(l => l.style.color = '#ffffff');
                        if (brandName) {
                            brandName.style.color = isMobile ? '#1D4E89' : '#ffffff';
                        }

                        if (brandSub) {
                            brandSub.style.color = isMobile ? '#E76F51' : 'rgba(255,255,255,0.8)';
                        }
                        if (btnLogin) {
                            btnLogin.style.borderColor = 'white';
                            btnLogin.style.color = 'white';
                        }
                        if (btnRegister) {
                            btnRegister.style.borderColor = 'rgba(255,255,255,0.6)';
                            btnRegister.style.background = 'rgba(255,255,255,0.15)';
                            btnRegister.style.color = 'white';
                        }
                        if (hamburgerIcon) hamburgerIcon.style.stroke = isMobile ? '#1D4E89' : 'white';
                    }

                    function setNavSolid() {
                        nav.style.background = 'rgba(255,255,255,0.97)';
                        nav.style.boxShadow = '0 2px 16px rgba(0,0,0,0.10)';
                        navLinks.forEach(l => l.style.color = '#1D4E89');
                        if (brandName) {
                            brandName.style.color = '#1D4E89';
                        }
                        if (brandSub) {
                            brandSub.style.color = '#E76F51';
                        }
                        if (btnLogin) {
                            btnLogin.style.borderColor = '#1D4E89';
                            btnLogin.style.color = '#1D4E89';
                        }
                        if (btnRegister) {
                            btnRegister.style.borderColor = '#3A6EA5';
                            btnRegister.style.background = '#1D4E89';
                            btnRegister.style.color = 'white';
                        }
                        if (hamburgerIcon) hamburgerIcon.style.stroke = '#1D4E89';
                    }

                    // Init: always solid navbar
                    setNavSolid();

                    // Sync navbar position below referral banner
                    const referralBanner = document.getElementById('referral-banner');

                    function updateNavTop() {
                        if (referralBanner && !referralBanner.classList.contains('hidden') && referralBanner.style.display !== 'none') {
                            nav.style.top = referralBanner.offsetHeight + 'px';
                        } else {
                            nav.style.top = '0px';
                        }
                    }
                    // Expose globally so banner close button can also update nav position
                    window.__updateNavTop = updateNavTop;

                    updateNavTop();

                    window.addEventListener('resize', function() {
                        updateNavTop();
                    });

                    // Mobile menu toggle
                    menuToggle.addEventListener('click', function() {
                        mobileMenu.classList.toggle('hidden');
                    });

                    // Close mobile menu when window is resized to desktop
                    window.addEventListener('resize', function() {
                        if (window.innerWidth >= 1024) {
                            mobileMenu.classList.add('hidden');
                        }
                    });
                });
            </script>
        </nav>
        @yield('top-banner')

    </header>
    {{-- End Navbar --}}

    @yield('content')

    <!-- Swiper.js CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Swiper.js Initialization -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 15, // Jarak antar gambar tetap dekat
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

    {{-- </main> --}}
    @include('layouts.footer')

</body>

</html>
