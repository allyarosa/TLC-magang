<div class="relative rounded-2xl overflow-hidden shadow-2xl group flex items-center justify-center min-h-[380px]"
    style="background: linear-gradient(135deg, #0d1b5e 0%, #1D4E89 40%, #2A6BAD 70%, #1a3a6e 100%);">
    <!-- Decorative background circles -->
    <div class="absolute top-[-40px] right-[-40px] w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
    <div
        class="absolute bottom-[-30px] left-[-30px] w-48 h-48 bg-[#E76F51]/10 rounded-full blur-2xl pointer-events-none">
    </div>
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-blue-400/10 rounded-full blur-3xl pointer-events-none">
    </div>
    <!-- Subtle dot grid overlay -->
    <div class="absolute inset-0 opacity-5 pointer-events-none"
        style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 28px 28px;">
    </div>
    <!-- TMF Logo -->
    <div class="relative z-10 flex flex-col items-center justify-center transition-transform duration-500 p-4">
        <img src="{{ asset('assets/img/TMF_logo.webp') }}" alt="Teaching Mastery Framework"
            class="w-full max-w-xs drop-shadow-2xl" loading="lazy">
        <div class="mt-4 text-center">
            <span
                class="inline-block bg-gradient-to-r from-brandGreen-dark to-brandGreen backdrop-blur-sm text-white text-xs font-semibold px-4 py-1.5 rounded-md">
                TEACHING MASTERY FRAMEWORK
            </span>
        </div>
    </div>
</div>
