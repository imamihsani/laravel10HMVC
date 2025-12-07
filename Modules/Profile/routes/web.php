<?php

use Illuminate\Support\Facades\Route;
use Modules\Profile\App\Http\Controllers\ProfileController;

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
    // Route::resource('profile', ProfileController::class)->names('profile');
    Route::get('/profile/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('profile/profile/view', [ProfileController::class, 'view'])->name('view');
    Route::post('/profile/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::post('/profile/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/profile/change', [ProfileController::class, 'change'])->name('profile.change');
});
