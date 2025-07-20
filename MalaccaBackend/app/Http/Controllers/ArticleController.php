<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Str tidak lagi dibutuhkan untuk slug

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar semua artikel di dashboard admin.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.index', compact('articles'));
    }

    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Menyimpan artikel yang baru dibuat ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'required|date',
            'category' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('articles', 'public');
        }

        // PERUBAHAN: Baris 'slug' dihapus, akan dibuat otomatis oleh Model.
        Article::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'content' => $validated['content'],
            'category' => $validated['category'] ?? 'Uncategorized',
            'featured_image' => $imagePath,
            'published_at' => $validated['published_date'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Article created successfully!');
    }

    /**
     * Menampilkan satu halaman artikel untuk publik.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Menampilkan form untuk mengedit artikel yang sudah ada.
     */
    public function edit(Article $article)
    {
        return view('admin.edit', compact('article'));
    }

    /**
     * Memperbarui data artikel di database.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'required|date',
            'category' => 'nullable|string',
        ]);

        $imagePath = $article->featured_image;
        if ($request->hasFile('featured_image')) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('articles', 'public');
        }

        // PERUBAHAN: Baris 'slug' dihapus, akan diperbarui otomatis jika judul berubah.
        $article->update([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'content' => $validated['content'],
            'category' => $validated['category'] ?? 'Uncategorized',
            'featured_image' => $imagePath,
            'published_at' => $validated['published_date'],
        ]);
        
        return redirect(route('admin.dashboard') . '#article')->with('success', 'Article updated successfully!');
    }

    /**
     * Menghapus artikel dari database.
     */
    public function destroy(Article $article)
    {
        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();

        return redirect(route('admin.dashboard') . '#article')->with('success', 'Article deleted successfully!');
    }
}