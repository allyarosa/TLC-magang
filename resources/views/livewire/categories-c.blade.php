<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @php
        $user = Auth::user();
    @endphp
    <div class="relative">
        {{-- Kartu kategori --}}
        <div
            class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:shadow-xl group">
            {{-- Gambar banner --}}
            <div class="relative">
                <img src="#" alt="#" class="w-full h-48 object-cover group-hover:opacity-90 transition">

                <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
            </div>

            {{-- Isi konten --}}
            <div class="p-6 relative">
                <div class="absolute -top-10 left-6 bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Essay</h3>

                {{-- Rating & soal --}}
                <div class="flex items-center text-yellow-500 mb-4">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                        <path d="M8,12H16V14H8V12M8,16H13V18H8V16Z" />
                    </svg>
                    {{-- <span class="ml-2 text-sm text-gray-600">{{ $index['question_count'] }} Soal</span> --}}
                </div>

                {{-- Tombol Mulai --}}
                <div class="flex justify-between items-center">
                    @if ($user->hasPermissionTo('ESSAY'))
                        @if ($user->hasPermissionTo('ESSAY_COMPLETED'))
                            <button disabled
                                class="px-5 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl text-sm font-medium shadow-md flex items-center cursor-default">
                                Selesai
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        @else
                            <button disabled
                                class="px-5 py-2 bg-gradient-to-r from-orange-400 to-orange-600 text-white rounded-xl text-sm font-medium shadow-md flex items-center cursor-not-allowed opacity-60">
                                Dalam Penilaian
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        @endif
                    @elseif (Auth::user()->hasPermissionTo('access_level_C'))
                        <form action="{{ route('asesi.sertifikasi.level.c.instruction') }}" method="POST">
                            @csrf
                            <input type="hidden" name="category_id" value="1">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit"
                                class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-100 hover:shadow-xl hover:-translate-y-0.5 flex items-center">
                                Mulai
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    @else
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

    <div class="relative">
        <div
            class="bg-white rounded-3xl shadow-lg overflow-hidden border border-blue-100 transform transition duration-500 hover:shadow-xl group">
            {{-- Gambar banner --}}
            <div class="relative">
                <img src="#" alt="#" class="w-full h-48 object-cover group-hover:opacity-90 transition">

                <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-black to-transparent"></div>
            </div>

            {{-- Isi konten --}}
            <div class="p-6 relative">
                <div class="absolute -top-10 left-6 bg-blue-600 text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-gray-800 mt-2 mb-2">Kategori: Video Upload</h3>

                {{-- Rating & soal --}}
                <div class="flex items-center text-yellow-500 mb-4">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                        <path d="M8,12H16V14H8V12M8,16H13V18H8V16Z" />
                    </svg>
                    {{-- <span class="ml-2 text-sm text-gray-600">{{ $index['question_count'] }} Soal</span> --}}
                </div>

                {{-- Tombol Mulai --}}
                <div class="flex justify-between items-center">
                    @if ($user->hasPermissionTo('VIDEO_UPLOAD'))
                        @if ($user->hasPermissionTo('VIDEO_UPLOAD_COMPLETED'))
                            <button disabled
                                class="px-5 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl text-sm font-medium shadow-md flex items-center cursor-default">
                                Selesai
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        @else
                            <button disabled
                                class="px-5 py-2 bg-gradient-to-r from-orange-400 to-orange-600 text-white rounded-xl text-sm font-medium shadow-md flex items-center cursor-not-allowed opacity-60">
                                Dalam Penilaian
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        @endif
                    @elseif (Auth::user()->hasPermissionTo('access_level_C'))
                        <form action="{{ route('asesi.sertifikasi.level.c.instruction') }}" method="POST">
                            @csrf
                            <input type="hidden" name="category_id" value="2">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit"
                                class="px-5 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl text-sm font-medium shadow-md transform transition duration-100 hover:shadow-xl hover:-translate-y-0.5 flex items-center">
                                Mulai
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    @else
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

</div>