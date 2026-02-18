{{-- untuk halaman import nilai --}}
@extends('layouts.adminDashboard')

@section('title', 'Import Nilai Level A')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <ol class="flex items-center space-x-1 text-gray-600">
                <nav
                    class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">
                    <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                        class="transition-colors hover:text-blue-600">
                        Score Result
                    </a>
                    <span class="text-gray-300">/</span>
                    <span class="text-blue-600 font-semibold">Import Nilai</span>
                </nav>
            </ol>
        </nav>

        {{-- Error/Success Message --}}
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 mt-4">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 mt-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 mt-4">
            <div>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Import Nilai Level A
                </h1>
                <p class="text-gray-500 text-sm mt-1">Upload file CSV atau XLSX untuk mengupdate nilai secara bulk</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Step 1: Download Template --}}
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100">
                    <h2 class="text-lg font-bold text-indigo-800 flex items-center">
                        <span class="w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">1</span>
                        Download Template
                    </h2>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">
                        Download template CSV terlebih dahulu. Template berisi data user yang sudah ada dengan nilai saat ini. 
                        <strong class="text-yellow-600">Edit nilai pada kolom pck, hots, literasi, numerasi</strong> sesuai kebutuhan.
                    </p>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                        <h4 class="font-semibold text-yellow-800 mb-2">Format Kolom CSV:</h4>
                        <ul class="text-sm text-yellow-700 space-y-1">
                            <li><i class="fas fa-check-circle mr-2 text-green-600"></i><strong>id</strong> - ID user (jangan diubah)</li>
                            <li><i class="fas fa-check-circle mr-2 text-gray-400"></i><strong>nama</strong> - Nama user (info saja)</li>
                            <li><i class="fas fa-edit mr-2 text-yellow-600"></i><strong>pck</strong> - Nilai PCK (0-100)</li>
                            <li><i class="fas fa-edit mr-2 text-yellow-600"></i><strong>hots</strong> - Nilai HOTS (0-100)</li>
                            <li><i class="fas fa-edit mr-2 text-yellow-600"></i><strong>literasi</strong> - Nilai Literasi (0-100)</li>
                            <li><i class="fas fa-edit mr-2 text-yellow-600"></i><strong>numerasi</strong> - Nilai Numerasi (0-100)</li>
                        </ul>
                    </div>
                    <a href="{{ route('admin.level.a.hasil-penilaian.download-template') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors shadow-md">
                        <i class="fas fa-download mr-2"></i>
                        Download Template CSV
                    </a>
                </div>
            </div>

            {{-- Step 2: Upload File --}}
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-green-100">
                    <h2 class="text-lg font-bold text-green-800 flex items-center">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">2</span>
                        Upload File
                    </h2>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">
                        Setelah mengisi template, upload file CSV atau XLSX untuk preview data sebelum diproses.
                    </p>
                    <form action="{{ route('admin.level.a.hasil-penilaian.preview-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                                Pilih File CSV / XLSX
                            </label>
                            <input type="file" name="file" id="file" accept=".csv,.xlsx,.xls"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                                required>
                            @error('file')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Format: .csv, .xlsx, .xls (Max: 10MB)</p>
                            <p class="text-xs text-blue-600 mt-1"><i class="fas fa-info-circle mr-1"></i>Rekomendasi: Format CSV lebih stabil. Format XLSX memerlukan ekstensi php-zip di server.</p>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors shadow-md">
                            <i class="fas fa-eye mr-2"></i>
                            Preview Data
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Info Table --}}
        <div class="mt-6 bg-gray-50 rounded-xl border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Contoh Format Data</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-bold text-white">id</th>
                            <th class="px-4 py-2 text-left text-xs font-bold text-white">nama</th>
                            <th class="px-4 py-2 text-center text-xs font-bold text-white bg-yellow-500">pck</th>
                            <th class="px-4 py-2 text-center text-xs font-bold text-white bg-yellow-500">hots</th>
                            <th class="px-4 py-2 text-center text-xs font-bold text-white bg-yellow-500">literasi</th>
                            <th class="px-4 py-2 text-center text-xs font-bold text-white bg-yellow-500">numerasi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-2 text-sm">1</td>
                            <td class="px-4 py-2 text-sm text-gray-500">John Doe</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">85</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">90</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">88</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">92</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-sm">2</td>
                            <td class="px-4 py-2 text-sm text-gray-500">Jane Smith</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">75</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">80</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">70</td>
                            <td class="px-4 py-2 text-sm text-center bg-yellow-50 font-semibold">85</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h4 class="font-semibold text-blue-800 mb-2"><i class="fas fa-info-circle mr-2"></i>Catatan Penting:</h4>
                <ul class="text-sm text-blue-700 space-y-1 list-disc list-inside">
                    <li>ID user harus sesuai dengan yang ada di database</li>
                    <li>Nilai harus dalam rentang 0-100</li>
                    <li>Kosongkan nilai jika tidak ingin mengubah kategori tersebut</li>
                    <li>Sistem akan update nilai yang ada atau membuat baru jika belum ada</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
