<?php

use Illuminate\Support\Facades\Route;
use Modules\Superadmin\App\Http\Controllers\SuperadminController;
use Modules\Superadmin\App\Http\Controllers\RoleController;

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
    Route::get('superadmin/superadmin/view', [SuperadminController::class, 'view'])->name('superadmin.view');
    Route::get('superadmin/superadmin', [SuperadminController::class, 'index'])->name('superadmin.index');
    Route::get('superadmin/superadmin/role', [SuperadminController::class, 'role'])->name('superadmin.role');
    Route::post('superadmin/superadmin/store', [SuperadminController::class, 'store'])->name('superadmin.store');
});


