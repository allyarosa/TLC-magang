<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($categoriesA as $index)
            @php
                $categoryId = $index['id'];
                $categoryName = strtoupper($index['name']);
                $hasAccessCategory = $index['is_locked'] == 0;
                $hasAccess = Auth::user()->hasPermissionTo('access_level_A');
            @endphp

            <div class="relative">
                {{-- Kartu kategori --}}
                <div
                    class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:shadow-xl group">
                    {{-- Gambar banner --}}
                    <div class="relative">
                        <img src="{{ asset('/storage/' . $index['banner_img']) }}" alt="{{ $index['name'] }}"
                            class="w-full h-48 scale-150 object-cover group-hover:opacity-90 transition">
                        <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-blue-200 to-transparent">
                        </div>
                    </div>

                    {{-- Isi konten --}}
                    <div class="p-6 relative bg-white/70 backdrop-blur-md border border-white/20">
                        <div class="absolute -top-10 left-6 bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: {{ $index['name'] }}</h3>

                        {{-- Rating & soal --}}
                        <div class="flex items-center text-yellow-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                <path d="M8,12H16V14H8V12M8,16H13V18H8V16Z" />
                            </svg>
                            <span class="ml-2 text-sm text-gray-600">{{ $index['question_count'] }} Soal</span>
                        </div>

                        {{-- Tombol Mulai --}}
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                {{ $index['time_limit'] }} Menit
                            </div>
                            @if (Auth::user()->hasPermissionTo($index['name'] . '_LOCK'))
                                {{-- Prioritas: kalau sudah HOTS, anggap udah selesai --}}
                                <button disabled
                                    class="px-5 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl text-sm font-medium shadow-md flex items-center cursor-default">
                                    Selesai
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                            @elseif (Auth::user()->hasAnyPermission('DONE_'.$index['name'].'_TASK') && $hasAccessCategory)
                                {{-- Kalau belum selesai tapi sudah dapat akses --}}
                                <button wire:click="openModal({{ $categoryId }})"
                                    class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-100 hover:shadow-xl flex items-center">
                                    Mulai
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            @else
                                {{-- Kalau gak punya akses apa pun --}}
                                <button disabled
                                    class="px-5 py-2 bg-gradient-to-r from-gray-400 to-gray-500 text-gray-200 rounded-xl text-sm font-medium shadow-md cursor-not-allowed flex items-center opacity-60">
                                    Terkunci
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        @empty
            <p class="text-center text-gray-500 text-sm col-span-full">Tidak ada kategori yang tersedia.</p>
        @endforelse
    </div>

    {{-- Modal Khusus Kategori Ini (Dipindah ke luar grid) --}}
    @if ($activeCategoryId)
        <div
            class="fixed inset-0 z-[100] flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4 sm:p-6 opacity-100 transition-opacity">
            <div
                class="bg-white max-w-3xl w-full rounded-[24px] shadow-2xl relative flex flex-col transform transition-all max-h-full">
                <!-- Header -->
                <div
                    class="p-6 md:px-8 md:py-6 border-b border-gray-100 bg-white rounded-t-[24px] flex-shrink-0 relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-green-500">
                    </div>
                    <button wire:click="closeModal"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 hover:bg-gray-100 p-2 rounded-full transition-colors focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mt-2 sm:mt-0">
                        <div class="bg-blue-50 p-3 rounded-2xl hidden sm:block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-black text-gray-800 tracking-tight">Level A Certification</h2>
                            <p class="text-sm text-gray-500 font-medium mt-1">Teaching & Learning Certification (TLC)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 md:p-8 overflow-y-auto">
                    <div class="bg-blue-50/50 rounded-2xl p-5 mb-8 border border-blue-100">
                        <p class="text-gray-700 leading-relaxed text-[15px]">
                            Selamat datang di tahap awal sertifikasi TLC. Pada level ini, Anda akan mengikuti tes teori
                            untuk mengukur kompetensi dasar mengajar yang efektif berdasarkan pendekatan
                            <strong>Teaching Mastery Framework (TMF)</strong>.
                        </p>
                    </div>

                    <div class="flex items-center gap-4 mb-6">
                        <div class="h-px bg-gray-200 flex-grow"></div>
                        <h3 class="font-bold text-gray-400 text-sm tracking-widest uppercase">Kategori Pengujian</h3>
                        <div class="h-px bg-gray-200 flex-grow"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- PCK -->
                        <div
                            class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-blue-300 hover:shadow-lg hover:shadow-blue-500/10 transition-all group relative overflow-hidden">
                            <div
                                class="absolute -top-10 -right-10 w-24 h-24 bg-blue-50 rounded-full z-0 group-hover:bg-blue-100 transition-colors">
                            </div>
                            <div class="relative z-10 flex items-start gap-4">
                                <div
                                    class="bg-blue-100 text-blue-600 w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="font-bold text-lg">1</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-1 text-base">PCK</h4>
                                    <p class="text-[13px] text-gray-500 leading-relaxed">
                                        Menunjukkan pemahaman keterkaitan antara materi ajar & strategi pedagogis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- HOTS -->
                        <div
                            class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-purple-300 hover:shadow-lg hover:shadow-purple-500/10 transition-all group relative overflow-hidden">
                            <div
                                class="absolute -top-10 -right-10 w-24 h-24 bg-purple-50 rounded-full z-0 group-hover:bg-purple-100 transition-colors">
                            </div>
                            <div class="relative z-10 flex items-start gap-4">
                                <div
                                    class="bg-purple-100 text-purple-600 w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="font-bold text-lg">2</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-1 text-base">HOTS</h4>
                                    <p class="text-[13px] text-gray-500 leading-relaxed">
                                        Berpikir tingkat tinggi seperti menganalisis, mengevaluasi, dan mencipta.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Literasi -->
                        <div
                            class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-green-300 hover:shadow-lg hover:shadow-green-500/10 transition-all group relative overflow-hidden">
                            <div
                                class="absolute -top-10 -right-10 w-24 h-24 bg-green-50 rounded-full z-0 group-hover:bg-green-100 transition-colors">
                            </div>
                            <div class="relative z-10 flex items-start gap-4">
                                <div
                                    class="bg-green-100 text-green-600 w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="font-bold text-lg">3</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-1 text-base">Literasi</h4>
                                    <p class="text-[13px] text-gray-500 leading-relaxed">
                                        Menguji pemahaman, penafsiran, serta menarik kesimpulan makna implisit.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Numerasi -->
                        <div
                            class="bg-white p-5 rounded-2xl border border-gray-100 hover:border-amber-300 hover:shadow-lg hover:shadow-amber-500/10 transition-all group relative overflow-hidden">
                            <div
                                class="absolute -top-10 -right-10 w-24 h-24 bg-amber-50 rounded-full z-0 group-hover:bg-amber-100 transition-colors">
                            </div>
                            <div class="relative z-10 flex items-start gap-4">
                                <div
                                    class="bg-amber-100 text-amber-600 w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="font-bold text-lg">4</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-1 text-base">Numerasi</h4>
                                    <p class="text-[13px] text-gray-500 leading-relaxed">
                                        Kemampuan berhitung & penalaran logis dalam kehidupan sehari-hari.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-4 md:px-8 md:py-5 border-t border-gray-100 bg-gray-50 rounded-b-[24px] flex-shrink-0">
                    <div class="flex flex-col-reverse sm:flex-row gap-3 justify-end items-center">
                        <button wire:click="closeModal" type="button"
                            class="w-full sm:w-auto px-6 py-2.5 text-gray-600 font-bold hover:bg-gray-200 rounded-xl transition-colors">
                            Batal
                        </button>
                        <form action="{{ route('asesi.sertifikasi.level.a.instruction') }}" method="post"
                            class="w-full sm:w-auto m-0">
                            <input type="hidden" name="category_id" value="{{ $activeCategoryId }}">
                            @csrf
                            <button type="submit"
                                class="w-full sm:w-auto px-8 py-2.5 bg-gray-900 hover:bg-black text-white rounded-xl font-bold shadow-lg shadow-gray-900/20 transition-all flex items-center justify-center gap-2 group">
                                <span>Siap Mengikuti Tes</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
