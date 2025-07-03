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
                            <a href="{{ route('jobs.show', $job->id) }}" class="block hover:bg-gray-50 dark:hover:bg-gray-700">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            @if($job->company_logo)
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/'.$job->company_logo) }}" alt="{{ $job->company_name }}">
                                                </div>
                                            @endif
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400 truncate">
                                                    {{ $job->title }}
                                                </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $job->company_name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="ml-2 flex-shrink-0 flex">
                                            <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                                {{ str_replace('-', ' ', $job->employment_type) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                </svg>
                                                {{ $job->location }}
                                                @if($job->is_remote)
                                                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                                        Remote
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                            Closing on <time datetime="{{ $job->expires_at->format('Y-m-d') }}">{{ $job->expires_at->format('M d, Y') }}</time>
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
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No jobs found</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    @if(request()->has('search') || request('employment_type') !== 'all' || request('is_remote') !== 'all')
                        Try adjusting your search or filter criteria
                    @else
                        There are currently no job openings. Check back later!
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
        <div class="mt-4">
            {{ $jobs->links() }}
        </div>

    </x-core.container>
</x-layouts.custom>
