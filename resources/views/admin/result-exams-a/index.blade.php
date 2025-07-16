@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-gray-600">

            </ol>

            <!-- Search & Info -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search -->
                <form action="#" method="GET" class="relative">
                    <input type="text" name="search"
                        class="pl-9 pr-3 py-2 rounded-md border border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Cari..." value="{{ request('search') }}">
                    <div class="absolute left-2.5 top-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </div>
                </form>

                <!-- Actions -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.resulta.export') }}"
                        class="px-3 py-1.5 border text-gray-600 text-sm rounded hover:bg-gray-50"
                        data-popover-target="popover-export" data-popover-trigger="hover">
                        Export
                    </a>
                    <button class="p-2 border rounded text-gray-500 hover:bg-gray-100">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                    </button>
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
    <!-- User Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-indigo-600 to-blue-500">
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
                            Category
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Score
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Correct Answers
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Wrong Answers
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">
                            Is Passed
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($exams as $index)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <!-- Row Number -->
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $loop->iteration }}
                            </td>



                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->user?->name }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->categoryA?->name }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                @if ($index->status === 'finished')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                        {{ $index->status }}
                                    </span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                        {{ $index->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->score }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->correct_answers }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                {{ $index->wrong_answers }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm">
                                @if ($index->is_passed == 1)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Lulus
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Tidak Lulus
                                    </span>
                                @endif
                            </td>
                            <!-- Actions -->
                            {{-- <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
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
                            </td> --}}
                        </tr>
                    @empty
                        @livewire('empty-state', [
                            'title' => 'Tidak Ada Data',
                            'colspan' => 9,
                            'message' => 'Data belum tersedia.',
                        ])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $exams->links() }}
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
            <h3 class="font-semibold text-blue-600">Export Asesi</h3>
        </div>
        <div class="px-3 py-2">
            <p>Tindakan ini akan membuat file excel dari data asesi.</p>
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
