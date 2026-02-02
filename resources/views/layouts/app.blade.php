<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'TLC')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>



<body class="bg-abu font-sans">

    <!-- Navbar -->
    <header class="mb-20">
        <nav
            class="fixed w-full z-20 top-0 start-0 bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] shadow-sm border-b border-gray-300">
            <div
                class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto py-4 px-4 sm:px-6 lg:px-12">
                <a href="#" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.svg') }}" class="h-12" alt="TLC Logo" loading="lazy" target="TLC logo">
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-white tracking-wide">TLC Program</span>
                        <span class="text-sm text-[#f1e686] font-medium hidden sm:block">
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
                    <a href="#home" class="text-white hover:text-[#f1e686] transition duration-300">Beranda</a>
                    <a href="#about" class="text-white hover:text-[#f1e686] transition duration-300">Tentang TLC</a>
                    <a href="#skema" class="text-white hover:text-[#f1e686] transition duration-300">Skema</a>
                    <a href="#harga" class="text-white hover:text-[#f1e686] transition duration-300">Harga</a>
                    {{-- <a href="#proses" class="text-white hover:text-[#f1e686] transition duration-300">Sertifikasi</a> --}}
                    <a href="#faq" class="text-white hover:text-[#f1e686] transition duration-300">FAQ</a>
                </div>

                <!-- Authentication Buttons -->
                <div class="hidden lg:flex lg:items-center lg:space-x-4">
                    <a href="{{ route('login') }}">
                        <button
                            class="border-2 border-white font-bold text-white text-sm px-3 py-1.5 rounded-lg hover:border-[#3A6EA5] hover:text-white hover:font-bold transition duration-300">
                            Masuk</button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button
                            class="border-2 border-[#3A6EA5] font-bold text-white text-sm px-3 py-1.5 rounded-lg bg-[#3A6EA5] hover:bg-[#184575] hover:text-white hover:font-bold transition duration-300">
                            Daftar Sekarang
                        </button>
                    </a>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="hidden lg:hidden flex flex-col items-center space-y-4 py-6 bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] border-t border-gray-300 text-sm font-medium">
                <a href="#home" class="text-white hover:text-[#f1e686] transition duration-300">Beranda</a>
                <a href="#about" class="text-white hover:text-[#f1e686] transition duration-300">Tentang TLC</a>
                <a href="#skema" class="text-white hover:text-[#f1e686] transition duration-300">Skema</a>
                <a href="#harga" class="text-white hover:text-[#f1e686] transition duration-300">Harga</a>
                {{-- <a href="#proses" class="text-white hover:text-[#f1e686] transition duration-300">Sertifikasi</a> --}}
                <a href="#faq" class="text-white hover:text-[#f1e686] transition duration-300">FAQ</a>

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
