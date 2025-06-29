<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
<<<<<<< HEAD
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class, "Index"]);
=======
use Illuminate\Support\Facades\Auth;

Route::get('/', [IndexController::class,"Index"]);
>>>>>>> 14208a36ac021d4849210bd5791b9c56f19628ea

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Static dummy product view route
Route::get('/products', function () {
     $products = [
        (object)[
            'id' => 1,
            'name' => 'Gaming Beast PC',
            'description' => 'High-end gaming with RTX 4070.',
            'price' => 99999,
            'image' => 'images/dummy1.jpg',
        ],
        (object)[
            'id' => 2,
            'name' => 'Office Workstation',
            'description' => 'Quiet, powerful and multitasking ready.',
            'price' => 55999,
            'image' => 'images/dummy2.jpg',
        ],
        (object)[
            'id' => 3,
            'name' => 'Budget Gaming PC',
            'description' => 'Best for entry-level 1080p gaming.',
            'price' => 34999,
            'image' => 'images/dummy3.jpg',
        ],
        (object)[
            'id' => 4,
            'name' => 'Creator Build',
            'description' => 'Designed for video editing & streaming.',
            'price' => 89999,
            'image' => 'images/dummy4.jpg',
        ],
        (object)[
            'id' => 5,
            'name' => 'Mini ITX Build',
            'description' => 'Compact power for small setups.',
            'price' => 62999,
            'image' => 'images/dummy5.jpg',
        ],
        (object)[
            'id' => 6,
            'name' => 'RGB Gamer Edition',
            'description' => 'RGB, liquid cooling, and power.',
            'price' => 104999,
            'image' => 'images/dummy6.jpg',
        ],
    ];

    return view('products', compact('products'));

});

// Example dynamic product route (optional)
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/build/{id}', function ($id) {
    // For demo: dummy products
    $products = [
        1 => (object)[
            'id' => 1,
            'name' => 'Ultimate Gaming Rig',
            'description' => 'Dominate every game with this high-performance build featuring the latest RTX 4080 GPU and Intel Core i9 processor.',
            'price' => 2499,
            'image' => 'https://img.freepik.com/...jpg',
            'tag' => 'Gaming',
        ],
        2 => (object)[
            'id' => 2,
            'name' => 'Pro Workstation',
            'description' => 'Engineered for content creators and professionals with AMD Ryzen Threadripper and NVIDIA RTX A5000.',
            'price' => 3799,
            'image' => 'https://img.freepik.com/...jpg',
            'tag' => 'Workstation',
        ],
        3 => (object)[
            'id' => 3,
            'name' => 'Budget Gamer',
            'description' => 'Perfect entry-level gaming PC with AMD Ryzen 5 and RTX 3060.',
            'price' => 899,
            'image' => 'https://img.freepik.com/...jpg',
            'tag' => 'Budget',
        ],
    ];

    if (!isset($products[$id])) {
        abort(404);
    }

    return view('build', ['product' => $products[$id]]);
});

