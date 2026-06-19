@props(['align' => 'left'])

<th {{ $attributes->merge(['class' => 'px-4 py-3 text-xs font-medium text-' . $align . ' text-white uppercase tracking-wider']) }}>
    {{ $slot }}
</th>
