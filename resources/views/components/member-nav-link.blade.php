@props(['active'])

@php
    $classes = ($active ?? false)
    ? 'group flex gap-x-3 bg-red-500 p-2 rounded px-6 text-sm/6 font-semibold text-white transition-bg duration-300 ease-in-out'
    : 'group flex gap-x-3 p-2 px-6 rounded text-sm/6 font-semibold text-red-300 transition-bg duration-300 ease-in-out hover:text-white hover:bg-red-400 hover:rounded';


    $iconColor = $active ?? false ? 'text-white' : 'text-red-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        <span class="h-6 w-6 shrink-0 {{ $iconColor }}">
            {{ $icon }}
        </span>
    </span>
    {{ $slot }}
</a>
