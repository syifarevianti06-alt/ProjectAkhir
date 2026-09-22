<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('beranda');
});

Route::get('/produk', function () {
    return view('produk.index');
});