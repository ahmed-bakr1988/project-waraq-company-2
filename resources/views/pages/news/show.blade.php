<x-app-layout>
    <div class="container py-10 max-w-3xl">
        <article class="prose max-w-none">
            <h1>{{ $post->title }}</h1>
            @if($post->cover)
                <img src="{{ asset($post->cover) }}" alt="{{ $post->title }}" loading="eager" width="960" height="640" class="rounded" />
            @endif
            <p class="text-gray-500 text-sm">{{ optional($post->published_at)->format('Y-m-d') }}</p>
            <div class="mt-4">{!! nl2br(e($post->body)) !!}</div>
        </article>
    </div>
</x-app-layout>

