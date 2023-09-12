<article class="max-w-5xl mx-auto">
    <header class="mb-14">
        <h1 class="text-3xl text-center font-bold leading-normal text-slate-900 mt-0 mb-3">{{ $post->title }}
        </h1>
        <div class="text-center">{{ $post->created_at->format('d.m.Y') }}</div>
        <div class="mt-3 text-center">
            @foreach ($post->tags as $tag)
                <a href="{{ route('home', ['tag' => $tag->name]) }}"
                    class="inline-block bg-slate-200 rounded-full px-3 py-1 text-sm font-medium text-slate-700 m-0.5">#{{ $tag->name }}</a>
            @endforeach
        </div>
        <div class="mt-10 -mx-7 md:mx-0">
            @if ($post->image)
                <img class="w-full max-w-2xl mx-auto" src="{{ url("/storage/{$post->image}") }}" width="960"
                    height="500" alt="This post thumbnail">
            @endif
        </div>
    </header>
    <div id="content" class="prose text-slate-800 max-w-none">
        {{ $post->content }}
    </div>
</article>
