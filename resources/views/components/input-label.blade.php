@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold uppercase mb-2 text-sm text-gray-500 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
