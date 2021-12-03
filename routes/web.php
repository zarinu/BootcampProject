<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{AdvertisementController, CategoryController};

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

Auth::routes();
// Route::get('/', [AdvertisementController::class, 'index'])->name('ads.index');

Route::middleware('auth')->prefix('ads')->group(function () {
    Route::get('/{id}', [AdvertisementController::class, 'index'])->name('ads.index');
    Route::post('/category/{id}', [CategoryController::class, 'select'])->name('ads.select');
    Route::post('/create/{id}', [AdvertisementController::class, 'create'])->name('ads.create');
    Route::post('/store/{id}', [AdvertisementController::class, 'store'])->name('ads.store');
});
