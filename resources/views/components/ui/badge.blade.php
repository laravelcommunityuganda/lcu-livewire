@props([
    'variant' => 'default',
    'size' => 'sm',
    'class' => ''
])

@php
    $variants = [
        'default' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        'primary' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200',
        'success' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
        'warning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
        'error' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
        'info' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
    ];
    
    $sizes = [
        'xs' => 'px-2 py-0.5 text-xs',
        'sm' => 'px-2.5 py-0.5 text-xs',
        'md' => 'px-3 py-1 text-sm',
        'lg' => 'px-4 py-1.5 text-base',
    ];
    
    $classes = 'inline-flex items-center rounded-full font-medium ' . 
               ($variants[$variant] ?? $variants['default']) . ' ' . 
               ($sizes[$size] ?? $sizes['sm']) . ' ' . 
               $class;
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
