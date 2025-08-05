<!-- Halaman 2: Detail Sertifikasi Level C -->
<div id="detail_sertifikasi_page" class="page-section py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex items-center mb-4">
            <!-- Link "Kembali ke Status Sertifikasi" -->
            <a wire:navigate href="{{ route('asesi.sertifikasi') }}" class="mt-5 flex items-center text-blue-600 hover:text-blue-800 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="font-medium text-sm sm:text-base">Kembali ke Status Sertifikasi</span>
            </a>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 lg:p-8">
            <h1 class="text-base sm:text-lg lg:text-2xl font-bold text-gray-800 mb-6">Progres Teaching Mastery Certification Level C</h1>

            <!-- Certificate Summary -->
          <div class="bg-gradient-to-r from-[#1D4E89] via-[#3C9B5F] to-[#F7C21B] p-4 sm:p-6 rounded-xl mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between shadow-lg border gap-4">

                <div class="flex items-center">
                    {{-- <img src="/" alt="Certificate Icon" class="w-12 h-12 sm:w-14 sm:h-14 mr-4 sm:mr-5"> --}}
                    <div>
                        <p class="text-base sm:text-lg font-bold text-white mb-1">Teaching Mastery Certification Level C</p>
                        <p class="text-white text-xs sm:text-sm">Selamat! Anda telah menyelesaikan semua persyaratan sertifikasi.</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    @if ($hasAccessC)
                    @if (Auth::user()->hasPermissionTo('level_C_completed'))
                    <a wire:navigate href="{{ route('asesi.sertifikat.c', Vinkla\Hashids\Facades\Hashids::encode(Auth::id())) }}" class="flex-1 font-medium py-3 px-1.5 rounded-xl transform transition duration-300 focus:outline-none bg-yellow-500 hover:bg-yellow-400 text-gray-800 cursor-pointer text-center block">
                        Lihat Sertifikat Anda <i class="fas fa-award mr-2"></i>
                    </a>
                    @else
                    <livewire:component.button-certificate status="sedang_berjalan" />
                    @endif
                    @else
                    <livewire:component.button-certificate status="belum_tersedia" />
                    @endif
                </div>
            </div>

            <!-- Tables Container -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-8">
                <!-- Riwayat Submisi -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <h2 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800 mb-2">Riwayat Ujian Penilaian</h2>
                    <div class="w-20 sm:w-24 h-1 bg-yellow-400 mb-6"></div>

                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-yellow-300">
                                        <tr>
                                            <th class="px-3 py-3 text-left text-md font-bold text-gray-700 uppercase tracking-wider">Tugas</th>
                                            <th class="px-3 py-3 text-left text-md font-bold text-gray-700 uppercase tracking-wider">Terakhir</th>
                                            <th class="px-3 py-3 text-left text-md font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    @forelse ($submissions as $tugas)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-3 py-4">
                                                @if ($tugas->url_video == null)
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Essay
                                                </span>
                                                @else
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                                    Video
                                                </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $tugas->updated_at->diffForHumans() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                $tugas = $tugas->status;
                                                @endphp

                                                @if ($tugas === 'pending')
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Menunggu
                                                </span>
                                                @elseif ($tugas === 'reviewed')
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Lulus
                                                </span>
                                                @elseif ($tugas === 'rejected')
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Tidak Lulus
                                                </span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">Belum ada data</td>
                                    </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Riwayat Ujian Penilaian -->
                <div class="bg-white rounded-lg shadow-lg p-4 sm:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <h2 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800 mb-2">Riwayat Ujian Penilaian</h2>
                    <div class="w-20 sm:w-24 h-1 bg-yellow-400 mb-6"></div>

                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-yellow-300">
                                        <tr>
                                            <th class="px-3 py-3 text-left text-md font-bold text-gray-700 uppercase tracking-wider">Kategori</th>
                                            <th class="px-3 py-3 text-left text-md font-bold text-gray-700 uppercase tracking-wider">Tanggal</th>
                                            <th class="px-3 py-3 text-left text-md font-bold text-gray-700 uppercase tracking-wider">Nilai</th>
                                            <th class="px-3 py-3 text-left text-md font-bold text-gray-700 uppercase tracking-wider">Komentar</th>
                                        </tr>
                                    </thead>
                                    @forelse($history as $riwayat)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-3 py-4">
                                                @if ($riwayat->url_video == null)
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Essay
                                                </span>
                                                @else
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                                    Video
                                                </span>
                                                @endif
                                            </td>
                                            <td class="px-3 py-4 text-md text-gray-700">
                                                {{ $riwayat->created_at->format('d M Y') }}
                                            </td>

                                            <td class="px-3 py-4 text-md text-gray-700">{{ $riwayat->score }}</td>
                                            <td class="px-3 py-4 text-md text-gray-700">{{ strip_tags($riwayat->comment_asesor) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4">Belum ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Forum Diskusi Card -->

                <div class="bg-[#1D4E89] rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <div class="h-3"></div>
                    <div class="bg-white rounded-t-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Forum diskusi</h2>
                        </div>
                        <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                            Tanyakan langsung, diskusi langsung, belajar langsung. Terhubung dengan para expert dan mentor bersertifikat untuk memecahkan kasus nyata yang kamu hadapi di kelas atau proyekmu.
                        </p>
                        <div class="text-right">
                            <a href="#" class="text-sm font-semibold text-[#1D4E89] hover:text-blue-800">
                                Ke forum diskusi <span class="ml-1">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1D4E89] rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <div class="h-3"></div>
                    <div class="bg-white rounded-t-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.124-1.282-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.124-1.282.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Mentoring Platform</h2>
                        </div>
                        <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                            Tanyakan langsung, diskusi langsung, belajar langsung. Terhubung dengan para expert dan mentor bersertifikat untuk memecahkan kasus nyata yang kamu hadapi di kelas atau proyekmu.
                        </p>
                        <div class="text-right">
                            <a href="#" class="text-sm font-semibold text-[#1D4E89] hover:text-blue-800">
                                Ke mentoring platform <span class="ml-1">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
