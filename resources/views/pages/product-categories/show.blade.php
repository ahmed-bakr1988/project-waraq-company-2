<x-app-layout>
    <div class="container py-10">
        <h1 class="text-2xl font-bold mb-2">{{ $category->name }}</h1>
        @if($category->description)
            <p class="text-gray-600 mb-6">{{ $category->description }}</p>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <a href="{{ route('products.show', $product->id) }}" class="block group">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy" width="600" height="400" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="font-semibold group-hover:underline">{{ $product->name }}</h2>
                            <p class="text-gray-600 mt-2 line-clamp-2">{{ Str::limit($product->description ?? $product->summary, 120) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>

