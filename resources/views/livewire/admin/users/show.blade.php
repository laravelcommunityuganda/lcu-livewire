<div>
    <x-slot:title>Admin / User - {{ $user->name }} </x-slot:title>
    <x-core.header>Admin / User - {{ $user->name }} </x-core.header>

    @section('nav-bar')
        <x-core.admin.nav-bar />
    @endsection

    <x-core.container>

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">User Details</h2>
            <div class="flex space-x-2 mt-4 mr-8">
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Users
                </a>
                <a href="{{ route('admin.users.edit', $user->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h6" />
                    </svg>
                    Edit User
                </a>
            </div>
        </div>

        <div class="overflow-hidden bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex items-center space-x-4">
                        <img class="w-20 h-20 rounded-full" src="{{ $user->avatar ?? '/images/default-avatar.png' }}"
                            alt="" />
                        <div>
                            <h3 class="text-lg font-medium leading-6 dark:text-gray-200 text-gray-900">
                                {{ $user->name }}
                            </h3>
                            <p class="mt-1 text-sm dark:text-gray-200 text-gray-500">
                                @ {{ $user->name }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200">
                    <dl>
                        <div class="px-4 py-5 bg-gray-50 dark:bg-gray-900 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium dark:text-gray-200 text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm dark:text-gray-200 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->email }}
                            </dd>
                        </div>
                        <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium dark:text-gray-200 text-gray-500">Full Name</dt>
                            <dd class="mt-1 text-sm dark:text-gray-200 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->name }}
                            </dd>
                        </div>
                        <div class="px-4 py-5 bg-gray-50 dark:bg-gray-900 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium dark:text-gray-200 text-gray-500">Role</dt>
                            <dd class="mt-1 text-sm dark:text-gray-200 text-gray-900 sm:mt-0 sm:col-span-2">
                                <x-core.badge :variant="$user->role === 'admin' ? 'primary' : 'secondary'">
                                    {{ $user->role }}
                                </x-core.badge>
                            </dd>
                        </div>
                        <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium dark:text-gray-200 text-gray-500">Status</dt>
                            <dd class="mt-1 text-sm dark:text-gray-200 text-gray-900 sm:mt-0 sm:col-span-2">
                                <x-core.badge :variant="$user->is_banned ? 'danger' : ($user->is_active ? 'success' : 'warning')">
                                    {{ $user->is_banned ? 'Banned' : ($user->is_active ? 'Active' : 'Inactive') }}
                                </x-core.badge>
                            </dd>
                        </div>
                        <div class="px-4 py-5 bg-gray-50 dark:bg-gray-900 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium dark:text-gray-200 text-gray-500">Joined</dt>
                            <dd class="mt-1 text-sm dark:text-gray-200 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y') }}
                            </dd>
                        </div>
                        @if($user->last_login_at)
                            <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium dark:text-gray-200 text-gray-500">Last Login</dt>
                                <dd class="mt-1 text-sm dark:text-gray-200 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ \Carbon\Carbon::parse($user->last_login_at)->format('F j, Y h:i A') }}
                                </dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>
            <div class="p-6 bg-white dark:bg-gray-800 border-t border-gray-200">
                <div class="flex justify-end">
                    <a href="{{ route('admin.users.edit', $user->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Edit User
                    </a>
                </div>
            </div>
        </div>
    </x-core.container>
</div>
