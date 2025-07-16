@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.asesi.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Detail Pengguna</h1>
        </div>

        <!-- Main card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Profile section -->
            <div class="flex flex-col items-center p-6">
                <img src="{{ $asesi->profile_image ? asset('storage/' . $asesi->profile_image) : asset('assets/img/blank_profile.png') }}"
                    alt="Profile Picture" class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg mb-4">
                <h2 class="text-lg font-semibold text-gray-700">{{ $asesi->name }}</h2>
                @if ($asesi->nama_depan)
                    <p class="text-gray-500">{{ $asesi->nama_depan }}</p>
                @endif
                <p class="text-sm mt-1 text-gray-500">Status:
                    <span class="font-semibold {{ $asesi->user->status == 'active' ? 'text-green-600' : 'text-red-600' }}">
                        {{ ucfirst($asesi->user->status) }}
                    </span>
                </p>
            </div>

            <!-- Information sections -->
            <div class="p-6 space-y-8">
                <!-- Personal Info -->
                <div>
                    <h3 class="text-md font-bold text-gray-800 border-b pb-2 mb-4">Informasi Personal</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500">NIK</p>
                            <p class="font-medium text-gray-800">{{ $asesi->nik ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nomor WhatsApp</p>
                            <p class="font-medium text-gray-800">{{ $asesi->no_wa ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenis Kelamin</p>
                            <p class="font-medium text-gray-800">
                                {{ $asesi->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tempat Lahir</p>
                            <p class="font-medium text-gray-800">{{ $asesi->tempat_lahir ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Lahir</p>
                            <p>{{ $asesi->tanggal_lahir ? \Carbon\Carbon::parse($asesi->tanggal_lahir)->format('d M Y') : '-' }}
                            </p>

                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Institusi</p>
                            <p class="font-medium text-gray-800">{{ $asesi->instansi ?? ($asesi->custom_instansi ?? '-') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <h3 class="text-md font-bold text-gray-800 border-b pb-2 mb-4">Domisili</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500">Provinsi</p>
                            <p class="font-medium text-gray-800">{{ $asesi->provinsi ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kabupaten</p>
                            <p class="font-medium text-gray-800">{{ $asesi->kabupaten ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kecamatan</p>
                            <p class="font-medium text-gray-800">{{ $asesi->kecamatan ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kelurahan</p>
                            <p class="font-medium text-gray-800">{{ $asesi->kelurahan ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Account Info -->
                <div>
                    <h3 class="text-md font-bold text-gray-800 border-b pb-2 mb-4">Informasi Akun</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-800">{{ $asesi->user->email ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons Section -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <!-- Payment History Button -->
                            <button type="button" onclick="window.location.href='#'"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                Payment History
                            </button>

                            <!-- Dropdown for Level Scores -->
                            <div class="relative inline-block text-left">
                                {{-- <button type="button" id="levelScoresDropdown"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                                    onclick="toggleDropdown('levelScoresMenu')">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nilai Level
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button> --}}

                                    <div class="flex flex-wrap gap-2">
                                        <button
                                            onclick="window.location.href='#'"
                                            class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-xs rounded-lg">
                                            Level A
                                        </button>
                                        <button
                                            onclick="window.location.href='#'"
                                            class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-xs rounded-lg">
                                            Level B
                                        </button>
                                        <button
                                            onclick="window.location.href='#'"
                                            class="px-3 py-2 bg-green-500 hover:bg-green-600 text-white text-xs rounded-lg">
                                            Level C
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function toggleDropdown(menuId) {
                        const menu = document.getElementById(menuId);
                        const isHidden = menu.classList.contains('hidden');

                        // Hide all dropdowns first
                        document.querySelectorAll('[id$="Menu"]').forEach(dropdown => {
                            dropdown.classList.add('hidden');
                        });

                        // Show the clicked dropdown if it was hidden
                        if (isHidden) {
                            menu.classList.remove('hidden');
                        }
                    }

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(event) {
                        const dropdown = document.getElementById('levelScoresDropdown');
                        const menu = document.getElementById('levelScoresMenu');

                        if (!dropdown.contains(event.target) && !menu.contains(event.target)) {
                            menu.classList.add('hidden');
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
