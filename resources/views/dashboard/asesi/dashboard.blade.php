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

        <section class="bg-surface text-on-surface selection:bg-secondary-container">
            <!-- Main Content -->
            <main class="py-12 px-6 md:ml-64 min-h-screen">
                <div class="max-w-7xl mx-auto space-y-8">
                    <!-- Welcome Hero & Stats -->
                    <section class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                        @if ($profileCompletion >= 100 && !Auth::user()->hasPermissionTo('access_level_A'))
                        <x-asesi.dashboard-level-a-cta :profile-completion="$profileCompletion" />
                        @else
                        <x-asesi.dashboard-profile-completion-card :profile-completion="$profileCompletion" />
                        @endif
                        <x-asesi.dashboard-stats-grid :days-since-joined="$daysSinceJoined" />
                    </section>
                    <!-- Journey Roadmap -->
                    <section class="bg-white p-8 rounded-xl shadow-sm">
                        <h4 class="text-sm font-bold text-outline uppercase tracking-widest mb-10" style="">Peta
                            Perjalanan Kompetensi</h4>
                        <div class="relative flex justify-between items-center max-w-4xl mx-auto">
                            <!-- Progress Line -->
                            <div class="absolute top-1/2 left-0 w-full h-0.5 bg-outline-variant/20 -translate-y-1/2 -z-10">
                            </div>
                            <div class="absolute top-1/2 left-0 w-1/3 h-0.5 bg-secondary -translate-y-1/2 -z-10"></div>
                            <!-- Nodes -->
                            <div class="flex flex-col items-center gap-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-secondary text-white flex items-center justify-center shadow-lg shadow-secondary/20">
                                    <span class="material-symbols-outlined" style="">star</span>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm font-bold text-primary" style="">Level A</p>
                                    <p class="text-[10px] font-semibold text-secondary" style="">Aktif · 78%</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-center gap-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-surface-dim text-outline flex items-center justify-center">
                                    <span class="material-symbols-outlined"
                                        style='font-variation-settings: "FILL" 1;'>lock</span>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm font-bold text-outline" style="">Level B</p>
                                    <p class="text-[10px] font-semibold text-outline-variant" style="">Terkunci</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-center gap-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-surface-dim text-outline flex items-center justify-center">
                                    <span class="material-symbols-outlined"
                                        style='font-variation-settings: "FILL" 1;'>lock</span>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm font-bold text-outline" style="">Level C</p>
                                    <p class="text-[10px] font-semibold text-outline-variant" style="">Terkunci</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Grid Layout for Details & Tasks -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <!-- Left Column -->
                        <div class="lg:col-span-8 space-y-8">
                            <!-- Current Level Detail -->
                            <div>
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-xl font-display font-bold text-on-surface" style="">
                                        Sub-Kompetensi Level A</h3>
                                    <button class="text-primary text-sm font-bold hover:underline" style="">Detail
                                        Kompetensi</button>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- HOTS Card -->
                                    <div
                                        class="bg-surface-container-lowest p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
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
                                        class="bg-surface-container-lowest p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
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
                                        class="bg-surface-container-lowest p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
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
                                        class="bg-surface-container-lowest p-5 rounded-lg border border-outline-variant/10 hover:shadow-md transition-shadow">
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
                            </div>
                            <!-- Training Online -->
                            <div class="bg-slate-900 text-white p-8 rounded-xl overflow-hidden relative">
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
                            </div>
                        </div>
                        <!-- Right Column (Focused Rail) -->
                        <div class="lg:col-span-4 space-y-8">
                            <!-- Active Tasks -->
                            <section class="bg-surface-container-low p-6 rounded-xl">
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
                            </section>
                            <!-- Belajar Mandiri -->
                            <section>
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
                            </section>
                        </div>
                    </div>
                    <!-- Bottom Sections: Certificates & Transactions -->
                    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <!-- Sertifikat Diraih -->
                        <div class="lg:col-span-8">
                            <h3 class="text-xl font-display font-bold text-on-surface mb-6" style="">Sertifikat
                                Diraih</h3>
                            <div
                                class="bg-surface-container-low rounded-xl p-12 flex flex-col items-center justify-center text-center border-2 border-dashed border-outline-variant/30">
                                <div
                                    class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-4">
                                    <span class="material-symbols-outlined text-5xl" style="">card_membership</span>
                                </div>
                                <h4 class="font-bold text-on-surface" style="">Belum Ada Sertifikat</h4>
                                <p class="text-sm text-on-surface-variant max-w-xs mt-2" style="">Selesaikan Level A
                                    untuk mendapatkan sertifikat profesional pertamamu!</p>
                                <button class="mt-6 text-primary font-bold text-sm flex items-center gap-2"
                                    style="">
                                    Lihat Syarat Sertifikasi
                                    <span class="material-symbols-outlined text-sm" style="">open_in_new</span>
                                </button>
                            </div>
                        </div>
                        <!-- Riwayat Transaksi -->
                        <div class="lg:col-span-4">
                            <h3 class="text-xl font-display font-bold text-on-surface mb-6" style="">Riwayat
                                Transaksi</h3>
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                <div class="divide-y divide-slate-100">
                                    <div class="p-4 flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-bold" style="">Level A Full Package</p>
                                            <p class="text-[10px] text-outline" style="">12 Des 2023 · #TLC-9821</p>
                                        </div>
                                        <span
                                            class="px-2 py-1 rounded text-[10px] font-bold bg-secondary-container text-on-secondary-container"
                                            style="">Paid</span>
                                    </div>
                                    <div class="p-4 flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-bold" style="">Modul Ekstra Literasi</p>
                                            <p class="text-[10px] text-outline" style="">05 Des 2023 · #TLC-9102</p>
                                        </div>
                                        <span
                                            class="px-2 py-1 rounded text-[10px] font-bold bg-secondary-container text-on-secondary-container"
                                            style="">Paid</span>
                                    </div>
                                    <div class="p-4 flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-bold" style="">Workshop Sesi 12</p>
                                            <p class="text-[10px] text-outline" style="">28 Nov 2023 · #TLC-8843</p>
                                        </div>
                                        <span
                                            class="px-2 py-1 rounded text-[10px] font-bold bg-secondary-container text-on-secondary-container"
                                            style="">Paid</span>
                                    </div>
                                </div>
                                <button
                                    class="w-full py-3 text-xs font-bold text-outline hover:bg-slate-50 transition-colors uppercase tracking-widest"
                                    style="">Lihat Semua Transaksi</button>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
            <!-- BottomNavBar (Mobile Only) -->
            <nav
                class="md:hidden fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-md px-6 py-3 flex justify-between items-center z-40 shadow-[0_-2px_10px_rgba(0,0,0,0.05)]">
                <a class="flex flex-col items-center gap-1 text-cyan-700" href="#" style="">
                    <span class="material-symbols-outlined" style="">dashboard</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Dashboard</span>
                </a>
                <a class="flex flex-col items-center gap-1 text-slate-400" href="#" style="">
                    <span class="material-symbols-outlined" style="">auto_stories</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Belajar</span>
                </a>
                <a class="flex flex-col items-center gap-1 text-slate-400" href="#" style="">
                    <span class="material-symbols-outlined" style="">workspace_premium</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Sertifikat</span>
                </a>
                <a class="flex flex-col items-center gap-1 text-slate-400" href="#" style="">
                    <span class="material-symbols-outlined" style="">person</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter" style="">Profil</span>
                </a>
            </nav>
        </section>

    </section>
    <script src="https://kit.fontawesome.com/yourkitcode.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/asesiDashboard.js') }}" defer></script>
@endsection
