@extends('layouts.app')

@section('title', 'Teaching and Learning Certification')

@section('content')
    <div class="bg-abu">

        <!-- HOME -->
        <main id="home"
            class="w-full scroll-mt-24 px-5 py-20 bg-gradient-to-br from-blue-50 via-white to-orange-50 text-gray-900">
            <div class="container mx-auto max-w-7xl view grid grid-cols-12 transition-all duration-500 ease-in-out mb-16">
                <div class="col-span-12 lg:col-span-7 p-5">
                    <div class="animate-fadeIn">
                        <span
                            class="text-lg text-[#E76F51] font-semibold inline-block px-4 py-1 bg-orange-100 rounded-full">#TRANSFORMASI
                            PENDIDIKAN ERA DIGITAL</span>
                        <h1
                            class="text-5xl md:text-6xl font-extrabold text-[#1D4E89] leading-tight mt-4 hover:scale-105 transition-transform duration-300">
                            <span class="relative inline-block">
                                <span class="relative z-10">Transform.</span>
                                <span class="absolute -bottom-2 left-0 w-full h-3 bg-yellow-300 opacity-50 z-0"></span>
                            </span>
                            <span class="relative inline-block">
                                <span class="relative z-10">Teach.</span>
                                <span class="absolute -bottom-2 left-0 w-full h-3 bg-blue-300 opacity-50 z-0"></span>
                            </span>
                            <span class="relative inline-block">
                                <span class="relative z-10">Thrive.</span>
                                <span class="absolute -bottom-2 left-0 w-full h-3 bg-orange-300 opacity-50 z-0"></span>
                            </span>
                        </h1>
                        <h2 class="text-4xl font-bold text-[#1D4E89] mt-2 mb-4">Teaching & Learning Certification</h2>
                        <p class="text-xl text-gray-700 mt-6 max-w-xl leading-relaxed">
                            Program sertifikasi ini bukan sekadar pelatihan, melainkan langkah nyata dalam membekali
                            pendidik dengan strategi pengajaran inovatif untuk menghadirkan perubahan bermakna di dunia
                            pendidikan digital.
                        </p>

                    </div>

                    <div class="flex flex-col sm:flex-row my-8 gap-4">
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
                        <a href="#vidio"
                            class="bg-white border-2 border-[#1D4E89] text-[#1D4E89] px-8 py-4 rounded-xl shadow-md text-lg font-semibold hover:bg-gray-100 transition-all duration-300 hover:scale-105 active:scale-95 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Lihat Video</span>
                        </a>
                    </div>

                    <div class="mt-10">
                        <p class="text-gray-600 font-medium mb-4">Dipercaya oleh institusi pendidikan terkemuka:</p>
                        <div class="flex flex-wrap gap-6 items-center justify-start">
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/smpit-an-nur.png') }}" alt="SMPIT An-Nur"
                                    class="h-16 hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/smp-sma-gibs.png') }}" alt="Global Islamic Boarding School"
                                    class="h-16 hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/hafecs.png') }}" alt="HAFECS"
                                    class="h-12 hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                            <div class="bg-white p-3 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="{{ asset('images/hrp.png') }}" alt="HAFECS Research & Publication"
                                    class="h-16 hover:scale-110 transition-transform duration-300" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="hidden lg:flex col-span-12 lg:col-span-5 rounded-2xl mx-3 overflow-hidden shadow-2xl relative group">
                    <img src="{{ asset('images/konten_satu.jpg') }}"
                        class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-700"
                        alt="Teacher engaging with students" loading="lazy">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#1D4E89]/70 to-transparent opacity-50 group-hover:opacity-70 transition-opacity duration-500">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 bg-white/90 backdrop-blur-sm px-6 py-4 rounded-xl transform -translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <p class="text-[#1D4E89] font-bold text-xl">Kuasai Kelas Dengan Percaya Diri</p>
                        <p class="text-gray-700">Tingkatkan keterampilan mengajar Anda</p>
                    </div>
                </div>
            </div>


        </main>
        <!-- End Home -->

        <!-- Apa itu TLC? -->
        <section id="about"
            class="w-full px-5 py-20 bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-900">
            <div class="max-w-7xl mx-auto w-full">
                <div class="text-center mb-16">
                    <span
                        class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] font-semibold rounded-full text-sm mb-3">TENTANG
                        PROGRAM</span>
                    <h2 class="text-5xl font-black text-[#1D4E89] mb-2 tracking-tight">Penjelasan Tentang TLC</h2>
                    <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                    <p class="text-xl text-gray-700 max-w-3xl mx-auto">Program revolusioner yang mengubah cara guru
                        mengajar dan siswa belajar</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    <!-- Gambar dengan label yang ditingkatkan -->
                    <div class="relative rounded-xl overflow-hidden shadow-2xl group h-[500px]">
                        <img src="{{ asset('images/konten_tiga.jpg') }}" alt="Teaching Mastery Framework"
                            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110"
                            loading="lazy">

                        <div class="absolute inset-0 bg-gradient-to-t from-[#1D4E89]/80 to-transparent"></div>

                        <div
                            class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
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

                        <p class="leading-relaxed text-gray-800 text-lg mb-6">
                            <span class="font-semibold text-[#1D4E89]">Teaching and Learning Certification (TLC)</span>
                            adalah langkah nyata menuju pengembangan diri sebagai pendidik unggul. Dengan pendekatan <span
                                class="font-semibold text-[#1D4E89]">Teaching Mastery Framework (TMF)</span>, Anda akan
                            dibekali strategi mengajar yang efektif, relevan, dan mampu menciptakan pengalaman belajar yang
                            bermakna.
                        </p>

                        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-[#1D4E89] mb-8">
                            <h4 class="font-bold text-xl text-[#1D4E89] mb-3">Mengapa TLC Berbeda?</h4>
                            <p class="text-gray-700">
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
        <section class="w-full py-20 bg-gradient-to-br from-[#1D4E89]/10 to-white text-gray-900">

            <div class="max-w-5xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] font-semibold rounded-full text-sm mb-3">VISI
                    DAN MISI
                </span>

                <h2 class="text-3xl sm:text-4xl sm:text-center md:text-5xl font-black text-[#1D4E89] mb-2 tracking-tight">
                    Transformasi Pendidikan Dimulai dari Anda
                </h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                <p
                    class="text-gray-800 max-w-3xl mx-auto text-base sm:text-lg md:text-xl leading-normal sm:leading-relaxed font-medium">
                    Bergabunglah dengan ribuan pendidik profesional yang telah meningkatkan kualitas pengajaran mereka
                    melalui program pengembangan kompetensi guru terdepan di Indonesia.
                </p>
            </div>

            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 mt-16 px-4 md:px-6">
                <!-- Visi - Enhanced dengan 5 item untuk simetri -->
                <div
                    class="bg-white p-6 md:p-10 rounded-3xl shadow-xl border-l-4 border-[#1D4E89] transition-transform duration-300 ease-in-out hover:scale-102 hover:shadow-2xl relative overflow-hidden group h-full flex flex-col">
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

                    <p class="text-gray-700 text-xl text-left leading-relaxed relative z-10 mb-8">
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
                    class="bg-white p-6 md:p-10 rounded-3xl shadow-xl border-l-4 border-[#2A9D8F] transition-transform duration-300 ease-in-out hover:scale-102 hover:shadow-2xl relative overflow-hidden group h-full flex flex-col">
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

                    <p class="text-gray-700 text-xl text-left leading-relaxed relative z-10 mb-8">
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
        <section class="w-full py-24 bg-gradient-to-t from-[#1D4E89]/5 to-white text-gray-900">
            <div class="max-w-6xl mx-auto text-center px-6">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] font-semibold rounded-full text-sm mb-3">MANFAAT
                    PROGRAM</span>
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
                    class="group bg-white p-8 rounded-3xl shadow-xl border-l-4 border-[#1D4E89] transition-all duration-300 hover:shadow-2xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#1D4E89]/5 rounded-full blur-2xl group-hover:bg-[#1D4E89]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-lg group-hover:bg-[#1D4E89] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#1D4E89] text-4xl group-hover:text-white transition-colors duration-300">🏅</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#1D4E89] group-hover:text-[#E76F51] transition-colors">
                            Sertifikat NPSN Resmi
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg relative z-10 leading-relaxed">
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
                    class="group bg-white p-8 rounded-3xl shadow-xl border-l-4 border-[#2A9D8F] transition-all duration-300 hover:shadow-2xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#2A9D8F]/5 rounded-full blur-2xl group-hover:bg-[#2A9D8F]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-lg group-hover:bg-[#2A9D8F] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#2A9D8F] text-4xl group-hover:text-white transition-colors duration-300">🎓</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#2A9D8F] group-hover:text-[#E76F51] transition-colors">
                            Gelar Profesional
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg relative z-10 leading-relaxed">
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
                    class="group bg-white p-8 rounded-3xl shadow-xl border-l-4 border-[#E76F51] transition-all duration-300 hover:shadow-2xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#E76F51]/5 rounded-full blur-2xl group-hover:bg-[#E76F51]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-lg group-hover:bg-[#E76F51] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#E76F51] text-4xl group-hover:text-white transition-colors duration-300">📊</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#E76F51] group-hover:text-[#1D4E89] transition-colors">
                            Analisis Kompetensi
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg relative z-10 leading-relaxed">
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
                    class="group bg-white p-8 rounded-3xl shadow-xl border-l-4 border-[#1D4E89] transition-all duration-300 hover:shadow-2xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#1D4E89]/5 rounded-full blur-2xl group-hover:bg-[#1D4E89]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-lg group-hover:bg-[#1D4E89] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#1D4E89] text-4xl group-hover:text-white transition-colors duration-300">📝</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#1D4E89] group-hover:text-[#E76F51] transition-colors">
                            Toolkit Premium
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg relative z-10 leading-relaxed">
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
                    class="group bg-white p-8 rounded-3xl shadow-xl border-l-4 border-[#2A9D8F] transition-all duration-300 hover:shadow-2xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#2A9D8F]/5 rounded-full blur-2xl group-hover:bg-[#2A9D8F]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-lg group-hover:bg-[#2A9D8F] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#1D4E89] text-4xl group-hover:text-white transition-colors duration-300">🤝</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#2A9D8F] group-hover:text-[#E76F51] transition-colors">
                            Jaringan Guru Elite
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg relative z-10 leading-relaxed">
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
                    class="group bg-white p-8 rounded-3xl shadow-xl border-l-4 border-[#E76F51] transition-all duration-300 hover:shadow-2xl relative overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-[#E76F51]/5 rounded-full blur-2xl group-hover:bg-[#E76F51]/10 transition-all duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-br from-transparent to-[#A8DADC]/20 rounded-tl-full">
                    </div>

                    <div class="flex items-center gap-4 mb-5 relative z-10">
                        <div
                            class="bg-[#A8DADC] p-4 rounded-xl shadow-lg group-hover:bg-[#E76F51] transition-colors duration-300 group-hover:scale-110">
                            <span
                                class="text-[#E76F51] text-4xl group-hover:text-white transition-colors duration-300">🎯</span>
                        </div>
                        <h3 class="text-2xl font-bold text-[#E76F51] group-hover:text-[#1D4E89] transition-colors">
                            Webinar Eksklusif
                        </h3>
                    </div>
                    <p class="text-gray-700 text-lg relative z-10 leading-relaxed">
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
        <div id="skema"
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
                                    <p class="text-gray-600 text-sm leading-relaxed flex-grow">Membangun pengetahuan dasar
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
                                    <p class="text-gray-600 text-sm leading-relaxed flex-grow">Penerapan praktis PCK dan
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
                                    <p class="text-gray-600 text-sm leading-relaxed flex-grow">Penguasaan komprehensif
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
        </div>
        <!-- End Skema -->

        <!-- Paket Harga -->
        <section id="harga" class="w-full py-12 md:py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white to-blue-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12 md:mb-16">
                    <span
                        class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">PROGRAM
                        SERTIFIKASI</span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">Pilih Jalur
                        Sertifikasi Anda</h2>
                    <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Program bertingkat yang
                        disesuaikan dengan kebutuhan dan tujuan karir pendidik</p>
                </div>

                <!-- Course Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <!-- Card Level A -->
                    <div
                        class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.02] hover:shadow-xl">
                        <img src="{{ asset('images/levela.png') }}" alt="Level A"
                            class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-80">
                        </div>
                        <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                            <div class="mb-2 sm:mb-4">
                                <span
                                    class="bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm border border-white/30">LEVEL
                                    A</span>
                            </div>
                            <h3
                                class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3 leading-tight drop-shadow-lg">
                                Teaching Knowledge Certification</h3>
                            <div class="flex flex-wrap gap-1 sm:gap-2 mb-4 sm:mb-6">
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Manajemen
                                    Kelas</span>
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Desain
                                    Pembelajaran</span>
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Asesmen</span>
                            </div>
                            <div class="flex items-center justify-between gap-2">
                                <div
                                    class="bg-white/10 backdrop-blur-sm rounded-lg md:rounded-xl px-3 sm:px-4 py-1 sm:py-2 border border-white/20">
                                    <span class="text-white font-bold text-lg sm:text-xl drop-shadow-lg">
                                        Rp {{ number_format($levelA, 0, ',', '.') }}
                                    </span>
                                </div>
                                <button onclick="document.getElementById('modalA').classList.remove('hidden')"
                                    class="bg-white/90 hover:bg-white text-gray-900 px-3 sm:px-4 md:px-6 py-1 sm:py-2 text-xs sm:text-sm font-bold rounded-lg transition-all duration-300 shadow hover:shadow-md">Detail
                                    Program</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card Level B -->
                    <div
                        class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.02] hover:shadow-xl">
                        <img src="{{ asset('images/levelb.png') }}" alt="Level B"
                            class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-80">
                        </div>
                        <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                            <div class="mb-2 sm:mb-4">
                                <span
                                    class="bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm border border-white/30">LEVEL
                                    B</span>
                            </div>
                            <h3
                                class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3 leading-tight drop-shadow-lg">
                                Teaching Activation Certification</h3>
                            <div class="flex flex-wrap gap-1 sm:gap-2 mb-4 sm:mb-6">
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Modul
                                    Interaktif</span>
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Literasi
                                    Digital</span>
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Project
                                    Based</span>
                            </div>
                            <div class="flex items-center justify-between gap-2">
                                <div
                                    class="bg-white/10 backdrop-blur-sm rounded-lg md:rounded-xl px-3 sm:px-4 py-1 sm:py-2 border border-white/20">
                                    <span class="text-white font-bold text-lg sm:text-xl drop-shadow-lg">
                                        Rp {{ number_format($levelB, 0, ',', '.') }}
                                    </span>
                                </div>
                                <button onclick="document.getElementById('modalB').classList.remove('hidden')"
                                    class="bg-white/90 hover:bg-white text-gray-900 px-3 sm:px-4 md:px-6 py-1 sm:py-2 text-xs sm:text-sm font-bold rounded-lg transition-all duration-300 shadow hover:shadow-md">Detail
                                    Program</button>
                            </div>
                        </div>
                    </div>

                    <!-- Card Level C -->
                    <div
                        class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.02] hover:shadow-xl">
                        <img src="{{ asset('images/levelc.png') }}" alt="Level C"
                            class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-80">
                        </div>
                        <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                            <div class="mb-2 sm:mb-4">
                                <span
                                    class="bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm border border-white/30">LEVEL
                                    C</span>
                            </div>
                            <h3
                                class="text-white text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3 leading-tight drop-shadow-lg">
                                Teaching Mastery Certification</h3>
                            <div class="flex flex-wrap gap-1 sm:gap-2 mb-4 sm:mb-6">
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Praktik
                                    Video</span>
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Mentoring
                                    1-on-1</span>
                                <span
                                    class="bg-white/15 text-gray-100 text-xs px-2 sm:px-3 py-1 rounded-full backdrop-blur-sm border border-white/20">Publikasi</span>
                            </div>
                            <div class="flex items-center justify-between gap-2">
                                <div
                                    class="bg-white/10 backdrop-blur-sm rounded-lg md:rounded-xl px-3 sm:px-4 py-1 sm:py-2 border border-white/20">
                                    <span class="text-white font-bold text-lg sm:text-xl drop-shadow-lg">
                                        Rp {{ number_format($levelC, 0, ',', '.') }}
                                    </span>
                                </div>
                                <button onclick="document.getElementById('modalC').classList.remove('hidden')"
                                    class="bg-white/90 hover:bg-white text-gray-900 px-3 sm:px-4 md:px-6 py-1 sm:py-2 text-xs sm:text-sm font-bold rounded-lg transition-all duration-300 shadow hover:shadow-md">Detail
                                    Program</button>
                            </div>
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

                        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 leading-relaxed">
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
                                        <span class="text-xs sm:text-sm font-medium">PCK Framework</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-orange-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">HOTS Development</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-orange-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Kurikulum Merdeka</span>
                                    </div>
                                    <div class="flex items-center p-2 sm:p-3 bg-orange-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 sm:h-5 sm:w-5 text-orange-500 mr-2 flex-shrink-0" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs sm:text-sm font-medium">Diferensiasi Pembelajaran</span>
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
        {{-- End Modal --}}
        <!-- End Paket Harga -->

        <!-- Success Stories Section -->
        <section class="w-full px-5 py-20 bg-gradient-to-br from-blue-50 via-gray-50 to-white text-gray-900 shadow-xl"
            id="testimonials">
            <div class="text-center px-4 sm:px-6">
                <span
                    class="text-blue-700 font-semibold text-xs sm:text-sm uppercase bg-blue-100 px-3 sm:px-4 py-1 sm:py-2 rounded-full shadow-md animate-pulse">
                    Kisah Sukses
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#1D4E89] mt-4 sm:mt-6 leading-tight">
                    Transformasi Nyata Dari Para Pendidik
                </h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>

                <p class="text-gray-700 mt-3 sm:mt-5 max-w-3xl mx-auto text-base sm:text-lg md:text-xl">
                    Bergabunglah dengan ratusan pendidik yang telah mengubah karir mereka melalui program Teaching and
                    Learning Certification kami.
                </p>
            </div>

            <!-- Testimonial Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-16 max-w-6xl mx-auto">
                <!-- Testimonial 1 -->
                <div
                    class="bg-white border border-gray-200 rounded-2xl shadow-md p-8 relative transition-all duration-500  hover:shadow-2xl group">
                    <div class="absolute -top-10 left-6 transition-all duration-300 group-hover:-translate-y-2">
                        <img src="{{ asset('images/hamas.png') }}" alt="Hamas, M.Pd"
                            class="w-24 h-24 rounded-full border-4 border-white shadow-lg ring-4 ring-[#E76F51]"
                            loading="lazy">
                        <div class="absolute -bottom-2 -right-2 bg-blue-600 text-white rounded-full p-2 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-16">
                        <strong class="block text-2xl text-gray-900 font-bold">Hamas, M.Pd</strong>
                        <span class="text-blue-600 text-sm font-medium">Guru SMA - Peraih Penghargaan Guru Terbaik
                            2024</span>
                        <div class="flex items-center mt-2 mb-4">
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 italic mt-4 text-lg leading-relaxed">
                            "Program TLC <span class="text-blue-600 font-semibold">telah membuka dunia baru</span> dalam
                            karir mengajar saya. Siswa-siswa saya kini lebih antusias dan hasil belajar mereka meningkat
                            drastis. Investasi terbaik untuk karir pendidikan yang saya pernah lakukan!"
                        </p>
                        <div class="mt-6 text-sm text-blue-600 font-medium">
                            📈 Peningkatan nilai rata-rata kelas: 28%
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div
                    class="bg-white border border-gray-200 rounded-2xl shadow-md p-8 relative transition-all duration-500  hover:shadow-2xl group">
                    <div class="absolute -top-10 left-6 transition-all duration-300 group-hover:-translate-y-2">
                        <img src="{{ asset('images/aliando.jpg') }}" alt="Candra, M.Pd"
                            class="w-24 h-24 rounded-full border-4 border-white shadow-lg ring-4 ring-[#E76F51]"
                            loading="lazy">
                        <div class="absolute -bottom-2 -right-2 bg-blue-600 text-white rounded-full p-2 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-16">
                        <strong class="block text-2xl text-gray-900 font-bold">Candra, M.Pd</strong>
                        <span class="text-blue-600 text-sm font-medium">Dosen Universitas - Peneliti Pendidikan</span>
                        <div class="flex items-center mt-2 mb-4">
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 italic mt-4 text-lg leading-relaxed">
                            "Metode pembelajaran yang saya dapatkan di TLC <span
                                class="text-blue-600 font-semibold">revolusioner dan berbasis riset</span>. Mahasiswa saya
                            sekarang lebih kritis, kreatif, dan publikasi riset pendidikan saya meningkat berkat insight
                            yang didapat."
                        </p>
                        <div class="mt-6 text-sm text-blue-600 font-medium">
                            🏆 Dipromosikan menjadi Ketua Jurusan setelah menerapkan metode TLC
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div
                    class="bg-white border border-gray-200 rounded-2xl shadow-md p-8 relative transition-all duration-500  hover:shadow-2xl group">
                    <div class="absolute -top-10 left-6 transition-all duration-300 group-hover:-translate-y-2">
                        <img src="{{ asset('images/guru.png') }}" alt="Yudha, M.Pd"
                            class="w-24 h-24 rounded-full border-4 border-white shadow-lg ring-4 ring-[#E76F51]"
                            loading="lazy">
                        <div class="absolute -bottom-2 -right-2 bg-blue-600 text-white rounded-full p-2 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-16">
                        <strong class="block text-2xl text-gray-900 font-bold">Yudha, M.Pd</strong>
                        <span class="text-blue-600 text-sm font-medium">Guru SD - Trainer Pendidikan Nasional</span>
                        <div class="flex items-center mt-2 mb-4">
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 italic mt-4 text-lg leading-relaxed">
                            "TLC mengubah saya dari guru biasa menjadi <span class="text-blue-600 font-semibold">pendidik
                                berpengaruh</span>. Kini saya sering diundang sebagai pembicara di berbagai pelatihan guru
                            nasional dan memiliki jaringan profesional yang luas."
                        </p>
                        <div class="mt-6 text-sm text-blue-600 font-medium">
                            🌟 Menjadi mentor bagi 87 guru di seluruh Indonesia
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- End Success Stories -->

        <!-- Video TLC Section -->
        <section id="vidio" class="w-full px-5 py-16 bg-gray-50 text-gray-900 shadow-lg">
            <div class="text-center mb-12 md:mb-16">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">VIDEO
                    TENTANG TLC</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">Kenali Program
                    TLC Lebih Jauh</h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Tonton video pengenalan dan
                    testimoni dari program Teaching and Learning Certification</p>
            </div>


            <!-- Video Container -->
            <div
                class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-sm transition-all duration-500 hover:shadow-2xl hover:scale-[1.02]">
                <!-- Tab Navigation -->
                <div class="flex justify-between bg-[#A8DADC] text-gray-800 rounded-t-lg overflow-hidden">
                    <button
                        class="flex-1 py-3 text-[#1D4E89] font-semibold border-b-4 border-[#E76F51] transition-all duration-300 hover:bg-[#E76F51] hover:text-white active:scale-95">
                        📺 Pengenalan TLC
                    </button>

                </div>

                <!-- Embedded YouTube Video -->
                <div class="relative w-full h-72 sm:h-96 rounded-b-lg overflow-hidden mt-1 my-5">
                    <iframe class="w-full h-full transition-transform duration-500 hover:scale-[1.03] active:scale-95"
                        src="https://www.youtube.com/embed/euFMXmg1LoQ" title="Video TLC" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </section>
        <!-- End Video -->

        <!-- Portal Berita Kegiatan TLC -->
        <section id="galeri" class="w-full px-5 py-16 bg-white text-gray-900 shadow-lg">
            <div class="text-center mb-12 md:mb-16">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">PORTAL
                    BERITA</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">Berita &
                    Informasi Terkini TLC</h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Dapatkan informasi terbaru,
                    dokumentasi kegiatan, dan perkembangan program Teaching and Learning Certification secara real-time.</p>
            </div>


            <!-- Image Grid (Menampilkan data berita) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10 max-w-6xl mx-auto">
                @forelse($latestNews as $news)
                    <!-- News Item -->
                    <div class="relative w-full h-52 rounded-lg overflow-hidden group">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                            class="w-full h-full object-cover" loading="lazy">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-80 group-hover:opacity-0 transition-opacity duration-300">
                        </div>
                        <div
                            class="absolute bottom-4 left-4 right-4 text-white group-hover:opacity-0 transition-opacity duration-300">
                            <h3 class="font-semibold text-lg">{{ $news->title }}</h3>
                            <p class="text-sm">{{ Str::limit($news->summary, 100) }}</p>
                        </div>
                        <a href="{{ route('newsDetail', $news->slug) }}"
                            class="absolute top-3 right-3 bg-white text-gray-900 px-3 py-1 text-xs font-semibold rounded-full shadow-md group-hover:opacity-0 transition-opacity duration-300">Lihat
                            Detail</a>
                    </div>
                @empty
                    <!-- Tampilkan jika tidak ada berita -->
                    @for ($i = 0; $i < 6; $i++)
                        <div class="relative w-full h-52 rounded-lg overflow-hidden group bg-gray-100">
                            <div class="flex items-center justify-center h-full">
                                <p class="text-gray-400">Belum ada konten</p>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </section>
        <!-- End Portal Berita Kegiatan TLC -->

        <!-- Buku HAFECS Section -->
        {{-- <section id="books" class="w-full px-5 py-20 bg-gray-50 text-gray-900">
            <div class="text-center mb-12 md:mb-16">
                <span
                    class="inline-block px-4 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-sm font-semibold tracking-wide shadow-sm mb-4">KOLEKSI
                    BUKU TERBAIK</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1D4E89] mb-4">Temukan Buku
                    Favorit Anda</h2>
                <div class="w-24 h-1 bg-[#E76F51] mt-4 mb-6 mx-auto"></div>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Buku pilihan untuk memperkaya
                    wawasan dan meningkatkan kualitas pengajaran Anda</p>
            </div>


            <!-- Book Grid -->
            <div class="py-8 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-50 to-white">
                <div class="max-w-7xl mx-auto">

                    <!-- Book Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Book 1 -->
                        <div
                            class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="relative h-64">
                                <img src="{{ asset('images/buku1.png') }}"
                                    alt="Buku Merancang Modul Pengajaran Berbasis CP, TP dan ATP"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent p-4 flex flex-col justify-end">
                                    <h3 class="text-white font-bold text-lg sm:text-xl">Merancang Modul Pengajaran</h3>
                                    <p class="text-gray-200 text-sm mt-1">Panduan lengkap CP, TP dan ATP - Implementasi
                                        Kurikulum Merdeka</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <a
                                    href="https://shopee.co.id/Buku-Merancang-Modul-Pengajaran-Berbasis-CP-TP-dan-ATP-Implementasi-Kurikulum-Merdeka-i.1352656010.27267262569">
                                    <button
                                        class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Beli Sekarang!
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- Book 2 -->
                        <div
                            class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="relative h-64">
                                <img src="{{ asset('images/buku2.png') }}"
                                    alt="Buku Mengembangkan Modul Pembelajaran Siswa"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent p-4 flex flex-col justify-end">
                                    <h3 class="text-white font-bold text-lg sm:text-xl">Mengembangkan Modul Pembelajaran
                                    </h3>
                                    <p class="text-gray-200 text-sm mt-1">Panduan komprehensif berbasis CP, TP dan ATP
                                        untuk guru</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <a
                                    href="https://shopee.co.id/Buku-Mengembangkan-Modul-Pembelajaran-Siswa-Berbasis-CP-TP-dan-ATP-i.1352656010.26067403930">
                                    <button
                                        class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Beli Sekarang!
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- Book 3 -->
                        <div
                            class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="relative h-64">
                                <img src="{{ asset('images/buku3.png') }}"
                                    alt="Buku Project Based-Learning Lintas Mata Pelajaran"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent p-4 flex flex-col justify-end">
                                    <h3 class="text-white font-bold text-lg sm:text-xl">Project Based-Learning</h3>
                                    <p class="text-gray-200 text-sm mt-1">Lintas mata pelajaran yang mengacu pada CP, TP &
                                        ATP</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <a
                                    href="https://shopee.co.id/Buku-Merancang-Project-Based-Learning-Lintas-Mata-Pelajaran-yang-mengacu-pada-CP-TP-ATP-i.1352656010.25238227078">
                                    <button
                                        class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Beli Sekarang!
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- Book 4 -->
                        <div
                            class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="relative h-64">
                                <img src="{{ asset('images/buku4.png') }}" alt="Buku HOTS Social Science"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent p-4 flex flex-col justify-end">
                                    <h3 class="text-white font-bold text-lg sm:text-xl">HOTS Social Science</h3>
                                    <p class="text-gray-200 text-sm mt-1">Higher Order Thinking Skill - Seri IPS dengan
                                        panduan praktis</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <a
                                    href="https://shopee.co.id/Buku-HOTS-Higher-Order-Thingking-Skill-(Seri-IPS-Social-Science)-i.1352656010.26617242538">
                                    <button
                                        class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Beli Sekarang!
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- Book 5 -->
                        <div
                            class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="relative h-64">
                                <img src="{{ asset('images/buku5.png') }}" alt="Buku HOTS Natural Science"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent p-4 flex flex-col justify-end">
                                    <h3 class="text-white font-bold text-lg sm:text-xl">HOTS Natural Science</h3>
                                    <p class="text-gray-200 text-sm mt-1">Higher Order Thinking Skill - Seri IPA dengan
                                        contoh kasus nyata</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <a
                                    href="https://shopee.co.id/Buku-HOTS-Higher-Order-Thingking-Skill-(Seri-IPS-Natural-Science)-i.1352656010.28367251630">
                                    <button
                                        class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Beli Sekarang!
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- Book 6 -->
                        <div
                            class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="relative h-64">
                                <img src="{{ asset('images/buku6.png') }}" alt="Buku PCK Pedagogical Content Knowledge"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent p-4 flex flex-col justify-end">
                                    <h3 class="text-white font-bold text-lg sm:text-xl">PCK - Mengajar Efektif</h3>
                                    <p class="text-gray-200 text-sm mt-1">Pedagogical Content Knowledge - Seri IPS untuk
                                        guru inovatif</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <a
                                    href="https://shopee.co.id/Buku-Cara-Mengajar-Lebih-Efektif-dengan-Menggunakan-PCK-(Pedagogical-Content-Knowledge-Seri-IPA)-i.1352656010.24938222501">
                                    <button
                                        class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Beli Sekarang!
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section> --}}
        {{-- End Buku HAFECS Section --}}

        <!-- FAQ Section -->
        <section id="faq" class="w-full px-5 py-16 bg-white text-gray-900 shadow-lg">
            <!-- Header -->
            <div class="text-center mb-12 md:mb-16">
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
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                        <h3 class="text-blue-700 font-medium flex justify-between items-center">
                            Apa itu Teaching and Learning Certification (TLC)?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            TLC adalah program sertifikasi dari HAFECS yang bertujuan meningkatkan kemampuan mengajar guru dan calon guru dengan pendekatan Teaching Mastery Framework (TMF).
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                        <h3 class="text-blue-700 font-medium flex justify-between items-center">
                            Apa saja level dalam TLC?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            TLC memiliki 3 level: Level A - Teaching Knowledge Certification, Level B - Teaching Activation Certification, dan Level C - Teaching Mastery Certification. Setiap level ditempuh selama 3 bulan dan fokus pada peningkatan keterampilan secara bertahap.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                        <h3 class="text-blue-700 font-medium flex justify-between items-center">
                            Siapa yang bisa mengikuti program TLC?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Program ini terbuka untuk Mahasiswa FKIP (calon guru), Lulusan pendidikan atau guru pemula (kurang dari 2 tahun mengajar), Guru berpengalaman (lebih dari 2 tahun mengajar), dan Pendidik/Trainer dalam suatu Instansi.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                        <h3 class="text-blue-700 font-medium flex justify-between items-center">
                            Apa yang dilakukan di Level A?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Di Level A, peserta akan mengerjakan tugas di LMS (modul ajar, PPT, self-review), mengikuti 12 kali pelatihan online/offline, dan mengikuti tes teori PCK, HOTS, Literasi, dan Numerasi.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                        <h3 class="text-blue-700 font-medium flex justify-between items-center">
                            Apa saja manfaat mengikuti program ini?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Peserta akan mendapatkan Sertifikat Kompetensi resmi ber-NPSN, Gelar non-formal, Laporan hasil ujian, Modul dan worksheet digital, Akses ke webinar dan forum guru profesional, serta Jaringan guru dari seluruh Indonesia.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                        <h3 class="text-blue-700 font-medium flex justify-between items-center">
                            Bagaimana teknis pelaksanaannya?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Pelaksanaan selama 3 bulan per level melalui platform LMS Elevate. Terdapat ujian teori, pengumpulan perangkat ajar, dan pengumpulan video pengajaran. Penjadwalan fleksibel, bisa dilakukan secara online maupun offline.
                        </p>
                    </div>

                    <div
                        class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md active:scale-95">
                        <h3 class="text-blue-700 font-medium flex justify-between items-center">
                            Apakah program ini bisa diikuti secara online?
                            <span class="faq-icon transition-transform duration-300">▼</span>
                        </h3>
                        <p class="faq-answer hidden mt-2 text-gray-600">
                            Ya, semua kegiatan dapat diikuti secara online sehingga peserta dari seluruh daerah bisa ikut tanpa hambatan lokasi.
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
    </div>

@endsection
