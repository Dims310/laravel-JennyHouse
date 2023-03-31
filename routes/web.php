<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShoppingPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// landing page
Route::get('/', [LandingPageController::class, 'getLandingPage'])->name('landingPage');

// register page
Route::get('/register', [SessionController::class, 'getRegisterPage'])->name('registerPage');
Route::post('/register', [SessionController::class, 'registerStore'])->name('registerStore');

// login page
Route::get('/login', [SessionController::class, 'getloginPage'])->name('loginPage');
Route::post('/login', [SessionController::class, 'loginStore'])->name('loginStore');

// logout without page
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

// shopping page
Route::get('/shop', [ShoppingPageController::class, 'getShoppingPage'])->name('shoppingPage');

// detail product
Route::get('/shop/product/{id}', [ShoppingPageController::class, 'getDetailProduct'])->name('detailPage');

// category product
Route::get('/shop/category/{category}', [ShoppingPageController::class, 'getCategory'])->name('category');

// checkout product
Route::get('/shop/checkout', [ShoppingPageController::class, 'getCheckoutPage'])->name('checkoutPage');

// add to cart without page
Route::get('/cart/{id}', [ShoppingPageController::class, 'cartStore'])->name('cartRestore');

// add to cart without page
Route::post('/checkout', [ShoppingPageController::class, 'checkoutStore'])->name('checkoutStore');