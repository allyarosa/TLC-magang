@extends('layouts.exam')

@section('title', 'Pengerjaan Level C - Video Pembelajaran')

@section('content')
    <div
        class="w-full max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-3xl mx-auto mt-6 sm:mt-8 md:mt-10 px-4 sm:px-6">
        <div class="bg-white rounded-xl shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
            <div class="p-4 sm:p-6 md:p-8">
                <div class="text-center mb-6 sm:mb-8">
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                        Upload Video Pembelajaran
                    </h1>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">
                        Silakan masukkan link video YouTube Anda beserta deskripsinya
                    </p>
                </div>

                <form id="videoForm" action="{{ route('asesi.sertifikasi.level.c.store') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label for="url_video"
                            class="block text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-200">
                            Link Video YouTube
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="url" id="url_video" name="url_video" required value=""
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none hover:border-gray-400 dark:hover:border-gray-500 transition-colors duration-200"
                            placeholder="https://www.youtube.com/watch?v=...">
                        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                            Pastikan video diunggah ke YouTube dengan visibilitas "Unlisted"
                        </p>
                        <x-input-error :messages="$errors->get('url_video')" class="mt-1 text-xs" />
                    </div>

                    <div class="space-y-2">
                        <label for="description"
                            class="block text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-200">
                            Deskripsi Video Pembelajaran
                            <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none hover:border-gray-400 dark:hover:border-gray-500 transition-colors duration-200 resize-none"
                            placeholder="Tuliskan deskripsi singkat tentang video pembelajaran Anda..."></textarea>
                        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                            Minimal 10 karakter, maksimal 500 karakter
                        </p>
                        <x-input-error :messages="$errors->get('description')" class="mt-1 text-xs" />
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                        <button type="button" onclick="window.history.back()"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-200">
                            Kembali
                        </button>
                        <button type="submit"
                            class="w-full sm:flex-1 px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                            <span class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                Upload Link Video
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl max-w-sm w-full mx-4 transform transition-all">
            <div class="p-6">
                <div
                    class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full">
                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 text-center mb-2">
                    Konfirmasi Upload
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 text-center mb-6">
                    Apakah Anda yakin ingin mengupload video pembelajaran ini? Pastikan link dan deskripsi sudah benar.
                </p>
                <div class="flex gap-3">
                    <button id="cancelBtn" type="button"
                        class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        Batal
                    </button>
                    <button id="confirmBtn" type="button"
                        class="flex-1 px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors">
                        Ya, Upload
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script> --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
        if (performance.navigation.type === 2) {
            // If page is accessed via Back button, reload to clear session flash
            location.reload();
        }
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('videoForm');
            const modal = document.getElementById('confirmModal');
            const cancelBtn = document.getElementById('cancelBtn');
            const confirmBtn = document.getElementById('confirmBtn');
            const videoInput = document.getElementById('url_video');
            const descriptionInput = document.getElementById('description');

            // Prevent default form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Validate form
                if (!videoInput.value.trim()) {
                    alert('Silakan masukkan link video YouTube terlebih dahulu');
                    videoInput.focus();
                    return;
                }

                if (!descriptionInput.value.trim()) {
                    alert('Silakan isi deskripsi video pembelajaran');
                    descriptionInput.focus();
                    return;
                }

                if (descriptionInput.value.trim().length < 10) {
                    alert('Deskripsi minimal 10 karakter');
                    descriptionInput.focus();
                    return;
                }

                // Validate YouTube URL
                const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/;
                if (!youtubeRegex.test(videoInput.value.trim())) {
                    alert('Harap masukkan link YouTube yang valid');
                    videoInput.focus();
                    return;
                }

                // Show confirmation modal
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            });

            // Cancel button
            cancelBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            });

            // Confirm button
            confirmBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';

                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                <span class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Mengupload...
                </span>
            `;

                // Submit form
                form.submit();
            });

            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    cancelBtn.click();
                }
            });

            // Character counter for description
            descriptionInput.addEventListener('input', function() {
                const current = this.value.length;
                const max = 500;

                // Update counter if element exists
                let counter = document.getElementById('charCounter');
                if (!counter) {
                    counter = document.createElement('div');
                    counter.id = 'charCounter';
                    counter.className = 'text-xs text-gray-500 dark:text-gray-400 text-right mt-1';
                    this.parentNode.appendChild(counter);
                }

                counter.textContent = `${current}/${max} karakter`;

                if (current > max) {
                    counter.classList.add('text-red-500');
                    counter.classList.remove('text-gray-500', 'dark:text-gray-400');
                } else {
                    counter.classList.remove('text-red-500');
                    counter.classList.add('text-gray-500', 'dark:text-gray-400');
                }
            });
        });
    </script>
@endsection
