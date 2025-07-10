@extends('layouts.asesiDashboard')

@section('title', 'Teaching and Learning Certification')

@section('content')

<section class="w-full px-6 py-12">
    <div class="container mx-auto max-w-7xl">
        <!-- Back Button -->
<div class="mb-4">
    <a href="{{ route('asesi.sertifikasi') }}"
        class="inline-flex items-center px-4 py-2 bg-white text-[#1D4E89] border border-gray-200 rounded-lg shadow hover:bg-gray-50 transition-all font-medium hover-lift">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

        <!-- Enhanced Header -->
        <div class="gradient-bg text-white p-8 rounded-3xl shadow-2xl mb-8 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-black/10 to-transparent"></div>
            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    <div class="flex items-center gap-5">
                        <div class="glass-effect p-4 rounded-2xl">
                            <i class="fas fa-trophy text-3xl text-yellow-300 drop-shadow-lg"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold mb-2 tracking-tight">Hasil Test Sertifikasi</h1>
                            <p class="text-lg opacity-90 font-medium">Detail hasil test dan performa peserta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Statistics Cards -->
        {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Total Lulus -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 card-hover border border-teal-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[#1D4E89] text-sm font-semibold uppercase tracking-wide mb-2">Total Lulus</p>
                        <p class="text-4xl font-bold text-teal-600 mb-1">4</p>
                        <p class="text-teal-500 text-sm font-medium">+2 dari bulan lalu</p>
                    </div>
                    <div class="bg-gradient-to-br from-teal-400 to-teal-600 p-4 rounded-2xl shadow-lg">
                        <i class="fas fa-check text-white text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Gagal -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 card-hover border border-pink-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[#1D4E89] text-sm font-semibold uppercase tracking-wide mb-2">Total Gagal</p>
                        <p class="text-4xl font-bold text-pink-600 mb-1">2</p>
                        <p class="text-pink-500 text-sm font-medium">Perlu perhatian</p>
                    </div>
                    <div class="bg-gradient-to-br from-pink-400 to-pink-600 p-4 rounded-2xl shadow-lg">
                        <i class="fas fa-times text-white text-2xl"></i>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Enhanced Results Table -->
        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden border border-orange-200/30">
            <div class="bg-gradient-to-r from-orange-50 to-blue-50 px-8 py-6 border-b border-orange-200">
                <h3 class="text-xl font-bold text-[#1D4E89] flex items-center gap-3">
                    <i class="fas fa-table text-[#E76F51]"></i>
                    Data Hasil Test
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-blue-50 to-orange-50">
                        <tr>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">No</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Nama Peserta</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Kategori</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Status</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Skor</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Total Soal</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Tidak Dijawab</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Benar</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Salah</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Kelulusan</th>
                            <th class="px-8 py-5 text-left text-xs font-bold text-[#1D4E89] uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-orange-100">
                        @forelse ($exams as $data)
                            <tr class="table-row">
                                <td class="px-8 py-6 text-sm font-semibold text-[#1D4E89]">{{ $loop->iteration }}</td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-semibold text-[#1D4E89]">{{ $data->user?->name }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-lightbulb text-[#E76F51] text-sm"></i>
                                        </div>
                                        <span class="text-sm font-medium text-[#1D4E89]">
                                            {{-- Gunakan relasi categoryA atau fallback ke category_info --}}
                                            {{ $data->categoryA?->name ?? $data->category_info?->name ?? 'Kategori Tidak Ditemukan' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="status-completed px-4 py-2 text-xs font-bold rounded-full shadow-sm">
                                        {{ $data->status }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg font-bold text-[#1D4E89]">{{ $data->score }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-sm font-medium text-gray-700">
                                    {{ $data->total_questions ?? 0 }}
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full">
                                        {{ $data->unanswered_questions ?? 0 }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 text-xs font-semibold bg-teal-100 text-teal-800 rounded-full">
                                        {{ $data->correct_answers ?? 0 }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 text-xs font-semibold bg-pink-100 text-pink-800 rounded-full">
                                        {{ $data->wrong_answers ?? 0 }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center text-teal-600 font-semibold">
                                        <i class="fas fa-medal mr-2 text-lg"></i>
                                        <span class="text-sm">{{ $data->is_passed ? 'Lulus' : 'Tidak Lulus' }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <a href="{{ route('asesi.sertifikasi.level.a.result', $data->id) }}"
                                       class="bg-blue-50 hover:bg-blue-100 text-[#1D4E89] px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-200 font-medium hover-lift">
                                        <i class="fas fa-eye"></i>
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="px-8 py-6 text-center text-gray-500">
                                    Tidak ada data ujian yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Jika menggunakan pagination --}}
            @if(isset($paginatedExams))
                <div class="mt-4">
                    {{ $paginatedExams->links() }}
                </div>
            @endif        </div>
    </div>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1D4E89 0%, #E76F51 50%, #F4A261 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(231, 111, 81, 0.25);
        }

        .hover-lift {
            transition: all 0.3s ease-in-out;
        }

        .hover-lift:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 10px 25px -5px rgba(231, 111, 81, 0.2);
        }

        .table-row {
            transition: all 0.2s ease;
        }

        .table-row:hover {
            background: linear-gradient(90deg, rgba(231, 111, 81, 0.05) 0%, rgba(29, 78, 137, 0.05) 100%);
            transform: translateX(4px);
        }

        .search-focus:focus {
            box-shadow: 0 0 0 3px rgba(231, 111, 81, 0.1);
        }

        .status-completed {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: white;
        }

        .status-ongoing {
            background: linear-gradient(135deg, #E76F51, #d97706);
            color: white;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }
    </style>
</section>


@endsection
