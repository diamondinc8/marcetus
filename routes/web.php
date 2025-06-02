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
use App\Http\Middleware\IsSeller;

Route::get('/', IndexController::class)->name('index');

Route::get('/catalog/{product}', ShowController::class)->name('product.show');

Route::get('/catalog/{user}/{product}/', UserAddProductController::class)->name('product.add');

Route::get('/cart', CartController::class)->name('cart.show');




Route::prefix('seller')->group(function () {
    Route::get('/', SellerIndexController::class)->name('seller.index');
    Route::post('/registration', RegistrationController::class)->name('seller.registration');
    //Чтобы пользователь не мог попасть на роутер, предназначенный для обработки POST запроса
    Route::get('/registration', function () {
        return redirect()->route('seller.index');
    });

    // Ограничение доступа к путям, предназначенным для продавцев
    // Комментарий: 
    // middlewate создаётся командой php artisan make:middleware <название> 
    // реализацию можно посмотреть по пути: app\Http\Middleware\IsSeller.php 
    Route::middleware([IsSeller::class])->group(function () {
        Route::get('/check', function () {
            return 1111;
        });
    });
});




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
