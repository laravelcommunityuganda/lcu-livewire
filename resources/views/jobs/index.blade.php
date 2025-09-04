<x-layouts.custom>
  <x-slot:title>Jobs</x-slot:title>
  @section('header')
    <x-core.header>Jobs</x-core.header>
  @endsection
  <x-core.container>

    @auth
    <x-ui.page-header title="Job Opportunities"
      subtitle="Discover Laravel and PHP job opportunities in Uganda and worldwide" actionText="Post a Job"
      actionUrl="{{ route('admin.jobs.create') }}" actionIcon="plus" />
  @else
    <x-ui.page-header title="Job Opportunities"
      subtitle="Discover Laravel and PHP job opportunities in Uganda and worldwide" />
  @endauth

    <!-- Filters -->
    <x-ui.filter-panel title="Job Filters" action="{{ route('jobs.index') }}">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <x-ui.search-input name="search" id="search" label="Search Text"
            placeholder="Search by title, company or description..." value="{{ request('search') }}" />
        </div>

        <div>
          <x-ui.filter-select name="employment_type" id="employment_type" label="Employment Type" :options="[
    'all' => 'All Types',
    'full-time' => 'Full-time',
    'part-time' => 'Part-time',
    'contract' => 'Contract',
    'internship' => 'Internship',
    'freelance' => 'Freelance'
  ]" selected="{{ request('employment_type', 'all') }}" />
        </div>

        <div>
          <x-ui.filter-select name="is_remote" id="location" label="Location" :options="[
    'all' => 'All Locations',
    'yes' => 'Remote Only',
    'no' => 'On-site Only'
  ]" selected="{{ request('is_remote', 'all') }}" />
        </div>
      </div>
    </x-ui.filter-panel>

    <!-- Jobs List -->
    @if($jobs->count() > 0)
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      @foreach($jobs as $job)
      <x-jobs.card :job="$job" />
    @endforeach
    </div>
  @else
    <x-ui.empty-state title="No jobs found" :message="request()->has('search') || request('employment_type') !== 'all' || request('is_remote') !== 'all'
      ? 'Try adjusting your search or filter criteria to find more opportunities.'
      : 'There are currently no job openings available. Check back later for new opportunities!'" icon="briefcase"
      class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
      @auth
      <div class="mt-6">
      <a href="{{ route('admin.jobs.create') }}"
      class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
      Post a Job Opening
      </a>
      </div>
    @endauth
    </x-ui.empty-state>
  @endif

    @if($jobs->count() > 0)
    <div class="mt-6">
      {{ $jobs->links() }}
    </div>
  @endif

  </x-core.container>
</x-layouts.custom>