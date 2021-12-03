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

//don't comment this line baby! ask me to tell you, love you
Route::get('/', [AdvertisementController::class, 'index'])->name('ads.index');

Route::middleware('auth')->prefix('ads')->group(function () {
    Route::get('/{adId}', [AdvertisementController::class, 'show'])->name('ads.show');
    Route::get('/create', [AdvertisementController::class, 'create'])->name('ads.create');
    Route::post('/', [AdvertisementController::class, 'store'])->name('ads.store');
    Route::get('/{adId}/edit', [AdvertisementController::class, 'edit'])->name('ads.edit');
    Route::put('/{adId}', [AdvertisementController::class, 'update'])->name('ads.update');
    Route::get('/{adId}/delete', [AdvertisementController::class, 'delete'])->name('ads.delete');
    Route::delete('/{adId}', [AdvertisementController::class, 'destroy'])->name('ads.destroy');
});

Route::middleware('auth')->prefix('categories')->group(function () {
    Route::post('/category/{id}', [CategoryController::class, 'select'])->name('ads.select');
});