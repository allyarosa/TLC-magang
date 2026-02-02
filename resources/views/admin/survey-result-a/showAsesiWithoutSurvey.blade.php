@extends('layouts.adminDashboard')

@section('title', 'Hasil Survey')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

            <div class="p-5 border-b border-gray-100 flex flex-col sm:flex-row  gap-4 items-center bg-gray-50/50">
                <div class="flex gap-2">
                    <a href="{{ route('admin.survey-result.a.index') }}"
                        class="px-4 py-1.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg border border-gray-300 flex items-center gap-2 transition-colors">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="relative w-full sm:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out"
                        placeholder="Cari nama peserta atau email...">
                </div>

                {{-- <div class="flex gap-2">
                    <button
                        class="px-4 py-1.5 font-medium text-indigo-700 bg-indigo-50 rounded-lg border border-indigo-100">
                        Open All Remedial
                    </button>
                    <button
                        class="px-4 py-1.5 text-sm font-medium text-indigo-700 bg-indigo-50 rounded-lg border border-indigo-100">
                        Semua
                    </button>
                    <button
                        class="px-4 py-1.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg border border-transparent">
                        Hanya Gagal
                    </button>
                </div> --}}
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                NO
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                ASESI
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                HOTS
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                PCK
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                LIT
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                NUM
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($asesiList as $data)
                            <tr class="hover:bg-gray-50 transition-colors">
                                {{-- TAMBAHAN: Kolom Nomor Urut --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium">
                                    {{ $asesiList->firstItem() + $loop->index }}
                                </td>

                                {{-- Kolom Asesi (Foto & Nama) --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                                                src="{{ asset('/storage/' . $data->userProfile->profile_image) }}"
                                                alt="Profile Image {{ $data->name }}" loading="lazy">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $data->name }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{ $data->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Kolom Nilai HOTS --}}
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    {{-- ... (kode nilai HOTS Anda tetap sama) ... --}}
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 cursor-help"
                                        title="Nilai: 85">
                                        85
                                    </span>
                                </td>

                                {{-- Kolom Nilai PCK (Placeholder dari kode Anda) --}}
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 border border-red-200 cursor-help"
                                        title="Nilai: 40 (Tidak Lulus)">
                                        40
                                    </span>
                                </td>

                                {{-- Kolom Nilai LIT --}}
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        78
                                    </span>
                                </td>

                                {{-- Kolom Nilai NUM --}}
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        90
                                    </span>
                                </td>

                                {{-- Kolom Aksi --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="openRemedialModal()"
                                        class="text-orange-600 hover:text-orange-900 bg-orange-50 hover:bg-orange-100 px-3 py-1.5 rounded-md border border-orange-200 transition-colors shadow-sm flex items-center justify-end ml-auto gap-2">
                                        <i class="fas fa-unlock-alt text-xs"></i>
                                        <span>Ingatkan Asesi</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            @livewire('empty-state', [
                                'title' => 'Tidak Ada Data',
                                'colspan' => 7,
                                'message' => 'Semua asesi telah mengisi survey.',
                            ])
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    {{ $asesiList->links() }}
                </div>
            </div>
        </div>
    </div>

    <div id="remedialModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                onclick="closeRemedialModal()"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="relative inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-unlock-alt text-orange-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Validasi Remedial
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500 mb-4">
                                    Anda akan membuka akses ulang ujian untuk peserta <strong>Ahmad Fauzi</strong>. Silakan
                                    pilih kategori yang ingin di-reset. Data nilai sebelumnya akan disimpan sebagai riwayat.
                                </p>

                                <div class="space-y-3 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox"
                                            class="form-checkbox h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                                        <span class="text-gray-700 font-medium">HOTS</span>
                                    </label>

                                    <label
                                        class="flex items-center space-x-3 cursor-pointer bg-red-50 p-2 rounded -ml-2 border border-red-100">
                                        <input type="checkbox" checked
                                            class="form-checkbox h-5 w-5 text-red-600 rounded border-gray-300 focus:ring-red-500">
                                        <span class="text-red-800 font-bold">PCK (Nilai: 40 - Gagal)</span>
                                    </label>

                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox"
                                            class="form-checkbox h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                                        <span class="text-gray-700 font-medium">Literasi</span>
                                    </label>

                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox"
                                            class="form-checkbox h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                                        <span class="text-gray-700 font-medium">Numerasi</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Proses Remedial
                    </button>
                    <button type="button" onclick="closeRemedialModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openRemedialModal() {
            document.getElementById('remedialModal').classList.remove('hidden');
        }

        function closeRemedialModal() {
            document.getElementById('remedialModal').classList.add('hidden');
        }
    </script>
@endsection
