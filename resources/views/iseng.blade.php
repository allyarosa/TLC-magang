<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLC Program Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>

    {{-- Navbar --}}
    <header class="mb-20">
        <nav class="fixed w-full z-20 top-0 start-0 bg-white shadow-lg border-b border-gray-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 px-6">

                <!-- Brand Section -->
                <div class="flex items-center space-x-4">
                    <img src="images/logo.svg" class="h-10 w-10 md:h-14 md:w-14" alt="TLC Logo">
                    <div>
                        <h1 class="text-lg md:text-2xl font-bold text-gray-800 tracking-wide capitalize">TLC Program
                        </h1>
                        <p class="text-xs md:text-sm text-gray-500 font-medium capitalize">
                            Teaching & Learning Certification
                        </p>
                    </div>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="lg:hidden">
                    <button id="mobile-menu-toggle" class="text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Menu -->
                <div id="mobile-menu"
                    class="hidden lg:flex fixed lg:static inset-x-0 top-16 lg:top-0 bg-white lg:bg-transparent pb-4 lg:pb-0 border-b lg:border-0">
                    <div
                        class="container mx-auto px-4 lg:px-0 flex flex-col lg:flex-row items-center space-y-4 lg:space-y-0 lg:space-x-6">
                        <a href="#dashboard"
                            class="text-gray-800 font-semibold hover:text-blue-600 transition transform hover:scale-105 capitalize">Dashboard</a>
                        <a href="#sertifikasi"
                            class="text-gray-800 font-semibold hover:text-blue-600 transition transform hover:scale-105 capitalize">Sertifikasi</a>
                        <a href="#transaksi"
                            class="text-gray-800 font-semibold hover:text-blue-600 transition transform hover:scale-105 capitalize">Transaksi</a>
                    </div>
                </div>

                <!-- User Interaction -->
                <div class="hidden lg:flex items-center space-x-4">

                    <!-- Search -->
                    <div class="relative">
                        <input type="text" placeholder="Cari Data"
                            class="pl-8 pr-2 py-2 w-40 rounded-full bg-gray-100 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
                        <svg class="absolute left-2 top-3 h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 12.65z"></path>
                        </svg>
                    </div>

                    <!-- Notification -->
                    <div class="relative">
                        <svg class="h-7 w-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.149.757-.405 1.035L4 17h5m6 0a3 3 0 11-6 0">
                            </path>
                        </svg>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">3</span>
                    </div>

                    <!-- Profile -->
                    <div class="relative">
                        <button id="profile-button" class="flex items-center space-x-2">
                            <img src="images/aliando.jpg"
                                class="h-10 w-10 rounded-full object-cover border-2 border-gray-300 shadow-md"
                                alt="Profile">
                            <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown -->
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
                                    <span class="text-gray-700">Lihat Profil</span>
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

