<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController; // Hanya butuh ini

// Rute Halaman Utama (Publik) - Panggil fungsi dari controller
Route::get('/', [ArticleController::class, 'showPublicIndex'])->name('home');

// Rute untuk menampilkan satu artikel
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');


// Grup untuk semua halaman admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');
    Route::resource('articles', ArticleController::class);
});


// Rute untuk otentikasi
require __DIR__.'/auth.php';