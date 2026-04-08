<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password | {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(12, 84, 140, 0.15);
        }
        
        .lock-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                <div class="lock-icon">
                    <svg class="h-10 w-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
            </div>
            <h2 class="mt-4 text-3xl font-bold text-gray-800">
                Lupa Password?
            </h2>
            <p class="mt-3 text-gray-600">
                Silakan masukkan alamat email Anda. Jika email terdaftar, kami akan mengirimkan instruksi untuk mereset password.
            </p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl transition-all duration-300">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-600">Terjadi kesalahan:</h3>
                        <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Success Message -->
        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-xl transition-all duration-300">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl card-shadow overflow-hidden">
            <div class="p-8">
                <form action="{{ route('forgot.password.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" type="email" name="email" placeholder="nama@email.com" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus transition duration-200"
                                required autocomplete="email" autofocus>
                        </div>
                    </div>
                    
                    <button id="resetButton" type="submit" 
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl text-base font-medium text-white bg-gradient-to-r from-[#0C548C] to-[#063B67] hover:from-[#063B67] hover:to-[#04294d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Kirim Instruksi Reset
                    </button>
                </form>

                <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center font-medium text-[#0C548C] hover:text-[#063B67] transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2 text-xs"></i>
                        Kembali ke Halaman Login
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
            <h3 class="text-sm font-semibold text-blue-800 mb-3 flex items-center">
                <i class="fas fa-lightbulb mr-2"></i>
                Tips
            </h3>
            <ul class="text-sm text-blue-700 space-y-2">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-500 mt-0.5 mr-2"></i>
                    <span>Pastikan email yang Anda masukkan sama dengan yang digunakan saat mendaftar</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-500 mt-0.5 mr-2"></i>
                    <span>Periksa folder spam jika Anda tidak menerima email dalam beberapa menit</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-500 mt-0.5 mr-2"></i>
                    <span>Link reset password akan kedaluwarsa setelah beberapa waktu</span>
                </li>
            </ul>
        </div>
    </div>

    <script>
        const emailInput = document.getElementById('email');
        const resetButton = document.getElementById('resetButton');

        // Check if email field has value on page load
        if (emailInput.value.trim() !== '') {
            resetButton.classList.remove('bg-gray-200', 'text-gray-500');
            resetButton.classList.add('bg-gradient-to-r', 'from-[#0C548C]', 'to-[#063B67]', 'text-white');
        }

        emailInput.addEventListener('input', function() {
            if (emailInput.value.trim() !== '') {
                resetButton.classList.remove('bg-gray-200', 'text-gray-500');
                resetButton.classList.add('bg-gradient-to-r', 'from-[#0C548C]', 'to-[#063B67]', 'text-white');
            } else {
                resetButton.classList.remove('bg-gradient-to-r', 'from-[#0C548C]', 'to-[#063B67]', 'text-white');
                resetButton.classList.add('bg-gray-200', 'text-gray-500');
            }
        });
    </script>
</body>
</html>