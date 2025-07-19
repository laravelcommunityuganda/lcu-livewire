<x-layouts.app.sidebar :title="$title ?? null">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
