<section>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .gradient-text {
            background: linear-gradient(135deg, #0f766e, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.1);
        }

        .smooth-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.9) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(20, 184, 166, 0.1);
        }

        .category-card:hover {
            border-color: rgba(20, 184, 166, 0.3);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 253, 252, 0.95) 100%);
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        /* Arrow rotation animation */
        .arrow-rotate {
            transform: rotate(180deg);
        }

        /* Expandable content animation */
        .expanding {
            max-height: 1000px !important;
            padding-top: 2rem;
        }
    </style>

    <div class="container mx-auto px-4 py-8 max-w-7xl mt-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Hero Banner -->
                {{-- <div
                    class="relative overflow-hidden bg-gradient-to-br from-teal-600 via-teal-700 to-cyan-800 rounded-3xl p-8 text-white">
                    <div class="absolute inset-0 bg-black opacity-5"></div>
                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row items-center">
                            <div class="flex-1 mb-6 md:mb-0 md:pr-8">
                                <div
                                    class="inline-flex items-center bg-white bg-opacity-20 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                                    <svg class="w-4 h-4 mr-2 text-yellow-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" stroke-width="2">
                                        <circle cx="12" cy="8" r="7"></circle>
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                    </svg>  
                                    <span class="text-sm font-semibold">Teaching Knowledge Certification</span>
                                </div>
                                <h1 class="text-2xl md:text-3xl font-bold mb-4 leading-tight">
                                    Level A Teaching Knowledge Certification
                                </h1>
                                <p class="text-lg opacity-90 mb-6">Menguji Pemahaman Dasar Pengajaran yang Efektif dan
                                    Berdiferensiasi</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div
                                    class="w-32 h-32 md:w-40 md:h-40 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <img src="{{ asset('images/logoTlcPng.png') }}"
                                        alt="Teaching And Learning Certification Logo"
                                        title="Teaching And Learning Certification Logo" loading="lazy"
                                        class="w-24 h-24 md:w-32 md:h-32 rounded-xl object-cover opacity-90">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="bg-white rounded-3xl p-8 shadow-lg hover-lift">
                    {{-- MODE PEMBELIAN --}}

                    {{-- PRODUCT CARDS SECTION - LIVEWIRE POWERED --}}
                    <div>
                        {{-- PAKET LENGKAP (BUNDLE) --}}
                        @if ($mode === 'bundle')
                            <div class="mb-8">
                                <div
                                    class="relative bg-gradient-to-br from-teal-500 via-teal-600 to-cyan-600 rounded-2xl p-6 text-white overflow-hidden">
                                    {{-- Decorative Elements --}}
                                    <div
                                        class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                                    </div>
                                    <div
                                        class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2">
                                    </div>

                                    {{-- Badge --}}
                                    <div class="absolute top-4 right-4">
                                        <span
                                            class="bg-amber-400 text-amber-900 text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                            HEMAT 23%
                                        </span>
                                    </div>

                                    <div class="relative z-10">
                                        <div class="flex items-start gap-4 mb-4">
                                            {{-- <div
                                                class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                </svg>
                                            </div> --}}
                                            <div class="flex-1">
                                                <h3 class="text-xl font-bold mb-1">Paket Level A Lengkap</h3>
                                                <p class="text-white/80 text-sm">Akses penuh ke semua kategori ujian
                                                    Level A</p>
                                            </div>
                                        </div>

                                        {{-- Included Items --}}
                                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 mb-4">
                                            <p class="text-xs text-white uppercase tracking-wide mb-3 font-semibold">
                                                Termasuk dalam paket:
                                            </p>
                                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                                @foreach ($categories as $cat)
                                                    <div class="flex items-center gap-2">
                                                        <svg class="w-5 h-5 text-teal-200" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="text-sm font-medium">{{ $cat['name'] }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- Price --}}
                                        <div class="flex items-end justify-between">
                                            <div>
                                                <div class="flex items-center gap-2 mb-1">
                                                    <span class="text-white/60 line-through text-sm">Rp
                                                        {{ number_format(count($categories) * $categoryPrice, 0, ',', '.') }}</span>
                                                    <span
                                                        class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">-Rp
                                                        {{ number_format($this->savings, 0, ',', '.') }}</span>
                                                </div>
                                                <div class="flex items-baseline gap-1">
                                                    <span class="text-3xl font-extrabold">Rp
                                                        {{ number_format($bundlePrice, 0, ',', '.') }}</span>
                                                    <span class="text-white/70 text-sm">/paket</span>
                                                </div>
                                            </div>
                                            <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-2">
                                                <p class="text-xs text-white/80">{{ count($categories) }} Kategori</p>
                                                <p class="text-sm font-bold">Semua Akses</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- PAKET SATUAN (CUSTOM) --}}
                        @if ($mode === 'custom')
                            <div class="mb-8 space-y-4">
                                {{-- Promo Banner --}}
                                @if (count($selectedCategories) === 2)
                                    <div
                                        class="flex items-center justify-between bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 rounded-xl p-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-amber-600" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-amber-800">
                                                    <span class="font-bold">Hemat lebih banyak!</span> Tambah 2 kategori
                                                    lagi untuk dapat Paket Level A seharga Rp 150.000
                                                </p>
                                                <p class="text-xs text-amber-600">(hemat Rp
                                                    {{ number_format($this->savings, 0, ',', '.') }})!</p>
                                            </div>
                                        </div>
                                        <button wire:click="switchMode('bundle')"
                                            class="flex-shrink-0 bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                                            Upgrade Paket
                                        </button>
                                    </div>
                                @endif

                                {{-- Category Cards Grid --}}
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">
                                    @foreach ($categories as $cat)
                                        <div wire:click="toggleCategory('{{ $cat['id'] }}')"
                                            class="relative bg-white rounded-2xl border-2 p-6 cursor-pointer transition-all duration-300 group shadow-lg hover:scale-105 hover:shadow-2xl
                                                {{ in_array($cat['id'], $selectedCategories) ? 'ring-2 border-' . $cat['color'] . '-500 bg-' . $cat['color'] . '-50/50' : 'border-gray-200 hover:border-' . $cat['color'] . '-300 hover:bg-gray-50' }}">
                                            <!-- Checkbox -->
                                            <div class="absolute top-4 right-4">
                                                <div
                                                    class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-colors
                                                        {{ in_array($cat['id'], $selectedCategories) ? 'bg-' . $cat['color'] . '-500 border-' . $cat['color'] . '-500' : 'border-gray-300 group-hover:border-' . $cat['color'] . '-400' }}">
                                                    @if (in_array($cat['id'], $selectedCategories))
                                                        <svg class="w-4 h-4 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Icon -->
                                            <div class="w-12 h-12 mb-4 rounded-xl flex items-center justify-center shadow-lg"
                                                style="background: linear-gradient(135deg, var(--tw-gradient-stops, #fff, #f0f0f0)); {{ $cat['color'] === 'teal' ? 'background: linear-gradient(135deg, #38b2ac 0%, #0f766e 100%);' : ($cat['color'] === 'emerald' ? 'background: linear-gradient(135deg, #34d399 0%, #059669 100%);' : ($cat['color'] === 'purple' ? 'background: linear-gradient(135deg, #a78bfa 0%, #7c3aed 100%);' : ($cat['color'] === 'yellow' ? 'background: linear-gradient(135deg, #fde68a 0%, #f59e42 100%);' : ''))) }}">
                                                @if ($cat['id'] === 'literasi')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                @elseif($cat['id'] === 'numerasi')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 9V7a5 5 0 00-10 0v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2z" />
                                                    </svg>
                                                @elseif($cat['id'] === 'pck')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                                    </svg>
                                                @elseif($cat['id'] === 'hots')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <!-- Content -->
                                            <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $cat['name'] }}</h4>
                                            <p class="text-sm text-gray-500 mb-4 leading-relaxed">{{ $cat['desc'] }}
                                            </p>
                                            <!-- Tags -->
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                @foreach ($cat['tags'] as $tag)
                                                    <span
                                                        class="text-xs bg-{{ $cat['color'] }}-100 text-{{ $cat['color'] }}-700 px-2.5 py-1 rounded-full font-medium">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                            <!-- Price -->
                                            <div class="flex items-baseline gap-1">
                                                <span class="text-2xl font-extrabold text-{{ $cat['color'] }}-600">Rp
                                                    {{ number_format($categoryPrice, 0, ',', '.') }}</span>
                                                <span class="text-sm text-gray-400">/kategori</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Action Buttons --}}
                                <div class="flex items-center justify-between pt-2">

                                    @if (count($selectedCategories) > 0)
                                        <button wire:click="selectAllCategories"
                                            class="flex items-center gap-2 text-sm text-teal-600 hover:text-teal-700 font-medium transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Pilih semua kategori
                                        </button>
                                        <button wire:click="resetSelection"
                                            class="text-sm text-gray-500 hover:text-gray-700 font-medium transition-colors">
                                            Reset pilihan
                                        </button>
                                    @endif
                                </div>

                                {{-- Savings Card --}}
                                {{-- @if (count($selectedCategories) > 0)
                                    <div class="bg-gradient-to-r from-teal-50 to-cyan-50 border border-teal-200 rounded-xl p-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm font-semibold text-teal-800 flex items-center gap-2">
                                                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                    Lebih hemat dengan paket?
                                                </p>
                                                <p class="text-xs text-teal-600 mt-1">
                                                    Paket Level A ({{ count($categories) }} kategori) = <span class="font-bold">Rp {{ number_format($bundlePrice, 0, ',', '.') }}</span> 
                                                    vs beli satuan {{ count($selectedCategories) }} kategori = <span class="font-bold">Rp {{ number_format($this->totalPrice, 0, ',', '.') }}</span>
                                                </p>
                                            </div>
                                            <button wire:click="switchMode('bundle')" class="flex-shrink-0 bg-white border border-teal-200 hover:bg-teal-50 text-teal-700 text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                                                Lihat Paket Lengkap
                                            </button>
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                        @endif
                    </div>
                    {{-- <section>
                        <div class="flex items-center gap-3 mb-4">
                            <div>
                                <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wide">Mode Pembelian</h2>
                                <p class="text-xs text-gray-400">Pilih paket lengkap atau kategori satuan</p>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="inline-flex bg-white border border-gray-200 rounded-xl p-1 shadow-sm gap-1">
                                <button id="mode-bundle" wire:click="switchMode('bundle')"
                                    class="mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ $mode === 'bundle' ? 'bg-teal-600 text-white' : 'text-gray-500 hover:text-gray-700' }}">
                                    Paket Lengkap
                                </button>
                                <button id="mode-custom" wire:click="switchMode('custom')"
                                    class="mode-btn px-5 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 {{ $mode === 'custom' ? 'bg-teal-600 text-white' : 'text-gray-500 hover:text-gray-700' }}">
                                    Pilih Satuan
                                </button>
                            </div>

                            <div>
                                @if ($mode === 'custom')
                                    <p
                                        class="text-xs text-blue-700 bg-blue-100 rounded-lg p-2 mt-4 border border-blue-200">
                                        Pilih satu atau lebih kategori ujian sesuai kebutuhan Anda
                                    </p>
                                @endif
                            </div>
                        </div>
                    </section> --}}


                    <!-- Course Overview -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Tentang Program</h3>
                        <p class="text-gray-600 leading-relaxed text-lg text-justify">
                            Sertifikasi Level A bertujuan menguji pemahaman dasar guru melalui ujian teori terkait
                            pengajaran yang efektif,
                            terstruktur, dan berdiferensiasi, serta penerapan penilaian berbasis Teaching Mastery
                            Framework
                            serta Literasi Numerasi.
                            Level ini merupakan tahap awal dalam program Teaching & Learning Certification (TLC) HAFECS.
                        </p>
                    </div>

                    <!-- Requirements Section -->
                    {{-- <div class="mb-8 bg-amber-50 rounded-2xl p-6 border-l-4 border-amber-400">
                        <h3 class="text-lg font-semibold text-amber-800 mb-3">Syarat Pendaftaran</h3>
                        <p class="text-amber-700">
                            Melengkapi data yang ada di profile secara lengkap
                        </p>
                    </div> --}}

                    <!-- Expandable Content -->
                    <div class="border-t border-gray-100 pt-8">
                        <button wire:click="toggleExpand"
                            class="flex items-center justify-between w-full text-left group">
                            <span
                                class="text-lg font-semibold text-gray-800 group-hover:text-teal-600 smooth-transition">
                                Detail Program & Modul
                            </span>
                            <svg class="w-5 h-5 text-teal-600 smooth-transition group-hover:text-teal-700 {{ $expandDetail ? 'arrow-rotate' : '' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div class="overflow-hidden smooth-transition @if ($expandDetail) expanding @endif"
                            style="max-height: {{ $expandDetail ? '1000px' : '0' }};">
                            @if ($expandDetail)
                                <div class="pt-8 space-y-8">
                                    <p class="text-gray-600 text-center text-lg">
                                        Program Level A terdiri dari 3 modul komprehensif yang mencakup:
                                    </p>

                                    <!-- Modules Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <!-- Module 1 -->
                                        <div class="category-card rounded-2xl p-6 smooth-transition hover-lift">
                                            <div class="flex items-center mb-4">
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-4">
                                                    1
                                                </div>
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-800">LMS Elevate</h4>
                                                    <p class="text-sm text-gray-500">Penugasan Online</p>
                                                </div>
                                            </div>
                                            <p class="text-gray-600 leading-relaxed">
                                                Mengikuti penugasan di Learning Management System Elevate untuk
                                                mendalami
                                                konsep
                                                Teaching Mastery Framework.
                                            </p>
                                        </div>

                                        <!-- Module 2 -->
                                        <div class="category-card rounded-2xl p-6 smooth-transition hover-lift">
                                            <div class="flex items-center mb-4">
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-4">
                                                    2
                                                </div>
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-800">Training</h4>
                                                    <p class="text-sm text-gray-500">12 Kali Pertemuan</p>
                                                </div>
                                            </div>
                                            <p class="text-gray-600 leading-relaxed">
                                                Sesi pelatihan intensif dengan 12 kali pertemuan untuk mengasah
                                                kemampuan
                                                praktis dalam mengajar.
                                            </p>
                                        </div>

                                        <!-- Module 3 -->
                                        <div class="category-card rounded-2xl p-6 smooth-transition hover-lift">
                                            <div class="flex items-center mb-4">
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-4">
                                                    3
                                                </div>
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-800">Uji Sertifikasi
                                                    </h4>
                                                    <p class="text-sm text-gray-500">Level A Assessment</p>
                                                </div>
                                            </div>
                                            <p class="text-gray-600 leading-relaxed">
                                                Mengikuti uji sertifikasi level A dengan ujian teori berbasis Teaching
                                                Mastery
                                                Framework dan Literasi Numerasi.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Assessment Details -->
                                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-6">
                                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Fokus Ujian Teori</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                        <path fill-rule="evenodd"
                                                            d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h2a1 1 0 100-2H7z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <span class="text-gray-700 font-medium">Teaching Mastery
                                                    Framework</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-4 h-4 text-green-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <span class="text-gray-700 font-medium">Literasi Numerasi</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <span class="text-gray-700 font-medium">Pengajaran
                                                    Berdiferensiasi</span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-4 h-4 text-teal-600" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <span class="text-gray-700 font-medium">Penilaian Efektif</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Conclusion -->
                                    <div
                                        class="bg-gradient-to-r from-teal-50 to-cyan-50 rounded-2xl p-6 border-l-4 border-teal-500">
                                        <p class="text-teal-800 font-medium leading-relaxed">
                                            Level A menjadi fondasi penting dalam program Teaching & Learning
                                            Certification,
                                            menggambarkan kesiapan peserta dalam memahami dan menerapkan prinsip dasar
                                            pedagogi
                                            yang kuat sebelum melanjutkan ke level berikutnya.
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Features Section -->
                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Benefit Yang Akan Anda Dapatkan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Sertifikat Kompetensi ber-NPSN</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Mendapatkan Gelar Non-Formal</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Rapor Hasil Ujian</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Worksheet</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Modul Pembelajaran Digital</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Akses ke Webinar dan Diskusi Eksklusif HAFECS</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                                    </svg>
                                </div>
                                <span class="text-gray-700">Koneksi dengan Jaringan Guru Profesional</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Checkout (LIVEWIRE REACTIVE) -->
            <div class="lg:col-span-1">
                <div class="sticky top-4 space-y-4">
                    <div class="glass-effect rounded-3xl p-6 shadow-md border border-white/20">
                        <!-- Product Summary -->
                        <div class="mb-6">
                            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-4">
                                Ringkasan Pembelian
                            </h3>

                            @if ($mode === 'bundle')
                                {{-- Bundle Mode Summary --}}
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-600">Paket Level A Lengkap</span>
                                        <span class="font-medium text-gray-800">1x</span>
                                    </div>
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach ($categories as $cat)
                                            <span
                                                class="text-xs bg-teal-100 text-teal-700 px-2 py-0.5 rounded-full">{{ $cat['name'] }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                {{-- Custom Mode Summary --}}
                                <div class="space-y-2">
                                    @if (count($selectedCategories) === 0)
                                        <p class="text-gray-400 italic text-sm">Pilih kategori untuk melihat ringkasan
                                        </p>
                                    @else
                                        @foreach ($selectedCategories as $catId)
                                            <div class="flex justify-between items-center text-sm">
                                                <span class="text-gray-600">
                                                    {{ $this->categoriesById[$catId]['name'] ?? $catId }}
                                                </span>
                                                <span class="font-medium text-gray-800">Rp
                                                    {{ number_format($categoryPrice, 0, ',', '.') }}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Price Summary -->
                        <div class="space-y-3 mb-6 border-t border-gray-100 pt-6">
                            @if ($mode === 'bundle')
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Harga Normal ({{ count($categories) }}
                                        kategori)</span>
                                    <span class="text-gray-400 line-through">Rp
                                        {{ number_format(count($categories) * $categoryPrice, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Diskon Paket</span>
                                    <span class="text-green-600 font-medium">- Rp
                                        {{ number_format($this->savings, 0, ',', '.') }}</span>
                                </div>
                            @else
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Subtotal ({{ count($selectedCategories) }}
                                        kategori)</span>
                                    <span class="font-medium">Rp
                                        {{ number_format($this->totalPrice, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <hr class="border-gray-200">
                            <div class="flex justify-between text-lg font-bold">
                                <span class="text-gray-700">Total</span>
                                <span class="gradient-text">Rp
                                    {{ number_format($this->totalPrice, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        {{-- ============================================ --}}
                        {{-- FORM PEMBAYARAN — KONDISIONAL --}}
                        {{-- ============================================ --}}
                        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data"
                            id="payment-form">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $this->totalPrice }}">
                            <input type="hidden" name="level_name" value="Level A">
                            <input type="hidden" name="level_id" value="1">
                            <input type="hidden" name="mode" value="{{ $mode }}">
                            <input type="hidden" name="selected_categories"
                                value="{{ implode(',', $selectedCategories) }}">

                            @if ($paymentMode === 'manual')
                                {{-- ===== MANUAL BANK TRANSFER UI ===== --}}
                                @auth
                                    @if ($hasPendingManualPayment)
                                        <div class="mb-4 bg-yellow-50 border border-yellow-200 rounded-xl p-6 text-center">
                                            <svg class="w-12 h-12 text-yellow-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h4 class="font-bold text-yellow-800 mb-2">Menunggu Konfirmasi</h4>
                                            <p class="text-sm text-yellow-700 mb-4">Anda sudah mengirimkan bukti pembayaran untuk level ini. Mohon tunggu admin memverifikasi pembayaran Anda.</p>
                                            <a href="{{ route('payments.detail', \Vinkla\Hashids\Facades\Hashids::encode($pendingPaymentId)) }}" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-medium text-sm px-5 py-2.5 rounded-lg transition-colors">
                                                Lihat Detail Pembayaran
                                            </a>
                                        </div>
                                    @else
                                        <div class="mb-4 bg-blue-50 border border-blue-200 rounded-xl p-4">
                                        <div class="flex items-center gap-2 mb-3">
                                            <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                            <span class="text-sm font-bold text-blue-800">Transfer Bank Manual</span>
                                        </div>
                                        <div class="space-y-1.5 text-sm">
                                            <div class="flex justify-between">
                                                <span class="text-blue-600">Bank</span>
                                                <span
                                                    class="font-bold text-blue-900">{{ $siteInfo->bank_name ?? '-' }}</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-blue-600">No. Rekening</span>
                                                <span
                                                    class="font-bold text-blue-900 tracking-widest">{{ $siteInfo->bank_account_number ?? '-' }}</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-blue-600">Atas Nama</span>
                                                <span
                                                    class="font-bold text-blue-900">{{ $siteInfo->bank_account_name ?? '-' }}</span>
                                            </div>
                                            <div
                                                class="flex justify-between items-center border-t border-blue-200 pt-2 mt-2">
                                                <span class="text-blue-600 font-semibold">Jumlah Transfer</span>
                                                <span class="font-extrabold text-blue-900 text-base">Rp
                                                    {{ number_format($this->totalPrice, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        @if ($siteInfo->payment_instructions)
                                            <p class="text-xs text-blue-600 mt-3 border-t border-blue-200 pt-2">
                                                {{ $siteInfo->payment_instructions }}
                                            </p>
                                        @endif
                                    </div>

                                    {{-- Upload Bukti Transfer --}}
                                    <div class="mb-4">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            Upload Bukti Transfer <span class="text-red-500">*</span>
                                        </label>
                                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-teal-400 transition-colors cursor-pointer"
                                            onclick="document.getElementById('transfer_proof_input').click()">
                                            <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p id="proof-label" class="text-sm text-gray-500">Klik untuk upload foto bukti
                                                transfer</p>
                                            <p class="text-xs text-gray-400 mt-1">JPG, JPEG, PNG. Maks 3MB</p>
                                        </div>
                                        <input id="transfer_proof_input" name="transfer_proof" type="file"
                                            accept=".jpg,.jpeg,.png" class="hidden" required
                                            onchange="document.getElementById('proof-label').textContent = this.files[0]?.name ?? 'Klik untuk upload'">
                                        @error('transfer_proof')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    @if ($siteInfo->require_ig_follow_proof)
                                        {{-- Upload Bukti Follow IG --}}
                                        <div class="mb-4">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                                Upload Bukti Follow Instagram <span
                                                    class="font-medium text-teal-600">@tlc.certificationbyhafecs</span>
                                                <span class="text-red-500">*</span>
                                            </label>
                                            <div class="border border-gray-300 rounded-xl p-3 text-center cursor-pointer bg-gray-50"
                                                onclick="document.getElementById('ig_follow_proof_input').click()">
                                                <svg class="w-6 h-6 text-gray-400 mx-auto mb-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p id="ig-proof-label" class="text-sm text-gray-600">Klik untuk upload
                                                    bukti follow</p>
                                                <p class="text-xs text-gray-400">JPG, JPEG, PNG. Maks 3MB</p>
                                            </div>
                                            <input id="ig_follow_proof_input" name="ig_follow_proof" type="file"
                                                accept=".jpg,.jpeg,.png" class="hidden" required
                                                onchange="document.getElementById('ig-proof-label').textContent = this.files[0]?.name ?? 'Klik untuk upload bukti follow'">
                                            @error('ig_follow_proof')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endif

                                    <button type="submit" @if ($mode === 'custom' && count($selectedCategories) === 0) disabled @endif
                                        class="w-full bg-gradient-to-r from-teal-600 to-cyan-600 text-white py-4 rounded-xl font-semibold text-lg hover:from-teal-700 hover:to-cyan-700 smooth-transition shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        Kirim Bukti Transfer
                                    </button>
                                    @endif
                                @else
                                    {{-- <div class="mb-4 bg-orange-50 border border-orange-200 rounded-xl p-4">
                                        <p class="text-sm text-orange-700 flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Anda akan diminta mengupload foto bukti transfer setelah membuat akun.
                                        </p>
                                    </div> --}}

                                    <button type="button" wire:click="continueToRegister"
                                        @if ($mode === 'custom' && count($selectedCategories) === 0) disabled @endif
                                        class="w-full bg-gradient-to-r from-teal-600 to-cyan-600 text-white py-4 rounded-xl font-semibold text-lg hover:from-teal-700 hover:to-cyan-700 smooth-transition shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                        Lanjut Daftar & Bayar
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </button>
                                @endauth
                            @else
                                {{-- ===== MIDTRANS FLOW ===== --}}
                                @auth
                                    <button type="submit" @if ($mode === 'custom' && count($selectedCategories) === 0) disabled @endif
                                        class="w-full bg-gradient-to-r from-teal-600 to-cyan-600 text-white py-4 rounded-xl font-semibold text-lg hover:from-teal-700 hover:to-cyan-700 smooth-transition shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        Lanjutkan Pembayaran
                                    </button>
                                @else
                                    <button type="button" wire:click="continueToRegister"
                                        @if ($mode === 'custom' && count($selectedCategories) === 0) disabled @endif
                                        class="w-full bg-gradient-to-r from-teal-600 to-cyan-600 text-white py-4 rounded-xl font-semibold text-lg hover:from-teal-700 hover:to-cyan-700 smooth-transition shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                        Lanjut Daftar & Bayar
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </button>
                                @endauth
                            @endif
                        </form>

                        {{-- Security Info --}}
                        <div class="mt-6 flex items-center justify-center space-x-4 text-xs text-gray-500">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Pembayaran Aman</span>
                            </div>
                            {{-- <div class="flex items-center">
                                <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Garansi 30 Hari</span>
                            </div> --}}
                        </div>
                    </div>

                    {{-- Savings Promo Card (For Custom Mode) --}}
                    @if ($mode === 'custom' && count($selectedCategories) > 0 && count($selectedCategories) < 4)
                        <div class="bg-gradient-to-br from-teal-600 to-cyan-700 rounded-2xl p-5 text-white shadow-lg">
                            <div class="flex items-start gap-3 mb-3">
                                <div
                                    class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm">Lebih hemat dengan paket?</h4>
                                    <p class="text-xs text-white/80 mt-1">Paket Level A ({{ count($categories) }}
                                        kategori) = <span class="font-bold">Rp
                                            {{ number_format($bundlePrice, 0, ',', '.') }}</span></p>
                                    <p class="text-xs text-white/80">vs beli satuan {{ count($categories) }} kategori
                                        = <span class="line-through">Rp
                                            {{ number_format(count($categories) * $categoryPrice, 0, ',', '.') }}</span>
                                    </p>
                                </div>
                            </div>
                            <button wire:click="switchMode('bundle')"
                                class="w-full bg-white text-teal-700 font-semibold py-2.5 px-4 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                                Lihat Paket Lengkap
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- @if (session('userProfileNull'))
        @livewire('payments.user-profile-form')
    @endif --}}

    <!-- Expandable Content Toggle - Livewire Powered -->
</section>
