@extends('layouts.asesiDashboard')

@section('content')
    {{-- Wrapper Utama dengan background yang sedikit off-white agar konten pop-up --}}
    <div class="min-h-screen md:ml-64">

        {{-- SECTION 1: Status Sertifikasi (Hero Banner) --}}
            <section class="max-w-7xl mx-auto">
                <div class="relative overflow-hidden bg-slate-900 shadow-xl shadow-slate-200/50 group">
                    
                    {{-- Abstract Background Shapes --}}
                    <div
                        class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-indigo-500/20 blur-3xl group-hover:bg-indigo-500/30 transition-all duration-700">
                    </div>
                    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 rounded-full bg-amber-500/10 blur-3xl"></div>

                    {{-- Content --}}
                    
                </div>

                {{-- Certification Cards Component --}}
                {{-- <div class="mt-8">
                    <livewire:asesi.certification-card />
                </div> --}}
            </section>

        {{-- SECTION 2: Kategori Level --}}
        <section class="max-w-7xl mx-auto">

            <div class="bg-white shadow-sm border border-slate-200 p-6 sm:p-10">

                {{-- Header Section --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                            <span class="w-1.5 h-8 bg-blue-600 rounded-full"></span>
                            Jalur Sertifikasi
                        </h2>
                        <p class="text-slate-500 mt-1 ml-3">
                            Pilih level untuk mengakses materi dan kuis. Selesaikan secara berurutan.
                        </p>
                    </div>
                </div>

                {{-- Filter Tabs (Pills Design) --}}
                <div class="bg-slate-100 p-1.5 rounded-2xl inline-flex flex-wrap gap-2 mb-10 w-full sm:w-auto">
                    {{-- Button Level A --}}
                    <button onclick="showLevel('A')" id="levelAButton"
                        class="level-button flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-bold transition-all duration-300 shadow-md bg-brandBlue text-white transform hover:scale-[1.02]">
                        @if (Auth::user()->hasAnyPermission(['bundling', 'access_level_A']))
                            <div class="text-amber-400"><livewire:level-unlock-icon /></div>
                        @else
                            <div class="text-slate-400"><livewire:level-lock-icon /></div>
                        @endif
                        Level A
                    </button>

                    {{-- Button Level B --}}
                    <button onclick="showLevel('B')" id="levelBButton"
                        class="level-button flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-bold transition-all duration-300 text-slate-600 hover:text-slate-900 hover:bg-white hover:shadow-sm">
                        @if (Auth::user()->hasAnyPermission(['bundling', 'access_level_B']))
                            <div class="text-amber-500"><livewire:level-unlock-icon /></div>
                        @else
                            <div class="text-slate-400"><livewire:level-lock-icon /></div>
                        @endif
                        Level B
                    </button>

                    {{-- Button Level C --}}
                    <button onclick="showLevel('C')" id="levelCButton"
                        class="level-button flex-1 sm:flex-none flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-bold transition-all duration-300 text-slate-600 hover:text-slate-900 hover:bg-white hover:shadow-sm">
                        @if (Auth::user()->hasAnyPermission(['bundling', 'access_level_C']))
                            <div class="text-amber-500"><livewire:level-unlock-icon /></div>
                        @else
                            <div class="text-slate-400"><livewire:level-lock-icon /></div>
                        @endif
                        Level C
                    </button>
                </div>

                {{-- Content Area --}}
                <div class="relative min-h-[300px]">
                    <div id="levelA" class="level-content animate-fadeIn">
                        <livewire:categories-a />
                    </div>
                    <div id="levelB" class="level-content hidden animate-fadeIn">
                        <livewire:categories-b />
                    </div>
                    <div id="levelC" class="level-content hidden animate-fadeIn">
                        <livewire:categories-c />
                    </div>
                </div>

            </div>
        </section>
    </div>
    @if (session('download_trigger'))
        <script>
            window.onload = function() {
                window.location.href = "{{ session('download_trigger') }}";
            }
        </script>
    @endif

    {{-- Script --}}
    <script>
        function showLevel(level) {
            // 1. Hide all contents with fade effect reset (optional tweak)
            document.querySelectorAll('.level-content').forEach(content => {
                content.classList.add('hidden');
            });

            // 2. Show selected content
            const selectedContent = document.getElementById(`level${level}`);
            selectedContent.classList.remove('hidden');

            // 3. Reset all buttons to "Inactive" state
            document.querySelectorAll('.level-button').forEach(button => {
                // Remove Active Classes
                button.classList.remove('bg-brandBlue', 'text-white', 'shadow-md', 'scale-[1.02]');
                // Add Inactive Classes
                button.classList.add('text-slate-600', 'hover:text-slate-900', 'hover:bg-white', 'hover:shadow-sm');
            });

            // 4. Set clicked button to "Active" state
            const activeButton = document.getElementById(`level${level}Button`);
            activeButton.classList.remove('text-slate-600', 'hover:text-slate-900', 'hover:bg-white', 'hover:shadow-sm');
            activeButton.classList.add('bg-brandBlue', 'text-white', 'shadow-md', 'scale-[1.02]');
        }
    </script>

    <style>
        /* Simple Fade Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fadeIn {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
@endsection