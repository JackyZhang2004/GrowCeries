<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('', [homeController::class, 'index'])->name('home');
Route::get('home', [homeController::class, 'index'])->name('home');