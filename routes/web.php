<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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




// Route::get('admin', [AdminController::class,'index'])->middleware('checkRole:admin');
// Route::get('pegawai', [PegawaiController::class,'index'])->middleware('checkRole:pegawai');


//route admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('distributors', DistributorController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('mereks', MerekController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('types', TypeController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('barangs', BarangController::class)->middleware(['auth', 'checkRole:admin']);
Route::get('barang-masuk/report', [BarangMasukController::class, 'generateReport'])->name('barang-masuk.report')->middleware(['auth', 'checkRole:admin']);
Route::get('barang-keluar/report', [BarangKeluarController::class, 'generateReport'])->name('barang-keluar.report')->middleware(['auth', 'checkRole:admin']);

// route pegawai
Route::get('barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index')->middleware(['auth', 'checkRole:pegawai,admin']);
Route::get('barang-masuk/create', [BarangMasukController::class, 'create'])->name('barang-masuk.create')->middleware(['auth', 'checkRole:pegawai']);
Route::post('barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store')->middleware(['auth', 'checkRole:pegawai']);
Route::get('barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar.index')->middleware(['auth', 'checkRole:pegawai,admin']);
Route::get('barang-keluar/create', [BarangKeluarController::class, 'create'])->name('barang-keluar.create')->middleware(['auth', 'checkRole:pegawai']);
Route::post('barang-keluar', [BarangKeluarController::class, 'store'])->name('barang-keluar.store')->middleware(['auth', 'checkRole:pegawai']);
