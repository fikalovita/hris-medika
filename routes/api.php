<?php

use App\Models\PegawaiLvl;
use App\Models\Perusahaan;
use App\Models\KelompokUmur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PegawaiLvlController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\KelompokUmurController;
use App\Http\Controllers\PegawaiJnsKaryawanController;
use App\Models\PegawaiJnsKaryawan;

Route::get('/pegawai', [PegawaiController::class, 'index']);
//routes kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/add_kategori', [KategoriController::class, 'store']);
Route::put('/detail_kategori', [KategoriController::class, 'show']);
Route::post('/update_kategori', [KategoriController::class, 'update']);
Route::delete('/delete_kategori', [KategoriController::class, 'destroy']);

//routes posisi
Route::get('/posisi', [PosisiController::class, 'index']);
Route::post('/add_posisi', [PosisiController::class, 'store']);
Route::put('/detail_posisi', [PosisiController::class, 'show']);
Route::delete('/delete_posisi', [PosisiController::class, 'destroy']);

//routes bidang
Route::get('/bidang', [BidangController::class, 'index']);
Route::post('/add_bidang', [BidangController::class, 'store']);
Route::put('/detail_bidang', [BidangController::class, 'show']);
Route::post('/update_bidang', [BidangController::class, 'update']);
Route::delete('/delete_bidang', [BidangController::class, 'destroy']);

//routes perusahaan
Route::get('/perusahaan', [PerusahaanController::class, 'index']);
Route::post('/add_perusahaan', [PerusahaanController::class, 'store']);
Route::put('/detail_perusahaan', [PerusahaanController::class, 'show']);
Route::post('/update_perusahaan', [PerusahaanController::class, 'update']);
Route::delete('/delete_perusahaan', [PerusahaanController::class, 'destroy']);

//routes kelompok umur
Route::get('/kelompok_umur', [KelompokUmurController::class, 'index']);
Route::post('/add_kelompok_umur', [KelompokUmurController::class, 'store']);
Route::put('/detail_kelompok_umur', [KelompokUmurController::class, 'show']);
Route::post('/update_kelompok_umur', [KelompokUmurController::class, 'update']);
Route::delete('/delete_kelompok_umur', [KelompokUmurController::class, 'destroy']);

//routes pegawaiLvl
Route::get('/pegawai_lvl', [PegawaiLvlController::class, 'index']);
Route::post('/add_pegawai_lvl', [PegawaiLvlController::class, 'store']);
Route::put('/detail_pegawai_lvl', [PegawaiLvlController::class, 'show']);
Route::post('/update_pegawai_lvl', [PegawaiLvlController::class, 'update']);
Route::delete('/delete_pegawai_lvl', [PegawaiLvlController::class, 'destroy']);

//routes Pegawai jns karyawan
Route::get('/pegawai_jns_karyawan', [PegawaiJnsKaryawanController::class, 'index']);
Route::post('/add_pegawai_jns_karyawan', [PegawaiJnsKaryawanController::class, 'store']);
Route::put('/detail_pegawai_jns_karyawan', [PegawaiJnsKaryawanController::class, 'show']);

