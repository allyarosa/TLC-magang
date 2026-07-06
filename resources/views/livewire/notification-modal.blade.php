<div class="relative">
    <!-- Tooltip Component -->
    <x-tooltip text="Notifikasi" position="bottom" :active="!$isOpen">
        <!-- Tombol Notifikasi -->
        <button wire:click="toggle" class="p-1.5 text-white rounded-full hover:bg-gray-100/20 hover:scale-105 transition-all duration-300 focus:outline-none">
            <svg class="h-6 w-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.149.757-.405 1.035L4 17h5m6 0a3 3 0 11-6 0">
                </path>
            </svg>
        </button>

        <!-- Badge jumlah notifikasi -->
        @if ($unreadCount > 0)
            <span class="absolute -top-1.5 -right-1.5 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold rounded-full px-1.5 py-0.5 shadow-lg animate-pulse">
                {{ $unreadCount }}
            </span>
        @endif
    </x-tooltip>

    <!-- Modal -->
    <div class="@if(!$isOpen) hidden @endif absolute right-0 top-12 mt-2 w-80 bg-white backdrop-blur-[20px] rounded-xl shadow-xl border border-white/20 overflow-hidden z-[999]">
        <div class="px-4 py-3 border-b border-gray-200">
            <h3 class="text-base font-semibold text-gray-800">Notifikasi</h3>
        </div>
        <div class="divide-y divide-gray-100 max-h-80 overflow-y-auto">
            @forelse ($notifications as $notification)
                <div wire:click="markAsRead('{{ $notification->id }}')" class="cursor-pointer flex items-start space-x-3 px-4 py-3 hover:bg-gray-50/50 transition-colors duration-200 @if(!$notification->read_at) bg-blue-50 @endif">
                    <div class="flex-shrink-0 pt-1">
                        <div class="p-1.5 {{ $notification->data['icon_bg_color'] ?? 'bg-blue-100' }} rounded-full">
                            <div class="{{ $notification->data['icon_text_color'] ?? 'text-blue-600' }}">
                                {!! $notification->data['icon'] ?? '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>' !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $notification->data['message'] ?? 'Notification message missing' }}</p>
                        <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <div class="px-4 py-12 text-center">
                    <p class="text-sm text-gray-500">Tidak ada notifikasi baru.</p>
                </div>
            @endforelse
        </div>
        <div class="px-4 py-2 border-t border-gray-200 flex justify-center">
            @if ($unreadCount > 0)
                <button wire:click.prevent="markAllAsRead" class="text-sm font-semibold text-brandBlue hover:text-blue-700 w-full text-center transition-colors">
                    Tandai Semua sebagai Dibaca
                </button>
            @else
                <span class="text-sm text-gray-400 w-full text-center select-none">
                    Semua notifikasi telah dibaca
                </span>
            @endif
        </div>
    </div>
</div>