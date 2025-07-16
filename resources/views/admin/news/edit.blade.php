@extends('layouts.adminDashboard')

@section('title', 'Edit Berita')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Berita</h2>
        <p class="text-gray-600">Perbarui informasi berita yang sudah ada</p>
    </div>

    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('admin.news.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-indigo-600 md:ml-2">News Management</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Berita</span>
                </div>
            </li>
        </ol>
    </nav>




    <!-- Form -->
    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Alert jika ada error -->
        @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <div class="font-medium">Oops! Ada beberapa kesalahan:</div>
            <ul class="mt-1.5 ml-4 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Judul -->
        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Judul Berita <span class="text-red-500">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Masukkan judul berita" required>
        </div>

        <!-- Ringkasan -->
        <div>
            <label for="summary" class="block mb-2 text-sm font-medium text-gray-900">Ringkasan <span class="text-red-500">*</span></label>
            <textarea id="summary" name="summary" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Masukkan ringkasan berita (maksimal 500 karakter)" required>{{ old('summary', $news->summary) }}</textarea>
            <p class="mt-1 text-sm text-gray-500">Ringkasan singkat yang akan ditampilkan di halaman daftar berita (maksimal 500 karakter)</p>
        </div>

        <!-- Upload Gambar -->
        <div>
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar</label>

            <!-- Gambar yang ada saat ini -->
            <div class="mb-4">
                <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                <div class="relative w-48 h-32 rounded-lg overflow-hidden border border-gray-200">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex items-center justify-center w-full">
                <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload gambar baru</span> atau drag and drop</p>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG atau GIF (MAX. 2MB)</p>
                        <p class="mt-2 text-xs text-indigo-600">*Kosongkan jika tidak ingin mengubah gambar</p>
                    </div>
                    <input id="image" name="image" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg, image/gif" />
                </label>
            </div>
            <div id="image-preview" class="mt-3 hidden">
                <p class="text-sm text-gray-600 mb-2">Preview gambar baru:</p>
                <img id="preview-selected-image" class="h-auto max-w-xs rounded-lg border border-gray-200" />
            </div>
        </div>

        <!-- Konten -->
        <div>
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Isi Lengkap <span class="text-red-500">*</span></label>
            <textarea id="content" name="content" rows="8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Masukkan isi lengkap berita" required>{{ old('content', $news->content) }}</textarea>
        </div>

        <!-- Tombol Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4">
            <a href="{{ route('admin.news.index') }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                Batal
            </a>
            <button type="submit" class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-indigo-600 rounded-lg border border-indigo-600 hover:bg-indigo-700 focus:z-10 focus:ring-4 focus:ring-indigo-200">
                Perbarui Berita
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
        } else {
            imagePreview.classList.add('hidden');
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
