<section>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .gradient-text {
            background: linear-gradient(135deg, #0f766e, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.1);
        }

        .smooth-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.9) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(20, 184, 166, 0.1);
        }

        .category-card:hover {
            border-color: rgba(20, 184, 166, 0.3);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 253, 252, 0.95) 100%);
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        /* Arrow rotation animation */
        .arrow-rotate {
            transform: rotate(180deg);
        }

        /* Expandable content animation */
        .expanding {
            max-height: 1000px !important;
            padding-top: 2rem;
        }
    </style>

    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Hero Banner -->
                <div
                    class="relative overflow-hidden bg-gradient-to-br from-teal-600 via-teal-700 to-cyan-800 rounded-3xl p-8 text-white">
                    <div class="absolute inset-0 bg-black opacity-5"></div>
                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="flex-1 mb-6 md:mb-0 md:pr-8">
                                <div
                                    class="inline-flex items-center bg-white bg-opacity-20 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                                    <svg class="w-4 h-4 mr-2 text-yellow-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <circle cx="12" cy="8" r="7"></circle>
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                    </svg>
                                    <span class="text-sm font-semibold">Teaching Knowledge Certification</span>
                                </div>
                                <h1 class="text-2xl md:text-3xl font-bold mb-4 leading-tight">
                                    Level A Teaching Knowledge Certification
                                </h1>
                                <p class="text-lg opacity-90 mb-6">Menguji Pemahaman Dasar Pengajaran yang Efektif dan
                                    Berdiferensiasi</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div
                                    class="w-32 h-32 md:w-40 md:h-40 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <img src="{{ asset('images/logoTlcPng.png') }}"
                                        alt="Teaching And Learning Certification Logo"
                                        title="Teaching And Learning Certification Logo" loading="lazy"
                                        class="w-24 h-24 md:w-32 md:h-32 rounded-xl object-cover opacity-90">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-lg hover-lift">
                    {{-- MODE PEMBELIAN --}}
                    <section>
                        <div class="flex items-center gap-3 mb-4">
                            <div>
                                <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wide">Mode Pembelian</h2>
                                <p class="text-xs text-gray-400">Pilih paket lengkap atau kategori satuan</p>
                            </div>
                        </div>
                        <div class="mb-8">

                            {{-- TOOGLE MODE --}}
                            <div class="inline-flex bg-white border border-gray-200 rounded-xl p-1 shadow-sm gap-1">
                                <button id="mode-bundle" wire:click="switchMode('bundle')"
                                    class="mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ $mode === 'bundle' ? 'bg-teal-600 text-white' : 'text-gray-500 hover:text-gray-700' }}">
                                    Paket Lengkap
                                </button>
                                <button id="mode-custom" wire:click="switchMode('custom')"
                                    class="mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ $mode === 'custom' ? 'bg-teal-600 text-white' : 'text-gray-500 hover:text-gray-700' }}">
                                    Pilih Satuan
                                </button>
                            </div>

                            <div>
                                @if ($mode === 'custom')
                                    <p
                                        class="text-xs text-blue-700 bg-blue-100 rounded-lg p-2 mt-4 border border-blue-200">
                                        Pilih satu atau lebih kategori ujian sesuai kebutuhan Anda
                                    </p>
                                @endif
                            </div>
                        </div>
                    </section>


                    <!-- Course Overview -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Tentang Program</h3>
                        <p class="text-gray-600 leading-relaxed text-lg text-justify">
                            Sertifikasi Level A bertujuan menguji pemahaman dasar guru melalui ujian teori terkait
                            pengajaran yang efektif,
                            terstruktur, dan berdiferensiasi, serta penerapan penilaian berbasis Teaching Mastery
                            Framework
                            serta Literasi Numerasi.
                            Level ini merupakan tahap awal dalam program Teaching & Learning Certification (TLC) HAFECS.
                        </p>
                    </div>

                    <!-- Requirements Section -->
                    <div class="mb-8 bg-amber-50 rounded-2xl p-6 border-l-4 border-amber-400">
                        <h3 class="text-lg font-semibold text-amber-800 mb-3">Syarat Pendaftaran</h3>
                        <p class="text-amber-700">
                            Melengkapi data yang ada di profile secara lengkap
                        </p>
                    </div>

                    <!-- Expandable Content -->
                    <div class="border-t border-gray-100 pt-8">
                        <button id="readMoreBtn" class="flex items-center justify-between w-full text-left group">
                            <span
                                class="text-lg font-semibold text-gray-800 group-hover:text-teal-600 smooth-transition">
                                Detail Program & Modul
                            </span>
                            <svg id="arrow"
                                class="w-5 h-5 text-teal-600 smooth-transition group-hover:text-teal-700" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div id="expandableContent" class="overflow-hidden smooth-transition" style="max-height: 0;">
                            <div class="pt-8 space-y-8">
                                <p class="text-gray-600 text-center text-lg">
                                    Program Level A terdiri dari 3 modul komprehensif yang mencakup:
                                </p>

                                <!-- Modules Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <!-- Module 1 -->
                                    <div class="category-card rounded-2xl p-6 smooth-transition hover-lift">
                                        <div class="flex items-center mb-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-4">
                                                1
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-gray-800">LMS Elevate</h4>
                                                <p class="text-sm text-gray-500">Penugasan Online</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">
                                            Mengikuti penugasan di Learning Management System Elevate untuk mendalami
                                            konsep
                                            Teaching Mastery Framework.
                                        </p>
                                    </div>

                                    <!-- Module 2 -->
                                    <div class="category-card rounded-2xl p-6 smooth-transition hover-lift">
                                        <div class="flex items-center mb-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-4">
                                                2
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-gray-800">Training</h4>
                                                <p class="text-sm text-gray-500">12 Kali Pertemuan</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">
                                            Sesi pelatihan intensif dengan 12 kali pertemuan untuk mengasah kemampuan
                                            praktis dalam mengajar.
                                        </p>
                                    </div>

                                    <!-- Module 3 -->
                                    <div class="category-card rounded-2xl p-6 smooth-transition hover-lift">
                                        <div class="flex items-center mb-4">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-4">
                                                3
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-gray-800">Uji Sertifikasi</h4>
                                                <p class="text-sm text-gray-500">Level A Assessment</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed">
                                            Mengikuti uji sertifikasi level A dengan ujian teori berbasis Teaching
                                            Mastery
                                            Framework dan Literasi Numerasi.
                                        </p>
                                    </div>
                                </div>

                                <!-- Assessment Details -->
                                <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-6">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Fokus Ujian Teori</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-blue-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                    <path fill-rule="evenodd"
                                                        d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h2a1 1 0 100-2H7z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-700 font-medium">Teaching Mastery Framework</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-green-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-700 font-medium">Literasi Numerasi</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-purple-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-700 font-medium">Pengajaran Berdiferensiasi</span>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-4 h-4 text-teal-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-700 font-medium">Penilaian Efektif</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Conclusion -->
                                <div
                                    class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-6 border-l-4 border-teal-500">
                                    <p class="text-teal-800 font-medium leading-relaxed">
                                        Level A menjadi fondasi penting dalam program Teaching & Learning Certification,
                                        menggambarkan kesiapan peserta dalam memahami dan menerapkan prinsip dasar
                                        pedagogi
                                        yang kuat sebelum melanjutkan ke level berikutnya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features Section -->
                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Benefit Yang Akan Anda Dapatkan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Sertifikat Kompetensi ber-NPSN</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Mendapatkan Gelar Non-Formal</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Rapor Hasil Ujian</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Worksheet</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Modul Pembelajaran Digital</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Akses ke Webinar dan Diskusi Eksklusif HAFECS</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Koneksi dengan Jaringan Guru Profesional</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Checkout -->
            <div class="lg:col-span-1">
                <div class="sticky top-4">
                    <div class="glass-effect rounded-3xl p-6 shadow-md border border-white/20">
                        <!-- Product Summary -->
                        <div class="mb-8">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-4">
                                Ringkasan Pembelian
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <span class="text-gray-800 font-medium">Paket Level {{ $level->level_name }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold gradient-text">
                                        Rp. {{ number_format($level->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- PROMO CODE -->
                        {{-- <div class="mb-8">
                                <label class="block text-gray-600 text-sm font-medium mb-3">Kode Promo / Kupon</label>
                                <div class="flex space-x-2">
                                    <input type="text" placeholder="Masukkan kode promo"
                                        class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent smooth-transition">
                                    <button
                                        class="px-4 py-3 bg-teal-600 text-white rounded-xl hover:bg-teal-700 smooth-transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div> --}}

                        <!-- Price Summary -->
                        <div class="space-y-3 mb-8 border-t border-gray-100 pt-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold">
                                    Rp. {{ number_format($level->price, 0, ',', '.') }}
                                </span>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                <span class="gradient-text">
                                    Rp. {{ number_format($level->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Continue Payment Button -->
                        <form action="{{ route('payments.store') }}" method="POST" id="payment-form">
                            @csrf
                            <input type="hidden" name="amount" value="{{ (int) $level->price }}">
                            <input type="hidden" name="level_name" value="Level A">
                            <input type="hidden" name="level_id" value="1">

                            <button
                                class="w-full bg-gradient-to-r from-teal-600 to-cyan-600 text-white py-4 rounded-xl font-semibold text-lg hover:from-teal-700 hover:to-cyan-700 smooth-transition shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Lanjutkan Pembayaran
                            </button>
                        </form>



                        <!-- Security Info -->
                        <div class="mt-6 flex items-center justify-center space-x-4 text-xs text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Pembayaran Aman</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Garansi 30 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @if (session('userProfileNull'))
        @livewire('payments.user-profile-form')
    @endif --}}

    <!-- JavaScript for Dropdown Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreBtn = document.getElementById('readMoreBtn');
            const expandableContent = document.getElementById('expandableContent');
            const arrow = document.getElementById('arrow');

            let isExpanded = false;

            readMoreBtn.addEventListener('click', function(e) {
                e.preventDefault();

                if (!isExpanded) {
                    // Expand content
                    expandableContent.style.maxHeight = '1000px';
                    expandableContent.classList.add('expanding');
                    arrow.classList.add('arrow-rotate');
                    isExpanded = true;
                } else {
                    // Collapse content
                    expandableContent.style.maxHeight = '0';
                    expandableContent.classList.remove('expanding');
                    arrow.classList.remove('arrow-rotate');
                    isExpanded = false;
                }
            });
        });
    </script>
</section>