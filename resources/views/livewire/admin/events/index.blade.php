<div>
    <x-slot:title>Admin / Events </x-slot:title>
    <x-core.header>Admin / Events </x-core.header>

    @section('nav-bar')
        <x-core.admin.nav-bar />
    @endsection

    <x-core.container>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Events</h3>
                        <x-button primary wire:click="$emit('openModal', 'admin.events.create')">
                            Create Event
                        </x-button>
                    </div>

                    <div class="mb-4 flex justify-between items-center">
                        <div class="w-1/3">
                            <x-input wire:model.debounce.300ms="search" placeholder="Search events..." />
                        </div>
                        <div class="flex space-x-2">
                            <x-native-select wire:model="perPage">
                                <option value="10">10 per page</option>
                                <option value="25">25 per page</option>
                                <option value="50">50 per page</option>
                                <option value="100">100 per page</option>
                            </x-native-select>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <x-select label="Type" wire:model="filters.type" placeholder="All Types"
                            :options="[
                                ['value' => 'meetup', 'name' => 'Meetup'],
                                ['value' => 'workshop', 'name' => 'Workshop'],
                                ['value' => 'conference', 'name' => 'Conference'],
                                ['value' => 'hackathon', 'name' => 'Hackathon'],
                                ]"
                                 option-label="value" option-value="name"/>

                            <x-select label="Online" wire:model="filters.is_online" placeholder="All" :options="[
        ['value' => 1, 'name' => 'Online'],
        ['value' => 0, 'name' => 'In-person'],
    ]" option-label="name" option-value="value"/>

                            <x-select label="Published" wire:model="filters.is_published" placeholder="All" :options="[
        ['value' => 1, 'name' => 'Published'],
        ['value' => 0, 'name' => 'Draft'],
    ]"  option-label="name" option-value="value"/>

                            <div class="flex items-end">
                                <x-button flat label="Reset" wire:click="resetFilters" />
                            </div>
                        </div>
                    </div>

                    @if(count($selected) > 0)
                        <div class="mb-4 bg-red-50 dark:bg-gray-900 p-4 rounded">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="font-medium">{{ count($selected) }} events selected</span>
                                </div>
                                <div>
                                    <x-button negative wire:click="deleteSelected">
                                        Delete Selected
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <x-checkbox wire:model="selectPage" />
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center cursor-pointer" wire:click="sortBy('title')">
                                            Title
                                            @if($sortField === 'title')
                                                <x-icon :name="$sortDirection === 'asc' ? 'chevron-up' : 'chevron-down'"
                                                    class="w-4 h-4 ml-1" />
                                            @endif
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center cursor-pointer" wire:click="sortBy('start_date')">
                                            Date
                                            @if($sortField === 'start_date')
                                                <x-icon :name="$sortDirection === 'asc' ? 'chevron-up' : 'chevron-down'"
                                                    class="w-4 h-4 ml-1" />
                                            @endif
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                                @foreach($events as $event)
                                    <tr wire:key="event-{{ $event->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <x-checkbox wire:model="selected" value="{{ $event->id }}" />
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                @if($event->image)
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded"
                                                            src="{{ asset('storage/' . $event->image) }}" alt="">
                                                    </div>
                                                @endif
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ Str::limit($event->description, 50) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                        {{ $event->type === 'meetup' ? 'bg-blue-100 text-blue-800' : '' }}
                                                        {{ $event->type === 'workshop' ? 'bg-green-100 text-green-800' : '' }}
                                                        {{ $event->type === 'conference' ? 'bg-purple-100 text-purple-800' : '' }}
                                                        {{ $event->type === 'hackathon' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                                {{ ucfirst($event->type) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $event->start_date->format('M d, Y') }}<br>
                                            <span class="text-xs text-gray-400">{{ $event->start_date->format('h:i A') }} -
                                                {{ $event->end_date->format('h:i A') }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if($event->is_online)
                                                <span class="text-indigo-600">Online</span>
                                            @else
                                                {{ $event->location }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                        {{ $event->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $event->is_published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <x-button icon="pencil" primary
                                                    wire:click="$emit('openModal', 'admin.events.edit', {{ json_encode(['event' => $event->id]) }})" />
                                                <x-button icon="trash" negative
                                                    wire:click="deleteConfirmation({{ $event->id }})" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
    </x-core.container>
</div>
