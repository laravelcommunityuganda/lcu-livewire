<div class="overflow-hidden shadow rounded-lg">
  <div class="px-4 py-5 sm:p-6">
    <div class="flex items-center">
      <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
        @if($resource->type === 'document')
      <x-heroicon-o-document class="h-6 w-6" />
    @elseif($resource->type === 'video')
      <x-heroicon-o-video-camera class="h-6 w-6 " />
    @elseif($resource->type === 'code')
      <x-heroicon-o-document-text class="h-6 w-6 " />
    @endif
      </div>
      <div class="ml-4">
        <h3 class="text-lg leading-6 font-medium ">{{ $resource->title }}</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-200">
          {{ $resource->download_count }} downloads
        </p>
      </div>
    </div>
    <p class="mt-4 text-sm">{{ $resource->description }}</p>
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
        <x-heroicon-m-arrow-right class="ml-3 size-4" />
      </a>
    </div>
  </div>
</div>