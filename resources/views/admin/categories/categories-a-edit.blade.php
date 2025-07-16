@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.categories.a.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Edit Kategori</h1>
        </div>

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Form header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-2 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Informasi Kategori
                </h3>
                <p class="mt-1 text-sm text-gray-500">Hasil edit kategori akan langsung ditampilkan pada asesi dashboard
                </p>
            </div>

            <!-- Form body -->
            <div class="p-2">
                <form action="{{ route('admin.categories.a.update', $category->id) }}" enctype="multipart/form-data"
                    method="POST" class="">
                    @csrf
                    @method('put')

                    <!-- Form fields in sections -->
                    <div class="space-y-8">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                                                    d="M4 6h16M4 12h16M4 18h7" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" id="name" required
                                            placeholder="Input Nama Kategori" value="{{ $category->name }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
                                </div>

                                <div>
                                    <label for="time_limit" class="block mb-2 text-sm font-medium text-gray-700">
                                        Time Limit <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 6h16M4 12h16M4 18h7" />
                                            </svg>
                                        </div>
                                        <input type="number" name="time_limit" id="time_limit" required
                                            placeholder="Input time limit pengerjaan kategori"
                                            value="{{ $category->time_limit }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('time_limit')" class="mt-1 text-xs" />
                                </div>

                                <div>
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-700">
                                        Deskripsi Kategori <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 6h16M4 12h16M4 18h7" />
                                            </svg>
                                        </div>
                                        <input type="text" name="description" id="description" required
                                            placeholder="Input Deskripsi dari Kategori" value="{{ $category->description }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('description')" class="mt-1 text-xs" />
                                </div>

                                <!-- Kunci Kategori - Boolean Select -->
                                <div>
                                    <label for="is_locked" class="block mb-2 text-sm font-medium text-gray-700">
                                        Kunci Kategori <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <select name="is_locked" id="is_locked" required
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="1"
                                                {{ isset($category->is_locked) && $category->is_locked == true ? 'selected' : '' }}>
                                                Ya (Terkunci)</option>
                                            <option value="0"
                                                {{ isset($category->is_locked) && $category->is_locked == false ? 'selected' : '' }}>
                                                Tidak (Tidak Terkunci)</option>
                                        </select>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Kunci kategori default adalah tidak terkunci</p>
                                    <x-input-error :messages="$errors->get('is_locked')" class="mt-1 text-xs" />
                                </div>

                                {{-- PASSING SCORE --}}
                                <div>
                                    <label for="time_limit" class="block mb-2 text-sm font-medium text-gray-700">
                                        Passing Score <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 6h16M4 12h16M4 18h7" />
                                            </svg>
                                        </div>
                                        <input type="number" name="passing_score" id="time_limit" required
                                            placeholder="Input Kriteria Ketuntasan Minimal"
                                            value="{{ $category->passing_score }}"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <x-input-error :messages="$errors->get('passing_score')" class="mt-1 text-xs" />
                                </div>

                                <!-- Image Upload -->
                            </div>
                            <div>
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-700">
                                    Gambar Kategori
                                </label>
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1">
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <input type="file" name="banner_img" id="image" accept="image/*"
                                                class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                onchange="previewImage(this)">
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500">Format yang didukung: JPG, PNG, GIF (Maks.
                                            2MB)</p>
                                        <x-input-error :messages="$errors->get('banner_img')" class="mt-1 text-xs" />
                                    </div>
                                </div>
                            </div>



                            <!-- Image Preview -->
                            <div class="mt-4">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Preview Gambar</label>
                                <div class="flex items-center justify-center">
                                    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-2 w-full"
                                        id="imagePreviewContainer">
                                        @if (isset($category->image_path) && !empty($category->image_path))
                                            <img src="{{ asset('storage/' . $category->image_path) }}" id="imagePreview"
                                                class="mx-auto max-h-64 rounded object-contain"
                                                alt="Preview Gambar Kategori">
                                            <input type="hidden" name="current_image"
                                                value="{{ $category->image_path }}">
                                        @else
                                            <div class="text-center py-6" id="noImageMessage">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="mt-1 text-sm text-gray-500">Belum ada gambar yang dipilih</p>
                                            </div>
                                            <img id="imagePreview" src="#" alt="Preview Gambar Kategori"
                                                class="mx-auto max-h-64 rounded object-contain hidden">
                                        @endif
                                    </div>
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
        /* Add smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const noImageMessage = document.getElementById('noImageMessage');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (noImageMessage) {
                        noImageMessage.classList.add('hidden');
                    }
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "#";
                preview.classList.add('hidden');
                if (noImageMessage) {
                    noImageMessage.classList.remove('hidden');
                }
            }
        }
    </script>
@endsection
