@extends('layouts.asesiDashboard')
@section('title', 'Teaching & Learning Certification')

@section('content')
    @php
        $user = Auth::user();

        // Check permissions
        $hasAccessA = $user->hasPermissionTo('access_level_A');
        $levelACompleted = $user->hasPermissionTo('level_A_completed');
        $hasSubmittedSurvey = \App\Models\SurveySubmission::where('user_id', $user->id)->exists();

        $hasHots = $user->hasPermissionTo('HOTS');
        $hasPck = $user->hasPermissionTo('PCK');
        $hasLiterasi = $user->hasPermissionTo('LITERASI');
        $hasNumerasi = $user->hasPermissionTo('NUMERASI');

        // Retrieve exams completed
        $examHots = $completedExams->get(1); // HOTS id is 1
        $examPck = $completedExams->get(2); // PCK id is 2
        $examLiterasi = $completedExams->get(3); // LITERASI id is 3
        $examNumerasi = $completedExams->get(4); // NUMERASI id is 4

        // Check if each sub-certificate criteria is fully completed/passed (score >= 75)
        $hotsPassed = $hasHots && $examHots && $examHots->score >= 75;
        $pckPassed = $hasPck && $examPck && $examPck->score >= 75;

        // LITERASI & NUMERASI: requires both permissions and both passed
        $lnPassed =
            $hasLiterasi &&
            $hasNumerasi &&
            $examLiterasi &&
            $examLiterasi->score >= 75 &&
            $examNumerasi &&
            $examNumerasi->score >= 75;
    @endphp

    <div class="md:ml-64 pb-12 px-8 min-h-screen">
        <header class="max-w-6xl mx-auto mb-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="mt-6 flex items-center gap-4">
                    <div class="p-3 bg-blue-200 text-brandBlue rounded-2xl flex-shrink-0 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="8" r="6"></circle>
                            <path d="m8.21 13.89-1.21 8.11 5-3 5 3-1.21-8.12"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-headline text-2xl font-extrabold text-gray-700">Sertifikat Saya</h1>
                        <p class="text-slate-500 font-body">Kumpulan sertifikat anda ada disini.</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="max-w-6xl mx-auto space-y-12">
            <!-- Alert Banner if Survey Not Submitted -->
            {{-- @if (!$hasSubmittedSurvey)
                <div
                    class="p-5 bg-amber-50 border border-amber-200 rounded-xl text-amber-800 text-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-amber-600 text-3xl">info</span>
                        <div>
                            <span class="font-bold block text-amber-900 text-base mb-0.5">Survei Umpan Balik
                                Diperlukan</span>
                            <span>Anda harus mengisi survei umpan balik terlebih dahulu sebelum dapat mengunduh sertifikat
                                utama maupun sub-sertifikat Anda.</span>
                        </div>
                    </div>
                    <a href="{{ route('asesi.sertifikasi.survey') }}"
                        class="px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-lg transition-colors whitespace-nowrap text-center shadow-sm">
                        Isi Survei Sekarang
                    </a>
                </div>
            @endif --}}

            <!-- Section 1: Sertifikat Utama -->
            <section>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-headline text-xl font-bold text-brandBlue">Sertifikat Utama</h2>
                    <span class="h-px flex-grow mx-6 bg-slate-300"></span>
                </div>
                <div class="grid grid-cols-1 gap-8">
                    <!-- Feature Card Level A -->
                    <div
                        class="group relative overflow-hidden bg-white rounded-xl shadow-sm hover:shadow-lg transition-all {{ $hasAccessA && $levelACompleted ? '' : 'opacity-70' }}">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-blue-600/5 rounded-full -mr-12 -mt-12 group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="p-8 relative">
                            <div class="flex justify-between items-start mb-6">
                                <div
                                    class="p-3 {{ $hasAccessA && $levelACompleted ? 'bg-green-600 text-green-100' : 'bg-slate-200 text-slate-500' }} rounded-lg">
                                    <span class="material-symbols-outlined text-3xl"
                                        style="font-variation-settings: 'FILL' 1;">{{ $hasAccessA && $levelACompleted ? 'workspace_premium' : 'lock' }}</span>
                                </div>
                                @if ($hasAccessA && $levelACompleted)
                                    <span
                                        class="bg-green-600 px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase text-white">SELESAI</span>
                                @else
                                    <span
                                        class="bg-slate-500 px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase text-white">BELUM
                                        SELESAI</span>
                                @endif
                            </div>
                            <h3 class="font-headline text-2xl font-bold mb-2 text-gray-700">Level A: Certification Teaching
                                Knowledge</h3>
                            <div class="space-y-1 text-sm text-slate-500 mb-8">
                                <p class="flex items-center gap-2 text-md">Sertifikasi Pengetahuan Mengajar (Gelar: .CTK)
                                </p>
                            </div>

                            @if ($hasAccessA && $levelACompleted)
                                @if ($hasSubmittedSurvey)
                                    <a href="{{ route('asesi.downloadCertificate', Vinkla\Hashids\Facades\Hashids::encode($user->id)) }}"
                                        class="w-full flex items-center justify-center gap-2 py-4 bg-gradient-to-br from-blue-800 to-blue-600 text-white rounded-xl font-bold transition-all hover:saturate-150 shadow-md">
                                        <span class="material-symbols-outlined">download</span>Unduh Sertifikat Utama (PDF)
                                    </a>
                                @else
                                    <a href="{{ route('asesi.sertifikasi.survey') }}"
                                        class="w-full flex items-center justify-center gap-2 py-4 bg-gradient-to-r from-amber-500 to-yellow-600 text-white rounded-xl font-bold transition-all hover:saturate-150 animate-pulse shadow-md">
                                        <span class="material-symbols-outlined">rate_review</span>Klaim Sertifikat (Isi
                                        Survei)
                                    </a>
                                @endif
                            @else
                                <button disabled
                                    class="w-full flex items-center justify-center gap-2 py-4 bg-slate-100 text-slate-400 rounded-xl font-bold cursor-not-allowed">
                                    <span class="material-symbols-outlined">lock</span>Belum Tersedia
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 2: Sub-Sertifikat & Modul -->
            @if (!$hasAccessA)
            <section>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-headline text-xl font-bold text-brandBlue">Sub-Sertifikat</h2>
                    <span class="h-px flex-grow mx-6 bg-slate-300"></span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Module Card 1: HOTS -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-100 flex items-center gap-4 hover:bg-slate-50 transition-colors {{ $hotsPassed ? 'group cursor-pointer' : 'opacity-70' }}">
                        <div
                            class="w-12 h-12 flex-shrink-0 {{ $hotsPassed ? 'bg-teal-100 text-teal-700' : 'bg-slate-100 text-slate-400' }} rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">psychology</span>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-bold text-slate-800 text-sm leading-tight">HOTS: Higher Order Thinking Skills
                            </h4>
                            <p class="text-xs text-slate-500">
                                @if ($hotsPassed)
                                    Selesai: {{ $examHots->end_time->format('d M Y') }} (Gelar: Ctk.HOTS)
                                @else
                                    Belum Tersedia
                                @endif
                            </p>
                        </div>
                        @if ($hotsPassed)
                            @if ($hasSubmittedSurvey)
                                <a href="{{ route('asesi.downloadCertificate', ['id' => Vinkla\Hashids\Facades\Hashids::encode($user->id), 'type' => 'HOTS']) }}"
                                    class="material-symbols-outlined text-slate-400 group-hover:text-blue-700 transition-colors text-2xl"
                                    title="Unduh Sertifikat HOTS">download</a>
                            @else
                                <a href="{{ route('asesi.sertifikasi.survey') }}"
                                    class="material-symbols-outlined text-amber-600 hover:text-amber-700 transition-colors text-2xl"
                                    title="Isi Survei untuk Mengunduh">rate_review</a>
                            @endif
                        @else
                            <span class="material-symbols-outlined text-slate-300 text-2xl">lock</span>
                        @endif
                    </div>

                    <!-- Module Card 2: PCK -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-100 flex items-center gap-4 hover:bg-slate-50 transition-colors {{ $pckPassed ? 'group cursor-pointer' : 'opacity-70' }}">
                        <div
                            class="w-12 h-12 flex-shrink-0 {{ $pckPassed ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 text-slate-400' }} rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">cast_for_education</span>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-bold text-slate-800 text-sm leading-tight">PCK: Pedagogical Content Knowledge
                            </h4>
                            <p class="text-xs text-slate-500">
                                @if ($pckPassed)
                                    Selesai: {{ $examPck->end_time->format('d M Y') }} (Gelar: Ctk.PCK)
                                @else
                                    Belum Tersedia
                                @endif
                            </p>
                        </div>
                        @if ($pckPassed)
                            @if ($hasSubmittedSurvey)
                                <a href="{{ route('asesi.downloadCertificate', ['id' => Vinkla\Hashids\Facades\Hashids::encode($user->id), 'type' => 'PCK']) }}"
                                    class="material-symbols-outlined text-slate-400 group-hover:text-blue-700 transition-colors text-2xl"
                                    title="Unduh Sertifikat PCK">download</a>
                            @else
                                <a href="{{ route('asesi.sertifikasi.survey') }}"
                                    class="material-symbols-outlined text-amber-600 hover:text-amber-700 transition-colors text-2xl"
                                    title="Isi Survei untuk Mengunduh">rate_review</a>
                            @endif
                        @else
                            <span class="material-symbols-outlined text-slate-300 text-2xl">lock</span>
                        @endif
                    </div>

                    <!-- Module Card 3: Literasi & Numerasi Combined -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-100 flex items-center gap-4 hover:bg-slate-50 transition-colors {{ $lnPassed ? 'group cursor-pointer' : 'opacity-70' }}">
                        <div
                            class="w-12 h-12 flex-shrink-0 {{ $lnPassed ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-400' }} rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">menu_book</span>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-bold text-slate-800 text-sm leading-tight">Literasi dan Numerasi</h4>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                @if ($lnPassed)
                                    Selesai: <br>
                                    - Literasi: {{ $examLiterasi->end_time->format('d M Y') }}<br>
                                    - Numerasi: {{ $examNumerasi->end_time->format('d M Y') }}<br>
                                    (Gelar: Ctk.LN)
                                @else
                                    Belum Tersedia (Memerlukan Ujian Literasi & Numerasi lulus KKM)
                                @endif
                            </p>
                        </div>
                        @if ($lnPassed)
                            @if ($hasSubmittedSurvey)
                                <a href="{{ route('asesi.downloadCertificate', ['id' => Vinkla\Hashids\Facades\Hashids::encode($user->id), 'type' => 'LN']) }}"
                                    class="material-symbols-outlined text-slate-400 group-hover:text-blue-700 transition-colors text-2xl"
                                    title="Unduh Sertifikat Literasi & Numerasi (Ctk.LN)">download</a>
                            @else
                                <a href="{{ route('asesi.sertifikasi.survey') }}"
                                    class="material-symbols-outlined text-amber-600 hover:text-amber-700 transition-colors text-2xl"
                                    title="Isi Survei untuk Mengunduh">rate_review</a>
                            @endif
                        @else
                            <span class="material-symbols-outlined text-slate-300 text-2xl">lock</span>
                        @endif
                    </div>

                </div>
            </section>
            @endif
        </div>
    </div>
@endsection
