<x-layouts.custom>

  <x-slot:title>Event - {{ $event->title }}</x-slot:title>

  @section('header')
    <x-core.header>Event - {{ $event->title }}</x-core.header>
  @endsection

  <x-core.container>
    <div class="lg:grid lg:grid-cols-3 lg:gap-8">
      <div class="lg:col-span-2">
        <div class="mb-8">
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
            {{ $event->type }}
          </span>
          <h1 class="mt-2 text-3xl font-extrabold tracking-tight sm:text-4xl">
            {{ $event->title }}
          </h1>
          <div class="mt-4 flex items-center text-sm">
            <x-heroicon-o-calendar class="flex-shrink-0 mr-1.5 h-5 w-5" />
            {{ \Carbon\Carbon::parse($event->start_date)->isoFormat('dddd, MMMM D, h:mm A') }} to
            {{ \Carbon\Carbon::parse($event->end_date)->isoFormat('h:mm A') }}
          </div>
          <div class="mt-2 flex items-center text-sm">
            <x-heroicon-o-map-pin class="flex-shrink-0 mr-1.5 h-5 w-5" />
            {{ $event->location }}
            @if($event->is_online)
        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
          Online
        </span>
      @endif
          </div>
        </div>

        <div class="prose max-w-none dark:prose-invert">
          <p>{{ $event->description }}</p>
        </div>

        @if($event->is_online)
      <div class="mt-8 p-4 rounded-lg dark:bg-opacity-20">
        <h3 class="text-lg font-medium">Online Event</h3>
        <p class="mt-2 text-sm">
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
        <div class="shadow overflow-hidden sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium">
              Event Details
            </h3>
          </div>
          <div class="border-t px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200 dark:sm:divide-gray-700">
              <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium">Organizer</dt>
                <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                  {{ $event->user->username }}
                </dd>
              </div>
              <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium">Date</dt>
                <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                  {{ \Carbon\Carbon::parse($event->start_date)->isoFormat('dddd, MMMM D, YYYY') }}
                </dd>
              </div>
              <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium">Time</dt>
                <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                  {{ \Carbon\Carbon::parse($event->start_date)->isoFormat('h:mm A') }} -
                  {{ \Carbon\Carbon::parse($event->end_date)->isoFormat('h:mm A') }}
                </dd>
              </div>
              <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium">Location</dt>
                <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                  {{ $event->location }}
                  <p class="mt-1">{{ $event->address }}</p>
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
          <p class="mt-2 text-center text-sm">
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
          class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800">
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