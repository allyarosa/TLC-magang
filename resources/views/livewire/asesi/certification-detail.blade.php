<style>
    @keyframes floating {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    .animate-floating {
        animation: floating 2s ease-in-out infinite;
    }
</style>
<div id="detail_sertifikasi_page" class="min-h-screen bg-slate-50/50 py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="relative overflow-hidden rounded-2xl bg-slate-900 shadow-xl shadow-slate-200/50 mb-10 group">

            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 rounded-full bg-indigo-500/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-60 h-60 rounded-full bg-blue-500/10 blur-3xl"></div>

            <div
                class="relative z-10 p-6 sm:p-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-3">
                        <img src="{{ asset(path: 'images/certification-badge.png') }}" alt="" class="w-10 h-10">
                        <span class="text-indigo-300 font-medium tracking-wide text-sm uppercase">
                            Status Sertifikasi
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2 tracking-tight">
                        Teaching Mastery <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-amber-200 to-yellow-500">
                            Level A
                        </span>
                    </h1>
                    @include('livewire.asesi.partials.certification-status-message')
                </div>

                <div class="w-full md:w-auto flex-shrink-0">
                    @if ($hasAccessA)
                        @if (Auth::user()->hasPermissionTo('level_A_completed'))
                            @if (Auth::user()->hasFilledSurvey())
                                <a href="{{ $hasSubmittedSurvey ? route('asesi.downloadCertificate', Vinkla\Hashids\Facades\Hashids::encode(Auth::id())) : route('asesi.sertifikasi.survey') }}"
                                    class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 font-bold text-white transition-all duration-300 bg-gradient-to-r from-amber-500 to-yellow-600 rounded-xl hover:from-amber-400 hover:to-yellow-500 shadow-lg shadow-amber-500/30 hover:shadow-amber-500/50 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 ring-offset-slate-900">
                                    <span>Download Sertifikat</span>
                                    <i
                                        class="fas fa-award text-lg group-hover:rotate-12 transition-transform duration-300"></i>
                                    <div
                                        class="absolute inset-0 rounded-xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </a>
                            @else
                                <a href="{{ $hasSubmittedSurvey ? route('asesi.downloadCertificate', Vinkla\Hashids\Facades\Hashids::encode(Auth::id())) : route('asesi.sertifikasi.survey') }}"
                                    class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 font-bold text-white transition-all duration-300 bg-gradient-to-r from-amber-500 to-yellow-600 rounded-xl hover:from-amber-400 hover:to-yellow-500 shadow-lg shadow-amber-500/30 hover:shadow-amber-500/50 animate-floating focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 ring-offset-slate-900">
                                    <span>Klaim Sertifikat</span>
                                    <i
                                        class="fas fa-award text-lg group-hover:rotate-12 transition-transform duration-300"></i>
                                    <div
                                        class="absolute inset-0 rounded-xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </a>
                            @endif
                        @else
                            <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-1 rounded-xl">
                                <livewire:component.button-certificate status="sedang_berjalan" />
                            </div>
                        @endif
                    @else
                        <div class="opacity-75">
                            <livewire:component.button-certificate status="belum_tersedia" />
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div
                class="p-6 sm:p-8 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                        Riwayat Ujian
                        <span
                            class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                            {{ count($exams) }} Selesai
                        </span>
                    </h2>
                    <p class="text-slate-500 text-sm mt-1">
                        Rekam jejak penilaian kompetensi Anda.
                    </p>
                </div>

                @if (count($exams) > 0)
                    <div class="flex items-center gap-6 text-sm">
                        <div class="text-right">
                            <span class="block text-slate-400 text-xs uppercase font-semibold">
                                Total Soal
                            </span>
                            <span
                                class="font-bold text-slate-700">{{ $exams->sum(function ($e) {return $e->correct_answers + $e->wrong_answers;}) }}</span>
                        </div>
                        <div class="w-px h-8 bg-slate-100"></div>
                        <div class="text-right">
                            <span class="block text-slate-400 text-xs uppercase font-semibold">Terakhir</span>
                            <span
                                class="font-bold text-slate-700">{{ $exams->first()->start_time ? $exams->first()->start_time->format('d M') : '-' }}</span>
                        </div>
                    </div>
                @endif
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50/80">
                        <tr>
                            <th scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                Kategori Ujian
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                Tanggal & Waktu
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-center text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                Total Soal
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-100">
                        @forelse($exams as $exam)
                            <tr class="hover:bg-slate-50/80 transition-colors duration-200">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-slate-900">
                                                {{ $exam->categoryA->name }}</div>
                                            <div class="text-xs text-slate-500 mt-0.5">ID:
                                                #{{ substr($exam->id, 0, 8) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-slate-700">
                                            {{ $exam->start_time ? $exam->start_time->format('d F Y') : '-' }}
                                        </span>
                                        <span class="text-xs text-slate-400 mt-0.5 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $exam->start_time ? $exam->start_time->format('H:i') . ' WIB' : '-' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                        {{ $exam->correct_answers + $exam->wrong_answers }} Soal
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                                        <div
                                            class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-semibold text-slate-800 mb-1">Belum Ada Riwayat</h3>
                                        <p class="text-slate-500 text-sm">Anda belum menyelesaikan ujian apapun. Mulai
                                            langkah pertama Anda sekarang.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (count($exams) > 5)
                <div class="bg-slate-50 px-6 py-4 border-t border-slate-200">
                    <div class="text-xs text-center text-slate-500">
                        Menampilkan 5 ujian terakhir
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
