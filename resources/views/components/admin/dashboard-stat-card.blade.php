@props(['data', 'title', 'color', 'icon'])

<div
    class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col gap-3 group hover:shadow-md transition-all duration-300 relative overflow-hidden">
    <div
        class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-{{ $color }} group-hover:bg-{{ $color }} group-hover:text-white transition-colors duration-300">
        <i class="{{ $icon }}"></i>
    </div>
    <div>
        <p class="text-xs text-slate-500 font-medium">{{ $title }}</p>
        <p class="text-2xl font-bold text-slate-800">{{ $data }}</p>
    </div>
</div>