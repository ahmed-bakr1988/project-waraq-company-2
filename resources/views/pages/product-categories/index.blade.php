<x-app-layout>
    <div class="container py-10">
        <h1 class="text-2xl font-bold mb-6">{{ __('words.nav_products') }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('product-categories.show', $category->slug) }}" class="block group">
                    <div class="bg-white rounded-lg shadow p-5">
                        <h2 class="font-semibold group-hover:underline">{{ $category->name }}</h2>
                        @if($category->description)
                            <p class="text-gray-600 mt-2 line-clamp-2">{{ Str::limit($category->description, 140) }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>

