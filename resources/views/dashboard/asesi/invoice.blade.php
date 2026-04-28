<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice - {{ $payment->order_id }}</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; color: #333; margin: 0; padding: 20px; }
        .invoice-container { max-width: 800px; margin: auto; padding: 30px; }
        .title { font-size: 36px; font-weight: bold; color: #4F46E5; }
        .invoice-details { text-align: right; }
        .invoice-details p { margin: 2px 0; }
        .section-title { font-size: 16px; font-weight: bold; border-bottom: 2px solid #eee; padding-bottom: 5px; margin-bottom: 15px; margin-top: 30px; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .info-table th, .info-table td { text-align: left; padding: 12px; border-bottom: 1px solid #eee; }
        .info-table th { background-color: #f8f9fa; color: #555; }
        .info-table td.amount { text-align: right; }
        .info-table th.amount { text-align: right; }
        .total-row { font-weight: bold; font-size: 18px; }
        .footer { margin-top: 50px; text-align: center; color: #777; font-size: 12px; border-top: 1px solid #eee; padding-top: 20px; }
        .status-badge { display: inline-block; padding: 5px 10px; border-radius: 4px; font-weight: bold; font-size: 12px; background-color: #D1FAE5; color: #065F46; text-transform: uppercase; }
    </style>
</head>
<body>
    <div class="invoice-container">
        <table style="width: 100%; margin-bottom: 40px;">
            <tr>
                <td style="vertical-align: top;">
                    <h1 class="title" style="margin: 0; padding: 0;">INVOICE</h1>
                    <p style="color: #777; margin: 5px 0 0 0;">Teacher Learning Center (TLC)</p>
                </td>
                <td style="text-align: right; vertical-align: top;">
                    <h3 style="margin: 0; padding: 0;">Order ID: {{ $payment->order_id }}</h3>
                    <p style="margin: 5px 0 0 0;">Tanggal: {{ \Carbon\Carbon::parse($payment->payment_time ?? $payment->created_at)->format('d M Y') }}</p>
                    <p style="margin: 5px 0 0 0;">Status: <span class="status-badge">{{ $payment->status }}</span></p>
                </td>
            </tr>
        </table>

        <div class="section-title">Informasi Pelanggan</div>
        <table style="width: 100%; margin-bottom: 30px;">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <strong>Nama:</strong> {{ $payment->user->name ?? '-' }}<br>
                    <strong>Email:</strong> {{ $payment->user->email ?? '-' }}<br>
                    @if($payment->user->school)
                    <strong>Instansi:</strong> {{ $payment->user->school ?? '-' }}
                    @endif
                </td>
                <td style="width: 50%; vertical-align: top; text-align: right;">
                    <strong>Metode Pembayaran:</strong><br>
                    @if($payment->payment_method == 'manual')
                        Transfer Bank (Manual)
                    @else
                        Midtrans / Payment Gateway
                    @endif
                </td>
            </tr>
        </table>

        <div class="section-title">Detail Pesanan</div>
        <table class="info-table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 60%;">Deskripsi Program</th>
                    <th class="amount" style="width: 35%;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sertifikasi Guru - Level {{ $payment->level->level_name ?? '' }}</td>
                    <td class="amount">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right; font-weight: bold;">Total Pembayaran</td>
                    <td class="amount total-row">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Terima kasih telah melakukan pembayaran di Teacher Learning Center.</p>
            <p>Invoice ini dibuat secara otomatis oleh sistem dan merupakan bukti pembayaran yang sah.</p>
        </div>
    </div>
</body>
</html>
