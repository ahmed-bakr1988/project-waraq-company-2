<x-app-layout>
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2">{{ __('words.company_news') }}</h1>
            <p class="text-purple-100">{{ __('words.latest_news') }}</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-10">
        {{-- Search Bar --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('news.index') }}" class="flex gap-3">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-search mr-1"></i> {{ __('words.search') }}
                    </label>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="{{ __('words.search_news') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                    >
                </div>
                <div class="flex items-end gap-3">
                    <button 
                        type="submit" 
                        class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors"
                    >
                        <i class="fas fa-search mr-2"></i> {{ __('words.search') }}
                    </button>
                    @if(request('search'))
                        <a 
                            href="{{ route('news.index') }}" 
                            class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors"
                        >
                            <i class="fas fa-times mr-2"></i> {{ __('words.clear_filters') }}
                        </a>
                    @endif
                </div>
            </form>

            {{-- Results Count --}}
            @if($posts->total() > 0)
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        {{ __('words.showing') }} <span class="font-semibold">{{ $posts->firstItem() }}</span>
                        - <span class="font-semibold">{{ $posts->lastItem() }}</span>
                        {{ __('words.of') }} <span class="font-semibold">{{ $posts->total() }}</span>
                        {{ __('words.news_items') }}
                    </p>
                </div>
            @endif
        </div>

        {{-- News Grid --}}
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($posts as $post)
                    <article class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        {{-- Featured Image --}}
                        @if($post->cover)
                            <div class="relative h-48 overflow-hidden bg-gray-100">
                                <img 
                                    src="{{ asset($post->cover) }}" 
                                    alt="{{ $post->title }}" 
                                    loading="lazy"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                />
                            </div>
                        @endif

                        {{-- News Content --}}
                        <div class="p-5">
                            {{-- Published Date --}}
                            @if($post->published_at)
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <i class="fas fa-calendar-alt mr-1 text-purple-600"></i>
                                    <time datetime="{{ $post->published_at->toIso8601String() }}">
                                        {{ $post->published_at->format('M d, Y') }}
                                    </time>
                                </div>
                            @endif

                            {{-- Title --}}
                            <h2 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-purple-600 transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h2>

                            {{-- Excerpt --}}
                            @if($post->excerpt)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            {{-- Read More Link --}}
                            <a 
                                href="{{ route('news.show', $post->slug) }}" 
                                class="inline-flex items-center text-purple-600 hover:text-purple-700 font-semibold text-sm"
                            >
                                {{ __('words.read_more') }}
                                <i class="fas fa-arrow-right mr-2 {{ app()->getLocale() === 'ar' ? 'mr-0 ml-2 rotate-180' : '' }}"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">
                {{ $posts->links() }}
            </div>

        @else
            {{-- No News Found --}}
            <div class="text-center py-16">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-newspaper text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">{{ __('words.no_news_found') }}</h3>
                <p class="text-gray-500 mb-6">{{ __('words.try_different_search') }}</p>
                @if(request('search'))
                    <a 
                        href="{{ route('news.index') }}" 
                        class="inline-block px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors"
                    >
                        {{ __('words.view_all_news') }}
                    </a>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>

