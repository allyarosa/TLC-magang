@extends('layouts.app')

@section('title', $news->title)

@section('content')
<section class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <div class="mb-6 flex items-center text-sm text-gray-500">
            <a href="{{ route('home') }}#galeri" class="hover:text-indigo-600 transition">Beranda</a>
            <svg class="mx-2 h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span>Berita</span>
        </div>

        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <!-- Gambar Utama -->
            @if ($news->image)
            <div class="w-full h-80 overflow-hidden">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                     class="w-full h-full object-cover">
            </div>
            @endif

            <div class="p-6 sm:p-8">
                <!-- Category Badge -->
                @if(isset($news->category))
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full mb-4">
                    {{ $news->category->name ?? 'Berita' }}
                </span>
                @endif

                <!-- Judul -->
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-3 leading-tight">
                    {{ $news->title }}
                </h1>

                <!-- Meta Info -->
                <div class="flex items-center mb-8">
                    <!-- Author Avatar (if available) -->
                    @if(isset($news->author) && isset($news->author->avatar))
                    <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="{{ $news->author->name ?? 'Admin' }}"
                         class="w-10 h-10 rounded-full mr-3">
                    @else
                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-indigo-600 font-bold">{{ substr($news->author->name ?? 'A', 0, 1) }}</span>
                    </div>
                    @endif

                    <div>
                        <!-- Author Name -->
                        <p class="text-sm font-medium text-gray-900">
                            {{ $news->author->name ?? 'Admin' }}
                        </p>
                        <!-- Publication Date -->
                        <p class="text-sm text-gray-500">
                            {{ $news->created_at->translatedFormat('d F Y') }} · {{ $news->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>

                <!-- Konten -->
                <div class="prose max-w-none prose-lg prose-indigo text-gray-700 mb-8">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <!-- Tags (if available) -->
                @if(isset($news->tags) && count($news->tags) > 0)
                <div class="mt-6 mb-8">
                    @foreach($news->tags as $tag)
                    <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-medium text-gray-700 mr-2 mb-2">
                        #{{ $tag->name }}
                    </span>
                    @endforeach
                </div>
                @endif

                <!-- Share Buttons -->
                <div class="border-t border-gray-200 pt-6 flex items-center justify-between">
                    <div class="text-sm text-gray-500">Bagikan:</div>
                    <div class="flex space-x-4">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="text-gray-400 hover:text-blue-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                            </svg>
                        </a>
                        <!-- Twitter/X -->
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(url()->current()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="text-gray-400 hover:text-blue-400 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/>
                            </svg>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . url()->current()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="text-gray-400 hover:text-green-500 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Tombol Kembali - with anchor to news section -->
                <div class="mt-8">
                    <a href="{{ route('home') }}#galeri"
                       class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Berita
                    </a>
                </div>
            </div>
        </div>

        <!-- Related News (if available) -->
        @if(isset($relatedNews) && count($relatedNews) > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Berita Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($relatedNews as $item)
                <a href="{{ route('news.show', $item->slug) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    @if($item->image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform hover:scale-105">
                    </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $item->created_at->translatedFormat('d F Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

{{-- Add this script to the layout file to make the "Kembali" button work --}}
{{-- In your layouts/app.blade.php, ensure you have a news section with id="news-section" --}}
