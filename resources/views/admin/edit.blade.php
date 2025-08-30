<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Article - Admin</title>
    <link rel="icon" href="{{ asset('asset/logo/logoCompanyFavicon.svg') }}" type="image/svg+xml" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/yomppk72k9x4grs0t2m165roluir2l70r3kekb0lvl8qgk0u/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        body { font-family: "Montserrat", sans-serif; background-color: #111827; }
        input[type="datetime-local"]::-webkit-calendar-picker-indicator { filter: invert(1); }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
        {{-- KUNCI 1: Judul Halaman --}}
        <h1 class="text-3xl font-bold mb-6">Edit Article</h1>

        {{-- KUNCI 2: Form Action mengarah ke rute UPDATE dan menggunakan method PUT --}}
        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-900 text-red-200 border border-red-500 rounded">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-300">Title</label>
                    {{-- KUNCI 3: Menampilkan data lama dari database --}}
                    <input type="text" name="title" id="title" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" value="{{ old('title', $article->title) }}" required>
                </div>
                <div>
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-300">Author</label>
                    <input type="text" name="author" id="author" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" value="{{ old('author', $article->author) }}" required>
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-300">Category</label>
                    <select name="category" id="category" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" required>
                        {{-- Kunci perbaikan: old('category', $article->category) --}}
                        {{-- Ini akan menggunakan $article->category sebagai nilai jika old('category') tidak ada --}}
                        <option value="blog" {{ old('category', $article->category) == 'blog' ? 'selected' : '' }}>blog</option>
                        <option value="jurnal seduh" {{ old('category', $article->category) == 'jurnal seduh' ? 'selected' : '' }}>jurnal seduh</option>
                        <option value="catatan pinggir kali" {{ old('category', $article->category) == 'catatan pinggir kali' ? 'selected' : '' }}>catatan pinggir kali</option>
                        <option value="temu rasa" {{ old('category', $article->category) == 'temu rasa' ? 'selected' : '' }}>temu rasa</option>
                        <option value="kultum" {{ old('category', $article->category) == 'kultum' ? 'selected' : '' }}>kultum</option>
                        <option value="kerja kelompok" {{ old('category', $article->category) == 'kerja kelompok' ? 'selected' : '' }}>kerja kelompok</option>
                        <option value="pang!" {{ old('category', $article->category) == 'pang!' ? 'selected' : '' }}>pang!</option>
                    </select>
                </div>
                <div>
                    <label for="published_date" class="block mb-2 text-sm font-medium text-gray-300">Publish Date</label>
                    <input type="datetime-local" name="published_date" id="published_date" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" value="{{ old('published_date', \Carbon\Carbon::parse($article->published_at)->format('Y-m-d\TH:i')) }}" required>
                </div>
            </div>
            
            <div class="mb-6">
                <label for="featured_image" class="block mb-2 text-sm font-medium text-gray-300">Update Featured Image (Optional)</label>
                {{-- KUNCI 4: Menampilkan gambar lama --}}
                @if ($article->featured_image)
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded mb-2">
                @endif
                <input type="file" name="featured_image" id="featured_image" class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none placeholder-gray-400">
                <p class="mt-1 text-xs text-gray-500">Leave blank to keep the current image.</p>
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-300">Description / Summary</label>
                <textarea name="description" id="description" rows="3" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="Write a short and engaging summary for the article..." maxlength="600">{{ old('description', $article->description) }}</textarea>
                <p id="char-count-feedback" class="mt-1 text-xs text-gray-500">Max 600 characters.</p>
            </div>
            <div class="mb-6">
                 <label for="content-editor" class="block mb-2 text-sm font-medium text-gray-300">Full Content</label>
                <textarea id="content-editor" name="content">{{ old('content', $article->content) }}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Update Article
                </button>
                <a href="{{ route('admin.dashboard') . '#article' }}" class="text-gray-400 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea#content-editor',
            plugins: 'link image lists code wordcount',
            toolbar: 'undo redo | blocks | bold italic | bullist numlist | link image | code',
            skin: 'oxide-dark', content_css: 'dark', height: 500,
            block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3;',
            content_style: `body { font-family: "Montserrat", sans-serif; color: #fff; }`
        });

        // PENYESUAIAN: Script diubah menjadi penghitung karakter
        document.addEventListener('DOMContentLoaded', function() {
            const descriptionTextarea = document.getElementById('description');
            const charCountFeedback = document.getElementById('char-count-feedback');
            const maxChars = 600;

            function updateCount() {
                const currentCharCount = descriptionTextarea.value.length;
                
                charCountFeedback.textContent = currentCharCount + ' / ' + maxChars + ' characters';
                
                if (currentCharCount >= maxChars) {
                    charCountFeedback.classList.remove('text-gray-500');
                    charCountFeedback.classList.add('text-red-500');
                } else {
                    charCountFeedback.classList.remove('text-red-500');
                    charCountFeedback.classList.add('text-gray-500');
                }
            }
            
            updateCount(); // Panggil saat halaman dimuat
            descriptionTextarea.addEventListener('input', updateCount); // Panggil setiap kali ada input
        });
    </script>
</body>
</html>