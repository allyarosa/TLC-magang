@extends('layouts.adminDashboard')

@section('title', 'Manajemen Level A')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Sertifikasi Level A</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola kategori dan pertanyaan untuk sertifikasi Level A.</p>
            </div>
            <nav class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
                <span class="text-blue-600 font-semibold">Level A</span>
                <span class="text-gray-300">/</span>
                <a href="{{ route('admin.level.b.index') }}" class="hover:text-blue-600 transition-colors">Level B</a>
                <span class="text-gray-300">/</span>
                <a href="{{ route('admin.level.c.index') }}" class="hover:text-blue-600 transition-colors">Level C</a>
            </nav>
        </div>

        <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-8 flex items-start gap-3">
            <div class="bg-blue-100 text-blue-600 rounded-full p-1.5 shrink-0 mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-blue-900 text-sm">Panduan Alur Kerja</h3>
                <p class="text-blue-700 text-sm mt-1">
                    Mulailah dengan membuat <strong>Kategori</strong>, kemudian tambahkan <strong>Pertanyaan</strong> ke dalam kategori tersebut.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('admin.categories.a.index') }}" class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-blue-200 transition-all duration-300 flex items-start gap-5 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform duration-500"></div>
                
                <div class="bg-blue-50 text-blue-600 rounded-xl p-4 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 relative z-10">
                    <i class="fa-solid fa-layer-group text-2xl"></i>
                </div>
                <div class="flex-1 relative z-10">
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">Kategori Pertanyaan</h3>
                    <p class="text-gray-500 text-sm mt-1 leading-relaxed">
                        Buat dan atur topik untuk struktur ujian sertifikasi.
                    </p>
                    <div class="mt-4 flex items-center text-blue-600 text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity transform translate-x-[-10px] group-hover:translate-x-0">
                        Kelola Kategori <i class="fa-solid fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.question.a.index') }}" class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-teal-200 transition-all duration-300 flex items-start gap-5 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-teal-50 rounded-full opacity-50 group-hover:scale-110 transition-transform duration-500"></div>

                <div class="bg-teal-50 text-teal-600 rounded-xl p-4 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300 relative z-10">
                    <i class="fa-solid fa-circle-question text-2xl"></i>
                </div>
                <div class="flex-1 relative z-10">
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-teal-600 transition-colors">Bank Soal</h3>
                    <p class="text-gray-500 text-sm mt-1 leading-relaxed">
                        Tambah, edit, dan kelola soal ujian yang ditugaskan ke kategori.
                    </p>
                    <div class="mt-4 flex items-center text-teal-600 text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity transform translate-x-[-10px] group-hover:translate-x-0">
                        Kelola Pertanyaan <i class="fa-solid fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection