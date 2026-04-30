<div class="relative bg-gray-900 min-h-screen w-full flex items-center justify-center p-2 sm:p-2 overflow-hidden">
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
        class="relative z-10 bg-white shadow-2xl rounded-3xl overflow-hidden w-full max-w-md md:max-w-4xl flex flex-col md:flex-row backdrop-blur-sm transform">
        <!-- Kiri Section -->
        <div
            class="hidden md:flex flex-col justify-center items-center w-1/2 bg-gradient-to-br from-[#A6BFCF] to-[#2E4D69] p-10 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <div class="absolute w-40 h-40 rounded-full bg-white top-10 left-10 animate-pulse"></div>
                <div class="absolute w-20 h-20 rounded-full bg-white bottom-10 right-20 animate-ping"></div>
            </div>

            <h1 class="text-4xl font-bold text-white text-center relative z-10 mb-4 animate-slideInUp">
                Selamat Datang
            </h1>
            {{-- <p class="text-white text-center mt-4 mb-8">
                Welcome to our platform
            </p> --}}

            <div class="mt-6 w-44 h-44 flex items-center justify-center animate-slideInUp animation-delay-500 group">
                <div class="absolute w-44 h-44 bg-white/5 rounded-full animate-pulse"></div>
                <img src="images/logoTlcPng.png" alt="Logo TLC" loading="lazy"
                    title="Teaching and Learning Certification Logo"
                    class="max-w-full relative z-10 filter drop-shadow-lg transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>

        <!-- Kanan Section -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center bg-white">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-extrabold text-[#2E4D69]">Daftar Akun</h2>
            </div>

            <form wire:submit.prevent="register" class="space-y-4">
                <div class="relative">
                    <label class="text-sm font-medium text-gray-700 block mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" wire:model="name" placeholder="Masukkan nama lengkap"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400"
                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">

                    </div>
                    <p class="text-gray-500 text-xs mt-1">Masukkan nama asli anda, nama akan digunakan pada data
                        sertifikat</p>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative">
                    <label class="text-sm font-medium text-gray-700 block mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </span>
                        <input type="email" wire:model="email" placeholder="email@example.com"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400">
                    </div>
                    <p class="text-gray-500 text-xs mt-1">Gunakan alamat email aktif Anda</p>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative">
                    <label class="text-sm font-medium text-gray-700 block mb-1">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="password" wire:model="password" placeholder="Minimal 8 karakter"
                            class="w-full pl-10 pr-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400">
                    </div>
                    <p class="text-gray-500 text-xs mt-1">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka
                    </p>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- No WhatsApp --}}
                <div class="relative">
                    <label class="text-sm font-medium text-gray-700 block mb-1">Nomor WhatsApp <span class="text-red-500">*</span></label>
                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all duration-200">
                        <span class="bg-gray-100 px-3 py-3 text-sm text-gray-500 border-r border-gray-300 flex-shrink-0">+62</span>
                        <input type="text" wire:model.blur="no_wa" placeholder="81234567890"
                            class="flex-1 pl-3 p-3 text-sm border-0 focus:ring-0 focus:outline-none"
                            oninput="this.value=this.value.replace(/\D/g,'')">
                    </div>
                    <p class="text-gray-500 text-xs mt-1">Akan digunakan untuk komunikasi dan informasi sertifikasi</p>
                    @error('no_wa')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="flex items-center">
                    <input type="checkbox" id="terms" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        Saya menyetujui
                        <a href="#" class="text-blue-600 font-semibold hover:underline">syarat dan ketentuan</a>
                        serta
                        <a href="#" class="text-blue-600 font-semibold hover:underline">kebijakan privasi</a>
                    </label>
                </div> --}}

                <button type="submit" wire:loading.attr="disabled"
                    class="w-full bg-gradient-to-r from-[#0C548C] to-[#2E4D69] text-white py-3 rounded-lg hover:from-[#063B67] hover:to-[#1C3A58] transition-all duration-200 font-semibold disabled:opacity-50">
                    <span wire:loading.remove>DAFTAR</span>
                    <span wire:loading>Memproses...</span>
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
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="text-[#0C548C] font-semibold hover:underline transition-colors">
                    Masuk sekarang
                </a>
            </p>
        </div>
    </div>
</div>
