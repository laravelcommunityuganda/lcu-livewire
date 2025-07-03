<div class="space-y-6">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <x-core.stat-card title="Total Users" :value="$stats['total_users']" icon="users"
            trend="{{ $stats['active_users'] > $stats['total_users'] / 2 ? 'up' : 'down' }}" link="/admin/users" />
        <x-core.stat-card title="Active Posts" :value="$stats['published_posts']" icon="document-text" trend="up"
            link="/admin/posts" />
        <x-core.stat-card title="Upcoming Events" :value="$stats['upcoming_events']" icon="calendar" trend="neutral"
            link="/admin/events" />
        <x-core.stat-card title="Total Donations" :value="'$' . number_format($stats['donation_amount'])"
            icon="currency-dollar" trend="up" link="/admin/donations" />
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <x-card class="transition-colors duration-500 dark:bg-gray-900 dark:hover:bg-gray-700 rounded">
            <x-slot name="title">User Growth</x-slot>
            {{-- <livewire:livewire-area-chart :data="$stats['monthly_users']" :categories="['count']"
                :colors="['blue']" --}} height="h-72" />
        </x-card>

        <x-card class="transition-colors duration-500 dark:bg-gray-900 dark:hover:bg-gray-700 rounded">
            <x-slot name="title">Post Types</x-slot>
            {{-- <livewire:livewire-pie-chart :data="$stats['post_types']" category="count" labels="type"
                :colors="['blue', 'cyan', 'indigo', 'violet']" height="h-72" /> --}}
        </x-card>

        <x-card class="transition-colors duration-500 dark:bg-gray-900 dark:hover:bg-gray-700 rounded">
            <x-slot name="title">Donation Status</x-slot>
            {{-- <livewire:livewire-column-chart :data="$stats['donation_stats']" :categories="['count']"
                :colors="['green', 'yellow', 'red']" height="h-72" /> --}}
        </x-card>
    </div>

    <!-- Recent Users -->
    <x-card>
        <div class="flex items-center justify-between">
            <x-slot name="title">Recent Users</x-slot>
            <a href="/admin/users" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                View All
            </a>
        </div>
        <div class="mt-6 overflow-hidden border border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                            Name
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                            Email
                        </th>
                        <th
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                            Joined
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 dark:text-gray-200 divide-y divide-gray-200">
                    @foreach($stats['recent_users'] as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $user['name'] }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500 dark:text-gray-300">{{ $user['email'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($user['created_at'])->format('m/d/Y') }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>
</div>