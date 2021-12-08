<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserPanel\AdvertisementController;
use App\Http\Controllers\Admin\AdminPanel\CategoryController;


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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [AdvertisementController::class, 'showAds'])->name('index');
Route::post('/show', [AdvertisementController::class, 'seeAds'])->name('ads.seeAds');

Route::middleware('auth')->prefix('ads')->group(function () {
    Route::get('/', [AdvertisementController::class, 'index'])->name('ads.index');
    Route::get('/create', [AdvertisementController::class, 'create'])->name('ads.create');
    Route::get('/{adID}', [AdvertisementController::class, 'show'])->name('ads.show');
    Route::post('/', [AdvertisementController::class, 'store'])->name('ads.store');
    Route::get('/{adID}/edit', [AdvertisementController::class, 'edit'])->name('ads.edit');
    Route::put('/{adID}', [AdvertisementController::class, 'update'])->name('ads.update');
    Route::get('/{adID}/delete', [AdvertisementController::class, 'delete'])->name('ads.delete');
    Route::delete('/{adID}', [AdvertisementController::class, 'destroy'])->name('ads.destroy');

    Route::delete('/search', [AdvertisementController::class, 'search'])->name('ads.search');
});

Route::middleware('auth')->prefix('categories')->group(function () {
    Route::post('/category/{id}', [CategoryController::class, 'select'])->name('ads.select');
});
