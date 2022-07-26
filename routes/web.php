<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResgiterController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category', CategoryController::class)->only([
        'index','destroy','update','store'
    ]);
});

Route::name('client.')->group(function(){
    Route::get('/',[HomeController::class,'index']);
    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('shop',[ShopController::class,'index'])->name('shop');
    Route::get('shop/{id}',[ShopController::class,'detail'])->name('shop.detail');
    Route::get('cart',[CartController::class,'index'])->name('cart');
    Route::get('checkout',[CheckoutController::class,'index'])->name('checkout');
    Route::get('contact',[ContactController::class,'contact'])->name('contact');
});

Route::get('login',[LoginController::class,'login'])->name('login');
Route::get('register',[ResgiterController::class,'register'])->name('register');