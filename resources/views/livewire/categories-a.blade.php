{{-- @php
    $userPermission = Auth::user()->getPermissionNames();
@endphp --}}

{{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($categoriesA as $index)
        <div
            class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:shadow-xl group">
            <div class="relative">
                <img src="{{ asset('/storage/' . $index['banner_img']) }}" alt="Literasi"
                    class="w-full h-48 object-cover group-hover:opacity-90 transition">
                @php
                    $categoryName = strtoupper($index['name']); //
                    $hasAccess = Auth::user()->hasPermissionTo($categoryName);
                @endphp
                @if ($hasAccess)
                    <div
                        class="absolute top-4 right-4 bg-green-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Tersedia
                    </div>
                @else
                    <div
                        class="absolute top-4 right-4 bg-red-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow">
                        Terkunci
                    </div>
                @endif
                <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent">
                </div>
            </div>
            <div class="p-6 relative">
                <div class="absolute -top-10 left-6 bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: {{ $index['name'] }}</h3>
                <div class="flex items-center text-yellow-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                    <span class="ml-2 text-sm text-gray-600">
                        {{ $index['question_count'] }}
                        <span> Soal</span>
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                        {{ $index['time_limit'] }}
                        <span> Menit</span>
                    </div>

                        <button
                            class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-100 hover:shadow-xl hover:-translate-y-0.5 flex items-center">
                            Mulai
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                </div>
            </div>
        </div>
    @empty
        <div>
            <p class="text-center text-gray-500 text-sm">Tidak ada kategori yang tersedia.</p>
        </div>
    @endforelse

</div> --}}

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($categoriesA as $index)
        @php
            $categoryId = $index['id'];
            $categoryName = strtoupper($index['name']);
            // $hasAccess = Auth::user()->hasPermissionTo('access_level_A');
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
                        class="w-full h-48 object-cover group-hover:opacity-90 transition">
                    {{-- @if ($hasAccess)
                        <div
                            class="absolute top-4 right-4 text-white text-xs font-medium shadow px-3 py-1 rounded-full
                        {{ $hasAccessCategory ? 'bg-green-600' : 'bg-red-500' }}">
                            {{ $hasAccessCategory ? 'Tersedia' : 'Terkunci' }}
                        </div>
                    @else
                        <div
                            class="absolute top-4 right-4 text-white text-xs font-medium shadow px-3 py-1 rounded-full bg-red-500">
                            Terkunci
                        </div>
                    @endif --}}
                    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-blue-200 to-transparent"></div>
                </div>

                {{-- Isi konten --}}
                <div class="p-6 relative">
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
                        {{-- @for ($i = 0; $i < 4; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                        @endfor
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg> --}}

                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg> --}}
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
                        @if (Auth::user()->hasPermissionTo($index['name']))
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
                        @elseif (Auth::user()->hasPermissionTo('access_level_A') && $hasAccessCategory)
                            {{-- Kalau belum selesai tapi sudah dapat akses --}}
                            <button wire:click="openModal({{ $categoryId }})"
                                class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-100 hover:shadow-xl hover:-translate-y-0.5 flex items-center">
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

            {{-- Modal Khusus Kategori Ini --}}
            @if ($activeCategoryId === $categoryId)
                <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white max-w-xl w-full mx-4 rounded-2xl shadow-xl relative flex flex-col">
                        <!-- Header dengan posisi fixed -->
                        <div class="p-6 border-b border-gray-100 sticky top-0 bg-white rounded-t-2xl z-10">
                            <button wire:click="closeModal"
                                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl font-bold">×</button>
                            <h2 class="text-2xl font-bold text-blue-600 text-center">Selamat Datang di Level A</h2>
                        </div>

                        <!-- Bagian konten yang bisa di-scroll -->
                        <div class="p-6 overflow-y-auto max-h-[60vh] scroll-smooth">
                            <p class="text-sm text-gray-700 mb-4">
                                Selamat datang di Level A, tahap awal sertifikasi Teaching & Learning Certification
                                (TLC)
                                . Pada level ini, Anda akan mengikuti tes teori untuk mengukur kompetensi dasar
                                mengajar yang efektif berdasarkan pendekatan Teaching Mastery Framework (TMF).
                            </p>
                            <p class="text-sm text-gray-700 mb-4">
                                Soal dibagi ke dalam empat kategori utama. Perhatikan instruksi berikut sebelum
                                menjawab:
                            </p>
                            <div class="space-y-3 mt-3">
                                <div class="bg-blue-50 p-3 rounded-lg border-l-4 border-blue-500">
                                    <h3 class="font-bold text-blue-600">1. PCK (Pedagogical Content Knowledge)</h3>
                                    <p class="text-sm text-gray-700 mt-1">
                                        Jawablah setiap pertanyaan dengan menunjukkan pemahaman Anda terhadap
                                        keterkaitan antara materi ajar dan strategi pedagogis.
                                    </p>
                                </div>

                                <div class="bg-purple-50 p-3 rounded-lg border-l-4 border-purple-500">
                                    <h3 class="font-bold text-purple-600">2. HOTS (Higher Order Thinking Skills)</h3>
                                    <p class="text-sm text-gray-700 mt-1">
                                        Jawablah setiap pertanyaan berdasarkan kemampuan berpikir tingkat tinggi seperti
                                        menganalisis, mengevaluasi, dan menciptakan solusi.
                                    </p>
                                </div>

                                <div class="bg-green-50 p-3 rounded-lg border-l-4 border-green-500">
                                    <h3 class="font-bold text-green-600">3. Literasi</h3>
                                    <p class="text-sm text-gray-700 mt-1">
                                        Bacalah teks yang tersedia dengan cermat, lalu jawablah pertanyaan yang menguji
                                        pemahaman, penafsiran, serta kemampuan dalam menarik kesimpulan dan menemukan
                                        makna implisit.
                                    </p>
                                </div>

                                <div class="bg-amber-50 p-3 rounded-lg border-l-4 border-amber-500">
                                    <h3 class="font-bold text-amber-600">4. Numerasi</h3>
                                    <p class="text-sm text-gray-700 mt-1">
                                        Gunakanlah kemampuan berhitung dan penalaran logis untuk menyelesaikan soal
                                        numerasi. Pastikanlah jawaban Anda tepat dan mencerminkan pemahaman atas
                                        penerapan numerasi dalam kehidupan dan pembelajaran sehari-hari.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer dengan posisi fixed -->
                        <div class="p-5 border-t border-gray-100 sticky bottom-0 bg-white rounded-b-2xl">
                            <div class="text-center">
                                <form action="{{ route('asesi.sertifikasi.level.a.instruction') }}" method="post">
                                    <input type="hidden" name="category_id" value="{{ $index['id'] }}">
                                    @csrf
                                    <button type="submit"
                                        class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl shadow hover:shadow-lg transition">
                                        Siap Mengikuti Tes
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @empty
        <p class="text-center text-gray-500 text-sm">Tidak ada kategori yang tersedia.</p>
    @endforelse
</div>