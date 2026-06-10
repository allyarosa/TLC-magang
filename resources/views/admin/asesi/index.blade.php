@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-gray-600">
                <nav
                    class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">
                    {{-- Asesi Link --}}
                    <a href="{{ route('admin.asesi.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.asesi.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Asesi
                    </a>

                    <span class="text-gray-300">/</span>

                    {{-- Asesor Link --}}
                    <a href="{{ route('admin.asesor.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.asesor.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Asesor
                    </a>

                    <span class="text-gray-300">/</span>

                    {{-- Administrator Link --}}
                    <a href="{{ route('admin.admins.index') }}"
                        class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.admins.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Administrator
                    </a>
                </nav>
            </ol>

            <!-- Search & Info -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search -->
                <form action="{{ route('admin.asesi.index') }}" method="GET" class="relative">
                    <input type="text" name="search"
                        class="px-10 py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Cari Asesi..." value="{{ request('search') }}">
                    <div class="absolute left-2.5 top-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </div>
                </form>

                <form action="{{ route('admin.asesi.index') }}" method="GET" class="relative flex items-center space-x-2">
                    <div>
                        <select id="category_name" name="category_name"
                            class="py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="ALL" {{ request('category_name') == 'ALL' ? 'selected' : '' }}>-- Semua Kategori --</option>
                            <option value="fresh_user" {{ request('category_name') == 'fresh_user' ? 'selected' : '' }}>Belum Mendaftar (Fresh User)</option>
                            <option value="access_level_A" {{ request('category_name') == 'access_level_A' ? 'selected' : '' }}>Level A</option>
                            <option value="access_level_B" {{ request('category_name') == 'access_level_B' ? 'selected' : '' }}>Level B</option>
                            <option value="access_level_C" {{ request('category_name') == 'access_level_C' ? 'selected' : '' }}>Level C</option>
                            <option value="HOTS" {{ request('category_name') == 'HOTS' ? 'selected' : '' }}>HOTS</option>
                            <option value="PCK" {{ request('category_name') == 'PCK' ? 'selected' : '' }}>PCK</option>
                            <option value="LITERASI" {{ request('category_name') == 'LITERASI' ? 'selected' : '' }}>LITERASI</option>
                            <option value="NUMERASI" {{ request('category_name') == 'NUMERASI' ? 'selected' : '' }}>NUMERASI</option>
                        </select>
                    </div>
                    <button class="px-3 py-1.5 bg-blue-600 text-white text-sm rounded shadow-md">
                        Filter
                    </button>
                </form>

                {{-- Filter Rentang Tanggal Pendaftaran --}}
                <form action="{{ route('admin.asesi.index') }}" method="GET" class="flex items-center gap-2">
                    {{-- Preserve existing filters --}}
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('category_name'))
                        <input type="hidden" name="category_name" value="{{ request('category_name') }}">
                    @endif

                    <div class="flex items-center gap-1.5">
                        {{-- <label for="date_from" class="text-sm text-gray-600 whitespace-nowrap">Dari</label> --}}
                        <input type="date" id="date_from" name="date_from" value="{{ request('date_from') }}"
                            class="py-1.5 px-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="flex items-center gap-1.5">
                        {{-- <label for="date_to" class="text-sm text-gray-600 whitespace-nowrap">Sampai</label> --}}
                        <input type="date" id="date_to" name="date_to" value="{{ request('date_to') }}"
                            class="py-1.5 px-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <button type="submit" class="px-3 py-1.5 bg-blue-700 text-white text-sm rounded shadow-md hover:bg-indigo-700 transition-colors">
                        Filter
                    </button>
                    @if(request('date_from') || request('date_to'))
                        <a href="{{ route('admin.asesi.index', request()->only(['search', 'category_name'])) }}"
                            class="px-3 py-1.5 bg-gray-200 text-gray-700 text-sm rounded shadow-sm hover:bg-gray-300 transition-colors">
                            Reset
                        </a>
                    @endif
                </form>

                <!-- Total Users -->
                <div class="flex items-center text-sm p-1.5 bg-gray-50 rounded-lg border border-gray-200 w-fit">
                    <span class="text-indigo-500 mr-1.5">
                        <img src="{{ asset('assets/icons/user.png') }}" alt="user icon" class="w-4 h-4">
                    </span>
                    <span class="text-gray-700 font-semibold">
                        {{ $userCount['user'] }}
                    </span>
                    <span class="text-gray-600 ml-1 font-semibold">
                        Users
                    </span>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.asesi.create') }}" data-popover-target="popover-addUser"
                        data-popover-trigger="hover">
                        <button class="px-3 py-1.5 bg-[#1D4E89] text-white text-sm rounded hover:bg-[#0d2a4e] shadow-md">
                            + Tambah Asesi
                        </button>
                    </a>
                    <a href="{{ route('dashboard.asesi.export') }}"
                        class="px-3 py-1.5 border text-white text-sm rounded bg-[#2563EB] hover:bg-blue-700 shadow-md"
                        data-popover-target="popover-export" data-popover-trigger="hover">
                        Export
                    </a>
                    <a href="{{ route('dashboard.asesi.import') }}"
                        class="px-3 py-1.5 border text-white text-sm rounded bg-[#F59E0B] hover:bg-yellow-600 shadow-md"
                        data-popover-target="popover-export" data-popover-trigger="hover">
                        Import
                    </a>
                    {{-- <button class="p-2 border rounded text-gray-500 hover:bg-gray-100">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                    </button> --}}
                    {{-- <button class="p-2 border rounded text-red-500 hover:bg-red-50" data-modal-toggle="popup-modal"
                        data-popover-target="popover-delete" data-popover-trigger="hover">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button> --}}
                </div>
            </div>
        </nav>
    </div>
    <!-- User Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            No HP
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Instansi
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Jenis Kelamin
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Created At
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Last Seen
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($userProfile as $index => $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <!-- Row Number -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration }}
                            </td>

                            <!-- User Info -->
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover border-2 border-indigo-100"
                                            src="{{ asset('/storage/' . $user->profile_image) }}" alt="Profile image">
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $user->user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->user->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Phone -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->no_wa }}
                            </td>

                            <!-- Institution -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 max-w-xs truncate">
                                {{ $user->instansi }}
                            </td>

                            <!-- Gender -->
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
    {{ $user->jenis_kelamin === 'L'
        ? 'bg-blue-100 text-blue-800'
        : ($user->jenis_kelamin === 'P'
            ? 'bg-pink-100 text-pink-800'
            : 'bg-gray-100 text-gray-800') }}">
                                    {{ $user->jenis_kelamin === 'L'
                                        ? 'Laki-laki'
                                        : ($user->jenis_kelamin === 'P'
                                            ? 'Perempuan'
                                            : ($user->jenis_kelamin === null
                                                ? '-'
                                                : $user->jenis_kelamin)) }}
                                </span>
                            </td>

                            <!-- Created At -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->user->created_at->format('d-m-Y') }}
                            </td>

                            <!-- Last Seen -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->user->last_seen_at ? \Carbon\Carbon::parse($user->user->last_seen_at)->diffForHumans() : 'Never logged in' }}
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3 whitespace-nowrap">
                                @if ($user->user->status === 'active')
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Suspended
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <!-- View -->
                                    <a href="{{ route('admin.asesi.show', $user->id) }}"
                                        class="p-2 text-amber-600 bg-amber-50 rounded-md hover:bg-amber-100 transition-colors"
                                        title="View Details">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.asesi.edit', $user->id) }}"
                                        class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100 transition-colors"
                                        title="Edit User">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    {{-- Level Management --}}
                                    <a href="{{ route('admin.asesi.level-management', $user->id) }}"
                                        class="p-2 text-orange-600 bg-indigo-50 rounded-md hover:bg-indigo-100 transition-colors"
                                        title="Manage Level Asesi">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM2 17.25V18h3v-2.75A3.005 3.005 0 012 17.25z">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Impersonate -->
                                    <form action="{{ route('admin.asesi.impersonate', $user->user->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin login sebagai user ini?');">
                                        @csrf
                                        <button type="submit"
                                            class="p-2 text-green-600 bg-green-50 rounded-md hover:bg-green-100 transition-colors"
                                            title="Login as Asesi">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>


                                    <!-- Delete -->
                                    <form action="{{ route('admin.asesi.destroy', $user->user->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 bg-red-50 rounded-md hover:bg-red-100 transition-colors"
                                            title="Delete User">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        @livewire('empty-state', [
                            'title' => 'Tidak Ada Data',
                            'colspan' => 9,
                            'message' => 'Data asesi belum tersedia. Klik tombol "Tambah Asesi" di kanan untuk membuat data asesi baru.',
                        ])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $userProfile->links() }}
    </div>

    <!-- Delete Modal -->
    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow-lg">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center">
                            <svg class="w-8 h-8 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="mb-5 text-lg font-medium text-gray-800">Apakah anda yakin ingin delete all asesi?</h3>
                    <p class="mb-5 text-sm text-gray-500">Tindakan ini tidak dapat dikembalikan dan akan menghapus semua
                        data pengguna secara permanen.</p>
                    <div class="flex justify-center space-x-3">
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">
                            <a href="#">
                                Yes, Saya yakin
                            </a>
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 border border-gray-300 rounded-lg text-sm font-medium px-5 py-2.5 focus:z-10 transition-colors">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Statistics Dropdown -->
    <div id="dropdownUser"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-48 border border-gray-200">
        <div class="px-4 py-3 text-sm text-gray-900 border-b">
            <div class="font-medium">User Statistics</div>
        </div>
        <ul class="py-2 text-sm" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                    <div class="flex justify-between items-center">
                        <span>Non Level</span>
                        <span class="font-semibold text-indigo-600">42</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                    <div class="flex justify-between items-center">
                        <span>Level A</span>
                        <span class="font-semibold text-indigo-600">24</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                    <div class="flex justify-between items-center">
                        <span>Level B</span>
                        <span class="font-semibold text-indigo-600">18</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                    <div class="flex justify-between items-center">
                        <span>Level C</span>
                        <span class="font-semibold text-indigo-600">9</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <!-- Popovers -->
    <div data-popover id="popover-delete" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-red-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-red-600">Delete All Users</h3>
        </div>
        <div class="px-3 py-2">
            <p><strong class="text-red-500">Warning!!</strong> Tindakan ini akan menghapus semua pengguna dari sistem.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    <div data-popover id="popover-addUser" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-indigo-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-indigo-600">Add Users</h3>
        </div>
        <div class="px-3 py-2">
            <p>Tindakan ini akan menambahkan users baru kedalam database.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    <div data-popover id="popover-export" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-blue-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-blue-600">Import Asesi</h3>
        </div>
        <div class="px-3 py-2">
            <p>Tindakan ini akan membuat menambahkan asesi menggunakan file excel.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    @push('scripts')
        <script>
            // Initialize Flowbite components (which handles popovers)
            document.addEventListener('DOMContentLoaded', function() {
                // Check if Flowbite is loaded
                if (typeof initFlowbite === 'function') {
                    initFlowbite();
                } else {
                    // If Flowbite's initFlowbite function is not available, manually initialize popovers
                    const popoverTriggers = document.querySelectorAll('[data-popover-target]');

                    popoverTriggers.forEach(trigger => {
                        const targetId = trigger.getAttribute('data-popover-target');
                        const target = document.getElementById(targetId);
                        const triggerType = trigger.getAttribute('data-popover-trigger') || 'click';

                        if (target) {
                            if (triggerType === 'hover') {
                                trigger.addEventListener('mouseenter', () => {
                                    target.classList.remove('invisible', 'opacity-0');
                                    target.classList.add('visible', 'opacity-100');

                                    // Position the popover
                                    const triggerRect = trigger.getBoundingClientRect();
                                    target.style.top = `${triggerRect.bottom + window.scrollY + 10}px`;
                                    target.style.left = `${triggerRect.left + window.scrollX}px`;
                                });

                                trigger.addEventListener('mouseleave', () => {
                                    // Add small delay before hiding
                                    setTimeout(() => {
                                        if (!target.matches(':hover')) {
                                            target.classList.add('invisible', 'opacity-0');
                                            target.classList.remove('visible', 'opacity-100');
                                        }
                                    }, 100);
                                });

                                target.addEventListener('mouseleave', () => {
                                    target.classList.add('invisible', 'opacity-0');
                                    target.classList.remove('visible', 'opacity-100');
                                });
                            } else {
                                // Click behavior
                                trigger.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    target.classList.toggle('invisible');
                                    target.classList.toggle('opacity-0');

                                    // Position the popover
                                    const triggerRect = trigger.getBoundingClientRect();
                                    target.style.top = `${triggerRect.bottom + window.scrollY + 10}px`;
                                    target.style.left = `${triggerRect.left + window.scrollX}px`;
                                });

                                // Close on click outside
                                document.addEventListener('click', (e) => {
                                    if (!target.contains(e.target) && e.target !== trigger) {
                                        target.classList.add('invisible', 'opacity-0');
                                        target.classList.remove('visible', 'opacity-100');
                                    }
                                });
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection