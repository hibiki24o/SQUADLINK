@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-green-400 text-sm font-bold leading-5 text-green-400 drop-shadow-[0_0_8px_rgba(74,222,128,0.8)] focus:outline-none transition duration-300 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-green-300 hover:border-green-300 focus:outline-none transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
