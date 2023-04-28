@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-sky-900 bg-slate-100 text-blue-900 focus:border-indigo-600 focus:ring-indigo-500 ml-auto rounded-md shadow-sm']) !!}>
