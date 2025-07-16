@extends('layouts.asesorDashboard')
@section('title', 'Asesor Dashboard')
@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6 lg:py-8 bg-gradient-to-b">
        <h1 class="text-xl sm:text-2xl font-bold text-blue-800 mb-4 sm:mb-6">Profile Setting</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row mb-4 sm:mb-6 space-y-2 sm:space-y-0 sm:space-x-4">
            <button id="tab-profil" class="flex-1 py-2 sm:py-3 px-4 font-medium text-white bg-blue-800 rounded-lg text-sm sm:text-base">Profil</button>
            <button id="tab-keamanan" class="flex-1 py-2 sm:py-3 px-4 font-medium text-gray-600 rounded-lg border border-gray-300 text-sm sm:text-base">Keamanan</button>
        </div>

        <form id="content-profil" class="bg-white rounded-lg shadow-sm p-4 sm:p-6 mb-4 sm:mb-6" method="POST" action="{{ route('asesor.profile-setting.update') }}">
            @csrf
            <h2 class="text-lg sm:text-xl font-bold mb-2">Informasi Profil</h2>
            <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Update informasi profil Anda</p>

            <div class="flex flex-col sm:flex-row items-center sm:items-start mb-6 sm:mb-8 space-y-4 sm:space-y-0">
                <div class="relative flex-shrink-0">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/profile_images/' . ($user->asesorProfile->profile_image ?? 'blankProfile.png')) }}" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <button type="button" onclick="document.getElementById('profile-photo-input').click()" class="absolute bottom-0 right-0 bg-yellow-500 text-white rounded-full p-1 hover:bg-yellow-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                <div class="sm:ml-6 text-center sm:text-left">
                    <h3 class="text-base sm:text-lg font-bold">{{ $user->name }}</h3>
                    <p class="text-gray-500 text-xs sm:text-sm mt-2">Bergabung sejak {{ $user->created_at->format('d F Y') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-2 sm:p-3 text-sm sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $user->name }}" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 sm:p-3 text-sm sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $user->email }}" required>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded-lg p-2 sm:p-3 text-sm sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $user->userProfile->no_wa ?? '' }}" required>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <input type="text" id="address" name="address" class="w-full border border-gray-300 rounded-lg p-2 sm:p-3 text-sm sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $user->userProfile->alamat ?? '' }}" required>
                </div>
            </div>

            <div class="mt-6 flex justify-center sm:justify-end">
                <button type="submit" class="w-full sm:w-auto bg-blue-800 hover:bg-blue-700 text-white font-medium py-2 sm:py-3 px-4 sm:px-6 rounded-lg flex items-center justify-center text-sm sm:text-base transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>

        <form id="content-keamanan" class="bg-white rounded-lg shadow-sm p-4 sm:p-6 mb-4 sm:mb-6 hidden" method="POST" action="{{ route('asesor.profile-setting.update-password') }}">
            @csrf
            <h2 class="text-lg sm:text-xl font-bold mb-2">Keamanan Akun</h2>
            <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Update password dan pengaturan keamanan</p>

            <div class="mb-6 sm:mb-8">
                <h3 class="text-base sm:text-lg font-bold mb-4">Ubah Password</h3>

                <div class="space-y-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                        <input type="password" id="current_password" name="current_password" class="w-full border border-gray-300 rounded-lg p-2 sm:p-3 text-sm sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <input type="password" id="new_password" name="new_password" class="w-full border border-gray-300 rounded-lg p-2 sm:p-3 text-sm sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        @error('new_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full border border-gray-300 rounded-lg p-2 sm:p-3 text-sm sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-base sm:text-lg font-bold mb-4">Pengaturan Keamanan Lainnya</h3>

                <div class="border border-gray-200 rounded-lg p-3 sm:p-4 mb-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0">
                        <div class="flex-1">
                            <h4 class="font-medium text-sm sm:text-base">Notifikasi Login</h4>
                            <p class="text-xs sm:text-sm text-gray-500">Dapatkan notifikasi saat akun Anda diakses dari perangkat baru</p>
                        </div>
                        <div class="flex justify-end sm:justify-start">
                            <input type="checkbox" checked class="h-4 w-4 sm:h-5 sm:w-5 text-blue-800 rounded focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg p-3 sm:p-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0">
                        <div class="flex-1">
                            <h4 class="font-medium text-sm sm:text-base">Verifikasi Dua Langkah</h4>
                            <p class="text-xs sm:text-sm text-gray-500">Tingkatkan keamanan akun dengan verifikasi dua langkah</p>
                        </div>
                        <div class="flex justify-end sm:justify-start">
                            <input type="checkbox" class="h-4 w-4 sm:h-5 sm:w-5 text-blue-800 rounded focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-center sm:justify-end">
                <button type="submit" class="w-full sm:w-auto bg-blue-800 hover:bg-blue-700 text-white font-medium py-2 sm:py-3 px-4 sm:px-6 rounded-lg flex items-center justify-center text-sm sm:text-base transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>

        <form id="photo-form" method="POST" action="{{ route('asesor.profile-setting.update-photo') }}" enctype="multipart/form-data" class="hidden">
            @csrf
            <input type="file" id="profile-photo-input" name="profile_photo" accept="image/*" onchange="document.getElementById('photo-form').submit()">
        </form>

        <script>
            const tabProfil = document.getElementById('tab-profil');
            const tabKeamanan = document.getElementById('tab-keamanan');
            const contentProfil = document.getElementById('content-profil');
            const contentKeamanan = document.getElementById('content-keamanan');

            tabProfil.addEventListener('click', function() {
                tabProfil.classList.add('text-white', 'bg-blue-800');
                tabProfil.classList.remove('text-gray-600', 'border', 'border-gray-300');
                
                tabKeamanan.classList.remove('text-white', 'bg-blue-800');
                tabKeamanan.classList.add('text-gray-600', 'border', 'border-gray-300');

                contentProfil.classList.remove('hidden');
                contentKeamanan.classList.add('hidden');
            });

            tabKeamanan.addEventListener('click', function() {
                tabKeamanan.classList.add('text-white', 'bg-blue-800');
                tabKeamanan.classList.remove('text-gray-600', 'border', 'border-gray-300');
                
                tabProfil.classList.remove('text-white', 'bg-blue-800');
                tabProfil.classList.add('text-gray-600', 'border', 'border-gray-300');

                contentKeamanan.classList.remove('hidden');
                contentProfil.classList.add('hidden');
            });

            window.addEventListener('DOMContentLoaded', (event) => {
                if (window.location.hash === '#security') {
                    tabKeamanan.click();
                }
            });
        </script>
    </section>
@endsection