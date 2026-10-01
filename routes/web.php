<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProductController;
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

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/


    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');



/*
|--------------------------------------------------------------------------
| PENJUAL
|--------------------------------------------------------------------------
*/


    // Dashboard Penjual
    Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
        ->name('penjual.dashboard');

    // Produk
    Route::get('/penjual/produk', [ProductController::class, 'index'])
        ->name('penjual.produk');

    Route::get('/penjual/produk/tambah', [ProductController::class, 'create'])
        ->name('penjual.produk.tambah');

    Route::post('/penjual/produk', [ProductController::class, 'store'])
        ->name('penjual.produk.store');

    // Pesanan
    Route::get('/penjual/pesanan', function () {
        return view('penjual.pesanan');
    })->name('penjual.pesanan');

    // Stok
    Route::get('/penjual/stok', function () {
        return view('penjual.stok');
    })->name('penjual.stok');

    // Laporan
    Route::get('/penjual/laporan', function () {
        return view('penjual.laporan');
    })->name('penjual.laporan');

    // Profil
    Route::get('/penjual/profil', function () {
        return view('penjual.profil');
    })->name('penjual.profil');



/*
|--------------------------------------------------------------------------
| PELANGGAN
|--------------------------------------------------------------------------
*/

    // Dashboard Pelanggan
    Route::get('/pelanggan/dashboard', function () {
        return view('home');
    })->name('pelanggan.dashboard');

    // Produk
    Route::get('/produk', function () {
        return view('products.index');
    })->name('produk.index');

    Route::get('/produk/{id}', function ($id) {
        return view('products.show', [
            'id' => $id
        ]);
    })->name('produk.show');

    // Keranjang
    Route::get('/keranjang', function () {
        return view('cart');
    })->name('cart');

    // Checkout
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    // Pembayaran
    Route::get('/pembayaran', function () {
        return view('payment');
    })->name('payment');

    // Pesanan berhasil
    Route::get('/pesanan-berhasil', function () {
        return view('order-success');
    })->name('order.success');

    // Pesanan
    Route::get('/pesanan', function () {
        return view('orders');
    })->name('orders');

    Route::get('/pesanan/{id}', function ($id) {
        return view('order-detail', [
            'id' => $id
        ]);
    })->name('order.detail');

    // Profil
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');