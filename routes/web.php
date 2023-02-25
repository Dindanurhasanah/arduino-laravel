<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dropzone;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Laporan;
use App\Http\Controllers\Pengujian;
use App\Http\Controllers\Lecek;
use App\Http\Controllers\Basah;
use App\Http\Controllers\Pudar;
use App\Http\Controllers\Range;
use App\Http\Controllers\ChartController;
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




Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//ini biar pas login bisa ke home

Route::get('/addlaporan', [App\Http\Controllers\Laporan::class, 'add']);
Route::post('/laporan/insert', [App\Http\Controllers\Laporan::class, 'insert']);

Route::get('/addpengujian', [App\Http\Controllers\Pengujian::class, 'add']);
Route::post('/pengujian/insert', [App\Http\Controllers\Pengujian::class, 'insert']);

Route::get('/addlecek', [App\Http\Controllers\Lecek::class, 'add']);
Route::post('/lecek/insert', [App\Http\Controllers\Lecek::class, 'insert']);

Route::get('/addbasah', [App\Http\Controllers\Basah::class, 'add']);
Route::post('/basah/insert', [App\Http\Controllers\Basah::class, 'insert']);

Route::get('/addpudar', [App\Http\Controllers\Pudar::class, 'add']);
Route::post('/pudar/insert', [App\Http\Controllers\Pudar::class, 'insert']);

Route::get('/addrange', [App\Http\Controllers\Range::class, 'add']);
Route::post('/range/insert', [App\Http\Controllers\Range::class, 'insert']);

//CRUD Laporan pemakaian alat
Route::get('/laporan', [App\Http\Controllers\Laporan::class,'index'])->name('laporan');
Route::get('/laporan/detail/{no}', [Laporan::class,'detail']);
Route::get('/laporan/edit/{no}', [Laporan::class,'edit']);
Route::post('/laporan/update/{no}', [Laporan::class,'update']);
Route::get('/laporan/delete/{no}', [Laporan::class,'delete']);
Route::delete('laporan/{id}', [Laporan::class, 'delete'])->name('laporan.delete');

//CRUD Laporan Kondisi Rapi
Route::get('/pengujian/edit/{no}', [Pengujian::class,'edit']);
Route::post('/pengujian/update/{no}', [Pengujian::class,'update']);
// Route::get('/laporan/delete/{no}', [Pengujian::class,'delete']);
// Route::delete('laporan/{id}', [Pengujian::class, 'delete'])->name('pengujian.delete');

//CRUD Laporan Kondisi Lecek
Route::get('/lecek/edit/{no}', [Lecek::class,'edit']);
Route::post('/lecek/update/{no}', [Lecek::class,'update']);

//CRUD Laporan Kondisi Pudar
Route::get('/pudar/edit/{no}', [Pudar::class,'edit']);
Route::post('/pudar/update/{no}', [Pudar::class,'update']);

//CRUD Laporan Kondisi Basah
Route::get('/basah/edit/{no}', [Basah::class,'edit']);
Route::post('/basah/update/{no}', [Basah::class,'update']);


Route::resource('infografis', App\Http\Controllers\imageuploadController::class);
// Route::get('/infografis', [dropzone::class, 'dropzone']);
Route::post('dropzone/store', [dropzone::class, 'dropzoneStore'])->name('dropzone.store');


Route::get('/grafik', [ChartController::class, 'index'])->name('grafik');


Route::group(['middleware' => 'auth'], function () {
Route::get('/userprofile', [UserController::class, 'index'])->name('userprofile');
Route::post('/userprofile', [UserController::class, 'update_profile'])->name('userprofile');
Route::post('/updatepassword', [UserController::class, 'update_password'])->name('updatepassword');
});



Route::get('/laporan/print', [Laporan::class, 'cetak_pdf']);
Route::get('/rapi/print', [Pengujian::class, 'cetak_pdf']);
Route::get('/ranges/print', [Range::class, 'cetak_pdf']);
Route::get('/lecek/print', [Lecek::class, 'cetak_pdf']);
Route::get('/basah/print', [Basah::class, 'cetak_pdf']);
Route::get('/pudar/print', [Pudar::class, 'cetak_pdf']);


