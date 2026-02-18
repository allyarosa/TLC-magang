{{-- untuk halaman hasil penilaian --}}
@extends('layouts.adminDashboard')

@section('title', 'Hasil Penilaian Level A')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <ol class="flex items-center space-x-1 text-gray-600">
                <nav
                    class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">
                    <a href="{{ route('admin.categories.a.index') }}"
                        class="transition-colors hover:text-blue-600">
                        Kategori Soal
                    </a>
                    <span class="text-gray-300">/</span>
                    <a href="{{ route('admin.question.a.index') }}"
                        class="transition-colors hover:text-blue-600">
                        Bank Soal
                    </a>
                    <span class="text-gray-300">/</span>
                    <a href="{{ route('admin.exam.monitoring.a.index') }}"
                        class="transition-colors hover:text-blue-600">
                        Exam Monitoring
                    </a>
                    <span class="text-gray-300">/</span>
                    <a href="{{ route('admin.survey-result.a.index') }}"
                        class="transition-colors hover:text-blue-600">
                        Survey Result
                    </a>
                    <span class="text-gray-300">/</span>
                    {{-- <span class="text-blue-600 font-semibold">Score Result</span> --}}
                    <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                        class="transition-colors hover:text-blue-600 text-blue-600 font-semibold">
                        Score Result
                </nav>
            </ol>
        </nav>

        {{-- Success/Error Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 mt-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 mt-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 mt-4">
            <div>
                <h1 class="text-2xl font-bold text-brandBlue tracking-tight">
                    Hasil Penilaian Level A
                </h1>
            </div>
            <div class="mt-4 md:mt-0 flex gap-3">
                <a href="{{ route('admin.level.a.hasil-penilaian.import-form') }}"
                    class="flex items-center px-4 py-2 bg-green-500 text-white rounded-lg text-sm font-medium hover:bg-green-600 transition-colors shadow-md">
                    <i class="fas fa-file-import mr-2"></i>
                    Import Nilai
                </a>
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false"
                        class="flex items-center px-4 py-2 bg-biru text-white rounded-lg text-sm font-medium hover:bg-brandBlue-dark transition-colors shadow-md">
                        <i class="fas fa-file-export mr-2"></i>
                        Export Data
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div x-show="open" x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100 z-10">
                        <a href="{{ route('admin.level.a.hasil-penilaian.export', ['format' => 'xlsx']) }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-lg">
                            <i class="fas fa-file-excel mr-2 text-green-600"></i>
                            Export Excel (.xlsx)
                        </a>
                        <a href="{{ route('admin.level.a.hasil-penilaian.export', ['format' => 'csv']) }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-lg">
                            <i class="fas fa-file-csv mr-2 text-blue-600"></i>
                            Export CSV (.csv)
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-slate-100 rounded-xl p-5 border border-gray-100 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-xs font-semibold uppercase tracking-wider">
                        Total Responden
                    </span>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">
                        {{ $totalResponden ?? 0 }} <span class="text-sm font-normal">Asesi</span>
                    </h3>
                </div>
                <div class="p-3 bg-white rounded-lg text-blue-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>

            <div
                class="bg-white rounded-xl p-5 border border-red-200 shadow-sm flex items-center justify-between relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-red-500"></div>
                <div>
                    <span class="text-red-600 text-xs font-bold uppercase tracking-wider">
                        Tidak Lulus
                    </span>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $totalGagal ?? 0 }}
                        <span class="text-sm font-normal text-gray-500">Asesi</span>
                    </h3>
                </div>
                <div class="p-3 bg-red-100 rounded-lg text-red-600">
                    <i class="fas fa-times-circle text-xl"></i>
                </div>
            </div>

            <div class="bg-white rounded-xl p-5 border border-green-200 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-green-600 text-xs font-semibold uppercase tracking-wider">
                        Lulus Level A
                    </span>
                    <h3 class="text-2xl font-bold text-gray-700 mt-1">
                        {{ $totalLulus ?? 0 }} <span class="text-sm font-normal">Asesi</span>
                    </h3>
                </div>
                <div class="p-3 bg-green-100 rounded-lg text-green-600">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            {{-- Search and Filter --}}
            <div
                class="p-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4 items-center bg-gray-50/50">
                <form action="{{ route('admin.level.a.hasil-penilaian') }}" method="GET" class="relative w-full sm:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out"
                        placeholder="Cari nama peserta atau email...">
                </form>
                <div class="flex gap-2">
                    <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                        class="px-4 py-1.5 text-sm font-medium text-indigo-700 bg-indigo-50 rounded-lg border border-indigo-100">
                        Semua
                    </a>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Peserta
                            </th>
                            @foreach ($categories as $category)
                                <th scope="col"
                                    class="px-4 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider w-24">
                                    {{ strtoupper($category->name) }}
                                </th>
                            @endforeach
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $index => $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{ $users->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if ($user->profile_photo)
                                                <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                                                    src="{{ asset('storage/' . $user->profile_photo) }}"
                                                    alt="">
                                            @else
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @foreach ($categories as $category)
                                    @php
                                        $result = $examResults[$user->id][$category->name] ?? null;
                                        $score = $result['score'] ?? null;
                                        $isPassed = $result['is_passed'] ?? null;
                                        $examId = $result['exam_id'] ?? null;
                                    @endphp
                                    <td class="px-4 py-4 whitespace-nowrap text-center">
                                        @if ($score !== null)
                                            <span class="text-sm font-bold {{ $isPassed ? 'text-green-600' : 'text-red-600' }}">
                                                {{ number_format($score, 0) }}
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-sm">-</span>
                                        @endif
                                    </td>
                                @endforeach
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.level.a.hasil-penilaian.edit-user', $user->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 font-medium text-xs border border-indigo-100 px-3 py-1.5 rounded bg-indigo-50 hover:bg-indigo-100"
                                            title="Edit Nilai">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($categories) + 3 }}" class="px-6 py-8 text-center text-gray-500">
                                    <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
                                    <p>Belum ada data penilaian</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Legend --}}
            {{-- <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                <div class="flex items-center gap-4 text-sm text-gray-600">
                    <span class="font-medium">Keterangan:</span>
                    <span class="flex items-center gap-1">
                        <span class="w-4 h-4 bg-green-100 rounded"></span>
                        <span>Lulus (≥ {{ $passingScore }})</span>
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="w-4 h-4 bg-red-100 rounded"></span>
                        <span>Tidak Lulus (&lt; {{ $passingScore }})</span>
                    </span>
                </div>
            </div> --}}


            {{-- Legend --}}
            {{-- <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                <div class="flex flex-col gap-2 text-sm text-gray-600">
                    <span class="font-medium">Keterangan Passing Score:</span>

                    @foreach ($categories as $category)
                        <div class="flex items-center gap-4">
                            <span class="font-semibold uppercase w-24">
                                {{ $category->name }}
                            </span>

                            <span class="flex items-center gap-1">
                                <span class="w-4 h-4 bg-green-100 rounded"></span>
                                <span>
                                    Lulus (≥ {{ $category->passing_score ?? 70 }})
                                </span>
                            </span>

                            <span class="flex items-center gap-1">
                                <span class="w-4 h-4 bg-red-100 rounded"></span>
                                <span>
                                    Tidak Lulus (&lt; {{ $category->passing_score ?? 70 }})
                                </span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div> --}}


            {{-- Pagination --}}
            <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium">{{ $users->firstItem() ?? 0 }}</span> sampai
                            <span class="font-medium">{{ $users->lastItem() ?? 0 }}</span> dari
                            <span class="font-medium">{{ $users->total() }}</span> hasil
                        </p>
                    </div>
                    <div>
                        {{ $users->appends(['search' => $search])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection