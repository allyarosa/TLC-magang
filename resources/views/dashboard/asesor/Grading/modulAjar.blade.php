@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="relative max-w-7xl mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
        @php use Vinkla\Hashids\Facades\Hashids; @endphp
        <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden">
            <div class="p-3 sm:p-4 lg:p-6">
                <div class="flex items-center text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-2 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h1 class="text-lg sm:text-xl lg:text-2xl font-bold">Form Penilaian Modul Ajar</h1>
                </div>
            </div>

            <div class="bg-yellow-500 p-3 sm:p-4 lg:p-5 text-white">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <div>
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold">Penilaian Asesi</h2>
                        <p class="text-xs sm:text-sm mt-1">Berikan skor dan komentar untuk asesi</p>
                    </div>
                </div>
            </div>

            <div class="p-3 sm:p-4 lg:p-6">
                {{-- <div class="mb-4 sm:mb-5 lg:mb-6">
                    <label class="block text-gray-700 mb-2 text-sm sm:text-base font-medium">Pilih Asesi</label>
                    <div class="relative">
                        <select
                            class="block w-full bg-white border border-gray-300 text-gray-700 py-2 sm:py-3 px-3 sm:px-4 pr-8 rounded-lg sm:rounded-full leading-tight focus:outline-none focus:border-blue-800 text-sm sm:text-base">
                            <option>Ahmad Fauzi - Kategori B</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div> --}}

                <div class="bg-blue-50 rounded-lg p-3 sm:p-4 mb-4 sm:mb-5 lg:mb-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-3 sm:space-y-0 sm:space-x-4">
                        <div class="rounded-full h-12 w-12 sm:h-16 sm:w-16 overflow-hidden flex-shrink-0 mx-auto sm:mx-0">
                            <img src="{{ $userProfile && $userProfile->profile_image
                                ? asset('/storage/' . $userProfile->profile_image)
                                : asset('/storage/blankprofile.png') }}"
                                alt="Foto Profil" class="object-cover h-full w-full">

                        </div>
                        <div class="text-center sm:text-left w-full sm:w-auto">
                            <h3 class="font-bold text-gray-800 text-sm sm:text-base">
                                {{ Str::ucfirst($asesi->user->name) }}
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600">Email: {{ $asesi->user->email }}</p>
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mt-1">
                                Kategori B</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4 sm:mb-5 lg:mb-6">
                    {{-- <div class="flex flex-col sm:flex-row sm:items-center text-yellow-600 mb-2">
                        <div class="flex items-center mb-1 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <h3 class="font-bold text-sm sm:text-base">Unit Kompetensi: </h3>
                        </div>
                        <span class="text-sm sm:text-base sm:ml-1">Mengoperasikan Komputer</span>
                    </div> --}}
                    <div class="flex flex-col sm:flex-row sm:items-center text-yellow-600 mb-2">
                        <div class="flex items-center mb-1 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <h3 class="font-bold text-sm sm:text-base">Modul Ajar:</h3>
                        </div>

                        @if ($asesi->modul_ajar)
                            <a href="{{ asset('storage/' . $asesi->modul_ajar) }}" target="_blank"
                                class="text-sm sm:text-base sm:ml-1 text-blue-600 underline hover:text-blue-800 transition">
                                Lihat File
                            </a>
                        @else
                            <span class="text-sm sm:text-base sm:ml-1 text-red-600">Belum ada file</span>
                        @endif
                    </div>

                    <p class="text-xs sm:text-sm text-gray-600 ml-0 sm:ml-6">Deskripsi: <span>{!! $asesi->description !!}</span>
                    </p>
                </div>

                <form action="{{ route('asesor.gradeB.store', Vinkla\Hashids\Facades\Hashids::encode($asesi->id)) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $asesi->user->id }}">
                    <input type="hidden" name="status" value="reviewed">
                    <div class="mb-4 sm:mb-5 lg:mb-6">
                        <h3 class="text-gray-700 mb-3 text-sm sm:text-base font-medium">Penilaian</h3>
                        <div class="space-y-2 sm:space-y-3">
                            <div class="flex items-center">
                                <input id="kompeten" name="assessment" type="radio" value="passed"
                                    @checked(old('assessment', $asesi->is_passed) === 'passed')
                                    class="h-4 w-4 text-blue-800 focus:ring-blue-800 focus:ring-2">
                                <label for="kompeten"
                                    class="ml-2 sm:ml-3 block text-gray-700 text-sm sm:text-base cursor-pointer">Kompeten</label>
                            </div>
                            <div class="flex items-center">
                                <input id="belum-kompeten" name="assessment" type="radio" value="rejected"
                                    @checked(old('assessment', $asesi->is_passed) === 'rejected')
                                    class="h-4 w-4 text-blue-800 focus:ring-blue-800 focus:ring-2">
                                <label for="belum-kompeten"
                                    class="ml-2 sm:ml-3 block text-gray-700 text-sm sm:text-base cursor-pointer">Belum
                                    Kompeten</label>
                            </div>
                            <x-input-error :messages="$errors->get('assessment')" class="mt-1 text-xs" />
                        </div>
                    </div>

                    <div class="mb-4 sm:mb-5 lg:mb-6">
                        <label class="block text-gray-700 mb-2 text-sm sm:text-base font-medium">Skor</label>
                        <div class="relative">
                            <select name="score" required
                                class="block w-full bg-white border border-gray-300 text-gray-700 py-2 sm:py-3 px-3 sm:px-4 pr-8 rounded-lg sm:rounded-full leading-tight focus:outline-none focus:border-blue-800 text-sm sm:text-base">
                                <option disabled {{ old('score', $asesi->score) ? '' : 'selected' }}>Pilih skor</option>
                                <option value="90-100" {{ old('score', $asesi->score) === '90-100' ? 'selected' : '' }}>
                                    90-100 (Sangat Baik)</option>
                                <option value="80-89" {{ old('score', $asesi->score) === '80-89' ? 'selected' : '' }}>80-89
                                    (Baik)</option>
                                <option value="70-79" {{ old('score', $asesi->score) === '70-79' ? 'selected' : '' }}>
                                    70-79 (Cukup)</option>
                                <option value="60-69" {{ old('score', $asesi->score) === '60-69' ? 'selected' : '' }}>
                                    60-69 (Kurang)</option>
                            </select>
                            <x-input-error :messages="$errors->get('score')" class="mt-1 text-xs" />
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 sm:mb-8">
                        <label for="description" class="block text-gray-700 mb-2 text-sm sm:text-base font-medium">
                            Komentar</label>
                        <textarea name="comment_asesor" id="editor" rows="2"
                            class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-3 text-gray-700 focus:outline-none focus:border-blue-800 focus:ring-1 focus:ring-blue-800 text-sm sm:text-base resize-y min-h-[100px]">
                            {!! $asesi->comment_asesor !!}
                        </textarea>
                        <x-input-error :messages="$errors->get('comment_asesor')" class="mt-1 text-xs" />
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between gap-3 sm:gap-4 mt-6 sm:mt-8">
                        <div>
                            <a href="{{ route('asesor.list-asesi') }}"
                                class="w-full sm:w-auto order-2 sm:order-1 border border-gray-300 text-gray-700 rounded-lg px-4 sm:px-5 py-2 sm:py-3 hover:bg-gray-100 transition duration-200 text-sm sm:text-base font-medium">
                                Kembali
                            </a>
                            <button
                                class="w-full sm:w-auto order-2 sm:order-1 border border-gray-300 text-gray-700 rounded-lg px-4 sm:px-5 py-2 sm:py-3 hover:bg-gray-100 transition duration-200 text-sm sm:text-base font-medium">
                                Simpan Draft
                            </button>
                        </div>

                        <button
                            class="w-full sm:w-auto order-1 sm:order-2 bg-blue-800 text-white rounded-lg px-4 sm:px-5 py-2 sm:py-3 hover:bg-blue-700 transition duration-200 text-sm sm:text-base font-medium">
                            Kirim Penilaian
                        </button>
                    </div>
                </form>

            </div>
        </div>
        {{-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
            if (performance.navigation.type === 2) {
                // If page is accessed via Back button, reload to clear session flash
                location.reload();
            }
        </script>
    </section>
@endsection
