<?php

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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);
Route::get('/show', [\App\Http\Controllers\IndexController::class, 'show'])->middleware('auth');

Route::resource('listing', \App\Http\Controllers\ListingController::class);

Route::get('login', [\App\Http\Controllers\AuthController::class, 'create'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [\App\Http\Controllers\AuthController::class, 'destroy'])->name('logout');

//Route::get('register', [\App\Http\Controllers\UserAccountController::class, 'create'])->name('register');
Route::resource('user', \App\Http\Controllers\UserAccountController::class);

Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function () {
    Route::resource('listing', \App\Http\Controllers\RealtorListingController::class);
});
