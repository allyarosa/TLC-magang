@extends('layouts.app')

@section('title', 'Syarat dan Ketentuan - Teaching and Learning Certification')

@section('content')
<main class="pt-28 pb-16 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-brandBlue mb-4">Syarat dan Ketentuan</h1>
            <p class="text-gray-600 text-lg">Terakhir diperbarui: 30 April 2026</p>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 space-y-8">
            <!-- Pembuka -->
            <section>
                <p class="text-gray-700 leading-relaxed">
                    Selamat datang di <strong>Teaching and Learning Certification (TLC)</strong>. Dengan mengakses atau menggunakan platform kami, Anda setuju untuk terikat oleh Syarat dan Ketentuan ini. Harap baca dokumen ini dengan seksama sebelum menggunakan layanan kami.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Jika Anda tidak setuju dengan syarat dan ketentuan ini, mohon untuk tidak menggunakan platform atau layanan TLC.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 1. Definisi -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">1. Definisi</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                    <li><strong>"Platform"</strong> mengacu pada situs web, aplikasi, dan layanan online yang disediakan oleh TLC.</li>
                    <li><strong>"Pengguna"</strong> adalah individu atau entitas yang terdaftar dan menggunakan layanan TLC.</li>
                    <li><strong>"Sertifikasi"</strong> adalah program pelatihan dan ujian yang diselenggarakan oleh TLC.</li>
                    <li><strong>"Konten"</strong> mencakup teks, gambar, video, materi pembelajaran, dan semua materi lainnya yang tersedia di platform.</li>
                    <li><strong>"Layanan"</strong> mengacu pada semua fitur, fungsi, dan program yang disediakan melalui platform TLC.</li>
                </ul>
            </section>

            <hr class="border-gray-200">

            <!-- 2. Pendaftaran dan Akun -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">2. Pendaftaran dan Akun</h2>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">Untuk menggunakan layanan TLC, Anda harus:</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                        <li>Menyediakan informasi yang akurat, lengkap, dan terkini saat pendaftaran</li>
                        <li>Memastikan bahwa Anda berusia minimal 18 tahun</li>
                        <li>Menjaga kerahasiaan kredensial akun Anda</li>
                        <li>Bertanggung jawab atas semua aktivitas yang terjadi di bawah akun Anda</li>
                        <li>Menghubungi kami segera jika Anda mencurigai adanya penggunaan akun yang tidak sah</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">
                        TLC berhak untuk menangguhkan atau menghapus akun yang melanggar syarat dan ketentuan ini atau yang digunakan untuk tujuan yang tidak sah atau tidak pantas.
                    </p>
                </div>
            </section>

            <hr class="border-gray-200">

            <!-- 3. Layanan Sertifikasi -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">3. Layanan Sertifikasi</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">3.1 Pendaftaran Sertifikasi</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Pengguna dapat mendaftar untuk program sertifikasi melalui platform TLC. Pendaftaran dianggap sah setelah pembayaran dikonfirmasi dan akun diverifikasi.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">3.2 Pelaksanaan Ujian</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4">
                            <li>Ujian harus dilaksanakan sesuai dengan jadwal yang telah ditentukan</li>
                            <li>Peserta wajib mematuhi aturan dan tata tertib ujian</li>
                            <li>Kecurangan atau pelanggaran integritas akademik akan mengakibatkan diskualifikasi</li>
                            <li>TLC berhak membatalkan hasil ujian jika ditemukan indikasi kecurangan</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">3.3 Sertifikat</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4">
                            <li>Sertifikat diterbitkan setelah peserta dinyatakan lulus</li>
                            <li>Sertifikat bersifat pribadi dan tidak dapat dipindahtangankan</li>
                            <li>TLC berhak mencabut sertifikat jika ditemukan pelanggaran atau pemalsuan</li>
                            <li>Masa berlaku sertifikat sesuai dengan ketentuan masing-masing skema</li>
                        </ul>
                    </div>
                </div>
            </section>

            <hr class="border-gray-200">

            <!-- 4. Pembayaran dan Pengembalian Dana -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">4. Pembayaran dan Pengembalian Dana</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">4.1 Pembayaran</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4">
                            <li>Semua biaya layanan tercantum di halaman harga atau halaman pendaftaran</li>
                            <li>Pembayaran harus dilakukan sebelum akses layanan diberikan</li>
                            <li>TLC menyediakan berbagai metode pembayaran yang tersedia di platform</li>
                            <li>Harga dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">4.2 Kebijakan Pengembalian Dana</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4">
                            <li>Pengembalian dana dapat diminta dalam waktu 7 hari setelah pembayaran</li>
                            <li>Pengembalian dana tidak berlaku jika layanan sudah digunakan</li>
                            <li>Biaya administrasi dapat dikenakan sesuai ketentuan yang berlaku</li>
                            <li>Permohonan pengembalian dana diajukan melalui email ke <a href="mailto:info@tlcprogram.com" class="text-brandBlue hover:underline">info@tlcprogram.com</a></li>
                        </ul>
                    </div>
                </div>
            </section>

            <hr class="border-gray-200">

            <!-- 5. Hak Kekayaan Intelektual -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">5. Hak Kekayaan Intelektual</h2>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        Semua konten, materi pembelajaran, soal ujian, logo, merek dagang, dan kekayaan intelektual lainnya yang tersedia di platform TLC dilindungi oleh hukum hak cipta dan kekayaan intelektual yang berlaku.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Dilarang keras untuk:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4">
                        <li>Menggandakan, mendistribusikan, atau mempublikasikan konten tanpa izin tertulis</li>
                        <li>Mengubah, menerjemahkan, atau membuat karya turunan dari materi TLC</li>
                        <li>Menjual, menyewakan, atau memanfaatkan konten untuk tujuan komersial</li>
                        <li>Menghapus atau mengubah pemberitahuan hak cipta atau kepemilikan</li>
                    </ul>
                </div>
            </section>

            <hr class="border-gray-200">

            <!-- 6. Ketentuan Penggunaan -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">6. Ketentuan Penggunaan</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Saat menggunakan platform TLC, Anda setuju untuk tidak:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                    <li>Menggunakan platform untuk tujuan yang melanggar hukum atau peraturan yang berlaku</li>
                    <li>Mengunggah atau menyebarkan konten yang melanggar, mengancam, atau merugikan pihak lain</li>
                    <li>Mengakses atau mencoba mengakses sistem, server, atau database TLC tanpa otorisasi</li>
                    <li>Menggunakan bot, scraper, atau alat otomatis lainnya untuk mengakses platform</li>
                    <li>Mengganggu atau membebani infrastruktur teknis platform</li>
                    <li>Menyebarkan malware, virus, atau kode berbahaya lainnya</li>
                    <li>Memberikan informasi palsu atau menyesatkan</li>
                    <li>Melibatkan diri dalam aktivitas yang dapat merusak reputasi TLC</li>
                </ul>
            </section>

            <hr class="border-gray-200">

            <!-- 7. Batasan Tanggung Jawab -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">7. Batasan Tanggung Jawab</h2>
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        TLC menyediakan layanan "sebagaimana adanya" tanpa jaminan apapun, baik tersurat maupun tersirat. Kami tidak menjamin bahwa:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                        <li>Layanan akan tersedia tanpa gangguan, tepat waktu, atau tanpa kesalahan</li>
                        <li>Hasil yang diperoleh dari penggunaan layanan akan akurat atau dapat diandalkan</li>
                        <li>Kualitas produk, layanan, atau informasi yang diperoleh akan memenuhi harapan Anda</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">
                        TLC tidak bertanggung jawab atas kerugian langsung, tidak langsung, insidental, atau konsekuensial yang timbul dari penggunaan atau ketidakmampuan menggunakan layanan kami, termasuk namun tidak terbatas pada kehilangan data, keuntungan, atau peluang bisnis.
                    </p>
                </div>
            </section>

            <hr class="border-gray-200">

            <!-- 8. Force Majeure -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">8. Force Majeure</h2>
                <p class="text-gray-700 leading-relaxed">
                    TLC tidak bertanggung jawab atas keterlambatan atau kegagalan dalam melaksanakan kewajibannya yang disebabkan oleh kejadian di luar kendali kami, termasuk namun tidak terbatas pada bencana alam, perang, pandemi, pemadaman listrik, gangguan internet, atau tindakan pemerintah.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 9. Perubahan Syarat dan Ketentuan -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">9. Perubahan Syarat dan Ketentuan</h2>
                <p class="text-gray-700 leading-relaxed">
                    TLC berhak untuk mengubah, menambah, atau menghapus bagian dari Syarat dan Ketentuan ini kapan saja tanpa pemberitahuan sebelumnya. Perubahan akan berlaku efektif segera setelah dipublikasikan di platform. Penggunaan layanan Anda setelah perubahan tersebut merupakan persetujuan Anda terhadap syarat dan ketentuan yang diperbarui.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 10. Hukum yang Berlaku -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">10. Hukum yang Berlaku</h2>
                <p class="text-gray-700 leading-relaxed">
                    Syarat dan Ketentuan ini diatur oleh dan ditafsirkan sesuai dengan hukum yang berlaku di Republik Indonesia. Setiap sengketa yang timbul dari atau terkait dengan syarat dan ketentuan ini akan diselesaikan melalui musyawarah mufakat terlebih dahulu. Jika tidak tercapai kesepakatan, sengketa akan diselesaikan melalui pengadilan yang berwenang di wilayah hukum Indonesia.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 11. Hubungi Kami -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">11. Hubungi Kami</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Jika Anda memiliki pertanyaan, komentar, atau keluhan terkait Syarat dan Ketentuan ini, silakan hubungi kami melalui:
                </p>
                <div class="bg-gray-50 rounded-xl p-6 space-y-3">
                    <p class="text-gray-700">
                        <strong>Email:</strong>
                        <a href="mailto:info@tlcprogram.com" class="text-brandBlue hover:underline">info@tlcprogram.com</a>
                    </p>
                    <p class="text-gray-700">
                        <strong>Telepon:</strong>
                        <a href="tel:+6281234567890" class="text-brandBlue hover:underline">+62 812-3456-7890</a>
                    </p>
                    <p class="text-gray-700">
                        <strong>Alamat:</strong><br>
                        Jl. Contoh No. 123, Kota, Provinsi, Indonesia
                    </p>
                </div>
            </section>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-10">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-brandBlue hover:text-[#E76F51] font-semibold transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m0 0l7 7m-7-7v14"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</main>
@endsection
