@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-6 mt-4">
        <div class="flex items-center justify-between p-4 mb-6 bg-white border-b border-gray-200 shadow-md rounded-lg">
            <a href="{{ route('admin.asesi.index') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors duration-200">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali ke Daftar
            </a>
            <h1 class="text-lg font-semibold text-gray-700 sm:text-2xl">Detail Pengguna Asesi</h1>
        </div>

        <div class="bg-white rounded-xl shadow-2xl p-6 lg:p-8">

            <div class="flex flex-col sm:flex-row items-center sm:items-start border-b pb-6 mb-6">
                <img src="{{ $asesi->profile_image ? asset('storage/' . $asesi->profile_image) : asset('assets/img/blank_profile.png') }}"
                    alt="Profile Picture"
                    class="w-24 h-24 object-cover rounded-full border-4 border-blue-500 shadow-lg mb-4 sm:mb-0 sm:mr-6">

                <div class="text-center sm:text-left">
                    <h2 class="text-2xl font-bold text-gray-900">{{ $asesi->name }}</h2>
                    @if ($asesi->nama_depan)
                        <p class="text-lg text-gray-600 mb-2">{{ $asesi->nama_depan }}</p>
                    @endif
                    <p class="text-sm text-gray-500">Status Akun:
                        <span
                            class="font-semibold px-3 py-1 rounded-full text-xs 
                            {{ $asesi->user->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($asesi->user->status) }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="space-y-8">

                <div class="p-5 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-blue-700 border-b pb-2 mb-4">Informasi Personal</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-4 gap-x-6">
                        @php
                            $personalInfo = [
                                'NIK' => $asesi->nik ?? '-',
                                'Nomor WhatsApp' => $asesi->no_wa ?? '-',
                                'Jenis Kelamin' => $asesi->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
                                'Tempat Lahir' => $asesi->tempat_lahir ?? '-',
                                'Tanggal Lahir' => $asesi->tanggal_lahir
                                    ? \Carbon\Carbon::parse($asesi->tanggal_lahir)->format('d M Y')
                                    : '-',
                                'Institusi' => $asesi->instansi ?? ($asesi->custom_instansi ?? '-'),
                            ];
                        @endphp

                        @foreach ($personalInfo as $label => $value)
                            <div>
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $label }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 mt-1">{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-5 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-blue-700 border-b pb-2 mb-4">Domisili</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-y-4 gap-x-6">
                        @php
                            $domisiliInfo = [
                                'Provinsi' => $asesi->provinsi ?? '-',
                                'Kabupaten' => $asesi->kabupaten ?? '-',
                                'Kecamatan' => $asesi->kecamatan ?? '-',
                                'Kelurahan' => $asesi->kelurahan ?? '-',
                            ];
                        @endphp

                        @foreach ($domisiliInfo as $label => $value)
                            <div>
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $label }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 mt-1">{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-5 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-blue-700 border-b pb-2 mb-4">Informasi Akun</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Email</p>
                            <p class="text-sm font-medium text-gray-900 mt-1">{{ $asesi->user->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Aksi Cepat</h3>
                    <div class="flex flex-wrap items-center gap-3">
                        <button type="button" onclick="window.location.href='#'"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            Riwayat Pembayaran
                        </button>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-sm font-medium text-gray-600 self-center mr-1">Nilai Level:</span>
                            {{-- LevelA --}}
                            <button
                                onclick="window.location.href='{{ route('admin.asesi.level_a.show', ['id' => $asesi->id]) }}'"
                                class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors">
                                Level A
                            </button>
                            {{-- LevelB --}}
                            <button onclick="window.location.href='#'"
                                class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-medium rounded-lg transition-colors">
                                Level B
                            </button>
                            {{-- LevelC --}}
                            <button onclick="window.location.href='#'"
                                class="px-3 py-2 bg-green-500 hover:bg-green-600 text-white text-xs font-medium rounded-lg transition-colors">
                                Level C
                            </button>
                        </div>
                        {{-- DOWNLOAD SERTIFIKAT --}}
                        <div class="flex flex-wrap gap-2">
                            <span class="text-sm font-medium text-gray-600 self-center mr-1">Download Sertifikat:</span>

                            {{-- LevelA --}}
                            <button
                                onclick="window.location.href='{{ route('admin.asesi.level_a.show', Vinkla\Hashids\Facades\Hashids::encode($item->id)) }}'"
                                class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors">
                                Level A
                            </button>

                            {{-- LevelB --}}
                            <button onclick="window.location.href='#'"
                                class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-medium rounded-lg transition-colors">
                                Level B
                            </button>

                            {{-- LevelC --}}
                            <button onclick="window.location.href='#'"
                                class="px-3 py-2 bg-green-500 hover:bg-green-600 text-white text-xs font-medium rounded-lg transition-colors">
                                Level C
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
