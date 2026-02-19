@extends('layouts.app')

@section('title', 'Teaching and Learning Certification')

@section('content')
    {{-- <x-cta-popup /> --}}

    <div class="bg-abu">

        <!-- HOME -->
        <main id="home"
            class="w-full scroll-mt-24 px-5 md:py-10 bg-gradient-to-br from-blue-50 via-white to-orange-50 text-gray-900">
            <div class="container mx-auto max-w-7xl view grid grid-cols-12 transition-all duration-500 ease-in-out mb-16">
                <div class="col-span-12 lg:col-span-7 p-5">
                    <div class="animate-fadeIn">
                        <span
                            class="hidden md:inline-block text-lg text-[#E76F51] font-semibold inline-block px-4 py-1 bg-orange-100 rounded-full">
                            #TRANSFORMASI PENDIDIKAN ERA DIGITAL
                        </span>
                        <h1
                            class="text-5xl md:text-6xl font-extrabold text-brandBlue leading-tight mt-4">
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
                        <h2 class="text-4xl font-bold text-[#1D4E89] mt-2 mb-4">
                            Teaching & Learning Certification
                        </h2>
                        <p class="text-xl text-gray-800 text-justify mt-6 max-w-xl leading-relaxed">
                            Program sertifikasi ini bukan sekadar pelatihan, melainkan langkah nyata dalam membekali
                            pendidik dengan strategi pengajaran inovatif untuk menghadirkan perubahan bermakna di dunia
                            pendidikan digital.
                        </p>

                    </div>

                    <div class="flex flex-col sm:flex-row my-8 gap-4">
                        <a href="{{ route('register') }}"
                            class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-gradient-to-r from-[#1D4E89] to-[#0077b6] rounded-full shadow-lg hover:shadow-blue-500/40 hover:shadow-xl active:shadow-md overflow-hidden">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-[#14406B] to-[#005f8d] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative flex items-center">
                                Daftar Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20"
                                    fill="currentColo`r">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                        <a href="#vidio"
                            class="bg-white border-2 border-[#1D4E89] text-[#1D4E89] px-8 py-4 rounded-xl shadow-md text-lg font-semibold hover:bg-gray-100 transition-all duration-300 active:scale-95 flex items-center justify-center">
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
                        <p class="text-gray-600 font-medium mb-4">Dipercaya oleh institusi pendidikan terkemuka:</p>
                        <div class="flex flex-wrap gap-6 items-center justify-start">
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/smpit-an-nur.png') }}" alt="SMPIT An-Nur"
                                    class="h-16 transition-transform duration-300" loading="lazy">
                            </div>
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/smp-sma-gibs.png') }}" alt="Global Islamic Boarding School"
                                    class="h-16 transition-transform duration-300" loading="lazy">
                            </div>
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/hafecs.png') }}" alt="HAFECS"
                                    class="h-12 transition-transform duration-300" loading="lazy">
                            </div>
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/hrp.png') }}" alt="HAFECS Research & Publication"
                                    class="h-16 transition-transform duration-300" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:flex col-span-12 lg:col-span-5 items-center justify-center relative mt-5 lg:mt-0">
                    <!-- Floating Circles Background -->
                    <div class="absolute top-0 right-10 w-20 h-20 bg-[#E76F51]/30 rounded-full animate-float hover:scale-125 transition-transform duration-300"></div>
                    <div class="absolute bottom-10 left-10 w-16 h-16 bg-yellow-300/40 rounded-full animate-float hover:scale-125 transition-transform duration-300" style="animation-delay: 2s"></div>
                    <div class="absolute top-1/2 -right-4 w-12 h-12 bg-[#1D4E89]/30 rounded-full animate-float hover:scale-125 transition-transform duration-300" style="animation-delay: 4s"></div>
                    <div class="absolute -top-4 left-20 w-10 h-10 bg-blue-300/30 rounded-full animate-float hover:scale-125 transition-transform duration-300" style="animation-delay: 1s"></div>
                    
                    <!-- Floating Icon - reduced size -->
                    <div class="relative w-full max-w-md aspect-square flex items-center justify-center animate-float">
                        <img src="{{ asset('images/logoTlcPng.png') }}"
                            class="w-full h-full object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500"
                            alt="TLC Logo Floating" loading="lazy">
                    </div>
                </div>
            </div>
        </main>
        <!-- End Home -->

        {{-- <!-- CTA -->
        <section id="calltoaction" class="w-full px-5 py-16 bg-gray-50 text-gray-900 shadow-lg">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">Level Up Kompetensimu. Mulai Sertifikasi TLC!</h2>
            </div>
            <a href="{{ route('register') }}"
                class="bg-[#1D4E89] text-white px-8 py-4 rounded-xl shadow-lg text-lg font-semibold hover:bg-[#14406B] transition-all duration-300 hover:scale-105 active:scale-95 flex items-center justify-center">
                <span>Daftar Sekarang</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </section>
        <!-- End CTA --> --}}

        <!-- Apa itu TLC? -->
        <section id="about"
            class="w-full px-5 py-20 bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-900">
            <div class="max-w-7xl mx-auto w-full">
                <div class="text-center mb-16">
                    <span
                        class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] font-semibold rounded-full text-sm mb-3">
                        TENTANG PROGRAM
                    </span>
                    <h2 class="text-5xl font-black text-[#1D4E89] mb-2 tracking-tight">
                        Penjelasan Tentang TLC
                    </h2>
                    <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                    {{-- <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                        Program revolusioner yang mengubah cara guru mengajar dan siswa belajar
                    </p> --}}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    <!-- Gambar dengan label yang ditingkatkan -->
                    <div class="relative rounded-xl overflow-hidden shadow-2xl group h-[500px]">
                        <img src="{{ asset('images/konten_tiga.webp') }}" alt="Teaching Mastery Framework"
                            class="object-cover w-full h-full"
                            loading="lazy">

                        <div class="absolute inset-0 bg-gradient-to-t from-[#1D4E89]/80 to-transparent"></div>

                        <div
                            class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-2">
                            <div
                                class="bg-[#E76F51] text-white px-4 py-2 rounded-lg inline-block text-sm font-semibold shadow-md mb-3">
                                Teaching Mastery Framework
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-2">Metodologi Yang Teruji</h3>
                            <p class="text-white/90 mb-4">Framework yang dirancang khusus untuk meningkatkan efektivitas
                                pengajaran di era digital</p>
                        </div>
                    </div>

                    <div>
                        {{-- <h3 class="text-3xl font-bold text-[#1D4E89] mb-6">Transformasi Mengajar Untuk Era Digital</h3> --}}

                        <p class="leading-relaxed text-gray-800 text-justify text-xl mb-6">
                            <span class="font-semibold text-[#1D4E89]">Teaching and Learning Certification (TLC)</span>
                            adalah langkah nyata menuju pengembangan diri sebagai pendidik unggul. Dengan pendekatan <span
                                class="font-semibold text-[#1D4E89]">Teaching Mastery Framework (TMF)</span>, Anda akan
                            dibekali strategi mengajar yang efektif, relevan, dan mampu menciptakan pengalaman belajar yang
                            bermakna.
                        </p>

                        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-[#1D4E89] mb-8">
                            <h4 class="font-bold text-xl text-[#1D4E89] mb-3">
                                Mengapa TLC Berbeda?
                            </h4>
                            <p class="text-gray-700 text-justify text-lg">
                                Program ini memberikan standar pengajaran berkualitas yang terstruktur dan praktis, membantu
                                para guru mencapai hasil belajar optimal dalam lingkungan pendidikan modern.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Apa itu TLC -->

        <!-- Visi & Misi Section -->
        <section id="visimisi" class="w-full py-20 bg-gradient-to-br from-[#1D4E89]/10 to-white text-gray-900" >

            <div class="max-w-5xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] font-semibold rounded-full text-sm mb-3">
                    VISI DAN MISI
                </span>

                <h2 class="text-3xl sm:text-4xl sm:text-center md:text-5xl font-black text-[#1D4E89] mb-2 tracking-tight">
                    Transformasi Pendidikan Dimulai dari Anda
                </h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                <p
                    class="text-gray-700 max-w-3xl mx-auto text-base sm:text-lg md:text-xl leading-normal sm:leading-relaxed font-medium">
                    Bergabunglah dengan ribuan pendidik profesional yang telah meningkatkan kualitas pengajaran mereka
                    melalui program pengembangan kompetensi guru terdepan di Indonesia.
                </p>
            </div>

            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 mt-16 px-4 md:px-6">
                <!-- Visi - Enhanced dengan 5 item untuk simetri -->
                <div
                    class="bg-white p-6 md:p-10 rounded-2xl shadow-lg border-l-4 border-[#1D4E89] transition-transform duration-300 ease-in-out hover:scale-102 hover:shadow-xl relative overflow-hidden group h-full flex flex-col">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#1D4E89]/5 rounded-full blur-2xl group-hover:bg-[#1D4E89]/10 transition-all duration-500">
                    </div>

                    <div class="flex items-center gap-5 mb-6 relative z-10">
                        <div class="bg-[#A8DADC] p-4 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-[#1D4E89]" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-[#1D4E89]">Visi Kami</h3>
                    </div>

                    <p class="text-gray-700 text-xl text-left text-justify leading-relaxed relative z-10 mb-8">
                        Menjadi <span class="font-bold text-[#1D4E89]">lembaga sertifikasi kompetensi unggul</span> yang
                        mendorong peningkatan kualitas pendidikan dan pengembangan sumber daya manusia melalui uji
                        kompetensi berkualitas tinggi.
                    </p>

                    <ul class="space-y-5 text-gray-700 text-lg relative z-10 flex-grow">
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#1D4E89] text-3xl mt-1 group-hover/item:scale-125 transition-transform">🏆</span>
                            <div>
                                <span class="font-bold text-[#1D4E89]">Standar Keunggulan</span>
                                <p class="text-gray-600 mt-1">Menetapkan standar tertinggi dalam sertifikasi kompetensi
                                    pendidikan dan pelatihan</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#1D4E89] text-3xl mt-1 group-hover/item:scale-125 transition-transform">🚀</span>
                            <div>
                                <span class="font-bold text-[#1D4E89]">Pengembangan SDM</span>
                                <p class="text-gray-600 mt-1">Fokus pada peningkatan kualitas sumber daya manusia dalam
                                    bidang pendidikan</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#1D4E89] text-3xl mt-1 group-hover/item:scale-125 transition-transform">🎓</span>
                            <div>
                                <span class="font-bold text-[#1D4E89]">Uji Kompetensi Berkualitas</span>
                                <p class="text-gray-600 mt-1">Menyelenggarakan uji kompetensi yang komprehensif dan
                                    berkualitas tinggi</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#1D4E89] text-3xl mt-1 group-hover/item:scale-125 transition-transform">🌟</span>
                            <div>
                                <span class="font-bold text-[#1D4E89]">Kredibilitas Nasional</span>
                                <p class="text-gray-600 mt-1">Membangun reputasi sebagai lembaga sertifikasi terpercaya di
                                    tingkat nasional</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#1D4E89] text-3xl mt-1 group-hover/item:scale-125 transition-transform">💎</span>
                            <div>
                                <span class="font-bold text-[#1D4E89]">Dampak Berkelanjutan</span>
                                <p class="text-gray-600 mt-1">Menciptakan dampak positif jangka panjang bagi ekosistem
                                    pendidikan Indonesia</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Misi - Enhanced -->
                <div
                    class="bg-white p-6 md:p-10 rounded-2xl shadow-lg border-l-4 border-[#2A9D8F] transition-transform duration-300 ease-in-out hover:scale-102 hover:shadow-xl relative overflow-hidden group h-full flex flex-col">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#2A9D8F]/5 rounded-full blur-2xl group-hover:bg-[#2A9D8F]/10 transition-all duration-500">
                    </div>

                    <div class="flex items-center gap-5 mb-6 relative z-10">
                        <div class="bg-[#A8DADC] p-4 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-[#2A9D8F]" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-[#2A9D8F]">Misi Kami</h3>
                    </div>

                    <p class="text-gray-700 text-xl text-left text-justify leading-relaxed relative z-10 mb-8">
                        Memberikan <span class="font-bold text-[#2A9D8F]">sertifikasi berkualitas tinggi</span> sambil
                        mendorong pengembangan kurikulum relevan dan memfasilitasi pendidikan berkualitas dengan
                        mengutamakan kepuasan peserta serta menjunjung tinggi etika dan integritas.
                    </p>

                    <ul class="space-y-5 text-gray-700 text-lg relative z-10 flex-grow">
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#2A9D8F] text-3xl mt-1 group-hover/item:scale-125 transition-transform">🎯</span>
                            <div>
                                <span class="font-bold text-[#2A9D8F]">Sertifikasi Berkualitas</span>
                                <p class="text-gray-600 mt-1">Memberikan sertifikasi yang berkualitas dengan standar
                                    internasional dan kredibilitas tinggi</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#2A9D8F] text-3xl mt-1 group-hover/item:scale-125 transition-transform">📚</span>
                            <div>
                                <span class="font-bold text-[#2A9D8F]">Kurikulum Relevan</span>
                                <p class="text-gray-600 mt-1">Mendorong pengembangan kurikulum yang sesuai dengan kebutuhan
                                    industri dan perkembangan zaman</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#2A9D8F] text-3xl mt-1 group-hover/item:scale-125 transition-transform">🎓</span>
                            <div>
                                <span class="font-bold text-[#2A9D8F]">Pendidikan Berkualitas</span>
                                <p class="text-gray-600 mt-1">Memfasilitasi pendidikan dan pelatihan berkualitas dengan
                                    metode pembelajaran terdepan</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#2A9D8F] text-3xl mt-1 group-hover/item:scale-125 transition-transform">🤝</span>
                            <div>
                                <span class="font-bold text-[#2A9D8F]">Mitra Strategis</span>
                                <p class="text-gray-600 mt-1">Berperan sebagai mitra strategis dengan mengutamakan kepuasan
                                    peserta dan integritas profesional</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group/item">
                            <span
                                class="text-[#2A9D8F] text-3xl mt-1 group-hover/item:scale-125 transition-transform">💡</span>
                            <div>
                                <span class="font-bold text-[#2A9D8F]">Inovasi & Kolaborasi</span>
                                <p class="text-gray-600 mt-1">Berinovasi berkelanjutan dan berkolaborasi dengan menjunjung
                                    tinggi etika dan integritas</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Visi & Misi -->

        <!-- Manfaat TLC -->
        <section id="manfaatProgram" class="w-full py-24 bg-gradient-to-t from-[#1D4E89]/5 to-white text-gray-900">
            <div class="max-w-6xl mx-auto text-center px-6">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] font-semibold rounded-full text-sm mb-3">
                    MANFAAT PROGRAM
                </span>
                <h2 class="text-5xl font-black text-[#1D4E89] mt-2 tracking-tight">Transformasi Karir yang Nyata</h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-8 mx-auto rounded-full"></div>
                <p class="text-gray-800 max-w-3xl mx-auto text-xl leading-relaxed">
                    Program Teaching and Learning Certification memberikan manfaat konkret yang telah terbukti mengubah
                    perjalanan karir
                    ribuan pendidik profesional di Indonesia.
                </p>
            </div>

            <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 mt-10 px-6">

                <!-- Sertifikat Kompetensi ber-NPSN -->
                <div
                    class="group bg-white p-8 rounded-3xl shadow-lg border-l-4 border-[#1D4E89] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#1D4E89]/5 rounded-full blur-2xl group-hover:bg-[#1D4E89]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-md group-hover:bg-[#1D4E89] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#1D4E89] text-4xl group-hover:text-white transition-colors duration-300">🏅</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#1D4E89] group-hover:text-[#E76F51] transition-colors">
                            Sertifikat NPSN Resmi
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg text-justify relative z-10 leading-relaxed">
                        Dapatkan <span class="font-bold text-[#1D4E89]">pengakuan resmi pemerintah</span> dengan sertifikat
                        berstandar nasional. Tercatat dalam database Kemendikbud untuk <span
                            class="text-[#2A9D8F] font-semibold">kredibilitas karir terdepan.</span>
                    </p>
                    <div class="mt-4 relative z-10">
                        <div
                            class="inline-flex items-center gap-2 bg-[#1D4E89]/10 px-3 py-1 rounded-full text-sm font-semibold text-[#1D4E89]">
                            ✅ Diakui Kemendikbud
                        </div>
                    </div>
                </div>

                <!-- Gelar Non-Formal -->
                <div
                    class="group bg-white p-8 rounded-3xl shadow-lg border-l-4 border-[#2A9D8F] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#2A9D8F]/5 rounded-full blur-2xl group-hover:bg-[#2A9D8F]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-md group-hover:bg-[#2A9D8F] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#2A9D8F] text-4xl group-hover:text-white transition-colors duration-300">🎓</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#2A9D8F] group-hover:text-[#E76F51] transition-colors">
                            Gelar Profesional
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg text-justify relative z-10 leading-relaxed">
                        Raih <span class="font-bold text-[#2A9D8F]">gelar non-formal bergengsi</span> yang meningkatkan
                        kredibilitas profesional Anda. Tambahkan prestise pada profil LinkedIn dan CV dengan <span
                            class="text-[#1D4E89] font-semibold">pengakuan kompetensi formal.</span>
                    </p>
                    <div class="mt-4 relative z-10">
                        <div
                            class="inline-flex items-center gap-2 bg-[#2A9D8F]/10 px-3 py-1 rounded-full text-sm font-semibold text-[#2A9D8F]">
                            🏆 Gelar Tersertifikasi
                        </div>
                    </div>
                </div>

                <!-- Rapor Hasil Ujian -->
                <div
                    class="group bg-white p-8 rounded-3xl shadow-lg border-l-4 border-[#E76F51] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#E76F51]/5 rounded-full blur-2xl group-hover:bg-[#E76F51]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-md group-hover:bg-[#E76F51] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#E76F51] text-4xl group-hover:text-white transition-colors duration-300">📊</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#E76F51] group-hover:text-[#1D4E89] transition-colors">
                            Analisis Kompetensi
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg text-justify relative z-10 leading-relaxed">
                        Dapatkan <span class="font-bold text-[#E76F51]">laporan komprehensif</span> tentang kekuatan dan
                        area pengembangan Anda. Termasuk <span class="text-[#2A9D8F] font-semibold">rekomendasi
                            personal</span> untuk peningkatan karir berkelanjutan.
                    </p>
                    <div class="mt-4 relative z-10">
                        <div
                            class="inline-flex items-center gap-2 bg-[#E76F51]/10 px-3 py-1 rounded-full text-sm font-semibold text-[#E76F51]">
                            📈 Evaluasi Mendalam
                        </div>
                    </div>
                </div>

                <!-- Worksheet & Tools -->
                <div
                    class="group bg-white p-8 rounded-3xl shadow-lg border-l-4 border-[#1D4E89] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#1D4E89]/5 rounded-full blur-2xl group-hover:bg-[#1D4E89]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-md group-hover:bg-[#1D4E89] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#1D4E89] text-4xl group-hover:text-white transition-colors duration-300">📝</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#1D4E89] group-hover:text-[#E76F51] transition-colors">
                            Toolkit Premium
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg text-justify relative z-10 leading-relaxed">
                        Akses <span class="font-bold text-[#1D4E89]">worksheet interaktif</span> dan template siap pakai
                        yang terbukti meningkatkan efektivitas mengajar. <span class="text-[#2A9D8F] font-semibold">Hemat
                            waktu persiapan</span> mengajar Anda secara signifikan.
                    </p>
                    <div class="mt-4 relative z-10">
                        <div
                            class="inline-flex items-center gap-2 bg-[#1D4E89]/10 px-3 py-1 rounded-full text-sm font-semibold text-[#1D4E89]">
                            🛠️ Template Siap Pakai
                        </div>
                    </div>
                </div>

                <!-- Jaringan Guru Profesional -->
                <div
                    class="group bg-white p-8 rounded-3xl shadow-lg border-l-4 border-[#2A9D8F] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#2A9D8F]/5 rounded-full blur-2xl group-hover:bg-[#2A9D8F]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-md group-hover:bg-[#2A9D8F] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#1D4E89] text-4xl group-hover:text-white transition-colors duration-300">🤝</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#2A9D8F] group-hover:text-[#E76F51] transition-colors">
                            Jaringan Guru Elite
                        </h3>
                    </div>
                    <p class="text-gray-800 max-w-3xl mx-auto text-xl leading-relaxed">
                        Bergabunglah dengan <span class="font-bold text-[#1D4E89]">komunitas eksklusif pendidik
                            profesional</span> terbaik Indonesia. Dapatkan akses peluang karir premium, kolaborasi project,
                        dan <span class="text-[#2A9D8F] font-semibold">mentoring dari senior expert.</span>
                    </p>
                    <div class="mt-4 relative z-10">
                        <div
                            class="inline-flex items-center gap-2 bg-[#2A9D8F]/10 px-3 py-1 rounded-full text-sm font-semibold text-[#2A9D8F]">
                            ∞ Akses Seumur Hidup
                        </div>
                    </div>
                </div>

                <!-- Webinar & Diskusi Eksklusif -->
                <div
                    class="group bg-white p-8 rounded-3xl shadow-lg border-l-4 border-[#E76F51] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#E76F51]/5 rounded-full blur-2xl group-hover:bg-[#E76F51]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-md group-hover:bg-[#E76F51] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#E76F51] text-4xl group-hover:text-white transition-colors duration-300">🎯</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#E76F51] group-hover:text-[#1D4E89] transition-colors">
                            Webinar Eksklusif
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg text-justify relative z-10 leading-relaxed">
                        Bergabung dalam <span class="font-bold text-[#E76F51]">sesi pembelajaran eksklusif</span> dengan
                        pakar pendidikan terkemuka. Dapatkan insight terdepan dan <span
                            class="text-[#2A9D8F] font-semibold">networking premium</span> dalam forum diskusi berkualitas.
                    </p>
                    <div class="mt-4 relative z-10">
                        <div
                            class="inline-flex items-center gap-2 bg-[#E76F51]/10 px-3 py-1 rounded-full text-sm font-semibold text-[#E76F51]">
                            🎤 Live Session Bulanan
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Manfaat --}}

        {{-- Skema --}}
        <section id="skema"
            class="w-full px-5 py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 text-gray-900 relative overflow-hidden">
            <div class="relative z-10">
                <!-- Header Section -->
                <div class="text-center mb-12 md:mb-16">
                    <span
                        class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">JALUR
                        SERTIFIKASI GURU PROFESIONAL</span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">Skema
                        Sertifikasi Pengajaran Guru</h2>
                    <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Tiga level sertifikasi yang
                        dirancang untuk membangun kompetensi guru secara bertahap, dari
                        pengetahuan dasar hingga penguasaan kelas yang komprehensif, dengan metodologi pengajaran efektif
                        berbasis Kurikulum
                        Merdeka</p>
                </div>


                <!-- Process Timeline -->
                <div class="max-w-7xl mx-auto px-4">
                    <!-- Desktop Timeline -->
                    <div class="hidden lg:block relative">
                        <!-- Connection Line -->
                        <div
                            class="absolute top-1/2 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-500 via-green-500 to-purple-500 rounded-full transform -translate-y-1/2 z-0">
                        </div>

                        <div class="grid grid-cols-3 gap-2 relative z-10">
                            <!-- Level A -->
                            <div class="text-center group">
                                <div class="relative mb-6 h-32 flex items-end justify-center">
                                    <div
                                        class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl shadow-2xl flex items-center justify-center transition-all duration-500 group-hover:scale-110">
                                        <i class="fas fa-book-open text-3xl text-white"></i>
                                    </div>
                                    <div
                                        class="absolute top-0 right-1/2 translate-x-1/2 -mr-10 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-sm font-bold text-gray-800 shadow-lg">
                                        A
                                    </div>
                                </div>
                                <div
                                    class="bg-white p-5 rounded-2xl shadow-lg group-hover:shadow-xl transition-all duration-300 border border-blue-100 h-48 flex flex-col">
                                    <h3 class="font-bold text-lg text-blue-800 mb-3">Sertifikasi Level A</h3>
                                    <p class="text-gray-600 text-md text-justify leading-relaxed flex-grow">Membangun pengetahuan dasar
                                        Pedagogical Content Knowledge (PCK) dan pengembangan Higher Order Thinking Skills
                                        (HOTS) sesuai Kurikulum Merdeka.</p>
                                </div>
                                <div class="mt-4 text-sm font-medium text-blue-600">Teaching Knowledge Certification</div>
                            </div>

                            <!-- Level B -->
                            <div class="text-center group">
                                <div class="relative mb-6 h-32 flex items-end justify-center">
                                    <div
                                        class="w-20 h-20 mx-auto bg-gradient-to-br from-green-500 to-green-700 rounded-2xl shadow-2xl flex items-center justify-center transition-all duration-500 group-hover:scale-110">
                                        <i class="fas fa-chalkboard-teacher text-3xl text-white"></i>
                                    </div>
                                    <div
                                        class="absolute top-0 right-1/2 translate-x-1/2 -mr-10 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-sm font-bold text-gray-800 shadow-lg">
                                        B
                                    </div>
                                </div>
                                <div
                                    class="bg-white p-5 rounded-2xl shadow-lg group-hover:shadow-xl transition-all duration-300 border border-green-100 h-48 flex flex-col">
                                    <h3 class="font-bold text-lg text-green-800 mb-3">Sertifikasi Level B</h3>
                                    <p class="text-gray-600 text-md text-justify leading-relaxed flex-grow">Penerapan praktis PCK dan
                                        HOTS di kelas, pengembangan modul ajar inovatif, dan teknik refleksi untuk perbaikan
                                        berkelanjutan.</p>
                                </div>
                                <div class="mt-4 text-sm font-medium text-green-600">Teaching Activation Certification
                                </div>
                            </div>

                            <!-- Level C -->
                            <div class="text-center group">
                                <div class="relative mb-6 h-32 flex items-end justify-center">
                                    <div
                                        class="w-20 h-20 mx-auto bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl shadow-2xl flex items-center justify-center transition-all duration-500 group-hover:scale-110">
                                        <i class="fas fa-trophy text-3xl text-white"></i>
                                    </div>
                                    <div
                                        class="absolute top-0 right-1/2 translate-x-1/2 -mr-10 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-sm font-bold text-gray-800 shadow-lg">
                                        C
                                    </div>
                                </div>
                                <div
                                    class="bg-white p-5 rounded-2xl shadow-lg group-hover:shadow-xl transition-all duration-300 border border-purple-100 h-48 flex flex-col">
                                    <h3 class="font-bold text-lg text-purple-800 mb-3">Sertifikasi Level C</h3>
                                    <p class="text-gray-600 text-md text-justify leading-relaxed flex-grow">Penguasaan komprehensif
                                        melalui lesson plan, Teaching Method Framework (TMF), dan evaluasi berbasis video
                                        recording dengan rubrik terstruktur.</p>
                                </div>
                                <div class="mt-4 text-sm font-medium text-purple-600">Mastery Activation Certification
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile/Tablet Timeline -->
                    <div class="lg:hidden space-y-6 max-w-2xl mx-auto">
                        <!-- Level A -->
                        <div class="flex items-start gap-4 group">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl sm:rounded-2xl shadow-lg flex items-center justify-center transition-all duration-300 group-hover:scale-105">
                                    <i class="fas fa-book-open text-xl sm:text-2xl text-white"></i>
                                </div>
                                <div
                                    class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center text-xs font-bold text-gray-800 shadow-md">
                                    A</div>
                            </div>
                            <div
                                class="bg-white p-4 sm:p-5 rounded-xl sm:rounded-2xl shadow-md flex-1 group-hover:shadow-lg transition-all duration-300 border border-blue-100">
                                <h3 class="font-bold text-lg sm:text-xl text-blue-800 mb-2">Sertifikasi Level A</h3>
                                <p class="text-gray-600 text-sm sm:text-base">Membangun pengetahuan dasar Pedagogical
                                    Content Knowledge (PCK) dan pengembangan Higher Order Thinking Skills (HOTS) sesuai
                                    Kurikulum Merdeka.</p>
                                <div class="mt-2 text-xs sm:text-sm font-medium text-blue-600">Teaching Knowledge
                                    Certification</div>
                            </div>
                        </div>

                        <!-- Connector Arrow -->
                        <div class="flex justify-center -my-2">
                            <svg class="w-6 h-6 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <!-- Level B -->
                        <div class="flex items-start gap-4 group">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-green-500 to-green-700 rounded-xl sm:rounded-2xl shadow-lg flex items-center justify-center transition-all duration-300 group-hover:scale-105">
                                    <i class="fas fa-chalkboard-teacher text-xl sm:text-2xl text-white"></i>
                                </div>
                                <div
                                    class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center text-xs font-bold text-gray-800 shadow-md">
                                    B</div>
                            </div>
                            <div
                                class="bg-white p-4 sm:p-5 rounded-xl sm:rounded-2xl shadow-md flex-1 group-hover:shadow-lg transition-all duration-300 border border-green-100">
                                <h3 class="font-bold text-lg sm:text-xl text-green-800 mb-2">Sertifikasi Level B</h3>
                                <p class="text-gray-600 text-sm sm:text-base">Penerapan praktis PCK dan HOTS di kelas,
                                    pengembangan modul ajar inovatif, dan teknik refleksi untuk perbaikan berkelanjutan.</p>
                                <div class="mt-2 text-xs sm:text-sm font-medium text-green-600">Teaching Activation
                                    Certification</div>
                            </div>
                        </div>

                        <!-- Connector Arrow -->
                        <div class="flex justify-center -my-2">
                            <svg class="w-6 h-6 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <!-- Level C -->
                        <div class="flex items-start gap-4 group">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl sm:rounded-2xl shadow-lg flex items-center justify-center transition-all duration-300 group-hover:scale-105">
                                    <i class="fas fa-trophy text-xl sm:text-2xl text-white"></i>
                                </div>
                                <div
                                    class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center text-xs font-bold text-gray-800 shadow-md">
                                    C</div>
                            </div>
                            <div
                                class="bg-white p-4 sm:p-5 rounded-xl sm:rounded-2xl shadow-md flex-1 group-hover:shadow-lg transition-all duration-300 border border-purple-100">
                                <h3 class="font-bold text-lg sm:text-xl text-purple-800 mb-2">Sertifikasi Level C</h3>
                                <p class="text-gray-600 text-sm sm:text-base">Penguasaan komprehensif melalui lesson plan,
                                    Teaching Method Framework (TMF), dan evaluasi berbasis video recording dengan rubrik
                                    terstruktur.</p>
                                <div class="mt-2 text-xs sm:text-sm font-medium text-purple-600">Mastery Activation
                                    Certification</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Skema -->

        <!-- Paket Harga -->
        <section id="harga" class="w-full py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white to-blue-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12 md:mb-16">
                    <span
                        class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">PROGRAM
                        SERTIFIKASI
                    </span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">
                        Pilih Jalur Sertifikasi Anda
                    </h2>
                    <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Program bertingkat yang
                        disesuaikan dengan kebutuhan dan tujuan karir pendidik</p>
                </div>

                <!-- Course Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <!-- Card Level A -->
                    <div onclick="document.getElementById('modalA').classList.remove('hidden')"
                        class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-xl">
                        <img src="{{ asset('images/levela.png') }}" alt="Banner Level A"
                            class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover">
                        <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                        </div>
                    </div>

                    <!-- Card Level B -->
                    <div onclick="document.getElementById('modalB').classList.remove('hidden')"
                        class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-xl">
                        <img src="{{ asset('images/levelb.png') }}" alt="Banner Level B"
                            class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover">
                        <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                        </div>
                    </div>

                    <!-- Card Level C -->
                    <div onclick="document.getElementById('modalC').classList.remove('hidden')"
                        class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-xl">
                        <img src="{{ asset('images/levelc.png') }}" alt="Banner Level C"
                            class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover">
                        <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Modal --}}
        @foreach (['A', 'B', 'C'] as $level)
            <div id="modal{{ $level }}"
                class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-all duration-300 p-4">
                <div
                    class="bg-white rounded-2xl shadow-2xl w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl mx-auto p-4 sm:p-6 md:p-8 relative transform transition-all duration-500 scale-100 max-h-[90vh] overflow-y-auto">
                    <button onclick="document.getElementById('modal{{ $level }}').classList.add('hidden')"
                        class="absolute top-3 right-3 sm:top-4 sm:right-4 text-gray-400 hover:text-gray-600 transition-colors z-10 bg-white rounded-full p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="flex items-center mb-4 sm:mb-6">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-orange-100 flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                            <span class="text-lg sm:text-xl font-bold text-orange-600">{{ $level }}</span>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 leading-tight">Sertifikasi Level
                            {{ $level }}</h2>
                    </div>

                    <div class="mb-4 sm:mb-6">
                        <div class="h-1 w-12 sm:w-16 bg-orange-500 mb-3 sm:mb-4"></div>
                        <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-2 sm:mb-3 leading-tight">
                            @switch($level)
                                @case('A')
                                    Membangun Fondasi Pedagogical Content Knowledge
                                @break

                                @case('B')
                                    Implementasi Praktis PCK dan HOTS
                                @break

                                @case('C')
                                    Pencapaian Mastery dalam Pengajaran Efektif
                                @break
                            @endswitch
                        </h3>

                        <p class="text-sm sm:text-base text-gray-600 text-justify mb-4 sm:mb-6 leading-relaxed">
                            @switch($level)
                                @case('A')
                                    Sertifikasi Level A dirancang khusus untuk membangun pengetahuan dasar yang wajib dimiliki
                                    setiap guru dalam melakukan pengajaran efektif, terstruktur, dan berdiferensiasi. Program ini
                                    membekali Anda dengan pemahaman mendalam tentang Pedagogical Content Knowledge (PCK) dan
                                    kemampuan mengembangkan Higher Order Thinking Skills (HOTS) yang sesuai dengan tuntutan
                                    Kurikulum Merdeka.
                                @break

                                @case('B')
                                    Sertifikasi Level B menawarkan pendekatan praktik langsung yang bertujuan mengembangkan
                                    kemampuan guru dalam penerapan PCK dan HOTS secara nyata di ruang kelas. Program ini berfokus
                                    pada pembuatan modul ajar inovatif, perancangan skenario pengajaran yang efektif, serta teknik
                                    refleksi dan review yang menghasilkan feedback konstruktif untuk perbaikan berkelanjutan.
                                @break

                                @case('C')
                                    Sertifikasi Level C merupakan puncak pencapaian mastery dalam pengajaran di kelas. Program ini
                                    menuntun Anda untuk merencanakan pembelajaran dalam bentuk lesson plan yang komprehensif,
                                    menerapkan metode Teaching Method Framework (TMF), dan melakukan dokumentasi serta evaluasi
                                    pengajaran melalui video recording dengan rubrik penilaian yang terstruktur untuk refleksi dan
                                    perbaikan berkelanjutan.
                                @break
                            @endswitch
                        </p>

                        <!-- Benefit cards - Responsive Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3 mb-4 sm:mb-6">
                            @switch($level)
                                @case('A')
                                    <div class="flex items-center p-2 sm:p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-orange-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">PCK</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-orange-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">HOTS</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-orange-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">LITERASI</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-orange-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">NUMERASI</span>
                                    </div>
                                @break

                                @case('B')
                                    <div class="flex items-center p-2 sm:p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-blue-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Action Learning</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-blue-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Praktik Langsung</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-blue-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Teaching Scenario</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-blue-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-blue-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Refleksi & Feedback</span>
                                    </div>
                                @break

                                @case('C')
                                    <div class="flex items-center p-2 sm:p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-green-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Video Documentation</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-green-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">TMF Implementation</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-green-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Self Review Mastery</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-green-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-green-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Rubrik Assessment</span>
                                    </div>
                                @break
                            @endswitch
                        </div>
                    </div>

                    <!-- Price and CTA - Responsive Layout -->
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-0">
                        <div class="order-2 sm:order-1">
                            <div class="text-xl sm:text-2xl font-bold text-gray-800 text-center sm:text-left">
                                @switch($level)
                                    @case('A')
                                        <span>
                                            Rp {{ number_format($levelA, 0, ',', '.') }}
                                        </span>
                                    @break

                                    @case('B')
                                        <span>
                                            Rp {{ number_format($levelB, 0, ',', '.') }}
                                        </span>
                                    @break

                                    @case('C')
                                        <span>
                                            Rp {{ number_format($levelC, 0, ',', '.') }}
                                        </span>
                                    @break
                                @endswitch
                            </div>
                        </div>
                        <a href="{{ route('register') }}"
                            class="order-1 sm:order-2 w-full sm:w-auto bg-gradient-to-r from-[#F4A261] to-[#E76F51] hover:from-[#E76F51] hover:to-[#E76F51] text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-bold shadow-lg transform transition-all hover:scale-105 text-center text-sm sm:text-base">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- FAQ Section -->
        <section id="faq" class="w-full px-5 py-16 bg-white text-gray-900 ">
            <!-- Header -->
            <div class="text-center mb-4 md:mb-4">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">PERTANYAAN
                    UMUM</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">Frequently
                    Asked Questions</h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Temukan jawaban untuk pertanyaan
                    yang sering diajukan tentang program TLC</p>
            </div>

            <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-sm">
                <!-- FAQ List -->
                <div class="space-y-4 text-left">
                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                        <h3 class="text-[#1D4E89] text-lg font-semibold flex justify-between items-center">
                            Apa itu Teaching and Learning Certification (TLC)?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            TLC adalah program sertifikasi dari HAFECS yang bertujuan meningkatkan kemampuan mengajar guru
                            dan calon guru dengan pendekatan Teaching Mastery Framework (TMF).
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                        <h3 class="text-[#1D4E89] text-lg font-medium flex justify-between items-center">
                            Apa saja level dalam TLC?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            TLC memiliki 3 level: Level A - Teaching Knowledge Certification, Level B - Teaching Activation
                            Certification, dan Level C - Teaching Mastery Certification. Setiap level ditempuh selama 3
                            bulan dan fokus pada peningkatan keterampilan secara bertahap.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md ">
                        <h3 class="text-[#1D4E89] text-lg font-medium flex justify-between items-center">
                            Siapa yang bisa mengikuti program TLC?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Program ini terbuka untuk Mahasiswa FKIP (calon guru), Lulusan pendidikan atau guru pemula
                            (kurang dari 2 tahun mengajar), Guru berpengalaman (lebih dari 2 tahun mengajar), dan
                            Pendidik/Trainer dalam suatu Instansi.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md ">
                        <h3 class="text-[#1D4E89] text-lg font-medium flex justify-between items-center">
                            Apa yang dilakukan di Level A?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Di Level A, peserta akan mengerjakan tugas di LMS (modul ajar, PPT, self-review), mengikuti 12
                            kali pelatihan online/offline, dan mengikuti tes teori PCK, HOTS, Literasi, dan Numerasi.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                        <h3 class="text-[#1D4E89] text-lg font-medium flex justify-between items-center">
                            Apa saja manfaat mengikuti program ini?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Peserta akan mendapatkan Sertifikat Kompetensi resmi ber-NPSN, Gelar non-formal, Laporan hasil
                            ujian, Modul dan worksheet digital, Akses ke webinar dan forum guru profesional, serta Jaringan
                            guru dari seluruh Indonesia.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                        <h3 class="text-[#1D4E89] text-lg font-medium flex justify-between items-center">
                            Bagaimana teknis pelaksanaannya?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Pelaksanaan selama 3 bulan per level melalui platform LMS Elevate. Terdapat ujian teori,
                            pengumpulan perangkat ajar, dan pengumpulan video pengajaran. Penjadwalan fleksibel, bisa
                            dilakukan secara online maupun offline.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                        <h3 class="text-[#1D4E89] text-lg font-medium flex justify-between items-center">
                            Apakah program ini bisa diikuti secara online?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Ya, semua kegiatan dapat diikuti secara online sehingga peserta dari seluruh daerah bisa ikut
                            tanpa hambatan lokasi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Script untuk Interaktif FAQ -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let faqItems = document.querySelectorAll(".faq-item");

                    faqItems.forEach(item => {
                        item.addEventListener("click", function() {
                            let answer = this.querySelector(".faq-answer");
                            let icon = this.querySelector(".faq-icon");

                            // Tutup semua jawaban yang lain sebelum membuka yang diklik
                            document.querySelectorAll(".faq-answer").forEach(ans => {
                                if (ans !== answer) {
                                    ans.classList.add("hidden");
                                    ans.style.opacity = "0";
                                    ans.parentElement.querySelector(".faq-icon").style.transform =
                                        "rotate(0deg)";
                                }
                            });

                            if (answer.classList.contains("hidden")) {
                                answer.classList.remove("hidden");
                                answer.style.opacity = "1";
                                icon.style.transform = "rotate(180deg)";
                            } else {
                                answer.classList.add("hidden");
                                answer.style.opacity = "0";
                                icon.style.transform = "rotate(0deg)";
                            }
                        });
                    });
                });
            </script>
        </section>
        <!-- End FAQ Section -->
        
        {{-- Apa itu HAFECS Section --}}
        <section class="py-20 bg-gradient-to-br from-[#1D4E89]/5 to-white relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-[#1D4E89]/5 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-[#E76F51]/5 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>

            <div class="container max-w-6xl mx-auto px-6 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Side: Banner Image -->
                    <div class="relative group">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video border-4 border-white">
                            <img
                                src="{{ asset('images/about-us.webp') }}"
                                alt="Apa itu HAFECS?"
                                loading="lazy"
                                target=""

                                class="w-full h-full object-cover"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#1D4E89]/30 to-transparent"></div>
                        </div>
                        <!-- Decorative square -->
                        <div class="absolute -z-10 -bottom-6 -left-6 w-full h-full border-2 border-[#1D4E89]/10 rounded-2xl"></div>
                    </div>

                    <!-- Right Side: Content -->
                    <div class="space-y-6">
                        <div>
                            <span class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] font-semibold rounded-full text-sm tracking-wide mb-3">
                                TENTANG KAMI
                            </span>
                            
                            <h2 class="text-3xl lg:text-4xl font-black text-[#1D4E89] leading-tight">
                                Apa itu <span class="text-[#E76F51]">HAFECS?</span>
                            </h2>
                            <div class="w-20 h-1 bg-[#E76F51] mt-3"></div>
                        </div>

                        <div class="prose prose-lg text-gray-700 text-justify leading-relaxed">
                            <p class="mb-4">
                                <strong class="text-[#1D4E89]">Highly Functioning Education Consulting Services (HAFECS)</strong> adalah lembaga yang didedikasikan untuk memajukan kualitas pendidikan di Indonesia melalui pengembangan kompetensi guru dan tenaga pendidik.
                            </p>
                            <p>
                                Kami percaya bahwa kunci transformasi pendidikan terletak pada kualitas pengajaran. Oleh karena itu, HAFECS hadir dengan metode pelatihan inovatif yang menggabungkan teori pedagogi modern dengan praktik terbaik di lapangan, membantu sekolah dan pendidik mencapai potensi maksimal mereka.
                            </p>
                        </div>

                        <div class="pt-2">
                            <a href="https://hafecs.id/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-[#1D4E89] font-bold hover:text-[#E76F51] transition-colors group text-lg">
                                Pelajari Lebih Lanjut
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>

                        <!-- Stats/Highlights -->
                        <div class="grid grid-cols-3 gap-4 pt-6 mt-6 border-t border-gray-200">
                            <div class="text-center group cursor-default">
                                <div class="text-2xl lg:text-3xl font-black text-[#1D4E89] group-hover:text-[#E76F51] transition-colors">300K+</div>
                                <div class="text-xs text-gray-500 font-bold mt-1 tracking-wider">PENDIDIK</div>
                            </div>
                            <div class="text-center group cursor-default">
                                <div class="text-2xl lg:text-3xl font-black text-[#1D4E89] group-hover:text-[#E76F51] transition-colors">450+</div>
                                <div class="text-xs text-gray-500 font-bold mt-1 tracking-wider">KOTA</div>
                            </div>
                            <div class="text-center group cursor-default">
                                <div class="text-2xl lg:text-3xl font-black text-[#1D4E89] group-hover:text-[#E76F51] transition-colors">87%</div>
                                <div class="text-xs text-gray-500 font-bold mt-1 tracking-wider">KEPUASAN</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Apa itu HAFECS Section --}}
    </div>
@endsection