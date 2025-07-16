@extends('layouts.adminDashboard')

@section('title', 'Detail Kategori')

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.categories.a.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Detail Kategori</h1>
        </div>

        <!-- Main content card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Content header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-4 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Informasi Kategori
                </h3>
                <p class="mt-1 text-sm text-gray-500">Detail lengkap informasi kategori</p>
            </div>

            <!-- Content body -->
            <div class="p-6">
                <!-- Category details -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-inner mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Category Name -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Nama Kategori</h4>
                            <p class="text-lg font-semibold text-gray-800">{{ $category->name }}</p>
                        </div>

                        <!-- Description -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Deskripsi</h4>
                            <p class="text-lg font-semibold text-gray-800">{{ $category->description }}</p>
                        </div>

                        <!-- Created At -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Tanggal Dibuat</h4>
                            <p class="text-lg font-semibold text-gray-800">{{ $category->created_at->format('d M Y, H:i') }}</p>
                        </div>

                        <!-- Updated At -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Terakhir Diperbarui</h4>
                            <p class="text-lg font-semibold text-gray-800">{{ $category->updated_at->format('d M Y, H:i') }}</p>
                        </div>

                        <!-- Question Count -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Jumlah Soal</h4>
                            <p class="text-lg font-semibold text-gray-800">{{ $questionCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Question list section -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Daftar Soal
                    </h3>

                    @if(count($questions) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-indigo-600 to-blue-500">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">No</th>
                                        <th scope="col" class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Pertanyaan</th>
                                        <th scope="col" class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Tipe</th>
                                        <th scope="col" class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($questions as $index => $question)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-4 py-3 text-sm text-gray-500">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-500">
                                                {{ \Illuminate\Support\Str::limit($question->question, 70) }}
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-500">
                                                <span class="px-2 py-1 text-xs rounded-full
                                                    {{ $question->question_type === 'multiple_choice' ? 'bg-blue-100 text-blue-800' : '' }}
                                                    {{ $question->question_type === 'essay' ? 'bg-green-100 text-green-800' : '' }}
                                                    {{ $question->question_type === 'true_false' ? 'bg-purple-100 text-purple-800' : '' }}">
                                                    {{ $question->question_type === 'multiple_choice' ? 'Pilihan Ganda' :
                                                       ($question->question_type === 'essay' ? 'Essay' :
                                                       ($question->question_type === 'true_false' ? 'Benar/Salah' : $question->question_type)) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-500">
                                                <div class="flex space-x-2">
                                                    <!-- View question details button, if you have such a route -->
                                                    <a href="#" class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100 transition-colors">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination for questions if needed -->
                        @if($questions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="mt-6">
                                {{ $questions->links() }}
                            </div>
                        @endif
                    @else
                        <div class="bg-gray-50 p-8 rounded-lg text-center">
                            <p class="text-gray-500">Belum ada soal untuk kategori ini</p>
                        </div>
                    @endif
                </div>

                <!-- Action buttons -->
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('admin.categories.a.edit', $category->id) }}"
                        class="inline-flex items-center justify-center px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828l-11.414 11.414a.5.5 0 01-.707 0l-3.182-3.182a.5.5 0 010-.707l11.414-11.414z" />
                        </svg>
                        Edit Kategori
                    </a>

                    <!-- You can add more buttons here if needed -->
                </div>
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
    </style>
@endsection
