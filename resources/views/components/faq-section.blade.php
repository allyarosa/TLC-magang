<section id="faq" class="w-full px-5 py-16 bg-white text-gray-900 ">
    <!-- Header -->
    <div class="text-center mb-4 md:mb-4">
        <livewire:title-section title="Frequently Asked Questions"
            subTitle="Temukan jawaban untuk pertanyaan yang sering diajukan tentang program TLC" />
    </div>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-sm">
        <!-- FAQ List -->
        <div class="space-y-4 text-left">
            <div
                class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                <h3 class="text-[#1D4E89] text-md font-semibold flex justify-between items-center">
                    Apa itu Teaching and Learning Certification (TLC)?
                    <span class="faq-icon transition-transform duration-300">▼</span>
                </h3>
                <p class="faq-answer hidden mt-2 text-gray-600">
                    TLC adalah program sertifikasi dari HAFECS yang bertujuan meningkatkan kemampuan
                    mengajar guru
                    dan calon guru dengan pendekatan Teaching Mastery Framework (TMF).
                </p>
            </div>

            <div
                class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                <h3 class="text-[#1D4E89] text-md font-medium flex justify-between items-center">
                    Apa saja level dalam TLC?
                    <span class="faq-icon transition-transform duration-300">▼</span>
                </h3>
                <p class="faq-answer hidden mt-2 text-gray-600">
                    TLC memiliki 3 level: Level A - Teaching Knowledge Certification, Level B - Teaching
                    Activation
                    Certification, dan Level C - Teaching Mastery Certification. Setiap level ditempuh
                    selama 3
                    bulan dan fokus pada peningkatan keterampilan secara bertahap.
                </p>
            </div>

            <div
                class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md ">
                <h3 class="text-[#1D4E89] text-md font-medium flex justify-between items-center">
                    Siapa yang bisa mengikuti program TLC?
                    <span class="faq-icon transition-transform duration-300">▼</span>
                </h3>
                <p class="faq-answer hidden mt-2 text-gray-600">
                    Program ini terbuka untuk Mahasiswa FKIP (calon guru), Lulusan pendidikan atau guru
                    pemula
                    (kurang dari 2 tahun mengajar), Guru berpengalaman (lebih dari 2 tahun mengajar), dan
                    Pendidik/Trainer dalam suatu Instansi.
                </p>
            </div>

            <div
                class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md ">
                <h3 class="text-[#1D4E89] text-md font-medium flex justify-between items-center">
                    Apa yang dilakukan di Level A?
                    <span class="faq-icon transition-transform duration-300">▼</span>
                </h3>
                <p class="faq-answer hidden mt-2 text-gray-600">
                    Di Level A, peserta akan mengerjakan tugas di LMS (modul ajar, PPT, self-review),
                    mengikuti 12
                    kali pelatihan online/offline, dan mengikuti tes teori PCK, HOTS, Literasi, dan
                    Numerasi.
                </p>
            </div>

            <div
                class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                <h3 class="text-[#1D4E89] text-md font-medium flex justify-between items-center">
                    Apa saja manfaat mengikuti program ini?
                    <span class="faq-icon transition-transform duration-300">▼</span>
                </h3>
                <p class="faq-answer hidden mt-2 text-gray-600">
                    Peserta akan mendapatkan Sertifikat Kompetensi resmi ber-NPSN, Gelar non-formal, Laporan
                    hasil
                    ujian, Modul dan worksheet digital, Akses ke webinar dan forum guru profesional, serta
                    Jaringan
                    guru dari seluruh Indonesia.
                </p>
            </div>

            <div
                class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                <h3 class="text-[#1D4E89] text-md font-medium flex justify-between items-center">
                    Bagaimana teknis pelaksanaannya?
                    <span class="faq-icon transition-transform duration-300">▼</span>
                </h3>
                <p class="faq-answer hidden mt-2 text-gray-600">
                    Pelaksanaan selama 3 bulan per level melalui platform LMS Elevate. Terdapat ujian teori,
                    pengumpulan perangkat ajar, dan pengumpulan video pengajaran. Penjadwalan fleksibel,
                    bisa
                    dilakukan secara online maupun offline.
                </p>
            </div>

            <div
                class="faq-item bg-white p-4 border border-gray-300 rounded-lg cursor-pointer shadow-sm transition-all duration-300 hover:bg-blue-50 hover:shadow-md">
                <h3 class="text-[#1D4E89] text-md font-medium flex justify-between items-center">
                    Apakah program ini bisa diikuti secara online?
                    <span class="faq-icon transition-transform duration-300">▼</span>
                </h3>
                <p class="faq-answer hidden mt-2 text-gray-600">
                    Ya, semua kegiatan dapat diikuti secara online sehingga peserta dari seluruh daerah bisa
                    ikut
                    tanpa hambatan lokasi.
                </p>
            </div>
        </div>
    </div>

    <!-- Script untuk Interaktif FAQ -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let faqItems = document.querySelectorAll(".faq-item");

            faqItems.forEach(item => {
                item.addEventListener("click", function() {
                    let answer = this.querySelector(".faq-answer");
                    let icon = this.querySelector(".faq-icon");

                    // Tutup semua jawaban yang lain sebelum membuka yang diklik
                    document.querySelectorAll(".faq-answer").forEach(ans => {
                        if (ans !== answer) {
                            ans.classList.add("hidden");
                            ans.style.opacity = "0";
                            ans.parentElement.querySelector(".faq-icon").style.transform =
                                "rotate(0deg)";
                        }
                    });

                    if (answer.classList.contains("hidden")) {
                        answer.classList.remove("hidden");
                        answer.style.opacity = "1";
                        icon.style.transform = "rotate(180deg)";
                    } else {
                        answer.classList.add("hidden");
                        answer.style.opacity = "0";
                        icon.style.transform = "rotate(0deg)";
                    }
                });
            });
        });
    </script>
</section>
