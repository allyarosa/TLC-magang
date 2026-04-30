@extends('layouts.app')

@section('title', 'Kebijakan Privasi - Teaching and Learning Certification')

@section('content')
<main class="pt-28 pb-16 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-brandBlue mb-4">Kebijakan Privasi</h1>
            <p class="text-gray-600 text-lg">Terakhir diperbarui: 30 April 2026</p>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 space-y-8">
            <!-- Pembuka -->
            <section>
                <p class="text-gray-700 leading-relaxed">
                    Selamat datang di halaman Kebijakan Privasi <strong>Teaching and Learning Certification (TLC)</strong>. Kami berkomitmen untuk melindungi privasi dan keamanan data pribadi Anda. Dokumen ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi pribadi Anda saat menggunakan layanan kami.
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Dengan mengakses atau menggunakan platform TLC, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini. Jika Anda tidak setuju dengan kebijakan ini, mohon untuk tidak menggunakan layanan kami.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 1. Informasi yang Kami Kumpulkan -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">1. Informasi yang Kami Kumpulkan</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">1.1 Informasi yang Anda Berikan</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4">
                            <li>Nama lengkap dan alamat email</li>
                            <li>Nomor telepon dan alamat</li>
                            <li>Data kependudukan saat pendaftaran akun</li>
                            <li>Informasi pembayaran dan transaksi</li>
                            <li>Dokumen identitas untuk verifikasi sertifikasi</li>
                            <li>Konten yang Anda unggah atau kirimkan melalui platform</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">1.2 Informasi yang Dikumpulkan Secara Otomatis</h3>
                        <ul class="list-disc list-inside text-gray-700 space-y-1 ml-4">
                            <li>Alamat IP dan informasi perangkat</li>
                            <li>Jenis browser dan sistem operasi</li>
                            <li>Halaman yang dikunjungi dan waktu akses</li>
                            <li>Data log dan cookies</li>
                            <li>Informasi lokasi geografis (jika diizinkan)</li>
                        </ul>
                    </div>
                </div>
            </section>

            <hr class="border-gray-200">

            <!-- 2. Bagaimana Kami Menggunakan Informasi Anda -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">2. Bagaimana Kami Menggunakan Informasi Anda</h2>
                <p class="text-gray-700 mb-4">Informasi yang kami kumpulkan digunakan untuk:</p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                    <li>Memproses pendaftaran dan verifikasi akun Anda</li>
                    <li>Menyelenggarakan ujian sertifikasi dan menerbitkan sertifikat</li>
                    <li>Mengirimkan notifikasi penting terkait layanan dan akun Anda</li>
                    <li>Meningkatkan kualitas layanan dan pengalaman pengguna</li>
                    <li>Memproses pembayaran dan menerbitkan invoice</li>
                    <li>Mencegah penipuan dan menjaga keamanan platform</li>
                    <li>Mematuhi kewajiban hukum dan regulasi yang berlaku</li>
                    <li>Mengirimkan materi promosi dan penawaran khusus (dengan persetujuan Anda)</li>
                </ul>
            </section>

            <hr class="border-gray-200">

            <!-- 3. Berbagi Informasi dengan Pihak Ketiga -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">3. Berbagi Informasi dengan Pihak Ketiga</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Kami tidak menjual, menyewakan, atau membagikan data pribadi Anda kepada pihak ketiga untuk tujuan komersial. Kami hanya dapat membagikan informasi Anda dalam keadaan berikut:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                    <li><strong>Penyedia Layanan:</strong> Dengan pihak ketiga yang membantu kami mengoperasikan platform (misalnya: payment gateway, layanan hosting, analitik)</li>
                    <li><strong>Kepatuhan Hukum:</strong> Jika diwajibkan oleh hukum, peraturan, atau proses hukum yang berlaku</li>
                    <li><strong>Perlindungan Hak:</strong> Untuk melindungi hak, properti, atau keselamatan TLC, pengguna kami, atau publik</li>
                    <li><strong>Transfer Bisnis:</strong> Dalam hal merger, akuisisi, atau penjualan aset, dengan pemberitahuan sebelumnya</li>
                </ul>
            </section>

            <hr class="border-gray-200">

            <!-- 4. Keamanan Data -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">4. Keamanan Data</h2>
                <p class="text-gray-700 leading-relaxed">
                    Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang sesuai untuk melindungi data pribadi Anda dari akses tidak sah, kehilangan, penyalahgunaan, atau pengungkapan. Langkah-langkah ini termasuk enkripsi data, firewall, kontrol akses, dan pemantauan keamanan secara berkala. Meskipun demikian, tidak ada sistem yang 100% aman, dan kami tidak dapat menjamin keamanan absolut data Anda.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 5. Cookies dan Teknologi Pelacakan -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">5. Cookies dan Teknologi Pelacakan</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Platform kami menggunakan cookies dan teknologi serupa untuk:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                    <li>Mengingat preferensi dan pengaturan Anda</li>
                    <li>Memahami bagaimana Anda menggunakan platform kami</li>
                    <li>Meningkatkan fungsionalitas dan kinerja situs</li>
                    <li>Menyediakan pengalaman yang dipersonalisasi</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Anda dapat mengontrol penggunaan cookies melalui pengaturan browser Anda. Menonaktifkan cookies dapat mempengaruhi fungsionalitas tertentu dari platform kami.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 6. Penyimpanan dan Retensi Data -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">6. Penyimpanan dan Retensi Data</h2>
                <p class="text-gray-700 leading-relaxed">
                    Kami menyimpan data pribadi Anda selama akun Anda aktif atau selama diperlukan untuk menyediakan layanan kepada Anda. Kami juga dapat menyimpan dan menggunakan informasi sesuai dengan kewajiban hukum, penyelesaian sengketa, atau penegakan perjanjian kami. Jika Anda ingin menghapus akun Anda, silakan hubungi kami melalui informasi kontak yang tersedia di bagian bawah halaman ini.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 7. Hak Anda -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">7. Hak Anda</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Sebagai pengguna, Anda memiliki hak-hak berikut terkait data pribadi Anda:
                </p>
                <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
                    <li><strong>Akses:</strong> Meminta salinan data pribadi yang kami simpan tentang Anda</li>
                    <li><strong>Koreksi:</strong> Meminta perbaikan data yang tidak akurat atau tidak lengkap</li>
                    <li><strong>Penghapusan:</strong> Meminta penghapusan data pribadi Anda dalam kondisi tertentu</li>
                    <li><strong>Pembatasan:</strong> Meminta pembatasan pemrosesan data pribadi Anda</li>
                    <li><strong>Portabilitas:</strong> Menerima data Anda dalam format yang terstruktur dan umum digunakan</li>
                    <li><strong>Keberatan:</strong> Menolak pemrosesan data pribadi Anda untuk tujuan tertentu</li>
                    <li><strong>Penarikan Persetujuan:</strong> Menarik persetujuan yang telah Anda berikan kapan saja</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Untuk menggunakan hak-hak ini, silakan hubungi kami melalui email di <a href="mailto:info@tlcprogram.com" class="text-brandBlue hover:underline font-medium">info@tlcprogram.com</a>.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 8. Privasi Anak-Anak -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">8. Privasi Anak-Anak</h2>
                <p class="text-gray-700 leading-relaxed">
                    Layanan kami tidak ditujukan untuk individu di bawah usia 18 tahun. Kami tidak secara sengaja mengumpulkan data pribadi dari anak-anak. Jika kami mengetahui bahwa kami telah mengumpulkan data dari seseorang di bawah usia 18 tahun tanpa verifikasi persetujuan orang tua, kami akan segera menghapus informasi tersebut.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 9. Tautan ke Situs Pihak Ketiga -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">9. Tautan ke Situs Pihak Ketiga</h2>
                <p class="text-gray-700 leading-relaxed">
                    Platform kami mungkin mengandung tautan ke situs web pihak ketiga. Kami tidak bertanggung jawab atas praktik privasi atau konten dari situs web tersebut. Kami menyarankan Anda untuk membaca kebijakan privasi setiap situs web yang Anda kunjungi sebelum memberikan informasi pribadi.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 10. Perubahan Kebijakan Privasi -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">10. Perubahan Kebijakan Privasi</h2>
                <p class="text-gray-700 leading-relaxed">
                    Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu untuk mencerminkan perubahan pada praktik kami atau untuk alasan operasional, hukum, atau peraturan lainnya. Setiap perubahan material akan diberitahukan kepada Anda melalui email atau pemberitahuan yang mencolok di platform kami. Kami mendorong Anda untuk meninjau halaman ini secara berkala untuk informasi terbaru tentang praktik privasi kami.
                </p>
            </section>

            <hr class="border-gray-200">

            <!-- 11. Hubungi Kami -->
            <section>
                <h2 class="text-2xl font-bold text-brandBlue mb-4">11. Hubungi Kami</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Jika Anda memiliki pertanyaan, kekhawatiran, atau permintaan terkait Kebijakan Privasi ini atau praktik privasi kami, silakan hubungi kami melalui:
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
