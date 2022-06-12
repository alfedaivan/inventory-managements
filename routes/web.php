<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Models\BarangMasuk;
use App\Models\Barangmasuk as ModelsBarangmasuk;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionLogout', [LoginController::class, 'actionLogout'])->name('actionlogout')->middleware('auth');

// kategori
Route::resource('kategori', KategoriController::class);

// supplier
Route::resource('supplier', SupplierController::class);

// user
Route::resource('user', UserController::class);

// barang
Route::resource('barang', BarangController::class);

// barang masuk
Route::resource('barangmasuk', BarangMasukController::class);

// barang keluar
Route::resource('barangkeluar', BarangKeluarController::class);