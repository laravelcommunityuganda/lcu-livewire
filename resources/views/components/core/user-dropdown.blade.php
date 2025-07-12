<div class="relative inline-block text-left">
  <x-dropdown>

    <x-dropdown.header label="Settings">

      <x-dropdown.item label="Preferences" />

      <x-dropdown.item label="My Profile" />

    </x-dropdown.header>



    <x-dropdown.item separator label="Help Center" />

    <x-dropdown.item label="Live Chat" />

    <x-dropdown.item label="Logout" />

  </x-dropdown>
</div>
{{-- <div x-data="{ open: false }" class="relative inline-block text-left">

  <div>
    <button @click="open = !open"
      class="inline-flex w-full justify-center gap-x-1.5 rounded-md dark:bg-gray-900 dark:text-gray-200 bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50">
      <x-core.icon.user-circle class="size-6 dark:text-gray-200" />
      <x-core.icon.chevron-down aria-hidden="true" class="-mr-1 size-5 dark:text-gray-200 text-gray-700" />
    </button>
  </div>

  <div x-show="open" x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-95" @click.away="open = false"
    class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md dark:bg-gray-900 dark:text-gray-200 bg-white shadow-lg ring-1 ring-black/5 focus:outline-none">
    <div class="py-1">

      <a href="{{ route('dashboard') }}"
        class="block px-4 py-2 text-sm dark:text-gray-200 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none">
        <div class="flex flex-row items-center">
          <x-core.icon.adjustments-horizontal class="inline-block mr-4 size-5 text-gray-500" />
          <div class="flex flex-col">
            <span class="hidden sm:inline text-xs">{{ auth()->user()->username }}</span>
            Settings
            <span class="sr-only">Open user menu</span>
          </div>
        </div>
      </a>

      <a href="#"
        class="block px-4 py-2 text-sm dark:text-gray-200 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none">
        <x-core.icon.question-mark-circle class="inline-block mr-4 size-5 text-gray-500" />
        Support
      </a>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          class="block w-full px-4 py-2 text-left text-sm dark:text-gray-200 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none">
          <x-core.icon.arrow-left-end-on-rectangle class="inline-block mr-4 size-5 text-gray-500" />
          Sign out
        </button>
      </form>
    </div>
  </div>
</div> --}}