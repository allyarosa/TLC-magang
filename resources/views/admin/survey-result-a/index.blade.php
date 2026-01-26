@extends('layouts.adminDashboard')

@section('title', 'Hasil Survey')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <ol class="flex items-center space-x-1 text-gray-600">
                <nav
                    class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">

                    {{-- Kategori Soal --}}
                    <a href="{{ route('admin.categories.a.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.categories.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Kategori Soal
                    </a>

                    <span class="text-gray-300">/</span>

                    {{-- Bank Soal --}}
                    <a href="{{ route('admin.question.a.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.question.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Bank Soal
                    </a>

                    <span class="text-gray-300">/</span>

                    {{-- Exam Monitoring --}}
                    <a href="{{ route('admin.exam.monitoring.a.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.exam.monitoring.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Exam Monitoring
                    </a>

                    <span class="text-gray-300">/</span>

                    {{-- Survey Result Level A --}}
                    <a href="{{ route('admin.survey-result.a.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.survey-result.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Survey Result
                    </a>
                </nav>
            </ol>
        </nav>
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 mt-4">
            <div>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Monitoring & Hasil Survey Level A
                </h1>
            </div>
            <div class="mt-4 md:mt-0 flex gap-3">
                {{-- <button
                    class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
                    <i class="fas fa-filter mr-2 text-gray-400"></i>
                    Filter
                </button> --}}
                <button
                    class="flex items-center px-4 py-2 bg-biru text-white rounded-lg text-sm font-medium hover:bg-brandBlue-dark transition-colors shadow-md">
                    <i class="fas fa-file-export mr-2"></i>
                    Export Data
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-slate-100 rounded-xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs font-semibold uppercase tracking-wider">
                        Total Responden
                    </span>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">
                        {{ $totalResponses }} <span>Asesi</span>
                    </h3>
                </div>
                <div class="p-3 bg-white rounded-lg text-blue-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>

            <div
                class="bg-white rounded-xl p-5 border border-orange-200 shadow-sm flex items-center justify-between relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-orange-500"></div>
                <div>
                    <span class="text-orange-600 text-xs font-bold uppercase tracking-wider">
                        Belum melakukan survey
                    </span>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $countAsesiWithoutSurvey }}
                        <span class="text-sm font-normal text-gray-500">
                            User
                        </span>
                    </h3>
                </div>
                <div class="p-3 bg-orange-100 rounded-lg text-orange-600 animate-pulse">
                    <i class="fas fa-exclamation-circle text-xl"></i>
                </div>
            </div>

            <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs font-semibold uppercase tracking-wider">
                        Lulus Level A
                    </span>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">
                        {{ $countAsesiLevelACompleted }}
                        <span>Asesi</span>
                    </h3>
                </div>
                <div class="p-3 bg-green-100 rounded-lg text-green-600">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

            <div
                class="p-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4 items-center bg-gray-50/50">
                <div class="relative w-full sm:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out"
                        placeholder="Cari nama peserta atau email...">
                </div>
                <div class="flex gap-2">
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
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Peserta
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                HOTS</th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                PCK</th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                LIT</th>
                            <th scope="col"
                                class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                NUM</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                                            src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=random"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Ahmad Fauzi</div>
                                        <div class="text-xs text-gray-500">fauzi@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 cursor-help"
                                    title="Nilai: 85">
                                    85
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-800 border border-red-200 cursor-help"
                                    title="Nilai: 40 (Tidak Lulus)">
                                    40
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    78
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    90
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button onclick="openRemedialModal()"
                                    class="text-orange-600 hover:text-orange-900 bg-orange-50 hover:bg-orange-100 px-3 py-1.5 rounded-md border border-orange-200 transition-colors shadow-sm flex items-center justify-end ml-auto gap-2">
                                    <i class="fas fa-unlock-alt text-xs"></i>
                                    <span>Buka Remedial</span>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div
                                            class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                            SR
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Siti Rahma</div>
                                        <div class="text-xs text-gray-500">siti.rahma@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    80
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    75
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 animate-pulse">
                                    <i class="fas fa-clock mr-1 mt-0.5"></i> 24m
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-500">
                                    <i class="fas fa-lock text-[10px]"></i>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <span class="text-gray-400 italic text-xs">Sedang Ujian</span>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                                            src="https://ui-avatars.com/api/?name=Budi+Santoso&background=random"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                                        <div class="text-xs text-gray-500">budi@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">90</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">88</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">95</span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <span
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">92</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button
                                    class="text-indigo-600 hover:text-indigo-900 font-medium text-xs border border-indigo-100 px-3 py-1 rounded bg-indigo-50 hover:bg-indigo-100">
                                    Detail
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari
                            <span class="font-medium">97</span> hasil
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <i class="fas fa-chevron-left h-5 w-5 p-1"></i>
                            </a>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <i class="fas fa-chevron-right h-5 w-5 p-1"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="remedialModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
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