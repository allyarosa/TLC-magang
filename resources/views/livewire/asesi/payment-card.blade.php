 <section id="harga" class="w-full px-5 py-16 bg-gray-50 text-gray-900 shadow-lg">
     <div class="max-w-6xl mx-auto text-center">
         <h2 class="text-4xl font-extrabold text-[#1D4E89] mt-4">Investasi untuk Masa Depan Profesional Anda</h2>
         <div class="w-16 h-1 bg-[#E76F51] mt-3 mb-6 mx-auto"></div>
         <p class="text-gray-700 max-w-3xl mx-auto text-lg">
             Tingkatkan keterampilan, perluas wawasan, dan raih peluang karier terbaik dengan paket pelatihan
             bertahap yang dirancang untuk mendampingi perkembangan Anda dari dasar hingga mahir.
         </p>

         <!-- Progress Path -->
         <div class="flex items-center justify-center gap-4 text-sm font-semibold text-gray-600 mt-8">
             <div class="flex items-center gap-2">
                 <span class="text-green-600">✔</span> Level A
             </div>
             <span>→</span>
             <div class="flex items-center gap-2">
                 <span class="text-gray-400">🔒</span> Level B
             </div>
             <span>→</span>
             <div class="flex items-center gap-2">
                 <span class="text-gray-400">🔒</span> Level C
             </div>
         </div>
     </div>

     <!-- Kartu Paket -->
     <div class="max-w-6xl mx-auto mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">

         <!-- Paket Basic (Level A) -->
         <div
             class="bg-white border border-gray-200 rounded-xl shadow-sm p-8 text-center transition-all  hover:shadow-2xl cursor-pointer">
             <h3 class="text-lg font-bold text-white bg-blue-900 py-3 rounded-lg">LEVEL A - Basic Explorer</h3>
             <p class="text-gray-600 mt-3">Langkah pertama menuju transformasi profesional Anda.</p>
             <p class="text-3xl font-extrabold text-blue-900 mt-5">
                 Rp. {{ number_format($levels[0]->price, 0, ',', '.') }}
             </p>
             <ul class="mt-6 text-left text-gray-700 space-y-3">
                 <li>✔ 5 Modul pembelajaran dasar</li>
                 <li>✔ Sertifikat digital resmi</li>
                 <li>✔ Akses materi online kapan saja</li>
                 <li>✔ Forum diskusi interaktif</li>
                 <li>✔ Akses penuh selama 3 bulan</li>
             </ul>
             <a href="{{ route('payments.create',Vinkla\Hashids\Facades\Hashids::encode($levels[0]->id) }}"
                 class="mt-6 bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-transform transform hover:scale-105 active:scale-95">
                 Mulai Sekarang
             </a>
         </div>

         <!-- Paket Intermediate (Level B - Dikunci) -->
         <div
             class="bg-white border border-gray-200 rounded-xl shadow-sm p-8 text-center opacity-60 cursor-not-allowed">
             <h3 class="text-lg font-bold text-white bg-blue-900 py-3 rounded-lg">LEVEL B - Skilled Achiever</h3>
             <p class="text-gray-600 mt-3">Tersedia setelah Anda menyelesaikan Level A.</p>
             <p class="text-3xl font-extrabold text-blue-900 mt-5">
                 Rp. {{ number_format($levels[1]->price, 0, ',', '.') }}
             </p>
             <ul class="mt-6 text-left text-gray-700 space-y-3">
                 <li>✔ 10 Modul pembelajaran menengah</li>
                 <li>✔ Sertifikat digital & akses komunitas</li>
                 <li>✔ Materi eksklusif tambahan</li>
                 <li>✔ Mentoring grup (2 sesi)</li>
                 <li>✔ Akses selama 6 bulan</li>
             </ul>
             <button class="mt-6 bg-gray-400 text-white px-6 py-3 rounded-lg font-semibold cursor-not-allowed" disabled>
                 Tersedia Setelah Level A
             </button>
         </div>

         <!-- Paket Advanced (Level C - Dikunci) -->
         <div
             class="bg-white border border-gray-200 rounded-xl shadow-sm p-8 text-center opacity-60 cursor-not-allowed">
             <h3 class="text-lg font-bold text-white bg-blue-900 py-3 rounded-lg">LEVEL C - Master Leader</h3>
             <p class="text-gray-600 mt-3">Buka akses setelah menyelesaikan Level B.</p>
             <p class="text-3xl font-extrabold text-blue-900 mt-5">
                 Rp. {{ number_format($levels[2]->price, 0, ',', '.') }}
             </p>
             <ul class="mt-6 text-left text-gray-700 space-y-3">
                 <li>✔ Semua 15 Modul lengkap</li>
                 <li>✔ Sertifikat premium + cetak</li>
                 <li>✔ Sesi mentoring pribadi (6x)</li>
                 <li>✔ Workshop eksklusif (2x)</li>
                 <li>✔ Akses komunitas seumur hidup</li>
                 <li>✔ Paket 3 buku panduan</li>
                 <li>✔ Durasi akses 12 bulan</li>
             </ul>
             <button class="mt-6 bg-gray-400 text-white px-6 py-3 rounded-lg font-semibold cursor-not-allowed" disabled>
                 Selesaikan Level B Terlebih Dahulu
             </button>
         </div>

         <!-- Paket Bundle -->
         {{-- <div class="col-span-1 md:col-span-3 flex justify-center">
                    <div
                        class="bg-gradient-to-b from-orange-500 to-orange-600 text-white border border-orange-500 rounded-xl shadow-sm p-8 text-center relative transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl cursor-pointer w-full md:w-2/3 lg:w-1/2">
                        <span
                            class="absolute top-0 right-0 bg-yellow-400 text-xs font-bold text-gray-900 px-4 py-2 rounded-bl-lg shadow-md">PALING
                            POPULER</span>
                        <h3 class="text-lg font-bold bg-orange-700 py-3 rounded-lg">PAKET BUNDLE - Smart Choice</h3>
                        <p class="mt-3">Solusi lengkap & hemat untuk perjalanan profesional Anda.</p>
                        <p class="text-3xl font-extrabold mt-5">Rp 4.500.000</p>
                        <ul class="mt-6 text-left space-y-3">
                            <li>✔ 10 Modul terfavorit</li>
                            <li>✔ Sertifikat cetak & digital</li>
                            <li>✔ Materi lengkap & up-to-date</li>
                            <li>✔ Mentoring grup (4 sesi)</li>
                            <li>✔ Akses komunitas eksklusif</li>
                            <li>✔ 6 bulan akses fleksibel</li>
                            <li>✔ Bonus buku panduan</li>
                        </ul>
                        <button
                            class="mt-6 bg-orange-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-700 transition-transform transform hover:scale-105 active:scale-95">
                            Pilih Paket Hemat
                        </button>
                    </div>
                </div> --}}

     </div>
 </section>