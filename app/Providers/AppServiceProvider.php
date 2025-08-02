<?php

namespace App\Providers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Subcategory;
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
        // Only fetch categories that have subcategories with products
        $menu_categories = Category::whereHas('subcategory.products')->where('add_to_homepage', true)
            ->with(['subcategory' => function ($query) {
                $query->whereHas('products');
            }])
            ->get();

        // Determine active category based on current route
        $currentCategoryId = null;

        // If URL is like /category/{id}
        if (Request::is('category/*')) {
            $currentCategoryId = Request::segment(2);
        }

        // If URL is like /subcategory/{id}, find related parent category
        if (Request::is('subcategory/*')) {
            $subId = Request::segment(2);
            $sub = Subcategory::find($subId);
            $currentCategoryId = $sub?->category_id;
        }

        // Share both variables with all views
        $view->with([
            'menu_categories' => $menu_categories,
            'activeCategoryId' => $currentCategoryId,
        ]);
    });
    }
    }

