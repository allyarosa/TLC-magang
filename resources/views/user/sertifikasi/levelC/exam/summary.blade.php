@extends('layouts.exam')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Ringkasan Jawaban</h1>
                    <p class="text-gray-600">Periksa kembali jawaban Anda sebelum menyelesaikan ujian</p>
                </div>

                <!-- Status Overview -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $totalQuestions }}</div>
                            <div class="text-sm text-gray-600">Total Soal</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $answeredQuestions }}</div>
                            <div class="text-sm text-gray-600">Terjawab</div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-2xl font-bold text-{{ $answeredQuestions == $totalQuestions ? 'green' : 'red' }}-600">
                                {{ $answeredQuestions == $totalQuestions ? 'Lengkap' : 'Belum Lengkap' }}
                            </div>
                            <div class="text-sm text-gray-600">Status</div>
                        </div>
                    </div>
                </div>

                <!-- Questions Summary -->
                <div class="space-y-6 mb-8">
                    @foreach ($questions as $index => $question)
                        <div
                            class="border rounded-lg p-6 {{ isset($userAnswers[$question->id]) ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200' }}">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Soal {{ $index + 1 }}: {{ $question->title }}
                                </h3>
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-medium {{ isset($userAnswers[$question->id]) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ isset($userAnswers[$question->id]) ? 'Terjawab' : 'Belum Dijawab' }}
                                </span>
                            </div>

                            <div class="text-gray-700 mb-4">
                                <strong>Pertanyaan:</strong> {{ $question->question }}
                            </div>

                            @if (isset($userAnswers[$question->id]))
                                <div class="bg-white p-4 rounded border">
                                    <strong class="text-gray-700">Jawaban Anda:</strong>
                                    <div class="mt-2 text-gray-800">
                                        {{ Str::limit($userAnswers[$question->id]->answer, 200) }}
                                    </div>
                                </div>
                            @endif

                            <div class="mt-4">
                                <a href="{{ route('exam.question', Vinkla\Hashids\Facades\Hashids::encode($index + 1)) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                    {{ isset($userAnswers[$question->id]) ? 'Edit Jawaban' : 'Jawab Sekarang' }} →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center gap-4">
                    @if ($answeredQuestions < $totalQuestions)
                        <div class="text-center">
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                                <p class="text-yellow-800 font-medium">
                                    Masih ada {{ $totalQuestions - $answeredQuestions }} soal yang belum dijawab
                                </p>
                            </div>
                            <a href="{{ route('exam.question', Vinkla\Hashids\Facades\Hashids::encode(1)) }}"
                                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                                Lanjutkan Mengerjakan
                            </a>
                        </div>
                    @else
                        <div class="text-center">
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                                <p class="text-green-800 font-medium">
                                    Semua soal sudah dijawab! Klik tombol di bawah untuk menyelesaikan ujian.
                                </p>
                            </div>
                            <form method="POST" action="{{ route('exam.complete') }}">
                                @csrf
                                <button type="submit"
                                    class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition duration-200 font-semibold">
                                    Selesaikan Ujian
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
