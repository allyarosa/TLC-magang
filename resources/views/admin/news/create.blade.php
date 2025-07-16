@extends('layouts.adminDashboard')

@section('title', 'Tambah Berita Baru')

@section('content')
<div class="bg-white rounded-xl shadow-md p-10">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-indigo-700">Tambah Berita Baru</h2>
        <p class="text-gray-500 text-sm">Isi form berikut untuk menambahkan berita baru ke sistem.</p>
    </div>

    <!-- Breadcrumb -->
    <nav class="mb-8 text-sm text-gray-500" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center hover:text-indigo-600">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <span class="mx-2">/</span>
                <a href="{{ route('admin.news.index') }}" class="hover:text-indigo-600">News Management</a>
            </li>
            <li>
                <span class="mx-2">/</span>
                <span class="text-gray-700 font-medium">Tambah Berita</span>
            </li>
        </ol>
    </nav>

    <!-- Form -->
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Error Alert -->
        @if ($errors->any())
        <div class="p-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg">
            <div class="font-semibold">Oops! Ada kesalahan:</div>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Judul -->
        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Judul Berita <span class="text-red-500">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                   class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                   placeholder="Masukkan judul berita" required>
        </div>

        <!-- Ringkasan -->
        <div>
            <label for="summary" class="block mb-2 text-sm font-medium text-gray-700">Ringkasan <span class="text-red-500">*</span></label>
            <textarea id="summary" name="summary" rows="3"
                      class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                      placeholder="Masukkan ringkasan berita (maksimal 500 karakter)" required>{{ old('summary') }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Akan ditampilkan di halaman daftar berita.</p>
        </div>

        <!-- Upload Gambar -->
        <div>
            <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Gambar Berita <span class="text-red-500">*</span></label>
            <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-300 rounded-md cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                    <p class="mb-1 text-sm text-gray-500">Klik untuk upload atau drag & drop</p>
                    <p class="text-xs text-gray-400">PNG, JPG, JPEG, GIF (MAX. 2MB)</p>
                </div>
                <input id="image" name="image" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg, image/gif" required />
            </label>
            <div id="image-preview" class="mt-4 hidden">
                <img id="preview-selected-image" class="max-w-sm border border-gray-300 rounded-md" />
            </div>
        </div>

        <!-- Konten -->
        <div>
            <label for="content" class="block mb-2 text-sm font-medium text-gray-700">Isi Berita <span class="text-red-500">*</span></label>
            <textarea id="content" name="content" rows="8"
                      class="w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                      placeholder="Masukkan isi lengkap berita" required>{{ old('content') }}</textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.news.index') }}"
               class="px-5 py-2.5 text-sm text-gray-700 border border-gray-300 rounded-md bg-white hover:bg-gray-100">
                Batal
            </a>
            <button type="submit"
                    class="px-5 py-2.5 text-sm text-white bg-indigo-600 border border-indigo-600 rounded-md hover:bg-indigo-700">
                Simpan Berita
            </button>
        </div>
    </form>
</div>

<!-- Script untuk WYSIWYG Editor dan Preview Gambar -->
<script>
    // Script untuk preview gambar
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const previewImage = document.getElementById('preview-selected-image');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                previewImage.setAttribute('src', this.result);
                imagePreview.classList.remove('hidden');
            });

            reader.readAsDataURL(file);
        }
    });

    // Untuk implementasi WYSIWYG Editor (seperti CKEditor, TinyMCE, dll)
    // Anda bisa menambahkan script untuk inisialisasi editor di sini
    // Contoh untuk TinyMCE:
    /*
    tinymce.init({
        selector: '#content',
        plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        height: 400
    });
    */
</script>
@endsection
