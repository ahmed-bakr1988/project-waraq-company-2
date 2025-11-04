<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function event(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'meta' => ['nullable', 'array'],
            'ts' => ['nullable', 'date'],
        ]);

        return response()->json([
            'ok' => true,
            'received' => $data,
        ]);
    }
}
