<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OutletController;

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

// pengguna
Route::prefix('/')->group(function () {
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.createpengguna');
    Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.editpengguna');
    Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

});
// outlet
Route::prefix('/')->group(function () {
    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');
    Route::get('/outlet/create', [OutletController::class, 'create'])->name('outlet.createoutlet');
    Route::post('/outlet/store', [OutletController::class, 'store'])->name('outlet.store');
    Route::get('/outlet/{id}/edit', [OutletController::class, 'edit'])->name('outlet.editoutlet');
    Route::post('/outlet/update/{id}', [OutletController::class, 'update'])->name('outlet.update');
    Route::delete('/outlet/delete/{id}', [OutletController::class, 'delete'])->name('outlet.delete');

});