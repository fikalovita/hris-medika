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
