<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/home/product', [App\Http\Controllers\HomeController::class, 'product'])->name('home.product');
Route::get('/home/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');





Route::middleware(['auth'])->group(function () {
    // Route untuk menampilkan semua permissions
    // Route::get('/superadmin/superadmin/role', [\App\Http\Controllers\PermissionController::class, 'index'])
    //      ->name('permissions.index');

    //

});
