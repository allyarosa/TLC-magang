@if (Auth::user()->hasPermissionTo('level_A_completed'))
    @if (Auth::user()->hasFilledSurvey())
        <p class="text-slate-300 text-base max-w-xl">
            Selamat! Anda telah menyelesaikan seluruh rangkaian ujian. Sertifikat kompetensi Anda
            kini siap untuk diunduh.
        </p>
    @else
        <p class="text-slate-300 text-base max-w-xl">
            Silakan klaim sertifikat Anda dengan menyelesaikan survei kepuasan terlebih dahulu.
        </p>
    @endif
@else
    <p class="text-slate-400 text-base max-w-xl">
        Perjalanan Anda belum selesai. Lanjutkan progres untuk membuka akses sertifikat eksklusif
        Level A.
    </p>
@endif