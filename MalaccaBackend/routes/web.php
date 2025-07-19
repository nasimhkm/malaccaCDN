<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute Halaman Utama (Publik)
Route::get('/', function () {
    $articles = Article::where('published_at', '<=', now())
                       ->latest('published_at')
                       ->take(4)->get();
    return view('index', ['articles' => $articles]);
});

// PENYESUAIAN: Menambahkan rute untuk menampilkan satu artikel (halaman View)
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');


// Grup untuk semua halaman admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');
    Route::resource('articles', ArticleController::class);
});


// Rute untuk otentikasi (login, logout, dll.)
require __DIR__.'/auth.php';