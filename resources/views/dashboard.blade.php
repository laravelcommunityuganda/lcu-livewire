<x-layouts.app :title="__('Dashboard')">
  <div class="flex h-full w-full flex-1 flex-col rounded-xl">
    <!-- Main content -->
    <div class="">
      <!-- Top navigation -->
      <header class="shadow-sm border-b border-gray-200">
        <div class="flex items-center justify-between px-4 py-3">
          <div class="flex items-center">
            <h1 class="text-xl font-semibold text-gray-200">Dashboard Overview</h1>
          </div>

          <div class="flex justify-between space-x-4">
            <!-- Search -->
            <div class="relative hidden sm:block">
              <input type="text" placeholder="Search..."
                class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
              <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>

            <!-- Notifications -->
            <div class="relative" id="notification-wrapper">
              <!-- Bell Icon -->
              <button id="notification-btn" class="relative p-2 text-gray-300 hover: focus:outline-none">
                <i class="fas fa-bell"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1.5">3</span>
              </button>

              <!-- Dropdown -->
              <div id="notification-dropdown"
                class="hidden absolute right-0 mt-2 w-64  border border-gray-200 dark:bg-gray-900 rounded-lg shadow-lg z-50">
                <div class="p-4 border-b font-semibold text-gray-700">
                  Notifications
                </div>

                <ul class="max-h-60 overflow-y-auto divide-y divide-gray-100 text-sm text-gray-300">
                  <li class="px-4 py-2 hover:bg-gray-50 cursor-pointer">
                    📢 New event: Laravel Meetup!
                  </li>
                  <li class="px-4 py-2 hover:bg-gray-50 cursor-pointer">
                    📢 New user has registered
                  </li>
                  <li class="px-4 py-2 hover:bg-gray-50 cursor-pointer">
                    📢 Your report was approved.
                  </li>
                </ul>

                <div class="p-2 text-center border-t">
                  <a href="/notifications" class="text-blue-600 hover:underline text-sm">View all</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="p-6">
        @role(['super_admin', 'admin'])
        <!-- Stats cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
          <div class="p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-gray-300">Total Users</p>
                <p class="text-2xl font-bold ">12,345</p>
              </div>
              <div class="p-3 bg-blue-100 rounded-full">
                <i class="fas fa-users text-blue-600"></i>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-green-600 text-sm font-medium">+12% from last month</span>
            </div>
          </div>

          <div class="p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-gray-300">Active Events</p>
                <p class="text-2xl font-bold ">28</p>
              </div>
              <div class="p-3 bg-green-100 rounded-full">
                <i class="fas fa-calendar-alt text-green-600"></i>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-green-600 text-sm font-medium">+3 new this week</span>
            </div>
          </div>

          <div class="p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-gray-300">Discussions</p>
                <p class="text-2xl font-bold ">856</p>
              </div>
              <div class="p-3 bg-purple-100 rounded-full">
                <i class="fas fa-comments text-purple-600"></i>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-green-600 text-sm font-medium">+8% engagement</span>
            </div>
          </div>

          <div class="p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-gray-300">Feedback</p>
                <p class="text-2xl font-bold ">147</p>
              </div>
              <div class="p-3 bg-yellow-100 rounded-full">
                <i class="fas fa-comment-alt text-yellow-600"></i>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-red-600 text-sm font-medium">12 pending</span>
            </div>
          </div>

          <div class="p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-gray-300">Donations</p>
                <p class="text-2xl font-bold ">$23,456</p>
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
          <div class="lg:col-span-2  p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-lg font-semibold  mb-4">User Activity Overview</h3>
            <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
              <p class="text-gray-500">Chart placeholder - integrate with Chart.js or similar</p>
            </div>
          </div>

          <!-- Recent activity -->
          <div class="p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-lg font-semibold  mb-4">Recent Activity</h3>
            <div class="space-y-3">
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                  <i class="fas fa-user text-blue-600 text-xs"></i>
                </div>
                <div class="flex-1">
                  <p class="text-sm font-medium ">New user registered</p>
                  <p class="text-xs text-gray-500">2 minutes ago</p>
                </div>
              </div>

              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <i class="fas fa-calendar text-green-600 text-xs"></i>
                </div>
                <div class="flex-1">
                  <p class="text-sm font-medium ">Event published</p>
                  <p class="text-xs text-gray-500">15 minutes ago</p>
                </div>
              </div>

              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                  <i class="fas fa-comment text-purple-600 text-xs"></i>
                </div>
                <div class="flex-1">
                  <p class="text-sm font-medium ">New discussion started</p>
                  <p class="text-xs text-gray-500">1 hour ago</p>
                </div>
              </div>

              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                  <i class="fas fa-flag text-yellow-600 text-xs"></i>
                </div>
                <div class="flex-1">
                  <p class="text-sm font-medium ">Content reported</p>
                  <p class="text-xs text-gray-500">3 hours ago</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent data tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <!-- Recent users -->
          <div class="rounded-lg shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
              <h3 class="text-lg font-semibold ">Recent Users</h3>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Status</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <img class="h-8 w-8 rounded-full" src="/images/user.png" alt="">
                        <div class="ml-3">
                          <div class="text-sm font-medium ">Sarah Johnson</div>
                          <div class="text-sm text-gray-500">sarah@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Member</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <img class="h-8 w-8 rounded-full" src="/images/user.png" alt="">
                        <div class="ml-3">
                          <div class="text-sm font-medium ">Mike Chen</div>
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
                        <img class="h-8 w-8 rounded-full" src="/images/user.png" alt="">
                        <div class="ml-3">
                          <div class="text-sm font-medium ">Emma Davis</div>
                          <div class="text-sm text-gray-500">emma@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Member</span>
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
          <div class="rounded-lg shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
              <h3 class="text-lg font-semibold ">Upcoming Events</h3>
            </div>
            <div class="p-6">
              <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                      <i class="fas fa-calendar-alt text-indigo-600"></i>
                    </div>
                    <div>
                      <h4 class="text-sm font-medium ">Laravel Workshop</h4>
                      <p class="text-sm text-gray-500">July 25, 2025 • 10:00 AM</p>
                    </div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">45
                      registered</span>
                  </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                      <i class="fas fa-users text-green-600"></i>
                    </div>
                    <div>
                      <h4 class="text-sm font-medium ">Community Meetup</h4>
                      <p class="text-sm text-gray-500">August 2, 2025 • 6:00 PM</p>
                    </div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">23
                      registered</span>
                  </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                      <i class="fas fa-code text-purple-600"></i>
                    </div>
                    <div>
                      <h4 class="text-sm font-medium ">Coding Bootcamp</h4>
                      <p class="text-sm text-gray-500">August 10, 2025 • 9:00 AM</p>
                    </div>
                  </div>
                  <div class="flex items-center space-x-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">12
                      registered</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick actions -->
        <div class="mt-8  rounded-lg shadow-sm border border-gray-200">
          <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold ">Quick Actions</h3>
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
        @endrole
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
        }[type] || 'bg-blue-500';

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
      document.addEventListener('DOMContentLoaded', function () {
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

      // Notification dropdown toggle
      document.getElementById('notification-btn').addEventListener('click', function () {
        const dropdown = document.getElementById('notification-dropdown');
        dropdown.classList.toggle('hidden');
      });
    </script>
  </div>
</x-layouts.app>