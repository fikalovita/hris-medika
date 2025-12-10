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
