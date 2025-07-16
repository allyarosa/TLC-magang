<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>


    {{-- Langkah Pembayaran --}}

    <section class="purchase-guide relative mt-32 max-w-6xl mx-auto px-4 py-12"
        style="background: #ffffff; border-radius: 20px; overflow: hidden;">

        <!-- Removed gradient background decoration -->

        <div class="bg-white rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 border border-gray-200 relative z-10"
            style="box-shadow: 0 20px 60px rgba(0,0,0,0.1), 0 10px 20px rgba(13,148,136,0.15);">

            <!-- Header with animation -->
            <div class="text-center mb-8 md:mb-10 relative">
                <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold mb-4 relative"
                    style="background: linear-gradient(to right, #0d9488, #0ea5e9); -webkit-background-clip: text; background-clip: text; color: transparent; text-shadow: 0px 2px 4px rgba(0,0,0,0.1);">
                    Cara Trasaksi Paket di Teaching & Learning Certification
                </h1>
                <div class="h-1 w-20 mx-auto rounded-full"
                    style="background: linear-gradient(to right, #0d9488, #0ea5e9);"></div>
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full hidden md:block"
                    style="background: radial-gradient(circle, rgba(13,148,136,0.3) 0%, rgba(255,255,255,0) 70%);">
                </div>
                <div class="absolute -bottom-10 -left-10 w-20 h-20 rounded-full hidden md:block"
                    style="background: radial-gradient(circle, rgba(14,165,233,0.3) 0%, rgba(255,255,255,0) 70%);">
                </div>
            </div>

            <!-- Step indicator 1-4 -->
            <div class="flex justify-between items-center px-0 sm:px-2 mb-6 md:mb-8 relative">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0d9488, #0ea5e9); box-shadow: 0 4px 10px rgba(13,148,136,0.4);">
                    1</div>

                <div class="flex-1 h-1 sm:h-2 mx-1 sm:mx-2 rounded-full relative"
                    style="background: linear-gradient(90deg, #0d9488, #0ea5e9);">
                    <div class="absolute top-1/2 left-0 right-0 h-0.5 bg-white opacity-30"></div>
                </div>

                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0d9488, #0ea5e9); box-shadow: 0 4px 10px rgba(13,148,136,0.4);">
                    2</div>

                <div class="flex-1 h-1 sm:h-2 mx-1 sm:mx-2 rounded-full relative"
                    style="background: linear-gradient(90deg, #0d9488, #0ea5e9);">
                    <div class="absolute top-1/2 left-0 right-0 h-0.5 bg-white opacity-30"></div>
                </div>

                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0d9488, #0ea5e9); box-shadow: 0 4px 10px rgba(13,148,136,0.4);">
                    3</div>

                <div class="flex-1 h-1 sm:h-2 mx-1 sm:mx-2 rounded-full relative"
                    style="background: linear-gradient(90deg, #0d9488, #0ea5e9);">
                    <div class="absolute top-1/2 left-0 right-0 h-0.5 bg-white opacity-30"></div>
                </div>

                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0d9488, #0ea5e9); box-shadow: 0 4px 10px rgba(13,148,136,0.4);">
                    4</div>
            </div>

            <!-- Cards 1-4 - IMPROVED FOR BETTER IMAGE VISIBILITY -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10 md:mb-14">
                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-teal-100 hover:border-teal-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal1.png" alt="Kunjungi tlc.com"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-teal-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-teal-500 text-white font-bold text-xs">
                            1
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Ketik TLC.com di browser</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0d9488, #0ea5e9);"></div>
                    </div>
                </div>

                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-blue-100 hover:border-blue-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal2.png" alt="Pilih kategori sesuai paket"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-blue-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-blue-500 text-white font-bold text-xs">
                            2
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Pastikan kategori sesuai</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0d9488, #0ea5e9);"></div>
                    </div>
                </div>

                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-green-100 hover:border-green-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal3.png" alt="Pilih produk Tlc"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-green-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-green-500 text-white font-bold text-xs">
                            3
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Pilih produk TLC</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0d9488, #0ea5e9);"></div>
                    </div>
                </div>

                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-yellow-100 hover:border-yellow-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal4.png" alt="Pilih paket langganan"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-yellow-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-yellow-500 text-white font-bold text-xs">
                            4
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Pilih paket langganan</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0d9488, #0ea5e9);"></div>
                    </div>
                </div>
            </div>

            <!-- Step indicator 5-8 -->
            <div class="flex justify-between items-center px-0 sm:px-2 mb-6 md:mb-8 relative">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0ea5e9, #0d9488); box-shadow: 0 4px 10px rgba(14,165,233,0.4);">
                    5</div>

                <div class="flex-1 h-1 sm:h-2 mx-1 sm:mx-2 rounded-full relative"
                    style="background: linear-gradient(90deg, #0ea5e9, #0d9488);">
                    <div class="absolute top-1/2 left-0 right-0 h-0.5 bg-white opacity-30"></div>
                </div>

                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0ea5e9, #0d9488); box-shadow: 0 4px 10px rgba(14,165,233,0.4);">
                    6</div>

                <div class="flex-1 h-1 sm:h-2 mx-1 sm:mx-2 rounded-full relative"
                    style="background: linear-gradient(90deg, #0ea5e9, #0d9488);">
                    <div class="absolute top-1/2 left-0 right-0 h-0.5 bg-white opacity-30"></div>
                </div>

                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0ea5e9, #0d9488); box-shadow: 0 4px 10px rgba(14,165,233,0.4);">
                    7</div>

                <div class="flex-1 h-1 sm:h-2 mx-1 sm:mx-2 rounded-full relative"
                    style="background: linear-gradient(90deg, #0ea5e9, #0d9488);">
                    <div class="absolute top-1/2 left-0 right-0 h-0.5 bg-white opacity-30"></div>
                </div>

                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center text-white font-bold text-sm sm:text-base md:text-lg relative z-10"
                    style="background: linear-gradient(135deg, #0ea5e9, #0d9488); box-shadow: 0 4px 10px rgba(14,165,233,0.4);">
                    8</div>
            </div>

            <!-- Cards 5-8 - IMPROVED FOR BETTER IMAGE VISIBILITY -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-red-100 hover:border-red-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal5.png" alt="Pilih kode diskon"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-red-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-red-500 text-white font-bold text-xs">
                            5
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Pilih kode diskon</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0ea5e9, #0d9488);"></div>
                    </div>
                </div>

                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-purple-100 hover:border-purple-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal6.png" alt="Halaman draft invoice"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-purple-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-purple-500 text-white font-bold text-xs">
                            6
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Halaman draft invoice</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0ea5e9, #0d9488);"></div>
                    </div>
                </div>

                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-pink-100 hover:border-pink-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal7.png" alt="Pilih metode pembayaran"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-pink-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-pink-500 text-white font-bold text-xs">
                            7
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Pilih metode pembayaran</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0ea5e9, #0d9488);"></div>
                    </div>
                </div>

                <div class="flex flex-col items-center group">
                    <div class="rounded-xl shadow-lg overflow-hidden mb-3 w-full h-56 sm:h-44 md:h-60 lg:h-64 relative border-2 border-orange-100 hover:border-orange-300 transition-all duration-300"
                        style="background: #ffffff;">
                        <div class="absolute inset-0 flex items-center justify-center p-3 md:p-4">
                            <img src="images/asal8.png" alt="Lihat invoice pembayaran"
                                class="max-w-full max-h-full object-contain transform hover:scale-105 transition-transform duration-300"
                                style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.15))" />
                        </div>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-orange-500 to-transparent h-1/2 opacity-0 group-hover:opacity-20 transition-opacity">
                        </div>
                        <div
                            class="absolute top-2 right-2 w-6 h-6 rounded-full flex items-center justify-center bg-orange-500 text-white font-bold text-xs">
                            8
                        </div>
                    </div>
                    <div class="relative">
                        <p class="text-center font-bold text-gray-800 px-4 py-2 text-sm sm:text-base rounded-full"
                            style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <span class="relative z-10">Lihat invoice pembayaran</span>
                        </p>
                        <div class="absolute -bottom-1 left-0 right-0 h-0.5 rounded-full"
                            style="background: linear-gradient(to right, #0ea5e9, #0d9488);"></div>
                    </div>
                </div>
            </div>

            <!-- Removed decorative gradient elements -->
        </div>
    </section>
    {{-- End Langkah Pembayaran --}}

    {{-- Checkout --}}
    {{-- <section class="checkout-section max-w-6xl mx-auto p-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
            <p class="text-gray-500">Selesaikan pembelian Anda dengan aman</p>
        </div>

        <!-- Steps -->
        <div class="flex items-center justify-between mb-10 relative">
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center font-bold transform hover:scale-110 transition">
                    1</div>
                <span class="mt-2 text-sm font-semibold">Keranjang</span>
            </div>
            <div class="h-0.5 bg-gray-300 absolute left-0 right-0 top-5 z-0"></div>
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-10 h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-400 transition">
                    2</div>
                <span class="mt-2 text-sm text-gray-500">Pengiriman</span>
            </div>
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-10 h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-400 transition">
                    3</div>
                <span class="mt-2 text-sm text-gray-500">Pembayaran</span>
            </div>
        </div>

        <!-- Main content grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200 hover:shadow-xl transition">
                <h2 class="text-xl font-bold pb-4 border-b border-gray-200">Keranjang Anda</h2>
                <p class="text-gray-500 text-sm my-4">Tinjau barang Anda sebelum melanjutkan</p>
                <div class="flex items-center py-4 border-b border-gray-100 hover:bg-gray-50 transition">
                    <div class="w-20 h-20 bg-gray-200 rounded-md flex items-center justify-center mr-4">
                        🎧
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Paket A</h3>
                        <div class="flex items-center text-gray-500 text-sm mt-1">
                            <span>Rp3.799.000</span>
                            <span class="mx-2">×</span>
                            <div class="flex items-center border rounded">
                                <button class="px-2 py-1 text-gray-500 hover:bg-gray-200">−</button>
                                <input type="text" value="1" class="w-8 text-center text-sm border-x" />
                                <button class="px-2 py-1 text-gray-500 hover:bg-gray-200">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold">Rp3.799.000</div>
                </div>
                <div class="flex items-center py-4 border-b border-gray-100 hover:bg-gray-50 transition">
                    <div class="w-20 h-20 bg-gray-200 rounded-md flex items-center justify-center mr-4">
                        🎧
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Paket B</h3>
                        <div class="flex items-center text-gray-500 text-sm mt-1">
                            <span>Rp3.799.000</span>
                            <span class="mx-2">×</span>
                            <div class="flex items-center border rounded">
                                <button class="px-2 py-1 text-gray-500 hover:bg-gray-200">−</button>
                                <input type="text" value="1" class="w-8 text-center text-sm border-x" />
                                <button class="px-2 py-1 text-gray-500 hover:bg-gray-200">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold">Rp3.799.000</div>
                </div>
                <div class="flex items-center py-4 border-b border-gray-100 hover:bg-gray-50 transition">
                    <div class="w-20 h-20 bg-gray-200 rounded-md flex items-center justify-center mr-4">
                        🎧
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Paket C</h3>
                        <div class="flex items-center text-gray-500 text-sm mt-1">
                            <span>Rp3.799.000</span>
                            <span class="mx-2">×</span>
                            <div class="flex items-center border rounded">
                                <button class="px-2 py-1 text-gray-500 hover:bg-gray-200">−</button>
                                <input type="text" value="1" class="w-8 text-center text-sm border-x" />
                                <button class="px-2 py-1 text-gray-500 hover:bg-gray-200">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold">Rp3.799.000</div>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200 hover:shadow-xl transition">
                    <h2 class="text-xl font-bold mb-6">Ringkasan Pesanan</h2>
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span>Rp11.897.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Ongkos Kirim</span>
                            <span>Rp150.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pajak</span>
                            <span>Rp1.189.700</span>
                        </div>
                        <div class="pt-4 border-t border-gray-200 flex justify-between font-semibold">
                            <span>Total</span>
                            <span>Rp13.236.700</span>
                        </div>
                    </div>
                    <button
                        class="w-full bg-black text-white py-3 rounded-md font-medium hover:bg-gray-800 transform hover:scale-105 transition">
                        Lanjut ke Pengiriman
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 border border-gray-200 hover:shadow-xl transition">
                    <h2 class="text-xl font-bold mb-6">Punya Kode Promo?</h2>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Masukkan kode"
                            class="flex-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        <button
                            class="bg-white border border-gray-300 text-gray-800 px-4 py-2 rounded-md font-medium hover:bg-gray-50 transform hover:scale-105 transition">
                            Gunakan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="checkout-section max-w-6xl mx-auto p-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
            <p class="text-gray-500">Selesaikan pembelian Anda dengan aman</p>
        </div>

        <!-- Steps - Responsive for mobile -->
        <div class="flex items-center justify-between mb-10 relative">
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-black text-white flex items-center justify-center font-bold transform hover:scale-110 transition text-sm md:text-base">
                    1</div>
                <span class="mt-2 text-xs md:text-sm font-semibold">Keranjang</span>
            </div>
            <div class="h-0.5 bg-gray-300 absolute left-0 right-0 top-4 md:top-5 z-0"></div>
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-400 transition text-sm md:text-base">
                    2</div>
                <span class="mt-2 text-xs md:text-sm text-gray-500">Pemesanan</span>
            </div>
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center font-bold hover:bg-gray-400 transition text-sm md:text-base">
                    3</div>
                <span class="mt-2 text-xs md:text-sm text-gray-500">Pembayaran</span>
            </div>
        </div>

        <!-- Main content grid - Responsive layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
            <!-- Cart Section -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white rounded-lg shadow-lg p-4 md:p-6 border border-gray-200 hover:shadow-xl transition">
                    <h2 class="text-xl font-bold mb-2 md:mb-4">Pilihan Paket</h2>
                    <p class="text-gray-500 text-xs md:text-sm mb-4 md:mb-6">Pilih paket yang sesuai dengan kebutuhan
                        Anda</p>

                    <!-- Package A - Responsive -->
                    <div
                        class="flex flex-row items-center p-3 md:p-4 mb-3 md:mb-4 border rounded-lg hover:bg-gray-50 transition">
                        <div class="w-16 h-16 md:w-24 md:h-24 mr-3 md:mr-4">
                            <img src="images/levela.png" alt="Paket A"
                                class="w-full h-full object-cover rounded-lg" />
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center justify-between">
                                <div>
                                    <h3 class="text-base md:text-lg font-bold">Paket A</h3>
                                    <p class="text-gray-600 text-xs md:text-sm mt-1">Premium Audio Equipment Bundle</p>
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <span class="font-bold text-base md:text-lg">Rp3.799.000</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-2 md:mt-4">
                                <button class="text-xs md:text-sm text-red-500 hover:text-red-700">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package B - Responsive -->
                    <div
                        class="flex flex-row items-center p-3 md:p-4 mb-3 md:mb-4 border rounded-lg hover:bg-gray-50 transition">
                        <div class="w-16 h-16 md:w-24 md:h-24 mr-3 md:mr-4">
                            <img src="images/levelb.png" alt="Paket B"
                                class="w-full h-full object-cover rounded-lg" />
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center justify-between">
                                <div>
                                    <h3 class="text-base md:text-lg font-bold">Paket B</h3>
                                    <p class="text-gray-600 text-xs md:text-sm mt-1">Gaming System Complete Set</p>
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <span class="font-bold text-base md:text-lg">Rp3.799.000</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-2 md:mt-4">
                                <button class="text-xs md:text-sm text-red-500 hover:text-red-700">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <!-- Package C - Responsive -->
                    <div class="flex flex-row items-center p-3 md:p-4 border rounded-lg hover:bg-gray-50 transition">
                        <div class="w-16 h-16 md:w-24 md:h-24 mr-3 md:mr-4">
                            <img src="images/levelc.png" alt="Paket C"
                                class="w-full h-full object-cover rounded-lg" />
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-center justify-between">
                                <div>
                                    <h3 class="text-base md:text-lg font-bold">Paket C</h3>
                                    <p class="text-gray-600 text-xs md:text-sm mt-1">Smart Home Connectivity Bundle</p>
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <span class="font-bold text-base md:text-lg">Rp3.799.000</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-2 md:mt-4">
                                <button class="text-xs md:text-sm text-red-500 hover:text-red-700">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary - Responsive -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-4 md:p-6 border border-gray-200 mb-4 md:mb-6">
                    <h2 class="text-lg md:text-xl font-bold mb-4 md:mb-6">Ringkasan Pesanan</h2>
                    <div class="space-y-3 md:space-y-4 mb-4 md:mb-6">
                        <div class="flex justify-between">
                            <span class="text-sm md:text-base text-gray-600">Paket A </span>
                            <span class="text-sm md:text-base">Rp3.799.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm md:text-base text-gray-600">Paket B </span>
                            <span class="text-sm md:text-base">Rp3.799.000</span>
                        </div>
                        {{-- <div class="flex justify-between">
                            <span class="text-sm md:text-base text-gray-600">Paket C (1×)</span>
                            <span class="text-sm md:text-base">Rp3.799.000</span>
                        </div> --}}
                        <div class="border-t border-gray-200 pt-3 md:pt-4">
                            <div class="flex justify-between">
                                <span class="text-sm md:text-base text-gray-600">Subtotal</span>
                                <span class="text-sm md:text-base">Rp11.397.000</span>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-sm md:text-base text-gray-600">Pajak (10%)</span>
                                <span class="text-sm md:text-base">Rp1.139.700</span>
                            </div>
                        </div>
                        <div class="pt-3 md:pt-4 border-t border-gray-200 flex justify-between font-bold">
                            <span class="text-base md:text-lg">Total</span>
                            <span class="text-base md:text-lg">Rp12.536.700</span>
                        </div>
                    </div>
                    <button
                        class="w-full bg-black text-white py-2 md:py-3 rounded-md font-medium hover:bg-gray-800 transform hover:scale-105 transition text-sm md:text-base">
                        Lanjut ke Pengiriman
                    </button>
                </div>

                <!-- Promo Code Section - Responsive -->
                <div class="bg-white rounded-lg shadow-lg p-4 md:p-6 border border-gray-200">
                    <h2 class="text-base md:text-lg font-bold mb-3 md:mb-4">Punya Kode Promo?</h2>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Masukkan kode"
                            class="flex-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        <button
                            class="bg-white border border-gray-300 text-gray-800 px-3 py-2 rounded-md font-medium text-sm hover:bg-gray-50 transform hover:scale-105 transition">
                            Terapkan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Checkout Button for Mobile -->
        <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white p-4 border-t border-gray-200 shadow-lg">
            <div class="flex justify-between items-center mb-3">
                <span class="font-bold">Total:</span>
                <span class="font-bold text-lg">Rp12.536.700</span>
            </div>
            <button class="w-full bg-black text-white py-3 rounded-md font-medium">
                Lanjut ke Pengiriman
            </button>
        </div>
    </section>
    {{-- End Checkout --}}

    {{-- Riwayat Transaksi --}}
    {{-- <section
        class="relative max-w-6xl mx-auto px-4 py-12 bg-white shadow-lg rounded-xl border border-gray-200 mt-8 mb-8">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Riwayat Transaksi</h2>
        <p class="text-gray-500 mb-6">Daftar riwayat transaksi yang telah Anda lakukan</p>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 shadow-sm rounded-lg">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="border border-gray-300 px-4 py-3 text-left">No.</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Level Sertifikasi</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Harga</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Tanggal</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Status</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-4">1</td>
                        <td class="border border-gray-300 px-4 py-4">Level A</td>
                        <td class="border border-gray-300 px-4 py-4">300,000</td>
                        <td class="border border-gray-300 px-4 py-4">2022-02-22 10:50:00</td>
                        <td class="border border-gray-300 px-4 py-4">
                            <span
                                class="bg-yellow-100 text-yellow-700 px-3 py-1 text-xs font-semibold rounded-full">Waiting
                                to Validate</span>
                        </td>
                        <td class="border border-gray-300 px-4 py-4 text-center">-</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-4">2</td>
                        <td class="border border-gray-300 px-4 py-4">Level B</td>
                        <td class="border border-gray-300 px-4 py-4">300,000</td>
                        <td class="border border-gray-300 px-4 py-4">2022-02-22 10:50:00</td>
                        <td class="border border-gray-300 px-4 py-4">
                            <span
                                class="bg-blue-100 text-blue-700 px-3 py-1 text-xs font-semibold rounded-full">Waiting
                                to Pay</span>
                        </td>
                        <td class="border border-gray-300 px-4 py-4 text-center">
                            <button
                                class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg shadow-md">Pay</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-4">3</td>
                        <td class="border border-gray-300 px-4 py-4">Level C</td>
                        <td class="border border-gray-300 px-4 py-4">300,000</td>
                        <td class="border border-gray-300 px-4 py-4">2022-02-22 10:50:00</td>
                        <td class="border border-gray-300 px-4 py-4">
                            <span
                                class="bg-green-100 text-green-700 px-3 py-1 text-xs font-semibold rounded-full">Success</span>
                        </td>
                        <td class="border border-gray-300 px-4 py-4 text-center">
                            <button
                                class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg shadow-md">Invoice</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section> --}}
    <section
        class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-xl rounded-2xl border border-gray-100 mt-8 mb-8 transform transition-all">
        <!-- Header with gradient accent -->
        <div class="relative pb-2">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
            </div>
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
                <span class="w-2 h-8 bg-blue-500 rounded-md"></span>Riwayat Transaksi
            </h2>
            <p class="text-gray-500 mt-2 ml-5">Daftar riwayat transaksi yang telah Anda lakukan</p>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-8">
            <div
                class="bg-white rounded-xl p-6 shadow-md border border-gray-100 transition duration-300 hover:shadow-lg hover:-translate-y-1">
                <h3 class="text-gray-500 font-semibold">Total Transaksi</h3>
                <p class="text-2xl font-bold text-gray-800 mt-2">3</p>
            </div>
            <div
                class="bg-white rounded-xl p-6 shadow-md border border-gray-100 transition duration-300 hover:shadow-lg hover:-translate-y-1">
                <h3 class="text-gray-500 font-semibold">Transaksi Sukses</h3>
                <p class="text-2xl font-bold text-green-600 mt-2">1</p>
            </div>
            <div
                class="bg-white rounded-xl p-6 shadow-md border border-gray-100 transition duration-300 hover:shadow-lg hover:-translate-y-1">
                <h3 class="text-gray-500 font-semibold">Menunggu Pembayaran</h3>
                <p class="text-2xl font-bold text-blue-600 mt-2">2</p>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="flex flex-col md:flex-row md:justify-between mb-6 gap-4">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text"
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full md:w-64 text-sm"
                    placeholder="Cari transaksi...">
            </div>
            <div class="flex flex-wrap gap-3">
                <select
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option>Semua Status</option>
                    <option>Success</option>
                    <option>Waiting to Pay</option>
                    <option>Waiting to Validate</option>
                </select>
                <select
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option>Semua Level</option>
                    <option>Level A</option>
                    <option>Level B</option>
                    <option>Level C</option>
                </select>
            </div>
        </div>

        <!-- Transaction Table -->
        <div class="overflow-x-auto rounded-xl shadow-md border border-gray-100">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            No.
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Level Sertifikasi
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Harga
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Tanggal
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Status
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                            1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            Level A
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            Rp 300,000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            22 Feb 2022, 10:50 WIB
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Waiting to Validate
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                            -
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                            2
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            Level B
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            Rp 300,000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            22 Feb 2022, 10:50 WIB
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Waiting to Pay
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <button
                                class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white text-sm px-5 py-2 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                                Pay
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                            3
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            Level C
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                            Rp 300,000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            22 Feb 2022, 10:50 WIB
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Success
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <button
                                class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-sm px-5 py-2 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                                Invoice
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-gray-500 text-sm">
                Showing <span class="font-medium mx-1">1</span> to <span class="font-medium mx-1">3</span> of <span
                    class="font-medium mx-1">3</span> results
            </div>
            <div class="flex gap-2">
                <button disabled class="px-3 py-1 border border-gray-300 rounded bg-gray-100 text-gray-400">
                    Previous
                </button>
                <button class="px-3 py-1 border border-gray-300 rounded bg-blue-500 text-white">
                    1
                </button>
                <button disabled class="px-3 py-1 border border-gray-300 rounded bg-gray-100 text-gray-400">
                    Next
                </button>
            </div>
        </div>
        <script>
            // Add a loading state animation when buttons are clicked
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function() {
                    if (this.innerHTML === 'Pay' || this.innerHTML === 'Invoice') {
                        const originalText = this.innerHTML;
                        this.innerHTML = '<span class="inline-block animate-pulse">Processing...</span>';
                        setTimeout(() => {
                            this.innerHTML = originalText;
                        }, 1500);
                    }
                });
            });
        </script>
    </section>
    {{-- End Riwayat trasanksi --}}

    {{-- Metode Pembayaran --}}
    {{-- <section
        class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-xl rounded-2xl border border-gray-100 mt-8 mb-8 transform transition-all">
        <!-- Header with gradient accent -->
        <div class="relative pb-2 mb-8">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-500 via-teal-500 to-cyan-500">
            </div>
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
                <span class="w-2 h-8 bg-green-500 rounded-md"></span>Metode Pembayaran
            </h2>
            <p class="text-gray-500 mt-2 ml-5">Pilih metode pembayaran yang paling nyaman untuk Anda</p>
        </div>

        <!-- Featured Payment Methods -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div
                class="bg-gradient-to-br from-green-50 to-teal-50 rounded-xl p-6 shadow-md border border-green-100 transition duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer group relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-300 to-green-400 rounded-bl-full opacity-20 group-hover:opacity-30 transition-opacity">
                </div>
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-white rounded-lg shadow-md flex items-center justify-center mr-4 overflow-hidden">
                        <img src="/api/placeholder/48/48" alt="Bank Transfer" class="w-full h-full object-cover" />
                    </div>
                    <h3 class="font-bold text-gray-800">Bank Transfer</h3>
                </div>
                <p class="text-sm text-gray-600">Transfer melalui ATM, Internet Banking, atau Mobile Banking</p>
                <div class="mt-4 flex items-center text-green-600 text-sm font-semibold">
                    <span>Pilih Bank</span>
                    <i class="fas fa-chevron-right ml-2 text-xs"></i>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 shadow-md border border-blue-100 transition duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer group relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-300 to-blue-400 rounded-bl-full opacity-20 group-hover:opacity-30 transition-opacity">
                </div>
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-white rounded-lg shadow-md flex items-center justify-center mr-4 overflow-hidden">
                        <img src="/api/placeholder/48/48" alt="E-Wallet" class="w-full h-full object-cover" />
                    </div>
                    <h3 class="font-bold text-gray-800">E-Wallet</h3>
                </div>
                <p class="text-sm text-gray-600">Bayar dengan e-wallet favorit Anda untuk proses instan</p>
                <div class="mt-4 flex items-center text-blue-600 text-sm font-semibold">
                    <span>Pilih E-Wallet</span>
                    <i class="fas fa-chevron-right ml-2 text-xs"></i>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-6 shadow-md border border-purple-100 transition duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer group relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-300 to-purple-400 rounded-bl-full opacity-20 group-hover:opacity-30 transition-opacity">
                </div>
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-white rounded-lg shadow-md flex items-center justify-center mr-4 overflow-hidden">
                        <img src="/api/placeholder/48/48" alt="Mini Market" class="w-full h-full object-cover" />
                    </div>
                    <h3 class="font-bold text-gray-800">Mini Market</h3>
                </div>
                <p class="text-sm text-gray-600">Bayar di Alfamart, Indomaret, atau minimarket terdekat</p>
                <div class="mt-4 flex items-center text-purple-600 text-sm font-semibold">
                    <span>Pilih Minimarket</span>
                    <i class="fas fa-chevron-right ml-2 text-xs"></i>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-6 shadow-md border border-amber-100 transition duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer group relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-amber-300 to-amber-400 rounded-bl-full opacity-20 group-hover:opacity-30 transition-opacity">
                </div>
                <div class="flex items-center mb-4">
                    <div
                        class="w-12 h-12 bg-white rounded-lg shadow-md flex items-center justify-center mr-4 overflow-hidden">
                        <img src="/api/placeholder/48/48" alt="QRIS" class="w-full h-full object-cover" />
                    </div>
                    <h3 class="font-bold text-gray-800">QRIS</h3>
                </div>
                <p class="text-sm text-gray-600">Scan kode QR untuk pembayaran dari aplikasi apapun</p>
                <div class="mt-4 flex items-center text-amber-600 text-sm font-semibold">
                    <span>Lihat Kode QR</span>
                    <i class="fas fa-chevron-right ml-2 text-xs"></i>
                </div>
            </div>
        </div>

        <!-- All Payment Method Options -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Semua Metode Pembayaran</h3>

            <!-- Bank Transfer Options -->
            <div class="mb-8">
                <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Bank Transfer</h4>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center">
                            <img src="/api/placeholder/64/40" alt="BCA" class="object-contain w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Bank BCA</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center">
                            <img src="/api/placeholder/64/40" alt="BNI" class="object-contain w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Bank BNI</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center">
                            <img src="/api/placeholder/64/40" alt="BRI" class="object-contain w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Bank BRI</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center">
                            <img src="/api/placeholder/64/40" alt="BSI" class="object-contain w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Bank Syariah Indonesia</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center">
                            <img src="/api/placeholder/64/40" alt="Mandiri" class="object-contain w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Bank Mandiri</p>
                    </div>
                </div>
            </div>

            <!-- E-Wallet Options -->
            <div class="mb-8">
                <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">E-Wallet</h4>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-12 h-12 mb-2 overflow-hidden rounded-full">
                            <img src="/api/placeholder/48/48" alt="GoPay" class="object-cover w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">GoPay</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-12 h-12 mb-2 overflow-hidden rounded-full">
                            <img src="/api/placeholder/48/48" alt="OVO" class="object-cover w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">OVO</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-12 h-12 mb-2 overflow-hidden rounded-full">
                            <img src="/api/placeholder/48/48" alt="Dana" class="object-cover w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Dana</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-12 h-12 mb-2 overflow-hidden rounded-full">
                            <img src="/api/placeholder/48/48" alt="LinkAja" class="object-cover w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">LinkAja</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-12 h-12 mb-2 overflow-hidden rounded-full">
                            <img src="/api/placeholder/48/48" alt="ShopeePay" class="object-cover w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">ShopeePay</p>
                    </div>
                </div>
            </div>

            <!-- Mini Market Options -->
            <div>
                <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Mini Market</h4>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center">
                            <img src="/api/placeholder/64/40" alt="Alfamart" class="object-contain w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Alfamart</p>
                    </div>

                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow cursor-pointer flex flex-col items-center">
                        <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center">
                            <img src="/api/placeholder/64/40" alt="Indomaret" class="object-contain w-full h-full" />
                        </div>
                        <p class="text-xs text-gray-600">Indomaret</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Used Payment Methods -->
        <div class="mt-8">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Metode Pembayaran Terakhir Digunakan</h3>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div
                        class="bg-white rounded-xl p-4 md:p-6 shadow-md border border-gray-100 transition duration-300 hover:shadow-lg flex items-center flex-grow w-full">
                        <div
                            class="w-12 h-12 bg-white rounded-lg shadow-sm flex items-center justify-center mr-4 overflow-hidden">
                            <img src="/api/placeholder/48/48" alt="BCA" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Bank Transfer - BCA</p>
                            <p class="text-xs text-gray-400 mt-1">Terakhir digunakan 2 hari yang lalu</p>
                        </div>
                        <button
                            class="ml-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            Gunakan
                        </button>
                    </div>

                    <div
                        class="bg-white rounded-xl p-4 md:p-6 shadow-md border border-gray-100 transition duration-300 hover:shadow-lg flex items-center flex-grow w-full">
                        <div
                            class="w-12 h-12 bg-white rounded-lg shadow-sm flex items-center justify-center mr-4 overflow-hidden">
                            <img src="/api/placeholder/48/48" alt="GoPay" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">E-Wallet - GoPay</p>
                            <p class="text-xs text-gray-400 mt-1">Terakhir digunakan 1 minggu yang lalu</p>
                        </div>
                        <button
                            class="ml-auto bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            Gunakan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Add a simple hover effect to payment method items
            document.querySelectorAll('.cursor-pointer').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.classList.add('scale-105');
                    this.style.transition = 'transform 0.3s ease';
                });

                item.addEventListener('mouseleave', function() {
                    this.classList.remove('scale-105');
                });
            });

            // Add a simple animation when buttons are clicked
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function() {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 1500);
                });
            });
        </script>
    </section> --}}
    <section class="max-w-6xl mx-auto px-6 py-12 bg-white shadow-lg rounded-2xl border border-gray-100 mt-8 mb-8">
        <!-- Header with subtle accent -->
        <div class="relative pb-2 mb-8">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
            <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
                <span class="w-2 h-8 bg-indigo-500 rounded-md"></span>Metode Pembayaran
            </h2>
            <p class="text-gray-500 mt-2 ml-5">Pilih metode pembayaran yang paling nyaman untuk Anda</p>
        </div>

        <!-- Featured Payment Methods with Dropdown -->
        <div class="grid grid-cols-1 gap-6 mb-8">
            <!-- Bank Transfer Dropdown -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="dropdown-header flex items-center justify-between p-6 cursor-pointer" onclick="toggleDropdown('bankTransfer')">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg shadow-sm flex items-center justify-center mr-4 overflow-hidden">
                            <img src="images/logibanktf.png" alt="Bank Transfer" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">Bank Transfer</h3>
                            <p class="text-sm text-gray-600">Transfer melalui ATM, Internet Banking, atau Mobile Banking</p>
                        </div>
                    </div>
                    <div class="dropdown-icon w-8 h-8 bg-blue-50 rounded-full shadow-sm flex items-center justify-center text-blue-500 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div id="bankTransfer" class="dropdown-content p-6 pt-0 hidden bg-white border-t border-gray-100">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center bg-white rounded-lg shadow-sm p-2 border border-gray-100">
                                <img src="/api/placeholder/64/40" alt="BCA" class="object-contain w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Bank BCA</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center bg-white rounded-lg shadow-sm p-2 border border-gray-100">
                                <img src="/api/placeholder/64/40" alt="BNI" class="object-contain w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Bank BNI</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center bg-white rounded-lg shadow-sm p-2 border border-gray-100">
                                <img src="/api/placeholder/64/40" alt="BRI" class="object-contain w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Bank BRI</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center bg-white rounded-lg shadow-sm p-2 border border-gray-100">
                                <img src="/api/placeholder/64/40" alt="BSI" class="object-contain w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Bank Syariah</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-16 h-10 mb-2 overflow-hidden flex items-center justify-center bg-white rounded-lg shadow-sm p-2 border border-gray-100">
                                <img src="/api/placeholder/64/40" alt="Mandiri" class="object-contain w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Bank Mandiri</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- E-Wallet Dropdown -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="dropdown-header flex items-center justify-between p-6 cursor-pointer" onclick="toggleDropdown('eWallet')">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-50 rounded-lg shadow-sm flex items-center justify-center mr-4 overflow-hidden">
                            <img src="images/ewallet.png" alt="E-Wallet" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">E-Wallet</h3>
                            <p class="text-sm text-gray-600">Bayar dengan e-wallet favorit Anda untuk proses instan</p>
                        </div>
                    </div>
                    <div class="dropdown-icon w-8 h-8 bg-purple-50 rounded-full shadow-sm flex items-center justify-center text-purple-500 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div id="eWallet" class="dropdown-content p-6 pt-0 hidden bg-white border-t border-gray-100">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-12 h-12 mb-2 overflow-hidden rounded-full bg-white shadow-sm p-2 flex items-center justify-center border border-gray-100">
                                <img src="/api/placeholder/48/48" alt="GoPay" class="object-cover w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">GoPay</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-12 h-12 mb-2 overflow-hidden rounded-full bg-white shadow-sm p-2 flex items-center justify-center border border-gray-100">
                                <img src="/api/placeholder/48/48" alt="OVO" class="object-cover w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">OVO</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-12 h-12 mb-2 overflow-hidden rounded-full bg-white shadow-sm p-2 flex items-center justify-center border border-gray-100">
                                <img src="/api/placeholder/48/48" alt="Dana" class="object-cover w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">Dana</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-12 h-12 mb-2 overflow-hidden rounded-full bg-white shadow-sm p-2 flex items-center justify-center border border-gray-100">
                                <img src="/api/placeholder/48/48" alt="LinkAja" class="object-cover w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">LinkAja</p>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex flex-col items-center">
                            <div class="w-12 h-12 mb-2 overflow-hidden rounded-full bg-white shadow-sm p-2 flex items-center justify-center border border-gray-100">
                                <img src="/api/placeholder/48/48" alt="ShopeePay" class="object-cover w-full h-full" />
                            </div>
                            <p class="text-xs text-gray-600 font-medium">ShopeePay</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QRIS Dropdown -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="dropdown-header flex items-center justify-between p-6 cursor-pointer" onclick="toggleDropdown('qris')">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-amber-50 rounded-lg shadow-sm flex items-center justify-center mr-4 overflow-hidden">
                            <img src="images/qris.png" alt="QRIS" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">QRIS</h3>
                            <p class="text-sm text-gray-600">Scan kode QR untuk pembayaran dari aplikasi apapun</p>
                        </div>
                    </div>
                    <div class="dropdown-icon w-8 h-8 bg-amber-50 rounded-full shadow-sm flex items-center justify-center text-amber-500 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div id="qris" class="dropdown-content p-6 pt-0 hidden bg-white border-t border-gray-100">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-center w-full md:w-1/2 h-64">
                            <div class="w-48 h-48 bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                                <img src="/api/placeholder/160/160" alt="QRIS Code" class="w-full h-full object-contain" />
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 p-4">
                            <h4 class="font-bold text-gray-800 mb-4">Cara Pembayaran dengan QRIS:</h4>
                            <ol class="space-y-3">
                                <li class="flex items-start">
                                    <span class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">1</span>
                                    <p class="text-sm text-gray-600">Buka aplikasi e-wallet atau m-banking Anda</p>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">2</span>
                                    <p class="text-sm text-gray-600">Pilih menu Scan QR atau QRIS</p>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">3</span>
                                    <p class="text-sm text-gray-600">Scan kode QR di samping</p>
                                </li>
                                <li class="flex items-start">
                                    <span class="w-6 h-6 bg-amber-500 text-white rounded-full flex items-center justify-center mr-3 flex-shrink-0">4</span>
                                    <p class="text-sm text-gray-600">Periksa detail transaksi dan konfirmasi pembayaran</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mini Market Dropdown -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="dropdown-header flex items-center justify-between p-6 cursor-pointer" onclick="toggleDropdown('miniMarket')">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-50 rounded-lg shadow-sm flex items-center justify-center mr-4 overflow-hidden">
                            <img src="images/minimarket.png" alt="Mini Market" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">Mini Market</h3>
                            <p class="text-sm text-gray-600">Bayar di Alfamart, Indomaret, atau minimarket terdekat</p>
                        </div>
                    </div>
                    <div class="dropdown-icon w-8 h-8 bg-green-50 rounded-full shadow-sm flex items-center justify-center text-green-500 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div id="miniMarket" class="dropdown-content p-6 pt-0 hidden bg-white border-t border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex items-center">
                            <div class="w-16 h-10 mb-0 overflow-hidden flex items-center justify-center bg-white rounded-lg shadow-sm p-2 mr-4 border border-gray-100">
                                <img src="/api/placeholder/64/40" alt="Alfamart" class="object-contain w-full h-full" />
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">Alfamart</p>
                                <p class="text-xs text-gray-600 mt-1">Tersedia di 10.000+ gerai di seluruh Indonesia</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl hover:bg-gray-50 transition-colors cursor-pointer flex items-center">
                            <div class="w-16 h-10 mb-0 overflow-hidden flex items-center justify-center bg-white rounded-lg shadow-sm p-2 mr-4 border border-gray-100">
                                <img src="/api/placeholder/64/40" alt="Indomaret" class="object-contain w-full h-full" />
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">Indomaret</p>
                                <p class="text-xs text-gray-600 mt-1">Tersedia di 15.000+ gerai di seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Used Payment Methods -->
        <div class="mt-12">
            <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                <span class="w-1 h-6 bg-indigo-500 rounded-md mr-2"></span>
                Metode Pembayaran Terakhir Digunakan
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-200 transition duration-300 hover:shadow-xl group cursor-pointer">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white border border-blue-100 rounded-xl shadow-sm flex items-center justify-center mr-4 overflow-hidden group-hover:scale-110 transition-transform">
                            <img src="images/bca.png" alt="BCA" class="w-8 h-8 object-contain" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Bank Transfer - BCA</p>
                            <p class="text-xs text-gray-400 mt-1">Terakhir digunakan 2 hari yang lalu</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <span class="bg-blue-100 text-blue-800 text-xs py-1 px-2 rounded-full mr-3">Cepat</span>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors shadow-md hover:shadow-lg">
                                Gunakan
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-200 transition duration-300 hover:shadow-xl group cursor-pointer">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white border border-green-100 rounded-xl shadow-sm flex items-center justify-center mr-4 overflow-hidden group-hover:scale-110 transition-transform">
                            <img src="images/ewallet.png" alt="GoPay" class="w-8 h-8 object-contain" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">E-Wallet - GoPay</p>
                            <p class="text-xs text-gray-400 mt-1">Terakhir digunakan 1 minggu yang lalu</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <span class="bg-green-100 text-green-800 text-xs py-1 px-2 rounded-full mr-3">Instan</span>
                            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition-colors shadow-md hover:shadow-lg">
                                Gunakan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promotional Banner -->
        <div class="mt-12">
            <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                <span class="w-1 h-6 bg-amber-500 rounded-md mr-2"></span>
                Promo Spesial
            </h3>
            <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-amber-200 relative">
                <!-- Abstract pattern background -->
                <div class="absolute inset-0 overflow-hidden opacity-5">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <pattern id="smallGrid" width="10" height="10" patternUnits="userSpaceOnUse">
                                <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor" stroke-width="0.5"/>
                            </pattern>
                            <pattern id="grid" width="80" height="80" patternUnits="userSpaceOnUse">
                                <rect width="80" height="80" fill="url(#smallGrid)"/>
                                <path d="M 80 0 L 0 0 0 80" fill="none" stroke="currentColor" stroke-width="1"/>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#grid)" stroke="currentColor" stroke-width="1.5" class="text-amber-500"/>
                    </svg>
                </div>
                <div class="flex flex-col md:flex-row p-6 md:p-8 relative z-10">
                    <div class="md:w-2/3">
                        <span class="inline-block bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4">Promo Terbatas</span>
                        <h4 class="text-2xl font-bold text-gray-800 mb-2">Diskon 15% untuk Pembayaran via QRIS</h4>
                        <p class="text-gray-600 mb-6">Gunakan metode pembayaran QRIS dan dapatkan potongan harga langsung hingga Rp100.000</p>
                        <div class="flex items-center gap-4">
                            <button class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all font-semibold">
                                Gunakan Sekarang
                            </button>
                            <div class="flex items-center gap-2 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm">Berlaku hingga 30 April 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/3 flex items-center justify-center mt-6 md:mt-0">
                        <div class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-full shadow-lg flex items-center justify-center border-4 border-amber-100">
                            <div class="bg-amber-500 rounded-full w-20 h-20 md:w-24 md:h-24 flex items-center justify-center text-white text-2xl md:text-4xl font-bold">
                                15%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleDropdown(id) {
                const content = document.getElementById(id);
                const header = content.previousElementSibling;
                const icon = header.querySelector('.dropdown-icon');

                // Close all other dropdowns first
                document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                    if (dropdown.id !== id && !dropdown.classList.contains('hidden')) {
                        dropdown.classList.add('hidden');
                        const otherHeader = dropdown.previousElementSibling;
                        const otherIcon = otherHeader.querySelector('.dropdown-icon');
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Toggle current dropdown
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';

                    // Add active state to header
                    header.classList.add('bg-gray-50');
                } else {
                    content.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';

                    // Remove active state from header
                    header.classList.remove('bg-gray-50');
                }
            }

            // Add a ripple effect to buttons
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function(e) {
                    const x = e.clientX - e.target.getBoundingClientRect().left;
                    const y = e.clientY - e.target.getBoundingClientRect().top;

                    const ripple = document.createElement('span');
                    ripple.classList.add('ripple');
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;

                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Add hover effect to payment options
            document.querySelectorAll('.cursor-pointer').forEach(item => {
                if (!item.classList.contains('dropdown-header')) {
                    item.addEventListener('mouseenter', function() {
                        this.classList.add('transform');
                        this.classList.add('translate-y-1');
                    });

                    item.addEventListener('mouseleave', function() {
                        this.classList.remove('transform');
                        this.classList.remove('translate-y-1');
                    });
                }
            });

            // Auto-open the first dropdown for demo purposes
            window.addEventListener('load', function() {
                setTimeout(() => {
                    toggleDropdown('bankTransfer');
                }, 500);
            });
        </script>

        <style>
            .ripple {
                position: absolute;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            }

            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            button {
                position: relative;
                overflow: hidden;
            }

            .dropdown-content {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }

            .dropdown-content:not(.hidden) {
                max-height: 1000px;
            }
        </style>
    </section>
    {{-- End Metode Pembayaran --}}

   

















    {{-- <section class="checkout-section max-w-6xl mx-auto p-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
            <p class="text-gray-500">Selesaikan pembelian Anda dengan aman</p>
        </div>

        <!-- Steps -->
        <div class="flex items-center justify-between mb-10 relative">
            <!-- Step 1 - active -->
            <div class="flex flex-col items-center z-10">
                <div class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center font-bold">1
                </div>
                <span class="mt-2 text-sm font-semibold">Keranjang</span>
            </div>

            <!-- Line 1-2 -->
            <div class="h-0.5 bg-gray-200 absolute left-0 right-0 top-5 z-0"></div>

            <!-- Step 2 - inactive -->
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                    2</div>
                <span class="mt-2 text-sm text-gray-500">Pengiriman</span>
            </div>

            <!-- Step 3 - inactive -->
            <div class="flex flex-col items-center z-10">
                <div
                    class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">
                    3</div>
                <span class="mt-2 text-sm text-gray-500">Pembayaran</span>
            </div>
        </div>

        <!-- Main content grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Cart Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <h2 class="text-xl font-bold pb-4 border-b border-gray-200">Keranjang Anda</h2>
                <p class="text-gray-500 text-sm my-4">Tinjau barang Anda sebelum melanjutkan</p>

                <!-- Cart Item 1 -->
                <div class="flex items-center py-4 border-b border-gray-100">
                    <div class="w-20 h-20 bg-gray-100 rounded-md flex items-center justify-center mr-4">
                        <span class="text-gray-300 text-xl">·</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Headphone Wireless Premium</h3>
                        <div class="flex items-center text-gray-500 text-sm mt-1">
                            <span>Rp3.799.000</span>
                            <span class="mx-2">×</span>
                            <div class="flex items-center border rounded">
                                <button class="px-2 py-1 text-gray-500">−</button>
                                <input type="text" value="1" class="w-8 text-center text-sm border-x" />
                                <button class="px-2 py-1 text-gray-500">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold">Rp3.799.000</div>
                </div>

                <!-- Cart Item 2 -->
                <div class="flex items-center py-4 border-b border-gray-100">
                    <div class="w-20 h-20 bg-gray-100 rounded-md flex items-center justify-center mr-4">
                        <span class="text-gray-300 text-xl">·</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Smartwatch Seri 5</h3>
                        <div class="flex items-center text-gray-500 text-sm mt-1">
                            <span>Rp6.099.000</span>
                            <span class="mx-2">×</span>
                            <div class="flex items-center border rounded">
                                <button class="px-2 py-1 text-gray-500">−</button>
                                <input type="text" value="1" class="w-8 text-center text-sm border-x" />
                                <button class="px-2 py-1 text-gray-500">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold">Rp6.099.000</div>
                </div>

                <!-- Cart Item 3 -->
                <div class="flex items-center py-4">
                    <div class="w-20 h-20 bg-gray-100 rounded-md flex items-center justify-center mr-4">
                        <span class="text-gray-300 text-xl">·</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold">Speaker Bluetooth Portabel</h3>
                        <div class="flex items-center text-gray-500 text-sm mt-1">
                            <span>Rp1.999.000</span>
                            <span class="mx-2">×</span>
                            <div class="flex items-center border rounded">
                                <button class="px-2 py-1 text-gray-500">−</button>
                                <input type="text" value="1" class="w-8 text-center text-sm border-x" />
                                <button class="px-2 py-1 text-gray-500">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold">Rp1.999.000</div>
                </div>
            </div>

            <!-- Order Summary & Promo Card -->
            <div class="flex flex-col gap-6">
                <!-- Order Summary -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <h2 class="text-xl font-bold mb-6">Ringkasan Pesanan</h2>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span>Rp11.897.000</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">Ongkos Kirim</span>
                            <span>Rp150.000</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">Pajak</span>
                            <span>Rp1.189.700</span>
                        </div>

                        <div class="pt-4 border-t border-gray-200 flex justify-between font-semibold">
                            <span>Total</span>
                            <span>Rp13.236.700</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-black text-white py-3 rounded-md font-medium hover:bg-gray-800 transition">
                        Lanjut ke Pengiriman
                    </button>
                </div>

                <!-- Promo Code -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <h2 class="text-xl font-bold mb-6">Punya Kode Promo?</h2>

                    <div class="flex gap-2">
                        <input type="text" placeholder="Masukkan kode"
                            class="flex-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        <button
                            class="bg-white border border-gray-300 text-gray-800 px-4 py-2 rounded-md font-medium hover:bg-gray-50 transition">
                            Gunakan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="purchase-guide mt-10 max-w-4xl mx-auto">
    <h1 class="text-xl md:text-2xl font-bold text-center text-gray-800 mb-6">Cara beli paket belajar online di website Ruangguru</h1>

        <!-- Step Indicator (Row 1) -->
        <div class="flex justify-between items-center px-4 mb-8">
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">1</div>
            <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-2"></div>
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">2</div>
            <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-2"></div>
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">3</div>
            <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-2"></div>
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">4</div>
        </div>

        <!-- Row 1 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <!-- Card 1 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Kunjungi ruangguru.com" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Ketik</span> ruangguru.com di browser handphone kamu
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Pilih kategori sesuai sekolah" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Pastikan kategori sesuai sekolah.</span> Kamu juga bisa filter produk bila diperlukan
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Pilih produk ruangbelajar" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Pilih produk ruangbelajar</span> dengan klik <span class="font-bold">Lihat Paket Belajar</span>
                </p>
            </div>

            <!-- Card 4 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Pilih paket langganan" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Pilih paket langganan</span> yang kamu inginkan. Kamu akan diarahkan ke halaman <span class="font-bold">Checkout Paket</span>
                </p>
            </div>
        </div>

        <!-- Step Indicator (Row 2) -->
        <div class="flex justify-between items-center px-4 mb-8">
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">5</div>
            <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-2"></div>
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">6</div>
            <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-2"></div>
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">7</div>
            <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-2"></div>
            <div class="w-10 h-10 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold">8</div>
        </div>

        <!-- Row 2 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Card 5 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Pilih kode diskon" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Pilih kode diskon</span> yang tersedia (jika ada) kemudian pilih salah satu metode pembayarannya
                </p>
            </div>

            <!-- Card 6 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Halaman draft invoice" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Kamu akan diarahkan ke detail pemesanan paket</span> di halaman <span class="font-bold">Draft Invoice</span>. Selanjutnya, klik <span class="font-bold">Pilih Metode Pembayaran</span>
                </p>
            </div>

            <!-- Card 7 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Pilih metode pembayaran" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Pilih metode pembayaran</span> yang kamu inginkan
                </p>
            </div>

            <!-- Card 8 -->
            <div class="flex flex-col items-center">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-3 border border-gray-200">
                    <img src="/api/placeholder/220/400" alt="Invoice" class="w-full object-cover"/>
                </div>
                <p class="text-center text-sm">
                    <span class="font-bold">Kamu akan mendapatkan invoice</span> yang berisi metode pembayaran dan jumlah yang harus dibayar
                </p>
            </div>
        </div>
    </section> --}}

    {{-- <section class="purchase-guide md:px-6 pb-8 relative max-w-5xl mx-auto px-3 py-6">
        <div class="bg-white rounded-xl shadow-xl p-6 md:p-8 border border-gray-300">
            <h1 class="text-lg md:text-xl font-bold text-center text-gray-800 mb-6">Cara beli paket di Teaching &
                Learning Certification</h1>

            <div class="flex justify-between items-center px-2 mb-6">
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    1</div>
                <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-1"></div>
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    2</div>
                <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-1"></div>
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    3</div>
                <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-1"></div>
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    4</div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-teal-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal1.png" alt="Kunjungi tlc.com" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Ketik TLC.com di browser</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-blue-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal2.png" alt="Pilih kategori sesuai paket" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Pastikan kategori sesuai</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-green-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal3.png" alt="Pilih produk Tlc" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Pilih produk TLC</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-yellow-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal4.png" alt="Pilih paket langganan" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Pilih paket langganan</p>
                </div>
            </div>

            <div class="flex justify-between items-center px-2 mb-6">
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    5</div>
                <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-1"></div>
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    6</div>
                <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-1"></div>
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    7</div>
                <div class="flex-1 border-t-2 border-dashed border-teal-400 mx-1"></div>
                <div
                    class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-semibold text-sm">
                    8</div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-red-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal5.png" alt="Pilih kode diskon" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Pilih kode diskon</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-purple-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal6.png" alt="Halaman draft invoice" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Halaman draft invoice</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-pink-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal7.png" alt="Pilih metode pembayaran" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Pilih metode pembayaran</p>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="bg-gradient-to-br from-orange-100 to-white rounded-lg shadow-md overflow-hidden mb-2 border border-gray-300 p-3 w-32 md:w-40 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <img src="images/asal8.png" alt="Invoice" class="w-full object-cover" />
                    </div>
                    <p class="text-center text-xs md:text-sm font-bold">Lihat invoice pembayaran</p>
                </div>
            </div>
        </div>
    </section> --}}



</body>

</html>
