@extends('layouts.exam')

@section('title', 'Pengerjaan Level B - PPT')

@section('content')
<div class="w-full max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-3xl mx-auto mt-6 sm:mt-8 md:mt-10 px-4 sm:px-6">
    <div class="bg-white rounded-xl shadow-lg dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
        <div class="p-4 sm:p-6 md:p-8">
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                    Upload Presentasi PPT
                </h1>
                <p class="text-sm sm:text-base text-gray-600 dark:text-gray-300">
                    Silakan upload file presentasi PPT Anda beserta deskripsinya
                </p>
            </div>

            {{-- Tampilkan pesan error umum --}}
            @if ($errors->any())
                <div class="mb-6 p-3 sm:p-4 bg-red-50 border border-red-200 text-red-700 dark:bg-red-900/20 dark:border-red-800 dark:text-red-300 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <strong class="font-semibold">Terjadi kesalahan:</strong>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form id="pptForm" action="{{ route('asesi.sertifikasi.level.b.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label for="file_ppt" class="block text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-200">
                        Upload File PPT
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" id="file_ppt" name="file_ppt" required
                            accept=".ppt,.pptx"
                            class="block w-full text-sm text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-300">
                    </div>
                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                        Format yang didukung: PPT, PPTX (Maksimal 15MB)
                    </p>
                    @error('file_ppt')
                        <p class="text-red-500 dark:text-red-400 text-sm mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="description" class="block text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-200">
                        Deskripsi Modul Ajar
                        <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" name="description" rows="4" required
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none hover:border-gray-400 dark:hover:border-gray-500 transition-colors duration-200 resize-none"
                        placeholder="Tuliskan deskripsi singkat tentang presentasi PPT Anda...">{{ old('description') }}</textarea>
                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                        Minimal 10 karakter, maksimal 500 karakter
                    </p>
                    @error('description')
                        <p class="text-red-500 dark:text-red-400 text-sm mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                    <button type="button" onclick="window.history.back()"
                        class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-200">
                        Kembali
                    </button>
                    <button type="submit"
                        class="w-full sm:flex-1 px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                        <span class="flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            Upload PPT
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
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-blue-100 dark:bg-blue-900 rounded-full">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 text-center mb-2">
                Konfirmasi Upload
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 text-center mb-6">
                Apakah Anda yakin ingin mengupload file PPT ini? Pastikan file dan deskripsi sudah benar.
            </p>
            <div class="flex gap-3">
                <button id="cancelBtn" type="button"
                    class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                    Batal
                </button>
                <button id="confirmBtn" type="button"
                    class="flex-1 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                    Ya, Upload
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('pptForm');
        const modal = document.getElementById('confirmModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const confirmBtn = document.getElementById('confirmBtn');
        const fileInput = document.getElementById('file_ppt');
        const descriptionInput = document.getElementById('description');
    
        // Prevent default form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (!fileInput.files[0]) {
                alert('Silakan pilih file PPT terlebih dahulu');
                fileInput.focus();
                return;
            }
            
            if (!descriptionInput.value.trim()) {
                alert('Silakan isi deskripsi modul ajar');
                descriptionInput.focus();
                return;
            }
    
            if (descriptionInput.value.trim().length < 10) {
                alert('Deskripsi minimal 10 karakter');
                descriptionInput.focus();
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
    
        // File size validation (15MB for PPT)
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const maxSize = 15 * 1024 * 1024; // 15MB
                if (file.size > maxSize) {
                    alert('Ukuran file terlalu besar. Maksimal 15MB');
                    this.value = '';
                }
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