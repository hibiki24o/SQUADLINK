@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-green-400 text-start text-base font-bold text-green-400 bg-green-900/30 drop-shadow-[0_0_8px_rgba(74,222,128,0.8)] focus:outline-none transition duration-300 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-white hover:text-green-300 hover:bg-white/10 hover:border-green-300 focus:outline-none transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
