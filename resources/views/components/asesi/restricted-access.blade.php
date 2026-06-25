<div class="flex items-center justify-center min-h-[90vh] md:ml-64">
    <div class="max-w-md w-full p-8 text-center transition-all duration-300">
        <!-- Icon Lock dengan Efek Soft Blue -->
        <div class="mx-auto w-40 h-40 rounded-full flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-8xl text-brandBlue/30" style="font-variation-settings: 'FILL' 1, 'wght' 400">
                lock_person
            </span>
        </div>

        <!-- Judul Utama -->
        <h2 class="text-2xl font-bold text-gray-600 tracking-tight mb-3">
            Akses Fitur Terbatas
        </h2>

        <!-- Copywriting Penjelasan -->
        <p class="text-gray-500 text-sm leading-relaxed mb-8">
            Halaman Tugas Saya belum dapat diakses karena Anda belum terdaftar dalam program pelatihan atau batch sertifikasi yang aktif.
        </p>

        <!-- Tombol Aksi (Call to Action) -->
        <div class="space-y-3">
            <a href="{{ route('payments.create', Hashids::encode($levels[0]->id)) }}" 
               class="text-brandBlue hover:text-brandBlue-dark underline text-sm font-semibold transition-all">
                Daftar Sertifikasi
            </a>
        </div>
    </div>
</div>
