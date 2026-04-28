<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran - Teacher Learning Center</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        
        @if($payment->payment_method == 'manual')
            <!-- Header / Status Manual -->
            <div class="bg-blue-600 p-6 text-center text-white">
                <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-400">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold mb-2">Verifikasi Pembayaran</h1>
                <p class="text-blue-100">
                    Bukti transfer berhasil dikirim. Kami sedang melakukan verifikasi pembayaran Anda.
                </p>
            </div>
            
            <div class="p-8">
                <!-- Informasi Waktu Tunggu -->
                <div class="bg-blue-50 rounded-xl p-4 mb-8 flex items-start gap-4">
                    <div>
                        <h3 class="font-semibold text-blue-900 mb-1">Proses Verifikasi Membutuhkan Waktu</h3>
                        <p class="text-blue-800 text-sm">
                            Proses pengecekan bukti transfer biasanya memakan waktu <strong class="font-bold">1x24 jam </strong>di hari kerja. Akses program akan otomatis terbuka setelah verifikasi selesai.
                        </p>
                    </div>
                </div>

                <h2 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b">Ringkasan Pesanan</h2>
                
                <div class="space-y-4 mb-8 text-sm">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Program Sertifikasi</span>
                        <span class="font-semibold text-gray-800">Level {{ $payment->level->level_name ?? 'Sertifikasi Level' }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Nominal Transfer</span>
                        <span class="font-bold text-blue-600 text-lg">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Order ID</span>
                        <span class="font-semibold text-gray-800 font-mono">{{ $payment->order_id }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Tanggal Pengiriman</span>
                        <span class="font-semibold text-gray-800">{{ $payment->updated_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>

                <!-- Email Instruction -->
                <div class="bg-yellow-50 rounded-xl p-4 mb-8 flex items-start gap-4">
                    <div>
                        <h3 class="font-semibold text-yellow-900 mb-1">Cek Kotak Masuk Email Anda</h3>
                        <p class="text-yellow-800 text-sm">
                            Kami akan mengirimkan notifikasi ke email Anda <strong>{{ Auth::user()->email ?? '' }}</strong> apabila pembayaran telah kami verifikasi dan akses berhasil dibuka.
                        </p>
                    </div>
                </div>

                <!-- Navigation Actions -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('asesi.dashboard') }}" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-lg shadow-blue-200">
                        Kembali ke Dashboard
                    </a>
                    <a href="{{ route('asesi.transaksi') }}" class="w-full text-center bg-white border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 text-gray-700 font-medium py-3 px-4 rounded-xl transition duration-200">
                        Cek Status Transaksi
                    </a>
                </div>
            </div>
        @else
            <!-- Header / Status Midtrans -->
            <div class="bg-indigo-600 p-6 text-center text-white">
                <div class="w-20 h-20 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-indigo-400">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold mb-2">Detail Pembayaran</h1>
                <p class="text-indigo-100">
                    Status pembayaran Anda adalah: <span class="uppercase font-semibold">{{ $payment->status }}</span>
                </p>
            </div>
            
            <div class="p-8">
                <h2 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b">Ringkasan Pesanan</h2>
                
                <div class="space-y-4 mb-8 text-sm">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Program Sertifikasi</span>
                        <span class="font-semibold text-gray-800">{{ $payment->level->level_name ?? 'Sertifikasi Level' }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Nominal Transfer</span>
                        <span class="font-bold text-indigo-600 text-lg">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Order ID</span>
                        <span class="font-semibold text-gray-800 font-mono">{{ $payment->order_id }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Tanggal</span>
                        <span class="font-semibold text-gray-800">{{ $payment->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>

                <!-- Navigation Actions -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('asesi.dashboard') }}" class="w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-lg">
                        Kembali ke Dashboard
                    </a>
                    <a href="{{ route('asesi.transaksi') }}" class="w-full text-center bg-white border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 text-gray-700 font-medium py-3 px-4 rounded-xl transition duration-200">
                        Cek Status Transaksi
                    </a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
