<div>
    <x-slot:title>Admin / {{ $isEdit ? 'Edit User' : 'Create User' }} </x-slot:title>
    <x-core.header>Admin / {{ $isEdit ? 'Edit User' : 'Create User' }} </x-core.header>
    @section('nav-bar')
        <x-core.admin.nav-bar />
    @endsection
    <x-core.container>

        <div class="flex items-center justify-between mr-8 mt-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $isEdit ? 'Edit User' : 'Create User' }}
            </h2>
            <a href="{{ route('admin.users.index') }}" wire:navigate
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Users
            </a>
        </div>

        <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="space-y-8 divide-y divide-gray-200 dark:divide-gray-700 sm:space-y-5">
                        <div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <x-label for="name" value="name" class="sm:mt-0.5" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <x-input wire:model="name" id="name" type="text" class="block w-full"
                                            required />
                                        <x-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <x-label for="email" value="Email" class="sm:mt-0.5" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <x-input wire:model="email" id="email" type="email" class="block w-full"
                                            required />
                                        <x-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                @if(!$isEdit)
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <x-label for="password" value="Password" class="sm:mt-0.5" />
                                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                                            <x-input wire:model="password" id="password" type="password"
                                                class="block w-full" required />
                                            <x-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <x-label for="password_confirmation" value="Confirm Password" class="sm:mt-0.5" />
                                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                                            <x-input wire:model="password_confirmation" id="password_confirmation"
                                                type="password" class="block w-full" required />
                                            <x-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                            <div>
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">
                                    Settings</h3>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <x-label for="role" value="Role" class="sm:mt-0.5" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <select wire:model="role" id="role"
                                            class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            <option value="admin">Admin</option>
                                            <option value="organizer">Organizer</option>
                                            <option value="member">Member</option>
                                            <option value="user">User</option>
                                        </select>
                                        <x-error :messages="$errors->get('role')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <div class="space-y-4 sm:col-span-2">
                                        <label class="flex items-center">
                                            <x-checkbox wire:model="is_active" />
                                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Active
                                                User</span>
                                        </label>
                                        <x-error :messages="$errors->get('is_active')" class="mt-2" />

                                        <label class="flex items-center">
                                            <x-checkbox wire:model="is_banned" />
                                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Banned
                                                User</span>
                                        </label>
                                        <x-error :messages="$errors->get('is_banned')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <x-button type="button" secondary
                                onclick="window.location.href='{{ route('admin.users.index') }}'" class="mr-3">
                                Cancel
                            </x-button>
                            <x-button type="submit" primary>
                                {{ $isEdit ? 'Update User' : 'Create User' }}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </x-core.container>
</div>
