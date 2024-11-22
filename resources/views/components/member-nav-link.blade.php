@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'group flex gap-x-3  bg-gradient-to-r from-[#ff0000] from-20% to-[#000000] p-2 px-6 text-sm/6 font-semibold text-white'
            : 'group flex gap-x-3 p-2 px-6 text-sm/6 font-semibold text-white  hover:text-white hover:bg-gradient-to-r from-[#ff0000] from-20% to-[#000000]';

    $iconColor = $active ?? false ? 'text-white' : 'text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="h-6 w-6 shrink-0">
        <span class="h-6 w-6 shrink-0 {{ $iconColor }}">
            {{ $icon }}
        </span>
    </span>
    {{ $slot }}
</a>
