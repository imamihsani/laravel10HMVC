<?php

use Illuminate\Support\Facades\Route;
use Modules\Pengguna\App\Http\Controllers\PenggunaController;

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

Route::group([], function () {
    Route::get('/pengguna/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('pengguna/pengguna/view', [PenggunaController::class, 'view'])->name('view');
    Route::post('pengguna/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('pengguna/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
});
