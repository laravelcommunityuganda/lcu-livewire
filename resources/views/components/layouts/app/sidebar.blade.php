<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
  @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
  <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
      <x-app-logo />
    </a>

    <flux:navlist variant="outline">
      <flux:navlist.group :heading="__('Platform')" class="grid">
        <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
          wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
      </flux:navlist.group>
    </flux:navlist>

    <flux:navlist.group :heading="__('User Management')" class="grid">
      <flux:navlist.item icon="user-plus" :href="route('admin.users.create')"
        :current="request()->routeIs('admin.users.create')" wire:navigate>
        {{ __('Add User') }}
      </flux:navlist.item>
      <flux:navlist.item icon="user-plus" :href="route('admin.users.index')"
        :current="request()->routeIs('admin.users.index')" wire:navigate>
        {{ __('Manage Users') }}
      </flux:navlist.item>

      <flux:navlist.item icon="building-library" :href="route('dashboard')"
        :current="request()->routeIs('departments.*')" wire:navigate>
        {{ __('Roles & Permissions') }}
      </flux:navlist.item>
      <flux:navlist.item icon="clipboard-document" :href="route('dashboard')" :current="request()->routeIs('reports.*')"
        wire:navigate>
        {{ __('User Activity') }}
      </flux:navlist.item>
    </flux:navlist.group>
    <flux:navlist.group :heading="__('Event Management')" collapsible class="grid">
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Create Event') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('All Events') }}
      </flux:navlist.item>

      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Registration') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Event Notifications') }}
      </flux:navlist.item>
    </flux:navlist.group>
    <flux:navlist.group :heading="__('Content Management')" collapsible class="grid">
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Blog Posts') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Tutorials') }}
      </flux:navlist.item>

      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('News') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Resources') }}
      </flux:navlist.item>
    </flux:navlist.group>

    <flux:navlist.group :heading="__('Forum Management')" collapsible class="grid">
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Moderate Discussions') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Reports') }}
      </flux:navlist.item>

      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Create Topics') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Polls') }}
      </flux:navlist.item>
    </flux:navlist.group>
    <flux:navlist.group :heading="__('Feedback & Issues')" collapsible class="grid">
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Review Feedback') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Issue Tracking') }}
      </flux:navlist.item>

      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Responses') }}
      </flux:navlist.item>
    </flux:navlist.group>
    <flux:navlist.group :heading="__('Analytics & Reports')" collapsible class="grid">
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('User Analytics') }}
      </flux:navlist.item>

      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Event Analytics') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Content Engagement') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Export Reports') }}
      </flux:navlist.item>
    </flux:navlist.group>
    <flux:navlist.group :heading="__('Sponsorships & Donations')" collapsible class="grid">
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Sponsors') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Donations') }}
      </flux:navlist.item>

      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Approve Content') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Financial Reports') }}
      </flux:navlist.item>
    </flux:navlist.group>
    <flux:navlist.group :heading="__('Settings')" collapsible class="grid">
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Website Settings') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Branding') }}
      </flux:navlist.item>

      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Social Integrations') }}
      </flux:navlist.item>
      <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('students.approved')"
        wire:navigate>
        {{ __('Payement Gateways') }}
      </flux:navlist.item>
    </flux:navlist.group>


    <flux:spacer />
    <flux:navlist variant="outline">
      <flux:navlist.item icon="folder-git-2" href="#" target="_blank">
        {{ __('Notifications') }}
      </flux:navlist.item>
      {{-- <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
        target="_blank">
        {{ __('Repository') }}
      </flux:navlist.item> --}}
      <flux:navlist.item icon="folder-git-2" href="https://github.com/laravelcommunityuganda/lcu-livewire.git"
        target="_blank">
        {{ __('Repository') }}
      </flux:navlist.item>

      <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
        {{ __('Documentation') }}
      </flux:navlist.item>
    </flux:navlist>

    <!-- Desktop User Menu -->
    <flux:dropdown class="hidden lg:block" position="bottom" align="start">
      <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
        icon:trailing="chevrons-up-down" />

      <flux:menu class="w-[220px]">
        <flux:menu.radio.group>
          <div class="p-0 text-sm font-normal">
            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
              <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                <span
                  class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                  {{ auth()->user()->initials() }}
                </span>
              </span>

              <div class="grid flex-1 text-start text-sm leading-tight">
                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
              </div>
            </div>
          </div>
        </flux:menu.radio.group>

        <flux:menu.separator />

        <flux:menu.radio.group>
          <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
            {{ __('Settings') }}
          </flux:menu.item>
        </flux:menu.radio.group>

        <flux:menu.separator />

        <form method="POST" action="{{ route('logout') }}" class="w-full">
          @csrf
          <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
            {{ __('Log Out') }}
          </flux:menu.item>
        </form>
      </flux:menu>
    </flux:dropdown>
  </flux:sidebar>

  <!-- Mobile User Menu -->
  <flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-3" inset="left" />

    <flux:spacer />

    <flux:dropdown position="top" align="end">
      <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

      <flux:menu>
        <flux:menu.radio.group>
          <div class="p-0 text-sm font-normal">
            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
              <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                <span
                  class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                  {{ auth()->user()->initials() }}
                </span>
              </span>

              <div class="grid flex-1 text-start text-sm leading-tight">
                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
              </div>
            </div>
          </div>
        </flux:menu.radio.group>

        <flux:menu.separator />

        <flux:menu.radio.group>
          <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
            {{ __('Settings') }}
          </flux:menu.item>
        </flux:menu.radio.group>
        <flux:menu.separator />

        <form method="POST" action="{{ route('logout') }}" class="w-full">
          @csrf
          <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
            {{ __('Log Out') }}
          </flux:menu.item>
        </form>
      </flux:menu>
    </flux:dropdown>
  </flux:header>

  {{ $slot }}

  @fluxScripts
</body>

</html>