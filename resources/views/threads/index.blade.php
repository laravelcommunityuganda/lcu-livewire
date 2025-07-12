<x-layouts.custom title="Threads" description="Browse threads in the Laravel Community Uganda">

  @section('header')
    <x-core.header>Threads</x-core.header>
  @endsection

  <x-core.container>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <div class="mb-6">
          <Link href={{ route('forums.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm">
          Browse Forums
          </Link>
        </div>

        <div class="space-y-4">
          @if ($threads->count() > 0)
        <div wire:key={{ $thread->id }}" class="border-b border-gray-200 pb-4">
        <div class="flex justify-between items-start">
          <div>
          <Link href={{  route('threads.show', ['thread' => $thread->id, 'forum' => $forum->id]) }}}"
            class="text-lg font-medium text-indigo-600 hover:text-indigo-800">
          {{ $thread->title }}
          </Link>
          <p class="text-sm text-gray-500 mt-1">
            Posted in{{ $thread->forum->title }} by{{ $thread->user->username }} on
            {{ $thread->created_at }}
          </p>
          </div>
          <span class="text-sm text-gray-500">
          {{ $thread->replies_count }} replies
          </span>
        </div>
        </div>

      @else
        <p class="text-gray-500">No threads found.</p>

      @endif
        </div>
        {{ $threads->links }}

      </div>
    </div>
  </x-core.container>
</x-layouts.custom>