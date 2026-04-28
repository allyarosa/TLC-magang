<x-mail::message>
# Halo {{ $payment->user->name }},

Selamat! Pembayaran Anda untuk **{{ $payment->level->level_name ?? 'Sertifikasi Level' }}** telah berhasil kami verifikasi.

Berikut adalah rincian transaksi Anda:

- **Order ID:** {{ $payment->order_id }}
- **Nominal:** Rp {{ number_format($payment->amount, 0, ',', '.') }}
- **Metode Pembayaran:** Transfer Bank Manual
- **Waktu Verifikasi:** {{ \Carbon\Carbon::parse($payment->updated_at)->format('d M Y, H:i') }} WIB

**Akses Level Anda telah dibuka!**
Anda sekarang dapat mengakses modul pembelajaran dan ujian sertifikasi sesuai dengan program yang Anda beli.

<x-mail::button :url="route('asesi.dashboard')">
Mulai Belajar Sekarang
</x-mail::button>

Terima kasih atas kepercayaan Anda kepada Teacher Learning Center.

Salam Hangat,<br>
Tim Support {{ config('app.name') }}
</x-mail::message>
