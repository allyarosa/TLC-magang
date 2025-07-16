@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8 bg-gray-50 min-h-screen">
        @php use Vinkla\Hashids\Facades\Hashids; @endphp
        <!-- List Header -->
        {{-- <div class="mb-4 sm:mb-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-black border-b-4 border-yellow-500 pb-2 inline-block">
                List Asesi Level B
            </h1>
        </div> --}}

        <div class="bg-white rounded-lg shadow-md p-3 sm:p-4 lg:p-6 mb-4 sm:mb-6">
            <div class="mb-4 sm:mb-6">
                <h2 class="text-xl sm:text-xl font-bold text-gray-800">Daftar Asesi</h2>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">Kelola dan nilai Asesi Level B </p>
            </div>

            <div class="flex flex-col space-y-3 sm:space-y-4 lg:flex-row lg:justify-between lg:space-y-0 mb-4 sm:mb-6">
                <!-- Search -->
                <div class="relative w-full lg:w-auto">
                    <form method="GET" action="{{ route('asesor.list-asesi') }}"
                        class="flex flex-col sm:flex-row gap-2 sm:items-center mb-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari asesi..."
                            class="pl-8 sm:pl-10 pr-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg w-full lg:w-64 xl:w-72 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 text-sm sm:text-base">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-800 text-white rounded-lg text-sm hover:bg-blue-700 transition">Cari</button>
                    </form>

                </div>

                <!-- Filters -->
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                    <div class="flex gap-2 sm:gap-3">
                        <button
                            class="flex items-center justify-center gap-1 sm:gap-2 border border-blue-800 text-blue-800 px-3 sm:px-4 py-2 rounded-lg hover:bg-blue-50 transition duration-200 text-xs sm:text-sm flex-1 sm:flex-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            <span class="hidden sm:inline">Filter</span>
                        </button>
                        <button
                            class="flex items-center justify-center gap-1 sm:gap-2 border border-blue-800 text-blue-800 px-3 sm:px-4 py-2 rounded-lg hover:bg-blue-50 transition duration-200 text-xs sm:text-sm flex-1 sm:flex-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span class="hidden sm:inline">Urutkan</span>
                        </button>
                    </div>
                    <div class="relative">
                        <form method="GET" action="{{ route('asesor.list-asesi') }}" class="mb-4">
                            <select name="kategori" onchange="this.form.submit()"
                                class="appearance-none border border-gray-300 rounded-lg pl-3 sm:pl-4 pr-8 sm:pr-10 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 w-full sm:w-auto text-xs sm:text-sm">
                                <option value="">Semua Kategori</option>
                                <option value="modul_ajar" {{ request('kategori') === 'modul_ajar' ? 'selected' : '' }}>
                                    Modul Ajar
                                </option>
                                <option value="file_ppt" {{ request('kategori') === 'file_ppt' ? 'selected' : '' }}>PPT
                                </option>
                            </select>
                        </form>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-3 w-3 sm:h-4 sm:w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block overflow-x-auto border border-gray-200 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead style="background-color: #00549D;">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Nama Asesi
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Kategori
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Terakhir Diperbarui
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Nilai
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Row 1 -->

                        @forelse ($levelB as $index)
                            <tr class="hover:bg-blue-50">
                                {{-- NAME --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-700">
                                        {{ Str::ucfirst($index->user->name) }}
                                    </div>
                                </td>

                                {{-- CATEGORY --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($index->file_ppt == null)
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Modul Ajar
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                            PPT
                                        </span>
                                    @endif

                                </td>

                                {{-- STATUS --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $status = $index->status;
                                    @endphp

                                    @if ($status === 'pending')
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Menunggu
                                        </span>
                                    @elseif ($status === 'reviewed')
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Lulus
                                        </span>
                                    @elseif ($status === 'rejected')
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Tidak Lulus
                                        </span>
                                    @endif
                                </td>

                                {{-- LAST UPDATED --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $index->updated_at->diffForHumans() }}
                                </td>

                                {{-- NILAI --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if ($index->score == 0)
                                        Belum Dinilai
                                    @else
                                        {{ $index->score }}
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm flex justify-end">
                                    @if ($index->score)
                                        <a href="{{ route('asesor.gradeB.show', Vinkla\Hashids\Facades\Hashids::encode($index->id)) }}"
                                            class="bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded-lg flex items-center gap-1 shadow-md font-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            Sudah Dinilai
                                        </a>
                                    @else
                                        <a href="{{ route('asesor.gradeB.asesi', Vinkla\Hashids\Facades\Hashids::encode($index->id)) }}"
                                            class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded-lg flex items-center gap-1 border border-red-600 font-semibold">
                                            Belum Dinilai
                                        </a>
                                    @endif
                                    <button class="text-gray-500 hover:text-gray-700 ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <p>empty</p>
                        @endforelse
                        {{-- <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                2 jam yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Nilai
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr> --}}

                        {{-- <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Siti Rahayu</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                    Kategori C
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                3 jam yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Nilai
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr> --}}
                        {{-- 
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Agus Wijaya</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Lulus
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                1 hari yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: #0083D0;">
                                85
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="border border-blue-800 text-blue-800 hover:bg-blue-50 px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $levelB->links() }}
            </div>

            <div class="lg:hidden space-y-4">
                <!-- Card 1 -->
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                    <div class="flex flex-col space-y-3">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Budi Santoso</h3>
                                <p class="text-xs text-gray-500 mt-1">2 jam yang lalu</p>
                            </div>
                            <div class="flex flex-col items-end space-y-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                            <div class="text-sm">
                                <span class="text-gray-600">Nilai: </span>
                                <span class="font-medium text-gray-500">-</span>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-xs transition duration-200">
                                    Nilai
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                    <div class="flex flex-col space-y-3">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Siti Rahayu</h3>
                                <p class="text-xs text-gray-500 mt-1">3 jam yang lalu</p>
                            </div>
                            <div class="flex flex-col items-end space-y-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-pink-100 text-pink-800">
                                    Kategori C
                                </span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                            <div class="text-sm">
                                <span class="text-gray-600">Nilai: </span>
                                <span class="font-medium text-gray-500">-</span>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-xs transition duration-200">
                                    Nilai
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                    <div class="flex flex-col space-y-3">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Agus Wijaya</h3>
                                <p class="text-xs text-gray-500 mt-1">1 hari yang lalu</p>
                            </div>
                            <div class="flex flex-col items-end space-y-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Lulus
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                            <div class="text-sm">
                                <span class="text-gray-600">Nilai: </span>
                                <span class="font-medium" style="color: #0083D0;">85</span>
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="border border-blue-800 text-blue-800 hover:bg-blue-50 px-3 py-1.5 rounded-lg text-xs transition duration-200">
                                    Unduh
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            {{-- <div class="mt-6 flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4">
                <button
                    class="bg-blue-800 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg hover:bg-blue-700 transition duration-200 text-sm sm:text-base w-full sm:w-auto">
                    Lihat Semua Asesi
                </button>
            </div> --}}
        </div>

        <script>
            if (window.innerWidth >= 1024) {
                document.querySelectorAll('tbody tr').forEach(row => {
                    row.addEventListener('mouseenter', () => {
                        row.classList.add('bg-blue-50', 'transition-colors', 'duration-200');
                    });

                    row.addEventListener('mouseleave', () => {
                        row.classList.remove('bg-blue-50');
                    });
                });
            }

            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();

                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        top: ${y}px;
                        left: ${x}px;
                        background: rgba(255, 255, 255, 0.7);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                    `;

                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            document.querySelectorAll('.lg\\:hidden .bg-white.border').forEach(card => {
                card.addEventListener('click', function(e) {
                    if (!e.target.closest('button')) {
                        this.classList.add('ring-2', 'ring-blue-200', 'ring-offset-2');
                        setTimeout(() => {
                            this.classList.remove('ring-2', 'ring-blue-200', 'ring-offset-2');
                        }, 300);
                    }
                });
            });

            const searchInput = document.querySelector('input[placeholder="Cari asesi..."]');
            if (searchInput) {
                searchInput.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-500', 'ring-offset-2');
                });

                searchInput.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-500', 'ring-offset-2');
                });
            }

            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }

                @media (max-width: 1023px) {
                    .hover\\:bg-blue-50:hover {
                        background-color: transparent;
                    }
                }

                /* Custom scrollbar for mobile horizontal scroll */
                @media (max-width: 1023px) {
                    .overflow-x-auto::-webkit-scrollbar {
                        height: 4px;
                    }
                    .overflow-x-auto::-webkit-scrollbar-track {
                        background: #f1f5f9;
                        border-radius: 4px;
                    }
                    .overflow-x-auto::-webkit-scrollbar-thumb {
                        background: #cbd5e1;
                        border-radius: 4px;
                    }
                    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
                        background: #94a3b8;
                    }
                }
            `;
            document.head.appendChild(style);

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    document.querySelectorAll('.lg\\:hidden .bg-white.border').forEach(card => {
                        card.classList.remove('ring-2', 'ring-blue-200', 'ring-offset-2');
                    });
                }
            });
        </script>
    </section>
@endsection
