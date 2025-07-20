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


Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/electronics', function () {
    return view('frontend.electronics');
})->name('Electronics');
Route::get('/appliances', function () {
    return view('frontend.appliances');
})->name('Appliances');

Route::get('/aboutus', function () {
    return view('frontend.about');
})->name('AboutUs');


Route::get('/contactus', [IndexController::class, 'Contactus']);




Route::get('/terms', function () {
    return view('frontend.terms');
})->name('Terms');




Route::get('/help', function () {
    return view('frontend.help');
})->name('Help');
Route::get('/privacy', function () {
    return view('frontend.privacy');
})->name('Privacy');
Route::get('/faqs', function () {
    return view('frontend.faqs');
})->name('FAQS');

Route::get('/category/{id}/', [IndexController::class, 'CategoryProduct'])->name('category.product');
Route::get('/subcategory/{id}', [IndexController::class, 'SubCategoryProduct'])->name('subcategory.product');
Route::get('/product/{id}', [IndexController::class, 'ShowProduct'])->name('showproduct');
Route::get('/contactus', [IndexController::class, 'Contactus'])->name('ContactUs');
Route::get('/checkout', [IndexController::class, 'Checkout'])->name('checkout');
Route::post('/ajax/add-to-cart', [IndexController::class, 'ajaxAddToCart'])->name('ajax.add.to.cart');
Route::post('/ajax/remove-cart', [IndexController::class, 'removeCart'])->name('ajax.cart.remove');
Route::post('/place-order', [IndexController::class, 'placeOrder'])->name('place.order');
Route::get('/payment', [IndexController::class, 'showPaymentPage'])->name('Payment');
Route::post('/custom-register', [IndexController::class, 'register'])->name('custom.register');
Route::post('/custom-login', [IndexController::class, 'login'])->name('custom.login');
Route::post('/custom-logout', [IndexController::class, 'logout'])->name('custom.logout');
Route::post('/cart',[IndexController::class,'addCart'])->name('cart.add');
Route::prefix('/user')->group(function () {
Route::get('/{id}/profile', [IndexController::class, 'showProfile'])->name('user.profile');
Route::put('/profile/update/{field}', [IndexController::class, 'updateField'])->name('user.updateField');
Route::post('/wishlist/toggle', [IndexController::class, 'toggle'])->name('wishlist.toggle');
Route::get('/wishlist',[IndexController::class, 'showWishlist'])->name('user.wishlist');
Route::get('/{id}/orders', [IndexController::class, 'showOrders'])->name('user.orders');
Route::get('/user/order/{id}', [IndexController::class, 'detailedShow'])->name('user.order.details');
Route::get('/user/order/invoice/{id}', [IndexController::class, 'downloadInvoice'])->name('user.invoice.download');

});
