<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primarys: "#FBCB04",
                        accent: "#F4CC7C",
                        darkblue: "#0C548C",
                        softblue: "#5F809C",
                        lightblue: "#A6BFCF",
                        navy: "#2E4D69",
                        white: "#FFFFFF",
                        black: "#000000",
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center  py-12 px-4">
    <div class="flex h-screen flex-col md:flex-row w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- Left Logo Panel -->
        <div
            class="hidden md:flex flex-col justify-center items-center w-1/2 bg-gradient-to-br from-[#A6BFCF] to-[#2E4D69] p-10 relative overflow-hidden">
            <!-- Animasi bakground element -->
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <div class="absolute w-40 h-40 rounded-full bg-white top-10 left-10 animate-pulse"></div>
                <div class="absolute w-20 h-20 rounded-full bg-white bottom-10 right-20 animate-ping"></div>
            </div>

            <h2 class="text-4xl font-extrabold text-white mt-4 text-center drop-shadow-lg">Mulai Perjalanan Anda Di TLC
            </h2>
            <p class="text-white text-center mt-4 mb-8">Layanan TLC untuk kenyamanan dan Kepuasan Anda</p>

            <div class="mt-6 w-44 h-44  justify-center">
                <img src="images/logoTlcPng.png" alt="TLC Care Logo" class="max-w-full max-h-full object-contain">
            </div>

            <div class="mt-10 text-white/90 flex flex-col gap-3">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Mentor terbaik</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Pelayanan 24/7</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Harga terjangkau</span>
                </div>
            </div>
        </div>

        <!-- Right Form Panel -->
        <div class="md:w-1/2 h-full overflow-y-auto p-8 bg-white">
            <h2 class="text-2xl font-bold text-[#2E4D69] mb-6">Form Registrasi 2</h2>
            <form action="{{ Route('registeraddtionalpost') }}" method="POST" class="space-y-4"
                enctype="multipart/form-data">
                @csrf

                {{-- NAMA --}}
                <div>
                    <label class="block text-lg font-medium text-bold text-gray-700">Nama Depan: </label>
                    <p class="italic text-sm">Silakan masukkan nama asli dan gelar akademik Anda (jika ada) guna
                        penerbitan sertifikat.</p>
                    <p class="italic text-yellow-400 text-sm">Jika tidak ada gelar akademik maka otomatis akan
                        menggunakan
                        Fullname anda yaitu : </p>
                    <input type="text" name="nama" placeholder="Example Name, S.T." required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-primarys focus:border-primarys">
                </div>

                {{-- NIK --}}
                <div>
                    <label class="block text-lg font-medium text-gray-700">NIK: </label>
                    <p class="italic text-sm">Pastikan NIK anda sudah terisi dengan benar dan tanpa spasi</p>
                    <input type="text" name="nik" placeholder="Nomor Induk Keluarga (Angka)" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>


                {{-- TEMPAT LAHIR --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label class="block text-lg font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                </div>

                {{-- JENIS KELAMIN --}}

                <div>
                    <label for="jenis_kelamin" class="pr-2 font-semibold">Jenis Kelamin <span
                            class="text-red-500">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                        <option value="" disabled selected>--Pilih Salah Satu--</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                {{-- NOMOR WA --}}
                <div>
                    <label for="no_wa" class="pr-2 font-medium text-gray-700">Nomor Whatsapp <span
                            class="text-red-500">*</span></label>
                    <input
                        class="w-full px-4 py-3 rounded-lg mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        type="number" id="no_wa" name="no_wa" placeholder="08xxxxxx" required>
                </div>

                {{-- INSTANSI --}}
                <div>
                    <label for="instansi" class="block mb-2 text-sm font-medium text-gray-700">
                        Institution
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <select id="instansi" name="instansi" onchange="showCustomInput()"
                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="{{ old('instansi') }}" selected>
                                {{ old('instansi') ? old('instansi') : 'Select Institution Type' }}
                            </option>
                            <option value="Perguruan Tinggi">Higher Education (Perguruan Tinggi)</option>
                            <option value="Pemerintah">Government (Pemerintah)</option>
                            <option value="Sekolah Menengah Atas">High School (SMA)</option>
                            <option value="Sekolah Menengah Kejuruan">Vocational School (SMK)</option>
                            <option value="Sekolah Menengah Pertama">Junior High School (SMP)</option>
                            <option value="Sekolah Dasar">Elementary School (SD)</option>
                            <option value="Lembaga Kursus">Course Institution</option>
                            <option value="Lainnya">Other</option>
                        </select>
                    </div>
                    <div id="custom-instansi" class="mt-2 hidden">
                        <input type="text" name="custom_instansi" placeholder="Enter custom institution"
                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <x-input-error :messages="$errors->get('instansi')" class="mt-1 text-xs" />
                </div>


                <div>
                    <label for="province" class="block mb-2 text-sm font-medium text-gray-700">
                        Province
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        </div>
                        <select id="province" name="provinsi"
                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="{{ old('provinsi') }}" selected>
                                {{ old('provinsi') ? old('provinsi') : 'Select Province' }}</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Regency/City -->
                <div>
                    <label for="regency" class="block mb-2 text-sm font-medium text-gray-700">
                        Regency/City
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <select id="regency" name="kabupaten" disabled
                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected disabled>Select Regency/City</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('kabupaten')" class="mt-1 text-xs" />
                </div>

                <!-- District -->
                <div>
                    <label for="district" class="block mb-2 text-sm font-medium text-gray-700">
                        District
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <select id="district" name="kecamatan" disabled
                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected disabled>Select District</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('kecamatan')" class="mt-1 text-xs" />
                </div>

                <!-- Village -->
                <div>
                    <label for="village" class="block mb-2 text-sm font-medium text-gray-700">
                        Villagej
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <select id="village" name="kelurahan" disabled
                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected disabled>Select Village</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('kelurahan')" class="mt-1 text-xs" />
                </div>

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
                    <input id="profile_image" name="profile_image" type="file" accept=".jpg, .jpeg, .png"
                        onchange="previewImage(event)" class="hidden">
                    <label for="profile_image"
                        class="text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">
                        Upload Profile Photo <span class="text-xs text-gray-500">(optional)</span>
                    </label>
                    <p class="mt-1 text-xs text-gray-500">Formats: JPG, JPEG, PNG. Max 2MB.</p>
                    {{-- <x-input-error :messages="$errors->get('profile_image')" class="mt-1 text-xs" /> --}}
                </div>

                {{-- GAMBAR --}}

                {{-- <div>
                    <!-- Image preview element -->
                    <div>
                    <img id="profilePreview" src="{{ asset('storage/images/blankProfile.png') }}" alt="Profile Picture"
                        class="w-24 h-24 rounded-full my-auto">
                    </div>

                    <div class="mt-3">
                        <label class="pr-2 font-semibold" for="profilInput">
                            Upload Foto Profile (opsional)
                        </label>
                        <input
                        class="w-full upload-btn block text-sm text-gray-900 border border-black rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="profilInput_help" name="profile_image" accept=".jpg, .jpeg, .png"
                        id="profilInput" type="file" onchange="previewImage(event)">
                    </div>
                </div> --}}

                <div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-[#0C548C] to-[#2E4D69] text-white font-bold py-2 px-4 mt-2 rounded-md hover:bg-accent transition duration-300">Daftar</button>
                </div>
            </form>
        </div>

    </div>
</body>
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

</html>