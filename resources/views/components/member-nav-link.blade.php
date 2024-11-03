@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3 rounded-md bg-gray-50 p-2 text-sm/6 font-semibold text-indigo-600'
            : 'group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold text-gray-700  hover:text-indigo-600 hover:bg-gray-50';

$iconColor = ($active ?? false)
            ? 'text-indigo-600'
            : 'text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        <span class="h-6 w-6 shrink-0 {{ $iconColor }}">
            {{ $icon }}
        </span>
    </span>
    {{ $slot }}
</a>
