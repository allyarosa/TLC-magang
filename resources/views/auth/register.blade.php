@extends('layouts.register')
@section('title', 'Register')
@section('content')
    {{-- <div
        class="bg-gradient-to-r from-blue-600 to-indigo-700 shadow-2xl rounded-3xl overflow-hidden w-full max-w-4xl flex transform hover:scale-[1.01] transition-all duration-300">
        <!-- kiri Section - Enhanced Visual Appeal -->
        <div
            class="hidden md:flex flex-col justify-center items-center w-1/2 bg-gradient-to-br from-[#A6BFCF] to-[#2E4D69] p-10 relative overflow-hidden">
            <!-- Animasi bakground element -->
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <div class="absolute w-40 h-40 rounded-full bg-white top-10 left-10 animate-pulse"></div>
                <div class="absolute w-20 h-20 rounded-full bg-white bottom-10 right-20 animate-ping"></div>
            </div>

            <h2 class="text-4xl font-extrabold text-white mt-4 text-center drop-shadow-lg">Mulai Perjalanan Anda Di TLC</h2>
            <p class="text-white text-center mt-4 mb-8">Layanan TLC untuk kenyamanan dan Kepuasan Anda</p>

            <div
                class="mt-6 w-40 h-40 bg-white/20 backdrop-blur-sm flex items-center justify-center rounded-full shadow-xl border-4 border-white/30 p-2 hover:rotate-3 transition-all duration-300">
                <img src="{{ asset('images/logoTlcPng.png') }}" alt="TLC Care Logo"
                    class="max-w-full max-h-full object-contain" loading="lazy">
            </div>

            <div class="mt-10 text-white/90 flex flex-col gap-3">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Mentor terbaik</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Pelayanan 24/7</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-300" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Harga terjangkau</span>
                </div>
            </div>
        </div>

        <!-- kanan Section - Enhanced Form -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center bg-white">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-extrabold text-[#2E4D69]">
                    Daftar Akun</h2>
            </div>

            <form class="space-y-6" action="{{ route('register.post') }}" method="post">
                @csrf
                <div class="relative">
                    <label class="text-sm font-medium text-gray-700 block mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Masukkan nama lengkap"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400"
                            name="name" required>
                    </div>
                    <p class="text-gray-500 text-xs mt-1">Masukkan nama asli anda, nama akan digunakan pada data sertifikat</p>
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative">
                    <label class="text-sm font-medium text-gray-700 block mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </span>
                        <input type="email" placeholder="email@example.com" name="email" required
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400">
                    </div>
                    <p class="text-gray-500 text-xs mt-1">Gunakan alamat email aktif Anda</p>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative" x-data="{ show: false }">
                    <label class="text-sm font-medium text-gray-700 block mb-1">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input :type="show ? 'text' : 'password'" placeholder="Minimal 8 karakter" name="password" required
                            class="w-full pl-10 pr-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                            @click="show = !show" tabindex="-1">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.973 9.973 0 012.282-3.419M6.018 6.018A9.955 9.955 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.973 9.973 0 01-1.357 2.572M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-gray-500 text-xs mt-1">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</p>
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>


                <div class="flex items-center">
                    <input type="checkbox" id="terms" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                    <label for="terms" class="ml-2 text-sm text-gray-600">Saya menyetujui <a href="#"
                            class="text-blue-600 font-semibold hover:underline">syarat dan ketentuan</a> serta <a
                            href="#" class="text-blue-600 font-semibold hover:underline">kebijakan
                            privasi</a></label>
                </div>

                <button
                    class="w-full bg-[#2E4D69] text-white py-3 rounded-lg hover:from-blue-700 hover:to-indigo-800 transition-all duration-300 transform hover:-translate-y-1 shadow-lg flex items-center justify-center gap-2 font-bold"
                    type="submit">
                    DAFTAR
                </button>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">atau daftar dengan</span>
                </div>
            </div>

                <a href="{{ route('google.redirect') }}"
                    class="flex w-full items-center justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.766 12.2764C23.766 11.4607 23.6999 10.6406 23.5588 9.83807H12.24V14.4591H18.7217C18.4528 15.9494 17.5885 17.2678 16.323 18.1056V21.104H20.19C22.4608 19.014 23.766 15.9274 23.766 12.2764Z"
                            fill="#4285F4" />
                        <path
                            d="M12.2401 24.0008C15.4766 24.0008 18.2059 22.9382 20.1945 21.1039L16.3276 18.1055C15.2517 18.8375 13.8627 19.252 12.2445 19.252C9.11388 19.252 6.45934 17.1399 5.50693 14.3003H1.5166V17.3912C3.55371 21.4434 7.7029 24.0008 12.2401 24.0008Z"
                            fill="#34A853" />
                        <path
                            d="M5.50253 14.3003C4.99987 12.8099 4.99987 11.1961 5.50253 9.70575V6.61481H1.51649C-0.18551 10.0056 -0.18551 14.0004 1.51649 17.3912L5.50253 14.3003Z"
                            fill="#FBBC04" />
                        <path
                            d="M12.2401 4.74966C13.9509 4.7232 15.6044 5.36697 16.8434 6.54867L20.2695 3.12262C18.1001 1.0855 15.2208 -0.034466 12.2401 0.000808666C7.7029 0.000808666 3.55371 2.55822 1.5166 6.61481L5.50264 9.70575C6.45505 6.86173 9.1096 4.74966 12.2401 4.74966Z"
                            fill="#EA4335" />
                    </svg>
                    Google
                </a>

            <p class="text-center mt-8 text-sm text-gray-600">
                Sudah memiliki akun? <a href="{{ route('login') }}"
                    class="text-blue-600 font-semibold hover:underline transition-colors">Masuk sekarang</a>
            </p>
        </div>
    </div> --}}

    @livewire('auth.register-form')

@endsection
