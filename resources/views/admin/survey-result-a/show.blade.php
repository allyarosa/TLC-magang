@extends('layouts.adminDashboard')

@section('title', 'Detail Hasil Survey')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        {{-- Header & Navigation --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
            <div>
                <nav class="flex items-center text-sm text-gray-500 mb-2">
                    <a href="{{ route('admin.survey-result.a.index') }}" class="hover:text-blue-600 transition-colors">
                        Survey Result
                    </a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 font-semibold">
                        Detail Survey
                    </span>
                </nav>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Detail Hasil Survey Asesi
                </h1>
            </div>
            <a href="{{ route('admin.survey-result.a.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Column 1: User Profile --}}
            <div class="lg:col-span-1 space-y-6">
                {{-- Profile Card --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-gray-100">
                        <h2 class="font-semibold text-slate-700">
                            Profil Responden
                        </h2>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="w-24 h-24 mb-4">
                            <img class="w-full h-full rounded-full object-cover border-4 border-white shadow-md"
                                src="{{ $submission->user->userProfile->profile_image ? asset('storage/' . $submission->user->userProfile->profile_image) : asset('assets/img/profile.png') }}"
                                alt="{{ $submission->user->name }}">
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ $submission->user->name }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-4">
                            {{ $submission->user->email }}
                        </p>

                        <div class="w-full border-t border-gray-100 pt-4 space-y-3 text-left">
                            <div>
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block mb-1">
                                    NIK
                                </span>
                                <p class="text-gray-700 font-medium">
                                    {{ $submission->user->userProfile->nik ?? '-' }}
                                </p>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block mb-1">
                                    Instansi
                                </span>
                                <p class="text-gray-700 font-medium">
                                    {{ $submission->user->userProfile->instansi ?? '-' }}
                                </p>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block mb-1">
                                    No. WA
                                </span>
                                <p class="text-gray-700 font-medium">
                                    {{ $submission->user->userProfile->no_wa ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Demographics Card --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
                        <h2 class="font-semibold text-blue-800">Data Demografi</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <span class="text-xs text-slate-500 block mb-1">Rentang Usia</span>
                            <span class="px-3 py-1 text-gray-700 rounded-lg text-sm font-medium">
                                {{ $submission->umur_range }}
                            </span>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 block mb-1">Status Pekerjaan</span>
                            <span class="px-3 py-1 text-gray-700 rounded-lg text-sm font-medium">
                                {{ $submission->status_pekerjaan }}
                            </span>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 block mb-1">Tempat Bekerja</span>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $submission->tempat_bekerja ?: '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Column 2 & 3: Survey Details --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Tujuan Sertifikasi --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                        <i class="fas fa-bullseye text-blue-500"></i>
                        <h2 class="font-semibold text-gray-800">
                            Tujuan Sertifikasi
                        </h2>
                    </div>
                    <div class="p-6">
                        @if (!empty($submission->tujuan_sertifikasi) && is_array($submission->tujuan_sertifikasi))
                            <div class="flex flex-wrap gap-2">
                                @foreach ($submission->tujuan_sertifikasi as $tujuan)
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-blue-50 text-blue-700 border border-indigo-100">
                                        {{ $tujuan }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-400 italic">Tidak ada data tujuan sertifikasi.</p>
                        @endif
                    </div>
                </div>

                {{-- Rating Section --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-star text-indigo-500"></i>
                            <h2 class="font-semibold text-indigo-800">Penilaian Evaluasi</h2>
                        </div>
                        <div class="text-xs text-indigo-600 font-medium bg-indigo-100 px-2 py-1 rounded">
                            Skala 1 - 4
                        </div>
                    </div>
                    <div class="p-0 divide-y divide-gray-100">
                        {{-- Helper for stars --}}
                        @php
                            function renderStars($rating)
                            {
                                $html = '<div class="flex space-x-1">';
                                for ($i = 1; $i <= 4; $i++) {
                                    $color = $i <= $rating ? 'text-yellow-400' : 'text-gray-200';
                                    $html .= '<i class="fas fa-star ' . $color . ' text-sm"></i>';
                                }
                                $html .= '</div>';
                                return $html;
                            }

                            function getRatingColor($rating)
                            {
                                if ($rating == 4) {
                                    return 'bg-green-100 text-green-800';
                                }
                                if ($rating == 3) {
                                    return 'bg-blue-100 text-blue-800';
                                }
                                if ($rating == 2) {
                                    return 'bg-yellow-100 text-yellow-800';
                                }
                                return 'bg-red-100 text-red-800';
                            }
                        @endphp

                        <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div>
                                <p class="text-sm font-medium text-gray-700">
                                    Materi Training
                                </p>
                                <p class="text-xs text-gray-400">
                                    Kesesuaian materi dengan kebutuhan kompetensi
                                </p>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                {!! renderStars($submission->rating_materi) !!}
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold {{ getRatingColor($submission->rating_materi) }}">
                                    {{ $submission->rating_materi }} / 4
                                </span>
                            </div>
                        </div>

                        <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div>
                                <p class="text-sm font-medium text-gray-700">Kualitas Trainer</p>
                                <p class="text-xs text-gray-400">Penyampaian materi jelas dan membantu</p>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                {!! renderStars($submission->rating_trainer) !!}
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold {{ getRatingColor($submission->rating_trainer) }}">
                                    {{ $submission->rating_trainer }} / 4
                                </span>
                            </div>
                        </div>

                        <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div>
                                <p class="text-sm font-medium text-gray-700">Proses Uji Sertifikasi</p>
                                <p class="text-xs text-gray-400">Keadilan dan transparansi proses uji</p>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                {!! renderStars($submission->rating_uji) !!}
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold {{ getRatingColor($submission->rating_uji) }}">
                                    {{ $submission->rating_uji }} / 4
                                </span>
                            </div>
                        </div>

                        <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div>
                                <p class="text-sm font-medium text-gray-700">Peningkatan Kompetensi</p>
                                <p class="text-xs text-gray-400">Pemahaman meningkat setelah program</p>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                {!! renderStars($submission->rating_peningkatan_kompetensi) !!}
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold {{ getRatingColor($submission->rating_peningkatan_kompetensi) }}">
                                    {{ $submission->rating_peningkatan_kompetensi }} / 4
                                </span>
                            </div>
                        </div>

                        <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div>
                                <p class="text-sm font-medium text-gray-700">Penerapan Hasil</p>
                                <p class="text-xs text-gray-400">Implementasi kompetensi dalam pekerjaan</p>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                {!! renderStars($submission->rating_penerapan) !!}
                                <span
                                    class="px-2 py-0.5 rounded text-[10px] font-bold {{ getRatingColor($submission->rating_penerapan) }}">
                                    {{ $submission->rating_penerapan }} / 4
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Essay Answers --}}
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100 flex items-center gap-2">
                        <i class="fas fa-pen-alt text-orange-500"></i>
                        <h2 class="font-semibold text-orange-800">Jawaban Uraian (Essay)</h2>
                    </div>
                    <div class="p-6 space-y-6">

                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-800 mb-2">
                                Perubahan paling nyata apa yang Anda rasakan setelah mengikuti program ini?
                            </h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $submission->essay_perubahan ?: '-' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-800 mb-2">
                                Dalam hal apa sertifikasi ini paling membantu Anda (pekerjaan, karier, atau praktik)?
                            </h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $submission->essay_manfaat ?: '-' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                            <h4 class="text-sm font-semibold text-gray-800 mb-2">
                                Saran evaluasi untuk peningkatan kualitas program!
                            </h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $submission->essay_saran ?: '-' }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
