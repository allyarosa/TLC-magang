@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.question.c.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Detail Soal Level C</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.question.c.edit', $questionC->id) }}"
                    class="inline-flex items-center px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600 transition-colors duration-200 shadow">
                    <i class="mr-2 fa-solid fa-pen-to-square"></i> Edit
                </a>
                <form action="{{ route('admin.question.c.destroy', $questionC->id) }}" method="POST" class="inline"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition-colors duration-200 shadow">
                        <i class="mr-2 fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

        <!-- Main detail card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Card header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-4 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Informasi Soal Level C
                </h3>
            </div>

            <!-- Card body -->
            <div class="p-6">
                <div class="space-y-8">
                    <!-- Question Information Section -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <div class="grid grid-cols-1 gap-6">
                            {{-- Kategori Level C --}}
                            <div>
                                <h4 class="font-medium text-gray-700 mb-2">Kategori Level C</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                    <p>{{ $questionC->categoryC->name ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Text soal -->
                            <div>
                                <h4 class="font-medium text-gray-700 mb-2">Text Soal</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm prose max-w-none">
                                    {!! $questionC->question !!}
                                </div>
                            </div>

                            {{-- Gambar --}}
                            @if($questionC->image_url)
                            <div>
                                <h4 class="font-medium text-gray-700 mb-2">Gambar</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                    <img src="{{ asset('storage/' . $questionC->image_url) }}" alt="Gambar Soal" class="max-h-96 mx-auto">
                                </div>
                            </div>
                            @endif

                            <!-- Order -->
                            <div>
                                <h4 class="font-medium text-gray-700 mb-2">Order</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                    <p>{{ $questionC->order }}</p>
                                </div>
                            </div>

                            <!-- Is Active -->
                            <div>
                                <h4 class="font-medium text-gray-700 mb-2">Is Active</h4>
                                <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                    <p>{{ $questionC->is_active ? 'Yes' : 'No' }}</p>
                                </div>
                            </div>

                            <!-- Metadata -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Dibuat pada</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $questionC->created_at->format('d F Y H:i') }}</p>
                                    </div>
                                </div>
                                
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Diperbarui pada</h4>
                                    <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-sm">
                                        <p>{{ $questionC->updated_at->format('d F Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
@endsection