<?php

use App\Http\Controllers\auth\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('store-user', [UserController::class, 'storeUser'])->name('store.user');
Route::post('login-attempt', [UserController::class, 'loginAttempt'])->name('login.attempt');

//logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');
Route::get('/reset-password/{token}', function () {
    return view('auth.reset-password');
})->name('password.reset');
Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', function () {
    return view('auth.verify-email');
})->name('verification.verify');
Route::get('/verify-email/resend', function () {
    return view('auth.verify-email');
})->name('verification.resend');
Route::get('/terms', function () {
    return view('auth.terms');
})->name('terms');
Route::get('/privacy', function () {
    return view('auth.privacy');
})->name('privacy');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.main.index');
    })->name('dashboard');

    // customer route
    Route::resource('customer', \App\Http\Controllers\admin\CustomerController::class);
    // page route
    Route::resource('page', \App\Http\Controllers\admin\PageController::class);
    // faq route
    Route::resource('faq', \App\Http\Controllers\admin\FaqController::class);
    // write route
    Route::resource('writer', \App\Http\Controllers\admin\WriterController::class);
    // profile route
    Route::get('/profile', [\App\Http\Controllers\admin\ProfileController::class, 'index'])->name('profile');
});
