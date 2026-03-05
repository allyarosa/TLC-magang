<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Alur Lengkap - TLC Certification</title>
    {{-- VERSI KETIGA 3 --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 50%, #fff7ed 100%);
        }

        /* Page transitions */
        .page {
            display: none;
            animation: fadeIn 0.4s ease;
        }
        .page.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Card styles */
        .card-selectable {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .card-selectable:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px -10px rgba(0,0,0,0.1);
        }
        .card-selectable.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231, 111, 81, 0.2);
        }

        /* Status badges */
        .badge-available { background: #dbeafe; color: #1e40af; }
        .badge-purchased { background: #d1fae5; color: #065f46; }
        .badge-locked { background: #f3f4f6; color: #6b7280; }
        .badge-completed { background: #fef3c7; color: #92400e; }

        /* Progress bar */
        .progress-fill {
            transition: width 0.5s ease;
        }

        /* Confetti animation */
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

        /* Toast notification */
        .toast {
            animation: slideInRight 0.3s ease, fadeOut 0.3s ease 2.7s forwards;
        }
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fadeOut {
            to { opacity: 0; }
        }

        /* Pulse animation */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .pulse { animation: pulse 2s infinite; }

        /* Loading spinner */
        .spinner {
            border: 3px solid #f3f4f6;
            border-top: 3px solid #E76F51;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* V4 Pricing Styles */
        .v4-toggle {
            background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.06);
        }
        .v4-toggle-btn {
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        .v4-toggle-btn.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(29,78,137,0.4);
        }
        .v4-toggle-btn:not(.active):hover {
            background: rgba(255,255,255,0.8);
        }
        .bundle-card-v4 {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
            border: 2px solid transparent;
            cursor: pointer;
        }
        .bundle-card-v4:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.2);
        }
        .bundle-card-v4.selected {
            border-color: #fbbf24;
            box-shadow: 0 0 0 4px rgba(251,191,36,0.3), 0 25px 50px -12px rgba(0,0,0,0.2);
        }
        .bundle-level-a { background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%); }
        .bundle-level-b { background: linear-gradient(135deg, #2A9D8F 0%, #40C9B9 100%); }
        .bundle-level-c { background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%); }
        .bundle-card-v4::before {
            content: '';
            position: absolute;
            top: -50%; right: -50%;
            width: 100%; height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        }
        .level-pick-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .level-pick-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px -10px rgba(0,0,0,0.12);
        }
        .level-pick-card.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231,111,81,0.15);
        }
        .cat-select-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .cat-select-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px -8px rgba(0,0,0,0.12);
        }
        .cat-select-card.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231,111,81,0.15);
        }
        .v4-particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            animation: v4float 8s infinite ease-in-out;
        }
        @keyframes v4float {
            0%,100% { transform: translateY(0); opacity: 0.3; }
            50% { transform: translateY(-20px); opacity: 0.6; }
        }
        .ribbon-popular {
            position: absolute;
            top: 18px; right: -32px;
            background: #ef4444;
            color: white;
            font-size: 10px;
            font-weight: 800;
            padding: 4px 40px;
            transform: rotate(45deg);
            z-index: 10;
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- ================================ -->
    <!-- PAGE 1: LOGIN/REGISTER           -->
    <!-- ================================ -->
    <div id="page-auth" class="page active">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#1D4E89] to-[#2563eb] rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🎓</span>
                    </div>
                    <h1 class="text-2xl font-black text-gray-900">TLC Program</h1>
                    <p class="text-gray-500 text-sm">Teaching & Learning Certification</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="input-name" value="Hamsa Akif Sanie" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="input-email" value="hamsa@example.com"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <button onclick="doLogin()" 
                        class="w-full py-3 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white font-bold rounded-xl hover:shadow-lg transition-all">
                        Masuk / Daftar Demo
                    </button>
                </div>

                <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                    <p class="text-blue-800 text-xs text-center">
                        ℹ️ Ini adalah demo simulasi. Data disimpan di browser (localStorage).
                        <br><button onclick="resetAllData()" class="underline mt-1">Reset semua data</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 2: DASHBOARD                -->
    <!-- ================================ -->
    <div id="page-dashboard" class="page">
        <!-- Navbar -->
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#1D4E89] to-[#2563eb] rounded-xl flex items-center justify-center">
                        <span class="text-lg">🎓</span>
                    </div>
                    <div>
                        <p class="font-bold text-gray-900 text-sm">TLC Program</p>
                        <p class="text-gray-500 text-xs">Teaching & Learning Certification</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800" id="nav-username">User</p>
                        <p class="text-xs text-gray-500" id="nav-email">user@email.com</p>
                    </div>
                    <button onclick="doLogout()" class="text-gray-400 hover:text-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-[#1D4E89] to-[#2563eb] rounded-3xl p-6 mb-8 text-white">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div>
                        <p class="text-blue-200 text-sm mb-1">Selamat datang,</p>
                        <h2 class="text-2xl font-black" id="welcome-name">User</h2>
                        <p class="text-blue-100 text-sm mt-2" id="welcome-status">Mulai perjalanan sertifikasi Anda</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-center">
                            <p class="text-3xl font-black" id="stat-purchased">0</p>
                            <p class="text-blue-200 text-xs">Kategori Dibeli</p>
                        </div>
                        <div class="w-px h-12 bg-blue-400"></div>
                        <div class="text-center">
                            <p class="text-3xl font-black" id="stat-completed">0</p>
                            <p class="text-blue-200 text-xs">Kategori Lulus</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Level Progress -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <!-- Level A -->
                <div class="bg-white rounded-2xl shadow-md p-5" id="level-card-A">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                <span class="text-lg">📚</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Level A</p>
                                <p class="text-xs text-gray-500">Teaching Knowledge</p>
                            </div>
                        </div>
                        <span class="badge-available px-2 py-1 rounded-full text-xs font-semibold" id="badge-level-A">Tersedia</span>
                    </div>
                    <div class="mb-3">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span>Progress</span>
                            <span id="progress-text-A">0/4 Kategori</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="progress-fill h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full" id="progress-bar-A" style="width: 0%"></div>
                        </div>
                    </div>
                    <button onclick="goToPricing('A')" class="w-full py-2 text-sm font-semibold text-blue-600 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors" id="btn-level-A">
                        Lihat Paket →
                    </button>
                </div>

                <!-- Level B -->
                <div class="bg-white rounded-2xl shadow-md p-5" id="level-card-B">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
                                <span class="text-lg">📗</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Level B</p>
                                <p class="text-xs text-gray-500">Teaching Activation</p>
                            </div>
                        </div>
                        <span class="badge-available px-2 py-1 rounded-full text-xs font-semibold" id="badge-level-B">Tersedia</span>
                    </div>
                    <div class="mb-3">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span>Progress</span>
                            <span id="progress-text-B">0/4 Selesai</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="progress-fill h-full bg-gradient-to-r from-teal-500 to-teal-600 rounded-full" id="progress-bar-B" style="width: 0%"></div>
                        </div>
                    </div>
                    <button onclick="goToPricing('B')" class="w-full py-2 text-sm font-semibold text-teal-600 bg-teal-50 rounded-xl hover:bg-teal-100 transition-colors" id="btn-level-B">
                        Lihat Paket →
                    </button>
                </div>

                <!-- Level C -->
                <div class="bg-white rounded-2xl shadow-md p-5" id="level-card-C">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center">
                                <span class="text-lg">📕</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Level C</p>
                                <p class="text-xs text-gray-500">Teaching Mastery</p>
                            </div>
                        </div>
                        <span class="badge-available px-2 py-1 rounded-full text-xs font-semibold" id="badge-level-C">Tersedia</span>
                    </div>
                    <div class="mb-3">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span>Progress</span>
                            <span id="progress-text-C">0/4 Selesai</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="progress-fill h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full" id="progress-bar-C" style="width: 0%"></div>
                        </div>
                    </div>
                    <button onclick="goToPricing('C')" class="w-full py-2 text-sm font-semibold text-orange-600 bg-orange-50 rounded-xl hover:bg-orange-100 transition-colors" id="btn-level-C">
                        Lihat Paket →
                    </button>
                </div>
            </div>

            <!-- My Categories Section -->
            <div class="bg-white rounded-2xl shadow-md p-6 mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900">📋 Kategori Saya</h3>
                    <span class="text-sm text-gray-500" id="my-categories-count">0 kategori</span>
                </div>

                <div id="my-categories-grid">
                    <!-- Will be populated by JS -->
                </div>

                <!-- Empty State -->
                <div id="empty-categories" class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📭</span>
                    </div>
                    <p class="text-gray-500 mb-4">Anda belum memiliki kategori. Mulai dengan membeli paket.</p>
                    <button onclick="goToPricing()" class="px-6 py-2 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                        Beli Paket Sekarang
                    </button>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="font-bold text-gray-900 mb-4">📜 Riwayat Transaksi</h3>
                <div id="transaction-history">
                    <p class="text-gray-500 text-center py-4">Belum ada transaksi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 3: PRICING (V4 Design)      -->
    <!-- ================================ -->
    <div id="page-pricing" class="page">
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 py-3 flex items-center gap-4">
                <button onclick="goToDashboard()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <div>
                    <p class="font-bold text-gray-900">Pilih Paket Sertifikasi</p>
                    <p class="text-gray-500 text-xs">Teaching & Learning Certification</p>
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto px-4 py-8 relative overflow-hidden">
            <!-- Particles -->
            <div class="v4-particle w-4 h-4 bg-orange-200" style="left:10%;top:15%;animation-delay:0s;"></div>
            <div class="v4-particle w-3 h-3 bg-blue-200" style="left:85%;top:25%;animation-delay:1s;"></div>
            <div class="v4-particle w-5 h-5 bg-orange-100" style="left:25%;top:60%;animation-delay:2s;"></div>
            <div class="v4-particle w-3 h-3 bg-blue-300" style="left:75%;top:70%;animation-delay:3s;"></div>

            <!-- Hero Header -->
            <div class="text-center mb-10 relative z-10">
                <span class="inline-flex items-center px-5 py-1.5 bg-orange-100 text-orange-600 rounded-full text-sm font-bold tracking-widest mb-4">🎓 INVESTASI PENDIDIKAN</span>
                <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mb-3">
                    Pilih Paket <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1D4E89] to-[#E76F51]">Sertifikasi</span>
                </h1>
                <p class="text-gray-500 max-w-2xl mx-auto">Tingkatkan kompetensi mengajar Anda dengan program sertifikasi bertingkat yang fleksibel</p>
            </div>

            <!-- Already Purchased Info -->
            <div id="already-purchased-info" class="hidden bg-green-50 border border-green-200 rounded-xl p-4 mb-6 max-w-5xl mx-auto">
                <div class="flex items-start gap-3">
                    <span class="text-xl">✅</span>
                    <div>
                        <p class="text-green-800 font-semibold">Anda sudah memiliki beberapa kategori</p>
                        <p class="text-green-700 text-sm" id="already-purchased-text">-</p>
                    </div>
                </div>
            </div>

            <!-- Toggle Bundle / Satuan -->
            <div class="flex justify-center mb-8 relative z-10">
                <div class="v4-toggle p-1.5 rounded-2xl inline-flex">
                    <button id="v4-btn-bundle" class="v4-toggle-btn active px-8 py-3.5 rounded-xl text-sm font-bold tracking-wide flex items-center gap-2" onclick="switchPricingTab('bundle')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        Bundle per Level
                    </button>
                    <button id="v4-btn-satuan" class="v4-toggle-btn px-8 py-3.5 rounded-xl text-sm font-bold tracking-wide text-gray-600 flex items-center gap-2" onclick="switchPricingTab('satuan')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        Pilih Kategori Satuan
                    </button>
                </div>
            </div>

            <!-- ====== BUNDLE VIEW ====== -->
            <div id="v4-bundle-view">
                <p class="text-center text-gray-500 text-sm mb-8">🔥 Pilih bundle level dengan semua kategori (HOTS, PCK, Literasi, Numerasi) dalam satu paket</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto mb-8" id="v4-bundle-cards">
                    <!-- JS will populate -->
                </div>
            </div>

            <!-- ====== SATUAN VIEW ====== -->
            <div id="v4-satuan-view" class="hidden">
                <!-- Step indicator -->
                <div class="flex items-center justify-center gap-3 mb-8">
                    <div class="flex items-center gap-2" id="v4-step-1">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-[#10B981] to-[#059669] text-white flex items-center justify-center text-sm font-bold">1</div>
                        <span class="text-sm font-semibold text-gray-700">Pilih Level</span>
                    </div>
                    <div class="w-16 h-0.5 bg-gray-300" id="v4-step-line"></div>
                    <div class="flex items-center gap-2" id="v4-step-2">
                        <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-bold" id="v4-step-2-badge">2</div>
                        <span class="text-sm font-medium text-gray-400" id="v4-step-2-label">Pilih Kategori</span>
                    </div>
                </div>

                <!-- Level Picker -->
                <div id="v4-level-picker">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-black text-gray-900">Pilih Level Sertifikasi</h2>
                        <p class="text-gray-500 text-sm">Tentukan level yang ingin Anda ambil, lalu pilih kategori yang diinginkan</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-8" id="v4-level-cards">
                        <!-- JS will populate -->
                    </div>
                </div>

                <!-- Category Picker (hidden until level selected) -->
                <div id="v4-category-picker" class="hidden">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-black text-gray-900" id="v4-cat-title">Pilih Kategori Level A</h2>
                        <p class="text-gray-500 text-sm">Klik kategori yang ingin dibeli. Anda bisa pilih lebih dari satu.</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto mb-6" id="v4-cat-grid">
                        <!-- JS will populate -->
                    </div>
                </div>

                <!-- Why Bundle? -->
                <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-6 max-w-4xl mx-auto border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-4">Mengapa Pilih Bundle?</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">💰</span></div>
                            <p class="font-semibold text-gray-800 text-sm">Hemat 15%</p>
                            <p class="text-gray-500 text-xs">Diskon otomatis untuk bundle</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">📦</span></div>
                            <p class="font-semibold text-gray-800 text-sm">Semua Kategori</p>
                            <p class="text-gray-500 text-xs">4 kategori lengkap per level</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-3"><span class="text-xl">🏆</span></div>
                            <p class="font-semibold text-gray-800 text-sm">Sertifikat Level</p>
                            <p class="text-gray-500 text-xs">Sertifikat lengkap per level</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ====== CHECKOUT SUMMARY ====== -->
            <div id="checkout-summary" class="hidden bg-white rounded-2xl shadow-lg p-6 max-w-3xl mx-auto mt-8">
                <h3 class="font-bold text-gray-800 mb-4">📝 Ringkasan Pesanan</h3>
                <div id="checkout-items" class="space-y-2 mb-4"></div>
                <div class="border-t border-gray-100 pt-4 mb-4">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-gray-900">Total Bayar</span>
                        <span class="text-2xl font-black text-[#1D4E89]" id="checkout-total">Rp 0</span>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button onclick="doCheckout()" class="flex-1 py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold rounded-xl hover:shadow-lg transition-all">
                        Bayar Sekarang →
                    </button>
                    <button onclick="cancelSelection()" class="px-6 py-3 rounded-xl border border-gray-200 font-semibold text-gray-600 hover:bg-gray-50">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 4: PAYMENT PROCESSING       -->
    <!-- ================================ -->
    <div id="page-payment" class="page">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md text-center">
                <div class="spinner mx-auto mb-6"></div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Memproses Pembayaran...</h2>
                <p class="text-gray-500 text-sm">Mohon tunggu sebentar</p>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 5: PAYMENT SUCCESS          -->
    <!-- ================================ -->
    <div id="page-success" class="page">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl">✅</span>
                </div>
                <h2 class="text-2xl font-black text-gray-900 mb-2">Pembayaran Berhasil!</h2>
                <p class="text-gray-500 mb-6" id="success-message">Kategori telah ditambahkan ke akun Anda</p>
                
                <div class="bg-gray-50 rounded-xl p-4 mb-6 text-left">
                    <p class="text-xs text-gray-500 mb-2">Kategori yang dibeli:</p>
                    <div id="success-items" class="space-y-1">
                        <!-- Items -->
                    </div>
                    <div class="border-t border-gray-200 mt-3 pt-3 flex justify-between">
                        <span class="text-sm text-gray-600">Total Dibayar</span>
                        <span class="font-bold text-[#1D4E89]" id="success-total">Rp 0</span>
                    </div>
                </div>

                <button onclick="goToDashboard()" class="w-full py-3 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white font-bold rounded-xl hover:shadow-lg transition-all">
                    Kembali ke Dashboard →
                </button>
            </div>
        </div>
    </div>

    <!-- ================================ -->
    <!-- PAGE 6: TAKE EXAM (SIMULASI)     -->
    <!-- ================================ -->
    <div id="page-exam" class="page">
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button onclick="goToDashboard()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <div>
                        <p class="font-bold text-gray-900" id="exam-title">Ujian HOTS</p>
                        <p class="text-gray-500 text-xs">Level A - Teaching Knowledge</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-semibold text-gray-800">Waktu</p>
                    <p class="text-lg font-bold text-[#E76F51]" id="exam-timer">30:00</p>
                </div>
            </div>
        </nav>

        <div class="max-w-2xl mx-auto px-4 py-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-medium text-gray-500">Soal 1 dari 3</span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold" id="exam-category-badge">HOTS</span>
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 mb-4" id="exam-question">
                    Ini adalah contoh soal simulasi untuk kategori yang dipilih. Dalam implementasi sebenarnya, soal akan diambil dari database.
                </h3>

                <div class="space-y-3" id="exam-options">
                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <input type="radio" name="answer" class="w-5 h-5 text-blue-600">
                        <span class="text-gray-700">Pilihan jawaban A</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <input type="radio" name="answer" class="w-5 h-5 text-blue-600">
                        <span class="text-gray-700">Pilihan jawaban B</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <input type="radio" name="answer" class="w-5 h-5 text-blue-600">
                        <span class="text-gray-700">Pilihan jawaban C</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <input type="radio" name="answer" class="w-5 h-5 text-blue-600">
                        <span class="text-gray-700">Pilihan jawaban D</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-4">
                <button onclick="goToDashboard()" class="flex-1 py-3 border border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50">
                    Keluar
                </button>
                <button onclick="submitExam()" class="flex-1 py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold rounded-xl hover:shadow-lg">
                    Selesai & Submit
                </button>
            </div>

            <p class="text-center text-gray-400 text-xs mt-4">
                ⚠️ Ini adalah simulasi ujian. Dalam implementasi sebenarnya, soal dan penilaian akan lebih lengkap.
            </p>
        </div>
    </div>


    <!-- ================================ -->
    <!-- JAVASCRIPT                       -->
    <!-- ================================ -->
    <script>
        // ============ DATA STRUCTURE ============
        const CATEGORIES = {
            A: {
                HOTS: { name: 'HOTS', fullName: 'Higher Order Thinking Skills', price: 150000, icon: '💡', color: 'blue' },
                PCK: { name: 'PCK', fullName: 'Pedagogical Content Knowledge', price: 150000, icon: '📚', color: 'green' },
                LITERASI: { name: 'Literasi', fullName: 'Kemampuan Membaca & Memahami', price: 150000, icon: '📖', color: 'purple' },
                NUMERASI: { name: 'Numerasi', fullName: 'Kemampuan Berhitung & Logika', price: 150000, icon: '🔢', color: 'orange' }
            },
            B: {
                HOTS: { name: 'HOTS', fullName: 'Higher Order Thinking Skills', price: 220000, icon: '💡', color: 'blue' },
                PCK: { name: 'PCK', fullName: 'Pedagogical Content Knowledge', price: 220000, icon: '📚', color: 'green' },
                LITERASI: { name: 'Literasi', fullName: 'Kemampuan Membaca & Memahami', price: 220000, icon: '📖', color: 'purple' },
                NUMERASI: { name: 'Numerasi', fullName: 'Kemampuan Berhitung & Logika', price: 220000, icon: '🔢', color: 'orange' }
            },
            C: {
                HOTS: { name: 'HOTS', fullName: 'Higher Order Thinking Skills', price: 295000, icon: '💡', color: 'blue' },
                PCK: { name: 'PCK', fullName: 'Pedagogical Content Knowledge', price: 295000, icon: '📚', color: 'green' },
                LITERASI: { name: 'Literasi', fullName: 'Kemampuan Membaca & Memahami', price: 295000, icon: '📖', color: 'purple' },
                NUMERASI: { name: 'Numerasi', fullName: 'Kemampuan Berhitung & Logika', price: 295000, icon: '🔢', color: 'orange' }
            }
        };

        const LEVEL_META = {
            A: { title: 'Teaching Knowledge', css: 'bundle-level-a', circleGrad: 'from-[#1D4E89] to-[#2563eb]', textColor: 'text-[#1D4E89]' },
            B: { title: 'Teaching Activation', css: 'bundle-level-b', circleGrad: 'from-[#2A9D8F] to-[#40C9B9]', textColor: 'text-[#2A9D8F]' },
            C: { title: 'Teaching Mastery', css: 'bundle-level-c', circleGrad: 'from-[#E76F51] to-[#F4A261]', textColor: 'text-[#E76F51]' }
        };

        const BUNDLE_DISCOUNT = 0.15; // 15%

        // ============ STATE ============
        let state = {
            user: null,
            purchasedCategories: {}, // { A: ['HOTS', 'PCK'], B: [] }
            completedCategories: {}, // { A: ['HOTS'], B: [] }
            transactions: [],
            currentPurchase: {
                mode: null, // 'bundle' or 'satuan'
                level: 'A',
                selectedCategories: []
            }
        };

        // ============ PERSISTENCE ============
        function saveState() {
            localStorage.setItem('tlc_demo_state', JSON.stringify(state));
        }

        function loadState() {
            const saved = localStorage.getItem('tlc_demo_state');
            if (saved) {
                state = JSON.parse(saved);
            }
        }

        function resetAllData() {
            if (confirm('Hapus semua data demo?')) {
                localStorage.removeItem('tlc_demo_state');
                location.reload();
            }
        }

        // ============ PAGE NAVIGATION ============
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
            if (!state.purchasedCategories.A) {
                state.purchasedCategories = { A: [], B: [], C: [] };
                state.completedCategories = { A: [], B: [], C: [] };
            }
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

            // Update nav
            document.getElementById('nav-username').textContent = state.user.name;
            document.getElementById('nav-email').textContent = state.user.email;
            document.getElementById('welcome-name').textContent = state.user.name;

            // Stats
            const totalPurchased = Object.values(state.purchasedCategories).flat().length;
            const totalCompleted = Object.values(state.completedCategories).flat().length;
            document.getElementById('stat-purchased').textContent = totalPurchased;
            document.getElementById('stat-completed').textContent = totalCompleted;

            // Update welcome status
            if (totalPurchased === 0) {
                document.getElementById('welcome-status').textContent = 'Mulai perjalanan sertifikasi Anda';
            } else if (totalCompleted === totalPurchased && totalPurchased > 0) {
                document.getElementById('welcome-status').textContent = '🎉 Semua kategori selesai!';
            } else {
                document.getElementById('welcome-status').textContent = `${totalPurchased} kategori dibeli, ${totalCompleted} selesai`;
            }

            // Update each level card
            const levelColors = { A: 'blue', B: 'teal', C: 'orange' };
            ['A','B','C'].forEach(lv => {
                const purchased = state.purchasedCategories[lv] || [];
                const completed = state.completedCategories[lv] || [];
                const total = Object.keys(CATEGORIES[lv]).length;
                const color = levelColors[lv];

                // Progress bar and text
                const progressText = document.getElementById(`progress-text-${lv}`);
                const progressBar = document.getElementById(`progress-bar-${lv}`);
                if (progressText) progressText.textContent = `${completed.length}/${total} Selesai`;
                if (progressBar) progressBar.style.width = `${(completed.length / total) * 100}%`;

                // Badge
                const badge = document.getElementById(`badge-level-${lv}`);
                const btn = document.getElementById(`btn-level-${lv}`);
                const card = document.getElementById(`level-card-${lv}`);

                if (completed.length === total && total > 0) {
                    badge.textContent = 'Selesai';
                    badge.className = 'badge-completed px-2 py-1 rounded-full text-xs font-semibold';
                    if (btn) btn.textContent = '✅ Lihat Sertifikat';
                } else if (purchased.length > 0) {
                    badge.textContent = 'Dalam Progress';
                    badge.className = 'badge-purchased px-2 py-1 rounded-full text-xs font-semibold';
                } else {
                    badge.textContent = 'Tersedia';
                    badge.className = 'badge-available px-2 py-1 rounded-full text-xs font-semibold';
                }

                // Unlock all levels (no gating)
                if (card) card.classList.remove('opacity-60');
                if (btn) {
                    btn.disabled = false;
                    if (purchased.length === 0 && completed.length === 0) {
                        btn.textContent = 'Lihat Paket →';
                    }
                    btn.className = `w-full py-2 text-sm font-semibold text-${color}-600 bg-${color}-50 rounded-xl hover:bg-${color}-100 transition-colors`;
                }
            });

            // My Categories Grid
            updateMyCategoriesGrid();

            // Transaction History
            updateTransactionHistory();
        }

        function updateMyCategoriesGrid() {
            const container = document.getElementById('my-categories-grid');
            const emptyState = document.getElementById('empty-categories');

            let allPurchasedCount = 0;
            ['A','B','C'].forEach(lv => {
                allPurchasedCount += (state.purchasedCategories[lv] || []).length;
            });

            document.getElementById('my-categories-count').textContent = `${allPurchasedCount} kategori`;

            if (allPurchasedCount === 0) {
                container.innerHTML = '';
                emptyState.classList.remove('hidden');
                return;
            }

            emptyState.classList.add('hidden');

            let html = '';
            ['A','B','C'].forEach(lv => {
                const purchased = state.purchasedCategories[lv] || [];
                const completed = state.completedCategories[lv] || [];
                if (purchased.length === 0) return;

                html += `<h4 class="font-semibold text-gray-600 text-sm mt-4 mb-2">Level ${lv} — ${LEVEL_META[lv].title}</h4>`;
                html += '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-2">';

                for (const [key, cat] of Object.entries(CATEGORIES[lv])) {
                    const isPurchased = purchased.includes(key);
                    const isCompleted = completed.includes(key);

                    if (isPurchased) {
                        html += `
                            <div class="bg-gradient-to-br from-${cat.color}-50 to-white border ${isCompleted ? 'border-green-300' : 'border-' + cat.color + '-200'} rounded-xl p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="w-10 h-10 bg-${cat.color}-100 rounded-lg flex items-center justify-center">
                                        <span class="text-lg">${cat.icon}</span>
                                    </div>
                                    ${isCompleted 
                                        ? '<span class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-semibold rounded-full">✓ Lulus</span>'
                                        : '<span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Tersedia</span>'
                                    }
                                </div>
                                <h4 class="font-bold text-gray-900">${cat.name}</h4>
                                <p class="text-gray-500 text-xs mb-3">${cat.fullName}</p>
                                ${isCompleted
                                    ? '<button class="w-full py-2 text-xs font-semibold text-green-700 bg-green-100 rounded-lg">Lihat Hasil</button>'
                                    : `<button onclick="startExam('${key}','${lv}')" class="w-full py-2 text-xs font-semibold text-white bg-gradient-to-r from-[#1D4E89] to-[#2563eb] rounded-lg hover:shadow-md transition-all">Mulai Ujian</button>`
                                }
                            </div>
                        `;
                    }
                }
                html += '</div>';
            });
            container.innerHTML = html;
        }

        function updateTransactionHistory() {
            const container = document.getElementById('transaction-history');
            
            if (state.transactions.length === 0) {
                container.innerHTML = '<p class="text-gray-500 text-center py-4">Belum ada transaksi</p>';
                return;
            }

            let html = '<div class="space-y-3">';
            state.transactions.slice().reverse().forEach(tx => {
                html += `
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <span class="text-lg">✅</span>
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
        let pricingTab = 'bundle';

        function goToPricing(level) {
            state.currentPurchase = { mode: null, level: level || 'A', selectedCategories: [] };
            pricingTab = 'bundle';
            renderPricingPage();
            showPage('page-pricing');
        }

        function renderPricingPage() {
            // Show purchased info
            let allPurchased = [];
            ['A','B','C'].forEach(lv => {
                (state.purchasedCategories[lv] || []).forEach(k => allPurchased.push(`${k} (Level ${lv})`));
            });
            if (allPurchased.length > 0) {
                document.getElementById('already-purchased-info').classList.remove('hidden');
                document.getElementById('already-purchased-text').textContent = `Sudah dimiliki: ${allPurchased.join(', ')}`;
            } else {
                document.getElementById('already-purchased-info').classList.add('hidden');
            }

            // Toggle
            document.getElementById('v4-btn-bundle').classList.toggle('active', pricingTab === 'bundle');
            document.getElementById('v4-btn-satuan').classList.toggle('active', pricingTab === 'satuan');
            document.getElementById('v4-bundle-view').classList.toggle('hidden', pricingTab !== 'bundle');
            document.getElementById('v4-satuan-view').classList.toggle('hidden', pricingTab !== 'satuan');
            document.getElementById('checkout-summary').classList.add('hidden');

            if (pricingTab === 'bundle') renderBundleCards();
            else renderSatuanView();
        }

        function switchPricingTab(tab) {
            pricingTab = tab;
            state.currentPurchase = { mode: null, level: state.currentPurchase.level || 'A', selectedCategories: [] };
            renderPricingPage();
        }

        // ---- BUNDLE ----
        function renderBundleCards() {
            const container = document.getElementById('v4-bundle-cards');
            let html = '';
            ['A','B','C'].forEach(lv => {
                const meta = LEVEL_META[lv];
                const cats = CATEGORIES[lv];
                const keys = Object.keys(cats);
                const purchased = state.purchasedCategories[lv] || [];
                const available = keys.filter(k => !purchased.includes(k));
                const allOwned = available.length === 0;

                let originalTotal = 0;
                keys.forEach(k => originalTotal += cats[k].price);
                const bundleTotal = Math.round(originalTotal * (1 - BUNDLE_DISCOUNT));

                const isSelected = state.currentPurchase.mode === 'bundle' && state.currentPurchase.level === lv;
                const isPopular = lv === 'B';

                html += `
                <div class="bundle-card-v4 ${meta.css} rounded-3xl shadow-2xl p-7 text-white ${isSelected ? 'selected' : ''} ${allOwned ? 'opacity-50 pointer-events-none' : ''}" onclick="selectBundleCard('${lv}')" id="v4-bundle-${lv}">
                    ${isPopular ? '<div class="ribbon-popular">POPULER</div>' : ''}
                    <div class="absolute top-4 left-4 bg-white/20 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-bold">HEMAT 15%</div>
                    <div class="relative z-10 mt-8">
                        <div class="inline-flex items-center px-4 py-1.5 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-full mb-4">🎁 BUNDLE LEVEL ${lv}</div>
                        <h3 class="text-2xl font-black mb-1">${meta.title}</h3>
                        <p class="text-white/80 text-sm mb-5">Semua kategori dalam Level ${lv}</p>
                        <div class="grid grid-cols-2 gap-2 mb-5">
                            ${keys.map(k => `<span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">● ${cats[k].name}</span>`).join('')}
                        </div>
                        <div class="bg-white rounded-2xl p-4 text-center">
                            <p class="text-gray-400 text-sm line-through">${formatPrice(originalTotal)}</p>
                            <p class="text-3xl font-black ${meta.textColor}">${formatPrice(bundleTotal)}</p>
                            <p class="text-gray-500 text-xs mt-1">${allOwned ? 'Sudah dimiliki' : keys.length + ' kategori lengkap'}</p>
                        </div>
                        <button class="w-full mt-4 py-2.5 bg-white/20 hover:bg-white/30 rounded-xl text-sm font-bold transition-colors">${allOwned ? '✅ Sudah Dimiliki' : 'Klik untuk memilih'}</button>
                    </div>
                </div>`;
            });
            container.innerHTML = html;
        }

        function selectBundleCard(level) {
            const purchased = state.purchasedCategories[level] || [];
            const available = Object.keys(CATEGORIES[level]).filter(k => !purchased.includes(k));
            if (available.length === 0) return;

            // Toggle: if already selected, deselect
            if (state.currentPurchase.mode === 'bundle' && state.currentPurchase.level === level) {
                state.currentPurchase = { mode: null, level: 'A', selectedCategories: [] };
                renderBundleCards();
                document.getElementById('checkout-summary').classList.add('hidden');
                return;
            }

            state.currentPurchase = { mode: 'bundle', level: level, selectedCategories: available };
            renderBundleCards();
            updateCheckoutSummary();
        }

        // ---- SATUAN ----
        function renderSatuanView() {
            // Level cards
            const container = document.getElementById('v4-level-cards');
            let html = '';
            ['A','B','C'].forEach(lv => {
                const meta = LEVEL_META[lv];
                const cats = CATEGORIES[lv];
                const firstPrice = cats[Object.keys(cats)[0]].price;
                const isPopular = lv === 'B';
                const isSelected = state.currentPurchase.level === lv && state.currentPurchase.mode === 'satuan';

                html += `
                <div class="level-pick-card bg-white rounded-2xl shadow-lg p-6 text-center relative ${isSelected ? 'selected' : ''}" onclick="selectSatuanLevel('${lv}')">
                    ${isPopular ? '<div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">POPULER</div>' : ''}
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-br ${meta.circleGrad} flex items-center justify-center text-white text-2xl font-black">${lv}</div>
                    <h4 class="text-lg font-bold text-gray-900">Level ${lv}</h4>
                    <p class="text-gray-500 text-sm">${meta.title}</p>
                    <p class="text-gray-400 text-xs mt-2">Mulai dari ${formatPrice(firstPrice)}/kategori</p>
                </div>`;
            });
            container.innerHTML = html;

            // Reset category picker
            document.getElementById('v4-category-picker').classList.add('hidden');
            document.getElementById('v4-step-2-badge').className = 'w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-bold';
            document.getElementById('v4-step-2-label').className = 'text-sm font-medium text-gray-400';
            document.getElementById('v4-step-line').className = 'w-16 h-0.5 bg-gray-300';
        }

        function selectSatuanLevel(level) {
            state.currentPurchase = { mode: 'satuan', level: level, selectedCategories: [] };
            document.getElementById('checkout-summary').classList.add('hidden');

            // Update level cards highlight
            renderSatuanView();
            // Re-highlight selected
            document.querySelectorAll('.level-pick-card').forEach(c => c.classList.remove('selected'));
            // We need to re-render then select - simpler: just render category picker
            const container = document.getElementById('v4-level-cards');
            // re-select visually
            setTimeout(() => {
                const cards = container.children;
                ['A','B','C'].forEach((lv, i) => {
                    if (lv === level) cards[i].classList.add('selected');
                });
            }, 10);

            // Activate step 2
            document.getElementById('v4-step-2-badge').className = 'w-8 h-8 rounded-full bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white flex items-center justify-center text-sm font-bold';
            document.getElementById('v4-step-2-label').className = 'text-sm font-semibold text-gray-700';
            document.getElementById('v4-step-line').className = 'w-16 h-0.5 bg-gradient-to-r from-[#10B981] to-[#2563eb]';

            // Render categories
            renderCategoryPicker(level);
        }

        function renderCategoryPicker(level) {
            const picker = document.getElementById('v4-category-picker');
            picker.classList.remove('hidden');
            document.getElementById('v4-cat-title').textContent = `Pilih Kategori Level ${level}`;

            const cats = CATEGORIES[level];
            const purchased = state.purchasedCategories[level] || [];
            const grid = document.getElementById('v4-cat-grid');
            let html = '';
            Object.keys(cats).forEach(key => {
                const cat = cats[key];
                const owned = purchased.includes(key);
                const isSelected = state.currentPurchase.selectedCategories.includes(key);
                html += `
                <div class="cat-select-card bg-white rounded-2xl shadow p-5 text-center ${isSelected ? 'selected' : ''} ${owned ? 'opacity-50 pointer-events-none' : ''}" onclick="toggleSatuanCategory('${key}')" id="v4-cat-${key}">
                    <div class="w-14 h-14 mx-auto mb-3 rounded-xl bg-gradient-to-br from-${cat.color}-100 to-${cat.color}-200 flex items-center justify-center text-2xl">${cat.icon}</div>
                    <h4 class="font-bold text-gray-900">${cat.name}</h4>
                    <p class="text-gray-500 text-xs mb-2">${cat.fullName}</p>
                    <p class="font-bold ${LEVEL_META[level].textColor}">${owned ? '✅ Dimiliki' : formatPrice(cat.price)}</p>
                </div>`;
            });
            grid.innerHTML = html;

            // Scroll to categories
            picker.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function toggleSatuanCategory(key) {
            const idx = state.currentPurchase.selectedCategories.indexOf(key);
            if (idx > -1) {
                state.currentPurchase.selectedCategories.splice(idx, 1);
            } else {
                state.currentPurchase.selectedCategories.push(key);
            }
            // Re-render category cards
            renderCategoryPicker(state.currentPurchase.level);
            updateCheckoutSummary();
        }

        function cancelSelection() {
            state.currentPurchase = { mode: null, level: state.currentPurchase.level || 'A', selectedCategories: [] };
            document.getElementById('checkout-summary').classList.add('hidden');
            if (pricingTab === 'bundle') renderBundleCards();
            else renderSatuanView();
        }

        function updateCheckoutSummary() {
            const { mode, level, selectedCategories } = state.currentPurchase;
            if (!selectedCategories || selectedCategories.length === 0) {
                document.getElementById('checkout-summary').classList.add('hidden');
                return;
            }
            document.getElementById('checkout-summary').classList.remove('hidden');

            let itemsHtml = '';
            let total = 0;
            const cats = CATEGORIES[level];
            selectedCategories.forEach(key => {
                const cat = cats[key];
                itemsHtml += `<div class="flex justify-between text-sm"><span class="text-gray-600">${cat.icon} ${cat.name} (Level ${level})</span><span class="text-gray-800">${formatPrice(cat.price)}</span></div>`;
                total += cat.price;
            });

            if (mode === 'bundle') {
                const discount = Math.round(total * BUNDLE_DISCOUNT);
                itemsHtml += `<div class="flex justify-between text-sm text-green-600"><span>Diskon Bundle (15%)</span><span>- ${formatPrice(discount)}</span></div>`;
                total -= discount;
            }

            document.getElementById('checkout-items').innerHTML = itemsHtml;
            document.getElementById('checkout-total').textContent = formatPrice(total);
        }

        // ============ CHECKOUT ============
        function doCheckout() {
            const { mode, level, selectedCategories } = state.currentPurchase;
            
            if (selectedCategories.length === 0) {
                showToast('Pilih minimal 1 kategori', 'error');
                return;
            }

            // Show payment processing
            showPage('page-payment');

            // Simulate payment delay
            setTimeout(() => {
                // Calculate total
                let total = 0;
                selectedCategories.forEach(key => {
                    total += CATEGORIES[level][key].price;
                });
                if (mode === 'bundle') {
                    total = Math.round(total * (1 - BUNDLE_DISCOUNT));
                }

                // Add to purchased
                state.purchasedCategories[level] = [
                    ...state.purchasedCategories[level],
                    ...selectedCategories
                ];

                // Add transaction
                state.transactions.push({
                    type: mode,
                    level: level,
                    items: selectedCategories,
                    total: total,
                    date: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })
                });

                saveState();

                // Show success
                showSuccessPage(selectedCategories, total, level);
            }, 2000);
        }

        function showSuccessPage(categories, total, level) {
            let itemsHtml = '';
            categories.forEach(key => {
                const cat = CATEGORIES[level][key];
                itemsHtml += `<p class="text-sm text-gray-700">✓ ${cat.icon} ${cat.name} (Level ${level})</p>`;
            });
            document.getElementById('success-items').innerHTML = itemsHtml;
            document.getElementById('success-total').textContent = formatPrice(total);

            showPage('page-success');
            showConfetti();
        }

        // ============ EXAM ============
        function startExam(category, level) {
            level = level || 'A';
            const cat = CATEGORIES[level][category];
            document.getElementById('exam-title').textContent = `Ujian ${cat.name}`;
            document.getElementById('exam-category-badge').textContent = cat.name;

            state.currentExam = { category, level };
            showPage('page-exam');
        }

        function submitExam() {
            const { category, level } = state.currentExam || { category: null, level: 'A' };
            if (!category) return;

            if (confirm('Submit ujian? (Demo: akan selalu lulus)')) {
                if (!state.completedCategories[level]) state.completedCategories[level] = [];
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
            
            toast.className = `toast ${bgColor} text-white px-4 py-3 rounded-xl shadow-lg text-sm font-medium`;
            toast.textContent = message;
            
            container.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        function showConfetti() {
            const colors = ['#E76F51', '#F4A261', '#2A9D8F', '#1D4E89', '#10B981'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 2 + 's';
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
