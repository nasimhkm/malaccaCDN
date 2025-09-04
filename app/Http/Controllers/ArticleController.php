<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag; // Pastikan Tag di-import
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Pastikan use statement Str tetap ada

class ArticleController extends Controller
{
    /**
     * Menampilkan daftar semua artikel di dashboard admin.
     */
    public function index()
    {
        $perPage = request('per_page', 10);
        $articles = Article::latest('published_at')->paginate($perPage);
        // Ambil semua task dan kelompokkan berdasarkan statusnya
        $tasks = Task::all()->groupBy('status');
        return view('admin.index', compact('articles', 'tasks'));
    }

    /**
     * Menampilkan form untuk membuat artikel baru.
     */
    public function create()
    {
        return view('admin.create');
    }

    public function showPublicIndex()
    {
        $articles = Article::where('published_at', '<=', now())
                       ->where('category', '!=', 'blog')
                       ->orderBy('published_at', 'desc') // Menggunakan orderBy desc lebih eksplisit
                       ->take(4)
                       ->get();

        return view('index', compact('articles'));
    }

    /**
     * Menyimpan artikel yang baru dibuat ke database.
     */
    public function store(Request $request)
    {
        // PENYESUAIAN: Mengubah validasi deskripsi menjadi max karakter
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:articles,title',
            'description' => 'required|string|max:600', // <-- PENYESUAIAN DI SINI
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'published_date' => 'required|date',
            'category' => 'nullable|string',
            'tags' => 'nullable|string', // <-- PENAMBAHAN: Validasi untuk tags
        ]);

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('articles', 'public');
        }

        // PENYESUAIAN: Membuat slug secara manual dan memastikannya unik
        $slug = Str::slug($validated['title']);
        $count = Article::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        // --- LOGIKA DESKRIPSI OTOMATIS DIHAPUS ---

        // PENYESUAIAN: Simpan artikel yang baru dibuat ke dalam variabel $article
        $article = Article::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'], // PENYESUAIAN: Mengambil deskripsi langsung dari form
            'author' => $validated['author'],
            'content' => $validated['content'],
            'category' => $validated['category'] ?? 'Uncategorized',
            'featured_image' => $imagePath,
            'published_at' => $validated['published_date'],
        ]);

        // PENYESUAIAN: Logika Tags yang sudah ada, sekarang menggunakan variabel $article yang benar
        if (!empty($validated['tags'])) {
            $tagNames = explode(',', $validated['tags']);
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);
                if ($tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
            }
            $article->tags()->sync($tagIds); // Menghubungkan artikel dengan tags
        }

        return redirect(route('admin.dashboard') . '#article')->with('success', 'Article created successfully!');
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
        // PENYESUAIAN: Menambahkan validasi 'unique' dan mengabaikan ID saat ini, serta validasi 'description'
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:articles,title,' . $article->id,
            'description' => 'required|string|max:600', // PENYESUAIAN: Validasi deskripsi dengan maksimal 120 kata
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'published_date' => 'required|date',
            'category' => 'nullable|string',
            'tags' => 'nullable|string', // <-- PENAMBAHAN: Validasi untuk tags
        ]);

        $imagePath = $article->featured_image;
        if ($request->hasFile('featured_image')) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('articles', 'public');
        }
        
        // PENYESUAIAN: Membuat ulang slug jika judulnya berubah
        $slug = $article->slug;
        if ($article->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $count = Article::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $article->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
        }

        // --- LOGIKA DESKRIPSI OTOMATIS DIHAPUS ---

        $article->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'], // PENYESUAIAN: Mengambil deskripsi langsung dari form
            'author' => $validated['author'],
            'content' => $validated['content'],
            'category' => $validated['category'] ?? 'Uncategorized',
            'featured_image' => $imagePath,
            'published_at' => $validated['published_date'],
        ]);

        // PENYESUAIAN: Logika Tags yang sebelumnya belum ada di fungsi update
        if (!empty($validated['tags'])) {
            $tagNames = explode(',', $validated['tags']);
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);
                if ($tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
            }
            $article->tags()->sync($tagIds); // Menghubungkan artikel dengan tags
        } else {
            // Jika input tags kosong, hapus semua relasi tag yang ada
            $article->tags()->sync([]);
        }
        
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
