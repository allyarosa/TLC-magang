@extends('layouts.exam')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Essay Exam</h1>
                <p class="text-gray-600">Ujian Essay - 8 Soal</p>
            </div>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold text-blue-900 mb-4">Informasi Ujian</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ $totalQuestions }}</div>
                        <div class="text-sm text-gray-600">Total Soal</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600">{{ $answeredQuestions }}</div>
                        <div class="text-sm text-gray-600">Soal Terjawab</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-600">{{ $totalQuestions - $answeredQuestions }}</div>
                        <div class="text-sm text-gray-600">Soal Tersisa</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <h3 class="font-semibold text-yellow-800 mb-2">Petunjuk Pengerjaan:</h3>
                <ul class="text-sm text-yellow-700 space-y-1">
                    <li>• Jawab semua soal dengan lengkap dan jelas</li>
                    <li>• Setiap halaman berisi 1 soal</li>
                    <li>• Anda dapat menjawab soal secara berurutan</li>
                    <li>• Pastikan jawaban Anda sudah tersimpan sebelum pindah ke soal berikutnya</li>
                </ul>
            </div>
            
            <div class="text-center">
                <a href="{{ route('exam.question', 1) }}" 
                   class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                    Mulai Ujian
                </a>
            </div>
        </div>
    </div>
</div>
@endsection