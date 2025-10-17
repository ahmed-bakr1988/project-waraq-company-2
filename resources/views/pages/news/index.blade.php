<x-app-layout>
    <div class="container py-10">
        <h1 class="text-2xl font-bold mb-6">{{ __('words.company_news') }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <a href="{{ url()->current().'/'.$post->slug }}" class="block group">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    @if($post->cover)
                        <img src="{{ asset($post->cover) }}" alt="{{ $post->title }}" loading="lazy" width="600" height="400" class="w-full h-48 object-cover" />
                    @endif
                    <div class="p-4">
                        <h2 class="font-semibold group-hover:underline">{{ $post->title }}</h2>
                        <p class="text-gray-600 mt-2 line-clamp-2">{{ $post->excerpt }}</p>
                        <div class="text-xs text-gray-400 mt-2">{{ optional($post->published_at)->format('Y-m-d') }}</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-6">{{ $posts->links() }}</div>
    </div>
</x-app-layout>

