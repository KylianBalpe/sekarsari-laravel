<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MigrationSeedController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [LoginController::class, 'index'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// Route::get('/admin/product/checkSlug', [ProductController::class, 'checkSlug']);


Route::middleware('admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.index', ['title' => 'Dashboard']);
    });
    Route::resource('/admin/product', ProductController::class)->except('show');
    Route::resource('/admin/order', OrderController::class)->except('show');
    Route::get('/migrate-fresh-seed', [MigrationSeedController::class, 'migrateFreshSeed']);
});
