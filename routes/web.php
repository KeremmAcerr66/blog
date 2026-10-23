<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Blog Rotaları
Route::get('/', [BlogController::class, 'index'])->name('posts.index');
Route::get('/makale/{id}', [BlogController::class, 'show'])->name('posts.show');

// Makale Ekleme Rotaları
Route::get('/ekle', [BlogController::class, 'create'])->name('posts.create');
Route::post('/ekle', [BlogController::class, 'store'])->name('posts.store');

// Login / Logout Rotaları
Route::get('/giris', [BlogController::class, 'loginForm'])->name('login');
Route::post('/giris', [BlogController::class, 'login'])->name('login.post');
Route::post('/cikis', [BlogController::class, 'logout'])->name('logout');
