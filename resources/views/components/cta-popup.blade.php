<div 
    x-data="{ open: false }"
    x-init="
        setTimeout(() => {
            open = true;
        }, 5000);
    "
>
    <!-- Overlay -->
    <div 
        x-show="open"
        x-transition.opacity.duration.300ms
        class="fixed inset-0 bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50"
    >
        <!-- Popup Card -->
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="bg-white rounded-2xl shadow-2xl w-11/12 max-w-md p-6 relative text-center"
        >

            <!-- Tombol X -->
            <button 
                @click="open = false"
                class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-xl font-bold"
            >
                ×
            </button>

            <!-- Konten -->
            <h2 class="text-2xl font-bold text-[#1D4E89] mb-3 leading-snug">
                Level Up Kompetensimu 🚀<br>Mulai Sertifikasi TLC!
            </h2>

            <p class="text-gray-600 mb-6 leading-relaxed">
                Tingkatkan kompetensi mengajar Anda dan jadilah bagian dari transformasi pendidikan digital.
            </p>

            <!-- CTA Button -->
            <a 
                href="/register"
                class="block w-full bg-[#1D4E89] text-white py-3 rounded-xl font-semibold hover:bg-[#14406B] transition-all duration-300 hover:scale-105 active:scale-95 shadow-md"
            >
                Daftar Sekarang!
            </a>
        </div>
    </div>
</div>

