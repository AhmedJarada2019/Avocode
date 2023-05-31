<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', function () {
    return view('admin.index');
});
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::group(['prefix' => 'intros', 'as' => 'intros.'], function () {
        Route::get('/', [IntroController::class, 'index'])->name('index');
        Route::post('/', [IntroController::class, 'store'])->name('store');
        Route::put('/update_status', [IntroController::class, 'updateStatus'])->name('updateStatus');
        Route::put('/{uuid}', [IntroController::class, 'update'])->name('update');
        Route::delete('/{uuid}', [IntroController::class, 'destroy'])->name('destroy');
        Route::get('/indexTable', [IntroController::class, 'indexTable'])->name('indexTable');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::put('/update_status', [CategoryController::class, 'updateStatus'])->name('updateStatus');
        Route::put('/{uuid}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{uuid}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::get('/indexTable', [CategoryController::class, 'indexTable'])->name('indexTable');
    });
    Route::group(['prefix' => 'sub-categories', 'as' => 'sub-categories.'], function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::post('/', [SubCategoryController::class, 'store'])->name('store');
        Route::put('/update_status', [SubCategoryController::class, 'updateStatus'])->name('updateStatus');
        Route::put('/{uuid}', [SubCategoryController::class, 'update'])->name('update');
        Route::delete('/{uuid}', [SubCategoryController::class, 'destroy'])->name('destroy');
        Route::get('/indexTable', [SubCategoryController::class, 'indexTable'])->name('indexTable');
    });
    Route::group(['prefix' => 'Ads', 'as' => 'Ads.'], function () {
        Route::get('/', [AdController::class, 'index'])->name('index');
        Route::post('/', [AdController::class, 'store'])->name('store');
        Route::put('/update_status', [AdController::class, 'updateStatus'])->name('updateStatus');
        Route::put('/{uuid}', [AdController::class, 'update'])->name('update');
        Route::delete('/{uuid}', [AdController::class, 'destroy'])->name('destroy');
        Route::get('/indexTable', [AdController::class, 'indexTable'])->name('indexTable');
    });
    Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::put('/update_status', [ServiceController::class, 'updateStatus'])->name('updateStatus');
        Route::put('/{uuid}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{uuid}', [ServiceController::class, 'destroy'])->name('destroy');
        Route::get('/indexTable', [ServiceController::class, 'indexTable'])->name('indexTable');
    });
});
