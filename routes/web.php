<?php

use App\Http\Controllers\SiswaController;
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

//route data siswa
Route::get('siswa',[SiswaController::class,'utama']);
Route::get('siswa/tambah',[SiswaController::class,'tambah']);
Route::post('siswa/tambah',[SiswaController::class,'simpan']);
Route::get('siswa/edit/{nisn}',[SiswaController::class,'edit']);
Route::post('siswa/edit/{nisn}',[SiswaController::class,'update']);
Route::get('siswa/hapus/{nisn}',[SiswaController::class,'hapus']);
