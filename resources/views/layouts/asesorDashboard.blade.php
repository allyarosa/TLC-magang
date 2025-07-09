<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Asesor Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4E89',
                        secondary: '#E76F51',
                        accent: '#F8C82A',
                        dark: '#00549D',
                        light: '#0083D0',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        .transition-smooth {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1D4E89 0%, #E76F51 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #1D4E89 0%, #E76F51 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-z {
            z-index: 30;
        }

        .dropdown-z {
            z-index: 50;
        }

        .main-padding {
            padding-top: 80px;
            min-height: calc(100vh - 64px);
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .animate-shimmer {
            animation: shimmer 2s infinite;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #1D4E89;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #E76F51;
        }

        /* Active menu styles */
        .menu-active {
            background: linear-gradient(135deg, #1D4E89 0%, #E76F51 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(29, 78, 137, 0.3);
        }

        .menu-active i {
            color: white !important;
        }

        .menu-inactive {
            color: #374151;
        }

        .menu-inactive:hover {
            background: linear-gradient(135deg, rgba(29, 78, 137, 0.1) 0%, rgba(231, 111, 81, 0.1) 100%);
            color: #1D4E89;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 font-sans overflow-x-hidden">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-40 gradient-bg shadow-lg h-16">
        <div class="h-full px-4 flex items-center">
            <div class="flex items-center justify-between w-full">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <button onclick="toggleSidebar()"
                        class="inline-flex items-center p-2 text-sm text-white rounded-lg hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/30 transition-smooth">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <div class="flex items-center ml-3">
                        <div
                            class="bg-white/20 backdrop-blur-sm w-10 h-10 rounded-lg flex items-center justify-center shadow-md hover:scale-110 transition-smooth">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <h1 class="text-white font-bold text-lg">Dashboard Asesor</h1>
                            <p class="text-white/80 text-xs">Sistem Penilaian Kompetensi</p>
                        </div>
                    </div>
                </div>

                <!-- User Section -->
                <div class="flex items-center space-x-3">
                    <!-- Search -->
                    {{-- <div class="relative hidden md:block">
                        <input type="text" placeholder="Cari asesi, penilaian..."
                            class="bg-white/20 backdrop-blur-sm text-white placeholder-white/70 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-white/50 transition-smooth w-48 lg:w-64">
                        <i
                            class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-white/70 text-sm"></i>
                    </div> --}}
                    <div class="bg-white rounded-lg px-3 py-2 transition-all duration-300">
                        <div class="flex items-center space-x-2">
                            <div class="relative">
                                <svg class="h-5 w-5 text-[#1D4E89]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                    </path>
                                </svg>
                                <div
                                    class="absolute -top-0.5 -right-0.5 w-1.5 h-1.5 bg-blue-400 rounded-full animate-ping">
                                </div>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-gray-700">Selamat datang,</span>
                                <span class="ml-1 font-bold text-[#1D4E89]">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Notification -->
                    <div class="relative">
                        </button>
                        <a href="{{ route('asesor.notifikasi') }}"
                            class="relative p-2 text-white hover:bg-white/20 rounded-lg transition-smooth">
                            <i class="fas fa-bell text-lg"></i>
                        </a>
                        <span
                            class="absolute -top-1.5 -right-1.5 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold rounded-full px-1.5 py-0.5 shadow-lg animate-pulse">
                            {{ $levelBPending ?? '0' }}
                        </span>
                    </div>

                    <!-- User Dropdown -->
                    <div class="relative">
                        <button type="button" onclick="toggleUserDropdown()"
                            class="flex items-center space-x-2 p-2 rounded-lg hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/30 transition-smooth">
                            <div
                                class="bg-gradient-to-r from-[#E76F51] to-[#1D4E89] w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md">
                                AS
                            </div>
                            <div class="text-left hidden md:block">
                                <p class="text-white font-medium text-sm">{{ Auth::user()->name }}</p>
                            </div>
                            <svg class="w-4 h-4 text-white/70 transition-transform duration-200" id="dropdown-arrow"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="user-dropdown"
                            class="z-50 hidden absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-xl border border-gray-100 dropdown-z">
                            <div class="px-4 py-3 border-b border-gray-100" role="none">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="bg-gradient-to-r from-[#E76F51] to-[#1D4E89] w-12 h-12 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                        AS
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900" role="none">
                                            {{ Auth::user()->name }}</p>
                                        <p class="text-sm text-gray-500" role="none">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 font-medium hover:bg-gray-100"
                                        role="menuitem">
                                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                            <i class="fas fa-user text-blue-600"></i>
                                        </div>
                                        Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center w-full text-left px-4 py-3 text-sm text-red-400 font-medium hover:bg-gray-100"
                                            role="menuitem">
                                            <div class="bg-red-100 p-2 rounded-lg mr-3">
                                                <i class="fas fa-sign-out-alt text-red-600"></i>
                                            </div>
                                            Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 sidebar-z w-64 h-screen pt-16 transition-transform -translate-x-full bg-white/95 backdrop-blur-md shadow-xl border-r border-white/50">
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <!-- Menu Utama -->
            <div class="mb-6 mt-4">
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">Menu Utama</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('asesor.dashboard') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.dashboard') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-home w-5 h-5 {{ Request::routeIs('asesor.dashboard') ? 'text-white' : 'text-blue-500' }}"></i>
                            <span class="ml-3 font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('asesor.list-asesi') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.list-asesi') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-users w-5 h-5 {{ Request::routeIs('asesor.list-asesi') ? 'text-white' : 'text-secondary' }}"></i>
                            <span class="ml-3">List Penilaian Level B</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('asesor.list-asesi') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.list-asesi') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-users w-5 h-5 {{ Request::routeIs('asesor.list-asesi') ? 'text-white' : 'text-secondary' }}"></i>
                            <span class="ml-3">List Penilaian Level C</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('asesor.notifikasi') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.notifikasi') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-bell w-5 h-5 {{ Request::routeIs('asesor.notifikasi') ? 'text-white' : 'text-yellow-500' }}"></i>
                            <span class="ml-3">Notifikasi</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('asesor.form-penilaian') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.form-penilaian') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-clipboard-list w-5 h-5 {{ Request::routeIs('asesor.form-penilaian') ? 'text-white' : 'text-green-500' }}"></i>
                            <span class="ml-3">Form Penilaian</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('asesor.riwayat-penilaian') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.riwayat-penilaian') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-chart-line w-5 h-5 {{ Request::routeIs('asesor.riwayat-penilaian') ? 'text-white' : 'text-primary' }}"></i>
                            <span class="ml-3">Riwayat Penilaian B</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('asesor.riwayat-aktifitas') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.riwayat-aktifitas') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fa fa-history w-5 h-5 {{ Request::routeIs('asesor.riwayat-aktifitas') ? 'text-white' : 'text-secondary' }}"></i>
                            <span class="ml-3">Riwayat Aktivitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('asesor.download-nilai') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.download-nilai') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-download w-5 h-5 {{ Request::routeIs('asesor.download-nilai') ? 'text-white' : 'text-teal-500' }}"></i>
                            <span class="ml-3">Download Nilai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('asesor.profile-setting') }}"
                            class="flex items-center p-3 rounded-xl transition-smooth hover-lift {{ Request::routeIs('asesor.profile-setting') ? 'menu-active' : 'menu-inactive' }}">
                            <i
                                class="fas fa-cog w-5 h-5 {{ Request::routeIs('asesor.profile-setting') ? 'text-white' : 'text-gray-500' }}"></i>
                            <span class="ml-3">Profile Setting</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="transition-smooth main-padding" id="main-content">
        <div class="px-4" id="main-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.js"></script>
    <script>
        let sidebarOpen = false;

        function toggleUserDropdown() {
            const dropdown = document.getElementById('user-dropdown');
            const arrow = document.getElementById('dropdown-arrow');

            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                setTimeout(() => {
                    dropdown.classList.remove('opacity-0', 'scale-95');
                    dropdown.classList.add('opacity-100', 'scale-100');
                }, 10);
                arrow.style.transform = 'rotate(180deg)';
            } else {
                dropdown.classList.remove('opacity-100', 'scale-100');
                dropdown.classList.add('opacity-0', 'scale-95');
                arrow.style.transform = 'rotate(0deg)';
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 200);
            }
        }

        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('user-dropdown');
            const button = event.target.closest('button[onclick="toggleUserDropdown()"]');

            if (!button && (!dropdown || !dropdown.contains(event.target))) {
                if (dropdown) {
                    dropdown.classList.remove('opacity-100', 'scale-100');
                    dropdown.classList.add('opacity-0', 'scale-95');
                    document.getElementById('dropdown-arrow').style.transform = 'rotate(0deg)';
                    setTimeout(() => {
                        dropdown.classList.add('hidden');
                    }, 200);
                }
            }
        });

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainWrapper = document.getElementById('main-wrapper');

            if (sidebarOpen) {
                sidebar.classList.add('-translate-x-full');
                if (mainWrapper) {
                    mainWrapper.style.marginLeft = '0';
                }
                sidebarOpen = false;
            } else {
                sidebar.classList.remove('-translate-x-full');
                if (mainWrapper && window.innerWidth >= 1024) {
                    mainWrapper.style.marginLeft = '16rem';
                }
                sidebarOpen = true;
            }
        }

        function updateSidebarPosition() {
            const sidebar = document.getElementById('sidebar');
            const mainWrapper = document.getElementById('main-wrapper');
            const width = window.innerWidth;

            if (width >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                if (mainWrapper) {
                    mainWrapper.style.marginLeft = '16rem';
                }
                sidebarOpen = true;
            } else {
                sidebar.classList.add('-translate-x-full');
                if (mainWrapper) {
                    mainWrapper.style.marginLeft = '0';
                }
                sidebarOpen = false;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateSidebarPosition();

            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();

                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        top: ${y}px;
                        left: ${x}px;
                        background: rgba(255, 255, 255, 0.7);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                    `;

                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });

        window.addEventListener('resize', function() {
            updateSidebarPosition();
        });

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleButton = event.target.closest('button[onclick="toggleSidebar()"]');
            const mainWrapper = document.getElementById('main-wrapper');

            if (window.innerWidth < 1024 && sidebarOpen && sidebar && !sidebar.contains(event.target) && !
                toggleButton) {
                sidebar.classList.add('-translate-x-full');
                if (mainWrapper) {
                    mainWrapper.style.marginLeft = '0';
                }
                sidebarOpen = false;
            }
        });
    </script>

    @stack('scripts')
    @include('sweetalert::alert')
</body>

</html>
