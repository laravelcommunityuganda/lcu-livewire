<div class="relative inline-block text-left">
  <x-dropdown class="text-gray-700 dark:text-gray-200 dark:bg-gray-200 size-5">

    <x-slot name="trigger">
      <button class="flex items-center space-x-2 focus:outline-none">
        <x-avatar xs src="{{ auth()->user()->profile_photo_url }}" />
        {{-- <span class="hidden md:inline">{{ auth()->user()->name }}</span> --}}
        <x-icon name="chevron-down" class="h-4 w-4" />
      </button>
    </x-slot>

    <x-dropdown.header label="Settings">

      <x-dropdown.item icon="user" label="Dashboard" :link="route('dashboard')" />

      <x-dropdown.item icon="cog" label="My Profile" :link="route('settings.profile')" />

    </x-dropdown.header>

    <x-dropdown.item separator label="Help Center" :link="route('help')" />

    <x-dropdown.item label="Contact Us" :link="route('contact')" />

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <x-dropdown.item wire:click="logout"
        class="cursor-pointer text-gray-600 hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-200">
        <button type="submit">Log Out</button>
      </x-dropdown.item>
    </form>
  </x-dropdown>
</div>