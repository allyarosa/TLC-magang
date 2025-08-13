@extends('layouts.adminDashboard')

@section('title', $title)

@push('ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endpush

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <!-- Header with breadcrumb -->
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.question.c.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Edit Soal Level C</h1>
        </div>

        <!-- Main form card -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <!-- Form header -->
            <div class="bg-gradient-to-r from-gray-50 to-white p-2 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Informasi Soal Level C
                </h3>
            </div>

             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form body -->
            <div class="p-2">
                <form action="{{ route('admin.question.c.update', $question->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')

                    <!-- Form fields in sections -->
                    <div class="space-y-8">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 gap-6">
                                {{-- Kategori Level C --}}
                                <div>
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-700">
                                        Kategori Level C
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 6h4v4H4V6zm6 0h4v4h-4V6zm6 0h4v4h-4V6zM4 12h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4z" />
                                            </svg>
                                        </div>
                                        <select id="category_c_id" name="category_c_id" onchange="showCustomInput()"
                                            class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="">--Select Category--</option>
                                            @foreach ($categoriesC as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_c_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <x-input-error :messages="$errors->get('category_c_id')" class="mt-1 text-xs" /> --}}
                                </div>

                                <!-- text soal -->
                                <div>
                                    <div class="mb-4">
                                        <label for="question" class="block mb-2 text-sm font-medium text-gray-700">Text
                                            Soal</label>
                                        <textarea name="question" id="editor" rows="5"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                            {!! $question->question !!}
                                        </textarea>
                                    </div>
                                    {{-- <x-input-error :messages="$errors->get('question')" class="mt-1 text-xs" /> --}}
                                </div>

                                {{-- order --}}
                                <div>
                                    <label for="order" class="block mb-2 text-sm font-medium text-gray-700">
                                        Order <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" name="order" id="order" required
                                        placeholder="Input order"
                                        class="pl-3 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ $question->order }}">
                                    {{-- <x-input-error :messages="$errors->get('order')" class="mt-1 text-xs" /> --}}
                                </div>

                                {{-- is_active --}}
                                <div>
                                    <label for="is_active" class="block mb-2 text-sm font-medium text-gray-700">
                                        Is Active <span class="text-red-500">*</span>
                                    </label>
                                    <select id="is_active" name="is_active"
                                        class="pl-10 shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="1" {{ old('is_active', $question->is_active) == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_active', $question->is_active) == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    {{-- <x-input-error :messages="$errors->get('is_active')" class="mt-1 text-xs" /> --}}
                                </div>

                                {{-- gambar --}}
                                <div class="mb-4">
                                    <label for="image_url" class="block mb-2 text-sm font-medium text-gray-700">Gambar
                                        (Opsional)</label>
                                    <input type="file" name="image_url" id="image_url"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none p-2.5">
                                    {{-- <x-input-error :messages="$errors->get('image_url')" class="mt-1 text-xs" /> --}}
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-center mt-8">
                        <button type="submit"
                            class="px-6 py-3 text-base font-medium text-white bg-gradient-to-r from-[#0C548C] to-[#2E4D69] rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg> --}}
                            Edit Soal Level C
                        </button>
                    </div>
                </form>
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

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        if (performance.navigation.type === 2) {
            // If page is accessed via Back button, reload to clear session flash
            location.reload();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection