@extends('layouts.asesorDashboard')
@section('title', 'Daftar Penilaian Level C')
@section('content')
<section class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8 bg-gray-50 min-h-screen">
    @php use Vinkla\Hashids\Facades\Hashids; @endphp

    <div class="bg-white rounded-lg shadow-md p-3 sm:p-4 lg:p-6 mb-4 sm:mb-6">
        <div class="mb-4 sm:mb-6">
            <h2 class="text-xl sm:text-xl font-bold text-gray-800">Daftar Asesi Level C</h2>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">Kelola dan nilai Asesi Level C </p>
        </div>

        <div class="flex flex-col space-y-3 sm:space-y-4 lg:flex-row lg:justify-between lg:space-y-0 mb-4 sm:mb-6">
            <!-- Search -->
            <div class="relative w-full lg:w-auto">
                <form method="GET" action="{{ route('asesor.list-asesi-c') }}" class="flex flex-col sm:flex-row gap-2 sm:items-center mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari asesi..." class="pl-8 sm:pl-10 pr-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg w-full lg:w-64 xl:w-72 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 text-sm sm:text-base">
                    <button type="submit" class="px-4 py-2 bg-blue-800 text-white rounded-lg text-sm hover:bg-blue-700 transition">Cari</button>
                </form>
            </div>

            <!-- Filters -->
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                <div class="flex gap-2 sm:gap-3">
                    <button class="flex items-center justify-center gap-1 sm:gap-2 border border-blue-800 text-blue-800 px-3 sm:px-4 py-2 rounded-lg hover:bg-blue-50 transition duration-200 text-xs sm:text-sm flex-1 sm:flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <span class="hidden sm:inline">Filter</span>
                    </button>
                    <button class="flex items-center justify-center gap-1 sm:gap-2 border border-blue-800 text-blue-800 px-3 sm:px-4 py-2 rounded-lg hover:bg-blue-50 transition duration-200 text-xs sm:text-sm flex-1 sm:flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span class="hidden sm:inline">Urutkan</span>
                    </button>
                </div>
                <div class="relative">
                    <form method="GET" action="{{ route('asesor.list-asesi-c') }}" class="mb-4">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <select name="kategori" onchange="this.form.submit()" class="appearance-none border border-gray-300 rounded-lg pl-3 sm:pl-4 pr-8 sm:pr-10 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 w-full sm:w-auto text-xs sm:text-sm">
                            <option value="">Semua Kategori</option>
                            <option value="essay" {{ request('kategori') === 'essay' ? 'selected' : '' }}>Esai
                            </option>
                            <option value="video" {{ request('kategori') === 'video' ? 'selected' : '' }}>Video
                            </option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-3 w-3 sm:h-4 sm:w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="hidden lg:block overflow-x-auto border border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead style="background-color: #00549D;">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Nama Asesi
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            kategori
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Terakhir Diperbarui
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Nilai
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($levelC as $index)
                    <!-- video -->
                    <tr class="hover:bg-blue-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-700">
                                {{ Str::ucfirst($index->user->name ?? 'N/A') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Video
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                            $status = $index->status;
                            @endphp

                            @if ($status === 'pending')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Menunggu Dinilai
                            </span>
                            @elseif ($status === 'reviewed')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Sudah Dinilai
                            </span>
                            @elseif ($status === 'rejected')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Ditolak
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $index->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($index->score == 0 || is_null($index->score))
                            Belum Dinilai
                            @else
                            {{ $index->score }}
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm flex justify-end">
                            @if ($index->status === 'pending')
                            <a href="{{ route('asesor.gradeC.asesi', Hashids::encode($index->id)) }}" class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1 rounded-lg flex items-center gap-1 shadow-md font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Nilai
                            </a>
                            @else
                            <a href="{{ route('asesor.gradeC.asesi', Hashids::encode($index->id)) }}" class="bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded-lg flex items-center gap-1 shadow-md font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Lihat Detail
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                            Tidak Ada Data
                        </td>
                    </tr>
                    @endforelse

                    <!-- essay -->
                   @forelse ($levelCEssay as $user_id => $essays)
<tr class="hover:bg-blue-50">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-medium text-gray-700">
            {{ $essays->first()->user->name ?? 'N/A' }}
        </div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
            Essay
        </span>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
        @if ($essays->whereNotNull('score')->count() === $essays->count())
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                Sudah Dinilai
            </span>
        @else
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                Belum Dinilai
            </span>
        @endif
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $essays->max('updated_at')->diffForHumans() }}
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        @if ($essays->whereNotNull('score')->isEmpty())
            Belum Dinilai
        @else
            {{ $essays->whereNotNull('score')->max('score') }}
        @endif
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-right text-sm flex justify-end">
        @if ($essays->whereNull('score')->count() > 0)
            <a href="{{ route('asesor.gradeC.asesi', \Vinkla\Hashids\Facades\Hashids::encode($user_id)) }}"
               class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1 rounded-lg flex items-center gap-1 shadow-md font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Nilai
            </a>
        @else
            <a href="{{ route('asesor.gradeC.asesi', \Vinkla\Hashids\Facades\Hashids::encode($user_id)) }}"
               class="bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded-lg flex items-center gap-1 shadow-md font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Lihat Detail
            </a>
        @endif
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-gray-500 py-4">
        Tidak ada data essay.
    </td>
