@extends('layouts.asesiDashboard')
@section('title', 'Teaching & Learning Certification')

@section('content')

{{-- Main Content --}}
<div class="min-h-screen bg-gray-50 py-8">
    {{-- Back Button --}}
    <div class="max-w-4xl mx-auto px-4 mb-6">
        <a href="{{ route('asesi.sertifikasi') }}">
            <button onclick="window.location.href=''" class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span>Kembali ke Sertifikasi</span>
            </button>
        </a>
    </div>

    {{-- Certificate Section --}}
    <div class="max-w-4xl mx-auto px-4 mb-12">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            {{-- Certificate Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white rounded-full p-3">
                            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">HAFECS</h1>
                            <p class="text-blue-100 text-sm">SERTIFIKAT</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-blue-100 text-sm">LEVEL B</p>
                        <p class="text-white font-semibold">TEACHING</p>
                    </div>
                </div>
            </div>

            {{-- Certificate Body --}}
            <div class="px-8 py-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Teaching Activation Certification</h2>
                    <p class="text-gray-600">Level B - Diberikan kepada</p>
                </div>

                <div class="text-center mb-8">
                    <h3 class="text-4xl font-bold text-blue-600 mb-2">Hamas Akif Sanie</h3>
                    <p class="text-gray-600">atas pencapaian dalam menyelesaikan sertifikasi</p>
                </div>

                <div class="flex justify-between items-end mb-8">
                    <div class="text-left">
                        <p class="text-sm text-gray-500 mb-1">ID Sertifikat</p>
                        <p class="font-mono text-lg font-semibold">TLC-B-2024001</p>
                        <p class="text-sm text-gray-500 mt-4 mb-1">Berlaku sampai</p>
                        <p class="font-semibold">June 18, 2027</p>
                    </div>
                    <div class="text-right">
                        <div class="w-24 h-24 bg-gray-200 flex items-center justify-center rounded">
                            <span class="text-xs text-gray-500">QR Code</span>
                        </div>
                    </div>
                </div>

                <div class="border-t pt-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-500">Dikeluarkan pada</p>
                            <p class="font-semibold">June 18, 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Verifikasi sertifikat</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold">
                                Lihat pada HAFECS →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Verification Button --}}
        <div class="text-center mt-6">
            <button class="bg-gray-700 hover:bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                Periksa Sertifikat
            </button>
        </div>
    </div>

    {{-- Course Details Section --}}
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column - Course Info --}}
            <div class="lg:col-span-2">
                <div class="flex items-start space-x-6 mb-8">
                    <img src="https://via.placeholder.com/120x120" alt="Course thumbnail" class="w-24 h-24 rounded-lg object-cover">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Teaching Activation Certification Level B</h2>
                        <p class="text-gray-600 mb-2">Disusun oleh: Teaching & Learning Certification (TLC) HAFECS</p>
                        <p class="text-gray-600 mb-4">Level: Menengah</p>
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                </svg>
                                Biaya: Rp 125.000,-
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Course Description --}}
                <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Tentang Sertifikasi Level B:</h3>
                    <p class="text-gray-700 mb-6">
                        Sertifikasi Level B bertujuan untuk menguji keterampilan guru melalui aktivasi pengetahuan PCK (Pedagogical Content Knowledge) dan HOTS (Higher Order Thinking Skills) dalam pengajaran serta mengembangkan lesson plan (Modul Ajar), Teaching Tactics dan Teaching Scenario untuk menunjang efektivitas pengajaran guru di kelas.
                    </p>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Syarat Pendaftaran:</h3>
                    <div class="bg-blue-50 rounded-lg p-4 mb-6">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <p class="text-gray-700">Telah mengikuti Sertifikasi Level A oleh Teaching & Learning Certification (TLC) HAFECS</p>
                        </div>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Skema Pelaksanaan:</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Penugasan di LMS Elevate</p>
                                <p class="text-gray-600 text-sm">Mengikuti penugasan dan aktivitas pembelajaran melalui Learning Management System Elevate</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Training Intensif</p>
                                <p class="text-gray-600 text-sm">Mengikuti training sebanyak 12 kali pertemuan dengan fokus pada pengembangan kompetensi pedagogis</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Teaching Mastery Framework (TMF)</p>
                                <p class="text-gray-600 text-sm">Merancang pembelajaran berbasis Teaching Mastery Framework untuk meningkatkan efektivitas pengajaran</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Pengembangan Modul Ajar</p>
                                <p class="text-gray-600 text-sm">Menyusun dan mengembangkan lesson plan/modul ajar yang sesuai dengan standar kompetensi</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Teaching Tactics & Scenario</p>
                                <p class="text-gray-600 text-sm">Merancang dan menerapkan berbagai taktik dan skenario pengajaran yang efektif</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Aktivasi PCK dan HOTS</p>
                                <p class="text-gray-600 text-sm">Mengintegrasikan Pedagogical Content Knowledge dan Higher Order Thinking Skills dalam praktik mengajar</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Pengembangan Materi Ajar</p>
                                <p class="text-gray-600 text-sm">Menyusun materi ajar dalam bentuk presentasi (PPT) yang menarik dan efektif</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <p class="font-semibold text-gray-800">Efektivitas Pengajaran di Kelas</p>
                                <p class="text-gray-600 text-sm">Implementasi strategi dan metode untuk meningkatkan efektivitas pengajaran di dalam kelas</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                        <h4 class="font-semibold text-gray-800 mb-2">Penilaian Sertifikasi:</h4>
                        <div class="space-y-2">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                <p class="text-gray-700">Penilaian oleh Asesor untuk Modul Ajar/Lesson Plan</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                <p class="text-gray-700">Evaluasi Materi Ajar (PPT) yang telah dikembangkan</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-4">
                            Sertifikasi ini dirancang khusus untuk guru yang ingin meningkatkan kompetensi pedagogis dan mengembangkan keterampilan mengajar yang lebih efektif.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Right Column - Certificate Info --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Hamas Akif Sanie</h3>
                        <p class="text-gray-600 text-sm mb-4">TLC-B-2024001</p>
                    </div>

                    <div class="space-y-4 text-sm">
                        <div>
                            <p class="text-gray-500 mb-1">Dikeluarkan pada</p>
                            <p class="font-semibold">June 18, 2024</p>
                        </div>
                        <div>
                            <p class="text-gray-500 mb-1">Berlaku sampai</p>
                            <p class="font-semibold">June 18, 2027</p>
                        </div>
                        <div>
                            <p class="text-gray-500 mb-1">Level Sertifikasi</p>
                            <p class="font-semibold text-blue-600">Level B - Teaching Activation</p>
                        </div>
                        <div>
                            <p class="text-gray-500 mb-1">Institusi</p>
                            <p class="font-semibold">HAFECS TLC</p>
                        </div>
                        <div class="pt-4 border-t">
                            <p class="text-gray-500 mb-2">Bagikan sertifikat:</p>
                            <div class="flex space-x-3">
                                <a href="#" class="flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-center w-8 h-8 bg-blue-400 text-white rounded hover:bg-blue-500">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-center w-8 h-8 bg-blue-800 text-white rounded hover:bg-blue-900">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-center w-8 h-8 bg-gray-600 text-white rounded hover:bg-gray-700">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.77 7.46H5.23v9.08h13.54V7.46zM7.69 8.84h8.62v6.32H7.69V8.84z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4">
                            <a href="#" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded font-semibold transition-colors inline-block">
                                TAMBAHKAN KE LINKEDIN
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- End Main Content --}}

@endsection