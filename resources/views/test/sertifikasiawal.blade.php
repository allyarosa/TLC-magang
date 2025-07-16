<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
    <main id="home" class="w-full px-5 py-16 bg-white text-white shadow-lg transition-all duration-500">
        <div class="container mx-auto max-w-7xl">
            <div class="grid grid-cols-12 items-center gap-6">
                <div class="col-span-12 lg:col-span-7 p-5">
                    <h1 class="text-5xl font-extrabold leading-snug text-[#00C6A9]">
                        We Learn it, <br> <span class="text-[#FFD700]">Cara Pendaftaraan</span>
                    </h1>
                    <p class="text-lg mt-4 text-gray-900">
                        Teaching & Learning Certification siap bantu taklukkan semua ujian dan nemenin perjuanganmu menuju impian!
                    </p>
                    <div class="flex my-6">
                        <a href="#" class="bg-[#FF6600] text-white px-6 py-3 rounded-xl shadow-md text-lg font-semibold hover:bg-[#E65C00] transition-transform duration-300 hover:scale-110 active:scale-95">
                            Lihat Fasilitas TLC Program
                        </a>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-5 relative rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition-transform duration-500">
                    <iframe class="w-full h-[350px] rounded-xl" src="https://www.youtube.com/embed/Jn7vuXLozJI?autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe>
                    <div class="absolute top-3 right-3 bg-white text-[#00C6A9] font-bold px-4 py-2 rounded-full shadow-lg">Sound ON!</div>
                    <div class="absolute bottom-3 right-3 bg-white text-[#00C6A9] font-bold px-4 py-2 rounded-full shadow-lg">TLC Program</div>
                </div>
            </div>
        </div>
    </main>
    {{-- End Tampilan Home --}}

    {{-- Diskon --}}
    <section class="bg-white py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-12 animate__animated animate__fadeInDown">
                Promo Spesial TLC khusus untukmu!
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Promo Card 1: 1 Tahun + Gratis Semester Genap -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-blue-400 rounded-3xl opacity-40 group-hover:opacity-60 transition duration-300 blur-xl"></div>
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border border-gray-100 transform transition duration-300 hover:-translate-y-4 hover:shadow-3xl">
                        <div class="absolute top-0 right-0 bg-blue-600 text-white px-4 py-2 rounded-bl-2xl text-sm font-semibold">
                            Diskon 48%
                        </div>
                        <div class="p-6 text-center">
                            <img src="images/dis1.png" alt="Paket 1 Tahun" class="mx-auto mb-6 rounded-xl shadow-lg w-full h-48 object-cover">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-blue-600 mb-4 group-hover:text-blue-700 transition">
                                    Paket 1 Tahun + GRATIS Semester Genap
                                </h3>
                                <p class="text-gray-600 text-base">
                                    Diskon Lunas 48% (setara dengan potongan mulai dari Rp 3.900.000)
                                </p>
                            </div>
                            <button class="bg-blue-500 text-white px-8 py-3 rounded-full text-lg font-bold 
                                transform transition duration-300 hover:scale-105 hover:bg-blue-600 
                                active:scale-95 shadow-xl hover:shadow-2xl">
                                Klaim Diskon
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Promo Card 2: Kupon Potongan untuk Siswa Berprestasi -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-green-400 rounded-3xl opacity-40 group-hover:opacity-60 transition duration-300 blur-xl"></div>
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border border-gray-100 transform transition duration-300 hover:-translate-y-4 hover:shadow-3xl">
                        <div class="absolute top-0 right-0 bg-green-600 text-white px-4 py-2 rounded-bl-2xl text-sm font-semibold">
                            Kupon
                        </div>
                        <div class="p-6 text-center">
                            <img src="images/dis2.png" alt="Siswa Berprestasi" class="mx-auto mb-6 rounded-xl shadow-lg w-full h-48 object-cover">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-green-600 mb-4 group-hover:text-green-700 transition">
                                    Diskon untuk Siswa Berprestasi!
                                </h3>
                                <p class="text-gray-600 text-base">
                                    Kupon Potongan Tambahan hingga Rp 750.000 dengan syarat dan ketentuan berlaku
                                </p>
                            </div>
                            <button class="bg-green-500 text-white px-8 py-3 rounded-full text-lg font-bold 
                                transform transition duration-300 hover:scale-105 hover:bg-green-600 
                                active:scale-95 shadow-xl hover:shadow-2xl">
                                Klaim Diskon
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Promo Card 3: Diskon Anak Guru -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-indigo-400 rounded-3xl opacity-40 group-hover:opacity-60 transition duration-300 blur-xl"></div>
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border border-gray-100 transform transition duration-300 hover:-translate-y-4 hover:shadow-3xl">
                        <div class="absolute top-0 right-0 bg-indigo-600 text-white px-4 py-2 rounded-bl-2xl text-sm font-semibold">
                            Diskon 20%
                        </div>
                        <div class="p-6 text-center">
                            <img src="images/dis3.png" alt="Diskon Anak Guru" class="mx-auto mb-6 rounded-xl shadow-lg w-full h-48 object-cover">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-indigo-600 mb-4 hover:text-indigo-700 transition">
                                    Diskon Anak Guru
                                </h3>
                                <p class="text-gray-600 text-base">
                                    Kupon Potongan Tambahan hingga 25% dengan syarat dan ketentuan berlaku
                                </p>
                            </div>
                            <button class="bg-indigo-500 text-white px-8 py-3 rounded-full text-lg font-bold 
                                transform transition duration-300 hover:scale-105 hover:bg-indigo-600 
                                active:scale-95 shadow-xl hover:shadow-2xl">
                                Klaim Diskon
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Diskon --}}

    {{-- Paket Tutorial --}}
    <section class="w-full py-16 px-4 bg-gradient-to-br from-teal-50 to-blue-50">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-teal-100 transform transition-all hover:scale-[1.01] hover:shadow-3xl">
                <div class="relative">
                    <!-- Animated Gradient Header -->
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-blue-500 opacity-10 animate-pulse"></div>
                    
                    <h1 class="relative text-4xl font-extrabold text-center py-8 mb-8 text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-blue-600 tracking-tight">
                        Langkah Mudah Daftar di TLC Program
                    </h1>
                </div>
    
                <!-- Content Container with Interactive Elements -->
                <div class="flex items-center px-12 pb-12 space-x-8">
                    <!-- Left Image with Hover Effect -->
                    <div class="w-1/2 transform transition-all duration-500 hover:scale-105 hover:rotate-1 hover:shadow-2xl">
                        <div class="relative">
                            <div class="absolute -inset-2 bg-gradient-to-r from-teal-400 to-blue-500 rounded-3xl blur-lg opacity-50 group-hover:opacity-75 transition duration-500"></div>
                            <img 
                                src="images/guru.png" 
                                alt="Student learning" 
                                class="relative rounded-3xl shadow-2xl transform transition-all group-hover:scale-105"
                            />
                        </div>
                    </div>
    
                    <!-- Right Steps with Animated Interactions -->
                    <div class="w-1/2 space-y-6">
                        <!-- Step Template with Hover and Interaction Effects -->
                        <div class="group">
                            <div class="flex items-center space-x-6 p-4 bg-white rounded-2xl shadow-md transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-r hover:from-teal-50 hover:to-blue-50">
                                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center transform transition-all group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-8 h-8 text-teal-600 group-hover:text-teal-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-teal-700 transition">
                                        Pilih paket program
                                    </h3>
                                    <p class="text-gray-600 group-hover:text-gray-800 transition">
                                        Lakukan pembayaran untuk paket yang kamu pilih
                                    </p>
                                </div>
                            </div>
                        </div>
    
                        <!-- Repeat similar structure for other steps with variations -->
                        <div class="group">
                            <div class="flex items-center space-x-6 p-4 bg-white rounded-2xl shadow-md transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center transform transition-all group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-8 h-8 text-blue-600 group-hover:text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-blue-700 transition">
                                        Pesan sesi paket
                                    </h3>
                                    <p class="text-gray-600 group-hover:text-gray-800 transition">
                                        Bebas pilih pengajar dan waktu sesi
                                    </p>
                                </div>
                            </div>
                        </div>
    
                        <!-- More steps with similar interactive design -->
                        <div class="group">
                            <div class="flex items-center space-x-6 p-4 bg-white rounded-2xl shadow-md transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50">
                                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center transform transition-all group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-8 h-8 text-purple-600 group-hover:text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-purple-700 transition">
                                        Konfirmasi Paket
                                    </h3>
                                    <p class="text-gray-600 group-hover:text-gray-800 transition">
                                        Konfirmasi via email dalam 2×24 jam
                                    </p>
                                </div>
                            </div>
                        </div>
    
                        <!-- Call to Action Button with Pulsing Effect -->
                        <button class="w-full bg-gradient-to-r from-orange-500 to-pink-500 text-white py-4 rounded-full font-bold 
                            transform transition-all duration-300 
                            hover:scale-105 hover:shadow-2xl 
                            active:scale-95
                            animate-pulse-slow
                            focus:outline-none focus:ring-4 focus:ring-orange-300">
                            Cari Sesi Paket Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Custom Styles for Additional Animations -->
        <style>
            @keyframes pulse-slow {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.05); }
            }
            .animate-pulse-slow {
                animation: pulse-slow 3s infinite;
            }
        </style>
    </section>
    {{-- Paket Tutorial --}}

    {{-- Paket A,B,C --}}
    <section class="relative bg-gradient-to-br from-purple-50 to-blue-100 min-h-screen flex items-center py-16 overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-purple-300 rounded-full opacity-20 blur-3xl animate-blob"></div>
        <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-blue-300 rounded-full opacity-20 blur-3xl animate-blob animation-delay-4000"></div>
    
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 mb-4 transform transition duration-300 hover:scale-105">
                    Certification Packages
                </h1>
                <p class="text-2xl text-gray-600 max-w-2xl mx-auto opacity-80 hover:opacity-100 transition">
                    Unlock your teaching potential with our expertly crafted certification paths
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Package A -->
                <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-8 transform transition duration-500 hover:scale-105 hover:rotate-3 hover:shadow-purple-500/50 group">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-blue-500 rounded-t-3xl transition-all duration-500 group-hover:h-full opacity-0 group-hover:opacity-100 z-0"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-3xl font-bold text-purple-600 transition transform group-hover:translate-x-2">Package A</h2>
                            <span class="bg-purple-100 text-purple-600 px-4 py-2 rounded-full text-sm font-semibold">Basic</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6 opacity-80 group-hover:opacity-100 transition">
                            Teaching Knowledge Certification
                        </h3>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-purple-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Foundations of Modern Teaching</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-purple-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Student Engagement Strategies</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-purple-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Assessment Techniques</span>
                            </div>
                        </div>
                        <button class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white py-4 rounded-xl 
                            hover:from-purple-700 hover:to-blue-700 
                            transform transition duration-300 
                            hover:scale-105 
                            hover:shadow-xl 
                            hover:shadow-purple-500/50 
                            active:scale-95 
                            group-hover:bg-opacity-90">
                            Select Package
                        </button>
                    </div>
                </div>
    
                <!-- Package B -->
                <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-8 transform transition duration-500 hover:scale-105 hover:-rotate-3 hover:shadow-blue-500/50 group">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-green-500 rounded-t-3xl transition-all duration-500 group-hover:h-full opacity-0 group-hover:opacity-100 z-0"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-3xl font-bold text-blue-600 transition transform group-hover:translate-x-2">Package B</h2>
                            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold">Intermediate</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6 opacity-80 group-hover:opacity-100 transition">
                            Teaching Activation Certification
                        </h3>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-blue-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Advanced Pedagogical Approaches</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-blue-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Technology Integration</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-blue-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Inclusive Classroom Practices</span>
                            </div>
                        </div>
                        <button class="w-full bg-gradient-to-r from-blue-600 to-green-500 text-white py-4 rounded-xl 
                            hover:from-blue-700 hover:to-green-600 
                            transform transition duration-300 
                            hover:scale-105 
                            hover:shadow-xl 
                            hover:shadow-blue-500/50 
                            active:scale-95 
                            group-hover:bg-opacity-90">
                            Select Package
                        </button>
                    </div>
                </div>
    
                <!-- Package C -->
                <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-8 transform transition duration-500 hover:scale-105 hover:rotate-3 hover:shadow-pink-500/50 group">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pink-500 to-red-500 rounded-t-3xl transition-all duration-500 group-hover:h-full opacity-0 group-hover:opacity-100 z-0"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-3xl font-bold text-pink-600 transition transform group-hover:translate-x-2">Package C</h2>
                            <span class="bg-pink-100 text-pink-600 px-4 py-2 rounded-full text-sm font-semibold">Advanced</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6 opacity-80 group-hover:opacity-100 transition">
                            Teaching Mastery Certification
                        </h3>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-pink-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Educational Leadership</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-pink-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Research-Based Teaching</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-6 h-6 text-pink-500 mr-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-lg">Curriculum Development</span>
                            </div>
                        </div>
                        <button class="w-full bg-gradient-to-r from-pink-600 to-red-500 text-white py-4 rounded-xl 
                            hover:from-pink-700 hover:to-red-600 
                            transform transition duration-300 
                            hover:scale-105 
                            hover:shadow-xl 
                            hover:shadow-pink-500/50 
                            active:scale-95 
                            group-hover:bg-opacity-90">
                            Select Package
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
        <style>
            @keyframes blob {
                0% { transform: scale(1) translate(0, 0); }
                33% { transform: scale(1.1) translate(-10px, 20px); }
                66% { transform: scale(0.9) translate(10px, -20px); }
                100% { transform: scale(1) translate(0, 0); }
            }
            .animate-blob {
                animation: blob 10s infinite;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </section>
    {{-- End Paket A,B,C --}}

    {{-- pilih --}}
    <section class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold">Sertifikasi</h2>
        <p class="text-gray-600">Upgrade terus ilmu dan pengalaman terbaru kamu di bidang teknologi</p>
        
        <!-- Filter Buttons -->
        <div class="flex space-x-4 mt-4">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Semua</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg">Terbuka</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg">Terkunci</button>
        </div>
        
        <!-- Certification List -->
        <div class="mt-6 space-y-6">
            <!-- Certification Item -->
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden border">
                <img src="images/levela.png" alt="Level A" class="w-40 h-40 object-cover">
                <div class="p-4 flex flex-col justify-between">
                    <h3 class="text-lg font-bold">Sertifikasi TLC Level A: Dasar Pengajaran Efektif</h3>
                    <p class="text-gray-600 text-sm">Ini akan diisi untuk penjelasan tentang level, dan test yang akan di jalani</p>
                    <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Selengkapnya →</button>
                </div>
            </div>
            
            <!-- Certification Item -->
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden border">
                <img src="images/levelb.png" alt="Level B" class="w-40 h-40 object-cover">
                <div class="p-4 flex flex-col justify-between">
                    <h3 class="text-lg font-bold">Sertifikasi TLC Level B: Strategi Pembelajaran Lanjut</h3>
                    <p class="text-gray-600 text-sm">Ini akan diisi untuk penjelasan tentang level, dan test yang akan di jalani</p>
                    <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Selengkapnya →</button>
                </div>
            </div>
            
            <!-- Certification Item -->
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden border">
                <img src="images/levelc.png" alt="Level C" class="w-40 h-40 object-cover">
                <div class="p-4 flex flex-col justify-between">
                    <h3 class="text-lg font-bold">Sertifikasi TLC Level C: Mastery dalam Pengajaran Kreatif</h3>
                    <p class="text-gray-600 text-sm">Ini akan diisi untuk penjelasan tentang level, dan test yang akan di jalani</p>
                    <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Selengkapnya →</button>
                </div>
            </div>
        </div>
    </section>
    {{-- end pilih --}}
    

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