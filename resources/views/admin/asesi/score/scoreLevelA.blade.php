@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-6 mt-4">
        {{-- Header --}}
        <div class="flex items-center justify-between p-4 mb-6 bg-biru border-b border-gray-200 shadow-md rounded-lg">
            <a href="{{ route('admin.asesi.show', $asesi->id) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors duration-200">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i>
                Kembali ke Detail Asesi
            </a>
            <h1 class="text-lg font-semibold text-white sm:text-2xl">
                Nilai Level A
            </h1>
        </div>

        {{-- Info Asesi --}}
        <div class="bg-white rounded-xl shadow-md p-5 mb-6">
            <div class="flex items-center gap-4">
                <img src="{{ $asesi->profile_image ? asset('storage/' . $asesi->profile_image) : asset('assets/img/blank_profile.png') }}"
                    alt="Profile" class="w-14 h-14 object-cover rounded-full border-3 border-blue-500 shadow">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">{{ $asesi->name }}</h2>
                    @if ($asesi->nama_depan)
                        <p class="text-sm text-gray-500">{{ $asesi->nama_depan }}</p>
                    @endif
                    <p class="text-xs text-gray-400 mt-1">{{ $asesi->user->email ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Kartu Skor Per Kategori --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            @php
                $categoryStyles = [
                    'HOTS' => [
                        'gradient' => 'from-red-500 to-red-700',
                        'bg' => 'bg-red-50',
                        'border' => 'border-red-200',
                        'text' => 'text-red-700',
                        'icon' => 'fa-brain',
                        'badge_pass' => 'bg-red-100 text-red-700',
                    ],
                    'PCK' => [
                        'gradient' => 'from-blue-500 to-blue-700',
                        'bg' => 'bg-blue-50',
                        'border' => 'border-blue-200',
                        'text' => 'text-blue-700',
                        'icon' => 'fa-book-open',
                        'badge_pass' => 'bg-blue-100 text-blue-700',
                    ],
                    'LITERASI' => [
                        'gradient' => 'from-emerald-500 to-emerald-700',
                        'bg' => 'bg-emerald-50',
                        'border' => 'border-emerald-200',
                        'text' => 'text-emerald-700',
                        'icon' => 'fa-feather-pointed',
                        'badge_pass' => 'bg-emerald-100 text-emerald-700',
                    ],
                    'NUMERASI' => [
                        'gradient' => 'from-amber-500 to-amber-700',
                        'bg' => 'bg-amber-50',
                        'border' => 'border-amber-200',
                        'text' => 'text-amber-700',
                        'icon' => 'fa-calculator',
                        'badge_pass' => 'bg-amber-100 text-amber-700',
                    ],
                ];
            @endphp

            @foreach ($bestScores as $data)
                @php
                    $cat = $data['category'];
                    $exam = $data['best_exam'];
                    $attempts = $data['attempts'];
                    $style = $categoryStyles[$cat->name] ?? [
                        'gradient' => 'from-gray-500 to-gray-700',
                        'bg' => 'bg-gray-50',
                        'border' => 'border-gray-200',
                        'text' => 'text-gray-700',
                        'icon' => 'fa-clipboard',
                        'badge_pass' => 'bg-gray-100 text-gray-700',
                    ];
                @endphp

                <div class="rounded-xl shadow-md overflow-hidden border {{ $style['border'] }} hover:shadow-lg transition-shadow duration-300">
                    {{-- Header Kartu --}}
                    <div class="bg-gradient-to-r {{ $style['gradient'] }} px-4 py-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid {{ $style['icon'] }} text-white text-lg"></i>
                                <h3 class="text-white font-bold text-sm">{{ $cat->name }}</h3>
                            </div>
                            @if ($exam)
                                @if ($exam->is_passed)
                                    <span class="px-2 py-0.5 bg-white/20 text-white text-[10px] font-semibold rounded-full backdrop-blur-sm">
                                        LULUS
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 bg-white/20 text-white text-[10px] font-semibold rounded-full backdrop-blur-sm">
                                        BELUM LULUS
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div>

                    {{-- Body Kartu --}}
                    <div class="{{ $style['bg'] }} p-4">
                        @if ($exam)
                            {{-- Skor --}}
                            <div class="text-center mb-3">
                                <p class="text-3xl font-extrabold {{ $style['text'] }}">{{ $exam->score }}</p>
                                <p class="text-[10px] text-gray-500 uppercase tracking-wider mt-1">Skor Terbaik</p>
                            </div>

                            {{-- Detail --}}
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500">Total Soal</span>
                                    <span class="font-semibold text-gray-700">{{ $exam->total_questions }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500">Benar</span>
                                    <span class="font-semibold text-green-600">{{ $exam->correct_answers }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500">Salah</span>
                                    <span class="font-semibold text-red-600">{{ $exam->wrong_answers }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500">Tidak Dijawab</span>
                                    <span class="font-semibold text-gray-600">{{ $exam->unanswered_questions }}</span>
                                </div>
                                <div class="flex justify-between items-center border-t border-gray-200 pt-2 mt-2">
                                    <span class="text-gray-500">Percobaan</span>
                                    <span class="font-semibold {{ $style['text'] }}">{{ $attempts }}x</span>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fa-solid fa-circle-minus text-gray-300 text-2xl mb-2"></i>
                                <p class="text-xs text-gray-400">Belum ada data ujian</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tabel Riwayat Ujian Per Kategori --}}
        @foreach ($categories as $category)
            @php
                $style = $categoryStyles[$category->name] ?? [
                    'gradient' => 'from-gray-500 to-gray-700',
                    'text' => 'text-gray-700',
                    'icon' => 'fa-clipboard',
                ];
                $categoryExams = $examsByCategory->get($category->id, collect());
            @endphp

            <div class="bg-white rounded-xl shadow-md mb-6 overflow-hidden">
                <div class="bg-gradient-to-r {{ $style['gradient'] }} px-5 py-3 flex items-center gap-2">
                    <i class="fa-solid {{ $style['icon'] }} text-white"></i>
                    <h3 class="text-white font-semibold text-sm">Riwayat Ujian — {{ $category->name }}</h3>
                    <span class="ml-auto text-white/70 text-xs">{{ $categoryExams->count() }} percobaan</span>
                </div>

                @if ($categoryExams->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                                <tr>
                                    <th class="px-5 py-3">#</th>
                                    <th class="px-5 py-3">Tanggal</th>
                                    <th class="px-5 py-3">Skor</th>
                                    <th class="px-5 py-3">Benar</th>
                                    <th class="px-5 py-3">Salah</th>
                                    <th class="px-5 py-3">Durasi</th>
                                    <th class="px-5 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($categoryExams as $index => $exam)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-5 py-3 text-gray-500 font-medium">{{ $index + 1 }}</td>
                                        <td class="px-5 py-3 text-gray-700">
                                            {{ $exam->created_at->format('d M Y, H:i') }}
                                        </td>
                                        <td class="px-5 py-3">
                                            <span class="font-bold {{ $style['text'] }}">{{ $exam->score }}</span>
                                        </td>
                                        <td class="px-5 py-3 text-green-600 font-medium">{{ $exam->correct_answers }}</td>
                                        <td class="px-5 py-3 text-red-600 font-medium">{{ $exam->wrong_answers }}</td>
                                        <td class="px-5 py-3 text-gray-600">{{ $exam->duration }} menit</td>
                                        <td class="px-5 py-3">
                                            @if ($exam->is_passed)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-green-100 text-green-700">
                                                    <i class="fa-solid fa-check mr-1"></i> Lulus
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-100 text-red-700">
                                                    <i class="fa-solid fa-xmark mr-1"></i> Tidak Lulus
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-8 text-center">
                        <i class="fa-solid fa-inbox text-gray-300 text-3xl mb-2"></i>
                        <p class="text-sm text-gray-400">Belum ada riwayat ujian untuk kategori ini</p>
                    </div>
                @endif
            </div>
        @endforeach

    </div>
@endsection