<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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
Route::controller(ProductController::class)->group(function(){
          Route::get('/product','index')->name('product.index');
          Route::get('/prodect/create','create')->name('product.create');
          Route::post('/product','store')->name('product.store');
          Route::get('/product/{product}','edit')->name('product.edit');
          Route::post('/product/{product}','update')->name('product.update');
        Route::delete('/product/{product}','delete')->name('product.delete');
});


