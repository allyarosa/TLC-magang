<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #f0f9ff 0%, #e0f2fe 100%);
        }
        
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.15);
        }
        
        .btn-primary {
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(12, 84, 140, 0.3);
        }
        
        .instruction-list li {
            position: relative;
            padding-left: 1.5rem;
        }
        
        .instruction-list li:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background-color: #0C548C;
        }
        
        .envelope-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .countdown {
            font-variant-numeric: tabular-nums;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                <div class="envelope-icon">
                    <svg class="h-10 w-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
            <h2 class="mt-4 text-3xl font-bold text-gray-800">
                Verifikasi Email Anda
            </h2>
            <p class="mt-3 text-gray-600 max-w-md mx-auto">
                Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi. Link akan kedaluwarsa dalam <span id="countdown" class="font-semibold text-blue-600 countdown">05:00</span>.
            </p>
        </div>

        <!-- Session Status -->
        <div id="statusMessage" class="hidden bg-green-50 border border-green-200 rounded-xl p-4 transition-all duration-300">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800" id="statusText"></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl card-shadow overflow-hidden">
            <div class="p-8">
                <div class="text-center space-y-6">
                    <div class="flex justify-center">
                        <div class="bg-blue-50 rounded-full p-3">
                            <i class="fas fa-envelope-open-text text-blue-500 text-2xl"></i>
                        </div>
                    </div>
                    
                    <p class="text-gray-600">
                        Jika Anda tidak menerima email verifikasi, klik tombol di bawah untuk mengirim ulang.
                    </p>

                    <form method="POST" action="{{ route('verification.send') }}" id="resendForm">
                        @csrf
                        <button type="submit" id="resendButton"
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-base font-medium text-white bg-gradient-to-r from-[#0C548C] to-[#063B67] hover:from-[#063B67] hover:to-[#04294d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 btn-primary">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Kirim Ulang Email Verifikasi
                        </button>
                    </form>

                    <div class="pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-600 mb-4">
                            Sudah memverifikasi email Anda?
                        </p>
                        <a href="{{ route('asesi.dashboard') }}" class="inline-flex items-center font-medium text-[#0C548C] hover:text-[#063B67] transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2 text-xs"></i>
                            Kembali ke Dashboard
                        </a>
                    </div>

                    <!-- Logout Option -->
                    <div class="mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200 flex items-center justify-center mx-auto">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Keluar dari Akun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
            <h3 class="text-sm font-semibold text-blue-800 mb-3 flex items-center">
                <i class="fas fa-info-circle mr-2"></i>
                Petunjuk Verifikasi
            </h3>
            <ol class="text-sm text-blue-700 space-y-2 instruction-list">
                <li>Periksa kotak masuk email Anda (dan folder spam/junk)</li>
                <li>Cari email dari {{ config('app.name') }}</li>
                <li>Klik link verifikasi dalam email</li>
                <li>Tunggu beberapa saat hingga proses verifikasi selesai</li>
            </ol>
        </div>
    </div>

    <script>
        // Simulasi countdown
        function startCountdown() {
            let timeLeft = 5 * 60; // 5 minutes in seconds
            const countdownEl = document.getElementById('countdown');
            const resendButton = document.getElementById('resendButton');
            
            resendButton.disabled = true;
            resendButton.classList.add('opacity-75', 'cursor-not-allowed');
            
            const countdownInterval = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    countdownEl.textContent = '00:00';
                    resendButton.disabled = false;
                    resendButton.classList.remove('opacity-75', 'cursor-not-allowed');
                    return;
                }
                
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                
                countdownEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                timeLeft--;
            }, 1000);
        }
        
        // Simulasi pengiriman ulang email
        document.getElementById('resendForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Tampilkan status message
            const statusMessage = document.getElementById('statusMessage');
            const statusText = document.getElementById('statusText');
            
            statusText.textContent = 'Link verifikasi baru telah dikirim ke alamat email Anda.';
            statusMessage.classList.remove('hidden');
            statusMessage.classList.add('bg-green-50');
            
            // Mulai countdown lagi
            startCountdown();
            
            // Scroll ke status message
            statusMessage.scrollIntoView({ behavior: 'smooth' });
        });
        
        // Mulai countdown saat halaman dimuat
        document.addEventListener('DOMContentLoaded', startCountdown);
    </script>
</body>
</html>