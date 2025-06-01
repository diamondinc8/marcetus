<?php

use App\Http\Controllers\Products\IndexController;
use App\Http\Controllers\Products\ShowController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserAddProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Seller\IndexController as SellerIndexController;
use App\Http\Controllers\Seller\RegistrationController;

Route::get('/', IndexController::class)->name('index');

Route::get('/catalog/{product}', ShowController::class)->name('product.show');

Route::get('/catalog/{user}/{product}/', UserAddProductController::class)->name('product.add');

Route::get('/cart', CartController::class)->name('cart.show');

Route::get('/seller', SellerIndexController::class)->name('seller.index');

Route::post('/seller/registration', RegistrationController::class)->name('seller.registration');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
