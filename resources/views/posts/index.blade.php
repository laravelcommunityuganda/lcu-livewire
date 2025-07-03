<x-layouts.custom>

    <x-slot:title>Posts</x-slot:title>

    @section('header')
        <x-core.header>Posts</x-core.header>
    @endsection

    <x-core.container>

        @auth
            <div class="flex justify-between items-center mb-8">
                <a href="{{ route('admin.posts.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Create Post
                </a>
            </div>
        @endauth

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <form method="GET" action="{{ route('posts.index') }}">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Search Posts
                    </label>
                    <input type="text" name="search" id="search" placeholder="Filter by title..."
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-900 dark:text-white"
                        value="{{ request('search') }}">
                </div>
            </form>
        </div>

        <section class="pt-6">
            <div class="grid gap-8 mt-6 grid-cols-1 lg:grid-cols-2">
                @if($posts->count() === 0)
                    <div class="text-center text-gray-500 mt-6 col-span-2">
                        No posts found.
                    </div>
                @else
                    @foreach($posts as $post)
                        <x-posts.card :$post />
                    @endforeach
                @endif
            </div>
        </section>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>

    </x-core.container>
</x-layouts.custom>
