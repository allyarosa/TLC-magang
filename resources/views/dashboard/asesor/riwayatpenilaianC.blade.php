@extends('layouts.asesorDashboard')
@section('title', 'Riwayat Penilaian Level C')
@section('content')
    <section class="relative max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-xl md:text-2xl font-bold mb-1 text-black border-b-4 border-yellow-500 pb-2 inline-block">
            Riwayat Penilaian Level C
        </h1>

        <div class="bg-white mt-6 rounded-lg shadow-md overflow-hidden">
            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row lg:items-center p-4 lg:p-6 gap-4" style="background-color: #F8C82A;">
                <div class="flex items-center text-gray-800">
                    <svg class="w-6 h-6 text-gray-800 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="ml-2">
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900">Riwayat Penilaian Level C</h2>
                        <p class="text-xs lg:text-sm text-gray-700">Daftar penilaian video pembelajaran yang telah dilakukan</p>
                    </div>
                </div>

                <div
                    class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-2 lg:ml-auto">
                    <div class="relative">
                        <input type="text" placeholder="Cari asesi..."
                            class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 w-full sm:w-64 focus:outline-none focus:ring-2 focus:ring-blue-800 text-sm">
                        <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div class="flex space-x-2">
                        <button
                            class="flex-1 sm:flex-none px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 text-sm">
                            Filter
                        </button>
                        <a href="{{ route('asesor.riwayat-penilaian-b.export') }}"
                            class="flex-1 sm:flex-none px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 flex items-center justify-center text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Export
                        </a>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200" style="background-color: #00549D;">
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Nama Asesi
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Link Video
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Tanggal Review
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Nilai
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">Status</th>
                            <th class="py-3 px-6 text-right text-white font-medium text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($history as $item)
                            <tr class="hover:bg-blue-50">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900">{{ $item->user?->name }}</td>
                                <td class="py-4 px-6 text-sm text-gray-700">
                                    <a href="{{ $item->url_video }}" target="_blank" class="text-blue-600 hover:underline">
                                        {{ Str::limit($item->url_video, 50) }}
                                    </a>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-700">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y H:i') }}
                                    <span>WITA</span>
                                </td>
                                <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">{{ $item->score }}</td>
                                <td class="py-4 px-6 text-sm">
                                    <span
                                        class="px-3 py-1 @if($item->is_passed == 'passed') bg-green-500 @elseif($item->is_passed == 'rejected') bg-red-500 @else bg-yellow-500 @endif text-white rounded-full text-xs font-medium">{{ Str::ucfirst($item->is_passed) }}</span>
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <a href="{{ route('asesor.riwayat-penilaian-c-detail', Vinkla\Hashids\Facades\Hashids::encode($item->id)) }}"
                                        class="text-blue-800 hover:text-blue-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="lg:hidden divide-y divide-gray-100">
                @foreach ($history as $item)
                <div class="p-4 hover:bg-blue-50">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-medium text-gray-900 text-sm">{{ $item->user?->name }}</h3>
                        <button class="text-blue-800 hover:text-blue-600 ml-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="space-y-1 text-xs text-gray-600">
                        <div class="flex justify-between">
                            <span>Link Video:</span>
                            <span class="text-gray-700">
                                <a href="{{ $item->url_video }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ Str::limit($item->url_video, 30) }}
                                </a>
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tanggal:</span>
                            <span class="text-gray-700">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Nilai:</span>
                            <span class="font-medium" style="color: #0083D0;">{{ $item->score }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Status:</span>
                            <span class="px-2 py-1 @if($item->is_passed == 'passed') bg-green-500 @elseif($item->is_passed == 'rejected') bg-red-500 @else bg-yellow-500 @endif text-white rounded-full text-xs font-medium">{{ Str::ucfirst($item->is_passed) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
