@extends('layouts.asesiDashboard')

@section('title', 'Tugas saya')

@section('content')
    <!-- Main Content Area -->
    <main class="flex-1 ml-0 md:ml-64 pt-10 px-6 md:px-12 pb-12 min-h-screen">
        <!-- Header Section -->
        <div class="mb-10 max-w-8xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
                <div>
                    {{-- <div class="flex items-center gap-2 text-gray-700 text-sm font-medium mb-2 uppercase tracking-wider">
                        <span class="material-symbols-outlined text-[16px]" data-icon="arrow_back">arrow_back</span>
                        <a class="hover:text-brandBlue transition-colors" href="#">Kembali ke Modul</a>
                    </div> --}}
                    <h1 class="text-4xl md:text-5xl font-bold text-brandBlue-dark/90 tracking-tight">
                        Batch 4 : Implementasi HOTS di Kelas
                    </h1>
                </div>
                <!-- Deadline Indicator -->

            </div>
            <!-- Status Tabs -->
            <div class="flex border-b border-gray-300 mb-8 overflow-x-auto hide-scrollbar">
                <button
                    class="px-6 py-4 text-sm uppercase tracking-wider font-semibold text-cyan-700 border-b-2 border-cyan-700">
                    Belum Dikerjakan
                </button>
                <button class="px-6 py-4 text-sm uppercase tracking-wider font-semibold text-brandBlue-dark">
                    Sudah Dikerjakan
                </button>
                <button class="px-6 py-4 text-sm uppercase tracking-wider font-semibold text-brandBlue-dark">
                    Sudah Dikirim
                </button>
            </div>
            <!-- Bento Grid Layout for Content -->
            <div class="grid grid-cols-1 gap-8">
                <!-- Left Column: Task Details (8 cols) -->
                <div class="lg:col-span-8 flex flex-col gap-6">
                    <!-- Detail Card -->
                    <div class="bg-white rounded-xl shadow-ambient p-8 border-ghost">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-brandGreen/30 flex items-center justify-center text-brandGreen-dark">
                                    <span class="material-symbols-outlined" data-icon="description">description</span>
                                </div>
                                <h2 class="text-xl font-headline font-semibold text-brandBlue-dark/90">Penugasan Modul 1.1
                                </h2>
                            </div>
                            <div
                                class="flex items-center gap-2.5 bg-brandBlue-dark/90 px-4 py-2 rounded-lg w-fit shadow-md">
                                <p class="text-sm font-label text-white font-medium">
                                    Batas Pengumpulan: <span class="font-bold text-accent">24 Oktober 2024, 23:59 WIB</span>
                                </p>
                            </div>


                        </div>
                        <div class="max-w-none font-body leading-relaxed ">

                            <p class="text-lg text-gray-800 font-medium mb-4">Tuliskan rancangan pembelajaran yang
                                mengintegrasikan HOTS untuk mata pelajaran pilihan Anda.</p>
                            <p class="text-gray-800">Rancangan harus mencakup tujuan pembelajaran, aktivitas siswa yang
                                memicu
                                pemikiran tingkat tinggi (analisis, evaluasi, mencipta), serta instrumen penilaian yang
                                relevan. Pastikan rancangan aplikatif untuk konteks kelas Anda saat ini.</p>

                            <div class="bg-gray-100 p-2 rounded-lg mt-6 border-l-4 border-brandBlue">
                                <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Pengumpulan :</h4>
                                <ul class="list-disc pl-5 space-y-1 text-sm">
                                    <li class="text-gray-800">Format file: PDF atau Word (.doc, .docx)</li>
                                    <li class="text-gray-800">Maksimal ukuran file: 10MB</li>
                                    <li class="text-gray-800">Penamaan file: [Nama Lengkap]_[Mata Pelajaran]_HOTS</li>
                                </ul>
                            </div>
                            <div class="pt-8">
                                {{-- <h2 class="text-xl font-headline font-semibold text-on-surface mb-6">Area Pengumpulan
                                </h2> --}}
                                <div class="border-2 border-dashed border-outline-variant rounded-xl flex flex-col items-center justify-center bg-blue-50 transition-colors cursor-pointer group p-6"
                                    id="dropzone">
                                    <div
                                        class="rounded-full bg-surface-container-lowest shadow-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300 w-10 h-10 mb-2">
                                        <span class="material-symbols-outlined text-primary text-xl"
                                            data-icon="cloud_upload">cloud_upload</span>
                                    </div>
                                    <p class="text-gray-800 font-medium mb-2">Drag &amp; drop file Anda di sini</p>
                                    <p class="text-gray-800 text-sm mb-2">atau</p><button
                                        class="px-6 py-2 rounded-lg border border-outline-variant bg-white text-gray-800 font-medium hover:bg-surface-container-high transition-colors text-sm">Pilih
                                        File dari Perangkat</button><input accept=".pdf,.doc,.docx" class="hidden"
                                        id="fileInput" type="file">
                                </div>
                                <div class="mt-4 flex justify-center">
                                    <button
                                        class="px-8 py-3 rounded-lg bg-brandBlue text-white font-headline font-semibold shadow-md hover:brightness-110 transition-all focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface-container-lowest "
                                        id="submitBtn">Submit Tugas
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Upload Area -->

                </div>
                <!-- Right Column: Context/Resources (4 cols) -->
                <div class="lg:col-span-4 flex flex-col gap-6">
                    <!-- Scoring Rubric Info -->

                    <!-- Related Resources -->
                </div>
            </div>
        </div>
    </main>
@endsection
