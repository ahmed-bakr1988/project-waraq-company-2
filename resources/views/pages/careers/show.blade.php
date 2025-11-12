<x-app-layout>
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white py-12">
        <div class="container mx-auto px-4">
            <nav class="text-sm mb-4">
                <a href="{{ route('careers.index') }}" class="text-emerald-100 hover:text-white">
                    {{ __('words.career_opportunities') }}
                </a>
                <span class="mx-2">/</span>
                <span>{{ $career->title }}</span>
            </nav>
            <h1 class="text-4xl font-bold">{{ $career->title }}</h1>
        </div>
    </div>

    <div class="container mx-auto px-4 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Job Details Card --}}
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <div class="flex flex-wrap gap-4 mb-6">
                        @if($career->location)
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-map-marker-alt text-emerald-600 mr-2"></i>
                                <span>{{ $career->location }}</span>
                            </div>
                        @endif

                        @if($career->type)
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-briefcase text-emerald-600 mr-2"></i>
                                <span>{{ __('words.' . $career->type) }}</span>
                            </div>
                        @endif

                        @if($career->posted_at)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-calendar-alt text-emerald-600 mr-2"></i>
                                <span>{{ __('words.posted_on') }} {{ $career->posted_at->format('M d, Y') }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    @if($career->description)
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ __('words.job_description') }}</h2>
                            <div class="prose max-w-none text-gray-700">
                                {!! nl2br(e($career->description)) !!}
                            </div>
                        </div>
                    @endif

                    {{-- Requirements --}}
                    @if($career->requirements)
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ __('words.job_requirements') }}</h2>
                            <div class="prose max-w-none text-gray-700">
                                {!! nl2br(e($career->requirements)) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar with Application Form --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('words.apply_for_position') }}</h3>

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    {{-- Error Message --}}
                    @if(session('error'))
                        <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif

                    {{-- Application Form --}}
                    <form method="POST" action="{{ route('careers.apply', $career->slug) }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        {{-- Full Name --}}
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">
                                {{ __('words.full_name') }} <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="full_name" 
                                name="full_name" 
                                value="{{ old('full_name') }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('full_name') border-red-500 @enderror"
                            >
                            @error('full_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                {{ __('words.email') }} <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('email') border-red-500 @enderror"
                            >
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                {{ __('words.phone') }} <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                            >
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- CV Upload --}}
                        <div>
                            <label for="cv" class="block text-sm font-medium text-gray-700 mb-1">
                                {{ __('words.upload_cv') }} <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="file" 
                                id="cv" 
                                name="cv" 
                                accept=".pdf,.doc,.docx"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('cv') border-red-500 @enderror"
                            >
                            <p class="text-xs text-gray-500 mt-1">{{ __('words.accepted_formats') }}: PDF, DOC, DOCX</p>
                            @error('cv')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Cover Letter --}}
                        <div>
                            <label for="cover_letter" class="block text-sm font-medium text-gray-700 mb-1">
                                {{ __('words.cover_letter') }}
                            </label>
                            <textarea 
                                id="cover_letter" 
                                name="cover_letter" 
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent @error('cover_letter') border-red-500 @enderror"
                            >{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <button 
                            type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-700 text-white rounded-lg hover:from-emerald-700 hover:to-teal-800 transition-all duration-200 shadow-md hover:shadow-lg font-semibold"
                        >
                            <i class="fas fa-paper-plane mr-2"></i>
                            {{ __('words.submit_application') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
