@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3 rounded-md bg-gray-800 p-2 text-sm font-semibold leading-6 text-white'
            : 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        {{ $icon ?? '' }}
    </span>
    {{ $slot }}
</a>
