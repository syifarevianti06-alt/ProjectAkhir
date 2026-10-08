<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Models\Order;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PenjualProdukController;
use App\Http\Controllers\PenjualProfileController;
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
    $products = Product::latest()->take(5)->get();

    return view('home', compact('products'));
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

// =========================
// ADMIN DASHBOARD
// =========================

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

// =========================
// PENJUAL - DASHBOARD
// =========================

Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])
    ->name('penjual.dashboard');


// =========================
// PENJUAL - PRODUK
// =========================

// =========================
// PENJUAL - PRODUK
// =========================

Route::get('/penjual/produk', [PenjualProdukController::class, 'index'])
    ->name('penjual.produk');

Route::get('/penjual/produk/tambah', [PenjualProdukController::class, 'create'])
    ->name('penjual.produk.create');

Route::post('/penjual/produk', [PenjualProdukController::class, 'store'])
    ->name('penjual.produk.store');

// EDIT HARUS SEBELUM {product}
Route::get('/penjual/produk/{product}/edit', [PenjualProdukController::class, 'edit'])
    ->name('penjual.produk.edit');

Route::put('/penjual/produk/{product}', [PenjualProdukController::class, 'update'])
    ->name('penjual.produk.update');

// DETAIL
Route::get('/penjual/produk/{product}', [PenjualProdukController::class, 'show'])
    ->name('penjual.produk.show');

// HAPUS
Route::delete('/penjual/produk/{product}', [PenjualProdukController::class, 'destroy'])
    ->name('penjual.produk.destroy');

// =========================
// PENJUAL - STOK
// =========================

Route::get('/penjual/stok', [PenjualStokController::class, 'index'])
    ->name('penjual.stok');

Route::put('/penjual/stok/{product}', [PenjualStokController::class, 'update'])
    ->name('penjual.stok.update');


// =========================
// PENJUAL - LAPORAN
// =========================

Route::get('/penjual/laporan', [PenjualLaporanController::class, 'index'])
    ->name('penjual.laporan');


// =========================
// PENJUAL - PESANAN
// =========================

Route::get('/penjual/pesanan', [PenjualPesananController::class, 'index'])
    ->name('penjual.pesanan');

Route::get('/penjual/pesanan/{order}', [PenjualPesananController::class, 'show'])
    ->name('penjual.pesanan.show');

Route::put('/penjual/pesanan/{order}/status', [PenjualPesananController::class, 'updateStatus'])
    ->name('penjual.pesanan.status');


// =========================
// PENJUAL - PROFIL TOKO
// =========================
Route::get('/penjual/profil', [PenjualProfileController::class, 'index'])
    ->name('penjual.profil');

Route::put('/penjual/profil', [PenjualProfileController::class, 'update'])
    ->name('penjual.profil.update');

Route::put('/penjual/profil/password', [PenjualProfileController::class, 'updatePassword'])
    ->name('penjual.profil.password');
/*
|--------------------------------------------------------------------------
| PELANGGAN
|--------------------------------------------------------------------------
*/

// =========================
// HOME PELANGGAN
// =========================

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
Route::get('/keranjang', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/keranjang', [CartController::class, 'store'])
    ->name('cart.store');

Route::put('/keranjang/{cartItem}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/keranjang/{cartItem}', [CartController::class, 'destroy'])
    ->name('cart.destroy');


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

Route::get('/pembayaran/{order}', function (\App\Models\Order $order) {

    abort_unless($order->user_id === auth()->id(), 403);

    return view('payment', compact('order'));

})->name('payment.qris');
Route::post('/pembayaran/{order}/success', function (\App\Models\Order $order) {

    abort_unless($order->user_id === auth()->id(), 403);

    $order->update([
        'status' => 'paid',
        'paid_at' => now(),
    ]);

    return redirect()
        ->route('orders')
        ->with('success', 'Pembayaran berhasil dikonfirmasi.');

})->name('payment.qris.success');


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
    $orders = Order::with('items')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('order', compact('orders'));
})->name('orders');

Route::get('/pesanan/{order}', function (Order $order) {
    abort_unless($order->user_id === auth()->id(), 403);

    $order->load('items');

    return view('order-detail', compact('order'));
})->name('order-detail');


// =========================
// PROFIL PELANGGAN
// =========================

Route::get('/profil', [PelangganProfileController::class, 'edit'])
    ->name('profil');

Route::put('/profil', [PelangganProfileController::class, 'update'])
    ->name('profil.update');