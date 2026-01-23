<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Level A Card -->
    @php use Vinkla\Hashids\Facades\Hashids; @endphp

    {{-- Level A Card: Blue Theme --}}
    <div class="group flex flex-col bg-gradient-to-br from-[#1D4E89] to-[#0d2a4e] opacity-[0.97] rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-slate-100 relative opacity-0 slide-in h-full"
        style="animation-delay: 0.1s">
        <!-- Status Badge -->
        <div class="absolute top-5 right-5 z-10">
            @if ($hasAccessA)
                @if (Auth::user()->hasPermissionTo('level_A_completed'))
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 tracking-wide uppercase shadow-sm">
                        <i class="fas fa-check-circle mr-1.5"></i> Selesai
                    </span>
                @else
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 tracking-wide uppercase shadow-sm">
                        <i class="fas fa-unlock mr-1.5"></i> Terbuka
                    </span>
                @endif
            @else
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500 tracking-wide uppercase shadow-sm">
                    <i class="fas fa-lock mr-1.5"></i> Terkunci
                </span>
            @endif
        </div>

        {{-- <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-blue-400 to-blue-600 bg-[length:200%_100%] group-hover:animate-gradient"></div> --}}

        <div class="p-8 flex flex-col h-full">
            <div class="mb-6">
                <!-- Icon Level A (Blue) -->
                <div
                    class="w-16 h-16 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 ring-1 ring-blue-100/50">
                    <i class="fas fa-book-open text-3xl text-blue-500"></i>
                </div>
                <h2 class="text-xl font-bold text-white mb-3 transition-colors">Teaching Knowledge</h2>
                <p class="text-white text-sm leading-relaxed">
                    Dasar yang wajib dimiliki untuk mengajar dengan percaya diri dan efektif.
                </p>
            </div>

            <div class="space-y-4 mb-8 flex-grow">
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-blue-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-blue-100">
                        <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Dasar-dasar mengajar</span>
                </div>
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-blue-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-blue-100">
                        <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Keterlibatan siswa</span>
                </div>
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-blue-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-blue-100">
                        <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Penilaian formatif</span>
                </div>
            </div>

            <div class="mt-auto pt-6 border-t border-slate-100">
                @if ($hasAccessA)
                    @if (Auth::user()->hasPermissionTo('level_A_completed'))
                        <a wire:navigate
                            href="{{ route('asesi.sertifikat.riwayat', ['level' => 'A', 'id' => Hashids::encode(Auth::id())]) }}"
                            class="w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20 hover:shadow-blue-500/30">
                            <i class="fas fa-award mr-2"></i>
                            Lihat Sertifikat
                        </a>
                    @else
                        <a wire:navigate
                            href="{{ route('asesi.sertifikat.riwayat', ['level' => 'A', 'id' => Hashids::encode(Auth::id())]) }}"
                            class="group w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-white border-2 border-[#1D4E89] text-[#1D4E89] hover:bg-blue-50 transition-all duration-300">
                            <span class="flex items-center">
                                <i class="fas fa-play-circle mr-2 group-hover:scale-110 transition-transform"></i>
                                Lanjutkan Belajar
                            </span>
                        </a>
                    @endif
                @else
                    <div class="text-center">
                        <p class="text-xs text-slate-300 mb-3">Lakukan pembayaran untuk membuka</p>
                        <a href="{{ route('payments.create', Hashids::encode(1)) }}"
                            class="w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-slate-800 text-white hover:bg-slate-700 transition-colors shadow-md">
                            <i class="fas fa-lock-open mr-2"></i>
                            Buka Akses
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Level B Card -->
    {{-- Level B Card: Emerald/Green Theme (Activation) --}}
    <div class="group flex flex-col bg-gradient-to-br from-[#2A9D8F] to-[#1a6e63] opacity-[0.97] rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-slate-100 relative opacity-0 slide-in h-full"
        style="animation-delay: 0.2s">
        <!-- Status Badge -->
        <div class="absolute top-5 right-5 z-10">
            @if ($hasAccessB)
                @if (Auth::user()->hasPermissionTo('level_B_completed'))
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 tracking-wide uppercase shadow-sm">
                        <i class="fas fa-check-circle mr-1.5"></i> Selesai
                    </span>
                @else
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 tracking-wide uppercase shadow-sm">
                        <i class="fas fa-unlock mr-1.5"></i> Terbuka
                    </span>
                @endif
            @else
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500 tracking-wide uppercase shadow-sm">
                    <i class="fas fa-lock mr-1.5"></i> Terkunci
                </span>
            @endif
        </div>

        {{-- <div class="h-2 w-full bg-gradient-to-r from-emerald-600 via-teal-400 to-emerald-600 bg-[length:200%_100%] group-hover:animate-gradient"></div> --}}

        <div class="p-8 flex flex-col h-full">
            <div class="mb-6">
                <!-- Icon Level B (Emerald) -->
                <div
                    class="w-16 h-16 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 ring-1 ring-emerald-100/50">
                    <i class="fas fa-chalkboard-teacher text-3xl text-[#2A9D8F]"></i>
                </div>
                <h2 class="text-xl font-bold text-white mb-3 transition-colors">Teaching Activation</h2>
                <p class="text-white text-sm leading-relaxed">
                    Pengajaran aktif melalui proyek dan tugas nyata di kelas.
                </p>
            </div>

            <div class="space-y-4 mb-8 flex-grow">
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-emerald-100">
                        <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Modul ajar</span>
                </div>
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-emerald-100">
                        <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Skala literasi</span>
                </div>
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-emerald-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-emerald-100">
                        <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Observasi praktik</span>
                </div>
            </div>

            <div class="mt-auto pt-6 border-t border-slate-100">
                @if ($hasAccessB)
                    @if (Auth::user()->hasPermissionTo('level_B_completed'))
                        <a wire:navigate
                            href="{{ route('asesi.sertifikat.riwayat', ['level' => 'B', 'id' => Hashids::encode(2)]) }}"
                            class="w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-gradient-to-r from-emerald-600 to-teal-500 text-white shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/30 hover:scale-[1.02] transform transition-all duration-300">
                            <i class="fas fa-award mr-2"></i>
                            Lihat Sertifikat
                        </a>
                    @else
                        <a wire:navigate
                            href="{{ route('asesi.sertifikat.riwayat', ['level' => 'B', 'id' => Hashids::encode(Auth::id())]) }}"
                            class="group w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-white border-2 border-emerald-600 text-emerald-600 hover:bg-emerald-50 transition-all duration-300">
                            <span class="flex items-center">
                                <i class="fas fa-play-circle mr-2 group-hover:scale-110 transition-transform"></i>
                                Lanjutkan Belajar
                            </span>
                        </a>
                    @endif
                @else
                    @if (Auth::user()->hasPermissionTo('level_A_completed'))
                        <div class="text-center">
                            <p class="text-xs text-slate-300 mb-3">Lakukan pembayaran untuk membuka</p>
                            <a href="{{ route('payments.create', Hashids::encode(2)) }}"
                                class="w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-slate-800 text-white hover:bg-slate-700 transition-colors shadow-md">
                                <i class="fas fa-lock-open mr-2"></i>
                                Buka Akses
                            </a>
                        </div>
                    @else
                        <div
                            class="w-full py-3 px-4 rounded-xl bg-gray-50 border border-gray-100 text-gray-400 font-medium text-center text-sm cursor-not-allowed">
                            <i class="fas fa-lock mr-2"></i> Selesaikan Level A
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <!-- Level C Card -->
    {{-- Level C Card: Purple/Violet Theme (Mastery) --}}
    <div class="group flex flex-col bg-gradient-to-br from-[#E76F51] to-[#cf4a2a] opacity-[0.97] rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-slate-100 relative opacity-0 slide-in h-full"
        style="animation-delay: 0.3s">
        <!-- Status Badge -->
        <div class="absolute top-5 right-5 z-10">
            @if ($hasAccessC)
                @if (Auth::user()->hasPermissionTo('level_C_completed'))
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 tracking-wide uppercase shadow-sm">
                        <i class="fas fa-check-circle mr-1.5"></i> Selesai
                    </span>
                @else
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 tracking-wide uppercase shadow-sm">
                        <i class="fas fa-unlock mr-1.5"></i> Terbuka
                    </span>
                @endif
            @else
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500 tracking-wide uppercase shadow-sm">
                    <i class="fas fa-lock mr-1.5"></i> Terkunci
                </span>
            @endif
        </div>

        {{-- <div class="h-2 w-full bg-gradient-to-r from-purple-700 via-fuchsia-500 to-purple-700 bg-[length:200%_100%] group-hover:animate-gradient"></div> --}}

        <div class="p-8 flex flex-col h-full">
            <div class="mb-6">
                <!-- Icon Level C (Purple) -->
                <div
                    class="w-16 h-16 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 ring-1 ring-purple-100/50">
                    <i class="fas fa-trophy text-3xl text-[#E76F51]"></i>
                </div>
                <h2 class="text-xl font-bold text-white mb-3 transition-colors">Teaching Mastery</h2>
                <p class="text-white text-sm leading-relaxed">
                    Tunjukkan video praktik dan refleksi mendalam untuk sertifikasi akhir.
                </p>
            </div>

            <div class="space-y-4 mb-8 flex-grow">
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-purple-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-purple-100">
                        <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Video mengajar</span>
                </div>
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-purple-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-purple-100">
                        <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Refleksi tertulis</span>
                </div>
                <div class="flex items-start">
                    <div
                        class="w-5 h-5 rounded-full bg-purple-50 flex items-center justify-center mt-0.5 mr-3 flex-shrink-0 border border-purple-100">
                        <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-white text-sm font-medium">Umpan balik asesor</span>
                </div>
            </div>

            <div class="mt-auto pt-6 border-t border-slate-100">
                @if ($hasAccessC)
                    @if (Auth::user()->hasPermissionTo('level_C_completed'))
                        <a wire:navigate
                            href="{{ route('asesi.sertifikat.riwayat', ['level' => 'C', 'id' => Hashids::encode(3)]) }}"
                            class="w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-gradient-to-r from-purple-700 to-fuchsia-600 text-white shadow-lg shadow-purple-500/20 hover:shadow-purple-500/30 hover:scale-[1.02] transform transition-all duration-300">
                            <i class="fas fa-award mr-2"></i>
                            Lihat Sertifikat
                        </a>
                    @else
                        <a wire:navigate
                            href="{{ route('asesi.sertifikat.riwayat', ['level' => 'C', 'id' => Hashids::encode(Auth::id())]) }}"
                            class="group w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-white border-2 border-purple-700 text-purple-700 hover:bg-purple-50 transition-all duration-300">
                            <span class="flex items-center">
                                <i class="fas fa-play-circle mr-2 group-hover:scale-110 transition-transform"></i>
                                Lanjutkan Belajar
                            </span>
                        </a>
                    @endif
                @else
                    @if (Auth::user()->hasPermissionTo('level_B_completed'))
                        <div class="text-center">
                            <p class="text-xs text-slate-300 mb-3">Lakukan pembayaran untuk membuka</p>
                            <a href="{{ route('payments.create', Hashids::encode(3)) }}"
                                class="w-full inline-flex justify-center items-center py-3 px-4 rounded-xl font-semibold bg-slate-800 text-white hover:bg-slate-700 transition-colors shadow-md">
                                <i class="fas fa-lock-open mr-2"></i>
                                Buka Akses
                            </a>
                        </div>
                    @else
                        <div
                            class="w-full py-3 px-4 rounded-xl bg-gray-50 border border-gray-100 text-gray-400 font-medium text-center text-sm cursor-not-allowed">
                            <i class="fas fa-lock mr-2"></i> Selesaikan Level B
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/certificationLevelCard.js') }}"></script>
    <style>
        .animate-gradient {
            animation: gradient 3s ease infinite;
            background-size: 200% 200%;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in {
            animation: slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
    </style>
</div>
