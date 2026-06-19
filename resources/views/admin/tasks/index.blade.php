@extends('layouts.adminDashboard')

@section('title', 'Manajemen Tugas / Soal')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        @include('components.admin.navbar')

        <div class="flex flex-wrap items-center justify-between gap-3 mt-4">
            <form action="{{ route('admin.tasks.index') }}" method="GET" class="flex gap-2 flex-wrap items-center">
                <select name="batch_id" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 text-sm py-2" {{ $batches->isEmpty() ? 'disabled' : '' }}>
                    @if ($batches->isEmpty())
                        <option value="">Belum ada batch</option>
                    @else
                        <option value="">-- Semua Batch --</option>
                        @foreach ($batches as $batch)
                            <option value="{{ $batch->id }}" {{ request('batch_id') == $batch->id ? 'selected' : '' }}>
                                {{ $batch->name }}</option>
                        @endforeach
                    @endif
                </select>

                <select name="category" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 text-sm py-2">
                    <option value="">-- Semua Kategori --</option>
                    <option value="ALL" {{ request('category') == 'ALL' ? 'selected' : '' }}>Semua / Access Level A</option>
                    <option value="HOTS" {{ request('category') == 'HOTS' ? 'selected' : '' }}>HOTS</option>
                    <option value="PCK" {{ request('category') == 'PCK' ? 'selected' : '' }}>PCK</option>
                    <option value="LITERASI_NUMERASI" {{ request('category') == 'LITERASI_NUMERASI' ? 'selected' : '' }}>Literasi & Numerasi</option>
                </select>

                <button type="submit"
                    class="px-3 py-2 bg-brandBlue text-white text-sm rounded hover:bg-brandBlue-dark {{ $batches->isEmpty() ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $batches->isEmpty() ? 'disabled' : '' }}>Filter</button>
            </form>
            <div class="flex items-center gap-2">
                @if ($batches->isEmpty())
                    <a href="{{ route('admin.task-batches.index') }}">
                        <button class="px-3 py-1.5 bg-gray-500 text-white text-sm rounded hover:bg-gray-700 transition-colors shadow-sm flex items-center gap-1" title="Silakan buat angkatan/batch terlebih dahulu">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            + Tambah Tugas
                        </button>
                    </a>
                @else
                    <a href="{{ route('admin.tasks.create') }}">
                        <button class="px-3 py-1.5 bg-brandBlue text-white text-sm rounded hover:bg-brandBlue-dark">
                            + Tambah Tugas
                        </button>
                    </a>
                @endif
            </div>
        </div>
    </div>

    @if ($batches->isEmpty())
        <div class="mb-4 p-2 bg-amber-50 border-l-4 border-amber-500 rounded-r-lg shadow-sm">
            <div class="flex items-start gap-3">
                <div class="text-amber-500 mt-0.5">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-amber-900">Perhatian: Belum Ada Angkatan/Batch</h4>
                    <p class="text-xs text-amber-700 mt-1">
                        Anda tidak dapat membuat tugas baru karena belum ada angkatan/batch yang terdaftar.
                        Silakan <a href="{{ route('admin.task-batches.index') }}" class="underline font-bold hover:text-amber-900 transition-colors">buat angkatan/batch terlebih dahulu</a>.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <x-table-th>No</x-table-th>
                        <x-table-th>Tugas</x-table-th>
                        <x-table-th>Batch</x-table-th>
                        <x-table-th>Kategori</x-table-th>
                        <x-table-th>Deadline</x-table-th>
                        <x-table-th>Submissions</x-table-th>
                        <x-table-th>Actions</x-table-th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tasks as $task)
                        <tr class="hover:bg-gray-50">

                            {{-- NO --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration + $tasks->firstItem() - 1 }}
                            </td>
                            
                            {{-- TUGAS --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 font-medium">
                                {{ Str::limit($task->title, 40) }}
                                @if ($task->isActive())
                                    <span
                                        class="ml-2 px-2 py-1 text-[10px] bg-green-100 text-green-800 rounded-full">Aktif</span>
                                @else
                                    <span
                                        class="ml-2 px-2 py-1 text-[10px] bg-red-100 text-red-800 rounded-full">Non-aktif</span>
                                @endif
                            </td>

                            {{-- BATCH NAME --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->batch?->name ?? '-' }}
                            </td>

                            {{-- KATEGORI --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                <span class="px-2 py-1 text-xs rounded-md font-medium {{ $task->category_color_class }}">{{ $task->category_label }}</span>
                            </td>

                            {{-- DEADLINE --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $task->ends_at?->format('d M Y H:i') ?? '-' }}
                            </td>

                            {{-- SUBMISSIONS --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <a href="{{ route('admin.tasks.submissions', $task->id) }}"
                                    class="text-brandBlue hover:text-brandBlue-dark underline">
                                    {{ $task->submissions()->count() }} Jawaban
                                </a>
                            </td>

                            {{-- ACTIONS --}}
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.tasks.edit', $task->id) }}"
                                        class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus tugas ini? Semua jawaban asesi juga akan terhapus.');">
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
                            'colspan' => 7,
                            'message' => 'Data Tugas belum tersedia. Klik tombol "Tambah Tugas" di kanan untuk membuat data tugas baru.',
                        ])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $tasks->appends(request()->query())->links() }}
    </div>
@endsection
