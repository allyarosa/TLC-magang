@extends('layouts.adminDashboard')
@section('title', $title)


@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.level.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Buat Level</h1>
        </div>

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Form header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-6 border-b border-gray-100">
                {{-- <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Informasi Pengguna
                </h3> --}}
                <p class="mt-1 text-sm text-gray-500">Isikan semua kolom yang wajib diisi untuk membuat kategori baru</p>
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
                <form action="{{ route('admin.level.store') }}" enctype="multipart/form-data" method="POST"
                    class="space-y-6">
                    @csrf


                    <!-- Account Information Section -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        {{-- <h4
                            class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-4 border-b pb-2 dark:text-gray-300">
                            Informasi Akun</h4> --}}


                        <div class="grid grid-cols-1 gap-6">
                            <!-- Email -->
                            <div>
                                <label for="level_name" class="block mb-2 text-sm font-medium text-gray-700">
                                    Nama Sertifikat <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <select id="level_name" name="level_name" onchange="showCustomInput()"
                                        class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="{{ old('level_name') }}" selected>
                                            {{ old('level_name') ? old('level_name') : 'Pilih ' }}
                                        </option>
                                        <option value="A">Level A</option>
                                        <option value="B">Level B</option>
                                        <option value="C">Level C</option>
                                    </select>
                                </div>
                                <x-input-error :messages="$errors->get('level_name')" class="mt-1 text-xs" />
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center mt-8 mb-2">
                <button type="submit"
                    class="px-6 py-3 text-base font-medium text-white bg-gradient-to-r from-[#0C548C] to-[#2E4D69] rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Buat Level
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
