@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3  bg-red-700 px-4 py-2 rounded-r-full text-sm font-semibold leading-6 text-white focus:ring-2 focus:ring-red-500'
            : 'group flex gap-x-3 px-4 py-2 rounded-r-full text-sm font-semibold leading-6 text-white hover:bg-red-600 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        {{ $icon ?? '' }}
    </span>
    {{ $slot }}
</a>
