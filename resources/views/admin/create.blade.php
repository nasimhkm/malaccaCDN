<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create New Article - Admin</title>
    {{-- PERBAIKAN: Gunakan helper asset() untuk path ikon --}}
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
        <h1 class="text-3xl font-bold mb-6">Create New Article</h1>

        {{-- PERBAIKAN: Form mengarah ke rute Laravel dan menyertakan @csrf --}}
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- PERBAIKAN: Menampilkan eror validasi jika ada --}}
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
                    {{-- PERBAIKAN: Menambahkan value="{{ old('title') }}" --}}
                    <input type="text" name="title" id="title" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="Your article title" value="{{ old('title') }}" required>
                </div>
                <div>
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-300">Author</label>
                    <input type="text" name="author" id="author" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="Author's name" value="{{ old('author', auth()->user()->name) }}" required>
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-300">Category</label>
                    <input type="text" name="category" id="category" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="e.g., Blog, News" value="{{ old('category', 'Uncategorized') }}" required>
                </div>
                <div>
                    <label for="published_date" class="block mb-2 text-sm font-medium text-gray-300">Publish Date</label>
                    <input type="datetime-local" name="published_date" id="published_date" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" value="{{ old('published_date') }}" required>
                </div>
            </div>
            
            <div class="mb-6">
                <label for="featured_image" class="block mb-2 text-sm font-medium text-gray-300">Featured Image</label>
                <input type="file" name="featured_image" id="featured_image" class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none placeholder-gray-400">
                <p class="mt-1 text-xs text-gray-500">PNG, JPG, or GIF (MAX. 5MB).</p>
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-300">Description / Summary</label>
                <textarea name="description" id="description" rows="3" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="Write a short and engaging summary for the article..." maxlength="600">{{ old('description') }}</textarea>
                <p id="char-count-feedback" class="mt-1 text-xs text-gray-500">Max 600 characters.</p>
            </div>
            <div class="mb-6">
                 <label for="content-editor" class="block mb-2 text-sm font-medium text-gray-300">Full Content</label>
                <textarea id="content-editor" name="content">{{ old('content', '<h2>Start writing your amazing article here!</h2>') }}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Save Article
                </button>
                {{-- PERBAIKAN: Link Cancel mengarah ke rute dashboard --}}
                <a href="{{ route('admin.dashboard') . '#article' }}" class="text-gray-400 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>

    {{-- Script TinyMCE tidak perlu diubah, tapi saya tambahkan script untuk default date --}}
    <script>
        tinymce.init({
            selector: 'textarea#content-editor',
            plugins: 'link image lists code wordcount',
            toolbar: 'undo redo | blocks | bold italic | bullist numlist | link image | code',
            skin: 'oxide-dark', content_css: 'dark', height: 500,
            block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5;',
            content_style: `body { font-family: "Montserrat", sans-serif; color: #fff; }`
        });

        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('published_date');
            if (dateInput && !dateInput.value) { // Hanya set jika nilainya kosong
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                dateInput.value = now.toISOString().slice(0, 16);
            }

            // PENYESUAIAN: Script diubah menjadi penghitung karakter
            const descriptionTextarea = document.getElementById('description');
            const charCountFeedback = document.getElementById('char-count-feedback');
            const maxChars = 600;

            descriptionTextarea.addEventListener('input', function() {
                const currentCharCount = this.value.length;
                
                charCountFeedback.textContent = currentCharCount + ' / ' + maxChars + ' characters';
                
                if (currentCharCount >= maxChars) {
                    charCountFeedback.classList.remove('text-gray-500');
                    charCountFeedback.classList.add('text-red-500');
                } else {
                    charCountFeedback.classList.remove('text-red-500');
                    charCountFeedback.classList.add('text-gray-500');
                }
            });
        });
    </script>
</body>
</html>