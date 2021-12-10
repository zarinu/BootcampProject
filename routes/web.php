<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\UserPanel\AdvertisementController as UserAdsController;
use App\Http\Controllers\Front\AdvertisementController as FrontAdsController;
use App\Http\Controllers\Panel\AdminPanel\CategoryController;
use App\Http\Controllers\Panel\UserPanel\CommentController;
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

Route::group(['prefix' => '/'], function () {
    Route::get('/', [FrontAdsController::class, 'index'])->name('index');
    Route::get('/{adID}', [FrontAdsController::class, 'show'])->name('show');
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

Route::middleware('auth')->prefix('comments')->group(function () {

    Route::get('/create/{tadID}', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/{tadID}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::post('/', [CommentController::class, 'store'])->name('comments.store');
    //and some mooooooooooooooooore
});

// Route::middleware('auth')->prefix('admin')->group(function () {
//     Route::get('/home/{tadID}', [CommentController::class, 'create'])->name('admin.create');
//     Route::get('/users', [CommentController::class, '#'])->name('admin.#');
//     Route::get('/ads', [CommentController::class, '#'])->name('admin.#');
//     Route::post('/comments', [AdminPanelCommentController::class, '#'])->name('admin.#');
//     Route::post('/categories', [CategoryController::class, '#'])->name('comments.#');

// });
