@props(['events'])
<x-layouts.custom title="Events" description="Browse upcoming events in the Laravel Community Uganda">
    <x-core.container>
    @section('header')
    <x-core.header>Events</x-core.header>
    @endsection
        @auth
            <x-ui.page-header 
                title="Community Events" 
                subtitle="Join upcoming Laravel Community Uganda events, workshops, and meetups" 
                actionText="Create Event" 
                actionUrl="{{ route('admin.events.create') }}" 
                actionIcon="calendar" 
            />
        @else
            <x-ui.page-header 
                title="Community Events" 
                subtitle="Join upcoming Laravel Community Uganda events, workshops, and meetups" 
            />
        @endauth

        <div class="mb-6">
            <x-ui.search-input 
                name="search" 
                id="search" 
                placeholder="Search events..." 
                value="{{ request('search') }}"
                hx-get="{{ route('events.index') }}"
                hx-trigger="keyup changed delay:500ms"
                hx-target="#events-list"
                hx-swap="outerHTML"
                hx-include="[name='search']"
            />
        </div>

        <div id="events-list">
            @if($events->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($events as $event)
                        <x-events.card :event="$event" />
                    @endforeach
                </div>
            @else
                <x-ui.empty-state 
                    title="No events found" 
                    message="Get started by creating a new event." 
                    icon="calendar"
                >
                    @auth
                        <div class="mt-6">
                            <a href="{{ route('admin.events.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                Create Event
                            </a>
                        </div>
                    @endauth
                </x-ui.empty-state>
            @endif

            <!-- Pagination -->
            @if($events->hasPages())
                <div class="mt-8">
                    {{ $events->links() }}
                </div>
            @endif
        </div>
    </x-core.container>
</x-layouts.custom>
