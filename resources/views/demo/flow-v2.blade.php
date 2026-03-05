<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Alur V2 - Tab Navigation Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 50%, #fff7ed 100%);
        }

        /* Page Transitions */
        .page { display: none; }
        .page.active { display: block; animation: fadeSlide 0.4s ease; }
        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Level Tabs */
        .level-tab {
            transition: all 0.3s ease;
            position: relative;
        }
        .level-tab.active { color: white; }
        .level-tab-a.active { background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%); }
        .level-tab-b.active { background: linear-gradient(135deg, #2A9D8F 0%, #40C9B9 100%); }
        .level-tab-c.active { background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%); }
        .level-tab.locked { opacity: 0.5; cursor: not-allowed; }

        /* Mode Toggle */
        .mode-toggle {
            background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
        }
        .mode-btn { transition: all 0.3s ease; }
        .mode-btn.active {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            color: #1D4E89;
        }

        /* Category Card */
        .category-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .category-card:hover:not(.locked) {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.15);
        }
        .category-card.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231, 111, 81, 0.15);
        }
        .category-card.selected .select-indicator { opacity: 1; transform: scale(1); }
        .category-card.locked { opacity: 0.5; cursor: not-allowed; }
        .category-card.owned { border-color: #10b981; background: linear-gradient(135deg, #ecfdf5, #ffffff); }
        .category-card.completed { border-color: #f59e0b; }
        .select-indicator {
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.2s ease;
        }

        /* Progress Steps */
        .step-indicator { transition: all 0.3s ease; }
        .step-indicator.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
            color: white;
        }
        .step-indicator.completed { background: #10B981; color: white; }

        /* Summary Panel */
        .summary-panel {
            background: linear-gradient(135deg, #1e293b, #0f172a);
        }

        /* Toast */
        .toast {
            animation: slideIn 0.3s ease, fadeOut 0.3s ease 2.7s forwards;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fadeOut { to { opacity: 0; } }

        /* Spinner */
        .spinner {
            border: 3px solid #e5e7eb;
            border-top: 3px solid #1D4E89;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Confetti */
        @keyframes confetti {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
        }
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            top: -10px;
            animation: confetti 3s ease-out forwards;
        }

        /* Custom Checkbox */
        .custom-check {
            appearance: none;
            width: 22px;
            height: 22px;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .custom-check:checked {
            background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);
            border-color: #E76F51;
        }
        .custom-check:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-weight: bold;
        }

        /* Progress Ring */
        .progress-ring { transform: rotate(-90deg); }
        .progress-ring-circle {
            transition: stroke-dashoffset 0.5s ease;
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- ================================ -->
    <!-- PAGE 1: WELCOME / AUTH           -->
    <!-- ================================ -->
    <div id="page-auth" class="page active">
        <div class="min-h-screen flex">
            <!-- Left Panel - Branding -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-[#1D4E89] via-[#2563eb] to-[#1D4E89] p-12 items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                        </pattern>
                        <rect width="100" height="100" fill="url(#grid)"/>
                    </svg>
                </div>
                <div class="relative z-10 text-white max-w-lg">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur rounded-3xl flex items-center justify-center mb-8">
                        <span class="text-4xl">🎓</span>
                    </div>
                    <h1 class="text-4xl font-black mb-4">TLC Certification Program</h1>
                    <p class="text-blue-100 text-lg mb-8">Teaching & Learning Certification untuk guru profesional Indonesia.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                <span class="text-lg">📚</span>
                            </div>
                            <div>
                                <p class="font-semibold">3 Level Sertifikasi</p>
                                <p class="text-blue-200 text-sm">Level A, B, dan C</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                <span class="text-lg">🎯</span>
                            </div>
                            <div>
                                <p class="font-semibold">12 Kategori Ujian</p>
                                <p class="text-blue-200 text-sm">4 kategori per level</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                <span class="text-lg">🏆</span>
                            </div>
                            <div>
                                <p class="font-semibold">Sertifikat Resmi</p>
                                <p class="text-blue-200 text-sm">Diakui secara nasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
                <div class="w-full max-w-md">
                    <div class="lg:hidden text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#1D4E89] to-[#2563eb] rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🎓</span>
                        </div>
                        <h1 class="text-2xl font-black text-gray-900">TLC Program</h1>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang! 👋</h2>
                    <p class="text-gray-500 mb-8">Masuk untuk memulai sertifikasi Anda</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="input-name" value="Hamsa Akif Sanie" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="input-email" value="hamsa@example.com"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>
                        <button onclick="doLogin()" 
                            class="w-full py-3.5 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white font-bold rounded-xl hover:shadow-lg hover:shadow-blue-500/30 transition-all">
                            Masuk ke Dashboard →
                        </button>
                    </div>

                    <div class="mt-8 p-4 bg-amber-50 border border-amber-200 rounded-xl">
                        <div class="flex items-start gap-3">
                            <span class="text-xl">💡</span>
                            <div>
                                <p class="text-amber-800 text-sm font-medium">Demo Mode</p>
                                <p class="text-amber-700 text-xs">Data disimpan di localStorage browser.</p>
                                <button onclick="resetAllData()" class="text-amber-600 text-xs underline mt-1">Reset semua data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 2: DASHBOARD (Tab Style)    -->
    <!-- ================================ -->
    <div id="page-dashboard" class="page">
        <!-- Top Navbar -->
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-6xl mx-auto px-4 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#1D4E89] to-[#2563eb] rounded-xl flex items-center justify-center">
                            <span class="text-lg">🎓</span>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">TLC Program</p>
                            <p class="text-gray-500 text-xs">Dashboard Sertifikasi</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-gray-800" id="nav-username">User</p>
                            <p class="text-xs text-gray-500" id="nav-email">user@email.com</p>
                        </div>
                        <button onclick="doLogout()" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-[#1D4E89] to-[#2563eb] rounded-3xl p-6 mb-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="relative z-10">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                        <div>
                            <p class="text-blue-200 text-sm mb-1">Selamat datang kembali,</p>
                            <h2 class="text-2xl font-black" id="welcome-name">User</h2>
                            <p class="text-blue-100 text-sm mt-2" id="welcome-status">Mulai perjalanan sertifikasi Anda</p>
                        </div>
                        <div class="flex items-center gap-6">
                            <!-- Progress Ring -->
                            <div class="relative">
                                <svg class="progress-ring w-20 h-20">
                                    <circle class="text-white/20" stroke-width="6" stroke="currentColor" fill="transparent" r="32" cx="40" cy="40"/>
                                    <circle class="progress-ring-circle text-white" stroke-width="6" stroke="currentColor" fill="transparent" r="32" cx="40" cy="40" 
                                        stroke-dasharray="201" stroke-dashoffset="201" id="progress-ring"/>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-xl font-bold" id="progress-percent">0%</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-3xl font-black" id="stat-completed">0/12</p>
                                <p class="text-blue-200 text-xs">Kategori Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Level Tabs Navigation -->
            <div class="flex justify-center mb-6">
                <div class="inline-flex bg-white rounded-2xl p-1.5 shadow-lg">
                    <button onclick="selectDashboardLevel('A')" id="dash-tab-A" 
                        class="level-tab level-tab-a active px-6 py-3 rounded-xl text-sm font-bold flex items-center gap-2">
                        <span class="text-lg">📚</span>
                        Level A
                    </button>
                    <button onclick="selectDashboardLevel('B')" id="dash-tab-B"
                        class="level-tab level-tab-b locked px-6 py-3 rounded-xl text-sm font-bold text-gray-400 flex items-center gap-2">
                        <span class="text-lg">🔒</span>
                        Level B
                    </button>
                    <button onclick="selectDashboardLevel('C')" id="dash-tab-C"
                        class="level-tab level-tab-c locked px-6 py-3 rounded-xl text-sm font-bold text-gray-400 flex items-center gap-2">
                        <span class="text-lg">🔒</span>
                        Level C
                    </button>
                </div>
            </div>

            <!-- Level Content Panel -->
            <div id="level-panel" class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Level Header -->
                <div class="bg-gradient-to-r from-[#1D4E89] to-[#2563eb] p-5" id="level-header">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-white" id="panel-level-title">Level A - Teaching Knowledge</h3>
                            <p class="text-blue-100 text-sm" id="panel-level-desc">Fondasi pengetahuan mengajar profesional</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="text-right text-white">
                                <p class="text-2xl font-black" id="panel-progress">0/4</p>
                                <p class="text-blue-200 text-xs">Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Grid -->
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="dashboard-categories">
                        <!-- Will be populated by JS -->
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex flex-col sm:flex-row gap-3" id="level-actions">
                        <button onclick="goToPricing()" id="btn-buy-more" 
                            class="flex-1 py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold rounded-xl hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Beli Kategori
                        </button>
                        <button onclick="goToPricing()" id="btn-buy-bundle"
                            class="flex-1 py-3 border-2 border-[#1D4E89] text-[#1D4E89] font-bold rounded-xl hover:bg-blue-50 transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            Lihat Paket Bundle
                        </button>
                    </div>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="text-xl">📜</span>
                        Riwayat Transaksi
                    </h3>
                </div>
                <div id="transaction-history">
                    <div class="text-center py-8 text-gray-400">
                        <span class="text-4xl mb-2 block">📭</span>
                        <p>Belum ada transaksi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 3: PRICING (V2 Style)       -->
    <!-- ================================ -->
    <div id="page-pricing" class="page">
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-6xl mx-auto px-4 py-3">
                <div class="flex items-center gap-4">
                    <button onclick="goToDashboard()" class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <div>
                        <p class="font-bold text-gray-900">Pilih Paket Sertifikasi</p>
                        <p class="text-gray-500 text-xs">Pilih kategori atau paket bundle</p>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Progress Steps -->
            <div class="flex items-center justify-center gap-4 mb-8">
                <div class="flex items-center gap-2">
                    <div class="step-indicator completed w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold" id="pricing-step-1">✓</div>
                    <span class="text-sm font-medium text-gray-700">Pilih Level</span>
                </div>
                <div class="w-8 h-0.5 bg-gray-300"></div>
                <div class="flex items-center gap-2">
                    <div class="step-indicator active w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold" id="pricing-step-2">2</div>
                    <span class="text-sm font-medium text-gray-700">Pilih Kategori</span>
                </div>
                <div class="w-8 h-0.5 bg-gray-300"></div>
                <div class="flex items-center gap-2">
                    <div class="step-indicator w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-bold text-gray-500" id="pricing-step-3">3</div>
                    <span class="text-sm font-medium text-gray-400">Pembayaran</span>
                </div>
            </div>

            <!-- Level Info Banner -->
            <div class="bg-gradient-to-r from-[#1D4E89] to-[#2563eb] rounded-2xl p-5 mb-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold">Level A - Teaching Knowledge</h2>
                        <p class="text-blue-100 text-sm">Pilih kategori yang ingin Anda beli</p>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-200 text-xs">Kategori Tersedia</p>
                        <p class="text-2xl font-black" id="available-count">4</p>
                    </div>
                </div>
            </div>

            <!-- Already Purchased Notice -->
            <div id="owned-notice" class="hidden bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
                <div class="flex items-start gap-3">
                    <span class="text-xl">✅</span>
                    <div>
                        <p class="text-green-800 font-semibold">Kategori yang sudah dimiliki</p>
                        <p class="text-green-700 text-sm" id="owned-list">-</p>
                    </div>
                </div>
            </div>

            <!-- Mode Toggle -->
            <div class="flex justify-center mb-6">
                <div class="mode-toggle p-1.5 rounded-xl inline-flex">
                    <button onclick="setPricingMode('terpisah')" id="mode-terpisah" 
                        class="mode-btn active px-5 py-2.5 rounded-lg text-sm font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        Pilih Kategori
                    </button>
                    <button onclick="setPricingMode('bundle')" id="mode-bundle"
                        class="mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold text-gray-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Paket Bundle
                    </button>
                </div>
            </div>

            <!-- Terpisah Mode: Category Selection -->
            <div id="section-terpisah">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6" id="pricing-categories">
                    <!-- Will be populated -->
                </div>
            </div>

            <!-- Bundle Mode: Bundle Card -->
            <div id="section-bundle" class="hidden">
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 border-2 border-amber-300 rounded-2xl p-6 relative overflow-hidden">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                        HEMAT 20%
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div>
                            <h3 class="text-2xl font-black text-gray-900 mb-2">📦 Paket Bundle Level A</h3>
                            <p class="text-gray-600 mb-4">Dapatkan semua kategori sekaligus dengan harga spesial</p>
                            <div class="flex flex-wrap gap-2" id="bundle-items">
                                <!-- Category badges -->
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-400 text-lg line-through" id="bundle-original">Rp 200.000</p>
                            <p class="text-4xl font-black text-[#1D4E89]" id="bundle-price">Rp 160.000</p>
                            <p class="text-green-600 text-sm font-semibold" id="bundle-save">Hemat Rp 40.000</p>
                            <button onclick="selectBundle()" class="mt-4 px-8 py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold rounded-xl hover:shadow-lg transition-all">
                                Pilih Bundle
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Selection Summary (Sticky Bottom) -->
            <div id="selection-summary" class="hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg p-4 z-30">
                <div class="max-w-6xl mx-auto flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm"><span id="selected-count">0</span> kategori dipilih</p>
                        <p class="text-xl font-black text-[#1D4E89]" id="selected-total">Rp 0</p>
                    </div>
                    <button onclick="proceedToCheckout()" class="px-8 py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold rounded-xl hover:shadow-lg transition-all">
                        Lanjut Bayar →
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 4: CHECKOUT                 -->
    <!-- ================================ -->
    <div id="page-checkout" class="page">
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-2xl mx-auto px-4 py-3">
                <div class="flex items-center gap-4">
                    <button onclick="goToPricing()" class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <div>
                        <p class="font-bold text-gray-900">Checkout</p>
                        <p class="text-gray-500 text-xs">Konfirmasi pesanan Anda</p>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-2xl mx-auto px-4 py-8">
            <!-- Progress -->
            <div class="flex items-center justify-center gap-4 mb-8">
                <div class="flex items-center gap-2">
                    <div class="step-indicator completed w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold">✓</div>
                    <span class="text-sm font-medium text-gray-600">Level</span>
                </div>
                <div class="w-8 h-0.5 bg-green-500"></div>
                <div class="flex items-center gap-2">
                    <div class="step-indicator completed w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold">✓</div>
                    <span class="text-sm font-medium text-gray-600">Kategori</span>
                </div>
                <div class="w-8 h-0.5 bg-green-500"></div>
                <div class="flex items-center gap-2">
                    <div class="step-indicator active w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold">3</div>
                    <span class="text-sm font-medium text-gray-700">Pembayaran</span>
                </div>
            </div>

            <!-- Order Summary Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-[#1D4E89] to-[#2563eb] p-4 text-white">
                    <h3 class="font-bold">📋 Ringkasan Pesanan</h3>
                </div>
                <div class="p-5">
                    <div id="checkout-items" class="space-y-3 mb-4">
                        <!-- Items -->
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold" id="checkout-subtotal">Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center mb-2 text-green-600" id="checkout-discount-row">
                            <span>Diskon Bundle</span>
                            <span class="font-semibold" id="checkout-discount">- Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center text-lg pt-2 border-t border-gray-100">
                            <span class="font-bold text-gray-900">Total</span>
                            <span class="text-2xl font-black text-[#1D4E89]" id="checkout-total">Rp 0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Method (Simulasi) -->
            <div class="bg-white rounded-2xl shadow-lg p-5 mb-6">
                <h3 class="font-bold text-gray-900 mb-4">💳 Metode Pembayaran</h3>
                <div class="space-y-3">
                    <label class="flex items-center gap-3 p-4 border-2 border-blue-500 bg-blue-50 rounded-xl cursor-pointer">
                        <input type="radio" name="payment" checked class="w-5 h-5 text-blue-600">
                        <div class="flex-1">
                            <p class="font-semibold text-gray-900">Demo Payment</p>
                            <p class="text-gray-500 text-xs">Simulasi pembayaran (langsung berhasil)</p>
                        </div>
                        <span class="text-2xl">🎭</span>
                    </label>
                </div>
            </div>

            <button onclick="processPayment()" class="w-full py-4 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold text-lg rounded-xl hover:shadow-lg transition-all">
                Bayar Sekarang
            </button>

            <p class="text-center text-gray-400 text-xs mt-4">
                🔒 Pembayaran aman & terlindungi (Demo Mode)
            </p>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 5: PROCESSING               -->
    <!-- ================================ -->
    <div id="page-processing" class="page">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="text-center">
                <div class="spinner mx-auto mb-6"></div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Memproses Pembayaran...</h2>
                <p class="text-gray-500">Mohon tunggu sebentar</p>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 6: SUCCESS                  -->
    <!-- ================================ -->
    <div id="page-success" class="page">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl">🎉</span>
                </div>
                <h2 class="text-2xl font-black text-gray-900 mb-2">Pembayaran Berhasil!</h2>
                <p class="text-gray-500 mb-6">Kategori telah ditambahkan ke akun Anda</p>
                
                <div class="bg-gray-50 rounded-xl p-4 mb-6 text-left">
                    <p class="text-xs text-gray-500 mb-3 font-medium">Yang Anda dapatkan:</p>
                    <div id="success-items" class="space-y-2">
                        <!-- Items -->
                    </div>
                    <div class="border-t border-gray-200 mt-4 pt-4 flex justify-between">
                        <span class="text-gray-600">Total Dibayar</span>
                        <span class="font-bold text-[#1D4E89]" id="success-total">Rp 0</span>
                    </div>
                </div>

                <div class="space-y-3">
                    <button onclick="goToDashboard()" class="w-full py-3 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white font-bold rounded-xl hover:shadow-lg transition-all">
                        Lihat di Dashboard →
                    </button>
                    <button onclick="goToPricing()" class="w-full py-3 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                        Beli Lagi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 7: EXAM (Simulasi)          -->
    <!-- ================================ -->
    <div id="page-exam" class="page">
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-3xl mx-auto px-4 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button onclick="confirmExitExam()" class="p-2 text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <div>
                            <p class="font-bold text-gray-900" id="exam-title">Ujian HOTS</p>
                            <p class="text-gray-500 text-xs">Level A - Teaching Knowledge</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-center px-4 py-2 bg-red-50 rounded-xl">
                            <p class="text-xs text-red-600 font-medium">Sisa Waktu</p>
                            <p class="text-lg font-bold text-red-600" id="exam-timer">29:45</p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-3xl mx-auto px-4 py-8">
            <!-- Question Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4 text-white flex items-center justify-between">
                    <span class="font-semibold">Soal 1 dari 3</span>
                    <span class="px-3 py-1 bg-white/20 rounded-full text-sm" id="exam-badge">HOTS</span>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-6" id="exam-question">
                        Ini adalah contoh soal ujian untuk kategori yang dipilih. Dalam implementasi sebenarnya, soal akan diambil dari database dengan berbagai jenis pertanyaan.
                    </h3>

                    <div class="space-y-3" id="exam-options">
                        <label class="flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                            <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center text-sm font-bold text-gray-500 group-hover:border-blue-500 group-hover:text-blue-500">A</div>
                            <span class="text-gray-700">Pilihan jawaban A - penjelasan opsi pertama</span>
                            <input type="radio" name="answer" class="ml-auto w-5 h-5 text-blue-600">
                        </label>
                        <label class="flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                            <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center text-sm font-bold text-gray-500 group-hover:border-blue-500 group-hover:text-blue-500">B</div>
                            <span class="text-gray-700">Pilihan jawaban B - penjelasan opsi kedua</span>
                            <input type="radio" name="answer" class="ml-auto w-5 h-5 text-blue-600">
                        </label>
                        <label class="flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                            <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center text-sm font-bold text-gray-500 group-hover:border-blue-500 group-hover:text-blue-500">C</div>
                            <span class="text-gray-700">Pilihan jawaban C - penjelasan opsi ketiga</span>
                            <input type="radio" name="answer" class="ml-auto w-5 h-5 text-blue-600">
                        </label>
                        <label class="flex items-center gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                            <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center text-sm font-bold text-gray-500 group-hover:border-blue-500 group-hover:text-blue-500">D</div>
                            <span class="text-gray-700">Pilihan jawaban D - penjelasan opsi keempat</span>
                            <input type="radio" name="answer" class="ml-auto w-5 h-5 text-blue-600">
                        </label>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="flex gap-4">
                <button class="flex-1 py-3 border border-gray-300 text-gray-500 rounded-xl font-semibold" disabled>
                    ← Sebelumnya
                </button>
                <button onclick="submitExam()" class="flex-1 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-xl hover:shadow-lg transition-all">
                    Selesai & Kirim ✓
                </button>
            </div>

            <p class="text-center text-gray-400 text-xs mt-4">
                ⚠️ Simulasi ujian - hasil otomatis lulus
            </p>
        </div>
    </div>


    <!-- ================================ -->
    <!-- JAVASCRIPT                       -->
    <!-- ================================ -->
    <script>
        // ============ DATA ============
        const CATEGORIES = {
            A: {
                HOTS: { name: 'HOTS', fullName: 'Higher Order Thinking Skills', price: 50000, icon: '💡', color: 'blue' },
                PCK: { name: 'PCK', fullName: 'Pedagogical Content Knowledge', price: 50000, icon: '📚', color: 'green' },
                LITERASI: { name: 'LITERASI', fullName: 'Kemampuan Literasi', price: 50000, icon: '📖', color: 'purple' },
                NUMERASI: { name: 'NUMERASI', fullName: 'Kemampuan Numerasi', price: 50000, icon: '🔢', color: 'orange' }
            },
            B: {
                'MICRO-TEACHING': { name: 'MICRO-TEACHING', fullName: 'Praktik Mengajar Mikro', price: 75000, icon: '🎬', color: 'blue' },
                'LESSON-PLAN': { name: 'LESSON-PLAN', fullName: 'Perencanaan Pembelajaran', price: 75000, icon: '📋', color: 'green' },
                'ASSESSMENT': { name: 'ASSESSMENT', fullName: 'Penilaian Pembelajaran', price: 75000, icon: '📝', color: 'purple' },
                'CLASSROOM-MGT': { name: 'CLASSROOM-MGT', fullName: 'Manajemen Kelas', price: 75000, icon: '🏫', color: 'orange' }
            },
            C: {
                'RESEARCH': { name: 'RESEARCH', fullName: 'Penelitian Tindakan Kelas', price: 100000, icon: '🔬', color: 'blue' },
                'INNOVATION': { name: 'INNOVATION', fullName: 'Inovasi Pembelajaran', price: 100000, icon: '💫', color: 'green' },
                'LEADERSHIP': { name: 'LEADERSHIP', fullName: 'Kepemimpinan Guru', price: 100000, icon: '👑', color: 'purple' },
                'PROFESSIONAL-DEV': { name: 'PROFESSIONAL-DEV', fullName: 'Pengembangan Profesional', price: 100000, icon: '🎯', color: 'orange' }
            }
        };

        const LEVEL_INFO = {
            A: { name: 'Level A', title: 'Teaching Knowledge', desc: 'Fondasi pengetahuan mengajar profesional', gradient: 'from-[#1D4E89] to-[#2563eb]' },
            B: { name: 'Level B', title: 'Teaching Activation', desc: 'Penerapan praktis dalam pembelajaran', gradient: 'from-[#2A9D8F] to-[#40C9B9]' },
            C: { name: 'Level C', title: 'Teaching Mastery', desc: 'Penguasaan dan inovasi mengajar', gradient: 'from-[#E76F51] to-[#F4A261]' }
        };

        const BUNDLE_DISCOUNT = 0.2;

        // ============ STATE ============
        let state = {
            user: null,
            currentLevel: 'A',
            purchasedCategories: { A: [], B: [], C: [] },
            completedCategories: { A: [], B: [], C: [] },
            transactions: [],
            cart: {
                mode: 'terpisah',
                level: 'A',
                items: []
            },
            currentExam: null
        };

        // ============ PERSISTENCE ============
        function saveState() {
            localStorage.setItem('tlc_demo_v2_state', JSON.stringify(state));
        }

        function loadState() {
            const saved = localStorage.getItem('tlc_demo_v2_state');
            if (saved) {
                state = JSON.parse(saved);
            }
        }

        function resetAllData() {
            if (confirm('Hapus semua data demo V2?')) {
                localStorage.removeItem('tlc_demo_v2_state');
                location.reload();
            }
        }

        // ============ NAVIGATION ============
        function showPage(pageId) {
            document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
            document.getElementById(pageId).classList.add('active');
            window.scrollTo(0, 0);
        }

        // ============ AUTH ============
        function doLogin() {
            const name = document.getElementById('input-name').value.trim();
            const email = document.getElementById('input-email').value.trim();
            
            if (!name || !email) {
                showToast('Mohon isi nama dan email', 'error');
                return;
            }

            state.user = { name, email };
            saveState();
            
            showToast(`Selamat datang, ${name}!`, 'success');
            goToDashboard();
        }

        function doLogout() {
            state.user = null;
            saveState();
            showPage('page-auth');
        }

        // ============ DASHBOARD ============
        function goToDashboard() {
            updateDashboard();
            showPage('page-dashboard');
        }

        function updateDashboard() {
            if (!state.user) return;

            // Nav & Welcome
            document.getElementById('nav-username').textContent = state.user.name;
            document.getElementById('nav-email').textContent = state.user.email;
            document.getElementById('welcome-name').textContent = state.user.name;

            // Calculate totals
            const totalCategories = 12;
            const completedTotal = Object.values(state.completedCategories).flat().length;
            const percent = Math.round((completedTotal / totalCategories) * 100);

            document.getElementById('stat-completed').textContent = `${completedTotal}/${totalCategories}`;
            document.getElementById('progress-percent').textContent = `${percent}%`;
            
            // Update progress ring
            const circumference = 2 * Math.PI * 32;
            const offset = circumference - (percent / 100) * circumference;
            document.getElementById('progress-ring').style.strokeDashoffset = offset;

            // Update welcome status
            if (completedTotal === 0) {
                document.getElementById('welcome-status').textContent = 'Mulai perjalanan sertifikasi Anda';
            } else {
                document.getElementById('welcome-status').textContent = `${completedTotal} kategori selesai dari total 12`;
            }

            // Update level tabs
            updateLevelTabs();

            // Update categories for current level
            updateDashboardCategories();

            // Update transactions
            updateTransactionHistory();
        }

        function updateLevelTabs() {
            const levels = ['A', 'B', 'C'];
            
            levels.forEach(level => {
                const tab = document.getElementById(`dash-tab-${level}`);
                const isUnlocked = isLevelUnlocked(level);
                const isCompleted = isLevelCompleted(level);
                
                tab.classList.toggle('locked', !isUnlocked);
                
                if (isUnlocked) {
                    tab.innerHTML = `<span class="text-lg">${isCompleted ? '✅' : '📚'}</span> Level ${level}`;
                } else {
                    tab.innerHTML = `<span class="text-lg">🔒</span> Level ${level}`;
                }

                // Set active
                if (level === state.currentLevel) {
                    tab.classList.add('active');
                    tab.classList.remove('text-gray-400');
                } else {
                    tab.classList.remove('active');
                    if (!isUnlocked) tab.classList.add('text-gray-400');
                }
            });
        }

        function isLevelUnlocked(level) {
            if (level === 'A') return true;
            if (level === 'B') return isLevelCompleted('A');
            if (level === 'C') return isLevelCompleted('B');
            return false;
        }

        function isLevelCompleted(level) {
            const completed = state.completedCategories[level] || [];
            const total = Object.keys(CATEGORIES[level]).length;
            return completed.length === total;
        }

        function selectDashboardLevel(level) {
            if (!isLevelUnlocked(level)) {
                const prev = level === 'B' ? 'A' : 'B';
                showToast(`Selesaikan Level ${prev} terlebih dahulu`, 'error');
                return;
            }

            state.currentLevel = level;
            saveState();

            // Update tab visuals
            ['A', 'B', 'C'].forEach(l => {
                const tab = document.getElementById(`dash-tab-${l}`);
                tab.classList.toggle('active', l === level);
            });

            updateDashboardCategories();
        }

        function updateDashboardCategories() {
            const level = state.currentLevel;
            const info = LEVEL_INFO[level];
            const categories = CATEGORIES[level];
            const purchased = state.purchasedCategories[level] || [];
            const completed = state.completedCategories[level] || [];

            // Update header
            document.getElementById('panel-level-title').textContent = `${info.name} - ${info.title}`;
            document.getElementById('panel-level-desc').textContent = info.desc;
            document.getElementById('panel-progress').textContent = `${completed.length}/${Object.keys(categories).length}`;

            // Update header gradient
            const header = document.getElementById('level-header');
            header.className = `bg-gradient-to-r ${info.gradient} p-5`;

            // Build category cards
            const grid = document.getElementById('dashboard-categories');
            let html = '';

            for (const [key, cat] of Object.entries(categories)) {
                const isOwned = purchased.includes(key);
                const isDone = completed.includes(key);

                let statusBadge = '';
                let cardClass = 'category-card bg-white rounded-xl shadow-sm p-4';
                let actionBtn = '';

                if (isDone) {
                    statusBadge = '<span class="px-2 py-0.5 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full">✓ Lulus</span>';
                    cardClass += ' completed';
                    actionBtn = '<button class="w-full py-2 text-xs font-semibold bg-amber-100 text-amber-700 rounded-lg">Lihat Hasil</button>';
                } else if (isOwned) {
                    statusBadge = '<span class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Dimiliki</span>';
                    cardClass += ' owned';
                    actionBtn = `<button onclick="startExam('${key}')" class="w-full py-2 text-xs font-semibold bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white rounded-lg hover:shadow-md transition-all">Mulai Ujian</button>`;
                } else {
                    statusBadge = '<span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-xs font-semibold rounded-full">Belum Dimiliki</span>';
                    actionBtn = `<button onclick="goToPricing()" class="w-full py-2 text-xs font-semibold border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-50">Beli</button>`;
                }

                html += `
                    <div class="${cardClass}">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-10 h-10 bg-${cat.color}-100 rounded-xl flex items-center justify-center">
                                <span class="text-lg">${cat.icon}</span>
                            </div>
                            ${statusBadge}
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm">${cat.name}</h4>
                        <p class="text-gray-500 text-xs mb-3 truncate">${cat.fullName}</p>
                        ${actionBtn}
                    </div>
                `;
            }

            grid.innerHTML = html;

            // Update action buttons visibility
            const allOwned = Object.keys(categories).every(k => purchased.includes(k));
            document.getElementById('btn-buy-more').style.display = allOwned ? 'none' : 'flex';
            document.getElementById('btn-buy-bundle').style.display = allOwned ? 'none' : 'flex';
        }

        function updateTransactionHistory() {
            const container = document.getElementById('transaction-history');
            
            if (state.transactions.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-8 text-gray-400">
                        <span class="text-4xl mb-2 block">📭</span>
                        <p>Belum ada transaksi</p>
                    </div>
                `;
                return;
            }

            let html = '<div class="space-y-3">';
            state.transactions.slice().reverse().forEach(tx => {
                html += `
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 ${tx.type === 'bundle' ? 'bg-amber-100' : 'bg-green-100'} rounded-xl flex items-center justify-center">
                                <span class="text-lg">${tx.type === 'bundle' ? '📦' : '✅'}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm">${tx.type === 'bundle' ? 'Paket Bundle' : 'Pembelian Satuan'} Level ${tx.level}</p>
                                <p class="text-gray-500 text-xs">${tx.items.join(', ')}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#1D4E89]">${formatPrice(tx.total)}</p>
                            <p class="text-gray-400 text-xs">${tx.date}</p>
                        </div>
                    </div>
                `;
            });
            html += '</div>';
            container.innerHTML = html;
        }

        // ============ PRICING ============
        function goToPricing() {
            state.cart = {
                mode: 'terpisah',
                level: state.currentLevel,
                items: []
            };
            
            updatePricingPage();
            showPage('page-pricing');
        }

        function updatePricingPage() {
            const level = state.cart.level;
            const categories = CATEGORIES[level];
            const purchased = state.purchasedCategories[level] || [];
            const available = Object.keys(categories).filter(k => !purchased.includes(k));

            document.getElementById('available-count').textContent = available.length;

            // Show owned notice
            if (purchased.length > 0) {
                document.getElementById('owned-notice').classList.remove('hidden');
                document.getElementById('owned-list').textContent = purchased.join(', ');
            } else {
                document.getElementById('owned-notice').classList.add('hidden');
            }

            // If all owned
            if (available.length === 0) {
                document.getElementById('section-terpisah').innerHTML = `
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">✅</span>
                        </div>
                        <p class="text-gray-700 font-semibold">Anda sudah memiliki semua kategori Level ${level}</p>
                        <button onclick="goToDashboard()" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-xl font-semibold">Kembali ke Dashboard</button>
                    </div>
                `;
                document.getElementById('section-bundle').classList.add('hidden');
                return;
            }

            // Build category cards
            let html = '';
            available.forEach(key => {
                const cat = categories[key];
                html += `
                    <div class="category-card bg-white rounded-xl shadow-sm p-4 cursor-pointer" onclick="toggleCartItem('${key}')" id="price-cat-${key}">
                        <div class="select-indicator absolute top-3 right-3 w-6 h-6 bg-[#E76F51] rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-${cat.color}-100 rounded-xl flex items-center justify-center mb-3">
                            <span class="text-lg">${cat.icon}</span>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm">${cat.name}</h4>
                        <p class="text-gray-500 text-xs mb-2">${cat.fullName}</p>
                        <p class="font-bold text-[#1D4E89]">${formatPrice(cat.price)}</p>
                    </div>
                `;
            });
            document.getElementById('pricing-categories').innerHTML = html;

            // Bundle info
            let bundleTotal = 0;
            let bundleItems = '';
            available.forEach(key => {
                const cat = categories[key];
                bundleTotal += cat.price;
                bundleItems += `<span class="px-2 py-1 bg-white rounded-lg text-xs font-medium text-gray-700">${cat.icon} ${cat.name}</span>`;
            });
            const bundlePrice = Math.round(bundleTotal * (1 - BUNDLE_DISCOUNT));
            const savings = bundleTotal - bundlePrice;

            document.getElementById('bundle-items').innerHTML = bundleItems;
            document.getElementById('bundle-original').textContent = formatPrice(bundleTotal);
            document.getElementById('bundle-price').textContent = formatPrice(bundlePrice);
            document.getElementById('bundle-save').textContent = `Hemat ${formatPrice(savings)}`;

            // Reset mode
            setPricingMode('terpisah');
        }

        function setPricingMode(mode) {
            state.cart.mode = mode;
            state.cart.items = [];

            document.getElementById('mode-terpisah').classList.toggle('active', mode === 'terpisah');
            document.getElementById('mode-bundle').classList.toggle('active', mode === 'bundle');

            document.getElementById('section-terpisah').classList.toggle('hidden', mode === 'bundle');
            document.getElementById('section-bundle').classList.toggle('hidden', mode === 'terpisah');

            // Clear selections
            document.querySelectorAll('.category-card').forEach(c => c.classList.remove('selected'));
            
            updateSelectionSummary();
        }

        function toggleCartItem(category) {
            if (state.cart.mode === 'bundle') return;

            const idx = state.cart.items.indexOf(category);
            const card = document.getElementById(`price-cat-${category}`);

            if (idx > -1) {
                state.cart.items.splice(idx, 1);
                card.classList.remove('selected');
            } else {
                state.cart.items.push(category);
                card.classList.add('selected');
            }

            updateSelectionSummary();
        }

        function selectBundle() {
            const level = state.cart.level;
            const purchased = state.purchasedCategories[level] || [];
            const available = Object.keys(CATEGORIES[level]).filter(k => !purchased.includes(k));

            state.cart.mode = 'bundle';
            state.cart.items = available;

            proceedToCheckout();
        }

        function updateSelectionSummary() {
            const summary = document.getElementById('selection-summary');
            
            if (state.cart.items.length === 0) {
                summary.classList.add('hidden');
                return;
            }

            summary.classList.remove('hidden');

            const level = state.cart.level;
            let total = 0;
            state.cart.items.forEach(key => {
                total += CATEGORIES[level][key].price;
            });

            document.getElementById('selected-count').textContent = state.cart.items.length;
            document.getElementById('selected-total').textContent = formatPrice(total);
        }

        function proceedToCheckout() {
            if (state.cart.items.length === 0) {
                showToast('Pilih minimal 1 kategori', 'error');
                return;
            }

            updateCheckoutPage();
            showPage('page-checkout');
        }

        function updateCheckoutPage() {
            const { mode, level, items } = state.cart;
            const categories = CATEGORIES[level];

            let html = '';
            let subtotal = 0;

            items.forEach(key => {
                const cat = categories[key];
                html += `
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-${cat.color}-100 rounded-lg flex items-center justify-center">
                                <span class="text-sm">${cat.icon}</span>
                            </div>
                            <span class="text-gray-700 text-sm">${cat.name}</span>
                        </div>
                        <span class="text-gray-800 font-medium">${formatPrice(cat.price)}</span>
                    </div>
                `;
                subtotal += cat.price;
            });

            document.getElementById('checkout-items').innerHTML = html;
            document.getElementById('checkout-subtotal').textContent = formatPrice(subtotal);

            let total = subtotal;
            if (mode === 'bundle') {
                const discount = Math.round(subtotal * BUNDLE_DISCOUNT);
                document.getElementById('checkout-discount').textContent = `- ${formatPrice(discount)}`;
                document.getElementById('checkout-discount-row').classList.remove('hidden');
                total = subtotal - discount;
            } else {
                document.getElementById('checkout-discount-row').classList.add('hidden');
            }

            document.getElementById('checkout-total').textContent = formatPrice(total);
        }

        // ============ PAYMENT ============
        function processPayment() {
            showPage('page-processing');

            setTimeout(() => {
                completePayment();
            }, 2000);
        }

        function completePayment() {
            const { mode, level, items } = state.cart;
            const categories = CATEGORIES[level];

            // Calculate total
            let subtotal = 0;
            items.forEach(key => subtotal += categories[key].price);
            let total = mode === 'bundle' ? Math.round(subtotal * (1 - BUNDLE_DISCOUNT)) : subtotal;

            // Add to purchased
            state.purchasedCategories[level] = [
                ...state.purchasedCategories[level],
                ...items
            ];

            // Add transaction
            state.transactions.push({
                type: mode,
                level: level,
                items: items,
                total: total,
                date: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })
            });

            saveState();

            // Show success
            showSuccessPage(items, total);
        }

        function showSuccessPage(items, total) {
            const level = state.cart.level;
            const categories = CATEGORIES[level];

            let html = '';
            items.forEach(key => {
                const cat = categories[key];
                html += `
                    <div class="flex items-center gap-3 p-2 bg-white rounded-lg">
                        <span class="text-lg">${cat.icon}</span>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">${cat.name}</p>
                            <p class="text-gray-500 text-xs">${cat.fullName}</p>
                        </div>
                    </div>
                `;
            });

            document.getElementById('success-items').innerHTML = html;
            document.getElementById('success-total').textContent = formatPrice(total);

            showPage('page-success');
            showConfetti();
        }

        // ============ EXAM ============
        function startExam(category) {
            const cat = CATEGORIES[state.currentLevel][category];
            state.currentExam = { level: state.currentLevel, category: category };

            document.getElementById('exam-title').textContent = `Ujian ${cat.name}`;
            document.getElementById('exam-badge').textContent = cat.name;

            showPage('page-exam');
        }

        function confirmExitExam() {
            if (confirm('Keluar dari ujian? Progress tidak akan disimpan.')) {
                goToDashboard();
            }
        }

        function submitExam() {
            if (confirm('Kirim jawaban? (Demo: otomatis lulus)')) {
                const { level, category } = state.currentExam;

                if (!state.completedCategories[level].includes(category)) {
                    state.completedCategories[level].push(category);
                }
                saveState();

                showToast(`🎉 Selamat! Anda lulus ujian ${category}`, 'success');
                goToDashboard();
            }
        }

        // ============ UTILITIES ============
        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }

        function showToast(message, type = 'info') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
            
            toast.className = `toast ${bgColor} text-white px-4 py-3 rounded-xl shadow-lg text-sm font-medium max-w-sm`;
            toast.textContent = message;
            
            container.appendChild(toast);
            
            setTimeout(() => toast.remove(), 3000);
        }

        function showConfetti() {
            const colors = ['#E76F51', '#F4A261', '#2A9D8F', '#1D4E89', '#10B981', '#8B5CF6'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                document.body.appendChild(confetti);
                
                setTimeout(() => confetti.remove(), 5000);
            }
        }

        // ============ INIT ============
        document.addEventListener('DOMContentLoaded', () => {
            loadState();
            
            if (state.user) {
                goToDashboard();
            } else {
                showPage('page-auth');
            }
        });
    </script>
</body>

</html>
