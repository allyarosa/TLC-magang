<x-mail::message>
# Halo {{ $payment->user->name }},

Selamat! Pembayaran Anda untuk @if($payment->mode === 'custom' && is_array($payment->selected_categories))**Kategori {{ implode(', ', array_map('strtoupper', $payment->selected_categories)) }}** pada Level **{{ $payment->level->level_name ?? 'Sertifikasi Level' }}**@else Level **{{ $payment->level->level_name ?? 'Sertifikasi Level' }}**@endif telah berhasil kami verifikasi.

Berikut adalah rincian transaksi Anda:

- **Order ID:** {{ $payment->order_id }}
- **Nominal:** Rp {{ number_format($payment->amount, 0, ',', '.') }}
- **Metode Pembayaran:** Transfer Bank Manual
- **Waktu Verifikasi:** {{ \Carbon\Carbon::parse($payment->updated_at)->format('d M Y, H:i') }} WIB

**Akses program Anda telah dibuka!**
Anda sekarang dapat mengakses modul pembelajaran dan ujian sertifikasi sesuai dengan program yang Anda beli.

<x-mail::button :url="route('login')">
Mulai Belajar Sekarang
</x-mail::button>

Terima kasih atas kepercayaan Anda kepada Teacher Learning Center.

Salam Hangat,<br>
Tim Support {{ config('app.name') }}
</x-mail::message>
