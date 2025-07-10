@extends('layouts.exam')

@section('title', 'Instruksi Pengerjaan Level C - Essay')

@section('content')
    <div class="min-h-screen bg-slate-50 font-sans text-slate-800">
        <div class="container mx-auto max-w-5xl p-3 py-6 sm:p-4 sm:py-8 lg:p-12">

            {{-- Header Section --}}
            <div
                class="mb-6 rounded-xl bg-gradient-to-br from-indigo-700 to-indigo-800 p-4 text-white shadow-xl sm:mb-8 sm:rounded-2xl sm:p-6 md:p-8">
                <h1 class="mb-3 text-xl font-bold leading-tight text-white sm:text-2xl lg:text-4xl">
                    Instruksi Pengerjaan Level C: Essay
                </h1>
                <p class="text-indigo-50 text-sm sm:text-base lg:text-lg">
                    Penilaian oleh Asesor melalui jawaban essay yang komprehensif dan mendalam
                </p>
                {{-- @if (isset($user_id))
                    <div class="mt-3 text-indigo-50">
                        <span class="text-xs sm:text-sm font-medium">ID Peserta: {{ $user_id }}</span>
                    </div>
                @endif --}}
            </div>

            {{-- Stats Cards --}}
            <div class="mb-6 grid grid-cols-1 gap-3 sm:mb-8 sm:grid-cols-2 sm:gap-4 lg:grid-cols-4 lg:gap-6">
                <div
                    class="flex items-center space-x-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:space-x-4 sm:rounded-2xl sm:p-5">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 text-indigo-700 sm:h-12 sm:w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-xs text-slate-500 sm:text-sm">Kategori</div>
                        <div class="text-base font-bold text-slate-800 sm:text-lg">Essay</div>
                    </div>
                </div>

                <div
                    class="flex items-center space-x-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:space-x-4 sm:rounded-2xl sm:p-5">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-700 sm:h-12 sm:w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-xs text-slate-500 sm:text-sm">Waktu Pengerjaan</div>
                        <div class="text-base font-bold text-slate-800 sm:text-lg">120 Menit</div>
                    </div>
                </div>

                <div
                    class="flex items-center space-x-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:space-x-4 sm:rounded-2xl sm:p-5">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-orange-100 text-orange-700 sm:h-12 sm:w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-xs text-slate-500 sm:text-sm">Jumlah Soal</div>
                        <div class="text-base font-bold text-slate-800 sm:text-lg">8 Soal</div>
                    </div>
                </div>

                <div
                    class="flex items-center space-x-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:space-x-4 sm:rounded-2xl sm:p-5">
                    <div
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-100 text-purple-700 sm:h-12 sm:w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a.75.75 0 00-1.06-1.06L8.5 10.94l-1.72-1.72a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.06 0l4.25-4.25z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-xs text-slate-500 sm:text-sm">Penilaian</div>
                        <div class="text-base font-bold text-slate-800 sm:text-lg">Asesor</div>
                    </div>
                </div>
            </div>

            {{-- Instruction Content --}}
            <div
                class="mb-6 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:mb-8 sm:rounded-2xl sm:p-6 md:p-8">
                <h2 class="mb-4 text-lg font-bold text-slate-800 sm:mb-6 sm:text-xl">
                    Petunjuk Khusus Essay
                </h2>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-8">
                    <div>
                        <h3
                            class="mb-3 border-l-4 border-indigo-600 pl-3 text-sm font-semibold text-slate-800 sm:text-base">
                            Format Jawaban</h3>
                        <ul class="space-y-2 text-xs text-slate-700 sm:space-y-3 sm:text-sm">
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-indigo-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Jawaban harus berupa essay yang terstruktur</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-indigo-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Minimal 200 kata per soal untuk jawaban lengkap</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-indigo-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Gunakan bahasa yang baku dan mudah dipahami</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-indigo-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Berikan contoh konkret untuk mendukung argumen</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-indigo-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Sertakan referensi atau sumber yang relevan</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="mb-3 border-l-4 border-blue-600 pl-3 text-sm font-semibold text-slate-800 sm:text-base">
                            Kriteria Penilaian</h3>
                        <ul class="space-y-2 text-xs text-slate-700 sm:space-y-3 sm:text-sm">
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Pemahaman konsep dan teori yang mendalam</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Kemampuan analisis dan sintesis informasi</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Keterkaitan antara teori dan praktik</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Kualitas argumentasi dan contoh yang diberikan</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Originalitas pemikiran dan kreativitas jawaban</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6 rounded-lg border-l-4 border-indigo-500 bg-indigo-50 p-3 sm:mt-8 sm:p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-4 w-4 text-indigo-600 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-2 sm:ml-3">
                            <p class="text-xs text-indigo-800 sm:text-sm">
                                <span class="font-semibold">Tips:</span> Baca setiap pertanyaan dengan teliti, buat
                                kerangka jawaban terlebih dahulu, dan jawab secara sistematis dengan memberikan contoh nyata
                                dari pengalaman mengajar Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- General Instructions --}}
            <div
                class="mb-6 rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:mb-8 sm:rounded-2xl sm:p-6 md:p-8">
                <h2 class="mb-4 text-lg font-bold text-slate-800 sm:mb-6 sm:text-xl">
                    Petunjuk Umum
                </h2>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                    <div>
                        <h3 class="mb-3 border-l-4 border-blue-600 pl-3 text-sm font-semibold text-slate-800 sm:text-base">
                            Sebelum Memulai</h3>
                        <ul class="space-y-2 text-xs text-slate-700 sm:space-y-3 sm:text-sm">
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Pastikan koneksi internet Anda stabil</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Siapkan catatan atau referensi yang diperlukan</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-blue-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Pastikan daya baterai perangkat mencukupi</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3
                            class="mb-3 border-l-4 border-green-600 pl-3 text-sm font-semibold text-slate-800 sm:text-base">
                            Cara Mengerjakan</h3>
                        <ul class="space-y-2 text-xs text-slate-700 sm:space-y-3 sm:text-sm">
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-green-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Baca semua soal terlebih dahulu</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-green-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Kerjakan soal sesuai urutan atau prioritas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-green-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Gunakan fitur simpan draft secara berkala</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sm:col-span-2 lg:col-span-1">
                        <h3 class="mb-3 border-l-4 border-red-600 pl-3 text-sm font-semibold text-slate-800 sm:text-base">
                            Peraturan</h3>
                        <ul class="space-y-2 text-xs text-slate-700 sm:space-y-3 sm:text-sm">
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-red-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Kerjakan secara mandiri dan orisinal</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-red-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Dilarang copy-paste dari internet</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-2 mt-0.5 h-3 w-3 flex-shrink-0 text-red-600 sm:mr-3 sm:mt-1 sm:h-4 sm:w-4"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Waktu berjalan otomatis dan tidak dapat dihentikan</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Action Button --}}
            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-2xl sm:p-6 md:p-8">
                <div class="text-center">
                    <h3 class="mb-3 text-base font-semibold text-slate-800 sm:mb-4 sm:text-lg">Siap Memulai?</h3>
                    <p class="mb-4 text-xs text-slate-600 sm:mb-6 sm:text-sm">Pastikan Anda telah memahami semua petunjuk
                        sebelum memulai pengerjaan essay.</p>
                    <div class="flex flex-col space-y-3 sm:flex-row sm:justify-center sm:space-x-4 sm:space-y-0">
                        <a href="{{ route('asesi.sertifikasi') }}"
                            class="inline-flex items-center justify-center rounded-lg border-2 border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 transition-all duration-200 hover:border-slate-400 hover:bg-slate-50 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 sm:px-6 sm:py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 sm:h-5 sm:w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Kembali ke Sertifikasi</span>
                        </a>
                        {{-- <a href="{{ route('asesi.sertifikasi.level.c.essay') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-700 px-4 py-2.5 text-sm font-medium text-white shadow-lg transition-all duration-200 hover:bg-indigo-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:px-6 sm:py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <span>Mulai Pengerjaan Essay</span>
                        </a> --}}
                        <a href="{{ route('exam.question', Vinkla\Hashids\Facades\Hashids::encode(1)) }}"
                            class="inline-flex items-center justify-center rounded-lg bg-indigo-700 px-4 py-2.5 text-sm font-medium text-white shadow-lg transition-all duration-200 hover:bg-indigo-800 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:px-6 sm:py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 sm:h-5 sm:w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <span>Mulai Pengerjaan Essay</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
