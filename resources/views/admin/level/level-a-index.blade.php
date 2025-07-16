@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-gray-600">
                <li><a href="{{ route('admin.level.a.index') }}" class="hover:underline text-indigo-600">Level A</a></li>
                <li>/</li>
                <li><a href="{{ route('admin.level.c.index') }}" class="hover:underline text-indigo-600">Level B</a></li>
                <li>/</li>
                <li><a href="{{ route('admin.level.c.index') }}" class="hover:underline text-indigo-600">Level C</a></li>
            </ol>
            <!-- Search & Info -->
        </nav>
    </div>

    <!-- Cards for Categories and Questions -->
    <!-- Cards for Categories and Questions with Improved Design -->
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Workflow Instructions -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-md shadow-sm">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <!-- Information Icon -->
                        <svg class="h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Alur Pengerjaan Sertifikasi Level A</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <p>Untuk mengelola bank soal dengan efektif, silakan ikuti langkah-langkah berikut:</p>
                            <ol class="list-decimal list-inside mt-2 ml-2 space-y-1">
                                <li>Buat dan atur kategori soal terlebih dahulu</li>
                                <li>Kemudian tambahkan soal-soal sesuai dengan kategori yang telah dibuat</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kategori Card -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg border border-gray-100">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4">
                        <div class="flex items-center">
                            <div class="bg-white bg-opacity-30 rounded-lg p-3">
                                <i class="fa-solid fa-layer-group" style="font-size: 28px; color: #3b82f6;"></i>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-white">Kategori Soal</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <p class="text-gray-600 mb-2">Langkah 1: Kelola kategori soal sertifikasi untuk mengorganisir
                                bank soal dengan lebih terstruktur.</p>
                            <div class="flex items-center text-sm text-gray-500 mt-3">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Membuat struktur yang terorganisir</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mt-2">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Mempermudah manajemen soal</span>
                            </div>
                        </div>

                        <a href="{{ route('admin.categories.a.index') }}"
                            class="block w-full text-center bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300 transform">
                            <div class="flex items-center justify-center">
                                <span>Kelola Kategori</span>
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Bank Soal Card -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg border border-gray-100">
                    <div class="bg-gradient-to-r from-green-500 to-teal-500 p-4">
                        <div class="flex items-center">
                            <div class="bg-white bg-opacity-30 rounded-lg p-3">
                                <i class="fa-solid fa-circle-question" style="font-size: 30px; color: #14B8A6;"></i>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-white">Bank Soal</h3>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <p class="text-gray-600 mb-2">Langkah 2: Kelola bank soal untuk ujian sertifikasi setelah
                                kategori selesai dibuat.</p>
                            <div class="flex items-center text-sm text-gray-500 mt-3">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Buat soal-soal berkualitas</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mt-2">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Atur soal berdasarkan kategori</span>
                            </div>
                        </div>

                        <a href="{{ route('admin.question.a.index') }}"
                            class="block w-full text-center bg-gradient-to-r from-green-500 to-teal-500 hover:from-green-600 hover:to-teal-600 text-white font-medium py-3 px-4 rounded-lg transition duration-300 transform">
                            <div class="flex items-center justify-center">
                                <span>Kelola Soal</span>
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card for Questions -->
    </div>
    </div>
    </div>

    <!-- Pagination -->


@endsection
