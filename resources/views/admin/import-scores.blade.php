<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Nilai Exam</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-800">Import Nilai Exam</h1>

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Import Errors --}}
                @if (session('errors') && is_array(session('errors')))
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
                        <p class="font-bold mb-2">Detail Error:</p>
                        <ul class="list-disc list-inside">
                            @foreach (session('errors') as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Download Template --}}
                <div class="mb-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <p class="text-sm text-gray-700 mb-2">
                        <strong>Format Excel yang diharapkan:</strong>
                    </p>
                    <table class="w-full text-sm mb-3 border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-2 py-1">nama</th>
                                <th class="border px-2 py-1">pck</th>
                                <th class="border px-2 py-1">hots</th>
                                <th class="border px-2 py-1">literasi</th>
                                <th class="border px-2 py-1">numerasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-2 py-1">John Doe</td>
                                <td class="border px-2 py-1">85</td>
                                <td class="border px-2 py-1">90</td>
                                <td class="border px-2 py-1">88</td>
                                <td class="border px-2 py-1">92</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.import.template') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded">
                        Download Template CSV
                    </a>
                </div>

                {{-- Upload Form --}}
                <form action="{{ route('admin.import.scores') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">
                            Upload File Excel/CSV
                        </label>
                        <input type="file" name="file" accept=".xlsx,.xls,.csv"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <p class="text-sm text-gray-500 mt-1">
                            Format: .xlsx, .xls, atau .csv (Max: 2MB)
                        </p>
                        {{-- @error('file')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-2 rounded-lg transition">
                            Upload & Import
                        </button>
                        <a href="{{ url()->previous() }}"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-6 py-2 rounded-lg transition">
                            Batal
                        </a>
                    </div>
                </form>

                {{-- Catatan Penting --}}
                <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <p class="font-bold text-sm text-gray-800 mb-2">⚠️ Catatan Penting:</p>
                    <ul class="text-sm text-gray-700 space-y-1 list-disc list-inside">
                        <li>Pastikan nama user di Excel sama dengan nama di database</li>
                        <li>Nilai harus dalam rentang 0-100</li>
                        <li>Sistem akan menambahkan data nilai baru (tidak menghapus yang lama)</li>
                        <li>Jika user tidak ditemukan, baris tersebut akan di-skip</li>
                        <li>Header kolom harus sesuai: nama, pck, hots, literasi, numerasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
