<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">لوحة المؤشرات التجريبية</h1>
        <p class="mb-6 text-gray-600">Dashboard ID: {{ $dashboardId }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- KPI Cards (4) -->
            @foreach ([
                ['title' => 'إجمالي المبيعات', 'value' => '—'],
                ['title' => 'معدل التحويل', 'value' => '—'],
                ['title' => 'تكلفة الاكتساب', 'value' => '—'],
                ['title' => 'العائد على الإنفاق', 'value' => '—'],
            ] as $kpi)
            <div class="bg-white rounded-lg shadow p-4">
                <div class="text-sm text-gray-500">{{ $kpi['title'] }}</div>
                <div class="text-2xl font-semibold mt-2">{{ $kpi['value'] }}</div>
            </div>
            @endforeach

            <!-- Charts (3) -->
            <div class="bg-white rounded-lg shadow p-4 col-span-1 md:col-span-2">
                <h2 class="font-semibold mb-4">اتجاه المبيعات</h2>
                <canvas id="chartSales"></canvas>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="font-semibold mb-4">تفصيل القنوات</h2>
                <canvas id="chartChannels"></canvas>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="font-semibold mb-4">مقارنة الأداء</h2>
                <canvas id="chartCompare"></canvas>
            </div>
        </div>
        </div>
    </div>

    {{-- Charts initialization will be handled via local assets when enabled --}}
</x-app-layout>
