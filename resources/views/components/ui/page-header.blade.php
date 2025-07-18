@props([
    'title' => '',
    'subtitle' => '',
    'actionText' => '',
    'actionUrl' => '',
    'actionIcon' => 'plus',
    'class' => ''
])

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 {{ $class }}">
    <div class="min-w-0 flex-1">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white truncate">
            {{ $title }}
        </h1>
        @if($subtitle)
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ $subtitle }}
            </p>
        @endif
    </div>
    
    @if($actionText && $actionUrl)
        <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-4">
            <a href="{{ $actionUrl }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    @if($actionIcon === 'plus')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    @elseif($actionIcon === 'edit')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    @elseif($actionIcon === 'calendar')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    @endif
                </svg>
                {{ $actionText }}
            </a>
        </div>
    @endif
    
    {{ $slot }}
</div>
