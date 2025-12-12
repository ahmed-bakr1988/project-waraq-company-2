<?php

declare(strict_types=1);

/**
 * Application global helper functions.
 * Add lightweight helpers here as needed.
 */
if (! function_exists('app_name')) {
    function app_name(): string
    {
        return config('app.name');
    }
}
