<div class="mb-6 mt-6">
    <div class="flex items-center gap-3">
        <!-- Harga setelah diskon -->
        <span class="text-3xl font-extrabold text-{{ $textColor }}">
            Rp {{ number_format($price - ($price * $discount) / 100, 0, ',', '.') }}
        </span>

        <!-- Badge diskon -->
        @if ($discount > 0)
            <span class="bg-red-500 text-white text-sm font-bold px-2 py-1 rounded-lg">
                -{{ $discount }}%
            </span>
        @endif
    </div>

    <!-- Harga asli slash -->
    @if ($discount > 0)
        <div class="mt-1">
            <span class="text-gray-400 line-through text-lg">
                Rp {{ number_format($price, 0, ',', '.') }}
            </span>
        </div>
    @endif

    <!-- Optional: hemat -->
    {{-- <div class="mt-1 text-green-500 text-sm font-semibold">
        Hemat Rp {{ number_format($price * $discount / 100, 0, ',', '.') }}
    </div> --}}
</div>
