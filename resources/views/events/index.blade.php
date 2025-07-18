@props(['events'])
<x-layouts.custom title="Events" description="Browse upcoming events in the Laravel Community Uganda">
    <x-core.container>
    @section('header')
    <x-core.header>Events</x-core.header>
    @endsection
        <div class="flex justify-between items-center mb-8">
            @auth
                <a
                    href="{{ route('admin.events.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    Create Event
                </a>
            @endauth
        </div>

        <div class="mb-6">
            <input
                type="text"
                id="search"
                name="search"
                placeholder="Search events..."
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-900 dark:text-white"
                hx-get="{{ route('events.index') }}"
                hx-trigger="keyup changed delay:500ms"
                hx-target="#events-list"
                hx-swap="outerHTML"
                hx-include="[name='search']"
            />
        </div>

        <div id="events-list">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div key="{{ $event->id }}" class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <a href="{{ route('events.show', $event->id) }}" class="block">
                            <!-- Event Image -->
                            <div class="relative h-48 bg-gradient-to-br from-indigo-500 to-purple-600">
                                <img
                                    src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                    alt="{{ $event->title }}"
                                    class="w-full h-full object-cover"
                                />
                                <!-- Event Type Badge -->
                                <div class="absolute top-3 right-3">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-white/90 text-gray-800 backdrop-blur-sm">
                                        {{ $event->type ?? 'Event' }}
                                    </span>
                                </div>
                                <!-- Online Badge -->
                                @if($event->is_online)
                                    <div class="absolute top-3 left-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-500 text-white">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 6a2 2 0 012-2h6l2 2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                            </svg>
                                            Online
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Event Content -->
                            <div class="p-6">
                                <!-- Event Title -->
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                    {{ $event->title }}
                                </h3>

                                <!-- Event Description (if available) -->
                                @if(isset($event->description))
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-2">
                                        {{ Str::limit($event->description, 100) }}
                                    </p>
                                @endif

                                <!-- Event Details -->
                                <div class="space-y-2">
                                    <!-- Date & Time -->
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="flex-shrink-0 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($event->start_date)->isoFormat('ddd, MMM D, h:mm A') }}</span>
                                    </div>

                                    <!-- Location -->
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="flex-shrink-0 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="truncate">{{ $event->location }}</span>
                                    </div>
                                </div>

                                <!-- Card Footer -->
                                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <!-- Attendees count (if available) -->
                                        @if(isset($event->attendees_count))
                                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                                </svg>
                                                {{ $event->attendees_count }} attending
                                            </div>
                                        @endif

                                        <!-- Learn More Button -->
                                        <span class="text-sm text-indigo-600 dark:text-indigo-400 font-medium group-hover:text-indigo-500">
                                            Learn more →
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Empty State -->
            @if($events->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0h6m-6 0l-1 10a1 1 0 01-1 1H5a1 1 0 01-1-1L3 7m6 0V3a1 1 0 011-1h4a1 1 0 011 1v4"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No events found</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new event.</p>
                </div>
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
