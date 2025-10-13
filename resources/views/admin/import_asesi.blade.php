<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-800">User Management</h1>
                </div>
                {{-- <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                </div> --}}
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Page Header -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Import Users</h2>
                <p class="text-gray-600 mt-1">Upload file Excel untuk menambahkan user secara massal</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded" role="alert">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-medium">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded" role="alert">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-medium">{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded" role="alert">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <p class="font-medium mb-2">Terdapat beberapa kesalahan:</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Format Information -->
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded">
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">📋 Format Excel</h3>
                        <p class="text-blue-800 mb-3">File Excel harus memiliki kolom berikut:</p>
                        <ul class="list-disc list-inside text-blue-800 mb-4 space-y-1">
                            <li><strong>email</strong> - Email user (wajib dan harus valid)</li>
                            <li><strong>nama</strong> - Nama lengkap user (wajib)</li>
                        </ul>
                        <div class="bg-blue-100 p-3 rounded text-sm text-blue-900 space-y-1">
                            <p>✅ Password akan di-set otomatis: <code class="bg-blue-200 px-2 py-1 rounded font-mono">password123#</code></p>
                            <p>✅ Permission <code class="bg-blue-200 px-2 py-1 rounded font-mono">access_level_A</code> akan diberikan otomatis</p>
                        </div>
                    </div>

                    <!-- Upload Form -->
                    <form action="{{ route('dashboard.asesi.import.asesi') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                                📁 Pilih File Excel
                            </label>
                            <input 
                                type="file" 
                                name="file" 
                                id="file"
                                accept=".xlsx,.xls,.csv"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:border-blue-500 p-2.5"
                                required
                            >
                            <p class="mt-2 text-xs text-gray-500">Format yang didukung: XLSX, XLS, CSV (Max: 2MB)</p>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <button 
                                type="submit"
                                class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                Import Users
                            </button>
                            
                            <a 
                                href="{{ asset('templates/template_import_users.xlsx') }}"
                                download="template_import_users.xlsx"
                                class="flex items-center text-blue-500 hover:text-blue-700 font-semibold transition duration-150 ease-in-out"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Download Template
                            </a>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Additional Information -->
            <div class="mt-6 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                <div class="flex">
                    <svg class="w-5 h-5 text-yellow-400 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div class="text-sm text-yellow-800">
                        <p class="font-semibold mb-1">Catatan Penting:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Pastikan tidak ada email yang duplikat dalam file Excel</li>
                            <li>Jika email sudah terdaftar, data user tidak akan diupdate</li>
                            <li>Proses import akan melewati baris yang memiliki data tidak valid</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>