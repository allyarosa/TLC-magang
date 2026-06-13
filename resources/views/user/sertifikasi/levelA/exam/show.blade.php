@extends('layouts.exam')

@section('content')
    <!-- Enhanced Navbar with Glass Effect -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-[#1D4E89] to-brandGreen/95 backdrop-blur-md shadow-sm border-b border-gray-200">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Left section - Logo and Category -->
                <div class="flex items-center space-x-4">
                    <!-- Enhanced Logo -->
                    <div class="flex-shrink-0 flex items-center group">
                        <img class="h-9 w-auto transition-transform duration-300 group-hover:scale-105"
                            src="{{ asset('images/logoTlcPng.png') }}" alt="TLC Logo">
                        <span class="ml-3 text-lg font-black text-white tracking-tight hidden sm:block">TLC Exam</span>
                    </div>

                    <!-- Enhanced Category Badge -->
                    <div class="hidden md:block border-l border-gray-200 pl-4">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-md text-sm font-semibold bg-white text-brandBlue">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            Level A - {{ $category->name ?? 'Kategori' }}
                        </span>
                    </div>
                </div>

                <!-- Timer Section -->
                <div class="flex items-center justify-center">
                    <div class="bg-gray-50 rounded-lg px-4 py-1.5 border border-gray-200 shadow-sm flex items-center gap-2 ">
                        <svg class="w-6 h-6 text-[#3A6EA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Durasi Pengerjaan"
                            title="Durasi Pengerjaan">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 2h4m-2 4V3m5.657 3.343l1.414-1.414M18 10a6 6 0 11-12 0 6 6 0 0112 0zm-6-3v3l2 2">
                            </path>
                        </svg>
                        <div class="font-mono font-bold text-gray-800 text-lg tracking-wider">
                            @livewire('count-down-timer', ['endTime' => $endTime, 'examId' => $exam->id])
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Mobile dropdown -->
            <div id="mobileMenu" class="md:hidden hidden border-t border-gray-100 py-2 bg-gray-50">
                <div class="flex items-center justify-center space-x-2">
                    <span class="text-sm text-gray-500 font-medium">Kategori:</span>
                    <span class="px-2 py-0.5 bg-[#3A6EA5]/10 text-[#3A6EA5] text-xs font-bold rounded">
                        Level A - {{ $category->name ?? 'Tidak ada Kategori' }}
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="min-h-screen py-6 bg-blue-100/70 pt-[5.5rem]">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- Left Column - Question Content -->
                <div class="lg:col-span-9">
                    @if ($questions->count() > 0)
                        @php
                            $question = $questions->first();
                            $userAnswer =
                                $exam->questionsA()->where('questions_a.id', $question->id)->first()->pivot
                                    ->user_answer ?? null;
                        @endphp

                        <!-- Clean Question Card -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-6">

                            <!-- Question Header Minimalist -->
                            <div class="border-b border-gray-100 bg-white px-6 py-4 flex justify-between items-center">
                                <h3 class="flex items-center gap-3">
                                    <span
                                        class="bg-gray-100 text-gray-600 rounded-lg h-9 w-9 flex items-center justify-center font-bold text-sm border border-gray-200">
                                        {{ $questions->currentPage() }}
                                    </span>
                                    <span
                                        class="text-sm font-bold text-gray-600 uppercase tracking-widest">Pertanyaan</span>
                                </h3>
                                <div
                                    class="text-xs font-semibold text-gray-400 bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                                    {{ $questions->currentPage() }} / {{ $totalQuestions }}
                                </div>
                            </div>
                            <!-- Minimalist Progress Bar -->
                            <div class="h-1 w-full bg-gray-100">
                                <div class="h-full bg-[#3A6EA5] transition-all duration-300"
                                    style="width: {{ ($questions->currentPage() / $totalQuestions) * 100 }}%"></div>
                            </div>

                            <!-- Question Content -->
                            <div class="p-6 md:p-8">
                                <div
                                    class="prose prose-lg max-w-none text-gray-800 font-medium leading-relaxed mb-8 text-[1.1rem]">
                                    <p class="select-none m-0">
                                        {!! $question->question_text !!}
                                    </p>
                                </div>

                                @if ($question->image)
                                    <div class="mb-8 flex justify-center">
                                        <div
                                            class="relative group max-w-xl mx-auto border border-gray-200 rounded-xl p-2 bg-gray-50">
                                            <img src="{{ asset('/storage/' . $question->image) }}" alt="Gambar Soal"
                                                class="w-full h-auto rounded-lg shadow-sm cursor-zoom-in hover:opacity-95 transition-opacity"
                                                onclick="window.open(this.src, '_blank')">
                                            <div
                                                class="absolute inset-x-0 bottom-3 flex justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                                <span
                                                    class="bg-black/70 text-white text-xs px-3 py-1.5 rounded-full flex items-center gap-1.5 backdrop-blur-sm">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                                        </path>
                                                    </svg>
                                                    Klik untuk perbesar
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Clean Answer Options -->
                                <form action="{{ route('asesi.sertifikasi.level.a.answer', $exam) }}" method="POST"
                                    id="answerForm">
                                    @csrf
                                    <input type="hidden" name="question_a_id" value="{{ $question->id }}">

                                    <div class="space-y-3 mb-10">
                                        @php
                                            $options = [
                                                'a' => $question->option_a,
                                                'b' => $question->option_b,
                                                'c' => $question->option_c,
                                                'd' => $question->option_d,
                                                'e' => $question->option_e,
                                            ];
                                        @endphp

                                        @foreach ($options as $key => $option)
                                            @if ($option)
                                                <div>
                                                    <input type="radio" name="user_answer"
                                                        id="answer_{{ $key }}" value="{{ $key }}"
                                                        {{ $userAnswer == $key ? 'checked' : '' }} class="peer hidden">
                                                    <label for="answer_{{ $key }}"
                                                        class="flex items-start gap-4 p-4 border border-gray-200 rounded-xl cursor-pointer bg-white
                                                        hover:bg-gray-50 hover:border-gray-300 transition-all duration-200
                                                        peer-checked:border-[#3A6EA5] peer-checked:bg-[#3A6EA5]/8 peer-checked:shadow-sm peer-checked:ring-2 peer-checked:ring-[#3A6EA5]/20
                                                        peer-checked:[&_.option-circle]:bg-[#3A6EA5] peer-checked:[&_.option-circle]:border-[#3A6EA5] peer-checked:[&_.option-circle]:scale-110 peer-checked:[&_.option-circle]:ring-4 peer-checked:[&_.option-circle]:ring-[#3A6EA5]/20
                                                        peer-checked:[&_.option-dot]:scale-100
                                                        peer-checked:[&_.option-letter]:text-[#3A6EA5]
                                                        peer-checked:[&_.option-text]:text-gray-900">

                                                        <div
                                                            class="option-circle mt-0.5 w-6 h-6 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition-all duration-200
                                                            {{ $userAnswer == $key ? 'bg-[#3A6EA5] border-[#3A6EA5] scale-110 ring-4 ring-[#3A6EA5]/20' : 'bg-white border-gray-300' }}">
                                                            <div class="option-dot w-2 h-2 rounded-full bg-white transition-transform duration-200 {{ $userAnswer == $key ? 'scale-100' : 'scale-0' }}"></div>
                                                        </div>

                                                        <div class="flex-grow">
                                                            <div class="flex items-baseline gap-2">
                                                                <span
                                                                    class="option-letter font-bold text-gray-400 text-sm select-none transition-colors duration-200
                                                                    {{ $userAnswer == $key ? 'text-[#3A6EA5]' : '' }}">{{ strtoupper($key) }}.</span>
                                                                <span
                                                                    class="option-text text-gray-700 font-medium select-none leading-snug transition-colors duration-200
                                                                    {{ $userAnswer == $key ? 'text-gray-900' : '' }}">{{ $option }}</span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <!-- Navigation Buttons Inside Card -->
                                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                                        <div class="flex-1">
                                            @if ($questions->currentPage() > 1)
                                                <a href="{{ $questions->previousPageUrl() }}"
                                                    class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-100 transition-all">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                                    </svg>
                                                    Sebelumnya
                                                </a>
                                            @endif
                                        </div>

                                        <div class="flex-1 flex justify-end">
                                            @if ($questions->currentPage() < $totalQuestions)
                                                <input type="hidden" name="next_question"
                                                    value="{{ $questions->currentPage() + 1 }}">
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-white bg-[#3A6EA5] rounded-lg hover:bg-[#2E5A8A] focus:outline-none focus:ring-4 focus:ring-[#3A6EA5]/30 transition-all shadow-sm">
                                                    Selanjutnya
                                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                    </svg>
                                                </button>
                                            @else
                                                <input type="hidden" name="next_question"
                                                    value="{{ $questions->currentPage() }}">
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 transition-all">
                                                    Simpan Jawaban
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Column - Sidebar Nav & Submit -->
                <div class="lg:col-span-3 space-y-6">
                    <!-- Clean Sidebar Navigation -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden lg:sticky lg:top-24">
                        <div class="border-b border-gray-100 p-5 bg-gray-50/50">
                            <h3 class="font-bold text-gray-800 text-lg">Navigasi Soal</h3>
                        </div>

                        <div class="p-5">
                            <!-- Clean Legend -->
                            <div class="flex flex-wrap gap-4 mb-6 justify-center text-xs font-semibold text-gray-500">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-3.5 h-3.5 bg-[#3A6EA5] rounded border border-[#3A6EA5]"></div>
                                    <span>Aktif</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <div
                                        class="w-3.5 h-3.5 bg-[#3A6EA5]/10 border border-[#3A6EA5]/30 rounded text-[#3A6EA5]">
                                    </div>
                                    <span>Terjawab</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <div class="w-3.5 h-3.5 bg-white border border-gray-300 rounded"></div>
                                    <span>Belum</span>
                                </div>
                            </div>

                            <!-- Keypad Grid -->
                            <div class="grid grid-cols-5 gap-2 max-h-[22rem] overflow-y-auto px-1 pb-1 custom-scrollbar">
                                @for ($i = 1; $i <= $totalQuestions; $i++)
                                    @php
                                        $pageQuestion = $exam
                                            ->questionsA()
                                            ->skip($i - 1)
                                            ->first();
                                        $hasAnswer = $pageQuestion ? $pageQuestion->pivot->user_answer : null;

                                        // Styling rules for keys
                                        if ($questions->currentPage() == $i) {
                                            $btnClass =
                                                'bg-[#3A6EA5] text-white border border-[#3A6EA5] shadow-md ring-2 ring-[#3A6EA5]/20 font-bold z-10';
                                        } elseif ($hasAnswer) {
                                            $btnClass =
                                                'bg-[#3A6EA5]/10 text-[#3A6EA5] border border-[#3A6EA5]/30 hover:bg-[#3A6EA5]/20 font-semibold';
                                        } else {
                                            $btnClass =
                                                'bg-white text-gray-600 border border-gray-200 hover:border-gray-400 hover:bg-gray-50 font-medium';
                                        }
                                    @endphp
                                    <a href="{{ route('asesi.sertifikasi.level.a.show', ['exam' => $exam, 'page' => $i]) }}"
                                        class="{{ $btnClass }} h-10 w-full flex items-center justify-center rounded-lg text-sm transition-all relative focus:outline-none"
                                        title="Soal {{ $i }}">
                                        {{ $i }}
                                    </a>
                                @endfor
                            </div>
                        </div>

                        <!-- Progress Summary inside Sidebar -->
                        <div class="bg-gray-50 p-5 border-t border-gray-100">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-gray-500">Progress</span>
                                <span class="text-sm font-bold text-gray-700">{{ $answeredQuestions }} /
                                    {{ $totalQuestions }} Terjawab</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-brandGreen-dark h-full rounded-full transition-all duration-300"
                                    style="width: {{ ($answeredQuestions / $totalQuestions) * 100 }}%"></div>
                            </div>
                        </div>

                        <!-- Final Submit Button placed clearly at bottom of sidebar -->
                        @if ($answeredQuestions == $totalQuestions)
                            <div class="p-5 border-t border-gray-100 bg-white">
                                <form action="{{ route('asesi.sertifikasi.level.a.finish', $exam) }}" method="POST"
                                    id="finishExamForm">
                                    @csrf
                                    <button type="button" onclick="confirmFinish()"
                                        class="w-full flex items-center justify-center gap-2 bg-brandGreen hover:bg-brandGreen-dark text-white font-bold py-3.5 px-4 rounded-xl shadow-sm shadow-[#90BE6D]/30 transition-colors focus:ring-4 focus:ring-[#90BE6D]/30">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Selesaikan Ujian
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="p-5 border-t border-gray-100 bg-white">
                                <button type="button" disabled
                                    class="w-full flex items-center justify-center gap-2 bg-gray-100 text-gray-400 font-bold py-3.5 px-4 rounded-xl border border-gray-200 cursor-not-allowed">
                                    Selesaikan Ujian
                                </button>
                                <p class="text-center text-xs text-gray-400 mt-2">Jawab semua soal terlebih dahulu.</p>
                            </div>
                        @endif
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
                        cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-3 rounded-xl shadow-lg',
                        confirmButton: 'bg-[#3A6EA5] hover:from-[#7FA85C] hover:to-[#2E5A8A] text-white font-semibold px-6 py-3 rounded-xl shadow-lg',
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
                    // Update all option circles
                    document.querySelectorAll('input[name="user_answer"]').forEach(function(r) {
                        const label = r.nextElementSibling;
                        if (!label) return;
                        
                        const circle = label.querySelector('.option-circle');
                        const dot = label.querySelector('.option-dot');
                        const letter = label.querySelector('.option-letter');
                        const text = label.querySelector('.option-text');
                        
                        if (r.checked) {
                            circle.classList.add('bg-[#3A6EA5]', 'border-[#3A6EA5]', 'scale-110', 'ring-4', 'ring-[#3A6EA5]/20');
                            circle.classList.remove('bg-white', 'border-gray-300');
                            if (dot) {
                                dot.classList.add('scale-100');
                                dot.classList.remove('scale-0');
                            }
                            if (letter) {
                                letter.classList.add('text-[#3A6EA5]');
                                letter.classList.remove('text-gray-400');
                            }
                            if (text) {
                                text.classList.add('text-gray-900');
                                text.classList.remove('text-gray-700');
                            }
                        } else {
                            circle.classList.remove('bg-[#3A6EA5]', 'border-[#3A6EA5]', 'scale-110', 'ring-4', 'ring-[#3A6EA5]/20');
                            circle.classList.add('bg-white', 'border-gray-300');
                            if (dot) {
                                dot.classList.add('scale-0');
                                dot.classList.remove('scale-100');
                            }
                            if (letter) {
                                letter.classList.add('text-gray-400');
                                letter.classList.remove('text-[#3A6EA5]');
                            }
                            if (text) {
                                text.classList.add('text-gray-700');
                                text.classList.remove('text-gray-900');
                            }
                        }
                    });
                    
                    // Add visual feedback ring to selected label
                    const selectedLabel = this.nextElementSibling;
                    if (selectedLabel) {
                        selectedLabel.classList.add('ring-2', 'ring-[#3A6EA5]', 'ring-opacity-50');
                    }

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
                        '4': 'd',
                        '5': 'e'
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
