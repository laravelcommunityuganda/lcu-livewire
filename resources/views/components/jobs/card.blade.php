@props(['job', 'showDescription' => true, 'variant' => 'default'])

@php
  $employmentTypeVariants = [
    'full-time' => 'success',
    'part-time' => 'info',
    'contract' => 'warning',
    'internship' => 'primary',
    'freelance' => 'default',
  ];

  $employmentTypeBadge = $employmentTypeVariants[$job->employment_type] ?? 'default';
@endphp

<div class="rounded-lg border my-4 shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
  <a href="{{ route('jobs.show', $job->id) }}" class="block">
    <div class="p-6">
      <!-- Header -->
      <div class="flex items-start justify-between">
        <div class="flex items-start space-x-4 flex-1 min-w-0">
          <!-- Company Logo -->
          @if($job->company_logo)
        <div class="flex-shrink-0">
        <img class="h-12 w-12 rounded-lg object-cover" src="{{ asset('storage/' . $job->company_logo) }}"
          alt="{{ $job->company_name }}">
        </div>
      @else
        <div class="flex-shrink-0">
        <div class="h-12 w-12 rounded-lg  flex items-center justify-center">
          <svg class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
        </div>
        </div>
      @endif

          <!-- Job Info -->
          <div class="flex-1 min-w-0">
            <h3 class="text-lg font-semibold truncate">
              {{ $job->title }}
            </h3>
            <p class="text-sm mt-1">
              {{ $job->company_name }}
            </p>

            @if($showDescription && $job->description)
        <p class="text-sm mt-2 line-clamp-2">
          {{ Str::limit($job->description, 120) }}
        </p>
      @endif
          </div>
        </div>

        <!-- Employment Type Badge -->
        <div class="flex-shrink-0 ml-4">
          <x-ui.badge variant="{{ $employmentTypeBadge }}">
            {{ ucwords(str_replace('-', ' ', $job->employment_type)) }}
          </x-ui.badge>
        </div>
      </div>

      <!-- Job Details -->
      <div class="mt-4 flex flex-wrap items-center gap-4 text-sm">
        <!-- Location -->
        <div class="flex items-center">
          <svg class="flex-shrink-0 mr-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd" />
          </svg>
          <span>{{ $job->location }}</span>
          @if($job->is_remote)
        <x-ui.badge variant="info" class="ml-2">
        Remote
        </x-ui.badge>
      @endif
        </div>

        <!-- Expiry Date -->
        @if($job->expires_at)
      <div class="flex items-center">
        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
          clip-rule="evenodd" />
        </svg>
        <span>Closes {{ $job->expires_at->format('M d, Y') }}</span>
      </div>
    @endif

        <!-- Salary Range (if available) -->
        @if(isset($job->salary_min) && isset($job->salary_max))
      <div class="flex items-center">
        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20" fill="currentColor">
        <path
          d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
        <path fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
          clip-rule="evenodd" />
        </svg>
        <span>${{ number_format($job->salary_min) }} - ${{ number_format($job->salary_max) }}</span>
      </div>
    @endif
      </div>

      <!-- Footer -->
      <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <div class="text-sm text-gray-500 dark:text-gray-400">
          Posted {{ $job->created_at->diffForHumans() }}
        </div>
        <div class="text-sm text-indigo-600 dark:text-indigo-400 font-medium group-hover:text-indigo-500">
          View Details →
        </div>
      </div>
    </div>
  </a>
</div>