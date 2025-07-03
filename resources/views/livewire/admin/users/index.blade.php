<div>
    <x-slot:title>Admin / Users Management </x-slot:title>
    <x-core.header>Admin / Users Management </x-core.header>
    @section('nav-bar')
        <x-core.admin.nav-bar />
    @endsection
    <x-core.container>
        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">User Management</h2>
                <a href="{{ route('admin.users.create') }}"
                    class="inline-flex items-center px-4 py-2 m-5 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add User
                </a>
            </div>

            <div class="py-6">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <!-- Search and Filters -->
                            <div class="mb-6">
                                <form wire:submit.prevent class="space-y-4 sm:space-y-0 sm:flex sm:space-x-4">
                                    <div class="flex-grow">
                                        <x-input wire:model.debounce.500ms="search"
                                            placeholder="Search by name or email..." class="block w-full" />
                                    </div>

                                    <div>
                                        <x-label for="role" value="Role" class="sr-only" />
                                        <select wire:model="role" id="role"
                                            class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            <option value="">All Roles</option>
                                            <option value="admin">Admin</option>
                                            <option value="organizer">Organizer</option>
                                            <option value="member">Member</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>

                                    <div>
                                        <x-label for="status" value="Status" class="sr-only" />
                                        <select wire:model="status" id="status"
                                            class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            <option value="">All Statuses</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="banned">Banned</option>
                                        </select>
                                    </div>

                                    <div class="flex space-x-2">
                                        <x-button primary type="button" wire:click="$refresh">
                                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                            </svg>
                                            Filter
                                        </x-button>
                                        <x-button type="button" secondary wire:click="resetFilters">
                                            Reset
                                        </x-button>
                                    </div>
                                </form>
                            </div>

                            <!-- Users Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                                <div class="flex gap-x-4">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    Names
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                                <div class="flex gap-x-4">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                    </svg>
                                                    Email
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                                Role
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                                Status
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                                Joined
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        @forelse ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 w-10 h-10">
                                                            <img class="w-10 h-10 rounded-full"
                                                                src="{{ $user->avatar_url ?? asset('images/default-avatar.png') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div
                                                                class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                                                {{ $user->name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500 dark:text-gray-400">@
                                                                {{ $user->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 dark:text-gray-200">{{ $user->email }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-badge :color="$user->role === 'admin' ? 'primary' : 'secondary'">
                                                        {{ ucfirst($user->role) }}
                                                    </x-badge>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-badge :color="$user->is_banned ? 'danger' : ($user->is_active ? 'success' : 'warning')">
                                                        {{ $user->is_banned ? 'Banned' : ($user->is_active ? 'Active' : 'Inactive') }}
                                                    </x-badge>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                                    {{ $user->created_at->format('M d, Y') }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                        <button wire:click="deleteUser({{ $user->id }})"
                                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"
                                                    class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                                    No users found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination -->
                            <div class="mt-4">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-core.container>
</div>
