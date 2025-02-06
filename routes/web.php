<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('guest');
});



Route::get('/contact', function () {
    return view('contact');
});

Route::get('/terms', function () {
    return view('terminos');
});

Route::get('/forgot', function () {
    return view('auth.forgot-password');
});





Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

