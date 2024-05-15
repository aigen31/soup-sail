@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block text-base text-black border-b border-b-gray-300 py-3 px-5'
            : 'block text-base text-gray-600 hover:text-green-500 transition-colors border-b border-b-gray-300 py-3 px-5';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
