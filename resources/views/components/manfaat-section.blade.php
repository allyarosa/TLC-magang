<section id="manfaatProgram" class="w-full py-20 bg-gradient-to-t from-[#1D4E89]/5 to-white text-gray-900">
    <div class="max-w-6xl mx-auto text-center px-6">
        <livewire:title-section title="Transformasi Karir yang Nyata"
            subTitle="Program Teaching and Learning Certification memberikan manfaat konkret yang telah terbukti mengubah perjalanan karir ribuan pendidik profesional di Indonesia." />
    </div>

    <div class="max-w-6xl mx-auto mt-10 px-6">
        <div class="grid md:grid-cols-2 gap-8 items-start">

            <!-- Kiri: Gambar -->
            <div class="hidden lg:block sticky top-24">
                <img src="{{ asset('images/career.png') }}" alt="Manfaat Program"
                    class="w-full h-full object-cover scale-110">
            </div>

            <!-- Kanan: 6 Card 2 Kolom -->
            <div class="grid grid-cols-2 gap-4">
                {{-- Row 1: Blue --}}
                <x-manfaat-card 
                    title="Sertifikat NPSN Resmi" 
                    description="Sertifikat berstandar nasional yang tercatat resmi di database Kemendikbud."
                    hex="#1D4E89" 
                />
                <x-manfaat-card 
                    title="Toolkit Premium" 
                    description="Worksheet dan template siap pakai untuk menghemat waktu persiapan mengajar."
                    hex="#1D4E89" 
                />

                {{-- Row 2: Green --}}
                <x-manfaat-card 
                    title="Gelar Profesional" 
                    description="Gelar non-formal bergengsi untuk memperkuat profil LinkedIn dan CV Anda."
                    hex="#2A9D8F" 
                />
                <x-manfaat-card 
                    title="Jaringan Guru Elite" 
                    description="Komunitas eksklusif pendidik profesional dengan akses mentoring dan kolaborasi."
                    hex="#2A9D8F" 
                />

                {{-- Row 3: Orange --}}
                <x-manfaat-card 
                    title="Analisis Kompetensi" 
                    description="Laporan mendalam tentang kekuatan Anda beserta rekomendasi pengembangan karir."
                    hex="#E76F51" 
                />
                <x-manfaat-card 
                    title="Webinar Eksklusif" 
                    description="Sesi live bulanan bersama pakar pendidikan untuk insight dan networking premium."
                    hex="#E76F51" 
                />
            </div>
        </div>
    </div>
</section>