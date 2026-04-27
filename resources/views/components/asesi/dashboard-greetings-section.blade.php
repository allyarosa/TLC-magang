<div class="flex-1 space-y-4 z-10">
    <div class="space-y-1">
        <span
            class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase bg-brandGreen text-white">
            SELESAIKAN PROFILE ANDA
        </span>
        <h3 class="text-4xl font-display font-extrabold text-gray-700">Halo, {{ Auth::user()->name }}! 👋</h3>
    </div>
    <p class="text-on-surface-variant max-w-md" style="">Kamu sudah hampir selesai, 
        profilmu belum lengkap. Segera lengkapi data profil untuk melanjutkan proses sertifikasi
        pertama.</p>
    <a href="{{ route('asesi.profile') }}"
        class="bg-gradient-to-br from-brandBlue to-[#006684] text-white px-8 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity inline-flex w-fit">
        Lanjutkan Pengisian
        <x-icons :iconName="'arrow_forward'" />
    </a>
</div>
