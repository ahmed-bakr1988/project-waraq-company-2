<x-app-layout>
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2">{{ __('words.all_products') }}</h1>
            <p class="text-blue-100">{{ __('words.company_products') }}</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-10">
        {{-- Search & Filters --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('products.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    {{-- Search Input --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-search mr-1"></i> {{ __('words.search') }}
                        </label>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="{{ __('words.search_products') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>

                    {{-- Category Filter --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-filter mr-1"></i> {{ __('words.category') }}
                        </label>
                        <select 
                            name="category" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="">{{ __('words.all_categories') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Sort Options --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-sort mr-1"></i> {{ __('words.sort_by') }}
                        </label>
                        <select 
                            name="sort" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                {{ __('words.newest_first') }}
                            </option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                {{ __('words.name_a_z') }}
                            </option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                {{ __('words.name_z_a') }}
                            </option>
                        </select>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3">
                    <button 
                        type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        <i class="fas fa-search mr-2"></i> {{ __('words.apply_filters') }}
                    </button>
                    <a 
                        href="{{ route('products.index') }}" 
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors"
                    >
                        <i class="fas fa-times mr-2"></i> {{ __('words.clear_filters') }}
                    </a>
                </div>
            </form>

            {{-- Results Count --}}
            <div class="mt-4 pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600">
                    {{ __('words.showing') }} <span class="font-semibold">{{ $products->firstItem() ?? 0 }}</span>
                    - <span class="font-semibold">{{ $products->lastItem() ?? 0 }}</span>
                    {{ __('words.of') }} <span class="font-semibold">{{ $products->total() }}</span>
                    {{ __('words.products') }}
                </p>
            </div>
        </div>

        {{-- Products Grid --}}
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($products as $product)
                    <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        {{-- Product Image --}}
                        <div class="relative h-56 overflow-hidden bg-gray-100">
                            <img 
                                src="{{ asset($product->image) }}" 
                                alt="{{ $product->name }}"
                                loading="lazy"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                            >
                            {{-- Category Badge --}}
                            @if($product->productCategory)
                                <div class="absolute top-3 left-3 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $product->productCategory->name }}
                                </div>
                            @endif
                        </div>

                        {{-- Product Info --}}
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">
                                {{ $product->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ Str::limit($product->description ?? $product->summary, 120) }}
                            </p>

                            {{-- Action Button --}}
                            <a 
                                href="{{ route('products.show', $product->id) }}" 
                                class="inline-flex items-center justify-center w-full px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg"
                            >
                                <i class="fas fa-eye mr-2"></i>
                                {{ __('words.view_details') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">
                {{ $products->links() }}
            </div>

        @else
            {{-- No Results --}}
            <div class="text-center py-16">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-box-open text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">{{ __('words.no_products_found') }}</h3>
                <p class="text-gray-500 mb-6">{{ __('words.try_different_filters') }}</p>
                <a 
                    href="{{ route('products.index') }}" 
                    class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                >
                    {{ __('words.view_all_products') }}
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
