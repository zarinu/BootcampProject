<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\{AdvertisementController as UserAdController, CommentController as CommentUserAdController,  FavoriteController};
use App\Http\Controllers\common\{AdvertisementController as CommonAdController, FilterController};
use App\Http\Controllers\admin\{CategoryController, commentController as CommentAdminController};
use App\Http\Controllers\admin\AdminPanelController;
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

Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [UserAdController::class, 'logout'])->name('logout');

    Route::group(['prefix' => '/ad'], function () {
        Route::get('/', [UserAdController::class, 'index'])->name('ad.index');
        Route::get('/create', [UserAdController::class, 'create'])->name('ad.create');
        Route::get('/{id}', [UserAdController::class, 'show'])->name('ad.show');
        Route::post('/', [UserAdController::class, 'store'])->name('ad.store');
        Route::get('/{id}/edit', [UserAdController::class, 'edit'])->name('ad.edit');
        Route::put('/{id}', [UserAdController::class, 'update'])->name('ad.update');
        Route::get('/{id}/delete', [UserAdController::class, 'delete'])->name('ad.delete');
        Route::delete('/{id}', [UserAdController::class, 'destroy'])->name('ad.destroy');
    });
    Route::group(['prefix' => '/favorite'], function () {
        Route::get('/', [FavoriteController::class, 'index'])->name('favorite.index');
        Route::post('/store', [FavoriteController::class, 'store'])->name('favorite.store');
        Route::delete('/delete', [FavoriteController::class, 'delete'])->name('favorite.delete');
        Route::get('/allU', [FavoriteController::class, 'index'])->name('favorite.index');
    });

    Route::prefix('comment')->group(function () {
        Route::get('/allU', [CommentUserAdController::class, 'index'])->name('comment.index');
        Route::get('/create/{id}', [CommentUserAdController::class, 'create'])->name('comment.create');
        Route::post('/', [CommentUserAdController::class, 'store'])->name('comment.store');
        //and some mooooooooooooooooore
    });
});
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminPanelController::class, 'index'])->name('admin.index');
    // Route::get('/home/{id}', [CommentController::class, 'create'])->name('admin.create');
    // Route::get('/users', [CommentController::class, '#'])->name('admin.#');
    // Route::get('/user', [CommentController::class, '#'])->name('admin.#');
    // Route::post('/comments', [AdminPanelCommentController::class, '#'])->name('admin.#');
    // Route::post('/categories', [CategoryController::class, '#'])->name('comments.#');
    Route::prefix('comment')->group(function () {
        Route::post('/', [CommentAdminController::class, 'index'])->name('comment.indexix');
        Route::post('/{id}/edit', [CommentAdminController::class, 'edit'])->name('comment.edit');
        Route::post('/{id}/delete', [CommentAdminController::class, 'delete'])->name('comment.delete');
    });
    Route::prefix('category')->group(function () {
        // Route::post('/category/{id}', [CategoryController::class, 'select'])->name('user.select');
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/{category}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    });
});
// route for common
Route::group(['prefix' => '/'], function () {
    Route::get('/', [CommonAdController::class, 'index'])->name('index');
    Route::get('/{id}', [CommonAdController::class, 'show'])->name('show');
    Route::delete('/search', [UserAdController::class, 'search'])->name('ad.search');
    Route::group(['prefix' => '/filter'], function () {
        Route::get('/category/{id}', [FilterController::class, 'category'])->name('filter.category');
        Route::get('/favoritest', [FilterController::class, 'favoritest'])->name('filter.favoritest');
    });
});
