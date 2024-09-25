<?php

use Illuminate\Support\Facades\Route;

// ADMIN
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
    return "Hello Laravel!";
});

Route::get('/test_var', function() {
    return view('test', ['message' => 'Hello Laravel from Variable']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [
        DashboardController::class, 'index'
    ])->name('dashboard');

    // KATEGORI
    Route::get('/kategori', [
        KategoriController::class, 'index'
    ])->name('kategori');
    Route::get('/kategori/tambah', [
        KategoriController::class, 'create'
    ])->name('tambah_kategori');
    Route::post('/kategori/simpan', [
        KategoriController::class, 'store'
    ])->name('simpan_kategori');
    Route::get('/kategori/edit/{id}', [
        KategoriController::class, 'edit'
    ])->name('edit_kategori');
    Route::put('/kategori/update/{id}', [
        KategoriController::class, 'update'
    ])->name('update_kategori');
    Route::delete('/kategori/hapus/{id}', [
        KategoriController::class, 'destroy'
    ])->name('hapus_kategori');

    // PRODUK
    Route::get('/produk', [
        ProdukController::class, 'index'
    ])->name('produk');
    Route::get('/produk/tambah', [
        ProdukController::class, 'create'
    ])->name('tambah_produk');
    Route::post('/produk/simpan', [
        ProdukController::class, 'store'
    ])->name('simpan_produk');
    Route::get('/produk/edit/{id}', [
        ProdukController::class, 'edit'
    ])->name('edit_produk');
    Route::patch('/produk/update/{id}', [
        ProdukController::class, 'update'
    ])->name('update_produk');
    Route::delete('/produk/hapus/{id}', [
        ProdukController::class, 'destroy'
    ])->name('hapus_produk');

    // TRANSAKSI
    

    // PRODUK
    Route::get('/transaksi', [
        TransaksiController::class, 'index'
    ])->name('transaksi');
    // Route::get('/transaksi/tambah', [
    //     TransaksiController::class, 'create'
    // ])->name('tambah_transaksi');
    // Route::post('/transaksi/simpan', [
    //     TransaksiController::class, 'store'
    // ])->name('simpan_transaksi');
    // Route::get('/transaksi/edit/{id}', [
    //     TransaksiController::class, 'edit'
    // ])->name('edit_transaksi');
    // Route::patch('/transaksi/update/{id}', [
    //     TransaksiController::class, 'update'
    // ])->name('update_transaksi');
    // Route::delete('/transaksi/hapus/{id}', [
    //     TransaksiController::class, 'destroy'
    // ])->name('hapus_transaksi');
    Route::post('/transaksi/import', [
        TransaksiController::class, 'import'
    ])->name('import_transaksi');
    Route::get('/transaksi/export', [
        TransaksiController::class, 'export'
    ])->name('export_transaksi');
});