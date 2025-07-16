@extends('layouts.exam')

@section('content')
    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Navigation -->
            <div class="mb-6">
                <nav class="flex items-center space-x-2 text-sm text-gray-600">
                    <a href="{{ route('asesi.sertifikasi') }}"
                        class="hover:text-blue-600 transition-colors duration-200 flex items-center">
                        <i class="fas fa-home mr-1"></i>
                        Dashboard Sertifikasi
                    </a>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-800 font-medium">Hasil Ujian {{ $category->name }}</span>
                </nav>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-100">
                <div class="p-8 bg-white">
                    <!-- Header Section -->
                    <div class="mb-10 text-center">
                        <div
                            class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mb-4">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-3 text-gray-700">Ringkasan Hasil Ujian</h3>
                        <p class="text-gray-600 text-lg font-bold">{{ $category->name }}</p>

                        <!-- Status Badge -->
                        @if ($exam->is_passed)
                            <div
                                class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800 mt-3">
                                <i class="fas fa-check-circle mr-2"></i>
                                LULUS
                            </div>
                        @else
                            <div
                                class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800 mt-3">
                                <i class="fas fa-times-circle mr-2"></i>
                                TIDAK LULUS
                            </div>
                        @endif
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl shadow-lg border border-blue-200 transition-all duration-300 hover:shadow-xl hover:scale-105">
                            <div class="flex items-center justify-between mb-3">
                                <div class="text-blue-700 text-lg font-semibold">Skor</div>
                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-trophy text-white"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-blue-800">{{ $exam->correct_answers }}/{{ $totalQuestions }}
                            </div>
                            {{-- <div class="text-sm text-blue-600 mt-1">
                                {{ number_format(($exam->correct_answers / $totalQuestions) * 100, 1) }}%
                            </div> --}}
                        </div>

                        <div
                            class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl shadow-lg border border-green-200 transition-all duration-300 hover:shadow-xl hover:scale-105">
                            <div class="flex items-center justify-between mb-3">
                                <div class="text-green-700 text-lg font-semibold">Benar</div>
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-green-800">{{ $correctAnswers }}</div>
                            {{-- <div class="text-sm text-green-600 mt-1">
                                {{ number_format(($correctAnswers / $totalQuestions) * 100, 1) }}% dari total
                            </div> --}}
                        </div>

                        <div
                            class="bg-gradient-to-br from-red-50 to-red-100 p-6 rounded-xl shadow-lg border border-red-200 transition-all duration-300 hover:shadow-xl hover:scale-105">
                            <div class="flex items-center justify-between mb-3">
                                <div class="text-red-700 text-lg font-semibold">Salah</div>
                                <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-times text-white"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-red-800">{{ $wrongAnswers }}</div>
                            {{-- <div class="text-sm text-red-600 mt-1">
                                {{ number_format(($wrongAnswers / $totalQuestions) * 100, 1) }}% dari total
                            </div> --}}
                        </div>

                        <div
                            class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-xl shadow-lg border border-gray-200 transition-all duration-300 hover:shadow-xl hover:scale-105">
                            <div class="flex items-center justify-between mb-3">
                                <div class="text-gray-700 text-lg font-semibold">Tidak Dijawab</div>
                                <div class="w-10 h-10 bg-gray-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-question text-white"></i>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-gray-800">{{ $unansweredQuestions }}</div>
                            {{-- <div class="text-sm text-gray-600 mt-1">
                                {{ number_format(($unansweredQuestions / $totalQuestions) * 100, 1) }}% dari total
                            </div> --}}
                        </div>
                    </div>

                    <!-- Score Visualization -->
                    {{-- <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-xl shadow-md mb-8 border border-gray-200">
                        <h4 class="text-xl font-bold mb-4 text-gray-800 flex items-center">
                            <i class="fas fa-chart-pie mr-2 text-blue-600"></i>
                            Visualisasi Skor
                        </h4>
                        <div class="flex items-center justify-center">
                            <div class="relative w-32 h-32">
                                <div class="w-full h-full bg-gray-200 rounded-full"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-gray-800">{{ number_format($exam->score) }}</div>
                                        <div class="text-sm text-gray-600">Nilai</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Exam Information -->
                    <div
                        class="bg-gradient-to-r from-gray-50 to-gray-100 p-8 rounded-xl shadow-md mb-8 border border-gray-200">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-xl font-bold text-gray-800 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                                Informasi Detail Ujian
                            </h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-gray-600 mb-2 text-sm font-medium">Kategori Ujian</div>
                                <div class="font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-bookmark mr-2 text-blue-500"></i>
                                    {{ $category->name }}
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-gray-600 mb-2 text-sm font-medium">Hari & Tanggal Ujian</div>
                                <div class="font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-calendar-alt mr-2 text-green-500"></i>
                                    {{ \Carbon\Carbon::parse($exam->created_at)->locale('id')->translatedFormat('l, d F Y') }}
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-gray-600 mb-2 text-sm font-medium">Waktu Mulai</div>
                                <div class="font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-play-circle mr-2 text-blue-500"></i>
                                    {{ $exam->start_time->format('H:i:s') }} WIB
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-gray-600 mb-2 text-sm font-medium">Waktu Selesai</div>
                                <div class="font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-stop-circle mr-2 text-red-500"></i>
                                    {{ $exam->end_time->format('H:i:s') }} WIB
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-gray-600 mb-2 text-sm font-medium">Durasi Pengerjaan</div>
                                <div class="font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-clock mr-2 text-yellow-500"></i>
                                    {{ ceil($exam->start_time->floatDiffInMinutes($exam->end_time)) }} menit
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-gray-600 mb-2 text-sm font-medium">Nilai Akhir</div>
                                <div class="font-bold text-xl text-gray-800 flex items-center">
                                    <i class="fas fa-star mr-2 text-yellow-500"></i>
                                    {{ number_format($exam->score) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                            <!-- Back to Dashboard Button -->
                            <a href="{{ route('asesi.sertifikasi') }}"
                                class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali ke Dashboard
                            </a>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                            @if (!$exam->is_passed)
                                <form action="{{ route('asesi.sertifikasi.level.a.instruction') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                        <i class="fas fa-redo mr-2"></i>
                                        Coba Lagi
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('asesi.nilai') }}"
                                class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                <i class="fas fa-eye mr-2"></i>
                                History Ujian
                            </a>

                        </div>
                    </div>

                    <!-- Motivational Message -->
                    <div class="mt-8 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                        @if ($exam->is_passed)
                            {{-- Success Message --}}
                            @if (session('testimonial_success'))
                                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        <p>{{ session('testimonial_success') }}</p>
                                    </div>
                                </div>
                            @endif

                            {{-- Error Messages --}}
                            @if ($errors->any())
                                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                        <p class="font-medium">Terjadi kesalahan:</p>
                                    </div>
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Testimonial Form Section --}}
                            @if (!($userHasTestimonial ?? false) && !session('testimonial_success'))
                                <div class="mb-6">
                                    <div class="text-center mb-6">
                                        <div class="text-green-600 text-3xl mb-3">
                                            <i class="fas fa-trophy"></i>
                                        </div>
                                        <h4 class="text-xl font-bold text-green-800 mb-2">Selamat! Anda Telah Lulus!</h4>
                                        <p class="text-gray-700 mb-4">Bagikan pengalaman Anda untuk membantu peserta lain
                                        </p>
                                    </div>

                                    {{-- Show/Hide Form Toggle --}}
                                    @if (!session('show_testimonial_form'))
                                        <div class="text-center mb-6">
                                            <form method="POST" action="{{ route('testimonials.show-form') }}">
                                                @csrf
                                                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                                <input type="hidden" name="category_id"
                                                    value="{{ $exam->category_a_id }}">
                                                <button type="submit"
                                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                                    <i class="fas fa-comment-alt mr-2"></i>
                                                    Berikan Testimonial
                                                </button>
                                            </form>
                                            <div class="mt-3">
                                                <a href="{{ route('asesi.sertifikasi') }}"
                                                    class="text-gray-600 hover:text-gray-800">
                                                    Lewati untuk sekarang
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        {{-- Testimonial Form --}}
                                        <div class="bg-white rounded-lg p-6 shadow-sm border">
                                            <h5 class="text-lg font-semibold text-gray-800 mb-4">
                                                <i class="fas fa-comment-alt mr-2 text-blue-600"></i>
                                                Berikan Testimonial Anda
                                            </h5>

                                            <form method="POST" action="{{ route('testimonials.store') }}">
                                                @csrf
                                                <input type="hidden" name="category_a_id"
                                                    value="{{ $exam->category_a_id }}">
                                                <input type="hidden" name="exam_a_id" value="{{ $exam->id }}">

                                                {{-- Rating Section --}}
                                                <div class="mb-4">
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                                        Rating Pengalaman Anda
                                                    </label>
                                                    <div class="flex flex-col space-y-2">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <label class="flex items-center cursor-pointer">
                                                                <input type="radio" name="rating"
                                                                    value="{{ $i }}" class="mr-2"
                                                                    {{ $i == 5 ? 'checked' : '' }}>
                                                                <div class="flex items-center">
                                                                    @for ($j = 1; $j <= 5; $j++)
                                                                        <i
                                                                            class="fas fa-star {{ $j <= $i ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                                                    @endfor
                                                                    <span class="ml-2 text-gray-700">
                                                                        @if ($i == 5)
                                                                            Sangat Baik
                                                                        @elseif ($i == 4)
                                                                            Baik
                                                                        @elseif ($i == 3)
                                                                            Cukup
                                                                        @elseif ($i == 2)
                                                                            Kurang
                                                                        @else
                                                                            Sangat Kurang
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </label>
                                                        @endfor
                                                    </div>
                                                </div>

                                                {{-- Testimonial Content --}}
                                                <div class="mb-4">
                                                    <label for="content"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Ceritakan Pengalaman Anda
                                                    </label>
                                                    <textarea name="content" id="content" rows="4"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none @error('content') border-red-500 @enderror"
                                                        placeholder="Bagikan pengalaman Anda mengikuti ujian ini... (minimal 10 karakter)" required>{{ old('content') }}</textarea>
                                                    @error('content')
                                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                                    @enderror
                                                    <p class="text-sm text-gray-500 mt-1">Minimal 10 karakter</p>
                                                </div>

                                                {{-- Submit Button --}}
                                                <div class="flex justify-end space-x-3">
                                                    <a href="{{ route('asesi.sertifikasi') }}"
                                                        class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                                        Lewati
                                                    </a>
                                                    <button type="submit"
                                                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                                        Kirim Testimonial
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @else
                                {{-- Already submitted testimonial --}}
                                <div class="text-center">
                                    <div class="text-green-600 text-3xl mb-3">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <h4 class="text-xl font-bold text-green-800 mb-2">Terima Kasih!</h4>
                                    <p class="text-gray-700">Anda telah memberikan testimonial untuk kategori ini.</p>
                                </div>
                            @endif
                        @else
                            {{-- Pesan gagal --}}
                            <div class="text-center">
                                <div class="text-orange-600 text-2xl mb-2">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <h5 class="text-lg font-bold text-orange-800 mb-2">Jangan Menyerah!</h5>
                                <p class="text-orange-700">
                                    Kegagalan adalah kesempatan untuk belajar lebih baik. Pelajari kembali materi dan coba
                                    lagi. Setiap usaha membawa Anda lebih dekat pada kesuksesan.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles for Print -->
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
            }

            .bg-gradient-to-br,
            .bg-gradient-to-r {
                background: white !important;
            }
        }
    </style>
@endsection
