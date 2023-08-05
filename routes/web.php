<?php

use App\Http\Middleware\RoleAkses;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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
    return view('auth/register');
});


// buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index')->middleware('RoleAkses:admin');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create')->middleware('RoleAkses:admin');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store')->middleware('RoleAkses:admin');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show')->middleware('RoleAkses:admin');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit')->middleware('RoleAkses:admin');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update')->middleware('RoleAkses:admin');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy')->middleware('RoleAkses:admin');

Route::get('/member/buku', [BukuController::class, 'bukuMember'])->middleware('RoleAkses:member');
Route::get('/unduh-buku/{id}', [BukuController::class, 'unduhBuku'])->middleware('RoleAkses:member');

// kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index')->middleware('RoleAkses:admin');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create')->middleware('RoleAkses:admin');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store')->middleware('RoleAkses:admin');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show')->middleware('RoleAkses:admin');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('RoleAkses:admin');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update')->middleware('RoleAkses:admin');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy')->middleware('RoleAkses:admin');

// penerbit
Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index')->middleware('RoleAkses:admin');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create')->middleware('RoleAkses:admin');
Route::post('/penerbit', [PenerbitController::class, 'store'])->name('penerbit.store')->middleware('RoleAkses:admin');
Route::get('/penerbit/{id}', [PenerbitController::class, 'show'])->name('penerbit.show')->middleware('RoleAkses:admin');
Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit'])->name('penerbit.edit')->middleware('RoleAkses:admin');
Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update')->middleware('RoleAkses:admin');
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy')->middleware('RoleAkses:admin');

// auth
Route::get('/register', [Authenticate::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [Authenticate::class, 'register']);
Route::get('/login', [Authenticate::class, 'showLoginForm'])->name('login');
Route::post('/login', [Authenticate::class, 'login']);

Route::get('/admin', [RoleController::class, 'admin'])->middleware('RoleAkses:admin');
Route::get('/member', [RoleController::class, 'member'])->middleware('RoleAkses:member');

Route::get('/logout',[Authenticate::class, 'logout']);

// favorite
Route::get('/favorites', [FavoriteController::class, 'index'])->middleware('RoleAkses:member');
Route::post('/favorites/add', [FavoriteController::class, 'addFavorite'])->middleware('RoleAkses:member');
Route::delete('/favorites/remove/{id}', [FavoriteController::class, 'removeFavorite'])->middleware('RoleAkses:member');

// list-member
Route::get('/list-member', [RoleController::class, 'show'])->name('list-member')->middleware('RoleAkses:admin');

Route::get('/404', [Authenticate::class, 'error']);