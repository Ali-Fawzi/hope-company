@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-900 font-medium leading-5 text-blue-900 hover:text-sky-900 focus:outline-none focus:border-sky-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-medium leading-5 text-blue-500 hover:text-blue-900 hover:border-blue-500 focus:outline-none focus:text-sky-100 focus:border-sky-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
