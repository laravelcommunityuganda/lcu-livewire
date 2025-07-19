{{-- <x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app> --}}













<x-layouts.app :title="__('Dashboard')">
    <div class=" flex h-full w-full flex-1 flex-col rounded-xl">
        <!-- Main content -->
        <div class="">
            <!-- Top navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-4 py-3">
                    {{-- <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="lg:hidden mr-3">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-800">Dashboard Overview</h1>
                    </div> --}}

                    <div class="flex justify-between space-x-4">
                        <!-- Search -->
                        <div class="relative hidden sm:block">
                            <input type="text" placeholder="Search..."
                                class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>

                        <!-- Notifications -->
                        <div class="relative">
                            <button class="p-2 text-gray-600 hover:text-gray-900">
                                <i class="fas fa-bell"></i>
                                <span
                                    class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                            </button>
                        </div>

                        <!-- User menu -->
                        <div class="relatively" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100">
                                <img src="https://via.placeholder.com/32x32" alt="User"
                                    class="w-8 h-8 rounded-full">
                                <span class="hidden sm:block text-sm font-medium text-gray-700">John Doe</span>
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <hr class="my-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                    out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content area -->
            <main class="p-6">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Users</p>
                                <p class="text-2xl font-bold text-gray-900">12,345</p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-full">
                                <i class="fas fa-users text-blue-600"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-600 text-sm font-medium">+12% from last month</span>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Active Events</p>
                                <p class="text-2xl font-bold text-gray-900">28</p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <i class="fas fa-calendar-alt text-green-600"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-600 text-sm font-medium">+3 new this week</span>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Discussions</p>
                                <p class="text-2xl font-bold text-gray-900">856</p>
                            </div>
                            <div class="p-3 bg-purple-100 rounded-full">
                                <i class="fas fa-comments text-purple-600"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-600 text-sm font-medium">+8% engagement</span>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Feedback</p>
                                <p class="text-2xl font-bold text-gray-900">147</p>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-full">
                                <i class="fas fa-comment-alt text-yellow-600"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-red-600 text-sm font-medium">12 pending</span>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Donations</p>
                                <p class="text-2xl font-bold text-gray-900">$23,456</p>
                            </div>
                            <div class="p-3 bg-indigo-100 rounded-full">
                                <i class="fas fa-donate text-indigo-600"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-green-600 text-sm font-medium">+18% this month</span>
                        </div>
                    </div>
                </div>

                <!-- Charts and recent activity -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Chart placeholder -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">User Activity Overview</h3>
                        <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
                            <p class="text-gray-500">Chart placeholder - integrate with Chart.js or similar</p>
                        </div>
                    </div>

                    <!-- Recent activity -->
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-blue-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">New user registered</p>
                                    <p class="text-xs text-gray-500">2 minutes ago</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-calendar text-green-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Event published</p>
                                    <p class="text-xs text-gray-500">15 minutes ago</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-comment text-purple-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">New discussion started</p>
                                    <p class="text-xs text-gray-500">1 hour ago</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-flag text-yellow-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Content reported</p>
                                    <p class="text-xs text-gray-500">3 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent data tables -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent users -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Users</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Role</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="https://via.placeholder.com/32x32" alt="">
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                                    <div class="text-sm text-gray-500">sarah@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Member</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="https://via.placeholder.com/32x32" alt="">
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900">Mike Chen</div>
                                                    <div class="text-sm text-gray-500">mike@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">Moderator</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="https://via.placeholder.com/32x32" alt="">
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900">Emma Davis</div>
                                                    <div class="text-sm text-gray-500">emma@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Member</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recent events -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Upcoming Events</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-calendar-alt text-indigo-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Laravel Workshop</h4>
                                            <p class="text-sm text-gray-500">July 25, 2025 • 10:00 AM</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">45
                                            registered</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-users text-green-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Community Meetup</h4>
                                            <p class="text-sm text-gray-500">August 2, 2025 • 6:00 PM</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">23
                                            registered</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-code text-purple-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Coding Bootcamp</h4>
                                            <p class="text-sm text-gray-500">August 10, 2025 • 9:00 AM</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">12
                                            registered</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick actions -->
                <div class="mt-8 bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <button
                                class="flex items-center justify-center p-4 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition-colors">
                                <div class="text-center">
                                    <i class="fas fa-user-plus text-blue-600 text-xl mb-2"></i>
                                    <p class="text-sm font-medium text-blue-900">Add New User</p>
                                </div>
                            </button>

                            <button
                                class="flex items-center justify-center p-4 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition-colors">
                                <div class="text-center">
                                    <i class="fas fa-calendar-plus text-green-600 text-xl mb-2"></i>
                                    <p class="text-sm font-medium text-green-900">Create Event</p>
                                </div>
                            </button>

                            <button
                                class="flex items-center justify-center p-4 bg-purple-50 border border-purple-200 rounded-lg hover:bg-purple-100 transition-colors">
                                <div class="text-center">
                                    <i class="fas fa-edit text-purple-600 text-xl mb-2"></i>
                                    <p class="text-sm font-medium text-purple-900">New Blog Post</p>
                                </div>
                            </button>

                            <button
                                class="flex items-center justify-center p-4 bg-yellow-50 border border-yellow-200 rounded-lg hover:bg-yellow-100 transition-colors">
                                <div class="text-center">
                                    <i class="fas fa-bullhorn text-yellow-600 text-xl mb-2"></i>
                                    <p class="text-sm font-medium text-yellow-900">Send Announcement</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Toast notifications container -->
        <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2">
            <!-- Toast notifications will be dynamically added here -->
        </div>

        <script>
            // Toast notification function
            function showToast(message, type = 'info') {
                const toast = document.createElement('div');
                toast.className = `p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full`;

                const bgColor = {
                    'success': 'bg-green-500',
                    'error': 'bg-red-500',
                    'warning': 'bg-yellow-500',
                    'info': 'bg-blue-500'
                } [type] || 'bg-blue-500';

                toast.classList.add(bgColor);
                toast.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle text-white"></i>
                    <span class="text-white font-medium">${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="text-white hover:text-gray-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;

                document.getElementById('toast-container').appendChild(toast);

                // Animate in
                setTimeout(() => {
                    toast.classList.remove('translate-x-full');
                }, 100);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    setTimeout(() => {
                        toast.remove();
                    }, 300);
                }, 5000);
            }

            // Add click handlers for quick actions
            document.addEventListener('DOMContentLoaded', function() {
                const quickActions = document.querySelectorAll('button');
                quickActions.forEach(button => {
                    if (button.querySelector('i.fa-user-plus')) {
                        button.addEventListener('click', () => showToast('Redirecting to Add User page...',
                            'info'));
                    }
                    if (button.querySelector('i.fa-calendar-plus')) {
                        button.addEventListener('click', () => showToast('Redirecting to Create Event page...',
                            'info'));
                    }
                    if (button.querySelector('i.fa-edit')) {
                        button.addEventListener('click', () => showToast('Redirecting to New Blog Post page...',
                            'info'));
                    }
                    if (button.querySelector('i.fa-bullhorn')) {
                        button.addEventListener('click', () => showToast(
                            'Redirecting to Send Announcement page...', 'info'));
                    }
                });
            });

            // Handle responsive sidebar for larger screens
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    Alpine.store('sidebar', {
                        open: false
                    });
                }
            });
        </script>
    </div>
</x-layouts.app>
