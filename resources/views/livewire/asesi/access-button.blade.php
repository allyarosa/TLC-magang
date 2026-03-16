<div>
    @if (auth()->user()->hasPermissionTo('access_level_A'))
        <a href="{{ route('asesi.sertifikasi') }}"
            class="w-full flex items-center justify-center gap-2 py-3 bg-[#1D4E89] text-white font-semibold rounded-xl hover:bg-[#163a6a] transition-colors">
            <i class="fas fa-circle-check"></i>
            Akses Materi
        </a>
    @else
        <a href="{{ route('payments.create', Hashids::encode($levels[0]->id)) }}"
            class="w-full flex items-center justify-center gap-2 py-3 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white rounded-xl hover:opacity-90 transition-opacity font-semibold shadow-lg">
            <i class="fas fa-pen-to-square"></i>
            Daftar Sekarang
        </a>
    @endif
</div>
