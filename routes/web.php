<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\UserPanel\{AdvertisementController as UserAdsController, CommentController,  FavoriteController};
use App\Http\Controllers\Front\{AdvertisementController as FrontAdsController, FilterController};
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
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->prefix('categories')->group(function () {
    // Route::post('/category/{id}', [CategoryController::class, 'select'])->name('ads.select');
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
});

Route::middleware('auth')->prefix('ads')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [UserAdsController::class, 'index'])->name('ads.index');
    Route::post('/logout', [UserAdsController::class, 'logout'])->name('ads.logout');
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite');
    Route::post('/storefavorite', [FavoriteController::class, 'store'])->name('storefavorite');
    Route::get('/create', [UserAdsController::class, 'create'])->name('ads.create');
    Route::get('/{adID}', [UserAdsController::class, 'show'])->name('ads.show');
    Route::post('/', [UserAdsController::class, 'store'])->name('ads.store');
    Route::get('/{adID}/edit', [UserAdsController::class, 'edit'])->name('ads.edit');
    Route::put('/{adID}', [UserAdsController::class, 'update'])->name('ads.update');
    Route::get('/{adID}/delete', [UserAdsController::class, 'delete'])->name('ads.delete');
    Route::delete('/{adID}', [UserAdsController::class, 'destroy'])->name('ads.destroy');

    Route::delete('/search', [UserAdsController::class, 'search'])->name('ads.search');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', [FrontAdsController::class, 'index'])->name('index');
    Route::get('/{adID}', [FrontAdsController::class, 'show'])->name('show');
    // Route::get('/d', [UserAdsController::class, 'findAds'])->name('ads.findAds');
});

Route::group(['prefix' => '/filter'], function () {
    Route::get('/category/{catID}', [FilterController::class, 'category'])->name('filter.category');
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
