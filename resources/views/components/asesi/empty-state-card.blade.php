@props([
    'title',
    'message',
    'icon' => 'info',
    'type' => 'info'
])

@php
    $colors = [
        'info' => ' text-gray-600',
        'warning' => 'bg-amber-50 text-amber-600',
        'success' => 'bg-emerald-50 text-emerald-600',
        'danger' => 'bg-rose-50 text-rose-600',
    ][$type] ?? 'bg-cyan-50 text-cyan-600';
@endphp

<div class="max-w-md mx-auto my-16 text-center p-8 border border-gray-100 animate__animated animate__fadeIn">
    <div class="w-16 h-16 {{ $colors }} rounded-full flex items-center justify-center mx-auto mb-4">
        <span class="material-symbols-outlined text-8xl">{{ $icon }}</span>
    </div>
    <h3 class="text-2xl font-bold text-gray-700 mb-2">{{ $title }}</h3>
    <p class="text-gray-600 text-sm mb-6">{{ $message }}</p>
    {{ $slot }}
</div>
