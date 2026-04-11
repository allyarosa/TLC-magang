@extends('layouts.asesiDashboard')
@section('title', 'Dashboard | Teaching & Learning Certification')

@section('content')
@php
    use Vinkla\Hashids\Facades\Hashids;
    $user = Auth::user();
    $firstName = explode(' ', $user->name)[0];
@endphp

{{-- Modal Berhasil Verifikasi Email --}}
<x-verify-email-popup />

<div class="bg-gray-50 min-h-screen">

    {{-- ================================================================ --}}
    {{-- SECTION 1: WELCOME HERO                                          --}}
    {{-- ================================================================ --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-[#0C3B6E] via-[#1D4E89] to-[#063B67] pt-10 pb-28">
        {{-- Background decorations --}}
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute -top-10 -right-10 w-72 h-72 bg-white/5 rounded-full"></div>
            <div class="absolute top-20 right-1/4 w-4 h-4 bg-orange-400/40 rounded-full animate-ping" style="animation-delay:1s"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 bg-blue-400/10 rounded-full"></div>
            <div class="absolute top-10 left-1/3 w-2 h-2 bg-yellow-300/50 rounded-full animate-pulse"></div>
            <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0 80 L0 40 Q360 0 720 40 Q1080 80 1440 40 L1440 80 Z" fill="#f9fafb"/>
            </svg>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">

                {{-- Left: Greeting + Stats --}}
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-white text-sm font-medium px-3 py-1.5 rounded-full">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            Level A — Aktif
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white mb-3 leading-tight">
                        Halo, <span class="text-[#F4A261]">{{ $firstName }}</span>! 👋
                    </h1>
                    <p class="text-blue-200 text-lg mb-8 max-w-lg">
                        Terus semangat! Anda sudah 68% menuju penyelesaian Level A. Selesaikan tugas hari ini.
                    </p>

                    {{-- Quick Stats --}}
                    <div class="grid grid-cols-3 gap-4 max-w-lg">
                        <div class="bg-white/10 border border-white/15 rounded-2xl p-4 text-center backdrop-blur-sm">
                            <div class="text-2xl font-black text-white">7</div>
                            <div class="text-blue-300 text-xs mt-1">Hari Bergabung</div>
                        </div>
                        <div class="bg-white/10 border border-white/15 rounded-2xl p-4 text-center backdrop-blur-sm">
                            <div class="text-2xl font-black text-[#F4A261]">3</div>
                            <div class="text-blue-300 text-xs mt-1">Tugas Selesai</div>
                        </div>
                        <div class="bg-white/10 border border-white/15 rounded-2xl p-4 text-center backdrop-blur-sm">
                            <div class="text-2xl font-black text-green-400">0</div>
                            <div class="text-blue-300 text-xs mt-1">Sertifikat</div>
                        </div>
                    </div>
                </div>

                {{-- Right: Progress Ring --}}
                <div class="flex-shrink-0 flex flex-col items-center gap-4">
                    <div class="relative w-48 h-48">
                        <svg class="w-full h-full -rotate-90" viewBox="0 0 120 120">
                            <circle cx="60" cy="60" r="50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="10"/>
                            <circle cx="60" cy="60" r="50" fill="none" stroke="#F4A261" stroke-width="10"
                                stroke-dasharray="314" stroke-dashoffset="100"
                                stroke-linecap="round"
                                class="transition-all duration-1000"/>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-4xl font-black text-white">68%</span>
                            <span class="text-blue-300 text-xs">Progress Level A</span>
                        </div>
                    </div>
                    <a href="#active-tasks"
                        class="inline-flex items-center gap-2 bg-[#F4A261] hover:bg-[#E76F51] text-white font-bold px-6 py-3 rounded-xl shadow-lg transition-all duration-300 hover:shadow-orange-500/30 hover:shadow-xl hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                        Lanjutkan Belajar
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ================================================================ --}}
    {{-- MAIN CONTENT                                                      --}}
    {{-- ================================================================ --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10 pb-16 space-y-8">

        {{-- ================================================================ --}}
        {{-- SECTION 2: JOURNEY ROADMAP                                       --}}
        {{-- ================================================================ --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-[#1D4E89]/10 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#1D4E89]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Perjalanan Sertifikasi</h2>
                    <p class="text-sm text-gray-500">Selesaikan setiap level secara berurutan</p>
                </div>
            </div>

            {{-- Roadmap --}}
            <div class="relative">
                {{-- Connector line (desktop) --}}
                <div class="hidden md:block absolute top-10 left-[16.7%] right-[16.7%] h-0.5 bg-gray-200 z-0">
                    <div class="h-full bg-gradient-to-r from-[#1D4E89] to-[#1D4E89] w-[33%]"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 relative z-10">
                    {{-- Level A --}}
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-[#1D4E89] rounded-2xl p-5">
                            <div class="flex items-center justify-between mb-3">
                                <div class="w-10 h-10 bg-[#1D4E89] rounded-xl flex items-center justify-center">
                                    <span class="text-white font-black text-sm">A</span>
                                </div>
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-700 bg-blue-100 border border-blue-200 px-2.5 py-1 rounded-full">
                                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>
                            <h3 class="font-bold text-[#1D4E89] mb-1">Level A</h3>
                            <p class="text-xs text-blue-700 mb-3">Teaching Knowledge Certification</p>
                            <div class="space-y-1 mb-3">
                                <div class="flex justify-between text-xs text-gray-600">
                                    <span>Progress</span><span class="font-semibold text-[#1D4E89]">68%</span>
                                </div>
                                <div class="h-2 bg-blue-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-[#1D4E89] rounded-full" style="width:68%"></div>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-1">
                                <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-medium">✓ LITERASI</span>
                                <span class="text-[10px] bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full font-medium">~ HOTS</span>
                                <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full font-medium">PCK</span>
                                <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full font-medium">NUMERASI</span>
                            </div>
                        </div>
                    </div>

                    {{-- Level B --}}
                    <div class="relative opacity-60">
                        <div class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-5">
                            <div class="flex items-center justify-between mb-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-xl flex items-center justify-center">
                                    <span class="text-white font-black text-sm">B</span>
                                </div>
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 px-2.5 py-1 rounded-full">
                                    🔒 Terkunci
                                </span>
                            </div>
                            <h3 class="font-bold text-gray-500 mb-1">Level B</h3>
                            <p class="text-xs text-gray-400 mb-3">Teaching Activation Certification</p>
                            <p class="text-xs text-gray-400">Selesaikan Level A terlebih dahulu untuk membuka level ini.</p>
                            <div class="flex flex-wrap gap-1 mt-3">
                                <span class="text-[10px] bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full font-medium">MODUL AJAR</span>
                                <span class="text-[10px] bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full font-medium">PPT</span>
                            </div>
                        </div>
                    </div>

                    {{-- Level C --}}
                    <div class="relative opacity-40">
                        <div class="bg-gray-50 border-2 border-gray-200 rounded-2xl p-5">
                            <div class="flex items-center justify-between mb-3">
                                <div class="w-10 h-10 bg-gray-300 rounded-xl flex items-center justify-center">
                                    <span class="text-white font-black text-sm">C</span>
                                </div>
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-gray-400 bg-gray-100 border border-gray-200 px-2.5 py-1 rounded-full">
                                    🔒 Terkunci
                                </span>
                            </div>
                            <h3 class="font-bold text-gray-400 mb-1">Level C</h3>
                            <p class="text-xs text-gray-400 mb-3">Teaching Mastery Certification</p>
                            <p class="text-xs text-gray-400">Selesaikan Level A & B terlebih dahulu.</p>
                            <div class="flex flex-wrap gap-1 mt-3">
                                <span class="text-[10px] bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full font-medium">ESSAY</span>
                                <span class="text-[10px] bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full font-medium">VIDEO</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- SECTION 3 + 4: SUB-SERTIFIKAT + ACTIVE TASKS (2 col)            --}}
        {{-- ================================================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            {{-- Sub-sertifikat Cards (3 cols) --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1D4E89]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Sub-Sertifikat Level A</h2>
                            <p class="text-sm text-gray-500">4 kompetensi yang perlu diselesaikan</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        {{-- HOTS --}}
                        <div class="group relative bg-gradient-to-r from-blue-50 to-blue-100/50 rounded-2xl p-4 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-blue-200">
                                    <span class="text-white text-lg">🧠</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="font-bold text-gray-900 text-sm">HOTS</h3>
                                        <span class="text-sm font-bold text-blue-700">60%</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-2">Higher Order Thinking Skills</p>
                                    <div class="h-1.5 bg-blue-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-600 rounded-full transition-all duration-700" style="width:60%"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200 px-2.5 py-1 rounded-full flex-shrink-0">In Progress</span>
                            </div>
                        </div>

                        {{-- PCK --}}
                        <div class="group relative bg-gray-50 rounded-2xl p-4 border border-gray-100 hover:border-gray-300 transition-all duration-300 hover:shadow-md cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gray-300 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-lg">📚</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="font-bold text-gray-700 text-sm">PCK</h3>
                                        <span class="text-sm font-bold text-gray-400">0%</span>
                                    </div>
                                    <p class="text-xs text-gray-400 mb-2">Pedagogical Content Knowledge</p>
                                    <div class="h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-gray-300 rounded-full" style="width:0%"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold bg-red-50 text-red-500 border border-red-100 px-2.5 py-1 rounded-full flex-shrink-0">Belum Mulai</span>
                            </div>
                        </div>

                        {{-- LITERASI --}}
                        <div class="group relative bg-gradient-to-r from-green-50 to-green-100/50 rounded-2xl p-4 border border-green-100 hover:border-green-300 transition-all duration-300 hover:shadow-md cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-green-200">
                                    <span class="text-white text-lg">📖</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="font-bold text-gray-900 text-sm">LITERASI</h3>
                                        <span class="text-sm font-bold text-green-600">100%</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-2">Kemampuan Literasi Kritis</p>
                                    <div class="h-1.5 bg-green-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-green-500 rounded-full" style="width:100%"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold bg-green-100 text-green-700 border border-green-200 px-2.5 py-1 rounded-full flex-shrink-0">✓ Selesai</span>
                            </div>
                        </div>

                        {{-- NUMERASI --}}
                        <div class="group relative bg-gradient-to-r from-orange-50 to-orange-100/50 rounded-2xl p-4 border border-orange-100 hover:border-orange-300 transition-all duration-300 hover:shadow-md cursor-pointer">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-orange-200">
                                    <span class="text-white text-lg">🔢</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="font-bold text-gray-900 text-sm">NUMERASI</h3>
                                        <span class="text-sm font-bold text-orange-600">80%</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-2">Kemampuan Numerasi & Analitik</p>
                                    <div class="h-1.5 bg-orange-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-orange-500 rounded-full" style="width:80%"></div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200 px-2.5 py-1 rounded-full flex-shrink-0">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Active Tasks (2 cols) --}}
            <div class="lg:col-span-2" id="active-tasks">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 h-full">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-gray-900">Tugas Aktif</h2>
                                <p class="text-xs text-gray-500">3 tugas perlu diselesaikan</p>
                            </div>
                        </div>
                        <span class="w-6 h-6 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">3</span>
                    </div>

                    <div class="space-y-3">
                        {{-- Task 1 --}}
                        <div class="relative flex gap-3 p-3 rounded-xl bg-red-50 border border-red-100 hover:border-red-300 transition-all cursor-pointer group">
                            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 leading-tight">Unggah Tugas Training Modul 2</p>
                                <p class="text-xs text-red-600 font-medium mt-0.5">⏰ Jatuh tempo: 12 Apr 2026</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0 self-center opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>

                        {{-- Task 2 --}}
                        <div class="relative flex gap-3 p-3 rounded-xl bg-yellow-50 border border-yellow-100 hover:border-yellow-300 transition-all cursor-pointer group">
                            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 leading-tight">Refleksi Sesi Training 3</p>
                                <p class="text-xs text-yellow-700 font-medium mt-0.5">📝 Kompetensi Kepribadian</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0 self-center opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>

                        {{-- Task 3 --}}
                        <div class="relative flex gap-3 p-3 rounded-xl bg-purple-50 border border-purple-100 hover:border-purple-300 transition-all cursor-pointer group">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 leading-tight">Kumpulkan Video Minggu Ini</p>
                                <p class="text-xs text-purple-700 font-medium mt-0.5">🎥 0 / 1 video dikumpulkan</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 flex-shrink-0 self-center opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>

                        {{-- Completed Task --}}
                        <div class="relative flex gap-3 p-3 rounded-xl bg-gray-50 border border-gray-100 opacity-60">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-500 line-through leading-tight">Uji Literasi — Selesai</p>
                                <p class="text-xs text-green-600 font-medium mt-0.5">✓ Nilai: 92/100</p>
                            </div>
                        </div>
                    </div>

                    <button class="w-full mt-4 text-sm text-center text-[#1D4E89] font-semibold hover:underline py-2">
                        Lihat Semua Tugas →
                    </button>
                </div>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- SECTION 5: TRAINING ONLINE PROGRESS                              --}}
        {{-- ================================================================ --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Training Online</h2>
                        <p class="text-sm text-gray-500">3 Modul · 12 Pertemuan</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <div class="text-2xl font-black text-[#1D4E89]">7/12</div>
                        <div class="text-xs text-gray-500">Sesi selesai</div>
                    </div>
                    <div class="w-16 h-16">
                        <svg viewBox="0 0 36 36" class="w-full h-full -rotate-90">
                            <circle cx="18" cy="18" r="15" fill="none" stroke="#E5E7EB" stroke-width="3"/>
                            <circle cx="18" cy="18" r="15" fill="none" stroke="#4F46E5" stroke-width="3"
                                stroke-dasharray="94" stroke-dashoffset="39" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Modul Grid --}}
            <div class="space-y-6">
                @php
                    $modules = [
                        ['label' => 'Modul 1', 'title' => 'Pengenalan & Fondasi', 'status' => 'done', 'sessions' => [1,1,1,1]],
                        ['label' => 'Modul 2', 'title' => 'Penerapan & Praktik', 'status' => 'active', 'sessions' => [1,1,1,0]],
                        ['label' => 'Modul 3', 'title' => 'Evaluasi & Refleksi', 'status' => 'locked', 'sessions' => [0,0,0,0]],
                    ];
                    $sessionNum = 1;
                @endphp

                @foreach($modules as $module)
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        @if($module['status'] === 'done')
                            <span class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                        @elseif($module['status'] === 'active')
                            <span class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                            </span>
                        @else
                            <span class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-gray-400 text-xs">🔒</span>
                            </span>
                        @endif
                        <div>
                            <span class="font-bold text-sm {{ $module['status'] === 'locked' ? 'text-gray-400' : 'text-gray-800' }}">{{ $module['label'] }}</span>
                            <span class="text-xs text-gray-400 ml-2">{{ $module['title'] }}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-2 ml-9">
                        @foreach($module['sessions'] as $idx => $done)
                        @php $sNum = ($loop->parent->index * 4) + $idx + 1; @endphp
                        <div class="group relative">
                            <div class="h-12 rounded-xl flex flex-col items-center justify-center text-xs font-semibold transition-all duration-300 cursor-pointer
                                {{ $done ? 'bg-green-100 text-green-700 border border-green-200 hover:bg-green-200' :
                                   ($module['status'] === 'active' && $idx === array_search(0, $module['sessions']) ? 'bg-indigo-100 text-indigo-700 border-2 border-indigo-400 animate-pulse-border' :
                                   ($module['status'] === 'locked' ? 'bg-gray-100 text-gray-300 cursor-not-allowed border border-gray-100' : 'bg-gray-100 text-gray-400 border border-gray-200 hover:bg-gray-200')) }}">
                                @if($done)
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                @elseif($module['status'] === 'locked')
                                    🔒
                                @else
                                    <span>{{ $sNum }}</span>
                                @endif
                            </div>
                            <div class="absolute -bottom-5 left-1/2 -translate-x-1/2 text-[10px] text-gray-400 whitespace-nowrap">Sesi {{ $sNum }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- SECTION 6 + SECTION 8: BELAJAR MANDIRI + TRANSAKSI (2 col)      --}}
        {{-- ================================================================ --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- Belajar Mandiri & Refleksi --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-teal-50 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Belajar Mandiri</h2>
                        <p class="text-sm text-gray-500">Modul & Refleksi Kompetensi</p>
                    </div>
                </div>

                <div class="space-y-3">
                    @php
                        $modules = [
                            ['title' => 'Modul 1: Pendekatan Saintifik', 'read' => true, 'reflected' => true],
                            ['title' => 'Modul 2: Asesmen Formatif', 'read' => true, 'reflected' => false],
                            ['title' => 'Modul 3: Diferensiasi Pembelajaran', 'read' => false, 'reflected' => false],
                        ];
                    @endphp
                    @foreach($modules as $m)
                    <div class="flex items-center gap-4 p-4 rounded-2xl border {{ $m['read'] ? 'bg-white border-gray-100' : 'bg-gray-50 border-gray-100 opacity-60' }} hover:border-teal-200 transition-all">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 {{ $m['read'] ? 'bg-teal-100' : 'bg-gray-100' }}">
                            <svg class="w-4 h-4 {{ $m['read'] ? 'text-teal-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ $m['title'] }}</p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[10px] px-2 py-0.5 rounded-full font-medium {{ $m['read'] ? 'bg-teal-100 text-teal-700' : 'bg-gray-100 text-gray-400' }}">
                                    {{ $m['read'] ? '✓ Sudah Dibaca' : 'Belum Dibaca' }}
                                </span>
                                <span class="text-[10px] px-2 py-0.5 rounded-full font-medium {{ $m['reflected'] ? 'bg-green-100 text-green-700' : ($m['read'] ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-400') }}">
                                    {{ $m['reflected'] ? '✓ Refleksi Selesai' : ($m['read'] ? '⚠ Isi Refleksi' : 'Refleksi') }}
                                </span>
                            </div>
                        </div>
                        @if($m['read'] && !$m['reflected'])
                        <button class="flex-shrink-0 text-xs font-semibold bg-teal-500 text-white px-3 py-1.5 rounded-lg hover:bg-teal-600 transition-colors">
                            Refleksi
                        </button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Riwayat Transaksi --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Riwayat Transaksi</h2>
                            <p class="text-sm text-gray-500">Pembayaran & pembelian akses</p>
                        </div>
                    </div>
                    <a href="{{ route('asesi.transaksi') }}" class="text-sm text-[#1D4E89] font-semibold hover:underline">Lihat Semua</a>
                </div>

                <div class="space-y-3">
                    @php
                        $transactions = [
                            ['label' => 'Level A — Bundle (HOTS, PCK, LITERASI, NUMERASI)', 'date' => '3 Apr 2026', 'amount' => 'Rp 850.000', 'status' => 'paid', 'coupon' => 'TLCDISC20'],
                            ['label' => 'Level B — Modul Ajar', 'date' => '1 Mar 2026', 'amount' => 'Rp 350.000', 'status' => 'paid', 'coupon' => null],
                            ['label' => 'Level A — PCK Only', 'date' => '15 Feb 2026', 'amount' => 'Rp 250.000', 'status' => 'pending', 'coupon' => null],
                        ];
                    @endphp
                    @foreach($transactions as $trx)
                    <div class="flex items-start gap-3 p-4 rounded-2xl border border-gray-100 hover:border-emerald-200 hover:bg-emerald-50/30 transition-all">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5 {{ $trx['status'] === 'paid' ? 'bg-emerald-100' : 'bg-yellow-100' }}">
                            @if($trx['status'] === 'paid')
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            @else
                                <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-800 leading-tight truncate">{{ $trx['label'] }}</p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-xs text-gray-400">{{ $trx['date'] }}</span>
                                @if($trx['coupon'])
                                    <span class="text-[10px] bg-purple-100 text-purple-700 px-2 py-0.5 rounded-full font-medium">🏷 {{ $trx['coupon'] }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <div class="text-sm font-bold text-gray-900">{{ $trx['amount'] }}</div>
                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full {{ $trx['status'] === 'paid' ? 'bg-emerald-100 text-emerald-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ $trx['status'] === 'paid' ? 'Lunas' : 'Pending' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- SECTION 7: SERTIFIKAT DIRAIH                                     --}}
        {{-- ================================================================ --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Sertifikat Diraih</h2>
                    <p class="text-sm text-gray-500">1 sertifikat berhasil diraih</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Sertifikat yang sudah diraih --}}
                <div class="relative group bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-5 text-white overflow-hidden cursor-pointer hover:shadow-xl hover:shadow-emerald-200 transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute -right-4 -top-4 w-20 h-20 bg-white/10 rounded-full"></div>
                    <div class="absolute -right-2 bottom-4 w-10 h-10 bg-white/10 rounded-full"></div>
                    <div class="relative z-10">
                        <div class="text-3xl mb-3">📖</div>
                        <h3 class="font-black text-lg leading-tight">LITERASI</h3>
                        <p class="text-green-100 text-xs mt-1">Teaching Knowledge – Level A</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-[10px] bg-white/20 px-2 py-0.5 rounded-full">3 Apr 2026</span>
                            <button class="text-xs bg-white/20 hover:bg-white/30 text-white px-3 py-1 rounded-lg font-semibold transition-colors flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Empty placeholder cards --}}
                @foreach(['HOTS', 'PCK', 'NUMERASI'] as $cert)
                <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-5 flex flex-col items-center justify-center text-center opacity-50">
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138z"/>
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-gray-400">{{ $cert }}</p>
                    <p class="text-xs text-gray-300 mt-1">Belum diraih</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
