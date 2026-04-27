@php
    $completions = '';
    if ($profileCompletion >= 100) {
        $completions = 'Selesai';
    } else {
        $completions = 'Belum Lengkap';
    }
@endphp

<div class="relative w-48 h-48 flex items-center justify-center shrink-0">
    <!-- Progress Donut -->
    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 192 192">
        <circle class="text-brandGreen/50" cx="96" cy="96" r="80" fill="transparent" stroke="currentColor"
            stroke-width="12">
        </circle>

        <circle class="text-brandGreen-dark" cx="96" cy="96" r="80" fill="transparent"
            stroke="currentColor" stroke-width="12" stroke-linecap="round" stroke-dasharray="502.65"
            style="stroke-dashoffset: calc(502.65 - (502.65 * {{ $profileCompletion }}) / 100); transition: stroke-dashoffset 0.5s ease;">
        </circle>
    </svg>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
        <span class="text-3xl font-display font-black text-gray-700" style="">
            {{ $profileCompletion }}%
        </span>
        <span class="text-[10px] font-bold text-outline text-gray-700 uppercase tracking-tighter" style="">
            {{ $completions }}
        </span>
    </div>
</div>
