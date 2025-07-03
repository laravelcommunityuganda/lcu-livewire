<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-light-gray dark:bg-gray-800 text-gray-800 dark:text-gray-200">
        {{-- NavBar --}}
        @hasSection('nav-bar')
            @yield('nav-bar')
        @else
            <x-core.nav-bar />
        @endif
        {{-- Header --}}
        @hasSection('header')
            @yield('header')
        @endif
        {{-- Main Content --}}
        <main>{{ $slot }}</main>
        {{-- Footer --}}
        <x-core.footer />
    </div>
    @livewireScriptConfig
</body>

</html>
