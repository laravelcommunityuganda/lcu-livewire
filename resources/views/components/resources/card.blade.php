<div class="bg-white dark:bg-gray-900 overflow-hidden shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                @if($resource->type === 'document')
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                @elseif($resource->type === 'video')
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                @endif
            </div>
            <div class="ml-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-300">{{ $resource->title }}</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-200">
                    {{ $resource->download_count }} downloads
                </p>
            </div>
        </div>
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">{{ $resource->description }}</p>
        <div class="mt-4">
            <span
                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                {{ $resource->type }}
            </span>
        </div>
        <div class="mt-5">
            <a href="{{ route('resources.show', $resource->id) }}"
                class="inline-flex items-center text-indigo-600 dark:text-indigo-300 hover:text-indigo-900">
                View details
                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</div>
