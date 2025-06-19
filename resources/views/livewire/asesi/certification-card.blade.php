<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Level A Card -->
    @php use Vinkla\Hashids\Facades\Hashids; @endphp
    {{-- Level A Card --}}
    <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden opacity-0 slide-in border border-gray-100"
        style="animation-delay: 0.1s">
        <div class="h-2 bg-gradient-to-r from-[#1D4E89] to-[#2A5AAF]"></div>
        <div class="p-8">
            <div class="flex items-center mb-6">
                <div
                    class="w-12 h-12 bg-gradient-to-r from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-[#1D4E89]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Level A: Teaching Knowledge Certification</h2>
            </div>

            <p class="text-gray-600 mb-6 leading-relaxed">Dasar yang wajib dimiliki untuk mengajar dengan
                percaya diri.</p>

            <div class="space-y-4 mb-8">
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-gray-700">Dasar-dasar mengajar</span>
                </div>
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-gray-700">Keterlibatan siswa</span>
                </div>
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-gray-700">Penilaian formatif</span>
                </div>
            </div>

            {{-- <div class="flex items-center text-[#E76F51] mb-6">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-medium">Deadline: 30 April 2025</span>
                
            </div> --}}
            {{-- <p class="text-sm text-gray-500 italic mb-6">Belum dibuka - Lakukan pembayaran terlebih dahulu disini</p> --}}
            {{-- @if (!$hasAccessA)
                <p class="text-sm text-gray-500 italic mb-6">
                    Belum dibuka - Lakukan pembayaran terlebih dahulu
                    <a href="{{ route('payments.create', 1) }}" class="text-blue-600 underline hover:text-blue-800">
                        disini
                    </a>
                </p>
            @else
                <p class="text-sm text-gray-500 italic mb-6">Selesaikan kategori level A terlebih dahulu</p>
            @endif --}}

            @if ($hasAccessA)
                {{-- @if (Auth::user()->hasPermissionTo('level_A_completed'))
                    <p class="text-sm text-gray-500 italic mb-6">Selesaikan kategori level A terlebih dahulu</p>
                @else
                    <p class="text-sm text-gray-500 italic mb-6">Selesaikan kategori level A terlebih dahulu</p>
                @endif --}}
                @if (Auth::user()->hasPermissionTo('level_A_completed'))
                    <p class="text-sm text-green-600 italic mb-6">
                        <i class="fas fa-check-circle mr-1"></i>
                        Anda telah menyelesaikan kategori Level A dan berhak mendapatkan sertifikat
                    </p>
                @else
                    <p class="text-sm text-gray-500 italic mb-6">
                        <i class="fas fa-info-circle mr-1"></i>
                        Selesaikan kategori Level A terlebih dahulu untuk mendapatkan sertifikat
                    </p>
                @endif
            @else
                <p class="text-sm text-gray-500 italic mb-6">
                    Belum dibuka - Lakukan pembayaran terlebih dahulu
                    <a href="{{ route('payments.create', Vinkla\Hashids\Facades\Hashids::encode(1)) }}"
                        class="text-blue-600 underline hover:text-blue-800">
                        disini
                    </a>
                </p>
            @endif

            <div class="flex gap-3">
                @if ($hasAccessA)
                    @if (Auth::user()->hasPermissionTo('level_A_completed'))
                        <a href="{{ route('asesi.sertifikat.a', Vinkla\Hashids\Facades\Hashids::encode(Auth::id())) }}"
                            class="flex-1 font-medium py-3 px-1.5 rounded-xl transform transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300 bg-gradient-to-r from-[#1D4E89] to-[#2A5AAF] hover:from-[#14406B] hover:to-[#1F4A92] text-white cursor-pointer text-center block">
                            Lihat Sertifikat Anda
                        </a>
                    @else
                        <livewire:component.button-certificate status="sedang_berjalan">
                    @endif
                @else
                    {{-- <livewire:component.button-status-badge status="belum_tersedia" /> --}}
                    <livewire:component.button-certificate status="belum_tersedia">
                @endif
            </div>
        </div>
    </div>

    <!-- Level B Card -->
    <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden opacity-0 slide-in border border-gray-100"
        style="animation-delay: 0.2s">
        <div class="h-2 bg-gradient-to-r from-[#1D4E89] to-[#2A5AAF]"></div>
        <div class="p-8">
            <div class="flex items-center mb-6">
                <div
                    class="w-12 h-12 bg-gradient-to-r from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-[#1D4E89]" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Level B: Teaching Activation Certification</h2>
            </div>

            <p class="text-gray-600 mb-6 leading-relaxed">Pengajaran aktif melalui proyek dan tugas nyata
                di kelas.</p>

            <div class="space-y-4 mb-8">
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-gray-700">Modul ajar</span>
                </div>
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-gray-700">Skala literasi</span>
                </div>
                <div class="flex items-center">
                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-gray-700">Observasi praktik</span>
                </div>
            </div>

            @if ($hasAccessB)
                @if (Auth::user()->hasPermissionTo('level_B_completed'))
                    <p class="text-sm text-green-600 italic mb-6">
                        <i class="fas fa-check-circle mr-1"></i>
                        Anda telah menyelesaikan kategori Level B dan berhak mendapatkan sertifikat
                    </p>
                @else
                    <p class="text-sm text-gray-500 italic mb-6">
                        <i class="fas fa-info-circle mr-1"></i>
                        Selesaikan kategori Level B terlebih dahulu untuk mendapatkan sertifikat
                    </p>
                @endif
            @else
                @if (Auth::user()->hasPermissionTo('level_A_completed'))
                    <p class="text-sm text-gray-500 italic mb-6">
                        Belum dibuka - Lakukan pembayaran terlebih dahulu
                        <a href="{{ route('payments.create', Hashids::encode(2)) }}"
                            class="text-blue-600 underline hover:text-blue-800">
                            disini
                        </a>
                    </p>
                @else
                    <p class="text-sm text-gray-500 italic mb-6">Belum dibuka - menunggu Level B selesai</p>
                @endif

            @endif

            <div class="flex gap-3">
                @if ($hasAccessB)
                    @if (Auth::user()->hasPermissionTo('level_B_completed'))
                        <a href="{{ route('asesi.sertifikat.b', Vinkla\Hashids\Facades\Hashids::encode(2)) }}"
                            class="flex-1 font-medium py-3 px-1.5 rounded-xl transform transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300 bg-gradient-to-r from-[#1D4E89] to-[#2A5AAF] hover:from-[#14406B] hover:to-[#1F4A92] text-white cursor-pointer text-center block">
                            Lihat Sertifikat Anda
                        </a>
                    @else
                        <livewire:component.button-certificate status="sedang_berjalan">
                    @endif
                @else
                    <livewire:component.button-certificate status="belum_tersedia">
                @endif
            </div>
        </div>
    </div>

    <!-- Level C Card -->
