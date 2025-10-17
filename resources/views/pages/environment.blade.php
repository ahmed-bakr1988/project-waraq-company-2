<x-app-layout>
    <div class="container py-10">
        <h1 class="text-2xl font-bold mb-6">{{ __('words.sustainability_activities') ?? 'Environment & Sustainability' }}</h1>
        @isset($page)
            <div class="prose max-w-none">{!! nl2br(e($page->body)) !!}</div>
        @else
            <p class="text-gray-600">Sustainability and environmental initiatives will be available soon.</p>
        @endisset
    </div>
</x-app-layout>

