@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

        {{-- ══════════════════════════════
         Page Header
    ══════════════════════════════ --}}
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 flex-shrink-0">
                <i class="fas fa-cog text-sm"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold text-slate-800">Pengaturan Akun</h1>
                <p class="text-xs text-slate-400 mt-0.5">Kelola profil, keamanan, dan preferensi akun Anda</p>
            </div>
        </div>

        {{-- ══════════════════════════════
         Alert Notifications
    ══════════════════════════════ --}}
        @if (session('status') === 'profile-updated')
            <div
                class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl px-4 py-3 text-sm">
                <i class="fas fa-check-circle text-emerald-500"></i>
                <span>Profil berhasil diperbarui.</span>
            </div>
        @endif

        @if ($errors->any() && !$errors->updatePassword->any())
            <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm">
                <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                <ul class="space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ══════════════════════════════
         Main Grid
    ══════════════════════════════ --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- ── Left Column ──────────────────── --}}
            <div class="space-y-6">

                {{-- Profile Picture Card --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    {{-- Accent bar --}}
                    <div class="h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500"></div>
                    <div class="p-6">
                        <h3 class="text-sm font-semibold text-slate-800 mb-5 flex items-center gap-2">
                            <i class="fas fa-camera text-slate-400 text-xs"></i>
                            Foto Profil
                        </h3>
                        <div class="flex flex-col items-center text-center gap-4">
                            <div class="relative">
                                <img class="rounded-full w-28 h-28 object-cover ring-4 ring-slate-100"
                                    src="{{ asset('storage/' . auth()->user()->adminsProfile->profile_image) }}"
                                    alt="Foto Profil">
                                <span
                                    class="absolute -bottom-1 -right-1 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center shadow-md">
                                    <i class="fas fa-camera text-white text-xs"></i>
                                </span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="flex w-full gap-2">
                                <button onclick="togglePopup(true)"
                                    class="flex-1 px-3 py-2 text-xs font-medium text-slate-600 bg-slate-50 border border-slate-200 rounded-lg flex items-center justify-center gap-1.5 transition-colors hover:bg-slate-100">
                                    <i class="fas fa-eye"></i> Lihat
                                </button>
                                <button
                                    class="flex-1 px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded-lg flex items-center justify-center gap-1.5 transition-colors hover:bg-blue-700"
                                    data-modal-target="edit-img-modal" data-modal-toggle="edit-img-modal">
                                    <i class="fas fa-pen"></i> Ganti
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Account Info Card --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h3 class="text-sm font-semibold text-slate-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-info-circle text-slate-400 text-xs"></i>
                        Info Akun
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500">Role</span>
                            <span
                                class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                                <i class="fas fa-user-shield text-xs"></i> Admin
                            </span>
                        </div>
                        <div class="border-t border-slate-100"></div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500">Status</span>
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                            </span>
                        </div>
                        <div class="border-t border-slate-100"></div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500">Bergabung</span>
                            <span class="text-xs font-medium text-slate-700">
                                {{ auth()->user()->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <div class="border-t border-slate-100"></div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-500">Terakhir Dilihat</span>
                            <span class="text-xs font-medium text-slate-700">5 menit lalu</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ── Right Column ─────────────────── --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Profile Information Card --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-semibold text-slate-800 flex items-center gap-2">
                                <i class="fas fa-user text-slate-400 text-xs"></i>
                                Informasi Profil
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">Perbarui nama dan alamat email akun Anda</p>
                        </div>
                    </div>

                    <div class="p-6">
                        <form id="send-verification" method="post" action="{{ route('admin.settings.update') }}">
                            @csrf
                        </form>

                        <form action="{{ route('admin.settings.update') }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                {{-- Name --}}
                                <div>
                                    <label for="name" class="block mb-1.5 text-xs font-medium text-slate-600">
                                        Nama Lengkap
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                            <i class="fas fa-user text-xs"></i>
                                        </div>
                                        <input type="text" name="name" id="name"
                                            class="pl-9 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent block w-full py-2.5 transition-all"
                                            required autofocus autocomplete="name" placeholder="Masukkan nama Anda"
                                            value="{{ old('name', $user->name) }}">
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block mb-1.5 text-xs font-medium text-slate-600">
                                        Alamat Email
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                            <i class="fas fa-envelope text-xs"></i>
                                        </div>
                                        <input type="email" name="email" id="email"
                                            class="pl-9 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent block w-full py-2.5 transition-all"
                                            required autocomplete="email" placeholder="Masukkan email Anda"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                                </div>
                            </div>

                            <div class="mt-5 pt-5 border-t border-slate-100 flex items-center justify-between">
                                @if (session('status') === 'profile-updated')
                                    <p class="text-xs text-emerald-600 flex items-center gap-1.5">
                                        <i class="fas fa-check-circle"></i> Tersimpan
                                    </p>
                                @else
                                    <span></span>
                                @endif
                                <button type="submit"
                                    class="px-5 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Password Update Card --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100">
                        <h3 class="text-sm font-semibold text-slate-800 flex items-center gap-2">
                            <i class="fas fa-lock text-slate-400 text-xs"></i>
                            Perbarui Password
                        </h3>
                        <p class="text-xs text-slate-400 mt-0.5">Gunakan kata sandi yang panjang dan acak demi keamanan
                            akun</p>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.password.update') }}" method="post">
                            @csrf
                            @method('put')

                            <div class="space-y-5">
                                {{-- Current Password --}}
                                <div>
                                    <label for="update_password_current_password"
                                        class="block mb-1.5 text-xs font-medium text-slate-600">
                                        Kata Sandi Saat Ini
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                            <i class="fas fa-lock text-xs"></i>
                                        </div>
                                        <input type="password" name="current_password"
                                            id="update_password_current_password"
                                            class="pl-9 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent block w-full py-2.5 pr-10 transition-all"
                                            autocomplete="current-password" placeholder="Masukkan kata sandi saat ini">
                                        <button type="button"
                                            onclick="toggleVisibility('update_password_current_password', 'icon-cp')"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                                            <i id="icon-cp" class="fas fa-eye text-xs"></i>
                                        </button>
                                    </div>
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1.5" />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    {{-- New Password --}}
                                    <div>
                                        <label for="update_password_password"
                                            class="block mb-1.5 text-xs font-medium text-slate-600">
                                            Password Baru
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                                <i class="fas fa-key text-xs"></i>
                                            </div>
                                            <input type="password" name="password" id="update_password_password"
                                                class="pl-9 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent block w-full py-2.5 pr-10 transition-all"
                                                autocomplete="new-password" placeholder="Masukkan password baru">
                                            <button type="button"
                                                onclick="toggleVisibility('update_password_password', 'icon-np')"
                                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                                                <i id="icon-np" class="fas fa-eye text-xs"></i>
                                            </button>
                                        </div>
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1.5" />
                                    </div>

                                    {{-- Confirm Password --}}
                                    <div>
                                        <label for="update_password_password_confirmation"
                                            class="block mb-1.5 text-xs font-medium text-slate-600">
                                            Konfirmasi Password
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                                <i class="fas fa-shield-alt text-xs"></i>
                                            </div>
                                            <input type="password" name="password_confirmation"
                                                id="update_password_password_confirmation"
                                                class="pl-9 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent block w-full py-2.5 pr-10 transition-all"
                                                autocomplete="new-password" placeholder="Konfirmasi password baru">
                                            <button type="button"
                                                onclick="toggleVisibility('update_password_password_confirmation', 'icon-conf')"
                                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                                                <i id="icon-conf" class="fas fa-eye text-xs"></i>
                                            </button>
                                        </div>
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1.5" />
                                    </div>
                                </div>
                            </div>

                            {{-- Password strength hint --}}
                            <div
                                class="mt-4 flex items-start gap-2 bg-amber-50 border border-amber-100 rounded-lg px-3 py-2.5">
                                <i class="fas fa-lightbulb text-amber-400 text-xs mt-0.5"></i>
                                <p class="text-xs text-amber-700">Gunakan minimal 8 karakter dengan kombinasi huruf besar,
                                    huruf kecil, angka, dan simbol.</p>
                            </div>

                            <div class="mt-5 pt-5 border-t border-slate-100 flex justify-end">
                                <button type="submit"
                                    class="px-5 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                                    <i class="fas fa-shield-alt"></i> Perbarui Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Danger Zone Card --}}
                <div class="bg-white rounded-2xl border border-red-100 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-red-50 flex items-center gap-2">
                        <i class="fas fa-exclamation-triangle text-red-400 text-xs"></i>
                        <h3 class="text-sm font-semibold text-slate-800">Zona Bahaya</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-700">Keluar dari Sesi</p>
                                <p class="text-xs text-slate-400 mt-0.5">Akhiri sesi aktif Anda sekarang</p>
                            </div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 text-xs font-semibold text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition-colors flex items-center gap-1.5">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ══════════════════════════════
     View Profile Image Modal
══════════════════════════════ --}}
    <div id="popup" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50">
        <div class="relative bg-white rounded-2xl shadow-xl p-6 w-11/12 md:w-2/5 max-h-[90vh] overflow-y-auto">
            <button onclick="togglePopup(false)"
                class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors">
                <i class="fas fa-times text-sm"></i>
            </button>
            <div class="flex flex-col items-center gap-4">
                <img id="profileImage" src="{{ asset('storage/' . auth()->user()->adminsProfile->profile_image) }}"
                    alt="Foto Profil" class="rounded-xl w-full max-h-80 object-cover">
                <div class="text-center">
                    <h3 class="text-sm font-semibold text-slate-800">Foto Profil</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Gambar profil Anda saat ini</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════
     Edit Profile Image Modal
══════════════════════════════ --}}
    <div id="edit-img-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl shadow-xl">
                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 bg-blue-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-camera text-blue-600 text-xs"></i>
                        </div>
                        <h3 class="text-sm font-semibold text-slate-800">Perbarui Foto Profil</h3>
                    </div>
                    <button type="button"
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors"
                        data-modal-hide="edit-img-modal">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>

                <div class="p-5">
                    <form class="space-y-4" action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="profile_image" class="block text-xs font-medium text-slate-600 mb-2">Pilih
                                Foto</label>
                            <label for="profile_image"
                                class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-200 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                                <div class="flex flex-col items-center justify-center py-5">
                                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-3">
                                        <i class="fas fa-cloud-upload-alt text-blue-500"></i>
                                    </div>
                                    <p class="text-sm text-slate-600 font-medium">Klik untuk unggah</p>
                                    <p class="text-xs text-slate-400 mt-1">atau seret dan jatuhkan di sini</p>
                                    <p class="text-xs text-slate-400 mt-2">JPG, JPEG atau PNG (maks. 2MB)</p>
                                </div>
                                <input id="profile_image" name="profile_image" type="file" class="hidden"
                                    accept=".jpg, .jpeg, .png" required />
                            </label>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-xs px-5 py-2.5 text-center transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-upload"></i> Unggah Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════
     Scripts
══════════════════════════════ --}}
    @if (session('status') === 'password-updated')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Password Anda telah diperbarui.',
                    timer: 3000,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'rounded-2xl'
                    }
                });
            });
        </script>
    @endif

    <script>
        function togglePopup(show) {
            const popup = document.getElementById('popup');
            popup.classList.toggle('hidden', !show);
            popup.classList.toggle('flex', show);
        }

        function toggleVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
@endsection
