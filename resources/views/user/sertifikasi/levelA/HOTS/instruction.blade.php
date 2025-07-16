@extends('layouts.exam')

@section('title', 'Instruksi Pengerjaan AKM')

@section('content')
    {{-- Latar belakang halaman yang lebih lembut --}}
    <div class="min-h-screen bg-slate-50 font-sans text-slate-800">
        <div class="container mx-auto max-w-5xl p-4 py-8 sm:p-6 lg:p-12">

            <div class="mb-8 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-700 p-6 text-white shadow-lg md:p-8">
                <h1 class="mb-2 text-2xl font-bold sm:text-3xl lg:text-4xl">
                    Instruksi Pengerjaan: Kategori {{ $category->name ?? 'Tidak Diketahui' }}
                </h1>
                <p class="text-blue-100 opacity-90">
                    Harap baca semua petunjuk dengan teliti sebelum Anda memulai ujian.
                </p>
            </div>

            <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 sm:gap-6">
                <div class="flex items-center space-x-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div
                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm text-slate-500">Waktu Pengerjaan</div>
                        <div class="text-xl font-bold text-slate-800">{{ $category->time_limit }} Menit</div>
                    </div>
                </div>
                <div class="flex items-center space-x-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div
                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm text-slate-500">Jumlah Soal</div>
                        <div class="text-xl font-bold text-slate-800">{{ $questionCount }} Soal</div>
                    </div>
                </div>
                <div class="flex items-center space-x-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div
                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a.75.75 0 00-1.06-1.06L8.5 10.94l-1.72-1.72a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.06 0l4.25-4.25z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm text-slate-500">Nilai Kriteria Lulus</div>
                        <div class="text-xl font-bold text-slate-800">{{ $category->passing_score }} Point</div>
                    </div>
                </div>
            </div>

            <div class="mb-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                <h2 class="mb-6 text-xl font-bold text-slate-800">
                    Petunjuk Penting
                </h2>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div>
                        <h3 class="mb-3 border-l-4 border-blue-500 pl-3 text-base font-semibold text-slate-700">Sebelum
                            Memulai</h3>
                        <ul class="space-y-3 text-sm text-slate-600">
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Pastikan koneksi internet Anda stabil.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Gunakan browser Chrome/Firefox versi terbaru.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Jangan menutup atau me-refresh halaman ujian.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Pastikan daya baterai perangkat mencukupi.</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="mb-3 border-l-4 border-green-500 pl-3 text-base font-semibold text-slate-700">Cara
                            Mengerjakan</h3>
                        <ul class="space-y-3 text-sm text-slate-600">
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-green-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Baca setiap soal dengan cermat dan teliti.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-green-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Klik pada pilihan jawaban yang Anda anggap benar.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-green-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Gunakan tombol navigasi untuk berpindah soal.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-green-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Jawaban yang Anda pilih akan tersimpan otomatis.</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="mb-3 border-l-4 border-red-500 pl-3 text-base font-semibold text-slate-700">Peraturan
                        </h3>
                        <ul class="space-y-3 text-sm text-slate-600">
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-red-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Kerjakan ujian secara mandiri dan jujur.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-red-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Dilarang membuka tab, jendela, atau aplikasi lain.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="mr-3 mt-1 h-4 w-4 flex-shrink-0 text-red-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Waktu berjalan otomatis dan tidak dapat dihentikan.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-8 rounded-lg border-l-4 border-yellow-400 bg-yellow-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.636-1.1 2.153-1.1 2.79 0l7.5 13.016c.635 1.1-1.63 2.39-2.79 0l-7.5-13.016z"
                                    clip-rule="evenodd" />
                                <path d="M10 6a1 1 0 011 1v4a1 1 0 11-2 0V7a1 1 0 011-1zM9 14a1 1 0 102 0 1 1 0 00-2 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                Ujian akan berakhir <span class="font-semibold">otomatis</span> saat waktu habis. Pastikan
                                semua soal telah Anda jawab sebelum waktu berakhir.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                <form id="startExamForm" action="{{ route('asesi.sertifikasi.level.a.start') }}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div class="mb-6">
                        <label for="agreement" class="flex cursor-pointer items-start space-x-4">
                            <input type="checkbox" id="agreement" name="agreement" required
                                class="mt-1 h-5 w-5 flex-shrink-0 cursor-pointer rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <span class="text-sm text-slate-600">
                                Saya telah membaca, memahami, dan menyetujui semua instruksi serta peraturan yang berlaku
                                untuk ujian ini.
                            </span>
                        </label>
                    </div>

                    <div class="flex flex-col-reverse items-center gap-4 sm:flex-row sm:justify-center">
                        <a href="{{ route('asesi.sertifikasi') }}"
                            class="w-full rounded-lg border border-slate-300 px-8 py-3 text-center font-medium text-slate-700 transition-colors hover:bg-slate-100 sm:w-auto">
                            Kembali
                        </a>
                        <button type="submit" id="startBtn" disabled
                            class="flex w-full items-center justify-center rounded-lg bg-blue-600 px-8 py-3 font-medium text-white transition-all duration-300 hover:bg-blue-700 disabled:cursor-not-allowed disabled:bg-slate-300 disabled:text-slate-500 sm:w-auto">
                            <span id="btnText">Mulai Ujian</span>
                            <span id="btnLoader" class="hidden items-center">
                                <svg class="mr-2 h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Memulai...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const agreement = document.getElementById('agreement');
            const startBtn = document.getElementById('startBtn');
            const form = document.getElementById('startExamForm');
            const btnText = document.getElementById('btnText');
            const btnLoader = document.getElementById('btnLoader');

            // Enable/disable start button based on agreement checkbox
            agreement.addEventListener('change', function() {
                startBtn.disabled = !this.checked;
            });

            // Handle form submission
            form.addEventListener('submit', function(e) {
                if (agreement.checked) {
                    startBtn.disabled = true;
                    // Menggunakan class `flex` untuk menampilkan loader yang juga flex container
                    btnLoader.classList.remove('hidden');
                    btnLoader.classList.add('flex');
                    btnText.classList.add('hidden');
                } else {
                    // Mencegah form submit jika (karena suatu hal) checkbox tidak tercentang
                    e.preventDefault();
                }
            });

            // Auto-scroll to top on page load (opsional, tapi bagus untuk UX)
            window.scrollTo(0, 0);
        });
    </script>
@endpush
