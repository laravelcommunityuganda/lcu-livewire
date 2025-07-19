<nav x-data="{ showingNavigationDropdown: false }"
  class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-600">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <div class="shrink-0 flex items-center">
          <a href="{{ url('/') }}">
            <x-core.application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
          </a>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex dark:text-gray-200">
          <x-core.nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
            Dashboard
          </x-core.nav-link>
          <x-core.nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
            Users
          </x-core.nav-link>
          <x-core.nav-link href="{{ route('admin.events.index') }}" :active="request()->routeIs('admin.events.index')">
            Events
          </x-core.nav-link>
          <x-core.nav-link href="{{ route('admin.resources.index') }}"
            :active="request()->routeIs('admin.resources.index')">
            Resources
          </x-core.nav-link>
          <x-core.nav-link href="{{ route('admin.jobs.index') }}" :active="request()->routeIs('admin.jobs.index')">
            Jobs
          </x-core.nav-link>
          <x-core.nav-link href="{{ route('admin.forums.index') }}" :active="request()->routeIs('admin.forums.index')">
            Forums
          </x-core.nav-link>
          {{-- <x-core.nav-link href="{{ route('admin.threads.index') }}"
            :active="request()->routeIs('admin.threads.index')">
            Threads
          </x-core.nav-link>
          <x-core.nav-link href="{{ route('admin.posts.index') }}" :active="request()->routeIs('admin.posts.index')">
            Posts
          </x-core.nav-link> --}}
          <x-core.nav-link href="{{ route('admin.donations.index') }}"
            :active="request()->routeIs('admin.donations.index')">
            Donations
          </x-core.nav-link>
        </div>
      </div>

      <div class="hidden sm:flex sm:items-center sm:ml-6">
        @auth
      <div class="ml-3 relative">
        <x-core.user-dropdown class="text-gray-200 dark:text-gray-800 dark:bg-gray-200" :user="auth()->user()" />
      </div>
    @else
      <a href="{{ route('login') }}" class="text-gray-200 hover:text-gray-600 transition duration-150 ease-in-out">
        Log in
      </a>

      <a href="{{ route('register') }}"
        class="ml-4 text-gray-200 hover:text-gray-600 transition duration-150 ease-in-out">
        Register
      </a>
    @endauth
      </div>

      <!-- Mobile menu button -->
      <div class="-mr-2 flex items-center sm:hidden">
        <button @click="showingNavigationDropdown = !showingNavigationDropdown"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'inline-flex': !showingNavigationDropdown, 'hidden': showingNavigationDropdown }"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'inline-flex': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div x-show="showingNavigationDropdown" x-transition class="sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-core.responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
        Home
      </x-core.responsive-nav-link>
      <x-core.responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
        About Us
      </x-core.responsive-nav-link>
      <x-core.responsive-nav-link href="{{ route('admin.events.index') }}"
        :active="request()->routeIs('admin.events.index')">
        Events
      </x-core.responsive-nav-link>
      <x-core.responsive-nav-link href="{{ route('admin.resources.index') }}"
        :active="request()->routeIs('admin.resources.index')">
        Resources
      </x-core.responsive-nav-link>
      <x-core.responsive-nav-link href="{{ route('admin.jobs.index') }}"
        :active="request()->routeIs('admin.jobs.index')">
        Jobs
      </x-core.responsive-nav-link>
      <x-core.responsive-nav-link href="{{ route('admin.forums.index') }}"
        :active="request()->routeIs('admin.forums.index')">
        Forum
      </x-core.responsive-nav-link>
    </div>

    <div class="pt-4 pb-1 border-t border-gray-200">
      @auth
      <div class="px-4">
      <div class="font-medium text-base text-gray-800">{{ auth()->user()->name }}</div>
      <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
      </div>
    @else
      <div class="space-y-1">
      <x-core.responsive-nav-link href="{{ route('login') }}">
        Login
      </x-core.responsive-nav-link>
      <x-core.responsive-nav-link href="{{ route('register') }}">
        Register
      </x-core.responsive-nav-link>
      </div>
    @endauth
    </div>
  </div>
</nav>
