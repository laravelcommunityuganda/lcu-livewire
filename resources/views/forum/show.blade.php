<x-layouts.custom>
    <x-slot:title> Forum - {{ $forum->title }} </x-slot:title>
    @section('header')
        <x-core.header> Forum - {{ $forum->title }} </x-core.header>
    @endsection
    <x-core.container>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <p class="text-gray-700 dark:text-gray-300 mb-6">{{ $forum->description }}</p>

                <div class="space-y-4">
                    @if($threads->count() > 0)
                        @foreach($threads as $thread)
                            <div key="{{ $thread->id }}" class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <a href="{{ route('threads.show', ['forum' => $forum->id, 'thread' => $thread->id]) }}"
                                            class="text-lg font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                            {{ $thread->title }}
                                        </a>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                            Posted by {{ $thread->user->username }}, {{ $thread->created_at }}
                                        </p>
                                    </div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $thread->replies_count }} replies
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No threads found in this forum.</p>
                    @endif
                </div>
                {{ $threads->links() }}
            </div>
        </div>
    </x-core.container>
</x-layouts.custom>
