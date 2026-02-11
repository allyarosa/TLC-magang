<div class="min-h-screen bg-slate-50 flex flex-col justify-center py-6 font-sans">
    {{-- PERUBAHAN 1: max-w-4xl diganti max-w-2xl agar lebih ramping --}}
    <div class="max-w-2xl w-full mx-auto px-2 sm:px-2">

        <div class="mb-6">
            <div class="flex justify-between text-xs font-medium text-slate-400 mb-2 uppercase tracking-wide">
                <span>Progres Survei</span>
                <span>{{ round($progress) }}%</span>
            </div>
            <div class="h-2 bg-slate-200 rounded-full overflow-hidden">
                <div class="h-full bg-[#1D4E89] transition-all duration-500 ease-out" style="width: {{ $progress }}%">
                </div>
            </div>
        </div>
        <div
            class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative h-[550px] flex flex-col">

            <div class="flex-grow p-6 sm:p-4 md:p-6 flex flex-col justify-center overflow-y-auto">

                @if ($currentStep === 1)
                    <div class="text-center animate-fade-in-up">
                        <div
                            class="w-1/2 h-1/3 rounded-2xl flex items-center justify-center mx-auto mb-4 text-[#1D4E89]">
                            <img src="{{ asset('assets/img/surveyForm/rate.png') }}" alt="" loading="lazy"
                                class="h-full object-contain">
                        </div>
                        <h2 class="text-2xl md:text-3xl tracking-tight text-gray-700 mb-2">
                            Survei Kepuasan
                        </h2>
                        <p class="text-slate-500 mb-6 text-md md:text-lg leading-relaxed">
                            Halo, <strong>{{ $nama_lengkap }}</strong> 👋<br>
                            Mohon luangkan waktu sejenak untuk memberikan umpan balik. Data berikut diambil dari profil
                            Anda.
                        </p>
                    </div>
                @endif

                @if ($currentStep === 2)
                    <div class="animate-fade-in-up mx-10 md:mx-36">
                        <label class="block text-lg font-semibold text-slate-700 mb-4">
                            Berapa usia Anda saat ini?
                        </label>
                        <div class="space-y-2">
                            @foreach (['< 20 tahun', '20-24 tahun', '25-29 tahun', '30-39 tahun', '≥ 40 tahun'] as $option)
                                <label
                                    class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:border-[#1D4E89] hover:bg-[#1D4E89]/5 transition-all group {{ $umur_range === $option ? 'border-[#1D4E89] bg-[#1D4E89]/5 ring-1 ring-[#1D4E89]' : '' }}">
                                    <input type="radio" wire:model.live="umur_range" value="{{ $option }}"
                                        class="hidden">
                                    <div
                                        class="w-4 h-4 rounded-full border-2 border-slate-300 mr-3 flex items-center justify-center group-hover:border-[#1D4E89] {{ $umur_range === $option ? 'border-[#1D4E89]' : '' }}">
                                        @if ($umur_range === $option)
                                            <div class="w-2 h-2 bg-[#1D4E89] rounded-full"></div>
                                        @endif
                                    </div>
                                    <span class="text-slate-700 font-medium text-sm">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('umur_range')
                            <p class="text-[#E76F51] text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                @if ($currentStep === 3)
                    <div class="animate-fade-in-up mx-2 sm:mx-10 md:mx-36">
                        <label class="block text-lg font-semibold text-slate-700 mb-4">
                            Apa status pekerjaan Anda saat ini?
                        </label>
                        <div class="space-y-2">
                            @foreach (['Belum bekerja', 'Sudah bekerja (bidang tidak relevan)', 'Sudah bekerja (bidang relevan)', 'Wirausaha'] as $option)
                                <label
                                    class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:border-[#1D4E89] hover:bg-[#1D4E89]/5 transition-all group {{ $status_pekerjaan === $option ? 'border-[#1D4E89] bg-[#1D4E89]/5 ring-1 ring-[#1D4E89]' : '' }}">
                                    <input type="radio" wire:model.live="status_pekerjaan"
                                        value="{{ $option }}" class="hidden">
                                    <div
                                        class="w-4 h-4 rounded-full border-2 border-slate-300 mr-3 flex items-center justify-center group-hover:border-[#1D4E89] {{ $status_pekerjaan === $option ? 'border-[#1D4E89]' : '' }}">
                                        @if ($status_pekerjaan === $option)
                                            <div class="w-2 h-2 bg-[#1D4E89] rounded-full"></div>
                                        @endif
                                    </div>
                                    <span class="text-slate-700 font-medium text-sm">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('status_pekerjaan')
                            <p class="text-[#E76F51] text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                @if ($currentStep === 4)
                    <div class="animate-fade-in-up mx-2 sm:mx-10 md:mx-36">
                        <label class="block text-lg font-semibold text-slate-700 mb-4">
                            Di mana instansi tempat Anda bekerja?
                        </label>
                        <input type="text" wire:model="tempat_bekerja"
                            class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#1D4E89] focus:border-[#1D4E89] transition-all outline-none"
                            placeholder="Tuliskan nama instansi..." autofocus>
                        <p class="text-slate-400 text-xs mt-2">
                            Jika belum bekerja, lewatkan saja.
                        </p>
                        @error('tempat_bekerja')
                            <p class="text-[#E76F51] text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                @if ($currentStep === 5)
                    <div class="animate-fade-in-up">
                        <label class="block text-lg font-semibold text-slate-700 mb-4">
                            Apa tujuan utama Anda mengikuti sertifikasi ini?
                        </label>
                        <div class="space-y-2">
                            @foreach (['Meningkatkan kompetensi profesional', 'Mendapatkan pengakuan resmi (sertifikat)', 'Kebutuhan pekerjaan/jabatan', 'Persiapan kerja', 'Pengembangan karier'] as $option)
                                <label
                                    class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:border-[#1D4E89] hover:bg-[#1D4E89]/5 transition-all {{ in_array($option, $tujuan_sertifikasi) ? 'border-[#1D4E89] bg-[#1D4E89]/5 ring-1 ring-[#1D4E89]' : '' }}">
                                    <input type="checkbox" wire:model.live="tujuan_sertifikasi"
                                        value="{{ $option }}"
                                        class="w-4 h-4 text-[#1D4E89] rounded focus:ring-[#1D4E89] border-gray-300 mr-3">
                                    <span class="text-slate-700 font-medium text-sm">{{ $option }}</span>
                                </label>
                            @endforeach

                            <label
                                class="flex items-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:border-[#1D4E89] hover:bg-[#1D4E89]/5 transition-all {{ in_array('Lainnya', $tujuan_sertifikasi) ? 'border-[#1D4E89] bg-[#1D4E89]/5 ring-1 ring-[#1D4E89]' : '' }}">
                                <input type="checkbox" wire:model.live="tujuan_sertifikasi" value="Lainnya"
                                    class="w-4 h-4 text-[#1D4E89] rounded focus:ring-[#1D4E89] border-gray-300 mr-3">
                                <span class="text-slate-700 font-medium text-sm">Lainnya</span>
                            </label>

                            @if (in_array('Lainnya', $tujuan_sertifikasi))
                                <input type="text" wire:model="tujuan_lainnya"
                                    class="w-full mt-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-[#1D4E89] focus:border-[#1D4E89] text-sm"
                                    placeholder="Sebutkan tujuan lainnya...">
                            @endif
                        </div>
                        @error('tujuan_sertifikasi')
                            <p class="text-[#E76F51] text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                @php
                    $ratingQuestions = [
                        6 => [
                            'model' => 'rating_materi',
                            'text' => 'Materi training selama 12 sesi sesuai dengan kebutuhan kompetensi saya.',
                        ],
                        7 => [
                            'model' => 'rating_trainer',
                            'text' => 'Trainer menyampaikan materi dengan jelas dan membantu.',
                        ],
                        8 => [
                            'model' => 'rating_uji',
                            'text' => 'Proses uji sertifikasi dilaksanakan secara adil dan transparan.',
                        ],
                        9 => [
                            'model' => 'rating_peningkatan_kompetensi',
                            'text' => 'Setelah mengikuti program ini, pemahaman dan kompetensi saya meningkat.',
                        ],
                        10 => [
                            'model' => 'rating_penerapan',
                            'text' => 'Kompetensi hasil training ini sudah/akan saya terapkan dalam pekerjaan saya.',
                        ],
                    ];
                @endphp

                @foreach ($ratingQuestions as $step => $q)
                    @if ($currentStep === $step)
                        <div class="animate-fade-in-up text-center" wire:key="rating-step-{{ $step }}">
                            <span
                                class="inline-block px-3 py-1 bg-[#1D4E89]/10 text-[#1D4E89] rounded-full text-[10px] font-bold tracking-wide uppercase mb-4">
                                Evaluasi {{ $step - 5 }}/5
                            </span>
                            <h3 class="text-lg md:text-xl font-bold text-slate-700 mb-6 leading-snug">
                                "{{ $q['text'] }}"</h3>

                            {{-- PERUBAHAN 4: Ukuran tombol rating diperkecil (w-14, h-14) agar pas --}}
                            <div class="flex justify-center gap-3 sm:gap-4 md:gap-6 mb-6">
                                @foreach ([1 => 'Sangat Tidak Setuju', 2 => 'Tidak Setuju', 3 => 'Setuju', 4 => 'Sangat Setuju'] as $val => $label)
                                    <label class="cursor-pointer group relative">
                                        <input type="radio" wire:model.live="{{ $q['model'] }}"
                                            value="{{ $val }}" class="hidden">
                                        <div
                                            class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-xl border-2 flex flex-col items-center justify-center transition-all duration-200 {{ $this->{$q['model']} == $val ? 'border-[#1D4E89] bg-[#1D4E89] text-white shadow-lg scale-105' : 'border-slate-200 text-slate-400 hover:border-[#1D4E89] hover:text-[#1D4E89]' }}">
                                            <span
                                                class="text-lg sm:text-xl md:text-2xl font-bold">{{ $val }}</span>
                                        </div>
                                        <span
                                            class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 w-32 text-center text-[10px] font-medium text-slate-500 opacity-0 group-hover:opacity-100 transition-opacity {{ $this->{$q['model']} == $val ? 'opacity-100 text-[#1D4E89]' : '' }}">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error($q['model'])
                                <p class="text-[#E76F51] text-xs mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                @endforeach

                @php
                    $essayQuestions = [
                        11 => [
                            'model' => 'essay_perubahan',
                            'label' => 'Perubahan paling nyata apa yang Anda rasakan setelah mengikuti program ini?',
                        ],
                        12 => [
                            'model' => 'essay_manfaat',
                            'label' =>
                                'Dalam hal apa sertifikasi ini paling membantu Anda (pekerjaan, karier, atau praktik)?',
                        ],
                        13 => [
                            'model' => 'essay_saran',
                            'label' => 'Saran evaluasi untuk peningkatan kualitas program!',
                        ],
                    ];
                @endphp

                @foreach ($essayQuestions as $step => $q)
                    @if ($currentStep === $step)
                        <div class="animate-fade-in-up" wire:key="essay-step-{{ $step }}">
                            <label class="block text-lg font-semibold text-slate-700 mb-4">{{ $q['label'] }}</label>
                            <textarea wire:model.live.debounce.300ms="{{ $q['model'] }}" rows="5"
                                class="w-full p-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#1D4E89] focus:border-[#1D4E89] outline-none resize-none text-slate-700 leading-relaxed text-sm"
                                placeholder="Tuliskan jawaban Anda di sini..." autofocus></textarea>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-xs text-slate-400">Minimal 10 karakter</span>
                                @error($q['model'])
                                    <span class="text-[#E76F51] text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif
                @endforeach

                @if ($currentStep === 14)
                    <div class="text-center animate-fade-in-up py-4">
                        <div
                            class="w-16 h-16 bg-[#2A9D8F]/10 rounded-full flex items-center justify-center mx-auto mb-4 text-[#2A9D8F]">
                            {{-- <i class="fas fa-check text-3xl"></i> --}}
                            <img src="{{ asset('assets/img/surveyForm/success.png') }}" alt="Success Logo" class="w-16 h-16">
                        </div>
                        <h2 class="text-xl font-bold text-slate-700 mb-2">Terima Kasih!</h2>
                        <p class="text-slate-500 mb-6 max-w-sm mx-auto text-sm">
                            Feedback Anda sangat berharga bagi kami. Tekan tombol di bawah untuk menyimpan jawaban dan
                            mengunduh sertifikat Anda.
                        </p>
                    </div>
                @endif

            </div>

            <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex justify-between items-center shrink-0">
                <div>
                </div>

                @if ($currentStep < 14 && $this->canProceed)
                    <button wire:click="nextStep"
                        class="bg-[#1D4E89] text-white px-2 md:px-6 py-2 md:py-2.5 rounded-lg font-base md:font-semibold shadow-md shadow-[#1D4E89]/30 hover:bg-[#0d2a4e] text-sm flex items-center">
                        Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                @endif
                @if ($currentStep == 14)
                    <button wire:click="submit"
                        class="bg-[#2A9D8F] text-white px-2 md:px-6 py-2 md:py-2.5 rounded-lg font-base md:font-semibold shadow-md shadow-[#2A9D8F]/30 hover:bg-[#1a6e63] text-sm flex items-center">
                        Selesai & Unduh <i class="fas fa-download ml-2"></i>
                    </button>
                @endif
            </div>
        </div>
        @if (session('redirect_after_download_certificate'))
            <script>
                setTimeout(() => {
                    window.location.href = "{{ route('asesi.dashboard') }}";
                }, 2000);
            </script>
        @endif
    </div>

    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.4s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scrollbar Halus */
        .overflow-y-auto::-webkit-scrollbar {
            width: 5px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: transparent;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background-color: #e2e8f0;
            border-radius: 10px;
        }
    </style>
</div>
