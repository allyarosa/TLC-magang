@extends('layouts.exam')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="mb-6">
                <div class="mx-auto w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Ujian Selesai!</h1>
                <p class="text-gray-600">Terima kasih telah mengerjakan ujian essay</p>
            </div>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <h2 class="text-lg font-semibold text-blue-900 mb-2">Informasi Ujian</h2>
                <div class="space-y-2 text-sm text-blue-800">
                    <p>✓ Semua jawaban telah tersimpan</p>
                    <p>✓ Ujian diselesaikan pada {{ now()->format('d/m/Y H:i') }}</p>
                    <p>✓ Jawaban akan dinilai oleh asesor</p>
                    <p>✓ Hasil penilaian akan diumumkan kemudian</p>
                </div>
            </div>
            
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
                <p class="text-gray-700">
                    <strong>Catatan:</strong> Ujian Anda telah berhasil diselesaikan dan dikirim untuk penilaian. 
                    Silakan tunggu hasil penilaian dari asesor.
                </p>
            </div>
            
            <div class="space-y-4">
                <a href="{{ route('home') }}" 
                   class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection