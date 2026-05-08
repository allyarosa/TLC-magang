<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Profil - Step 2 | TLC</title>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0C548C",
                        navy: "#2E4D69",
                        accent: "#FBCB04",
                    }
                }
            }
        }
    </script>
    <style>
        .section-card { transition: box-shadow 0.2s; }
        .section-card:focus-within { box-shadow: 0 0 0 2px #0C548C33; }
        input, select, textarea { outline: none; }
        input:focus, select:focus { border-color: #0C548C !important; box-shadow: 0 0 0 3px rgba(12,84,140,0.1); }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

<div class="max-w-3xl mx-auto py-10 px-4 sm:px-6">

    {{-- Header --}}
    <div class="text-center mb-8">
        <img src="{{ asset('images/logoTlcPng.png') }}" alt="TLC" class="h-14 mx-auto mb-3">
        <h1 class="text-2xl font-extrabold text-navy">Lengkapi Data Profil Anda</h1>
        <p class="text-gray-500 text-sm mt-1">Diperlukan sebelum mengakses platform TLC</p>
    </div>

    {{-- Step Indicator --}}
    <div class="flex items-center justify-center gap-0 mb-8">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white text-sm font-bold">✓</div>
            <span class="text-sm font-medium text-green-600">Buat Akun</span>
        </div>
        <div class="w-16 h-0.5 bg-primary mx-2"></div>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">2</div>
            <span class="text-sm font-bold text-primary">Data Profil</span>
        </div>
        <div class="w-16 h-0.5 bg-gray-300 mx-2"></div>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-500 text-sm font-bold">3</div>
            <span class="text-sm text-gray-400">Dashboard</span>
        </div>
    </div>

    {{-- Session Info --}}
    @if(session('success'))
        <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif
    @if(session('info'))
        <div class="mb-4 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-lg text-sm">
            {{ session('info') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
            <strong class="font-bold">Terdapat kesalahan:</strong>
            <ul class="mt-1 list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registeraddtionalpost') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        {{-- Carry checkout intent through Step 2 so we redirect to checkout after completion --}}
        @if(!empty($checkout))
            <input type="hidden" name="checkout" value="{{ $checkout }}">
        @endif

        {{-- ===== SECTION 1: FOTO PROFIL ===== --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 section-card">
            <h2 class="text-base font-bold text-navy mb-4 flex items-center gap-2">
                <span class="w-6 h-6 rounded-full text-white text-xs flex items-center justify-center font-bold">📷</span>
                Foto Profil <span class="text-gray-400 font-normal text-sm">(opsional)</span>
            </h2>
            <div class="flex flex-col items-center">
                <div class="relative group mb-3">
                    <img id="profilePreview" src="{{ asset('assets/img/blank_profile.png') }}" alt="Foto Profil"
                        class="w-28 h-28 object-cover rounded-full border-4 border-primary/20 shadow-md transition-all duration-200">
                    <label for="profile_image" class="absolute inset-0 flex items-center justify-center rounded-full bg-black/30 opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity">
                        <span class="text-white text-xs font-semibold">Ganti</span>
                    </label>
                </div>
                <input id="profile_image" name="profile_image" type="file" accept=".jpg,.jpeg,.png"
                    onchange="previewImage(event)" class="hidden">
                <label for="profile_image" class="text-sm text-primary font-medium cursor-pointer hover:underline">
                    Upload Foto Profil
                </label>
                <p class="text-xs text-gray-400 mt-1">JPG, JPEG, PNG. Maks 2MB.</p>
            </div>
        </div>

        {{-- ===== SECTION 2: IDENTITAS DIRI ===== --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 section-card">
            <h2 class="text-base font-bold text-navy mb-4">👤 Identitas Diri</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Nama Depan (dengan gelar) --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap / Gelar <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso, S.Pd."
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150 placeholder:text-inputHint" required>
                    <p class="text-xs text-gray-400 mt-1">Nama ini akan digunakan pada sertifikat Anda.</p>
                    @error('nama')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- NIK --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">NIK <span class="text-gray-400 font-normal">(opsional)</span></label>
                    <input type="text" name="nik" value="{{ old('nik') }}" placeholder="16 digit angka" maxlength="16"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150 placeholder:text-inputHint"
                        oninput="this.value=this.value.replace(/\D/g,'')">
                    @error('nik')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <select name="jenis_kelamin" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150">
                        <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Tempat Lahir --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tempat Lahir <span class="text-red-500">*</span></label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Kota kelahiran"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150 placeholder:text-inputHint" required>
                    @error('tempat_lahir')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150" required>
                    @error('tanggal_lahir')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>


                {{-- No WhatsApp — hanya tampil untuk user lama yang belum mengisi --}}
                @if(!$hasNoWa)
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor WhatsApp <span class="text-red-500">*</span></label>
                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                        <span class="bg-gray-100 px-3 py-2.5 text-sm text-gray-500 border-r border-gray-300">+62</span>
                        <input type="text" name="no_wa" value="{{ old('no_wa') }}" placeholder="81234567890"
                            class="flex-1 px-3 py-2.5 text-sm border-0 focus:ring-0" required
                            oninput="this.value=this.value.replace(/\D/g,'')">
                    </div>
                    @error('no_wa')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>
                @endif

            </div>
        </div>

        {{-- ===== SECTION 3: PEKERJAAN & INSTANSI ===== --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 section-card">
            <h2 class="text-base font-bold text-navy mb-4">🏢 Pekerjaan & Instansi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Profesi --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Profesi <span class="text-red-500">*</span></label>
                    <select name="profesi" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150">
                        <option value="" disabled {{ old('profesi') ? '' : 'selected' }}>-- Pilih Profesi --</option>
                        @foreach(['Guru', 'Dosen', 'Trainer / Instruktur', 'Kepala Sekolah', 'Pengawas / Supervisor', 'Tenaga Kependidikan', 'Mahasiswa', 'Lainnya'] as $p)
                            <option value="{{ $p }}" {{ old('profesi') == $p ? 'selected' : '' }}>{{ $p }}</option>
                        @endforeach
                    </select>
                    @error('profesi')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Lama Masa Kerja --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Lama Masa Kerja <span class="text-gray-400 font-normal">(opsional)</span></label>
                    <select name="lama_masa_kerja"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150">
                        <option value="">-- Pilih --</option>
                        @foreach(['< 1 tahun', '1–3 tahun', '4–6 tahun', '7–10 tahun', '> 10 tahun'] as $lm)
                            <option value="{{ $lm }}" {{ old('lama_masa_kerja') == $lm ? 'selected' : '' }}>{{ $lm }}</option>
                        @endforeach
                    </select>
                    @error('lama_masa_kerja')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Instansi --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Instansi <span class="text-red-500">*</span></label>
                    <select id="instansi" name="instansi" onchange="showCustomInput()" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150">
                        <option value="" disabled {{ old('instansi') ? '' : 'selected' }}>-- Pilih Instansi --</option>
                        @foreach(['Perguruan Tinggi', 'Pemerintah', 'Sekolah Menengah Atas', 'Sekolah Menengah Kejuruan', 'Sekolah Menengah Pertama', 'Sekolah Dasar', 'Lembaga Kursus', 'Lainnya'] as $inst)
                            <option value="{{ $inst }}" {{ old('instansi') == $inst ? 'selected' : '' }}>{{ $inst }}</option>
                        @endforeach
                    </select>
                    @error('instansi')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Custom Instansi --}}
                <div id="custom-instansi" class="md:col-span-2 {{ old('instansi') == 'Lainnya' ? '' : 'hidden' }}">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Instansi (Lainnya)</label>
                    <input type="text" name="custom_instansi" value="{{ old('custom_instansi') }}" placeholder="Tuliskan nama instansi Anda"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150 placeholder:text-inputHint">
                    @error('custom_instansi')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        {{-- ===== SECTION 4: LATAR BELAKANG PENDIDIKAN ===== --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 section-card">
            <h2 class="text-base font-bold text-navy mb-1">🎓 Latar Belakang Pendidikan</h2>
            <p class="text-xs text-gray-400 mb-4">Semua field di bagian ini opsional</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Jenjang Pendidikan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jenjang Pendidikan</label>
                    <select name="latar_belakang_pendidikan"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150">
                        <option value="">-- Pilih --</option>
                        @foreach(['SMA/SMK', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'] as $jenjang)
                            <option value="{{ $jenjang }}" {{ old('latar_belakang_pendidikan') == $jenjang ? 'selected' : '' }}>{{ $jenjang }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tahun Studi --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tahun Lulus</label>
                    <input type="text" name="tahun_studi" value="{{ old('tahun_studi') }}" placeholder="Contoh: 2018"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150"
                        maxlength="4" oninput="this.value=this.value.replace(/\D/g,'')">
                </div>

                {{-- Nama Universitas --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Universitas / Sekolah</label>
                    <input type="text" name="nama_universitas" value="{{ old('nama_universitas') }}" placeholder="Nama institusi pendidikan"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150">
                </div>

                {{-- Program Studi --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Program Studi / Jurusan</label>
                    <input type="text" name="program_studi" value="{{ old('program_studi') }}" placeholder="Contoh: Pendidikan Matematika"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm transition-all duration-150">
                </div>
            </div>
        </div>

        {{-- ===== SECTION 5: WILAYAH ===== --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 section-card">
            <h2 class="text-base font-bold text-navy mb-4">📍 Wilayah Domisili</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Provinsi --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Provinsi <span class="text-red-500">*</span></label>
                    <select id="province" name="provinsi" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150">
                        <option value="{{ old('provinsi') }}" selected>
                            {{ old('provinsi') ?: '-- Pilih Provinsi --' }}
                        </option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->name }}" {{ old('provinsi') == $province->name ? 'selected' : '' }}>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('provinsi')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Kabupaten/Kota --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kabupaten / Kota <span class="text-red-500">*</span></label>
                    <select id="regency" name="kabupaten" disabled required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150 disabled:bg-gray-50 disabled:text-gray-400">
                        <option value="">-- Pilih Kabupaten/Kota --</option>
                    </select>
                    @error('kabupaten')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Kecamatan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kecamatan <span class="text-red-500">*</span></label>
                    <select id="district" name="kecamatan" disabled required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150 disabled:bg-gray-50 disabled:text-gray-400">
                        <option value="">-- Pilih Kecamatan --</option>
                    </select>
                    @error('kecamatan')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>

                {{-- Kelurahan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kelurahan / Desa <span class="text-red-500">*</span></label>
                    <select id="village" name="kelurahan" disabled required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white transition-all duration-150 disabled:bg-gray-50 disabled:text-gray-400">
                        <option value="">-- Pilih Kelurahan --</option>
                    </select>
                    @error('kelurahan')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="w-full bg-gradient-to-r from-brandBlue to-navy text-white font-bold py-3.5 px-6 rounded-xl hover:from-[#063B67] hover:to-[#1C3A58] transition-all duration-200 shadow-md text-base">
            Simpan & Lanjutkan ke Dashboard →
        </button>

        <p class="text-center text-xs text-gray-400 pb-6">
            Data Anda aman dan hanya digunakan untuk keperluan sertifikasi TLC.
        </p>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById('profilePreview').src = reader.result;
        };
        if (event.target.files && event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }

    function showCustomInput() {
        const val = document.getElementById("instansi").value;
        const el = document.getElementById("custom-instansi");
        const input = el.querySelector('input');
        if (val === "Lainnya") {
            el.classList.remove('hidden');
            input.required = true;
        } else {
            el.classList.add('hidden');
            input.required = false;
        }
    }

    $(document).ready(function () {
        $('#province').change(function () {
            const name = $(this).val();
            $('#regency').prop('disabled', true).html('<option value="">Memuat...</option>');
            $('#district').prop('disabled', true).html('<option value="">-- Pilih Kecamatan --</option>');
            $('#village').prop('disabled', true).html('<option value="">-- Pilih Kelurahan --</option>');

            if (name) {
                $.get('/regencies/' + encodeURIComponent(name), function (data) {
                    let opts = '<option value="">-- Pilih Kabupaten/Kota --</option>';
                    $.each(data, function (i, v) { opts += '<option value="' + v.name + '">' + v.name + '</option>'; });
                    $('#regency').html(opts).prop('disabled', false);
                });
            }
        });

        $('#regency').change(function () {
            const name = $(this).val();
            $('#district').prop('disabled', true).html('<option value="">Memuat...</option>');
            $('#village').prop('disabled', true).html('<option value="">-- Pilih Kelurahan --</option>');

            if (name) {
                $.get('/districts/' + encodeURIComponent(name), function (data) {
                    let opts = '<option value="">-- Pilih Kecamatan --</option>';
                    $.each(data, function (i, v) { opts += '<option value="' + v.name + '">' + v.name + '</option>'; });
                    $('#district').html(opts).prop('disabled', false);
                });
            }
        });

        $('#district').change(function () {
            const name = $(this).val();
            $('#village').prop('disabled', true).html('<option value="">Memuat...</option>');

            if (name) {
                $.get('/villages/' + encodeURIComponent(name), function (data) {
                    let opts = '<option value="">-- Pilih Kelurahan --</option>';
                    $.each(data, function (i, v) { opts += '<option value="' + v.name + '">' + v.name + '</option>'; });
                    $('#village').html(opts).prop('disabled', false);
                });
            }
        });
    });
</script>
</html>