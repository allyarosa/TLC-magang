@extends('layouts.adminDashboard')

@section('title', 'Pengaturan Footer Website')

@push('ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endpush

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div class="flex items-center justify-between p-4 mb-6 bg-blue-600 rounded-xl shadow-lg">
            <a href="#"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-indigo-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Pengaturan Footer Website</h1>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-sm animate-fade-in">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Error Alert -->
        @if (session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm animate-fade-in">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="text-red-800 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Form header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-3 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Informasi Footer Landing Page
                </h3>
                <p class="mt-1 text-sm text-gray-500">Kelola informasi kontak dan media sosial yang ditampilkan di footer
                    website</p>
            </div>

            <!-- Form body -->
            <div class="p-3">
                <form action="{{ route('admin.site-info.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Form fields in sections -->
                    <div class="space-y-8">

                        <!-- Social Media Section -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                            <div class="flex items-center mb-6">
                                <div class="bg-blue-600 rounded-full p-3 mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Media Sosial</h4>
                                    <p class="text-sm text-gray-600">Masukkan link akun media sosial perusahaan</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Instagram -->
                                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="instagram" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                            </svg>
                                            Instagram
                                        </span>
                                    </label>
                                    <input type="url" name="instagram" id="instagram"
                                        value="{{ old('instagram', $footer->instagram ?? '') }}"
                                        placeholder="Masukkan Instagram Perusahaan"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('instagram')" class="mt-1 text-xs" />
                                </div>

                                <!-- LinkedIn -->
                                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="linkedin" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                            </svg>
                                            LinkedIn
                                        </span>
                                    </label>
                                    <input type="url" name="linkedin" id="linkedin"
                                        value="{{ old('linkedin', $footer->linkedin ?? '') }}"
                                        placeholder="Masukkan LinkedIn Perusahaan"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('linkedin')" class="mt-1 text-xs" />
                                </div>

                                <!-- Facebook -->
                                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="facebook" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                            Facebook
                                        </span>
                                    </label>
                                    <input type="url" name="facebook" id="facebook"
                                        value="{{ old('facebook', $footer->facebook ?? '') }}"
                                        placeholder="Masukkan Facebook Perusahaan"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('facebook')" class="mt-1 text-xs" />
                                </div>

                                <!-- Twitter/X -->
                                {{-- <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="twitter" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                            </svg>
                                            Twitter / X
                                        </span>
                                    </label>
                                    <input type="url" name="twitter" id="twitter"
                                        value="{{ old('twitter', $footer->twitter ?? '') }}"
                                        placeholder="https://x.com/username"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('twitter')" class="mt-1 text-xs" />
                                </div> --}}

                                <!-- YouTube -->
                                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="youtube" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                            </svg>
                                            YouTube
                                        </span>
                                    </label>
                                    <input type="url" name="youtube" id="youtube"
                                        value="{{ old('youtube', $footer->youtube ?? '') }}"
                                        placeholder="Masukkan Youtube Perusahaan"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('youtube')" class="mt-1 text-xs" />
                                </div>

                                <!-- TikTok -->
                                {{-- <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="tiktok" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                                            </svg>
                                            TikTok
                                        </span>
                                    </label>
                                    <input type="url" name="tiktok" id="tiktok"
                                        value="{{ old('tiktok', $footer->tiktok ?? '') }}"
                                        placeholder="https://tiktok.com/@username"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('tiktok')" class="mt-1 text-xs" />
                                </div> --}}
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                            <div class="flex items-center mb-6">
                                <div class="bg-green-600 rounded-full p-3 mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Informasi Kontak</h4>
                                    <p class="text-sm text-gray-600">Informasi untuk dihubungi oleh pengunjung</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- WhatsApp -->
                                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg>
                                            WhatsApp
                                        </span>
                                    </label>

                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 font-bold sm:text-sm">+62</span>
                                        </div>

                                        <input type="number" name="whatsapp" id="whatsapp"
                                            value="{{ old('whatsapp', $footer->whatsapp ?? '') }}" placeholder="812xxxxx"
                                            class="pl-12 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                            oninput="if(this.value.startsWith('0')) this.value = this.value.replace(/^0+/, '');">
                                    </div>

                                    <p class="text-xs text-gray-500 mt-1">Masukkan nomor tanpa angka 0 di depan.</p>
                                    <x-input-error :messages="$errors->get('whatsapp')" class="mt-1 text-xs" />
                                </div>  

                                <!-- Email -->
                                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                            </svg>
                                            Email
                                        </span>
                                    </label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $footer->email ?? '') }}"
                                        placeholder="Masukkan Email Perusahaan"
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
                                </div>
                            </div>
                        </div>

                        <!-- Company Information Section -->
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-100">
                            <div class="flex items-center mb-6">
                                <div class="bg-purple-600 rounded-full p-3 mr-4">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Informasi Perusahaan</h4>
                                    <p class="text-sm text-gray-600">Informasi tambahan tentang perusahaan</p>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <!-- Address -->
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Alamat Lengkap
                                        </span>
                                    </label>
                                    <textarea name="address" id="address" rows="3" placeholder="Masukkan alamat lengkap perusahaan..."
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">{{ old('address', $footer->address ?? '') }}</textarea>
                                    <x-input-error :messages="$errors->get('address')" class="mt-1 text-xs" />
                                </div>

                                <!-- Company Description -->
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Deskripsi Singkat
                                        </span>
                                    </label>
                                    <textarea name="description" id="description" rows="4"
                                        placeholder="Masukkan deskripsi singkat tentang perusahaan atau website..."
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">{{ old('description', $footer->description ?? '') }}</textarea>
                                    <p class="text-xs text-gray-500 mt-1">Maksimal 200 karakter untuk tampilan optimal</p>
                                    <x-input-error :messages="$errors->get('description')" class="mt-1 text-xs" />
                                </div>

                                <!-- Copyright Text -->
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <label for="copyright" class="block mb-2 text-sm font-medium text-gray-700">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-purple-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Copyright Text
                                        </span>
                                    </label>
                                    <input type="text" name="copyright" id="copyright"
                                        value="{{ old('copyright', $footer->copyright ?? '© 2024 Company Name. All rights reserved.') }}"
                                        placeholder="© 2024 Company Name. All rights reserved."
                                        class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                                    <x-input-error :messages="$errors->get('copyright')" class="mt-1 text-xs" />
                                </div>
                            </div>
                        </div>

                        {{-- ===== PAYMENT SETTINGS SECTION ===== --}}
                        <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-xl border border-amber-100">
                            <div class="flex items-center mb-6">
                                <div class="bg-amber-500 rounded-full p-3 mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-800">Pengaturan Metode Pembayaran</h4>
                                    <p class="text-sm text-gray-600">Pilih metode pembayaran aktif untuk semua transaksi</p>
                                </div>
                            </div>

                            {{-- Toggle Midtrans / Manual --}}
                            <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Mode Pembayaran Aktif</label>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <label class="flex items-center gap-3 p-4 rounded-xl border-2 cursor-pointer transition-all flex-1
                                        {{ old('payment_method', $footer->payment_method ?? 'midtrans') === 'midtrans' ? 'border-blue-500 bg-blue-50' : 'border-gray-200 hover:border-blue-300' }}">
                                        <input type="radio" name="payment_method" value="midtrans" id="pm_midtrans"
                                            {{ old('payment_method', $footer->payment_method ?? 'midtrans') === 'midtrans' ? 'checked' : '' }}
                                            class="text-blue-600" onchange="toggleBankFields()">
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">💳 Midtrans (Payment Gateway)</p>
                                            <p class="text-xs text-gray-500 mt-0.5">Transfer, VA, QRIS, Kartu Kredit otomatis</p>
                                        </div>
                                    </label>
                                    <label class="flex items-center gap-3 p-4 rounded-xl border-2 cursor-pointer transition-all flex-1
                                        {{ old('payment_method', $footer->payment_method ?? 'midtrans') === 'manual' ? 'border-amber-500 bg-amber-50' : 'border-gray-200 hover:border-amber-300' }}">
                                        <input type="radio" name="payment_method" value="manual" id="pm_manual"
                                            {{ old('payment_method', $footer->payment_method ?? 'midtrans') === 'manual' ? 'checked' : '' }}
                                            class="text-amber-600" onchange="toggleBankFields()">
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">🏦 Transfer Bank Manual</p>
                                            <p class="text-xs text-gray-500 mt-0.5">User transfer ke rekening, admin konfirmasi</p>
                                        </div>
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('payment_method')" class="mt-1 text-xs" />
                            </div>

                            {{-- Bank Details (hanya tampil jika manual) --}}
                            <div id="bank-fields" class="{{ old('payment_method', $footer->payment_method ?? 'midtrans') === 'manual' ? '' : 'hidden' }} space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <label for="bank_name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Bank</label>
                                        <input type="text" name="bank_name" id="bank_name"
                                            value="{{ old('bank_name', $footer->bank_name ?? '') }}"
                                            placeholder="Contoh: BCA, BRI, Mandiri"
                                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5">
                                        <x-input-error :messages="$errors->get('bank_name')" class="mt-1 text-xs" />
                                    </div>

                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <label for="bank_account_number" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Rekening</label>
                                        <input type="text" name="bank_account_number" id="bank_account_number"
                                            value="{{ old('bank_account_number', $footer->bank_account_number ?? '') }}"
                                            placeholder="Contoh: 1234567890"
                                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 font-mono">
                                        <x-input-error :messages="$errors->get('bank_account_number')" class="mt-1 text-xs" />
                                    </div>

                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <label for="bank_account_name" class="block text-sm font-semibold text-gray-700 mb-2">Atas Nama Rekening</label>
                                        <input type="text" name="bank_account_name" id="bank_account_name"
                                            value="{{ old('bank_account_name', $footer->bank_account_name ?? '') }}"
                                            placeholder="Nama pemegang rekening"
                                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5">
                                        <x-input-error :messages="$errors->get('bank_account_name')" class="mt-1 text-xs" />
                                    </div>

                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <label for="payment_instructions" class="block text-sm font-semibold text-gray-700 mb-2">Instruksi Tambahan</label>
                                        <textarea name="payment_instructions" id="payment_instructions" rows="3"
                                            placeholder="Contoh: Transfer sesuai nominal dan sertakan nama lengkap..."
                                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5">{{ old('payment_instructions', $footer->payment_instructions ?? '') }}</textarea>
                                        <x-input-error :messages="$errors->get('payment_instructions')" class="mt-1 text-xs" />
                                    </div>
                                </div>

                                <div class="bg-amber-100 border border-amber-300 rounded-lg p-3 text-xs text-amber-800 flex items-start gap-2">
                                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Saat mode manual aktif, semua pembayaran baru akan menggunakan transfer bank. Konfirmasi pembayaran dilakukan secara manual oleh admin di halaman <strong>Admin → Pembayaran → Menunggu Konfirmasi</strong>.</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->

                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        {{-- <a href="#"
                            class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Batal
                        </a> --}}

                        <button type="submit"
                            class="px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 flex items-center shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Add smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }

        /* Hover effect for input fields */
        input:hover,
        select:hover,
        textarea:hover {
            border-color: #6366f1;
        }

        /* Focus effect */
        input:focus,
        select:focus,
        textarea:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
    </style>
    <script>
        // Auto hide success/error messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.animate-fade-in');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const urlFields = ['instagram', 'linkedin', 'facebook', 'twitter', 'youtube', 'tiktok', 'telegram'];
            let hasError = false;

            urlFields.forEach(field => {
                const input = document.getElementById(field);
                if (input && input.value && !input.value.startsWith('http')) {
                    input.value = 'https://' + input.value;
                }
            });

            // Validate WhatsApp number format
            const whatsappInput = document.getElementById('whatsapp');
            if (whatsappInput && whatsappInput.value) {
                const phone = whatsappInput.value.replace(/\D/g, '');
                if (phone.length < 10) {
                    alert('Nomor WhatsApp tidak valid. Minimal 10 digit.');
                    whatsappInput.focus();
                    e.preventDefault();
                    hasError = true;
                }
            }

            // Validate description length
            const descInput = document.getElementById('description');
            if (descInput && descInput.value.length > 200) {
                if (!confirm('Deskripsi melebihi 200 karakter. Lanjutkan?')) {
                    descInput.focus();
                    e.preventDefault();
                    hasError = true;
                }
            }
        });

        // Character counter for description
        const descTextarea = document.getElementById('description');
        if (descTextarea) {
            const createCounter = () => {
                const counter = document.createElement('div');
                counter.className = 'text-xs text-gray-500 mt-1 text-right';
                counter.id = 'char-counter';
                return counter;
            };

            const counter = createCounter();
            descTextarea.parentNode.appendChild(counter);

            const updateCounter = () => {
                const length = descTextarea.value.length;
                counter.textContent = `${length}/200 karakter`;
                counter.className = length > 200 ?
                    'text-xs text-red-500 mt-1 text-right font-semibold' :
                    'text-xs text-gray-500 mt-1 text-right';
            };

            descTextarea.addEventListener('input', updateCounter);
            updateCounter();
        }

        ClassicEditor
            .create(document.querySelector('#address'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => console.error(error));

        ClassicEditor
            .create(document.querySelector('#copyright'))
            .catch(error => console.error(error));



        if (performance.navigation.type === 2) {
            // If page is accessed via Back button, reload to clear session flash
            location.reload();
        }

        // Toggle bank fields berdasarkan radio button
        function toggleBankFields() {
            const bankFields = document.getElementById('bank-fields');
            const isManual = document.getElementById('pm_manual').checked;
            if (isManual) {
                bankFields.classList.remove('hidden');
            } else {
                bankFields.classList.add('hidden');
            }
        }
    </script>
@endsection
