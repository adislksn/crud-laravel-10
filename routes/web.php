<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\isGuest;

//id '[0-9]+ kalau nama '[A-Za-z]+'
// Route::get('/siswa', [SiswaController::class, 'index'])->name('index');
// Route::get('/siswa/{id}', [SiswaController::class, 'detail'])->where('id', '[0-9]+');
Route::resource('/siswa', SiswaController::class)->middleware('isLogin');

Route::middleware([isGuest::class])->name('sesi.')->prefix('sesi')->group(function () {
Route::get('/',[SessionController::class, 'index']);
Route::post('/login',[SessionController::class, 'login']);
Route::get('/register',[SessionController::class, 'register']);
Route::post('/create',[SessionController::class, 'create']);
});

Route::get('/sesi/logout',[SessionController::class, 'logout']);

Route::get('/page', [HalamanController::class, 'index'])->name('index');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');
Route::get('/tentang', [HalamanController::class, 'tentang'])->name('tentang');

Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/mbd', \App\Http\Controllers\MbdController::class);