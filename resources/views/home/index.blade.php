<x-layouts.custom>

    <x-slot:title>Home</x-slot:title>

    <x-core.hero-section />

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-12">
                {{-- @dd($events) --}}
                <x-events.upcoming-events :events="$events" />
                <x-resources.recent-resources :resources="$resources" />
                <x-jobs.job-openings :jobs="$jobs" />
                <x-sponsors.cards :sponsors="$sponsors" />
            </div>
        </div>
    </div>

</x-layouts.custom>
