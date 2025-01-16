<?php

use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ShopController;

use Illuminate\Support\Facades\Route;

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
    return view('layouts.app');
});
Route::get('/import',[PriceController::class,'index'])->name('price.index');
Route::post('/import',[PriceController::class,'import'])->name('price.import');
Route::get('/product/import',[ProductController::class,'import'])->name('product.import');
Route::resource('/product',ProductController::class);
Route::resource('/transaction',TransactionController::class);

Route::get('/pos/load',[PosController::class,'load'])->name('pos.load');

Route::resource('/pos',PosController::class);

Route::get('/shop/load',[ShopController::class,'load'])->name('shop.load');

Route::resource('/shop',ShopController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
