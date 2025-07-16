@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.categories.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Edit Kategori</h1>
        </div>

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">

            <!-- Form body -->
            <div class="p-6">
                <form action="{{ route('admin.categories.update', $categories->id) }}" enctype="multipart/form-data"
                    method="POST" class="space-y-6">
                    @csrf
                    @method('put')

                    <!-- Profile photo upload section -->
                    <div
                        class="flex flex-col items-center mb-8 p-4 border border-dashed border-gray-300 rounded-lg bg-gray-50">
                        <div class="mb-4 relative group">
                            <img id="profilePreview" src="{{ asset('/storage/' . $categories->image_categori) }}"
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
                        <input id="profilInput" name="image_categori" type="file" accept=".jpg, .jpeg, .png"
                            onchange="previewImage(event)" class="hidden">
                        <label for="profilInput"
                            class="text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">
                            Unggah Foto Kategori <span class="text-xs text-gray-500">(optional)</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500">Format foto: JPG, JPEG, PNG. Max 2MB.</p>
                        {{-- <x-input-error :messages="$errors->get('image_categori')" class="mt-1 text-xs" /> --}}
                    </div>

                    <!-- Form fields in sections -->
                    <div class="space-y-8">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 p-4 rounded-lg">

                            <div class="grid grid-cols-1  gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                        Nama Kategori <span class="text-red-500">*</span>
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
                                            placeholder="Nama Kategori" value="{{ $categories->name }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
                                </div>



                                <!-- Gender -->
                                <div>
                                    <label for="level_id" class="block mb-2 text-sm font-medium text-gray-700">
                                        Level <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <select id="level_id" name="level_id"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="{{ old('level_id') }}" selected>
                                                {{ old('level_id') ? old('level_id') : 'Pilih Level' }}
                                            </option>
                                            @foreach ($level as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $data->id == $categories->level_id ? 'selected' : '' }}>
                                                    {{ $data->level_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('level_id')" class="mt-1 text-xs" />
                                </div>

                                <!-- Institution -->
                                <div>
                                    <label for="is_locked" class="block mb-2 text-sm font-medium text-gray-700">
                                        Is Locked <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <select id="is_locked" name="is_locked" onchange="showCustomInput()"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="{{ old('is_locked') }}" selected>
                                                {{ old('is_locked') ? old('is_locked') : 'Pilih Is Locked ' }}
                                            </option>
                                            <option value="1" {{ $categories->is_locked == '1' ? 'selected' : '' }}>
                                                True</option>
                                            <option value="0" {{ $categories->is_locked == '0' ? 'selected' : '' }}>
                                                False</option>
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('is_locked')" class="mt-1 text-xs" />
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
                            Edit Kategori
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
