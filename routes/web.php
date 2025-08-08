<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute Halaman Utama (Publik) - Panggil fungsi dari controller
Route::get('/', [ArticleController::class, 'showPublicIndex'])->name('home');

// Rute untuk halaman Kalibrasi
Route::get('/kalibrasi', function () {
    // Mengambil data artikel yang relevan dan mengirimkannya ke view
    $articles = \App\Models\Article::where('published_at', '<=', now())
                       ->latest('published_date')
                       ->get();
    return view('kalibrasi', compact('articles'));
})->name('kalibrasi');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');
    
    // PENYESUAIAN: Kita akan mendefinisikan rute 'edit' dan 'update' secara manual
    // agar bisa menentukan binding key secara eksplisit.
    Route::resource('articles', ArticleController::class)->except(['show', 'edit', 'update', 'index']);

    // Definisikan rute edit dan update secara manual menggunakan 'id'
    Route::get('articles/{article:id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article:id}', [ArticleController::class, 'update'])->name('articles.update');
});

// Rute artikel publik berdasarkan slug (ditempatkan di paling bawah agar tidak bentrok)
Route::get('/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
