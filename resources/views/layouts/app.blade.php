<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'TLC')</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-abu font-sans">

    <!-- Navbar -->
    <header class="mb-20">
        <nav class="fixed w-full z-20 top-0 start-0 bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] shadow-sm border-b border-gray-300">
            <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto py-4 px-4 sm:px-6 lg:px-12">
                <a href="#" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.svg') }}" class="h-12" alt="TLC Logo" loading="lazy">
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-white tracking-wide">TLC Program</span>
                        <span class="text-sm text-[#f1e686] font-medium hidden sm:block">Teaching & Learning Certification</span>
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
                            class="border-2 border-[#3A6EA5] font-bold text-white text-sm px-3 py-1.5 rounded-lg bg-[#3A6EA5] hover:bg-[#184575] hover:text-white hover:font-bold transition duration-300">Daftar Sekarang
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
                            class="border-2 border-white font-bold text-white text-sm px-3 py-1.5 rounded-lg hover:bg-[#90BE6D] hover:text-white hover:font-bold transition duration-300 w-full">Daftar Sekarang
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
    </footer>
</body>

</html>
