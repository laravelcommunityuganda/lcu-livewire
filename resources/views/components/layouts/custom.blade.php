<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
  @include('partials.head')
  <wireui:scripts />
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen">
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