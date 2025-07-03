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
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($events as $event)
                        <li key="{{ $event->id }}">
                            <a href="{{ route('events.show', $event->id) }}" class="block hover:bg-gray-50 dark:hover:bg-gray-700">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400 truncate">
                                            {{ $event->title }}
                                        </p>
                                        <div class="ml-2 flex-shrink-0 flex">
                                            <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                                {{ $event->type ?? 'Event' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                <svg
                                                    class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    aria-hidden="true"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($event->start_date)->isoFormat('ddd, MMM D, h:mm A') }}
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400 sm:mt-0 sm:ml-6">
                                                <svg
                                                    class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    aria-hidden="true"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                                {{ $event->location }}
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                                            @if($event->is_online)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                                    Online
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </x-core.container>
</x-layouts.custom>
