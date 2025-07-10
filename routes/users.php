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

Route::get('/electronics', function () {
    return view('my.electronics');
})->name('Electronics');
Route::get('/appliances', function () {
    return view('my.appliances');
})->name('Appliances');

Route::get('/aboutus', function () {
    return view('my.about');
})->name('AboutUs');


Route::get('/contactus', function () {
    return view('my.contactus');
})->name('ContactUs');


Route::get('/checkout', function () {
    return view('my.checkout');
})->name('Checkout');

Route::get('/terms', function () {
    return view('my.terms');
})->name('Terms');

Route::get('/payment', function () {
    return view('my.payment');
})->name('Payment');
 Route::get('/singleproduct1', function () {
    return view('my.singleproduct1');
})->name('SingleProduct1');
Route::get('/singleproduct2', function () {
    return view('my.singleproduct2');
})->name('SingleProduct2');

Route::get('/help',function(){
    return view('my.help');
})->name('Help');
Route::get('/privacy',function(){
    return view('my.privacy');
})->name('Privacy');
Route::get('/faqs',function(){
    return view('my.faqs');
})->name('FAQS');

