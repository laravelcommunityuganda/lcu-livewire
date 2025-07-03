@props([
    'title',
    'value',
    'icon',
    'trend' => 'neutral',
    'link' => '#'
])

@php
    $trendColors = [
        'up' => 'text-green-600 bg-green-100',
        'down' => 'text-red-600 bg-red-100',
        'neutral' => 'text-yellow-600 bg-yellow-100',
    ];

    $iconClasses = [
        'users' => 'heroicon-o-users',
        'document-text' => 'heroicon-o-document-text',
        'calendar' => 'heroicon-o-calendar',
        'currency-dollar' => 'heroicon-o-currency-dollar',
    ];
@endphp

<a href="{{ $link }}">
    <x-card class="transition-colors duration-200 dark:bg-gray-900 dark:hover:bg-gray-700 rounded">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">{{ $title }}</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $value }}</p>
            </div>
            <div @class(['p-3 rounded-full', $trendColors[$trend]])>
                <x-dynamic-component :component="$iconClasses[$icon]" class="w-6 h-6" />
            </div>
        </div>
    </x-card>
</a>
