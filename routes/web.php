<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegispelController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\EntriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\GmapsController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// home
Route::get('/home', [HomeController::class, 'index'])->name('dashboard.dash');

// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/edit/{id}', [ProfileController::class, 'update'])->name('profile.edit');

// pengguna
Route::prefix('pengguna')->group(function () {
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.createpengguna');
    Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.editpengguna');
    Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');
    // toko
    Route::get('/toko/create', [PenggunaController::class, 'createtoko'])->name('toko.createtoko');
    Route::post('/toko/store', [PenggunaController::class, 'storetoko'])->name('toko.store');
    Route::get('/toko/{id}/edit', [PenggunaController::class, 'edittoko'])->name('toko.edittoko');
    Route::post('/toko/update/{id}', [PenggunaController::class, 'updatetoko'])->name('toko.update');
    Route::delete('/toko/delete/{id}', [PenggunaController::class, 'deletetoko'])->name('toko.delete');
});
// outlet
Route::prefix('outlet')->group(function () {
    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');
    Route::get('/outlet/create', [OutletController::class, 'create'])->name('outlet.createoutlet');
    Route::post('/outlet/store', [OutletController::class, 'store'])->name('outlet.store');
    Route::get('/outlet/{id}/edit', [OutletController::class, 'edit'])->name('outlet.editoutlet');
    Route::post('/outlet/update/{id}', [OutletController::class, 'update'])->name('outlet.update');
    Route::delete('/outlet/delete/{id}', [OutletController::class, 'delete'])->name('outlet.delete');
});

// Produk
Route::prefix('paket')->group(function () {
    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.createpaket');
    Route::post('/paket/store', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/paket/{id}/edit', [PaketController::class, 'edit'])->name('paket.editpaket');
    Route::post('/paket/update/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/paket/delete/{id}', [PaketController::class, 'delete'])->name('paket.delete');
});

// Register Pelanggan
Route::prefix('regispel')->group(function () {
    Route::get('/regispel', [RegispelController::class, 'index'])->name('regispel.index');
    Route::get('/regispel/createmember', [RegispelController::class, 'createmember'])->name('regispel.createmember');
    Route::post('/regispel/store', [RegispelController::class, 'store'])->name('regispel.store');
    Route::get('/regispel/indexmember', [RegispelController::class, 'indexmember'])->name('regispel.indexmember');
    Route::get('/regispel/{id}/edit', [RegispelController::class, 'edit'])->name('regispel.edit');
    Route::post('/regispel/update/{id}', [RegispelController::class, 'update'])->name('regispel.update');
    Route::get('/regispel/delete/{id}', [RegispelController::class, 'delete'])->name('regispel.delete');
});

// Transaksi
Route::prefix('order')->group(function () {
    Route::get('/order', [TransaksiController::class, 'create'])->name('order.createorder');
    Route::post('/getPaket', [TransaksiController::class, 'getPaket']);
    Route::post('/getHarga', [TransaksiController::class, 'getHarga']);
    Route::post('/store', [TransaksiController::class, 'store'])->name('order.store');
    Route::get('/riwayat', [TransaksiController::class, 'index'])->name('order.riwayatorder');
    Route::get('/riwayat/show{id}', [TransaksiController::class, 'show'])->name('order-showorder');
    Route::post('/riwayat/cancel{id}', [TransaksiController::class, 'cancel'])->name('order.cancel');
});

Route::prefix('entri')->group(function () {
    Route::get('/entri', [EntriController::class, 'index'])->name('entri.index');
    Route::get('/entri/edit/{id}', [EntriController::class, 'edit'])->name('entri.edit');
    Route::post('/entri/update/{id}', [EntriController::class, 'update'])->name('entri.update');
    Route::get('/entri/show/{id}', [EntriController::class, 'show'])->name('entri.show');
    Route::delete('/entri/delete/{id}', [EntriController::class, 'delete'])->name('entri.delete');
    Route::get('/pesananbatal', [EntriController::class, 'trash'])->name('entri.pesananBatal');
});
Route::prefix('laporan')->group(function () {
    Route::get('/index', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/index/laporan', [LaporanController::class, 'laporanPDF'])->name('laporan.pdf');
});
Route::post('/index/filter',[LaporanController::class,'filter'])->name('laporan.filter');

Route::prefix('gmaps')->group(function () {
    Route::get('/index', [GmapsController::class, 'index'])->name('gmaps.index');
});

// Route::get('/', function () {
//     return view('auth.login');
// });