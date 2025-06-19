@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="relative max-w-7xl mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
        <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden">

            <div class="bg-yellow-500 p-3 sm:p-4 lg:p-5 text-white">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <div>
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-bold">Detail Riwayat Penilaian Asesi</h2>
                    </div>
                </div>
            </div>

            <div class="p-3 sm:p-4 lg:p-6">
                <div class="bg-blue-50 rounded-lg p-3 sm:p-4 mb-4 sm:mb-5 lg:mb-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-3 sm:space-y-0 sm:space-x-4">
                        <div
                            class="bg-gray-200 rounded-full h-12 w-12 sm:h-16 sm:w-16 flex items-center justify-center flex-shrink-0 mx-auto sm:mx-0">
                            <svg class="h-6 w-6 sm:h-8 sm:w-8 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="text-center sm:text-left w-full sm:w-auto">
                            <h3 class="font-bold text-gray-800 text-sm sm:text-base">{{ $detail->user?->name }}</h3>
                            <p class="text-xs sm:text-sm text-gray-600">{{ $detail->user?->email }}</p>
                            <span
                                class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mt-1">Kategori
                                B</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4 sm:mb-5 lg:mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center text-yellow-600 mb-2">
                        <div class="flex items-center mb-1 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <h3 class="font-bold text-sm sm:text-base">File: </h3>
                        </div>
                        @if ($detail->modul_ajar)
                            <a href="{{ asset('storage/' . $detail->modul_ajar) }}" target="_blank"
                                class="text-sm sm:text-base sm:ml-1 text-blue-600 underline hover:text-blue-800 transition">
                                Lihat File
                            </a>
                        @else
                            <span class="text-sm sm:text-base sm:ml-1 text-red-600">Belum ada file</span>
                        @endif
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 ml-0 sm:ml-6">Deskripsi: {{ $detail->description }}</p>
                </div>

                <div class="mb-6 sm:mb-8">
                    <label class="block text-gray-700 mb-2 text-sm sm:text-base font-medium">Komentar Asesor:</label>
                    {!! $detail->comment_asesor !!}

                </div>

                <div class="flex flex-col sm:flex-row justify-between gap-3 sm:gap-4 mt-6 sm:mt-8">
                    <a href="{{ route('asesor.riwayat-penilaian') }}"
                        class="w-full sm:w-auto order-2 sm:order-1 border border-gray-300 text-gray-700 rounded-lg px-4 sm:px-5 py-2 sm:py-3 hover:bg-gray-100 transition duration-200 text-sm sm:text-base font-medium">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
