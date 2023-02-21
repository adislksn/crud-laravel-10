<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SiswaController;

//id '[0-9]+ kalau nama '[A-Za-z]+'
// Route::get('/siswa', [SiswaController::class, 'index'])->name('index');
// Route::get('/siswa/{id}', [SiswaController::class, 'detail'])->where('id', '[0-9]+');
Route::resource('/siswa', SiswaController::class);

Route::get('/page', [HalamanController::class, 'index'])->name('index');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');
Route::get('/tentang', [HalamanController::class, 'tentang'])->name('tentang');

Route::resource('/posts', \App\Http\Controllers\PostController::class);