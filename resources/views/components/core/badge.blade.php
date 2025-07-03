@props([
    'variant' => 'primary',
    'class' => '',
])
@php
    $variantClasses = [
        'primary' => 'bg-blue-100 text-blue-800',
        'secondary' => 'bg-gray-100 text-gray-800',
        'success' => 'bg-green-100 text-green-800',
        'danger' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-indigo-100 text-indigo-800',
    ];
    $classes = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ' .
        ($variantClasses[$variant] ?? $variantClasses['primary']) . ' ' . $class;
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
