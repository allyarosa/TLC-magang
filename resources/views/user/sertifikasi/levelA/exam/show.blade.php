@extends('layouts.exam')

@section('content')
    <!-- Enhanced Navbar with Glass Effect -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-lg shadow-md border-b border-[#3A6EA5]/20">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Left section - Logo and Category -->
                <div class="flex items-center space-x-4">
                    <!-- Enhanced Logo -->
                    <div class="flex-shrink-0 flex items-center group">
                        <div class="relative">
                            <img class="h-10 w-auto transition-transform duration-300 group-hover:scale-110"
                                src="{{ asset('images/logoTlcPng.png') }}" alt="TLC Logo">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300">
                            </div>
                        </div>
                        <span
                            class="ml-2 text-xl font-bold bg-[#3A6EA5] bg-clip-text text-transparent hidden sm:block">TLC</span>
                    </div>

                    <!-- Enhanced Category Badge -->
                    <div class="hidden md:block">
                        <div class="flex items-center space-x-2">
                            <div class="relative overflow-hidden">
                                <span class="relative px-4 py-2 bg-[#3A6EA5] text-white text-sm font-semibold shadow-lg">
                                    <span class="relative z-10">Sertifikasi Level A -
                                        {{ $category->name ?? 'Tidak ada Kategori' }}</span>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Timer Section -->
                <div class="flex items-center justify-center">
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl px-4 py-2 shadow-lg border border-[#3A6EA5]/20">
                        @livewire('count-down-timer', ['endTime' => $endTime, 'examId' => $exam->id])
                    </div>
                </div>

                <form action="{{ route('asesi.sertifikasi.level.a.finish', $exam) }}" method="POST" id="finishExamForm"
                    class="inline-block hidden">
                    @csrf
                    <button type="button" onclick="confirmFinish()"
                        class="group relative overflow-hidden flex items-center bg-gradient-to-r from-[#90BE6D] to-[#3A6EA5] hover:from-[#7FA85C] hover:to-[#2E5A8A] text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 relative z-10" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="relative z-10 hidden sm:inline">Selesaikan Ujian</span>
                        <span class="relative z-10 sm:hidden">Selesai</span>
                    </button>
                </form>

                <!-- Enhanced Finish Button -->
                {{-- <div class="flex items-center">
                    @if ($answeredQuestions == $totalQuestions)
                        <form action="{{ route('asesi.sertifikasi.level.a.finish', $exam) }}" method="POST"
                            id="finishExamForm" class="inline-block">
                            @csrf
                            <button type="button" onclick="confirmFinish()"
                                class="group relative overflow-hidden flex items-center bg-gradient-to-r from-[#90BE6D] to-[#3A6EA5] hover:from-[#7FA85C] hover:to-[#2E5A8A] text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 relative z-10" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="relative z-10 hidden sm:inline">Selesaikan Ujian</span>
                                <span class="relative z-10 sm:hidden">Selesai</span>
                            </button>
                        </form>
                    @endif

                    <!-- Mobile menu button -->
                    <button id="mobileMenuBtn"
                        class="md:hidden ml-2 p-2 rounded-xl text-gray-500 hover:text-[#3A6EA5] hover:bg-gradient-to-r hover:from-[#3A6EA5]/10 hover:to-[#90BE6D]/10 transition-all duration-200">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div> --}}
            </div>

            <!-- Enhanced Mobile dropdown -->
            <div id="mobileMenu"
                class="md:hidden hidden border-t border-gray-200/50 py-3 bg-gradient-to-r from-[#3A6EA5]/5 to-[#90BE6D]/5">
                <div class="flex items-center justify-center space-x-2">
                    <span class="text-sm text-gray-600 font-medium">Kategori:</span>
                    <span
                        class="px-3 py-1 bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] text-white text-sm font-medium rounded-full shadow-md">
                        Sertifikasi Level A - {{ $category->name ?? 'Tidak ada Kategori' }}
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Enhanced Main Content -->
    <div class="min-h-screen py-6 bg-gradient-to-br from-[#3A6EA5]/8 via-purple-50/30 to-[#90BE6D]/8 pt-20">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row lg:justify-between gap-6 h-full">

            <!-- Enhanced Left Column - Question Content -->
            <div class="lg:w-10/12">
                @if ($questions->count() > 0)
                    @php
                        $question = $questions->first();
                        $userAnswer =
                            $exam->questionsA()->where('questions_a.id', $question->id)->first()->pivot->user_answer ??
                            null;
                    @endphp

                    <!-- Enhanced Question Card -->
                    <div
                        class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden mb-6 border border-[#3A6EA5]/20 h-full relative">
                        <!-- Decorative Elements -->
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#90BE6D]/10 to-transparent rounded-bl-full">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-[#3A6EA5]/10 to-transparent rounded-tr-full">
                        </div>

                        <!-- Enhanced Question Header -->
                        <div class="relative bg-[#3A6EA5] px-6 py-5">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-white flex items-center">
                                    <span
                                        class="bg-white/90 text-[#3A6EA5] rounded-full h-10 w-10 flex items-center justify-center mr-4 font-bold shadow-lg backdrop-blur-sm border border-white/20 text-lg">
                                        {{ $questions->currentPage() }}
                                    </span>
                                    <span
                                        class="bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">Pertanyaan</span>
                                </h3>
                                <div class="hidden sm:flex items-center space-x-2 text-white/80 text-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $questions->currentPage() }} dari {{ $totalQuestions }}</span>
                                </div>
                            </div>
                            <!-- Animated progress bar -->
                            <div class="absolute bottom-0 left-0 h-1 bg-white/20 w-full">
                                <div class="h-full bg-gradient-to-r from-white to-blue-200 transition-all duration-500"
                                    style="width: {{ ($questions->currentPage() / $totalQuestions) * 100 }}%"></div>
                            </div>
                        </div>

                        <!-- Enhanced Question Content -->
                        <div class="p-8 relative z-10">
                            <div class="prose prose-lg max-w-none mb-8">
                                <div class="relative">
                                    <p class="select-none">
                                        {!! $question->question_text !!}
                                    </p>
                                </div>
                            </div>

                            @if ($question->image)
                                <div class="mb-8 flex justify-center">
                                    <div class="relative group max-w-2xl">
                                        <div
                                            class="absolute -inset-2 bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] rounded-xl opacity-20 group-hover:opacity-30 transition-opacity duration-300">
                                        </div>
                                        <img src="{{ asset('/storage/' . $question->image) }}" alt="Gambar Soal"
                                            class="relative max-w-full h-auto rounded-xl shadow-xl border-2 border-white transition-all duration-300 group-hover:scale-[1.02] cursor-zoom-in bg-white p-2"
                                            onclick="window.open(this.src, '_blank')">
                                        <div
                                            class="absolute top-2 right-2 bg-black/20 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Enhanced Answer Options -->
                            <form action="{{ route('asesi.sertifikasi.level.a.answer', $exam) }}" method="POST"
                                id="answerForm">
                                @csrf
                                <input type="hidden" name="question_a_id" value="{{ $question->id }}">

                                <div class="space-y-4 mb-10">
                                    @php
                                        $options = [
                                            'a' => $question->option_a,
                                            'b' => $question->option_b,
                                            'c' => $question->option_c,
                                            'd' => $question->option_d,
                                        ];
                                    @endphp

                                    @foreach ($options as $key => $option)
                                        @if ($option)
                                            <div class="mb-2">
                                                <input type="radio" name="user_answer" id="answer_{{ $key }}"
                                                    value="{{ $key }}" {{ $userAnswer == $key ? 'checked' : '' }}
                                                    class="peer hidden">
                                                <label for="answer_{{ $key }}"
                                                    class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer
                       peer-checked:border-blue-600 peer-checked:bg-blue-50 transition">
                                                    <div
                                                        class="w-5 h-5 rounded-full border border-gray-400 flex items-center justify-center">
                                                        <div
                                                            class="w-2.5 h-2.5 rounded-full bg-blue-600 scale-0 peer-checked:scale-100 transition-transform">
                                                        </div>
                                                    </div>
                                                    <span class="font-medium text-gray-800">{{ strtoupper($key) }}.
                                                        {{ $option }}</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>

                                <!-- Enhanced Navigation Buttons -->
                                <div class="flex flex-col sm:flex-row justify-between gap-4">
                                    @if ($questions->currentPage() > 1)
                                        <a href="{{ $questions->previousPageUrl() }}"
                                            class="order-2 sm:order-1 group flex items-center justify-center bg-gradient-to-r from-gray-100 to-gray-200 hover:from-[#3A6EA5]/10 hover:to-[#90BE6D]/10 text-gray-700 hover:text-[#3A6EA5] font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 border border-gray-300 hover:border-[#3A6EA5]/30">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 mr-2 transition-transform duration-200 group-hover:-translate-x-1"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Sebelumnya
                                        </a>
                                    @else
                                        <div class="order-2 sm:order-1"></div>
                                    @endif

                                    <div class="order-1 sm:order-2 flex gap-4">
                                        @if ($questions->currentPage() < $totalQuestions)
                                            <input type="hidden" name="next_question"
                                                value="{{ $questions->currentPage() + 1 }}">
                                            <button type="submit"
                                                class="group relative overflow-hidden flex-1 sm:flex-none flex items-center justify-center bg-[#3A6EA5] hover:from-[#2E5A8A] hover:to-[#7FA85C] text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                                </div>
                                                <span class="relative z-10">Selanjutnya</span>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 ml-2 relative z-10 transition-transform duration-200 group-hover:translate-x-1"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            {{-- @else
                                            <input type="hidden" name="next_question"
                                                value="{{ $questions->currentPage() }}">
                                            <button type="submit"
                                                class="group relative overflow-hidden flex-1 sm:flex-none bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] hover:from-[#2E5A8A] hover:to-[#7FA85C] text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                                </div>
                                                <span class="relative z-10">Simpan Jawaban</span>
                                            </button>
                                        @endif --}}
                                        @else
                                            <input type="hidden" name="next_question"
                                                value="{{ $questions->currentPage() }}">

                                            @if ($answeredQuestions == $totalQuestions)
                                                <form action="{{ route('asesi.sertifikasi.level.a.finish', $exam) }}"
                                                    method="POST" id="finishExamForm"
                                                    class="flex-1 sm:flex-none hidden">
                                                    @csrf
                                                    <button type="button" onclick="confirmFinish()"
                                                        class="group relative overflow-hidden w-full flex items-center justify-center bg-[#2E5A8A] text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                                        <div
                                                            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 mr-2 relative z-10" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span class="relative z-10 hidden sm:inline">
                                                            Selesaikan Ujian
                                                        </span>
                                                        <span class="relative z-10 sm:hidden">Selesai</span>
                                                    </button>
                                                </form>
                                            @else
                                                <button type="submit"
                                                    class="group relative overflow-hidden flex-1 sm:flex-none bg-[#2E5A8A] text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                                    </div>
                                                    <span class="relative z-10">Simpan Jawaban</span>
                                                </button>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Enhanced Right Column - Question Navigation -->
            <div class="lg:w-4/12">
                <div
                    class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden border border-[#3A6EA5]/20 sticky top-24">
                    <!-- Enhanced Header -->
                    <div class="bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] p-6">
                        <h3 class="text-xl font-bold text-white flex items-center">
                            {{-- <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> --}}
                            Navigasi Soal
                        </h3>
                        <p class="text-white/80 text-sm mt-1">Klik nomor untuk berpindah soal</p>
                    </div>

                    <div class="p-6">
                        <!-- Enhanced Legend -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-6 text-xs">
                            <div class="flex items-center gap-2 p-2 bg-[#3A6EA5]/5 rounded-lg">
                                <div class="w-4 h-4 bg-[#3A6EA5] rounded-md shadow-sm"></div>
                                <span class="text-gray-700 font-medium">Aktif</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 bg-[#90BE6D]/5 rounded-lg">
                                <div class="w-4 h-4 bg-[#90BE6D] rounded-md shadow-sm"></div>
                                <span class="text-gray-700 font-medium">Terjawab</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-lg">
                                <div class="w-4 h-4 bg-gray-100 border-2 border-gray-300 rounded-md"></div>
                                <span class="text-gray-700 font-medium">Belum</span>
                            </div>
                        </div>

                        <!-- Enhanced Question Grid -->
                        <div
                            class="grid grid-cols-5 sm:grid-cols-6 md:grid-cols-8 gap-2 max-h-80 overflow-y-auto custom-scrollbar p-1">
                            @for ($i = 1; $i <= $totalQuestions; $i++)
                                @php
                                    $pageQuestion = $exam
                                        ->questionsA()
                                        ->skip($i - 1)
                                        ->first();
                                    $hasAnswer = $pageQuestion ? $pageQuestion->pivot->user_answer : null;
                                    $isMarked = $pageQuestion ? $pageQuestion->pivot->is_marked : false;

                                    if ($questions->currentPage() == $i) {
                                        $buttonClass =
                                            'bg-gradient-to-r from-[#3A6EA5] to-[#4A7EBA] text-white ring-4 ring-[#3A6EA5]/30 shadow-lg transform scale-110';
                                    } elseif ($isMarked) {
                                        $buttonClass =
                                            'bg-gradient-to-r from-yellow-100 to-yellow-200 border-2 border-yellow-400 text-yellow-800 hover:from-yellow-200 hover:to-yellow-300 shadow-md';
                                    } elseif ($hasAnswer) {
                                        $buttonClass =
                                            'bg-gradient-to-r from-[#90BE6D] to-[#7FA85C] hover:from-[#7FA85C] hover:to-[#6EA049] text-white shadow-md transform hover:scale-105';
                                    } else {
                                        $buttonClass =
                                            'bg-gradient-to-r from-gray-100 to-gray-200 hover:from-[#3A6EA5]/10 hover:to-[#90BE6D]/10 text-gray-700 hover:text-[#3A6EA5] border-2 border-gray-300 hover:border-[#3A6EA5]/30 hover:shadow-md transform hover:scale-105';
                                    }
                                @endphp
                                <a href="{{ route('asesi.sertifikasi.level.a.show', ['exam' => $exam, 'page' => $i]) }}"
                                    class="{{ $buttonClass }} font-bold h-10 w-full flex items-center justify-center rounded-lg transition-all duration-200 text-sm relative group"
                                    title="Soal {{ $i }}{{ $hasAnswer ? ' (Sudah dijawab)' : ' (Belum dijawab)' }}">
                                    {{ $i }}
                                    @if ($isMarked)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 absolute -top-1 -right-1"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endif
                                </a>
                            @endfor
                        </div>
                    </div>

                    <!-- Enhanced Exam Summary -->
                    <div class="bg-gradient-to-r from-[#3A6EA5]/5 to-[#90BE6D]/5 px-6 py-5 border-t border-[#3A6EA5]/20">
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div
                                class="bg-white p-4 rounded-xl shadow-lg border-2 border-[#3A6EA5]/20 transform hover:scale-105 transition-transform duration-200">
                                <div class="text-xs text-gray-500 font-medium mb-1">Total Soal</div>
                                <div class="text-2xl font-bold text-[#3A6EA5]">{{ $totalQuestions }}</div>
                            </div>
                            <div
                                class="bg-white p-4 rounded-xl shadow-lg border-2 border-[#90BE6D]/20 transform hover:scale-105 transition-transform duration-200">
                                <div class="text-xs text-gray-500 font-medium mb-1">Terjawab</div>
                                <div class="text-2xl font-bold text-[#90BE6D]">{{ $answeredQuestions }}</div>
                            </div>
                            <div
                                class="bg-white p-4 rounded-xl shadow-lg border-2 border-red-200 transform hover:scale-105 transition-transform duration-200">
                                <div class="text-xs text-gray-500 font-medium mb-1">Belum</div>
                                <div class="text-2xl font-bold text-red-600">{{ $totalQuestions - $answeredQuestions }}
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-4">
                            <div class="flex justify-between text-xs text-gray-600 mb-2">
                                <span>Progress</span>
                                <span>{{ round(($answeredQuestions / $totalQuestions) * 100) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-[#3A6EA5] to-[#90BE6D] h-full rounded-full transition-all duration-500 shadow-sm"
                                    style="width: {{ ($answeredQuestions / $totalQuestions) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Existing JavaScript - keeping all functionality intact
            function confirmFinish() {
                Swal.fire({
                    title: 'Konfirmasi Penyelesaian Ujian',
                    text: "Apakah Anda yakin ingin menyelesaikan ujian ini? Pastikan semua jawaban telah disimpan.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Selesaikan!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'space-y-4 rounded-2xl',
                        actions: 'flex gap-4 justify-center',
                        confirmButton: 'bg-gradient-to-r from-[#90BE6D] to-[#3A6EA5] hover:from-[#7FA85C] hover:to-[#2E5A8A] text-white font-semibold px-6 py-3 rounded-xl shadow-lg',
                        cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-3 rounded-xl shadow-lg'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('finishExamForm').submit();
                    }
                });
            }

            document.getElementById('mobileMenuBtn').addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobileMenu');
                mobileMenu.classList.toggle('hidden');
            });

            // Auto-submit form when answer is selected
            document.querySelectorAll('input[name="user_answer"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    // Add visual feedback
                    const label = this.closest('label');
                    label.classList.add('ring-2', 'ring-[#3A6EA5]', 'ring-opacity-50');

                    // Submit form after short delay for better UX
                    setTimeout(function() {
                        document.getElementById('answerForm').submit();
                    }, 300);
                });
            });

            // Keyboard navigation support
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prevBtn = document.querySelector('a[href*="page=' + ({{ $questions->currentPage() }} - 1) +
                        '"]');
                    if (prevBtn) prevBtn.click();
                } else if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                    e.preventDefault();
                    const nextBtn = document.querySelector('button[type="submit"]');
                    if (nextBtn && !nextBtn.disabled) nextBtn.click();
                } else if (e.key >= '1' && e.key <= '4') {
                    e.preventDefault();
                    const optionMap = {
                        '1': 'a',
                        '2': 'b',
                        '3': 'c',
                        '4': 'd'
                    };
                    const radio = document.getElementById('answer_' + optionMap[e.key]);
                    if (radio) radio.click();
                }
            });

            // Add smooth scrolling for question navigation
            document.querySelectorAll('a[href*="page="]').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    // Add loading state
                    this.classList.add('opacity-50', 'pointer-events-none');
                    this.innerHTML =
                        '<div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></div>';
                });
            });

            // Warn user before leaving page if they have unsaved changes
            let formChanged = false;
            document.querySelectorAll('input[name="user_answer"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    formChanged = true;
                });
            });

            window.addEventListener('beforeunload', function(e) {
                if (formChanged) {
                    e.preventDefault();
                    e.returnValue = 'Anda memiliki perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
                    return e.returnValue;
                }
            });

            // Reset form changed flag when form is submitted
            document.getElementById('answerForm').addEventListener('submit', function() {
                formChanged = false;
            });

            // Add visual feedback for question navigation hover
            document.querySelectorAll('.grid a[href*="page="]').forEach(function(link) {
                link.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.1)';
                });
                link.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('scale-110')) {
                        this.style.transform = 'scale(1)';
                    }
                });
            });

            // Custom scrollbar styling for question navigation
            const style = document.createElement('style');
            style.textContent = `
                .custom-scrollbar::-webkit-scrollbar {
                    width: 8px;
                }
                .custom-scrollbar::-webkit-scrollbar-track {
                    background: #f1f5f9;
                    border-radius: 4px;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb {
                    background: linear-gradient(to bottom, #3A6EA5, #90BE6D);
                    border-radius: 4px;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                    background: linear-gradient(to bottom, #2E5A8A, #7FA85C);
                }
            `;
            document.head.appendChild(style);

            // Add smooth transitions for all interactive elements
            document.querySelectorAll('button, a, input[type="radio"]').forEach(function(element) {
                element.style.transition = 'all 0.3s ease';
            });

            // Enhanced image zoom functionality
            document.querySelectorAll('img[onclick*="window.open"]').forEach(function(img) {
                img.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Create modal overlay
                    const overlay = document.createElement('div');
                    overlay.className =
                        'fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4';
                    overlay.style.animation = 'fadeIn 0.3s ease';

                    // Create modal content
                    const modal = document.createElement('div');
                    modal.className = 'relative max-w-5xl max-h-full';

                    const modalImg = document.createElement('img');
                    modalImg.src = this.src;
                    modalImg.className = 'max-w-full max-h-full object-contain rounded-lg shadow-2xl';
                    modalImg.style.animation = 'zoomIn 0.3s ease';

                    const closeBtn = document.createElement('button');
                    closeBtn.innerHTML = '×';
                    closeBtn.className =
                        'absolute -top-4 -right-4 bg-white text-black rounded-full w-10 h-10 flex items-center justify-center text-2xl font-bold shadow-lg hover:bg-gray-100 transition-colors';

                    modal.appendChild(modalImg);
                    modal.appendChild(closeBtn);
                    overlay.appendChild(modal);
                    document.body.appendChild(overlay);

                    // Close modal handlers
                    closeBtn.addEventListener('click', closeModal);
                    overlay.addEventListener('click', function(e) {
                        if (e.target === overlay) closeModal();
                    });

                    function closeModal() {
                        overlay.style.animation = 'fadeOut 0.3s ease';
                        setTimeout(() => overlay.remove(), 300);
                    }

                    // Add CSS animations
                    if (!document.querySelector('#modalAnimations')) {
                        const animationStyle = document.createElement('style');
                        animationStyle.id = 'modalAnimations';
                        animationStyle.textContent = `
                            @keyframes fadeIn {
                                from { opacity: 0; }
                                to { opacity: 1; }
                            }
                            @keyframes fadeOut {
                                from { opacity: 1; }
                                to { opacity: 0; }
                            }
                            @keyframes zoomIn {
                                from { transform: scale(0.8); opacity: 0; }
                                to { transform: scale(1); opacity: 1; }
                            }
                        `;
                        document.head.appendChild(animationStyle);
                    }
                });
            });

            // Add tooltips for navigation buttons
            document.querySelectorAll('[title]').forEach(function(element) {
                element.addEventListener('mouseenter', function(e) {
                    const tooltip = document.createElement('div');
                    tooltip.className =
                        'absolute z-50 px-2 py-1 text-xs text-white bg-gray-800 rounded shadow-lg pointer-events-none';
                    tooltip.textContent = this.getAttribute('title');
                    tooltip.style.top = (e.pageY - 30) + 'px';
                    tooltip.style.left = (e.pageX - tooltip.offsetWidth / 2) + 'px';
                    document.body.appendChild(tooltip);

                    this.addEventListener('mouseleave', function() {
                        tooltip.remove();
                    });
                });
            });

            // Progress animation on page load
            window.addEventListener('load', function() {
                const progressBar = document.querySelector('.bg-gradient-to-r.from-\\[\\#3A6EA5\\].to-\\[\\#90BE6D\\]');
                if (progressBar) {
                    progressBar.style.width = '0%';
                    setTimeout(() => {
                        progressBar.style.width = '{{ ($answeredQuestions / $totalQuestions) * 100 }}%';
                    }, 500);
                }
            });

            // Add focus management for accessibility
            document.addEventListener('DOMContentLoaded', function() {
                // Focus first unanswered question radio button
                const firstUnanswered = document.querySelector('input[name="user_answer"]:not(:checked)');
                if (firstUnanswered) {
                    firstUnanswered.focus();
                }

                // Announce current question to screen readers
                const questionNumber = {{ $questions->currentPage() }};
                const totalQuestions = {{ $totalQuestions }};
                const announcement = document.createElement('div');
                announcement.setAttribute('aria-live', 'polite');
                announcement.setAttribute('aria-atomic', 'true');
                announcement.className = 'sr-only';
                announcement.textContent = `Pertanyaan ${questionNumber} dari ${totalQuestions}`;
                document.body.appendChild(announcement);
            });
        </script>
    @endpush
@endsection
