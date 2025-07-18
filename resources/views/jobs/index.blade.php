<x-layouts.custom>
    <x-slot:title>Jobs</x-slot:title>
    @section('header')
        <x-core.header>Jobs</x-core.header>
    @endsection
    <x-core.container>

        @auth
            <div class="flex justify-between items-center mb-8">
                <a
                    href="{{ route('admin.jobs.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    Post a Job
                </a>
            </div>
        @endauth

        <!-- Filters -->
        <div class="mb-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <form method="GET" action="{{ route('jobs.index') }}">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Search Jobs
                        </label>
                        <input
                            type="text"
                            name="search"
                            id="search"
                            placeholder="Search by title, company or description..."
                            class="block w-full text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:focus:border-blue-500 focus:ring-blue-200 dark:focus:ring-blue-700"
                            value="{{ request('search') }}"
                        >
                    </div>

                    <div>
                        <label for="employment_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Employment Type
                        </label>
                        <select
                            id="employment_type"
                            name="employment_type"
                            class="block w-full text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:focus:border-blue-500 focus:ring-blue-200 dark:focus:ring-blue-700"
                        >
                            @foreach([
                                'all' => 'All Types',
                                'full-time' => 'Full-time',
                                'part-time' => 'Part-time',
                                'contract' => 'Contract',
                                'internship' => 'Internship',
                                'freelance' => 'Freelance'
                            ] as $value => $label)
                                <option value="{{ $value }}" {{ request('employment_type', 'all') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Location
                        </label>
                        <select
                            id="location"
                            name="location"
                            class="block w-full text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 dark:focus:border-blue-500 focus:ring-blue-200 dark:focus:ring-blue-700"
                        >
                            <option value="all" {{ request('is_remote', 'all') === 'all' ? 'selected' : '' }}>All Locations</option>
                            <option value="yes" {{ request('is_remote') === 'yes' ? 'selected' : '' }}>Remote Only</option>
                            <option value="no" {{ request('is_remote') === 'no' ? 'selected' : '' }}>On-site Only</option>
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

        <!-- Jobs List -->
        @if($jobs->count() > 0)
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-md">
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($jobs as $job)
                        <li key="{{ $job->id }}">
                            <a href="{{ route('jobs.show', $job->id) }}" class="block hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                <div class="px-6 py-5 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <div class="flex items-start space-x-4 flex-1 min-w-0">
                                            @if($job->company_logo)
                                                <div class="flex-shrink-0">
                                                    <img class="h-12 w-12 rounded-lg object-cover" src="{{ asset('storage/'.$job->company_logo) }}" alt="{{ $job->company_name }}">
                                                </div>
                                            @else
                                                <div class="flex-shrink-0">
                                                    <div class="h-12 w-12 rounded-lg bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                                        <svg class="h-6 w-6 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-start justify-between">
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-lg font-semibold text-gray-900 dark:text-white truncate">
                                                            {{ $job->title }}
                                                        </p>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                            {{ $job->company_name }}
                                                        </p>
                                                    </div>
                                                    <div class="flex-shrink-0 ml-4">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                                            {{ ucwords(str_replace('-', ' ', $job->employment_type)) }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                                    <div class="flex items-center">
                                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span>{{ $job->location }}</span>
                                                        @if($job->is_remote)
                                                            <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                                                Remote
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="flex items-center">
                                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                        </svg>
                                                        <span>Closes {{ $job->expires_at->format('M d, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-8 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 002 2h2a2 2 0 002-2V8a2 2 0 00-2-2h-2zm-8 0V4" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No jobs found</h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    @if(request()->has('search') || request('employment_type') !== 'all' || request('is_remote') !== 'all')
                        Try adjusting your search or filter criteria to find more opportunities.
                    @else
                        There are currently no job openings available. Check back later for new opportunities!
                    @endif
                </p>
                @auth
                    <div class="mt-6">
                        <a
                            href="{{ route('admin.jobs.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        >
                            Post a Job Opening
                        </a>
                    </div>
                @endauth
            </div>
        @endif

        @if($jobs->count() > 0)
            <div class="mt-6">
                {{ $jobs->links() }}
            </div>
        @endif

    </x-core.container>
</x-layouts.custom>
