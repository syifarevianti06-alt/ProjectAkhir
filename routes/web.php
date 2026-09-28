<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});


/*
|--------------------------------------------------------------------------
| Produk
|--------------------------------------------------------------------------
*/

Route::get('/produk', function () {
    return view('products.index');
});

Route::get('/produk/{id}', function ($id) {
    return view('products.show', [
        'id' => $id
    ]);
});


/*
|--------------------------------------------------------------------------
| Keranjang & Checkout
|--------------------------------------------------------------------------
*/

Route::get('/keranjang', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});


/*
|--------------------------------------------------------------------------
| Pembayaran
|--------------------------------------------------------------------------
*/

Route::get('/pembayaran', function () {
    return view('payment');
});

Route::get('/pesanan-berhasil', function () {
    return view('order-success');
});


/*
|--------------------------------------------------------------------------
| Pesanan
|--------------------------------------------------------------------------
*/

Route::get('/pesanan', function () {
    return view('orders');
});

Route::get('/pesanan/{id}', function ($id) {
    return view('order-detail', [
        'id' => $id
    ]);
});


/*
|--------------------------------------------------------------------------
| Login & Register
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});


/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/

Route::get('/profil', function () {
    return view('profil');
});