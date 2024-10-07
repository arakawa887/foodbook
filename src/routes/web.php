<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopDetailController;
use App\Http\Controllers\ShopController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'shop']);
});
Route::get('/detail/:{shopId}', [ShopDetailController::class, 'detail']);
Route::get('/favorite/{id}', [ShopController::class, 'favorite'])->name('favorite.form');
Route::post('/favorite/{id}', [ShopController::class, 'favorite'])->name('favorite.form');
Route::get('/favorite_delete/{id}', [ShopController::class, 'favorite_delete'])->name('favorite_delete.form');
Route::post('/favorite_delete/{id}', [ShopController::class, 'favorite_delete'])->name('favorite_delete.form');
