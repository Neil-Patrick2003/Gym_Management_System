@props(['active'])

@php
    $classes = ($active ?? false)
    ? 'group flex gap-x-3 bg-white p-2 rounded-l-full px-6 text-sm/6 font-semibold text-red-500 transition-bg duration-300 ease-in-out'
    : 'group flex gap-x-3 p-2 px-6 rounded text-sm/6 font-semibold text-neutral-100 transition-bg duration-300 ease-in-out hover:text-neutral-100 hover:bg-red-400 hover:rounded-l-full';


    $iconColor = $active ?? false ? 'text-red-500' : 'text-neutral-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        <span class="h-6 w-6 shrink-0 {{ $iconColor }}">
            {{ $icon }}
        </span>
    </span>
    {{ $slot }}
</a>
