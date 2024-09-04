<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

// Grup rute untuk pengguna yang sudah login
Route::middleware('checkSessionLogin')->group(function () {
    Route::get('/dashboard', [FrontController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
});

// Grup rute untuk pengguna yang belum login
Route::middleware('checkSessionNotLogin')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register', [LoginController::class, 'registerPost']);
});
