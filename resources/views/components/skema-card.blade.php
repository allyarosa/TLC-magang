@props([
    'level',
    'title',
    'description',
    'certification',
    'image',
    'isMobile' => false,
    'bgGradient' => 'from-blue-500 to-blue-700',
    'borderColor' => 'border-blue-100',
    'titleColor' => 'text-blue-800',
    'certColor' => 'text-blue-600',
])

@if ($isMobile)
    <!-- Mobile/Tablet Card -->
    <div class="flex items-start gap-4 group">
        <div class="relative flex-shrink-0">
            <div
                class="w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br {{ $bgGradient }} rounded-xl sm:rounded-2xl shadow-lg flex items-center justify-center">
                <img src="{{ asset($image) }}" alt="Level {{ $level }}" class="w-8 h-8 sm:w-10 sm:h-10 object-contain">
            </div>
            <div
                class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center text-xs font-bold text-gray-800 shadow-md">
                {{ $level }}</div>
        </div>
        <div
            class="bg-white p-4 sm:p-5 rounded-xl sm:rounded-2xl shadow-md flex-1 group-hover:shadow-lg transition-all duration-300 border {{ $borderColor }}">
            <h3 class="font-bold text-lg sm:text-xl {{ $titleColor }} mb-2">{{ $title }}</h3>
            <p class="text-gray-600 text-sm sm:text-base">{{ $description }}</p>
            <div class="mt-2 text-xs sm:text-sm font-medium {{ $certColor }}">{{ $certification }}</div>
        </div>
    </div>
@else
    <!-- Desktop Card -->
    <div class="text-center group">
        <div class="relative mb-6 h-32 flex items-end justify-center">
            <div
                class="w-20 h-20 mx-auto bg-gradient-to-br {{ $bgGradient }} rounded-2xl shadow-2xl flex items-center justify-center">
                <img src="{{ asset($image) }}" alt="Level {{ $level }}" class="w-10 h-10 object-contain">
            </div>
            <div
                class="absolute top-0 right-1/2 translate-x-1/2 -mr-10 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center text-sm font-bold text-gray-800 shadow-lg">
                {{ $level }}
            </div>
        </div>
        <div
            class="bg-white p-5 rounded-2xl shadow-lg group-hover:shadow-xl transition-all duration-300 border {{ $borderColor }} h-48 flex flex-col">
            <h3 class="font-bold text-lg {{ $titleColor }} mb-3">{{ $title }}</h3>
            <p class="text-gray-600 text-md text-justify leading-relaxed flex-grow">{{ $description }}</p>
        </div>
        <div class="mt-4 text-sm font-medium {{ $certColor }}">{{ $certification }}</div>
    </div>
@endif
