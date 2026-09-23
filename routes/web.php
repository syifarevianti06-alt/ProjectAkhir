<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualPesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin
// Dashboard Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::resource('/admin/kategori', KategoriController::class)
        ->except(['show']);
});

// Dashboard Penjual
Route::middleware(['auth', 'role:penjual'])->group(function () {

    Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
        ->name('penjual.dashboard');

    Route::resource('/penjual/produk', ProdukController::class)
        ->except(['show']);

    Route::get('/penjual/pesanan', [PenjualPesananController::class, 'index'])
        ->name('penjual.pesanan.index');

    Route::get('/penjual/pesanan/{pesanan}', [PenjualPesananController::class, 'show'])
        ->name('penjual.pesanan.show');

    Route::put('/penjual/pesanan/{pesanan}/status', [PenjualPesananController::class, 'updateStatus'])
        ->name('penjual.pesanan.status');
});
// Dashboard Pelanggan
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', [PelangganController::class, 'dashboard'])
        ->name('pelanggan.dashboard');
});