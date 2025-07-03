<x-layouts.custom>

    <x-slot:title>Event - {{ $event->title }}</x-slot:title>

    @section('header')
        <x-core.header>Event - {{ $event->title }}</x-core.header>
    @endsection

    <x-core.container>
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <div class="lg:col-span-2">
                <div class="mb-8">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                        {{ $event->type }}
                    </span>
                    <h1 class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl dark:text-white">
                        {{ $event->title }}
                    </h1>
                    <div class="mt-4 flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ \Carbon\Carbon::parse($event->start_date)->isoFormat('dddd, MMMM D, h:mm A') }} to
                        {{ \Carbon\Carbon::parse($event->end_date)->isoFormat('h:mm A') }}
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $event->location }}
                        @if($event->is_online)
                            <span
                                class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                Online
                            </span>
                        @endif
                    </div>
                </div>

                <div class="prose max-w-none dark:prose-invert">
                    <p>{{ $event->description }}</p>
                </div>

                @if($event->is_online)
                    <div class="mt-8 bg-blue-50 p-4 rounded-lg dark:bg-blue-900 dark:bg-opacity-20">
                        <h3 class="text-lg font-medium text-blue-800 dark:text-blue-200">Online Event</h3>
                        <p class="mt-2 text-sm text-blue-700 dark:text-blue-300">
                            This event will be held online. Join using the link below:
                        </p>
                        <a href="{{ $event->meeting_url }}"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900">
                            Join Event
                        </a>
                    </div>
                @endif
            </div>

            <div class="mt-12 lg:mt-0">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg dark:bg-gray-800">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                            Event Details
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0 dark:border-gray-700">
                        <dl class="sm:divide-y sm:divide-gray-200 dark:sm:divide-gray-700">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Organizer</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                                    {{ $event->user->username }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($event->start_date)->isoFormat('dddd, MMMM D, YYYY') }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Time</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($event->start_date)->isoFormat('h:mm A') }} -
                                    {{ \Carbon\Carbon::parse($event->end_date)->isoFormat('h:mm A') }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Location</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 dark:text-gray-300">
                                    {{ $event->location }}
                                    <p class="mt-1 text-gray-500 dark:text-gray-400">{{ $event->address }}</p>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="button"
                        class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        Register for Event
                    </button>
                    <p class="mt-2 text-center text-sm text-gray-500 dark:text-gray-400">
                        @if($event->max_attendees)
                            {{ $event->max_attendees }} spots available
                        @else
                            Unlimited spots available
                        @endif
                    </p>
                </div>

                @auth
                    @if(auth()->user()->id === $event->user->id)
                        <div class="mt-6 border-t border-gray-200 pt-6 dark:border-gray-700">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800">
                                    Edit
                                </a>
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800">
                                    Delete
                                </button>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </x-core.container>
</x-layouts.custom>
