<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLC — Pilih Paket Sertifikasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-display {
            font-family: 'DM Serif Display', serif;
        }

        .category-card:hover {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
        }

        .category-card.selected {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.35);
        }

        @media (min-width: 1024px) {
            .sticky-sidebar {
                position: sticky;
                top: 88px;
            }
        }

        @keyframes subtle-pulse {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: 0.7
            }
        }

        .savings-badge {
            animation: subtle-pulse 2.5s ease-in-out infinite;
        }

        .step-line::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 32px;
            bottom: -8px;
            width: 2px;
            background: linear-gradient(to bottom, #dcfce7, transparent);
        }

        /* Nav */
        .nav-link {
            font-size: 0.875rem;
            color: #4b5563;
            transition: color 0.15s;
        }

        .nav-link:hover {
            color: #15803d;
        }

        /* Smooth transitions */
        .package-card {
            transition: all 0.2s ease;
        }

        .package-card:hover {
            transform: translateY(-2px);
        }

        .category-card {
            transition: all 0.2s ease;
        }

        .category-card:hover {
            transform: translateY(-1px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                    <span class="text-white text-xs font-bold">TLC</span>
                </div>
                <div>
                    <div class="text-sm font-bold text-gray-900 leading-none">TLC Program</div>
                    <div class="text-[10px] text-gray-400">Teaching & Learning Certification</div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-6">
                <a href="#" class="nav-link">Dashboard</a>
                <a href="#" class="nav-link font-semibold text-green-700">Sertifikasi</a>
                <a href="#" class="nav-link">Transaksi</a>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-xs text-gray-500 hidden sm:block">Selamat datang, <strong>user</strong></div>
                <div
                    class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-700 text-sm font-bold">
                    U</div>
            </div>
        </div>
    </nav>

    <!-- HERO BANNER -->
    <div class="bg-gradient-to-br from-[#0a3d2e] via-[#0f5c42] to-[#1a7a57] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex items-start gap-6">
                <div class="flex-1">
                    <span
                        class="inline-flex items-center gap-1.5 text-green-300 text-xs font-semibold tracking-widest uppercase mb-3">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Teaching Knowledge Certification
                    </span>
                    <h1 class="font-display text-3xl lg:text-4xl leading-tight mb-3">
                        Pilih Paket Sertifikasi<br>
                        <span class="italic text-green-300">yang Tepat untuk Anda</span>
                    </h1>
                    <p class="text-green-100/80 text-sm max-w-lg leading-relaxed">
                        Mulai perjalanan profesional Anda dengan memilih paket lengkap atau sesuaikan kategori ujian
                        sesuai kebutuhan.
                    </p>
                </div>
                <div
                    class="hidden lg:flex flex-col items-center justify-center w-20 h-20 bg-white/10 rounded-2xl border border-white/20 backdrop-blur-sm">
                    <span class="text-2xl font-bold font-display text-white">TLC</span>
                    <span class="text-[9px] text-green-300 tracking-widest uppercase">Certified</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            <!-- LEFT COLUMN -->
            <div class="flex-1 min-w-0 space-y-8">

                <!-- STEP 1: Mode -->
                <div class="relative step-line">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-8 h-8 rounded-full bg-green-600 text-white text-sm font-bold flex items-center justify-center flex-shrink-0 relative z-10 shadow-lg shadow-green-200">
                            1</div>
                        <div>
                            <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wide">Mode Pembelian</h2>
                            <p class="text-xs text-gray-400">Pilih paket lengkap atau kategori satuan</p>
                        </div>
                    </div>
                    <div class="ml-11">
                        <div class="inline-flex bg-white border border-gray-200 rounded-xl p-1 shadow-sm gap-1">
                            <button id="mode-bundle" onclick="switchMode('bundle')"
                                class="mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 bg-green-600 text-white shadow-sm">
                                🎁 Paket Lengkap
                            </button>
                            <button id="mode-custom" onclick="switchMode('custom')"
                                class="mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 text-gray-500 hover:text-gray-700">
                                ✏️ Pilih Satuan
                            </button>
                        </div>
                        <p id="mode-hint-bundle"
                            class="mt-2 text-xs text-green-700 bg-green-50 border border-green-100 rounded-lg px-3 py-2 inline-block">
                            💡 Paket lebih hemat hingga <strong>23%</strong> dibanding beli satuan
                        </p>
                        <p id="mode-hint-custom"
                            class="mt-2 text-xs text-blue-700 bg-blue-50 border border-blue-100 rounded-lg px-3 py-2 hidden">
                            ✏️ Pilih satu atau lebih kategori ujian sesuai kebutuhan Anda
                        </p>
                    </div>
                </div>

                <!-- STEP 2A: Paket (bundle mode) -->
                <div id="section-bundle">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-8 h-8 rounded-full bg-green-600 text-white text-sm font-bold flex items-center justify-center flex-shrink-0 shadow-lg shadow-green-200">
                            2</div>
                        <div>
                            <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wide">Pilih Paket</h2>
                            <p class="text-xs text-gray-400">Setiap paket sudah mencakup kategori yang optimal</p>
                        </div>
                    </div>
                    <div class="ml-11 grid grid-cols-1 sm:grid-cols-3 gap-4">

                        <!-- Level A -->
                        <div id="pkg-level-a" onclick="selectPackage('level-a', 150000, 'Paket Level A')"
                            class="package-card relative bg-white rounded-2xl border-2 border-green-500 cursor-pointer shadow-lg ring-2 ring-green-200 ring-offset-1 overflow-hidden">
                            <div class="absolute top-3 right-3">
                                <span
                                    class="bg-green-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Paling
                                    Populer</span>
                            </div>
                            <div
                                class="pkg-check-level-a absolute top-3 left-3 w-5 h-5 rounded-full bg-green-500 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="p-5">
                                <div
                                    class="bg-green-50 text-green-600 w-11 h-11 rounded-xl flex items-center justify-center font-display text-xl font-bold mb-3">
                                    A</div>
                                <h3 class="font-bold text-gray-900 text-base">Level A</h3>
                                <p class="text-xs text-gray-400 mb-3">Fondasi Pengajaran</p>
                                <div class="mb-3">
                                    <div class="text-green-600 font-bold text-lg">Rp 150.000</div>
                                </div>
                                <div class="space-y-1.5 border-t border-gray-100 pt-3">
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>Literasi & Numerasi
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>PCK
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>HOTS
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Level B -->
                        <div id="pkg-level-b" onclick="selectPackage('level-b', 250000, 'Paket Level B')"
                            class="package-card relative bg-white rounded-2xl border-2 border-gray-200 cursor-pointer overflow-hidden">
                            <div class="absolute top-3 right-3">
                                <span class="bg-blue-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Best
                                    Value</span>
                            </div>
                            <div
                                class="pkg-check-level-b absolute top-3 left-3 w-5 h-5 rounded-full bg-green-500 items-center justify-center hidden">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="p-5">
                                <div
                                    class="bg-blue-50 text-blue-600 w-11 h-11 rounded-xl flex items-center justify-center font-display text-xl font-bold mb-3">
                                    B</div>
                                <h3 class="font-bold text-gray-900 text-base">Level B</h3>
                                <p class="text-xs text-gray-400 mb-3">Pengajaran Lanjutan</p>
                                <div class="mb-3">
                                    <span class="text-xs text-gray-400 line-through">Rp 300.000</span>
                                    <div class="text-blue-600 font-bold text-lg">Rp 250.000</div>
                                </div>
                                <div class="space-y-1.5 border-t border-gray-100 pt-3">
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>Literasi & Numerasi
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>PCK
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>HOTS
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>Asesmen
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-400"></div>Diferensiasi
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Level C -->
                        <div id="pkg-level-c" onclick="selectPackage('level-c', 380000, 'Paket Level C')"
                            class="package-card relative bg-white rounded-2xl border-2 border-gray-200 cursor-pointer overflow-hidden">
                            <div class="absolute top-3 right-3">
                                <span
                                    class="bg-purple-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Terlengkap</span>
                            </div>
                            <div
                                class="pkg-check-level-c absolute top-3 left-3 w-5 h-5 rounded-full bg-green-500 items-center justify-center hidden">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="p-5">
                                <div
                                    class="bg-purple-50 text-purple-600 w-11 h-11 rounded-xl flex items-center justify-center font-display text-xl font-bold mb-3">
                                    C</div>
                                <h3 class="font-bold text-gray-900 text-base">Level C</h3>
                                <p class="text-xs text-gray-400 mb-3">Master Pengajaran</p>
                                <div class="mb-3">
                                    <span class="text-xs text-gray-400 line-through">Rp 480.000</span>
                                    <div class="text-purple-600 font-bold text-lg">Rp 380.000</div>
                                </div>
                                <div class="space-y-1.5 border-t border-gray-100 pt-3">
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-purple-400"></div>Literasi & Numerasi
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-purple-400"></div>PCK
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-purple-400"></div>HOTS
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-purple-400"></div>Asesmen
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-purple-400"></div>Diferensiasi
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-purple-400"></div>Kepemimpinan
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600">
                                        <div class="w-1.5 h-1.5 rounded-full bg-purple-400"></div>Riset & Inovasi
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- STEP 2B: Kategori (custom mode) -->
                <div id="section-custom" class="hidden">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-8 h-8 rounded-full bg-green-600 text-white text-sm font-bold flex items-center justify-center flex-shrink-0 shadow-lg shadow-green-200">
                            2</div>
                        <div>
                            <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wide">Pilih Kategori</h2>
                            <p class="text-xs text-gray-400">Pilih satu atau lebih kategori ujian</p>
                        </div>
                    </div>
                    <div class="ml-11">

                        <!-- Upsell banner -->
                        <div id="bundle-upsell"
                            class="hidden mb-4 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3 flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex-1">
                                <span class="font-semibold text-amber-800 text-sm">Hemat lebih banyak!</span>
                                <span class="text-amber-700 text-sm" id="upsell-text"> Tambah 1 kategori lagi untuk
                                    dapat Paket Level A seharga Rp 150.000 (hemat Rp 45.000)!</span>
                            </div>
                            <button onclick="switchMode('bundle'); selectPackage('level-a', 150000, 'Paket Level A')"
                                class="text-xs font-bold text-amber-700 border border-amber-300 px-3 py-1.5 rounded-lg hover:bg-amber-100 transition-colors whitespace-nowrap flex-shrink-0">
                                Upgrade Paket
                            </button>
                        </div>

                        <!-- Category cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                            <!-- Literasi -->
                            <div id="cat-literasi" onclick="toggleCategory('literasi', 65000, 'Literasi & Numerasi')"
                                class="category-card relative bg-white rounded-2xl border-2 border-gray-200 cursor-pointer select-none"
                                data-selected="false">
                                <div
                                    class="cat-check-literasi absolute top-3 right-3 w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center transition-all duration-200">
                                    <svg class="w-3.5 h-3.5 text-white hidden check-icon-literasi" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="p-5">
                                    <div
                                        class="bg-emerald-50 w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-4">
                                        📚</div>
                                    <h3 class="font-bold text-gray-900 text-sm mb-1">Literasi & Numerasi</h3>
                                    <p class="text-xs text-gray-400 leading-relaxed mb-3">Kemampuan membaca, menulis,
                                        dan berhitung kontekstual</p>
                                    <div class="flex flex-wrap gap-1 mb-4">
                                        <span
                                            class="bg-emerald-100 text-emerald-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Membaca
                                            kritis</span>
                                        <span
                                            class="bg-emerald-100 text-emerald-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Numerasi
                                            dasar</span>
                                        <span
                                            class="bg-emerald-100 text-emerald-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Pemahaman
                                            teks</span>
                                    </div>
                                    <div class="border-t border-gray-100 pt-3 flex items-center justify-between">
                                        <span class="text-emerald-700 font-bold text-base">Rp 65.000</span>
                                        <span class="text-xs text-gray-400">/ kategori</span>
                                    </div>
                                </div>
                            </div>

                            <!-- PCK -->
                            <div id="cat-pck" onclick="toggleCategory('pck', 65000, 'PCK')"
                                class="category-card relative bg-white rounded-2xl border-2 border-gray-200 cursor-pointer select-none"
                                data-selected="false">
                                <div
                                    class="cat-check-pck absolute top-3 right-3 w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center transition-all duration-200">
                                    <svg class="w-3.5 h-3.5 text-white hidden check-icon-pck" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="p-5">
                                    <div
                                        class="bg-blue-50 w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-4">
                                        🧩</div>
                                    <h3 class="font-bold text-gray-900 text-sm mb-1">PCK</h3>
                                    <p class="text-xs text-gray-400 leading-relaxed mb-3">Pedagogical Content Knowledge
                                        — cara terbaik mengajarkan konten</p>
                                    <div class="flex flex-wrap gap-1 mb-4">
                                        <span
                                            class="bg-blue-100 text-blue-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Strategi
                                            pedagogi</span>
                                        <span
                                            class="bg-blue-100 text-blue-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Konten
                                            materi</span>
                                        <span
                                            class="bg-blue-100 text-blue-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Metode
                                            mengajar</span>
                                    </div>
                                    <div class="border-t border-gray-100 pt-3 flex items-center justify-between">
                                        <span class="text-blue-700 font-bold text-base">Rp 65.000</span>
                                        <span class="text-xs text-gray-400">/ kategori</span>
                                    </div>
                                </div>
                            </div>

                            <!-- HOTS -->
                            <div id="cat-hots" onclick="toggleCategory('hots', 65000, 'HOTS')"
                                class="category-card relative bg-white rounded-2xl border-2 border-gray-200 cursor-pointer select-none"
                                data-selected="false">
                                <div
                                    class="cat-check-hots absolute top-3 right-3 w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center transition-all duration-200">
                                    <svg class="w-3.5 h-3.5 text-white hidden check-icon-hots" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="p-5">
                                    <div
                                        class="bg-violet-50 w-12 h-12 rounded-xl flex items-center justify-center text-2xl mb-4">
                                        🧠</div>
                                    <h3 class="font-bold text-gray-900 text-sm mb-1">HOTS</h3>
                                    <p class="text-xs text-gray-400 leading-relaxed mb-3">Higher Order Thinking Skills
                                        — mendorong berpikir tingkat tinggi</p>
                                    <div class="flex flex-wrap gap-1 mb-4">
                                        <span
                                            class="bg-violet-100 text-violet-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Berpikir
                                            kritis</span>
                                        <span
                                            class="bg-violet-100 text-violet-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Analisis</span>
                                        <span
                                            class="bg-violet-100 text-violet-700 text-[10px] font-semibold px-2 py-0.5 rounded-full">Evaluasi</span>
                                    </div>
                                    <div class="border-t border-gray-100 pt-3 flex items-center justify-between">
                                        <span class="text-violet-700 font-bold text-base">Rp 65.000</span>
                                        <span class="text-xs text-gray-400">/ kategori</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- shortcuts -->
                        <div class="flex items-center justify-between mt-3">
                            <button onclick="selectAllCategories()"
                                class="text-xs text-green-600 font-semibold hover:text-green-800 flex items-center gap-1 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Pilih semua kategori
                            </button>
                            <button onclick="clearCategories()"
                                class="text-xs text-gray-400 hover:text-gray-600 transition-colors">Reset
                                pilihan</button>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Detail & Syarat -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-8 h-8 rounded-full bg-green-100 text-green-700 text-sm font-bold flex items-center justify-center flex-shrink-0">
                            3</div>
                        <div>
                            <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wide">Detail Program</h2>
                            <p class="text-xs text-gray-400">Informasi lengkap dan syarat pendaftaran</p>
                        </div>
                    </div>
                    <div class="ml-11 bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-5 py-4 bg-amber-50 border-b border-amber-100 flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <div>
                                <p class="text-xs font-semibold text-amber-800">Syarat Pendaftaran</p>
                                <p class="text-xs text-amber-700 mt-0.5">Pastikan profil Anda sudah lengkap sebelum
                                    melanjutkan pembayaran. <a href="#"
                                        class="underline font-semibold hover:text-amber-900">Lengkapi profil sekarang
                                        →</a></p>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-100">
                            <button onclick="toggleAccordion('benefits')"
                                class="w-full flex items-center justify-between px-5 py-4 text-left hover:bg-gray-50 transition-colors">
                                <span class="text-sm font-semibold text-gray-800">Benefit yang Akan Anda
                                    Dapatkan</span>
                                <svg id="benefits-chevron"
                                    class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="benefits-content" class="px-5 pb-5">
                                <div class="grid grid-cols-2 gap-2.5 pt-3">
                                    <div class="flex items-center gap-2 text-xs text-gray-600"><span>🏅</span>
                                        Sertifikat ber-NPSN</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600"><span>🎓</span> Gelar
                                        Non-Formal</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600"><span>📊</span> Rapor
                                        Hasil Ujian</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600"><span>📋</span>
                                        Worksheet</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600"><span>📱</span> Modul
                                        Digital</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600"><span>📡</span> Webinar
                                        Eksklusif</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-600 col-span-2">
                                        <span>🌐</span> Koneksi Jaringan Guru Profesional</div>
                                </div>
                            </div>
                            <button onclick="toggleAccordion('modules')"
                                class="w-full flex items-center justify-between px-5 py-4 text-left hover:bg-gray-50 transition-colors">
                                <span class="text-sm font-semibold text-gray-800">Detail Program & Modul</span>
                                <svg id="modules-chevron"
                                    class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="modules-content" class="hidden px-5 pb-5">
                                <p class="text-xs text-gray-500 pt-3 leading-relaxed">Program dirancang secara
                                    sistematis untuk meningkatkan kompetensi pengajaran melalui ujian berbasis Teaching
                                    Mastery Framework (TMF) yang telah terakreditasi oleh lembaga pendidikan nasional.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end left col -->

            <!-- RIGHT COLUMN (sticky summary) -->
            <div class="w-full lg:w-80 flex-shrink-0">
                <div class="sticky-sidebar space-y-4">

                    <!-- Order summary card -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 bg-gray-50 border-b border-gray-200">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Ringkasan Pembelian</p>
                        </div>
                        <div id="order-items" class="px-5 py-4 min-h-[80px]">
                            <!-- Default: Level A selected -->
                            <div class="flex items-start justify-between gap-2">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Paket Level A</p>
                                    <p class="text-xs text-gray-400 mt-0.5">3 kategori + semua benefit</p>
                                </div>
                                <span class="text-sm font-bold text-green-600 whitespace-nowrap">Rp 150.000</span>
                            </div>
                        </div>
                        <div class="border-t border-dashed border-gray-200 mx-5"></div>
                        <div class="px-5 py-4 space-y-2">
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>Subtotal</span>
                                <span id="summary-subtotal">Rp 150.000</span>
                            </div>
                            <div id="savings-row" class="hidden flex justify-between text-sm text-green-600">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 10l1.293-1.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Hemat paket
                                </span>
                                <span id="savings-amount" class="font-semibold savings-badge">-Rp 0</span>
                            </div>
                            <div class="flex justify-between font-bold text-gray-900 pt-1 border-t border-gray-100">
                                <span>Total</span>
                                <span id="summary-total" class="text-green-600 text-lg">Rp 150.000</span>
                            </div>
                        </div>
                        <div class="px-5 pb-5">
                            <button id="btn-checkout" onclick="proceedToCheckout()"
                                class="w-full py-3.5 bg-green-600 hover:bg-green-700 text-white font-bold text-sm rounded-xl transition-all duration-200 flex items-center justify-center gap-2 shadow-sm hover:shadow-md active:scale-[0.98]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Lanjutkan Pembayaran
                            </button>
                            <div class="flex items-center justify-center gap-5 mt-3">
                                <div class="flex items-center gap-1 text-[10px] text-gray-400">
                                    <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Pembayaran Aman
                                </div>
                                <div class="flex items-center gap-1 text-[10px] text-gray-400">
                                    <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Garansi 30 Hari
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bundle comparison card (shows in custom mode) -->
                    <div id="comparison-card"
                        class="hidden bg-gradient-to-br from-green-600 to-emerald-700 text-white rounded-2xl p-4">
                        <p class="text-xs font-bold mb-1">💰 Lebih hemat dengan paket?</p>
                        <p class="text-[11px] text-green-100 mb-3">Paket Level A (3 kategori) = <strong>Rp
                                150.000</strong><br>vs beli satuan 3 kategori = <strong>Rp 195.000</strong></p>
                        <button onclick="switchMode('bundle'); selectPackage('level-a', 150000, 'Paket Level A')"
                            class="w-full bg-white text-green-700 text-xs font-bold py-2 rounded-lg hover:bg-green-50 transition-colors">
                            Lihat Paket Lengkap
                        </button>
                    </div>

                </div>
            </div><!-- end right col -->

        </div>
    </div>

    <script>
        const state = {
            mode: 'bundle',
            selectedPackage: 'level-a',
            selectedPackagePrice: 150000,
            selectedPackageName: 'Paket Level A',
            selectedCategories: {},
        };

        function switchMode(mode) {
            state.mode = mode;
            const btnBundle = document.getElementById('mode-bundle');
            const btnCustom = document.getElementById('mode-custom');
            const secBundle = document.getElementById('section-bundle');
            const secCustom = document.getElementById('section-custom');
            const hintBundle = document.getElementById('mode-hint-bundle');
            const hintCustom = document.getElementById('mode-hint-custom');

            if (mode === 'bundle') {
                btnBundle.className =
                    'mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 bg-green-600 text-white shadow-sm';
                btnCustom.className =
                    'mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 text-gray-500 hover:text-gray-700';
                secBundle.classList.remove('hidden');
                secCustom.classList.add('hidden');
                hintBundle.classList.remove('hidden');
                hintCustom.classList.add('hidden');
                document.getElementById('comparison-card').classList.add('hidden');
                renderSummaryBundle();
            } else {
                btnCustom.className =
                    'mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 bg-green-600 text-white shadow-sm';
                btnBundle.className =
                    'mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 text-gray-500 hover:text-gray-700';
                secCustom.classList.remove('hidden');
                secBundle.classList.add('hidden');
                hintCustom.classList.remove('hidden');
                hintBundle.classList.add('hidden');
                renderSummaryCustom();
            }
        }

        function selectPackage(id, price, name) {
            document.querySelectorAll('.package-card').forEach(el => {
                el.classList.remove('border-green-500', 'border-blue-500', 'border-purple-500', 'shadow-lg',
                    'ring-2', 'ring-green-200', 'ring-offset-1');
                el.classList.add('border-gray-200');
            });
            ['level-a', 'level-b', 'level-c'].forEach(pid => {
                const c = document.querySelector(`.pkg-check-${pid}`);
                if (c) {
                    c.style.display = 'none';
                    c.classList.add('hidden');
                }
            });

            const borderColors = {
                'level-a': 'border-green-500',
                'level-b': 'border-blue-500',
                'level-c': 'border-purple-500'
            };
            const ringColors = {
                'level-a': 'ring-green-200',
                'level-b': 'ring-blue-200',
                'level-c': 'ring-purple-200'
            };
            const card = document.getElementById(`pkg-${id}`);
            if (card) {
                card.classList.remove('border-gray-200');
                card.classList.add(borderColors[id] || 'border-green-500', 'shadow-lg', 'ring-2', ringColors[id] ||
                    'ring-green-200', 'ring-offset-1');
            }
            const check = document.querySelector(`.pkg-check-${id}`);
            if (check) {
                check.style.display = 'flex';
                check.classList.remove('hidden');
            }

            state.selectedPackage = id;
            state.selectedPackagePrice = price;
            state.selectedPackageName = name;
            renderSummaryBundle();
        }

        function toggleCategory(id, price, name) {
            const card = document.getElementById(`cat-${id}`);
            const circle = document.querySelector(`.cat-check-${id}`);
            const icon = document.querySelector(`.check-icon-${id}`);
            const isSelected = card.dataset.selected === 'true';

            const borderMap = {
                literasi: 'border-emerald-400',
                pck: 'border-blue-400',
                hots: 'border-violet-400'
            };
            const checkMap = {
                literasi: 'bg-emerald-500',
                pck: 'bg-blue-500',
                hots: 'bg-violet-500'
            };

            if (isSelected) {
                card.dataset.selected = 'false';
                card.classList.remove('selected', borderMap[id] || 'border-green-400', 'bg-gray-50/50');
                card.classList.add('border-gray-200');
                circle.className =
                    `cat-check-${id} absolute top-3 right-3 w-6 h-6 rounded-full border-2 border-gray-300 bg-white flex items-center justify-center transition-all duration-200`;
                icon.classList.add('hidden');
                delete state.selectedCategories[id];
            } else {
                card.dataset.selected = 'true';
                card.classList.add('selected', borderMap[id] || 'border-green-400', 'bg-gray-50/50');
                card.classList.remove('border-gray-200');
                circle.className =
                    `cat-check-${id} absolute top-3 right-3 w-6 h-6 rounded-full border-transparent ${checkMap[id]||'bg-green-500'} flex items-center justify-center transition-all duration-200`;
                icon.classList.remove('hidden');
                state.selectedCategories[id] = {
                    name,
                    price
                };
            }
            renderSummaryCustom();
            checkUpsell();
        }

        function selectAllCategories() {
            [{
                id: 'literasi',
                price: 65000,
                name: 'Literasi & Numerasi'
            }, {
                id: 'pck',
                price: 65000,
                name: 'PCK'
            }, {
                id: 'hots',
                price: 65000,
                name: 'HOTS'
            }]
            .forEach(({
                id,
                price,
                name
            }) => {
                if (document.getElementById(`cat-${id}`).dataset.selected !== 'true') toggleCategory(id, price,
                    name);
            });
        }

        function clearCategories() {
            Object.keys({
                ...state.selectedCategories
            }).forEach(id => {
                if (document.getElementById(`cat-${id}`)?.dataset.selected === 'true')
                    toggleCategory(id, state.selectedCategories[id]?.price, state.selectedCategories[id]?.name);
            });
        }

        function checkUpsell() {
            const count = Object.keys(state.selectedCategories).length;
            const banner = document.getElementById('bundle-upsell');
            const compCard = document.getElementById('comparison-card');
            if (count === 2) {
                banner.classList.remove('hidden');
                compCard.classList.remove('hidden');
            } else if (count === 1) {
                banner.classList.add('hidden');
                compCard.classList.remove('hidden');
            } else {
                banner.classList.add('hidden');
                compCard.classList.add('hidden');
            }
        }

        function formatRp(v) {
            return 'Rp ' + v.toLocaleString('id-ID');
        }

        function renderSummaryBundle() {
            const names = {
                'level-a': '3 kategori + semua benefit',
                'level-b': '5 kategori + semua benefit',
                'level-c': '7 kategori + semua benefit'
            };
            document.getElementById('order-items').innerHTML = `
    <div class="flex items-start justify-between gap-2">
      <div>
        <p class="text-sm font-semibold text-gray-800">${state.selectedPackageName}</p>
        <p class="text-xs text-gray-400 mt-0.5">${names[state.selectedPackage]||'Paket lengkap'}</p>
      </div>
      <span class="text-sm font-bold text-green-600 whitespace-nowrap">${formatRp(state.selectedPackagePrice)}</span>
    </div>`;
            document.getElementById('summary-subtotal').textContent = formatRp(state.selectedPackagePrice);
            document.getElementById('summary-total').textContent = formatRp(state.selectedPackagePrice);
            document.getElementById('savings-row').classList.add('hidden');
            document.getElementById('btn-checkout').disabled = false;
        }

        function renderSummaryCustom() {
            const items = Object.values(state.selectedCategories);
            const container = document.getElementById('order-items');
            if (items.length === 0) {
                container.innerHTML =
                    `<div class="flex flex-col items-center py-4 text-center"><div class="text-2xl mb-1">🛒</div><p class="text-xs text-gray-400">Pilih minimal 1 kategori</p></div>`;
                document.getElementById('summary-subtotal').textContent = 'Rp 0';
                document.getElementById('summary-total').textContent = 'Rp 0';
                document.getElementById('btn-checkout').disabled = true;
                document.getElementById('btn-checkout').className =
                    'w-full py-3.5 bg-gray-200 cursor-not-allowed text-gray-400 font-bold text-sm rounded-xl flex items-center justify-center gap-2';
                return;
            }
            const subtotal = items.reduce((s, i) => s + i.price, 0);
            container.innerHTML = items.map(item => `
    <div class="flex items-center justify-between gap-2">
      <div class="flex items-center gap-2">
        <div class="w-1.5 h-1.5 rounded-full bg-green-400 flex-shrink-0"></div>
        <p class="text-sm text-gray-700">${item.name}</p>
      </div>
      <span class="text-sm font-semibold text-gray-800 whitespace-nowrap">${formatRp(item.price)}</span>
    </div>`).join('');
            document.getElementById('summary-subtotal').textContent = formatRp(subtotal);
            document.getElementById('summary-total').textContent = formatRp(subtotal);
            document.getElementById('btn-checkout').disabled = false;
            document.getElementById('btn-checkout').className =
                'w-full py-3.5 bg-green-600 hover:bg-green-700 text-white font-bold text-sm rounded-xl transition-all duration-200 flex items-center justify-center gap-2 shadow-sm hover:shadow-md active:scale-[0.98]';
        }

        function toggleAccordion(id) {
            const content = document.getElementById(`${id}-content`);
            const chevron = document.getElementById(`${id}-chevron`);
            const isHidden = content.classList.contains('hidden');
            content.classList.toggle('hidden');
            chevron.style.transform = isHidden ? 'rotate(180deg)' : '';
        }

        function proceedToCheckout() {
            alert('Redirect ke halaman checkout!\n\nMode: ' + state.mode + '\n' + (state.mode === 'bundle' ? 'Paket: ' +
                state.selectedPackageName : 'Kategori: ' + Object.values(state.selectedCategories).map(c => c.name)
                .join(', ')));
        }
    </script>
</body>

</html>
