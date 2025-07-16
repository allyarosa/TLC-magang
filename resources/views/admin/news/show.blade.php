@extends('layouts.adminDashboard')

@section('title', 'Detail Berita')

@section('content')
    <div class="p-4 bg-white rounded-lg mb-2">
        <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
            <!-- Breadcrumb -->
            <ol class="flex items-center space-x-1 text-gray-600">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a></li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <a href="{{ route('admin.news.index') }}" class="hover:text-indigo-600">News Management</a>
                </li>
                <li class="flex items-center">
                    <svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Detail Berita</span>
                </li>
            </ol>

            <!-- Actions -->
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.news.edit', $news->id) }}" class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                    Edit
                </a>
                <a href="{{ route('admin.news.index') }}" class="px-3 py-1.5 border text-gray-600 text-sm rounded hover:bg-gray-50">
                    Kembali
                </a>
            </div>
        </nav>
    </div>

    <!-- News Detail -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Image -->
                <div class="w-full md:w-1/3">
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-auto">
                    </div>
                </div>

                <!-- Details -->
                <div class="w-full md:w-2/3">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $news->title }}</h1>
                        <p class="text-sm text-gray-500">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Dibuat: {{ $news->created_at->format('d M Y, H:i') }}
                            </span>
                            @if($news->updated_at && $news->updated_at != $news->created_at)
                            <span class="inline-flex items-center ml-4">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Diperbarui: {{ $news->updated_at->format('d M Y, H:i') }}
                            </span>
                            @endif
                        </p>
                    </div>

                    <!-- Summary -->
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-700 mb-2">Ringkasan</h2>
                        <p class="text-gray-600 bg-gray-50 p-4 rounded-lg">{{ $news->summary }}</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Konten Lengkap</h2>
                <div class="prose max-w-none p-4 bg-gray-50 rounded-lg">
                    {!! $news->content !!}
                </div>
            </div>

            
        </div>
    </div>
@endsection
