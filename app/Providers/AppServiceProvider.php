<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        
        View::composer('layouts.navigation', function ($view) {
            $categories = ProductCategory::query()
                ->where('is_active', true)
                ->orderBy('order')
                ->get();
            $view->with('navCategories', $categories);
        });
    }
}
