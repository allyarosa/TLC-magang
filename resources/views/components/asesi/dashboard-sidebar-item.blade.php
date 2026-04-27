@props([
    'href' => '#',
    'icon' => 'dashboard',
    'text' => 'Dashboard',
    'routeName' => '',
])

@php
    $isActive = $routeName && request()->routeIs($routeName);
@endphp

<a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200
    {{ $isActive 
        ? 'bg-brandBlue/20 text-brandBlue shadow-sm font-medium active:scale-98' 
        : 'text-slate-600 hover:text-cyan-700 hover:translate-x-1' }}"
    href="{{ $href }}">
    <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
    <span class="text-sm">{{ $text }}</span>
</a>
