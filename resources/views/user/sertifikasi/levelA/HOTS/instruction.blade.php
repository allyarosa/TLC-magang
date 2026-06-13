@extends('layouts.exam')

@section('title', 'Instruksi Pengerjaan AKM')

@push('styles')
    <style>
        /* .{ font-family: 'Manrope', sans-serif; } */
        .glass-header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
        }

        .gradient-text {
            background: linear-gradient(135deg, #0C548C, #1D4E89);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-btn {
            background: linear-gradient(135deg, #0C548C, #1D4E89);
            transition: filter 0.2s ease;
        }

        .gradient-btn:hover {
            filter: brightness(1.1) saturate(1.1);
        }

        .gradient-btn:disabled {
            background: #E8EBF3;
            color: #ACB3BF;
            filter: none;
            cursor: not-allowed;
        }
    </style>
@endpush

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8 font-sans">
        <!-- Top Navigation -->
        <header
            class="fixed top-0 left-0 w-full z-50 px-8 h-16 flex justify-between items-center shadow-sm max-w-[1920px] mx-auto border-b border-slate-200/60 bg-gradient-to-r from-[#1D4E89] to-brandGreen/95">
            <div class="flex items-center gap-2">
                <span class="text-xl font-bold tracking-tighter text-white">{{ config('app.name', 'TLC') }}</span>
            </div>
        </header>

        <main class="w-full max-w-7xl mt-16">
            <!-- Main Card Container -->
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 relative overflow-hidden border border-slate-200/60">
                <!-- Decorative Accent -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-darkblue to-brandBlue"></div>

                <!-- Header Section -->
                <div class="text-center mb-10">
                    {{-- <span class="inline-block bg-amber-100 text-amber-800 font-semibold text-xs uppercase tracking-widest px-3 py-1 rounded-full mb-4">Assessment Phase</span> --}}
                    <h1 class="text-3xl font-bold text-slate-800 mb-2 tracking-tight">Instruksi Pengerjaan: <span
                            class="gradient-text">Kategori {{ $category->name ?? 'Tidak Diketahui' }}</span></h1>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">Harap baca semua petunjuk dengan teliti sebelum anda
                        memulai ujian.</p>
                </div>

                <!-- Quick Stats -->
                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10 bg-slate-50 rounded-lg p-2 border border-slate-200/60">
                    <div class="flex flex-col items-center justify-center text-center p-4">
                        <span class="material-symbols-outlined text-darkblue text-3xl mb-2"
                            style="font-variation-settings: 'FILL' 1;">timer</span>
                        <span class="font-semibold text-sm text-slate-500 uppercase tracking-wider mb-1">Waktu
                            Pengerjaan</span>
                        <span class="text-2xl font-bold text-darkblue">{{ $category->time_limit }} Menit</span>
                    </div>
                    <div
                        class="flex flex-col items-center justify-center text-center p-4 md:border-l md:border-r border-slate-200">
                        <span class="material-symbols-outlined text-darkblue text-3xl mb-2"
                            style="font-variation-settings: 'FILL' 1;">format_list_numbered</span>
                        <span class="font-semibold text-sm text-slate-500 uppercase tracking-wider mb-1">Jumlah Soal</span>
                        <span class="text-2xl font-bold text-darkblue">{{ $questionCount }} Soal</span>
                    </div>
                    <div class="flex flex-col items-center justify-center text-center p-4">
                        <span class="material-symbols-outlined text-brandGreen text-3xl mb-2"
                            style="font-variation-settings: 'FILL' 1;">verified</span>
                        <span class="font-semibold text-sm text-slate-500 uppercase tracking-wider mb-1">Kriteria
                            Kelulusan</span>
                        <span class="text-2xl font-bold text-brandGreen">{{ $category->passing_score }} Poin</span>
                    </div>
                </div>

                <!-- Detailed Instructions (Bento Grid Style) -->
                <h2 class="text-2xl font-bold text-slate-800 mb-6">Petunjuk Penting</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <!-- Card 1 -->
                    <div
                        class="bg-slate-50 rounded-lg p-6 flex flex-col border border-slate-200/60 relative overflow-hidden group hover:bg-slate-100/50 transition-colors duration-300">
                        <div
                            class="absolute -right-4 -top-4 w-16 h-16 bg-darkblue/5 rounded-full group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-darkblue flex items-center justify-center">
                                <span class="material-symbols-outlined font-bold"
                                    style="font-variation-settings: 'FILL' 1;">power</span>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-800">Sebelum Memulai</h3>
                        </div>
                        <ul class="text-slate-600 text-sm space-y-3 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Pastikan koneksi internet stabil.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Gunakan browser Chrome atau Firefox versi terbaru.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Pastikan baterai perangkat Anda terisi penuh.</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Card 2 -->
                    <div
                        class="bg-slate-50 rounded-lg p-6 flex flex-col border border-slate-200/60 relative overflow-hidden group hover:bg-slate-100/50 transition-colors duration-300">
                        <div
                            class="absolute -right-4 -top-4 w-16 h-16 bg-darkblue/5 rounded-full group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-darkblue flex items-center justify-center">
                                <span class="material-symbols-outlined font-bold"
                                    style="font-variation-settings: 'FILL' 1;">edit_note</span>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-800">Cara Mengerjakan</h3>
                        </div>
                        <ul class="text-slate-600 text-sm space-y-3 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Baca setiap soal dengan teliti sebelum menjawab.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Klik pada pilihan jawaban yang Anda anggap benar.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Jawaban akan tersimpan secara otomatis (Auto-save).</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="bg-slate-50 rounded-lg p-6 flex flex-col border border-slate-200/60 relative overflow-hidden group hover:bg-slate-100/50 transition-colors duration-300">
                        <div
                            class="absolute -right-4 -top-4 w-16 h-16 bg-darkblue/5 rounded-full group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-darkblue flex items-center justify-center">
                                <span class="material-symbols-outlined font-bold"
                                    style="font-variation-settings: 'FILL' 1;">gavel</span>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-800">Peraturan</h3>
                        </div>
                        <ul class="text-slate-600 text-sm space-y-3 flex-grow">
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Kerjakan secara mandiri dan jujur.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Dilarang membuka tab atau aplikasi lain selama ujian.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-darkblue text-lg mt-0.5">check_circle</span>
                                <span>Dilarang me-refresh (F5) halaman ujian.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Alert Box -->
                <div
                    class="bg-amber-50 text-amber-900 border-l-4 border-amber-500 p-5 rounded-r-lg mb-8 flex items-start gap-4 shadow-sm">
                    <span class="material-symbols-outlined text-amber-600 mt-0.5 text-2xl"
                        style="font-variation-settings: 'FILL' 1;">warning</span>
                    <div>
                        <h4 class="font-bold text-lg mb-1 text-amber-700">Perhatian Penting</h4>
                        <p class="text-sm leading-relaxed text-amber-700">Ujian akan berakhir otomatis saat waktu habis.
                            Pastikan semua soal telah Anda jawab sebelum waktu berakhir. Waktu tidak dapat dihentikan
                            sementara (pause).</p>
                    </div>
                </div>

                <form id="startExamForm" action="{{ route('asesi.sertifikasi.level.a.start') }}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <!-- Agreement Checkbox -->
                    <div class="bg-slate-100 rounded-lg p-6 mb-10 border border-slate-200/60">
                        <label class="flex items-start gap-4 cursor-pointer group">
                            <div class="relative flex items-start">
                                <input
                                    class="peer h-6 w-6 rounded border-slate-300 text-darkblue focus:ring-darkblue focus:ring-2 bg-white transition-all mt-0.5"
                                    id="agreement" name="agreement" required type="checkbox" />
                            </div>
                            <span class="text-slate-600 text-base select-none group-hover:text-slate-800 transition-colors">
                                Saya telah membaca, memahami, dan menyetujui semua instruksi serta peraturan yang berlaku
                                untuk ujian ini.
                            </span>
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('asesi.sertifikasi') }}"
                            class="px-8 py-3 rounded-lg font-semibold text-darkblue border border-darkblue hover:bg-darkblue/5 transition-colors duration-200 w-full sm:w-auto text-center">
                            Kembali
                        </a>
                        <button
                            class="px-8 py-3 rounded-lg font-bold text-white gradient-btn w-full sm:w-auto flex items-center justify-center gap-2 disabled:cursor-not-allowed"
                            disabled id="startBtn" type="submit">
                            <span id="btnText" class="flex items-center gap-2">
                                Mulai Ujian
                                {{-- <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span> --}}
                            </span>
                            <span id="btnLoader" class="hidden items-center">
                                <svg class="mr-2 h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Memulai...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkbox = document.getElementById('agreement');
            const startBtn = document.getElementById('startBtn');
            const form = document.getElementById('startExamForm');
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');

            checkbox.addEventListener('change', (e) => {
                if (e.target.checked) {
                    startBtn.removeAttribute('disabled');
                } else {
                    startBtn.setAttribute('disabled', 'true');
                }
            });

            form.addEventListener('submit', (e) => {
                if (checkbox.checked) {
                    startBtn.setAttribute('disabled', 'true');
                    btnLoader.classList.remove('hidden');
                    btnLoader.classList.add('flex');
                    btnText.classList.add('hidden');
                } else {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush
