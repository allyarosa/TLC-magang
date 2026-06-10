@extends('layouts.asesiDashboard')

@section('content')
    <section class="min-h-screen pb-20 md:ml-64">
        <div class="flex-1 p-4 md:p-12 min-h-screen bg-blue-50/60">
            <!-- Header Section -->
            <header class="mb-12 max-w-4xl hidden md:block">
                <h1 class="text-3xl font-bold text-gray-800 tracking-tight mb-2">Pengaturan Profil</h1>
                <p class="text-lg text-gray-800 font-body">Kelola identitas, informasi kontak, dan data profesional Anda
                    dengan mudah.</p>
            </header>

            @if (session()->has('warning'))
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6 rounded-lg flex items-start">
                    <svg class="w-5 h-5 text-yellow-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <p class="font-medium text-yellow-800">
                            Perhatian!
                        </p>
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
            <form method="POST" action="{{ route('asesi.profile.update') }}" id="profileForm"
                enctype="multipart/form-data" class="max-w-4xl space-y-12 pb-12 bg-whit">
                @csrf
                @method('PUT')

                <!-- Section 1: Data Pribadi (Bento-ish Grid) -->
                <section class="bg-white p-8 rounded-xl shadow-md" id="personal-data">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items- center gap-3 text-brandBlue">
                            <span class="material-symbols-outlined">person</span>
                            <h3 class="text-xl font-bold font-headline">Data Pribadi</h3>
                        </div>
                        {{-- <button
                            class="bg-brandBlue text-white px-6 py-2 rounded-lg text-sm font-semibold hover:brightness-110 transition-all">
                            Simpan Perubahan
                        </button> --}}
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                        <div
                            class="md:col-span-4 flex flex-col items-center justify-center border-r border-outline-variant/10 pr-8">
                            <div class="relative group cursor-pointer">
                                <div class="w-32 h-32 rounded-full overflow-hidden bg-surface-container shadow-inner">
                                    <img class="w-full h-full object-cover" id="profileImage" alt="Foto Profile"
                                        src="{{ asset('storage/' . (auth()->user()->userProfile->profile_image ?? '/images/blankProfile.png')) }}"
                                        data-alt="close up of a professional educator looking friendly at the camera in a modern minimalist school setting"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmRkuHsWuW4qi3E5iESDpUUupDbL_7CRBffOlCJjjxxd1Jp-I1O4HdyDbcTqqVhktCvItmTDg3BC2KDAkZ2fknyTnPjNIk6d7DPgBfc92hDqV1YhKXF4R7DIIfTAnBqjC_tQydwMnRapPfQoF_gEaR60jxQrJtDvRR2Z4Rcms0Pb_Jyxr7BaF5dCQYRh7ff7QxpASyixADH2J4r-6T2KRUfwwh6HswHfBiG8QHMFdgboke9A_cXPTSjXD2hOUB-1HSLJlewrG8ayC8">
                                </div>
                                <label for="profileInput"
                                    class="absolute bottom-0 right-0 bg-white p-2 rounded-full shadow-[0_4px_12px_rgba(0,0,0,0.1)] cursor-pointer hover:bg-blue-50 text-blue-600 hover:text-blue-700 hover:scale-105 transition-all duration-300 border border-slate-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-current"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <input type="file" id="profileInput" name="profile_image" accept=".jpg,.jpeg,.png"
                                        class="hidden" onchange="previewImage(event)">
                                </label>
                                {{-- <div
                                    class="absolute inset-0 bg-primary/40 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span class="material-symbols-outlined text-white">photo_camera</span>
                                </div> --}}
                            </div>
                            <span
                                class="mt-4 text-xs text-gray-800 font-semibold uppercase tracking-widest text-outline">Foto
                                Profile</span>
                        </div>
                        <div class="md:col-span-8 space-y-6">
                            <div class="grid grid-cols-2 gap-4">

                                {{-- NAMA LENGKAP --}}
                                <div class="space-y-2">
                                    <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Nama
                                        Lengkap + Gelar</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 focus:bg-gray-200 transition-all placeholder:text-gray-400 {{ ($hasCertificate ?? false) ? 'cursor-not-allowed opacity-75' : '' }}"
                                        type="text" placeholder="Nama lengkap anda + gelar" name="nama_depan" required
                                        value="{{ auth()->user()->userProfile->nama_depan }}"
                                        {{ ($hasCertificate ?? false) ? 'readonly' : '' }}
                                        >
                                    @if($hasCertificate ?? false)
                                        <p class="text-xs text-gray-500 mt-1">Nama lengkap tidak dapat diubah karena Anda sudah memiliki sertifikat yang diterbitkan.</p>
                                    @endif
                                    @error('nama_depan')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- NO WA --}}
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">No.Whatsapp</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 focus:bg-gray-200 transition-all placeholder:text-gray-400"
                                        type="tel" placeholder="Nomor Whatsapp anda" maxlength="20" name="no_wa"
                                        value="{{ old('no_wa', auth()->user()->userProfile->no_wa ?? '' ? '+62 ' . implode(' ', str_split(Str::substr(preg_replace('/\D/', '', auth()->user()->userProfile->no_wa), 2), 3)) : '+62 ') }}"
                                        oninput="
                            let raw = this.value.replace(/[^0-9]/g, '');
                            if (!raw.startsWith('62')) {
                            raw = '62' + raw.replace(/^62/, '');
                            }
                            let formatted = '+62';
                            let number = raw.slice(2); // remove '62'
                            if (number.length > 0) {
                            formatted += ' ' + number.match(/.{1,3}/g).join(' ');
                            }
                            this.value = formatted.slice(0, 20);
                        ">
                                    @error('no_wa')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">

                                {{-- EMAIL --}}
                                {{-- <div class="space-y-2">
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Email</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 focus:bg-gray-200 transition-all placeholder:text-gray-400"
                                        type="email" placeholder="Email aktif anda">
                                </div> --}}
                                {{-- JENIS KELAMIN --}}
                                <div class="space-y-2">
                                    <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Jenis
                                        Kelamin</label>
                                    <select
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20"
                                        name="jenis_kelamin">
                                        {{-- <option class="bg-white" selected disabled>Pilih jenis kelamin</option> --}}
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L"
                                            {{ old('jenis_kelamin', auth()->user()->userProfile->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P"
                                            {{ old('jenis_kelamin', auth()->user()->userProfile->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- NIK --}}
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">NIK</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 focus:bg-gray-200 transition-all placeholder:text-gray-400"
                                        type="text" placeholder="Nomor Induk Kependudukan anda" maxlength="16" name="nik"
                                        value="{{ old('nik', auth()->user()->userProfile->nik ?? '') }}"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);">
                                    @error('nik')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                {{-- TEMPAT LAHIR --}}
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Tempat
                                        Lahir</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 focus:bg-gray-200 transition-all placeholder:text-gray-400"
                                        type="text" name="tempat_lahir" placeholder="Tempat lahir anda" maxlength="25"
                                        value="{{ old('tempat_lahir', auth()->user()->userProfile->tempat_lahir ?? '') }}"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z.,\s]/g, '')">
                                    @error('tempat_lahir')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- TANGGAL LAHIR --}}
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Tanggal
                                        Lahir</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 focus:bg-gray-200 transition-all placeholder:text-gray-400"
                                        type="date" placeholder="Tanggal lahir anda" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', auth()->user()->userProfile->tanggal_lahir ?? '') }}">
                                    @error('tanggal_lahir')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                {{-- JENIS KELAMIN --}}
                                {{-- <div class="space-y-2">
                                    <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Jenis
                                        Kelamin</label>
                                    <select
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20">
                                        <option class="bg-white" selected disabled>Pilih jenis kelamin</option>
                                        <option class="bg-white">Laki-laki</option>
                                        <option class="bg-white">Perempuan</option>
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Section 2: Pendidikan & Pekerjaan (Asymmetric Split) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Pendidikan -->
                    <section class="bg-white p-8 rounded-xl shadow-md">
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex items-center gap-3 text-brandBlue">
                                <span class="material-symbols-outlined">school</span>
                                <h3 class="text-xl font-bold font-headline">Pendidikan</h3>
                            </div>
                        </div>
                        <div class="space-y-4">

                            {{-- JENJANG PENDIDIKAN --}}
                            <div class="space-y-2">
                                <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Jenjang
                                    Pendidikan</label>
                                <select
                                    class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20"
                                    name="latar_belakang_pendidikan">
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
                                @error('latar_belakang_pendidikan')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- INSTITUSI --}}
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Institusi</label>
                                <input class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder-gray-400"
                                    type="text" placeholder="Institusi pendidikan anda" name="nama_universitas"
                                    value="{{ old('nama_universitas', auth()->user()->userProfile->nama_universitas ?? '') }}">
                                @error('nama_universitas')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                {{-- TAHUN STUDI --}}
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Tahun
                                        Lulus</label>
                                    <select name="tahun_studi" id="tahun_studi"
                                        class=" w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder:text-gray-400">
                                        <option value="">Pilih Tahun Lulus</option>
                                        @for ($year = date('Y'); $year >= 1970; $year--)
                                            <option value="{{ $year }}"
                                                {{ old('tahun_studi', auth()->user()->userProfile->tahun_studi ?? '') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('tahun_studi')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="space-y-2">

                                    {{-- PROGRAM STUDI --}}
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Program
                                        Studi</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder:text-gray-400"
                                        type="text" name="program_studi"
                                        value="{{ old('program_studi', auth()->user()->userProfile->program_studi ?? '') }}"
                                        placeholder="Program studi anda">
                                    @error('program_studi')
                                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <button
                                class="w-full mt-4 bg-brandBlue text-white font-bold py-2 rounded-lg text-sm hover:brightness-110 transition-all">
                                Simpan Data Pendidikan
                            </button> --}}
                        </div>
                    </section>
                    <!-- Pekerjaan -->
                    <section class="bg-white p-8 rounded-xl shadow-md">
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex items-center gap-3 text-brandBlue">
                                <span class="material-symbols-outlined">work</span>
                                <h3 class="text-xl font-bold font-headline">Pekerjaan</h3>
                            </div>
                        </div>
                        <div class="space-y-4">

                            {{-- PROFESI/PEKERJAAN --}}
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Profesi/Pekerjaan</label>
                                <select name="instansi" id="instansiSelect"
                                    class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder:text-gray-400">
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
                                @error('instansi')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div id="customInstansiDiv"
                                class="space-y-2 {{ old('instansi', auth()->user()->userProfile->instansi ?? '') == 'Lainnya' ? '' : 'hidden' }}">
                                <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Instansi
                                    Aktif</label>
                                <input type="text" name="custom_instansi" id="customInstansiInput"
                                    class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder:text-gray-400"
                                    placeholder="Masukkan nama instansi aktif anda"
                                    {{ old('instansi', auth()->user()->userProfile->instansi ?? '') == 'Lainnya' ? '' : 'disabled' }}
                                    value="{{ old('custom_instansi', auth()->user()->userProfile->custom_instansi ?? '') }}">
                                @error('custom_instansi')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- LAMA MASA KERJA --}}
                            <div class="space-y-2">
                                <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Lama
                                    masa kerja</label>
                                <select name="lama_masa_kerja"
                                    class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm">
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
                                @error('lama_masa_kerja')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- INSTANSI --}}
                            <div class="space-y-2">
                                <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Jenis
                                    Instansi</label>
                                <input
                                    class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder:text-gray-400"
                                    type="text" placeholder="jenis instansi anda" name="profesi"
                                    value="{{ old('profesi', auth()->user()->userProfile->profesi ?? '') }}">
                            </div>
                            {{-- <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Jabatan</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder:text-gray-400"
                                        type="text" placeholder="Jabatan anda saat ini">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Lama
                                        Mengajar (Tahun)</label>
                                    <input
                                        class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm placeholder:text-gray-400"
                                        type="text" placeholder="Tahun lama mengajar(opsional)">
                                </div>
                            </div> --}}
                            {{-- <button
                                class="w-full mt-4 bg-brandBlue text-white font-bold py-2 rounded-lg text-sm hover:brightness-110 transition-all">
                                Simpan Data Pekerjaan</button> --}}
                        </div>
                    </section>
                </div>
                <!-- Section 4: Alamat -->
                <section class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center gap-3 text-brandBlue mb-8">
                        <span class="material-symbols-outlined">location_on</span>
                        <h3 class="text-xl font-bold font-headline">Domisili</h3>
                    </div>
                    <input type="hidden" name="province_id" id="province_id"
                        value="{{ old('province_id', auth()->user()->userProfile->province_id ?? '') }}">
                    <input type="hidden" name="regency_id" id="regency_id"
                        value="{{ old('regency_id', auth()->user()->userProfile->regency_id ?? '') }}">
                    <input type="hidden" name="district_id" id="district_id"
                        value="{{ old('district_id', auth()->user()->userProfile->district_id ?? '') }}">
                    <input type="hidden" name="village_id" id="village_id"
                        value="{{ old('village_id', auth()->user()->userProfile->village_id ?? '') }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- PROVINSI --}}
                        <div class="space-y-2">
                            <label
                                class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Provinsi</label>
                            <select id="province" name="provinsi"
                                class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20">
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

                        {{-- KABUPATEN/KOTA --}}
                        <div class="space-y-2">
                            <label
                                class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Kabupaten</label>
                            <select id="regency" name="kabupaten" disabled
                                class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 disabled:bg-gray-100 disabled:cursor-not-allowed">
                                <option value="">Pilih Kabupaten/Kota</option>
                                @if (old('kabupaten', auth()->user()->userProfile->kabupaten ?? ''))
                                    <option value="{{ old('kabupaten', auth()->user()->userProfile->kabupaten ?? '') }}"
                                        selected>
                                        {{ old('kabupaten', auth()->user()->userProfile->kabupaten ?? '') }}
                                    </option>
                                @endif
                            </select>
                            @error('kabupaten')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Kecamatan</label>
                            <select id="district" name="kecamatan" disabled
                                class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 disabled:bg-gray-100 disabled:cursor-not-allowed">
                                <option value="">Pilih Kecamatan</option>
                                @if (old('kecamatan', auth()->user()->userProfile->kecamatan ?? ''))
                                    <option value="{{ old('kecamatan', auth()->user()->userProfile->kecamatan ?? '') }}"
                                        selected>
                                        {{ old('kecamatan', auth()->user()->userProfile->kecamatan ?? '') }}
                                    </option>
                                @endif
                            </select>
                            @error('kecamatan')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label
                                class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Kelurahan</label>
                            <select id="village" name="kelurahan" disabled
                                class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20 disabled:bg-gray-100 disabled:cursor-not-allowed">
                                <option value="">Pilih Kelurahan</option>
                                @if (old('kelurahan', auth()->user()->userProfile->kelurahan ?? ''))
                                    <option value="{{ old('kelurahan', auth()->user()->userProfile->kelurahan ?? '') }}"
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
                </section>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="inline-flex items-center justify-center bg-brandBlue text-white px-8 py-3 rounded-xl text-sm font-semibold hover:brightness-110 transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            <!-- Section 5: Keamanan (Glassmorphism Accents) -->
            <section class="bg-white p-8 rounded-xl shadow-md overflow-hidden relative max-w-4xl">
                {{-- <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/5 rounded-full -mr-32 -mt-32"></div> --}}
                <div class="flex items-center gap-3 text-brandBlue mb-8">
                    <span class="material-symbols-outlined">shield</span>
                    <h3 class="text-xl font-bold font-headline">Keamanan Akun</h3>
                </div>
                <div class="space-y-6 relative z-10">
                    <form method="POST" action="{{ route('asesi.password.change') }}"
                        class="py-4 px-6 bg-blue-200/30 rounded-xl space-y-6">
                        @csrf
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-white rounded-lg text-brandBlue">
                                <span class="material-symbols-outlined">lock</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-700">Ubah Kata Sandi</h4>
                                <p class="text-xs text-on-surface-variant">Masukkan password saat ini dan password baru
                                    Anda</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label for="current_password"
                                    class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Password
                                    Saat Ini</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="w-full bg-white border border-blue-100 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20"
                                    required>
                                @error('current_password')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="new_password"
                                    class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Password
                                    Baru</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="w-full bg-white border border-blue-100 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20"
                                    required>
                                @error('new_password')
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="new_password_confirmation"
                                    class="text-xs font-label font-bold text-gray-700 uppercase tracking-wider">Konfirmasi
                                    Password Baru</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="w-full bg-white border border-blue-100 rounded-lg p-3 text-sm focus:ring-2 focus:ring-primary/20"
                                    required>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center justify-center bg-brandBlue text-white px-6 py-3 rounded-xl text-sm font-semibold hover:brightness-110 transition-all">
                                Perbarui Sandi
                            </button>
                        </div>
                    </form>

                    {{-- <div class="flex items-center justify-between p-6 bg-blue-200/30 rounded-xl">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-secondary-container rounded-lg text-brandBlue">
                                <span class="material-symbols-outlined">verified_user</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-700">Verifikasi Dua Faktor (2FA)</h4>
                                <p class="text-xs text-on-surface-variant">Tambah lapisan keamanan ekstra untuk
                                    akun Anda</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input checked="" class="sr-only peer" type="checkbox" value="">
                            <div
                                class="w-11 h-6 bg-surface-container-highest peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary">
                            </div>
                        </label>
                    </div> --}}
                </div>
            </section>
        </div>
    </section>

    <style>
        .no-spinner::-webkit-outer-spin-button,
        .no-spinner::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .no-spinner {
            -moz-appearance: textfield;
            appearance: textfield;
        }
    </style>

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
                button.classList.remove('active', 'border-blue-600', 'text-blue-600');
                button.classList.add('border-transparent', 'text-slate-500');
            });

            document.getElementById(tabName + 'Tab').classList.add('active', 'border-blue-600', 'text-blue-600');
            document.getElementById(tabName + 'Tab').classList.remove('border-transparent', 'text-slate-500');
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
            function toggleCustomInstansi() {
                var isLainnya = $('#instansiSelect').val() === 'Lainnya';

                $('#customInstansiDiv').toggleClass('hidden', !isLainnya);
                $('#customInstansiInput').prop('disabled', !isLainnya);

                if (!isLainnya) {
                    $('#customInstansiInput').val('');
                }
            }

            toggleCustomInstansi();
            $('#instansiSelect').on('change', toggleCustomInstansi);

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