@extends('layouts.login')

@section('title', 'Verifikasi Email | Teaching and Learning Certification')

@section('content')
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

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .countdown {
            font-variant-numeric: tabular-nums;
        }
    </style>
    </head>

    <div class="relative bg-gray-900 min-h-screen w-full flex items-center justify-center p-4 sm:p-6 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/about-us.webp') }}" alt="Background TLC" class="w-full h-full object-cover opacity-70"
                loading="eager">
            <!-- Dark overlay -->
            <div class="absolute inset-0"
                style="background: linear-gradient(120deg, rgba(10,20,70,0.80) 30%, rgba(15,40,100,0.65) 50%, rgba(10,20,70,0.55) 50%);">
            </div>
        </div>

        <div
            class="relative z-10 bg-white shadow-2xl rounded-3xl overflow-hidden w-full max-w-md p-6 sm:p-8 md:p-10 backdrop-blur-sm">
            <div class="text-center">
                <h2 class="mt-4 text-3xl font-bold text-gray-700">
                    Verifikasi Email
                </h2>
                <p class="mt-3 text-gray-600 max-w-md mx-auto text-sm text-center">
                    Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.
                    Link akan kedaluwarsa dalam <span id="countdown"
                        class="font-semibold text-blue-600 countdown">05:00</span>.
                </p>
            </div>

            <!-- Session Status (dari server) -->

            <div class="mt-8 text-center space-y-6">
                <div class="flex justify-center">
                    <div class="p-4">
                        <img src="{{ asset('assets/icons/email.png') }}" alt="Email Icon"
                            class="w-16 h-16 text-blue-500 envelope-icon">
                    </div>
                </div>

                <p class="text-gray-600 text-sm">
                    Jika Anda tidak menerima email verifikasi, klik tombol di bawah untuk mengirim ulang.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" id="resendButton"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-base font-medium text-white bg-gradient-to-r from-[#0C548C] to-[#2E4D69] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                            </path>
                        </svg>
                        Kirim Ulang Verifikasi
                    </button>
                </form>

                <div class="pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-600 mb-4">
                        Sudah punya akun yang terverifikasi?
                    </p>
                </div>

                <!-- Logout Option -->
                <div class="mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200 flex items-center justify-center mx-auto">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Keluar dari Akun
                        </button>
                    </form>
                </div>
            </div>

            <!-- Instructions -->
            {{-- <div class="mt-8 bg-blue-50 border border-blue-100 rounded-2xl p-5">
                <h3 class="text-sm font-semibold text-blue-800 mb-3 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Petunjuk Verifikasi
                </h3>
                <ol class="text-xs sm:text-sm text-blue-700 space-y-2 instruction-list pl-1">
                    <li>Periksa kotak masuk email Anda (bisa juga di folder Spam/Junk)</li>
                    <li>Cari email masuk dari <strong>{{ config('app.name') }}</strong></li>
                    <li>Klik link verifikasi dalam email tersebut</li>
                </ol>
            </div> --}}
        </div>

        <script>
            @if (session('success'))
                function startCountdown() {
                    const countdownEl = document.getElementById('countdown');
                    const resendButton = document.getElementById('resendButton');
                    if (!countdownEl || !resendButton) return;

                    let endTime = localStorage.getItem('otp_expiry');

                    if (!endTime) {
                        endTime = Math.floor(Date.now() / 1000) + (5 * 60);
                        localStorage.setItem('otp_expiry', endTime);
                    }

                    const countdownInterval = setInterval(() => {
                        const now = Math.floor(Date.now() / 1000);
                        const timeLeft = endTime - now;

                        if (timeLeft <= 0) {
                            clearInterval(countdownInterval);
                            localStorage.removeItem('otp_expiry'); 
                            countdownEl.textContent = '00:00';
                            resendButton.disabled = false;
                            resendButton.classList.remove('opacity-75', 'cursor-not-allowed');
                            return;
                        }
                        
                        resendButton.disabled = true;
                        resendButton.classList.add('opacity-75', 'cursor-not-allowed');

                        const minutes = Math.floor(timeLeft / 60);
                        const seconds = timeLeft % 60;
                        countdownEl.textContent =
                            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    }, 1000);
                }
                document.addEventListener('DOMContentLoaded', startCountdown);
            @endif
        </script>
    </div>
@endsection
