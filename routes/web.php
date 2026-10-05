<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PenjualStokController;
use App\Http\Controllers\PenjualLaporanController;
use App\Http\Controllers\PenjualPesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelangganProfileController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| LOGIN & REGISTER
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
| HOME PELANGGAN
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| REDIRECT PENJUAL
|--------------------------------------------------------------------------
*/

Route::get('/penjual', function () {
    return redirect()->route('penjual.dashboard');
});


/*
|--------------------------------------------------------------------------
| ADMIN
| TANPA MIDDLEWARE AUTH
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');


// =========================
// ADMIN PESANAN
// =========================

Route::get('/admin/pesanan', [AdminOrderController::class, 'index'])
    ->name('admin.pesanan');

Route::get('/admin/pesanan/{order}', [AdminOrderController::class, 'show'])
    ->name('admin.pesanan.show');

Route::put('/admin/pesanan/{order}/status', [AdminOrderController::class, 'updateStatus'])
    ->name('admin.pesanan.status');


// =========================
// ADMIN LAPORAN
// =========================

Route::get('/admin/laporan', [AdminReportController::class, 'index'])
    ->name('admin.laporan');


// =========================
// ADMIN PENGGUNA
// =========================

Route::get('/admin/pengguna', [UserController::class, 'index'])
    ->name('admin.pengguna');

Route::get('/admin/pengguna/tambah', [UserController::class, 'create'])
    ->name('admin.pengguna.create');

Route::post('/admin/pengguna', [UserController::class, 'store'])
    ->name('admin.pengguna.store');

Route::get('/admin/pengguna/{user}/edit', [UserController::class, 'edit'])
    ->name('admin.pengguna.edit');

Route::put('/admin/pengguna/{user}', [UserController::class, 'update'])
    ->name('admin.pengguna.update');

Route::delete('/admin/pengguna/{user}', [UserController::class, 'destroy'])
    ->name('admin.pengguna.destroy');


// =========================
// ADMIN PRODUK
// =========================

Route::get('/admin/produk', [AdminProductController::class, 'index'])
    ->name('admin.produk');

Route::get('/admin/produk/tambah', [AdminProductController::class, 'create'])
    ->name('admin.produk.create');

Route::post('/admin/produk', [AdminProductController::class, 'store'])
    ->name('admin.produk.store');

Route::get('/admin/produk/{product}/edit', [AdminProductController::class, 'edit'])
    ->name('admin.produk.edit');

Route::put('/admin/produk/{product}', [AdminProductController::class, 'update'])
    ->name('admin.produk.update');

Route::delete('/admin/produk/{product}', [AdminProductController::class, 'destroy'])
    ->name('admin.produk.destroy');


/*
|--------------------------------------------------------------------------
| PENJUAL
|--------------------------------------------------------------------------
*/

// =========================
// DASHBOARD
// =========================

Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
    ->name('penjual.dashboard');


// =========================
// PRODUK
// =========================


Route::get('/produk', [CustomerProductController::class, 'index'])
    ->name('produk.index');

Route::get('/produk/{id}', [CustomerProductController::class, 'show'])
    ->name('produk.show');

// =========================
// STOK
// =========================

Route::get('/penjual/stok', [PenjualStokController::class, 'index'])
    ->name('penjual.stok');

Route::put('/penjual/stok/{product}', [PenjualStokController::class, 'update'])
    ->name('penjual.stok.update');


// =========================
// LAPORAN
// =========================

Route::get('/penjual/laporan', [PenjualLaporanController::class, 'index'])
    ->name('penjual.laporan');


// =========================
// PESANAN
// =========================

Route::get('/penjual/pesanan', [PenjualPesananController::class, 'index'])
    ->name('penjual.pesanan');

Route::get('/penjual/pesanan/{order}', [PenjualPesananController::class, 'show'])
    ->name('penjual.pesanan.show');

Route::put('/penjual/pesanan/{order}/status', [PenjualPesananController::class, 'updateStatus'])
    ->name('penjual.pesanan.status');

Route::get('/penjual/profil', function () {
    return view('penjual.profil');
})->name('penjual.profil');
/*
|--------------------------------------------------------------------------
| PELANGGAN
|--------------------------------------------------------------------------
*/

// Home pelanggan
Route::get('/pelanggan/home', function () {
    return view('home');
})->name('pelanggan.home');


// =========================
// PRODUK
// =========================
Route::get('/produk', [CustomerProductController::class, 'index'])
    ->name('produk.index');

Route::get('/produk/{id}', [CustomerProductController::class, 'show'])
    ->name('produk.show');

// =========================
// KERANJANG
// =========================

Route::get('/keranjang', function () {
    return view('cart');
})->name('cart');


// =========================
// CHECKOUT
// =========================
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');


// =========================
// PEMBAYARAN
// =========================

Route::get('/pembayaran', function () {
    return view('payment');
})->name('payment');


// =========================
// PESANAN BERHASIL
// =========================

Route::get('/pesanan-berhasil', function () {
    return view('order-success');
})->name('order.success');


// =========================
// PESANAN PELANGGAN
// =========================

Route::get('/pesanan', function () {
    return view('order', [
        'orders' => \App\Models\Order::with('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->get()
    ]);
})->name('orders');

// =========================
// PROFIL
// =========================

Route::get('/profil', [PelangganProfileController::class, 'edit'])
    ->name('profil');

Route::put('/profil', [PelangganProfileController::class, 'update'])
    ->name('profil.update');