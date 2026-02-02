@extends('layouts.adminDashboard')

@section('title', 'Daftar Soal Survey')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Daftar Pertanyaan Survey Kepuasan
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Berikut adalah daftar pertanyaan yang diajukan kepada peserta (Asesi) dalam survey kepuasan.
                </p>
            </div>
            <a href="{{ route('admin.survey-result.a.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="space-y-6 max-w-5xl mx-auto">
            
            {{-- Bagian 1: Profil & Demografi --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-600 py-1 px-2.5 rounded-md text-xs font-bold uppercase">Bagian 1</span>
                        Profil & Demografi
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    {{-- Q1 --}}
                    <div>
                        <div class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-blue-600 font-bold text-sm">1</span>
                            <div class="flex-grow">
                                <h3 class="text-base font-semibold text-gray-800 mb-3">Berapa usia Anda saat ini?</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">< 20 tahun</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">20-24 tahun</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">25-29 tahun</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">30-39 tahun</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">≥ 40 tahun</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    {{-- Q2 --}}
                    <div>
                        <div class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-blue-600 font-bold text-sm">2</span>
                            <div class="flex-grow">
                                <h3 class="text-base font-semibold text-gray-800 mb-3">Apa status pekerjaan Anda saat ini?</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">Belum bekerja</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">Sudah bekerja (bidang tidak relevan)</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">Sudah bekerja (bidang relevan)</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 rounded-full border-2 border-gray-400 mr-3"></div>
                                        <span class="text-gray-600 text-sm">Wirausaha</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    {{-- Q3 --}}
                    <div>
                        <div class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-blue-600 font-bold text-sm">3</span>
                            <div class="flex-grow">
                                <h3 class="text-base font-semibold text-gray-800 mb-3">Di mana instansi tempat Anda bekerja?</h3>
                                <input type="text" disabled class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-500 italic" value="[Input Jawaban Singkat oleh User]">
                                <p class="text-xs text-gray-400 mt-2">Jika belum bekerja, user dapat melewatkan pertanyaan ini.</p>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">
                    
                    {{-- Q4 --}}
                    <div>
                        <div class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-blue-600 font-bold text-sm">4</span>
                            <div class="flex-grow">
                                <h3 class="text-base font-semibold text-gray-800 mb-3">Apa tujuan utama Anda mengikuti sertifikasi ini? (Dapat memilih lebih dari satu)</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 bg-white border-2 border-gray-400 rounded mr-3"></div>
                                        <span class="text-gray-600 text-sm">Meningkatkan kompetensi profesional</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 bg-white border-2 border-gray-400 rounded mr-3"></div>
                                        <span class="text-gray-600 text-sm">Mendapatkan pengakuan resmi (sertifikat)</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 bg-white border-2 border-gray-400 rounded mr-3"></div>
                                        <span class="text-gray-600 text-sm">Kebutuhan pekerjaan/jabatan</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 bg-white border-2 border-gray-400 rounded mr-3"></div>
                                        <span class="text-gray-600 text-sm">Persiapan kerja</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 bg-white border-2 border-gray-400 rounded mr-3"></div>
                                        <span class="text-gray-600 text-sm">Pengembangan karier</span>
                                    </div>
                                    <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                                        <div class="w-4 h-4 bg-white border-2 border-gray-400 rounded mr-3"></div>
                                        <span class="text-gray-600 text-sm">Lainnya...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian 2: Evaluasi Program --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100">
                    <h2 class="text-lg font-semibold text-indigo-800 flex items-center gap-2">
                        <span class="bg-indigo-100 text-indigo-600 py-1 px-2.5 rounded-md text-xs font-bold uppercase">Bagian 2</span>
                        Evaluasi Program (Skala Likert)
                    </h2>
                </div>
                <div class="p-6">
                    <div class="bg-indigo-50/50 rounded-lg p-4 mb-6 text-sm text-indigo-700 flex items-center gap-2 border border-indigo-100">
                        <i class="fas fa-info-circle"></i>
                        <span><strong>Skala Penilaian:</strong> 1 (Sangat Tidak Setuju), 2 (Tidak Setuju), 3 (Setuju), 4 (Sangat Setuju)</span>
                    </div>

                    <div class="space-y-6">
                        @foreach ([
                            5 => 'Materi training selama 12 sesi sesuai dengan kebutuhan kompetensi saya.',
                            6 => 'Trainer menyampaikan materi dengan jelas dan membantu.',
                            7 => 'Proses uji sertifikasi dilaksanakan secara adil dan transparan.',
                            8 => 'Setelah mengikuti program ini, pemahaman dan kompetensi saya meningkat.',
                            9 => 'Kompetensi hasil training ini sudah/akan saya terapkan dalam pekerjaan saya.'
                        ] as $num => $q)
                            <div class="flex items-start gap-4">
                                <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-indigo-50 text-indigo-600 font-bold text-sm">{{ $num }}</span>
                                <div class="flex-grow">
                                    <h3 class="text-base font-medium text-gray-800 mb-3">"{{ $q }}"</h3>
                                    <div class="flex gap-2 sm:gap-4">
                                        @foreach ([1, 2, 3, 4] as $val)
                                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg border-2 border-gray-200 flex items-center justify-center text-gray-400 font-bold text-lg bg-white">
                                                {{ $val }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @if(!$loop->last) <hr class="border-gray-100"> @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Bagian 3: Uraian / Essay --}}
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                    <h2 class="text-lg font-semibold text-orange-800 flex items-center gap-2">
                        <span class="bg-orange-100 text-orange-600 py-1 px-2.5 rounded-md text-xs font-bold uppercase">Bagian 3</span>
                        Uraian / Essay
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <div class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-orange-50 text-orange-600 font-bold text-sm">10</span>
                            <div class="flex-grow">
                                <h3 class="text-base font-semibold text-gray-800 mb-3">Perubahan paling nyata apa yang Anda rasakan setelah mengikuti program ini?</h3>
                                <div class="w-full h-24 bg-gray-50 border border-gray-300 rounded-lg p-3">
                                    <span class="text-gray-400 text-sm italic">[Area Jawaban Panjang]</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <div>
                        <div class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-orange-50 text-orange-600 font-bold text-sm">11</span>
                            <div class="flex-grow">
                                <h3 class="text-base font-semibold text-gray-800 mb-3">Dalam hal apa sertifikasi ini paling membantu Anda (pekerjaan, karier, atau praktik)?</h3>
                                <div class="w-full h-24 bg-gray-50 border border-gray-300 rounded-lg p-3">
                                    <span class="text-gray-400 text-sm italic">[Area Jawaban Panjang]</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <div>
                        <div class="flex items-start gap-4">
                            <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-orange-50 text-orange-600 font-bold text-sm">12</span>
                            <div class="flex-grow">
                                <h3 class="text-base font-semibold text-gray-800 mb-3">Saran evaluasi untuk peningkatan kualitas program!</h3>
                                <div class="w-full h-24 bg-gray-50 border border-gray-300 rounded-lg p-3">
                                    <span class="text-gray-400 text-sm italic">[Area Jawaban Panjang]</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
