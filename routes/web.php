<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\{AdvertisementController as UserController, CommentController,  FavoriteController};
use App\Http\Controllers\common\{AdvertisementController as CommonController, FilterController};
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
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::group(['prefix' => '/favorite'], function () {
        Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite');
        Route::post('/storefavorite', [FavoriteController::class, 'store'])->name('storefavorite');
    });
});
// route for common
Route::group(['prefix' => '/'], function () {
    Route::get('/', [CommonController::class, 'index'])->name('index');
    Route::get('/{id}', [CommonController::class, 'show'])->name('show');
    Route::delete('/search', [UserController::class, 'search'])->name('user.search');
    Route::group(['prefix' => '/filter'], function () {
        Route::get('/category/{id}', [FilterController::class, 'category'])->name('filter.category');
    });
});

Route::middleware('auth')->prefix('admin')->group(function () {
    // Route::get('/home/{id}', [CommentController::class, 'create'])->name('admin.create');
    // Route::get('/users', [CommentController::class, '#'])->name('admin.#');
    // Route::get('/user', [CommentController::class, '#'])->name('admin.#');
    // Route::post('/comments', [AdminPanelCommentController::class, '#'])->name('admin.#');
    // Route::post('/categories', [CategoryController::class, '#'])->name('comments.#');
    Route::middleware('auth')->prefix('comment')->group(function () {

        Route::get('/create/{id}', [CommentController::class, 'create'])->name('comments.create');
        Route::post('/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
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
