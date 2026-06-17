@extends('layouts.app')

@section('title', 'Teaching and Learning Certification')

@section('top-banner')
    <livewire:referral-banner />
@endsection

@section('content')
    <div class="bg-abu">
        <x-main-home />
        <x-about-section />
        <x-visimisi-section />
        <x-manfaat-section />
        <x-skema-section />

        <!-- Paket Harga -->
        <section id="harga" class="w-full mt-10 pb-20">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-10 md:mb-14">
                    <livewire:title-section title="Pilih Jalur Sertifikasi Anda"
                        subTitle="Program bertingkat yang
                        disesuaikan dengan kebutuhan dan tujuan karir pendidik" />
                </div>

                {{-- Toggle Switcher --}}
                <div class="flex justify-center mb-10">
                    <div class="p-1.5 rounded-2xl inline-flex"
                        style="background: linear-gradient(145deg, #f3f4f6, #e5e7eb); box-shadow: inset 0 2px 4px rgba(0,0,0,0.06);">
                        <button onclick="showPerLevel()" id="btn-perlevel"`
                            class="tlc-toggle-btn active px-7 py-3 rounded-xl text-sm font-bold tracking-wide transition-all duration-300"
                            style="">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                Per Level
                            </span>
                        </button>
                        <button onclick="showBundle()" id="btn-bundle"
                            class="tlc-toggle-btn px-7 py-3 rounded-xl text-sm font-bold tracking-wide text-gray-600 transition-all duration-300">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                Paket Bundle
                            </span>
                        </button>
                    </div>
                </div>

                <style>
                    .tlc-toggle-btn.active {
                        background: linear-gradient(135deg, #1D4E89 0%, #2563eb 100%);
                        color: white;
                        box-shadow: 0 4px 15px rgba(29, 78, 137, 0.4);
                    }

                    .tlc-toggle-btn:not(.active):hover {
                        background: rgba(255, 255, 255, 0.8);
                    }

                    #section-perlevel,
                    #section-bundle {
                        transition: opacity 0.3s ease;
                    }
                </style>

                {{-- Section: Per Level --}}
                <div id="section-perlevel">

                    {{-- Course Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                        {{-- Card Level A --}}
                        <div onclick="document.getElementById('modalA').classList.remove('hidden')"
                            class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-xl">
                            <img src="{{ asset('images/levela.png') }}" alt="Banner Level A"
                                class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover">
                            <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                            </div>
                        </div>

                        {{-- Card Level B --}}
                        <div onclick="document.getElementById('modalB').classList.remove('hidden')"
                            class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-xl">
                            <img src="{{ asset('images/levelb.png') }}" alt="Banner Level B"
                                class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover">
                            <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                            </div>
                        </div>

                        {{-- Card Level C --}}
                        <div onclick="document.getElementById('modalC').classList.remove('hidden')"
                            class="relative group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-xl">
                            <img src="{{ asset('images/levelc.png') }}" alt="Banner Level C"
                                class="w-full h-48 sm:h-52 md:h-56 lg:h-64 object-cover">
                            <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6 transition-all duration-500">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Section: Bundle --}}
                <div id="section-bundle" class="hidden">
                    <div class="max-w-4xl mx-auto">
                        {{-- Bundle Card --}}
                        <div class="rounded-3xl shadow-2xl p-8 sm:p-10 text-white relative overflow-hidden"
                            style="background: linear-gradient(135deg, #1D4E89 0%, #2563eb 60%, #1D4E89 100%);">

                            {{-- Background decoration --}}
                            <div class="absolute top-0 right-0 w-72 h-72 rounded-full blur-3xl -mr-36 -mt-36"
                                style="background: rgba(255,255,255,0.07);"></div>
                            <div class="absolute bottom-0 left-0 w-52 h-52 rounded-full blur-2xl -ml-24 -mb-24"
                                style="background: rgba(255,255,255,0.05);"></div>

                            {{-- Save badge --}}
                            {{-- <div class="absolute top-5 right-5 bg-white text-[#E76F51] px-4 py-2 rounded-full font-black text-sm shadow-lg"
                                style="animation: float 3s ease-in-out infinite;">
                                HEMAT 20%
                            </div> --}}

                            <div class="relative z-10">
                                <div class="flex flex-col lg:flex-row gap-10">
                                    {{-- Left: Info --}}
                                    <div class="flex-1">
                                        <span
                                            class="inline-flex items-center px-4 py-2 rounded-full text-xs font-medium mb-6"
                                            style="background: rgba(255,255,255,0.15); backdrop-filter: blur(8px);">
                                            🎁 PAKET BUNDLE LENGKAP
                                        </span>

                                        <h2 class="text-2xl sm:text-3xl font-black mb-4 leading-tight">
                                            Complete Teaching<br>Certification
                                        </h2>

                                        <p class="text-white/80 text-base mb-6 max-w-md text-justify">
                                            Dapatkan akses ke semua level sertifikasi (A, B & C) dengan harga spesial.
                                            Solusi terbaik untuk pengembangan karir mengajar Anda secara menyeluruh.
                                        </p>

                                        {{-- Bonus list --}}
                                        <div class="rounded-2xl p-4 mb-2"
                                            style="background: rgba(255,255,255,0.1); backdrop-filter: blur(6px);">
                                            <p class="text-white/60 text-xs font-semibold mb-3">🎉 BONUS EKSKLUSIF</p>
                                            <ul class="space-y-2">
                                                @foreach (['Sertifikat digital resmi (A, B & C)', 'Akses komunitas seumur hidup', 'Prioritas jadwal ujian'] as $bonus)
                                                    <li class="flex items-center gap-2 text-sm">
                                                        <svg class="w-4 h-4 text-yellow-300 flex-shrink-0"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                        </svg>
                                                        {{ $bonus }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- Right: Pricing --}}
                                    <div class="lg:w-72 flex-shrink-0">
                                        <div class="bg-white rounded-3xl p-7 text-gray-900 shadow-2xl">
                                            <div class="text-center mb-6">
                                                <p class="text-gray-400 text-sm line-through mb-1">Rp
                                                    {{ number_format($levelA + $levelB + $levelC, 0, ',', '.') }}</p>
                                                <p class="text-4xl font-black text-[#1D4E89]">Rp
                                                    {{ number_format(($levelA + $levelB + $levelC) * 0.8, 0, ',', '.') }}
                                                </p>
                                                <p class="text-gray-500 text-sm mt-2">Pembayaran satu kali</p>
                                            </div>

                                            <div class="space-y-3 mb-6">
                                                @foreach (['Akses semua level (A, B & C)', 'Bonus eksklusif termasuk', 'Hemat Rp ' . number_format(($levelA + $levelB + $levelC) * 0.2, 0, ',', '.')] as $item)
                                                    <div class="flex items-center gap-3 text-sm text-gray-600">
                                                        <svg class="w-5 h-5 text-green-500 flex-shrink-0"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        {{ $item }}
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a href="{{ route('payments.create.public', ['id' => \Vinkla\Hashids\Facades\Hashids::encode(4)]) }}"
                                                class="block w-full text-center py-4 rounded-xl font-bold text-white text-sm shadow-lg transition-all duration-300 hover:shadow-orange-500/30 hover:scale-[1.02]"
                                                style="background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);">
                                                <span class="flex items-center justify-center gap-2">
                                                    Pilih Paket Bundle
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <p class="text-center text-gray-400 text-xs mt-3">🔒 Pembayaran aman &
                                                terenkripsi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal --}}
                @foreach (['A', 'B', 'C'] as $level)
                    <div id="modal{{ $level }}"
                        class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 hidden p-4"
                        onclick="if(event.target===this) this.classList.add('hidden')">

                        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-xl mx-auto relative overflow-hidden max-h-[92vh] flex flex-col"
                            onclick="event.stopPropagation()">

                            {{-- Close Button --}}
                            <button onclick="document.getElementById('modal{{ $level }}').classList.add('hidden')"
                                class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-gray-700 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            {{-- POPULER ribbon for Level B --}}
                            {{-- @if ($level === 'B')
                        <div class="absolute top-5 right-[-34px] z-10 bg-gradient-to-r from-emerald-500 to-green-600 text-white text-[11px] font-black px-10 py-1.5 rotate-45 shadow-md tracking-widest">
                            POPULER
                        </div>
                    @endif --}}

                            {{-- Scrollable body --}}
                            <div class="overflow-y-auto flex-1 p-7 sm:p-8 lg:p-10">

                                {{-- Level badge --}}
                                <div class="mb-5">
                                    @switch($level)
                                        @case('A')
                                            <span
                                                class="inline-flex items-center px-4 py-1.5 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white text-xs font-bold rounded-full tracking-widest">LEVEL
                                                A</span>
                                        @break

                                        @case('B')
                                            <span
                                                class="inline-flex items-center px-4 py-1.5 bg-gradient-to-r from-[#2A9D8F] to-[#40C9B9] text-white text-xs font-bold rounded-full tracking-widest">LEVEL
                                                B</span>
                                        @break

                                        @case('C')
                                            <span
                                                class="inline-flex items-center px-4 py-1.5 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white text-xs font-bold rounded-full tracking-widest">LEVEL
                                                C</span>
                                        @break
                                    @endswitch
                                </div>

                                {{-- Title --}}
                                <h2 class="text-2xl sm:text-3xl font-black text-gray-900 mb-1 leading-tight">
                                    @switch($level)
                                        @case('A')
                                            Teaching Knowledge
                                        @break

                                        @case('B')
                                            Teaching Activation
                                        @break

                                        @case('C')
                                            Teaching Mastery
                                        @break
                                    @endswitch
                                </h2>

                                <p
                                    class="text-sm font-medium mb-5 @switch($level) @case('A') text-[#1D4E89] @break @case('B') text-[#2A9D8F] @break @case('C') text-[#E76F51] @break @endswitch">
                                    @switch($level)
                                        @case('A')
                                            Fondasi pengetahuan mengajar profesional
                                        @break

                                        @case('B')
                                            Implementasi strategi pengajaran nyata
                                        @break

                                        @case('C')
                                            Penguasaan metodologi tingkat lanjut
                                        @break
                                    @endswitch
                                </p>

                                {{-- Colored divider --}}
                                <div
                                    class="w-12 h-0.5 mb-5 rounded-full @switch($level) @case('A') bg-[#1D4E89] @break @case('B') bg-[#2A9D8F] @break @case('C') bg-[#E76F51] @break @endswitch">
                                </div>

                                {{-- Description --}}
                                <p class="text-sm text-gray-600 text-justify leading-relaxed mb-7">
                                    @switch($level)
                                        @case('A')
                                            Sertifikasi Level A dirancang khusus untuk membangun pengetahuan dasar yang wajib
                                            dimiliki
                                            setiap guru dalam melakukan pengajaran efektif, terstruktur, dan berdiferensiasi.
                                            Program ini
                                            membekali Anda dengan pemahaman mendalam tentang Pedagogical Content Knowledge (PCK) dan
                                            kemampuan mengembangkan Higher Order Thinking Skills (HOTS) sesuai Kurikulum Merdeka.
                                        @break

                                        @case('B')
                                            Sertifikasi Level B menawarkan pendekatan praktik langsung yang bertujuan mengembangkan
                                            kemampuan guru dalam penerapan PCK dan HOTS secara nyata di ruang kelas. Program ini
                                            berfokus
                                            pada pembuatan modul ajar inovatif, perancangan skenario pengajaran yang efektif, serta
                                            teknik
                                            refleksi dan review yang menghasilkan feedback konstruktif untuk perbaikan
                                            berkelanjutan.
                                        @break

                                        @case('C')
                                            Sertifikasi Level C merupakan puncak pencapaian mastery dalam pengajaran di kelas.
                                            Program ini
                                            menuntun Anda untuk merencanakan pembelajaran dalam bentuk lesson plan yang
                                            komprehensif,
                                            menerapkan metode Teaching Method Framework (TMF), dan melakukan dokumentasi serta
                                            evaluasi
                                            pengajaran melalui video recording dengan rubrik penilaian terstruktur.
                                        @break
                                    @endswitch
                                </p>

                                {{-- Feature list --}}
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 mb-7">
                                    @switch($level)
                                        @case('A')
                                            @foreach (['Uji Literasi & Numerasi', 'Pedagogical Content Knowledge', 'Higher Order Thinking Skills', 'Sertifikat Kompetensi Resmi'] as $feat)
                                                <li class="flex items-center gap-3 text-sm text-gray-700">
                                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $feat }}
                                                </li>
                                            @endforeach
                                        @break

                                        @case('B')
                                            @foreach (['Action Learning & Praktik Langsung', 'Merancang Modul Ajar (RPP)', 'Penyusunan Teaching Scenario', 'Refleksi & Feedback Konstruktif'] as $feat)
                                                <li class="flex items-center gap-3 text-sm text-gray-700">
                                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $feat }}
                                                </li>
                                            @endforeach
                                        @break

                                        @case('C')
                                            @foreach (['Teaching Mastery Framework (TMF)', 'Self-Review & Feedback Loop', 'Evaluasi via Video Recording', 'Rubrik Assessment Terstruktur'] as $feat)
                                                <li class="flex items-center gap-3 text-sm text-gray-700">
                                                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $feat }}
                                                </li>
                                            @endforeach
                                        @break
                                    @endswitch
                                </ul>

                                {{-- Thin separator --}}
                                <div class="border-t border-gray-100 mb-6"></div>

                                {{-- Price & CTA — flat, no card --}}
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <div>
                                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-widest mb-1">Biaya
                                            Sertifikasi</p>
                                        <div
                                            class="text-2xl sm:text-3xl font-black
                                    @switch($level)
                                        @case('A') text-[#1D4E89] @break
                                        @case('B') text-[#2A9D8F] @break
                                        @case('C') text-[#E76F51] @break
                                    @endswitch">
                                            @switch($level)
                                                @case('A')
                                                    Rp {{ number_format($levelA, 0, ',', '.') }}
                                                @break

                                                @case('B')
                                                    Rp {{ number_format($levelB, 0, ',', '.') }}
                                                @break

                                                @case('C')
                                                    Rp {{ number_format($levelC, 0, ',', '.') }}
                                                @break
                                            @endswitch
                                        </div>
                                        <p class="text-xs text-gray-400 mt-0.5">Pembayaran sekali</p>
                                    </div>
                                    <a href="{{ route('payments.create.public', ['id' => \Vinkla\Hashids\Facades\Hashids::encode($level === 'A' ? 1 : ($level === 'B' ? 2 : 3))]) }}"
                                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-bold text-white text-sm shadow-md transition-all duration-300 hover:shadow-lg hover:scale-[1.02] whitespace-nowrap
                                @switch($level)
                                    @case('A') bg-gradient-to-r from-[#1D4E89] to-[#2563eb] hover:shadow-blue-500/30 @break
                                    @case('B') bg-gradient-to-r from-[#2A9D8F] to-[#40C9B9] hover:shadow-teal-500/30 @break
                                    @case('C') bg-gradient-to-r from-[#E76F51] to-[#F4A261] hover:shadow-orange-500/30 @break
                                @endswitch">
                                        Daftar Sekarang
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                <script>
                    function showPerLevel() {
                        document.getElementById('section-perlevel').classList.remove('hidden');
                        document.getElementById('section-bundle').classList.add('hidden');
                        document.getElementById('btn-perlevel').classList.add('active');
                        document.getElementById('btn-perlevel').classList.remove('text-gray-600');
                        document.getElementById('btn-bundle').classList.remove('active');
                        document.getElementById('btn-bundle').classList.add('text-gray-600');
                    }

                    function showBundle() {
                        document.getElementById('section-bundle').classList.remove('hidden');
                        document.getElementById('section-perlevel').classList.add('hidden');
                        document.getElementById('btn-bundle').classList.add('active');
                        document.getElementById('btn-bundle').classList.remove('text-gray-600');
                        document.getElementById('btn-perlevel').classList.remove('active');
                        document.getElementById('btn-perlevel').classList.add('text-gray-600');
                    }
                </script>
        </section>

        <x-faq-section />
        <x-hafecs-section />
    </div>
@endsection