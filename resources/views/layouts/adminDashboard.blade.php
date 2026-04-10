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

<body class="bg-gray-50">
    <header>
        <nav
            class="fixed top-0 z-50 w-full bg-gradient-to-r from-[#1D4E89] to-[#0D3A6E] shadow-lg border-b border-white/10 backdrop-blur-sm">
            <div class="px-4 py-2 lg:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="#"
                            class="flex items-center justify-center ml-3 bg-white/10 backdrop-blur-sm w-9 h-9 rounded-xl shadow-inner hover:scale-105 transition-all duration-300 border border-white/20">
                            <img src="{{ asset('images/logoTlcPng.png') }}" class="h-6" alt="TLC Logo" />
                        </a>
                        <div class="ml-3 hidden md:block">
                            <h1 class="text-lg font-bold text-white tracking-wide">TLC Admin Dashboard</h1>
                            <p class="text-[10px] uppercase tracking-wider text-white/70">Teaching & Learning Center</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <button type="button"
                                class="flex items-center space-x-2 py-1 px-2 text-sm rounded-full hover:bg-white/10 focus:ring-2 focus:ring-white/30 transition-all duration-300 group border border-transparent hover:border-white/20"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                @if (auth()->user()->hasRole('admin') && auth()->user()->adminsProfile && auth()->user()->adminsProfile->profile_image)
                                    <img src="{{ asset('storage/' . auth()->user()->adminsProfile->profile_image) }}"
                                        class="w-8 h-8 rounded-full object-cover shadow-md ring-2 ring-white/20 group-hover:ring-[#E76F51] transition-all duration-300">
                                @else
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-[#E76F51] to-[#FF9F1C] flex items-center justify-center text-white font-bold shadow-md ring-2 ring-white/20 group-hover:ring-[#E76F51] transition-all duration-300">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="text-left hidden lg:block px-1">
                                    <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                                </div>
                                <i
                                    class="fas fa-chevron-down text-xs text-white/70 ml-1 group-hover:text-white transition-colors duration-300"></i>
                            </button>

                            <div class="z-50 hidden absolute right-0 mt-2 w-60 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden"
                                id="dropdown-user">
                                <div class="px-4 py-4 bg-gray-50/50 border-b border-gray-100">
                                    <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <ul class="py-2">
                                    <li>
                                        <a href="{{ route('admin.settings.edit') }}"
                                            class="flex items-center px-4 py-2.5 text-gray-600 hover:bg-blue-50 hover:text-[#1D4E89] transition-all duration-200 group">
                                            <i
                                                class="fas fa-user-cog w-5 text-gray-400 group-hover:text-[#1D4E89] transition-colors"></i>
                                            <span class="font-medium text-sm">Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center w-full px-4 py-2.5 text-red-500 hover:bg-red-50 transition-all duration-200 group">
                                                <i
                                                    class="fas fa-sign-out-alt w-5 text-red-400 group-hover:text-red-600 transition-colors"></i>
                                                <span class="font-medium text-sm">Log Out</span>
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

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 shadow-[4px_0_24px_rgba(0,0,0,0.02)]">
        <div class="h-full px-3 pb-8 overflow-y-auto custom-scrollbar">

            <ul class="space-y-1.5 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:shadow-md {{ Request::routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#1D4E89] to-[#2B6CB0] text-white shadow-lg shadow-blue-900/20' : 'text-gray-600 hover:bg-gray-50' }}">

                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 {{ Request::routeIs('admin.dashboard') ? 'bg-white/20 text-white' : 'bg-blue-50 text-[#1D4E89] group-hover:bg-[#1D4E89] group-hover:text-white' }}">
                            <i class="fas fa-home text-sm"></i>
                        </div>

                        <span class="ms-3 text-sm font-semibold">Dashboard</span>
                    </a>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 text-gray-600 rounded-xl hover:bg-gray-50 group transition-all duration-300"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-orange-50 text-[#E76F51] group-hover:bg-[#E76F51] group-hover:text-white">
                            <i class="fas fa-users text-sm"></i>
                        </div>

                        <span class="ms-3 text-sm font-semibold flex-1 text-left">Users</span>
                        <i
                            class="fas fa-chevron-down text-xs text-gray-400 group-hover:text-gray-600 transition-transform duration-300"></i>
                    </button>

                    <ul id="dropdown-example" class="hidden py-1 space-y-1 pl-3 mt-1">
                        <li>
                            <a href="{{ route('admin.asesi.index') }}"
                                class="flex items-center p-2 rounded-lg group transition-all duration-200 {{ Request::routeIs('admin.asesi.index') ? 'text-[#1D4E89] bg-blue-50' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                                <div
                                    class="w-1.5 h-1.5 rounded-full mr-3 {{ Request::routeIs('admin.asesi.index') ? 'bg-[#E76F51]' : 'bg-gray-300 group-hover:bg-[#E76F51]' }}">
                                </div>
                                <span class="font-medium text-sm">Asesi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.asesor.index') }}"
                                class="flex items-center p-2 rounded-lg group transition-all duration-200 {{ Request::routeIs('admin.asesor.index') ? 'text-[#1D4E89] bg-blue-50' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                                <div
                                    class="w-1.5 h-1.5 rounded-full mr-3 {{ Request::routeIs('admin.asesor.index') ? 'bg-[#E76F51]' : 'bg-gray-300 group-hover:bg-[#E76F51]' }}">
                                </div>
                                <span class="font-medium text-sm">Asesor</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.admins.index') }}"
                                class="flex items-center p-2 rounded-lg group transition-all duration-200 {{ Request::routeIs('admin.admins.index') ? 'text-[#1D4E89] bg-blue-50' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                                <div
                                    class="w-1.5 h-1.5 rounded-full mr-3 {{ Request::routeIs('admin.admins.index') ? 'bg-[#E76F51]' : 'bg-gray-300 group-hover:bg-[#E76F51]' }}">
                                </div>
                                <span class="font-medium text-sm">Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 text-gray-600 rounded-xl hover:bg-gray-50 group transition-all duration-300"
                        aria-controls="dropdown-level" data-collapse-toggle="dropdown-level">

                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-blue-50 text-[#1D4E89] group-hover:bg-[#1D4E89] group-hover:text-white">
                            <i class="fas fa-layer-group text-sm"></i>
                        </div>

                        <span class="ms-3 text-sm font-semibold flex-1 text-left">Levels</span>
                        <i
                            class="fas fa-chevron-down text-xs text-gray-400 group-hover:text-gray-600 transition-transform duration-300"></i>
                    </button>

                    <ul id="dropdown-level" class="hidden py-1 space-y-1 pl-3 mt-1">

                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-gray-600 rounded-lg hover:bg-gray-50 group transition-all duration-300"
                                aria-controls="dropdown-level-a" data-collapse-toggle="dropdown-level-a">
                                <span
                                    class="w-6 h-6 rounded flex items-center justify-center text-xs font-bold bg-orange-100 text-[#E76F51] mr-2">A</span>
                                <span class="font-medium text-sm flex-1 text-left">Level A</span>
                                <i class="fas fa-chevron-down text-[10px] text-gray-400"></i>
                            </button>
                            <ul id="dropdown-level-a"
                                class="hidden py-1 space-y-1 pl-4 border-l border-gray-100 ml-3">
                                <li>
                                    <a href="{{ route('admin.categories.a.index') }}"
                                        class="flex items-center p-2 text-gray-500 rounded-lg hover:text-[#1D4E89] hover:bg-blue-50 transition-all duration-200">
                                        <span class="text-xs mr-2">•</span> Kategori Soal
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.question.a.index') }}"
                                        class="flex items-center p-2 text-gray-500 rounded-lg hover:text-[#1D4E89] hover:bg-blue-50 transition-all duration-200">
                                        <span class="text-xs mr-2">•</span> Bank Soal
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.exam.monitoring.a.index') }}"
                                        class="flex items-center p-2 text-gray-500 rounded-lg hover:text-[#1D4E89] hover:bg-blue-50 transition-all duration-200">
                                        <span class="text-xs mr-2">•</span> Exam Monitoring
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.survey-result.a.index') }}"
                                        class="flex items-center p-2 text-gray-500 rounded-lg hover:text-[#1D4E89] hover:bg-blue-50 transition-all duration-200">
                                        <span class="text-xs mr-2">•</span> Hasil Survey
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                                        class="flex items-center p-2 text-gray-500 rounded-lg hover:text-[#1D4E89] hover:bg-blue-50 transition-all duration-200">
                                        <span class="text-xs mr-2">•</span> Hasil Penilaian
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.level.settings.index') }}"
                                class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-50 hover:text-gray-900 group transition-all duration-200">
                                <i
                                    class="fas fa-cog text-xs w-6 text-center mr-2 text-gray-400 group-hover:text-gray-600"></i>
                                <span class="font-medium text-sm">Settings</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center w-full p-3 text-gray-600 rounded-xl hover:bg-gray-50 group transition-all duration-300"
                        aria-controls="dropdown-payment" data-collapse-toggle="dropdown-payment">

                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white">
                            <i class="fas fa-wallet text-sm"></i>
                        </div>

                        <span class="ms-3 text-sm font-semibold flex-1 text-left">Payments</span>
                        <i
                            class="fas fa-chevron-down text-xs text-gray-400 group-hover:text-gray-600 transition-transform duration-300"></i>
                    </button>
                    <ul id="dropdown-payment" class="hidden py-1 space-y-1 pl-3 mt-1">
                        <li>
                            <a href="{{ route('admin.payments.index') }}"
                                class="flex items-center p-2 rounded-lg group transition-all duration-200 {{ Request::routeIs('admin.payments.index') ? 'text-emerald-700 bg-emerald-50' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                                <div
                                    class="w-1.5 h-1.5 rounded-full mr-3 {{ Request::routeIs('admin.payments.index') ? 'bg-emerald-500' : 'bg-gray-300 group-hover:bg-emerald-500' }}">
                                </div>
                                <span class="font-medium text-sm">Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pt-4 pb-2">
                    <span class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Reports &
                        Content</span>
                </li>

                {{-- <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:shadow-md {{ Request::routeIs('admin.categories.index') ? 'bg-gradient-to-r from-[#1D4E89] to-[#2B6CB0] text-white shadow-lg shadow-blue-900/20' : 'text-gray-600 hover:bg-gray-50' }}">

                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 {{ Request::routeIs('admin.categories.index') ? 'bg-white/20 text-white' : 'bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white' }}">
                            <i class="fas fa-history text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Level A History</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ Route('admin.resulta.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:shadow-md {{ Request::routeIs('admin.resulta.index') ? 'bg-gradient-to-r from-[#1D4E89] to-[#2B6CB0] text-white shadow-lg shadow-blue-900/20' : 'text-gray-600 hover:bg-gray-50' }}">

                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 {{ Request::routeIs('admin.resulta.index') ? 'bg-white/20 text-white' : 'bg-purple-50 text-purple-600 group-hover:bg-purple-600 group-hover:text-white' }}">
                            <i class="fas fa-chart-pie text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Result Exam A</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('admin.questions.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:shadow-md {{ Request::routeIs('admin.questions.index') ? 'bg-gradient-to-r from-[#1D4E89] to-[#2B6CB0] text-white shadow-lg shadow-blue-900/20' : 'text-gray-600 hover:bg-gray-50' }}">

                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 {{ Request::routeIs('admin.questions.index') ? 'bg-white/20 text-white' : 'bg-teal-50 text-teal-600 group-hover:bg-teal-600 group-hover:text-white' }}">
                            <i class="fas fa-question-circle text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Questions</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.certificate.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:bg-gray-50 text-gray-600">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-yellow-50 text-yellow-600 group-hover:bg-yellow-500 group-hover:text-white">
                            <i class="fas fa-certificate text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Sertifikat</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.news.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:shadow-md {{ Request::routeIs('admin.news.index') ? 'bg-gradient-to-r from-[#1D4E89] to-[#2B6CB0] text-white shadow-lg shadow-blue-900/20' : 'text-gray-600 hover:bg-gray-50' }}">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 {{ Request::routeIs('admin.news.index') ? 'bg-white/20 text-white' : 'bg-pink-50 text-pink-600 group-hover:bg-pink-600 group-hover:text-white' }}">
                            <i class="fas fa-newspaper text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Portal Berita</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:bg-gray-50 text-gray-600">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-cyan-50 text-cyan-600 group-hover:bg-cyan-600 group-hover:text-white">
                            <i class="fas fa-quote-right text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Testimonials</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.site-info.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:bg-gray-50 text-gray-600">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-slate-100 text-slate-600 group-hover:bg-slate-600 group-hover:text-white">
                            <i class="fas fa-globe text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Site Info</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.referral-banners.index') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:bg-gray-50 text-gray-600">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white">
                            <i class="fas fa-users-cog text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Referral Banners</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logs') }}"
                        class="flex items-center p-3 rounded-xl group transition-all duration-300 hover:bg-gray-50 text-gray-600">
                        <div
                            class="flex-shrink-0 w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-300 bg-slate-100 text-slate-600 group-hover:bg-slate-600 group-hover:text-white">
                            <i class="fas fa-globe text-sm"></i>
                        </div>
                        <span class="ms-3 text-sm font-semibold">Logs</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <main class="p-4 sm:ml-64 mt-16">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-xl bg-white min-h-[calc(100vh-7rem)]">
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