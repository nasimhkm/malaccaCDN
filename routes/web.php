<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController; // Hanya butuh ini

// Rute Halaman Utama (Publik) - Panggil fungsi dari controller
Route::get('/', [ArticleController::class, 'showPublicIndex'])->name('home');

Route::get('/kalibrasi', function () {
    return view('kalibrasi'); // This will load resources/views/kalibrasi.blade.php
})->name('kalibrasi.index'); // We give it a name for easy linking

// Grup untuk semua halaman admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');
    
    // PENYESUAIAN: Kita akan mendefinisikan rute 'edit' dan 'update' secara manual
    // agar bisa menentukan binding key secara eksplisit.
    Route::resource('articles', ArticleController::class)->except(['show', 'edit', 'update']);

    // Definisikan rute edit dan update secara manual menggunakan 'id'
    Route::get('articles/{article:id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article:id}', [ArticleController::class, 'update'])->name('articles.update');
});


// Rute untuk otentikasi
require __DIR__.'/auth.php';

// Rute artikel publik berdasarkan slug (di paling bawah)
Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
