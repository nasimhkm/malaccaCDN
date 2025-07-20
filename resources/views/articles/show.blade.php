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
    </style>
</head>
<body class="text-black">
    <div class="container max-w-4xl mx-auto p-4 md:p-10 bg-white shadow-lg my-10">
        
        {{-- Bagian Atas: Gambar di kiri, Judul di kanan --}}
        <div class="flex flex-col md:flex-row gap-8 mb-8 border-b pb-8">
            {{-- Kolom Gambar --}}
            @if($article->featured_image)
            <div class="md:w-1/3 flex-shrink-0">
                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover bg-red-800">
            </div>
            @endif

            {{-- Kolom Judul dan Meta --}}
            <div class="flex-grow flex flex-col justify-start">
                <h1 class="text-3xl lg:text-4xl font-bold mb-3">{{ $article->title }}</h1>
                <p class="text-sm text-gray-600">{{ $article->published_at->format('d F Y') }} • {{ $article->author }}</p>
                <div class="mt-4 pt-4 border-t border-gray-200 article-content">
                    {!! $article->content !!}
                </div>
            </div>
        </div>

        {{-- Bagian Bawah: Isi Konten Lanjutan --}}
        <div class="article-content text-justify">
           {{-- Jika ada konten lanjutan bisa ditaruh di sini, atau gabungkan di atas --}}
        </div>

        <div class="mt-10 pt-6 border-t">
            <a href="{{ url('/') }}#showcase" class="text-black hover:underline">&larr; Back to Home</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline ml-4">&larr; Back to Admin</a>
            @endauth
        </div>

    </div>
</body>
</html>