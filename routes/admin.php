<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProducController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SettingController;
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

Route::get('/admin', [IndexController::class, 'index'])->name('admin');


Route::group(['as' => 'dashboard.'], function (){

    Route::put('/setting/{setting}/update', [SettingController::class, 'update'])->name('settings.update');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');

    Route::get('categories/ajax', [CategoryController::class, 'getall'])->name('categories.getall');
    Route::delete('categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::resource('categories', CategoryController::class)->except('destroy', 'create', 'show');


    Route::get('Products/ajax', [ProducController::class, 'getall'])->name('Products.getall');
    Route::delete('Products/delete', [ProducController::class, 'delete'])->name('Products.delete');
    Route::get('Products/delete/Images/{id}', [ProducController::class, 'deleteImages'])->name('Products.images.delete');
    Route::resource('Products', ProducController::class)->except('show');

});

