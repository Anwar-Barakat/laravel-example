<?php

use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\ProductDetail\ProductDetailController;
use App\Http\Controllers\Frontend\Shop\CategoryProductController;
use App\Http\Controllers\Frontend\Shop\ShopController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix'        => LaravelLocalization::setLocale(),
        'middleware'    => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile',          [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile',        [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile',       [ProfileController::class, 'destroy'])->name('profile.destroy');
        });


        require __DIR__ . '/auth.php';

        Route::as('frontend.')->group(function () {

            Route::get('/',                     [HomeController::class, 'index'])->name('home');

            Route::get('/shop',                 [ShopController::class, 'index'])->name('shop');

            Route::get('/category/{url}',       CategoryProductController::class)->name('category.products');

            Route::get('/product/{product}',    ProductDetailController::class)->name('product.detail');

            Route::view('/cart',                'frontend.cart.index')->name('cart.index');
        });
    }
);