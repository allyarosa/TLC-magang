@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6">
        <!-- Notifikasi Header -->
        <div class="mb-4 sm:mb-6 transform transition duration-500 hover:translate-x-2">
            <h1 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800 relative inline-block">
                Notifikasi
                <span class="absolute -right-3 -top-2 flex h-4 w-4">
                    {{-- <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-yellow-500"></span> --}}
                </span>
            </h1>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">Asets yang menunggu untuk dinilai dan notifikasi lainnya</p>
        </div>

        <!-- Notifikasi Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 mb-6 sm:mb-8">
            <!-- Menunggu Penilaian Card -->
            <div
                class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-3 sm:p-4 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 hover:scale-103 cursor-pointer group">
                <div class="flex items-start">
                    <div
                        class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 transition-all duration-300 shadow-sm group-hover:shadow flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600 group-hover:text-blue-700 group-hover:rotate-12 transition-all duration-300"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2
                            class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                            Menunggu Penilaian</h2>
                        <div class="flex items-center mt-1">
                            <span
                                class="text-xl sm:text-2xl font-bold text-gray-800 mr-2 group-hover:text-blue-600 transition-colors duration-300">{{ $levelBPending }}</span>
                            <span class="text-xs text-gray-600">Asets yang menunggu untuk dinilai</span>
                        </div>
                        <button
                            class="mt-2 sm:mt-3 bg-blue-800 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium py-1.5 px-2 sm:px-3 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 w-full sm:w-auto">
                            Nilai Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tenggat Dekat Card -->
            <div
                class="bg-gradient-to-br from-yellow-50 to-yellow-100 border border-yellow-200 rounded-lg p-3 sm:p-4 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 hover:scale-103 cursor-pointer group">
                <div class="flex items-start">
                    <div
                        class="bg-yellow-100 group-hover:bg-yellow-200 rounded-full p-2 mr-3 transition-all duration-300 shadow-sm group-hover:shadow flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 sm:h-5 sm:w-5 text-yellow-600 group-hover:text-yellow-700 group-hover:animate-pulse transition-all duration-300"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2
                            class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                            Tenggat Dekat</h2>
                        <div class="flex items-center mt-1">
                            <span
                                class="text-xl sm:text-2xl font-bold text-gray-800 mr-2 group-hover:text-yellow-600 transition-colors duration-300">2</span>
                            <span class="text-xs text-gray-600">Penilaian harus segera diselesaikan</span>
                        </div>
                        <button
                            class="mt-2 sm:mt-3 bg-blue-800 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium py-1.5 px-2 sm:px-3 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 w-full sm:w-auto">
                            Lihat Prioritas
                        </button>
                    </div>
                </div>
            </div>

            <!-- Jadwal Hari Ini Card -->
            <div
                class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-3 sm:p-4 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 hover:scale-103 cursor-pointer group sm:col-span-2 lg:col-span-1">
                <div class="flex items-start">
                    <div
                        class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 transition-all duration-300 shadow-sm group-hover:shadow flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600 group-hover:text-blue-700 group-hover:rotate-12 transition-all duration-300"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2
                            class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                            Jadwal Hari Ini</h2>
                        <div class="flex items-center mt-1">
                            <span
                                class="text-xl sm:text-2xl font-bold text-gray-800 mr-2 group-hover:text-blue-600 transition-colors duration-300">3</span>
                            <span class="text-xs text-gray-600">Penilaian dijadwalkan hari ini</span>
                        </div>
                        <button
                            class="mt-2 sm:mt-3 bg-blue-800 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium py-1.5 px-2 sm:px-3 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 w-full sm:w-auto">
                            Lihat Jadwal
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- All Notifikasi-->
        <div
            class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
            <div
                class="flex flex-col sm:flex-row sm:justify-between sm:items-center px-3 sm:px-4 py-3 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-white">
                <div class="mb-2 sm:mb-0">
                    <h2 class="font-bold text-sm sm:text-base text-gray-800">Semua Notifikasi</h2>
                    <p class="text-xs text-gray-600">Anda memiliki 2 asets yang menunggu penilaian</p>
                </div>
                <button
                    class="text-xs sm:text-sm text-blue-800 hover:text-blue-600 font-medium transition duration-300 hover:underline transform hover:scale-105 focus:outline-none self-start sm:self-center">
                    Tandai semua telah dibaca
                </button>
            </div>

            <!-- Notifikasi List -->
            <div class="divide-y divide-gray-200">
                <!-- Notification Item 1 -->
                <div
                    class="px-3 sm:px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0 pr-16 sm:pr-20">
                            <h3
                                class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                                Asets Baru Menunggu Penilaian</h3>
                            <p
                                class="text-xs sm:text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300 break-words">
                                Ahmad Fauzi (ID: ASE-001) telah menyelesaikan tugas dan menunggu penilaian.</p>
                            <button
                                class="mt-2 bg-blue-800 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium py-1.5 px-2 sm:px-3 rounded-md transform transition duration-300 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                Nilai Sekarang
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-3 sm:right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        2 jam yang lalu
                    </div>
                </div>

                <!-- Notification Item 2 -->
                <div
                    class="px-3 sm:px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0 pr-16 sm:pr-20">
                            <h3
                                class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                                Asets Baru Menunggu Penilaian</h3>
                            <p
                                class="text-xs sm:text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300 break-words">
                                Siti Nurhaliza (ID: ASE-002) telah menyelesaikan tugas dan menunggu penilaian.</p>
                            <button
                                class="mt-2 bg-blue-800 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium py-1.5 px-2 sm:px-3 rounded-md transform transition duration-300 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                Nilai Sekarang
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-3 sm:right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        3 jam yang lalu
                    </div>
                </div>

                <!-- Notification Item 3 -->
                <div
                    class="px-3 sm:px-4 py-3 relative hover:bg-yellow-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-yellow-100 group-hover:bg-yellow-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 sm:h-5 sm:w-5 text-yellow-600 group-hover:animate-pulse" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0 pr-16 sm:pr-20">
                            <h3
                                class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                                Tenggat Waktu Penilaian</h3>
                            <p
                                class="text-xs sm:text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300 break-words">
                                Penilaian untuk Budi Santoso (ID: ASE-003) harus diselesaikan dalam 24 jam.</p>
                            <button
                                class="mt-2 bg-blue-800 hover:bg-blue-700 text-white text-xs sm:text-sm font-medium py-1.5 px-2 sm:px-3 rounded-md transform transition duration-300 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                Prioritaskan
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-3 sm:right-4 bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                        30 menit yang lalu
                    </div>
                </div>

                <!-- Notification Item 4 -->
                <div
                    class="px-3 sm:px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0 pr-16 sm:pr-20">
                            <h3
                                class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                                Penilaian Berhasil Disimpan</h3>
                            <p
                                class="text-xs sm:text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300 break-words">
                                Penilaian untuk Dian Kartika (ID: ASE-004) telah berhasil disimpan.</p>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-3 sm:right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        1 hari yang lalu
                    </div>
                </div>

                <!-- Notification Item 5 -->
                <div
                    class="px-3 sm:px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-600"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1v-3a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0 pr-16 sm:pr-20">
                            <h3
                                class="font-bold text-sm sm:text-base text-gray-800 group-hover:text-black transition-colors duration-300">
                                Asets Baru Diopaskan</h3>
                            <p
                                class="text-xs sm:text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300 break-words">
                                5 asets baru telah ditugaskan kepada Anda untuk dinilai.</p>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-3 sm:right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        2 hari yang lalu
                    </div>
                </div>
            </div>
        </div>

        <script>
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

                    e.stopPropagation();
                });
            });

            document.addEventListener('DOMContentLoaded', () => {
                const notificationItems = document.querySelectorAll('.divide-y > div');
                notificationItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(10px)';
                    item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';

                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 100 + (index * 100));
                });
            });

            const style = document.createElement('style');
            style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
            document.head.appendChild(style);
        </script>
    </section>
@endsection
