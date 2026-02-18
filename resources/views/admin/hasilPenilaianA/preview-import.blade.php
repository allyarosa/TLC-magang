{{-- untuk halaman preview import nilai --}}
@extends('layouts.adminDashboard')

@section('title', 'Preview Import Nilai Level A')

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
                    <a href="{{ route('admin.level.a.hasil-penilaian.import-form') }}"
                        class="transition-colors hover:text-blue-600">
                        Import Nilai
                    </a>
                    <span class="text-gray-300">/</span>
                    <span class="text-blue-600 font-semibold">Preview</span>
                </nav>
            </ol>
        </nav>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 mt-4">
            <div>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Preview Import Nilai
                </h1>
                <p class="text-gray-500 text-sm mt-1">Periksa data sebelum diproses</p>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-slate-100 rounded-xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs font-semibold uppercase tracking-wider">
                        Total Data
                    </span>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">
                        {{ $total }} <span class="text-sm font-normal">Baris</span>
                    </h3>
                </div>
                <div class="p-3 bg-white rounded-lg text-blue-600">
                    <i class="fas fa-database text-xl"></i>
                </div>
            </div>

            <div class="bg-white rounded-xl p-5 border border-green-200 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-green-600 text-xs font-semibold uppercase tracking-wider">
                        Data Valid
                    </span>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">
                        {{ $validCount }} <span class="text-sm font-normal">Baris</span>
                    </h3>
                </div>
                <div class="p-3 bg-green-100 rounded-lg text-green-600">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
            </div>

            <div class="bg-white rounded-xl p-5 border border-red-200 shadow-sm flex items-center justify-between relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-red-500"></div>
                <div>
                    <span class="text-red-600 text-xs font-bold uppercase tracking-wider">
                        Data Error
                    </span>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $invalidCount }}
                        <span class="text-sm font-normal text-gray-500">Baris</span>
                    </h3>
                </div>
                <div class="p-3 bg-red-100 rounded-lg text-red-600">
                    <i class="fas fa-times-circle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Row
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Nama
                            </th>
                            <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                                PCK
                            </th>
                            <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                                HOTS
                            </th>
                            <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Literasi
                            </th>
                            <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Numerasi
                            </th>
                            <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Info
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($paginatedData as $row)
                            <tr class="{{ $row['is_valid'] ? 'hover:bg-gray-50' : 'bg-red-50' }} transition-colors">
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $row['row'] }}
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                    {{ $row['user_id'] }}
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $row['user_name'] ?? 'N/A' }}
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    @if (!is_null($row['pck']) && $row['pck'] !== '')
                                        <span class="px-2 py-1 text-sm font-bold {{ $row['is_valid'] ? ($row['pck'] >= 70 ? 'text-green-600' : 'text-red-600') : 'text-gray-600' }}">
                                            {{ $row['pck'] }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    @if (!is_null($row['hots']) && $row['hots'] !== '')
                                        <span class="px-2 py-1 text-sm font-bold {{ $row['is_valid'] ? ($row['hots'] >= 70 ? 'text-green-600' : 'text-red-600') : 'text-gray-600' }}">
                                            {{ $row['hots'] }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    @if (!is_null($row['literasi']) && $row['literasi'] !== '')
                                        <span class="px-2 py-1 text-sm font-bold {{ $row['is_valid'] ? ($row['literasi'] >= 70 ? 'text-green-600' : 'text-red-600') : 'text-gray-600' }}">
                                            {{ $row['literasi'] }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    @if (!is_null($row['numerasi']) && $row['numerasi'] !== '')
                                        <span class="px-2 py-1 text-sm font-bold {{ $row['is_valid'] ? ($row['numerasi'] >= 70 ? 'text-green-600' : 'text-red-600') : 'text-gray-600' }}">
                                            {{ $row['numerasi'] }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    @if ($row['is_valid'])
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check mr-1"></i> Valid
                                        </span>
                                    @else
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-times mr-1"></i> Error
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    @if (!empty($row['errors']))
                                        <ul class="text-xs text-red-600 list-disc list-inside">
                                            @foreach ($row['errors'] as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @elseif ($row['is_valid'])
                                        <span class="text-xs text-green-600">
                                            Siap diimport
                                        </span>
                                    @else
                                        <span class="text-xs text-gray-400">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-8 text-center text-gray-500">
                                    <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
                                    <p>Tidak ada data untuk diimport</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium">{{ $paginatedData->firstItem() ?? 0 }}</span> sampai
                            <span class="font-medium">{{ $paginatedData->lastItem() ?? 0 }}</span> dari
                            <span class="font-medium">{{ $total }}</span> hasil
                        </p>
                    </div>
                    <div>
                        {{ $paginatedData->links() }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('admin.level.a.hasil-penilaian.import-form') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>

            @if ($validCount > 0)
                <form action="{{ route('admin.level.a.hasil-penilaian.process-import') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors shadow-md"
                        onclick="return confirm('Yakin ingin memproses {{ $validCount }} baris data valid? Data dengan error akan dilewati.')">
                        <i class="fas fa-check mr-2"></i>
                        Proses Import ({{ $validCount }} baris valid)
                    </button>
                </form>
            @else
                <button disabled
                    class="inline-flex items-center px-6 py-2 bg-gray-400 text-white rounded-lg text-sm font-medium cursor-not-allowed">
                    <i class="fas fa-times mr-2"></i>
                    Tidak ada data valid untuk diimport
                </button>
            @endif
        </div>
    </div>
@endsection
