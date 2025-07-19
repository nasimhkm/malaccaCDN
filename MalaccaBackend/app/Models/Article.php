<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * PERBAIKAN: Menambahkan properti $fillable.
     *
     * Ini adalah daftar "izin" yang memberitahu Laravel kolom mana saja
     * yang aman untuk diisi melalui metode Article::create().
     */
    protected $fillable = [
        'title',
        'slug',
        'author',
        'category',
        'content',
        'featured_image',
        'published_at',
    ];

    /**
     * Mengatur agar kolom 'published_at' otomatis di-handle sebagai objek tanggal (Carbon).
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];
}