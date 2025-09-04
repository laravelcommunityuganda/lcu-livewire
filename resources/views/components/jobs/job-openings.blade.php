@props(['jobs'])
<div>
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Job Openings</h2>
    <a href="{{ route('jobs.index') }}"
      class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300 font-medium flex justify-between items-center">
      View all jobs <x-heroicon-o-arrow-right class="ml-4 size-4" />
    </a>
  </div>
  <div class="overflow-hidden sm:rounded-md">
    <ul class="">
      @foreach($jobs as $job)
      <x-jobs.card :job="$job" />
    @endforeach
    </ul>
  </div>
</div>