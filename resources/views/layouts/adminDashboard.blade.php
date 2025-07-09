<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-...your-integrity-hash..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    @stack('ckeditor')
    <title>@yield('title', 'TLC')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body>
    <!-- Header -->
    <header>
        <nav
            class="fixed top-0 z-50 w-full bg-gradient-to-r from-[#1D4E89] to-[#0D3A6E] shadow-lg border-b-2 border-[#E76F51] backdrop-blur-sm">
            <div class="px-4 py-2 lg:px-6">
                <div class="flex items-center justify-between">
                    <!-- Logo Section -->
                    <div class="flex items-center">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm rounded-lg hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/30 transition-all duration-300 group">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-5 h-5 text-white group-hover:text-[#E76F51] transition-colors duration-300"
                                aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="#"
                            class="flex items-center justify-center ml-3 bg-white/20 backdrop-blur-sm w-9 h-9 rounded-lg shadow-md hover:scale-105 transition-all duration-300 border border-white/30">
                            <img src="{{ asset('images/logoTlcPng.png') }}" class="h-6" alt="TLC Logo" />
                        </a>
                        <div class="ml-3 hidden md:block">
                            <h1 class="text-lg font-bold text-white">TLC Admin Dashboard</h1>
                            <p class="text-xs text-white/80">Teacher Learning Center</p>
                        </div>
                    </div>

                    <!-- User Section -->
                    <div class="flex items-center space-x-3">
                        <!-- Search -->
                        {{-- <div class="relative hidden md:block">
                            <input type="text" placeholder="Cari ..........."
                                class="bg-white/20 backdrop-blur-sm text-white placeholder-white/70 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-white/50 transition-smooth w-48 lg:w-64">
                            <i
                                class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-white/70 text-sm"></i>
                        </div> --}}

                        <!-- Mobile Search Button -->
                        {{-- <button class="md:hidden p-2 rounded-lg hover:bg-white/20 transition-all duration-300">
                            <i class="fas fa-search text-white text-lg"></i>
                        </button> --}}

                        <!-- Notification Bell -->
                        {{-- <button class="relative p-2 rounded-lg hover:bg-white/20 transition-all duration-300 group">
                            <i
                                class="fas fa-bell text-lg text-white group-hover:text-[#E76F51] transition-colors duration-300"></i>
                            <span
                                class="absolute -top-1 -right-1 w-3 h-3 bg-[#E76F51] rounded-full flex items-center justify-center text-xs text-white font-bold">3</span>
                        </button> --}}

                        <!-- User Profile -->
                        <div class="relative">
                            <button type="button"
                                class="flex items-center space-x-2 py-1 px-3 text-sm rounded-lg hover:bg-white/20 focus:ring-2 focus:ring-white/30 transition-all duration-300 group"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <!-- Image Profile -->
                                @if (auth()->user()->hasRole('admin') && auth()->user()->adminsProfile && auth()->user()->adminsProfile->profile_image)
                                    <img src="{{ asset('storage/' . auth()->user()->adminsProfile->profile_image) }}"
                                        class="w-8 h-8 rounded-full object-cover shadow-sm border border-white/50 group-hover:border-[#E76F51] transition-all duration-300">
                                @else
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-r from-[#E76F51] to-[#1D4E89] flex items-center justify-center text-white font-bold shadow-sm border border-white/50 group-hover:border-[#E76F51] transition-all duration-300">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <!-- User Info -->
                                <div class="text-left hidden lg:block">
                                    <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-white/70">Admin</p>
                                </div>
                                <svg class="w-4 h-4 text-white/70 ml-1 group-hover:text-[#E76F51] transition-colors duration-300"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="z-50 hidden absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-md rounded-lg shadow-xl border border-gray-200"
                                id="dropdown-user">
                                <div class="px-4 py-3 border-b border-gray-200/50">
                                    <div class="flex items-center space-x-3">
                                        @if (auth()->user()->hasRole('admin') && auth()->user()->adminsProfile && auth()->user()->adminsProfile->profile_image)
                                            <img src="{{ asset('storage/' . auth()->user()->adminsProfile->profile_image) }}"
                                                class="w-10 h-10 rounded-full object-cover shadow-sm border border-[#1D4E89]">
                                        @else
                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-r from-[#E76F51] to-[#1D4E89] flex items-center justify-center text-white font-bold shadow-sm border border-[#1D4E89]">
                                                {{ substr(auth()->user()->name, 0, 1) }}
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</p>
                                            <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="py-1">
                                    <li>
                                        <a href="{{ route('admin.settings.edit') }}"
                                            class="flex items-center px-4 py-2 text-gray-700 font-medium hover:bg-[#1D4E89]/10 transition-all duration-300">
                                            <div
                                                class="w-7 h-7 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-user-cog text-[#1D4E89] text-sm"></i>
                                            </div>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center w-full px-4 py-2 text-red-500 font-medium hover:bg-red-50 transition-all duration-300">
                                                <div
                                                    class="w-7 h-7 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                                    <i class="fas fa-sign-out-alt text-red-500 text-sm"></i>
                                                </div>
                                                <span>Log Out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full bg-gradient-to-b from-blue-50 via-white to-orange-50 shadow-xl border-r-2 border-[#1D4E89] backdrop-blur-sm">
        <div class="h-full px-3 pb-8 overflow-y-auto">
            <div class="mb-4"></div>

            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md {{ Request::routeIs('admin.dashboard') ? 'bg-white/90 border border-[#1D4E89]' : '' }}">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#1D4E89] flex items-center justify-center text-white shadow-md group-hover:bg-[#E76F51] transition-all duration-300">
                            <i class="fas fa-home text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Dashboard</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#E76F51] flex items-center justify-center text-white shadow-md group-hover:bg-[#1D4E89] transition-all duration-300">
                            <i class="fas fa-users text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Users</span>
                        <i
                            class="fas fa-angle-down text-gray-500 ml-auto transform transition-transform duration-300"></i>
                    </button>
                    <ul id="dropdown-example" class="hidden py-1 space-y-1 pl-12">
                        <li>
                            <a href="{{ route('admin.asesi.index') }}"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300 {{ Request::routeIs('admin.asesi.index') ? 'bg-[#1D4E89]/10 border-l-2 border-[#E76F51]' : '' }}">
                                <div class="w-6 h-6 rounded-md bg-[#E76F51]/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-user-graduate text-[#E76F51] text-xs"></i>
                                </div>
                                <span class="font-medium text-sm">Asesi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.asesor.index') }}"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300 {{ Request::routeIs('admin.asesor.index') ? 'bg-[#1D4E89]/10 border-l-2 border-[#E76F51]' : '' }}">
                                <div class="w-6 h-6 rounded-md bg-[#1D4E89]/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-chalkboard-teacher text-[#1D4E89] text-xs"></i>
                                </div>
                                <span class="font-medium text-sm">Asesor</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.admins.index') }}"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300 {{ Request::routeIs('admin.admins.index') ? 'bg-[#1D4E89]/10 border-l-2 border-[#E76F51]' : '' }}">
                                <div class="w-6 h-6 rounded-md bg-yellow-500/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-user-shield text-yellow-600 text-xs"></i>
                                </div>
                                <span class="font-medium text-sm">Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md"
                        aria-controls="dropdown-level" data-collapse-toggle="dropdown-level">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#1D4E89] flex items-center justify-center text-white shadow-md group-hover:bg-[#E76F51] transition-all duration-300">
                            <i class="fas fa-layer-group text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Levels</span>
                        <i
                            class="fas fa-angle-down text-gray-500 ml-auto transform transition-transform duration-300"></i>
                    </button>
                    <ul id="dropdown-level" class="hidden py-1 space-y-1 pl-12">
                        <li>
                            <a href="{{ route('admin.level.a.index') }}"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300 {{ Request::routeIs('admin.level.a.index') ? 'bg-[#1D4E89]/10 border-l-2 border-[#E76F51]' : '' }}">
                                <div class="w-6 h-6 rounded-md bg-[#E76F51]/20 flex items-center justify-center mr-2">
                                    <span class="font-bold text-[#E76F51] text-xs">A</span>
                                </div>
                                <span class="font-medium text-sm">Level A</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300">
                                <div class="w-6 h-6 rounded-md bg-[#1D4E89]/20 flex items-center justify-center mr-2">
                                    <span class="font-bold text-[#1D4E89] text-xs">B</span>
                                </div>
                                <span class="font-medium text-sm">Level B</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300">
                                <div class="w-6 h-6 rounded-md bg-yellow-500/20 flex items-center justify-center mr-2">
                                    <span class="font-bold text-yellow-600 text-xs">C</span>
                                </div>
                                <span class="font-medium text-sm">Level C</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.level.settings.index') }}"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300 {{ Request::routeIs('admin.level.settings.index') ? 'bg-[#1D4E89]/10 border-l-2 border-[#E76F51]' : '' }}">
                                <div class="w-6 h-6 rounded-md bg-gray-500/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-gear text-gray-600 text-xs"></i>
                                </div>
                                <span class="font-medium text-sm">Settings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md"
                        aria-controls="dropdown-payment" data-collapse-toggle="dropdown-payment">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#E76F51] flex items-center justify-center text-white shadow-md group-hover:bg-[#1D4E89] transition-all duration-300">
                            <i class="fas fa-money-bill-wave text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Payments</span>
                        <i
                            class="fas fa-angle-down text-gray-500 ml-auto transform transition-transform duration-300"></i>
                    </button>
                    <ul id="dropdown-payment" class="hidden py-1 space-y-1 pl-12">
                        <li>
                            <a href="{{ route('admin.payments.index') }}"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300 {{ Request::routeIs('admin.payments.index') ? 'bg-[#1D4E89]/10 border-l-2 border-[#E76F51]' : '' }}">
                                <div class="w-6 h-6 rounded-md bg-[#E76F51]/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-exchange-alt text-[#E76F51] text-xs"></i>
                                </div>
                                <span class="font-medium text-sm">Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300">
                                <div class="w-6 h-6 rounded-md bg-[#1D4E89]/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-tag text-[#1D4E89] text-xs"></i>
                                </div>
                                <span class="font-medium text-sm">Price</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-[#1D4E89]/10 group transition-all duration-300">
                                <div class="w-6 h-6 rounded-md bg-yellow-500/20 flex items-center justify-center mr-2">
                                    <i class="fas fa-gear text-yellow-600 text-xs"></i>
                                </div>
                                <span class="font-medium text-sm">Settings</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md {{ Request::routeIs('admin.categories.index') ? 'bg-white/90 border border-[#1D4E89]' : '' }}">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#1D4E89] flex items-center justify-center text-white shadow-md group-hover:bg-[#E76F51] transition-all duration-300">
                            <i class="fas fa-history text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Level A History</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('admin.resulta.index') }}"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md {{ Request::routeIs('admin.resulta.index') ? 'bg-white/90 border border-[#1D4E89]' : '' }}">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#E76F51] flex items-center justify-center text-white shadow-md group-hover:bg-[#1D4E89] transition-all duration-300">
                            <i class="fas fa-poll text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Result Exam A</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.questions.index') }}"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md {{ Request::routeIs('admin.questions.index') ? 'bg-white/90 border border-[#1D4E89]' : '' }}">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#1D4E89] flex items-center justify-center text-white shadow-md group-hover:bg-[#E76F51] transition-all duration-300">
                            <i class="fas fa-question-circle text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Questions</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#E76F51] flex items-center justify-center text-white shadow-md group-hover:bg-[#1D4E89] transition-all duration-300">
                            <i class="fas fa-certificate text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Certificate</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#1D4E89] flex items-center justify-center text-white shadow-md group-hover:bg-[#E76F51] transition-all duration-300">
                            <i class="fas fa-image text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Dashboard Image</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md {{ Request::routeIs('admin.news.index') ? 'bg-white/90 border border-[#1D4E89]' : '' }}">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#E76F51] flex items-center justify-center text-white shadow-md group-hover:bg-[#1D4E89] transition-all duration-300">
                            <i class="fas fa-newspaper text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Portal Berita</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-white/80 group transition-all duration-300 shadow-sm hover:shadow-md">
                        <div
                            class="flex-shrink-0 w-8 h-8 rounded-lg bg-[#1D4E89] flex items-center justify-center text-white shadow-md group-hover:bg-[#E76F51] transition-all duration-300">
                            <i class="fas fa-user-plus text-sm"></i>
                        </div>
                        <span class="ms-3 text-base font-semibold">Testimonials</span>
                        <div
                            class="ml-auto w-1 h-4 rounded-full bg-[#1D4E89] opacity-0 group-hover:opacity-100 transition-all duration-300">
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <!-- main content here -->
        <div class="p-4 mt-8">
            @yield('content')
        </div>
    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @stack('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireScripts()
</body>

</html>
