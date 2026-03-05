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
                <div class="bg-white rounded-2xl shadow-md p-5 opacity-60" id="level-card-B">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center">
                                <span class="text-lg">🔒</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Level B</p>
                                <p class="text-xs text-gray-500">Teaching Activation</p>
                            </div>
                        </div>
                        <span class="badge-locked px-2 py-1 rounded-full text-xs font-semibold" id="badge-level-B">Terkunci</span>
                    </div>
                    <p class="text-xs text-gray-500 mb-3">Selesaikan Level A untuk membuka</p>
                    <button disabled class="w-full py-2 text-sm font-semibold text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed" id="btn-level-B">
                        🔒 Terkunci
                    </button>
                </div>

                <!-- Level C -->
                <div class="bg-white rounded-2xl shadow-md p-5 opacity-60" id="level-card-C">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center">
                                <span class="text-lg">🔒</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Level C</p>
                                <p class="text-xs text-gray-500">Teaching Mastery</p>
                            </div>
                        </div>
                        <span class="badge-locked px-2 py-1 rounded-full text-xs font-semibold" id="badge-level-C">Terkunci</span>
                    </div>
                    <p class="text-xs text-gray-500 mb-3">Selesaikan Level B untuk membuka</p>
                    <button disabled class="w-full py-2 text-sm font-semibold text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed" id="btn-level-C">
                        🔒 Terkunci
                    </button>
                </div>
            </div>

            <!-- My Categories Section - Level A -->
            <div class="bg-white rounded-2xl shadow-md p-6 mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900">📋 Kategori Level A Saya</h3>
                    <span class="text-sm text-gray-500" id="my-categories-count-A">0 dari 4 kategori</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="my-categories-grid-A">
                    <!-- Will be populated by JS -->
                </div>

                <!-- Empty State -->
                <div id="empty-categories-A" class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📭</span>
                    </div>
                    <p class="text-gray-500 mb-4">Anda belum memiliki kategori Level A. Mulai dengan membeli paket.</p>
                    <button onclick="goToPricing('A')" class="px-6 py-2 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                        Beli Paket Level A
                    </button>
                </div>
            </div>

            <!-- My Categories Section - Level B -->
            <div class="bg-white rounded-2xl shadow-md p-6 mb-8" id="section-level-B" style="display: none;">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900">📋 Kategori Level B Saya</h3>
                    <span class="text-sm text-gray-500" id="my-categories-count-B">0 dari 2 kategori</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="my-categories-grid-B">
                    <!-- Will be populated by JS -->
                </div>

                <div id="empty-categories-B" class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📭</span>
                    </div>
                    <p class="text-gray-500 mb-4">Anda belum memiliki kategori Level B.</p>
                    <button onclick="goToPricing('B')" class="px-6 py-2 bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                        Beli Paket Level B
                    </button>
                </div>
            </div>

            <!-- My Categories Section - Level C -->
            <div class="bg-white rounded-2xl shadow-md p-6 mb-8" id="section-level-C" style="display: none;">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900">📋 Kategori Level C Saya</h3>
                    <span class="text-sm text-gray-500" id="my-categories-count-C">0 dari 2 kategori</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="my-categories-grid-C">
                    <!-- Will be populated by JS -->
                </div>

                <div id="empty-categories-C" class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📭</span>
                    </div>
                    <p class="text-gray-500 mb-4">Anda belum memiliki kategori Level C.</p>
                    <button onclick="goToPricing('C')" class="px-6 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                        Beli Paket Level C
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
    <!-- PAGE 3: PRICING/BUY              -->
    <!-- ================================ -->
    <div id="page-pricing" class="page">
        <nav class="bg-white shadow-sm sticky top-0 z-40">
            <div class="max-w-4xl mx-auto px-4 py-3 flex items-center gap-4">
                <button onclick="goToDashboard()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <div>
                    <p class="font-bold text-gray-900" id="pricing-title">Pilih Paket Level A</p>
                    <p class="text-gray-500 text-xs" id="pricing-subtitle">Teaching Knowledge Certification</p>
                </div>
            </div>
        </nav>

        <div class="max-w-4xl mx-auto px-4 py-8">
            <!-- Already Purchased Info -->
            <div id="already-purchased-info" class="hidden bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
                <div class="flex items-start gap-3">
                    <span class="text-xl">✅</span>
                    <div>
                        <p class="text-green-800 font-semibold">Anda sudah memiliki beberapa kategori</p>
                        <p class="text-green-700 text-sm" id="already-purchased-text">-</p>
                    </div>
                </div>
            </div>

            <!-- Mode Selection -->
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Pilih Cara Pembelian</h2>
                <p class="text-gray-500 text-sm">Pilihan tidak dapat diubah setelah checkout</p>
            </div>

            <!-- Bundle vs Satuan Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" id="mode-selection">
                <!-- Bundle Card -->
                <div class="card-selectable bg-white rounded-3xl p-6 shadow-lg relative overflow-hidden" onclick="selectPurchaseMode('bundle')" id="pricing-mode-bundle">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full pulse">
                        HEMAT 20%
                    </div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center" id="radio-bundle">
                            <div class="w-3 h-3 rounded-full bg-[#E76F51] hidden" id="radio-bundle-dot"></div>
                        </div>
                        <h3 class="text-xl font-black text-gray-900">📦 Paket Bundle</h3>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Beli semua kategori sekaligus</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4" id="bundle-categories">
                        <!-- Will show available categories -->
                    </div>

                    <div class="flex items-end justify-between mb-4">
                        <div>
                            <p class="text-gray-400 text-sm line-through" id="bundle-original-price">Rp 200.000</p>
                            <p class="text-3xl font-black text-[#1D4E89]" id="bundle-final-price">Rp 160.000</p>
                        </div>
                        <p class="text-green-600 text-sm font-semibold" id="bundle-savings">Hemat Rp 40.000</p>
                    </div>
                </div>

                <!-- Satuan Card -->
                <div class="card-selectable bg-white rounded-3xl p-6 shadow-lg" onclick="selectPurchaseMode('satuan')" id="pricing-mode-satuan">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center" id="radio-satuan">
                            <div class="w-3 h-3 rounded-full bg-[#E76F51] hidden" id="radio-satuan-dot"></div>
                        </div>
                        <h3 class="text-xl font-black text-gray-900">🔢 Beli Satuan</h3>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Pilih kategori yang ingin dibeli</p>

                    <div class="space-y-2 mb-4" id="satuan-categories">
                        <!-- Will show individual categories -->
                    </div>

                    <div class="flex items-end justify-between mb-4">
                        <div>
                            <p class="text-gray-400 text-sm">Mulai dari</p>
                            <p class="text-3xl font-black text-[#1D4E89]">Rp 50.000</p>
                        </div>
                        <p class="text-gray-500 text-sm">per kategori</p>
                    </div>
                </div>
            </div>

            <!-- Category Selection (for Satuan mode) -->
            <div id="satuan-selection" class="hidden">
                <h3 class="font-bold text-gray-800 mb-4">Pilih Kategori:</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6" id="satuan-category-grid">
                    <!-- Will be populated -->
                </div>
            </div>

            <!-- Checkout Summary -->
            <div id="checkout-summary" class="hidden bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-bold text-gray-800 mb-4">📝 Ringkasan Pesanan</h3>
                <div id="checkout-items" class="space-y-2 mb-4">
                    <!-- Items -->
                </div>
                <div class="border-t border-gray-100 pt-4 mb-4">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-gray-900">Total Bayar</span>
                        <span class="text-2xl font-black text-[#1D4E89]" id="checkout-total">Rp 0</span>
                    </div>
                </div>
                <button onclick="doCheckout()" class="w-full py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold rounded-xl hover:shadow-lg transition-all">
                    Bayar Sekarang →
                </button>
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
                HOTS: { name: 'HOTS', fullName: 'Higher Order Thinking Skills', price: 50000, icon: '💡', color: 'blue' },
                PCK: { name: 'PCK', fullName: 'Pedagogical Content Knowledge', price: 50000, icon: '📚', color: 'green' },
                LITERASI: { name: 'LITERASI', fullName: 'Kemampuan Membaca & Memahami', price: 50000, icon: '📖', color: 'purple' },
                NUMERASI: { name: 'NUMERASI', fullName: 'Kemampuan Berhitung & Logika', price: 50000, icon: '🔢', color: 'orange' }
            },
            B: {
                CLASSROOM: { name: 'CLASSROOM', fullName: 'Classroom Management', price: 60000, icon: '🏫', color: 'teal' },
                ENGAGEMENT: { name: 'ENGAGEMENT', fullName: 'Student Engagement', price: 60000, icon: '🎯', color: 'yellow' }
            },
            C: {
                LEADERSHIP: { name: 'LEADERSHIP', fullName: 'Educational Leadership', price: 70000, icon: '🌟', color: 'red' },
                INNOVATION: { name: 'INNOVATION', fullName: 'Teaching Innovation', price: 70000, icon: '🚀', color: 'indigo' }
            }
        };

        const BUNDLE_DISCOUNT = 0.2; // 20%

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

            console.log('State on updateDashboard:', state);

            // Update nav
            document.getElementById('nav-username').textContent = state.user.name;
            document.getElementById('nav-email').textContent = state.user.email;
            document.getElementById('welcome-name').textContent = state.user.name;

            // Stats
            const totalPurchased = Object.values(state.purchasedCategories).flat().length;
            const totalCompleted = Object.values(state.completedCategories).flat().length;
            document.getElementById('stat-purchased').textContent = totalPurchased;
            document.getElementById('stat-completed').textContent = totalCompleted;

            // Level A Progress
            const purchasedA = state.purchasedCategories.A || [];
            const completedA = state.completedCategories.A || [];
            const totalA = Object.keys(CATEGORIES.A).length;

            document.getElementById('progress-text-A').textContent = `${completedA.length}/${totalA} Selesai`;
            document.getElementById('progress-bar-A').style.width = `${(completedA.length / totalA) * 100}%`;

            // Level B Progress
            const purchasedB = state.purchasedCategories.B || [];
            const completedB = state.completedCategories.B || [];
            const totalB = Object.keys(CATEGORIES.B).length;

            console.log('Completed A:', completedA.length, 'Total A:', totalA);
            console.log('Completed B:', completedB.length, 'Total B:', totalB);

            if (completedA.length === totalA) {
                console.log('Unlocking Level B');
                document.getElementById('level-card-B').classList.remove('opacity-60');
                document.getElementById('badge-level-B').textContent = 'Tersedia';
                const btnB = document.getElementById('btn-level-B');
                btnB.disabled = false;
                btnB.textContent = 'Lihat Paket →';
                btnB.className = 'w-full py-2 text-sm font-semibold text-teal-600 bg-teal-50 rounded-xl hover:bg-teal-100 transition-colors cursor-pointer';
                btnB.onclick = function() { goToPricing('B'); };
            }

            if (completedB.length === totalB) {
                console.log('Unlocking Level C');
                document.getElementById('level-card-C').classList.remove('opacity-60');
                document.getElementById('badge-level-C').textContent = 'Tersedia';
                const btnC = document.getElementById('btn-level-C');
                btnC.disabled = false;
                btnC.textContent = 'Lihat Paket →';
                btnC.className = 'w-full py-2 text-sm font-semibold text-teal-600 bg-teal-50 rounded-xl hover:bg-teal-100 transition-colors cursor-pointer';
                btnC.onclick = function() { goToPricing('C'); };
            }

            // Update welcome status
            if (purchasedA.length === 0) {
                document.getElementById('welcome-status').textContent = 'Mulai perjalanan sertifikasi Anda';
            } else if (completedA.length === totalA) {
                document.getElementById('welcome-status').textContent = '🎉 Level A Selesai! Lanjut ke Level B';
            } else {
                document.getElementById('welcome-status').textContent = `${purchasedA.length} kategori dibeli, ${completedA.length} selesai`;
            }

            // Level A Badge
            if (completedA.length === totalA) {
                document.getElementById('badge-level-A').textContent = 'Selesai';
                document.getElementById('badge-level-A').className = 'badge-completed px-2 py-1 rounded-full text-xs font-semibold';
                document.getElementById('btn-level-A').textContent = '✅ Lihat Sertifikat';
            } else if (purchasedA.length > 0) {
                document.getElementById('badge-level-A').textContent = 'Dalam Progress';
                document.getElementById('badge-level-A').className = 'badge-purchased px-2 py-1 rounded-full text-xs font-semibold';
            }

            // My Categories Grid
            updateMyCategoriesGrid();

            // Transaction History
            updateTransactionHistory();
        }

        function updateMyCategoriesGrid() {
            // Update Level A categories
            updateLevelCategoriesGrid('A', Object.keys(CATEGORIES.A).length);
            
            // Update Level B categories (show section if Level A is completed)
            const completedA = state.completedCategories.A || [];
            const totalA = Object.keys(CATEGORIES.A).length;
            if (completedA.length === totalA) {
                document.getElementById('section-level-B').style.display = 'block';
                updateLevelCategoriesGrid('B', Object.keys(CATEGORIES.B).length);
            }
            
            // Update Level C categories (show section if Level B is completed)
            const completedB = state.completedCategories.B || [];
            const totalB = Object.keys(CATEGORIES.B).length;
            if (completedB.length === totalB) {
                document.getElementById('section-level-C').style.display = 'block';
                updateLevelCategoriesGrid('C', Object.keys(CATEGORIES.C).length);
            }
        }

        function updateLevelCategoriesGrid(level, totalCategories) {
            const grid = document.getElementById(`my-categories-grid-${level}`);
            const emptyState = document.getElementById(`empty-categories-${level}`);
            const purchased = state.purchasedCategories[level] || [];
            const completed = state.completedCategories[level] || [];
            const total = Object.keys(CATEGORIES[level]).length;

            document.getElementById(`my-categories-count-${level}`).textContent = `${purchased.length} dari ${total} kategori`;

            if (purchased.length === 0) {
                grid.innerHTML = '';
                emptyState.classList.remove('hidden');
                return;
            }

            emptyState.classList.add('hidden');
            
            let html = '';
            for (const [key, cat] of Object.entries(CATEGORIES[level])) {
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
                                : `<button onclick="startExam('${key}', '${level}')" class="w-full py-2 text-xs font-semibold text-white bg-gradient-to-r from-[#1D4E89] to-[#2563eb] rounded-lg hover:shadow-md transition-all">Mulai Ujian</button>`
                            }
                        </div>
                    `;
                } else {
                    html += `
                        <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-4 opacity-60">
                            <div class="flex items-center justify-between mb-2">
                                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-lg">🔒</span>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-500">${cat.name}</h4>
                            <p class="text-gray-400 text-xs mb-3">Belum dibeli</p>
                            <button onclick="goToPricing('${level}')" class="w-full py-2 text-xs font-semibold text-gray-500 bg-gray-200 rounded-lg">Beli Sekarang</button>
                        </div>
                    `;
                }
            }
            grid.innerHTML = html;
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
        function goToPricing(level) {
            state.currentPurchase = {
                mode: null,
                level: level,
                selectedCategories: []
            };
            
            updatePricingPage();
            showPage('page-pricing');
        }

        function updatePricingPage() {
            const level = state.currentPurchase.level;
            const categories = CATEGORIES[level];
            const purchased = state.purchasedCategories[level] || [];
            const available = Object.keys(categories).filter(k => !purchased.includes(k));

            // Update pricing page title based on level
            const levelNames = {
                A: { title: 'Pilih Paket Level A', subtitle: 'Teaching Knowledge Certification' },
                B: { title: 'Pilih Paket Level B', subtitle: 'Teaching Activation Certification' },
                C: { title: 'Pilih Paket Level C', subtitle: 'Teaching Mastery Certification' }
            };
            document.getElementById('pricing-title').textContent = levelNames[level].title;
            document.getElementById('pricing-subtitle').textContent = levelNames[level].subtitle;

            // Show already purchased info
            if (purchased.length > 0) {
                document.getElementById('already-purchased-info').classList.remove('hidden');
                document.getElementById('already-purchased-text').textContent = `Kategori yang sudah dimiliki: ${purchased.join(', ')}`;
            } else {
                document.getElementById('already-purchased-info').classList.add('hidden');
            }

            // If all purchased, show message
            if (available.length === 0) {
                document.getElementById('mode-selection').innerHTML = `
                    <div class="col-span-2 text-center py-8">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">✅</span>
                        </div>
                        <p class="text-gray-700 font-semibold">Anda sudah memiliki semua kategori Level ${level}</p>
                        <button onclick="goToDashboard()" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-xl font-semibold">Kembali ke Dashboard</button>
                    </div>
                `;
                return;
            }

            // Calculate bundle price for available categories only
            let totalOriginal = 0;
            available.forEach(key => {
                totalOriginal += categories[key].price;
            });
            const bundlePrice = Math.round(totalOriginal * (1 - BUNDLE_DISCOUNT));
            const savings = totalOriginal - bundlePrice;

            // Update bundle card
            document.getElementById('bundle-original-price').textContent = formatPrice(totalOriginal);
            document.getElementById('bundle-final-price').textContent = formatPrice(bundlePrice);
            document.getElementById('bundle-savings').textContent = `Hemat ${formatPrice(savings)}`;

            // Bundle categories badges
            let bundleCatHtml = '';
            available.forEach(key => {
                const cat = categories[key];
                bundleCatHtml += `<span class="px-2 py-1 bg-${cat.color}-100 text-${cat.color}-700 rounded-lg text-xs font-medium">✓ ${cat.name}</span>`;
            });
            document.getElementById('bundle-categories').innerHTML = bundleCatHtml;

            // Satuan categories list
            let satuanHtml = '';
            available.forEach(key => {
                const cat = categories[key];
                satuanHtml += `
                    <div class="flex items-center justify-between px-3 py-2 bg-gray-50 rounded-lg">
                        <span class="text-xs font-medium text-gray-700">${cat.icon} ${cat.name}</span>
                        <span class="text-xs text-gray-500">${formatPrice(cat.price)}</span>
                    </div>
                `;
            });
            document.getElementById('satuan-categories').innerHTML = satuanHtml;

            // Satuan category grid (for selection)
            let gridHtml = '';
            available.forEach(key => {
                const cat = categories[key];
                gridHtml += `
                    <div class="card-selectable bg-white rounded-xl p-4 shadow-sm" onclick="toggleCategorySelection('${key}')" id="select-cat-${key}">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-${cat.color}-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-lg">${cat.icon}</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-bold text-gray-900 text-sm">${cat.name}</h4>
                                    <input type="checkbox" class="w-5 h-5 rounded border-gray-300" id="check-${key}">
                                </div>
                                <p class="text-gray-500 text-xs">${cat.fullName}</p>
                                <p class="font-semibold text-[#1D4E89] text-sm mt-1">${formatPrice(cat.price)}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
            document.getElementById('satuan-category-grid').innerHTML = gridHtml;

            // Reset selection
            document.getElementById('pricing-mode-bundle').classList.remove('selected');
            document.getElementById('pricing-mode-satuan').classList.remove('selected');
            document.getElementById('radio-bundle-dot').classList.add('hidden');
            document.getElementById('radio-satuan-dot').classList.add('hidden');
            document.getElementById('satuan-selection').classList.add('hidden');
            document.getElementById('checkout-summary').classList.add('hidden');
        }

        function selectPurchaseMode(mode) {
            state.currentPurchase.mode = mode;
            state.currentPurchase.selectedCategories = [];

            // Update UI
            document.getElementById('pricing-mode-bundle').classList.toggle('selected', mode === 'bundle');
            document.getElementById('pricing-mode-satuan').classList.toggle('selected', mode === 'satuan');
            document.getElementById('radio-bundle-dot').classList.toggle('hidden', mode !== 'bundle');
            document.getElementById('radio-satuan-dot').classList.toggle('hidden', mode !== 'satuan');

            if (mode === 'bundle') {
                // Select all available categories
                const level = state.currentPurchase.level;
                const purchased = state.purchasedCategories[level] || [];
                state.currentPurchase.selectedCategories = Object.keys(CATEGORIES[level]).filter(k => !purchased.includes(k));
                
                document.getElementById('satuan-selection').classList.add('hidden');
                updateCheckoutSummary();
            } else {
                document.getElementById('satuan-selection').classList.remove('hidden');
                document.getElementById('checkout-summary').classList.add('hidden');
            }
        }

        function toggleCategorySelection(category) {
            const idx = state.currentPurchase.selectedCategories.indexOf(category);
            const card = document.getElementById(`select-cat-${category}`);
            const checkbox = document.getElementById(`check-${category}`);

            if (idx > -1) {
                state.currentPurchase.selectedCategories.splice(idx, 1);
                card.classList.remove('selected');
                checkbox.checked = false;
            } else {
                state.currentPurchase.selectedCategories.push(category);
                card.classList.add('selected');
                checkbox.checked = true;
            }

            updateCheckoutSummary();
        }

        function updateCheckoutSummary() {
            const { mode, level, selectedCategories } = state.currentPurchase;
            
            if (selectedCategories.length === 0) {
                document.getElementById('checkout-summary').classList.add('hidden');
                return;
            }

            document.getElementById('checkout-summary').classList.remove('hidden');

            let itemsHtml = '';
            let total = 0;
            const categories = CATEGORIES[level];

            selectedCategories.forEach(key => {
                const cat = categories[key];
                itemsHtml += `
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">${cat.icon} ${cat.name}</span>
                        <span class="text-gray-800">${formatPrice(cat.price)}</span>
                    </div>
                `;
                total += cat.price;
            });

            if (mode === 'bundle') {
                const discount = Math.round(total * BUNDLE_DISCOUNT);
                itemsHtml += `
                    <div class="flex justify-between text-sm text-green-600">
                        <span>Diskon Bundle (20%)</span>
                        <span>- ${formatPrice(discount)}</span>
                    </div>
                `;
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

            // Simulate payment delay
            setTimeout(() => {
                let total = 0;
                selectedCategories.forEach(key => {
                    total += CATEGORIES[level][key].price;
                });
                if (mode === 'bundle') {
                    total = Math.round(total * (1 - BUNDLE_DISCOUNT));
                }

                state.purchasedCategories[level] = [
                    ...state.purchasedCategories[level],
                    ...selectedCategories
                ];

                state.transactions.push({
                    type: mode,
                    level: level,
                    items: selectedCategories,
                    total: total,
                    date: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })
                });

                saveState();
                showSuccessPage(selectedCategories, total);
            }, 2000);
        }

        function showSuccessPage(categories, total) {
            const level = state.currentPurchase.level;
            let itemsHtml = '';
            categories.forEach(key => {
                const cat = CATEGORIES[level][key];
                itemsHtml += `<p class="text-sm text-gray-700">✓ ${cat.icon} ${cat.name}</p>`;
            });
            document.getElementById('success-items').innerHTML = itemsHtml;
            document.getElementById('success-total').textContent = formatPrice(total);

            showPage('page-success');
            showConfetti();
        }

        // ============ EXAM ============
        function startExam(category, level = 'A') {
            const cat = CATEGORIES[level][category];
            document.getElementById('exam-title').textContent = `Ujian ${cat.name}`;
            document.getElementById('exam-category-badge').textContent = cat.name;
            
            state.currentExam = category;
            state.currentExamLevel = level;
            showPage('page-exam');
        }

        function submitExam() {
            const category = state.currentExam;
            const level = state.currentExamLevel || 'A';

            // Simulate exam result (always pass for demo)
            if (confirm('Submit ujian? (Demo: akan selalu lulus)')) {
                // Add to completed
                if (!state.completedCategories[level].includes(category)) {
                    state.completedCategories[level].push(category);
                }
                saveState();

                // Update dashboard to reflect changes
                updateDashboard();

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
