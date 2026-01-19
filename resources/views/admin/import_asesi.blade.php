@extends('layouts.adminDashboard')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-700">Import Bulk Asesi</h2>
            <p class="text-gray-500 mt-2">Tambahkan banyak user sekaligus dengan file Excel dan atur permission akses mereka.</p>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                <h3 class="text-white text-lg font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Upload Data User
                </h3>
            </div>

            <div class="p-8">
                <!-- Alerts -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 flex items-start gap-3">
                        <svg class="h-6 w-6 text-green-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-green-800">Berhasil!</h4>
                            <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 flex items-start gap-3">
                        <svg class="h-6 w-6 text-red-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-red-800">Gagal!</h4>
                            <p class="text-red-700 text-sm mt-1">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h4 class="font-semibold text-red-800">Terdapat Kesalahan Input</h4>
                        </div>
                        <ul class="list-disc list-inside text-sm text-red-700 space-y-1 ml-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashboard.asesi.import.asesi') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <!-- File Input Section -->
                    <div class="space-y-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Upload File Excel</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-blue-500 transition-colors bg-gray-50 focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 relative">
                            <input type="file" name="file" id="file" accept=".xlsx,.xls,.csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                            <div class="space-y-2 pointer-events-none">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="text-sm text-gray-600">
                                    <span class="font-medium text-blue-600 hover:text-blue-500">Klik untuk upload</span> atau drag and drop
                                </div>
                                <p class="text-xs text-gray-500">XLSX, XLS, CSV (Max 2MB)</p>
                                <div class="mt-4">
                                    <a href="{{ asset('templates/template_import_users.xlsx') }}" download="template_import_users.xlsx" class="inline-flex items-center gap-1 text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline z-10 relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        Download Template Excel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Permission Selection Section -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Pilih Akses Permission</label>
                            <p class="text-sm text-gray-500">Pilih satu atau lebih level akses yang akan diberikan kepada semua user dalam file ini.</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Option A -->
                            <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:border-blue-500 hover:ring-1 hover:ring-blue-500 transition-all group">
                                <input type="checkbox" name="permissions[]" value="access_level_A" class="sr-only">
                                <span class="flex flex-1">
                                    <span class="flex flex-col">
                                        <span class="block text-sm font-medium text-gray-900 group-hover:text-blue-600">Level A</span>
                                        <span class="mt-1 flex items-center text-sm text-gray-500">Akses materi & ujian Level A</span>
                                    </span>
                                </span>
                                <svg class="h-5 w-5 text-blue-600 hidden check-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>

                            <!-- Option B -->
                            <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:border-blue-500 hover:ring-1 hover:ring-blue-500 transition-all group">
                                <input type="checkbox" name="permissions[]" value="access_level_B" class="sr-only">
                                <span class="flex flex-1">
                                    <span class="flex flex-col">
                                        <span class="block text-sm font-medium text-gray-900 group-hover:text-blue-600">Level B</span>
                                        <span class="mt-1 flex items-center text-sm text-gray-500">Akses materi & ujian Level B</span>
                                    </span>
                                </span>
                                <svg class="h-5 w-5 text-blue-600 hidden check-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>

                            <!-- Option C -->
                            <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:border-blue-500 hover:ring-1 hover:ring-blue-500 transition-all group">
                                <input type="checkbox" name="permissions[]" value="access_level_C" class="sr-only">
                                <span class="flex flex-1">
                                    <span class="flex flex-col">
                                        <span class="block text-sm font-medium text-gray-900 group-hover:text-blue-600">Level C</span>
                                        <span class="mt-1 flex items-center text-sm text-gray-500">Akses materi & ujian Level C</span>
                                    </span>
                                </span>
                                <svg class="h-5 w-5 text-blue-600 hidden check-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                        <style>
                            input:checked + span + svg { display: block; }
                            input:checked + span span.font-medium { font-weight: 700; }
                            
                            /* Checkbox specific border coloring logic */
                            label:has(input:checked) { border-color: #2563eb; ring-width: 2px; --tw-ring-color: #2563eb; }
                        </style>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-gray-50 rounded-lg p-5 border border-gray-100 flex gap-4">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-sm text-gray-600 space-y-2">
                            <p class="font-medium text-gray-900">Informasi Penting:</p>
                            <ul class="list-disc list-inside space-y-1 ml-1">
                                <li>Pastikan file Excel memiliki kolom: <strong>nama</strong> dan <strong>email</strong>.</li>
                                <li>Password default untuk semua user baru adalah: <code class="bg-gray-200 px-1.5 py-0.5 rounded text-gray-800 font-mono text-xs">password123#</code></li>
                                <li>User yang sudah ada (berdasarkan email) akan <strong>dilewati</strong> dan permission baru <strong>ditambahkan</strong> jika belum punya.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                            Import Users & Berikan Akses
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection