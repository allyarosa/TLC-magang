<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'primary': '#1e40af',
                        'primary-dark': '#1e3a8a',
                        'secondary': '#f59e0b',
                    },
                    boxShadow: {
                        'card': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
                        'button': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
        }

        .stat-card {
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            z-index: 0;
        }

        .nav-item {
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            transform: translateX(5px);
        }

        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.6;
            }
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Container -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-primary text-white flex flex-col p-6 shadow-xl">
            <div class="flex items-center space-x-3 mb-8">
                <div
                    class="bg-secondary rounded-xl w-12 h-12 flex items-center justify-center text-primary-dark font-bold text-xl shadow-lg">
                    TLC
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-wide">TLC Admin</h1>
                    <p class="text-sm opacity-80 font-medium">Teaching & Learning Certification</p>
                </div>
            </div>
            <div class="mb-8 bg-primary-dark rounded-xl p-4 shadow-inner">
                <div class="flex items-center space-x-3">
                    <div
                        class="bg-gradient-to-tr from-blue-400 to-blue-600 rounded-full w-12 h-12 flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Candra Jaya</p>
                        <div class="flex items-center">
                            <span class="inline-block w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                            <p class="text-sm opacity-80">Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-2">
                <p class="text-xs uppercase tracking-wider font-semibold text-blue-300 mb-2 ml-2">Menu Utama</p>
                <a href="#" class="nav-item flex items-center space-x-3 p-3 bg-blue-700 rounded-xl shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="#"
                    class="nav-item flex items-center space-x-3 p-3 hover:bg-blue-700 rounded-xl transition-all duration-200 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-medium">Data Asesor</span>
                </a>
                <a href="#"
                    class="nav-item flex items-center space-x-3 p-3 hover:bg-blue-700 rounded-xl transition-all duration-200 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="font-medium">Data User</span>
                </a>
                <a href="#"
                    class="nav-item flex items-center space-x-3 p-3 hover:bg-blue-700 rounded-xl transition-all duration-200 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    <span class="font-medium">Data Asesi</span>
                </a>
                <p class="text-xs uppercase tracking-wider font-semibold text-blue-300 mt-6 mb-2 ml-2">Pengelolaan</p>
                <a href="#"
                    class="nav-item flex items-center space-x-3 p-3 hover:bg-blue-700 rounded-xl transition-all duration-200 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">Verifikasi</span>
                </a>
                <a href="#"
                    class="nav-item flex items-center space-x-3 p-3 hover:bg-blue-700 rounded-xl transition-all duration-200 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="font-medium">Data Nilai Asesi</span>
                </a>
            </nav>
            <div class="mt-6 border-t border-blue-700 pt-4">
                <a href="#"
                    class="nav-item flex items-center space-x-3 p-3 hover:bg-blue-700 rounded-xl transition-all duration-200 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="font-medium">Pengaturan</span>
                </a>
                <a href="#"
                    class="nav-item flex items-center space-x-3 p-3 hover:bg-blue-700 rounded-xl transition-all duration-200 hover:shadow-md mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-medium">Keluar</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Dashboard Admin</h2>
                    <p class="text-gray-500">Senin, 23 Maret 2025</p>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <input type="text"
                            class="border border-gray-300 rounded-full px-5 py-2.5 w-72 pl-12 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            placeholder="Cari data atau pengguna...">
                        <div class="absolute top-2.5 left-4 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="relative">
                        <span
                            class="absolute -right-1 -top-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-medium shadow-md">3</span>
                        <button
                            class="p-2.5 bg-gray-100 hover:bg-gray-200 rounded-full transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center space-x-3 bg-gray-100 px-4 py-2 rounded-full">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-700 text-white flex items-center justify-center rounded-full font-medium shadow-md">
                            R
                        </div>
                        <div>
                            <span class="font-medium text-gray-800">Candra</span>
                            <div class="flex items-center">
                                <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                <span class="text-xs text-gray-500">Online</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Message -->
            <div class="mt-8 bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl p-6 shadow-xl text-white">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold">Selamat Datang, Candra!</h3>
                        <p class="opacity-90 mt-1">Berikut adalah ringkasan data TLC Program</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-4 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-4 gap-6 mt-8">
                <div
                    class="stat-card card-hover bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-card">
                    <div class="flex justify-between">
                        <p class="text-lg font-medium">Total User (Asesi)</p>
                        <div class="bg-white bg-opacity-25 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-4xl font-bold">245</p>
                        <div class="flex items-center mt-2">
                            <div
                                class="flex items-center justify-center bg-white bg-opacity-25 px-2 py-1 rounded-lg mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span class="text-sm font-semibold">12%</span>
                            </div>
                            <p class="text-sm opacity-90">dari bulan lalu</p>
                        </div>
                    </div>
                </div>
                <div
                    class="stat-card card-hover bg-gradient-to-br from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow-card">
                    <div class="flex justify-between">
                        <p class="text-lg font-medium">Total User (Asesor)</p>
                        <div class="bg-white bg-opacity-25 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-4xl font-bold">32</p>
                        <div class="flex items-center mt-2">
                            <div
                                class="flex items-center justify-center bg-white bg-opacity-25 px-2 py-1 rounded-lg mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span class="text-sm font-semibold">5%</span>
                            </div>
                            <p class="text-sm opacity-90">dari bulan lalu</p>
                        </div>
                    </div>
                </div>
                <div
                    class="stat-card card-hover bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-card">
                    <div class="flex justify-between">
                        <p class="text-lg font-medium">Status Pembayaran</p>
                        <div class="bg-white bg-opacity-25 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-4xl font-bold">198</p>
                        <div class="flex items-center mt-2">
                            <div
                                class="flex items-center justify-center bg-white bg-opacity-25 px-2 py-1 rounded-lg mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span class="text-sm font-semibold">8%</span>
                            </div>
                            <p class="text-sm opacity-90">dari bulan lalu</p>
                        </div>
                    </div>
                </div>
                <div
                    class="stat-card card-hover bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-card">
                    <div class="flex justify-between">
                        <p class="text-lg font-medium">Asesi Sertifikat</p>
                        <div class="bg-white bg-opacity-25 p-2 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-4xl font-bold">156</p>
                        <div class="flex items-center mt-2">
                            <div
                                class="flex items-center justify-center bg-white bg-opacity-25 px-2 py-1 rounded-lg mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span class="text-sm font-semibold">15%</span>
                            </div>
                            <p class="text-sm opacity-90">dari bulan lalu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Container with two panels side by side -->

            <div class="flex mt-8 gap-6">
                <!-- Left Panel - Grafik -->
                <div class="bg-white p-6 rounded-2xl shadow-card flex-1">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Grafik Visualisasi Nilai/Aspek</h3>
                    </div>
                    <div class="flex items-center justify-center h-72 bg-blue-50 rounded-xl">
                        <div class="text-center max-w-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="180" height="120" fill="none"
                                viewBox="0 0 24 24" stroke="#78BCED" class="mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <p class="text-blue-500 font-medium mt-4">Grafik visualisasi nilai akan ditampilkan di sini
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Panel - Status Pembayaran -->
                <div class="bg-white p-6 rounded-2xl shadow-card w-96">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Status Pembayaran</h3>
                    </div>
                    <div class="space-y-4">
                        <!-- User 1 -->
                        <div
                            class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                            <div class="flex items-center">
                                <div
                                    class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 text-blue-600 font-medium">
                                    R
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Rudi Hermawan</p>
                                    <p class="text-sm text-gray-500">rudi@example.com</p>
                                </div>
                            </div>
                            <span
                                class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">Lunas</span>
                        </div>

                        <!-- User 2 -->
                        <div
                            class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                            <div class="flex items-center">
                                <div
                                    class="bg-purple-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 text-purple-600 font-medium">
                                    D
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Dewi Susanti</p>
                                    <p class="text-sm text-gray-500">dewi@example.com</p>
                                </div>
                            </div>
                            <span
                                class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">Lunas</span>
                        </div>

                        <!-- User 3 -->
                        <div
                            class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                            <div class="flex items-center">
                                <div
                                    class="bg-orange-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 text-orange-600 font-medium">
                                    A
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Andi Pratama</p>
                                    <p class="text-sm text-gray-500">andi@example.com</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm font-medium">Belum
                                Lunas</span>
                        </div>

                        <!-- User 4 -->
                        <div
                            class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all">
                            <div class="flex items-center">
                                <div
                                    class="bg-green-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 text-green-600 font-medium">
                                    S
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Sinta Wijaya</p>
                                    <p class="text-sm text-gray-500">sinta@example.com</p>
                                </div>
                            </div>
                            <span
                                class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">Lunas</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!-- Header -->
    <div class="flex justify-between items-center mb-6 mt-6 p-4 bg-blue-600 text-white rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold">📊 Dashboard Nilai Asesi</h1>
        <button class="bg-white text-blue-600 py-2 px-6 rounded-xl font-semibold shadow-md hover:bg-gray-200 transition">
            ⬇️ Export Data
        </button>
    </div> --}}

            <!-- Navigasi -->
            <div class="grid grid-cols-5 gap-4 mb-8 mt-8">
                <button
                    class="bg-blue-600 text-white py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-blue-700 transition">
                    📊 Data Nilai Asesi
                </button>
                <button
                    class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
                    👨‍🏫 Data Asesor
                </button>
                <button
                    class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
                    👤 Data User
                </button>
                <button
                    class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
                    🎓 Data Asesi
                </button>
                <button
                    class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
                    ✅ Verifikasi
                </button>
            </div>

            <!-- Card container -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-xl font-bold text-gray-800 mb-4">📋 Semua Nilai Asesi</h2>

                <!-- Tabel data nilai -->
                <div class="overflow-x-auto">
                    <table class="w-full bg-white rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-blue-100 text-gray-700">
                                <th class="py-3 px-6">Nama</th>
                                <th class="py-3 px-6">Asesor</th>
                                <th class="py-3 px-6">Pedagogi</th>
                                <th class="py-3 px-6">Manajemen</th>
                                <th class="py-3 px-6">Teknologi</th>
                                <th class="py-3 px-6">Evaluasi</th>
                                <th class="py-3 px-6">Rata-rata</th>
                                <th class="py-3 px-6">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-100 transition">
                                <td class="py-4 px-6 font-semibold">Rudi Hermawan</td>
                                <td class="py-4 px-6">Dr. Budi Santoso</td>
                                <td class="py-4 px-6">85</td>
                                <td class="py-4 px-6">78</td>
                                <td class="py-4 px-6">90</td>
                                <td class="py-4 px-6">82</td>
                                <td class="py-4 px-6 font-semibold">83.75</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="px-4 py-2 bg-green-500 text-white rounded-full text-sm font-medium">Lulus</span>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-gray-100 transition">
                                <td class="py-4 px-6 font-semibold">Dewi Susanti</td>
                                <td class="py-4 px-6">Prof. Siti Rahayu</td>
                                <td class="py-4 px-6">75</td>
                                <td class="py-4 px-6">88</td>
                                <td class="py-4 px-6">72</td>
                                <td class="py-4 px-6">80</td>
                                <td class="py-4 px-6 font-semibold">78.75</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="px-4 py-2 bg-green-500 text-white rounded-full text-sm font-medium">Lulus</span>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-gray-100 transition">
                                <td class="py-4 px-6 font-semibold">Andi Pratama</td>
                                <td class="py-4 px-6">Ahmad Wijaya</td>
                                <td class="py-4 px-6">65</td>
                                <td class="py-4 px-6">70</td>
                                <td class="py-4 px-6">85</td>
                                <td class="py-4 px-6">68</td>
                                <td class="py-4 px-6 font-semibold">72</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="px-4 py-2 bg-yellow-500 text-white rounded-full text-sm font-medium">Remedial</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

</body>
</html>
