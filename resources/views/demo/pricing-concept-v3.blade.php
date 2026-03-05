<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsep Pricing V3 - Pilih Mode Dulu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 50%, #fff7ed 100%);
        }

        /* Card Selection */
        .mode-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 3px solid transparent;
            cursor: pointer;
        }

        .mode-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .mode-card.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231, 111, 81, 0.2);
        }

        .mode-card.selected .radio-indicator {
            background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);
            border-color: #E76F51;
        }

        .mode-card.selected .radio-indicator::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: white;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .radio-indicator {
            width: 24px;
            height: 24px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            position: relative;
            transition: all 0.3s ease;
        }

        /* Level Tab */
        .level-tab {
            transition: all 0.3s ease;
        }

        .level-tab.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(29, 78, 137, 0.3);
        }

        .level-tab.locked {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Category Card */
        .category-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .category-card:hover:not(.purchased):not(.locked) {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
        }

        .category-card.selected {
            border-color: #E76F51;
            background: linear-gradient(135deg, #fef3c7 0%, #fff 100%);
        }

        .category-card.purchased {
            border-color: #10B981;
            background: linear-gradient(135deg, #d1fae5 0%, #fff 100%);
        }

        .category-card.locked {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Animations */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .slide-in {
            animation: slideIn 0.5s ease forwards;
        }

        .fade-in {
            animation: fadeIn 0.4s ease forwards;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        /* Badge */
        .save-badge {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            animation: pulse 2s infinite;
        }

        /* Progress Bar */
        .progress-step {
            transition: all 0.3s ease;
        }

        .progress-step.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
            color: white;
        }

        .progress-step.completed {
            background: #10B981;
            color: white;
        }

        .progress-line {
            transition: all 0.3s ease;
        }

        .progress-line.active {
            background: #10B981;
        }

        /* Sticky Summary */
        .sticky-summary {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        /* Comparison Table */
        .comparison-highlight {
            background: linear-gradient(135deg, #fef3c7 0%, #fff 100%);
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-10">
                <span class="inline-flex items-center px-4 py-1.5 bg-blue-100 text-blue-600 rounded-full text-xs font-bold tracking-wider mb-4">
                    TEACHING & LEARNING CERTIFICATION
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-gray-900 mb-3">
                    Pilih Paket Sertifikasi
                </h1>
                <p class="text-gray-500 max-w-xl mx-auto">
                    Selesaikan semua kategori dalam setiap level untuk mendapatkan sertifikat
                </p>
            </div>

            <!-- Progress Steps -->
            <div class="flex items-center justify-center gap-3 mb-10">
                <div class="progress-step active w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold" id="step-1">1</div>
                <div class="progress-line w-16 h-1 bg-gray-200 rounded" id="line-1"></div>
                <div class="progress-step w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-bold text-gray-500" id="step-2">2</div>
                <div class="progress-line w-16 h-1 bg-gray-200 rounded" id="line-2"></div>
                <div class="progress-step w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-bold text-gray-500" id="step-3">3</div>
            </div>

            <!-- ========================== -->
            <!-- STEP 1: PILIH LEVEL        -->
            <!-- ========================== -->
            <div id="section-level" class="slide-in mb-8">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Step 1: Pilih Level Sertifikasi</h2>
                    <p class="text-gray-500 text-sm">Level harus diselesaikan secara berurutan</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Level A -->
                    <div class="level-tab active rounded-2xl p-5 cursor-pointer" onclick="selectLevel('A')" id="level-A">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Level A</p>
                                <p class="text-xs opacity-80">Teaching Knowledge</p>
                            </div>
                        </div>
                        <p class="text-xs opacity-70">4 Kategori • Tersedia</p>
                    </div>

                    <!-- Level B (Locked) -->
                    <div class="level-tab locked rounded-2xl p-5 bg-gray-100 text-gray-400" id="level-B">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-gray-200 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Level B</p>
                                <p class="text-xs">Teaching Activation</p>
                            </div>
                        </div>
                        <p class="text-xs">🔒 Selesaikan Level A</p>
                    </div>

                    <!-- Level C (Locked) -->
                    <div class="level-tab locked rounded-2xl p-5 bg-gray-100 text-gray-400" id="level-C">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-gray-200 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Level C</p>
                                <p class="text-xs">Teaching Mastery</p>
                            </div>
                        </div>
                        <p class="text-xs">🔒 Selesaikan Level B</p>
                    </div>
                </div>
            </div>

            <!-- ========================== -->
            <!-- STEP 2: PILIH MODE         -->
            <!-- ========================== -->
            <div id="section-mode" class="slide-in mb-8">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Step 2: Pilih Cara Pembelian</h2>
                    <p class="text-gray-500 text-sm">Pilihan ini tidak dapat diubah setelah checkout</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- BUNDLE Option -->
                    <div class="mode-card bg-white rounded-3xl p-6 shadow-lg relative overflow-hidden" onclick="selectMode('bundle')" id="mode-bundle">
                        <!-- Save Badge -->
                        <div class="save-badge absolute top-4 right-4 text-white text-xs font-bold px-3 py-1 rounded-full">
                            HEMAT 20%
                        </div>

                        <div class="flex items-start gap-4 mb-4">
                            <div class="radio-indicator flex-shrink-0 mt-1"></div>
                            <div>
                                <h3 class="text-xl font-black text-gray-900 mb-1">📦 Paket Bundle</h3>
                                <p class="text-gray-500 text-sm">Beli semua kategori sekaligus dengan harga hemat</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 mb-4">
                            <p class="text-xs text-gray-500 mb-2">Termasuk semua kategori:</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    HOTS
                                </span>
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    PCK
                                </span>
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-purple-100 text-purple-700 rounded-lg text-xs font-medium">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    LITERASI
                                </span>
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-medium">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    NUMERASI
                                </span>
                            </div>
                        </div>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-gray-400 text-sm line-through">Rp 200.000</p>
                                <p class="text-3xl font-black text-[#1D4E89]">Rp 160.000</p>
                            </div>
                            <div class="text-right">
                                <p class="text-green-600 text-sm font-semibold">Hemat Rp 40.000</p>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    Akses langsung semua kategori
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    Bebas pilih urutan ujian
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    Sertifikat setelah lulus semua
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- SATUAN Option -->
                    <div class="mode-card bg-white rounded-3xl p-6 shadow-lg" onclick="selectMode('satuan')" id="mode-satuan">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="radio-indicator flex-shrink-0 mt-1"></div>
                            <div>
                                <h3 class="text-xl font-black text-gray-900 mb-1">🔢 Beli Satuan</h3>
                                <p class="text-gray-500 text-sm">Beli per kategori, bayar sesuai yang dipilih</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 mb-4">
                            <p class="text-xs text-gray-500 mb-2">Pilih kategori yang ingin dibeli:</p>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="flex items-center justify-between px-3 py-2 bg-white rounded-lg border border-gray-200">
                                    <span class="text-xs font-medium text-gray-700">HOTS</span>
                                    <span class="text-xs text-gray-500">Rp 50.000</span>
                                </div>
                                <div class="flex items-center justify-between px-3 py-2 bg-white rounded-lg border border-gray-200">
                                    <span class="text-xs font-medium text-gray-700">PCK</span>
                                    <span class="text-xs text-gray-500">Rp 50.000</span>
                                </div>
                                <div class="flex items-center justify-between px-3 py-2 bg-white rounded-lg border border-gray-200">
                                    <span class="text-xs font-medium text-gray-700">LITERASI</span>
                                    <span class="text-xs text-gray-500">Rp 50.000</span>
                                </div>
                                <div class="flex items-center justify-between px-3 py-2 bg-white rounded-lg border border-gray-200">
                                    <span class="text-xs font-medium text-gray-700">NUMERASI</span>
                                    <span class="text-xs text-gray-500">Rp 50.000</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-gray-400 text-sm">Mulai dari</p>
                                <p class="text-3xl font-black text-[#1D4E89]">Rp 50.000</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-500 text-sm">per kategori</p>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    Bayar sesuai kemampuan
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    Bisa cicil pelan-pelan
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span class="text-amber-700">Wajib beli semua untuk sertifikat</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Comparison Quick View -->
                <div class="mt-6 bg-white rounded-2xl shadow-md overflow-hidden">
                    <div class="p-4 bg-gray-50 border-b border-gray-100">
                        <h3 class="font-bold text-gray-800 text-sm">📊 Perbandingan Cepat</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-100">
                                    <th class="py-3 px-4 text-left text-gray-500 font-medium">Aspek</th>
                                    <th class="py-3 px-4 text-center text-gray-500 font-medium">Bundle</th>
                                    <th class="py-3 px-4 text-center text-gray-500 font-medium">Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-50">
                                    <td class="py-3 px-4 text-gray-700">Total Harga (4 kategori)</td>
                                    <td class="py-3 px-4 text-center font-bold text-green-600">Rp 160.000</td>
                                    <td class="py-3 px-4 text-center text-gray-600">Rp 200.000</td>
                                </tr>
                                <tr class="border-b border-gray-50 comparison-highlight">
                                    <td class="py-3 px-4 text-gray-700">Hemat</td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex px-2 py-0.5 bg-green-100 text-green-700 rounded-full text-xs font-bold">Rp 40.000</span>
                                    </td>
                                    <td class="py-3 px-4 text-center text-gray-400">-</td>
                                </tr>
                                <tr class="border-b border-gray-50">
                                    <td class="py-3 px-4 text-gray-700">Bayar di Depan</td>
                                    <td class="py-3 px-4 text-center">Full</td>
                                    <td class="py-3 px-4 text-center">Per kategori</td>
                                </tr>
                                <tr class="border-b border-gray-50">
                                    <td class="py-3 px-4 text-gray-700">Fleksibilitas</td>
                                    <td class="py-3 px-4 text-center">Langsung dapat semua</td>
                                    <td class="py-3 px-4 text-center">Bisa cicil</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 text-gray-700">Cocok untuk</td>
                                    <td class="py-3 px-4 text-center text-xs text-gray-500">User yang yakin mau lulus</td>
                                    <td class="py-3 px-4 text-center text-xs text-gray-500">User yang mau coba dulu</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ============================== -->
            <!-- STEP 3: DETAIL (Based on Mode) -->
            <!-- ============================== -->
            
            <!-- Bundle Checkout -->
            <div id="section-bundle-checkout" class="hidden slide-in mb-8">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Step 3: Konfirmasi Pembelian Bundle</h2>
                    <p class="text-gray-500 text-sm">Review pesanan Anda sebelum checkout</p>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6">
                    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#1D4E89] to-[#2563eb] rounded-2xl flex items-center justify-center">
                            <span class="text-2xl">📦</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900">Bundle Level A</h3>
                            <p class="text-gray-500 text-sm">Teaching Knowledge Certification</p>
                        </div>
                        <div class="save-badge text-white text-xs font-bold px-3 py-1 rounded-full">
                            HEMAT 20%
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
                        <div class="bg-blue-50 rounded-xl p-3 text-center">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg mx-auto mb-2 flex items-center justify-center">
                                <span class="text-sm">💡</span>
                            </div>
                            <p class="text-xs font-semibold text-blue-800">HOTS</p>
                        </div>
                        <div class="bg-green-50 rounded-xl p-3 text-center">
                            <div class="w-8 h-8 bg-green-100 rounded-lg mx-auto mb-2 flex items-center justify-center">
                                <span class="text-sm">📚</span>
                            </div>
                            <p class="text-xs font-semibold text-green-800">PCK</p>
                        </div>
                        <div class="bg-purple-50 rounded-xl p-3 text-center">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg mx-auto mb-2 flex items-center justify-center">
                                <span class="text-sm">📖</span>
                            </div>
                            <p class="text-xs font-semibold text-purple-800">LITERASI</p>
                        </div>
                        <div class="bg-orange-50 rounded-xl p-3 text-center">
                            <div class="w-8 h-8 bg-orange-100 rounded-lg mx-auto mb-2 flex items-center justify-center">
                                <span class="text-sm">🔢</span>
                            </div>
                            <p class="text-xs font-semibold text-orange-800">NUMERASI</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Harga Normal</span>
                            <span class="text-gray-400 line-through">Rp 200.000</span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Diskon Bundle (20%)</span>
                            <span class="text-green-600">- Rp 40.000</span>
                        </div>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                            <span class="font-bold text-gray-900">Total Bayar</span>
                            <span class="text-2xl font-black text-[#1D4E89]">Rp 160.000</span>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="goBack()" class="flex-1 py-3 px-6 border border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                            ← Kembali
                        </button>
                        <button class="flex-1 py-3 px-6 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white rounded-xl font-bold hover:shadow-lg transition-all">
                            Bayar Sekarang →
                        </button>
                    </div>
                </div>
            </div>

            <!-- Satuan Selection -->
            <div id="section-satuan-select" class="hidden slide-in mb-8">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Step 3: Pilih Kategori</h2>
                    <p class="text-gray-500 text-sm">Pilih kategori yang ingin Anda beli</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                    <!-- HOTS -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer" onclick="toggleCategory('HOTS')" id="cat-HOTS">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">💡</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-bold text-gray-900">HOTS</h3>
                                    <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-[#E76F51] focus:ring-[#E76F51]" id="check-HOTS">
                                </div>
                                <p class="text-gray-500 text-xs mb-2">Higher Order Thinking Skills</p>
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-[#1D4E89]">Rp 50.000</span>
                                    <span class="text-xs text-gray-400">3 Soal • 30 Menit</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PCK -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer" onclick="toggleCategory('PCK')" id="cat-PCK">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">📚</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-bold text-gray-900">PCK</h3>
                                    <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-[#E76F51] focus:ring-[#E76F51]" id="check-PCK">
                                </div>
                                <p class="text-gray-500 text-xs mb-2">Pedagogical Content Knowledge</p>
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-[#1D4E89]">Rp 50.000</span>
                                    <span class="text-xs text-gray-400">3 Soal • 30 Menit</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- LITERASI -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer" onclick="toggleCategory('LITERASI')" id="cat-LITERASI">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">📖</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-bold text-gray-900">LITERASI</h3>
                                    <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-[#E76F51] focus:ring-[#E76F51]" id="check-LITERASI">
                                </div>
                                <p class="text-gray-500 text-xs mb-2">Kemampuan Membaca & Memahami</p>
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-[#1D4E89]">Rp 50.000</span>
                                    <span class="text-xs text-gray-400">3 Soal • 30 Menit</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NUMERASI -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer" onclick="toggleCategory('NUMERASI')" id="cat-NUMERASI">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🔢</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-bold text-gray-900">NUMERASI</h3>
                                    <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-[#E76F51] focus:ring-[#E76F51]" id="check-NUMERASI">
                                </div>
                                <p class="text-gray-500 text-xs mb-2">Kemampuan Berhitung & Logika</p>
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-[#1D4E89]">Rp 50.000</span>
                                    <span class="text-xs text-gray-400">3 Soal • 30 Menit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-amber-800 font-semibold text-sm">Penting!</p>
                            <p class="text-amber-700 text-xs">Untuk mendapatkan sertifikat Level A, Anda harus lulus <strong>semua 4 kategori</strong>. Anda bisa membeli kategori lainnya nanti.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Bottom Summary (for Satuan) -->
            <div id="sticky-summary" class="hidden fixed bottom-0 left-0 right-0 sticky-summary border-t border-gray-200 shadow-2xl p-4 z-50">
                <div class="max-w-5xl mx-auto">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div>
                                <p class="text-gray-500 text-xs">Kategori dipilih</p>
                                <p class="font-bold text-gray-900" id="summary-categories">-</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="text-right">
                                <p class="text-gray-500 text-xs">Total</p>
                                <p class="text-2xl font-black text-[#1D4E89]" id="summary-total">Rp 0</p>
                            </div>
                            <button class="py-3 px-8 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white rounded-xl font-bold hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed" id="btn-checkout-satuan" disabled>
                                Bayar →
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // State
        let currentLevel = 'A';
        let currentMode = null; // 'bundle' or 'satuan'
        let selectedCategories = new Set();

        const prices = {
            HOTS: 50000,
            PCK: 50000,
            LITERASI: 50000,
            NUMERASI: 50000
        };

        // Select Level
        function selectLevel(level) {
            if (level !== 'A') return; // Only A is available
            currentLevel = level;
        }

        // Select Mode
        function selectMode(mode) {
            currentMode = mode;

            // Update UI
            document.getElementById('mode-bundle').classList.toggle('selected', mode === 'bundle');
            document.getElementById('mode-satuan').classList.toggle('selected', mode === 'satuan');

            // Update progress
            document.getElementById('step-2').classList.add('completed');
            document.getElementById('line-1').classList.add('active');
            document.getElementById('step-3').classList.add('active');

            // Show appropriate section
            setTimeout(() => {
                if (mode === 'bundle') {
                    document.getElementById('section-bundle-checkout').classList.remove('hidden');
                    document.getElementById('section-satuan-select').classList.add('hidden');
                    document.getElementById('sticky-summary').classList.add('hidden');
                } else {
                    document.getElementById('section-bundle-checkout').classList.add('hidden');
                    document.getElementById('section-satuan-select').classList.remove('hidden');
                }

                // Scroll to section
                const target = mode === 'bundle' ? 'section-bundle-checkout' : 'section-satuan-select';
                document.getElementById(target).scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 200);
        }

        // Toggle Category
        function toggleCategory(category) {
            const card = document.getElementById(`cat-${category}`);
            const checkbox = document.getElementById(`check-${category}`);

            if (selectedCategories.has(category)) {
                selectedCategories.delete(category);
                card.classList.remove('selected');
                checkbox.checked = false;
            } else {
                selectedCategories.add(category);
                card.classList.add('selected');
                checkbox.checked = true;
            }

            updateSummary();
        }

        // Update Summary
        function updateSummary() {
            const summary = document.getElementById('sticky-summary');
            const categoriesEl = document.getElementById('summary-categories');
            const totalEl = document.getElementById('summary-total');
            const btnCheckout = document.getElementById('btn-checkout-satuan');

            if (selectedCategories.size === 0) {
                summary.classList.add('hidden');
                btnCheckout.disabled = true;
                return;
            }

            summary.classList.remove('hidden');
            btnCheckout.disabled = false;

            // Calculate
            let total = 0;
            const names = [];
            selectedCategories.forEach(cat => {
                total += prices[cat];
                names.push(cat);
            });

            categoriesEl.textContent = `${selectedCategories.size} kategori (${names.join(', ')})`;
            totalEl.textContent = formatPrice(total);
        }

        // Go Back
        function goBack() {
            currentMode = null;
            selectedCategories.clear();

            document.getElementById('mode-bundle').classList.remove('selected');
            document.getElementById('mode-satuan').classList.remove('selected');
            document.getElementById('section-bundle-checkout').classList.add('hidden');
            document.getElementById('section-satuan-select').classList.add('hidden');
            document.getElementById('sticky-summary').classList.add('hidden');

            document.getElementById('step-2').classList.remove('completed');
            document.getElementById('step-3').classList.remove('active');
            document.getElementById('line-1').classList.remove('active');

            // Reset checkboxes
            document.querySelectorAll('.category-card').forEach(card => card.classList.remove('selected'));
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);

            document.getElementById('section-mode').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Format Price
        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }
    </script>
</body>

</html>
