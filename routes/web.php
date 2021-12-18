<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\UserPanel\{AdvertisementController as UseruserController, CommentController,  FavoriteController};
use App\Http\Controllers\Front\{AdvertisementController as FrontuserController, FilterController};
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


Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [UseruserController::class, 'index'])->name('user.index');
    Route::post('/logout', [UseruserController::class, 'logout'])->name('user.logout');
    Route::get('/create', [UseruserController::class, 'create'])->name('user.create');
    Route::get('/{adID}', [UseruserController::class, 'show'])->name('user.show');
    Route::post('/', [UseruserController::class, 'store'])->name('user.store');
    Route::get('/{adID}/edit', [UseruserController::class, 'edit'])->name('user.edit');
    Route::put('/{adID}', [UseruserController::class, 'update'])->name('user.update');
    Route::get('/{adID}/delete', [UseruserController::class, 'delete'])->name('user.delete');
    Route::delete('/{adID}', [UseruserController::class, 'destroy'])->name('user.destroy');

    Route::delete('/search', [UseruserController::class, 'search'])->name('user.search');
    Route::group(['prefix' => '/favorite'], function () {
        Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite');
        Route::post('/storefavorite', [FavoriteController::class, 'store'])->name('storefavorite');
    });
});
// route for common
Route::group(['prefix' => '/'], function () {
    Route::get('/', [FrontuserController::class, 'index'])->name('index');
    Route::get('/{adID}', [FrontuserController::class, 'show'])->name('show');
    Route::group(['prefix' => '/filter'], function () {
        Route::get('/category/{catID}', [FilterController::class, 'category'])->name('filter.category');
    });
});

Route::middleware('auth')->prefix('admin')->group(function () {
    // Route::get('/home/{tadID}', [CommentController::class, 'create'])->name('admin.create');
    // Route::get('/users', [CommentController::class, '#'])->name('admin.#');
    // Route::get('/user', [CommentController::class, '#'])->name('admin.#');
    // Route::post('/comments', [AdminPanelCommentController::class, '#'])->name('admin.#');
    // Route::post('/categories', [CategoryController::class, '#'])->name('comments.#');
    Route::middleware('auth')->prefix('comments')->group(function () {

        Route::get('/create/{tadID}', [CommentController::class, 'create'])->name('comments.create');
        Route::post('/{tadID}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::post('/', [CommentController::class, 'store'])->name('comments.store');
        //and some mooooooooooooooooore
    });
    Route::middleware('auth')->prefix('categories')->group(function () {
        // Route::post('/category/{id}', [CategoryController::class, 'select'])->name('user.select');
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    });
});
