<?php

use App\Http\Controllers\PegawaiController;
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

Route::get('pegawai', [PegawaiController::class, 'index']);
Route::post('pegawai', [PegawaiController::class, 'storePegawai']);
Route::get('pegawai/tambah-pegawai', [PegawaiController::class, 'tambahPegawai']);
Route::post('pegawai/tambah-pegawai', [PegawaiController::class, 'storePegawai']);

Route::get('pegawai/ubah-data/{nip}', [PegawaiController::class, 'editPegawai']);
Route::put('pegawai/ubah-data/{nip}', [PegawaiController::class, 'updatePegawai']);

Route::delete('pegawai/hapus-data/{nip}', [PegawaiController::class, 'hapusPegawai']);
