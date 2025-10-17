<?php

use App\Http\Controllers\Api\AlertsController;
use App\Http\Controllers\Api\AnalyticsController;
use App\Http\Controllers\Api\DatasetController;
use App\Http\Controllers\Api\MetricsController;
use App\Http\Controllers\Api\ProductUpsertController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware(['api_token', 'throttle:30,1'])
    ->group(function () {
        Route::post('/datasets/upsert', [DatasetController::class, 'upsert']);
        Route::post('/metrics/query', [MetricsController::class, 'query']);
        Route::post('/alerts/test', [AlertsController::class, 'test']);
        Route::post('/products/upsert', [ProductUpsertController::class, 'upsert']);
    });

// Public analytics events (throttled, no token)
Route::post('v1/analytics/event', [AnalyticsController::class, 'event'])
    ->middleware('throttle:60,1');
