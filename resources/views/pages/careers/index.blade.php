<x-app-layout>
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2">{{ __('words.career_opportunities') }}</h1>
            <p class="text-emerald-100">{{ __('words.join_our_team') }}</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-10">
        {{-- Career Opportunities Grid --}}
        @if($careers->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($careers as $career)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="p-6">
                            {{-- Job Title --}}
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                {{ $career->title }}
                            </h3>

                            {{-- Job Details --}}
                            <div class="space-y-2 mb-4">
                                @if($career->location)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt w-5 text-emerald-600"></i>
                                        <span>{{ $career->location }}</span>
                                    </div>
                                @endif

                                @if($career->type)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-briefcase w-5 text-emerald-600"></i>
                                        <span>{{ __('words.' . $career->type) }}</span>
                                    </div>
                                @endif

                                @if($career->posted_at)
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-calendar-alt w-5 text-emerald-600"></i>
                                        <span>{{ __('words.posted_on') }} {{ $career->posted_at->format('M d, Y') }}</span>
                                    </div>
                                @endif
                            </div>

                            {{-- Description Preview --}}
                            @if($career->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($career->description), 150) }}
                                </p>
                            @endif

                            {{-- Action Button --}}
                            <a 
                                href="{{ route('careers.show', $career->slug) }}" 
                                class="inline-flex items-center justify-center w-full px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-700 text-white rounded-lg hover:from-emerald-700 hover:to-teal-800 transition-all duration-200 shadow-md hover:shadow-lg"
                            >
                                <i class="fas fa-arrow-right mr-2"></i>
                                {{ __('words.apply_now') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">
                {{ $careers->links() }}
            </div>

        @else
            {{-- No Careers Available --}}
            <div class="text-center py-16">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-briefcase text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">{{ __('words.no_openings_currently') }}</h3>
                <p class="text-gray-500 mb-6">{{ __('words.check_back_later') }}</p>
            </div>
        @endif
    </div>
</x-app-layout>
