@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-sky-900 bg-sky-100 text-sky-900 focus:border-indigo-600 focus:ring-indigo-500 ml-auto rounded-md shadow-sm']) !!}>
