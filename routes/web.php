<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pegawai', function () {
    return view('pegawai.app');
})->name('pegawai');
Route::get('/bidang', function () {
    return view('bidang.app');
})->name('bidang');
Route::get('/posisi', function () {
    return view('posisi.app');
})->name('posisi');
Route::get('/role', function () {
    return view('role.app');
})->name('role');
Route::get('/kelompok_umur', function () {
    return view('kelompok_umur.app');
})->name('kelompok_umur');
Route::get('/jenis_pekerjaan', function () {
    return view('jenis_pekerjaan.app');
})->name('jenis_pekerjaan');
Route::get('/jenis_karyawan', function () {
    return view('jenis_karyawan.app');
})->name('jenis_karyawan');
Route::get('/golongan_pekerjaan', function () {
    return view('golongan_pekerjaan.app');
})->name('golongan_pekerjaan');
Route::get('/kelompok_gol_pekerjaan', function () {
    return view('kelompok_gol_pekerjaan.app');
})->name('kelompok_gol_pekerjaan');
Route::get('/ptkp_stts_anak', function () {
    return view('ptkp_stts_anak.app');
})->name('ptkp_stts_anak');
Route::get('/perusahaan', function () {
    return view('perusahaan.app');
})->name('perusahaan');
Route::get('/auth', function () {
    return view('auth.app');
})->name('auth');
