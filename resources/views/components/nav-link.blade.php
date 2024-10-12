@props(['active'])

@php
$classes = ($active ?? false)
            ? 'rounded-md px-3 py-2 text-sm font-medium text-slate-900 underline underline-offset-8 '
            : 'rounded-md px-3 py-2 text-sm font-medium text-slate-900 hover:underline-offset-8 hover:text-slate-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
