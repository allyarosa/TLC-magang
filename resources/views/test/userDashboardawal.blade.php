<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-abu">

    {{-- Navbar --}}
    <header class="mb-20">
        <nav
            class="fixed w-full z-20 top-0 start-0 bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] shadow-lg border-b border-gray-300">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 px-6">

                <!-- Brand Section -->
                <div class="flex items-center space-x-4">
                    <img src="images/logo.svg" class="h-10 w-10 md:h-14 md:w-14" alt="TLC Logo">
                    <div>
                        <h1 class="text-lg md:text-2xl font-bold text-white tracking-wide capitalize">TLC Program</h1>
                        <p class="text-xs md:text-sm text-yellow-200 font-medium capitalize">
                            Teaching & Learning Certification
                        </p>
                    </div>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="lg:hidden">
                    <button id="mobile-menu-toggle" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Menu (Desktop & Mobile) -->
                <div id="mobile-menu"
                    class="hidden lg:flex fixed lg:static inset-x-0 top-16 lg:top-0 bg-gradient-to-r from-blue-600 to-green-500 lg:bg-none pb-4 lg:pb-0">
                    <div
                        class="container mx-auto px-4 lg:px-0 flex flex-col lg:flex-row items-center space-y-4 lg:space-y-0 lg:space-x-6">
                        <a href="#dashboard"
                            class="text-white font-semibold hover:text-yellow-300 transition transform hover:scale-110 capitalize">Dashboard</a>
                        <a href="#sertifikasi"
                            class="text-white font-semibold hover:text-yellow-300 transition transform hover:scale-110 capitalize">Sertifikasi</a>
                        <a href="#transaksi"
                            class="text-white font-semibold hover:text-yellow-300 transition transform hover:scale-110 capitalize">Transaksi</a>
                    </div>
                </div>

                <!-- User Interaction Area -->
                <div class="hidden lg:flex items-center space-x-4">

                    <!-- Search Component -->
                    <div class="relative">
                        <input type="text" placeholder="Cari Data"
                            class="pl-8 pr-2 py-2 w-40 rounded-full bg-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white text-sm">
                        <svg class="absolute left-2 top-3 h-4 w-4 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 12.65z"></path>
                        </svg>
                    </div>

                    <!-- Notification Icon -->
                    <div class="relative">
                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.149.757-.405 1.035L4 17h5m6 0a3 3 0 11-6 0">
                            </path>
                        </svg>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">3</span>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profile-button" class="flex items-center space-x-2">
                            <img src="images/aliando.jpg"
                                class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-lg"
                                alt="Profile">
                            <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Profile Dropdown Menu -->
                        <div id="profile-menu"
                            class="absolute right-0 top-16 w-64 bg-white shadow-lg rounded-lg border border-gray-200 hidden">
                            <div class="py-2">
                                <div class="px-4 py-2 hover:bg-gray-100 flex items-center space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Lihat Profil</span>
                                </div>
                                <div class="px-4 py-2 hover:bg-gray-100 flex items-center space-x-3 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span>Logout</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
                    document.getElementById('mobile-menu').classList.toggle('hidden');
                });

                const profileButton = document.getElementById("profile-button");
                const profileMenu = document.getElementById("profile-menu");
                profileButton.addEventListener("click", function(event) {
                    event.stopPropagation();
                    profileMenu.classList.toggle("hidden");
                });
                document.addEventListener("click", function(event) {
                    if (!profileMenu.contains(event.target) && !profileButton.contains(event.target)) {
                        profileMenu.classList.add("hidden");
                    }
                });
            });
        </script>
    </header>
    {{-- End Navbar --}}

    {{-- Tampilan Home --}}
    <main id="home"
        class="w-full px-5 py-16 bg-gradient-to-b from-blue-50 to-white text-gray-900  transition-all duration-500 hover:bg-blue-100">
        <div class="container mx-auto max-w-7xl">
            <div class="grid grid-cols-12 items-center gap-6">
                <div class="col-span-12 lg:col-span-7 p-5">
                    <h1
                        class="text-5xl font-extrabold leading-snug text-[#2D2D7E] transition-transform duration-300 hover:scale-105">
                        Teaching and Learning Certification (TLC) <span class="text-[#F4A261]">Program Sesuai Jenjang
                            Paket</span>
                    </h1>
                    <p class="text-lg text-gray-700 mt-4 transition-opacity duration-300 hover:opacity-80">
                        Memberdayakan pendidik dengan pengetahuan, <span class="font-bold">keterampilan,</span> dan
                        alat untuk berkembang <span class="font-bold">dalam pendidikan masa kini.</span>.
                    </p>
                    <div class="flex my-6 gap-4">
                        <a href="#"
                            class="bg-[#F4A261] text-white px-6 py-3 rounded-xl shadow-md text-lg font-semibold hover:bg-[#E76F51] transition-transform duration-300 hover:scale-110 active:scale-95">
                            Daftar Sekarang
                        </a>
                        <a href="#"
                            class="bg-gray-200 text-gray-900 px-6 py-3 rounded-xl shadow-md text-lg font-semibold hover:bg-gray-300 transition-transform duration-300 hover:scale-110 active:scale-95">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    <div class="flex items-center mt-6">
                        <div class="flex -space-x-2 overflow-hidden">
                            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white hover:scale-110 transition-transform duration-300"
                                src="images/hamas.png" alt="User 1">
                            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white hover:scale-110 transition-transform duration-300"
                                src="images/aliando.jpg" alt="User 2">
                            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white hover:scale-110 transition-transform duration-300"
                                src="images/guru.png" alt="User 3">
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-bold">4.9</p>
                            <div class="flex text-[#F4A261]">
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                            </div>
                            <p class="text-sm text-gray-700">Dipercaya oleh 25 ribu++ siswa</p>
                        </div>
                    </div>
                </div>
                <div
                    class="hidden lg:block col-span-12 lg:col-span-5 rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition-transform duration-500">
                    <iframe class="w-full h-[500px] rounded-xl"
                        src="https://www.youtube.com/embed/Jn7vuXLozJI?autoplay=1&mute=1" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </main>
    {{-- End Tampilan Home --}}

    {{-- Apa yang akan Guru Dapatkan? --}}
    <section class="max-w-7xl mx-auto px-8 py-20 bg-white">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-10 mb-14">
            <div class="md:w-1/3">
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight text-gray-800">Apa yang akan Guru
                    Dapatkan?</h2>
            </div>

            <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Box 1 -->
                <div
                    class="flex items-start bg-gradient-to-br from-purple-50 to-white p-6 rounded-2xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-purple-100 cursor-pointer group">
                    <div
                        class="bg-purple-500 p-3 rounded-full mr-4 shadow-lg group-hover:scale-110 transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v1m0 14v1m8-8h1M4 12H3m15.364-6.364l.707.707M6.343 17.657l-.707.707m12.728 0l.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-2 text-purple-600 group-hover:text-purple-700">3 Event
                            (Semnas, Praktik Baik, Diknas 32JP)</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">3 Event Guru dapatkan setiap bulannya, untuk
                            pengembangan diri guru.</p>
                    </div>
                </div>

                <!-- Box 2 -->
                <div
                    class="flex items-start bg-gradient-to-br from-blue-50 to-white p-6 rounded-2xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-blue-100 cursor-pointer group">
                    <div
                        class="bg-blue-500 p-3 rounded-full mr-4 shadow-lg group-hover:scale-110 transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h16M4 18h16M4 12h8" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-2 text-blue-600 group-hover:text-blue-700">Rekaman Sesi
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Akses rekaman pelatihan jika tidak bisa hadir
                            langsung.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Box Bawah -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Box 3 -->
            <div
                class="flex items-start bg-gradient-to-br from-orange-50 to-white p-6 rounded-2xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-orange-100 cursor-pointer group">
                <div
                    class="bg-orange-500 p-3 rounded-full mr-4 shadow-lg group-hover:scale-110 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5V4H2v16h5m10 0V4m-6 4h.01M12 16h.01M8 12h.01M16 12h.01" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-2 text-orange-600 group-hover:text-orange-700">Relasi Guru
                        Indonesia</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Ribuan guru tergabung dengan kami, dapatkan relasi
                        dari seluruh Indonesia.</p>
                </div>
            </div>

            <!-- Box 4 -->
            <div
                class="flex items-start bg-gradient-to-br from-yellow-50 to-white p-6 rounded-2xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-yellow-100 cursor-pointer group">
                <div
                    class="bg-yellow-500 p-3 rounded-full mr-4 shadow-lg group-hover:scale-110 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-2 text-yellow-600 group-hover:text-yellow-700">KTA Member
                        e-Guru.id</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Anggota mendapatkan identitas berupa Kartu
                        Digital.</p>
                </div>
            </div>

            <!-- Box 5 -->
            <div
                class="flex items-start bg-gradient-to-br from-green-50 to-white p-6 rounded-2xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-green-100 cursor-pointer group">
                <div
                    class="bg-green-500 p-3 rounded-full mr-4 shadow-lg group-hover:scale-110 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 1.343-3 3 0 .795.312 1.519.818 2.049L12 18l2.182-4.951A2.993 2.993 0 0015 11c0-1.657-1.343-3-3-3z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-2 text-green-600 group-hover:text-green-700">Sertifikasi Resmi
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Diakui oleh lembaga pendidikan terpercaya.</p>
                </div>
            </div>
        </div>
    </section>
    {{-- End guru dapatkan --}}

    {{-- Alur Pendaftaraan --}}
    <section class="relative w-full px-5 py-16 overflow-hidden">
        <div class="max-w-6xl mx-auto relative">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#4DB5D9] mb-4 animate__animated animate__fadeInDown">
                    Segera Daftarkan Diri Anda Di TLC
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto animate__animated animate__fadeIn">
                    Berikut Ini Langkah Mudah Pendaftaran Teaching & Learning Certification
                </p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#4DB5D9]/10 to-[#4DB5D9]/20 rounded-3xl blur-2xl">
                </div>

                <div class="relative z-10 grid grid-cols-3 gap-8">
                    <div class="group">
                        <div class="relative">
                            <div
                                class="absolute -inset-2 bg-[#4DB5D9]/20 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out blur-lg">
                            </div>
                            <div
                                class="relative z-10 w-36 h-36 mx-auto bg-white shadow-2xl border-4 border-[#4DB5D9] rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl">
                                <span
                                    class="text-6xl font-bold text-[#4DB5D9] transition-all duration-300 group-hover:text-7xl">1</span>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <h3
                                class="text-xl font-bold text-[#4DB5D9] mb-3 group-hover:text-[#4DB5D9]/80 transition-colors">
                                Daftar Akun</h3>
                            <p class="text-gray-600 px-4 group-hover:text-gray-800 transition-colors">
                                Lakukan registrasi akun lalu lengkapi profil dan lakukan pemesanan Paket.
                            </p>
                        </div>
                    </div>

                    <div class="group">
                        <div class="relative">
                            <div
                                class="absolute -inset-2 bg-[#4DB5D9]/20 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out blur-lg">
                            </div>
                            <div
                                class="relative z-10 w-36 h-36 mx-auto bg-white shadow-2xl border-4 border-[#4DB5D9] rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl">
                                <span
                                    class="text-6xl font-bold text-[#4DB5D9] transition-all duration-300 group-hover:text-7xl">2</span>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <h3
                                class="text-xl font-bold text-[#4DB5D9] mb-3 group-hover:text-[#4DB5D9]/80 transition-colors">
                                Konfirmasi</h3>
                            <p class="text-gray-600 px-4 group-hover:text-gray-800 transition-colors">
                                Admin TLC akan menghubungi kamu dan proses pemesanan kamu.
                            </p>
                        </div>
                    </div>

                    <div class="group">
                        <div class="relative">
                            <div
                                class="absolute -inset-2 bg-[#4DB5D9]/20 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out blur-lg">
                            </div>
                            <div
                                class="relative z-10 w-36 h-36 mx-auto bg-white shadow-2xl border-4 border-[#4DB5D9] rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl">
                                <span
                                    class="text-6xl font-bold text-[#4DB5D9] transition-all duration-300 group-hover:text-7xl">3</span>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <h3
                                class="text-xl font-bold text-[#4DB5D9] mb-3 group-hover:text-[#4DB5D9]/80 transition-colors">
                                Pilih Paket</h3>
                            <p class="text-gray-600 px-4 group-hover:text-gray-800 transition-colors">
                                Admin TLC akan menginformasikan ke kamu jika sudah ada pilih yang
                                dapat.
                            </p>
                        </div>
                    </div>
                </div>

                <svg class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full z-0"
                    viewBox="0 0 1200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 100C100 100 300 50 600 100C900 150 1100 100 1100 100" stroke="#4DB5D9"
                        stroke-width="4" stroke-linecap="round" class="animate__animated animate__fadeIn">
                    </path>
                </svg>
            </div>

            <div class="text-center mt-16">
                <button
                    class="px-8 py-3 bg-[#4DB5D9] text-white text-lg font-semibold rounded-full 
                            transform transition-all duration-300 hover:scale-105 hover:bg-[#4DB5D9]/90 
                            active:scale-95 shadow-xl hover:shadow-2xl">
                    Pesan Sekarang
                </button>
            </div>

            <div class="text-center mt-8 text-sm text-gray-500 italic animate__animated animate__fadeIn">
                Pendaftaran terbuka setiap saat paling lambat 2 hari sebelum program dimulai
            </div>
        </div>
        <script>
            // Optional: Add some additional interactivity
            document.querySelectorAll('.group').forEach(group => {
                group.addEventListener('mouseenter', (e) => {
                    const number = group.querySelector('span');
                    number.classList.add('animate__animated', 'animate__pulse');

                    setTimeout(() => {
                        number.classList.remove('animate__animated', 'animate__pulse');
                    }, 1000);
                });
            });
        </script>
    </section>
    {{-- End Pendaftaraan --}}

    {{-- Paket TLC --}}
    <section class="w-full py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Animated Header -->
            <div class="relative mb-12">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-sky-500 to-cyan-500 rounded-xl blur-lg opacity-75 animate-pulse">
                </div>
                <div class="relative bg-white/90 backdrop-blur-sm rounded-xl p-6 shadow-2xl">
                    <div class="flex justify-between items-center">
                        <h2
                            class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-sky-600 to-cyan-600 tracking-tight">
                            Teaching & Learning Certification
                        </h2>
                        <a href="#"
                            class="group flex items-center text-blue-600 hover:text-blue-800 transition-all duration-300 transform hover:scale-110">
                            <span class="text-xl font-bold mr-3 tracking-wide">Explore All</span>
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-all">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Category Buttons with Neon Effect -->
            <div class="flex justify-center space-x-6 mb-12">
                <button
                    class="px-8 py-3 bg-white text-blue-800 rounded-full shadow-xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 transform hover:scale-110 hover:shadow-blue-300/50 hover:shadow-2xl relative overflow-hidden">
                    <span class="relative z-10">PAKET A</span>
                    <span
                        class="absolute inset-0 bg-blue-100 opacity-0 hover:opacity-20 transition-all duration-300"></span>
                </button>
                <button
                    class="px-8 py-3 bg-white text-cyan-800 rounded-full shadow-xl border-2 border-cyan-200 hover:border-cyan-400 transition-all duration-300 transform hover:scale-110 hover:shadow-cyan-300/50 hover:shadow-2xl relative overflow-hidden">
                    <span class="relative z-10">PAKET B</span>
                    <span
                        class="absolute inset-0 bg-cyan-100 opacity-0 hover:opacity-20 transition-all duration-300"></span>
                </button>
                <button
                    class="px-8 py-3 bg-white text-sky-800 rounded-full shadow-xl border-2 border-sky-200 hover:border-sky-400 transition-all duration-300 transform hover:scale-110 hover:shadow-sky-300/50 hover:shadow-2xl relative overflow-hidden">
                    <span class="relative z-10">PAKET C</span>
                    <span
                        class="absolute inset-0 bg-sky-100 opacity-0 hover:opacity-20 transition-all duration-300"></span>
                </button>
            </div>

            <!-- Course Cards Container with Horizontal Scroll -->
            <div class="flex space-x-8 overflow-x-auto pb-10 px-4 course-scroll">

                <!-- Course Card 1 -->
                <div
                    class="course-card w-96 bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-blue-100 hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-4 hover:scale-105 relative">
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-sky-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Popular
                        </span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70 opacity-75"></div>
                        <img src="images/buku1.png" class="w-full h-64 object-cover" alt="Course Image">
                    </div>
                    <div class="p-6 -mt-16 relative z-20">
                        <h3
                            class="text-2xl font-bold text-[#1D2659] mb-3 drop-shadow-sm bg-white/70 px-2 py-1 rounded-lg inline-block">
                            Mengajar efektif menggunakan PCK</h3>
                        <div class="flex items-center mb-4">
                            <img src="images/hamas.png"
                                class="w-14 h-14 rounded-full mr-4 border-3 border-white shadow-lg" alt="Instructor">
                            <div>
                                <p
                                    class="font-semibold text-[#1D2659] text-lg drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block">
                                    Meutia Azzura</p>
                                <p
                                    class="text-gray-700 text-sm drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block mt-1">
                                    Content Writer</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-yellow-500">
                                <span class="text-3xl">★★★★★</span>
                                <span
                                    class="ml-3 text-[#1D2659] font-bold text-lg bg-white/70 px-2 py-0.5 rounded-lg">4.9</span>
                            </div>
                            <span
                                class="text-2xl font-bold text-white bg-sky-600 px-4 py-2 rounded-full">Rp360.000</span>
                        </div>
                    </div>
                </div>

                <!-- Best Seller Card (Similar modifications applied) -->
                <div
                    class="course-card w-96 bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-cyan-100 hover:border-cyan-300 transition-all duration-300 transform hover:-translate-y-4 hover:scale-105 relative">
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-cyan-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Best Seller
                        </span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70 opacity-75"></div>
                        <img src="images/buku2.png" class="w-full h-64 object-cover" alt="Course Image">
                    </div>
                    <div class="p-6 -mt-16 relative z-20">
                        <h3
                            class="text-2xl font-bold text-[#1D2659] mb-3 drop-shadow-sm bg-white/70 px-2 py-1 rounded-lg inline-block">
                            Merancang kemampuan berpikir kritis dalam pengajaran</h3>
                        <div class="flex items-center mb-4">
                            <img src="images/hamas.png"
                                class="w-14 h-14 rounded-full mr-4 border-3 border-white shadow-lg" alt="Instructor">
                            <div>
                                <p
                                    class="font-semibold text-[#1D2659] text-lg drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block">
                                    Carissa Mashinta</p>
                                <p
                                    class="text-gray-700 text-sm drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block mt-1">
                                    E-Commerce Manager</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-yellow-500">
                                <span class="text-3xl">★★★★★</span>
                                <span
                                    class="ml-3 text-[#1D2659] font-bold text-lg bg-white/70 px-2 py-0.5 rounded-lg">5.0</span>
                            </div>
                            <span
                                class="text-2xl font-bold text-white bg-cyan-600 px-4 py-2 rounded-full">Rp100.000</span>
                        </div>
                    </div>
                </div>

                <!-- Third Card (Similar modifications applied) -->
                <div
                    class="course-card w-96 bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-sky-100 hover:border-sky-300 transition-all duration-300 transform hover:-translate-y-4 hover:scale-105 relative">
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-sky-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Trending
                        </span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70 opacity-75"></div>
                        <img src="images/buku3.png" class="w-full h-64 object-cover" alt="Course Image">
                    </div>
                    <div class="p-6 -mt-16 relative z-20">
                        <h3
                            class="text-2xl font-bold text-[#1D2659] mb-3 drop-shadow-sm bg-white/70 px-2 py-1 rounded-lg inline-block">
                            Pengetahuan pembuatan modul ajar</h3>
                        <div class="flex items-center mb-4">
                            <img src="images/hamas.png"
                                class="w-14 h-14 rounded-full mr-4 border-3 border-white shadow-lg" alt="Instructor">
                            <div>
                                <p
                                    class="font-semibold text-[#1D2659] text-lg drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block">
                                    Rizky Pratama</p>
                                <p
                                    class="text-gray-700 text-sm drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block mt-1">
                                    Marketing Strategist</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-yellow-500">
                                <span class="text-3xl">★★★★★</span>
                                <span
                                    class="ml-3 text-[#1D2659] font-bold text-lg bg-white/70 px-2 py-0.5 rounded-lg">4.7</span>
                            </div>
                            <span
                                class="text-2xl font-bold text-white bg-sky-600 px-4 py-2 rounded-full">Rp250.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* Custom scrollbar for course cards */
            .course-scroll::-webkit-scrollbar {
                height: 8px;
            }

            .course-scroll::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }

            .course-scroll::-webkit-scrollbar-thumb {
                background: linear-gradient(to right, #38B2AC, #4FD1C5);
                border-radius: 10px;
            }

            .course-scroll {
                scroll-behavior: smooth;
                scrollbar-width: thin;
            }
        </style>
    </section>
    {{-- End Paket TLC --}}

    <!-- Webiner -->
    <section class="relative bg-white overflow-hidden">
        <!-- Subtle background texture -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl">
            </div>
            <div
                class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <!-- Left Section: Title and Illustration -->
                <div class="text-blue-900 space-y-6">
                    <h2 class="text-4xl font-extrabold leading-tight">
                        Perluas Wawasan
                        <span class="block text-blue-700">Bersama TLC di Bidangnya</span>
                    </h2>
                    <p class="text-blue-800 text-lg">
                        Dapatkan insight dan pengetahuan terbaru dari para ahli profesional melalui webinar eksklusif
                        kami.
                    </p>
                    <img src="https://cdn-web-2.ruangguru.com/file-uploader/lp/84af667f-a64d-45bb-97e9-48b3686737ca.png"
                        alt="Webinar Illustration"
                        class="w-full max-w-md mx-auto transform hover:scale-105 transition duration-300 rounded-lg shadow-md">
                </div>

                <!-- Right Section: Webinar Slider -->
                <div>
                    <div id="webinar-slider" class="slider-container relative overflow-hidden">
                        <div class="slider-wrapper flex transition-transform duration-500 ease-in-out">
                            <!-- Webinar Slide 1 -->
                            <div class="slide flex-shrink-0 w-full md:w-96 px-4">
                                <div
                                    class="bg-white rounded-2xl shadow-lg border border-blue-100 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                                    <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/a4199388-54ae-4637-a6b5-b6499829ed57.png"
                                        alt="Webinar 1" class="w-full h-64 object-cover rounded-t-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-blue-900 mb-3">Building Psychological Safety
                                        </h3>
                                        <div class="space-y-2 text-blue-800 mb-4">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                Selasa, 27 Juni 2023
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                19.00 - 20.00 WIB
                                            </div>
                                        </div>
                                        <button
                                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.02] active:scale-[0.98]">
                                            Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Webinar Slide 2 -->
                            <div class="slide flex-shrink-0 w-full md:w-96 px-4">
                                <div
                                    class="bg-white rounded-2xl shadow-lg border border-blue-100 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                                    <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/hs/05%20-%20RGFB/Webinar/Banner/banner-webinar-11-talent-assessment-development.jpeg"
                                        alt="Webinar 2" class="w-full h-64 object-cover rounded-t-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-blue-900 mb-3">Developing Talents through
                                            Assessment</h3>
                                        <div class="space-y-2 text-blue-800 mb-4">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                Rabu, 21 Desember 2022
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                10.00 - 11.00 WIB
                                            </div>
                                        </div>
                                        <button
                                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.02] active:scale-[0.98]">
                                            Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Webinar Slide 3 -->
                            <div class="slide flex-shrink-0 w-full md:w-96 px-4">
                                <div
                                    class="bg-white rounded-2xl shadow-lg border border-blue-100 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                                    <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/hs/Webinar-Ayung-Prasetyo-Landing-Page-1000x524.png"
                                        alt="Webinar 3" class="w-full h-64 object-cover rounded-t-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-blue-900 mb-3">Increasing Talent Capability
                                        </h3>
                                        <div class="space-y-2 text-blue-800 mb-4">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                Rabu, 8 Februari 2023
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                15.00 - 16.00 WIB
                                            </div>
                                        </div>
                                        <button
                                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.02] active:scale-[0.98]">
                                            Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide Indicators -->
                    <div class="flex justify-center space-x-2 mt-6">
                        <div data-slide="0"
                            class="slide-indicator w-6 h-2 bg-blue-600 rounded-full transition-all duration-300 cursor-pointer">
                        </div>
                        <div data-slide="1"
                            class="slide-indicator w-2 h-2 bg-blue-300 rounded-full transition-all duration-300 cursor-pointer">
                        </div>
                        <div data-slide="2"
                            class="slide-indicator w-2 h-2 bg-blue-300 rounded-full transition-all duration-300 cursor-pointer">
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-center space-x-4 mt-4">
                        <button id="prev-slide"
                            class="bg-blue-100 text-blue-600 p-2 rounded-full hover:bg-blue-200 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button id="next-slide"
                            class="bg-blue-100 text-blue-600 p-2 rounded-full hover:bg-blue-200 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- See More Link -->
            <div class="mt-12 text-center">
                <a href="https://www.ruangkerja.id/office-hour"
                    class="inline-flex items-center space-x-3 text-blue-700 font-semibold text-lg hover:text-blue-900 transition">
                    <span>Lihat Semua Event</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const slider = document.getElementById('webinar-slider');
                const sliderWrapper = slider.querySelector('.slider-wrapper');
                const slides = slider.querySelectorAll('.slide');
                const indicators = document.querySelectorAll('.slide-indicator');
                const prevButton = document.getElementById('prev-slide');
                const nextButton = document.getElementById('next-slide');

                let currentSlide = 0;
                const totalSlides = slides.length;

                function updateSlider() {
                    // Calculate the transform based on the current slide
                    const slideWidth = slides[0].offsetWidth;
                    sliderWrapper.style.transform = `translateX(-${currentSlide * slideWidth}px)`;

                    // Update indicators
                    indicators.forEach((indicator, index) => {
                        if (index === currentSlide) {
                            indicator.classList.remove('bg-blue-300', 'w-2');
                            indicator.classList.add('bg-blue-600', 'w-6');
                        } else {
                            indicator.classList.remove('bg-blue-600', 'w-6');
                            indicator.classList.add('bg-blue-300', 'w-2');
                        }
                    });
                }

                // Next slide function
                function nextSlide() {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    updateSlider();
                }

                // Previous slide function
                function prevSlide() {
                    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                    updateSlider();
                }

                // Add click events to indicators
                indicators.forEach((indicator) => {
                    indicator.addEventListener('click', () => {
                        currentSlide = parseInt(indicator.dataset.slide);
                        updateSlider();
                    });
                });

                // Add click events to navigation buttons
                nextButton.addEventListener('click', nextSlide);
                prevButton.addEventListener('click', prevSlide);

                // Optional: Auto slide every 5 seconds
                setInterval(nextSlide, 5000);

                // Initial update
                updateSlider();

                // Responsive handling
                window.addEventListener('resize', updateSlider);
            });
        </script>
    </section>
    <!-- End Webiner -->

    {{-- Testimoni --}}
    <section class="container mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h2
                class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-300 to-sky-600 animate-pulse">
                Testimoni Mereka
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Dengarkan pengalaman inspiratif dari para peserta kami
            </p>
        </div>

        <div id="testimonialCarousel" class="relative flex items-center justify-center overflow-hidden">
            <div id="testimonialTrack" class="flex transition-transform duration-500 ease-in-out">
                <!-- Maharani Testimonial -->
                <div class="testimonial-slide text-center w-64 flex-shrink-0 mx-4">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Maharani"
                            class="rounded-full w-32 h-32 object-cover border-4 border-pink-200 group-hover:animate-pulse">
                    </div>
                    <div
                        class="bg-gradient-to-br from-pink-100 to-pink-200 rounded-3xl p-6 mb-4 relative shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <span class="absolute top-0 left-4 text-6xl text-pink-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm italic z-10 relative px-4 py-2">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari
                            sesama pendidik di seluruh Indonesia."
                        </p>
                        <span class="absolute bottom-0 right-4 text-6xl text-pink-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-xl text-pink-700 animate-float">Maharani</h3>
                    <p class="text-sm text-gray-600">Ranger (15-18 tahun)</p>
                </div>

                <!-- Meilinda Testimonial -->
                <div class="testimonial-slide text-center w-64 flex-shrink-0 mx-4">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Meilinda"
                            class="rounded-full w-32 h-32 object-cover border-4 border-blue-200 group-hover:animate-pulse">
                    </div>
                    <div
                        class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-3xl p-6 mb-4 relative shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <span class="absolute top-0 left-4 text-6xl text-blue-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm italic z-10 relative px-4 py-2">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari
                            sesama pendidik di seluruh Indonesia."
                        </p>
                        <span class="absolute bottom-0 right-4 text-6xl text-blue-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-xl text-blue-700 animate-float">Meilinda</h3>
                    <p class="text-sm text-gray-600">Explorer (di atas 18 tahun)</p>
                </div>

                <!-- Keenar Testimonial -->
                <div class="testimonial-slide text-center w-64 flex-shrink-0 mx-4">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Keenar"
                            class="rounded-full w-32 h-32 object-cover border-4 border-green-200 group-hover:animate-pulse">
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-100 to-green-200 rounded-3xl p-6 mb-4 relative shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <span class="absolute top-0 left-4 text-6xl text-green-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm italic z-10 relative px-4 py-2">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari
                            sesama pendidik di seluruh Indonesia."
                        </p>
                        <span class="absolute bottom-0 right-4 text-6xl text-green-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-xl text-green-700 animate-float">Keenar</h3>
                    <p class="text-sm text-gray-600">Runner (7-10 tahun)</p>
                </div>

                <!-- Nandini Testimonial -->
                <div class="testimonial-slide text-center w-64 flex-shrink-0 mx-4">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Nandini"
                            class="rounded-full w-32 h-32 object-cover border-4 border-purple-200 group-hover:animate-pulse">
                    </div>
                    <div
                        class="bg-gradient-to-br from-purple-100 to-purple-200 rounded-3xl p-6 mb-4 relative shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <span class="absolute top-0 left-4 text-6xl text-purple-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm italic z-10 relative px-4 py-2">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari
                            sesama pendidik di seluruh Indonesia."
                        </p>
                        <span class="absolute bottom-0 right-4 text-6xl text-purple-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-xl text-purple-700 animate-float">Nandini</h3>
                    <p class="text-sm text-gray-600">Explorer (di atas 18 tahun)</p>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const track = document.getElementById('testimonialTrack');
                const slides = document.querySelectorAll('.testimonial-slide');
                const slideWidth = slides[0].offsetWidth + 32; // width + margin
                let currentIndex = 0;

                function autoScroll() {
                    currentIndex++;
                    if (currentIndex >= slides.length) {
                        currentIndex = 0;
                    }
                    track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                }

                // Auto scroll every 5 seconds
                setInterval(autoScroll, 5000);
            });
        </script>
        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            @keyframes pulse {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.5;
                }
            }
        </style>
    </section>
    {{-- End Testimoni --}}

    {{-- Logo Universitas --}}
    <section class="w-full px-10 py-20 bg-white text-gray-900 shadow-lg">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-start md:justify-between gap-16">
            <!-- Left Side: Fun Teacher Private -->
            <div class="md:w-1/2 text-center md:text-left">
                <h2
                    class="text-3xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500">
                    Pengajar Di TLC Program
                    <br> dari <span class="font-bold">Perguruan Tinggi terbaik</span>
                </h2>
                <p class="text-gray-600 mt-4 max-w-3xl text-lg">
                    Pengajar telah lulus seleksi akademik dan berpengalaman, berasal dari berbagai lulusan Universitas
                    terbaik di Indonesia maupun di Luar Negeri seperti:
                </p>
                <!-- School Logos Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-8 mt-10">
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-red-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/airlangga.jpg" alt="Universitas Airlangga" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-indigo-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ui.jpg" alt="Universitas Indonesia" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                </div>
            </div>

            <!-- Right Side: Universities -->
            <div class="md:w-1/2 text-center md:text-left">
                <!-- University Logos Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8">
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-red-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/airlangga.jpg" alt="Universitas Airlangga" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-indigo-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ui.jpg" alt="Universitas Indonesia" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-pink-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ugm.jpg" alt="UGM" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-indigo-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ui.jpg" alt="Universitas Indonesia" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-indigo-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ui.jpg" alt="Universitas Indonesia" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-indigo-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ui.jpg" alt="Universitas Indonesia" class="h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transform transition-transform duration-300 hover:scale-110 active:scale-90 hover:bg-indigo-100 p-4 rounded-lg shadow-lg hover:shadow-2xl">
                        <img src="images/ui.jpg" alt="Universitas Indonesia" class="h-20">
                    </div>
                </div>
                <h2
                    class="text-3xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-blue-500 mt-10">
                    Sekolah dari Siswa
                    <br> Terdaftar di <span class="text-purple-500">Teaching & Learning Certification</span>
                </h2>
                <p class="text-gray-600 mt-4 text-lg">
                    Ayo Segera Daftarkan Diri Anda di Teaching & Learning Certification:
                </p>
            </div>
        </div>
    </section>
    {{-- End Universities --}}

    {{-- Vidio Keseruan TLC --}}
    <section class="w-full px-5 sm:px-6 md:px-8 py-20 md:py-24 relative overflow-hidden bg-white">
        <div class="max-w-5xl mx-auto text-center relative z-10 mb-12 md:mb-16">
            <h2 class="text-4xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                Tonton Keseruan di <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">TLC
                    Program</span>
            </h2>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto font-medium">
                Saksikan pengalaman luar biasa dan momen tak terlupakan!
            </p>
        </div>

        <div class="relative group">
            <div id="testimonialContainer"
                class="testimonial-container flex gap-10 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-10 px-8 no-scrollbar touch-auto items-center">
                <!-- Video Cards -->
                <div
                    class="testimonial-card flex-shrink-0 w-[550px] h-[450px] snap-center transform transition-transform hover:scale-105 hover:shadow-2xl hover:ring-4 hover:ring-purple-400 hover:ring-opacity-50 rounded-3xl overflow-hidden shadow-xl">
                    <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/Jn7vuXLozJI"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                    class="testimonial-card flex-shrink-0 w-[550px] h-[450px] snap-center transform transition-transform hover:scale-105 hover:shadow-2xl hover:ring-4 hover:ring-purple-400 hover:ring-opacity-50 rounded-3xl overflow-hidden shadow-xl">
                    <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/Jn7vuXLozJI"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <div
                    class="testimonial-card flex-shrink-0 w-[550px] h-[450px] snap-center transform transition-transform hover:scale-105 hover:shadow-2xl hover:ring-4 hover:ring-purple-400 hover:ring-opacity-50 rounded-3xl overflow-hidden shadow-xl">
                    <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/Jn7vuXLozJI"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="hidden md:flex absolute top-1/2 transform -translate-y-1/2 w-full px-2">
                <button id="prevBtn"
                    class="bg-white/70 hover:bg-white/90 rounded-full p-6 shadow-lg absolute left-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-800" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextBtn"
                    class="bg-white/70 hover:bg-white/90 rounded-full p-6 shadow-lg absolute right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-800" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const container = document.getElementById("testimonialContainer");
                const prevBtn = document.getElementById("prevBtn");
                const nextBtn = document.getElementById("nextBtn");
                let autoScroll;

                function startAutoScroll() {
                    autoScroll = setInterval(() => {
                        container.scrollBy({
                            left: 560,
                            behavior: "smooth"
                        });
                        if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
                            container.scrollTo({
                                left: 0,
                                behavior: "smooth"
                            });
                        }
                    }, 3000);
                }

                function stopAutoScroll() {
                    clearInterval(autoScroll);
                }

                nextBtn.addEventListener("click", function() {
                    stopAutoScroll();
                    container.scrollBy({
                        left: 560,
                        behavior: "smooth"
                    });
                    startAutoScroll();
                });

                prevBtn.addEventListener("click", function() {
                    stopAutoScroll();
                    container.scrollBy({
                        left: -560,
                        behavior: "smooth"
                    });
                    startAutoScroll();
                });

                container.addEventListener("mouseenter", stopAutoScroll);
                container.addEventListener("mouseleave", startAutoScroll);

                startAutoScroll();
            });
        </script>
    </section>
    {{-- End Video --}}

    {{-- Informasi --}}
    <section class="max-w-6xl mx-auto p-6">
        <!-- Title -->
        <div class="flex items-center space-x-4 mb-6">
            <h2 class="text-white bg-black px-4 py-2 text-sm font-bold tracking-widest">PUSAT INFORMASI</h2>
            <div class="flex-grow border-t border-black"></div>
        </div>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card -->
            <div
                class="relative group overflow-hidden rounded-xl shadow-lg cursor-pointer transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="images/levela.png" alt="Level A"
                    class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-opacity-60 flex flex-col justify-end p-4 transition-all duration-500 group-hover:bg-opacity-75">
                    <h3
                        class="text-white text-2xl font-bold mb-2 leading-tight translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Sertifikasi Level A</h3>
                    <p
                        class="text-white text-sm mb-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">
                        Informasi Sertifikasi Dasar Pengajaran Efektif</p>
                    <button
                        class="bg-white text-black px-6 py-2 text-sm rounded translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">Baca
                        selengkapnya</button>
                </div>
            </div>

            <!-- Card -->
            <div
                class="relative group overflow-hidden rounded-xl shadow-lg cursor-pointer transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="images/levelb.png" alt="Level B"
                    class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-opacity-60 flex flex-col justify-end p-4 transition-all duration-500 group-hover:bg-opacity-75">
                    <h3
                        class="text-white text-2xl font-bold mb-2 leading-tight translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Sertifikasi Level B</h3>
                    <p
                        class="text-white text-sm mb-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">
                        Informasi Sertifikasi Strategi Pembelajaran Lanjut</p>
                    <button
                        class="bg-white text-black px-6 py-2 text-sm rounded translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">Baca
                        selengkapnya</button>
                </div>
            </div>

            <!-- Card -->
            <div
                class="relative group overflow-hidden rounded-xl shadow-lg cursor-pointer transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="images/levelc.png" alt="Level C"
                    class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-opacity-60 flex flex-col justify-end p-4 transition-all duration-500 group-hover:bg-opacity-75">
                    <h3
                        class="text-white text-2xl font-bold mb-2 leading-tight translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Sertifikasi Level C</h3>
                    <p
                        class="text-white text-sm mb-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">
                        Informasi Sertifikasi Mastery Pengajaran Kreatif</p>
                    <button
                        class="bg-white text-black px-6 py-2 text-sm rounded translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">Baca
                        selengkapnya</button>
                </div>
            </div>
        </div>
    </section>
    {{-- End Informasi --}}

    <!-- Sponsor Section -->
    <section class="w-full px-5 py-16 bg-white text-gray-900 shadow-lg">
        <h2 class="text-2xl font-bold text-black text-center">Didukung Oleh</h2>
        <div class="w-16 h-1 bg-[#E76F51] mx-auto mt-2 mb-8"></div>

        <!-- Swiper Container -->
        <div class="swiper mySwiper max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex items-center justify-center">
                    <img src="images/guru.png" alt="Sponsor 1" class="w-96 h-96 object-contain">
                </div>
                <div class="swiper-slide flex items-center justify-center">
                    <img src="images/guru.png" alt="Sponsor 2" class="w-96 h-96 object-contain">
                </div>
                <div class="swiper-slide flex items-center justify-center">
                    <img src="images/guru.png" alt="Sponsor 3" class="w-96 h-96 object-contain">
                </div>
                <div class="swiper-slide flex items-center justify-center">
                    <img src="images/guru.png" alt="Sponsor 4" class="w-96 h-96 object-contain">
                </div>
                <div class="swiper-slide flex items-center justify-center">
                    <img src="images/guru.png" alt="Sponsor 5" class="w-96 h-96 object-contain">
                </div>
                <div class="swiper-slide flex items-center justify-center">
                    <img src="images/guru.png" alt="Sponsor 6" class="w-96 h-96 object-contain">
                </div>
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Swiper Navigation Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

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
    <footer class="bg-[#0D3B66] text-white py-10">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- TLC Program -->
            <div>
                <h2 class="text-lg font-semibold">TLC Program</h2>
                <p class="text-sm mt-2">
                    Program sertifikasi untuk memberdayakan pendidik dengan pengetahuan dan keterampilan mengajar yang
                    efektif.
                </p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="hover:text-gray-300"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-gray-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-gray-300"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Tautan Cepat -->
            <div>
                <h2 class="text-lg font-semibold">Tautan Cepat</h2>
                <ul class="mt-2 space-y-2 text-sm">
                    <li><a href="#" class="hover:text-gray-300">Tentang TLC</a></li>
                    <li><a href="#" class="hover:text-gray-300">Manfaat</a></li>
                    <li><a href="#" class="hover:text-gray-300">Kurikulum</a></li>
                    <li><a href="#" class="hover:text-gray-300">Paket Harga</a></li>
                    <li><a href="#" class="hover:text-gray-300">Pendaftaran</a></li>
                    <li><a href="#" class="hover:text-gray-300">Galeri</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h2 class="text-lg font-semibold">Kontak</h2>
                <ul class="mt-2 space-y-2 text-sm">
                    <li><i class="fas fa-map-marker-alt text-yellow-400"></i> Jl. Pendidikan No. 123, Jakarta Pusat,
                        Indonesia</li>
                    <li><i class="fas fa-phone-alt text-yellow-400"></i> +62 21 1234 5678</li>
                    <li><i class="fas fa-envelope text-yellow-400"></i> info@tlcprogram.id</li>
                </ul>
            </div>


        </div>

        <hr class="border-gray-500 my-6">

        <div class="text-center text-sm">
            © 2025 Teaching and Learning Certification Program. All rights reserved.
        </div>

        <!-- FontAwesome for Icons -->
        <script src="https://kit.fontawesome.com/yourkitcode.js" crossorigin="anonymous"></script>
    </footer>
    {{-- end footer --}}

