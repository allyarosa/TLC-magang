@extends('layouts.adminDashboard')

@section('title', 'Edit Batch Tugas')

@section('content')
<div class="p-4 bg-white rounded-lg shadow-md max-w-3xl mx-auto mt-6">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Angkatan / Batch Tugas</h2>

    <form action="{{ route('admin.task-batches.update', $taskBatch->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Batch <span class="text-red-500">*</span></label>
            <input type="text" name="name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('name', $taskBatch->name) }}">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $taskBatch->description) }}</textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai (Asesi Daftar) <span class="text-red-500">*</span></label>
                <input type="datetime-local" name="start_date" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('start_date', $taskBatch->start_date->format('Y-m-d\TH:i')) }}">
                @error('start_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir (Asesi Daftar) <span class="text-red-500">*</span></label>
                <input type="datetime-local" name="end_date" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('end_date', $taskBatch->end_date->format('Y-m-d\TH:i')) }}">
                @error('end_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <p class="text-xs text-gray-500 col-span-2">
                Logika: Asesi yang mendaftar pada rentang tanggal di atas akan otomatis masuk ke batch ini.
            </p>
        </div>

        <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('admin.task-batches.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update</button>
        </div>
    </form>
</div>
@endsection
