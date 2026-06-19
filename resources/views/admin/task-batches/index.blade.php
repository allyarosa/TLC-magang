@extends('layouts.adminDashboard')

@section('title', 'Manajemen Angkatan / Batch Tugas')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-gray-600">
                <nav
                    class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">

                    {{-- Asesi Link --}}
                    <a href="{{ route('admin.asesi.index') }}"
                        class="transition-colors hover:text-indigo-600 {{ request()->routeIs('admin.asesi.*') ? 'text-indigo-600 font-semibold' : '' }}">
                        Asesi
                    </a>

                    <span class="text-gray-300">/</span>

                    {{-- Asesor Link --}}
                    <a href="{{ route('admin.asesor.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.asesor.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Asesor
                    </a>

                    <span class="text-gray-300">/</span>

                    {{-- Administrator Link --}}
                    <a href="{{ route('admin.admins.index') }}"
                        class="transition-colors hover:text-indigo-600 {{ request()->routeIs('admin.admins.*') ? 'text-indigo-600 font-semibold' : '' }}">
                        Administrator
                    </a>
                    <span class="text-gray-300">/</span>

                    <a href="{{ route('admin.task-batches.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.task-batches.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Batch
                    </a>
                </nav>
            </ol>

            {{-- Search & Tambah Batch --}}
            <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                <form action="{{ route('admin.task-batches.index') }}" method="GET" class="w-full sm:w-72">
                    <div class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama batch..." 
                            class="w-full px-3 py-1.5 pr-8 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 placeholder:text-inputHint">
                        @if($search)
                            <a href="{{ route('admin.task-batches.index') }}" class="absolute right-8 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times text-xs"></i>
                            </a>
                        @endif
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-blue-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
                
                <a href="{{ route('admin.task-batches.create') }}" class="w-full sm:w-auto">
                    <button class="w-full sm:w-auto px-3 py-1.5 bg-brandBlue text-white text-sm rounded hover:bg-brandBlue-dark shadow-md">
                        + Tambah Batch
                    </button>
                </a>
            </div>
        </nav>
    </div>

    {{-- @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif --}}

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <x-table-th>No</x-table-th>
                        <x-table-th>Nama Batch</x-table-th>
                        <x-table-th>Tanggal Mulai (Start)</x-table-th>
                        <x-table-th>Tanggal Berakhir (End)</x-table-th>
                        <x-table-th>Total Tugas</x-table-th>
                        <x-table-th>Actions</x-table-th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($batches as $batch)
                        <tr class="hover:bg-gray-50">
                            {{-- NO --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration + $batches->firstItem() - 1 }}
                            </td>

                            {{-- NAMA BATCH --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 font-medium">
                                {{ $batch->name }}
                            </td>

                            {{-- TANGGAL MULAI --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $batch->start_date->format('d M Y H:i') }}
                            </td>

                            {{-- TANGGAL BERAKHIR --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $batch->end_date->format('d M Y H:i') }}
                            </td>

                            {{-- TOTAL TUGAS --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $batch->tasks()->count() }}
                            </td>

                            {{-- ACTIONS --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.task-batches.edit', $batch->id) }}"
                                        class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.task-batches.destroy', $batch->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus batch ini? Tugas di dalamnya mungkin akan terhapus.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 bg-red-50 rounded-md hover:bg-red-100" title="Delete">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        @livewire('empty-state', [
                            'title' => 'Tidak Ada Data',
                            'colspan' => 6,
                            'message' => 'Data batch belum tersedia. Klik tombol "Tambah Batch" di kanan untuk membuat data batch baru.',
                        ])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $batches->links() }}
    </div>
@endsection
