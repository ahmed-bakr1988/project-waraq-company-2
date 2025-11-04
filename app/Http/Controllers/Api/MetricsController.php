<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\QueryMetricsRequest;
use Illuminate\Http\JsonResponse;

class MetricsController extends Controller
{
    public function query(QueryMetricsRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $metric = $validated['metric'];
        $from = $validated['from'] ?? now()->subDays(7)->toDateString();
        $to = $validated['to'] ?? now()->toDateString();

        $points = [
            ['date' => $from, 'value' => 10],
            ['date' => now()->subDays(3)->toDateString(), 'value' => 15],
            ['date' => $to, 'value' => 12],
        ];

        return response()->json([
            'ok' => true,
            'metric' => $metric,
            'from' => $from,
            'to' => $to,
            'series' => $points,
        ]);
    }
}
