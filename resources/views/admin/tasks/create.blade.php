@extends('layouts.adminDashboard')

@section('title', 'Tambah Tugas/Soal')

@push('ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endpush

@section('content')
<div class="p-4 bg-white rounded-lg shadow-md max-w-4xl mx-auto mt-6">
    <h2 class="text-xl font-bold mb-4 text-brandBlue">Tambah Tugas / Soal Baru</h2>

    <form action="{{ route('admin.tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Angkatan / Batch <span class="text-red-500">*</span></label>
                <select name="batch_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">-- Pilih Batch --</option>
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}" {{ old('batch_id') == $batch->id ? 'selected' : '' }}>{{ $batch->name }}</option>
                    @endforeach
                </select>
                @error('batch_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Permission <span class="text-red-500">*</span></label>
                <select name="category" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="ALL" {{ old('category') == 'ALL' ? 'selected' : '' }}>Semua / Access Level A</option>
                    <option value="HOTS" {{ old('category') == 'HOTS' ? 'selected' : '' }}>HOTS</option>
                    <option value="PCK" {{ old('category') == 'PCK' ? 'selected' : '' }}>PCK</option>
                    <option value="LITERASI_NUMERASI" {{ old('category') == 'LITERASI_NUMERASI' ? 'selected' : '' }}>Literasi & Numerasi</option>
                </select>
                @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas <span class="text-red-500">*</span></label>
            <input type="text" name="title" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 placeholder:text-inputHint" required placeholder="Input judul tugas asesi disini" value="{{ old('title') }}">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Isi / Deskripsi Tugas <span class="text-red-500">*</span></label>
            <textarea name="body" id="editor" rows="6" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('body') }}</textarea>
            @error('body') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Soal (Opsional)</label>
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('image') <span class="text-red-500 text-xs block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tgl Mulai Aktif <span class="text-red-500">*</span></label>
                <input type="datetime-local" name="starts_at" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('starts_at') }}">
                @error('starts_at') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tgl Berakhir / Deadline <span class="text-red-500">*</span></label>
                <input type="datetime-local" name="ends_at" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('ends_at') }}">
                @error('ends_at') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Batas Submit Ulang <span class="text-red-500">*</span></label>
                <input type="number" name="max_submissions" min="1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('max_submissions', 1) }}">
                @error('max_submissions') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex justify-end gap-2 mt-6 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.tasks.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-4 py-2 bg-brandBlue text-white rounded hover:bg-brandBlue-dark">Simpan Tugas</button>
        </div>
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
