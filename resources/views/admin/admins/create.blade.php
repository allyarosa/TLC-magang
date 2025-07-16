@extends('layouts.adminDashboard')

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.admins.index') }}"
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
                <p class="mt-1 text-sm text-gray-500">Isikan semua kolom yang wajib diisi untuk membuat akun Admin baru</p>
            </div>

            <!-- Form body -->
            <div class="p-6">
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('admin.admins.store') }}" enctype="multipart/form-data" method="POST"
                    class="space-y-6">
                    @csrf

                    <!-- Profile photo upload section -->
                    <div
                        class="flex flex-col items-center mb-8 p-4 border border-dashed border-gray-300 rounded-lg bg-gray-50">
                        <div class="mb-4 relative group">
                            <img id="profilePreview" src="{{ asset('assets/img/blank_profile.png') }}" alt="Profile Picture"
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

                    <!-- Account Information Section -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4
                            class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-4 border-b pb-2 dark:text-gray-300">
                            Informasi Akun</h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
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
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                                    Password <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
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
