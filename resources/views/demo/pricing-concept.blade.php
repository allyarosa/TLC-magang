<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsep Pricing - Bundle vs Terpisah</title>
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

        /* Bundle Card Special */
        .bundle-card {
            background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);
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

        /* Checkbox Custom */
        .custom-checkbox {
            appearance: none;
            width: 24px;
            height: 24px;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .custom-checkbox:checked {
            background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);
            border-color: #E76F51;
        }

        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 14px;
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
                    <button onclick="showTerpisah()" id="btn-terpisah"
                        class="toggle-btn active px-8 py-3.5 rounded-xl text-sm font-bold tracking-wide">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Pilih Sendiri
                        </span>
                    </button>
                    <button onclick="showBundle()" id="btn-bundle"
                        class="toggle-btn px-8 py-3.5 rounded-xl text-sm font-bold tracking-wide text-gray-600">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Paket Bundle
                        </span>
                    </button>
                </div>
            </div>

            <!-- ===================== -->
            <!-- MODE: PILIH TERPISAH -->
            <!-- ===================== -->
            <div id="section-terpisah" class="slide-enter">
                <div class="text-center mb-8">
                    <p class="text-gray-500 text-sm">
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Pilih satu atau lebih level sesuai kebutuhan Anda
                        </span>
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                    <!-- Level A Card -->
                    <div class="pricing-card bg-white rounded-3xl shadow-xl p-8 cursor-pointer relative overflow-hidden"
                        onclick="toggleLevel('A')" id="card-A">
                        <!-- Check Indicator -->
                        <div
                            class="check-indicator absolute top-4 right-4 w-8 h-8 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <!-- Header -->
                        <div
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white text-xs font-bold rounded-full mb-6">
                            LEVEL A
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-2">Teaching Knowledge</h3>
                        <p class="text-gray-500 text-sm mb-6">Fondasi pengetahuan mengajar profesional</p>

                        <!-- Price -->
                        <div class="mb-6">
                            <span class="text-4xl font-black text-[#1D4E89]">Rp 500.000</span>
                        </div>

                        <!-- Features -->
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Uji Literasi & Numerasi
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Pedagogical Content Knowledge
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Higher Order Thinking Skills
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Sertifikat Digital
                            </li>
                        </ul>

                        <!-- Select Button -->
                        <div class="flex items-center justify-center gap-3 py-3 border-2 border-dashed border-gray-200 rounded-xl text-gray-400 group-hover:border-orange-300 transition-colors"
                            id="btn-select-A">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-semibold text-sm">Klik untuk memilih</span>
                        </div>
                    </div>

                    <!-- Level B Card -->
                    <div class="pricing-card bg-white rounded-3xl shadow-xl p-8 cursor-pointer relative overflow-hidden"
                        onclick="toggleLevel('B')" id="card-B">
                        <!-- Check Indicator -->
                        <div
                            class="check-indicator absolute top-4 right-4 w-8 h-8 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <!-- Popular Ribbon -->
                        <div class="ribbon">POPULER</div>

                        <!-- Header -->
                        <div
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#2A9D8F] to-[#40C9B9] text-white text-xs font-bold rounded-full mb-6">
                            LEVEL B
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-2">Teaching Activation</h3>
                        <p class="text-gray-500 text-sm mb-6">Implementasi strategi pengajaran nyata</p>

                        <!-- Price -->
                        <div class="mb-6">
                            <span class="text-4xl font-black text-[#2A9D8F]">Rp 750.000</span>
                        </div>

                        <!-- Features -->
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Merancang Modul Ajar (RPP)
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Pengembangan Materi Visual
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Penyusunan Lembar Kerja
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Mentoring Grup (2 Sesi)
                            </li>
                        </ul>

                        <!-- Select Button -->
                        <div class="flex items-center justify-center gap-3 py-3 border-2 border-dashed border-gray-200 rounded-xl text-gray-400 transition-colors"
                            id="btn-select-B">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-semibold text-sm">Klik untuk memilih</span>
                        </div>
                    </div>

                    <!-- Level C Card -->
                    <div class="pricing-card bg-white rounded-3xl shadow-xl p-8 cursor-pointer relative overflow-hidden"
                        onclick="toggleLevel('C')" id="card-C">
                        <!-- Check Indicator -->
                        <div
                            class="check-indicator absolute top-4 right-4 w-8 h-8 bg-gradient-to-br from-[#E76F51] to-[#F4A261] rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <!-- Header -->
                        <div
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white text-xs font-bold rounded-full mb-6">
                            LEVEL C
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 mb-2">Teaching Mastery</h3>
                        <p class="text-gray-500 text-sm mb-6">Penguasaan metodologi tingkat lanjut</p>

                        <!-- Price -->
                        <div class="mb-6">
                            <span class="text-4xl font-black text-[#E76F51]">Rp 1.000.000</span>
                        </div>

                        <!-- Features -->
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Teaching Mastery Framework
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Self-Review & Feedback Loop
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Sesi Mentoring Pribadi (6x)
                            </li>
                            <li class="flex items-center gap-3 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Sertifikat Premium
                            </li>
                        </ul>

                        <!-- Select Button -->
                        <div class="flex items-center justify-center gap-3 py-3 border-2 border-dashed border-gray-200 rounded-xl text-gray-400 transition-colors"
                            id="btn-select-C">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="font-semibold text-sm">Klik untuk memilih</span>
                        </div>
                    </div>
                </div>

                <!-- Summary Section (Terpisah) -->
                <div id="summary-terpisah"
                    class="summary-card rounded-3xl p-8 max-w-2xl mx-auto shadow-2xl hidden slide-enter">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div>
                            <p class="text-gray-500 text-sm mb-1">Paket yang dipilih:</p>
                            <p class="text-lg font-bold text-gray-800" id="selected-levels">-</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-gray-400 text-sm line-through" id="original-price">Rp 0</span>
                                <span
                                    class="discount-badge inline-flex items-center px-2 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full hidden"
                                    id="discount-badge">
                                    HEMAT 10%
                                </span>
                            </div>
                        </div>
                        <div class="text-center sm:text-right">
                            <p class="text-gray-500 text-sm mb-1">Total Pembayaran</p>
                            <p class="text-4xl font-black text-[#1D4E89] price-value" id="total-price">Rp 0</p>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <button
                            class="flex-1 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed"
                            id="btn-checkout" disabled>
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

            <!-- ================ -->
            <!-- MODE: BUNDLE    -->
            <!-- ================ -->
            <div id="section-bundle" class="hidden">
                <div class="max-w-4xl mx-auto">
                    <!-- Bundle Card -->
                    <div class="bundle-card rounded-3xl shadow-2xl p-10 text-white relative overflow-hidden">
                        <!-- Background Decorations -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-32 -mt-32">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-2xl -ml-24 -mb-24">
                        </div>

                        <!-- Save Badge -->
                        <div
                            class="absolute top-6 right-6 float-label bg-white text-[#E76F51] px-4 py-2 rounded-full font-black text-sm shadow-lg">
                            HEMAT 20%
                        </div>

                        <div class="relative z-10">
                            <div class="flex flex-col lg:flex-row gap-10">
                                <!-- Left: Info -->
                                <div class="flex-1">
                                    <span
                                        class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-full mb-6">
                                        🎁 PAKET BUNDLE LENGKAP
                                    </span>

                                    <h2 class="text-4xl sm:text-5xl font-black mb-4 leading-tight">
                                        Complete Teaching
                                        <br>Certification
                                    </h2>

                                    <p class="text-white/80 text-lg mb-8 max-w-md">
                                        Dapatkan akses ke semua level sertifikasi dengan harga spesial. Solusi terbaik
                                        untuk pengembangan karir mengajar Anda.
                                    </p>

                                    <!-- Included Levels -->
                                    <div class="flex flex-wrap gap-3 mb-8">
                                        <span
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Level A
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Level B
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Level C
                                        </span>
                                    </div>

                                    <!-- Bonus -->
                                    <div class="bg-white/10 backdrop-blur rounded-2xl p-4 mb-6">
                                        <p class="text-white/60 text-xs font-semibold mb-2">🎉 BONUS EKSKLUSIF</p>
                                        <ul class="space-y-2">
                                            <li class="flex items-center gap-2 text-sm">
                                                <svg class="w-4 h-4 text-yellow-300" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                Konsultasi pribadi (3 sesi)
                                            </li>
                                            <li class="flex items-center gap-2 text-sm">
                                                <svg class="w-4 h-4 text-yellow-300" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                Akses komunitas seumur hidup
                                            </li>
                                            <li class="flex items-center gap-2 text-sm">
                                                <svg class="w-4 h-4 text-yellow-300" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                E-book & template eksklusif
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Right: Pricing -->
                                <div class="lg:w-80">
                                    <div class="bg-white rounded-3xl p-8 text-gray-900 shadow-2xl">
                                        <div class="text-center mb-6">
                                            <p class="text-gray-400 text-sm line-through mb-1">Rp 2.250.000</p>
                                            <p class="text-5xl font-black text-[#1D4E89]">Rp 1.800.000</p>
                                            <p class="text-gray-500 text-sm mt-2">Pembayaran satu kali</p>
                                        </div>

                                        <div class="space-y-3 mb-8">
                                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                                <svg class="w-5 h-5 text-green-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Akses semua level
                                            </div>
                                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                                <svg class="w-5 h-5 text-green-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Bonus eksklusif
                                            </div>
                                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                                <svg class="w-5 h-5 text-green-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Hemat Rp 450.000
                                            </div>
                                        </div>

                                        <button
                                            class="w-full bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-orange-500/30 transition-all transform hover:scale-[1.02]">
                                            <span class="flex items-center justify-center gap-2">
                                                Pilih Paket Bundle
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </span>
                                        </button>

                                        <p class="text-center text-gray-400 text-xs mt-4">
                                            🔒 Pembayaran aman & terenkripsi
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comparison Table -->
                    <div class="mt-16">
                        <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Perbandingan Paket</h3>
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="py-4 px-6 text-left text-sm font-semibold text-gray-600">Fitur</th>
                                        <th class="py-4 px-6 text-center text-sm font-semibold text-gray-600">Terpisah
                                        </th>
                                        <th
                                            class="py-4 px-6 text-center text-sm font-semibold text-white bg-gradient-to-r from-[#E76F51] to-[#F4A261]">
                                            Bundle</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr>
                                        <td class="py-4 px-6 text-sm text-gray-700">Harga Total (A+B+C)</td>
                                        <td class="py-4 px-6 text-center text-sm text-gray-600">Rp 2.250.000</td>
                                        <td class="py-4 px-6 text-center text-sm font-bold text-[#E76F51]">Rp 1.800.000
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-50/50">
                                        <td class="py-4 px-6 text-sm text-gray-700">Hemat</td>
                                        <td class="py-4 px-6 text-center text-sm text-gray-400">-</td>
                                        <td class="py-4 px-6 text-center">
                                            <span
                                                class="inline-flex px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full">Rp
                                                450.000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 px-6 text-sm text-gray-700">Bonus Konsultasi</td>
                                        <td class="py-4 px-6 text-center">
                                            <svg class="w-5 h-5 text-gray-300 mx-auto" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <svg class="w-5 h-5 text-green-500 mx-auto" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-50/50">
                                        <td class="py-4 px-6 text-sm text-gray-700">Akses Komunitas Seumur Hidup</td>
                                        <td class="py-4 px-6 text-center">
                                            <svg class="w-5 h-5 text-gray-300 mx-auto" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <svg class="w-5 h-5 text-green-500 mx-auto" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 px-6 text-sm text-gray-700">E-book & Template</td>
                                        <td class="py-4 px-6 text-center">
                                            <svg class="w-5 h-5 text-gray-300 mx-auto" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <svg class="w-5 h-5 text-green-500 mx-auto" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                            <path
                                d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                        <span class="font-semibold">1000+ Guru</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="font-semibold">Tersertifikasi</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <span class="font-semibold">Rating 4.9/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Prices
        const prices = {
            A: 500000,
            B: 750000,
            C: 1000000
        };

        // Selected levels
        let selectedLevels = new Set();

        // Toggle between Terpisah and Bundle
        function showTerpisah() {
            document.getElementById('section-terpisah').classList.remove('hidden');
            document.getElementById('section-bundle').classList.add('hidden');
            document.getElementById('btn-terpisah').classList.add('active');
            document.getElementById('btn-bundle').classList.remove('active');
        }

        function showBundle() {
            document.getElementById('section-terpisah').classList.add('hidden');
            document.getElementById('section-bundle').classList.remove('hidden');
            document.getElementById('btn-terpisah').classList.remove('active');
            document.getElementById('btn-bundle').classList.add('active');
        }

        // Toggle level selection
        function toggleLevel(level) {
            const card = document.getElementById(`card-${level}`);

            if (selectedLevels.has(level)) {
                selectedLevels.delete(level);
                card.classList.remove('selected');
            } else {
                selectedLevels.add(level);
                card.classList.add('selected');
            }

            updateSummary();
        }

        // Update summary
        function updateSummary() {
            const summaryEl = document.getElementById('summary-terpisah');
            const selectedLevelsEl = document.getElementById('selected-levels');
            const originalPriceEl = document.getElementById('original-price');
            const totalPriceEl = document.getElementById('total-price');
            const discountBadge = document.getElementById('discount-badge');
            const checkoutBtn = document.getElementById('btn-checkout');

            if (selectedLevels.size === 0) {
                summaryEl.classList.add('hidden');
                checkoutBtn.disabled = true;
                return;
            }

            summaryEl.classList.remove('hidden');
            checkoutBtn.disabled = false;

            // Calculate total
            let total = 0;
            const levelNames = [];

            selectedLevels.forEach(level => {
                total += prices[level];
                levelNames.push(`Level ${level}`);
            });

            selectedLevelsEl.textContent = levelNames.join(' + ');
            originalPriceEl.textContent = formatPrice(total);

            // Apply discount for multiple selections
            let discount = 0;
            if (selectedLevels.size >= 2) {
                discount = 0.1; // 10% discount
                discountBadge.classList.remove('hidden');
            } else {
                discountBadge.classList.add('hidden');
            }

            const finalPrice = total * (1 - discount);
            totalPriceEl.textContent = formatPrice(finalPrice);

            // Animate price change
            totalPriceEl.style.transform = 'scale(1.1)';
            setTimeout(() => {
                totalPriceEl.style.transform = 'scale(1)';
            }, 200);
        }

        // Format price
        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }
    </script>
</body>

</html>
