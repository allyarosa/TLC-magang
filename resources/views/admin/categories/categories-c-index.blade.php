@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-gray-600">
                <li><a href="{{ route('admin.level.c.index') }}" class="hover:underline text-indigo-600">Level C</a></li>
                <li>/</li>
                <li><a href="{{ route('admin.categories.c.index') }}" class="hover:underline text-indigo-600">Kategory Soal</a></li>
            </ol>
        </nav>
    </div>
    <!-- User Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-indigo-600 to-blue-500">
                    <tr>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">No</th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Category
                            Name</th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Description
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Banner
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Status
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Jumlah Soal
                        </th>
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($categoriesC as $index)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $loop->iteration }}</td>

                            {{-- CATEGORY NAME --}}
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $index['name'] }}</td>

                            {{-- DESCRIPTION --}}
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $index['description'] }}</td>

                            {{-- BANNER IMG --}}
                            <td class="px-4 py-3 text-sm text-gray-500">
                                @if ($index['image_url'])
                                    <button class="text-blue-500 hover:underline"
                                        onclick="showImageModal('{{ asset('storage/' . $index['image_url']) }}')">
                                        Lihat Gambar
                                    </button>
                                @else
                                    <p>Tidak Ada</p>
                                @endif
                            </td>

                            {{-- STATUS --}}
                            <td class="px-4 py-3 text-sm text-gray-500">
                                @if ($index['status'] == 0)
                                    <P class="text-red-500">Inactive</P>
                                @else
                                    Active
                                @endif
                            </td>

                            {{-- QUESTION COUNT --}}
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $index['question_count'] }}</td>

                            {{-- ACTIONS --}}
                            <td class="px-4 py-3 text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.categories.c.edit', $index['id']) }}"
                                        class="p-2 text-amber-600 bg-amber-50 rounded-md hover:bg-amber-100 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- View -->
                                    <a href="{{ route('admin.categories.c.show', $index['id']) }}"
                                        class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="imageModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-4 rounded shadow relative max-w-md w-full">
            <button onclick="closeImageModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black">✖</button>
            <img id="modalImage" src="" class="max-w-full h-auto rounded" alt="Gambar Soal">
        </div>
    </div>

    <script>
        function showImageModal(imageUrl) {
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            img.src = imageUrl;
            modal.classList.remove('hidden');
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
        }
    </script>

@endsection
