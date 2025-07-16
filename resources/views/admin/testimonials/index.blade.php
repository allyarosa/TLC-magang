@extends('layouts.adminDashboard')

@section('content')
<div class="container mx-auto px-4 py-6 lg:py-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 lg:mb-8">
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Manajemen Testimonial</h1>
        
        <!-- Search Section -->
        <div class="w-full sm:w-auto">
            <div class="relative">
                <input type="text" 
                       id="searchInput" 
                       placeholder="Cari testimonial..." 
                       value="{{ request('search') }}"
                       class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <i class="fas fa-search text-sm"></i>
                </div>
                @if(request('search'))
                    <button type="button" 
                            id="clearSearch"
                            class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Statistics Cards (Optional) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $testimonials->total() }}</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-comments text-blue-600"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Menunggu</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $testimonials->where('is_approved', false)->count() }}</p>
                </div>
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i class="fas fa-clock text-yellow-600"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Disetujui</p>
                    <p class="text-2xl font-bold text-green-600">{{ $testimonials->where('is_approved', true)->count() }}</p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-check text-green-600"></i>
                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Ditampilkan</p>
                    <p class="text-2xl font-bold text-purple-600">{{ $testimonials->where('is_featured', true)->count() }}</p>
                </div>
                <div class="p-3 bg-purple-100 rounded-full">
                    <i class="fas fa-star text-purple-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200 bg-gray-50">
            <div class="flex overflow-x-auto scrollbar-hide">
                <a href="{{ route('admin.testimonials.index', array_merge(request()->query(), ['status' => 'pending'])) }}" 
                    class="flex-shrink-0 px-4 sm:px-6 py-4 font-medium text-sm whitespace-nowrap transition-colors {{ $status === 'pending' ? 'text-blue-600 border-b-2 border-blue-600 bg-white' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
                    <i class="fas fa-clock mr-2"></i>
                    <span class="hidden sm:inline">Menunggu Persetujuan</span>
                    <span class="sm:hidden">Menunggu</span>
                </a>
                <a href="{{ route('admin.testimonials.index', array_merge(request()->query(), ['status' => 'approved'])) }}" 
                    class="flex-shrink-0 px-4 sm:px-6 py-4 font-medium text-sm whitespace-nowrap transition-colors {{ $status === 'approved' ? 'text-blue-600 border-b-2 border-blue-600 bg-white' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
                    <i class="fas fa-check mr-2"></i>
                    <span>Disetujui</span>
                </a>
                <a href="{{ route('admin.testimonials.index', array_merge(request()->query(), ['status' => 'featured'])) }}" 
                    class="flex-shrink-0 px-4 sm:px-6 py-4 font-medium text-sm whitespace-nowrap transition-colors {{ $status === 'featured' ? 'text-blue-600 border-b-2 border-blue-600 bg-white' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100' }}">
                    <i class="fas fa-star mr-2"></i>
                    <span>Ditampilkan</span>
                </a>
            </div>
        </div>

        <!-- Mobile Cards View -->
        <div class="block lg:hidden">
            @forelse ($testimonials as $testimonial)
                <div class="p-4 border-b border-gray-200 last:border-b-0">
                    <!-- User Info -->
                    <div class="flex items-center mb-3">
                        <div class="flex-shrink-0 h-10 w-10 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" 
                                 src="{{ $testimonial->user->profile_photo_url }}" 
                                 alt="{{ $testimonial->user->name }}"
                                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($testimonial->user->name) }}&background=e5e7eb&color=6b7280'">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $testimonial->user->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $testimonial->user->email }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $testimonial->category->name }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <p class="text-sm text-gray-700 line-clamp-3">{{ $testimonial->content }}</p>
                    </div>

                    <!-- Rating and Date -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center">
                            @if ($testimonial->rating)
                                <div class="flex mr-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-{{ $i <= $testimonial->rating ? 'yellow-400' : 'gray-300' }} text-sm"></i>
                                    @endfor
                                </div>
                            @else
                                <span class="text-gray-400 text-sm">Tidak ada rating</span>
                            @endif
                        </div>
                        <span class="text-xs text-gray-500">{{ $testimonial->created_at->format('d M Y') }}</span>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-wrap gap-2">
                        @if (!$testimonial->is_approved)
                            <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 hover:bg-green-200 transition-colors"
                                        onclick="return confirm('Apakah Anda yakin ingin menyetujui testimonial ini?')">
                                    <i class="fas fa-check mr-1"></i>
                                    Setujui
                                </button>
                            </form>
                        @endif
                        
                        <form action="{{ route('admin.testimonials.feature', $testimonial) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $testimonial->is_featured ? 'bg-purple-100 text-purple-800 hover:bg-purple-200' : 'bg-blue-100 text-blue-800 hover:bg-blue-200' }} transition-colors"
                                    onclick="return confirm('{{ $testimonial->is_featured ? 'Sembunyikan' : 'Tampilkan' }} testimonial ini?')">
                                <i class="fas fa-{{ $testimonial->is_featured ? 'eye-slash' : 'star' }} mr-1"></i>
                                {{ $testimonial->is_featured ? 'Sembunyikan' : 'Tampilkan' }}
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 hover:bg-red-200 transition-colors"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                <i class="fas fa-trash mr-1"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-comments text-4xl"></i>
                    </div>
                    <p class="text-gray-500">Tidak ada testimonial yang ditemukan.</p>
                </div>
            @endforelse
        </div>

        <!-- Desktop Table View -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kategori
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Testimonial
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rating
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($testimonials as $testimonial)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-cover" 
                                         src="{{ $testimonial->user->profile_photo_url }}" 
                                         alt="{{ $testimonial->user->name }}"
                                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($testimonial->user->name) }}&background=e5e7eb&color=6b7280'">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $testimonial->user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $testimonial->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $testimonial->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs">
                            <div class="line-clamp-2" title="{{ $testimonial->content }}">{{ $testimonial->content }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($testimonial->rating)
                                <div class="flex items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-{{ $i <= $testimonial->rating ? 'yellow-400' : 'gray-300' }} text-sm"></i>
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600">({{ $testimonial->rating }})</span>
                                </div>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $testimonial->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-col space-y-1">
                                @if ($testimonial->is_approved)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check mr-1"></i>
                                        Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-1"></i>
                                        Menunggu
                                    </span>
                                @endif
                                
                                @if ($testimonial->is_featured)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        <i class="fas fa-star mr-1"></i>
                                        Ditampilkan
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex flex-col space-y-1">
                                @if (!$testimonial->is_approved)
                                    <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                class="text-green-600 hover:text-green-900 transition-colors"
                                                onclick="return confirm('Apakah Anda yakin ingin menyetujui testimonial ini?')">
                                            <i class="fas fa-check mr-1"></i>Setujui
                                        </button>
                                    </form>
                                @endif
                                
                                <form action="{{ route('admin.testimonials.feature', $testimonial) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" 
                                            class="{{ $testimonial->is_featured ? 'text-purple-600 hover:text-purple-900' : 'text-blue-600 hover:text-blue-900' }} transition-colors"
                                            onclick="return confirm('{{ $testimonial->is_featured ? 'Sembunyikan' : 'Tampilkan' }} testimonial ini?')">
                                        <i class="fas fa-{{ $testimonial->is_featured ? 'eye-slash' : 'star' }} mr-1"></i>
                                        {{ $testimonial->is_featured ? 'Sembunyikan' : 'Tampilkan' }}
                                    </button>
                                </form>
                                
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 transition-colors"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                        <i class="fas fa-trash mr-1"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="text-gray-400 mb-4">
                                <i class="fas fa-comments text-4xl"></i>
                            </div>
                            <p class="text-gray-500">Tidak ada testimonial yang ditemukan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($testimonials->hasPages())
            <div class="px-4 sm:px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 flex items-center">
        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mr-3"></div>
        <span class="text-gray-700">Memuat...</span>
    </div>
</div>

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const clearButton = document.getElementById('clearSearch');
    const loadingOverlay = document.getElementById('loadingOverlay');
    let searchTimeout;

    // Search functionality
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });

    // Real-time search with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            if (this.value.length >= 3 || this.value.length === 0) {
                performSearch();
            }
        }, 500);
    });

    // Clear search
    if (clearButton) {
        clearButton.addEventListener('click', function() {
            searchInput.value = '';
            performSearch();
        });
    }

    function performSearch() {
        showLoading();
        const searchTerm = searchInput.value;
        const currentUrl = new URL(window.location.href);
        
        if (searchTerm) {
            currentUrl.searchParams.set('search', searchTerm);
        } else {
            currentUrl.searchParams.delete('search');
        }
        
        window.location.href = currentUrl.toString();
    }

    function showLoading() {
        if (loadingOverlay) {
            loadingOverlay.classList.remove('hidden');
        }
    }

    // Form confirmation handlers
    document.querySelectorAll('form[action*="approve"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin menyetujui testimonial ini?')) {
                showLoading();
                this.submit();
            }
        });
    });

    document.querySelectorAll('form[action*="feature"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const isFeature = this.querySelector('button').textContent.includes('Tampilkan');
            const message = isFeature ? 'Tampilkan testimonial ini?' : 'Sembunyikan testimonial ini?';
            if (confirm(message)) {
                showLoading();
                this.submit();
            }
        });
    });

    document.querySelectorAll('form[action*="destroy"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus testimonial ini? Tindakan ini tidak dapat dibatalkan.')) {
                showLoading();
                this.submit();
            }
        });
    });

    // Auto-hide flash messages
    const flashMessages = document.querySelectorAll('.alert, .flash-message');
    flashMessages.forEach(message => {
        setTimeout(() => {
            message.style.opacity = '0';
            setTimeout(() => {
                message.remove();
            }, 300);
        }, 5000);
    });
});
</script>
@endpush
@endsection