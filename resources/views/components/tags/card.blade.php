@props([
    'tag' => ['name' => ''],
    'size' => 'base'
])
@php
    $class = 'font-bold capitalize transition-colors duration-300 bg-white/10 rounded-xl hover:bg-white/25 mr-1 ';
    if ($size === 'base') {
        $class .= 'px-3 py-1 text-sm';
    }
    if ($size === 'small') {
        $class .= 'px-2 py-1 text-xs';
    }
    $tagName = Str::of($tag['name'] ?? '')
        ->lower()
        ->replace(' ', '-');

@endphp

<a href="{{ url('/tags/' . $tagName) }}" class="{{ $class }}">
    {{ $tag['name'] ?? '' }}
</a>
