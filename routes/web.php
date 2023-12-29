<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TambahjumlahbarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KeranjangController;


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
    return view('tampilantoko.home.home');
});
//tampilan toko
Route::resource('/Home', HomeController::class);
Route::resource('/About', TentangController::class);
Route::resource('/Shop', ShopController::class);
Route::resource('/profil', ContacController::class);
Route::resource('/keranjang', KeranjangController::class);


//admin controller
Route::resource('/dashboard', AdminController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/transaksi', TransaksiController::class);
Route::resource('/user', UserController::class);

// login
Route::resource('/login', LoginController::class);
Route::resource('/registrasi', RegisterController::class);

// tambah barang
Route::put('/tambahbarang', [TambahjumlahbarangController::class, 'update']);

//loginout
Route::get('/logout',[LoginController::class,'logout']);






