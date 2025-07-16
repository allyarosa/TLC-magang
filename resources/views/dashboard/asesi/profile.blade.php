@extends('layouts.asesiDashboard')

@section('content')
    <section class="w-full min-h-screen bg-gradient-to-b from-gray-50 to-white py-10 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-1">👤 Profil Saya</h2>
                    <p class="text-gray-500">Kelola informasi akun Anda</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="flex items-center bg-blue-50 rounded-full px-4 py-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                        <span class="text-sm font-medium text-gray-700">Status: Aktif</span>
                    </div>
                </div>
            </div>

            @if (session()->has('warning'))
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6 rounded-lg flex items-start">
                    <svg class="w-5 h-5 text-yellow-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <p class="font-medium text-yellow-800">Perhatian!</p>
                        <p class="text-sm text-yellow-700">{{ session('warning') }}</p>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-lg flex items-start">
                    <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg flex items-start">
                    <svg class="w-5 h-5 text-red-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Profile Header -->

            <!-- Form Section with Tabs -->
            <form method="POST" action="{{ route('asesi.profile.update') }}" id="profileForm"
                enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-6 mb-6 sm:mb-8">
                    <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6">
                        <div class="relative flex-shrink-0">
                            <div
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gray-100 overflow-hidden border-4 border-white shadow-md">
                                <img id="profileImage"
                                    src="{{ asset('storage/' . (auth()->user()->userProfile->profile_image ?? '/blankProfile.png')) }}"
                                    alt="Foto Profil" class="w-full h-full object-cover">
                            </div>
                            <label for="profileInput"
                                class="absolute bottom-0 right-0 bg-white p-1.5 sm:p-2 rounded-full shadow-md cursor-pointer hover:bg-gray-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-600"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <input type="file" id="profileInput" name="profile_image" accept=".jpg,.jpeg,.png"
                                    class="hidden" onchange="previewImage(event)">
                            </label>
                        </div>
                        <div class="text-center sm:text-left flex-grow min-w-0">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-1 truncate">{{ auth()->user()->name }}
                            </h3>
                            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4 truncate">{{ auth()->user()->email }}
                            </p>
                            <div class="flex flex-wrap gap-2 justify-center sm:justify-start">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full whitespace-nowrap">Bergabung
                                    {{ auth()->user()->created_at->format('M Y') }}</span>
                                {{-- <span
                                    class="{{ auth()->user()->userProfile ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} text-xs font-medium px-2.5 py-0.5 rounded-full whitespace-nowrap">
                                    {{ auth()->user()->userProfile ? 'Profil Lengkap' : 'Profil Belum Lengkap' }}
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6 sm:mb-8">
                    <!-- Tabs -->
                    <div class="border-b border-gray-200 overflow-x-auto lg:overflow-visible">
                        <nav class="flex -mb-px min-w-max">
                            <button type="button" onclick="switchTab('personal')" id="personalTab"
                                class="tab-button active py-3 sm:py-4 px-4 sm:px-6 text-center border-b-2 font-medium text-xs sm:text-sm whitespace-nowrap border-blue-500 text-blue-600 flex-shrink-0">
                                Data Pribadi
                            </button>
                            <button type="button" onclick="switchTab('education')" id="educationTab"
                                class="tab-button py-3 sm:py-4 px-4 sm:px-6 text-center border-b-2 font-medium text-xs sm:text-sm whitespace-nowrap border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 flex-shrink-0">
                                Pendidikan
                            </button>
                            <button type="button" onclick="switchTab('work')" id="workTab"
                                class="tab-button py-3 sm:py-4 px-4 sm:px-6 text-center border-b-2 font-medium text-xs sm:text-sm whitespace-nowrap border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 flex-shrink-0">
                                Pekerjaan
                            </button>
                            <button type="button" onclick="switchTab('address')" id="addressTab"
                                class="tab-button py-3 sm:py-4 px-4 sm:px-6 text-center border-b-2 font-medium text-xs sm:text-sm whitespace-nowrap border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 flex-shrink-0">
                                Alamat
                            </button>
                        </nav>
                    </div>

                    <!-- Tab Contents -->
                    <div class="p-4 sm:p-6">
                        <!-- Personal Data Tab -->
                        <div id="personalContent" class="tab-content active">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap + Gelar</label>
                                    <input type="text" name="nama_depan" required
                                        value="{{ old('nama_depan', auth()->user()->userProfile->nama_depan ?? auth()->user()->name) }}"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z.,\s]/g, '')"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">

                                    @error('nama_depan')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">NIK</label>
                                    <input type="text" name="nik" maxlength="16"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);"
                                        value="{{ old('nik', auth()->user()->userProfile->nik ?? '') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base"
                                        placeholder="16 digit NIK">
                                    @error('nik')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" maxlength="25"
                                        value="{{ old('tempat_lahir', auth()->user()->userProfile->tempat_lahir ?? '') }}"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z.,\s]/g, '')"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', auth()->user()->userProfile->tanggal_lahir ?? '') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L"
                                            {{ old('jenis_kelamin', auth()->user()->userProfile->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P"
                                            {{ old('jenis_kelamin', auth()->user()->userProfile->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                                    <input type="tel" name="no_wa" pattern="\d{10,13}" maxlength="13"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13);"
                                        value="{{ old('no_wa', auth()->user()->userProfile->no_wa ?? '') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base"
                                        placeholder="08xxxxxxxxxx">
                                </div>

                            </div>
                        </div>

                        <!-- Education Data Tab -->
                        <div id="educationContent" class="tab-content hidden">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Latar Belakang
                                        Pendidikan</label>
                                    <select name="latar_belakang_pendidikan"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                        <option value="">Pilih Jenjang Pendidikan</option>
                                        <option value="SMA/SMK"
                                            {{ old('latar_belakang_pendidikan', auth()->user()->userProfile->latar_belakang_pendidikan ?? '') == 'SMA/SMK' ? 'selected' : '' }}>
                                            SMA/SMK</option>
                                        <option value="D1"
                                            {{ old('latar_belakang_pendidikan', auth()->user()->userProfile->latar_belakang_pendidikan ?? '') == 'D1' ? 'selected' : '' }}>
                                            D1</option>
                                        <option value="D2"
                                            {{ old('latar_belakang_pendidikan', auth()->user()->userProfile->latar_belakang_pendidikan ?? '') == 'D2' ? 'selected' : '' }}>
                                            D2</option>
                                        <option value="D3"
                                            {{ old('latar_belakang_pendidikan', auth()->user()->userProfile->latar_belakang_pendidikan ?? '') == 'D3' ? 'selected' : '' }}>
                                            D3</option>
                                        <option value="D4/S1"
                                            {{ old('latar_belakang_pendidikan', auth()->user()->userProfile->latar_belakang_pendidikan ?? '') == 'D4/S1' ? 'selected' : '' }}>
                                            D4/S1</option>
                                        <option value="S2"
                                            {{ old('latar_belakang_pendidikan', auth()->user()->userProfile->latar_belakang_pendidikan ?? '') == 'S2' ? 'selected' : '' }}>
                                            S2</option>
                                        <option value="S3"
                                            {{ old('latar_belakang_pendidikan', auth()->user()->userProfile->latar_belakang_pendidikan ?? '') == 'S3' ? 'selected' : '' }}>
                                            S3</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Nama
                                        Universitas/Institusi</label>
                                    <input type="text" name="nama_universitas"
                                        value="{{ old('nama_universitas', auth()->user()->userProfile->nama_universitas ?? '') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base"
                                        placeholder="Contoh: Universitas Indonesia">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Program Studi</label>
                                    <input type="text" name="program_studi"
                                        value="{{ old('program_studi', auth()->user()->userProfile->program_studi ?? '') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base"
                                        placeholder="Contoh: Teknik Informatika">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Tahun Lulus</label>
                                    <select name="tahun_studi"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                        <option value="">Pilih Tahun Lulus</option>
                                        @for ($year = date('Y'); $year >= 1970; $year--)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_studi', auth()->user()->userProfile->tahun_studi ?? '') == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Work Data Tab -->
                        <div id="workContent" class="tab-content hidden">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Instansi</label>
                                    <select name="instansi" id="instansiSelect"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                        <option value="">Pilih Instansi</option>
                                        <option value="Pemerintah"
                                            {{ old('instansi', auth()->user()->userProfile->instansi ?? '') == 'Pemerintah' ? 'selected' : '' }}>
                                            Pemerintah</option>
                                        <option value="Swasta"
                                            {{ old('instansi', auth()->user()->userProfile->instansi ?? '') == 'Swasta' ? 'selected' : '' }}>
                                            Swasta</option>
                                        <option value="BUMN"
                                            {{ old('instansi', auth()->user()->userProfile->instansi ?? '') == 'BUMN' ? 'selected' : '' }}>
                                            BUMN</option>
                                        <option value="Lainnya"
                                            {{ old('instansi', auth()->user()->userProfile->instansi ?? '') == 'Lainnya' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                </div>

                                <div id="customInstansiDiv" class="space-y-2"
                                    style="display: {{ old('instansi', auth()->user()->userProfile->instansi ?? '') == 'Lainnya' ? 'block' : 'none' }};">
                                    <label class="block text-sm font-medium text-gray-700">Nama Instansi</label>
                                    <input type="text" name="custom_instansi"
                                        value="{{ old('custom_instansi', auth()->user()->userProfile->custom_instansi ?? '') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base"
                                        placeholder="Masukkan nama instansi">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Profesi</label>
                                    <input type="text" name="profesi" maxlength="50"
                                        value="{{ old('profesi', auth()->user()->userProfile->profesi ?? '') }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base"
                                        placeholder="Contoh: Manager, Staff IT, Dokter">
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Lama Masa Kerja</label>
                                    <select name="lama_masa_kerja"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                        <option value="">Pilih Lama Masa Kerja</option>
                                        <option value="< 1 tahun"
                                            {{ old('lama_masa_kerja', auth()->user()->userProfile->lama_masa_kerja ?? '') == '< 1 tahun' ? 'selected' : '' }}>
                                            &lt; 1 tahun</option>
                                        <option value="1-2 tahun"
                                            {{ old('lama_masa_kerja', auth()->user()->userProfile->lama_masa_kerja ?? '') == '1-2 tahun' ? 'selected' : '' }}>
                                            1-2 tahun</option>
                                        <option value="3-5 tahun"
                                            {{ old('lama_masa_kerja', auth()->user()->userProfile->lama_masa_kerja ?? '') == '3-5 tahun' ? 'selected' : '' }}>
                                            3-5 tahun</option>
                                        <option value="6-10 tahun"
                                            {{ old('lama_masa_kerja', auth()->user()->userProfile->lama_masa_kerja ?? '') == '6-10 tahun' ? 'selected' : '' }}>
                                            6-10 tahun</option>
                                        <option value="11-15 tahun"
                                            {{ old('lama_masa_kerja', auth()->user()->userProfile->lama_masa_kerja ?? '') == '11-15 tahun' ? 'selected' : '' }}>
                                            11-15 tahun</option>
                                        <option value="> 15 tahun"
                                            {{ old('lama_masa_kerja', auth()->user()->userProfile->lama_masa_kerja ?? '') == '> 15 tahun' ? 'selected' : '' }}>
                                            &gt; 15 tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Address Data Tab -->
                        <div id="addressContent" class="tab-content hidden">
                            <!-- Hidden fields untuk ID -->
                            <input type="hidden" name="province_id" id="province_id"
                                value="{{ old('province_id', auth()->user()->userProfile->province_id ?? '') }}">
                            <input type="hidden" name="regency_id" id="regency_id"
                                value="{{ old('regency_id', auth()->user()->userProfile->regency_id ?? '') }}">
                            <input type="hidden" name="district_id" id="district_id"
                                value="{{ old('district_id', auth()->user()->userProfile->district_id ?? '') }}">
                            <input type="hidden" name="village_id" id="village_id"
                                value="{{ old('village_id', auth()->user()->userProfile->village_id ?? '') }}">

                            <div class="grid grid-cols-1 gap-4 sm:gap-6">
                                <!-- Provinsi -->
                                <div class="space-y-2">
                                    <label for="province" class="block text-sm font-medium text-gray-700">Provinsi
                                        Domisili</label>
                                    <select id="province" name="provinsi"
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->name }}" data-id="{{ $province->id }}"
                                                {{ old('provinsi', auth()->user()->userProfile->provinsi ?? '') == $province->name ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Kabupaten/Kota -->
                                <div class="space-y-2">
                                    <label for="regency" class="block text-sm font-medium text-gray-700">Kabupaten/Kota
                                        Domisili</label>
                                    <select id="regency" name="kabupaten" disabled
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base disabled:bg-gray-100 disabled:cursor-not-allowed">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        @if (old('kabupaten', auth()->user()->userProfile->kabupaten ?? ''))
                                            <option
                                                value="{{ old('kabupaten', auth()->user()->userProfile->kabupaten ?? '') }}"
                                                selected>
                                                {{ old('kabupaten', auth()->user()->userProfile->kabupaten ?? '') }}
                                            </option>
                                        @endif
                                    </select>
                                    @error('kabupaten')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Kecamatan -->
                                <div class="space-y-2">
                                    <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan
                                        Domisili</label>
                                    <select id="district" name="kecamatan" disabled
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base disabled:bg-gray-100 disabled:cursor-not-allowed">
                                        <option value="">Pilih Kecamatan</option>
                                        @if (old('kecamatan', auth()->user()->userProfile->kecamatan ?? ''))
                                            <option
                                                value="{{ old('kecamatan', auth()->user()->userProfile->kecamatan ?? '') }}"
                                                selected>
                                                {{ old('kecamatan', auth()->user()->userProfile->kecamatan ?? '') }}
                                            </option>
                                        @endif
                                    </select>
                                    @error('kecamatan')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Kelurahan -->
                                <div class="space-y-2">
                                    <label for="village" class="block text-sm font-medium text-gray-700">Kelurahan
                                        Domisili</label>
                                    <select id="village" name="kelurahan" disabled
                                        class="w-full border border-gray-300 rounded-lg px-3 sm:px-4 py-2 sm:py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm sm:text-base disabled:bg-gray-100 disabled:cursor-not-allowed">
                                        <option value="">Pilih Kelurahan</option>
                                        @if (old('kelurahan', auth()->user()->userProfile->kelurahan ?? ''))
                                            <option
                                                value="{{ old('kelurahan', auth()->user()->userProfile->kelurahan ?? '') }}"
                                                selected>
                                                {{ old('kelurahan', auth()->user()->userProfile->kelurahan ?? '') }}
                                            </option>
                                        @endif
                                    </select>
                                    @error('kelurahan')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="text-sm text-gray-500 text-center sm:text-left order-2 sm:order-1">
                        {{-- Terakhir diperbarui: {{ auth()->user()->updated_at->diffForHumans() }} --}}
                    </div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium shadow-sm transition duration-200 transform hover:scale-105 w-full sm:w-auto order-1 sm:order-2">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function switchTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabName + 'Content').classList.remove('hidden');
            document.getElementById(tabName + 'Content').classList.add('active');

            // Update tab buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active', 'border-blue-500', 'text-blue-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });

            document.getElementById(tabName + 'Tab').classList.add('active', 'border-blue-500', 'text-blue-600');
            document.getElementById(tabName + 'Tab').classList.remove('border-transparent', 'text-gray-500');
        }

        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('profileImage'); // Gunakan ID yang benar

            if (file) {
                // Validasi tipe file
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.');
                    event.target.value = ''; // Reset input
                    return;
                }

                // Validasi ukuran file (maksimal 2MB)
                const maxSize = 2 * 1024 * 1024; // 2MB
                if (file.size > maxSize) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    event.target.value = ''; // Reset input
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.onerror = function() {
                    alert('Gagal membaca file. Silakan coba lagi.');
                };
                reader.readAsDataURL(file);
            }
        }
        $(document).ready(function() {
            // Initialize dropdowns based on existing data
            var initialProvince = $('#province').val();
            var initialRegency = "{{ old('kabupaten', auth()->user()->userProfile->kabupaten ?? '') }}";
            var initialDistrict = "{{ old('kecamatan', auth()->user()->userProfile->kecamatan ?? '') }}";
            var initialVillage = "{{ old('kelurahan', auth()->user()->userProfile->kelurahan ?? '') }}";

            // Enable regency if province is selected
            if (initialProvince) {
                $('#regency').prop('disabled', false);
                loadRegencies(initialProvince, initialRegency);
            }

            // Province change handler
            $('#province').change(function() {
                var provinceName = $(this).val();
                var provinceId = $(this).find(':selected').data('id');

                // Update hidden field
                $('#province_id').val(provinceId || '');

                $('#regency').prop('disabled', !provinceName);
                $('#district').prop('disabled', true);
                $('#village').prop('disabled', true);

                $('#regency').empty().append('<option value="">Pilih Kabupaten/Kota</option>');
                $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
                $('#village').empty().append('<option value="">Pilih Kelurahan</option>');

                // Clear hidden fields
                $('#regency_id, #district_id, #village_id').val('');

                if (provinceName) {
                    loadRegencies(provinceName);
                }
            });

            // Regency change handler
            $('#regency').change(function() {
                var regencyName = $(this).val();
                var regencyId = $(this).find(':selected').data('id');

                // Update hidden field
                $('#regency_id').val(regencyId || '');

                $('#district').prop('disabled', !regencyName);
                $('#village').prop('disabled', true);

                $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
                $('#village').empty().append('<option value="">Pilih Kelurahan</option>');

                // Clear hidden fields
                $('#district_id, #village_id').val('');

                if (regencyName) {
                    loadDistricts(regencyName, initialDistrict);
                }
            });

            // District change handler
            $('#district').change(function() {
                var districtName = $(this).val();
                var districtId = $(this).find(':selected').data('id');

                // Update hidden field
                $('#district_id').val(districtId || '');

                $('#village').prop('disabled', !districtName);
                $('#village').empty().append('<option value="">Pilih Kelurahan</option>');

                // Clear hidden field
                $('#village_id').val('');

                if (districtName) {
                    loadVillages(districtName, initialVillage);
                }
            });

            // Village change handler
            $('#village').change(function() {
                var villageId = $(this).find(':selected').data('id');
                $('#village_id').val(villageId || '');
            });

            // Load functions
            function loadRegencies(provinceName, selectedRegency = '') {
                $.get('/regencies/' + encodeURIComponent(provinceName))
                    .done(function(data) {
                        $.each(data, function(key, value) {
                            var selected = (selectedRegency && value.name === selectedRegency) ?
                                'selected' : '';
                            $('#regency').append('<option value="' + value.name + '" data-id="' + value
                                .id + '" ' + selected + '>' + value.name + '</option>');
                        });

                        // If we have a selected regency, trigger change to load districts
                        if (selectedRegency && $('#regency').val()) {
                            $('#district').prop('disabled', false);
                            loadDistricts(selectedRegency, initialDistrict);
                        }
                    })
                    .fail(function(xhr, status, error) {
                        console.error('Error loading regencies:', error);
                        alert('Gagal memuat data kabupaten/kota. Silakan refresh halaman.');
                    });
            }

            function loadDistricts(regencyName, selectedDistrict = '') {
                $.get('/districts/' + encodeURIComponent(regencyName))
                    .done(function(data) {
                        $.each(data, function(key, value) {
                            var selected = (selectedDistrict && value.name === selectedDistrict) ?
                                'selected' : '';
                            $('#district').append('<option value="' + value.name + '" data-id="' + value
                                .id + '" ' + selected + '>' + value.name + '</option>');
                        });

                        // If we have a selected district, trigger change to load villages
                        if (selectedDistrict && $('#district').val()) {
                            $('#village').prop('disabled', false);
                            loadVillages(selectedDistrict, initialVillage);
                        }
                    })
                    .fail(function(xhr, status, error) {
                        console.error('Error loading districts:', error);
                        alert('Gagal memuat data kecamatan. Silakan refresh halaman.');
                    });
            }

            function loadVillages(districtName, selectedVillage = '') {
                $.get('/villages/' + encodeURIComponent(districtName))
                    .done(function(data) {
                        $.each(data, function(key, value) {
                            var selected = (selectedVillage && value.name === selectedVillage) ?
                                'selected' : '';
                            $('#village').append('<option value="' + value.name + '" data-id="' + value
                                .id + '" ' + selected + '>' + value.name + '</option>');
                        });
                    })
                    .fail(function(xhr, status, error) {
                        console.error('Error loading villages:', error);
                        alert('Gagal memuat data kelurahan/desa. Silakan refresh halaman.');
                    });
            }
        });
    </script>
@endsection
