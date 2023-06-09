<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', [\App\Http\Controllers\ListingController::class, 'index']);
Route::get('/show', [\App\Http\Controllers\IndexController::class, 'show'])->middleware('auth');

Route::resource('listing', \App\Http\Controllers\ListingController::class)->only('index', 'show');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'create'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [\App\Http\Controllers\AuthController::class, 'destroy'])->name('logout');

Route::get('/email/verify', function () {
    return inertia('Auth/VerifyMail');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('listing.index')->with('success', 'Your account have been verified!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::resource('notification', \App\Http\Controllers\NotificationController::class)
    ->middleware('auth')
    ->only('index');

Route::put('notification/{notification}/seen', \App\Http\Controllers\NotificationSeenController::class)
    ->middleware('auth')->name('notification.seen');

//Route::get('register', [\App\Http\Controllers\UserAccountController::class, 'create'])->name('register');
Route::resource('user', \App\Http\Controllers\UserAccountController::class);

Route::resource('listing.offer', \App\Http\Controllers\ListingOfferController::class)
    ->middleware('auth')
    ->only('store');

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::put('listing/{listing}/restore', [\App\Http\Controllers\RealtorListingController::class, 'restore'])->name('listing.restore')->withTrashed();
        Route::resource('listing', \App\Http\Controllers\RealtorListingController::class)->withTrashed();

        Route::name('offer.accept')->put('offer/{offer}/accept', \App\Http\Controllers\RealtorListingAcceptOfferController::class);

        Route::resource('listing.image', \App\Http\Controllers\RealtorListingImageController::class)->only('create', 'store', 'destroy');
    });

