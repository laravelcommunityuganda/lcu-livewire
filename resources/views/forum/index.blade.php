@props(['events'])
<x-layouts.custom title="Forums" description="Browse forums in the Laravel Community Uganda">

    @section('header')
        <x-core.header>Forums</x-core.header>
    @endsection

    <x-core.container>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <div class="space-y-6">
                    @foreach($forums as $forum)
                        <div key="{{ $forum->id }}"
                            class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-0">
                            <div class="flex justify-between items-start">
                                <div>
                                    <a href="{{ route('forum.show', $forum->id) }}"
                                        class="text-xl font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                        {{ $forum->title }}
                                    </a>
                                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $forum->description }}</p>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <span>{{ $forum->threads_count }} threads</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $forum->replies_count }} replies</span>
                                    </div>
                                </div>
                                @if($forum->is_pinned)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                                        Pinned
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $forums->links() }}
    </x-core.container>
</x-layouts.custom>
