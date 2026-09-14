@extends('layouts.adminDashboard')

@section('title', 'Kelola Asesi Batch')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <div class="flex flex-col gap-2">
                <a href="{{ route('admin.task-batches.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                    &larr; Kembali ke Daftar Batch
                </a>
                <h2 class="text-xl font-bold text-gray-800">Kelola Asesi - {{ $taskBatch->name }}</h2>
                <p class="text-sm text-gray-500">
                    {{ $taskBatch->start_date->format('d M Y') }} s/d {{ $taskBatch->end_date->format('d M Y') }}
                </p>
            </div>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Daftar Asesi di Batch Ini</h3>
                <p class="text-sm text-gray-500">Total {{ $currentUsers->count() }} asesi (assignment manual).</p>
            </div>
            <button type="button" onclick="document.getElementById('modal-tambah').classList.remove('hidden')"
                class="px-4 py-2 bg-brandBlue text-white text-sm rounded hover:bg-brandBlue-dark shadow-md">
                + Tambah Asesi
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <x-table-th>No</x-table-th>
                        <x-table-th>Nama</x-table-th>
                        <x-table-th>Email</x-table-th>
                        <x-table-th>Ditambahkan</x-table-th>
                        <x-table-th>Aksi</x-table-th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($currentUsers as $index => $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800 font-medium">{{ $user->name }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->pivot->assigned_at ? \Carbon\Carbon::parse($user->pivot->assigned_at)->format('d M Y H:i') : '-' }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <form action="{{ route('admin.task-batches.users.destroy', [$taskBatch->id, $user->id]) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus asesi ini dari batch?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 bg-red-50 rounded-md hover:bg-red-100" title="Hapus">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        @livewire('empty-state', [
                            'title' => 'Belum Ada Asesi',
                            'colspan' => 5,
                            'message' => 'Belum ada asesi yang di-assign secara manual ke batch ini. Klik "Tambah Asesi" untuk mulai.',
                        ])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah Asesi (bulk) --}}
    <div id="modal-tambah" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <form action="{{ route('admin.task-batches.assign-users', $taskBatch->id) }}" method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900" id="modal-title">Tambah Asesi ke Batch</h3>
                                <p class="text-sm text-gray-500">Pilih satu atau lebih asesi (bulk). Asesi yang sudah masuk batch lain secara manual tidak akan ditampilkan.</p>
                            </div>
                            <button type="button" onclick="document.getElementById('modal-tambah').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>

                        @if ($availableUsers->isEmpty())
                            <div class="text-sm text-gray-500 bg-gray-50 border border-gray-200 rounded-md p-4">
                                Tidak ada asesi yang dapat ditambahkan. Semua asesi sudah masuk ke batch (manual) atau belum tersedia.
                            </div>
                        @else
                            <div class="mt-2 max-h-80 overflow-y-auto border border-gray-200 rounded-md divide-y divide-gray-100">
                                @foreach ($availableUsers as $user)
                                    <label class="flex items-center px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}"
                                            class="form-checkbox h-4 w-4 text-indigo-600 rounded">
                                        <span class="ml-3 block">
                                            <span class="block text-sm font-medium text-gray-800">{{ $user->name }}</span>
                                            <span class="block text-xs text-gray-500">{{ $user->email }}</span>
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                        <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 shadow-md">
                            Tambah Terpilih
                        </button>
                        <button type="button" onclick="document.getElementById('modal-tambah').classList.add('hidden')"
                            class="mt-2 sm:mt-0 w-full sm:w-auto px-4 py-2 bg-gray-200 text-gray-800 text-sm rounded hover:bg-gray-300">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection