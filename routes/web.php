<?php

use App\Http\Controllers\Frontend\Home\HomeController;
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

        Route::get('/',                 [HomeController::class, 'index'])->name('frontend.home');

        Route::get('/shop',             [ShopController::class, 'index'])->name('frontend.shop');

        Route::get('/{url}',        CategoryProductController::class)->name('frontend.category.products');
    }
);
