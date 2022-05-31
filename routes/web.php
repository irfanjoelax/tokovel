<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ROUTING WEB
Route::get('/', [App\Http\Controllers\WebController::class, 'index']);
Route::get('/kategori', [App\Http\Controllers\WebController::class, 'kategori']);
Route::get('/kategori/{slug}', [App\Http\Controllers\WebController::class, 'kategoriDetail'])->name('kategori.detail');
Route::get('/produk', [App\Http\Controllers\WebController::class, 'produk']);
Route::get('/produk/{slug}', [App\Http\Controllers\WebController::class, 'produkDetail'])->name('produk.detail');
Route::post('/produk/search', [App\Http\Controllers\WebController::class, 'produkSearch'])->name('produk.search');
Route::get('/keranjang/add/{produk_id}', [App\Http\Controllers\KeranjangController::class, 'addCart'])->name('keranjang.add');

Auth::routes();

// ROUTING USER PEMBELI
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/user/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/user/profile', [App\Http\Controllers\ProfileController::class, 'changeProfile']);
    Route::get('/user/keranjang', [App\Http\Controllers\KeranjangController::class, 'listCart']);
    Route::get('/user/keranjang/delete/{id}', [App\Http\Controllers\KeranjangController::class, 'deleteCart'])->name('keranjang.delete');
    Route::get('/user/checkout', [App\Http\Controllers\KeranjangController::class, 'checkout']);
    Route::post('/user/checkout', [App\Http\Controllers\KeranjangController::class, 'createTransaction']);
    Route::get('/user/order', [App\Http\Controllers\OrderController::class, 'index']);
    Route::get('/user/order/detail/{id}', [App\Http\Controllers\OrderController::class, 'detail'])->name('order.detail');
});

// ROUTING ADMIN PENJUAL
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'changeProfile']);
    Route::resource('/admin/kategori', App\Http\Controllers\KategoriController::class)->except('show');
    Route::resource('/admin/produk', App\Http\Controllers\ProdukController::class)->except('show');
    Route::get('/admin/transaksi', [App\Http\Controllers\TransaksiController::class, 'index']);
    Route::get('/admin/transaksi/detail/{id}', [App\Http\Controllers\TransaksiController::class, 'detail'])->name('transaksi.detail');
    Route::get('/admin/transaksi/detail/update/{id}', [App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');
});
