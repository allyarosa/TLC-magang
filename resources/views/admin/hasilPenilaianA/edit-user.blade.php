{{-- untuk halaman edit hasil penilaian per user --}}
@extends('layouts.adminDashboard')

@section('title', 'Edit Nilai - ' . $user->name)

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
                    Edit Nilai - {{ $user->name }}
                </h1>
                <p class="text-gray-500 text-sm mt-1">{{ $user->email }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.level.a.hasil-penilaian.update-user', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($categories as $category)
                            @php
                                $scoreData = $scores[$category->id] ?? null;
                                $currentScore = $scoreData['score'] ?? '';
                                $categoryPassingScore = $scoreData['passing_score'] ?? $passingScore;
                            @endphp
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <label for="score_{{ $category->id }}" class="block text-sm font-bold text-gray-700 mb-2">
                                    {{ strtoupper($category->name) }}
                                </label>
                                <input type="number" 
                                    name="score_{{ $category->id }}" 
                                    id="score_{{ $category->id }}"
                                    value="{{ $currentScore }}"
                                    min="0" 
                                    max="100"
                                    step="0.01"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-lg font-semibold text-center"
                                    placeholder="0-100">
                                <p class="text-xs text-gray-500 mt-2 text-center">
                                    Passing Score: <span class="font-semibold">{{ $categoryPassingScore }}</span>
                                </p>
                                @if ($currentScore !== null && $currentScore !== '')
                                    <p class="text-xs mt-1 text-center {{ $currentScore >= $categoryPassingScore ? 'text-green-600' : 'text-red-600' }}">
                                        Status: {{ $currentScore >= $categoryPassingScore ? 'Lulus' : 'Tidak Lulus' }}
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end gap-3">
                    <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                        <i class="fas fa-save mr-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- Legend --}}
        <div class="mt-4 bg-gray-50 rounded-lg p-4 border border-gray-100">
            <div class="flex items-center gap-4 text-sm text-gray-600">
                <span class="font-medium">Keterangan:</span>
                <span class="flex items-center gap-1">
                    <span class="w-4 h-4 bg-green-100 rounded border border-green-300"></span>
                    <span>Lulus (≥ Passing Score)</span>
                </span>
                <span class="flex items-center gap-1">
                    <span class="w-4 h-4 bg-red-100 rounded border border-red-300"></span>
                    <span>Tidak Lulus (&lt; Passing Score)</span>
                </span>
            </div>
        </div>
    </div>
@endsection
