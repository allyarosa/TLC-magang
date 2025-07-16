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
            <h1 class="text-xl font-bold text-white sm:text-2xl">Buat Pengguna</h1>
        </div>

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Form header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-6 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Informasi Pengguna
                </h3>
                <p class="mt-1 text-sm text-gray-500">Isikan semua kolom yang wajib diisi untuk membuat akun pengguna baru</p>
            </div>

            <!-- Form body -->
            <div class="p-6">
                <form action="{{ route('admin.asesi.store') }}" enctype="multipart/form-data" method="POST" class="space-y-6">
                    @csrf

                    <!-- Profile photo upload section -->
                    <div
                        class="flex flex-col items-center mb-8 p-4 border border-dashed border-gray-300 rounded-lg bg-gray-50">
                        <div class="mb-4 relative group">
                            <img id="profilePreview" src="{{ asset('assets/img/blank_profile.png') }}"
                                alt="Profile Picture"
                                class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg group-hover:opacity-75 transition-all duration-200">
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <label for="profilInput"
                                    class="cursor-pointer bg-blue-600 bg-opacity-75 text-white p-2 rounded-full hover:bg-opacity-100 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </label>
                            </div>
                        </div>
                        <input id="profilInput" name="profile_image" type="file" accept=".jpg, .jpeg, .png"
                            onchange="previewImage(event)" class="hidden">
                        <label for="profilInput"
                            class="text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">
                            Unggah Foto Profil <span class="text-xs text-gray-500">(optional)</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500">Format foto: JPG, JPEG, PNG. Max 2MB.</p>
                        {{-- <x-input-error :messages="$errors->get('profile_image')" class="mt-1 text-xs" /> --}}
                    </div>

                    <!-- Form fields in sections -->
                    <div class="space-y-8">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-4 border-b pb-2">
                                Informasi Personal</h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" id="name" required
                                            placeholder="Nama Lengkap Asesi" value="{{ old('name') }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
                                </div>

                                <!-- Academic Title -->
                                <div>
                                    <label for="nama_depan" class="block mb-2 text-sm font-medium text-gray-700">
                                        Gelar <span class="text-gray-400 text-xs">(optional)</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path
                                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                            </svg>
                                        </div>
                                        <input type="text" name="nama_depan" id="nama_depan"
                                            placeholder="e.g., Ph.D., M.Sc., etc." value="{{ old('nama_depan') }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('nama_depan')" class="mt-1 text-xs" />
                                </div>

                                <!-- NIK -->
                                <div>
                                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-700">
                                        NIK (Nomor Induk Kependudukan)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                            </svg>
                                        </div>
                                        <input type="number" name="nik" id="nik"
                                            placeholder="Masukkan 16 angka NIK" value="{{ old('nik') }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('nik')" class="mt-1 text-xs" />
                                </div>

                                <!-- WhatsApp Number -->
                                <div>
                                    <label for="number" class="block mb-2 text-sm font-medium text-gray-700">
                                        Nomor WhatsApp
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="number" name="no_wa" id="number"
                                            placeholder="e.g., 628123456789" value="{{ old('no_wa') }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('no_wa')" class="mt-1 text-xs" />
                                </div>

                                <!-- Gender -->
                                <div>
                                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-700">
                                        Jenis Kelamin
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <select id="jenis_kelamin" name="jenis_kelamin"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="{{ old('jenis_kelamin') }}" selected>
                                                {{ old('jenis_kelamin') ? old('jenis_kelamin') : 'Pilih Jenis Kelamin' }}</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-1 text-xs" />
                                </div>

                                <!-- Birth Place -->
                                <div>
                                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-700">
                                        Tempat Lahir
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir') }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-1 text-xs" />
                                </div>

                                <!-- Birth Date -->
                                <div>
                                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-700">
                                        Tanggal Lahir
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            value="{{ old('tanggal_lahir') }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-1 text-xs"/>
                                </div>

                                <!-- Institution -->
                                <div>
                                    <label for="instansi" class="block mb-2 text-sm font-medium text-gray-700">
                                        Institusi
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <select id="instansi" name="instansi" onchange="showCustomInput()"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="{{ old('instansi') }}" selected>
                                                {{ old('instansi') ? old('instansi') : 'Pilih Asal Institusi ' }}
                                            </option>
                                            <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                            <option value="Pemerintah">Pemerintah</option>
                                            <option value="Sekolah Menengah Atas">Sekolah Menengah Atas(SMA)</option>
                                            <option value="Sekolah Menengah Kejuruan">Sekolah Menengah Kejuruan (SMK)</option>
                                            <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama (SMP)</option>
                                            <option value="Sekolah Dasar">Sekolah Dasar (SD)</option>
                                            <option value="Lembaga Kursus">Lembaga Kursus</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div id="custom-instansi" class="mt-2 hidden">
                                        <input type="text" name="custom_instansi"
                                            placeholder="Masukkan Institusi"
                                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('instansi')" class="mt-1 text-xs" />
                                </div>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-4 border-b pb-2">
                                Domisili</h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Province -->
                                <div>
                                    <label for="province" class="block mb-2 text-sm font-medium text-gray-700">
                                        Provinsi
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                            </svg>
                                        </div>
                                        <select id="province" name="provinsi"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="{{ old('provinsi') }}" selected>
                                                {{ old('provinsi') ? old('provinsi') : 'Pilih Provinsi' }}</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Regency/City -->
                                <div>
                                    <label for="regency" class="block mb-2 text-sm font-medium text-gray-700">
                                        Kabupaten
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <select id="regency" name="kabupaten" disabled
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="" selected disabled>Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('kabupaten')" class="mt-1 text-xs" />
                                </div>

                                <!-- District -->
                                <div>
                                    <label for="district" class="block mb-2 text-sm font-medium text-gray-700">
                                        Kecamatan
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <select id="district" name="kecamatan" disabled
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="" selected disabled>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('kecamatan')" class="mt-1 text-xs" />
                                </div>

                                <!-- Village -->
                                <div>
                                    <label for="village" class="block mb-2 text-sm font-medium text-gray-700">
                                        Kelurahan
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                        </div>
                                        <select id="village" name="kelurahan" disabled
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="" selected disabled>Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('kelurahan')" class="mt-1 text-xs" />
                                </div>
                            </div>
                        </div>

                        <!-- Account Information Section -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4
                                class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-4 border-b pb-2 dark:text-gray-300">
                                Informasi Akun</h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Email -->
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" name="email" id="email" required
                                            placeholder="user@example.com" value="{{ old('email') }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
                                </div>

                                <!-- Password -->
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                                        Password <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <input type="password" name="password" id="password" required
                                            placeholder="Buat password yang aman"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                        <button type="button" onclick="togglePasswordVisibility()"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg id="showPasswordIcon" xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg id="hidePasswordIcon" xmlns="http://www.w3.org/2000/svg"
                                                class="hidden h-5 w-5 text-gray-400 hover:text-gray-600" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mt-1 text-xs text-gray-500">
                                        Password minimal berisi 8 karakter
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-center mt-8">
                        <button type="submit"
                            class="px-6 py-3 text-base font-medium text-white bg-gradient-to-r from-[#0C548C] to-[#2E4D69] rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Buat Pengguna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        /* Add smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const profilePreview = document.getElementById('profilePreview');
                profilePreview.src = reader.result;
            };

            // Read the file as a data URL
            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const showPasswordIcon = document.getElementById('showPasswordIcon');
            const hidePasswordIcon = document.getElementById('hidePasswordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordIcon.classList.add('hidden');
                hidePasswordIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                showPasswordIcon.classList.remove('hidden');
                hidePasswordIcon.classList.add('hidden');
            }
        }

        function showCustomInput() {
            var instansiSelect = document.getElementById("instansi");
            var customInput = document.getElementById("custom-instansi");

            if (instansiSelect.value === "Lainnya") {
                customInput.style.display = "block";
                customInput.querySelector('input').required = true;
            } else {
                customInput.style.display = "none";
                customInput.querySelector('input').required = false;
            }
        }

        $(document).ready(function() {
            // Add loading indicators
            const addLoadingState = (element) => {
                element.append('<span class="loading ml-2">Loading...</span>');
            };

            const removeLoadingState = (element) => {
                element.find('.loading').remove();
            };

            $('#province').change(function() {
                var provinceName = $(this).val();
                const regencySelect = $('#regency');

                $('#regency').prop('disabled', !provinceName);
                $('#district').prop('disabled', true);
                $('#village').prop('disabled', true);

                regencySelect.empty().append('<option value="">Select Regency/City</option>');
                $('#district').empty().append('<option value="">Select District</option>');
                $('#village').empty().append('<option value="">Select Village</option>');

                if (provinceName) {
                    addLoadingState(regencySelect.parent());

                    $.get('/regencies/' + provinceName, function(data) {
                        $.each(data, function(key, value) {
                            regencySelect.append('<option value="' + value.name + '">' +
                                value.name + '</option>');
                        });
                        removeLoadingState(regencySelect.parent());
                    }).fail(function() {
                        console.error('Error fetching regencies');
                        removeLoadingState(regencySelect.parent());
                    });
                }
            });

            $('#regency').change(function() {
                var regencyName = $(this).val();
                const districtSelect = $('#district');

                $('#district').prop('disabled', !regencyName);
                $('#village').prop('disabled', true);

                districtSelect.empty().append('<option value="">Select District</option>');
                $('#village').empty().append('<option value="">Select Village</option>');

                if (regencyName) {
                    addLoadingState(districtSelect.parent());

                    $.get('/districts/' + regencyName, function(data) {
                        $.each(data, function(key, value) {
                            districtSelect.append('<option value="' + value.name + '">' +
                                value.name + '</option>');
                        });
                        removeLoadingState(districtSelect.parent());
                    }).fail(function() {
                        console.error('Error fetching districts');
                        removeLoadingState(districtSelect.parent());
                    });
                }
            });

            $('#district').change(function() {
                var districtName = $(this).val();
                const villageSelect = $('#village');

                $('#village').prop('disabled', !districtName);
                villageSelect.empty().append('<option value="">Select Village</option>');

                if (districtName) {
                    addLoadingState(villageSelect.parent());

                    $.get('/villages/' + districtName, function(data) {
                        $.each(data, function(key, value) {
                            villageSelect.append('<option value="' + value.name + '">' +
                                value.name + '</option>');
                        });
                        removeLoadingState(villageSelect.parent());
                    }).fail(function() {
                        console.error('Error fetching villages');
                        removeLoadingState(villageSelect.parent());
                    });
                }
            });
        });
    </script>
@endsection







