<?php

use App\Http\Controllers\lk\LkController;
use App\Http\Controllers\Products\IndexController;
use App\Http\Controllers\Products\OrderController;
use App\Http\Controllers\Products\ShowController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserAddProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Seller\IndexController as SellerIndexController;
use App\Http\Controllers\Seller\Order\NewOrderController;
use App\Http\Controllers\Seller\Product\AddController;
use App\Http\Controllers\Seller\Product\IndexController as ProductIndexController;
use App\Http\Controllers\Seller\Product\StoreController;
use App\Http\Controllers\Seller\RegistrationController;
use App\Http\Middleware\isAuthorized;
use App\Http\Middleware\IsSeller;

Route::get('/', IndexController::class)->name('index');

Route::get('/catalog/{product}', ShowController::class)->name('product.show');

Route::get('/catalog/{user}/{product}/', UserAddProductController::class)->name('product.add');

Route::get('/cart', CartController::class)->name('cart.show');



// Пути seller/...
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
        Route::get('/goods', ProductIndexController::class)->name('all.goods');
        Route::get('/goods/add', AddController::class)->name('goods.add');
        Route::get('/new', NewOrderController::class)->name('orders.new');

        Route::post('/goods/add/store', StoreController::class)->name('goods.store');

        Route::get('/goods/add/store', function () {
            return redirect()->route('goods.add');
        });
    });
});

// Пути lk/...

Route::middleware([isAuthorized::class])->prefix('lk')->group(function () {
    Route::get('/', LkController::class)->name('lk.index');
});

Route::post('/placeorder', OrderController::class)->name('order.place');

Route::get('/placeorder', function () {
    return redirect()->route('index');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect()->route('index');
});
