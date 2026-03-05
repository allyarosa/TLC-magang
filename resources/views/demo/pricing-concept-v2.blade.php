<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsep Pricing V2 - Kategori dalam Level</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 50%, #fff7ed 100%);
        }

        /* Level Tab Styles */
        .level-tab {
            transition: all 0.3s ease;
            position: relative;
        }

        .level-tab.active {
            color: white;
        }

        .level-tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: currentColor;
            border-radius: 3px 3px 0 0;
        }

        .level-tab-a.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
        }

        .level-tab-b.active {
            background: linear-gradient(135deg, #2A9D8F 0%, #40C9B9 100%);
        }

        .level-tab-c.active {
            background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);
        }

        /* Mode Toggle */
        .mode-toggle {
            background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
        }

        .mode-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mode-btn.active {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Category Card */
        .category-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.15);
        }

        .category-card.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231, 111, 81, 0.15);
        }

        .category-card.selected .select-indicator {
            opacity: 1;
            transform: scale(1);
        }

        .select-indicator {
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.2s ease;
        }

        /* Bundle Card */
        .bundle-highlight {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border: 2px solid #f59e0b;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-up {
            animation: slideUp 0.4s ease forwards;
        }

        @keyframes pulse-border {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(231, 111, 81, 0.4);
            }
            50% {
                box-shadow: 0 0 0 8px rgba(231, 111, 81, 0);
            }
        }

        .pulse-border {
            animation: pulse-border 2s infinite;
        }

        /* Progress Steps */
        .step-indicator {
            transition: all 0.3s ease;
        }

        .step-indicator.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
            color: white;
        }

        .step-indicator.completed {
            background: #10B981;
            color: white;
        }

        /* Floating Elements */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .float-animation {
            animation: float 4s ease-in-out infinite;
        }

        /* Price Strike */
        .price-strike {
            position: relative;
        }

        .price-strike::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            height: 2px;
            background: #ef4444;
            transform: rotate(-5deg);
        }

        /* Checkbox */
        .custom-check {
            appearance: none;
            width: 22px;
            height: 22px;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .custom-check:checked {
            background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);
            border-color: #E76F51;
        }

        .custom-check:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <div class="py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-12">
                <span class="inline-flex items-center px-5 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-bold tracking-wider mb-4">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                    PROGRAM SERTIFIKASI
                </span>
                <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mb-4">
                    Pilih Paket <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1D4E89] to-[#E76F51]">Sertifikasi</span>
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Setiap level memiliki beberapa kategori. Pilih kategori yang Anda butuhkan atau ambil paket bundle untuk hemat lebih banyak.
                </p>
            </div>

            <!-- Progress Steps -->
            <div class="flex items-center justify-center gap-4 mb-10">
                <div class="flex items-center gap-2">
                    <div class="step-indicator active w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold">1</div>
                    <span class="text-sm font-medium text-gray-700">Pilih Level</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-300"></div>
                <div class="flex items-center gap-2">
                    <div class="step-indicator w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-bold text-gray-500" id="step-2">2</div>
                    <span class="text-sm font-medium text-gray-400" id="step-2-text">Pilih Kategori</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-300"></div>
                <div class="flex items-center gap-2">
                    <div class="step-indicator w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-bold text-gray-500" id="step-3">3</div>
                    <span class="text-sm font-medium text-gray-400" id="step-3-text">Pembayaran</span>
                </div>
            </div>

            <!-- Level Tabs -->
            <div class="flex justify-center mb-8">
                <div class="inline-flex bg-white rounded-2xl p-1.5 shadow-lg">
                    <button onclick="selectLevel('A')" id="tab-A" 
                        class="level-tab level-tab-a active px-8 py-3 rounded-xl text-sm font-bold flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Level A
                    </button>
                    <button onclick="selectLevel('B')" id="tab-B"
                        class="level-tab level-tab-b px-8 py-3 rounded-xl text-sm font-bold text-gray-500 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Level B
                    </button>
                    <button onclick="selectLevel('C')" id="tab-C"
                        class="level-tab level-tab-c px-8 py-3 rounded-xl text-sm font-bold text-gray-500 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        Level C
                    </button>
                </div>
            </div>

            <!-- Level Info Banner -->
            <div id="level-info" class="bg-gradient-to-r from-[#1D4E89] to-[#2563eb] rounded-2xl p-6 mb-8 text-white">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold mb-1" id="level-title">Level A - Teaching Knowledge</h2>
                        <p class="text-blue-100 text-sm" id="level-desc">Fondasi pengetahuan mengajar profesional dengan 4 kategori ujian</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-blue-200 text-xs">Total Kategori</p>
                            <p class="text-3xl font-black" id="total-categories">4</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mode Toggle: Terpisah vs Bundle -->
            <div class="flex justify-center mb-8">
                <div class="mode-toggle p-1 rounded-xl inline-flex">
                    <button onclick="setMode('terpisah')" id="mode-terpisah" 
                        class="mode-btn active px-6 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        Pilih Kategori
                    </button>
                    <button onclick="setMode('bundle')" id="mode-bundle"
                        class="mode-btn px-6 py-2.5 rounded-lg text-sm font-semibold text-gray-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Paket Bundle
                    </button>
                </div>
            </div>

            <!-- ======================== -->
            <!-- SECTION: PILIH KATEGORI -->
            <!-- ======================== -->
            <div id="section-terpisah" class="slide-up">
                <!-- Categories Grid - Level A -->
                <div id="categories-A" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                    <!-- HOTS -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('A', 'HOTS')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">HOTS</h3>
                        <p class="text-gray-500 text-xs mb-3">Higher Order Thinking Skills</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#1D4E89]">Rp 50.000</span>
                            <span class="text-xs text-gray-400">3 Soal</span>
                        </div>
                    </div>

                    <!-- PCK -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('A', 'PCK')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">PCK</h3>
                        <p class="text-gray-500 text-xs mb-3">Pedagogical Content Knowledge</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#1D4E89]">Rp 50.000</span>
                            <span class="text-xs text-gray-400">3 Soal</span>
                        </div>
                    </div>

                    <!-- LITERASI -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('A', 'LITERASI')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">LITERASI</h3>
                        <p class="text-gray-500 text-xs mb-3">Kemampuan Membaca & Memahami</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#1D4E89]">Rp 50.000</span>
                            <span class="text-xs text-gray-400">3 Soal</span>
                        </div>
                    </div>

                    <!-- NUMERASI -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('A', 'NUMERASI')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">NUMERASI</h3>
                        <p class="text-gray-500 text-xs mb-3">Kemampuan Berhitung & Logika</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#1D4E89]">Rp 50.000</span>
                            <span class="text-xs text-gray-400">3 Soal</span>
                        </div>
                    </div>
                </div>

                <!-- Categories Grid - Level B (Hidden by default) -->
                <div id="categories-B" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
                    <!-- Modul Ajar -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('B', 'MODUL')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Modul Ajar</h3>
                        <p class="text-gray-500 text-xs mb-3">Merancang RPP & Lesson Plan</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#2A9D8F]">Rp 75.000</span>
                            <span class="text-xs text-gray-400">Praktik</span>
                        </div>
                    </div>

                    <!-- Skala Literasi -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('B', 'SKALA')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Skala Literasi</h3>
                        <p class="text-gray-500 text-xs mb-3">Pengembangan Materi Visual</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#2A9D8F]">Rp 75.000</span>
                            <span class="text-xs text-gray-400">Praktik</span>
                        </div>
                    </div>

                    <!-- Observasi Praktik -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('B', 'OBSERVASI')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Observasi Praktik</h3>
                        <p class="text-gray-500 text-xs mb-3">Evaluasi Pengajaran di Kelas</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#2A9D8F]">Rp 75.000</span>
                            <span class="text-xs text-gray-400">Praktik</span>
                        </div>
                    </div>
                </div>

                <!-- Categories Grid - Level C (Hidden by default) -->
                <div id="categories-C" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
                    <!-- Video Mengajar -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('C', 'VIDEO')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Video Mengajar</h3>
                        <p class="text-gray-500 text-xs mb-3">Rekaman Praktik Mengajar</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#E76F51]">Rp 100.000</span>
                            <span class="text-xs text-gray-400">Video</span>
                        </div>
                    </div>

                    <!-- Refleksi Tertulis -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('C', 'REFLEKSI')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Refleksi Tertulis</h3>
                        <p class="text-gray-500 text-xs mb-3">Analisis & Evaluasi Diri</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#E76F51]">Rp 100.000</span>
                            <span class="text-xs text-gray-400">Essay</span>
                        </div>
                    </div>

                    <!-- Umpan Balik Asesor -->
                    <div class="category-card bg-white rounded-2xl shadow-md p-5 cursor-pointer relative" onclick="toggleCategory('C', 'UMPAN')">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Umpan Balik Asesor</h3>
                        <p class="text-gray-500 text-xs mb-3">Feedback dari Penilai</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-[#E76F51]">Rp 100.000</span>
                            <span class="text-xs text-gray-400">Review</span>
                        </div>
                    </div>
                </div>

                <!-- Summary Bar (Sticky Bottom) -->
                <div id="summary-bar" class="hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-2xl p-4 z-50">
                    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-2" id="selected-icons">
                                <!-- Icons will be injected here -->
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Kategori dipilih: <span class="font-bold text-gray-800" id="selected-count">0</span></p>
                                <p class="text-xs text-gray-400" id="selected-names">-</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="text-right">
                                <p class="text-xs text-gray-400">Total</p>
                                <p class="text-2xl font-black text-[#1D4E89]" id="total-price-terpisah">Rp 0</p>
                            </div>
                            <button class="bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all" id="btn-checkout-terpisah">
                                Lanjut Bayar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- =================== -->
            <!-- SECTION: BUNDLE    -->
            <!-- =================== -->
            <div id="section-bundle" class="hidden slide-up">
                <!-- Bundle Card -->
                <div class="bundle-highlight rounded-3xl p-8 mb-8 relative overflow-hidden">
                    <div class="absolute top-4 right-4 float-animation">
                        <span class="inline-flex items-center px-4 py-2 bg-green-500 text-white text-sm font-bold rounded-full shadow-lg">
                            🎉 HEMAT 20%
                        </span>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-8">
                        <div class="flex-1">
                            <h2 class="text-3xl font-black text-gray-900 mb-2" id="bundle-title">Bundle Level A</h2>
                            <p class="text-gray-600 mb-6" id="bundle-desc">Dapatkan semua kategori dalam Level A dengan harga spesial</p>

                            <div class="grid grid-cols-2 gap-3 mb-6" id="bundle-items">
                                <!-- Items will be injected here -->
                            </div>

                            <div class="bg-white/60 rounded-xl p-4">
                                <p class="text-sm font-semibold text-gray-700 mb-2">🎁 Bonus Bundle:</p>
                                <ul class="space-y-1 text-sm text-gray-600">
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Sertifikat digital resmi
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Akses remedial gratis
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Prioritas jadwal ujian
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="lg:w-80">
                            <div class="bg-white rounded-2xl p-6 shadow-xl">
                                <div class="text-center mb-6">
                                    <p class="text-gray-400 text-sm price-strike mb-1" id="bundle-original-price">Rp 200.000</p>
                                    <p class="text-4xl font-black text-[#1D4E89]" id="bundle-price">Rp 160.000</p>
                                    <p class="text-gray-500 text-sm mt-1">Sekali bayar</p>
                                </div>

                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center gap-3 text-sm text-gray-600">
                                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span id="bundle-cat-count">4 Kategori</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-600">
                                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Hemat <span class="font-bold text-green-600" id="bundle-savings">Rp 40.000</span>
                                    </div>
                                </div>

                                <button class="w-full bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg transition-all">
                                    Pilih Bundle
                                </button>

                                <p class="text-center text-gray-400 text-xs mt-4">
                                    🔒 Pembayaran aman
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparison -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800">Perbandingan: Terpisah vs Bundle</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full" id="comparison-table">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Kategori</th>
                                    <th class="py-3 px-6 text-center text-sm font-semibold text-gray-600">Harga Satuan</th>
                                    <th class="py-3 px-6 text-center text-sm font-semibold text-white bg-gradient-to-r from-[#E76F51] to-[#F4A261]">Harga Bundle</th>
                                </tr>
                            </thead>
                            <tbody id="comparison-body">
                                <!-- Rows will be injected -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Data struktur
        const levelData = {
            A: {
                name: 'Level A - Teaching Knowledge',
                desc: 'Fondasi pengetahuan mengajar profesional dengan 4 kategori ujian',
                color: 'blue',
                gradient: 'from-[#1D4E89] to-[#2563eb]',
                categories: {
                    HOTS: { name: 'HOTS', fullName: 'Higher Order Thinking Skills', price: 50000, icon: '💡' },
                    PCK: { name: 'PCK', fullName: 'Pedagogical Content Knowledge', price: 50000, icon: '📚' },
                    LITERASI: { name: 'LITERASI', fullName: 'Kemampuan Membaca & Memahami', price: 50000, icon: '📖' },
                    NUMERASI: { name: 'NUMERASI', fullName: 'Kemampuan Berhitung & Logika', price: 50000, icon: '🔢' }
                },
                bundleDiscount: 0.2 // 20%
            },
            B: {
                name: 'Level B - Teaching Activation',
                desc: 'Implementasi strategi pengajaran nyata dengan 3 kategori praktik',
                color: 'teal',
                gradient: 'from-[#2A9D8F] to-[#40C9B9]',
                categories: {
                    MODUL: { name: 'Modul Ajar', fullName: 'Merancang RPP & Lesson Plan', price: 75000, icon: '📝' },
                    SKALA: { name: 'Skala Literasi', fullName: 'Pengembangan Materi Visual', price: 75000, icon: '📊' },
                    OBSERVASI: { name: 'Observasi Praktik', fullName: 'Evaluasi Pengajaran di Kelas', price: 75000, icon: '👁️' }
                },
                bundleDiscount: 0.2
            },
            C: {
                name: 'Level C - Teaching Mastery',
                desc: 'Penguasaan metodologi tingkat lanjut dengan 3 kategori evaluasi',
                color: 'orange',
                gradient: 'from-[#E76F51] to-[#F4A261]',
                categories: {
                    VIDEO: { name: 'Video Mengajar', fullName: 'Rekaman Praktik Mengajar', price: 100000, icon: '🎥' },
                    REFLEKSI: { name: 'Refleksi Tertulis', fullName: 'Analisis & Evaluasi Diri', price: 100000, icon: '✍️' },
                    UMPAN: { name: 'Umpan Balik Asesor', fullName: 'Feedback dari Penilai', price: 100000, icon: '💬' }
                },
                bundleDiscount: 0.2
            }
        };

        // State
        let currentLevel = 'A';
        let currentMode = 'terpisah';
        let selectedCategories = {
            A: new Set(),
            B: new Set(),
            C: new Set()
        };

        // Select Level
        function selectLevel(level) {
            currentLevel = level;

            // Update tabs
            ['A', 'B', 'C'].forEach(l => {
                const tab = document.getElementById(`tab-${l}`);
                tab.classList.remove('active');
                tab.classList.add('text-gray-500');
            });
            document.getElementById(`tab-${level}`).classList.add('active');
            document.getElementById(`tab-${level}`).classList.remove('text-gray-500');

            // Update level info banner
            const data = levelData[level];
            document.getElementById('level-title').textContent = data.name;
            document.getElementById('level-desc').textContent = data.desc;
            document.getElementById('total-categories').textContent = Object.keys(data.categories).length;
            document.getElementById('level-info').className = `bg-gradient-to-r ${data.gradient} rounded-2xl p-6 mb-8 text-white`;

            // Show/hide category grids
            ['A', 'B', 'C'].forEach(l => {
                document.getElementById(`categories-${l}`).classList.add('hidden');
            });
            document.getElementById(`categories-${level}`).classList.remove('hidden');

            // Update bundle section
            updateBundleSection();
            updateSummary();
        }

        // Set Mode (Terpisah/Bundle)
        function setMode(mode) {
            currentMode = mode;

            document.getElementById('mode-terpisah').classList.toggle('active', mode === 'terpisah');
            document.getElementById('mode-bundle').classList.toggle('active', mode === 'bundle');
            document.getElementById('mode-terpisah').classList.toggle('text-gray-500', mode !== 'terpisah');
            document.getElementById('mode-bundle').classList.toggle('text-gray-500', mode !== 'bundle');

            document.getElementById('section-terpisah').classList.toggle('hidden', mode !== 'terpisah');
            document.getElementById('section-bundle').classList.toggle('hidden', mode !== 'bundle');

            if (mode === 'bundle') {
                updateBundleSection();
            }
        }

        // Toggle Category Selection
        function toggleCategory(level, category) {
            const cards = document.querySelectorAll(`#categories-${level} .category-card`);
            const index = Object.keys(levelData[level].categories).indexOf(category);
            const card = cards[index];

            if (selectedCategories[level].has(category)) {
                selectedCategories[level].delete(category);
                card.classList.remove('selected');
            } else {
                selectedCategories[level].add(category);
                card.classList.add('selected');
            }

            updateSummary();
        }

        // Update Summary Bar
        function updateSummary() {
            const selected = selectedCategories[currentLevel];
            const data = levelData[currentLevel];
            const summaryBar = document.getElementById('summary-bar');

            if (selected.size === 0) {
                summaryBar.classList.add('hidden');
                return;
            }

            summaryBar.classList.remove('hidden');

            // Calculate total
            let total = 0;
            const names = [];
            selected.forEach(cat => {
                total += data.categories[cat].price;
                names.push(data.categories[cat].name);
            });

            document.getElementById('selected-count').textContent = selected.size;
            document.getElementById('selected-names').textContent = names.join(', ');
            document.getElementById('total-price-terpisah').textContent = formatPrice(total);

            // Update step indicators
            document.getElementById('step-2').classList.add('active');
            document.getElementById('step-2-text').classList.remove('text-gray-400');
            document.getElementById('step-2-text').classList.add('text-gray-700');
        }

        // Update Bundle Section
        function updateBundleSection() {
            const data = levelData[currentLevel];
            const categories = data.categories;
            const catCount = Object.keys(categories).length;

            // Calculate prices
            let totalOriginal = 0;
            Object.values(categories).forEach(cat => {
                totalOriginal += cat.price;
            });
            const bundlePrice = totalOriginal * (1 - data.bundleDiscount);
            const savings = totalOriginal - bundlePrice;

            // Update bundle card
            document.getElementById('bundle-title').textContent = `Bundle ${data.name.split(' - ')[0]}`;
            document.getElementById('bundle-desc').textContent = `Dapatkan semua kategori dalam ${data.name.split(' - ')[0]} dengan harga spesial`;
            document.getElementById('bundle-original-price').textContent = formatPrice(totalOriginal);
            document.getElementById('bundle-price').textContent = formatPrice(bundlePrice);
            document.getElementById('bundle-cat-count').textContent = `${catCount} Kategori`;
            document.getElementById('bundle-savings').textContent = formatPrice(savings);

            // Update bundle items
            const itemsHtml = Object.values(categories).map(cat => `
                <div class="flex items-center gap-2 text-sm">
                    <span>${cat.icon}</span>
                    <span class="text-gray-700">${cat.name}</span>
                </div>
            `).join('');
            document.getElementById('bundle-items').innerHTML = itemsHtml;

            // Update comparison table
            let rowsHtml = '';
            Object.values(categories).forEach((cat, i) => {
                const bgClass = i % 2 === 0 ? 'bg-white' : 'bg-gray-50/50';
                rowsHtml += `
                    <tr class="${bgClass}">
                        <td class="py-3 px-6 text-sm text-gray-700">${cat.icon} ${cat.name}</td>
                        <td class="py-3 px-6 text-center text-sm text-gray-600">${formatPrice(cat.price)}</td>
                        <td class="py-3 px-6 text-center text-sm font-semibold text-green-600">✓</td>
                    </tr>
                `;
            });
            rowsHtml += `
                <tr class="bg-gray-100 font-bold">
                    <td class="py-4 px-6 text-sm text-gray-800">Total</td>
                    <td class="py-4 px-6 text-center text-sm text-gray-800">${formatPrice(totalOriginal)}</td>
                    <td class="py-4 px-6 text-center text-sm text-[#E76F51]">${formatPrice(bundlePrice)}</td>
                </tr>
            `;
            document.getElementById('comparison-body').innerHTML = rowsHtml;
        }

        // Format Price
        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            selectLevel('A');
            updateBundleSection();
        });
    </script>
</body>

</html>
