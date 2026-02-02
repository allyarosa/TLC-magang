<div>
    <!-- We must ship. - Taylor Otwell -->
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
                        {!! $siteInfo->description ?? 'Program sertifikasi untuk memberdayakan pendidik dengan pengetahuan dan keterampilan mengajar yang efektif.' !!}
                    </p>
                    <div class="flex space-x-4 mt-3">
                        {{-- FACEBOOK --}}
                        <a href="{{ $siteInfo->facebook ?? '#' }}" target="_blank"
                            class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>

                        {{-- INSTAGRAM --}}
                        <a href="{{ $siteInfo->instagram ?? '#' }}" target="_blank"
                            class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>

                        <a href="{{ $siteInfo->linkedin ?? '#' }}" target="_blank"
                            class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                        
                        @if(isset($siteInfo->youtube))
                        <a href="{{ $siteInfo->youtube }}" target="_blank"
                            class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-youtube text-lg"></i>
                        </a>
                        @endif
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
                                <a href="#about"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-1 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Tentang Program TLC
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#visimisi"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-1 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Visi dan Misi
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#manfaatProgram"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-1 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Manfaat Program
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#skema"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-1 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Skema
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-1 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Program Sertifikasi
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
                                {!! $siteInfo->address ?? 'Jl. Trans Kalimantan KM.12. No 12, RW.12, Sungai Lumbah, Kec. Alalak, Kabupaten Barito Kuala, Kalimantan Selatan 70582' !!}
                            </span>
                        </li>
                        <li class="flex items-center md:justify-end group">
                            <i
                                class="fas fa-phone-alt text-orange-400 text-lg md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span
                                class="ml-3 md:ml-0 text-gray-300 hover:text-orange-400 transition-colors md:order-1">
                                <a href="https://wa.me/{{ $siteInfo->whatsapp ?? '6285216164164' }}?text=Halo%20saya%20tertarik%20dengan%20layanan%20Anda"
                                    target="_blank">
                                    Chat via WhatsApp
                                </a>

                            </span>
                        </li>
                        <li class="flex items-center md:justify-end group">
                            <i
                                class="fas fa-envelope text-orange-400 text-lg md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span
                                class="ml-3 md:ml-0 text-gray-300 hover:text-orange-400 transition-colors md:order-1">
                                <a href="mailto:{{ $siteInfo->email ?? 'lskhafecs@gmail.com' }}">{{ $siteInfo->email ?? 'lskhafecs@gmail.com' }}</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-4 border-t border-gray-500 text-center text-gray-400 text-sm">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>© 2026 Teaching and Learning Certification Program. All rights reserved.</p>
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
        <!-- WhatsApp Floating Button -->
        <div>
            <a href="https://wa.me/{{ $siteInfo->whatsapp ?? '6285216164164' }}?text=Saya%20ingin%20bertanya%20tentang%20produk%20Anda"
                target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp"
                class="fixed right-4 bottom-4 z-50 flex items-center justify-center w-12 h-12 md:w-14 md:h-14 rounded-full bg-green-500 shadow-xl transform transition duration-150 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-300">
                <!-- WhatsApp SVG (simple, retina-ready) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.373 0 .002 5.373.002 12c0 2.116.55 4.177 1.594 6.004L0 24l6.221-1.617A11.944 11.944 0 0 0 12 24c6.627 0 12-5.373 12-12 0-3.192-1.24-6.197-3.48-8.52zM12 21.5c-1.89 0-3.74-.51-5.36-1.47l-.38-.22-3.7.96.98-3.62-.24-.37A9.498 9.498 0 0 1 2.5 12 9.5 9.5 0 1 1 12 21.5zm5.21-7.88c-.29-.14-1.72-.85-1.99-.95-.27-.11-.47-.17-.67.17-.2.34-.77.95-.95 1.15-.18.2-.36.23-.65.08-1.77-.9-2.93-1.6-4.11-3.01-.31-.37.31-.34.91-1.11.1-.14.05-.26-.03-.38-.08-.11-.67-1.62-.92-2.22-.24-.57-.49-.49-.67-.5-.17-.01-.37-.01-.57-.01-.19 0-.5.07-.77.34-.27.27-1.03 1.01-1.03 2.46 0 1.45 1.05 2.86 1.2 3.06.15.2 2.07 3.3 5.02 4.5 2.95 1.19 2.95.79 3.48.74.53-.05 1.72-.7 1.97-1.39.25-.69.25-1.28.18-1.39-.07-.11-.27-.17-.56-.31z" />
                </svg>
            </a>
        </div>
        <!-- FontAwesome Script untuk Icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
    </footer>
</div>

