@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-right text-sm text-blue-900']) }}>
    {{ $value ?? $slot }}
</label>
