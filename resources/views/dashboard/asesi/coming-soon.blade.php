@extends('layouts.asesiDashboard')
@section('title', 'Fitur Segera Hadir - TLC Program')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center bg-gray-50/50 relative overflow-hidden py-20 mt-16 lg:mt-0">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-300/20 rounded-full blur-3xl mix-blend-multiply animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-300/20 rounded-full blur-3xl mix-blend-multiply animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center flex flex-col items-center justify-center mt-8">
        <!-- Floating Icon -->
        <div class="mb-12 relative">
            <div class="absolute inset-0 bg-[#E76F51]/20 blur-xl rounded-full animate-pulse"></div>
            <div class="w-24 h-24 sm:w-32 sm:h-32 bg-white rounded-full shadow-2xl border border-white/50 flex items-center justify-center relative animate-float">
                <svg class="w-12 h-12 sm:w-16 sm:h-16 text-[#1D4E89]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
                <div class="absolute -bottom-2 -right-2 bg-[#E76F51] text-white p-2 sm:p-3 rounded-full shadow-lg border-2 border-white animate-bounce-subtle">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-black text-[#1D4E89] mb-6 tracking-tight drop-shadow-sm">
            Sedang Dalam Pengerjaan
        </h1>
        
        <p class="text-lg sm:text-xl text-gray-600 mb-10 max-w-2xl mx-auto font-medium leading-relaxed px-4">
            Kami sedang merancang sesuatu yang luar biasa untuk pengalaman belajar Anda. Fitur ini akan segera hadir dengan pembaruan yang menakjubkan!
        </p>

        <!-- Feature Badges -->
        {{-- <div class="flex flex-wrap justify-center gap-4 mb-12">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-white border border-blue-100 shadow-sm text-sm font-semibold text-blue-800 backdrop-blur-sm hover:-translate-y-1 transition-transform cursor-default">
                <span class="w-2 h-2 rounded-full bg-blue-500 mr-2 animate-pulse"></span>
                Inovasi Baru
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-white border border-orange-100 shadow-sm text-sm font-semibold text-orange-800 backdrop-blur-sm hover:-translate-y-1 transition-transform cursor-default">
                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2 animate-pulse" style="animation-delay: 0.5s;"></span>
                Peningkatan Sistem
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-white border border-emerald-100 shadow-sm text-sm font-semibold text-emerald-800 backdrop-blur-sm hover:-translate-y-1 transition-transform cursor-default">
                <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-pulse" style="animation-delay: 1s;"></span>
                Tampilan Lebih Segar
            </span>
        </div> --}}

        <!-- Call to Action -->
        <div class="flex flex-col sm:flex-row gap-4 items-center justify-center w-full sm:w-auto">
            <a href="{{ route('asesi.dashboard') }}" class="w-full sm:w-auto group relative inline-flex items-center justify-center px-8 py-3.5 text-base font-bold text-white transition-all duration-300 bg-brandBlue-dark rounded-xl shadow-lg hover:shadow-blue-500/40 hover:-translate-y-1 overflow-hidden">
                <span class="absolute inset-0 w-full h-full bg-white/20 group-hover:scale-105 transition-transform duration-300 rounded-xl"></span>
                Kembali ke Beranda
            </a>
            
            {{-- <a href="{{ route('asesi.sertifikasi') }}" class="w-full sm:w-auto group inline-flex items-center justify-center px-8 py-3.5 text-base font-bold text-[#1D4E89] transition-all duration-300 bg-white border-2 border-[#1D4E89]/20 rounded-xl hover:bg-[#1D4E89]/5 hover:border-[#1D4E89]/40 hover:-translate-y-1 shadow-sm hover:shadow-md">
                Lihat Sertifikasi Anda
            </a> --}}
        </div>
    </div>
</div>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(1.05); }
    }
    
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    .animate-float {
        animation: float 5s ease-in-out infinite;
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 6s ease-in-out infinite;
    }
    
    .animate-bounce-subtle {
        animation: bounce-subtle 2s ease-in-out infinite;
    }
</style>
@endsection
