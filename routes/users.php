<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use App\Http\Controllers\my\CartController;
use App\Http\Controllers\my\CheckoutController as MyCheckoutController;
use App\Http\Controllers\my\ContactController;
use App\Http\Controllers\my\PaymentController;
use App\Http\Controllers\my\SupportController;
use App\Http\Controllers\User\CheckoutController;

Route::get('/', [IndexController::class, 'Index']);
Route::get('/category/{id}/{slug}', [IndexController::class, 'CategoryWiseProduct'])->name('categorywise.product');

Route::get('/terms', function () {
    return view('my.terms');
})->name('terms');
Route::get('/about', function () {
    return view('my.about');
})->name('about');
Route::get('/single-product-1', function () {
    return view('my.singleProduct1');
})->name('single.product.1');







