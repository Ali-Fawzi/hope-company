@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-right text-base text-blue-900']) }}>
    {{ $value ?? $slot }}
</label>
