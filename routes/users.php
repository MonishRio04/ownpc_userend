<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'Index']);
Route::get('/category/{id}/{slug}', [IndexController::class, 'CategoryWiseProduct'])->name('categorywise.product');
