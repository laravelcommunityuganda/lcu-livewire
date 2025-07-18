<x-layouts.custom title="Resources" description="Browse and manage resources in the Laravel Community Uganda">
    <x-slot:title>Resources</x-slot:title>
      @section('header')
          <x-core.header>Resources</x-core.header>
      @endsection

      <x-core.container>
          @auth
              <div class="flex justify-between items-center mb-8">
                  <a
                      href="{{ route('admin.resources.create') }}"
                      class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                  >
                      <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                      </svg>
                      Upload Resource
                  </a>
              </div>
          @endauth

          <!-- Search and Filter Section -->
          <div class="mb-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
              <form method="GET" action="{{ route('resources.index') }}">
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                      <div>
                          <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                              Search Resources
                          </label>
                          <input
                              type="text"
                              name="search"
                              id="search"
                              placeholder="Search by title or description..."
                              class="block w-full text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:focus:border-blue-500 focus:ring-blue-200 dark:focus:ring-blue-700"
                              value="{{ request('search') }}"
                          >
                      </div>

                      <div>
                          <label for="resourceType" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                              Resource Type
                          </label>
                          <select
                              id="resourceType"
                              name="type"
                              class="block w-full text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:focus:border-blue-500 focus:ring-blue-200 dark:focus:ring-blue-700"
                          >
                              @foreach([
                                  'all' => 'All Types',
                                  'document' => 'Documents',
                                  'video' => 'Videos',
                                  'code' => 'Code Samples',
                                  'presentation' => 'Presentations'
                              ] as $value => $label)
                                  <option value="{{ $value }}" {{ request('type', 'all') === $value ? 'selected' : '' }}>
                                      {{ $label }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      <div>
                          <label for="accessLevel" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                              Access Level
                          </label>
                          <select
                              id="accessLevel"
                              name="access_level"
                              class="block w-full text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:focus:border-blue-500 focus:ring-blue-200 dark:focus:ring-blue-700"
                          >
                              @foreach([
                                  'all' => 'All Access',
                                  'free' => 'Free Only',
                                  'premium' => 'Premium Only'
                              ] as $value => $label)
                                  <option value="{{ $value }}" {{ request('access_level', 'all') === $value ? 'selected' : '' }}>
                                      {{ $label }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="mt-4 flex justify-end">
                      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                          Apply Filters
                      </button>
                  </div>
              </form>
          </div>

          <!-- Resources Grid -->
          @if($resources->count() > 0)
              <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                  @foreach($resources as $resource)
                      <div key="{{ $resource->id }}" class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md hover:border-gray-300 dark:hover:border-gray-600 transition-all duration-200">
                          <a href="{{ route('resources.show', $resource->id) }}" class="block">
                              <!-- Resource Icon Header -->
                              <div class="p-6 pb-4">
                                  <div class="flex items-start justify-between">
                                      <div class="flex items-center space-x-3 overflow-hidden">
                                          @if($resource->type === 'document')
                                              <div class="h-12 w-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center">
                                                  <svg class="h-7 w-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                  </svg>
                                              </div>
                                          @elseif($resource->type === 'video')
                                              <div class="h-12 w-12 rounded-lg bg-red-50 dark:bg-red-900/20 flex items-center justify-center">
                                                  <svg class="h-7 w-7 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                              </div>
                                          @elseif($resource->type === 'code')
                                              <div class="h-12 w-12 rounded-lg bg-green-50 dark:bg-green-900/20 flex items-center justify-center">
                                                  <svg class="h-7 w-7 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                                  </svg>
                                              </div>
                                          @elseif($resource->type === 'presentation')
                                              <div class="h-12 w-12 rounded-lg bg-purple-50 dark:bg-purple-900/20 flex items-center justify-center">
                                                  <svg class="h-7 w-7 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h3a1 1 0 110 2h-1v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6H4a1 1 0 110-2h3z" />
                                                  </svg>
                                              </div>
                                          @endif

                                          <div class="flex-1 min-w-0 ">
                                              <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                                  {{ $resource->title }}
                                              </h3>
                                              <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                  {{ ucfirst($resource->type) }}
                                              </p>
                                          </div>
                                      </div>

                                      <!-- Access Level Badge -->
                                      <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $resource->access_level === 'free' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400' }}">
                                          {{ $resource->access_level === 'free' ? 'Free' : 'Premium' }}
                                      </span>
                                  </div>
                              </div>

                              <!-- Resource Description -->
                              @if(isset($resource->description))
                                  <div class="px-6 pb-4">
                                      <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2">
                                          {{ Str::limit($resource->description, 80) }}
                                      </p>
                                  </div>
                              @endif

                              <!-- Resource Footer -->
                              <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 rounded-b-xl border-t border-gray-100 dark:border-gray-700">
                                  <!-- Uploader Info -->
                                  <div class="flex items-center justify-between mb-3">
                                      <div class="flex items-center space-x-2">
                                          <div class="h-6 w-6 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center">
                                              <span class="text-xs font-medium text-indigo-600 dark:text-indigo-400">
                                                  {{ strtoupper(substr($resource->user->username, 0, 1)) }}
                                              </span>
                                          </div>
                                          <span class="text-xs text-gray-500 dark:text-gray-400">
                                              {{ $resource->user->username }}
                                          </span>
                                      </div>
                                      <span class="text-xs text-gray-500 dark:text-gray-400">
                                          {{ $resource->created_at->format('M d, Y') }}
                                      </span>
                                  </div>

                                  <!-- Stats -->
                                  <div class="flex items-center justify-between">
                                      <div class="flex items-center space-x-1">
                                          <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                          </svg>
                                          <span class="text-xs text-gray-500 dark:text-gray-400">
                                              {{ $resource->download_count }} downloads
                                          </span>
                                      </div>

                                      <div class="text-xs text-indigo-600 dark:text-indigo-400 font-medium group-hover:text-indigo-500 transition-colors">
                                          View Details →
                                      </div>
                                  </div>
                              </div>
                          </a>
                      </div>
                  @endforeach
              </div>
          @else
              <div class="text-center py-16">
                  <div class="max-w-md mx-auto">
                      <div class="h-16 w-16 mx-auto bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                          <svg class="h-8 w-8 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                          </svg>
                      </div>
                      <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No resources found</h3>
                      <p class="text-gray-500 dark:text-gray-400 mb-6">
                          @if(request()->has('search') || request('type') !== 'all' || request('access_level') !== 'all')
                              Try adjusting your search or filter criteria to find what you're looking for.
                          @else
                              There are currently no resources available. Be the first to contribute!
                          @endif
                      </p>
                      @auth
                          <a
                              href="{{ route('admin.resources.create') }}"
                              class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition-colors"
                          >
                              <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                              </svg>
                              Upload New Resource
                          </a>
                      @endauth
                  </div>
              </div>
          @endif

          <!-- Pagination -->
          @if($resources->hasPages())
              <div class="mt-8">
                  {{ $resources->links() }}
              </div>
          @endif
      </x-core.container>
  </x-layouts.custom>
