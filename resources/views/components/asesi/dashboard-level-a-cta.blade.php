<div
    class="lg:col-span-8 bg-white p-8 rounded-xl shadow-Ambient flex flex-col md:flex-row items-center gap-8 relative overflow-hidden">
    <div class="flex-1 space-y-4 z-10">
        <div class="space-y-1">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase bg-brandGreen text-white">
                Pendaftaran Level A
            </span>
            <h3 class="text-4xl font-display font-extrabold text-gray-700">Halo, {{ Auth::user()->name }}! 👋</h3>
        </div>
        <p class="text-on-surface-variant max-w-md" style="">Kamu tinggal selangkah lagi menuju sertifikasi Level A
            Segera melakukan pendaftaran Level A untuk melanjutkan Perjalanan Kompetensimu!</p>
        <a href="{{  route('payments.create', Hashids::encode($levels[0]->id)) }}"
            class="bg-gradient-to-br from-brandBlue to-[#006684] text-white px-8 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity inline-flex w-fit">
            Daftar Sekarang
            <x-icons :iconName="'arrow_forward'" />
        </a>
    </div>

    {{-- <x-asesi.dashboard-progress-donut :profileCompletion="$profileCompletion" /> --}}
    <x-asesi.dashboard-level-card/>
</div>
