@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="relative max-w-7xl mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
        @php use Vinkla\Hashids\Facades\Hashids; @endphp
        <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden">
            <div class="p-3 sm:p-4 lg:p-6">
            </div>

            <div class="bg-yellow-500 p-3 sm:p-4 lg:p-5 text-white">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <div>
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-blue-700">Hasil Penilaian Asesor Modul Ajar</h2>
                        <p class="text-xs sm:text-sm mt-1">Isi skor dan komentar berdasarkan hasil evaluasi terhadap asesi
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-3 sm:p-4 lg:p-6">
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
                    <div class="flex flex-col sm:flex-row sm:items-center text-yellow-600 mb-2">
                        <div class="flex items-center mb-1 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 spum:h-5 sm:w-5 mr-1 flex-shrink-0"
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

                    <p class="text-xs sm:text-sm text-gray-600 ml-0 sm:ml-6">Deskripsi:
                        <span>{!! $asesi->description !!}</span>
                    </p>
                </div>

                <form action="{{ route('asesor.gradeB.store', Vinkla\Hashids\Facades\Hashids::encode($asesi->id)) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $asesi->user->id }}">
                    <input type="hidden" name="status" value="reviewed">
                    <div class="mb-4 sm:mb-5 lg:mb-6">
                        <h3 class="text-gray-700 mb-3 text-sm sm:text-base font-medium">Hasil Penilaian</h3>

                        @if ($asesi->is_passed === 'reviewed')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                ✅ Kompeten
                            </span>
                        @elseif ($asesi->is_passed === 'rejected')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                ❌ Belum Kompeten
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-600">
                                ⏳ Belum Dinilai
                            </span>
                        @endif
                    </div>
                    <div class="mb-4 sm:mb-5 lg:mb-6">
                        <label class="block text-gray-700 mb-2 text-sm sm:text-base font-medium">Skor</label>
                        @php
                            $scoreLabel = match ($asesi->score) {
                                '90-100' => '90-100 (Sangat Baik)',
                                '80-89' => '80-89 (Baik)',
                                '70-79' => '70-79 (Cukup)',
                                '60-69' => '60-69 (Kurang)',
                                default => 'Belum Dinilai',
                            };

                            $scoreColor = match ($asesi->score) {
                                '90-100' => 'bg-green-100 text-green-800',
                                '80-89' => 'bg-blue-100 text-blue-800',
                                '70-79' => 'bg-yellow-100 text-yellow-800',
                                '60-69' => 'bg-red-100 text-red-800',
                                default => 'bg-gray-100 text-gray-600',
                            };
                        @endphp
                        <div
                            class="inline-flex items-center px-4 py-2 rounded-full text-sm sm:text-base font-semibold {{ $scoreColor }}">
                            {{ $scoreLabel }}
                        </div>
                    </div>
                    <div class="mb-4 sm:mb-8">
                        <label for="description" class="block text-gray-700 mb-2 text-sm sm:text-base font-medium">
                            Komentar
                        </label>

                        @if ($asesi->comment_asesor)
                            <div class="prose max-w-none text-sm sm:text-base text-gray-800">
                                {!! $asesi->comment_asesor !!}
                            </div>
                        @else
                            <p class="text-sm sm:text-base text-gray-500 italic">Belum ada komentar dari asesor.</p>
                        @endif
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between gap-3 sm:gap-4 mt-6 sm:mt-8">
                        <a href="{{ route('asesor.list-asesi') }}"
                            class="w-full sm:w-auto order-1 sm:order-2 bg-blue-800 text-white rounded-lg px-4 sm:px-5 py-2 sm:py-3 hover:bg-blue-700 transition duration-200 text-sm sm:text-base font-medium">
                            Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
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
