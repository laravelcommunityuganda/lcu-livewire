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
                    Upload Resource
                </a>
            </div>
        @endauth

        <!-- Search and Filter Section -->
        <div class="mb-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
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
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Apply Filters
                    </button>
                </div>
            </form>
        </div>

        <!-- Resources List -->
        @if($resources->count() > 0)
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($resources as $resource)
                        <li key="{{ $resource->id }}">
                            <a href="{{ route('resources.show', $resource->id) }}" class="block hover:bg-gray-50 dark:hover:bg-gray-700">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                @if($resource->type === 'document')
                                                    <div class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </div>
                                                @elseif($resource->type === 'video')
                                                    <div class="h-10 w-10 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                @elseif($resource->type === 'code')
                                                    <div class="h-10 w-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                                        </svg>
                                                    </div>
                                                @elseif($resource->type === 'presentation')
                                                    <div class="h-10 w-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400 truncate">
                                                    {{ $resource->title }}
                                                </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    Uploaded by {{ $resource->user->username }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $resource->access_level === 'free' ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200' }}">
                                                {{ $resource->access_level === 'free' ? 'Free' : 'Premium' }}
                                            </span>
                                            <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                                                {{ $resource->download_count }} downloads
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                                Uploaded on {{ $resource->created_at->format('M d, Y') }}
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                                            <span class="capitalize">{{ $resource->type }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No resources found</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    @if(request()->has('search') || request('type') !== 'all' || request('access_level') !== 'all')
                        Try adjusting your search or filter criteria
                    @else
                        There are currently no resources available. Check back later!
                    @endif
                </p>
                <div class="mt-6">
                    <a
                        href="{{ route('resources.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    >
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Upload New Resource
                    </a>
                </div>
            </div>
        @endif
        <div class="mt-4">
            {{ $resources->links() }}
        </div>
    </x-core.container>
</x-layouts.custom>
