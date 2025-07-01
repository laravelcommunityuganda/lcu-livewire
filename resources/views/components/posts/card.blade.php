@props(['post'])
<div
    class="flex p-4 transition-colors duration-300 border shadow border-transparent rounded-lg gap-x-6 bg-white text-gray-900 dark:text-gray-200 dark:bg-gray-800 hover:border-blue-700 group">
    @if($post->image)
        <div>
            <x-posts.image-card :image="$post->image" width="90" />
        </div>
    @endif

    <div class="flex flex-col flex-1">
        <a href="{{ route('posts.show', $post->id) }}"
            class="self-start text-sm text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-blue-700">
            {{ Str::limit($post->content, 100) }}
        </a>
        <h3 class="mt-3 text-lg font-bold">{{ $post->title }}</h3>
        <div class="mt-auto text-sm text-gray-700 dark:text-gray-200">
            {{ $post->created_at }}
        </div>
    </div>

    @if(count($post->tags) > 0)
        <div>
            <div class="space-y-1">
                @foreach($post->tags as $tag)
                    <x-tags.card :$tag size="small" />
                @endforeach
            </div>
        </div>
    @endif
</div>
