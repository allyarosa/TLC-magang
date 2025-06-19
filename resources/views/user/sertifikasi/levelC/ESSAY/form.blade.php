@extends('layouts.exam')

@section('title', 'Pengerjaan Level C - Essay')

@section('content')
<div class="min-h-screen bg-slate-50 font-sans text-slate-800">
    <div class="container mx-auto max-w-5xl p-3 py-6 sm:p-4 sm:py-8 lg:p-12">
        <div class="bg-white rounded-xl shadow-lg border border-slate-200">
            <div class="p-4 sm:p-6 md:p-8">
                <div class="text-center mb-6 sm:mb-8">
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                        Jawaban Essay
                    </h1>
                    <p class="text-sm sm:text-base text-gray-600">
                        Silakan jawab pertanyaan essay berikut dengan lengkap dan mendalam
                    </p>
                </div>

                {{-- Tampilkan pesan error umum --}}
                {{-- @if ($errors->any())
                    <div class="mb-6 p-3 sm:p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <strong class="font-semibold">Terjadi kesalahan:</strong>
                                <ul class="mt-2 list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif --}}

                <form id="essayForm" action="" method="POST" class="space-y-6">
                    @csrf
                    
                    {{-- Timer Display --}}
                    <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-indigo-700">Waktu Tersisa:</span>
                        </div>
                        <div id="timer" class="text-lg font-bold text-indigo-800">120:00</div>
                    </div>

                    {{-- Questions Section --}}
                    <div class="space-y-8">
                        {{-- @foreach($questions as $index => $question) --}}
                        <div class="border border-slate-200 rounded-xl p-4 sm:p-5 shadow-sm">
                            <div class="flex items-start mb-3">
                                <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-indigo-100 text-indigo-800 font-medium text-sm mr-3">
                                    {{-- {{ $index + 1 }} --}}1
                                </span>
                                <h3 class="text-base sm:text-lg font-semibold text-slate-800"></h3>
                            </div>
                            
                            <div class="pl-9">
                                <div class="space-y-2">
                                    <label for="" class="block text-sm font-medium text-slate-700">
                                        Jawaban Anda
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="" name="" rows="6" required
                                        class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base text-slate-700 bg-white border border-slate-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none hover:border-slate-400 transition-colors duration-200 resize-none"
                                        placeholder="Tulis jawaban Anda disini (minimal 200 kata)..."></textarea>
                                    <div class="flex justify-between items-center">
                                        <p class="text-xs text-slate-500">
                                            Minimal 200 kata
                                        </p>
                                        <p id="" class="text-xs text-slate-500">
                                            0/200 kata
                                        </p>
                                    </div>
                                    {{-- @error('answers.'.$index)
                                        <p class="text-red-500 text-sm mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                        <button type="button" onclick="window.history.back()"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-slate-700 bg-slate-100 border border-slate-300 rounded-lg shadow-sm hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-slate-500 transition-all duration-200">
                            Kembali
                        </button>
                        <button type="button" id="saveDraftBtn"
                            class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-white bg-amber-500 hover:bg-amber-600 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-amber-500 transition-all duration-200">
                            Simpan Draft
                        </button>
                        <button type="submit"
                            class="w-full sm:flex-1 px-4 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                            <span class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Kirim Jawaban
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-sm w-full mx-4 transform transition-all">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-indigo-100 rounded-full">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 text-center mb-2">
                Konfirmasi Pengumpulan
            </h3>
            <p class="text-sm text-slate-600 text-center mb-6">
                Apakah Anda yakin ingin mengumpulkan jawaban essay ini? Pastikan semua jawaban sudah lengkap dan sesuai dengan pertanyaan.
            </p>
            <div class="flex gap-3">
                <button id="cancelBtn" type="button"
                    class="flex-1 px-4 py-2 text-sm font-medium text-slate-700 bg-slate-100 border border-slate-300 rounded-lg hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-slate-500 transition-colors">
                    Batal
                </button>
                <button id="confirmBtn" type="button"
                    class="flex-1 px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors">
                    Ya, Kirim
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('essayForm');
    const modal = document.getElementById('confirmModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmBtn = document.getElementById('confirmBtn');
    const saveDraftBtn = document.getElementById('saveDraftBtn');
    
    // Timer functionality
    let timeLeft = 120 * 60; // 120 minutes in seconds
    const timerElement = document.getElementById('timer');
    
    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            alert('Waktu pengerjaan telah habis! Jawaban akan otomatis dikirim.');
            form.submit();
        } else {
            timeLeft--;
        }
    }
    
    const timerInterval = setInterval(updateTimer, 1000);
    updateTimer(); // Initial call
    
    // Word count functionality
    document.querySelectorAll('textarea').forEach((textarea, index) => {
        textarea.addEventListener('input', function() {
            const wordCount = this.value.trim() ? this.value.trim().split(/\s+/).length : 0;
            document.getElementById(`wordCount_${index}`).textContent = `${wordCount}/200 kata`;
        });
    });
    
    // Save draft functionality
    saveDraftBtn.addEventListener('click', function() {
        // In a real application, this would save to local storage or send to server
        alert('Draft jawaban berhasil disimpan! Anda dapat melanjutkan nanti.');
    });
    
    // Prevent default form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate all answers have at least 200 words
        let allValid = true;
        document.querySelectorAll('textarea').forEach((textarea, index) => {
            const wordCount = textarea.value.trim() ? textarea.value.trim().split(/\s+/).length : 0;
            if (wordCount < 200) {
                allValid = false;
                const wordCountElement = document.getElementById(`wordCount_${index}`);
                wordCountElement.classList.add('text-red-500');
                wordCountElement.classList.remove('text-slate-500');
            }
        });
        
        if (!allValid) {
            alert('Mohon lengkapi semua jawaban dengan minimal 200 kata per soal!');
            return;
        }
        
        // Show confirmation modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    });
    
    // Cancel button
    cancelBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    });
    
    // Confirm button
    confirmBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <span class="flex items-center justify-center">
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Mengirim...
            </span>
        `;
        
        // Submit form
        form.submit();
    });
    
    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            cancelBtn.click();
        }
    });
});
</script>
@endsection