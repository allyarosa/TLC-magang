@extends('layouts.exam')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg">
            <!-- Header -->
            <div class="bg-blue-600 text-white p-6 rounded-t-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-semibold">{{ $question->title }}</h1>
                    <span class="bg-blue-500 px-3 py-1 rounded-full text-sm">
                        Soal {{ $currentQuestion }} dari {{ $totalQuestions }}
                    </span>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="px-6 py-4 bg-gray-50 border-b">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600">Progress</span>
                    <span class="text-sm font-medium">{{ round(($currentQuestion / $totalQuestions) * 100) }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ ($currentQuestion / $totalQuestions) * 100 }}%"></div>
                </div>
            </div>
            
            <!-- Question Content -->
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Soal:</h2>
                    <div class="bg-gray-50 p-4 rounded-lg border">
                        <p class="text-gray-800 leading-relaxed">{{ $question->question }}</p>
                    </div>
                </div>
                
                <!-- Answer Form -->
                <form method="POST" action="{{ route('exam.store', $currentQuestion) }}">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jawaban Anda:
                        </label>
                        <textarea 
                            name="answer" 
                            rows="10" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Tulis jawaban Anda di sini..."
                            required>{{ $userAnswer->answer ?? '' }}</textarea>
                        @error('answer')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Navigation Buttons -->
                    <div class="flex justify-between items-center">
                        <div>
                            @if($currentQuestion > 1)
                                <a href="{{ route('exam.question', Vinkla\Hashids\Facades\Hashids::encode($currentQuestion - 1)) }}" 
                                   class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                                    ← Sebelumnya
                                </a>
                            @endif
                        </div>
                        
                        <div class="flex gap-3">
                            <button type="submit" 
                                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                                @if($currentQuestion == $totalQuestions)
                                    Simpan & Selesai
                                @else
                                    Simpan & Lanjut →
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection