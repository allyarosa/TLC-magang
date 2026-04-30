        <main id="home" class="w-full scroll-mt-24 relative overflow-hidden min-h-screen">
            <!-- Background Image (desktop only) -->
            <div class="absolute inset-0 hidden md:block">
                <img src="{{ asset('images/about-us.webp') }}" alt="Background TLC" class="w-full h-full object-cover"
                    loading="eager">
                <!-- Dark overlay so text is readable -->
                <div class="absolute inset-0 bg-[#0A1446CC] backdrop-blur-md opacity-60"></div>
            </div>
            <!-- Mobile background fallback -->
            <div class="absolute inset-0 block md:hidden bg-gradient-to-br from-blue-50 via-white to-orange-50"></div>
            <!-- Content wrapper -->
            <div class="relative z-10 px-5 md:py-10">
                <div
                    class="container mx-auto max-w-7xl view grid grid-cols-12 transition-all duration-500 ease-in-out mb-16 py-16 md:py-0">
                    <div class="col-span-12 lg:col-span-7 pt-0 sm:p-5">
                        <div class="animate-fadeIn">
                            <h1
                                class="text-3xl sm:text-4xl md:text-6xl font-extrabold text-brandBlue md:text-white leading-tight mt-20">
                                <span class="relative inlinae-block">
                                    <span class="relative z-10">Thrive.</span>
                                </span>
                                <span class="relative inline-block">
                                    <span class="relative z-10">Teach.</span>
                                </span>
                                <span class="relative inline-block">
                                    <span class="relative z-10">Thrive.</span>
                                </span>
                            </h1>
                            <h2
                                class="text-lg sm:text-2xl md:text-4xl font-bold text-brandOrange md:text-blue-200 mt-2 mb-4">
                                Teaching & Learning Certification
                            </h2>
                            <p
                                class="text-base sm:text-lg md:text-xl text-gray-800 md:text-white/90 text-justify mt-6 max-w-xl leading-relaxed">
                                Program sertifikasi ini bukan sekadar pelatihan, melainkan langkah nyata dalam membekali
                                pendidik dengan strategi pengajaran inovatif untuk menghadirkan perubahan bermakna di
                                dunia
                                pendidikan digital.
                            </p>
                        </div>

                        <div class="flex flex-row sm:flex-row my-8 gap-4">
                            <a href="#harga"
                                class="relative inline-flex items-center justify-center px-4 sm:px-8 py-2 sm:py-4 text-sm sm:text-lg font-semibold sm:font-bold text-white bg-gradient-to-r from-[#1D4E89] to-[#0077b6] rounded-lg sm:rounded-full shadow-lg overflow-hidden">
                                <span class="relative flex items-center">
                                    Lihat Selengkapnya
                                </span>
                            </a>
                            <a href="#vidio"
                                class="bg-white text-[#1D4E89] px-4 sm:px-8 py-2 sm:py-4 rounded-lg sm:rounded-full shadow-md text-sm sm:text-lg font-semibold hover:bg-gray-100 transition-all duration-300 active:scale-95 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>
                                    Lihat Video
                                </span>
                            </a>
                        </div>

                        <div class="mt-10">
                            <p class="text-gray-600 md:text-white/70 font-sm sm:font-base font-medium mb-4">
                                Dipercaya oleh institusi pendidikan terkemuka:
                            </p>
                            <div class="flex flex-wrap gap-6 items-center justify-start">
                                {{-- <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/smpit-an-nur.png') }}" alt="SMPIT An-Nur"
                                    class="h-16 transition-transform duration-300" loading="lazy">
                            </div> --}}
                                <div
                                    class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                    <img src="{{ asset('images/smp-sma-gibs.png') }}"
                                        alt="Global Islamic Boarding School Logo"
                                        class="h-16 transition-transform duration-300" loading="lazy">
                                </div>
                                <div
                                    class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                    <img src="{{ asset('images/hafecs.png') }}" alt="HAFECS"
                                        class="h-12 transition-transform duration-300" loading="lazy" alt="HAFECS Logo">
                                </div>
                                <div
                                    class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                    <img src="{{ asset('images/hrp.png') }}" alt="HAFECS Research & Publication"
                                        class="h-16 transition-transform duration-300" loading="lazy" alt="HRP Logo">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div
                        class="hidden lg:flex col-span-12 lg:col-span-5 items-center justify-center relative mt-5 lg:mt-0">
                        <div
                            class="absolute top-0 right-10 w-20 h-20 bg-[#E76F51]/30 rounded-full animate-float hover:scale-125 transition-transform duration-300">
                        </div>
                        <div class="absolute bottom-10 left-10 w-16 h-16 bg-yellow-300/40 rounded-full animate-float hover:scale-125 transition-transform duration-300"
                            style="animation-delay: 2s"></div>
                        <div class="absolute top-1/2 -right-4 w-12 h-12 bg-[#1D4E89]/30 rounded-full animate-float hover:scale-125 transition-transform duration-300"
                            style="animation-delay: 4s"></div>
                        <div class="absolute -top-4 left-20 w-10 h-10 bg-blue-300/30 rounded-full animate-float hover:scale-125 transition-transform duration-300"
                            style="animation-delay: 1s"></div>

                        <div
                            class="relative w-full max-w-md aspect-square flex items-center justify-center animate-float">
                            <img src="{{ asset('images/logoTlcPng.png') }}"
                                class="w-full h-full object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500"
                                alt="TLC Logo Floating" loading="lazy">
                        </div>
                    </div> -->
                </div>
            </div><!-- end content wrapper -->
        </main>