{{-- Masuk Sertifikasi --}}

    {{-- Banner --}}
    <section class="relative max-w-7xl mx-auto px-4 py-8">
        <!-- Left navigation button -->
        <button
            class="absolute left-2 md:-left-5 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Right navigation button -->
        <button
            class="absolute right-2 md:-right-5 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Banner -->
        <div class="bg-blue-900 bg-gradient-to-r from-blue-900 to-blue-800 rounded-lg overflow-hidden">
            <!-- Content -->
            <div class="flex flex-col md:flex-row items-center">
                <!-- Character illustrations -->
                <div class="w-full md:w-2/5 p-4">
                    <img src="images/karakter.jpg" alt="Kedinasan Characters" class="w-full h-auto object-cover">
                </div>

                <!-- Text content -->
                <div class="w-full md:w-3/5 p-6 text-white text-center md:text-left">
                    <h2 class="text-xl md:text-3xl font-bold mb-2">Jadi #KebanggaanKeluarga dengan</h2>
                    <h1 class="text-2xl md:text-5xl font-extrabold text-yellow-400 leading-tight mb-6 drop-shadow-md">
                        Lolos Tes Sekolah Kedinasan bersama Bimbel Kedinasan!
                    </h1>
                    <a href="#"
                        class="inline-block bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold py-3 px-6 md:px-8 rounded-full transition duration-300 transform hover:-translate-y-1">
                        Cek Program di Sini
                    </a>
                </div>
            </div>
        </div>

        <!-- Dots navigation -->
        <div class="flex justify-center mt-4 space-x-2">
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
        </div>
    </section>
    {{-- End Banner --}}

    {{-- sertifikasi  --}}
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Sertifikasi</h2>
        <p class="text-gray-500 text-sm sm:text-base mb-6">Upgrade terus ilmu dan pengalaman terbaru kamu di bidang
            teknologi.</p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap gap-3 mb-10">
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm hover:bg-blue-700 transition">Semua</button>
            <button
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl text-sm hover:bg-gray-300 transition">Terbuka</button>
            <button
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl text-sm hover:bg-gray-300 transition">Terkunci</button>
        </div>

        <!-- Certification List -->
        <div class="space-y-6 sm:space-y-8">
            <!-- Certification Item -->
            <div
                class="flex flex-col sm:flex-row bg-white rounded-2xl shadow-md overflow-hidden border transform transition hover:scale-[1.02] active:scale-95 hover:shadow-xl">
                <img src="images/levela.png" alt="Level A" class="w-full sm:w-36 h-48 sm:h-36 object-cover">
                <div class="p-4 sm:p-6 flex flex-col justify-between">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">TLC Level A: Dasar Pengajaran
                        Efektif</h3>
                    <p class="text-gray-500 text-sm mb-4">Pelajari dasar-dasar mengajar yang efektif dan bagaimana
                        menghadapi ujian sertifikasi ini.</p>
                    <button
                        class="self-start px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Selengkapnya
                        →</button>
                </div>
            </div>

            <!-- Certification Item -->
            <div
                class="flex flex-col sm:flex-row bg-white rounded-2xl shadow-md overflow-hidden border transform transition hover:scale-[1.02] active:scale-95 hover:shadow-xl">
                <img src="images/levelb.png" alt="Level B" class="w-full sm:w-36 h-48 sm:h-36 object-cover">
                <div class="p-4 sm:p-6 flex flex-col justify-between">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">TLC Level B: Strategi Pembelajaran
                        Lanjut</h3>
                    <p class="text-gray-500 text-sm mb-4">Dalami strategi lanjutan dalam mengajar dan persiapkan diri
                        menghadapi tes berikutnya.</p>
                    <button
                        class="self-start px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Selengkapnya
                        →</button>
                </div>
            </div>

            <!-- Certification Item -->
            <div
                class="flex flex-col sm:flex-row bg-white rounded-2xl shadow-md overflow-hidden border transform transition hover:scale-[1.02] active:scale-95 hover:shadow-xl">
                <img src="images/levelc.png" alt="Level C" class="w-full sm:w-36 h-48 sm:h-36 object-cover">
                <div class="p-4 sm:p-6 flex flex-col justify-between">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">TLC Level C: Mastery dalam
                        Pengajaran Kreatif</h3>
                    <p class="text-gray-500 text-sm mb-4">Capai mastery dalam pengajaran kreatif dan kuasai materi
                        ujian tingkat akhir.</p>
                    <button
                        class="self-start px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Selengkapnya
                        →</button>
                </div>
            </div>
        </div>
    </section>
    {{-- End sertifikasi --}}

    {{-- Skema Pendafatraan --}}
    <section class="w-full bg-white text-gray-800 py-16 px-4 min-h-screen">
        <div class="max-w-5xl mx-auto">
            <h1
                class="text-5xl md:text-6xl font-extrabold text-center mb-20 tracking-wider text-blue-800 animate-title">
                SKEMA SERTIFIKASI
            </h1>

            <div class="relative flex flex-col items-center justify-center space-y-10 pt-10">
                <!-- Level A Section -->
                <div
                    class="level-box bg-blue-800 text-white font-bold text-2xl md:text-3xl px-8 py-2 rounded-full shadow-lg z-10 transition-all duration-300 hover:scale-110 hover:bg-blue-600 cursor-pointer">
                    LEVEL A
                </div>

                <!-- First Test -->
                <div
                    class="test-box bg-yellow-400 text-gray-800 font-bold text-2xl md:text-3xl px-10 py-3 rounded-full shadow-lg z-10 mt-16 transition-all duration-300 hover:scale-110 hover:bg-yellow-300 hover:shadow-xl cursor-pointer">
                    TES KOMPETENSI
                </div>

                <!-- Results for Level A -->
                <div class="absolute top-[12%] right-[60%] md:right-[65%] lg:right-[70%] text-right">
                    <p
                        class="text-xl md:text-2xl font-bold text-red-600 result-item hover:scale-110 transition-all duration-300 cursor-pointer">
                        Tidak Lulus</p>
                </div>

                <div class="absolute top-[12%] left-[60%] md:left-[65%] lg:left-[70%] text-left">
                    <p
                        class="text-xl md:text-2xl font-bold text-green-600 result-item hover:scale-110 transition-all duration-300 cursor-pointer">
                        Lulus</p>
                    <div class="mt-1">
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Teaching</p>
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Knowledge</p>
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Certification</p>
                    </div>
                </div>

                <!-- Custom Arrows -->
                <div class="relative w-full h-16 -mt-6">
                    <!-- Right Arrow (To Level A) -->
                    <div class="curved-arrow-left animate-pulse" style="top: -160px; left: 45%;"></div>

                    <!-- Left Arrow (From Level A) -->
                    <div class="curved-arrow-right animate-pulse" style="top: -160px; right: 45%;"></div>

                    <!-- Down Arrow (From Test to Level B) -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 animate-bounce"
                        style="top: 50%;">
                        <svg width="50" height="80" viewBox="0 0 50 80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 0 L25 60 M5 40 L25 60 L45 40" stroke="#1a4971" stroke-width="8"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>

                <!-- Level B Section -->
                <div
                    class="level-box bg-blue-800 text-white font-bold text-2xl md:text-3xl px-8 py-2 rounded-full shadow-lg z-10 transition-all duration-300 hover:scale-110 hover:bg-blue-600 cursor-pointer">
                    LEVEL B
                </div>

                <!-- Second Test -->
                <div
                    class="test-box bg-yellow-400 text-gray-800 font-bold text-2xl md:text-3xl px-10 py-3 rounded-full shadow-lg z-10 mt-16 transition-all duration-300 hover:scale-110 hover:bg-yellow-300 hover:shadow-xl cursor-pointer">
                    TES KOMPETENSI
                </div>

                <!-- Results for Level B -->
                <div class="absolute top-[48%] right-[60%] md:right-[65%] lg:right-[70%] text-right">
                    <p
                        class="text-xl md:text-2xl font-bold text-red-600 result-item hover:scale-110 transition-all duration-300 cursor-pointer">
                        Tidak Lulus</p>
                </div>

                <div class="absolute top-[48%] left-[60%] md:left-[65%] lg:left-[70%] text-left">
                    <p
                        class="text-xl md:text-2xl font-bold text-green-600 result-item hover:scale-110 transition-all duration-300 cursor-pointer">
                        Lulus</p>
                    <div class="mt-1">
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Teaching</p>
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Activation</p>
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Certification</p>
                    </div>
                </div>

                <!-- Custom Arrows -->
                <div class="relative w-full h-16 -mt-6">
                    <!-- Right Arrow (To Level B) -->
                    <div class="curved-arrow-left animate-pulse" style="top: -160px; left: 45%;"></div>

                    <!-- Left Arrow (From Level B) -->
                    <div class="curved-arrow-right animate-pulse" style="top: -160px; right: 45%;"></div>

                    <!-- Down Arrow (From Test to Level C) -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 animate-bounce"
                        style="top: 50%;">
                        <svg width="50" height="80" viewBox="0 0 50 80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 0 L25 60 M5 40 L25 60 L45 40" stroke="#1a4971" stroke-width="8"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>

                <!-- Level C Section -->
                <div
                    class="level-box bg-blue-800 text-white font-bold text-2xl md:text-3xl px-8 py-2 rounded-full shadow-lg z-10 transition-all duration-300 hover:scale-110 hover:bg-blue-600 cursor-pointer">
                    LEVEL C
                </div>

                <!-- Third Test -->
                <div
                    class="test-box bg-yellow-400 text-gray-800 font-bold text-2xl md:text-3xl px-10 py-3 rounded-full shadow-lg z-10 mt-16 transition-all duration-300 hover:scale-110 hover:bg-yellow-300 hover:shadow-xl cursor-pointer">
                    TES KOMPETENSI
                </div>

                <!-- Results for Level C -->
                <div class="absolute top-[84%] right-[60%] md:right-[65%] lg:right-[70%] text-right">
                    <p
                        class="text-xl md:text-2xl font-bold text-red-600 result-item hover:scale-110 transition-all duration-300 cursor-pointer">
                        Tidak Lulus</p>
                </div>

                <div class="absolute top-[84%] left-[60%] md:left-[65%] lg:left-[70%] text-left">
                    <p
                        class="text-xl md:text-2xl font-bold text-green-600 result-item hover:scale-110 transition-all duration-300 cursor-pointer">
                        Lulus</p>
                    <div class="mt-1">
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Mastery</p>
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Activation</p>
                        <p
                            class="text-lg md:text-xl font-semibold leading-tight text-gray-800 cert-item hover:text-blue-600 transition-all duration-300 cursor-pointer">
                            Certification</p>
                    </div>
                </div>

                <!-- Custom Arrows -->
                <div class="relative w-full h-16 -mt-6">
                    <!-- Right Arrow (To Level C) -->
                    <div class="curved-arrow-left animate-pulse" style="top: -160px; left: 45%;"></div>

                    <!-- Left Arrow (From Level C) -->
                    <div class="curved-arrow-right animate-pulse" style="top: -160px; right: 45%;"></div>
                </div>
            </div>
        </div>
        <style>
            @keyframes title-animation {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }

                100% {
                    transform: scale(1);
                }
            }

            .animate-title {
                animation: title-animation 3s infinite;
            }

            .animate-pulse {
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
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

            .animate-bounce {
                animation: bounce 1.5s infinite;
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(-25%) translateX(-50%);
                }

                50% {
                    transform: translateY(0) translateX(-50%);
                }
            }

            .curved-arrow-right {
                position: absolute;
                width: 80px;
                height: 80px;
                border: 8px solid #1a4971;
                border-top: none;
                border-right: none;
                border-radius: 0 0 0 20px;
                transform: rotate(45deg);
                z-index: 0;
                transition: all 0.3s ease;
            }

            .curved-arrow-right:hover {
                border-color: #3182ce;
                transform: rotate(45deg) scale(1.1);
                cursor: pointer;
            }

            .curved-arrow-left {
                position: absolute;
                width: 80px;
                height: 80px;
                border: 8px solid #1a4971;
                border-top: none;
                border-left: none;
                border-radius: 0 0 20px 0;
                transform: rotate(-45deg);
                z-index: 0;
                transition: all 0.3s ease;
            }

            .curved-arrow-left:hover {
                border-color: #3182ce;
                transform: rotate(-45deg) scale(1.1);
                cursor: pointer;
            }

            .level-box:hover {
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }

            .test-box:hover {
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }

            .result-item:hover {
                text-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            .cert-item {
                position: relative;
                display: inline-block;
            }

            .cert-item:hover {
                transform: translateX(5px);
            }

            .cert-item:before {
                content: "";
                position: absolute;
                width: 0;
                height: 2px;
                bottom: 0;
                left: 0;
                background-color: #3182ce;
                visibility: hidden;
                transition: all 0.3s ease-in-out;
            }

            .cert-item:hover:before {
                visibility: visible;
                width: 100%;
            }

            /* Touch animations for mobile */
            @media (hover: none) {

                .level-box:active,
                .test-box:active {
                    transform: scale(1.1);
                    transition: transform 0.3s;
                }

                .result-item:active,
                .cert-item:active {
                    transform: scale(1.1);
                    transition: transform 0.3s;
                }
            }
        </style>

        <script>
            // Add touch animations for interactive elements
            document.addEventListener('DOMContentLoaded', function() {
                const interactiveElements = document.querySelectorAll(
                    '.level-box, .test-box, .result-item, .cert-item, .curved-arrow-left, .curved-arrow-right');

                interactiveElements.forEach(elem => {
                    elem.addEventListener('touchstart', function() {
                        this.classList.add('active');
                    });

                    elem.addEventListener('touchend', function() {
                        this.classList.remove('active');
                    });
                });
            });
        </script>
    </section>
    {{-- End Skema Pendaftraan --}}

    {{-- A --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white shadow-lg rounded-2xl border p-8 mb-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
            <h2 class="text-2xl font-bold text-gray-800">LEVEL A</h2>
            <span class="px-3 py-1 bg-purple-200 text-purple-600 text-sm rounded-lg">Dalam Progres</span>
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Nilai</button>
        </div>
        <p class="text-gray-600 text-sm mb-8 text-center sm:text-left">Daftar kategori kuis yang akan anda kerjakan.
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start space-x-3 mb-8">
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm transform transition duration-300 hover:bg-blue-700 hover:scale-105 active:scale-95">Semua</button>
            <button
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded-xl text-sm transform transition duration-300 hover:bg-gray-400 hover:scale-105 active:scale-95">Terbuka</button>
            <button
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded-xl text-sm transform transition duration-300 hover:bg-gray-400 hover:scale-105 active:scale-95">Terkunci</button>
        </div>

        <!-- Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Literasi -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/ulm.jpg" alt="Literasi" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: Literasi</h3>
                    <button
                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Mulai
                        →</button>
                </div>
            </div>

            <!-- Numerasi -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/uniska.jpg" alt="Numerasi" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: Numerasi</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>

            <!-- PCK -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/umbjm.jpg" alt="PCK" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: PCK</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>

            <!-- HOTS -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/uny.jpg" alt="HOTS" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: HOTS</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>
        </div>
    </section>
    {{-- End A --}}

    {{-- B --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white shadow-lg rounded-2xl border p-8 mb-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
            <h2 class="text-2xl font-bold text-gray-800">LEVEL B</h2>
            <span class="px-3 py-1 bg-purple-200 text-purple-600 text-sm rounded-lg">Dalam Progres</span>
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Nilai</button>
        </div>
        <p class="text-gray-600 text-sm mb-8 text-center sm:text-left">Daftar kategori kuis yang akan anda kerjakan.
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start space-x-3 mb-8">
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm transform transition duration-300 hover:bg-blue-700 hover:scale-105 active:scale-95">Semua</button>
            <button
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded-xl text-sm transform transition duration-300 hover:bg-gray-400 hover:scale-105 active:scale-95">Terbuka</button>
            <button
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded-xl text-sm transform transition duration-300 hover:bg-gray-400 hover:scale-105 active:scale-95">Terkunci</button>
        </div>

        <!-- Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Literasi -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/ui.jpg" alt="Literasi" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: Literasi</h3>
                    <button
                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Mulai
                        →</button>
                </div>
            </div>

            <!-- Numerasi -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/ugm.jpg" alt="Numerasi" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: Numerasi</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>

            <!-- PCK -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/uin.jpg" alt="PCK" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: PCK</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>

            <!-- HOTS -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/poliban.jpg" alt="HOTS" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: HOTS</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>
        </div>
    </section>
    {{-- End B --}}

    {{-- C --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white shadow-lg rounded-2xl border p-8 mb-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
            <h2 class="text-2xl font-bold text-gray-800">LEVEL C</h2>
            <span class="px-3 py-1 bg-purple-200 text-purple-600 text-sm rounded-lg">Dalam Progres</span>
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Nilai</button>
        </div>
        <p class="text-gray-600 text-sm mb-8 text-center sm:text-left">Daftar kategori kuis yang akan anda kerjakan.
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start space-x-3 mb-8">
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm transform transition duration-300 hover:bg-blue-700 hover:scale-105 active:scale-95">Semua</button>
            <button
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded-xl text-sm transform transition duration-300 hover:bg-gray-400 hover:scale-105 active:scale-95">Terbuka</button>
            <button
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded-xl text-sm transform transition duration-300 hover:bg-gray-400 hover:scale-105 active:scale-95">Terkunci</button>
        </div>

        <!-- Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Literasi -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/itb.jpg" alt="Literasi" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: Literasi</h3>
                    <button
                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Mulai
                        →</button>
                </div>
            </div>

            <!-- Numerasi -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/brawijaya.jpg" alt="Numerasi" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: Numerasi</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>

            <!-- PCK -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/airlangga.jpg" alt="PCK" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: PCK</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>

            <!-- HOTS -->
            <div
                class="bg-white rounded-2xl shadow-md overflow-hidden border transform transition duration-300 hover:scale-105 active:scale-95">
                <img src="images/hasnur.jpg" alt="HOTS" class="w-full h-40 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Kategori: HOTS</h3>
                    <button class="mt-4 px-4 py-2 bg-gray-400 text-gray-700 rounded-lg text-sm" disabled>Terkunci
                        🔒</button>
                </div>
            </div>
        </div>
    </section>
    {{-- End C --}}

    {{-- Versi 2 --}}

    {{-- A --}}
    <section
        class="max-w-7xl mx-auto bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden relative my-16">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        </div>
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-purple-100 rounded-full opacity-40 animate-pulse"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-blue-100 rounded-full opacity-40 animate-pulse"></div>

        <!-- Icon at the top -->
        <div class="flex justify-center -mt-12 mb-4">
            <div
                class="w-24 h-24 rounded-full bg-white shadow-xl flex items-center justify-center border-4 border-white animate__animated animate__bounceIn">
                <i class="fas fa-graduation-cap text-5xl text-indigo-600"></i>
            </div>
        </div>

        <div class="p-8 md:p-12 relative">
            <!-- Header section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-10 space-y-6 md:space-y-0">
                <div class="flex items-center space-x-4 animate__animated animate__fadeInLeft">
                    <i class="fas fa-award text-yellow-500 text-3xl"></i>
                    <h2 class="text-4xl font-bold text-gray-800 relative">
                        LEVEL A
                        <span
                            class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></span>
                    </h2>
                    <span class="px-4 py-1.5 bg-purple-100 text-purple-600 font-medium rounded-full flex items-center">
                        <span class="w-2 h-2 bg-purple-600 rounded-full mr-2 animate-pulse"></span>
                        Dalam Progres
                    </span>
                </div>

                <div class="flex items-center space-x-6 animate__animated animate__fadeInRight">
                    <div class="text-gray-500 text-sm font-medium bg-gray-50 p-3 rounded-xl shadow-sm">
                        <span class="block text-center mb-2 flex items-center justify-center">
                            <i class="fas fa-chart-line mr-2 text-indigo-500"></i>
                            Progress
                        </span>
                        <div class="progress-bar">
                            <div class="progress-value"></div>
                        </div>
                        <span class="block text-center text-xs mt-1 text-gray-400">35% Complete</span>
                    </div>
                    <button
                        class="btn-gradient px-6 py-3 text-white rounded-xl text-sm font-medium shadow-lg shadow-indigo-500/30 flex items-center space-x-2 hover:scale-105 transition-transform">
                        <span>Nilai</span>
                        <i class="fas fa-star"></i>
                    </button>
                </div>
            </div>

            <p
                class="text-gray-600 text-base mb-10 text-center md:text-left max-w-2xl animate__animated animate__fadeIn">
                <i class="fas fa-info-circle mr-2 text-indigo-500"></i>
                Daftar kategori kuis yang akan anda kerjakan. Selesaikan semua kategori untuk melanjutkan ke level
                berikutnya.
            </p>

            <!-- Filter Buttons -->
            <div
                class="flex flex-wrap justify-center md:justify-start gap-4 mb-12 animate__animated animate__fadeInUp">
                <button
                    class="btn-gradient px-6 py-3 text-white rounded-xl text-sm font-medium shadow-lg shadow-indigo-500/20 flex items-center transition-all duration-300 hover:scale-105">
                    <i class="fas fa-th-large mr-2"></i>Semua
                </button>
                <button
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl text-sm font-medium hover:bg-gray-200 transition-all duration-300 flex items-center glow-on-hover hover:scale-105">
                    <i class="fas fa-lock-open mr-2 text-green-500"></i>Terbuka
                </button>
                <button
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl text-sm font-medium hover:bg-gray-200 transition-all duration-300 flex items-center glow-on-hover hover:scale-105">
                    <i class="fas fa-lock mr-2 text-red-500"></i>Terkunci
                </button>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Literasi -->
                <div
                    class="card-hover bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 relative shine-effect animate__animated animate__fadeIn">
                    <div class="ribbon">
                        <span>Tersedia</span>
                    </div>
                    <div
                        class="absolute top-3 left-3 z-10 bg-white bg-opacity-90 px-3 py-1 rounded-full shadow-sm flex items-center space-x-1">
                        <i class="fas fa-fire text-amber-500"></i>
                        <span class="text-xs font-medium text-gray-700">Rekomendasi</span>
                    </div>
                    <div class="h-48 w-full overflow-hidden relative">
                        <img src="/api/placeholder/400/320" alt="Literasi"
                            class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <div class="text-2xl font-bold mb-1">ULM</div>
                            <div class="flex items-center text-xs">
                                <i class="fas fa-clock mr-1"></i>
                                <span>30 Menit</span>
                                <span class="mx-2">•</span>
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>25 Soal</span>
                            </div>
                        </div>
                        <div
                            class="absolute top-3 right-3 bg-green-500 rounded-full w-8 h-8 flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-book text-indigo-500 mr-2"></i>
                                Kategori: Literasi
                            </h3>
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                <i class="fas fa-bookmark text-indigo-500"></i>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm">Kembangkan kemampuan literasi anda dengan kuis ini yang telah
                            dirancang oleh para ahli.</p>
                        <div class="flex items-center space-x-2 text-xs text-gray-500">
                            <i class="fas fa-users"></i>
                            <span>1,234 peserta telah mengikuti</span>
                        </div>
                        <button
                            class="btn-gradient w-full py-3 font-medium text-white rounded-xl flex items-center justify-center space-x-2 group">
                            <span>Mulai Sekarang</span>
                            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Numerasi -->
                <div class="card-hover bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 relative shine-effect animate__animated animate__fadeIn"
                    style="animation-delay: 0.1s">
                    <div
                        class="absolute top-3 left-3 z-10 bg-white bg-opacity-90 px-3 py-1 rounded-full shadow-sm flex items-center space-x-1">
                        <i class="fas fa-lock text-red-500"></i>
                        <span class="text-xs font-medium text-gray-700">Terkunci</span>
                    </div>
                    <div class="h-48 w-full overflow-hidden relative">
                        <img src="/api/placeholder/400/320" alt="Numerasi"
                            class="w-full h-full object-cover transition-transform duration-700 filter grayscale">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <div class="text-2xl font-bold mb-1">UNISKA</div>
                            <div class="flex items-center text-xs">
                                <i class="fas fa-clock mr-1"></i>
                                <span>45 Menit</span>
                                <span class="mx-2">•</span>
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>30 Soal</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-calculator text-gray-400 mr-2"></i>
                                Kategori: Numerasi
                            </h3>
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm">Selesaikan kategori sebelumnya untuk membuka akses ke kuis
                            numerasi ini.</p>
                        <div class="flex items-center space-x-2 text-xs text-gray-500">
                            <i class="fas fa-users"></i>
                            <span>987 peserta telah mengikuti</span>
                        </div>
                        <button
                            class="w-full py-3 font-medium text-gray-500 bg-gray-200 rounded-xl flex items-center justify-center space-x-2"
                            disabled>
                            <i class="fas fa-lock mr-2"></i>
                            <span>Terkunci</span>
                        </button>
                    </div>
                </div>

                <!-- PCK -->
                <div class="card-hover bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 relative shine-effect animate__animated animate__fadeIn"
                    style="animation-delay: 0.2s">
                    <div
                        class="absolute top-3 left-3 z-10 bg-white bg-opacity-90 px-3 py-1 rounded-full shadow-sm flex items-center space-x-1">
                        <i class="fas fa-lock text-red-500"></i>
                        <span class="text-xs font-medium text-gray-700">Terkunci</span>
                    </div>
                    <div class="h-48 w-full overflow-hidden relative">
                        <img src="/api/placeholder/400/320" alt="PCK"
                            class="w-full h-full object-cover transition-transform duration-700 filter grayscale">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <div class="text-2xl font-bold mb-1">UMBJM</div>
                            <div class="flex items-center text-xs">
                                <i class="fas fa-clock mr-1"></i>
                                <span>60 Menit</span>
                                <span class="mx-2">•</span>
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>40 Soal</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-chalkboard-teacher text-gray-400 mr-2"></i>
                                Kategori: PCK
                            </h3>
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm">Selesaikan kategori sebelumnya untuk membuka akses ke kuis PCK
                            ini.</p>
                        <div class="flex items-center space-x-2 text-xs text-gray-500">
                            <i class="fas fa-users"></i>
                            <span>654 peserta telah mengikuti</span>
                        </div>
                        <button
                            class="w-full py-3 font-medium text-gray-500 bg-gray-200 rounded-xl flex items-center justify-center space-x-2"
                            disabled>
                            <i class="fas fa-lock mr-2"></i>
                            <span>Terkunci</span>
                        </button>
                    </div>
                </div>

                <!-- HOTS -->
                <div class="card-hover bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 relative shine-effect animate__animated animate__fadeIn"
                    style="animation-delay: 0.3s">
                    <div
                        class="absolute top-3 left-3 z-10 bg-white bg-opacity-90 px-3 py-1 rounded-full shadow-sm flex items-center space-x-1">
                        <i class="fas fa-lock text-red-500"></i>
                        <span class="text-xs font-medium text-gray-700">Terkunci</span>
                    </div>
                    <div class="h-48 w-full overflow-hidden relative">
                        <img src="/api/placeholder/400/320" alt="HOTS"
                            class="w-full h-full object-cover transition-transform duration-700 filter grayscale">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <div class="text-2xl font-bold mb-1">UNY</div>
                            <div class="flex items-center text-xs">
                                <i class="fas fa-clock mr-1"></i>
                                <span>75 Menit</span>
                                <span class="mx-2">•</span>
                                <i class="fas fa-question-circle mr-1"></i>
                                <span>50 Soal</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-brain text-gray-400 mr-2"></i>
                                Kategori: HOTS
                            </h3>
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm">Selesaikan kategori sebelumnya untuk membuka akses ke kuis
                            HOTS ini.</p>
                        <div class="flex items-center space-x-2 text-xs text-gray-500">
                            <i class="fas fa-users"></i>
                            <span>321 peserta telah mengikuti</span>
                        </div>
                        <button
                            class="w-full py-3 font-medium text-gray-500 bg-gray-200 rounded-xl flex items-center justify-center space-x-2"
                            disabled>
                            <i class="fas fa-lock mr-2"></i>
                            <span>Terkunci</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bottom info section -->
            <div
                class="mt-12 p-6 bg-gray-50 rounded-xl shadow-sm border border-gray-100 animate__animated animate__fadeIn">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center mb-4 md:mb-0">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-lightbulb text-indigo-500 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Tips Mengerjakan Kuis</h4>
                            <p class="text-gray-500 text-sm">Pastikan koneksi internet stabil sebelum memulai kuis</p>
                        </div>
                    </div>
                    <button
                        class="btn-gradient px-6 py-2.5 text-white rounded-xl text-sm font-medium shadow-lg shadow-indigo-500/30 flex items-center space-x-2 hover:scale-105 transition-transform">
                        <i class="fas fa-headset mr-2"></i>
                        <span>Bantuan</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Decoration at bottom -->
        <div class="w-full h-2 bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500"></div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

            body {
                font-family: 'Poppins', sans-serif;
                background: white;
            }

            .card-hover {
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .card-hover:hover {
                transform: translateY(-12px) scale(1.02);
                box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25), 0 18px 36px -18px rgba(0, 0, 0, 0.3);
            }

            .progress-bar {
                height: 6px;
                width: 100%;
                background: #e2e8f0;
                overflow: hidden;
                border-radius: 10px;
            }

            .progress-value {
                height: 100%;
                width: 35%;
                background: linear-gradient(90deg, #6366F1 0%, #A855F7 100%);
                animation: progress 1.5s ease-in-out;
                box-shadow: 0 0 10px rgba(149, 76, 233, 0.5);
            }

            @keyframes progress {
                0% {
                    width: 0;
                }

                100% {
                    width: 35%;
                }
            }

            .shine-effect {
                position: relative;
                overflow: hidden;
            }

            .shine-effect::after {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: linear-gradient(to right,
                        rgba(255, 255, 255, 0) 0%,
                        rgba(255, 255, 255, 0.3) 50%,
                        rgba(255, 255, 255, 0) 100%);
                transform: rotate(30deg);
                animation: shine 3s infinite linear;
            }

            @keyframes shine {
                0% {
                    transform: translateX(-100%) rotate(30deg);
                }

                100% {
                    transform: translateX(100%) rotate(30deg);
                }
            }

            .btn-gradient {
                background: linear-gradient(90deg, #6366F1 0%, #A855F7 100%);
                transition: all 0.3s ease;
            }

            .btn-gradient:hover {
                background: linear-gradient(90deg, #4F46E5 0%, #9333EA 100%);
                transform: translateY(-2px);
                box-shadow: 0 10px 20px -10px rgba(79, 70, 229, 0.5);
            }

            .floating {
                animation: floating 3s ease-in-out infinite;
            }

            @keyframes floating {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .hover-rotate:hover {
                transform: rotate(5deg);
            }

            .ribbon {
                position: absolute;
                top: -5px;
                right: -5px;
                z-index: 1;
                overflow: hidden;
                width: 75px;
                height: 75px;
                text-align: right;
            }

            .ribbon span {
                font-size: 10px;
                font-weight: bold;
                color: #FFF;
                text-transform: uppercase;
                text-align: center;
                line-height: 20px;
                transform: rotate(45deg);
                width: 100px;
                display: block;
                background: linear-gradient(#9F7AEA, #6366F1);
                box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
                position: absolute;
                top: 19px;
                right: -21px;
            }

            .ribbon span::before {
                content: "";
                position: absolute;
                left: 0px;
                top: 100%;
                z-index: -1;
                border-left: 3px solid #6366F1;
                border-right: 3px solid transparent;
                border-bottom: 3px solid transparent;
                border-top: 3px solid #6366F1;
            }

            .ribbon span::after {
                content: "";
                position: absolute;
                right: 0px;
                top: 100%;
                z-index: -1;
                border-left: 3px solid transparent;
                border-right: 3px solid #6366F1;
                border-bottom: 3px solid transparent;
                border-top: 3px solid #6366F1;
            }

            .glow-on-hover:hover {
                box-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
            }
        </style>
    </section>
    {{-- End A --}}

    {{-- sertifikasi  --}}
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Sertifikasi</h2>
        <p class="text-gray-500 text-sm sm:text-base mb-6">Upgrade terus ilmu dan pengalaman terbaru kamu di bidang
            teknologi.</p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap gap-3 mb-10">
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm hover:bg-blue-700 transition">Semua</button>
            <button
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl text-sm hover:bg-gray-300 transition">Terbuka</button>
            <button
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-xl text-sm hover:bg-gray-300 transition">Terkunci</button>
        </div>

        <!-- Certification List -->
        <div class="space-y-6 sm:space-y-8">
            <!-- Certification Item -->
            <div
                class="flex flex-col sm:flex-row bg-white rounded-2xl shadow-md overflow-hidden border transform transition hover:scale-[1.02] active:scale-95 hover:shadow-xl">
                <img src="images/levela.png" alt="Level A" class="w-full sm:w-36 h-48 sm:h-36 object-cover">
                <div class="p-4 sm:p-6 flex flex-col justify-between">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">TLC Level A: Dasar Pengajaran
                        Efektif</h3>
                    <p class="text-gray-500 text-sm mb-4">Pelajari dasar-dasar mengajar yang efektif dan bagaimana
                        menghadapi ujian sertifikasi ini.</p>
                    <button
                        class="self-start px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Selengkapnya
                        →</button>
                </div>
            </div>

            <!-- Certification Item -->
            <div
                class="flex flex-col sm:flex-row bg-white rounded-2xl shadow-md overflow-hidden border transform transition hover:scale-[1.02] active:scale-95 hover:shadow-xl">
                <img src="images/levelb.png" alt="Level B" class="w-full sm:w-36 h-48 sm:h-36 object-cover">
                <div class="p-4 sm:p-6 flex flex-col justify-between">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">TLC Level B: Strategi Pembelajaran
                        Lanjut</h3>
                    <p class="text-gray-500 text-sm mb-4">Dalami strategi lanjutan dalam mengajar dan persiapkan diri
                        menghadapi tes berikutnya.</p>
                    <button
                        class="self-start px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Selengkapnya
                        →</button>
                </div>
            </div>

            <!-- Certification Item -->
            <div
                class="flex flex-col sm:flex-row bg-white rounded-2xl shadow-md overflow-hidden border transform transition hover:scale-[1.02] active:scale-95 hover:shadow-xl">
                <img src="images/levelc.png" alt="Level C" class="w-full sm:w-36 h-48 sm:h-36 object-cover">
                <div class="p-4 sm:p-6 flex flex-col justify-between">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">TLC Level C: Mastery dalam
                        Pengajaran Kreatif</h3>
                    <p class="text-gray-500 text-sm mb-4">Capai mastery dalam pengajaran kreatif dan kuasai materi
                        ujian tingkat akhir.</p>
                    <button
                        class="self-start px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">Selengkapnya
                        →</button>
                </div>
            </div>
        </div>
    </section>
    {{-- End sertifikasi --}}

    {{-- Langkah Mudah --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white shadow-lg rounded-2xl border p-8 mb-10">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">
            Langkah mudah belajar di Teaching & Learning Certification
        </h2>

        <!-- Tab Navigation -->
        <div class="flex flex-wrap justify-center mb-6 gap-2">
            <button
                class="px-6 py-2 bg-[#007BFF] text-white font-semibold rounded-full shadow-md transition-transform transform hover:scale-105 active:scale-95">
                Sesi Terbuka
            </button>
            <button
                class="px-6 py-2 bg-gray-200 text-gray-700 font-semibold rounded-full shadow-md border transition-transform transform hover:scale-105 active:scale-95">
                Sesi Terkunci
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Image -->
            <div class="flex justify-center">
                <img src="images/konten_satu.jpg" alt="Student Learning"
                    class="rounded-2xl shadow-lg max-w-full sm:w-[90%] transition-transform transform hover:scale-105">
            </div>

            <!-- Steps -->
            <div class="relative">
                <div class="absolute left-4 top-0 bottom-0 w-1 bg-[#007BFF] rounded-full hidden sm:block"></div>

                <div class="relative flex items-start mb-6">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#007BFF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        1
                    </div>
                    <div class="ml-6 bg-gray-100 p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Pilih paket sesuai kebutuhan kamu</h3>
                        <p class="text-gray-600 text-sm">Lakukan pembayaran untuk paket mata pelajaran yang kamu pilih
                        </p>
                    </div>
                </div>

                <div class="relative flex items-start mb-6">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#007BFF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        2
                    </div>
                    <div class="ml-6 bg-gray-100 p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Pesan sesi di Teaching & Learning Certification
                        </h3>
                        <p class="text-gray-600 text-sm">
                            Kamu bisa bebas pilih pengajar dan waktu belajar kamu. Pastikan kamu pesan sesi H-3 sebelum
                            mulai belajar ya!
                        </p>
                    </div>
                </div>

                <div class="relative flex items-start mb-6">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#007BFF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        3
                    </div>
                    <div class="ml-6 bg-gray-100 p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Konfirmasi pengajar pilihanmu</h3>
                        <p class="text-gray-600 text-sm">
                            Konfirmasi akan kamu terima melalui email maksimal 2×24 jam setelah sesi dipesan
                        </p>
                    </div>
                </div>

                <div class="relative flex items-start">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#007BFF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        4
                    </div>
                    <div class="ml-6 bg-gray-100 p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Mulai sesi belajar dengan Pengajar</h3>
                        <p class="text-gray-600 text-sm">
                            Kamu bisa mulai sesi belajar sesuai waktu sesi yang kamu pesan
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="flex justify-center mt-8">
            <button
                class="px-6 py-3 bg-[#FF8000] text-white font-semibold rounded-full shadow-md text-lg transition-transform transform hover:scale-105 active:scale-95">
                Cari Paket Sekarang
            </button>
        </div>
    </section>
    {{-- End Langkah Mudah --}}


    {{-- Paket TLC --}}
    {{-- <section class="relative bg-white min-h-screen flex items-center py-16 overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute -top-20 -left-20 w-72 h-72 md:w-96 md:h-96 rounded-full opacity-10 blur-3xl animate-blob">
        </div>
        <div
            class="absolute -bottom-20 -right-20 w-72 h-72 md:w-96 md:h-96 bg-blue-300 rounded-full opacity-10 blur-3xl animate-blob animation-delay-4000">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12 md:mb-16 px-2">
                <h1
                    class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 mb-4 transform transition duration-300 hover:scale-105">
                    Certification Packages
                </h1>
                <p class="text-lg md:text-2xl text-gray-600 max-w-2xl mx-auto opacity-80 hover:opacity-100 transition">
                    Unlock your teaching potential with our expertly crafted certification paths
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Package A -->
                <div
                    class="relative bg-white border border-purple-100 rounded-3xl shadow-xl p-8 transform transition duration-500 hover:scale-105 hover:rotate-3 hover:shadow-purple-500/30 group">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-blue-500 rounded-t-3xl transition-all duration-500 group-hover:h-full opacity-0 group-hover:opacity-100 z-0">
                    </div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <h2
                                class="text-2xl md:text-3xl font-bold text-purple-600 transition transform group-hover:translate-x-2">
                                Package A</h2>
                            <span
                                class="bg-purple-100 text-purple-600 px-3 py-1 md:px-4 md:py-2 rounded-full text-sm font-semibold">Basic</span>
                        </div>
                        <h3
                            class="text-xl md:text-2xl font-semibold text-gray-800 mb-4 md:mb-6 opacity-80 group-hover:opacity-100 transition">
                            Teaching Knowledge Certification
                        </h3>
                        <div class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-purple-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Foundations of Modern Teaching</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-purple-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Student Engagement Strategies</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-purple-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Assessment Techniques</span>
                            </div>
                        </div>
                        <button
                            class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white py-3 md:py-4 rounded-xl 
                            hover:from-purple-700 hover:to-blue-700 
                            transform transition duration-300 
                            hover:scale-105 
                            hover:shadow-lg 
                            hover:shadow-purple-500/50 
                            active:scale-95 
                            group-hover:bg-opacity-90">
                            Select Package
                        </button>
                    </div>
                </div>

                <!-- Package B -->
                <div
                    class="relative bg-white border border-blue-100 rounded-3xl shadow-xl p-8 transform transition duration-500 hover:scale-105 hover:-rotate-3 hover:shadow-blue-500/30 group">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-green-500 rounded-t-3xl transition-all duration-500 group-hover:h-full opacity-0 group-hover:opacity-100 z-0">
                    </div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <h2
                                class="text-2xl md:text-3xl font-bold text-blue-600 transition transform group-hover:translate-x-2">
                                Package B</h2>
                            <span
                                class="bg-blue-100 text-blue-600 px-3 py-1 md:px-4 md:py-2 rounded-full text-sm font-semibold">Intermediate</span>
                        </div>
                        <h3
                            class="text-xl md:text-2xl font-semibold text-gray-800 mb-4 md:mb-6 opacity-80 group-hover:opacity-100 transition">
                            Teaching Activation Certification
                        </h3>
                        <div class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Advanced Pedagogical Approaches</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Technology Integration</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Inclusive Classroom Practices</span>
                            </div>
                        </div>
                        <button
                            class="w-full bg-gradient-to-r from-blue-600 to-green-500 text-white py-3 md:py-4 rounded-xl 
                            hover:from-blue-700 hover:to-green-600 
                            transform transition duration-300 
                            hover:scale-105 
                            hover:shadow-lg 
                            hover:shadow-blue-500/50 
                            active:scale-95 
                            group-hover:bg-opacity-90">
                            Select Package
                        </button>
                    </div>
                </div>

                <!-- Package C -->
                <div
                    class="relative bg-white border border-pink-100 rounded-3xl shadow-xl p-8 transform transition duration-500 hover:scale-105 hover:rotate-3 hover:shadow-pink-500/30 group">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pink-500 to-red-500 rounded-t-3xl transition-all duration-500 group-hover:h-full opacity-0 group-hover:opacity-100 z-0">
                    </div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <h2
                                class="text-2xl md:text-3xl font-bold text-pink-600 transition transform group-hover:translate-x-2">
                                Package C</h2>
                            <span
                                class="bg-pink-100 text-pink-600 px-3 py-1 md:px-4 md:py-2 rounded-full text-sm font-semibold">Advanced</span>
                        </div>
                        <h3
                            class="text-xl md:text-2xl font-semibold text-gray-800 mb-4 md:mb-6 opacity-80 group-hover:opacity-100 transition">
                            Teaching Mastery Certification
                        </h3>
                        <div class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-pink-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Educational Leadership</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-pink-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Research-Based Teaching</span>
                            </div>
                            <div class="flex items-center transform transition group-hover:-translate-x-2">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-pink-500 mr-3 md:mr-4 animate-pulse"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-base md:text-lg">Curriculum Development</span>
                            </div>
                        </div>
                        <button
                            class="w-full bg-gradient-to-r from-pink-600 to-red-500 text-white py-3 md:py-4 rounded-xl 
                            hover:from-pink-700 hover:to-red-600 
                            transform transition duration-300 
                            hover:scale-105 
                            hover:shadow-lg 
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
                0% {
                    transform: scale(1) translate(0, 0);
                }

                33% {
                    transform: scale(1.1) translate(-10px, 20px);
                }

                66% {
                    transform: scale(0.9) translate(10px, -20px);
                }

                100% {
                    transform: scale(1) translate(0, 0);
                }
            }

            .animate-blob {
                animation: blob 10s infinite;
            }

            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </section> --}}
    {{-- End Paket TLC --}}

    {{-- <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-[#E6F7FA] shadow-lg rounded-2xl border p-8 mb-10">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Langkah mudah belajar di Teaching & Learning
            Certification</h2>

        <!-- Tab Navigation -->
        <div class="flex justify-center mb-6">
            <button
                class="px-6 py-2 bg-[#00B2FF] text-white font-semibold rounded-full shadow-md mr-2 transition-transform transform hover:scale-105 active:scale-95">Sesi
                Terbuka</button>
            <button
                class="px-6 py-2 bg-white text-gray-700 font-semibold rounded-full shadow-md border transition-transform transform hover:scale-105 active:scale-95">Sesi
                Terkunci</button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Image -->
            <div class="flex justify-center">
                <img src="images/konten_satu.jpg" alt="Student Learning"
                    class="rounded-2xl shadow-lg w-[90%] transition-transform transform hover:scale-105">
            </div>

            <!-- Steps -->
            <div class="relative">
                <div class="absolute left-4 top-0 bottom-0 w-1 bg-[#00B2FF] rounded-full"></div>

                <div class="relative flex items-start mb-6">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#00B2FF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        1</div>
                    <div class="ml-6 bg-white p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Pilih paket sesuai kebutuhan
                            kamu</h3>
                        <p class="text-gray-600 text-sm">Lakukan pembayaran untuk paket mata pelajaran yang kamu pilih
                        </p>
                    </div>
                </div>

                <div class="relative flex items-start mb-6">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#00B2FF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        2</div>
                    <div class="ml-6 bg-white p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Pesan sesi di Teaching & Learning Certification
                        </h3>
                        <p class="text-gray-600 text-sm">Kamu bisa bebas pilih pengajar dan waktu belajar kamu.
                            Pastikan kamu pesan sesi H-3 sebelum mulai belajar ya!</p>
                    </div>
                </div>

                <div class="relative flex items-start mb-6">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#00B2FF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        3</div>
                    <div class="ml-6 bg-white p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Konfirmasi pengajar pilihanmu</h3>
                        <p class="text-gray-600 text-sm">Konfirmasi akan kamu terima melalui email maksimal 2×24 jam
                            setelah sesi dipesan</p>
                    </div>
                </div>

                <div class="relative flex items-start">
                    <div
                        class="w-8 h-8 flex items-center justify-center bg-[#00B2FF] text-white font-bold rounded-full shadow-md transition-transform transform hover:scale-110">
                        4</div>
                    <div class="ml-6 bg-white p-4 rounded-lg shadow-md w-full transition-shadow hover:shadow-xl">
                        <h3 class="text-lg font-semibold text-gray-800">Mulai sesi belajar dengan Pengajar</h3>
                        <p class="text-gray-600 text-sm">Kamu bisa mulai sesi belajar sesuai waktu sesi yang kamu pesan
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="flex justify-center mt-8">
            <button
                class="px-6 py-3 bg-[#FF8000] text-white font-semibold rounded-full shadow-md text-lg transition-transform transform hover:scale-105 active:scale-95">Cari
                Paket Sekarang</button>
        </div>
    </section> --}}

    {{-- Vidio Pendafatraan --}}
    {{-- <section id="home"
        class="w-full px-4 md:px-5 py-12 md:py-16 bg-white text-white shadow-lg transition-all duration-500">
        <div class="container mx-auto max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 items-center gap-8">
                <!-- Text Content -->
                <div class="lg:col-span-7 p-4 md:p-5 text-center lg:text-left">
                    <h1 class="text-3xl md:text-5xl font-extrabold leading-snug text-[#00C6A9]">
                        We Learn it, <br />
                        <span class="text-[#FFD700]">Cara Pendaftaran</span>
                    </h1>
                    <p class="text-base md:text-lg mt-4 text-gray-900">
                        Teaching & Learning Certification siap bantu taklukkan semua ujian dan nemenin perjuanganmu
                        menuju impian!
                    </p>
                    <div class="flex justify-center lg:justify-start mt-6">
                        <a href="#"
                            class="bg-[#FF6600] text-white px-6 py-3 rounded-xl shadow-md text-base md:text-lg font-semibold hover:bg-[#E65C00] transition-transform duration-300 hover:scale-105 active:scale-95">
                            Lihat Fasilitas TLC Program
                        </a>
                    </div>
                </div>

                <!-- Video Content -->
                <div
                    class="lg:col-span-5 relative rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition-transform duration-500">
                    <iframe class="w-full h-56 md:h-[350px] rounded-xl"
                        src="https://www.youtube.com/embed/Jn7vuXLozJI?autoplay=1&mute=1" frameborder="0"
                        allowfullscreen></iframe>
                    <div
                        class="absolute top-3 right-3 bg-white text-[#00C6A9] font-bold px-3 md:px-4 py-1.5 md:py-2 rounded-full shadow-lg text-sm md:text-base">
                        Sound ON!
                    </div>
                    <div
                        class="absolute bottom-3 right-3 bg-white text-[#00C6A9] font-bold px-3 md:px-4 py-1.5 md:py-2 rounded-full shadow-lg text-sm md:text-base">
                        TLC Program
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- End Vidio Pendafatraan --}}

    {{-- Langkah di TLC --}}
    {{-- <section class="w-full py-12 md:py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-teal-100 transform transition-all hover:scale-[1.01] hover:shadow-3xl">
                <div class="relative">
                    <!-- Animated Gradient Header -->
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-blue-500 opacity-10 animate-pulse">
                    </div>

                    <h1
                        class="relative text-2xl md:text-4xl font-extrabold text-center py-8 mb-8 text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-blue-600 tracking-tight">
                        Langkah Mudah Daftar di TLC Program
                    </h1>
                </div>

                <!-- Content -->
                <div class="flex flex-col md:flex-row items-center px-6 md:px-12 pb-10 md:pb-12 gap-8">
                    <!-- Left Image -->
                    <div
                        class="w-full md:w-1/2 transform transition-all duration-500 hover:scale-105 hover:rotate-1 hover:shadow-2xl">
                        <div class="relative group">
                            <div
                                class="absolute -inset-2 bg-gradient-to-r from-teal-400 to-blue-500 rounded-3xl blur-lg opacity-50 group-hover:opacity-75 transition duration-500">
                            </div>
                            <img src="images/guru.png" alt="Student learning"
                                class="relative rounded-3xl shadow-2xl w-full" />
                        </div>
                    </div>

                    <!-- Right Steps -->
                    <div class="w-full md:w-1/2 space-y-6">
                        <!-- Step 1 -->
                        <div class="group">
                            <div
                                class="flex items-center space-x-4 md:space-x-6 p-4 bg-white rounded-2xl shadow-md transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-r hover:from-teal-50 hover:to-blue-50">
                                <div
                                    class="w-14 h-14 md:w-16 md:h-16 bg-teal-100 rounded-full flex items-center justify-center transform transition-all group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-7 h-7 md:w-8 md:h-8 text-teal-600 group-hover:text-teal-800"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3
                                        class="font-bold text-lg md:text-xl text-gray-800 mb-2 group-hover:text-teal-700 transition">
                                        Pilih paket program
                                    </h3>
                                    <p class="text-gray-600 group-hover:text-gray-800 transition text-sm md:text-base">
                                        Lakukan pembayaran untuk paket yang kamu pilih
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="group">
                            <div
                                class="flex items-center space-x-4 md:space-x-6 p-4 bg-white rounded-2xl shadow-md transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50">
                                <div
                                    class="w-14 h-14 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center transform transition-all group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-7 h-7 md:w-8 md:h-8 text-blue-600 group-hover:text-blue-800"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3
                                        class="font-bold text-lg md:text-xl text-gray-800 mb-2 group-hover:text-blue-700 transition">
                                        Pesan sesi paket
                                    </h3>
                                    <p class="text-gray-600 group-hover:text-gray-800 transition text-sm md:text-base">
                                        Bebas pilih pengajar dan waktu sesi
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="group">
                            <div
                                class="flex items-center space-x-4 md:space-x-6 p-4 bg-white rounded-2xl shadow-md transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50">
                                <div
                                    class="w-14 h-14 md:w-16 md:h-16 bg-purple-100 rounded-full flex items-center justify-center transform transition-all group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-7 h-7 md:w-8 md:h-8 text-purple-600 group-hover:text-purple-800"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3
                                        class="font-bold text-lg md:text-xl text-gray-800 mb-2 group-hover:text-purple-700 transition">
                                        Konfirmasi Paket
                                    </h3>
                                    <p class="text-gray-600 group-hover:text-gray-800 transition text-sm md:text-base">
                                        Konfirmasi via email dalam 2×24 jam
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Call to Action Button -->
                        <button
                            class="w-full bg-gradient-to-r from-orange-500 to-pink-500 text-white py-3 md:py-4 rounded-full font-bold transform transition-all duration-300 hover:scale-105 hover:shadow-2xl active:scale-95 animate-pulse-slow focus:outline-none focus:ring-4 focus:ring-orange-300 text-sm md:text-base">
                            Cari Sesi Paket Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes pulse-slow {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }
            }

            .animate-pulse-slow {
                animation: pulse-slow 3s infinite;
            }
        </style>
    </section> --}}
    {{-- End Langkah di TLC --}}

    {{-- Banner --}}
    {{-- <section class="relative max-w-7xl mx-auto px-4 py-8">
        <!-- Left navigation button -->
        <button
            class="absolute left-2 md:-left-5 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Right navigation button -->
        <button
            class="absolute right-2 md:-right-5 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Banner -->
        <div class="bg-blue-900 bg-gradient-to-r from-blue-900 to-blue-800 rounded-lg overflow-hidden">
            <!-- Content -->
            <div class="flex flex-col md:flex-row items-center">
                <!-- Character illustrations -->
                <div class="w-full md:w-2/5 p-4">
                    <img src="images/karakter.jpg" alt="Kedinasan Characters" class="w-full h-auto object-cover">
                </div>

                <!-- Text content -->
                <div class="w-full md:w-3/5 p-6 text-white text-center md:text-left">
                    <h2 class="text-xl md:text-3xl font-bold mb-2">Jadi #KebanggaanKeluarga dengan</h2>
                    <h1 class="text-2xl md:text-5xl font-extrabold text-yellow-400 leading-tight mb-6 drop-shadow-md">
                        Lolos Tes Sekolah Kedinasan bersama Bimbel TLC!
                    </h1>
                    <a href="#"
                        class="inline-block bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold py-3 px-6 md:px-8 rounded-full transition duration-300 transform hover:-translate-y-1">
                        Cek Program di Sini
                    </a>
                </div>
            </div>
        </div>

        <!-- Dots navigation -->
        <div class="flex justify-center mt-4 space-x-2">
            <span class="w-2 h-2 bg-white rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
            <span class="w-2 h-2 bg-white bg-opacity-50 rounded-full"></span>
        </div>
    </section> --}}
    {{-- End Banner --}}

{{-- End Sertifikasi --}}

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-white to-blue-50 shadow-xl rounded-3xl border border-blue-100 p-8 mb-10">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2
                    class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                    LEVEL A</h2>
            </div>
            <div class="flex items-center space-x-4">
                <span
                    class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full border border-purple-200 shadow-sm flex items-center">
                    <span class="inline-block w-2 h-2 bg-purple-500 rounded-full mr-2 animate-pulse"></span>
                    Dalam Progres
                </span>
                <button
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 focus:ring-4 focus:ring-blue-200">
                    Nilai
                </button>
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-600 text-base mb-10 text-center sm:text-left max-w-2xl">
            Daftar kategori kuis yang akan anda kerjakan. Selesaikan setiap kategori untuk membuka level berikutnya!
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start gap-3 mb-10">
            <button
                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Semua
            </button>

            <button
                class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-green-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
                Terbuka
            </button>

            <button
                class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Terkunci
            </button>
        </div>

        <!-- Kategori Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Kategori: Literasi -->
            <div
                class="bg-white rounded-2xl p-6 shadow-md border border-gray-200 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-100 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 20h4" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4h16v12H4z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Literasi</h3>
                    </div>
                    <span class="text-sm text-green-600 font-medium">Terbuka</span>
                </div>
                <p class="text-sm text-gray-600 mb-4">
                    Tes kemampuan membaca dan memahami teks bacaan.
                </p>
                <button
                    class="mt-auto px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                    Mulai Kuis
                </button>
            </div>

            <!-- Kategori: Numerasi -->
            <div
                class="bg-white rounded-2xl p-6 shadow-md border border-gray-200 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-yellow-100 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0h6" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Numerasi</h3>
                    </div>
                    <span class="text-sm text-green-600 font-medium">Terbuka</span>
                </div>
                <p class="text-sm text-gray-600 mb-4">
                    Tes kemampuan berhitung dan pemecahan masalah numerik.
                </p>
                <button
                    class="mt-auto px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                    Mulai Kuis
                </button>
            </div>

            <!-- Kategori: PCK -->
            <div
                class="bg-white rounded-2xl p-6 shadow-md border border-gray-200 hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-red-100 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.25 12.083 12.083 0 015.84 10.578L12 14z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">PCK</h3>
                    </div>
                    <span class="text-sm text-gray-400 font-medium">Terkunci</span>
                </div>
                <p class="text-sm text-gray-600 mb-4">
                    Tes kemampuan pedagogik dan konten keilmuan (Professional Content Knowledge).
                </p>
                <button class="mt-auto px-4 py-2 bg-gray-300 text-gray-600 text-sm rounded-lg cursor-not-allowed">
                    Terkunci
                </button>
            </div>
        </div>
    </section>

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

    <section
			class="py-16 bg-gradient-to-r from-blue-50 via-blue-50 to-blue-100 relative overflow-hidden"
		>
			<!-- Decorative elements -->
			<div class="absolute top-0 left-0 w-full h-full opacity-20">
				<div
					class="absolute top-10 left-10 w-32 h-32 rounded-full bg-blue-200"
				></div>
				<div
					class="absolute bottom-10 right-10 w-48 h-48 rounded-full bg-blue-300"
				></div>
				<div
					class="absolute top-1/2 left-1/4 w-24 h-24 rounded-full bg-yellow-200"
				></div>
			</div>

			<div class="max-w-6xl mx-auto px-5 text-center py-8 relative z-10">
				<!-- Animated Tag -->
				<div class="mb-4 transform hover:scale-105 transition duration-300">
					<span
						class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg border-2 border-blue-700"
					>
						<svg
							xmlns="http://www.w3.org/2000/svg"
							class="w-5 h-5"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M9 12l2 2 4-4M7 7h10M7 11h10M5 5v14a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2z"
							/>
						</svg>
						CERTIFICATE
					</span>
				</div>

				<!-- Enhanced Heading -->
				<h2
					class="text-4xl sm:text-5xl font-extrabold text-blue-800 leading-tight mb-6"
				>
					<span class="text-blue-600">Sertifikat</span> Keahlian
				</h2>

				<p class="text-blue-700 max-w-2xl mx-auto mb-10 text-lg">
					Bukti resmi penyelesaian dan kompetensi yang telah diakui secara
					profesional
				</p>
			</div>

			<div class="container mx-auto px-4">
				<div class="flex flex-wrap justify-center gap-6 md:gap-8">
					<!-- Sertifikat 1 - Enhanced -->
					<div
						class="p-6 rounded-xl bg-white shadow-xl transform hover:scale-105 transition duration-500 group border border-blue-100"
					>
						<div class="overflow-hidden rounded-lg">
							<img
								src="./assets/img/sertifikat_depan.jpg"
								alt="Sertifikat Penyelesaian"
								class="w-80 md:w-96 h-auto rounded-lg shadow-md transform group-hover:scale-105 transition duration-500"
							/>
						</div>
						<div class="mt-6 text-center">
							<button
								class="px-8 py-3 rounded-lg text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-yellow-400 hover:to-yellow-500 transition duration-300 font-bold text-lg shadow-lg transform hover:-translate-y-1 border-b-4 border-blue-800 hover:border-yellow-600"
							>
								Sertifikat Penyelesaian
							</button>
						</div>
					</div>

					<!-- Sertifikat 2 - Enhanced -->
					<div
						class="p-6 rounded-xl bg-white shadow-xl transform hover:scale-105 transition duration-500 group border border-blue-100"
					>
						<div class="overflow-hidden rounded-lg">
							<img
								src="./assets/img/sertifikat_belakang.jpg"
								alt="Sertifikat Kompetensi"
								class="w-80 md:w-96 h-auto rounded-lg shadow-md transform group-hover:scale-105 transition duration-500"
							/>
						</div>
						<div class="mt-6 text-center">
							<button
								class="px-8 py-3 rounded-lg text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-yellow-400 hover:to-yellow-500 transition duration-300 font-bold text-lg shadow-lg transform hover:-translate-y-1 border-b-4 border-blue-800 hover:border-yellow-600"
							>
								Sertifikat Kompetensi
							</button>
						</div>
					</div>
				</div>
			</div>
		</section>


</body>

</html>
