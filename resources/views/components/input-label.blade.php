@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-300 tracking-wide']) }}>
    {{ $value ?? $slot }}
</label>
