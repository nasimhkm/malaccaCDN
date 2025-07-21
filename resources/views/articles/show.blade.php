<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Malacca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <style>
        body { font-family: "Montserrat", sans-serif; background-color: #E5E7EB; }
        .article-content h1, .article-content h2, .article-content h3 { font-size: 1.125rem; line-height: 1.75rem; font-weight: bold; margin-top: 1.25em; margin-bottom: 0.5em; }
        .article-content p { margin-bottom: 1em; line-height: 1.6; }

        /* PENAMBAHAN STYLE UNTUK DESKRIPSI */
        .description-box {
            max-height: 450px; /* Samakan dengan tinggi gambar pada layar md */
            overflow-y: auto; /* Tambahkan scrollbar jika konten melebihi batas */
            color: #4B5563; /* text-gray-600 */
            padding-right: 10px; /* Beri sedikit ruang untuk scrollbar */
        }

        /* Styling scrollbar agar lebih manis (opsional) */
        .description-box::-webkit-scrollbar {
            width: 5px;
        }
        .description-box::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .description-box::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }
        .description-box::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

    </style>
</head>
<body class="text-black">
    <div class="container max-w-4xl mx-auto p-4 md:p-10 bg-white shadow-lg my-10">
        
        {{-- Bagian Atas: Gambar di kiri, Judul & Deskripsi di kanan --}}
        <div class="flex flex-col md:flex-row gap-8 mb-8 border-b pb-8">
            {{-- Kolom Gambar --}}
            @if($article->featured_image)
            <div class="md:w-1/3 flex-shrink-0">
                {{-- KODE INI SUDAH BENAR, pastikan 'storage:link' sudah dijalankan --}}
                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-auto md:h-[450px] object-cover bg-red-800 rounded-lg">
            </div>
            @endif

            {{-- Kolom Judul, Meta, dan Deskripsi --}}
            <div class="flex-grow flex flex-col justify-start">
                <h1 class="text-3xl lg:text-4xl font-bold mb-3">{{ $article->title }}</h1>
                <p class="text-sm text-gray-600 mb-4">{{ $article->published_at->format('d F Y') }} • {{ $article->author }}</p>
                
                {{-- Kita bungkus deskripsi dengan div yang memiliki style max-height dan overflow --}}
                <div class="description-box text-justify">
                    <p>{{ $article->description }}</p>
                </div>
                </div>
        </div>

        {{-- Bagian Bawah: Isi Konten Lanjutan --}}
        <div class="article-content text-justify">
           {!! $article->content !!}
        </div>

        <div class="mt-10 pt-6 border-t">
            <a href="{{ url('/#tulisan') }}" class="text-black hover:underline">← Back to Home</a>
            
            @auth
            <a href="{{ url('/admin/dashboard#article') }}" class="text-blue-600 hover:underline ml-4">← Back to Admin</a>
            @endauth
            
            {{-- Tautan ini dikosongkan karena sudah ada di footer --}}
            <a href="https://linktr.ee/malaccaentreprise"></a>
            <a href="https://wa.link/1x9qk8"></a>
        </div>

    </div>

     <footer class="bg-black">
      <section id="kunjungi" class="relative bg-cover bg-center text-white" style="background-image: url('{{ asset('asset/img/kunjungi.png') }}')">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative max-w-screen-xl mx-auto px-8 py-20 flex flex-col md:flex-row gap-12 md:gap-8 items-center justify-between">
          <div class="flex-1 flex flex-col items-center text-justify md:items-start">
            <img src="{{ asset('asset/logo/logoCompany.svg') }}" alt="Logo Malacca" class="w-24 mb-4" />
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs mb-6">Malacca adalah ruang kopi yang tumbuh dari kolaborasi, riset, dan nilai komunitas, untuk menghadirkan ekosistem F&B yang kreatif dan berkelanjutan.</p>
            <div class="flex items-center gap-4">
              <a href="https://gofood.link/a/yM8W6YL" class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"><img src="{{ asset('asset/icon/gofood.png') }}" alt="GoFood" class="w-5 h-5" /></a>
              <a href="https://linktr.ee/malaccaentreprise" class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"><img src="{{ asset('asset/icon/linktree.png') }}" alt="Linktree" class="w-5 h-5" /></a>
              <a href="https://wa.link/1x9qk8" class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"><img src="{{ asset('asset/icon/whatsapp.png') }}" alt="WhatsApp" class="w-5 h-5" /></a>
            </div>
          </div>
          <div class="flex-1 flex flex-col items-center md:items-start text-justify md:text-left">
            <h1 class="font-bold text-lg mb-4">Kunjungi Kami</h1>
            <a href="https://maps.app.goo.gl/RWCwJ44ykzFxhxb96" class="block hover:underline"><p class="text-sm text-gray-300 leading-relaxed max-w-xs">Jalan Jl. Kemuning 7 No.32, RT.1/RW.8, Malaka Sari, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13460</p></a>
          </div>
          <div class="flex-1 flex-col items-center md:items-start text-center md:text-left translate-y-0 md:translate-y-7">
            <h1 class="font-bold text-lg mb-4">Kontak Kami</h1>
            <div class="text-sm text-gray-300 space-y-2 mb-6">
              <a href="tel:+6287888814075" class="block hover:underline">+62 878 8881 4075</a>
              <a href="mailto:malaccancoffee@gmail.com" class="block hover:underline">malaccancoffee@gmail.com</a>
            </div>
            <a href="https://wa.link/1x9qk8" class="py-2.5 px-6 text-sm font-medium text-white bg-transparent rounded-full border border-white hover:bg-white/10 transition-colors">
             mari bekerja sama
            </a>
          </div>
        </div>
        <div class="relative text-center py-8">
          <p class="text-xs text-gray-400">© Malacca Entreprise | All Rights Reserved</p>
        </div>
      </section>
    </footer>
</body>
</html>