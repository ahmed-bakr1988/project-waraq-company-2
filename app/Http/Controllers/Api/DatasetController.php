<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpsertDatasetRequest;
use Illuminate\Http\JsonResponse;

class DatasetController extends Controller
{
    public function upsert(UpsertDatasetRequest $request): JsonResponse
    {
        $validated = $request->validated();

        return response()->json([
            'ok' => true,
            'source' => $validated['source'] ?? null,
            'dataset' => $validated['dataset'] ?? null,
            'records' => is_countable($validated['records'] ?? null) ? count($validated['records']) : 0,
        ]);
    }
}
