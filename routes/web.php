<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\discoverController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('about');
// });


Route::get('', [homeController::class, 'index'])->name('home');
Route::get('home', [homeController::class, 'index'])->name('home');

Route::get('about', [aboutController::class, 'index'])->name('about');

Route::get('register', [authController::class, 'register'])->name('register');
Route::post('register', [authController::class, 'store']);

Route::get('login', [authController::class, 'login'])->name('login');
Route::post('login', [authController::class, 'authenticate']);

Route::post('logout', [authController::class, 'logout'])->name('logout');

Route::get('product/{id}', [productController::class, 'productDetails'])->name('productDetail');


Route::get('discover', [discoverController::class, 'index'])->name('discover');

Route::get('order', [orderController::class, 'index'])->name('order');

Route::get('cart', [cartController::class, 'index'])->name('cart');
