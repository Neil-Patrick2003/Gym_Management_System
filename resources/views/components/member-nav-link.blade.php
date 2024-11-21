@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3 rounded-lg bg-white py-2 px-6 text-sm/6 font-semibold text-red-600'
            : 'group flex gap-x-3 rounded-lg p-2 text-sm/6 font-semibold text-white  hover:text-indigo-600 hover:bg-white';

$iconColor = ($active ?? false)
            ? 'text-red-600'
            : 'text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        <span class="h-6 w-6 shrink-0 {{ $iconColor }}">
            {{ $icon }}
        </span>
    </span>
    {{ $slot }}
</a>
