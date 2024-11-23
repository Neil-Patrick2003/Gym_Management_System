@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3 rounded-md bg-white p-2 text-sm font-semibold leading-6 text-red-600'
            : 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-200 hover:bg-white hover:text-red-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        {{ $icon ?? '' }}
    </span>
    {{ $slot }}
</a>
