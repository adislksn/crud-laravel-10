<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;

//route resource
Route::get('/page', [HalamanController::class, 'index'])->name('index');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');
Route::get('/tentang', [HalamanController::class, 'tentang'])->name('tentang');
Route::resource('/posts', \App\Http\Controllers\PostController::class);