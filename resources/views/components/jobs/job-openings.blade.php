@props(['jobs'])
<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-200">Job Openings</h2>
        <a href="{{ route('jobs.index') }}"
            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300 font-medium">
            View all jobs
        </a>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-200">
            @foreach($jobs as $job)
                <x-jobs.card :job="$job" />
            @endforeach
        </ul>
    </div>
</div>