</tr>
@endforelse


                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $levelC->links() }}
        </div>

        {{-- Mobile View (simplified, you can copy from listasesi.blade.php if needed) --}}
        <div class="lg:hidden space-y-4">
            @forelse ($levelC as $index)
            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex flex-col space-y-3">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">{{ Str::ucfirst($index->user->name ?? 'N/A') }}</h3>
                            <p class="text-xs text-gray-500 mt-1">{{ $index->updated_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex flex-col items-end space-y-2">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($index->category !== "vidio")
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    vidio
                                </span>
                                @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                    esay
                                </span>
                                @endif

                            </td>
                            @php
                            $status = $index->status;
                            @endphp
                            @if ($status === 'pending')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Menunggu Dinilai
                            </span>
                            @elseif ($status === 'reviewed')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Sudah Dinilai
                            </span>
                            @elseif ($status === 'rejected')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                Ditolak
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                        <div class="text-sm">
                            <span class="text-gray-600">Nilai: </span>
                            <span class="font-medium text-gray-500">
                                @if ($index->score == 0 || is_null($index->score))
                                -
                                @else
                                {{ $index->score }}
                                @endif
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            @if ($index->status === 'pending')
                            <a href="{{ route('asesor.gradeC.asesi', Hashids::encode($index->id)) }}" class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-xs transition duration-200">
                                Nilai
                            </a>
                            @else
                            <a href="{{ route('asesor.gradeC.asesi', Hashids::encode($index->id)) }}" class="bg-green-600 hover:bg-green-500 text-white px-3 py-1.5 rounded-lg text-xs transition duration-200">
                                Lihat Detail
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500">Tidak ada pengajuan Level C yang perlu dinilai saat ini.</p>
            @endforelse
        </div>
    </div>

    <script>
        if (window.innerWidth >= 1024) {
            document.querySelectorAll('tbody tr').forEach(row => {
                row.addEventListener('mouseenter', () => {
                    row.classList.add('bg-blue-50', 'transition-colors', 'duration-200');
                });

                row.addEventListener('mouseleave', () => {
                    row.classList.remove('bg-blue-50');
                });
            });
        }

        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();

                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        top: ${y}px;
                        left: ${x}px;
                        background: rgba(255, 255, 255, 0.7);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                    `;

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        document.querySelectorAll('.lg\\:hidden .bg-white.border').forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('button')) {
                    this.classList.add('ring-2', 'ring-blue-200', 'ring-offset-2');
                    setTimeout(() => {
                        this.classList.remove('ring-2', 'ring-blue-200', 'ring-offset-2');
                    }, 300);
                }
            });
        });

        const searchInput = document.querySelector('input[placeholder="Cari asesi..."]');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-blue-500', 'ring-offset-2');
            });

            searchInput.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-500', 'ring-offset-2');
            });
        }

        const style = document.createElement('style');
        style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }

                @media (max-width: 1023px) {
                    .hover\\:bg-blue-50:hover {
                        background-color: transparent;
                    }
                }

                /* Custom scrollbar for mobile horizontal scroll */
                @media (max-width: 1023px) {
                    .overflow-x-auto::-webkit-scrollbar {
                        height: 4px;
                    }
                    .overflow-x-auto::-webkit-scrollbar-track {
                        background: #f1f5f9;
                        border-radius: 4px;
                    }
                    .overflow-x-auto::-webkit-scrollbar-thumb {
                        background: #cbd5e1;
                        border-radius: 4px;
                    }
                    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
                        background: #94a3b8;
                    }
                }
            `;
        document.head.appendChild(style);

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                document.querySelectorAll('.lg\\:hidden .bg-white.border').forEach(card => {
                    card.classList.remove('ring-2', 'ring-blue-200', 'ring-offset-2');
                });
            }
        });

    </script>
</section>
@endsection
