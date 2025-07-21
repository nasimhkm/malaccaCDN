<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_description_to_articles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Tambahkan kolom 'description' setelah kolom 'title'
            // Tipe TEXT jika deskripsi bisa panjang, VARCHAR jika pendek (misal, 255 karakter)
            $table->text('description')->nullable()->after('title'); 
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
