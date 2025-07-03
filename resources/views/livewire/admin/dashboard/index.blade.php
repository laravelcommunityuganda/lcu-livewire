<div>
    <x-slot:title>Admin / Dashboard </x-slot:title>
    <x-core.header>Admin / Dashboard </x-core.header>

    @section('nav-bar')
        <x-core.admin.nav-bar />
    @endsection

    <x-core.container>
        {{-- @dd($stats['recent_users']) --}}
        <div class="flex space-x-2 mt-5 ml-8">
            <button wire:click="switchTab('overview')" @class([
                'px-4 py-2 text-sm font-medium rounded-md',
                'bg-blue-100 text-blue-700' => $activeTab === 'overview',
                'text-gray-600 hover:bg-gray-100' => $activeTab !== 'overview'
            ])>
                Overview
            </button>
            <button wire:click="switchTab('analytics')" @class([
                'px-4 py-2 text-sm font-medium rounded-md',
                'bg-blue-100 text-blue-700' => $activeTab === 'analytics',
                'text-gray-600 hover:bg-gray-100' => $activeTab !== 'analytics'
            ])>
                Analytics
            </button>
        </div>

        <div class="py-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                @if($activeTab === 'overview')
                    @include('livewire.admin.dashboard-overview', ['stats' => $stats])
                @else
                    @include('livewire.admin.dashboard-analytics', ['stats' => $stats])
                @endif
            </div>
        </div>
    </x-core.container>
</div>