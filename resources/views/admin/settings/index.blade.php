@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <!-- Back Navigation Header -->
        <div class="mb-6">
            <a href="{{ url()->previous() }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="text-xl font-bold">Pengaturan Admin</span>
            </a>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column -->
            <div class="lg:col-span-1">
                <!-- Profile Picture Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 transition-all hover:shadow-md">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Foto Profil</h3>
                        <div class="flex flex-col sm:flex-row items-center gap-6">
                            <div class="relative">
                                <img class="rounded-full w-32 h-32 object-cover border-4 border-gray-100" src="{{ asset) }}" alt="Foto Profil">
                                <div class="absolute -bottom-2 -right-2 bg-blue-500 rounded-full p-2 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col w-full">
                                <div class="flex flex-col sm:flex-row gap-3 mt-4 sm:mt-0">
                                    <button onclick="togglePopup(true)" class="w-full sm:w-auto px-4 py-2 bg-blue-50 text-blue-600 font-medium rounded-lg hover:bg-blue-100 transition-colors flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat
                                    </button>
                                    <button class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center"
                                    data-modal-target="edit-img-modal"
                                    data-modal-toggle="edit-img-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 transition-all hover:shadow-md">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Tambahan</h3>
                        <div class="space-y-3">
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-500">Terakhir Dilihat</span>
                                <span class="text-gray-800 font-medium">
                                    {{-- {{ $users->user->last_seen ? $users->user->last_seen->diffForHumans() : 'Never logged in' }} --}}
                                    Terakhir dilihat 5 Menit yang lalu
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:col-span-2">
                <!-- Profile Information Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 transition-all hover:shadow-md">
                    <div class="p-6">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Informasi Profil</h3>
                            <p class="text-gray-600">Perbarui informasi profil dan alamat email akun Anda </p>
                        </div>

                        <form id="send-verification" method="post" action="{{ route('admin.settings.update') }}">
                            @csrf
                        </form>

                        <form action="{{ route('admin.settings.update') }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                        Nama Lengkap
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" id="name"
                                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required autofocus autocomplete="name" placeholder="Masukkan nama Anda"
                                            value="{{ old('name', $user->name) }}">
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                                        Alamat Email
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" name="email" id="email"
                                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required autocomplete="email" placeholder="Masukkan email Anda"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password Update Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 transition-all hover:shadow-md">
                    <div class="p-6">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Perbarui Password</h3>
                            <p class="text-gray-600">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk menjaga keamanannya</p>
                        </div>

                        <form action="{{ route('admin.password.update') }}" method="post">
                            @csrf
                            @method('put')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Current Password -->
                                <div class="md:col-span-2">
                                    <label for="update_password_current_password" class="block mb-2 text-sm font-medium text-gray-700">
                                        Kata Sandi Saat Ini
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <input type="password" name="current_password" id="update_password_current_password"
                                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            autocomplete="current-password" placeholder="Masukkan kata sandi Anda saat ini">
                                    </div>
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>

                                <!-- New Password -->
                                <div>
                                    <label for="update_password_password" class="block mb-2 text-sm font-medium text-gray-700">
                                        Password Baru
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                            </svg>
                                        </div>
                                        <input type="password" name="password" id="update_password_password"
                                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            autocomplete="new-password" placeholder="Masukkan kata sandi baru">
                                    </div>
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label for="update_password_password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">
                                        Konfirmasi Password
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <input type="password" name="password_confirmation" id="update_password_password_confirmation"
                                            class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            autocomplete="new-password" placeholder="Konfirmasi kata sandi baru">
                                    </div>
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                    Perbarui Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Profile Image Modal -->
    <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="relative bg-white rounded-xl shadow-xl p-6 w-11/12 md:w-3/5 lg:w-2/5 max-h-[90vh] overflow-y-auto">
            <button onclick="togglePopup(false)" class="absolute top-4 right-4 text-gray-500 hover:text-gray-900 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flex flex-col items-center">
                <img id="profileImage" src="#" alt="Foto Profil" class="rounded-xl w-full max-h-96 object-cover">
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-800">Foto Profil</h3>
                    <p class="mt-2 text-gray-600 text-sm">Ini adalah gambar profil Anda saat ini</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Image Modal -->
    <div id="edit-img-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-xl shadow-xl">
                <div class="flex items-center justify-between p-4 md:p-5 border-b">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Perbarui Foto Profil
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-img-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Tutup modal</span>
                    </button>
                </div>

                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-2">
                            <label for="profile_image" class="block text-sm font-medium text-gray-700">Pilih Foto</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="profile_image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk unggah</span> atau seret dan jatuhkan</p>
                                        <p class="text-xs text-gray-500">JPG, JPEG or PNG (MAX. 2MB)</p>
                                    </div>
                                    <input id="profile_image" name="profile_image" type="file" class="hidden" accept=".jpg, .jpeg, .png" required />
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">
                            Unggah Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('status') === 'password-updated')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your password has been updated successfully.',
                    timer: 3000,
                    showConfirmButton: false,
                });
            });
        </script>
    @endif

    <script>
        function togglePopup(show) {
            const popup = document.getElementById('popup');
            if (show) {
                popup.classList.remove('hidden');
                popup.classList.add('flex');
            } else {
                popup.classList.remove('flex');
                popup.classList.add('hidden');
            }
        }
    </script>
@endsection
