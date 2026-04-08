@props(['title', 'description', 'hex' => '#1D4E89'])

<div class="group relative rounded-2xl transition-all duration-300 border hover:-translate-y-0.5 hover:shadow-md bg-transparent"
    style="border-color: {{ $hex }}33;">
    <div class="p-5">
        <h3 class="text-base font-bold mb-2" style="color: {{ $hex }}">
            {{ $title }}
        </h3>
        <p class="text-gray-900 text-sm leading-relaxed text-justify">
            {{ $description }}
        </p>
    </div>
</div>
