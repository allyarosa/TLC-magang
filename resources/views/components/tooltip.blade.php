@props([
    'text' => '',
    'position' => 'bottom',
    'active' => true,
])

@php
    // Class positioning berdasarkan prop 'position'
    $positionClasses = [
        'top' => 'bottom-full left-1/2 transform -translate-x-1/2 mb-2.5',
        'bottom' => 'top-full left-1/2 transform -translate-x-1/2 mt-2.5',
        'left' => 'right-full top-1/2 transform -translate-y-1/2 mr-2.5',
        'right' => 'left-full top-1/2 transform -translate-y-1/2 ml-2.5',
    ][$position] ?? 'top-full left-1/2 transform -translate-x-1/2 mt-2.5';

    // Arah & posisi segitiga kecil (arrow) berdasarkan prop 'position'
    $arrowClasses = [
        'top' => 'top-full left-1/2 transform -translate-x-1/2 border-t-slate-900/90',
        'bottom' => 'bottom-full left-1/2 transform -translate-x-1/2 border-b-slate-900/90',
        'left' => 'left-full top-1/2 transform -translate-y-1/2 border-l-slate-900/90',
        'right' => 'right-full top-1/2 transform -translate-y-1/2 border-r-slate-900/90',
    ][$position] ?? 'bottom-full left-1/2 transform -translate-x-1/2 border-b-slate-900/90';
@endphp

<div class="relative group inline-block">
    <!-- Trigger Element (Tombol, icon, text, dll.) -->
    {{ $slot }}

    <!-- Tooltip Pop-up -->
    <div class="absolute {{ $positionClasses }} w-max px-2.5 py-1 bg-slate-900/90 backdrop-blur-sm text-white text-[11px] font-medium rounded-md shadow-md opacity-0 invisible {{ $active ? 'group-hover:opacity-100 group-hover:visible' : '' }} transition-all duration-200 z-50 text-center pointer-events-none">
        {{ $text }}
        <!-- Segitiga Kecil (Arrow) -->
        <div class="absolute {{ $arrowClasses }} border-4 border-transparent"></div>
    </div>
</div>
