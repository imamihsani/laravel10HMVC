<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AdminController;
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
    Route::get('admin/admin/view', [AdminController::class, 'view'])->name('view');
    Route::post('admin/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/admin/show', [AdminController::class, 'show'])->name('admin.show');
});
