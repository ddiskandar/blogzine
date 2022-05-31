@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-black transition'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-400 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
