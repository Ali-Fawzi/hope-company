@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-blue-700 text-right text-lg font-medium text-blue-700 bg-blue-100 focus:outline-none focus:text-blue-900 focus:bg-blue-300 focus:border-blue-700 transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-right text-lg font-medium text-blue-900 hover:text-blue-700 hover:bg-blue-500 hover:border-blue-400 focus:outline-none focus:text-blue-900 focus:bg-blue-100 focus:border-blue-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
