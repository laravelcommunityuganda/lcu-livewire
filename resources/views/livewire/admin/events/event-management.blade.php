<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="bg-white shadow-lg overflow-hidden">
                <!-- Card Header
                <div class="bg-gradient-to-r from-red-500 to-orange-500 px-6 py-4">
                    <h4 class="text-xl font-semibold text-white">Event Management</h4>
                </div> -->
                
                <!-- Card Body -->
                <div class="p-6">
                    <div class="w-full">
                        <div class="mb-0">
                            <div class="filter-section">
                                <div class="bg-white p-3 border border-b-gray-200">
                                    <div class="grid grid-cols-12 gap-6 ">
                                        <!-- Sex -->
                                        <div class="col-span-12 sm:col-span-3">
                                            <!-- <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label> -->
                                            <select wire:model="selected_gender"
                                                class="w-full  border-1 border-black bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all duration-200 hover:border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none appearance-none cursor-pointer">
                                                <option value="">Selec Online/Offline</option>
                                                <option value="M">Online</option>
                                                <option value="F">Offline</option>
                                            </select>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-span-12 sm:col-span-3">
                                            <!-- <label class="block text-sm font-medium text-gray-700 mb-2">Status</label> -->
                                            <select wire:model="selected_status"
                                                class="w-full border-1 border-black bg-white px-4 py-2 text-sm font-medium text-black transition-all duration-200 hover:border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none appearance-none cursor-pointer">
                                                <option value="">Select Status</option>
                                                <option value="present">Active</option>
                                                <option value="absent">Inactive</option>
                                            </select>
                                        </div>

                                        <div class="w-full col-span-6">
                                            <form wire:submit="">
                                                <div class="flex">
                                                    <!-- Input -->
                                                    <input 
                                                        type="text" 
                                                        wire:model="searchTerm" 
                                                        placeholder="Search by ........." 
                                                        class="flex-1 border border-black  px-4 py-2 text-sm "
                                                    >

                                                    <!-- Buttons -->
                                                    @if ($searchActive)
                                                        <button 
                                                            type="button" 
                                                            wire:click="resetSearch" 
                                                            class="bg-gray-500 text-white px-4 py-2 border border-gray-300 hover:bg-gray-600 focus:outline-none"
                                                        >
                                                            <em class="icon ni ni-cross"></em>
                                                        </button>
                                                    @endif

                                                    <button 
                                                        type="submit" 
                                                        class="bg-teal-700 text-white px-4 py-2 border border-gray-300 rounded-r-md hover:bg-teal-800 focus:outline-none flex items-center"
                                                    >
                                                        <em class="icon ni ni-filter mr-1"></em>
                                                        Apply
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table Container -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray">
                                <tr>
                                    <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th> -->
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider bg-gray-600">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider bg-gray-600">
                                        Location
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider bg-gray-600">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider bg-gray-600">
                                        Start Date
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider bg-gray-600">
                                        End Date
                                    </th>
                                    <th scope="col" class="px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider bg-gray-600">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($events as $event)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $event->title }}
                                        </td>
                                        <!-- <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                            {{ $event->location }}
                                        </td> -->
                                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Illuminate\Support\Str::limit($event->location, 10, '...') }}
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap">
                                            @if ($event->status === 'active')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium btn btn-green-100 text-green-800">
                                                    Active
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                            {{ optional($event->start_date)->format('F j, Y') ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                                            {{ optional($event->end_date)->format('F j, Y') ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium space-x-2">
                                            <a href="{{ route('admin.events.edit', $event->id) }}" 
                                               class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                                Edit
                                            </a>
                                            <button wire:click="confirmDelete({{ $event->id }})" 
                                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $events->links() }}
                        </div>
                    </div>

                    <!-- Mobile-friendly alternative for very small screens -->
                    <div class="block sm:hidden">
                        <div class="space-y-4 mt-4">
                            @foreach ($events as $event)
                                <div class="bg-gray-50 rounded-lg p-4 space-y-2">
                                    <div class="flex justify-between items-start">
                                        <h5 class="font-medium text-gray-900">{{ $event->name }}</h5>
                                        @if ($event->status === 'active')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green text-green-800">
                                                Active
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red text-gray-800">
                                                Inactive
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <div>📅 {{ optional($event->date)->format('F j, Y') ?? 'N/A' }}</div>
                                        <div>📍 {{ $event->location }}</div>
                                    </div>
                                    <div class="flex space-x-2 pt-2">
                                        <a href="{{ route('admin.events.edit', $event->id) }}" 
                                           class="flex-1 text-center text-xs font-medium text-white bg-red-500 hover:bg-red-600 rounded-md transition-colors duration-200">
                                            Edit
                                        </a>
                                        <button wire:click="confirmDelete({{ $event->id }})" 
                                                class="flex-1  text-xs font-medium text-white bg-gray-600 hover:bg-gray-700 rounded-md transition-colors duration-200">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        @this.on('confirmDelete', eventId => {
            if (confirm('Are you sure you want to delete this event?')) {
                @this.call('deleteEvent', eventId);
            }
        });
    });
</script>