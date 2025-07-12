<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
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
        View::composer('*', function ($view) {
            $menu_categories = Category::with(['subcategory' => function($query) {
                $query->limit(5);
            }])->get();

            $view->with('menu_categories', $menu_categories);
        });
    }
    }

