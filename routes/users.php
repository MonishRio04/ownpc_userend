<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use App\Http\Controllers\my\CartController;
use App\Http\Controllers\my\CheckoutController as MyCheckoutController;
use App\Http\Controllers\my\ContactController;
use App\Http\Controllers\my\PaymentController;
use App\Http\Controllers\my\SupportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\CheckoutController;

Route::get('/', [IndexController::class, 'Index']);
//Route::get('/category/{id}/{slug}', [IndexController::class, 'CategoryWiseProduct'])->name('categorywise.product');

Route::get('/terms', function () {
    return view('frontend.terms');
})->name('terms');
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/electronics', function () {
    return view('frpntend.electronics');
})->name('Electronics');
Route::get('/appliances', function () {
    return view('frontend.appliances');
})->name('Appliances');

Route::get('/aboutus', function () {
    return view('frpntend.about');
})->name('AboutUs');


Route::get('/contactus',[IndexController::class,'Contactus']);




Route::get('/terms', function () {
    return view('frontend.terms');
})->name('Terms');




Route::get('/help',function(){
    return view('frontend.help');
})->name('Help');
Route::get('/privacy',function(){
    return view('frontend.privacy');
})->name('Privacy');
Route::get('/faqs',function(){
    return view('frontend.faqs');
})->name('FAQS');

Route::get('/category/{id}/', [IndexController::class, 'CategoryProduct'])->name('category.product');
Route::get('/subcategory/{id}', [IndexController::class, 'SubCategoryProduct'])->name('subcategory.product');
Route::get('/product/{id}', [IndexController::class, 'ShowProduct'])->name('showproduct');
Route::get('/contactus',[IndexController::class,'Contactus'])->name('ContactUs');
Route::get('/checkout',[IndexController::class,'Checkout'])->name('checkout');
Route::post('/ajax/add-to-cart', [IndexController::class, 'ajaxAddToCart'])->name('ajax.add.to.cart');
Route::post('/ajax/remove-cart', [IndexController::class, 'removeCart'])->name('ajax.cart.remove');
Route::post('/place-order', [IndexController::class, 'placeOrder'])->name('place.order');
Route::get('/payment',[IndexController::class,'showPaymentPage'])->name('Payment');


