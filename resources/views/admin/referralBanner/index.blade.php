@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard - News Management')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <livewire:admin.breadcrumb-nav label="Portal Berita" route="admin.news.index" />

            <div class="flex flex-wrap items-center gap-3">
                <form action="#" method="GET" class="relative">
                    <input type="text" name="search"
                        class="pl-9 pr-3 py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Cari news..." value="">
                    <div class="absolute left-2.5 top-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </div>
                </form>

                <div class="text-gray-600 text-sm">
                    📰 0 articles
                </div>

                <div class="flex items-center gap-2">
                    <a href="#" data-popover-target="popover-addUser" data-popover-trigger="hover">
                        <button class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                            + Tambah news
                        </button>
                    </a>
                    <a href="#" class="px-3 py-1.5 border text-gray-600 text-sm rounded hover:bg-gray-50"
                        data-popover-target="popover-export" data-popover-trigger="hover">
                        Export
                    </a>
                    <div class="relative">
                        <button class="p-2 border rounded text-gray-500 hover:bg-gray-100" id="options-menu"
                            aria-expanded="false" aria-haspopup="true">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                    <button class="p-2 border rounded text-red-500 hover:bg-red-50" data-modal-toggle="popup-modal"
                        data-popover-target="popover-delete" data-popover-trigger="hover">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Judul</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Gambar</th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Ringkasan
                        </th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Isi Lengkap
                        </th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Created At
                        </th>
                        <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Contoh Judul Berita</div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex-shrink-0 h-12 w-20">
                                <img class="h-12 w-20 object-cover rounded border border-gray-200" src="#"
                                    alt="Placeholder">
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate">Ringkasan berita akan muncul di
                            sini...</td>
                        <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate">Konten lengkap berita akan muncul di
                            sini...</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">01 Jan 2024, 10:00</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <a href="#" class="p-2 text-amber-600 bg-amber-50 rounded-md hover:bg-amber-100"
                                    title="View Details">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100"
                                    title="Edit News">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <form action="#" method="POST">
                                    @csrf
                                    <button type="submit" class="p-2 text-red-600 bg-red-50 rounded-md hover:bg-red-100"
                                        title="Delete News">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6 flex justify-center">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
            <span
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">1</span>
        </nav>
    </div>

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
                    <h3 class="mb-5 text-lg font-medium text-gray-800">Apakah anda yakin ingin delete all news?</h3>
                    <div class="flex justify-center space-x-3">
                        <form action="#" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">Yes,
                                Saya yakin</button>
                        </form>
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-gray-700 bg-white hover:bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium px-5 py-2.5">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-popover id="popover-delete" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-red-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-red-600">Delete All News</h3>
        </div>
        <div class="px-3 py-2">
            <p><strong class="text-red-500">Warning!!</strong> Tindakan ini akan menghapus semua berita dari sistem.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    <div data-popover id="popover-addUser" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-indigo-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-indigo-600">Add News</h3>
        </div>
        <div class="px-3 py-2">
            <p>Tindakan ini akan menambahkan berita baru kedalam database.</p>
        </div>
        <div data-popper-arrow></div>
    </div>

    <div data-popover id="popover-export" role="tooltip"
        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
        <div class="px-3 py-2 bg-blue-50 border-b border-gray-200 rounded-t-lg">
            <h3 class="font-semibold text-blue-600">Export News</h3>
        </div>
        <div class="px-3 py-2">
            <p>Tindakan ini akan membuat file excel dari data berita.</p>
        </div>
        <div data-popper-arrow></div>
    </div>
@endsection
