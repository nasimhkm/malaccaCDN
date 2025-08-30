<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create New Article - Admin</title>
    <link
            rel="icon"
            href="{{ asset('asset/logo/logoCompanyFavicon.svg') }}"
            type="image/svg+xml"
        />
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

        <!-- PERBAIKAN: Form dibuat statis untuk preview -->
        <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Form submitted!');">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-300">Title</label>
                    <input type="text" name="title" id="title" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="Your article title" required>
                </div>
                <div>
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-300">Author</label>
                    <input type="text" name="author" id="author" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="Author's name" value="Admin" required>
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-300">Category</label>
                    <select name="category" id="category" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" required>
                        <option value="blog">blog</option>
                        <option value="jurnal seduh">jurnal seduh</option>
                        <option value="catatan pinggir kali">catatan pinggir kali</option>
                        <option value="temu rasa">temu rasa</option>
                        <option value="kultum">kultum</option>
                        <option value="kerja kelompok">kerja kelompok</option>
                        <option value="pang!">pang!</option>
                    </select>
                </div>
                <div>
                    <label for="published_date" class="block mb-2 text-sm font-medium text-gray-300">Publish Date</label>
                    <input type="datetime-local" name="published_date" id="published_date" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" required>
                </div>
            </div>
            
            <div class="mb-6">
                <label for="featured_image" class="block mb-2 text-sm font-medium text-gray-300">Featured Image</label>
                <input type="file" name="featured_image" id="featured_image" class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none placeholder-gray-400">
                <p class="mt-1 text-xs text-gray-500">PNG, JPG, or GIF (MAX. 5MB).</p>
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-300">Description / Summary</label>
                <textarea name="description" id="description" rows="3" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-full p-2.5" placeholder="Write a short and engaging summary for the article..." maxlength="600"></textarea>
                <p id="char-count-feedback" class="mt-1 text-xs text-gray-500">Max 600 characters.</p>
            </div>

            <!-- === PENAMBAHAN BAGIAN SEO TAGS === -->
            <div class="mb-6">
                <label for="tags-input" class="block mb-2 text-sm font-medium text-gray-300">SEO Tags</label>
                <div id="tags-container" class="flex flex-wrap items-center gap-2 p-2.5 bg-gray-700 border border-gray-600 rounded-lg min-h-[42px]">
                    <!-- Tags will be dynamically added here -->
                    <input type="text" id="tags-input" class="bg-transparent text-white text-sm focus:outline-none flex-grow" placeholder="Add a tag and press Enter...">
                </div>
                <!-- Input tersembunyi ini yang akan dikirim ke server -->
                <input type="hidden" name="tags" id="tags-hidden-input">
                <p class="mt-1 text-xs text-gray-500">Pisahkan tag dengan koma atau tekan Enter. Contoh: Kopi, Manual Brew, V60.</p>
            </div>
            <!-- === AKHIR PENAMBAHAN === -->

            <div class="mb-6">
                <label for="content-editor" class="block mb-2 text-sm font-medium text-gray-300">Full Content</label>
                <textarea id="content-editor" name="content"><h2>Start writing your amazing article here!</h2></textarea>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Save Article
                </button>
                <a href="#" class="text-gray-400 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>

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
            // Script untuk set tanggal default
            const dateInput = document.getElementById('published_date');
            if (dateInput && !dateInput.value) {
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                dateInput.value = now.toISOString().slice(0, 16);
            }

            // Script untuk penghitung karakter deskripsi
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

            // --- SCRIPT UNTUK INTERACTIVE TAGS ---
            const tagsContainer = document.getElementById('tags-container');
            const textInput = document.getElementById('tags-input');
            const hiddenInput = document.getElementById('tags-hidden-input');
            let tags = [];

            function updateHiddenInput() {
                hiddenInput.value = tags.join(',');
            }

            function createTag(label) {
                const div = document.createElement('div');
                div.setAttribute('class', 'flex items-center gap-2 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full');
                
                const span = document.createElement('span');
                span.innerHTML = label;
                
                const closeBtn = document.createElement('span');
                closeBtn.setAttribute('class', 'cursor-pointer text-blue-200 hover:text-white text-lg leading-none');
                closeBtn.innerHTML = '&times;'; // HTML entity for 'x'
                closeBtn.onclick = () => {
                    const index = tags.indexOf(label);
                    if (index > -1) {
                        tags.splice(index, 1);
                    }
                    div.remove();
                    updateHiddenInput();
                };

                div.appendChild(span);
                div.appendChild(closeBtn);
                return div;
            }

            function addTag(label) {
                const trimmedLabel = label.trim();
                // Hanya tambahkan jika tag belum ada dan tidak kosong
                if (trimmedLabel.length > 1 && !tags.includes(trimmedLabel)) {
                    tags.push(trimmedLabel);
                    const tagElement = createTag(trimmedLabel);
                    tagsContainer.insertBefore(tagElement, textInput);
                    updateHiddenInput();
                }
            }

            textInput.addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.key === ',') {
                    event.preventDefault(); 
                    addTag(this.value);
                    this.value = ''; 
                }
            });
            
            // Klik pada container akan memfokuskan ke input text
            tagsContainer.addEventListener('click', () => {
                textInput.focus();
            });

        });
    </script>
</body>
</html>
