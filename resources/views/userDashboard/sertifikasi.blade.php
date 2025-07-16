<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Banner --}}
    <section class="relative max-w-7xl mx-auto px-4 py-8">
        <!-- Navigation Buttons -->
        <button id="prevBtn"
            class="absolute left-2 md:-left-5 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button id="nextBtn"
            class="absolute right-2 md:-right-5 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Carousel Container -->
        <div class="carousel-container overflow-hidden rounded-lg relative">
            <div class="carousel flex transition-transform ease-in-out duration-500" id="banner-carousel">
                <div id="slide-0"
                    class="slide w-full flex-shrink-0 bg-blue-900 bg-gradient-to-r from-blue-900 to-blue-800 rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-2/5 p-4">
                            <img src="images/karakter.jpg" alt="Kedinasan Characters"
                                class="w-full h-64 object-cover">
                        </div>
                        <div class="w-full md:w-3/5 p-6 text-white text-center md:text-left">
                            <h2 class="text-xl md:text-3xl font-bold mb-2">Jadi #KebanggaanKeluarga dengan</h2>
                            <h1
                                class="text-2xl md:text-5xl font-extrabold text-yellow-400 leading-tight mb-6 drop-shadow-md">
                                Lolos Tes Sekolah Kedinasan bersama Bimbel TLC!
                            </h1>
                            <a href="#"
                                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold py-3 px-6 md:px-8 rounded-full transition duration-300 transform hover:-translate-y-1">
                                Cek Program di Sini
                            </a>
                        </div>
                    </div>
                </div>

                <div id="slide-1"
                    class="slide w-full flex-shrink-0 bg-green-900 bg-gradient-to-r from-green-900 to-green-800 rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-2/5 p-4">
                            <img src="images/konten_satu.jpg" alt="Alumni Sukses" class="w-full h-64 object-cover">
                        </div>
                        <div class="w-full md:w-3/5 p-6 text-white text-center md:text-left">
                            <h2 class="text-xl md:text-3xl font-bold mb-2">Ikuti Jejak Alumni Kami</h2>
                            <h1
                                class="text-2xl md:text-5xl font-extrabold text-yellow-400 leading-tight mb-6 drop-shadow-md">
                                Ratusan Siswa Diterima di PKN STAN & IPDN!
                            </h1>
                            <a href="#"
                                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-green-900 font-bold py-3 px-6 md:px-8 rounded-full transition duration-300 transform hover:-translate-y-1">
                                Lihat Testimoni
                            </a>
                        </div>
                    </div>
                </div>

                <div id="slide-2"
                    class="slide w-full flex-shrink-0 bg-purple-900 bg-gradient-to-r from-purple-900 to-purple-800 rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-2/5 p-4">
                            <img src="images/konten_dua.jpeg" alt="Tim Pengajar" class="w-full h-64 object-cover">
                        </div>
                        <div class="w-full md:w-3/5 p-6 text-white text-center md:text-left">
                            <h2 class="text-xl md:text-3xl font-bold mb-2">Diajar Oleh Tim Terbaik</h2>
                            <h1
                                class="text-2xl md:text-5xl font-extrabold text-yellow-400 leading-tight mb-6 drop-shadow-md">
                                Tutor Lulusan Kampus Top & Sekolah Kedinasan!
                            </h1>
                            <a href="#"
                                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-purple-900 font-bold py-3 px-6 md:px-8 rounded-full transition duration-300 transform hover:-translate-y-1">
                                Kenali Pengajar Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-4 space-x-2">
            <button class="dot w-3 h-3 bg-blue-900 rounded-full active" data-slide="0"></button>
            <button class="dot w-3 h-3 bg-blue-900 bg-opacity-50 rounded-full" data-slide="1"></button>
            <button class="dot w-3 h-3 bg-blue-900 bg-opacity-50 rounded-full" data-slide="2"></button>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const carousel = document.getElementById("banner-carousel");
                const slides = document.querySelectorAll(".slide");
                const dots = document.querySelectorAll(".dot");
                let currentIndex = 0;
                const totalSlides = slides.length;

                function updateCarousel() {
                    const offset = -currentIndex * 100;
                    carousel.style.transform = `translateX(${offset}%)`;

                    // Update dot active state
                    dots.forEach(dot => dot.classList.remove("bg-opacity-100", "active"));
                    dots[currentIndex].classList.add("bg-opacity-100", "active");
                }

                document.getElementById("prevBtn").addEventListener("click", function() {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateCarousel();
                });

                document.getElementById("nextBtn").addEventListener("click", function() {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                });

                dots.forEach((dot, index) => {
                    dot.addEventListener("click", function() {
                        currentIndex = index;
                        updateCarousel();
                    });
                });

                setInterval(function() {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                }, 5000);
            });
        </script>
    </section>
    {{-- End Banner --}}

    {{-- Diskon --}}
    <section class="py-16 px-4 md:px-8 lg:px-16 bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- Enhanced Header with Animation -->
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 animate-pulse"
                    style="background: linear-gradient(90deg, #3b82f6 0%, #6366f1 50%, #8b5cf6 100%);
                    -webkit-background-clip: text; background-clip: text; color: transparent;
                    text-shadow: 0px 2px 15px rgba(59, 130, 246, 0.3);">
                    PROMO SPESIAL TLC!
                </h2>
                <p class="text-xl md:text-2xl text-gray-700 max-w-3xl mx-auto font-medium">
                    Penawaran eksklusif dengan harga terbaik hanya untukmu!
                </p>
                <div class="flex justify-center mt-4">
                    <div class="w-32 h-1 bg-blue-500 rounded-full"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 md:gap-10">
                <!-- Enhanced Promo Card 1 -->
                <div class="relative group transform transition duration-500 hover:scale-105">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-blue-400 rounded-3xl opacity-75
                        group-hover:opacity-90 transition duration-300 blur-lg group-hover:blur-xl animate-pulse">
                    </div>
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border border-blue-100">
                        <div class="absolute -top-1 -right-1">
                            <div
                                class="bg-gradient-to-r from-blue-700 to-blue-500 text-white px-8 py-2
                                transform rotate-12 shadow-lg font-bold text-lg">
                                DISKON 48%</div>
                        </div>
                        <div class="p-6 pt-10 text-center flex flex-col h-full">
                            <div class="relative mb-6 overflow-hidden rounded-xl shadow-lg">
                                <img src="images/ss.png" alt="Paket 1 Tahun"
                                    class="w-full h-48 object-cover transform transition duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="mb-6 flex-1">
                                <h3
                                    class="text-2xl md:text-3xl font-bold text-blue-600 mb-2 group-hover:text-blue-700 transition">
                                    Paket 1 Tahun + GRATIS
                                </h3>
                                <h4 class="text-xl text-blue-500 font-semibold mb-3">Semester Genap</h4>
                                <p class="text-gray-600 text-lg">
                                    Potongan mulai dari <span class="line-through text-red-400">Rp 8.100.000</span>
                                </p>
                                <p class="text-gray-800 text-xl font-bold">
                                    Hemat hingga Rp 3.900.000!
                                </p>
                            </div>
                            <button
                                class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-blue-500 text-white
                                px-8 py-4 rounded-full text-lg font-bold transform transition duration-300
                                hover:shadow-lg hover:shadow-blue-500/50">
                                <span class="relative z-10">KLAIM SEKARANG</span>
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-600 transform scale-x-0
                                    group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Promo Card 2 -->
                <div class="relative group transform transition duration-500 hover:scale-105">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-green-600 to-green-400 rounded-3xl opacity-75
                        group-hover:opacity-90 transition duration-300 blur-lg group-hover:blur-xl animate-pulse">
                    </div>
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border border-green-100">
                        <div class="absolute -top-1 -right-1">
                            <div
                                class="bg-gradient-to-r from-green-700 to-green-500 text-white px-8 py-2
                                transform rotate-12 shadow-lg font-bold text-lg">
                                KUPON</div>
                        </div>
                        <div class="p-6 pt-10 text-center flex flex-col h-full">
                            <div class="relative mb-6 overflow-hidden rounded-xl shadow-lg">
                                <img src="images/ss3.png" alt="Siswa Berprestasi"
                                    class="w-full h-48 object-cover transform transition duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="mb-6 flex-1">
                                <h3
                                    class="text-2xl md:text-3xl font-bold text-green-600 mb-2 group-hover:text-green-700 transition">
                                    Siswa Berprestasi
                                </h3>
                                <h4 class="text-xl text-green-500 font-semibold mb-3">Diskon Khusus</h4>
                                <p class="text-gray-600 text-lg">
                                    Potongan Tambahan Spesial
                                </p>
                                <p class="text-gray-800 text-xl font-bold">
                                    Hingga Rp 750.000!
                                </p>
                            </div>
                            <button
                                class="relative overflow-hidden bg-gradient-to-r from-green-600 to-green-500 text-white
                                px-8 py-4 rounded-full text-lg font-bold transform transition duration-300
                                hover:shadow-lg hover:shadow-green-500/50">
                                <span class="relative z-10">KLAIM SEKARANG</span>
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-green-700 to-green-600 transform scale-x-0
                                    group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Promo Card 3 -->
                <div class="relative group transform transition duration-500 hover:scale-105">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-indigo-400 rounded-3xl opacity-75
                        group-hover:opacity-90 transition duration-300 blur-lg group-hover:blur-xl animate-pulse">
                    </div>
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl border border-indigo-100">
                        <div class="absolute -top-1 -right-1">
                            <div
                                class="bg-gradient-to-r from-indigo-700 to-indigo-500 text-white px-8 py-2
                                transform rotate-12 shadow-lg font-bold text-lg">
                                DISKON 25%</div>
                        </div>
                        <div class="p-6 pt-10 text-center flex flex-col h-full">
                            <div class="relative mb-6 overflow-hidden rounded-xl shadow-lg">
                                <img src="images/ss2.png" alt="Diskon Anak Guru"
                                    class="w-full h-48 object-cover transform transition duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                            <div class="mb-6 flex-1">
                                <h3
                                    class="text-2xl md:text-3xl font-bold text-indigo-600 mb-2 group-hover:text-indigo-700 transition">
                                    Diskon Anak Guru
                                </h3>
                                <h4 class="text-xl text-indigo-500 font-semibold mb-3">Penghargaan Spesial</h4>
                                <p class="text-gray-600 text-lg">
                                    Potongan Tambahan Eksklusif
                                </p>
                                <p class="text-gray-800 text-xl font-bold">
                                    Hingga 25% Tambahan!
                                </p>
                            </div>
                            <button
                                class="relative overflow-hidden bg-gradient-to-r from-indigo-600 to-indigo-500 text-white
                                px-8 py-4 rounded-full text-lg font-bold transform transition duration-300
                                hover:shadow-lg hover:shadow-indigo-500/50">
                                <span class="relative z-10">KLAIM SEKARANG</span>
                                <span
                                    class="absolute inset-0 bg-gradient-to-r from-indigo-700 to-indigo-600 transform scale-x-0
                                    group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Added Call to Action -->
            <div class="mt-12 text-center">
                <p class="text-xl text-gray-700 mb-4">Jangan lewatkan kesempatan terbatas ini!</p>
                <div class="inline-block relative group">
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full opacity-70
                        group-hover:opacity-100 blur-sm group-hover:blur-md transition duration-300">
                    </div>
                    <button
                        class="relative bg-white px-8 py-4 rounded-full text-xl font-bold
                        bg-gradient-to-r from-pink-600 to-purple-600 text-white transform transition duration-300
                        hover:scale-105 active:scale-95">
                        DAFTAR SEKARANG
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- End Diskon --}}

    {{-- Langkah Mudah --}}
    <section id="start" class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 relative inline-block">
                    Langkah Mudah Belajar di Teaching & Learning Certification
                    <div
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-500 rounded-full mt-2">
                    </div>
                </h2>
            </div>

            <!-- Tab Navigation -->
            <div class="flex flex-wrap justify-center mb-12 gap-3">
                <button
                    class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-full shadow-md transition-all duration-300 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 hover-up">
                    <i class="fas fa-unlock-alt mr-2"></i> Sesi Terbuka
                </button>
                <button
                    class="px-8 py-3 bg-gray-200 text-gray-700 font-semibold rounded-full shadow-md border transition-all duration-300 hover:shadow-lg focus:outline-none hover-up">
                    <i class="fas fa-lock mr-2"></i> Sesi Terkunci
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image with Overlay -->
                <div class="relative group overflow-hidden rounded-3xl shadow-2xl hover-up">
                    <img src="images/konten_satu.jpg" alt="Student Learning"
                        class="w-full h-auto rounded-3xl transition-transform duration-700 ease-in-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-xl font-bold mb-2">Belajar Lebih Efektif</h3>
                        <p class="text-blue-100">Dapatkan pengalaman belajar yang personal dengan metode yang tepat</p>
                    </div>
                </div>

                <!-- Steps Container -->
                <div class="relative">
                    <div
                        class="absolute left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full hidden sm:block">
                    </div>

                    <!-- Step 1 -->
                    <div class="relative flex items-start mb-8 group">
                        <div
                            class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white font-bold rounded-full shadow-lg z-10 transition-all duration-300 group-hover:scale-110 pulse-effect">
                            1
                        </div>
                        <div
                            class="ml-6 bg-white p-5 rounded-xl shadow-lg w-full transition-all duration-300 step-transition border-l-4 border-blue-600">
                            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-shopping-cart text-blue-600 mr-2"></i>
                                Pilih paket sesuai kebutuhan kamu
                            </h3>
                            <p class="text-gray-600 mt-2">Lakukan pembayaran untuk paket mata pelajaran yang kamu pilih
                                dengan berbagai metode pembayaran</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex items-start mb-8 group">
                        <div
                            class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white font-bold rounded-full shadow-lg z-10 transition-all duration-300 group-hover:scale-110">
                            2
                        </div>
                        <div
                            class="ml-6 bg-white p-5 rounded-xl shadow-lg w-full transition-all duration-300 step-transition border-l-4 border-blue-600">
                            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                                Pesan sesi di Teaching & Learning Certification
                            </h3>
                            <p class="text-gray-600 mt-2">
                                Kamu bisa bebas pilih pengajar dan waktu belajar kamu. Pastikan kamu pesan sesi H-3
                                sebelum mulai belajar ya!
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative flex items-start mb-8 group">
                        <div
                            class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white font-bold rounded-full shadow-lg z-10 transition-all duration-300 group-hover:scale-110">
                            3
                        </div>
                        <div
                            class="ml-6 bg-white p-5 rounded-xl shadow-lg w-full transition-all duration-300 step-transition border-l-4 border-blue-600">
                            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-check-circle text-blue-600 mr-2"></i>
                                Konfirmasi pengajar pilihanmu
                            </h3>
                            <p class="text-gray-600 mt-2">
                                Konfirmasi akan kamu terima melalui email maksimal 2×24 jam setelah sesi dipesan
                            </p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative flex items-start group">
                        <div
                            class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white font-bold rounded-full shadow-lg z-10 transition-all duration-300 group-hover:scale-110">
                            4
                        </div>
                        <div
                            class="ml-6 bg-white p-5 rounded-xl shadow-lg w-full transition-all duration-300 step-transition border-l-4 border-blue-600">
                            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-graduation-cap text-blue-600 mr-2"></i>
                                Mulai sesi belajar dengan Pengajar
                            </h3>
                            <p class="text-gray-600 mt-2">
                                Kamu bisa mulai sesi belajar sesuai waktu sesi yang kamu pesan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

            * {
                font-family: 'Poppins', sans-serif;
            }

            .bg-gradient-blue {
                background: linear-gradient(135deg, #007BFF 0%, #0056b3 100%);
            }

            .bg-gradient-orange {
                background: linear-gradient(135deg, #FF8000 0%, #FF9E2A 100%);
            }

            .pulse-effect {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% {
                    box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.4);
                }

                70% {
                    box-shadow: 0 0 0 10px rgba(0, 123, 255, 0);
                }

                100% {
                    box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
                }
            }

            .hover-up {
                transition: transform 0.3s ease;
            }

            .hover-up:hover {
                transform: translateY(-5px);
            }

            .step-transition {
                transition: all 0.3s ease;
            }

            .step-transition:hover {
                transform: translateX(5px);
            }
        </style>
    </section>
    {{-- End Langkah Mudah --}}

    {{-- Paket TLC --}}
    <section class="relative bg-white min-h-screen flex items-center py-8 md:py-16 overflow-hidden">
        <!-- Subtle Decorative Background Elements - Responsive sizing -->
        <div
            class="absolute -top-20 -left-20 w-64 h-64 md:w-96 md:h-96 bg-gray-100 rounded-full opacity-50 blur-3xl animate-pulse">
        </div>
        <div
            class="absolute -bottom-20 -right-20 w-64 h-64 md:w-96 md:h-96 bg-gray-100 rounded-full opacity-50 blur-3xl animate-pulse animation-delay-4000">
        </div>

        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <div class="text-center mb-8 md:mb-16 px-2">
                <div class="inline-block relative mb-2 md:mb-4">
                    <span
                        class="absolute -inset-1 bg-gray-200 rounded-lg blur opacity-30 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></span>
                    <h1
                        class="relative text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-800 mb-2 md:mb-4 transform transition duration-300 hover:scale-105">
                        Paket Sertifikasi
                    </h1>
                </div>
                <p
                    class="text-lg sm:text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto opacity-90 hover:opacity-100 transition font-medium px-2">
                    Tingkatkan potensi mengajar Anda dengan jalur sertifikasi yang dirancang oleh para ahli
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10 perspective-1000">
                <!-- Paket A -->
                <div class="card-3d-container mb-4 sm:mb-0">
                    <div
                        class="relative bg-white border-2 border-gray-100 rounded-2xl md:rounded-3xl shadow-xl md:shadow-2xl p-5 md:p-8 transform transition duration-500 hover:scale-105 hover:rotate-1 hover:shadow-gray-400/30 group overflow-hidden">
                        <!-- Subtle Gradient Border -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-gray-100 to-gray-200 opacity-0 group-hover:opacity-50 transition-opacity duration-500 rounded-2xl md:rounded-3xl">
                        </div>

                        <!-- Subtle Glow Effect -->
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-gray-200 to-gray-300 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-50 blur-lg transition-opacity duration-500 group-hover:animate-pulse">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="absolute top-0 right-0 -mt-2 -mr-2 md:-mt-4 md:-mr-4 w-12 h-12 md:w-20 md:h-20 bg-gray-200 rotate-12 opacity-40 rounded-lg group-hover:rotate-45 transition-transform duration-500">
                            </div>

                            <div class="flex justify-between items-center mb-3 md:mb-6">
                                <h2
                                    class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 transition transform group-hover:translate-x-2">
                                    Paket A
                                </h2>
                                <span
                                    class="bg-gray-100 text-gray-700 px-2 py-1 md:px-4 md:py-2 rounded-full text-xs md:text-sm font-bold shadow-md">Dasar</span>
                            </div>

                            <h3
                                class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-700 mb-3 md:mb-6 opacity-90 group-hover:opacity-100 transition">
                                Sertifikasi Pengetahuan Mengajar
                            </h3>

                            <div class="space-y-2 md:space-y-4 mb-4 md:mb-8">
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Dasar-Dasar
                                        Mengajar Modern</span>
                                </div>
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Strategi
                                        Keterlibatan Siswa</span>
                                </div>
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Teknik
                                        Penilaian</span>
                                </div>
                            </div>

                            <button
                                class="w-full bg-gray-800 text-white py-2 md:py-4 rounded-xl font-bold text-base md:text-lg hover:bg-gray-900 transform transition duration-300 hover:scale-105 hover:shadow-lg hover:shadow-gray-400/50 active:scale-95 group-hover:bg-opacity-90">
                                Pilih Paket
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Paket B -->
                <div class="card-3d-container mb-4 sm:mb-0">
                    <div
                        class="relative bg-white border-2 border-gray-100 rounded-2xl md:rounded-3xl shadow-xl md:shadow-2xl p-5 md:p-8 transform transition duration-500 hover:scale-105 hover:-rotate-1 hover:shadow-gray-400/30 group overflow-hidden">
                        <!-- Subtle Gradient Border -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-gray-100 to-gray-200 opacity-0 group-hover:opacity-50 transition-opacity duration-500 rounded-2xl md:rounded-3xl">
                        </div>

                        <!-- Subtle Glow Effect -->
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-gray-200 to-gray-300 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-50 blur-lg transition-opacity duration-500 group-hover:animate-pulse">
                        </div>

                        <div
                            class="absolute top-0 left-0 -mt-3 -ml-3 md:-mt-6 md:-ml-6 w-16 h-16 md:w-24 md:h-24 bg-gray-200 rounded-full opacity-40 group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="absolute top-0 right-0 -mt-2 -mr-2 md:-mt-4 md:-mr-4 w-12 h-12 md:w-20 md:h-20 bg-gray-200 rotate-12 opacity-40 rounded-lg group-hover:rotate-45 transition-transform duration-500">
                            </div>

                            <div class="flex justify-between items-center mb-3 md:mb-6">
                                <h2
                                    class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 transition transform group-hover:translate-x-2">
                                    Paket B
                                </h2>
                                <span
                                    class="bg-gray-100 text-gray-700 px-2 py-1 md:px-4 md:py-2 rounded-full text-xs md:text-sm font-bold shadow-md">Menengah</span>
                            </div>

                            <h3
                                class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-700 mb-3 md:mb-6 opacity-90 group-hover:opacity-100 transition">
                                Sertifikasi Aktivasi Mengajar
                            </h3>

                            <div class="space-y-2 md:space-y-4 mb-4 md:mb-8">
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Pendekatan
                                        Pedagogi Lanjutan</span>
                                </div>
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Integrasi
                                        Teknologi</span>
                                </div>
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Praktik
                                        Kelas Inklusif</span>
                                </div>
                            </div>

                            <button
                                class="w-full bg-gray-800 text-white py-2 md:py-4 rounded-xl font-bold text-base md:text-lg hover:bg-gray-900 transform transition duration-300 hover:scale-105 hover:shadow-lg hover:shadow-gray-400/50 active:scale-95 group-hover:bg-opacity-90">
                                Pilih Paket
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Paket C -->
                <div class="card-3d-container">
                    <div
                        class="relative bg-white border-2 border-gray-100 rounded-2xl md:rounded-3xl shadow-xl md:shadow-2xl p-5 md:p-8 transform transition duration-500 hover:scale-105 hover:rotate-1 hover:shadow-gray-400/30 group overflow-hidden">
                        <!-- Subtle Gradient Border -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-gray-100 to-gray-200 opacity-0 group-hover:opacity-50 transition-opacity duration-500 rounded-2xl md:rounded-3xl">
                        </div>

                        <!-- Subtle Glow Effect -->
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-gray-200 to-gray-300 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-50 blur-lg transition-opacity duration-500 group-hover:animate-pulse">
                        </div>

                        <div
                            class="absolute bottom-0 right-0 -mb-3 -mr-3 md:-mb-6 md:-mr-6 w-16 h-16 md:w-24 md:h-24 bg-gray-200 rounded-full opacity-40 group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="absolute top-0 right-0 -mt-2 -mr-2 md:-mt-4 md:-mr-4 w-12 h-12 md:w-20 md:h-20 bg-gray-200 rotate-12 opacity-40 rounded-lg group-hover:rotate-45 transition-transform duration-500">
                            </div>

                            <div class="flex justify-between items-center mb-3 md:mb-6">
                                <h2
                                    class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 transition transform group-hover:translate-x-2">
                                    Paket C
                                </h2>
                                <span
                                    class="bg-gray-100 text-gray-700 px-2 py-1 md:px-4 md:py-2 rounded-full text-xs md:text-sm font-bold shadow-md">Lanjutan</span>
                            </div>

                            <h3
                                class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-700 mb-3 md:mb-6 opacity-90 group-hover:opacity-100 transition">
                                Sertifikasi Penguasaan Mengajar
                            </h3>

                            <div class="space-y-2 md:space-y-4 mb-4 md:mb-8">
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span
                                        class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Kepemimpinan
                                        Pendidikan</span>
                                </div>
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Pengajaran
                                        Berbasis Riset</span>
                                </div>
                                <div
                                    class="flex items-center transform transition group-hover:-translate-x-2 p-1 md:p-2 rounded-lg group-hover:bg-gray-50">
                                    <span class="text-gray-700 mr-2 md:mr-3 text-base md:text-xl">✓</span>
                                    <span
                                        class="text-base md:text-lg lg:text-xl font-medium text-gray-700">Pengembangan
                                        Kurikulum</span>
                                </div>
                            </div>

                            <button
                                class="w-full bg-gray-800 text-white py-2 md:py-4 rounded-xl font-bold text-base md:text-lg hover:bg-gray-900 transform transition duration-300 hover:scale-105 hover:shadow-lg hover:shadow-gray-400/50 active:scale-95 group-hover:bg-opacity-90">
                                Pilih Paket
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            @keyframes float {
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

            .animate-pulse {
                animation: pulse 6s ease-in-out infinite;
            }

            @keyframes pulse {

                0%,
                100% {
                    opacity: 0.3;
                }

                50% {
                    opacity: 0.5;
                }
            }

            .animation-delay-1000 {
                animation-delay: 1s;
            }

            .animation-delay-2000 {
                animation-delay: 2s;
            }

            .animation-delay-3000 {
                animation-delay: 3s;
            }

            .animation-delay-4000 {
                animation-delay: 4s;
            }

            .perspective-1000 {
                perspective: 1000px;
            }

            .card-3d-container {
                transform-style: preserve-3d;
            }

            /* Responsive hover adjustments for touch devices */
            @media (hover: none) {
                .group:hover {
                    transform: none !important;
                    rotate: none !important;
                }

                .group-hover\:translate-x-2:hover,
                .group-hover\:-translate-x-2:hover {
                    transform: none !important;
                }

                .group-hover\:scale-150:hover {
                    transform: none !important;
                }

                .group-hover\:rotate-45:hover {
                    transform: none !important;
                }

                /* Instead, make touch active states for mobile */
                .group:active {
                    transform: scale(0.98) !important;
                }
            }
        </style>
    </section>
    {{-- End Paket TLC --}}

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
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 shadow-xl rounded-3xl border border-blue-100 p-8 mb-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">LEVEL A</h2>
            </div>
            <div class="flex items-center space-x-4">
                <span class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full border border-purple-200 shadow-sm flex items-center">
                    <span class="inline-block w-2 h-2 bg-purple-500 rounded-full mr-2 animate-pulse"></span>
                    Dalam Progres
                </span>
                <button class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 focus:ring-4 focus:ring-blue-200">
                    Nilai
                </button>
            </div>
        </div>

        <p class="text-gray-600 text-base mb-10 text-center sm:text-left max-w-2xl">
            Daftar kategori kuis yang akan anda kerjakan. Selesaikan setiap kategori untuk membuka level berikutnya!
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start gap-3 mb-10">
            <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Semua
            </button>
            <button class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
                Terbuka
            </button>
            <button class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Terkunci
            </button>
        </div>

        <!-- Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Literasi -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="images/levela.png" alt="Literasi" class="w-full h-48 object-cover group-hover:opacity-90 transition">
                    <div class="absolute top-4 right-4 bg-green-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Tersedia
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Literasi</h3>
                    <div class="flex items-center text-yellow-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">25 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                            10 menit
                        </div>
                        <button class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-xl hover:-translate-y-1 flex items-center">
                            Mulai
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Numerasi -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="images/levelb.png" alt="Numerasi" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Numerasi</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">30 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            15 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori Literasi terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PCK -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="images/levelc.png" alt="PCK" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: PCK</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">20 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            20 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori sebelumnya terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HOTS -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="images/buku1.png" alt="HOTS" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: HOTS</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">15 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            25 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori sebelumnya terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End A --}}

    {{-- B --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-white to-blue-50 shadow-xl rounded-3xl border border-blue-100 p-8 mb-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">LEVEL B</h2>
            </div>
            <div class="flex items-center space-x-4">
                <span class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full border border-purple-200 shadow-sm flex items-center">
                    <span class="inline-block w-2 h-2 bg-purple-500 rounded-full mr-2 animate-pulse"></span>
                    Dalam Progres
                </span>
                <button class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 focus:ring-4 focus:ring-blue-200">
                    Nilai
                </button>
            </div>
        </div>

        <p class="text-gray-600 text-base mb-10 text-center sm:text-left max-w-2xl">
            Daftar kategori kuis yang akan anda kerjakan. Selesaikan setiap kategori untuk membuka level berikutnya!
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start gap-3 mb-10">
            <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Semua
            </button>
            <button class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
                Terbuka
            </button>
            <button class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Terkunci
            </button>
        </div>

        <!-- Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Literasi -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="Literasi" class="w-full h-48 object-cover group-hover:opacity-90 transition">
                    <div class="absolute top-4 right-4 bg-green-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Tersedia
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Literasi</h3>
                    <div class="flex items-center text-yellow-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">25 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                            10 menit
                        </div>
                        <button class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-xl hover:-translate-y-1 flex items-center">
                            Mulai
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Numerasi -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="Numerasi" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Numerasi</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">30 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            15 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori Literasi terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PCK -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="PCK" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: PCK</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">20 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            20 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori sebelumnya terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HOTS -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="HOTS" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: HOTS</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">15 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            25 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori sebelumnya terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End B --}}

    {{-- C --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-white to-blue-50 shadow-xl rounded-3xl border border-blue-100 p-8 mb-10">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">LEVEL C</h2>
            </div>
            <div class="flex items-center space-x-4">
                <span class="px-4 py-2 bg-purple-100 text-purple-700 font-medium rounded-full border border-purple-200 shadow-sm flex items-center">
                    <span class="inline-block w-2 h-2 bg-purple-500 rounded-full mr-2 animate-pulse"></span>
                    Dalam Progres
                </span>
                <button class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 focus:ring-4 focus:ring-blue-200">
                    Nilai
                </button>
            </div>
        </div>

        <p class="text-gray-600 text-base mb-10 text-center sm:text-left max-w-2xl">
            Daftar kategori kuis yang akan anda kerjakan. Selesaikan setiap kategori untuk membuka level berikutnya!
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start gap-3 mb-10">
            <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Semua
            </button>
            <button class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
                Terbuka
            </button>
            <button class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg hover:-translate-y-1 active:translate-y-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Terkunci
            </button>
        </div>

        <!-- Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Literasi -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="Literasi" class="w-full h-48 object-cover group-hover:opacity-90 transition">
                    <div class="absolute top-4 right-4 bg-green-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Tersedia
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Literasi</h3>
                    <div class="flex items-center text-yellow-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">25 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                            10 menit
                        </div>
                        <button class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-xl hover:-translate-y-1 flex items-center">
                            Mulai
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Numerasi -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="Numerasi" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Numerasi</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">30 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            15 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori Literasi terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PCK -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="PCK" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: PCK</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">20 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            20 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori sebelumnya terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HOTS -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:scale-105 hover:shadow-xl group">
                <div class="relative">
                    <img src="/api/placeholder/400/320" alt="HOTS" class="w-full h-48 object-cover group-hover:opacity-90 transition filter grayscale">
                    <div class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
                </div>
                <div class="p-6 relative">
                    <div class="absolute -top-10 left-6 bg-gray-500 text-white p-3 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: HOTS</h3>
                    <div class="flex items-center text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">15 soal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <span class="inline-block w-2 h-2 bg-gray-500 rounded-full mr-1"></span>
                            25 menit
                        </div>
                        <div class="relative group">
                            <button class="px-5 py-2 bg-gray-400 text-gray-700 rounded-xl text-sm font-medium shadow-sm flex items-center cursor-not-allowed">
                                Terkunci
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </button>
                            <div class="absolute bottom-full left-0 mb-2 w-48 bg-gray-800 text-white text-xs rounded-lg py-2 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Selesaikan kategori sebelumnya terlebih dahulu
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End C --}}

    
</body>

</html>
