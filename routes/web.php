<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{AdvertisementController};

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
Route::get('/', [AdvertisementController::class, 'index'])->name('index');

Route::middleware('auth')->prefix('advertisements')->group(function () {
    Route::get('/{id}', [AdvertisementController::class, 'show'])->name('show');
});
