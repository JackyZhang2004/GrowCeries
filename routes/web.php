<?php

use App\Http\Controllers\admin\loginController as adminLoginController;
use App\Http\Controllers\admin\userController as adminUserController;
use App\Http\Controllers\courier\loginController as courierLoginController;
use App\Http\Controllers\courier\homeController as courierHomeController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\admin\homeController as adminHomeController;
use App\Http\Controllers\admin\productController as adminProductController;
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


// USER HERE

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



// ADMIN DOWN HERE

Route::group(['prefix' => 'admin'], function(){


    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('login', [adminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [adminLoginController::class, 'authenticate'])->name('admin.authenticate');

    });


    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('home', [adminHomeController::class, 'index'])->name('admin.home');
        Route::post('logout', [adminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('users', [adminUserController::class, 'index'])->name('admin.users');
        Route::get('products', [adminProductController::class, 'index'])->name('admin.products');
        Route::get('addProducts', [adminProductController::class, 'addProduct'])->name('admin.addProductIndex');
        Route::post('addProducts', [adminProductController::class, 'store'])->name('admin.addProduct');
        Route::delete('product/{product}', [adminProductController::class, 'destroy'])->name('admin.destroyProduct');
        Route::get('product/{product}', [adminProductController::class, 'show'])->name('admin.showProduct');
        Route::get('product/{product}/edit', [adminProductController::class, 'edit'])->name('admin.editProduct');
        Route::put('product/{product}', [adminProductController::class, 'update'])->name('admin.updateProduct');
        
    });

});


// Courier Down Here

Route::group(['prefix' => 'courier'], function(){


    Route::group(['middleware' => 'courier.guest'], function(){
        Route::get('login', [courierLoginController::class, 'index'])->name('courier.login');
        Route::post('authenticate', [courierLoginController::class, 'authenticate'])->name('courier.authenticate');

    });


    Route::group(['middleware' => 'courier.auth'], function(){
        Route::get('home', [courierHomeController::class, 'index'])->name('courier.home');
        Route::post('logout', [courierLoginController::class, 'logout'])->name('courier.logout');

    });

});



