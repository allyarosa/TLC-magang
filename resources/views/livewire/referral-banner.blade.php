<div id="referral-banner"
    class="fixed w-full text-white py-2 px-4 overflow-hidden hidden"
    style="top: 80px; z-index: 19; background: linear-gradient(90deg, #1a1f6e 0%, #2c2473 40%, #1d1a6b 70%, #16144f 100%);"
    wire:ignore>
    <!-- Subtle shimmer/glow effect -->
    <div class="absolute inset-0 pointer-events-none"
        style="background: radial-gradient(ellipse at 20% 50%, rgba(255,200,50,0.08) 0%, transparent 60%), radial-gradient(ellipse at 80% 50%, rgba(120,80,255,0.1) 0%, transparent 60%);">
    </div>
    <div class="max-w-7xl mx-auto flex items-center justify-center gap-3 relative z-10">
        <!-- Gift icon -->
        <span class="text-yellow-400 text-xl flex-shrink-0" aria-hidden="true">🎁</span>
        <p class="text-sm sm:text-base font-normal text-center leading-snug">
            {{ $title }}
            <span class="font-extrabold text-yellow-400">{{ $reward }}</span>
        </p>
        <a href="{{ $link }}"
            class="referral-btn flex-shrink-0 inline-flex items-center gap-1.5 text-white border-white border-2 font-medium text-xs sm:text-sm px-4 py-1 rounded-md shadow-md transition-all duration-300 ml-2">
            {{ $buttonText }}
        </a>
    </div>
    <!-- Close button -->
    <button onclick="document.getElementById('referral-banner').style.display='none'"
        class="absolute right-4 top-1/2 -translate-y-1/2 text-white/60 hover:text-white transition-colors duration-200 p-1 rounded-full hover:bg-white/10"
        aria-label="Tutup banner">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
