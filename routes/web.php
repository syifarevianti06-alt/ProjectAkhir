<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Login & Register
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

});


/*
|--------------------------------------------------------------------------
| Dashboard Penjual
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:penjual'])->group(function () {

    Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
        ->name('penjual.dashboard');

});


/*
|--------------------------------------------------------------------------
| Dashboard Pelanggan
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/pelanggan/dashboard', [PelangganController::class, 'dashboard'])
        ->name('pelanggan.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Produk
    |--------------------------------------------------------------------------
    */

    Route::get('/produk', function () {
        return view('products.index');
    })->name('produk.index');


    Route::get('/produk/{id}', function ($id) {
        return view('products.show', [
            'id' => $id
        ]);
    })->name('produk.show');


    /*
    |--------------------------------------------------------------------------
    | Keranjang & Checkout
    |--------------------------------------------------------------------------
    */

    Route::get('/keranjang', function () {
        return view('cart');
    })->name('cart');


    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');


    /*
    |--------------------------------------------------------------------------
    | Pembayaran
    |--------------------------------------------------------------------------
    */

    Route::get('/pembayaran', function () {
        return view('payment');
    })->name('payment');


    Route::get('/pesanan-berhasil', function () {
        return view('order-success');
    })->name('order.success');


    /*
    |--------------------------------------------------------------------------
    | Pesanan
    |--------------------------------------------------------------------------
    */

    Route::get('/pesanan', function () {
        return view('orders');
    })->name('orders');


    Route::get('/pesanan/{id}', function ($id) {
        return view('order-detail', [
            'id' => $id
        ]);
    })->name('order.detail');


    /*
    |--------------------------------------------------------------------------
    | Profil
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');

});
