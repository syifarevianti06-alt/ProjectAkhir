<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/keranjang/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/keranjang/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/alamat/tambah', [AddressController::class, 'create'])->name('addresses.create');
    Route::get('/alamat/{address}/ubah', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::post('/alamat', [AddressController::class, 'store'])->name('addresses.store');
    Route::put('/alamat/{address}', [AddressController::class, 'update'])->name('addresses.update');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/pembayaran/{order}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/pembayaran/{order}/konfirmasi', [PaymentController::class, 'confirm'])->name('payment.confirm');

    Route::get('/checkout/{order}/berhasil', [OrderController::class, 'success'])->name('checkout.success');
    Route::get('/pesanan', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/pesanan/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
});