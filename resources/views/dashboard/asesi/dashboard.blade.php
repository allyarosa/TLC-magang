@extends('layouts.asesiDashboard')
@section('title', 'Teaching & Learning Certification')

@section('content')
    @php use Vinkla\Hashids\Facades\Hashids; @endphp
    <section class="font-['Inter']">
        <x-verify-email-alerts />
        <script id="tailwind-config">
            tailwind.config = {
                theme: {
                    extend: {
                        "borderRadius": {
                            "DEFAULT": "0.25rem",
                            "lg": "0.5rem",
                            "xl": "0.75rem",
                            "full": "9999px"
                        },
                        "fontFamily": {
                            "headline": ["Manrope"],
                            "body": ["Inter"],
                            "label": ["Inter"]
                        }
                    },
                },
            }
        </script>
        <style>
            /* body {
                                            background-color: #f7f9fc;
                                            color: #181c1e;
                                        } */

            .font-display {
                font-family: 'Manrope', sans-serif;
            }

            .glass-nav {
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
            }

            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

        <section class=" text-on-surface selection:bg-secondary-container">
            <!-- Main Content -->
            <main class="py-6 md:py-12 px-6 md:ml-64 min-h-screen">
                <div class="max-w-7xl mx-auto space-y-4">
                    <!-- Welcome Hero & Stats -->
                    <section class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                        {{-- @if ($profileCompletion >= 100 && !Auth::user()->hasPermissionTo('access_level_A'))
                            <x-asesi.dashboard-level-a-cta :profile-completion="$profileCompletion" :levels="$levels" />
                        @else
                            <x-asesi.dashboard-profile-completion-card :profile-completion="$profileCompletion" />
                        @endif --}}
                        <livewire:asesi.dashboard.dashboard-info-card />

                        <x-asesi.dashboard-stats-grid :days-since-joined="$daysSinceJoined" />
                    </section>

                    <!-- Journey Roadmap -->
                    {{-- <livewire:asesi.dashboard.journey-roadmap /> --}}

                    <!-- Grid Layout for Details & Tasks -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <!-- Left Column -->
                        <div class="lg:col-span-8 space-y-8">
                            <!-- Current Level Detail -->
                            {{-- <section>
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-xl font-display font-bold text-on-surface" style="">
                                        Sub-Kompetensi Level A</h3>
                                    <button class="text-primary text-sm font-bold hover:underline" style="">Detail
                                        Kompetensi</button>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- HOTS Card -->
                                    <div
                                        class="bg-white p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
                                        <div class="flex justify-between items-start mb-4">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-cyan-50 flex items-center justify-center text-cyan-700">
                                                <span class="material-symbols-outlined" style="">psychology</span>
                                            </div>
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold bg-secondary-container text-on-secondary-container"
                                                style="">Completed</span>
                                        </div>
                                        <h4 class="font-bold text-on-surface mb-2" style="">HOTS (High Order
                                            Thinking Skills)</h4>
                                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="w-full h-full bg-secondary"></div>
                                        </div>
                                    </div>
                                    <!-- PCK Card -->
                                    <div
                                        class="bg-white p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
                                        <div class="flex justify-between items-start mb-4">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-orange-50 flex items-center justify-center text-orange-700">
                                                <span class="material-symbols-outlined" style="">menu_book</span>
                                            </div>
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold bg-tertiary-container text-on-tertiary-container text-white"
                                                style="">In Progress</span>
                                        </div>
                                        <h4 class="font-bold text-on-surface mb-2" style="">PCK (Pedagogical Content
                                            Knowledge)</h4>
                                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="w-[65%] h-full bg-tertiary"></div>
                                        </div>
                                    </div>
                                    <!-- Literasi -->
                                    <div
                                        class="bg-white p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
                                        <div class="flex justify-between items-start mb-4">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700">
                                                <span class="material-symbols-outlined" style="">history_edu</span>
                                            </div>
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold bg-secondary-container text-on-secondary-container"
                                                style="">Completed</span>
                                        </div>
                                        <h4 class="font-bold text-on-surface mb-2" style="">Literasi Digital</h4>
                                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="w-full h-full bg-secondary"></div>
                                        </div>
                                    </div>
                                    <!-- Numerasi -->
                                    <div
                                        class="bg-white p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
                                        <div class="flex justify-between items-start mb-4">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-700">
                                                <span class="material-symbols-outlined" style="">calculate</span>
                                            </div>
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container-high text-on-surface-variant"
                                                style="">Not Started</span>
                                        </div>
                                        <h4 class="font-bold text-on-surface mb-2" style="">Numerasi Strategis</h4>
                                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="w-0 h-full bg-outline"></div>
                                        </div>
                                    </div>
                                </div>
                            </section> --}}
                            <!-- Training Online -->
                            {{-- <section class="bg-slate-900 text-white p-8 rounded-xl overflow-hidden relative">
                                <div
                                    class="absolute top-0 right-0 w-64 h-64 bg-primary/20 blur-3xl rounded-full -mr-20 -mt-20">
                                </div>
                                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8">
                                    <div class="space-y-4">
                                        <div class="space-y-1">
                                            <h3 class="text-xl font-bold" style="">Training Online Sedang Berjalan
                                            </h3>
                                            <p class="text-slate-400 text-sm" style="">Modul 2 / 3 · Sesi 7 / 12</p>
                                        </div>
                                        <div class="grid grid-cols-6 gap-2 w-fit">
                                            <!-- Done dots -->
                                            <div class="w-3 h-3 rounded-sm bg-secondary"></div>
                                            <div class="w-3 h-3 rounded-sm bg-secondary"></div>
                                            <div class="w-3 h-3 rounded-sm bg-secondary"></div>
                                            <div class="w-3 h-3 rounded-sm bg-secondary"></div>
                                            <div class="w-3 h-3 rounded-sm bg-secondary"></div>
                                            <div class="w-3 h-3 rounded-sm bg-secondary"></div>
                                            <!-- Current dot -->
                                            <div class="w-3 h-3 rounded-sm bg-white animate-pulse"></div>
                                            <!-- Future dots -->
                                            <div class="w-3 h-3 rounded-sm bg-slate-700"></div>
                                            <div class="w-3 h-3 rounded-sm bg-slate-700"></div>
                                            <div class="w-3 h-3 rounded-sm bg-slate-700"></div>
                                            <div class="w-3 h-3 rounded-sm bg-slate-700"></div>
                                            <div class="w-3 h-3 rounded-sm bg-slate-700"></div>
                                        </div>
                                    </div>
                                    <button
                                        class="bg-white text-slate-900 px-6 py-3 rounded-lg font-bold hover:bg-slate-100 transition-colors shrink-0"
                                        style="">
                                        Masuk Ruang Virtual
                                    </button>
                                </div>
                            </section> --}}
                        </div>
                        <!-- Right Column (Focused Rail) -->
                        <div class="lg:col-span-4 space-y-8">
                            <!-- Active Tasks -->
                            {{-- <section class="bg-surface-container-low p-6 rounded-xl">
                                <h3 class="text-sm font-bold text-outline uppercase tracking-widest mb-4" style="">
                                    Tugas Hari Ini</h3>
                                <div class="space-y-4">
                                    <div class="bg-white p-4 rounded-lg flex gap-3 group">
                                        <div class="mt-1">
                                            <div
                                                class="w-5 h-5 rounded border-2 border-primary/20 flex items-center justify-center text-transparent group-hover:text-primary transition-colors">
                                                <span class="material-symbols-outlined text-[14px] font-black"
                                                    style="">check</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-bold text-on-surface" style="">Unggah tugas
                                                Training Modul 2</h5>
                                            <p class="text-[11px] text-error font-medium flex items-center gap-1 mt-1"
                                                style="">
                                                <span class="material-symbols-outlined text-[14px]"
                                                    style="">schedule</span>
                                                Deadline: 23:59 WIB
                                            </p>
                                        </div>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg flex gap-3">
                                        <div class="mt-1">
                                            <div
                                                class="w-5 h-5 rounded border-2 border-primary/20 flex items-center justify-center">
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-bold text-on-surface" style="">Refleksi Sesi 3
                                            </h5>
                                            <p class="text-[11px] text-on-surface-variant font-medium mt-1"
                                                style="">Estimasi: 15 Menit</p>
                                        </div>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg flex gap-3">
                                        <div class="mt-1">
                                            <div
                                                class="w-5 h-5 rounded border-2 border-primary/20 flex items-center justify-center">
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-bold text-on-surface" style="">Post-Test Modul 1
                                                (Remedial)</h5>
                                            <p class="text-[11px] text-tertiary font-medium mt-1" style="">
                                                Prioritas: Menengah</p>
                                        </div>
                                    </div>
                                </div>
                            </section> --}}
                            <!-- Belajar Mandiri -->
                            {{-- <section>
                                <h3 class="text-sm font-bold text-outline uppercase tracking-widest mb-4" style="">
                                    Belajar Mandiri</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-white rounded-lg shadow-sm">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded bg-secondary/10 flex items-center justify-center text-secondary">
                                                <span class="material-symbols-outlined text-[18px]"
                                                    style="">verified</span>
                                            </div>
                                            <span class="text-xs font-semibold" style="">Modul 1: Dasar
                                                Pedagogik</span>
                                        </div>
                                        <span class="material-symbols-outlined text-secondary"
                                            style="">check_circle</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-white rounded-lg shadow-sm">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded bg-tertiary/10 flex items-center justify-center text-tertiary">
                                                <span class="material-symbols-outlined text-[18px]"
                                                    style="">pending</span>
                                            </div>
                                            <span class="text-xs font-semibold" style="">Modul 2: Implementasi
                                                HOTS</span>
                                        </div>
                                        <button
                                            class="text-[10px] font-bold bg-primary text-white px-3 py-1.5 rounded uppercase"
                                            style="">Isi Refleksi</button>
                                    </div>
                                </div>
                            </section> --}}
                        </div>
                    </div>
                    <!-- Bottom Sections: Certificates & Transactions -->
                    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <!-- Sertifikat Diraih -->
                        <livewire:asesi.dashboard.earned-certificates />
                        <!-- Riwayat Transaksi -->
                        <livewire:asesi.dashboard.transaction-history />
                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                        <!-- Level A Card -->
                        <div
                            class="pricing-card bg-white rounded-3xl shadow-lg relative overflow-hidden transition-all duration-300 border-2 border-blue-200">
                            {{-- IMAGE CARD --}}
                            <livewire:asesi.dashboard.payment-image-card image="images/webp/blue_bg.webp"
                                alt="Level A Image" gradientColor="from-blue-200" />

                            <div class="p-8 relative z-10">
                                <!-- RECOMENDED RIBBON -->
                                <x-populer-ribbon label="Recommended" />
                                <!-- HEADER -->
                                {{-- <livewire:asesi.dashboard.payment-card-header label="LEVEL A"
                                    title="Teaching Knowledge Certification" subtitle="Sertifikasi Pengetahuan Mengajar"
                                    labelColor="sky-700" titleColor="[#20416a]" /> --}}
                                <livewire:asesi.dashboard.payment-card-header label="LEVEL A"
                                    title="Certification Teaching Knowledge" subtitle="Sertifikasi Pengetahuan Mengajar"
                                    labelColor="sky-600" titleColor="sky-800" />
                                <!-- PRICE -->
                                {{-- <livewire:asesi.dashboard.price-item price="{{ $levels[0]->price }}" textColor="slate-700"
                                    discount="{{ $levels[0]->discount ?? 0 }}" /> --}}
                                <!-- FEATURES -->
                                <ul class="space-y-3 mb-8">
                                    <livewire:asesi.dashboard.feature-item label="Uji Literasi & Numerasi" />
                                    <livewire:asesi.dashboard.feature-item label="Pedagogical Content Knowledge" />
                                    <livewire:asesi.dashboard.feature-item label="Higher Order Thinking Skills" />
                                    <livewire:asesi.dashboard.feature-item label="Sertifikat Digital" />
                                </ul>
                                <!-- BUTTON -->
                                <livewire:asesi.access-button :levels="$levels" selectedLevel="A" />
                            </div>
                        </div>

                        <!-- Level B Card -->
                        <div
                            class="pricing-card bg-white rounded-3xl shadow-md relative overflow-hidden transition-all duration-300 border-2 border-teal-200">
                            {{-- IMAGE CARD --}}
                            <livewire:asesi.dashboard.payment-image-card image="images/webp/green_bg.webp"
                                alt="Level B Image" gradientColor="from-green-200" />

                            <div class="p-8 relative z-10">
                                {{-- HEADER --}}
                                <livewire:asesi.dashboard.payment-card-header label="LEVEL B"
                                    title="Certification Teaching Activation" subtitle="Sertifikasi Aktivasi Mengajar"
                                    labelColor="[#2A9D8F]" titleColor="emerald-800" />
                                <!-- PRICE -->
                                {{-- <livewire:asesi.dashboard.price-item price="{{ $levels[1]->price }}" textColor="slate-700"
                                    discount="{{ $levels[1]->discount ?? 0 }}" /> --}}
                                <!-- FEATURES -->
                                <ul class="space-y-3 mb-8">
                                    <livewire:asesi.dashboard.feature-item label="Merancang Modul Ajar (RPP)" />
                                    <livewire:asesi.dashboard.feature-item label="Pengembangan Materi Visual" />
                                    <livewire:asesi.dashboard.feature-item label="Penyusunan Lembar Kerja" />
                                    <livewire:asesi.dashboard.feature-item label="Mentoring Grup (2 Sesi)" />
                                </ul>
                                <!-- BUTTON -->
                                <livewire:asesi.access-button :levels="$levels" selectedLevel="B" />
                            </div>
                        </div>

                        <!-- Level C Card -->
                        <div
                            class="pricing-card bg-white rounded-3xl shadow-md relative overflow-hidden transition-all duration-300 border-2 border-orange-200">
                            {{-- IMAGE CARD --}}
                            <livewire:asesi.dashboard.payment-image-card image="images/webp/orange_bg.webp"
                                alt="Level C Image" gradientColor="from-orange-200" />
                            <div class="p-8 relative z-10">
                                <!-- HEADER -->
                                <livewire:asesi.dashboard.payment-card-header label="LEVEL C"
                                    title="Certification Teaching Mastery" subtitle="Sertifikasi Penguasaan Mengajar"
                                    labelColor="[#E76F51]" titleColor="amber-700" />
                                <!-- PRICE -->
                                {{-- <livewire:asesi.dashboard.price-item price="{{ $levels[2]->price }}" textColor="slate-700"
                                    discount="{{ $levels[2]->discount ?? 0 }}" /> --}}
                                <!-- FEATURES -->
                                <ul class="space-y-3 mb-8">
                                    <livewire:asesi.dashboard.feature-item label="Teaching Mastery Framework" />
                                    <livewire:asesi.dashboard.feature-item label="Self-Review & Feedback Loop" />
                                    <livewire:asesi.dashboard.feature-item label="Sesi Mentoring Pribadi (6x)" />
                                    <livewire:asesi.dashboard.feature-item label="Sertifikat Premium" />
                                </ul>
                                <!-- BUTTON -->
                                <livewire:asesi.access-button :levels="$levels" selectedLevel="C" />
                            </div>

                        </div>
                    </section>
                </div>
            </main>
            <!-- BottomNavBar (Mobile Only) -->
            {{-- <nav
                class="md:hidden fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-md px-6 py-3 flex justify-between items-center z-40 shadow-[0_-2px_10px_rgba(0,0,0,0.05)]">
                <a class="flex flex-col items-center gap-1 text-cyan-700" href="{{ route('asesi.dashboard') }}" style="">
                    <span class="material-symbols-outlined" style="">dashboard</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Dashboard</span>
                </a>
                <a class="flex flex-col items-center gap-1 text-slate-400" href="{{ route('asesi.sertifikasi') }}" style="">
                    <span class="material-symbols-outlined" style="">workspace_premium</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Sertifikat</span>
                </a>
                <a class="flex flex-col items-center gap-1 text-slate-400" href="{{ route('asesi.transaksi') }}" style="">
                    <span class="material-symbols-outlined" style="">auto_stories</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Belajar</span>
                </a>
                <a class="flex flex-col items-center gap-1 text-slate-400" href="#" style="">
                    <span class="material-symbols-outlined" style="">person</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Profil</span>
                </a>
            </nav> --}}
        </section>

    </section>
    <script src="https://kit.fontawesome.com/yourkitcode.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/asesiDashboard.js') }}" defer></script>
@endsection
