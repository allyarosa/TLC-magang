@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-8">
        <h1 class="text-xl sm:text-2xl font-bold mb-1 text-black border-b-4 border-yellow-500 pb-2 inline-block">
            Riwayat Aktivitas
        </h1>
        <p class="text-sm sm:text-base text-gray-600">Terakhir login/menilai</p>

        <div class="bg-white mt-4 sm:mt-6 rounded-lg shadow-md overflow-hidden">
            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row lg:items-center p-4 sm:p-6 gap-4" style="background-color: #F8C82A;">
                <div class="flex items-center text-gray-800">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-800 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="ml-2">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">Riwayat Aktivitas</h2>
                        <p class="text-xs sm:text-sm text-gray-700">Semua aktivitas yang telah Anda lakukan</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 lg:ml-auto w-full lg:w-auto">
                    <div class="relative flex-1 sm:flex-none">
                        <input type="text" placeholder="Cari aktivitas..."
                            class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 w-full sm:w-64 focus:outline-none focus:ring-2 focus:ring-blue-800 text-sm">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 absolute left-3 top-2.5 sm:top-3 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <!-- Button Group -->
                    <div class="flex gap-2">
                        <!-- Filter Button -->
                        <button
                            class="px-3 sm:px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                        </button>

                        <!-- Dropdown Button -->
                        <div class="relative flex-1 sm:flex-none">
                            <button
                                class="flex items-center justify-between px-3 sm:px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 w-full sm:w-auto text-sm">
                                <span class="hidden sm:inline">Semua Aktivitas</span>
                                <span class="sm:hidden">Semua</span>
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-1 sm:ml-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Calendar Button -->
                        <button
                            class="px-3 sm:px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 flex items-center flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <div class="block sm:hidden">
                    <div class="divide-y divide-gray-100">
                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">1.</span>
                                    <span class="text-sm font-medium text-green-700">Penilaian</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Menilai Dewi Sartika (Kompetensi C)</p>
                            <p class="text-xs text-gray-500">5 Apr 2023, 14:30</p>
                        </div>

                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">2.</span>
                                    <span class="text-sm font-medium text-green-700">Login</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Login ke sistem</p>
                            <p class="text-xs text-gray-500">5 Apr 2023, 09:15</p>
                        </div>

                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">3.</span>
                                    <span class="text-sm font-medium text-green-700">Penilaian</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Menilai Ahmad Dahlan (Kompetensi B)</p>
                            <p class="text-xs text-gray-500">3 Apr 2023, 11:45</p>
                        </div>

                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">4.</span>
                                    <span class="text-sm font-medium text-green-700">Download</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Download laporan penilaian</p>
                            <p class="text-xs text-gray-500">2 Apr 2023, 16:20</p>
                        </div>

                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">5.</span>
                                    <span class="text-sm font-medium text-green-700">Penilaian</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Menilai Kartini (Kompetensi C)</p>
                            <p class="text-xs text-gray-500">1 Apr 2023, 10:30</p>
                        </div>

                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">6.</span>
                                    <span class="text-sm font-medium text-green-700">Login</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Login ke sistem</p>
                            <p class="text-xs text-gray-500">1 Apr 2023, 08:45</p>
                        </div>

                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">7.</span>
                                    <span class="text-sm font-medium text-green-700">Penilaian</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Menilai Sukarno (Kompetensi B)</p>
                            <p class="text-xs text-gray-500">28 Mar 2023, 13:15</p>
                        </div>

                        <div class="p-4 hover:bg-blue-50">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium mr-2" style="color: #0083D0;">8.</span>
                                    <span class="text-sm font-medium text-green-700">Download</span>
                                </div>
                                <span
                                    class="px-2 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </div>
                            <p class="text-sm text-gray-900 mb-1">Download template penilaian</p>
                            <p class="text-xs text-gray-500">27 Mar 2023, 15:40</p>
                        </div>
                    </div>
                </div>

                <table class="min-w-full hidden sm:table">
                    <thead>
                        <tr class="border-b border-gray-200" style="background-color: #00549D;">
                            <th class="py-3 px-3 sm:px-6 text-left text-white font-medium text-xs sm:text-sm">No</th>
                            <th class="py-3 px-3 sm:px-6 text-left text-white font-medium text-xs sm:text-sm">
                                <div class="flex items-center">
                                    Aktivitas
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-3 sm:px-6 text-left text-white font-medium text-xs sm:text-sm">
                                <div class="flex items-center">
                                    Detail
                                </div>
                            </th>
                            <th class="py-3 px-3 sm:px-6 text-left text-white font-medium text-xs sm:text-sm">
                                <div class="flex items-center">
                                    Tanggal & Waktu
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-3 sm:px-6 text-left text-white font-medium text-xs sm:text-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">1
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Penilaian
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Menilai Dewi Sartika
                                (Kompetensi C)</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">5 Apr 2023, 14:30</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">2
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Login</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Login ke sistem</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">5 Apr 2023, 09:15</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">3
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Penilaian
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Menilai Ahmad Dahlan
                                (Kompetensi B)</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">3 Apr 2023, 11:45</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">4
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Download
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Download laporan
                                penilaian</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">2 Apr 2023, 16:20</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">5
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Penilaian
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Menilai Kartini
                                (Kompetensi C)</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">1 Apr 2023, 10:30</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">6
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Login</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Login ke sistem</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">1 Apr 2023, 08:45</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">7
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Penilaian
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Menilai Sukarno
                                (Kompetensi B)</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">28 Mar 2023, 13:15</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium" style="color: #0083D0;">8
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm font-medium text-green-700">Download
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-900">Download template
                                penilaian</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm text-gray-500">27 Mar 2023, 15:40</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-6 text-xs sm:text-sm">
                                <span
                                    class="px-2 sm:px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between p-4 sm:p-6 gap-4">
                <div class="text-xs sm:text-sm text-gray-700 order-2 sm:order-1">
                    Menampilkan 1-8 dari 45 aktivitas
                </div>
                <div class="flex flex-wrap justify-center gap-1 order-1 sm:order-2">
                    <button
                        class="px-2 sm:px-3 py-1 text-xs sm:text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-100">
                        Sebelumnya
                    </button>
                    <button
                        class="px-2 sm:px-3 py-1 text-xs sm:text-sm text-white bg-blue-800 border border-blue-800 rounded-md">
                        1
                    </button>
                    <button
                        class="px-2 sm:px-3 py-1 text-xs sm:text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-blue-800 hover:text-white">
                        2
                    </button>
                    <button
                        class="px-2 sm:px-3 py-1 text-xs sm:text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-blue-800 hover:text-white">
                        3
                    </button>
                    <button
                        class="px-2 sm:px-3 py-1 text-xs sm:text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-blue-800 hover:text-white">
                        4
                    </button>
                    <button
                        class="px-2 sm:px-3 py-1 text-xs sm:text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-100">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>

        <button
            class="fixed bottom-4 sm:bottom-5 right-4 sm:right-5 bg-blue-800 text-white p-2 sm:p-3 rounded-full shadow-lg transform transition-all duration-300 hover:bg-blue-700 hover:scale-110 focus:outline-none">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
            </svg>
        </button>
    </section>
@endsection