</body>

<script>
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
    document.addEventListener("DOMContentLoaded", function() {
        const navLinks = document.querySelectorAll("#navbar-sticky a");

        navLinks.forEach(link => {
            link.addEventListener("click", function() {
                navLinks.forEach(navLink => navLink.classList.remove("text-blue-700",
                    "dark:text-blue-500", "font-bold")); // Hapus kelas dari semua tautan
                this.classList.add("text-blue-700", "dark:text-blue-500",
                    "font-bold"); // Tambahkan kelas ke tautan yang diklik
            });
        });
    });
    // Autoslide logic
    const carouselContent = document.getElementById('carousel-content');
    const items = carouselContent.children;
    let index = 0;

    setInterval(() => {
        index = (index + 1) % items.length;
        carouselContent.style.transform = `translateX(-${index * 100}%)`;
    }, 5000); // Change slide every 5 seconds


    // ScrollReveal().reveal('.view');
    ScrollReveal().reveal('.view', {
        origin: 'right',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
    ScrollReveal().reveal('.view2', {
        origin: 'left',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
    ScrollReveal().reveal('.view3', {
        origin: 'right',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
    ScrollReveal().reveal('.view4', {
        origin: 'left',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
    ScrollReveal().reveal('.view5', {
        origin: 'right',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
    ScrollReveal().reveal('.view6', {
        origin: 'left',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
    ScrollReveal().reveal('.view7', {
        origin: 'right',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
    ScrollReveal().reveal('.view8', {
        origin: 'left',
        distance: '50px',
        duration: 800,
        delay: 200,
        easing: 'ease-in-out',
        reset: true
    });
</script>

</html>
