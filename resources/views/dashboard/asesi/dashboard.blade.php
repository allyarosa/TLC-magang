@extends('layouts.asesiDashboard')
@section('title', 'Teaching & Learning Certification')

@section('content')
    @php use Vinkla\Hashids\Facades\Hashids; @endphp
    <section class="bg-abu">

        {{-- Main Tampilan Awal --}}
        <main id="beranda"
            class="w-full px-5 py-16 bg-gradient-to-br from-blue-50 via-white to-orange-50 relative overflow-hidden">
            <!-- Warna Baground -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-10 left-10 w-2 h-2 bg-orange-300 rounded-full animate-sparkle"></div>
                <div class="absolute top-20 right-20 w-3 h-3 bg-blue-300 rounded-full animate-sparkle"
                    style="animation-delay: 1s;"></div>
                <div class="absolute top-40 left-1/4 w-1 h-1 bg-yellow-400 rounded-full animate-sparkle"
                    style="animation-delay: 2s;"></div>
                <div class="absolute bottom-40 right-1/3 w-2 h-2 bg-pink-300 rounded-full animate-sparkle"
                    style="animation-delay: 0.5s;"></div>
            </div>

            <div
                class="container mx-auto max-w-7xl grid grid-cols-12 transition-all duration-500 ease-in-out mb-14 gap-6 relative z-10">
                <!-- Sebelah kiri -->
                <div class="col-span-12 lg:col-span-7 p-5 transform transition-all duration-500">
                    <!-- Program Unggulan -->
                    <div class="inline-flex items-center bg-orange-100 text-[#1D4E89] px-4 py-2 rounded-full mb-6 backdrop-blur-sm border border-orange-200 hover-lift animate-glow-border cursor-pointer magnetic-effect"
                        onmouseover="this.classList.add('animate-wiggle')"
                        onmouseleave="this.classList.remove('animate-wiggle')"
                        onclick="this.classList.add('animate-shake'); setTimeout(() => this.classList.remove('animate-shake'), 500)">
                        <span class="text-[#E76F51] mr-2 animate-bounce-subtle">✨</span>
                        <span class="text-sm font-medium">PROGRAM UNGGULAN 2025</span>
                        <span class="text-[#E76F51] ml-2 animate-bounce-subtle" style="animation-delay: 0.3s;">✨</span>
                    </div>

                    <div class="animate-fadeIn">
                        <h1
                            class="text-5xl lg:text-6xl font-extrabold leading-tight mt-2 text-[#1D4E89] hover:cursor-default">
                            <span class="block hover:animate-text-glow transition-all duration-300">Sertifikasi Guru</span>
                            <span class="block hover:animate-text-glow transition-all duration-300"
                                style="transition-delay: 0.1s;">Modern di</span>
                            <span class="text-[#E76F51]  hover:scale-105 transition-transform duration-300 inline-block">TLC
                                Program</span>
                        </h1>
                        <p
                            class="text-xl text-gray-700 mt-6 leading-relaxed max-w-2xl hover:text-gray-800 transition-colors duration-300">
                            Program pengembangan kompetensi guru yang dirancang untuk transformasi pendidikan Indonesia.
                            Tingkatkan kualifikasi dan perluas pengaruh Anda dalam komunitas pendidikan.
                        </p>
                    </div>

                    <div class="flex flex-wrap my-8 gap-4">
                        <a href="#sertifikasi"
                            class="button-primary bg-[#1D4E89] hover:bg-[#14406B] text-white px-8 py-4 rounded-full shadow-lg text-lg font-bold hover:shadow-xl transition-all duration-300 hover:scale-105 active:scale-95 flex items-center relative z-10">
                            <span>Mulai Sertifikasi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#testimoni"
                            class="bg-transparent border-2 border-[#E76F51] text-[#E76F51] hover:bg-[#E76F51] hover:text-white px-8 py-4 rounded-full shadow-lg text-lg font-bold hover:shadow-xl transition-all duration-300 hover:scale-105 active:scale-95 hover-lift relative overflow-hidden group">
                            <span class="relative z-10">Lihat Testimoni TLC Program</span>
                            <div
                                class="absolute inset-0 bg-[#E76F51] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left">
                            </div>
                        </a>
                    </div>

                    <!-- Kurikulum -->
                    <div class="grid grid-cols-2 gap-4 mt-12">
                        <div
                            class="feature-card flex items-center text-[#1D4E89] p-4 bg-white/80 rounded-xl backdrop-blur-sm border border-blue-200 hover:bg-white/90 hover:shadow-md transition-all duration-300 cursor-pointer">
                            <div
                                class="w-8 h-8 bg-[#E76F51] rounded-full flex items-center justify-center mr-3 hover:animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-white transition-transform duration-300 hover:scale-110"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="font-medium">Kurikulum Tervalidasi</span>
                        </div>
                        <div
                            class="feature-card flex items-center text-[#1D4E89] p-4 bg-white/80 rounded-xl backdrop-blur-sm border border-blue-200 hover:bg-white/90 hover:shadow-md transition-all duration-300 cursor-pointer">
                            <div
                                class="w-8 h-8 bg-[#E76F51] rounded-full flex items-center justify-center mr-3 hover:animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-white transition-transform duration-300 hover:scale-110"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="font-medium">Sertifikat Terakreditasi</span>
                        </div>
                        <div
                            class="feature-card flex items-center text-[#1D4E89] p-4 bg-white/80 rounded-xl backdrop-blur-sm border border-blue-200 hover:bg-white/90 hover:shadow-md transition-all duration-300 cursor-pointer">
                            <div
                                class="w-8 h-8 bg-[#E76F51] rounded-full flex items-center justify-center mr-3 hover:animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-white transition-transform duration-300 hover:scale-110"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="font-medium">Mentor Berpengalaman</span>
                        </div>
                        <div
                            class="feature-card flex items-center text-[#1D4E89] p-4 bg-white/80 rounded-xl backdrop-blur-sm border border-blue-200 hover:bg-white/90 hover:shadow-md transition-all duration-300 cursor-pointer">
                            <div
                                class="w-8 h-8 bg-[#E76F51] rounded-full flex items-center justify-center mr-3 hover:animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-white transition-transform duration-300 hover:scale-110"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="font-medium">Jaringan Pendidik Nasional</span>
                        </div>
                    </div>
                </div>

                <!-- Sebalah Kanan -->
                <div class="col-span-12 lg:col-span-5 relative flex items-center justify-center">
                    <div
                        class="interactive-card bg-white/90 backdrop-blur-lg border border-blue-200 rounded-3xl p-8 w-full max-w-md shadow-3xl hover:shadow-3xl transition-all duration-500 animate-card-float shadow-glow">
                        <!-- Icon -->
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-16 bg-[#E76F51]/20 rounded-full flex items-center justify-center animate-pulse-glow hover:scale-110 transition-transform duration-300 cursor-pointer"
                                onclick="this.style.animation = 'pulse-glow 0.5s ease-in-out'; setTimeout(() => this.style.animation = 'pulse-glow 3s ease-in-out infinite', 500)">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 text-[#E76F51] transition-transform duration-300 hover:rotate-12"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                        </div>

                        <h3
                            class="text-2xl font-bold text-[#1D4E89] text-center mb-2 hover:scale-105 transition-transform duration-300 cursor-default">
                            Teaching & Learning Certification
                        </h3>
                        <p
                            class="text-gray-700 text-center mb-8 leading-relaxed hover:text-gray-800 transition-colors duration-300">
                            Kembangkan keterampilan mengajar Anda dan dapatkan sertifikasi yang diakui secara nasional
                        </p>

                        <!-- Guru Tersertifikasi -->
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="stat-card bg-blue-50 rounded-2xl p-4 border border-blue-200 hover:bg-blue-100 transition-all duration-300"
                                onclick="this.querySelector('.stat-number').style.animation = 'bounce-subtle 0.6s ease'">
                                <div class="stat-number text-3xl font-bold text-[#1D4E89] mb-1">1000+</div>
                                <div class="text-sm text-gray-600">Guru Tersertifikasi</div>
                            </div>
                            <div class="stat-card bg-orange-50 rounded-2xl p-4 border border-orange-200 hover:bg-orange-100 transition-all duration-300"
                                onclick="this.querySelector('.stat-number').style.animation = 'bounce-subtle 0.6s ease'">
                                <div class="stat-number text-3xl font-bold text-[#E76F51] mb-1">300+</div>
                                <div class="text-sm text-gray-600">Sekolah Mitra</div>
                            </div>
                            <div class="stat-card bg-blue-50 rounded-2xl p-4 border border-blue-200 hover:bg-blue-100 transition-all duration-300"
                                onclick="this.querySelector('.stat-number').style.animation = 'bounce-subtle 0.6s ease'">
                                <div class="stat-number text-3xl font-bold text-[#1D4E89] mb-1">34</div>
                                <div class="text-sm text-gray-600">Provinsi</div>
                            </div>
                        </div>
                    </div>

                    <!-- Element-element -->
                    <div class="absolute top-4 -left-4 w-20 h-20 bg-[#E76F51]/30 rounded-full animate-float hover:scale-125 transition-transform duration-300 cursor-pointer"
                        onclick="this.style.animation = 'float 1s ease-in-out'; setTimeout(() => this.style.animation = 'float 6s ease-in-out infinite', 1000)">
                    </div>
                    <div class="absolute bottom-8 -right-6 w-16 h-16 bg-yellow-300/40 rounded-full animate-float hover:scale-125 transition-transform duration-300 cursor-pointer"
                        style="animation-delay: 2s;"
                        onclick="this.style.animation = 'float 1s ease-in-out'; setTimeout(() => this.style.animation = 'float 6s ease-in-out infinite', 1000)">
                    </div>
                    <div class="absolute top-1/2 -right-8 w-12 h-12 bg-[#1D4E89]/30 rounded-full animate-float hover:scale-125 transition-transform duration-300 cursor-pointer"
                        style="animation-delay: 4s;"
                        onclick="this.style.animation = 'float 1s ease-in-out'; setTimeout(() => this.style.animation = 'float 6s ease-in-out infinite', 1000)">
                    </div>
                </div>
            </div>
            <script>
                document.querySelectorAll('.magnetic-effect').forEach(element => {
                    element.addEventListener('mousemove', (e) => {
                        const rect = element.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;

                        element.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px)`;
                    });

                    element.addEventListener('mouseleave', () => {
                        element.style.transform = 'translate(0px, 0px)';
                    });
                });


                document.querySelectorAll('.button-primary, .stat-card, .feature-card').forEach(element => {
                    element.addEventListener('click', function(e) {
                        const ripple = document.createElement('div');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;

                        ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;

                        this.style.position = 'relative';
                        this.style.overflow = 'hidden';
                        this.appendChild(ripple);

                        setTimeout(() => {
                            ripple.remove();
                        }, 600);
                    });
                });


                const style = document.createElement('style');
                style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
            `;
                document.head.appendChild(style);


                window.addEventListener('mousemove', (e) => {
                    const mouseX = e.clientX / window.innerWidth;
                    const mouseY = e.clientY / window.innerHeight;

                    document.querySelectorAll('.animate-float').forEach((element, index) => {
                        const speed = (index + 1) * 0.5;
                        const x = (mouseX - 0.5) * speed;
                        const y = (mouseY - 0.5) * speed;

                        element.style.transform += ` translate(${x}px, ${y}px)`;
                    });
                });
            </script>
            <style>
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                @keyframes float {
                    0% {
                        transform: translateY(0px);
                    }

                    50% {
                        transform: translateY(-20px);
                    }

                    100% {
                        transform: translateY(0px);
                    }
                }

                @keyframes pulse-glow {

                    0%,
                    100% {
                        box-shadow: 0 0 20px rgba(231, 111, 81, 0.3);
                        transform: scale(1);
                    }

                    50% {
                        box-shadow: 0 0 40px rgba(231, 111, 81, 0.5);
                        transform: scale(1.05);
                    }
                }

                @keyframes bounce-subtle {

                    0%,
                    100% {
                        transform: translateY(0);
                    }

                    50% {
                        transform: translateY(-10px);
                    }
                }

                @keyframes wiggle {
                    0% {
                        transform: rotate(0deg);
                    }

                    25% {
                        transform: rotate(5deg);
                    }

                    75% {
                        transform: rotate(-5deg);
                    }

                    100% {
                        transform: rotate(0deg);
                    }
                }

                @keyframes shake {

                    0%,
                    100% {
                        transform: translateX(0);
                    }

                    25% {
                        transform: translateX(-5px);
                    }

                    75% {
                        transform: translateX(5px);
                    }
                }

                @keyframes glow-border {
                    0% {
                        box-shadow: 0 0 5px rgba(231, 111, 81, 0.2);
                    }

                    50% {
                        box-shadow: 0 0 20px rgba(231, 111, 81, 0.4), 0 0 30px rgba(231, 111, 81, 0.2);
                    }

                    100% {
                        box-shadow: 0 0 5px rgba(231, 111, 81, 0.2);
                    }
                }

                @keyframes text-glow {

                    0%,
                    100% {
                        text-shadow: 0 0 10px rgba(231, 111, 81, 0.3);
                    }

                    50% {
                        text-shadow: 0 0 20px rgba(231, 111, 81, 0.6), 0 0 30px rgba(231, 111, 81, 0.4);
                    }
                }

                @keyframes card-float {

                    0%,
                    100% {
                        transform: translateY(0) rotate(0deg);
                    }

                    25% {
                        transform: translateY(-10px) rotate(1deg);
                    }

                    75% {
                        transform: translateY(-5px) rotate(-1deg);
                    }
                }

                @keyframes sparkle {

                    0%,
                    100% {
                        opacity: 0;
                        transform: scale(0) rotate(0deg);
                    }

                    50% {
                        opacity: 1;
                        transform: scale(1) rotate(180deg);
                    }
                }

                .animate-fadeIn {
                    animation: fadeIn 1s ease-out;
                }

                .animate-float {
                    animation: float 6s ease-in-out infinite;
                }

                .animate-pulse-glow {
                    animation: pulse-glow 3s ease-in-out infinite;
                }

                .animate-bounce-subtle {
                    animation: bounce-subtle 2s ease-in-out infinite;
                }

                .animate-wiggle {
                    animation: wiggle 0.5s ease-in-out;
                }

                .animate-shake {
                    animation: shake 0.5s ease-in-out;
                }

                .animate-glow-border {
                    animation: glow-border 2s ease-in-out infinite;
                }

                .animate-text-glow {
                    animation: text-glow 2s ease-in-out infinite;
                }

                .animate-card-float {
                    animation: card-float 4s ease-in-out infinite;
                }

                .animate-sparkle {
                    animation: sparkle 1.5s ease-in-out infinite;
                }

                .shadow-3xl {
                    box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
                }

                .shadow-glow {
                    box-shadow: 0 0 30px rgba(231, 111, 81, 0.2);
                }

                .hover-lift {
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                }

                .hover-lift:hover {
                    transform: translateY(-8px) scale(1.02);
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
                }

                .interactive-card {
                    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    transform-origin: center;
                }

                .interactive-card:hover {
                    transform: translateY(-12px) rotateX(5deg) rotateY(2deg);
                    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
                }

                .interactive-card:active {
                    transform: translateY(-8px) scale(0.98);
                }

                .feature-card {
                    transition: all 0.3s ease;
                    position: relative;
                    overflow: hidden;
                }

                .feature-card::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
                    transition: left 0.5s;
                }

                .feature-card:hover::before {
                    left: 100%;
                }

                .feature-card:hover {
                    transform: translateY(-3px) scale(1.02);
                    box-shadow: 0 10px 25px rgba(29, 78, 137, 0.15);
                }

                .button-primary {
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    position: relative;
                    overflow: hidden;
                }

                .button-primary::before {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 0;
                    height: 0;
                    background: rgba(255, 255, 255, 0.2);
                    border-radius: 50%;
                    transform: translate(-50%, -50%);
                    transition: all 0.6s ease;
                }

                .button-primary:hover::before {
                    width: 300px;
                    height: 300px;
                }

                .button-primary:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 15px 35px rgba(29, 78, 137, 0.3);
                }

                .button-primary:active {
                    transform: translateY(0) scale(0.95);
                }

                .text-shimmer {
                    background: linear-gradient(45deg, #1D4E89, #E76F51, #1D4E89);
                    background-size: 200% 200%;
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    animation: shimmer 3s ease-in-out infinite;
                }

                @keyframes shimmer {
                    0% {
                        background-position: 0% 50%;
                    }

                    50% {
                        background-position: 100% 50%;
                    }

                    100% {
                        background-position: 0% 50%;
                    }
                }

                .stat-card {
                    transition: all 0.3s ease;
                    cursor: pointer;
                }

                .stat-card:hover {
                    transform: translateY(-5px) rotateZ(2deg);
                    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
                }

                .stat-card:hover .stat-number {
                    animation: bounce-subtle 0.6s ease;
                }

                .magnetic-effect {
                    transition: transform 0.2s ease;
                }
            </style>
        </main>
        {{-- End Main Tampilan Awal --}}

        {{-- Pilih Jalur Sertifikasi --}}
        <section class="relative min-h-screen py-20 px-6 overflow-hidden gradient-bg" id="sertifikasi">
            <!-- Animasi untuk latar belakang -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="particle w-2 h-2" style="left: 10%; animation-delay: 0s;"></div>
                <div class="particle w-3 h-3" style="left: 20%; animation-delay: 2s;"></div>
                <div class="particle w-1 h-1" style="left: 30%; animation-delay: 4s;"></div>
                <div class="particle w-2 h-2" style="left: 40%; animation-delay: 1s;"></div>
                <div class="particle w-3 h-3" style="left: 50%; animation-delay: 3s;"></div>
                <div class="particle w-1 h-1" style="left: 60%; animation-delay: 5s;"></div>
                <div class="particle w-2 h-2" style="left: 70%; animation-delay: 2.5s;"></div>
                <div class="particle w-3 h-3" style="left: 80%; animation-delay: 4.5s;"></div>
                <div class="particle w-1 h-1" style="left: 90%; animation-delay: 1.5s;"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <!-- Header Section -->
                <div class="text-center mb-20 floating-animation">
                    <div class="inline-block mb-6">
                        <span
                            class="inline-flex items-center px-6 py-3 bg-orange-100 text-orange-600 rounded-full text-sm font-bold tracking-widest shadow-xl glass-effect glow-effect">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            PROGRAM SERTIFIKASI
                        </span>
                    </div>
                    <h2 class="text-5xl sm:text-7xl font-black text-blue-900 mb-6 leading-tight">
                        Pilih Jalur
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-orange-600">
                            Sertifikasi Anda
                        </span>
                    </h2>
                    <p class="text-xl text-gray-700 max-w-4xl mx-auto leading-relaxed">
                        Program bertingkat yang disesuaikan dengan kebutuhan dan tujuan karir pendidik masa depan
                    </p>
                </div>

                <!-- Card Section -->
                @php
                    $user = Auth::user();
                @endphp
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-16">
                    <!-- Level A -->
                    <div class="relative group card-hover">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-orange-400 to-orange-500 rounded-3xl blur opacity-20 group-hover:opacity-30">
                        </div>
                        <div
                            class="relative h-[600px] rounded-3xl shadow-2xl overflow-hidden bg-white border border-gray-200">

                            {{-- <div class="absolute top-6 right-6 z-20"> --}}
                            {{-- <span
                                            class="inline-flex items-center px-4 py-2 bg-orange-500 text-white text-xs font-bold rounded-full pulse-glow">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            POPULER
                                        </span> --}}
                            {{-- </div> --}}


                            <div class="absolute inset-0 card-bg-level-a opacity-90"></div>


                            <div class="relative h-full flex flex-col justify-between p-8 text-white">
                                <div>
                                    <div class="mb-6">
                                        <span
                                            class="inline-flex items-center px-4 py-2 bg-white/20 text-gray-700 text-sm font-bold rounded-full glass-effect">
                                            LEVEL A
                                        </span>
                                    </div>
                                    <h3 class="text-4xl font-black mb-4 leading-tight">
                                        {{-- Sertifikasi<br>Dasar --}}
                                        Teaching Knowledge Certification
                                    </h3>
                                    {{-- <p class="text-white/90 text-lg mb-8 leading-relaxed">
                                                Fondasi pengajaran efektif untuk semua guru yang ingin memulai perjalanan
                                                profesional
                                            </p> --}}
                                </div>

                                <div>
                                    <div class="grid grid-cols-1 gap-3 mb-8">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Uji Literasi Numerasi</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Uji Pedagogical Content Kowledge (PCK)</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Uji Higher Order Thinking Skills
                                                (HOTS)</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        {{-- <div>
                                                    <span class="text-3xl font-black">
                                                        Rp.{{ number_format($levels[0]->price, 0, ',', '.') }}
                                                    </span>
                                                    <span class="block text-sm text-white/70">Per sertifikasi</span>
                                                </div> --}}
                                        @if ($user->hasPermissionTo('access_level_A'))
                                            <button onclick="document.getElementById('modalA').classList.remove('hidden')"
                                                class="bg-white text-orange-500 px-6 py-3 font-bold rounded-xl hover:bg-orange-50 transition-all  shadow-lg">
                                                Detail Program
                                            </button>
                                        @else
                                            <button onclick="document.getElementById('modalA').classList.remove('hidden')"
                                                class="bg-white text-orange-500 px-6 py-3 font-bold rounded-xl hover:bg-orange-50 transition-all  shadow-lg">
                                                Mulai Sekarang
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Level B -->
                    <div class="relative group card-hover">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-blue-600 rounded-3xl blur opacity-20 group-hover:opacity-30">
                        </div>
                        <div
                            class="relative h-[600px] rounded-3xl shadow-2xl overflow-hidden bg-white border border-gray-200">

                            <div class="absolute inset-0 card-bg-level-b opacity-90"></div>


                            <div class="relative h-full flex flex-col justify-between p-8 text-white">
                                <div>
                                    <div class="mb-6">
                                        <span
                                            class="inline-flex items-center px-4 py-2 bg-white/20 text-gray-700 text-sm font-bold rounded-full glass-effect">
                                            LEVEL B
                                        </span>
                                    </div>
                                    <h3 class="text-4xl font-black mb-4 leading-tight">
                                        Teaching Activation Certification
                                    </h3>
                                    {{-- <p class="text-white/90 text-lg mb-8 leading-relaxed">
                                                Strategi pembelajaran lanjutan untuk guru berpengalaman yang ingin berkembang
                                            </p> --}}
                                </div>

                                <div>
                                    <div class="grid grid-cols-1 gap-3 mb-8">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Merancang modul ajar/RPP</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Menyusun materi ajar (PPT)</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Merancang LKS</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        {{-- <div>
                                                    <span class="text-3xl font-black">
                                                        Rp.{{ number_format($levels[1]->price, 0, ',', '.') }}
                                                    </span>
                                                    <span class="block text-sm text-white/70">Per sertifikasi</span>
                                                </div> --}}
                                        @if ($user->hasPermissionTo('level_A_completed'))
                                            <button onclick="document.getElementById('modalB').classList.remove('hidden')"
                                                class="bg-white text-blue-600 px-6 py-3 font-bold rounded-xl hover:bg-blue-50 transition-all transform hover:scale-105 shadow-lg">
                                                Mulai Sekarang
                                            </button>
                                        @else
                                            <button onclick="document.getElementById('modalB').classList.remove('hidden')"
                                                class="bg-white text-blue-600 px-6 py-3 font-bold rounded-xl hover:bg-blue-50 transition-all transform hover:scale-105 shadow-lg">
                                                Detail Program
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Level C -->
                    <div class="relative group card-hover">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-blue-700 rounded-3xl blur opacity-20 group-hover:opacity-30">
                        </div>
                        <div
                            class="relative h-[600px] rounded-3xl shadow-2xl overflow-hidden bg-white border border-gray-200">

                            {{-- <div class="absolute top-6 right-6 z-20">
                                        <span
                                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-xs font-bold rounded-full pulse-glow">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                            </svg>
                                            PREMIUM
                                        </span>
                                    </div> --}}


                            <div class="absolute inset-0 card-bg-level-c opacity-90"></div>


                            <div class="relative h-full flex flex-col justify-between p-8 text-white">
                                <div>
                                    <div class="mb-6">
                                        <span
                                            class="inline-flex items-center px-4 py-2 bg-white/20 text-gray-700 text-sm font-bold rounded-full glass-effect">
                                            LEVEL C
                                        </span>
                                    </div>
                                    <h3 class="text-4xl font-black mb-4 leading-tight">
                                        Teaching Mastery Certification
                                    </h3>
                                    {{-- <p class="text-white/90 text-lg mb-8 leading-relaxed">
                                                Pengajaran kreatif tingkat mahir untuk pemimpin pendidikan masa depan
                                            </p> --}}
                                </div>

                                <div>
                                    <div class="grid grid-cols-1 gap-3 mb-8">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Melaksanakan Pengajaran berbasis TMF</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                            <span class="text-sm font-medium">Self Review</span>
                                        </div>
                                        {{-- <div class="flex items-center space-x-3">
                                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                                    <span class="text-sm font-medium">Publikasi Karya Ilmiah</span>
                                                </div> --}}
                                    </div>

                                    <div class="flex items-center justify-between">
                                        {{-- <div>
                                                    <span class="text-3xl font-black">
                                                        Rp.{{ number_format($levels[2]->price, 0, ',', '.') }}
                                                    </span>
                                                    <span class="block text-sm text-white/70">Per sertifikasi</span>
                                                </div> --}}
                                        <button onclick="document.getElementById('modalC').classList.remove('hidden')"
                                            class="bg-white text-blue-700 px-6 py-3 font-bold rounded-xl hover:bg-blue-50 transition-all transform hover:scale-105 shadow-lg">
                                            Detail Program
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('mousemove', (e) => {
                    if (Math.random() > 0.9) {
                        createSparkle(e.clientX, e.clientY);
                    }
                });

                function createSparkle(x, y) {
                    const sparkle = document.createElement('div');
                    sparkle.className = 'absolute w-1 h-1 bg-orange-400 rounded-full pointer-events-none z-50';
                    sparkle.style.left = x + 'px';
                    sparkle.style.top = y + 'px';
                    sparkle.style.animation = 'sparkle 1s ease-out forwards';
                    document.body.appendChild(sparkle);

                    setTimeout(() => {
                        sparkle.remove();
                    }, 1000);
                }

                function showModal(modalId) {
                    alert(`Showing details for ${modalId}`);
                }


                const style = document.createElement('style');
                style.textContent = `
                        @keyframes sparkle {
                            0% { transform: scale(0) rotate(0deg); opacity: 1; }
                            50% { transform: scale(1) rotate(180deg); opacity: 1; }
                            100% { transform: scale(0) rotate(360deg); opacity: 0; }
                        }
                        `;
                document.head.appendChild(style);
            </script>

            <style>
                * {
                    font-family: 'Inter', sans-serif;
                }

                .gradient-bg {
                    background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 50%, #fff7ed 100%);
                }

                .card-hover {
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                }

                .card-hover:hover {
                    transform: translateY(-8px) scale(1.02);
                }

                .glass-effect {
                    backdrop-filter: blur(20px);
                    -webkit-backdrop-filter: blur(20px);
                }

                .glow-effect {
                    box-shadow: 0 0 30px rgba(234, 88, 12, 0.2);
                }

                .floating-animation {
                    animation: float 6s ease-in-out infinite;
                }

                @keyframes float {

                    0%,
                    100% {
                        transform: translateY(0px);
                    }

                    50% {
                        transform: translateY(-10px);
                    }
                }

                .pulse-glow {
                    animation: pulse-glow 2s infinite;
                }

                @keyframes pulse-glow {

                    0%,
                    100% {
                        box-shadow: 0 0 20px rgba(234, 88, 12, 0.4);
                    }

                    50% {
                        box-shadow: 0 0 40px rgba(234, 88, 12, 0.8);
                    }
                }

                .card-bg-level-a {
                    background: linear-gradient(135deg, #ea5a0c 0%, #f97316 100%);
                }

                .card-bg-level-b {
                    background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
                }

                .card-bg-level-c {
                    background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%);
                }

                .particle {
                    position: absolute;
                    background: rgba(234, 88, 12, 0.1);
                    border-radius: 50%;
                    pointer-events: none;
                    animation: particle-float 8s infinite linear;
                }

                @keyframes particle-float {
                    0% {
                        transform: translateY(100vh) rotate(0deg);
                        opacity: 0;
                    }

                    10% {
                        opacity: 1;
                    }

                    90% {
                        opacity: 1;
                    }

                    100% {
                        transform: translateY(-100px) rotate(360deg);
                        opacity: 0;
                    }
                }
            </style>
        </section>
        {{-- End Pilih Jalur Sertifikasi --}}

        {{-- @livewire('asesi.payment-card') --}}
        @foreach (['A', 'B', 'C'] as $level)
            <div id="modal{{ $level }}"
                class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-all duration-300">
                <div
                    class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 relative transform transition-all duration-500 scale-100">
                    <button onclick="document.getElementById('modal{{ $level }}').classList.add('hidden')"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center mr-4">
                            <span class="text-xl font-bold text-orange-600">{{ $level }}</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Sertifikasi Level {{ $level }}</h2>
                    </div>

                    <div class="mb-6">
                        <div class="h-1 w-16 bg-orange-500 mb-4"></div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">
                            @switch($level)
                                @case('A')
                                    Teaching Knowledge Certification
                                @break

                                @case('B')
                                    Teaching Activation Certification
                                @break

                                @case('C')
                                    Teaching Mastery Certification
                                @break
                            @endswitch
                        </h3>

                        <p class="text-gray-600 mb-6 leading-relaxed text-justify">
                            @switch($level)
                                @case('A')
                                    Sertifikasi Level A bertujuan menguji pemahaman dasar guru melalui ujian teori terkait
                                    pengajaran yang efektif, terstruktur, dan berdiferensiasi, serta penerapan penilaian berbasis
                                    Teaching Mastery Framework serta Literasi Numerasi
                                @break

                                @case('B')
                                    Sertifikasi Level B bertujuan untuk menguji keterampilan guru melalui aktivasi pengetahuan PCK
                                    dan HOTS dalam pengajaran serta mengembangkan lesson plan (Modul Ajar), Teaching Tactics dan
                                    Teaching Scenario untuk menunjang efektivitas pengajaran guru di kelas.
                                @break

                                @case('C')
                                    Sertifikasi Level C merupakan tahapan Mastery dalam pelaksanaan pengajaran. Peserta akan
                                    berfokus dalam praktik pengajaran efektif di dalam kelas berbasis Teaching Mastery Framework
                                    (TMF)
                                    . Peserta akan merekam dan mereview proses mengajarnya, kemudian akan di uji oleh asesor.
                                @break
                            @endswitch
                        </p>

                        <!-- Benefit cards -->
                        <div class="grid grid-cols-2 gap-3 mb-6">
                            @switch($level)
                                @case('A')
                                    <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Manajemen Kelas</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Strategi Motivasi</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Desain Pembelajaran</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Teknik Asesmen</span>
                                    </div>
                                @break

                                @case('B')
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Modul Interaktif</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Literasi Digital</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Project Based</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Analisis Pembelajaran</span>
                                    </div>
                                @break

                                @case('C')
                                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Praktik Video</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Mentoring 1-on-1</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Publikasi</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">Kepemimpinan</span>
                                    </div>
                                @break
                            @endswitch
                        </div>
                    </div>

                    <!-- Price and CTA -->
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-gray-500 text-md font-semibold line-through">
                                @switch($level)
                                    @case('A')
                                        Rp 199.000
                                    @break

                                    @case('B')
                                        Rp 269.000
                                    @break

                                    @case('C')
                                        Rp 399.000
                                    @break
                                @endswitch
                            </span>
                            <div class="text-2xl font-extrabold text-gray-700">
                                @switch($level)
                                    @case('A')
                                        Rp.{{ number_format($levels[0]->price, 0, ',', '.') }}
                                    @break

                                    @case('B')
                                        Rp.{{ number_format($levels[1]->price, 0, ',', '.') }}
                                    @break

                                    @case('C')
                                        Rp.{{ number_format($levels[2]->price, 0, ',', '.') }}
                                    @break
                                @endswitch
                            </div>
                        </div>
                        @switch($level)
                            @case('A')
                                @if ($user->hasPermissionTo('access_level_A'))
                                    <button
                                        class="bg-blue-500 text-white px-6 py-3 rounded-lg font-bold shadow-lg cursor-not-allowed"
                                        disabled>
                                        Sudah Terdaftar
                                    </button>
                                @else
                                    <a href="{{ route('payments.create', Hashids::encode($levels[0]->id)) }}"
                                        class="bg-gradient-to-r from-[#F4A261] to-[#E76F51] hover:from-[#E76F51] hover:to-[#E76F51] text-white px-6 py-3 rounded-lg font-bold shadow-lg transform transition-all hover:scale-105">
                                        Daftar Sekarang
                                    </a>
                                @endif
                            @break

                            @case('B')
                                @if ($user->hasPermissionTo('access_level_B'))
                                    <button
                                        class="bg-blue-500 text-white px-6 py-3 rounded-lg font-bold shadow-lg cursor-not-allowed"
                                        disabled>
                                        Sudah Terdaftar
                                    </button>
                                @elseif ($user->hasPermissionTo('level_A_completed'))
                                    <a href="{{ route('payments.create', Hashids::encode($levels[1]->id)) }}"
                                        class="bg-gradient-to-r from-[#F4A261] to-[#E76F51] hover:from-[#E76F51] hover:to-[#E76F51] text-white px-6 py-3 rounded-lg font-bold shadow-lg transform transition-all hover:scale-105">
                                        Daftar Sekarang
                                    </a>
                                @else
                                    <button disabled
                                        class="bg-gradient-to-r from-[#F4A261] to-[#E76F51] text-white px-6 py-3 rounded-lg font-bold shadow-lg opacity-60 cursor-not-allowed">
                                        Belum Dibuka
                                    </button>
                                @endif
                            @break

                            @case('C')
                                @if ($user->hasPermissionTo('access_level_C'))
                                    <button
                                        class="bg-blue-500 text-white px-6 py-3 rounded-lg font-bold shadow-lg cursor-not-allowed"
                                        disabled>
                                        Sudah Terdaftar
                                    </button>
                                @elseif ($user->hasPermissionTo('level_B_completed'))
                                    <a href="{{ route('payments.create', Hashids::encode($levels[2]->id)) }}"
                                        class="bg-gradient-to-r from-[#F4A261] to-[#E76F51] hover:from-[#E76F51] hover:to-[#E76F51] text-white px-6 py-3 rounded-lg font-bold shadow-lg transform transition-all hover:scale-105">
                                        Daftar Sekarang
                                    </a>
                                @else
                                    <button disabled
                                        class="bg-gradient-to-r from-[#F4A261] to-[#E76F51] text-white px-6 py-3 rounded-lg font-bold shadow-lg opacity-60 cursor-not-allowed">
                                        Belum Dibuka
                                    </button>
                                @endif
                            @break
                        @endswitch

                    </div>
                </div>
            </div>
        @endforeach
        {{-- End Investasi --}}

        {{-- Apa guru Dapatkan --}}
        <section class="w-full px-5 py-20 bg-gradient-to-br from-blue-50 via-white to-orange-50" id="manfaat">
            <div class="container mx-auto max-w-7xl">
                <!-- Header Section -->
                <div class="text-center mb-16 animate-fadeIn">
                    <span
                        class="text-lg text-[#E76F51] font-semibold inline-block px-6 py-2 bg-orange-100 rounded-full shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105 mb-6">
                        #MANFAAT PROGRAM TLC
                    </span>
                    <h2
                        class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight text-[#1D4E89] mb-6 hover:scale-105 transition-transform duration-300">
                        <span class="relative inline-block">
                            <span class="relative z-10">Apa yang akan</span>
                            <span class="absolute -bottom-2 left-0 w-full h-3 bg-yellow-300 opacity-50 z-0"></span>
                        </span>
                        <br>
                        <span class="relative inline-block">
                            <span class="relative z-10">Guru Dapatkan?</span>
                            <span class="absolute -bottom-2 left-0 w-full h-3 bg-orange-300 opacity-50 z-0"></span>
                        </span>
                    </h2>
                    <p class="text-xl text-gray-700 max-w-2xl mx-auto leading-relaxed">
                        <strong class="text-[#E76F51]">Bukan sekadar sertifikat biasa.</strong> Program komprehensif yang
                        telah terbukti meningkatkan <span class="font-semibold text-[#1D4E89]">kompetensi dan karir</span>
                        ratusan pendidik profesional.
                    </p>
                </div>

                <!-- Manfaat -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Box 1: Sertifikasi Terakreditasi -->
                    <div
                        class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl hover-lift border border-white/50 group cursor-pointer">
                        <div
                            class="bg-gradient-to-br from-teal-400 to-teal-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                            <i class="fas fa-award text-white text-2xl group-hover:animate-bounce relative z-10"></i>
                        </div>
                        <h3
                            class="text-xl font-bold text-[#1D4E89] mb-4 group-hover:text-teal-600 transition-colors duration-300">
                            Sertifikasi Terakreditasi
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            Dapatkan sertifikat yang diakui secara nasional untuk meningkatkan kredibilitas profesional Anda
                        </p>
                    </div>

                    <!-- Box 2: Kurikulum Terkini -->
                    <div
                        class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl hover-lift border border-white/50 group cursor-pointer">
                        <div
                            class="bg-gradient-to-br from-blue-400 to-blue-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/20 animate-ping"></div>
                            <i
                                class="fas fa-graduation-cap text-white text-2xl group-hover:animate-pulse relative z-10"></i>
                        </div>
                        <h3
                            class="text-xl font-bold text-[#1D4E89] mb-4 group-hover:text-blue-600 transition-colors duration-300">
                            Kurikulum Terkini
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            Akses materi pembelajaran yang selalu diperbaharui sesuai perkembangan dunia pendidikan
                        </p>
                    </div>

                    <!-- Box 3: Pengembangan Keterampilan -->
                    <div
                        class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl hover-lift border-2 border-[#E76F51]/30 group cursor-pointer relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-orange-200 to-orange-300 rounded-full -translate-y-10 translate-x-10 opacity-30 animate-pulse">
                        </div>
                        <div
                            class="bg-gradient-to-br from-[#E76F51] to-orange-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg relative z-10 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shimmer">
                            </div>
                            <i class="fas fa-rocket text-white text-2xl group-hover:animate-spin relative z-10"></i>
                        </div>
                        <h3
                            class="text-xl font-bold text-[#1D4E89] mb-4 group-hover:text-[#E76F51] transition-colors duration-300 relative z-10">
                            Pengembangan Keterampilan
                        </h3>
                        <p class="text-gray-700 leading-relaxed relative z-10">
                            Kembangkan keterampilan mengajar modern yang relevan dengan kebutuhan siswa di era digital
                        </p>
                    </div>

                    <!-- Box 4: Jaringan Profesional -->
                    <div
                        class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl hover-lift border border-white/50 group cursor-pointer">
                        <div
                            class="bg-gradient-to-br from-orange-400 to-orange-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                            <i class="fas fa-users text-white text-2xl group-hover:animate-bounce relative z-10"></i>
                        </div>
                        <h3
                            class="text-xl font-bold text-[#1D4E89] mb-4 group-hover:text-orange-600 transition-colors duration-300">
                            Jaringan Profesional
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            Bergabung dengan komunitas pendidik dari seluruh Indonesia untuk berbagi pengalaman dan praktik
                            terbaik
                        </p>
                    </div>

                    <!-- Box 5: Peningkatan Karir -->
                    <div
                        class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl hover-lift border border-white/50 group cursor-pointer">
                        <div
                            class="bg-gradient-to-br from-pink-400 to-pink-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/20 animate-ping"></div>
                            <i class="fas fa-chart-line text-white text-2xl group-hover:animate-pulse relative z-10"></i>
                        </div>
                        <h3
                            class="text-xl font-bold text-[#1D4E89] mb-4 group-hover:text-pink-600 transition-colors duration-300">
                            Peningkatan Karir
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            Buka peluang karir yang lebih luas dan potensi kenaikan pendapatan dengan kualifikasi yang lebih
                            tinggi
                        </p>
                    </div>

                    <!-- Box 6: Pengakuan Profesional -->
                    <div
                        class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl hover-lift border border-white/50 group cursor-pointer">
                        <div
                            class="bg-gradient-to-br from-green-400 to-green-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                            <i class="fas fa-star text-white text-2xl group-hover:animate-spin relative z-10"></i>
                        </div>
                        <h3
                            class="text-xl font-bold text-[#1D4E89] mb-4 group-hover:text-green-600 transition-colors duration-300">
                            Pengakuan Profesional
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            Dapatkan pengakuan sebagai pendidik berkualitas tinggi yang memenuhi standar kompetensi nasional
                        </p>
                    </div>
                </div>
            </div>
            <style>
                .animate-fadeIn {
                    animation: fadeIn 1s ease-in-out;
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .hover-lift {
                    transition: all 0.3s ease-in-out;
                }

                .hover-lift:hover {
                    transform: translateY(-8px) scale(1.02);
                }

                .hover-lift:active {
                    transform: translateY(-4px) scale(0.98);
                }

                @keyframes shimmer {
                    0% {
                        transform: translateX(-100%);
                    }

                    100% {
                        transform: translateX(100%);
                    }
                }

                .animate-shimmer {
                    animation: shimmer 2s infinite;
                }

                .animate-bounce {
                    animation: bounce 1s infinite;
                }

                .animate-spin {
                    animation: spin 2s linear infinite;
                }

                .animate-pulse {
                    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
                }

                .animate-ping {
                    animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
                }

                @keyframes bounce {

                    0%,
                    100% {
                        transform: translateY(-25%);
                        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
                    }

                    50% {
                        transform: none;
                        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
                    }
                }

                @keyframes spin {
                    to {
                        transform: rotate(360deg);
                    }
                }

                @keyframes pulse {
                    50% {
                        opacity: .5;
                    }
                }

                @keyframes ping {

                    75%,
                    100% {
                        transform: scale(2);
                        opacity: 0;
                    }
                }
            </style>
        </section>
        {{-- End Apa yang guru dapatkan --}}

        {{-- Langkah Pembayaran --}}
        {{-- <section class="relative mt-32 max-w-6xl mx-auto px-4 py-12">
            <!-- Header with gradient background -->
            <div class="bg-gradient-to-r from-teal-400 to-blue-500 rounded-3xl p-8 text-white shadow-2xl mb-12">
                <h1 class="text-2xl md:text-3xl font-bold text-center mb-4">
                    Cara Transaksi Paket di Teaching & Learning Certification
                </h1>
                <p class="text-center text-lg opacity-90">
                    Ikuti langkah-langkah mudah berikut untuk memulai sertifikasi Anda
                </p>
            </div>

            <!-- Main content container -->
            <div class="bg-white rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 border border-gray-200">

                <!-- Steps 1-4 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                    <!-- Step 1 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-play text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            1
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Kunjungi tlc.com</h3>
                        <p class="text-gray-600 text-sm">Ketik TLC.com di browser</p>

                    </div>

                    <!-- Step 2 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-check text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            2
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pastikan kategori sesuai</h3>
                        <p class="text-gray-600 text-sm">Pilih kategori sesuai paket</p>
                        <div class="flex justify-center mt-4">
                            <i class="fas fa-arrow-right text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-shopping-cart text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            3
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih produk TLC</h3>
                        <p class="text-gray-600 text-sm">Pilih produk TLC</p>
                        <div class="flex justify-center mt-4">
                            <i class="fas fa-arrow-right text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-bookmark text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            4
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih paket langganan</h3>
                        <p class="text-gray-600 text-sm">Pilih paket langganan</p>
                        <div class="flex justify-center mt-4">
                            <i class="fas fa-arrow-right text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Steps 5-8 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- Step 5 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-file-alt text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            5
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih kode diskon</h3>
                        <p class="text-gray-600 text-sm">Pilih kode diskon</p>
                        <div class="flex justify-center mt-4">
                            <i class="fas fa-arrow-right text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-file-invoice text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            6
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Halaman draft invoice</h3>
                        <p class="text-gray-600 text-sm">Halaman draft invoice</p>
                        <div class="flex justify-center mt-4">
                            <i class="fas fa-arrow-right text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Step 7 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-credit-card text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            7
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih metode pembayaran</h3>
                        <p class="text-gray-600 text-sm">Pilih metode pembayaran</p>
                        <div class="flex justify-center mt-4">
                            <i class="fas fa-arrow-right text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Step 8 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-download text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            8
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Lihat invoice pembayaran</h3>
                        <p class="text-gray-600 text-sm">Lihat invoice pembayaran</p>
                    </div>
                </div>
            </div>
            <style>
                .step-card {
                    transition: all 0.3s ease;
                }

                .step-card:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                }
            </style>
        </section> --}}
        <section class="relative mt-32 max-w-6xl mx-auto px-4 py-12">
            <!-- Header with gradient background -->
            <div class="bg-gradient-to-r from-teal-400 to-blue-500 rounded-3xl p-8 text-white shadow-2xl mb-12">
                <h1 class="text-2xl md:text-3xl font-bold text-center mb-4">
                    🧾 Alur Pembayaran Sertifikasi TLC
                </h1>
                <p class="text-center text-lg opacity-90">
                    Ikuti langkah-langkah mudah berikut untuk memulai sertifikasi Anda
                </p>
            </div>

            <!-- Main content container -->
            <div class="bg-white rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 border border-gray-200">

                <!-- Steps 1-4 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                    <!-- Step 1 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-play text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            1
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Buka Website</h3>
                        <p class="text-gray-600 text-sm">Ketik tlc.office.hafecs.id di browser kamu</p>

                    </div>

                    <!-- Step 2 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-check text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            2
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih Kategori Sesuai</h3>
                        <p class="text-gray-600 text-sm">Pilih jenis paket atau sertifikasi (Level A, B, atau C) yang sesuai dengan kebutuhan kamu</p>

                    </div>

                    <!-- Step 3 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-shopping-cart text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            3
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih Produk</h3>
                        <p class="text-gray-600 text-sm">Klik pada produk sertifikasi yang ingin kamu ikuti</p>

                    </div>

                    <!-- Step 4 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-bookmark text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            4
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih Paket Langganan</h3>
                        <p class="text-gray-600 text-sm">Tentukan paket/langganan yang kamu inginkan</p>

                    </div>
                </div>

                <!-- Steps 5-8 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- Step 5 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-file-alt text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            5
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">(Opsional) Masukkan Kode Diskon</h3>
                        <p class="text-gray-600 text-sm">Jika kamu punya kode voucher atau diskon, masukkan di sini</p>

                    </div>

                    <!-- Step 6 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-file-invoice text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            6
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Lihat Draft Invoice</h3>
                        <p class="text-gray-600 text-sm">Kamu akan diarahkan ke halaman yang menampilkan ringkasan pembayaran (draft invoice)</p>

                    </div>

                    <!-- Step 7 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-credit-card text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            7
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Pilih Metode Pembayaran</h3>
                        <p class="text-gray-600 text-sm">Pilih metode pembayaran yang kamu suka (transfer bank, e-wallet, dll). Sistem akan menggunakan Midtrans untuk proses ini</p>

                    </div>

                    <!-- Step 8 -->
                    <div class="step-card bg-gray-50 rounded-2xl p-6 text-center relative">
                        <div
                            class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-download text-white text-2xl"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm absolute top-4 right-4">
                            8
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Lihat dan Simpan Invoice</h3>
                        <p class="text-gray-600 text-sm">Setelah berhasil membayar, kamu akan diarahkan ke halaman konfirmasi dan bisa melihat invoice pembayaran</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Langkah Pembayaran --}}

        {{-- Testimoni --}}
        <section class="w-full py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 via-white to-orange-50"
            id="testimoni">
            <div class="max-w-7xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-12">
                    <span
                        class="inline-block px-6 py-2 bg-orange-100 text-[#E76F51] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">
                        TESTIMONI PENGGUNA
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-[#1D4E89] mb-4">Apa Kata Mereka?</h2>
                    <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                        Pengalaman dan testimonial dari para pengguna program TLC
                    </p>
                </div>

                @if (isset($featuredTestimonials) && $featuredTestimonials->count() > 0)
                    <!-- Grid Testimonials -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
                        @foreach ($featuredTestimonials as $index => $testimonial)
                            <div
                                class="testimonial-card bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                                <!-- Rating Stars -->
                                <div class="flex justify-center mb-4">
                                    <div class="flex text-lg text-yellow-400">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span>★</span>
                                        @endfor
                                    </div>
                                </div>

                                <!-- Quote -->
                                <div class="mb-6 flex-grow">
                                    <p class="text-gray-700 italic text-center text-base leading-relaxed line-clamp-4">
                                        "{{ Str::limit($testimonial->content, 150) }}"
                                    </p>
                                </div>

                                <!-- User Profile -->
                                <div class="flex flex-col items-center">
                                    <!-- Avatar with Initials -->
                                    @php
                                        $nameParts = explode(' ', $testimonial->user->name);
                                        $initials = strtoupper(
                                            substr($testimonial->user->name, 0, 1) .
                                                (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''),
                                        );
                                        $colors = [
                                            'bg-[#E76F51]',
                                            'bg-[#1D4E89]',
                                            'bg-yellow-500',
                                            'bg-green-500',
                                            'bg-purple-500',
                                        ];
                                        $colorIndex = $index % count($colors);
                                        $selectedColor = $colors[$colorIndex];
                                    @endphp

                                    <div
                                        class="w-12 h-12 rounded-full {{ $selectedColor }} flex items-center justify-center mb-3 shadow-md">
                                        <span class="text-lg font-bold text-white">{{ $initials }}</span>
                                    </div>

                                    <!-- User Info -->
                                    <div class="text-center">
                                        <h4 class="text-lg font-semibold text-[#1D4E89] mb-1">
                                            {{ $testimonial->user->name }}
                                        </h4>
                                        <p class="text-sm text-gray-600 mb-2">
                                            {{ $testimonial->user->position ?? 'Peserta Program TLC' }}
                                        </p>
                                        @if ($testimonial->category)
                                            <span
                                                class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">
                                                {{ $testimonial->category->name }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="text-center mt-4 pt-4 border-t border-gray-100">
                                    <span class="text-xs text-gray-500">
                                        {{ $testimonial->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Show More Button -->
                    @if ($featuredTestimonials->count() > 3)
                        <div class="text-center mt-10">
                            <button
                                class="px-6 py-3 bg-[#1D4E89] text-white rounded-full hover:bg-[#E76F51] transition-colors duration-300 shadow-lg">
                                Lihat Testimonial Lainnya
                            </button>
                        </div>
                    @endif
                @else
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="max-w-sm mx-auto">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.418 8-9 8a9.957 9.957 0 01-5.656-1.757l-4.656 1.257a1 1 0 01-1.257-1.257l1.257-4.656A9.957 9.957 0 013 12c0-4.418 4.418-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Testimonial</h3>
                            {{-- <p class="text-gray-500">Testimonial dari pengguna akan muncul di sini setelah disetujui oleh
                                admin.</p> --}}
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <style>
            .testimonial-card {
                animation: fadeInUp 0.6s ease-out forwards;
                opacity: 0;
            }

            /* Staggered animation */
            .testimonial-card:nth-child(1) {
                animation-delay: 0.1s;
            }

            .testimonial-card:nth-child(2) {
                animation-delay: 0.2s;
            }

            .testimonial-card:nth-child(3) {
                animation-delay: 0.3s;
            }

            .testimonial-card:nth-child(4) {
                animation-delay: 0.4s;
            }

            .testimonial-card:nth-child(5) {
                animation-delay: 0.5s;
            }

            .testimonial-card:nth-child(6) {
                animation-delay: 0.6s;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Line clamping for text */
            .line-clamp-4 {
                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .testimonial-card {
                    margin-bottom: 1.5rem;
                }
            }
        </style>
        {{-- Testimoni --}}
    </section>

    <script src="https://kit.fontawesome.com/yourkitcode.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/asesiDashboard.js') }}" defer></script>
@endsection