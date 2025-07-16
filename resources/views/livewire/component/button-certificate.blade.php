<button
    class="flex-1 font-medium py-3 px-1.5 rounded-xl transform transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300
           {{ $button['class'] }}
           {{ $button['disabled'] ? '' : 'hover:scale-105 active:scale-95' }}"
    @if ($button['disabled']) disabled @endif>
    {{ $button['text'] }}
</button>