<!-- Level C Card -->
<div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden opacity-0 slide-in border border-gray-100"
    style="animation-delay: 0.3s">
    <div class="h-2 bg-gradient-to-r from-[#1D4E89] to-[#2A5AAF]"></div>
    <div class="p-8">
        <div class="flex items-center mb-6">
            <div
                class="w-12 h-12 bg-gradient-to-r from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-[#1D4E89]" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M2 6a2 2 0 012-2h6l2 2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Level C: Teaching Mastery Certification</h2>
        </div>

        <p class="text-gray-600 mb-6 leading-relaxed">Tunjukkan video praktik dan refleksi mendalam
            untuk sertifikasi akhir.</p>

        <div class="space-y-4 mb-8">
            <div class="flex items-center">
                <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-gray-500">Video mengajar (YouTube)</span>
            </div>
            <div class="flex items-center">
                <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-gray-500">Refleksi tertulis</span>
            </div>
            <div class="flex items-center">
                <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-gray-500">Umpan balik asesor</span>
            </div>
        </div>

        @if ($hasAccessC)
            @if (Auth::user()->hasPermissionTo('level_C_completed'))
                <p class="text-sm text-green-600 italic mb-6">
                    <i class="fas fa-check-circle mr-1"></i>
                    Anda telah menyelesaikan kategori Level C dan berhak mendapatkan sertifikat
                </p>
            @else
                <p class="text-sm text-gray-500 italic mb-6">
                    <i class="fas fa-info-circle mr-1"></i>
                    Selesaikan kategori Level C terlebih dahulu untuk mendapatkan sertifikat
                </p>
            @endif
        @else
            @if (Auth::user()->hasPermissionTo('level_B_completed'))
                <p class="text-sm text-gray-500 italic mb-6">
                    Belum dibuka - Lakukan pembayaran terlebih dahulu
                    <a href="{{ route('payments.create', Hashids::encode(3)) }}"
                        class="text-blue-600 underline hover:text-blue-800">
                        disini
                    </a>
                </p>
            @else
                <p class="text-sm text-gray-500 italic mb-6">Belum dibuka - menunggu Level B selesai</p>
            @endif
        @endif

        <div class="flex gap-3">
            @if ($hasAccessC)
                @if (Auth::user()->hasPermissionTo('level_C_completed'))
                    <a href="{{ route('asesi.sertifikat.c') }}"
                        class="flex-1 font-medium py-3 px-1.5 rounded-xl transform transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300 bg-gradient-to-r from-[#1D4E89] to-[#2A5AAF] hover:from-[#14406B] hover:to-[#1F4A92] text-white cursor-pointer text-center block">
                        Lihat Sertifikat Anda
                    </a>
                @else
                    <livewire:component.button-certificate status="sedang_berjalan">
                @endif
            @else
                <livewire:component.button-certificate status="belum_tersedia">
            @endif
        </div>
    </div>
</div>    <script src="{{ asset('assets/js/certificationLevelCard.js') }}"></script>
    <style>
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
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

        @keyframes fadeIn {
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
            animation: slideIn 0.5s ease-out forwards;
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .progress-bar {
            transition: width 1s ease-in-out;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</div>
