<x-layouts.custom title="Threads" description="Browse threads in the Laravel Community Uganda">

  @section('header')
    <x-core.header>Threads ~ {{ $thread->title }}}}</x-core.header>
  @endsection

  <x-core.container>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <div class="mb-8">
          <h1 class="text-2xl font-bold mb-4">{{ $thread->title }}</h1>
          <div class="flex items-center text-sm text-gray-500 mb-4">
            <span>Posted by{{ $thread->user->name }}}</span>
            <span class="mx-2">•</span>
            <span>{{ $thread->created_at }}</span>
            <span class="mx-2">•</span>
            <span>{{ $thread->views_count }} views</span>
          </div>
          <div class="prose max-w-none">
            {{ $thread->body }}
          </div>
        </div>

        <div class="border-t border-gray-200 pt-6">
          <h2 class="text-xl font-semibold mb-4">
            {{ $replies->total }}{{ $replies->total === 1 ? 'Reply' : 'Replies' }}}
          </h2>

          <div class="space-y-6">
            @foreach ($replies as $reply)
        <div wire:key="{{ $reply->id }}" class="border-b border-gray-200 pb-6 last:border-0">
          <div class="flex justify-between items-start mb-2">
          <div class="font-medium">{{ $reply->user->name }}</div>
          <div class="text-sm text-gray-500">
            {{ $reply->created_at }}
          </div>
          </div>
          <div class="prose max-w-none">
          {{ $reply->body }}}
          </div>
        </div>
      @endforeach
          </div>
          <Pagination class="mt-6" links={replies.links} />
        </div>

        @if (!$thread->is_locked)
      <div class="mt-8">
        <h3 class="text-lg font-medium mb-4">Post a Reply</h3>
        <form>
        <textarea
          class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
          rows={4} placeholder="Write your reply here..."></textarea>
        <div class="mt-4">
          <button type="submit"
          class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
          Post Reply
          </button>
        </div>
        </form>
      </div>
    @endif
      </div>
    </div>
  </x-core.container>
</x-layouts.custom>