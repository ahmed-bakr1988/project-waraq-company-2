<x-app-layout>
    <div class="container py-10">
        <h1 class="text-2xl font-bold mb-6">Careers</h1>
        <div class="space-y-4">
            @foreach($careers as $career)
                <a href="{{ url()->current().'/'.$career->id }}" class="block p-4 bg-white rounded shadow group">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-semibold group-hover:underline">{{ $career->title }}</h2>
                            <p class="text-gray-600 text-sm">{{ $career->location }}</p>
                        </div>
                        <div class="text-xs text-gray-400">{{ optional($career->published_at)->format('Y-m-d') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-6">{{ $careers->links() }}</div>
    </div>
</x-app-layout>

