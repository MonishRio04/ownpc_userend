<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
Route::get('/', [IndexController::class,"Index"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
