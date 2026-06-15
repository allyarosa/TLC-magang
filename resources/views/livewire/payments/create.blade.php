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

        /* body {
            font-family: 'Inter', system-ui, sans-serif;
        } */

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

    <div class="container mx-auto px-4 py-8 max-w-6xl mt-16 md:ml-72">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">

                <div class="bg-white rounded-3xl p-8 shadow-lg hover-lift">
                    {{-- MODE PEMBELIAN --}}
                    <section>
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
                        </div>
                    </section>

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
                                            <div class="flex-1">
                                                <h3 class="text-xl font-bold mb-1">Paket Level A Bundling</h3>
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
                                                        {{ number_format(collect($categories)->sum(fn($c) => $c['price'] ?? $categoryPrice), 0, ',', '.') }}</span>
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
                                    @foreach ($categories as $index => $cat)
                                        <div wire:click="toggleCategory('{{ $cat['id'] }}')"
                                            class="relative bg-white rounded-2xl border-2 p-6 cursor-pointer transition-all duration-300 group shadow-md
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
                                            {{-- <div class="w-12 h-12 mb-4 rounded-xl flex items-center justify-center shadow-lg"
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
                                            </div> --}}
                                            <!-- Content -->
                                            <h4 class="text-lg font-bold text-gray-700">{{ $cat['name'] }}</h4>
                                            <p class="text-sm text-gray-500 mb-4 leading-relaxed">{{ $cat['desc'] }}
                                            </p>
                                            <!-- Tags -->
                                            {{-- <div class="flex flex-wrap gap-2 mb-4">
                                                @foreach ($cat['tags'] as $tag)
                                                    <span
                                                        class="text-xs bg-{{ $cat['color'] }}-100 text-{{ $cat['color'] }}-700 px-2.5 py-1 rounded-full font-medium">{{ $tag }}</span>
                                                @endforeach
                                            </div> --}}
                                            <!-- Price -->
                                            <div class="flex items-baseline gap-1">
                                                <span class="text-lg font-medium text-brandBlue-dark">Rp
                                                    {{ number_format($cat['price'] ?? $categoryPrice, 0, ',', '.') }}</span>
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
                            </div>
                        @endif
                    </div>

                    <!-- Course Overview -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Tentang Program</h3>
                        <p class="text-gray-600 leading-relaxed text-md text-justify">
                            Sertifikasi Level A bertujuan menguji pemahaman dasar guru melalui ujian teori terkait
                            pengajaran yang efektif,
                            terstruktur, dan berdiferensiasi, serta penerapan penilaian berbasis Teaching Mastery
                            Framework
                            serta Literasi Numerasi.
                            Level ini merupakan tahap awal dalam program Teaching & Learning Certification (TLC) HAFECS.
                        </p>
                    </div>

                    <!-- Features Section -->
                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <h3 class="text-lg font-medium text-gray-700 mb-6">Benefit Yang Akan Anda Dapatkan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center space-x-3">
                                    <i class="fa-solid fa-circle-check text-brandBlue"></i>
                                <span class="text-gray-700 text-md">Sertifikat Kompetensi ber-NPSN</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-circle-check text-brandBlue"></i>
                                <span class="text-gray-700 text-md">Mendapatkan Gelar Non-Formal</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-circle-check text-brandBlue"></i>
                                <span class="text-gray-700 text-md">Rapor Hasil Ujian</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-circle-check text-brandBlue"></i>
                                <span class="text-gray-700">Worksheet</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-circle-check text-brandBlue"></i>
                                <span class="text-gray-700">Modul Pembelajaran Digital</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-circle-check text-brandBlue"></i>
                                <span class="text-gray-700">Akses ke Webinar dan Diskusi Eksklusif HAFECS</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-circle-check text-brandBlue"></i>
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
                                        <span class="text-gray-600">Paket Level A Bundling</span>
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
                                                    {{ number_format($this->categoriesById[$catId]['price'] ?? $categoryPrice, 0, ',', '.') }}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- PROMO CODE / VOUCHER -->
                        <div class="mb-6">
                            <label class="block text-gray-600 text-sm font-medium mb-2">Kode Voucher / Promo</label>
                            <div class="flex space-x-2">
                                <input type="text" wire:model="voucherCode" placeholder="Masukkan kode voucher"
                                    class="flex-1 px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm"
                                    @if($voucherSuccess) disabled @endif>
                                
                                @if($voucherSuccess)
                                    <button type="button" wire:click="removeVoucher"
                                        class="px-4 py-2 bg-red-500 text-white rounded-xl hover:bg-red-600 text-sm font-medium transition-colors">
                                        Hapus
                                    </button>
                                @else
                                    <button type="button" wire:click="applyVoucher"
                                        class="px-4 py-2 bg-teal-600 text-white rounded-xl hover:bg-teal-700 text-sm font-medium transition-colors">
                                        Terapkan
                                    </button>
                                @endif
                            </div>
                            @if($voucherError)
                                <p class="text-red-500 text-xs mt-2">{{ $voucherError }}</p>
                            @endif
                            @if($voucherSuccess)
                                <p class="text-green-600 text-xs mt-2">{{ $voucherSuccess }}</p>
                            @endif
                        </div>

                        <!-- Price Summary -->
                        <div class="space-y-3 mb-6 border-t border-gray-100 pt-6">
                            @if ($mode === 'bundle')
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Harga Normal ({{ count($categories) }}
                                        kategori)</span>
                                    <span class="text-gray-400 line-through">Rp
                                        {{ number_format(collect($categories)->sum(fn($c) => $c['price'] ?? $categoryPrice), 0, ',', '.') }}</span>
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

                            @if($this->discountAmount > 0)
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Diskon Voucher</span>
                                    <span class="text-green-600 font-medium">- Rp
                                        {{ number_format($this->discountAmount, 0, ',', '.') }}</span>
                                </div>
                            @endif

                            <hr class="border-gray-200">
                            <div class="flex justify-between text-lg font-bold">
                                <span class="text-gray-700">Total Pembayaran</span>
                                <span class="gradient-text">Rp
                                    {{ number_format($this->finalPrice, 0, ',', '.') }}</span>
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
                            <input type="hidden" name="voucher_code" value="{{ $voucherCode }}">

                            @if ($paymentMode === 'manual')
                                {{-- ===== MANUAL BANK TRANSFER UI ===== --}}
                                @auth
                                    @if ($hasPendingManualPayment)
                                        <div class="mb-4 bg-gray-100 border border-gray-100 rounded-xl p-6 text-center">
                                            <svg class="w-12 h-12 text-gray-700 mx-auto mb-3" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h4 class="font-bold text-gray-600 mb-2">Menunggu Konfirmasi</h4>
                                            <p class="text-sm text-gray-700 mb-4">Anda sudah mengirimkan bukti pembayaran
                                                untuk level ini. Mohon tunggu admin memverifikasi pembayaran Anda.</p>
                                            <a href="{{ route('payments.detail', \Vinkla\Hashids\Facades\Hashids::encode($pendingPaymentId)) }}"
                                                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium text-sm px-5 py-2.5 rounded-lg transition-colors">
                                                Lihat Detail Pembayaran
                                            </a>
                                        </div>
                                    @else
                                        <div class="mb-4 border-2 bg-blue-50 border-gray-200 rounded-xl p-4">
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
                                                <p class="text-sm text-blue-600 mt-3 border-t border-blue-200 pt-2">
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
                                                <p id="proof-label" class="text-sm text-gray-500">Klik untuk upload foto
                                                    bukti
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
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
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
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            Kirim Bukti Transfer
                                        </button>
                                    @endif
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
                                            {{ number_format(collect($categories)->sum(fn($c) => $c['price'] ?? $categoryPrice), 0, ',', '.') }}</span>
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
    <!-- Expandable Content Toggle - Livewire Powered -->
</section>