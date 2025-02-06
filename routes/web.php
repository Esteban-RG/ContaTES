<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/terms', function () {
    return view('terminos');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});