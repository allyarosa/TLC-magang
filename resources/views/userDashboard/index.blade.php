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


    {{-- Tampilan Home --}}
    <main id="home" class="w-full px-5 py-12 bg-white text-gray-900 transition-all duration-500">
        <div class="container mx-auto max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 items-center gap-8">
                <div class="lg:col-span-7 p-5 text-center lg:text-left">
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-snug text-gray-800 transition-transform duration-300 hover:scale-105">
                        Teaching and Learning Certification (TLC)
                        <span class="text-[#F4A261] block lg:inline">Program Sesuai Jenjang Paket</span>
                    </h1>
                    <p
                        class="text-base sm:text-lg text-gray-700 mt-4 transition-opacity duration-300 hover:opacity-80">
                        Memberdayakan pendidik dengan pengetahuan, <span class="font-bold">keterampilan,</span> dan
                        alat
                        untuk berkembang <span class="font-bold">dalam pendidikan masa kini.</span>.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start my-6 gap-4">
                        <a href="#"
                            class="bg-[#F4A261] text-white px-6 py-3 rounded-xl shadow-md text-lg font-semibold hover:bg-[#E76F51] transition-transform duration-300 hover:scale-110 active:scale-95 text-center">
                            Daftar Sekarang
                        </a>
                        <a href="#"
                            class="bg-gray-100 text-gray-900 px-6 py-3 rounded-xl shadow-md text-lg font-semibold hover:bg-gray-200 transition-transform duration-300 hover:scale-110 active:scale-95 text-center">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start mt-6 gap-4">
                        <div class="flex -space-x-2 overflow-hidden">
                            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white hover:scale-110 transition-transform duration-300"
                                src="images/hamas.png" alt="User 1">
                            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white hover:scale-110 transition-transform duration-300"
                                src="images/aliando.jpg" alt="User 2">
                            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white hover:scale-110 transition-transform duration-300"
                                src="images/guru.png" alt="User 3">
                        </div>
                        <div class="text-center sm:text-left">
                            <p class="text-lg font-bold text-gray-800">4.9</p>
                            <div class="flex justify-center sm:justify-start text-[#F4A261]">
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                                <span class="hover:scale-125 transition-transform duration-300">&#9733;</span>
                            </div>
                            <p class="text-sm text-gray-600">Dipercaya oleh 25 ribu++ siswa</p>
                        </div>
                    </div>
                </div>
                <div
                    class="lg:col-span-5 w-full rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition-transform duration-500">
                    <iframe class="w-full h-64 sm:h-80 md:h-[400px] lg:h-[500px] rounded-xl"
                        src="https://www.youtube.com/embed/Jn7vuXLozJI?autoplay=1&mute=1" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </main>
    {{-- End Tampilan Home --}}

    {{-- Apa yang akan Guru Dapatkan? --}}
    <section class="max-w-7xl mx-auto px-6 sm:px-8 py-16 sm:py-20 bg-white">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-10 mb-14">
            <div class="md:w-1/3 text-center md:text-left">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight text-gray-800">
                    Apa yang akan Guru Dapatkan?
                </h2>
            </div>

            <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Box 1 -->
                <div
                    class="flex items-start bg-white p-6 rounded-2xl hover:shadow-xl hover:-translate-y-2 transition-all duration-500 border border-purple-200 cursor-pointer group">
                    <div
                        class="bg-purple-500 p-3 rounded-full mr-4 shadow-md group-hover:scale-110 transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v1m0 14v1m8-8h1M4 12H3m15.364-6.364l.707.707M6.343 17.657l-.707.707m12.728 0l.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-2 text-purple-600 group-hover:text-purple-700">
                            3 Event (Semnas, Praktik Baik, Diknas 32JP)
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            3 Event Guru dapatkan setiap bulannya, untuk pengembangan diri guru.
                        </p>
                    </div>
                </div>

                <!-- Box 2 -->
                <div
                    class="flex items-start bg-white p-6 rounded-2xl hover:shadow-xl hover:-translate-y-2 transition-all duration-500 border border-blue-200 cursor-pointer group">
                    <div
                        class="bg-blue-500 p-3 rounded-full mr-4 shadow-md group-hover:scale-110 transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h16M4 18h16M4 12h8" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-2 text-blue-600 group-hover:text-blue-700">Rekaman Sesi
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Akses rekaman pelatihan jika tidak bisa hadir langsung.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Box Bawah -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Box 3 -->
            <div
                class="flex items-start bg-white p-6 rounded-2xl hover:shadow-xl hover:-translate-y-2 transition-all duration-500 border border-orange-200 cursor-pointer group">
                <div
                    class="bg-orange-500 p-3 rounded-full mr-4 shadow-md group-hover:scale-110 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5V4H2v16h5m10 0V4m-6 4h.01M12 16h.01M8 12h.01M16 12h.01" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-2 text-orange-600 group-hover:text-orange-700">Relasi Guru
                        Indonesia</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Ribuan guru tergabung dengan kami, dapatkan relasi dari seluruh Indonesia.
                    </p>
                </div>
            </div>

            <!-- Box 4 -->
            <div
                class="flex items-start bg-white p-6 rounded-2xl hover:shadow-xl hover:-translate-y-2 transition-all duration-500 border border-yellow-200 cursor-pointer group">
                <div
                    class="bg-yellow-500 p-3 rounded-full mr-4 shadow-md group-hover:scale-110 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-2 text-yellow-600 group-hover:text-yellow-700">KTA Member TLC
                        Program</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Anggota mendapatkan identitas berupa Kartu Digital.
                    </p>
                </div>
            </div>

            <!-- Box 5 -->
            <div
                class="flex items-start bg-white p-6 rounded-2xl hover:shadow-xl hover:-translate-y-2 transition-all duration-500 border border-green-200 cursor-pointer group">
                <div
                    class="bg-green-500 p-3 rounded-full mr-4 shadow-md group-hover:scale-110 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 1.343-3 3 0 .795.312 1.519.818 2.049L12 18l2.182-4.951A2.993 2.993 0 0015 11c0-1.657-1.343-3-3-3z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-2 text-green-600 group-hover:text-green-700">Sertifikasi Resmi
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Diakui oleh lembaga pendidikan terpercaya.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- End guru dapatkan --}}

    {{-- Alur Pendaftaraan --}}
    <section class="relative w-full px-5 py-16 overflow-hidden">
        <div class="max-w-6xl mx-auto relative">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4 animate__animated animate__fadeInDown">
                    Segera Daftarkan Diri Anda Di TLC
                </h2>
                <p class="text-gray-600 text-md max-w-2xl mx-auto animate__animated animate__fadeIn">
                    Berikut Ini Langkah Mudah Pendaftaran Teaching & Learning Certification
                </p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#4DB5D9]/10 to-[#4DB5D9]/20 rounded-3xl blur-2xl">
                </div>

                <div class="relative z-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="group">
                        <div class="relative">
                            <div
                                class="absolute -inset-2 bg-[#4DB5D9]/20 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out blur-lg">
                            </div>
                            <div
                                class="relative z-10 w-28 h-28 md:w-36 md:h-36 mx-auto bg-white shadow-2xl border-4 border-[#4DB5D9] rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl">
                                <span
                                    class="text-5xl md:text-6xl font-bold text-[#4DB5D9] transition-all duration-300 group-hover:text-7xl">1</span>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <h3
                                class="text-lg md:text-xl font-bold text-[#4DB5D9] mb-3 group-hover:text-[#4DB5D9]/80 transition-colors">
                                Daftar Akun</h3>
                            <p
                                class="text-gray-600 px-4 group-hover:text-gray-800 transition-colors text-sm md:text-base">
                                Lakukan registrasi akun lalu lengkapi profil dan lakukan pemesanan Paket.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="group">
                        <div class="relative">
                            <div
                                class="absolute -inset-2 bg-[#4DB5D9]/20 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out blur-lg">
                            </div>
                            <div
                                class="relative z-10 w-28 h-28 md:w-36 md:h-36 mx-auto bg-white shadow-2xl border-4 border-[#4DB5D9] rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl">
                                <span
                                    class="text-5xl md:text-6xl font-bold text-[#4DB5D9] transition-all duration-300 group-hover:text-7xl">2</span>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <h3
                                class="text-lg md:text-xl font-bold text-[#4DB5D9] mb-3 group-hover:text-[#4DB5D9]/80 transition-colors">
                                Konfirmasi</h3>
                            <p
                                class="text-gray-600 px-4 group-hover:text-gray-800 transition-colors text-sm md:text-base">
                                Admin TLC akan menghubungi kamu dan proses pemesanan kamu.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="group">
                        <div class="relative">
                            <div
                                class="absolute -inset-2 bg-[#4DB5D9]/20 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out blur-lg">
                            </div>
                            <div
                                class="relative z-10 w-28 h-28 md:w-36 md:h-36 mx-auto bg-white shadow-2xl border-4 border-[#4DB5D9] rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl">
                                <span
                                    class="text-5xl md:text-6xl font-bold text-[#4DB5D9] transition-all duration-300 group-hover:text-7xl">3</span>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <h3
                                class="text-lg md:text-xl font-bold text-[#4DB5D9] mb-3 group-hover:text-[#4DB5D9]/80 transition-colors">
                                Pilih Paket</h3>
                            <p
                                class="text-gray-600 px-4 group-hover:text-gray-800 transition-colors text-sm md:text-base">
                                Admin TLC akan menginformasikan ke kamu jika sudah ada pilih yang dapat.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Garis lengkung -->
                <svg class="hidden md:block absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full z-0"
                    viewBox="0 0 1200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 100C100 100 300 50 600 100C900 150 1100 100 1100 100" stroke="#4DB5D9"
                        stroke-width="4" stroke-linecap="round" class="animate__animated animate__fadeIn">
                    </path>
                </svg>
            </div>

            <div class="text-center mt-16">
                <button
                    class="px-8 py-3 bg-[#4DB5D9] text-white text-lg font-semibold rounded-full transform transition-all duration-300 hover:scale-105 hover:bg-[#4DB5D9]/90 active:scale-95 shadow-xl hover:shadow-2xl">
                    Pesan Sekarang
                </button>
            </div>

            <div class="text-center mt-8 text-sm text-gray-500 italic animate__animated animate__fadeIn">
                Pendaftaran terbuka setiap saat paling lambat 2 hari sebelum program dimulai
            </div>
        </div>

        <script>
            document.querySelectorAll('.group').forEach(group => {
                group.addEventListener('mouseenter', () => {
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
    <section class="w-full py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Animated Header -->
            <div class="relative mb-12">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-sky-200 to-cyan-200 rounded-xl blur-lg opacity-75 animate-pulse">
                </div>
                <div class="relative bg-white/90 backdrop-blur-sm rounded-xl p-4 sm:p-6 shadow-2xl">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <h2
                            class="text-2xl sm:text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-sky-600 to-cyan-600 tracking-tight">
                            Teaching & Learning Certification
                        </h2>
                        <a href="#"
                            class="group flex items-center text-blue-600 hover:text-blue-800 transition-all duration-300 transform hover:scale-105">
                            <span class="text-base sm:text-xl font-bold mr-2 sm:mr-3 tracking-wide">Explore All</span>
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-all">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Category Buttons -->
            <div class="flex flex-wrap justify-center gap-4 sm:gap-6 mb-12">
                <button
                    class="px-6 sm:px-8 py-2 sm:py-3 bg-white text-blue-800 rounded-full shadow-xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 transform hover:scale-105 relative overflow-hidden text-sm sm:text-base">
                    <span class="relative z-10">PAKET A</span>
                    <span
                        class="absolute inset-0 bg-blue-100 opacity-0 hover:opacity-20 transition-all duration-300"></span>
                </button>
                <button
                    class="px-6 sm:px-8 py-2 sm:py-3 bg-white text-cyan-800 rounded-full shadow-xl border-2 border-cyan-200 hover:border-cyan-400 transition-all duration-300 transform hover:scale-105 relative overflow-hidden text-sm sm:text-base">
                    <span class="relative z-10">PAKET B</span>
                    <span
                        class="absolute inset-0 bg-cyan-100 opacity-0 hover:opacity-20 transition-all duration-300"></span>
                </button>
                <button
                    class="px-6 sm:px-8 py-2 sm:py-3 bg-white text-sky-800 rounded-full shadow-xl border-2 border-sky-200 hover:border-sky-400 transition-all duration-300 transform hover:scale-105 relative overflow-hidden text-sm sm:text-base">
                    <span class="relative z-10">PAKET C</span>
                    <span
                        class="absolute inset-0 bg-sky-100 opacity-0 hover:opacity-20 transition-all duration-300"></span>
                </button>
            </div>

            <!-- Course Cards -->
            <div
                class="flex space-x-6 sm:space-x-8 overflow-x-auto pb-6 sm:pb-10 px-2 sm:px-4 course-scroll snap-x snap-mandatory">
                <!-- CARD TEMPLATE (Repeat for each card) -->
                <div
                    class="min-w-[85%] sm:min-w-[22rem] md:min-w-[24rem] bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-blue-100 hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 relative snap-start">
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-sky-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Popular
                        </span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70 opacity-75"></div>
                        <img src="images/buku1.png" class="w-full h-48 sm:h-64 object-cover" alt="Course Image">
                    </div>
                    <div class="p-4 sm:p-6 -mt-12 sm:-mt-16 relative z-20">
                        <h3
                            class="text-lg sm:text-2xl font-bold text-[#1D2659] mb-2 sm:mb-3 drop-shadow-sm bg-white/70 px-2 py-1 rounded-lg inline-block">
                            Mengajar efektif menggunakan PCK
                        </h3>
                        <div class="flex items-center mb-3 sm:mb-4">
                            <img src="images/hamas.png"
                                class="w-10 h-10 sm:w-14 sm:h-14 rounded-full mr-3 sm:mr-4 border-3 border-white shadow-lg"
                                alt="Instructor">
                            <div>
                                <p
                                    class="font-semibold text-[#1D2659] text-sm sm:text-lg drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block">
                                    Meutia Azzura</p>
                                <p
                                    class="text-gray-700 text-xs sm:text-sm drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block mt-1">
                                    Content Writer</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-yellow-500">
                                <span class="text-xl sm:text-3xl">★★★★★</span>
                                <span
                                    class="ml-2 sm:ml-3 text-[#1D2659] font-bold text-sm sm:text-lg bg-white/70 px-2 py-0.5 rounded-lg">4.9</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div
                    class="min-w-[85%] sm:min-w-[22rem] md:min-w-[24rem] bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-cyan-100 hover:border-cyan-300 transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 relative snap-start">
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-cyan-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Best Seller
                        </span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70 opacity-75"></div>
                        <img src="images/buku2.png" class="w-full h-48 sm:h-64 object-cover" alt="Course Image">
                    </div>
                    <div class="p-4 sm:p-6 -mt-12 sm:-mt-16 relative z-20">
                        <h3
                            class="text-lg sm:text-2xl font-bold text-[#1D2659] mb-2 sm:mb-3 drop-shadow-sm bg-white/70 px-2 py-1 rounded-lg inline-block">
                            Merancang kemampuan berpikir kritis dalam pengajaran
                        </h3>
                        <div class="flex items-center mb-3 sm:mb-4">
                            <img src="images/hamas.png"
                                class="w-10 h-10 sm:w-14 sm:h-14 rounded-full mr-3 sm:mr-4 border-3 border-white shadow-lg"
                                alt="Instructor">
                            <div>
                                <p
                                    class="font-semibold text-[#1D2659] text-sm sm:text-lg drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block">
                                    Carissa Mashinta</p>
                                <p
                                    class="text-gray-700 text-xs sm:text-sm drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block mt-1">
                                    E-Commerce Manager</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-yellow-500">
                                <span class="text-xl sm:text-3xl">★★★★★</span>
                                <span
                                    class="ml-2 sm:ml-3 text-[#1D2659] font-bold text-sm sm:text-lg bg-white/70 px-2 py-0.5 rounded-lg">5.0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div
                    class="min-w-[85%] sm:min-w-[22rem] md:min-w-[24rem] bg-white rounded-3xl overflow-hidden shadow-2xl border-4 border-sky-100 hover:border-sky-300 transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 relative snap-start">
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-sky-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            Trending
                        </span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/70 opacity-75"></div>
                        <img src="images/buku3.png" class="w-full h-48 sm:h-64 object-cover" alt="Course Image">
                    </div>
                    <div class="p-4 sm:p-6 -mt-12 sm:-mt-16 relative z-20">
                        <h3
                            class="text-lg sm:text-2xl font-bold text-[#1D2659] mb-2 sm:mb-3 drop-shadow-sm bg-white/70 px-2 py-1 rounded-lg inline-block">
                            Pengetahuan pembuatan modul ajar
                        </h3>
                        <div class="flex items-center mb-3 sm:mb-4">
                            <img src="images/hamas.png"
                                class="w-10 h-10 sm:w-14 sm:h-14 rounded-full mr-3 sm:mr-4 border-3 border-white shadow-lg"
                                alt="Instructor">
                            <div>
                                <p
                                    class="font-semibold text-[#1D2659] text-sm sm:text-lg drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block">
                                    Rizky Pratama</p>
                                <p
                                    class="text-gray-700 text-xs sm:text-sm drop-shadow-sm bg-white/70 px-2 py-0.5 rounded-lg inline-block mt-1">
                                    Marketing Strategist</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-yellow-500">
                                <span class="text-xl sm:text-3xl">★★★★★</span>
                                <span
                                    class="ml-2 sm:ml-3 text-[#1D2659] font-bold text-sm sm:text-lg bg-white/70 px-2 py-0.5 rounded-lg">4.7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Scrollbar -->
        <style>
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
        <!-- Background Texture -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div
                class="absolute top-0 right-0 w-72 h-72 md:w-96 md:h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl">
            </div>
            <div
                class="absolute bottom-0 left-0 w-72 h-72 md:w-96 md:h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <!-- Left Section -->
                <div class="text-blue-900 space-y-6 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">
                        Perluas Wawasan
                        <span class="block text-blue-700">Bersama TLC di Bidangnya</span>
                    </h2>
                    <p class="text-blue-800 text-base md:text-lg">
                        Dapatkan insight dan pengetahuan terbaru dari para ahli profesional melalui webinar eksklusif
                        kami.
                    </p>
                    <img src="https://cdn-web-2.ruangguru.com/file-uploader/lp/84af667f-a64d-45bb-97e9-48b3686737ca.png"
                        alt="Webinar Illustration"
                        class="w-full max-w-xs md:max-w-md mx-auto md:mx-0 transform hover:scale-105 transition duration-300 rounded-lg">
                </div>

                <!-- Right Section: Slider -->
                <div>
                    <div id="webinar-slider" class="slider-container relative overflow-hidden">
                        <div
                            class="slider-wrapper flex transition-transform duration-500 ease-in-out w-[300%] md:w-auto">
                            <!-- Slides -->
                            <div class="slide flex-shrink-0 w-full md:w-96 px-4">
                                <div
                                    class="bg-white rounded-2xl shadow-lg border border-blue-100 transition hover:scale-105 hover:shadow-xl">
                                    <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/a4199388-54ae-4637-a6b5-b6499829ed57.png"
                                        alt="Webinar 1" class="w-full h-48 md:h-64 object-cover rounded-t-2xl">
                                    <div class="p-6">
                                        <h3 class="text-lg md:text-xl font-bold text-blue-900 mb-3">Building
                                            Psychological Safety</h3>
                                        <div class="space-y-2 text-blue-800 mb-4 text-sm md:text-base">
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
                                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.02] active:scale-[0.98]">Lihat
                                            Detail</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="slide flex-shrink-0 w-full md:w-96 px-4">
                                <div
                                    class="bg-white rounded-2xl shadow-lg border border-blue-100 transition hover:scale-105 hover:shadow-xl">
                                    <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/hs/05%20-%20RGFB/Webinar/Banner/banner-webinar-11-talent-assessment-development.jpeg"
                                        alt="Webinar 2" class="w-full h-48 md:h-64 object-cover rounded-t-2xl">
                                    <div class="p-6">
                                        <h3 class="text-lg md:text-xl font-bold text-blue-900 mb-3">Developing Talents
                                            through Assessment</h3>
                                        <div class="space-y-2 text-blue-800 mb-4 text-sm md:text-base">
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
                                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.02] active:scale-[0.98]">Lihat
                                            Detail</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="slide flex-shrink-0 w-full md:w-96 px-4">
                                <div
                                    class="bg-white rounded-2xl shadow-lg border border-blue-100 transition hover:scale-105 hover:shadow-xl">
                                    <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/hs/Webinar-Ayung-Prasetyo-Landing-Page-1000x524.png"
                                        alt="Webinar 3" class="w-full h-48 md:h-64 object-cover rounded-t-2xl">
                                    <div class="p-6">
                                        <h3 class="text-lg md:text-xl font-bold text-blue-900 mb-3">Increasing Talent
                                            Capability</h3>
                                        <div class="space-y-2 text-blue-800 mb-4 text-sm md:text-base">
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
                                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.02] active:scale-[0.98]">Lihat
                                            Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Indicators -->
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

                    <!-- Navigation -->
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

            <!-- Lihat Semua -->
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

        <!-- Script -->
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
                    const slideWidth = slides[0].offsetWidth;
                    sliderWrapper.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
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

                function nextSlide() {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    updateSlider();
                }

                function prevSlide() {
                    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                    updateSlider();
                }

                indicators.forEach((indicator) => {
                    indicator.addEventListener('click', () => {
                        currentSlide = parseInt(indicator.dataset.slide);
                        updateSlider();
                    });
                });

                nextButton.addEventListener('click', nextSlide);
                prevButton.addEventListener('click', prevSlide);

                // Auto slide
                setInterval(nextSlide, 5000);
                updateSlider();

                window.addEventListener('resize', updateSlider);

                // Swipe for mobile
                let startX = 0;
                slider.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                });
                slider.addEventListener('touchend', (e) => {
                    let endX = e.changedTouches[0].clientX;
                    if (startX - endX > 50) nextSlide();
                    if (endX - startX > 50) prevSlide();
                });
            });
        </script>
    </section>
    <!-- End Webiner -->

    {{-- Testimoni --}}
    <section class="container mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h2
                class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r to-sky-600 animate-pulse">
                Testimoni Mereka
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                Dengarkan pengalaman inspiratif dari para peserta kami
            </p>
        </div>

        <div id="testimonialCarousel" class="relative overflow-hidden">
            <div id="testimonialTrack" class="flex gap-4 md:gap-8 transition-transform duration-500 ease-in-out">

                <!-- Maharani -->
                <div class="testimonial-slide w-64 md:w-72 flex-shrink-0 text-center mx-auto">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Maharani"
                            class="rounded-full w-24 md:w-32 h-24 md:h-32 object-cover border-4 border-pink-200">
                    </div>
                    <div
                        class="bg-gradient-to-br from-pink-100 to-pink-200 rounded-3xl p-4 md:p-6 mb-4 relative shadow-lg group hover:shadow-2xl transition-all">
                        <span class="absolute top-0 left-4 text-5xl md:text-6xl text-pink-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm md:text-base italic z-10 relative px-2 md:px-4">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya
                            lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari sesama pendidik
                            di seluruh
                            Indonesia."
                        </p>
                        <span class="absolute bottom-0 right-4 text-5xl md:text-6xl text-pink-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-lg md:text-xl text-pink-700 animate-float">Maharani</h3>
                    <p class="text-sm text-gray-600">Ranger (15-18 tahun)</p>
                </div>

                <!-- Meilinda -->
                <div class="testimonial-slide w-64 md:w-72 flex-shrink-0 text-center mx-auto">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Meilinda"
                            class="rounded-full w-24 md:w-32 h-24 md:h-32 object-cover border-4 border-blue-200">
                    </div>
                    <div
                        class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-3xl p-4 md:p-6 mb-4 relative shadow-lg group hover:shadow-2xl transition-all">
                        <span class="absolute top-0 left-4 text-5xl md:text-6xl text-blue-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm md:text-base italic z-10 relative px-2 md:px-4">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya
                            lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari sesama pendidik
                            di seluruh
                            Indonesia."
                        </p>
                        <span class="absolute bottom-0 right-4 text-5xl md:text-6xl text-blue-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-lg md:text-xl text-blue-700 animate-float">Meilinda</h3>
                    <p class="text-sm text-gray-600">Explorer (di atas 18 tahun)</p>
                </div>

                <!-- Keenar -->
                <div class="testimonial-slide w-64 md:w-72 flex-shrink-0 text-center mx-auto">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Keenar"
                            class="rounded-full w-24 md:w-32 h-24 md:h-32 object-cover border-4 border-green-200">
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-100 to-green-200 rounded-3xl p-4 md:p-6 mb-4 relative shadow-lg group hover:shadow-2xl transition-all">
                        <span class="absolute top-0 left-4 text-5xl md:text-6xl text-green-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm md:text-base italic z-10 relative px-2 md:px-4">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya
                            lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari sesama pendidik
                            di seluruh
                            Indonesia."
                        </p>
                        <span class="absolute bottom-0 right-4 text-5xl md:text-6xl text-green-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-lg md:text-xl text-green-700 animate-float">Keenar</h3>
                    <p class="text-sm text-gray-600">Runner (7-10 tahun)</p>
                </div>

                <!-- Nandini -->
                <div class="testimonial-slide w-64 md:w-72 flex-shrink-0 text-center mx-auto">
                    <div class="flex justify-center mb-4">
                        <img src="images/konten_satu.jpg" alt="Nandini"
                            class="rounded-full w-24 md:w-32 h-24 md:h-32 object-cover border-4 border-purple-200">
                    </div>
                    <div
                        class="bg-gradient-to-br from-purple-100 to-purple-200 rounded-3xl p-4 md:p-6 mb-4 relative shadow-lg group hover:shadow-2xl transition-all">
                        <span class="absolute top-0 left-4 text-5xl md:text-6xl text-purple-300 opacity-50">"</span>
                        <p class="text-gray-800 text-sm md:text-base italic z-10 relative px-2 md:px-4">
                            "Setelah mengikuti program TLC, saya memiliki lebih banyak teknik dan strategi untuk membuat
                            kelas saya
                            lebih interaktif. Saya juga mendapatkan jaringan profesional yang luas dari sesama pendidik
                            di seluruh
                            Indonesia."
                        </p>
                        <span
                            class="absolute bottom-0 right-4 text-5xl md:text-6xl text-purple-300 opacity-50">"</span>
                    </div>
                    <h3 class="font-bold text-lg md:text-xl text-purple-700 animate-float">Nandini</h3>
                    <p class="text-sm text-gray-600">Explorer (di atas 18 tahun)</p>
                </div>

            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const track = document.getElementById('testimonialTrack');
                const slides = document.querySelectorAll('.testimonial-slide');
                let currentIndex = 0;

                function getSlideWidth() {
                    return slides[0].offsetWidth + 16; // width + gap
                }

                function goToSlide(index) {
                    track.style.transform = `translateX(-${index * getSlideWidth()}px)`;
                }

                function autoScroll() {
                    currentIndex++;
                    if (currentIndex >= slides.length) {
                        currentIndex = 0;
                    }
                    goToSlide(currentIndex);
                }

                let interval = setInterval(autoScroll, 5000);

                // Swipe
                let startX = 0;
                let isDragging = false;

                track.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                    isDragging = true;
                    clearInterval(interval);
                });

                track.addEventListener('touchmove', (e) => {
                    if (!isDragging) return;
                    const currentX = e.touches[0].clientX;
                    const diff = startX - currentX;
                    if (diff > 50) {
                        currentIndex++;
                        if (currentIndex >= slides.length) currentIndex = 0;
                        goToSlide(currentIndex);
                        isDragging = false;
                    } else if (diff < -50) {
                        currentIndex--;
                        if (currentIndex < 0) currentIndex = slides.length - 1;
                        goToSlide(currentIndex);
                        isDragging = false;
                    }
                });

                track.addEventListener('touchend', () => {
                    isDragging = false;
                    interval = setInterval(autoScroll, 5000);
                });

                window.addEventListener('resize', () => {
                    goToSlide(currentIndex);
                });
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

            .animate-float {
                animation: float 3s ease-in-out infinite;
            }
        </style>
    </section>
    {{-- End Testimoni --}}

    {{-- Logo Universitas --}}
    <section class="w-full px-6 md:px-10 py-16 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-16">
            <!-- Left Side -->
            <div class="md:w-1/2 text-center md:text-left">
                <h2
                    class="text-3xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">
                    Pengajar <span class="text-cyan-500">TLC</span><br>dari <span
                        class="font-bold">Perguruan
                        Tinggi terbaik</span>
                </h2>
                <p class="text-gray-600 mt-4 text-base md:text-lg leading-relaxed">
                    Pengajar telah lulus seleksi akademik dan berpengalaman, berasal dari berbagai lulusan Universitas
                    terbaik di
                    Indonesia maupun di Luar Negeri seperti:
                </p>

                <!-- School Logos Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
                    <!-- Looped logos -->
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-red-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/umbjm.jpg" alt="Universitas Airlangga" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-indigo-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/ulm.jpg" alt="Universitas Indonesia" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/poliban.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/uniska.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/ui.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/airlangga.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/unesa.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/uny.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/ponogoro.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/hasnur.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/itb.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/brawijaya.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="md:w-1/2 text-center md:text-left flex flex-col justify-between gap-10">
                <!-- University Logos Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-red-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/ui.jpg" alt="Universitas Airlangga" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-indigo-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/ugm.jpg" alt="Universitas Indonesia" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/brawijaya.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/airlangga.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/umbjm.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/hasnur.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/itb.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-pink-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/poliban.jpg" alt="UGM" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-indigo-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/ponogoro.jpg" alt="Universitas Indonesia" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-indigo-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/ulm.jpg" alt="Universitas Indonesia" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-indigo-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/uin.jpg" alt="Universitas Indonesia" class="h-16 md:h-20">
                    </div>
                    <div
                        class="flex justify-center items-center transition duration-300 hover:scale-105 active:scale-95 hover:bg-indigo-100 p-3 rounded-lg shadow-md hover:shadow-xl">
                        <img src="images/uny.jpg" alt="Universitas Indonesia" class="h-16 md:h-20">
                    </div>
                </div>

                <div>
                    <h2
                        class="text-3xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mt-8 md:mt-10">
                        Sekolah dari Siswa<br>Terdaftar di <span class="text-cyan-500">TLC</span>
                    </h2>
                    <p class="text-gray-600 mt-4 text-base md:text-lg leading-relaxed">
                        Fun Teacher Private sudah mengajar siswa dari berbagai sekolah seperti:
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- End Logo Universitas --}}

    {{-- Vidio Keseruan TLC --}}
    <section class="max-w-7xl mx-auto px-4 md:px-8 py-20 bg-white relative overflow-hidden">
        <!-- Heading -->
        <div class="max-w-4xl mx-auto text-center mb-14 relative z-10">
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-800 leading-tight mb-6">
                Tonton Keseruan di
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-sky-500">
                    TLC Program
                </span>
            </h2>
            <p class="text-lg md:text-xl text-gray-700 font-medium max-w-2xl mx-auto">
                Saksikan pengalaman luar biasa dan momen tak terlupakan!
            </p>
        </div>

        <!-- Carousel -->
        <div class="relative group">
            <div id="testimonialContainer"
                class="flex gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-6 md:pb-8 no-scrollbar items-center px-2 md:px-4">
                <!-- Video 1 -->
                <div
                    class="flex-shrink-0 w-[85%] sm:w-[350px] md:w-[450px] h-[200px] sm:h-[280px] md:h-[350px] snap-center transform transition-transform duration-500 hover:scale-105 hover:shadow-2xl hover:ring-4 hover:ring-purple-400 hover:ring-opacity-50 rounded-2xl md:rounded-3xl overflow-hidden shadow-xl">
                    <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/Jn7vuXLozJI"
                        frameborder="0" allowfullscreen></iframe>
                </div>

                <!-- Video 2 -->
                <div
                    class="flex-shrink-0 w-[85%] sm:w-[350px] md:w-[450px] h-[200px] sm:h-[280px] md:h-[350px] snap-center transform transition-transform duration-500 hover:scale-105 hover:shadow-2xl hover:ring-4 hover:ring-purple-400 hover:ring-opacity-50 rounded-2xl md:rounded-3xl overflow-hidden shadow-xl">
                    <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/Jn7vuXLozJI"
                        frameborder="0" allowfullscreen></iframe>
                </div>

                <!-- Video 3 -->
                <div
                    class="flex-shrink-0 w-[85%] sm:w-[350px] md:w-[450px] h-[200px] sm:h-[280px] md:h-[350px] snap-center transform transition-transform duration-500 hover:scale-105 hover:shadow-2xl hover:ring-4 hover:ring-purple-400 hover:ring-opacity-50 rounded-2xl md:rounded-3xl overflow-hidden shadow-xl">
                    <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/Jn7vuXLozJI"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Navigasi Button -->
            <div class="hidden md:flex absolute inset-y-0 w-full justify-between items-center px-4">
                <button id="prevBtn"
                    class="bg-white/70 hover:bg-white/90 rounded-full p-3 shadow-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-gray-800"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextBtn"
                    class="bg-white/70 hover:bg-white/90 rounded-full p-3 shadow-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-gray-800"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Auto Scroll Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const container = document.getElementById("testimonialContainer");
                const prevBtn = document.getElementById("prevBtn");
                const nextBtn = document.getElementById("nextBtn");
                let autoScroll;

                function startAutoScroll() {
                    autoScroll = setInterval(() => {
                        container.scrollBy({
                            left: container.offsetWidth * 0.9,
                            behavior: "smooth"
                        });
                        if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 5) {
                            container.scrollTo({
                                left: 0,
                                behavior: "smooth"
                            });
                        }
                    }, 3500);
                }

                function stopAutoScroll() {
                    clearInterval(autoScroll);
                }

                nextBtn.addEventListener("click", () => {
                    stopAutoScroll();
                    container.scrollBy({
                        left: container.offsetWidth * 0.9,
                        behavior: "smooth"
                    });
                    startAutoScroll();
                });

                prevBtn.addEventListener("click", () => {
                    stopAutoScroll();
                    container.scrollBy({
                        left: -container.offsetWidth * 0.9,
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
    <section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
        <!-- Title -->
        <div class="flex flex-col md:flex-row items-center md:space-x-4 mb-8">
            <h2 class="text-white bg-black px-4 py-2 text-xs md:text-sm font-bold tracking-widest mb-4 md:mb-0">PUSAT
                INFORMASI</h2>
            <div class="flex-grow border-t border-black w-full md:w-auto"></div>
        </div>

        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card -->
            <div
                class="relative group overflow-hidden rounded-xl shadow-lg cursor-pointer transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="images/levela.png" alt="Level A"
                    class="w-full h-52 sm:h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-opacity-50 flex flex-col justify-end p-4 transition-all duration-500 group-hover:bg-opacity-70">
                    <h3
                        class="text-white text-lg md:text-2xl font-bold mb-2 leading-tight translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Sertifikasi Level A</h3>
                    <p
                        class="text-white text-xs md:text-sm mb-3 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">
                        Informasi Sertifikasi Dasar Pengajaran Efektif</p>
                    <button
                        class="bg-white text-black px-4 md:px-6 py-2 text-xs md:text-sm rounded translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">Baca
                        selengkapnya</button>
                </div>
            </div>

            <!-- Card -->
            <div
                class="relative group overflow-hidden rounded-xl shadow-lg cursor-pointer transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="images/levelb.png" alt="Level B"
                    class="w-full h-52 sm:h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-opacity-50 flex flex-col justify-end p-4 transition-all duration-500 group-hover:bg-opacity-70">
                    <h3
                        class="text-white text-lg md:text-2xl font-bold mb-2 leading-tight translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Sertifikasi Level B</h3>
                    <p
                        class="text-white text-xs md:text-sm mb-3 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">
                        Informasi Sertifikasi Strategi Pembelajaran Lanjut</p>
                    <button
                        class="bg-white text-black px-4 md:px-6 py-2 text-xs md:text-sm rounded translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">Baca
                        selengkapnya</button>
                </div>
            </div>

            <!-- Card -->
            <div
                class="relative group overflow-hidden rounded-xl shadow-lg cursor-pointer transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="images/levelc.png" alt="Level C"
                    class="w-full h-52 sm:h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-opacity-50 flex flex-col justify-end p-4 transition-all duration-500 group-hover:bg-opacity-70">
                    <h3
                        class="text-white text-lg md:text-2xl font-bold mb-2 leading-tight translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Sertifikasi Level C</h3>
                    <p
                        class="text-white text-xs md:text-sm mb-3 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">
                        Informasi Sertifikasi Mastery Pengajaran Kreatif</p>
                    <button
                        class="bg-white text-black px-4 md:px-6 py-2 text-xs md:text-sm rounded translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700">Baca
                        selengkapnya</button>
                </div>
            </div>
        </div>
    </section>
    {{-- End Informasi --}}

    {{-- <section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
        <!-- Title -->
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Artikel Terbaru</h2>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Article 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="relative">
                    <img src="images/karakter.jpg" alt="Elastisitas Permintaan dan Penawaran"
                        class="w-full h-64 object-cover">
                    <div class="absolute bottom-4 right-4">
                        <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Elastisitas Permintaan dan Penawaran | Hafecs</h3>
                    <p class="text-gray-600">March 26, 2025 • 5 minutes read</p>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="relative">
                    <img src="images/konten_satu.jpg" alt="Piagam PBB"
                        class="w-full h-64 object-cover">
                    <div class="absolute bottom-4 right-4">
                        <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full">Hafecs  | TLC</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Upaya Menciptakan Pembelajaran Yang Harmoni | TLC</h3>
                    <p class="text-gray-600">• 8 minutes read</p>
                </div>
            </div>
        </div>

        <!-- Pagination Dots -->
        <div class="flex justify-center items-center mt-8 space-x-2">
            <span class="w-3 h-3 bg-teal-500 rounded-full"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full"></span>
        </div>

        <!-- Navigation Arrows -->
        <div class="flex justify-between items-center mt-4">
            <button class="p-2 rounded-full bg-gray-100 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="p-2 rounded-full bg-white shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section> --}}

    {{-- <section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
        <!-- Title -->
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Artikel Terbaru</h2>

        <!-- Carousel Container -->
        <div class="carousel-container">
            <div class="carousel-track">
                <!-- Slide 1 -->
                <div class="carousel-slide">
                    <!-- Article 1 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Elastisitas Permintaan dan Penawaran</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Elastisitas Permintaan dan Penawaran | Hafecs</h3>
                            <p class="text-gray-600">March 26, 2025 • 5 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 2 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Piagam PBB</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Upaya Menciptakan Pembelajaran Yang Harmoni | TLC</h3>
                            <p class="text-gray-600">• 8 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-slide">
                    <!-- Article 3 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Manajemen Keuangan</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Prinsip Dasar Manajemen Keuangan | Hafecs</h3>
                            <p class="text-gray-600">March 20, 2025 • 6 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 4 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Metode Pengajaran</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Metode Pengajaran Inovatif Era Digital | TLC</h3>
                            <p class="text-gray-600">March 15, 2025 • 7 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-slide">
                    <!-- Article 5 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Ekonomi Mikro</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Pengenalan Ekonomi Mikro | Hafecs</h3>
                            <p class="text-gray-600">March 10, 2025 • 4 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 6 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Pembelajaran Aktif</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Strategi Pembelajaran Aktif di Kelas | TLC</h3>
                            <p class="text-gray-600">March 5, 2025 • 6 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-slide">
                    <!-- Article 7 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Investasi</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Dasar-dasar Investasi yang Perlu Diketahui | Hafecs</h3>
                            <p class="text-gray-600">March 1, 2025 • 9 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 8 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Teknologi Pendidikan</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Teknologi Pendidikan Terkini | TLC</h3>
                            <p class="text-gray-600">February 25, 2025 • 5 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 5 -->
                <div class="carousel-slide">
                    <!-- Article 9 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Kebijakan Ekonomi</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Kebijakan Ekonomi Global 2025 | Hafecs</h3>
                            <p class="text-gray-600">February 20, 2025 • 7 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 10 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <div class="relative">
                            <div class="img-placeholder w-full h-64 object-cover">Image: Evaluasi Pembelajaran</div>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Metode Evaluasi Pembelajaran Efektif | TLC</h3>
                            <p class="text-gray-600">February 15, 2025 • 6 minutes read</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination Dots -->
        <div class="flex justify-center items-center mt-8 space-x-2">
            <span class="w-3 h-3 bg-teal-500 rounded-full" data-index="0"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full" data-index="1"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full" data-index="2"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full" data-index="3"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full" data-index="4"></span>
        </div>

        <!-- Navigation Arrows -->
        <div class="flex justify-between items-center mt-4">
            <button class="prev-button p-2 rounded-full bg-gray-100 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="next-button p-2 rounded-full bg-white shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const track = document.querySelector('.carousel-track');
                const slides = Array.from(document.querySelectorAll('.carousel-slide'));
                const dots = Array.from(document.querySelectorAll('[data-index]'));
                const prevButton = document.querySelector('.prev-button');
                const nextButton = document.querySelector('.next-button');

                let currentIndex = 0;
                const slideWidth = 100; // 100%

                // Initialize the carousel
                function updateCarousel() {
                    // Update track position
                    track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

                    // Update dots
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.remove('bg-gray-300');
                            dot.classList.add('bg-teal-500');
                        } else {
                            dot.classList.remove('bg-teal-500');
                            dot.classList.add('bg-gray-300');
                        }
                    });

                    // Update button states
                    prevButton.style.opacity = currentIndex === 0 ? '0.5' : '1';
                    nextButton.style.opacity = currentIndex === slides.length - 1 ? '0.5' : '1';
                }

                // Handle prev button click
                prevButton.addEventListener('click', function() {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateCarousel();
                    }
                });

                // Handle next button click
                nextButton.addEventListener('click', function() {
                    if (currentIndex < slides.length - 1) {
                        currentIndex++;
                        updateCarousel();
                    }
                });

                // Handle dot clicks
                dots.forEach((dot) => {
                    dot.addEventListener('click', function() {
                        currentIndex = parseInt(this.getAttribute('data-index'));
                        updateCarousel();
                    });
                });

                // Initialize
                updateCarousel();
            });
        </script>
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            .max-w-7xl {
                max-width: 80rem;
            }

            .mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }

            .text-3xl {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .font-bold {
                font-weight: 700;
            }

            .text-gray-800 {
                color: #1f2937;
            }

            .mb-8 {
                margin-bottom: 2rem;
            }

            .carousel-container {
                position: relative;
                overflow: hidden;
            }

            .carousel-track {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }

            .carousel-slide {
                flex: 0 0 100%;
                max-width: 100%;
            }

            @media (min-width: 768px) {
                .md\:px-8 {
                    padding-left: 2rem;
                    padding-right: 2rem;
                }

                .carousel-slide {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1.5rem;
                }
            }

            .bg-white {
                background-color: white;
            }

            .rounded-lg {
                border-radius: 0.5rem;
            }

            .overflow-hidden {
                overflow: hidden;
            }

            .shadow-md {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }

            .relative {
                position: relative;
            }

            .w-full {
                width: 100%;
            }

            .h-64 {
                height: 16rem;
            }

            .object-cover {
                object-fit: cover;
            }

            .absolute {
                position: absolute;
            }

            .bottom-4 {
                bottom: 1rem;
            }

            .right-4 {
                right: 1rem;
            }

            .bg-yellow-400 {
                background-color: #facc15;
            }

            .bg-gray-400 {
                background-color: #9ca3af;
            }

            .text-black {
                color: #000;
            }

            .text-white {
                color: #fff;
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .rounded-full {
                border-radius: 9999px;
            }

            .p-4 {
                padding: 1rem;
            }

            .text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }

            .mb-2 {
                margin-bottom: 0.5rem;
            }

            .text-gray-600 {
                color: #4b5563;
            }

            .flex {
                display: flex;
            }

            .justify-center {
                justify-content: center;
            }

            .justify-between {
                justify-content: space-between;
            }

            .items-center {
                align-items: center;
            }

            .mt-8 {
                margin-top: 2rem;
            }

            .mt-4 {
                margin-top: 1rem;
            }

            .space-x-2 > * + * {
                margin-left: 0.5rem;
            }

            .w-3 {
                width: 0.75rem;
            }

            .h-3 {
                height: 0.75rem;
            }

            .bg-teal-500 {
                background-color: #14b8a6;
            }

            .bg-gray-300 {
                background-color: #d1d5db;
            }

            .p-2 {
                padding: 0.5rem;
            }

            .bg-gray-100 {
                background-color: #f3f4f6;
            }

            .h-6 {
                height: 1.5rem;
            }

            .w-6 {
                width: 1.5rem;
            }

            .text-gray-400 {
                color: #9ca3af;
            }

            button {
                cursor: pointer;
                border: none;
                outline: none;
            }

            /* Placeholder for images */
            .img-placeholder {
                background-color: #e5e7eb;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #6b7280;
                font-weight: bold;
            }
        </style>
    </section> --}}

    {{-- Artikel --}}
    <section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
        <!-- Title -->
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Artikel Terbaru</h2>

        <!-- Carousel Container -->
        <div class="carousel-container">
            <div class="carousel-track">
                <!-- Slide 1 -->
                <div class="carousel-slide">
                    <!-- Article 1 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Elastisitas Permintaan dan Penawaran" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Elastisitas Permintaan dan Penawaran | Hafecs</h3>
                            <p class="text-gray-600">March 26, 2025 • 5 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 2 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/konten_satu.jpg" alt="Piagam PBB" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Upaya Menciptakan Pembelajaran Yang Harmoni | TLC</h3>
                            <p class="text-gray-600">• 8 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-slide">
                    <!-- Article 3 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/konten_dua.jpeg" alt="Manajemen Keuangan" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Prinsip Dasar Manajemen Keuangan | Hafecs</h3>
                            <p class="text-gray-600">March 20, 2025 • 6 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 4 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Metode Pengajaran" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Metode Pengajaran Inovatif Era Digital | TLC</h3>
                            <p class="text-gray-600">March 15, 2025 • 7 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-slide">
                    <!-- Article 5 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Ekonomi Mikro" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Pengenalan Ekonomi Mikro | Hafecs</h3>
                            <p class="text-gray-600">March 10, 2025 • 4 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 6 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Pembelajaran Aktif" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Strategi Pembelajaran Aktif di Kelas | TLC</h3>
                            <p class="text-gray-600">March 5, 2025 • 6 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-slide">
                    <!-- Article 7 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Investasi" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Dasar-dasar Investasi yang Perlu Diketahui | Hafecs</h3>
                            <p class="text-gray-600">March 1, 2025 • 9 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 8 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Teknologi Pendidikan" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Teknologi Pendidikan Terkini | TLC</h3>
                            <p class="text-gray-600">February 25, 2025 • 5 minutes read</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 5 -->
                <div class="carousel-slide">
                    <!-- Article 9 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Kebijakan Ekonomi" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-yellow-400 text-black font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Kebijakan Ekonomi Global 2025 | Hafecs</h3>
                            <p class="text-gray-600">February 20, 2025 • 7 minutes read</p>
                        </div>
                    </div>

                    <!-- Article 10 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-md article-card">
                        <div class="relative">
                            <img src="images/karakter.jpg" alt="Evaluasi Pembelajaran" class="article-image"/>
                            <div class="absolute bottom-4 right-4">
                                <span class="bg-gray-400 text-white font-bold px-6 py-2 rounded-full article-badge">Hafecs | TLC</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 article-title">Metode Evaluasi Pembelajaran Efektif | TLC</h3>
                            <p class="text-gray-600">February 15, 2025 • 6 minutes read</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination Dots -->
        <div class="flex justify-center items-center mt-8 space-x-2">
            <span class="w-3 h-3 bg-teal-500 rounded-full dot" data-index="0"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full dot" data-index="1"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full dot" data-index="2"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full dot" data-index="3"></span>
            <span class="w-3 h-3 bg-gray-300 rounded-full dot" data-index="4"></span>
        </div>

        <!-- Navigation Arrows -->
        <div class="flex justify-between items-center mt-4">
            <button class="prev-button p-2 rounded-full bg-gray-100 shadow-md nav-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="next-button p-2 rounded-full bg-white shadow-md nav-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const track = document.querySelector('.carousel-track');
                const slides = Array.from(document.querySelectorAll('.carousel-slide'));
                const dots = Array.from(document.querySelectorAll('.dot'));
                const prevButton = document.querySelector('.prev-button');
                const nextButton = document.querySelector('.next-button');

                let currentIndex = 0;
                const slideWidth = 100; // 100%

                // Initialize the carousel
                function updateCarousel() {
                    // Update track position with smooth animation
                    track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

                    // Update dots
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.remove('bg-gray-300');
                            dot.classList.add('bg-teal-500');
                        } else {
                            dot.classList.remove('bg-teal-500');
                            dot.classList.add('bg-gray-300');
                        }
                    });

                    // Update button states
                    prevButton.style.opacity = currentIndex === 0 ? '0.5' : '1';
                    nextButton.style.opacity = currentIndex === slides.length - 1 ? '0.5' : '1';
                }

                // Handle prev button click
                prevButton.addEventListener('click', function() {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateCarousel();
                    }
                });

                // Handle next button click
                nextButton.addEventListener('click', function() {
                    if (currentIndex < slides.length - 1) {
                        currentIndex++;
                        updateCarousel();
                    }
                });

                // Handle dot clicks
                dots.forEach((dot) => {
                    dot.addEventListener('click', function() {
                        currentIndex = parseInt(this.getAttribute('data-index'));
                        updateCarousel();
                    });
                });

                // Auto slide every 5 seconds
                let autoSlideInterval = setInterval(autoSlide, 5000);

                function autoSlide() {
                    if (currentIndex < slides.length - 1) {
                        currentIndex++;
                    } else {
                        currentIndex = 0;
                    }
                    updateCarousel();
                }

                // Pause auto slide on hover
                const carouselContainer = document.querySelector('.carousel-container');
                carouselContainer.addEventListener('mouseenter', function() {
                    clearInterval(autoSlideInterval);
                });

                carouselContainer.addEventListener('mouseleave', function() {
                    autoSlideInterval = setInterval(autoSlide, 5000);
                });

                // Touch events for mobile
                let touchStartX = 0;
                let touchEndX = 0;

                carouselContainer.addEventListener('touchstart', function(e) {
                    touchStartX = e.changedTouches[0].screenX;
                });

                carouselContainer.addEventListener('touchend', function(e) {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                });

                function handleSwipe() {
                    const swipeThreshold = 50;
                    if (touchEndX < touchStartX - swipeThreshold) {
                        // Swipe left
                        if (currentIndex < slides.length - 1) {
                            currentIndex++;
                            updateCarousel();
                        }
                    } else if (touchEndX > touchStartX + swipeThreshold) {
                        // Swipe right
                        if (currentIndex > 0) {
                            currentIndex--;
                            updateCarousel();
                        }
                    }
                }

                // Initialize
                updateCarousel();
            });
        </script>
        <style>
            .carousel-container {
                position: relative;
                overflow: hidden;
                border-radius: 0.75rem;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }

            .carousel-track {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }

            .carousel-slide {
                flex: 0 0 100%;
                max-width: 100%;
            }

            @media (min-width: 768px) {
                .md\:px-8 {
                    padding-left: 2rem;
                    padding-right: 2rem;
                }

                .carousel-slide {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1.5rem;
                }
            }

            button {
                cursor: pointer;
                border: none;
                outline: none;
                transition: all 0.3s ease;
            }

            button:hover {
                transform: scale(1.05);
            }

            .article-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .article-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }

            .article-image {
                width: 100%;
                height: 16rem;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .article-card:hover .article-image {
                transform: scale(1.05);
            }

            .article-badge {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            .article-card:hover .article-badge {
                transform: scale(1.05);
            }

            .article-title {
                transition: color 0.3s ease;
            }

            .article-card:hover .article-title {
                color: #0891b2;
            }

            /* Custom dot navigation */
            .dot {
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .dot:hover {
                transform: scale(1.2);
            }

            /* Navigation arrows */
            .nav-arrow {
                transition: all 0.3s ease;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .nav-arrow:hover {
                background-color: #14b8a6;
            }

            .nav-arrow:hover svg {
                color: white;
            }
        </style>
    </section>
    {{-- End Artikel --}}

    <!-- Sponsor Section -->
    <section class="w-full px-8 py-16 bg-white text-gray-900 shadow-lg">
        <h2 class="text-2xl font-bold text-black text-center">Didukung Oleh</h2>
        <div class="w-16 h-1 bg-[#E76F51] mx-auto mt-2 mb-8"></div>

        <!-- Swiper Container -->
        <div class="swiper mySwiper max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-lg">
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

        <!-- Swiper.js CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

        <!-- Swiper.js Initialization -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 15,
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
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    640: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                }
            });
        </script>
    </section>
    <!-- End Sponsor Section -->

    

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
