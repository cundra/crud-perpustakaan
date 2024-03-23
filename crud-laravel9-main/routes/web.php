<?php


use App\Http\Controllers\anggotaControllers;
use App\Http\Controllers\peminjamanControllers;
use App\Http\Controllers\perpustakaanControllers;
use Illuminate\Support\Facades\Route;


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
    return view('homepagecrud');
});

Route::resource('perpustakaan', perpustakaanControllers::class);
Route::get('/perpustakaan/{id}/edit',[perpustakaanControllers::class,'edit'])->name('perpustakaan.edit');
Route::put('/perpustakaan/{id}/edit', [perpustakaanControllers::class, 'update']);
Route::delete('/perpustakaan/{id}/delete',[perpustakaanControllers::class, 'destroy']);
Route::resource('anggota', anggotaControllers::class);
Route::post('/anggota/store', [anggotaControllers::class,'store']);
Route::get('/anggota/{id}/edit',[anggotaControllers::class,'edit'])->name('anggota.edit');
Route::put('/anggota/{id}/edit', [anggotaControllers::class, 'update']);
Route::delete('/anggota/{id}/delete', [anggotaControllers::class, 'destroy']);
Route::resource('peminjaman', peminjamanControllers::class);
Route::get('/peminjaman/{id}/edit',[peminjamanControllers::class,'edit'])->name('peminjaman.edit');
Route::put('/peminjaman/{id}/edit', [peminjamanControllers::class, 'update']);
Route::delete('/peminjaman/{id}/delete',[perpustakaanControllers::class, 'destroy']);
