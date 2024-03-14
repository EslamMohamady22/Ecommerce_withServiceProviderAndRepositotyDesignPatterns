<?php

use App\Http\Controllers\Site\ProducController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::middleware(['auth', 'checkUser'])->group(function () {
    Route::resource('Products', ProducController::class);
    Route::get('/', [SiteController::class , 'index'])->name('home');
    Route::get('/Products-ajax', [ProducController::class, 'getAll'])->name('Products.getall');

    Route::get('/Products-ajax_color', [ProducController::class, 'color']);
    Route::get('/Products-ajax_size', [ProducController::class, 'size']);
    Route::post('/Products_ajax_price', [ProducController::class, 'price']);

});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'checkUser']);
// Route::get('/posts', [ProducController::class, 'index']);
// Route::post('/posts/filter', [ProducController::class, 'filter']);


