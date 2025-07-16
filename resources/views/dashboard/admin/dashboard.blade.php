@extends('layouts.adminDashboard')
@section('title', 'Admin Dashboard')

@section('content')

<!-- Stats Overview Cards with Standard Size -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 mt-10">
    <!-- Asesi Card -->
    <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
        <div class="absolute inset-0 bg-gradient-to-br from-[#1D4E89] to-[#1D4E89] opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
        <div class="relative">
            <div class="p-4 bg-gradient-to-br from-[#1D4E89] via-[#1D4E89] to-[#2563eb]">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Total Asesi</h3>
                        <div class="w-8 h-0.5 bg-white/40 rounded-full"></div>
                    </div>
                    <div class="bg-white/25 backdrop-blur-sm p-2 rounded-lg border border-white/20">
                        <i class="fas fa-user-graduate text-white text-lg"></i>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-gradient-to-b from-white to-blue-50">
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-gray-800">{{ $asesi }}</span>
                    {{-- <div class="text-right">
                        <div class="text-green-500 text-xs font-semibold flex items-center">
                            <i class="fas fa-arrow-up text-xs mr-1"></i>
                            +12%
                        </div>
                        <div class="text-xs text-gray-500">vs bulan lalu</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Asesor Card -->
    <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
        <div class="absolute inset-0 bg-gradient-to-br from-[#E76F51] to-[#E76F51] opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
        <div class="relative">
            <div class="p-4 bg-gradient-to-br from-[#E76F51] via-[#E76F51] to-[#ea580c]">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Total Asesor</h3>
                        <div class="w-8 h-0.5 bg-white/40 rounded-full"></div>
                    </div>
                    <div class="bg-white/25 backdrop-blur-sm p-2 rounded-lg border border-white/20">
                        <i class="fas fa-chalkboard-teacher text-white text-lg"></i>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-gradient-to-b from-white to-orange-50">
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-gray-800">{{ $asesor }}</span>
                    {{-- <div class="text-right">
                        <div class="text-green-500 text-xs font-semibold flex items-center">
                            <i class="fas fa-arrow-up text-xs mr-1"></i>
                            +8%
                        </div>
                        <div class="text-xs text-gray-500">vs bulan lalu</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Card -->
    <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
        <div class="absolute inset-0 bg-gradient-to-br from-[#1D4E89] to-[#E76F51] opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
        <div class="relative">
            <div class="p-4 bg-gradient-to-br from-[#1D4E89] via-[#2563eb] to-[#E76F51]">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Total Admin</h3>
                        <div class="w-8 h-0.5 bg-white/40 rounded-full"></div>
                    </div>
                    <div class="bg-white/25 backdrop-blur-sm p-2 rounded-lg border border-white/20">
                        <i class="fas fa-user-shield text-white text-lg"></i>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-gradient-to-b from-white to-blue-50">
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-gray-800">{{ $admins }}</span>
                    {{-- <div class="text-right">
                        <div class="text-[#1D4E89] text-xs font-semibold flex items-center">
                            <i class="fas fa-minus text-xs mr-1"></i>
                            Stabil
                        </div>
                        <div class="text-xs text-gray-500">vs bulan lalu</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
{{-- <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
    <!-- Activity Chart -->
    <div class="xl:col-span-2 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-3 sm:space-y-0">
                <div>
                    <h3 class="text-lg font-semibold text-[#1D4E89] mb-1">Aktivitas Pengguna</h3>
                    <p class="text-sm text-gray-600">Pantau perkembangan aktivitas platform secara real-time</p>
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1.5 bg-gradient-to-r from-[#E76F51] to-[#ea580c] text-white rounded-lg text-sm font-medium shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Minggu Ini
                    </button>
                    <button class="px-3 py-1.5 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors duration-300">
                        Bulan Ini
                    </button>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="h-64 w-full bg-gradient-to-br from-blue-50 via-white to-orange-50 rounded-lg flex items-center justify-center border-2 border-dashed border-[#1D4E89]/30">
                <div class="text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#E76F51] to-[#1D4E89] rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-chart-line text-white text-lg"></i>
                    </div>
                    <p class="text-gray-600 font-medium text-sm">Grafik aktivitas pengguna akan ditampilkan di sini</p>
                    <p class="text-gray-500 text-xs mt-1">Data sedang dimuat...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-[#1D4E89] to-[#E76F51]">
            <h3 class="text-lg font-semibold text-white flex items-center">
                <i class="fas fa-clock mr-2"></i>
                Aktivitas Terbaru
            </h3>
        </div>
        <div class="p-4">
            <div class="space-y-4">
                <div class="flex items-start group hover:bg-green-50 p-2 rounded-lg transition-colors duration-300 cursor-pointer">
                    <div class="bg-gradient-to-br from-green-400 to-green-500 p-2 rounded-lg mr-3 shadow-md group-hover:shadow-lg transition-shadow duration-300">
                        <i class="fas fa-user-plus text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800 text-sm">Pendaftaran baru</p>
                        <p class="text-xs text-gray-600">Asesi baru bergabung dengan platform</p>
                        <p class="text-xs text-gray-500 mt-1">5 menit yang lalu</p>
                    </div>
                </div>
                
                <div class="flex items-start group hover:bg-blue-50 p-2 rounded-lg transition-colors duration-300 cursor-pointer">
                    <div class="bg-gradient-to-br from-[#1D4E89] to-[#2563eb] p-2 rounded-lg mr-3 shadow-md group-hover:shadow-lg transition-shadow duration-300">
                        <i class="fas fa-certificate text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800 text-sm">Sertifikasi selesai</p>
                        <p class="text-xs text-gray-600">Proses sertifikasi berhasil diselesaikan</p>
                        <p class="text-xs text-gray-500 mt-1">1 jam yang lalu</p>
                    </div>
                </div>
                
                <div class="flex items-start group hover:bg-purple-50 p-2 rounded-lg transition-colors duration-300 cursor-pointer">
                    <div class="bg-gradient-to-br from-purple-400 to-purple-500 p-2 rounded-lg mr-3 shadow-md group-hover:shadow-lg transition-shadow duration-300">
                        <i class="fas fa-comment-alt text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800 text-sm">Pesan baru</p>
                        <p class="text-xs text-gray-600">Pesan dari asesor diterima</p>
                        <p class="text-xs text-gray-500 mt-1">3 jam yang lalu</p>
                    </div>
                </div>
                
                <div class="flex items-start group hover:bg-orange-50 p-2 rounded-lg transition-colors duration-300 cursor-pointer">
                    <div class="bg-gradient-to-br from-[#E76F51] to-[#ea580c] p-2 rounded-lg mr-3 shadow-md group-hover:shadow-lg transition-shadow duration-300">
                        <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800 text-sm">Peringatan sistem</p>
                        <p class="text-xs text-gray-600">Maintenance terjadwal akan dimulai</p>
                        <p class="text-xs text-gray-500 mt-1">5 jam yang lalu</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-4 py-2 text-center bg-gradient-to-r from-[#1D4E89] to-[#E76F51] text-white font-medium rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105 text-sm">
                Lihat semua aktivitas
            </button>
        </div>
    </div>
</div> --}}

<!-- Bottom Section -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">
    <!-- Certification Statistics -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-[#E76F51] to-[#1D4E89]">
            <h3 class="text-lg font-semibold text-white flex items-center">
                <i class="fas fa-chart-pie mr-2"></i>
                Status Sertifikasi
            </h3>
        </div>
        <div class="p-4">
            <div class="space-y-4">
                <!-- Completed Certifications -->
                <div class="group">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium text-gray-700 flex items-center text-sm">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            Selesai
                        </span>
                        <span class="font-semibold text-green-600 text-sm">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full transition-all duration-1000 ease-out" style="width: 65%"></div>
                    </div>
                </div>

                <!-- In Progress Certifications -->
                <div class="group">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium text-gray-700 flex items-center text-sm">
                            <div class="w-2 h-2 bg-[#E76F51] rounded-full mr-2"></div>
                            Dalam Proses
                        </span>
                        <span class="font-semibold text-[#E76F51] text-sm">25%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-[#E76F51] to-[#ea580c] h-2 rounded-full transition-all duration-1000 ease-out delay-300" style="width: 25%"></div>
                    </div>
                </div>

                <!-- Not Started Certifications -->
                <div class="group">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium text-gray-700 flex items-center text-sm">
                            <div class="w-2 h-2 bg-gray-400 rounded-full mr-2"></div>
                            Belum Dimulai
                        </span>
                        <span class="font-semibold text-gray-600 text-sm">10%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-400 to-gray-500 h-2 rounded-full transition-all duration-1000 ease-out delay-600" style="width: 10%"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-200">
                <h4 class="font-semibold text-[#1D4E89] mb-3 flex items-center text-sm">
                    <i class="fas fa-layer-group mr-2 text-[#E76F51]"></i>
                    Distribusi Level
                </h4>
                <div class="grid grid-cols-3 gap-2">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-3 rounded-lg text-center border border-[#1D4E89]/20 hover:shadow-md transition-shadow duration-300">
                        <span class="block text-lg font-bold text-[#1D4E89] mb-1">42%</span>
                        <span class="text-xs font-medium text-[#1D4E89]">Level A</span>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-3 rounded-lg text-center border border-[#E76F51]/20 hover:shadow-md transition-shadow duration-300">
                        <span class="block text-lg font-bold text-[#E76F51] mb-1">35%</span>
                        <span class="text-xs font-medium text-[#E76F51]">Level B</span>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-3 rounded-lg text-center border border-green-500/20 hover:shadow-md transition-shadow duration-300">
                        <span class="block text-lg font-bold text-green-600 mb-1">23%</span>
                        <span class="text-xs font-medium text-green-700">Level C</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Table -->
    <div class="xl:col-span-2 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-[#1D4E89] to-[#E76F51]">
            <h3 class="text-lg font-semibold text-white flex items-center">
                <i class="fas fa-users mr-2"></i>
                Data Pengguna Terbaru
            </h3>
        </div>
        <div class="p-4">
            @livewire('asesi-table')
        </div>
    </div>
</div>

@endsection