@extends('layouts.asesiDashboard')
@section('title', 'Fitur Segera Hadir - TLC Program')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center bg-gray-50 py-20 mt-16 lg:mt-0">
    <div class="container mx-auto px-6 text-center">
        <!-- Icon Sederhana -->
        <div class="mb-8">
            <div class="w-20 h-20 mx-auto bg-white rounded-full shadow-md flex items-center justify-center">
                <svg class="w-10 h-10 text-[#1D4E89]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
            </div>
        </div>

        <!-- Teks -->
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4">
            Segera Hadir
        </h1>
        
        <p class="text-base text-gray-500 mb-8 max-w-md mx-auto">
            Fitur ini sedang dalam pengembangan. Kami akan memberikan pengalaman terbaik untuk Anda.
        </p>

        <!-- Tombol -->
        <a href="{{ route('asesi.dashboard') }}" class="inline-block px-6 py-2.5 text-sm font-semibold text-white bg-[#1D4E89] rounded-lg hover:bg-[#163d68] transition-colors shadow-sm">
            Kembali
        </a>
    </div>
</div>
@endsection