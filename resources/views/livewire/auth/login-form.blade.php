<div class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen w-full flex items-center justify-center p-4">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(180deg);
            }
        }

        @keyframes float-delayed {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(-180deg);
            }
        }

        @keyframes pulse-dot {

            0%,
            80%,
            100% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            40% {
                transform: scale(1.2);
                opacity: 1;
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-slideIn {
            animation: slideIn 0.6s ease-out;
        }

        .animate-slideInUp {
            animation: slideInUp 0.8s ease-out;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 8s ease-in-out infinite;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
        }

        .animation-delay-300 {
            animation-delay: 0.3s;
        }

        .animation-delay-400 {
            animation-delay: 0.4s;
        }

        .animation-delay-500 {
            animation-delay: 0.5s;
        }

        .animation-delay-600 {
            animation-delay: 0.6s;
        }

        .animation-delay-700 {
            animation-delay: 0.7s;
        }

        .animation-delay-800 {
            animation-delay: 0.8s;
        }
    </style>

    <div
        class="bg-white shadow-2xl rounded-3xl overflow-hidden w-full max-w-4xl flex flex-col md:flex-row backdrop-blur-sm border border-white/20 animate-fadeIn">
        <!-- Left Section - Enhanced -->
        <div
            class="hidden md:flex flex-col justify-center items-center w-full md:w-1/2 bg-gradient-to-br from-[#A6BFCF] via-[#5F809C] to-[#2E4D69] p-10 relative overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-white/10 animate-float"></div>
                <div class="absolute bottom-20 right-10 w-32 h-32 rounded-full bg-white/5 animate-float-delayed"></div>
                <div class="absolute top-1/3 right-1/4 w-4 h-4 rounded-full bg-white/20 animate-ping"></div>
                <div class="absolute bottom-1/4 left-1/3 w-2 h-2 rounded-full bg-white/30 animate-pulse"></div>
            </div>

            <h1 class="text-4xl font-bold text-white text-center relative z-10 mb-4 animate-slideInUp">
                Selamat Datang
            </h1>
            <p class="text-white text-center mb-8 animate-slideInUp animation-delay-300 opacity-90">
                Welcome to our platform
            </p>
            <div class="mt-6 w-44 h-44 flex items-center justify-center animate-slideInUp animation-delay-500 group">
                <div class="absolute w-44 h-44 bg-white/5 rounded-full animate-pulse"></div>
                <img src="images/logoTlcPng.png" alt="Logo"
                    class="max-w-full relative z-10 filter drop-shadow-lg transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>

        <!-- Right Section - Enhanced -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
            <!-- Mobile Header -->
            <div class="md:hidden text-center mb-8 animate-fadeIn">
                <h1
                    class="text-3xl font-bold bg-gradient-to-r from-[#0C548C] to-[#2E4D69] bg-clip-text text-transparent">
                    Selamat Datang
                </h1>
                <p class="text-[#5F809C] text-sm mt-2">Welcome to our platform</p>
            </div>

            <!-- Header -->
            <div class="flex justify-between items-center mb-8 animate-slideIn">
                <h2 class="text-2xl font-bold text-[#2E4D69] relative">
                    Masuk
                    <div
                        class="absolute -bottom-2 left-0 w-12 h-0.5 bg-gradient-to-r from-[#0C548C] to-[#2E4D69] rounded-full">
                    </div>
                </h2>
            </div>

            <form wire:submit.prevent="login" class="space-y-6">
                <!-- Email Field -->
                <div class="mb-6 group animate-slideIn animation-delay-200">
                    <label
                        class="text-sm font-medium text-[#2E4D69] block mb-2 transition-colors group-focus-within:text-[#0C548C]">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#0C548C]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            Email Address
                        </span>
                    </label>
                    <div class="relative">
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
                        
                        @error('email')
                            <div class="text-red-500 text-sm mt-1 flex items-center animate-slideIn">
                                <svg class="w-4 h-4 mr-1 animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mb-6 group animate-slideIn animation-delay-300">
                    <label
                        class="text-sm font-medium text-[#2E4D69] block mb-2 transition-colors group-focus-within:text-[#0C548C]">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#0C548C]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            Password
                        </span>
                    </label>
                    <div class="relative">

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

                        @error('password')
                            <div class="text-red-500 text-sm mt-1 flex items-center animate-slideIn">
                                <svg class="w-4 h-4 mr-1 animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Remember & Forgot Password -->
                <div class="flex justify-between items-center mb-8 animate-slideIn animation-delay-400">
                    <div class="flex items-center group cursor-pointer">
                        <input type="checkbox" id="remember" wire:model="remember" name="remember"
                            class="w-4 h-4 text-[#0C548C] border-gray-300 rounded focus:ring-[#0C548C] transition-all duration-200 hover:scale-110">
                        <label for="remember"
                            class="ml-2 text-sm text-[#2E4D69] cursor-pointer transition-colors hover:text-[#0C548C] select-none">
                            Remember me
                        </label>
                    </div>
                    <a href="{{ route('forgot.password.request') }}"
                        class="text-sm text-[#0C548C] hover:text-[#2E4D69] transition-all duration-200 relative group font-medium">
                        Lupa password?
                        <span
                            class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-[#0C548C] transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Error Message -->
                @if ($errorMessage)
                    <div
                        class="text-red-500 text-sm mb-4 p-3 bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-400 rounded-r-lg animate-slideIn flex items-center">
                        <svg class="w-5 h-5 mr-2 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ $errorMessage }}
                    </div>
                @endif

                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#0C548C] to-[#2E4D69] text-white py-4 rounded-xl hover:from-[#063B67] hover:to-[#1C3A58] transition-all duration-300 shadow-lg transform hover:scale-105 hover:shadow-2xl font-bold animate-slideIn animation-delay-500 relative overflow-hidden group"
                    wire:loading.attr="disabled" wire:loading.class="opacity-90 cursor-not-allowed scale-100">

                    <!-- Shimmer effect -->
                    <div
                        class="absolute inset-0 -skew-x-12 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-700 transform -translate-x-full group-hover:translate-x-full">
                    </div>

                    <div class="relative z-10 flex items-center justify-center">
                        <span wire:loading.remove class="flex items-center">
                            
                            MASUK
                        </span>
                        <span wire:loading class="items-center">
                            Memproses...
                        </span>
                    </div>
                </button>
            </form>

            <!-- Divider -->
            <div class="relative flex items-center justify-center my-8 animate-slideIn animation-delay-600">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative px-4 bg-white">
                    <p class="text-sm text-gray-500 font-medium">Atau Masuk Dengan</p>
                </div>
            </div>

            <!-- Google Login Button -->
            <div class="flex justify-center mb-6 animate-slideIn animation-delay-700">
                <a href="{{ route('google.redirect') }}"
                    class="w-full flex items-center justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50 transition-all duration-300 hover:shadow-lg hover:border-gray-400 ">
                    <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:scale-110"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <span
                        class="font-medium text-gray-700 group-hover:text-gray-900 transition-colors duration-300">Google</span>
                </a>
            </div>

            <!-- Register Link -->
            <p class="text-center text-sm text-[#2E4D69] animate-slideIn animation-delay-800">
                Belum punya akun?
                <a href="{{ route('register') }}"
                    class="text-[#0C548C] font-semibold hover:text-[#2E4D69] transition-all duration-200 relative group ml-1">
                    Daftar Sekarang
                    <span
                        class="absolute -bottom-0.5 left-0 w-0 h-0.5 bg-gradient-to-r from-[#0C548C] to-[#2E4D69] transition-all duration-300 group-hover:w-full"></span>
                </a>
            </p>
        </div>
    </div>
</div>
