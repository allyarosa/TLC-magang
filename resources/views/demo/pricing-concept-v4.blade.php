<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsep Pricing V4 - Bundle Level & Kategori Satuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Custom Gradient Background */
        .gradient-bg {
            background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 50%, #fff7ed 100%);
        }

        /* Toggle Switch Styles */
        .toggle-container {
            background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
        }

        .toggle-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .toggle-btn.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(29, 78, 137, 0.4);
        }

        .toggle-btn:not(.active):hover {
            background: rgba(255, 255, 255, 0.8);
        }

        /* Card Styles */
        .pricing-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .pricing-card.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231, 111, 81, 0.2), 0 25px 50px -12px rgba(231, 111, 81, 0.25);
            transform: translateY(-4px);
        }

        .pricing-card.selected .check-indicator {
            opacity: 1;
            transform: scale(1);
        }

        .check-indicator {
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s ease;
        }

        /* Level Selector Card */
        .level-selector-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .level-selector-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.15);
        }

        .level-selector-card.active {
            border-color: #1D4E89;
            box-shadow: 0 0 0 4px rgba(29, 78, 137, 0.2);
        }

        /* Category Card */
        .category-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .category-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.15);
        }

        .category-card.selected {
            border-color: #E76F51;
            box-shadow: 0 0 0 4px rgba(231, 111, 81, 0.2);
        }

        .category-card.selected .category-check {
            opacity: 1;
            transform: scale(1);
        }

        .category-check {
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s ease;
        }

        /* Bundle Card Special */
        .bundle-card {
            position: relative;
            overflow: hidden;
        }

        .bundle-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        .bundle-level-a {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
        }

        .bundle-level-b {
            background: linear-gradient(135deg, #2A9D8F 0%, #40C9B9 100%);
        }

        .bundle-level-c {
            background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);
        }

        @keyframes shimmer {
            0%, 100% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(180deg);
            }
        }

        /* Summary Card */
        .summary-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Ribbon */
        .ribbon {
            position: absolute;
            top: 20px;
            right: -35px;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 5px 40px;
            font-size: 12px;
            font-weight: 700;
            transform: rotate(45deg);
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.4);
        }

        /* Animated Background Particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            animation: float-particle 8s infinite ease-in-out;
        }

        @keyframes float-particle {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.6;
            }
        }

        /* Price Animation */
        .price-value {
            transition: all 0.4s ease;
        }

        /* Floating Label */
        .float-label {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Discount Badge Animation */
        .discount-badge {
            animation: pulse-badge 2s infinite;
        }

        @keyframes pulse-badge {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        /* Slide transitions */
        .slide-enter {
            animation: slideIn 0.5s ease forwards;
        }

        .slide-exit {
            animation: slideOut 0.3s ease forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        /* Fade In Animation */
        .fade-in {
            animation: fadeIn 0.4s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Stagger Animation */
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }

        /* Category Icon Animation */
        .category-icon {
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* Step Indicator */
        .step-indicator {
            transition: all 0.3s ease;
        }

        .step-indicator.active {
            background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
            color: white;
        }

        .step-indicator.completed {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
        }

        .step-line {
            transition: all 0.5s ease;
        }

        .step-line.active {
            background: linear-gradient(90deg, #1D4E89 0%, #2563eb 100%);
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <!-- Floating Particles Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="particle w-4 h-4 bg-orange-200" style="left: 10%; top: 20%; animation-delay: 0s;"></div>
        <div class="particle w-3 h-3 bg-blue-200" style="left: 80%; top: 30%; animation-delay: 1s;"></div>
        <div class="particle w-5 h-5 bg-orange-100" style="left: 20%; top: 60%; animation-delay: 2s;"></div>
        <div class="particle w-2 h-2 bg-blue-300" style="left: 70%; top: 70%; animation-delay: 3s;"></div>
        <div class="particle w-4 h-4 bg-orange-300" style="left: 90%; top: 50%; animation-delay: 4s;"></div>
    </div>

    <div class="relative z-10 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <span
                    class="inline-flex items-center px-6 py-2 bg-orange-100 text-orange-600 rounded-full text-sm font-bold tracking-widest mb-6">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3 3h4v4l3 3-3 3v4h-4l-3 3-3-3H5v-4L2 12l3-3V5h4l3-3z" />
                    </svg>
                    INVESTASI PENDIDIKAN
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-gray-900 mb-6">
                    Pilih Paket
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1D4E89] to-[#E76F51]">
                        Sertifikasi
                    </span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Tingkatkan kompetensi mengajar Anda dengan program sertifikasi bertingkat yang fleksibel
                </p>
            </div>

            <!-- Toggle Switch -->
            <div class="flex justify-center mb-12">
                <div class="toggle-container p-1.5 rounded-2xl inline-flex">
                    <button onclick="showBundle()" id="btn-bundle"
                        class="toggle-btn active px-8 py-3.5 rounded-xl text-sm font-bold tracking-wide">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Bundle per Level
                        </span>
                    </button>
                    <button onclick="showSatuan()" id="btn-satuan"
                        class="toggle-btn px-8 py-3.5 rounded-xl text-sm font-bold tracking-wide text-gray-600">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Pilih Kategori Satuan
                        </span>
                    </button>
                </div>
            </div>

            <!-- ======================== -->
            <!-- MODE: BUNDLE PER LEVEL  -->
            <!-- ======================== -->
            <div id="section-bundle" class="slide-enter">
                <div class="text-center mb-8">
                    <p class="text-gray-500 text-sm">
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Pilih bundle level dengan semua kategori (Listening, Reading, Writing, Speaking) dalam satu paket
                        </span>
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                    <!-- Bundle Level A Card -->
                    <div class="bundle-card bundle-level-a rounded-3xl shadow-2xl p-8 text-white relative overflow-hidden cursor-pointer pricing-card"
                        onclick="selectBundle('A')" id="bundle-card-A">
                        <!-- Check Indicator -->
                        <div
                            class="check-indicator absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1D4E89]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <!-- Save Badge -->
                        <div class="float-label absolute top-4 left-4 bg-white/20 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-bold">
                            HEMAT 15%
                        </div>

                        <!-- Background Decorations -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-16 -mt-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full blur-xl -ml-12 -mb-12"></div>

                        <div class="relative z-10 mt-8">
                            <!-- Header -->
                            <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-full mb-4">
                                🎁 BUNDLE LEVEL A
                            </div>

                            <h3 class="text-2xl font-black mb-2">Teaching Knowledge</h3>
                            <p class="text-white/80 text-sm mb-6">Semua kategori dalam Level A</p>

                            <!-- Categories Included -->
                            <div class="grid grid-cols-2 gap-2 mb-6">
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Listening
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Reading
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Writing
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Speaking
                                </span>
                            </div>

                            <!-- Price -->
                            <div class="bg-white rounded-2xl p-4 text-center">
                                <p class="text-gray-400 text-sm line-through">Rp 600.000</p>
                                <p class="text-3xl font-black text-[#1D4E89]">Rp 500.000</p>
                                <p class="text-gray-500 text-xs mt-1">4 kategori lengkap</p>
                            </div>

                            <!-- Select Button -->
                            <div class="mt-4 py-3 border-2 border-dashed border-white/30 rounded-xl text-white/70 text-center font-semibold text-sm hover:border-white/60 transition-colors"
                                id="btn-bundle-A">
                                Klik untuk memilih
                            </div>
                        </div>
                    </div>

                    <!-- Bundle Level B Card -->
                    <div class="bundle-card bundle-level-b rounded-3xl shadow-2xl p-8 text-white relative overflow-hidden cursor-pointer pricing-card"
                        onclick="selectBundle('B')" id="bundle-card-B">
                        <!-- Check Indicator -->
                        <div
                            class="check-indicator absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#2A9D8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <!-- Popular Ribbon -->
                        <div class="ribbon">POPULER</div>

                        <!-- Save Badge -->
                        <div class="float-label absolute top-4 left-4 bg-white/20 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-bold">
                            HEMAT 15%
                        </div>

                        <!-- Background Decorations -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-16 -mt-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full blur-xl -ml-12 -mb-12"></div>

                        <div class="relative z-10 mt-8">
                            <!-- Header -->
                            <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-full mb-4">
                                🎁 BUNDLE LEVEL B
                            </div>

                            <h3 class="text-2xl font-black mb-2">Teaching Activation</h3>
                            <p class="text-white/80 text-sm mb-6">Semua kategori dalam Level B</p>

                            <!-- Categories Included -->
                            <div class="grid grid-cols-2 gap-2 mb-6">
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Listening
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Reading
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Writing
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Speaking
                                </span>
                            </div>

                            <!-- Price -->
                            <div class="bg-white rounded-2xl p-4 text-center">
                                <p class="text-gray-400 text-sm line-through">Rp 880.000</p>
                                <p class="text-3xl font-black text-[#2A9D8F]">Rp 750.000</p>
                                <p class="text-gray-500 text-xs mt-1">4 kategori lengkap</p>
                            </div>

                            <!-- Select Button -->
                            <div class="mt-4 py-3 border-2 border-dashed border-white/30 rounded-xl text-white/70 text-center font-semibold text-sm hover:border-white/60 transition-colors"
                                id="btn-bundle-B">
                                Klik untuk memilih
                            </div>
                        </div>
                    </div>

                    <!-- Bundle Level C Card -->
                    <div class="bundle-card bundle-level-c rounded-3xl shadow-2xl p-8 text-white relative overflow-hidden cursor-pointer pricing-card"
                        onclick="selectBundle('C')" id="bundle-card-C">
                        <!-- Check Indicator -->
                        <div
                            class="check-indicator absolute top-4 right-4 w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#E76F51]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <!-- Save Badge -->
                        <div class="float-label absolute top-4 left-4 bg-white/20 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-bold">
                            HEMAT 15%
                        </div>

                        <!-- Background Decorations -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-16 -mt-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full blur-xl -ml-12 -mb-12"></div>

                        <div class="relative z-10 mt-8">
                            <!-- Header -->
                            <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-full mb-4">
                                🎁 BUNDLE LEVEL C
                            </div>

                            <h3 class="text-2xl font-black mb-2">Teaching Mastery</h3>
                            <p class="text-white/80 text-sm mb-6">Semua kategori dalam Level C</p>

                            <!-- Categories Included -->
                            <div class="grid grid-cols-2 gap-2 mb-6">
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Listening
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Reading
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Writing
                                </span>
                                <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-white/20 rounded-lg text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Speaking
                                </span>
                            </div>

                            <!-- Price -->
                            <div class="bg-white rounded-2xl p-4 text-center">
                                <p class="text-gray-400 text-sm line-through">Rp 1.180.000</p>
                                <p class="text-3xl font-black text-[#E76F51]">Rp 1.000.000</p>
                                <p class="text-gray-500 text-xs mt-1">4 kategori lengkap</p>
                            </div>

                            <!-- Select Button -->
                            <div class="mt-4 py-3 border-2 border-dashed border-white/30 rounded-xl text-white/70 text-center font-semibold text-sm hover:border-white/60 transition-colors"
                                id="btn-bundle-C">
                                Klik untuk memilih
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Section (Bundle) -->
                <div id="summary-bundle"
                    class="summary-card rounded-3xl p-8 max-w-2xl mx-auto shadow-2xl hidden slide-enter">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div>
                            <p class="text-gray-500 text-sm mb-1">Paket Bundle yang dipilih:</p>
                            <p class="text-lg font-bold text-gray-800" id="selected-bundle">-</p>
                            <p class="text-sm text-gray-500 mt-1">Termasuk: Listening, Reading, Writing, Speaking</p>
                        </div>
                        <div class="text-center sm:text-right">
                            <p class="text-gray-500 text-sm mb-1">Total Pembayaran</p>
                            <p class="text-4xl font-black text-[#1D4E89] price-value" id="total-bundle-price">Rp 0</p>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <button
                            class="flex-1 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all transform hover:scale-[1.02]">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Lanjut ke Pembayaran
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- =========================== -->
            <!-- MODE: KATEGORI SATUAN      -->
            <!-- =========================== -->
            <div id="section-satuan" class="hidden">
                <!-- Step Indicator -->
                <div class="flex items-center justify-center mb-12">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <div class="step-indicator active w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-sm" id="step-1">
                                1
                            </div>
                            <span class="text-sm font-semibold text-gray-700" id="step-1-text">Pilih Level</span>
                        </div>
                        <div class="step-line w-16 h-1 bg-gray-200 rounded-full"></div>
                        <div class="flex items-center gap-2">
                            <div class="step-indicator w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-sm text-gray-400" id="step-2">
                                2
                            </div>
                            <span class="text-sm font-semibold text-gray-400" id="step-2-text">Pilih Kategori</span>
                        </div>
                    </div>
                </div>

                <!-- Step 1: Pilih Level -->
                <div id="step-level" class="slide-enter">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Pilih Level Sertifikasi</h2>
                        <p class="text-gray-500 text-sm">
                            Tentukan level yang ingin Anda ambil, lalu pilih kategori yang diinginkan
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        <!-- Level A -->
                        <div class="level-selector-card bg-white rounded-2xl shadow-lg p-6 cursor-pointer text-center"
                            onclick="selectLevel('A')" id="level-card-A">
                            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#1D4E89] to-[#2563eb] flex items-center justify-center">
                                <span class="text-2xl font-black text-white">A</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Level A</h3>
                            <p class="text-gray-500 text-sm mb-3">Teaching Knowledge</p>
                            <p class="text-xs text-gray-400">Mulai dari Rp 150.000/kategori</p>
                        </div>

                        <!-- Level B -->
                        <div class="level-selector-card bg-white rounded-2xl shadow-lg p-6 cursor-pointer text-center relative"
                            onclick="selectLevel('B')" id="level-card-B">
                            <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 px-3 py-1 bg-gradient-to-r from-[#2A9D8F] to-[#40C9B9] text-white text-xs font-bold rounded-full">
                                POPULER
                            </div>
                            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#2A9D8F] to-[#40C9B9] flex items-center justify-center">
                                <span class="text-2xl font-black text-white">B</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Level B</h3>
                            <p class="text-gray-500 text-sm mb-3">Teaching Activation</p>
                            <p class="text-xs text-gray-400">Mulai dari Rp 220.000/kategori</p>
                        </div>

                        <!-- Level C -->
                        <div class="level-selector-card bg-white rounded-2xl shadow-lg p-6 cursor-pointer text-center"
                            onclick="selectLevel('C')" id="level-card-C">
                            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gradient-to-br from-[#E76F51] to-[#F4A261] flex items-center justify-center">
                                <span class="text-2xl font-black text-white">C</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Level C</h3>
                            <p class="text-gray-500 text-sm mb-3">Teaching Mastery</p>
                            <p class="text-xs text-gray-400">Mulai dari Rp 295.000/kategori</p>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Pilih Kategori -->
                <div id="step-category" class="hidden">
                    <!-- Back Button -->
                    <div class="mb-6">
                        <button onclick="backToLevelSelection()" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="text-sm font-semibold">Kembali pilih level</span>
                        </button>
                    </div>

                    <div class="text-center mb-8">
                        <div class="inline-flex items-center px-4 py-2 rounded-full text-white text-sm font-bold mb-4" id="selected-level-badge">
                            Level A
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Pilih Kategori yang Diinginkan</h2>
                        <p class="text-gray-500 text-sm">
                            Anda bisa memilih satu atau lebih kategori sesuai kebutuhan
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto mb-10">
                        <!-- Listening -->
                        <div class="category-card bg-white rounded-2xl shadow-lg p-6 cursor-pointer relative fade-in stagger-1"
                            onclick="toggleCategory('listening')" id="cat-listening">
                            <!-- Check Indicator -->
                            <div class="category-check absolute top-3 right-3 w-6 h-6 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="category-icon w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Listening</h3>
                            <p class="text-gray-500 text-xs text-center mb-3">Kemampuan mendengar & memahami</p>
                            <p class="text-center font-bold text-purple-600" id="price-listening">Rp 150.000</p>
                        </div>

                        <!-- Reading -->
                        <div class="category-card bg-white rounded-2xl shadow-lg p-6 cursor-pointer relative fade-in stagger-2"
                            onclick="toggleCategory('reading')" id="cat-reading">
                            <!-- Check Indicator -->
                            <div class="category-check absolute top-3 right-3 w-6 h-6 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="category-icon w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Reading</h3>
                            <p class="text-gray-500 text-xs text-center mb-3">Kemampuan membaca & analisis</p>
                            <p class="text-center font-bold text-blue-600" id="price-reading">Rp 150.000</p>
                        </div>

                        <!-- Writing -->
                        <div class="category-card bg-white rounded-2xl shadow-lg p-6 cursor-pointer relative fade-in stagger-3"
                            onclick="toggleCategory('writing')" id="cat-writing">
                            <!-- Check Indicator -->
                            <div class="category-check absolute top-3 right-3 w-6 h-6 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="category-icon w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Writing</h3>
                            <p class="text-gray-500 text-xs text-center mb-3">Kemampuan menulis & menyusun</p>
                            <p class="text-center font-bold text-green-600" id="price-writing">Rp 150.000</p>
                        </div>

                        <!-- Speaking -->
                        <div class="category-card bg-white rounded-2xl shadow-lg p-6 cursor-pointer relative fade-in stagger-4"
                            onclick="toggleCategory('speaking')" id="cat-speaking">
                            <!-- Check Indicator -->
                            <div class="category-check absolute top-3 right-3 w-6 h-6 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="category-icon w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Speaking</h3>
                            <p class="text-gray-500 text-xs text-center mb-3">Kemampuan berbicara & presentasi</p>
                            <p class="text-center font-bold text-orange-600" id="price-speaking">Rp 150.000</p>
                        </div>
                    </div>

                    <!-- Summary Section (Satuan) -->
                    <div id="summary-satuan"
                        class="summary-card rounded-3xl p-8 max-w-2xl mx-auto shadow-2xl hidden slide-enter">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Kategori yang dipilih:</p>
                                <p class="text-lg font-bold text-gray-800" id="selected-categories">-</p>
                                <p class="text-sm text-gray-500 mt-1" id="selected-level-info">Level A - Teaching Knowledge</p>
                            </div>
                            <div class="text-center sm:text-right">
                                <p class="text-gray-500 text-sm mb-1">Total Pembayaran</p>
                                <p class="text-4xl font-black text-[#1D4E89] price-value" id="total-satuan-price">Rp 0</p>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            <button
                                class="flex-1 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-orange-500/30 transition-all transform hover:scale-[1.02]">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Lanjut ke Pembayaran
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comparison Info -->
            <div class="mt-16 max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h3 class="text-xl font-bold text-center text-gray-800 mb-6">Mengapa Pilih Bundle?</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-1">Hemat 15%</h4>
                            <p class="text-gray-500 text-sm">Dibanding beli satuan per kategori</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-1">Kompetensi Lengkap</h4>
                            <p class="text-gray-500 text-sm">Kuasai semua aspek dalam satu level</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-1">Sertifikat Terintegrasi</h4>
                            <p class="text-gray-500 text-sm">Satu sertifikat untuk semua kategori</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trust Badges -->
            <div class="mt-20 text-center">
                <p class="text-gray-400 text-sm mb-6">Dipercaya oleh ribuan pendidik di seluruh Indonesia</p>
                <div class="flex flex-wrap justify-center gap-8 items-center opacity-50">
                    <div class="flex items-center gap-2 text-gray-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                        <span class="font-semibold">1000+ Guru</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="font-semibold">Tersertifikasi</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <span class="font-semibold">Rating 4.9/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // =====================================
        // DATA & STATE
        // =====================================
        
        // Bundle prices per level (all 4 categories)
        const bundlePrices = {
            A: 500000,
            B: 750000,
            C: 1000000
        };

        // Individual category prices per level
        const categoryPrices = {
            A: {
                listening: 150000,
                reading: 150000,
                writing: 150000,
                speaking: 150000
            },
            B: {
                listening: 220000,
                reading: 220000,
                writing: 220000,
                speaking: 220000
            },
            C: {
                listening: 295000,
                reading: 295000,
                writing: 295000,
                speaking: 295000
            }
        };

        // Level info
        const levelInfo = {
            A: { name: 'Level A', subtitle: 'Teaching Knowledge', color: '#1D4E89', gradient: 'from-[#1D4E89] to-[#2563eb]' },
            B: { name: 'Level B', subtitle: 'Teaching Activation', color: '#2A9D8F', gradient: 'from-[#2A9D8F] to-[#40C9B9]' },
            C: { name: 'Level C', subtitle: 'Teaching Mastery', color: '#E76F51', gradient: 'from-[#E76F51] to-[#F4A261]' }
        };

        // State
        let selectedBundle = null;
        let selectedLevel = null;
        let selectedCategories = new Set();

        // =====================================
        // TOGGLE BETWEEN BUNDLE & SATUAN
        // =====================================
        
        function showBundle() {
            document.getElementById('section-bundle').classList.remove('hidden');
            document.getElementById('section-bundle').classList.add('slide-enter');
            document.getElementById('section-satuan').classList.add('hidden');
            document.getElementById('btn-bundle').classList.add('active');
            document.getElementById('btn-satuan').classList.remove('active');
        }

        function showSatuan() {
            document.getElementById('section-satuan').classList.remove('hidden');
            document.getElementById('section-satuan').classList.add('slide-enter');
            document.getElementById('section-bundle').classList.add('hidden');
            document.getElementById('btn-satuan').classList.add('active');
            document.getElementById('btn-bundle').classList.remove('active');
            
            // Reset to step 1
            resetSatuanMode();
        }

        // =====================================
        // BUNDLE MODE
        // =====================================
        
        function selectBundle(level) {
            // Deselect previous
            if (selectedBundle) {
                document.getElementById(`bundle-card-${selectedBundle}`).classList.remove('selected');
            }

            // Toggle selection
            if (selectedBundle === level) {
                selectedBundle = null;
                document.getElementById('summary-bundle').classList.add('hidden');
            } else {
                selectedBundle = level;
                document.getElementById(`bundle-card-${level}`).classList.add('selected');
                updateBundleSummary();
            }
        }

        function updateBundleSummary() {
            const summary = document.getElementById('summary-bundle');
            const selectedBundleEl = document.getElementById('selected-bundle');
            const totalPriceEl = document.getElementById('total-bundle-price');

            if (!selectedBundle) {
                summary.classList.add('hidden');
                return;
            }

            summary.classList.remove('hidden');
            
            const info = levelInfo[selectedBundle];
            selectedBundleEl.textContent = `Bundle ${info.name} - ${info.subtitle}`;
            totalPriceEl.textContent = formatPrice(bundlePrices[selectedBundle]);

            // Animate price
            totalPriceEl.style.transform = 'scale(1.1)';
            setTimeout(() => {
                totalPriceEl.style.transform = 'scale(1)';
            }, 200);
        }

        // =====================================
        // SATUAN MODE - STEP 1: SELECT LEVEL
        // =====================================
        
        function selectLevel(level) {
            selectedLevel = level;
            selectedCategories.clear();

            // Update step indicators
            document.getElementById('step-1').classList.remove('active');
            document.getElementById('step-1').classList.add('completed');
            document.getElementById('step-1').innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            `;
            document.getElementById('step-2').classList.add('active');
            document.getElementById('step-2-text').classList.remove('text-gray-400');
            document.getElementById('step-2-text').classList.add('text-gray-700');
            document.querySelector('.step-line').classList.add('active');

            // Hide step 1, show step 2
            document.getElementById('step-level').classList.add('hidden');
            document.getElementById('step-category').classList.remove('hidden');
            document.getElementById('step-category').classList.add('slide-enter');

            // Update level badge
            const info = levelInfo[level];
            const badge = document.getElementById('selected-level-badge');
            badge.textContent = info.name;
            badge.className = `inline-flex items-center px-4 py-2 rounded-full text-white text-sm font-bold mb-4 bg-gradient-to-r ${info.gradient}`;

            // Update category prices
            updateCategoryPrices();
            
            // Update level info in summary
            document.getElementById('selected-level-info').textContent = `${info.name} - ${info.subtitle}`;
        }

        function updateCategoryPrices() {
            const prices = categoryPrices[selectedLevel];
            document.getElementById('price-listening').textContent = formatPrice(prices.listening);
            document.getElementById('price-reading').textContent = formatPrice(prices.reading);
            document.getElementById('price-writing').textContent = formatPrice(prices.writing);
            document.getElementById('price-speaking').textContent = formatPrice(prices.speaking);
        }

        function backToLevelSelection() {
            // Reset step indicators
            document.getElementById('step-1').classList.add('active');
            document.getElementById('step-1').classList.remove('completed');
            document.getElementById('step-1').innerHTML = '1';
            document.getElementById('step-2').classList.remove('active');
            document.getElementById('step-2-text').classList.add('text-gray-400');
            document.getElementById('step-2-text').classList.remove('text-gray-700');
            document.querySelector('.step-line').classList.remove('active');

            // Hide step 2, show step 1
            document.getElementById('step-category').classList.add('hidden');
            document.getElementById('step-level').classList.remove('hidden');
            document.getElementById('step-level').classList.add('slide-enter');

            // Reset selections
            selectedLevel = null;
            selectedCategories.clear();
            
            // Reset category cards
            ['listening', 'reading', 'writing', 'speaking'].forEach(cat => {
                document.getElementById(`cat-${cat}`).classList.remove('selected');
            });

            // Hide summary
            document.getElementById('summary-satuan').classList.add('hidden');
        }

        function resetSatuanMode() {
            // Reset to initial state
            document.getElementById('step-1').classList.add('active');
            document.getElementById('step-1').classList.remove('completed');
            document.getElementById('step-1').innerHTML = '1';
            document.getElementById('step-2').classList.remove('active');
            document.getElementById('step-2-text').classList.add('text-gray-400');
            document.getElementById('step-2-text').classList.remove('text-gray-700');
            document.querySelector('.step-line').classList.remove('active');

            document.getElementById('step-level').classList.remove('hidden');
            document.getElementById('step-category').classList.add('hidden');
            document.getElementById('summary-satuan').classList.add('hidden');

            selectedLevel = null;
            selectedCategories.clear();

            // Reset level cards
            ['A', 'B', 'C'].forEach(level => {
                document.getElementById(`level-card-${level}`).classList.remove('active');
            });

            // Reset category cards
            ['listening', 'reading', 'writing', 'speaking'].forEach(cat => {
                document.getElementById(`cat-${cat}`).classList.remove('selected');
            });
        }

        // =====================================
        // SATUAN MODE - STEP 2: SELECT CATEGORIES
        // =====================================
        
        function toggleCategory(category) {
            const card = document.getElementById(`cat-${category}`);

            if (selectedCategories.has(category)) {
                selectedCategories.delete(category);
                card.classList.remove('selected');
            } else {
                selectedCategories.add(category);
                card.classList.add('selected');
            }

            updateSatuanSummary();
        }

        function updateSatuanSummary() {
            const summary = document.getElementById('summary-satuan');
            const selectedCategoriesEl = document.getElementById('selected-categories');
            const totalPriceEl = document.getElementById('total-satuan-price');

            if (selectedCategories.size === 0) {
                summary.classList.add('hidden');
                return;
            }

            summary.classList.remove('hidden');

            // Calculate total
            let total = 0;
            const categoryNames = [];
            const prices = categoryPrices[selectedLevel];

            selectedCategories.forEach(cat => {
                total += prices[cat];
                categoryNames.push(cat.charAt(0).toUpperCase() + cat.slice(1));
            });

            selectedCategoriesEl.textContent = categoryNames.join(', ');
            totalPriceEl.textContent = formatPrice(total);

            // Animate price
            totalPriceEl.style.transform = 'scale(1.1)';
            setTimeout(() => {
                totalPriceEl.style.transform = 'scale(1)';
            }, 200);
        }

        // =====================================
        // UTILITIES
        // =====================================
        
        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }
    </script>
</body>

</html>
