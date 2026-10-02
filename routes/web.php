<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PenjualStokController;
use App\Http\Controllers\PenjualLaporanController;
use App\Http\Controllers\PenjualPesananController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/penjual', function () {
    return redirect()->route('penjual.dashboard');
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


// ========================================
// ADMIN
// TANPA MIDDLEWARE AUTH
// ========================================

// Dashboard Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

// ADMIN - PESANAN
Route::get('/admin/pesanan', [AdminOrderController::class, 'index'])
    ->name('admin.pesanan');

Route::get('/admin/pesanan/{order}', [AdminOrderController::class, 'show'])
    ->name('admin.pesanan.show');

Route::put('/admin/pesanan/{order}/status', [AdminOrderController::class, 'updateStatus'])
    ->name('admin.pesanan.status');

// ADMIN - LAPORAN
Route::get('/admin/laporan', [AdminReportController::class, 'index'])
    ->name('admin.laporan');

// ========================================
// KELOLA PENGGUNA
// ========================================

// Menampilkan daftar pengguna
Route::get('/admin/pengguna', [UserController::class, 'index'])
    ->name('admin.pengguna');

// Form tambah pengguna
Route::get('/admin/pengguna/tambah', [UserController::class, 'create'])
    ->name('admin.pengguna.create');

// Menyimpan pengguna
Route::post('/admin/pengguna', [UserController::class, 'store'])
    ->name('admin.pengguna.store');

// Form edit pengguna
Route::get('/admin/pengguna/{user}/edit', [UserController::class, 'edit'])
    ->name('admin.pengguna.edit');

// Update pengguna
Route::put('/admin/pengguna/{user}', [UserController::class, 'update'])
    ->name('admin.pengguna.update');

// Hapus pengguna
Route::delete('/admin/pengguna/{user}', [UserController::class, 'destroy'])
    ->name('admin.pengguna.destroy');


// ========================================
// KELOLA PRODUK
// ========================================

// Menampilkan daftar produk
Route::get('/admin/produk', [AdminProductController::class, 'index'])
    ->name('admin.produk');

// Form tambah produk
Route::get('/admin/produk/tambah', [AdminProductController::class, 'create'])
    ->name('admin.produk.create');

// Menyimpan produk
Route::post('/admin/produk', [AdminProductController::class, 'store'])
    ->name('admin.produk.store');

// Form edit produk
Route::get('/admin/produk/{product}/edit', [AdminProductController::class, 'edit'])
    ->name('admin.produk.edit');

// Update produk
Route::put('/admin/produk/{product}', [AdminProductController::class, 'update'])
    ->name('admin.produk.update');

// Hapus produk
Route::delete('/admin/produk/{product}', [AdminProductController::class, 'destroy'])
    ->name('admin.produk.destroy');
/*
|--------------------------------------------------------------------------
| PENJUAL
|--------------------------------------------------------------------------
*/

Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
    ->name('penjual.dashboard');

Route::get('/penjual/produk', [ProductController::class, 'index'])
    ->name('penjual.produk');

Route::get('/penjual/produk/tambah', [ProductController::class, 'create'])
    ->name('penjual.produk.create');

Route::post('/penjual/produk', [ProductController::class, 'store'])
    ->name('penjual.produk.store');

Route::get('/penjual/produk/{product}/edit', [ProductController::class, 'edit'])
    ->name('penjual.produk.edit');

Route::put('/penjual/produk/{product}', [ProductController::class, 'update'])
    ->name('penjual.produk.update');

Route::delete('/penjual/produk/{product}', [ProductController::class, 'destroy'])
    ->name('penjual.produk.destroy');

    // =========================================================
// PESANAN PENJUAL
// =========================================================

Route::get('/penjual/pesanan', [PenjualPesananController::class, 'index'])
    ->name('penjual.pesanan');

Route::get('/penjual/pesanan/{order}', [PenjualPesananController::class, 'show'])
    ->name('penjual.pesanan.show');

Route::put('/penjual/pesanan/{order}/status', [PenjualPesananController::class, 'updateStatus'])
    ->name('penjual.pesanan.status');
/*
|--------------------------------------------------------------------------
| PELANGGAN
|--------------------------------------------------------------------------
*/

// Dashboard Pelanggan
Route::get('/pelanggan/home', function () {
    return view('home');
})->name('pelanggan.home');

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
