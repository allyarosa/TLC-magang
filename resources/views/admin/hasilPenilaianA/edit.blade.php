@extends('layouts.adminDashboard')

@section('title', 'Edit Nilai - ' . ($exam->user->name ?? 'N/A'))

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <ol class="flex items-center space-x-1 text-gray-600">
                <nav
                    class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">
                    <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                        class="transition-colors hover:text-blue-600">
                        Hasil Penilaian
                    </a>
                    <span class="text-gray-300">/</span>
                    <span class="text-blue-600 font-semibold">Edit Nilai</span>
                </nav>
            </ol>
        </nav>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 mt-4">
            <div>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Edit Nilai Peserta
                </h1>
                <p class="text-gray-500 mt-1">{{ $exam->user->name ?? 'N/A' }} - {{ $exam->user->email ?? 'N/A' }}</p>
            </div>
        </div>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden p-6">
            <form action="{{ route('admin.level.a.hasil-penilaian.update', $exam->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Info Peserta --}}
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Informasi Peserta</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nama</label>
                            <p class="text-gray-800">{{ $exam->user->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Email</label>
                            <p class="text-gray-800">{{ $exam->user->email ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Kategori</label>
                            <p class="text-gray-800">{{ $exam->categoryA->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Tanggal Ujian</label>
                            <p class="text-gray-800">{{ $exam->created_at ? $exam->created_at->format('d M Y, H:i') : 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Form Edit Nilai --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3">Edit Nilai</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="score" class="block text-sm font-medium text-gray-700 mb-1">Score</label>
                            <input type="number" name="score" id="score" value="{{ old('score', $exam->score) }}"
                                min="0" max="100" step="0.01"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                        </div>
                        <div>
                            <label for="correct_answers" class="block text-sm font-medium text-gray-700 mb-1">Jawaban Benar</label>
                            <input type="number" name="correct_answers" id="correct_answers"
                                value="{{ old('correct_answers', $exam->correct_answers) }}" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                        </div>
                        <div>
                            <label for="wrong_answers" class="block text-sm font-medium text-gray-700 mb-1">Jawaban Salah</label>
                            <input type="number" name="wrong_answers" id="wrong_answers"
                                value="{{ old('wrong_answers', $exam->wrong_answers) }}" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                        </div>
                        <div>
                            <label for="is_passed" class="block text-sm font-medium text-gray-700 mb-1">Status Kelulusan</label>
                            <select name="is_passed" id="is_passed"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                                <option value="1" {{ old('is_passed', $exam->is_passed) == 1 ? 'selected' : '' }}>Lulus</option>
                                <option value="0" {{ old('is_passed', $exam->is_passed) == 0 ? 'selected' : '' }}>Tidak Lulus</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex gap-3">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                        class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-400 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
