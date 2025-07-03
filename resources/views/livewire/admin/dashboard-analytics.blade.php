<div class="space-y-6">
    <x-card>
        <x-slot name="title">Detailed User Analytics</x-slot>
        <livewire:livewire-line-chart :data="$stats['monthly_users']" :categories="['count']" :colors="['blue']"
            height="h-96" />
    </x-card>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <x-card>
            <x-slot name="title">Content Distribution</x-slot>
            <livewire:livewire-column-chart :data="$stats['post_types']" :categories="['count']" :colors="['blue', 'cyan', 'indigo', 'violet']" height="h-80" />
        </x-card>

        <x-card>
            <x-slot name="title">Donation Analytics</x-slot>
            <livewire:livewire-area-chart :data="$stats['donation_stats']" :categories="['count']" :colors="['green', 'yellow', 'red']" height="h-80" />
        </x-card>
    </div>
</div>