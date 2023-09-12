<div>
    <div class="flex flex-wrap -mx-2">
        @foreach ($posts as $post)
            <div class="w-full sm:w-1/2 md:w-1/3 self-stretch p-2 mb-2">
                <div class="rounded shadow-md h-full">
                    <a href="{{ route('posts.detail', [$post->id]) }}">
                        @if ($post->image)
                            <img class="w-full m-0 rounded-t lazy" src="{{ url("/storage/{$post->image}") }}"
                                width="960" height="500" alt="This post image">
                        @endif
                    </a>
                    <div class="px-6 py-5">
                        <div class="font-semibold text-lg mb-2">
                            <a class="text-slate-900 hover:text-slate-700"
                                href="{{ route('posts.detail', [$post->id]) }}">{{ $post->title }}</a>
                        </div>
                        <p class="text-slate-700 mb-1" title="Published date">
                            {{ $post->created_at->format('d.m.Y') }}</p>
                        <p class="text-slate-800">
                            {{ Str::of($post->content)->limit(90) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}
</div>
