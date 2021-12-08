<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\UserPanel\AdvertisementController as UserAdsController;
use App\Http\Controllers\Front\AdvertisementController as FrontAdsController;
use App\Http\Controllers\Panel\AdminPanel\CategoryController;


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
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('/', [FrontAdsController::class, 'index'])->name('index');
    Route::post('/', [FrontAdsController::class, 'show'])->name('show');
    // Route::get('/d', [UserAdsController::class, 'findAds'])->name('ads.findAds');
});

Route::middleware('auth')->prefix('ads')->group(function () {
    Route::get('/', [UserAdsController::class, 'index'])->name('ads.index');
    Route::get('/create', [UserAdsController::class, 'create'])->name('ads.create');
    Route::get('/{adID}', [UserAdsController::class, 'show'])->name('ads.show');
    Route::post('/', [UserAdsController::class, 'store'])->name('ads.store');
    Route::get('/{adID}/edit', [UserAdsController::class, 'edit'])->name('ads.edit');
    Route::put('/{adID}', [UserAdsController::class, 'update'])->name('ads.update');
    Route::get('/{adID}/delete', [UserAdsController::class, 'delete'])->name('ads.delete');
    Route::delete('/{adID}', [UserAdsController::class, 'destroy'])->name('ads.destroy');

    Route::delete('/search', [UserAdsController::class, 'search'])->name('ads.search');
});

Route::middleware('auth')->prefix('categories')->group(function () {
    Route::post('/category/{id}', [CategoryController::class, 'select'])->name('ads.select');
});
