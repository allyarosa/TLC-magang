@extends('layouts.adminDashboard')

@section('title', 'Hasil Survey')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        @include('components.admin.navbar')

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 mt-4">
            <div>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Monitoring & Hasil Survey
                </h1>
            </div>
            <div class="mt-4 md:mt-0 flex gap-3">
                {{-- <button
                    class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
                    <i class="fas fa-filter mr-2 text-gray-400"></i>
                    Filter
                </button> --}}
                <a href="{{ route('admin.survey-result.a.questions') }}"
                    class="px-4 py-1.5 text-sm font-medium text-white bg-green-500 hover:bg-green-600 rounded-lg border border-transparent flex items-center">
                    Lihat Soal
                </a>
                <a href="{{ route('admin.survey-result.a.export', ['type' => $type ?? 'all']) }}"
                    class="flex items-center px-4 py-2 bg-biru text-white rounded-lg text-sm font-medium hover:bg-brandBlue-dark transition-colors shadow-md">
                    <i class="fas fa-file-export mr-2"></i>
                    Export Data
                </a>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-slate-200 rounded-xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
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

                <div class="flex flex-col items-start z-10 flex-1 w-full pr-4">

                    <div class="w-full flex items-center justify-between mb-1">
                        <span class="text-orange-600 text-xs font-bold uppercase tracking-wider">
                            Belum melakukan survey
                        </span>

                        @if ($hideDetailButton)
                            <a href="{{ route('admin.survey-result.a.asesi-without-survey') }}"
                                class="inline-flex items-center gap-1 px-2 py-1 text-[12px] font-semibold text-orange-700 bg-orange-50 border border-orange-200 rounded hover:bg-orange-100 hover:text-orange-800 transition-colors duration-200 cursor-pointer whitespace-nowrap">
                                Lihat Detail
                                <i class="fas fa-arrow-right text-[8px]"></i>
                            </a>
                        @endif
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800">
                        {{ $countAsesiWithoutSurvey }}
                        <span class="text-sm font-semibold text-gray-500">
                            Asesi
                        </span>
                    </h3>
                </div>
            </div>

            <div class="bg-slate-200 rounded-xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
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

        {{-- Rata-rata Penilaian Cards (Updated Design) --}}
        <div class="mb-8">
            <h2 class="text-sm font-bold text-gray-600 mb-3 uppercase tracking-wide">
                Indeks Kepuasan Peserta
            </h2>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
                {{-- 1. Materi Training --}}
                <div
                    class="group relative bg-gray-200 p-3 rounded-lg border border-gray-200 flex flex-col items-start hover:shadow-md transition-all cursor-help">
                    <span class="text-xs font-medium text-gray-500 mb-1">Materi Training</span>
                    <div class="flex items-baseline gap-1">
                        <h3 class="text-xl font-bold text-gray-800">{{ number_format($avgRatings->avg_materi ?? 0, 1) }}
                        </h3>
                        <span class="text-[10px] text-gray-400">/ 4.0</span>
                    </div>

                    <!-- Tooltip -->
                    <div
                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-56 p-2 bg-slate-800 text-white text-xs rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 text-center leading-relaxed">
                        "Materi training selama 12 sesi sesuai dengan kebutuhan kompetensi saya."
                        <div
                            class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-slate-800">
                        </div>
                    </div>
                </div>

                {{-- 2. Kualitas Trainer --}}
                <div
                    class="group relative bg-gray-200 p-3 rounded-lg border border-gray-200 flex flex-col items-start hover:shadow-md transition-all cursor-help">
                    <span class="text-xs font-medium text-gray-500 mb-1">Kualitas Trainer</span>
                    <div class="flex items-baseline gap-1">
                        <h3 class="text-xl font-bold text-gray-800">{{ number_format($avgRatings->avg_trainer ?? 0, 1) }}
                        </h3>
                        <span class="text-[10px] text-gray-400">/ 4.0</span>
                    </div>

                    <!-- Tooltip -->
                    <div
                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-56 p-2 bg-slate-800 text-white text-xs rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 text-center leading-relaxed">
                        "Trainer menyampaikan materi dengan jelas dan membantu."
                        <div
                            class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-slate-800">
                        </div>
                    </div>
                </div>

                {{-- 3. Proses Uji --}}
                <div
                    class="group relative bg-gray-200 p-3 rounded-lg border border-gray-200 flex flex-col items-start hover:shadow-md transition-all cursor-help">
                    <span class="text-xs font-medium text-gray-500 mb-1">Proses Uji</span>
                    <div class="flex items-baseline gap-1">
                        <h3 class="text-xl font-bold text-gray-800">{{ number_format($avgRatings->avg_uji ?? 0, 1) }}</h3>
                        <span class="text-[10px] text-gray-400">/ 4.0</span>
                    </div>

                    <!-- Tooltip -->
                    <div
                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-56 p-2 bg-slate-800 text-white text-xs rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 text-center leading-relaxed">
                        "Proses uji sertifikasi dilaksanakan secara adil dan transparan."
                        <div
                            class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-slate-800">
                        </div>
                    </div>
                </div>

                {{-- 4. Peningkatan Skill --}}
                <div
                    class="group relative bg-gray-200 p-3 rounded-lg border border-gray-200 flex flex-col items-start hover:shadow-md transition-all cursor-help">
                    <span class="text-xs font-medium text-gray-500 mb-1">Peningkatan Skill</span>
                    <div class="flex items-baseline gap-1">
                        <h3 class="text-xl font-bold text-gray-800">
                            {{ number_format($avgRatings->avg_peningkatan_kompetensi ?? 0, 1) }}</h3>
                        <span class="text-[10px] text-gray-400">/ 4.0</span>
                    </div>

                    <!-- Tooltip -->
                    <div
                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-56 p-2 bg-slate-800 text-white text-xs rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 text-center leading-relaxed">
                        "Setelah mengikuti program ini, pemahaman dan kompetensi saya meningkat."
                        <div
                            class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-slate-800">
                        </div>
                    </div>
                </div>

                {{-- 5. Implementasi --}}
                <div
                    class="group relative bg-gray-200 p-3 rounded-lg border border-gray-200 flex flex-col items-start hover:shadow-md transition-all cursor-help">
                    <span class="text-xs font-medium text-gray-500 mb-1">Implementasi</span>
                    <div class="flex items-baseline gap-1">
                        <h3 class="text-xl font-bold text-gray-800">{{ number_format($avgRatings->avg_penerapan ?? 0, 1) }}
                        </h3>
                        <span class="text-[10px] text-gray-400">/ 4.0</span>
                    </div>

                    <!-- Tooltip -->
                    <div
                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-56 p-2 bg-slate-800 text-white text-xs rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 text-center leading-relaxed">
                        "Kompetensi hasil training ini sudah/akan saya terapkan dalam pekerjaan saya."
                        <div
                            class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-slate-800">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

            <div
                class="p-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4 items-center bg-gray-50/50">

                {{-- FORM SEARCH --}}
                <div class="relative w-full sm:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <form action="{{ route('admin.survey-result.a.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ $search ?? '' }}"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out"
                            placeholder="Cari nama asesi atau email...">
                        @if(isset($type) && $type)
                            <input type="hidden" name="type" value="{{ $type }}">
                        @endif
                    </form>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.survey-result.a.index', ['search' => $search ?? '']) }}"
                        class="px-4 py-1.5 text-sm font-medium rounded-lg border {{ !isset($type) || $type !== 'pck' ? 'text-white bg-[#1D4E89] border-[#1D4E89]' : 'text-indigo-700 bg-indigo-50 border-indigo-100 hover:bg-indigo-100' }}">
                        Semua
                    </a>
                    <a href="{{ route('admin.survey-result.a.index', ['type' => 'pck', 'search' => $search ?? '']) }}"
                        class="px-4 py-1.5 text-sm font-medium rounded-lg border {{ isset($type) && $type === 'pck' ? 'text-white bg-[#1D4E89] border-[#1D4E89]' : 'text-indigo-700 bg-indigo-50 border-indigo-100 hover:bg-indigo-100' }}">
                        PCK Only
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-brandBlue">
                        <tr>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Range Umur
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Nilai PCK
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Rating Materi
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Rating Trainer
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Rating Uji
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Rating
                                <br>
                                Peningkatan Kompetensi
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Rating Penerapan
                            </th>
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($surveySubmissions as $data)
                            <tr class="hover:bg-gray-50 transition-colors">

                                {{-- NO --}}
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    {{ $surveySubmissions->firstItem() + $loop->index }}
                                </td>

                                {{-- NAME --}}
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover border-2 border-indigo-100"
                                                src="{{ '/storage/' . $data->user->userProfile->profile_image }}"
                                                alt="Profile image {{ $data->user->name }}">
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $data->user->name }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{ $data->user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- RANGE UMUR --}}
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    {{ $data->umur_range }}
                                </td>
                                {{-- NILAI PCK --}}
                                <td class="px-4 py-3 whitespace-nowrap text-center text-sm font-bold">
                                    @php
                                        $pckExam = $data->user->examsA->first();
                                        $pckScore = $pckExam ? $pckExam->score : null;
                                    @endphp
                                    @if ($pckScore !== null)
                                        <span class="{{ $pckScore >= 75 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $pckScore }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                {{-- RATING MATERI --}}
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-bold
                                        {{ $data->rating_materi == 4
                                            ? 'bg-green-100 text-green-800'
                                            : ($data->rating_materi == 3
                                                ? 'bg-blue-100 text-blue-800'
                                                : ($data->rating_materi == 2
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-red-100 text-red-800')) }}">
                                        {{ $data->rating_materi }}
                                    </span>
                                </td>
                                {{-- RATING TRAINER --}}
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-bold
                                        {{ $data->rating_trainer == 4
                                            ? 'bg-green-100 text-green-800'
                                            : ($data->rating_trainer == 3
                                                ? 'bg-blue-100 text-blue-800'
                                                : ($data->rating_trainer == 2
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-red-100 text-red-800')) }}">
                                        {{ $data->rating_trainer }}
                                    </span>
                                </td>

                                {{-- RATING UJI --}}
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-bold
                                        {{ $data->rating_uji == 4
                                            ? 'bg-green-100 text-green-800'
                                            : ($data->rating_uji == 3
                                                ? 'bg-blue-100 text-blue-800'
                                                : ($data->rating_uji == 2
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-red-100 text-red-800')) }}">
                                        {{ $data->rating_uji }}
                                    </span>
                                </td>

                                {{-- RATING PENINGKATAN KOMPETENSI --}}
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-bold
                                        {{ $data->rating_peningkatan_kompetensi == 4
                                            ? 'bg-green-100 text-green-800'
                                            : ($data->rating_peningkatan_kompetensi == 3
                                                ? 'bg-blue-100 text-blue-800'
                                                : ($data->rating_peningkatan_kompetensi == 2
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-red-100 text-red-800')) }}">
                                        {{ $data->rating_peningkatan_kompetensi }}
                                    </span>
                                </td>

                                {{-- RATING PENERAPAN --}}
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-bold
                                        {{ $data->rating_penerapan == 4
                                            ? 'bg-green-100 text-green-800'
                                            : ($data->rating_penerapan == 3
                                                ? 'bg-blue-100 text-blue-800'
                                                : ($data->rating_penerapan == 2
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-red-100 text-red-800')) }}">
                                        {{ $data->rating_penerapan }}
                                    </span>
                                </td>

                                {{-- ACTIONS --}}
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex space-x-2">

                                        {{-- MELIHAT --}}
                                        <a href="{{ route('admin.survey-result.a.show', $data->id) }}"
                                            class="p-2 text-blue-600 bg-blue-50 rounded-md hover:bg-blue-100 transition-colors inline-flex items-center justify-center"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            @livewire('empty-state', [
                                'title' => 'Tidak Ada Data',
                                'colspan' => 10,
                                'message' => 'Data Survey belum tersedia.',
                            ])
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    {{ $surveySubmissions->links() }}
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
