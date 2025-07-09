@extends('layouts.asesiDashboard')

@section('content')

    {{-- Status Sertifikasi --}}
    <section class="max-w-7xl mx-auto px-4 py-8">
        <!-- Header dengan gradient yang menarik -->
        <div class="mb-8 relative overflow-hidden animate-fadeIn">
            <div class="bg-gradient-to-r from-[#1D4E89] via-[#2A5AAF] to-[#E76F51] rounded-2xl p-8 text-white relative">
                <div class="absolute inset-0 bg-black opacity-10"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-2">
                        <svg class="w-8 h-8 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2L3 7v11a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V7l-7-5z"
                                clip-rule="evenodd" />
                        </svg>
                        <h1 class="text-3xl font-bold">Status Sertifikasi Anda</h1>
                    </div>
                    <p class="text-white/90 text-lg">Pantau progres pembelajaran dan sertifikasi Anda dalam
                        Teaching
                        & Learning Certification</p>
                </div>
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
            </div>
        </div>

        <!-- Certification Cards -->
        <livewire:asesi.certification-card />
        <!-- Certification Cards -->

    </section>
    {{-- End Status Sertifikasi --}}

    {{-- Kategori Level --}}
    <section
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 shadow-xl rounded-3xl border border-orange-100 p-8 mb-36 bg-gradient-to-br from-blue-50 via-white to-orange-50">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-r from-[#1D4E89] to-[#5396ae] text-white p-3 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2
                    class="text-3xl font-extrabold text-transparent bg-clip-text bg-[#1D4E89]">
                    KATEGORI LEVEL</h2>
            </div>
            <div class="flex items-center space-x-4">
                {{-- <span
                    class="px-4 py-2 bg-orange-100 text-[#E76F51] font-medium rounded-full border border-orange-200 shadow-sm flex items-center">
                    <span class="inline-block w-2 h-2 bg-[#E76F51] rounded-full mr-2 animate-pulse"></span>
                    Dalam Progres
                </span> --}}
                {{-- TAMPILAN SELESAI --}}
                {{-- <span class="px-4 py-2 bg-green-100 text-green-700 font-medium rounded-full border border-green-200 shadow-sm flex items-center w-fit">
                    <span class="inline-block w-2 h-2 bg-green-600 rounded-full mr-2"></span>
                    Selesai
                </span> --}}

                {{-- TAMPILAN BELUM DIMULAI --}}
                {{-- <span class="px-4 py-2 bg-gray-100 text-gray-600 font-medium rounded-full border border-gray-200 shadow-sm flex items-center w-fit">
                    <span class="inline-block w-2 h-2 bg-gray-400 rounded-full mr-2"></span>
                    Belum Dimulai
                </span> --}}
                <button
                    class="px-6 py-2 bg-gradient-to-r from-[#1D4E89] to-[#14406B] text-white rounded-xl font-medium shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-200">
                    <a href="{{ route('asesi.nilai') }}">Lihat Nilai</a>

                </button>
            </div>
        </div>

        <p class="text-gray-600 text-base mb-10 text-center sm:text-left max-w-2xl">
            Daftar kategori kuis yang akan anda kerjakan. Selesaikan setiap kategori untuk membuka level berikutnya!
        </p>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center sm:justify-start gap-3 mb-10">
            <button onclick="showLevel('A')"
                class="px-6 py-3 bg-gradient-to-r from-[#1D4E89] to-[#14406B] text-white rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg flex items-center level-button"
                id="levelAButton">
                @if (Auth::user()->hasAnyPermission(['bundling', 'access_level_A']))
                    <livewire:level-unlock-icon />
                @else
                    <livewire:level-lock-icon />
                @endif
                Level A
            </button>
            <button onclick="showLevel('B')"
                class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg flex items-center level-button"
                id="levelBButton">
                @if (Auth::user()->hasAnyPermission(['bundling', 'access_level_B']))
                    <livewire:level-unlock-icon />
                @else
                    <livewire:level-lock-icon />
                @endif
                Level B
            </button>
            <button onclick="showLevel('C')"
                class="px-6 py-3 bg-white text-gray-700 rounded-xl text-sm font-medium shadow-md transform transition duration-300 hover:shadow-lg flex items-center level-button"
                id="levelCButton">
                @if (Auth::user()->hasAnyPermission(['bundling', 'access_level_C']))
                    <livewire:level-unlock-icon />
                @else
                    <livewire:level-lock-icon />
                @endif
                Level C
            </button>
        </div>

        <!-- Categories A -->
        <div id="levelA" class="level-content">
            <livewire:categories-a />
        </div>

        <!-- Categories B -->
        <div id="levelB" class="level-content hidden">
            <livewire:categories-b />
        </div>

        <!-- Categories C -->
        <div id="levelC" class="level-content hidden">
            <livewire:categories-c />
        </div>

        <script>
            function showLevel(level) {
                // Hide all level contents
                document.querySelectorAll('.level-content').forEach(content => {
                    content.classList.add('hidden');
                });

                // Show selected level content
                document.getElementById(`level${level}`).classList.remove('hidden');

                // Update button styles
                document.querySelectorAll('.level-button').forEach(button => {
                    if (button.id === `level${level}Button`) {
                        button.classList.remove('bg-white', 'text-gray-700');
                        button.classList.add('bg-gradient-to-r', 'from-[#1D4E89]', 'to-[#14406B]', 'text-white');
                    } else {
                        button.classList.add('bg-white', 'text-gray-700');
                        button.classList.remove('bg-gradient-to-r', 'from-[#1D4E89]', 'to-[#14406B]', 'text-white');
                    }
                });
            }
        </script>
    </section>
    {{-- End Kategori level --}}

    <script>
        // Add hover animations to cards
        document.querySelectorAll('.bg-white').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
                this.style.transition = 'transform 0.3s ease';
                this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
            });
        });

        // Add pulse animation to gradient icons
        // document.querySelectorAll('.bg-gradient-to-r').forEach(icon => {
        //     setInterval(() => {
        //         icon.style.animation = 'pulse 2s ease-in-out';
        //         setTimeout(() => {
        //             icon.style.animation = '';
        //         }, 2000);
        //     }, 5000);
        // });

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
                @keyframes pulse {
                    0%, 100% { transform: scale(1); }
                    50% { transform: scale(1.05); }
                }

                .bg-white {
                    transition: all 0.3s ease;
                }
            `;
        document.head.appendChild(style);
    </script>

@endsection