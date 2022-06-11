<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

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


<<<<<<< HEAD
Route::resource('kategori', KategoriController::class);
Route::resource('supplier', SupplierController::class);
=======
// login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionLogout', [LoginController::class, 'actionLogout'])->name('actionlogout')->middleware('auth');

// supplier
Route::resource('supplier', SupplierController::class);

// user
Route::resource('user', UserController::class);
>>>>>>> 09d12f9fedaa8e954d5bce55a79811e2918ad6db
