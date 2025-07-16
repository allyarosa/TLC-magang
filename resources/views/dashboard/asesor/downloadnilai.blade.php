@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="max-w-7xl mx-auto p-2 sm:p-4">
        <h1 class="text-xl sm:text-2xl font-bold text-blue-800 mb-4 border-b-4 border-yellow-500 pb-2 inline-block">
            Download Nilai
        </h1>

        <div class="bg-blue-50 rounded-t-lg">
            <div class="flex">
                <button id="tab-individual"
                    class="flex-1 py-3 sm:py-4 text-center font-medium bg-blue-800 text-white rounded-t-lg text-sm sm:text-base">
                    <span class="hidden sm:inline">Nilai Individual</span>
                    <span class="sm:hidden">Individual</span>
                </button>
                <button id="tab-laporan" class="flex-1 py-3 sm:py-4 text-center text-gray-700 text-sm sm:text-base">
                    <span class="hidden sm:inline">Laporan</span>
                    <span class="sm:hidden">Reports</span>
                </button>
            </div>
        </div>

        <div class="bg-white p-3 sm:p-6 rounded-b-lg shadow">
            <!-- Nilai Individual View -->
            <div id="view-individual">
                <div class="mb-4 sm:mb-6">
                    <h2 class="text-lg sm:text-xl font-bold mb-1">Download Nilai Individual</h2>
                    <p class="text-gray-600 text-xs sm:text-sm">Download nilai asesi dalam format PDF atau Excel</p>
                </div>

                <!-- Filters -->
                <div class="flex flex-col sm:flex-row sm:flex-wrap gap-3 sm:gap-4 mb-4 sm:mb-6">
                    <div class="relative flex-1 sm:flex-none">
                        <select class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-3 sm:px-4 pr-8 w-full sm:w-56 text-sm sm:text-base">
                            <option>Semua Kategori</option>
                            <option>Kategori A</option>
                            <option>Kategori B</option>
                            <option>Kategori C</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative flex-1 sm:flex-none">
                        <select class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-3 sm:px-4 pr-8 w-full sm:w-56 text-sm sm:text-base">
                            <option>April 2023</option>
                            <option>Maret 2023</option>
                            <option>Februari 2023</option>
                            <option>Januari 2023</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:ml-auto">
                        <button class="flex items-center justify-center px-3 sm:px-4 py-2 border border-gray-300 rounded bg-white text-sm sm:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Cetak
                        </button>
                        <button class="flex items-center justify-center px-3 sm:px-4 py-2 border border-gray-300 rounded bg-white text-sm sm:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            PDF
                        </button>
                        <button class="flex items-center justify-center px-3 sm:px-4 py-2 border border-blue-900 rounded bg-blue-800 text-white text-sm sm:text-base">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Excel
                        </button>
                    </div>
                </div>

                <div class="block sm:hidden space-y-3">
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-500 mr-3">
                                <div>
                                    <h3 class="font-medium text-sm">Budi Santoso</h3>
                                    <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs mt-1 inline-block">Kategori B</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-blue-600 font-medium text-lg">85</div>
                                <div class="text-gray-500 text-xs">12 Apr 2023</div>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 px-3 py-2 border border-gray-300 rounded flex items-center justify-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                PDF
                            </button>
                            <button class="flex-1 px-3 py-2 border border-gray-300 rounded flex items-center justify-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Excel
                            </button>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-500 mr-3">
                                <div>
                                    <h3 class="font-medium text-sm">Siti Rahayu</h3>
                                    <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs mt-1 inline-block">Kategori C</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-yellow-500 font-medium text-lg">78</div>
                                <div class="text-gray-500 text-xs">15 Apr 2023</div>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 px-3 py-2 border border-gray-300 rounded flex items-center justify-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                PDF
                            </button>
                            <button class="flex-1 px-3 py-2 border border-gray-300 rounded flex items-center justify-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Excel
                            </button>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-500 mr-3">
                                <div>
                                    <h3 class="font-medium text-sm">Agus Wijaya</h3>
                                    <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs mt-1 inline-block">Kategori B</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-purple-600 font-medium text-lg">92</div>
                                <div class="text-gray-500 text-xs">18 Apr 2023</div>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 px-3 py-2 border border-gray-300 rounded flex items-center justify-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                PDF
                            </button>
                            <button class="flex-1 px-3 py-2 border border-gray-300 rounded flex items-center justify-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Excel
                            </button>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-600">
                                <th class="pb-3 pr-4">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </th>
                                <th class="pb-3">Nama Asesi</th>
                                <th class="pb-3">Kategori</th>
                                <th class="pb-3">Tanggal Penilaian</th>
                                <th class="pb-3">Nilai</th>
                                <th class="pb-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="border-t border-gray-100">
                                <td class="py-4 pr-4">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </td>
                                <td class="py-4 font-medium">Budi Santoso</td>
                                <td class="py-4">
                                    <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs">Kategori B</span>
                                </td>
                                <td class="py-4">12 Apr 2023</td>
                                <td class="py-4 text-blue-600 font-medium">85</td>
                                <td class="py-4">
                                    <div class="flex justify-end gap-2">
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <span class="ml-1">PDF</span>
                                        </button>
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="ml-1">Excel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="border-t border-gray-100">
                                <td class="py-4 pr-4">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </td>
                                <td class="py-4 font-medium">Siti Rahayu</td>
                                <td class="py-4">
                                    <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs">Kategori C</span>
                                </td>
                                <td class="py-4">15 Apr 2023</td>
                                <td class="py-4 text-yellow-500 font-medium">78</td>
                                <td class="py-4">
                                    <div class="flex justify-end gap-2">
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <span class="ml-1">PDF</span>
                                        </button>
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="ml-1">Excel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="border-t border-gray-100">
                                <td class="py-4 pr-4">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </td>
                                <td class="py-4 font-medium">Agus Wijaya</td>
                                <td class="py-4">
                                    <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs">Kategori B</span>
                                </td>
                                <td class="py-4">18 Apr 2023</td>
                                <td class="py-4 text-purple-600 font-medium">92</td>
                                <td class="py-4">
                                    <div class="flex justify-end gap-2">
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <span class="ml-1">PDF</span>
                                        </button>
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="ml-1">Excel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Laporan View -->
            <div id="view-laporan" class="hidden">
                <div class="mb-4 sm:mb-6">
                    <h2 class="text-lg sm:text-xl font-bold mb-1">Laporan Penilaian</h2>
                    <p class="text-gray-600 text-xs sm:text-sm">Download laporan penilaian bulanan dan kuartalan</p>
                </div>

                <!-- Filters -->
                <div class="flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-3 sm:gap-4 mb-4 sm:mb-6">
                    <div class="relative flex-1 sm:flex-none">
                        <select class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-3 sm:px-4 pr-8 w-full sm:w-56 text-sm sm:text-base">
                            <option>Semua Tipe</option>
                            <option>Bulanan</option>
                            <option>Kuartal</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative flex-1 sm:flex-none">
                        <select class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-3 sm:px-4 pr-8 w-full sm:w-56 text-sm sm:text-base">
                            <option>2023</option>
                            <option>2022</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <button class="flex items-center justify-center gap-2 px-3 sm:px-4 py-2 sm:ml-auto bg-blue-800 text-white rounded border border-blue-900 text-sm sm:text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="hidden sm:inline">Generate Laporan Baru</span>
                        <span class="sm:hidden">Generate Laporan</span>
                    </button>
                </div>

                <div class="block sm:hidden space-y-3">
                    <!-- Report Card 1 -->
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-sm mb-1">Laporan Bulanan April 2023</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <span>Bulanan</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Excel</span>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500">30 Apr 2023</div>
                        </div>
                        <button class="w-full flex items-center justify-center gap-1 text-blue-800 hover:text-blue-600 py-2 border border-blue-200 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </button>
                    </div>

                    <!-- Report Card 2 -->
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-sm mb-1">Laporan Kuartal 1 2023</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <span>Kuartal</span>
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">PDF</span>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500">31 Mar 2023</div>
                        </div>
                        <button class="w-full flex items-center justify-center gap-1 text-blue-800 hover:text-blue-600 py-2 border border-blue-200 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </button>
                    </div>

                    <!-- Report Card 3 -->
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-sm mb-1">Laporan Bulanan Maret 2023</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <span>Bulanan</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Excel</span>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500">31 Mar 2023</div>
                        </div>
                        <button class="w-full flex items-center justify-center gap-1 text-blue-800 hover:text-blue-600 py-2 border border-blue-200 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </button>
                    </div>

                    <!-- Report Card 4 -->
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-sm mb-1">Laporan Bulanan Februari 2023</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <span>Bulanan</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Excel</span>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500">28 Feb 2023</div>
                        </div>
                        <button class="w-full flex items-center justify-center gap-1 text-blue-800 hover:text-blue-600 py-2 border border-blue-200 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </button>
                    </div>

                    <!-- Report Card 5 -->
                    <div class="bg-gray-50 rounded-lg p-4 border">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex-1">
                                <h3 class="font-medium text-sm mb-1">Laporan Bulanan Januari 2023</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <span>Bulanan</span>
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Excel</span>
                                </div>
                            </div>
                            <div class="text-xs text-gray-500">31 Jan 2023</div>
                        </div>
                        <button class="w-full flex items-center justify-center gap-1 text-blue-800 hover:text-blue-600 py-2 border border-blue-200 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </button>
                    </div>
                </div>

                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-600 border-b border-gray-100">
                                <th class="pb-3">Nama Laporan</th>
                                <th class="pb-3">Tipe</th>
                                <th class="pb-3">Format</th>
                                <th class="pb-3">Tanggal Dibuat</th>
                                <th class="pb-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan April 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">30 Apr 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Kuartal 1 2023</td>
                                <td class="py-4">Kuartal</td>
                                <td class="py-4">
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">PDF</span>
                                </td>
                                <td class="py-4">31 Mar 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan Maret 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">31 Mar 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan Februari 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">28 Feb 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 5 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan Januari 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">31 Jan 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('tab-individual').addEventListener('click', function() {
                this.classList.add('bg-blue-800', 'text-white');
                document.getElementById('tab-laporan').classList.remove('bg-blue-800', 'text-white');

                document.getElementById('view-individual').classList.remove('hidden');
                document.getElementById('view-laporan').classList.add('hidden');
            });

            document.getElementById('tab-laporan').addEventListener('click', function() {
                this.classList.add('bg-blue-800', 'text-white');
                document.getElementById('tab-individual').classList.remove('bg-blue-800', 'text-white');

                document.getElementById('view-individual').classList.add('hidden');
                document.getElementById('view-laporan').classList.remove('hidden');
            });
        </script>
    </section>
@endsection