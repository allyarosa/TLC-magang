<!-- Halaman 2: Detail Sertifikasi Level C -->
<div id="detail_sertifikasi_page" class="page-section py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        {{-- <div class="flex items-center mb-4">
            <!-- Link "Kembali ke Status Sertifikasi" -->
            <a wire:navigate href="{{ route('asesi.sertifikasi') }}" class="mt-5 flex items-center text-blue-600 hover:text-blue-800 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="font-medium text-sm sm:text-base">Kembali ke Status Sertifikasi</span>
            </a>
        </div> --}}

        <!-- Main Content Card -->
        <div class="bg-white rounded-lg shadow-sm p-4 sm:p-6 lg:p-8">
            {{-- <h1 class="text-sm sm:text-xl lg:text-3xl  font-bold text-gray-700 mb-6">Progres Teaching Mastery Certification Level A</h1> --}}

            <!-- Certificate Summary -->

            <div
                class="bg-gradient-to-r from-[#1D4E89] via-[#1D4E89] to-[#1D4E89] p-4 sm:p-6 rounded-xl mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between shadow-lg border gap-4">
                <div class="flex items-center">
                    {{-- <img src="/" alt="Certificate Icon" class="w-12 h-12 sm:w-14 sm:h-14 mr-4 sm:mr-5"> --}}
                    <div>
                        <p class="text-3xl  font-bold text-white mb-1">Teaching Mastery Certification Level A
                        </p>
                        @if (Auth::user()->hasPermissionTo('level_A_completed'))
                            <p class="text-white text-xs sm:text-sm">Selamat! Anda telah menyelesaikan semua persyaratan
                                sertifikasi.</p>
                        @else
                            <p class="text-white text-xs sm:text-sm">Lanjutkan progres anda untuk menyelesaikan
                                sertifikasi Level A</p>
                        @endif
                    </div>
                </div>
                <div class="flex gap-3">
                    @if ($hasAccessA)
                        @if (Auth::user()->hasPermissionTo('level_A_completed'))
                            <a href="{{ route('asesi.downloadCertificate', Vinkla\Hashids\Facades\Hashids::encode(Auth::id())) }}"
                                class="flex-1 font-medium py-3 px-1.5 rounded-xl transform transition duration-300 focus:outline-none bg-yellow-400 hover:bg-yellow-400 text-gray-800 cursor-pointer text-center block border-2 border-gray-600">
                                Download Sertifikat <i class="fas fa-award mr-2"></i>
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
            <div class="grid grid-cols-1 xl:grid-cols-1 gap-8 mb-8">
                <!-- Riwayat Submisi -->
                <div
                    class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 border border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-700 mb-2">Riwayat Ujian Penilaian</h2>
                            <p class="text-gray-600 text-sm">Lihat perkembangan dan hasil ujian Anda</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <div class="flex items-center space-x-2 bg-yellow-50 px-4 py-2 rounded-full">
                                <span class="text-sm font-medium text-yellow-700">
                                    {{ count($exams) }} Ujian Selesai
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-yellow-400 to-yellow-500">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                            </svg>
                                            Kategori
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Benar
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Salah
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Tanggal
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                            </svg>
                                            Nilai
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($exams as $exam)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150 group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 rounded-lg bg-gradient-to-br from-yellow-100 to-yellow-200 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-yellow-600" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $exam->categoryA->name }}</div>
                                                    <div class="text-xs text-gray-500">Total:
                                                        {{ $exam->correct_answers + $exam->wrong_answers }} Soal</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-2 w-16 bg-gray-200 rounded-full overflow-hidden mr-2">
                                                    <div class="h-full bg-green-500 rounded-full"
                                                        style="width: {{ $exam->correct_answers + $exam->wrong_answers > 0
                                                            ? ($exam->correct_answers / ($exam->correct_answers + $exam->wrong_answers)) * 100
                                                            : 0 }}%">
                                                    </div>
                                                </div>
                                                <span
                                                    class="text-sm font-medium text-gray-900">{{ $exam->correct_answers }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-2 w-16 bg-gray-200 rounded-full overflow-hidden mr-2">
                                                    <div class="h-full bg-red-500 rounded-full"
                                                        style="width: {{ $exam->correct_answers + $exam->wrong_answers > 0
                                                            ? ($exam->wrong_answers / ($exam->correct_answers + $exam->wrong_answers)) * 100
                                                            : 0 }}%">
                                                    </div>
                                                </div>
                                                <span
                                                    class="text-sm font-medium text-gray-900">{{ $exam->wrong_answers }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $exam->start_time ? $exam->start_time->format('d M Y') : '-' }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{ $exam->start_time ? $exam->start_time->format('H:i') . ' WIB' : '-' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-700">{{ $exam->score ?? 0 }}
                                                    Point
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-12 w-12 text-gray-400 mb-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada data ujian
                                                </h3>
                                                <p class="text-gray-500 text-sm">Mulai ujian pertama Anda untuk melihat
                                                    riwayat di sini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if (count($exams) > 0)
                        <div class="mt-6 flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                Menampilkan <span class="font-medium">{{ count($exams) }}</span> hasil ujian
                            </div>
                            {{-- <div class="flex space-x-2">
                                <button
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                    < Previous </button>
                                        <button
                                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                            Next >
                                        </button>
                            </div> --}}
                        </div>
                    @endif
                </div>

                <!-- Riwayat Ujian Penilaian -->
                {{-- <div
                    class="bg-white rounded-lg shadow-lg p-4 sm:p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800 mb-2">Riwayat Ujian Penilaian</h2>
                    <div class="w-20 sm:w-24 h-1 bg-yellow-400 mb-6"></div>

                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-yellow-300">
                                        <tr>
                                            <th
                                                class="px-3 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Kategori</th>
                                            <th
                                                class="px-3 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Tanggal</th>
                                            <th
                                                class="px-3 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                                Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($exams as $exam)
                                            <tr>
                                                <td
                                                    class="px-3 py-4 text-xs sm:text-sm text-gray-700 whitespace-nowrap">
                                                    {{ $exam->categoryA->name }}</td>
                                                <td
                                                    class="px-3 py-4 text-xs sm:text-sm text-gray-700 whitespace-nowrap">
                                                    {{ $exam->start_time->format('d M Y') }}</td>
                                                <td class="px-3 py-4 text-xs sm:text-sm text-gray-700">
                                                    {{ $exam->score }}</td>
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
                </div> --}}
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Forum Diskusi Card -->

                <div
                    class="bg-[#1D4E89] rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <div class="h-3"></div>
                    <div class="bg-white rounded-t-xl p-6">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Forum diskusi</h2>
                        </div>
                        <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                            Tanyakan langsung, diskusi langsung, belajar langsung. Terhubung dengan para expert dan
                            mentor bersertifikat untuk memecahkan kasus nyata yang kamu hadapi di kelas atau proyekmu.
                        </p>
                        <div class="text-right">
                            {{-- <a href="https://chat.whatsapp.com/GpICk4Co6H1Fv3kgnxhRJ5" class="text-sm font-semibold text-[#1D4E89] hover:text-blue-800">
                                Ke forum diskusi <span class="ml-1">&rarr;</span>
                            </a> --}}
                            <p class="text-sm font-semibold text-[#1D4E89] hover:text-blue-800">
                                Coming Soon <span class="ml-1">&rarr;</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-[#1D4E89] rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <div class="h-3"></div>
                    <div class="bg-white rounded-t-xl p-6">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-50" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.124-1.282-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.124-1.282.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Mentoring Platform</h2>
                        </div>
                        <p class="text-gray-600 mb-6 text-sm leading-relaxed">
                            Tanyakan langsung, diskusi langsung, belajar langsung. Terhubung dengan para expert dan
                            mentor bersertifikat untuk memecahkan kasus nyata yang kamu hadapi di kelas atau proyekmu.
                        </p>
                        <div class="text-right">
                            {{-- <a href="#" class="text-sm font-semibold text-[#1D4E89] hover:text-blue-800">
                                Ke mentoring platform <span class="ml-1">&rarr;</span>
                            </a> --}}
                            <p class="text-sm font-semibold text-[#1D4E89] hover:text-blue-800">
                                Coming Soon <span class="ml-1">&rarr;</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
