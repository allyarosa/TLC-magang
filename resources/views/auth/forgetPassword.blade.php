@extends('layouts.login')

@section('title', 'Lupa Password')

@section('content')
    

    <section class="bg-gray-50 min-h-screen pt-20">
        <div class="flex items-center justify-center h-[calc(100vh-200px)]">
            <div class="w-full max-w-xl p-4">
                <!-- Form Container -->
                <div class="p-6">
                    <!-- Back to Login -->
                    <div class="mb-8">
                        <a href="{{ route('login') }}"
                            class="flex items-center text-[#0C548C] hover:text-[#2b3b47] font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali ke Login
                        </a>
                    </div>

                    <!-- Title -->
                    <h2 class="sm:text-3xl text-2xl font-bold text-center text-gray-700 mb-3">Lupa Password?</h2>

                    <!-- Instruction text -->
                    <p class="sm:text-center text-justify text-gray-600 mb-8 sm:text-base text-sm">
                        Silahkan masukkan alamat email kamu pada form dibawah. Jika email terdaftar, maka kami akan
                        mengirimkan
                        email untuk mereset password kamu.
                    </p>

                    <!-- Form -->
                    <form action="{{ route('forgot.password.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input id="email" type="email" placeholder="Email" name="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required>
                        </div>
                        <button id="resetButton" type="submit"
                            class="w-full py-3 px-4 bg-gray-200 text-gray-500 rounded-md hover:bg-gray-300 transition duration-200">
                            Reset Password
                        </button>
                    </form>
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
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

                    @if (session('status'))
                        <div class="mb-6 mt-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-md">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
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
                </div>
            </div>
        </div>
    </section>

    <script>
        const emailInput = document.getElementById('email');
        const resetButton = document.getElementById('resetButton');

        emailInput.addEventListener('input', function() {
            if (emailInput.value.trim() !== '') {
                resetButton.classList.remove('bg-gray-200', 'text-gray-500', 'hover:bg-gray-300', 'shadow-blue-400',
                    'shadow-sm');
                resetButton.classList.add('bg-blue-500', 'text-white', 'hover:bg-blue-600', 'transition',
                    'duration-200', 'shadow-sm', 'shadow-blue-400');
            } else {
                resetButton.classList.remove('bg-blue-500', 'text-white', 'hover:bg-blue-600', 'shadow-blue-400',
                    'shadow-sm', 'transition', 'duration-200');
                resetButton.classList.add('bg-gray-200', 'text-gray-500', 'hover:bg-gray-300');
            }
        });
    </script>

@endsection
