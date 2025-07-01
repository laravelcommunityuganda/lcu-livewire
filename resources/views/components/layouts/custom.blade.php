<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-light-gray dark:bg-gray-800 text-gray-800 dark:text-gray-200">
        {{-- NavBar --}}
        <x-core.nav-bar />
        {{-- Main Content --}}
        <main>{{ $slot }}</main>
        {{-- Footer --}}
        <x-core.footer />
    </div>
    @livewireScriptConfig
</body>

</html>
