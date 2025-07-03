<x-layouts.custom>
    <x-slot:title>Resource - {{ $resource->title }}</x-slot:title>
    @section('header')
        <x-core.header>Resource - {{ $resource->title }}</x-core.header>
    @endsection
    <x-core.container>

    </x-core.container>
</x-layouts.custom>
