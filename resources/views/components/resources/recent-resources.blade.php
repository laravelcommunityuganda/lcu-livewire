@props(['resources'])
<div>
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold ">Recent Resources</h2>
    <a href="{{ route('resources.index') }}"
      class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300 font-medium flex justify- items-center">
      View all resources <x-heroicon-o-arrow-right class="ml-4 size-4" />
    </a>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($resources as $resource)
    <x-resources.card :resource="$resource" />
  @endforeach
  </div>
</div>