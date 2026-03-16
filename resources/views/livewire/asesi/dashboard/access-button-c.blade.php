<div>
    @if (auth()->user()->hasPermissionTo('access_level_C'))
        <a href="{{ route('asesi.sertifikasi') }}"
            class="w-full flex items-center justify-center gap-2 py-3 bg-[#E76F51] text-white font-semibold rounded-xl hover:bg-[#d65f41] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Akses Materi
        </a>
    @elseif (auth()->user()->hasPermissionTo('level_B_completed'))
        <a href="{{ route('payments.create', Hashids::encode($levels[2]->id)) }}"
            class="w-full flex items-center justify-center gap-2 py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white rounded-xl hover:opacity-90 transition-opacity font-semibold shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Daftar Sekarang
        </a>
    @else
        <button disabled
            class="w-full flex items-center justify-center gap-2 py-3 bg-gray-100 text-gray-400 font-semibold rounded-xl cursor-not-allowed">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            Belum Dibuka
        </button>
    @endif
</div>
