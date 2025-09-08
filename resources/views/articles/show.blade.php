<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $article->title }} - Malacca Entreprise Indonesia</title>
        
        <script src="https://cdn.tailwindcss.com"></script>

        <link rel="icon" type="image/png" href="{{ asset('asset/favicon/favicon-96x96.png') }}" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('asset/favicon/favicon.svg') }}" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset/favicon/apple-touch-icon.png') }}" />
        <meta name="apple-mobile-web-app-title" content="Malacca" />
        <link rel="manifest" href="{{ asset('asset/favicon/site.webmanifest') }}" />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
        <style>
            body {
                font-family: "Montserrat", sans-serif;
                background-color: #e5e7eb;
            }
            .article-content h1,
            .article-content h2,
            .article-content h3 {
                font-size: 1.125rem;
                line-height: 1.75rem;
                font-weight: bold;
                margin-top: 1.25em;
                margin-bottom: 0.5em;
            }
            .article-content p {
                margin-bottom: 1em;
                line-height: 1.6;
            }
            .article-content ol {
                list-style-type: decimal;
                margin-left: 1.5rem;
            }
            .article-content ul {
                list-style-type: disc;
                margin-left: 1.5rem;
            }

            /* PENAMBAHAN STYLE UNTUK DESKRIPSI */
            .description-box {
                max-height: 450px; /* Samakan dengan tinggi gambar pada layar md */
                overflow-y: auto; /* Tambahkan scrollbar jika konten melebihi batas */
                color: #4b5563; /* text-gray-600 */
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
        <main>
            <div class="container max-w-4xl mx-auto bg-white shadow-lg my-10">
            <!--featured image-->
                <div
                    class="relative w-full h-[50vh] md:h-[60vh] bg-cover bg-center bg-[url('{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}');]"
                >
                <!-- Dark Overlay for Text Readability -->
                <div class="absolute inset-0 bg-black/50"></div>

                <!-- Container for Content on Top of Image -->
                <div
                    class="relative z-10 h-full flex flex-col justify-between p-8 md:p-12"
                 >
                    {{-- Top Bar: Back Button & Category Logo --}}
                    <div class="flex justify-between items-start text-white">
                        <a
                            href="{{ url()->previous() }}"
                            class="text-sm rounded-full px-4 py-1 hover:bg-white/10 transition-colors"
                        >
                            &lt; kembali
                        </a>
                        <div class="text-right">
                            {{-- Komentar Anda tetap dipertahankan --}}
                            <!--nanti diisi sama svg dari public/asset/kalibrasi buat kategori selain blog, yang blog dikosongin aja-->
                                
                            @php
                                // Menggunakan match statement untuk memetakan kategori ke nama file SVG.
                                $categoryFilename = match(strtolower($article->category)) {
                                    'jurnal seduh' => 'jurnalseduh',
                                    'catatan pinggir kali' => 'catatan',
                                    'temu rasa' => 'temurasa',
                                    'kultum' => 'kultum',
                                    'kerja kelompok' => 'kerjaklmpk',
                                    'pang!' => 'pang',
                                    default => '', // Default jika kategori tidak cocok (misal: 'Blog')
                                };
                            
                                // Membuat path lengkap ke file SVG hanya jika nama file ditemukan.
                                $svgPath = $categoryFilename ? 'asset/kalibrasi/' . $categoryFilename . '.svg' : '';
                            @endphp
                            
                            {{-- Hanya tampilkan gambar jika path SVG valid dan file-nya benar-benar ada --}}
                            @if($svgPath && file_exists(public_path($svgPath)))
                                <img
                                    src="{{ asset($svgPath) }}"
                                    alt="{{ $article->category }}"
                                    class="w-auto h-12"
                                />
                            @endif
                        </div>
                    </div>

                    {{-- Bottom Content: Title & Author --}}
                    <div class="text-white">
                        <h1
                            class="text-4xl lg:text-5xl font-bold mb-2 text-wrap"
                        >
                            {{ $article->title }}
                        </h1>
                        <p class="text-base text-gray-300">
                            {{ $article->author }} | {{
                            $article->published_at->format('d-m-Y') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!--description Section-->
            <div class="max-w-4xl p-4 md:p-10">
                <div class="prose lg:prose-xl text-justify text-black">
                    <p>{{ $article->description }}</p>
                </div>
            
                
                <!--content Section-->
                <div class="article-content text-justify">
                    {!! $article->content !!}
                </div>
                <!--cta button-->
                <div class="p-4 md:p-10">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <a
                              href="https://wa.link/a2j9ib"
                              class="flex items-center justify-center py-2.5 px-6 text-sm font-medium rounded-full border bg-green-400 text-white border-green-400 w-[10rem] h-[3rem]"
                            >
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </main>
        <footer class="bg-black">
            <section
                id="kunjungi"
                class="relative bg-cover bg-center text-white"
                style="
                    background-image: url('{{ asset('asset/img/kunjungi.png') }}');
                "
            >
                <div class="absolute inset-0 bg-black/70"></div>
                <div
                    class="relative max-w-screen-xl mx-auto px-8 py-20 flex flex-col md:flex-row gap-12 md:gap-8 items-center justify-between"
                >
                    <div
                        class="flex-1 flex flex-col items-center text-justify md:items-start"
                    >
                        <img
                            src="{{ asset('asset/logo/logoCompany.svg') }}"
                            alt="Logo Malacca"
                            class="w-24 mb-4"
                        />
                        <p
                            class="text-sm text-gray-300 leading-relaxed max-w-xs mb-6"
                        >
                            Malacca adalah ruang kopi yang tumbuh dari
                            kolaborasi, riset, dan nilai komunitas, untuk
                            menghadirkan ekosistem F&B yang kreatif dan
                            berkelanjutan.
                        </p>
                        <div class="flex items-center gap-4">
                            <a
                                href="https://gofood.link/a/yM8W6YL"
                                class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"
                            >
                                <img
                                    src="{{ asset('asset/icon/gofood.png') }}"
                                    alt="GoFood"
                                    class="w-5 h-5"
                                />
                            </a>
                            <a
                                href="https://linktr.ee/malaccaentreprise"
                                class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"
                            >
                                <img
                                    src="{{ asset('asset/icon/linktree.png') }}"
                                    alt="Linktree"
                                    class="w-5 h-5"
                                />
                            </a>
                            <a
                                href="https://wa.link/1x9qk8"
                                class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"
                            >
                                <img
                                    src="{{ asset('asset/icon/whatsapp.png') }}"
                                    alt="WhatsApp"
                                    class="w-5 h-5"
                                />
                            </a>
                        </div>
                    </div>
                    <div
                        class="flex-1 flex flex-col items-center md:items-start text-justify md:text-left"
                    >
                        <h1 class="font-bold text-lg mb-4">Kunjungi Kami</h1>
                        <a
                            href="https://maps.app.goo.gl/RWCwJ44ykzFxhxb96"
                            class="block hover:underline"
                        >
                            <p
                                class="text-sm text-gray-300 leading-relaxed max-w-xs"
                            >
                                Jl. Kemuning 7 No.32, RT.1/RW.8, Malaka
                                Sari, Kec. Duren Sawit, Kota Jakarta Timur,
                                Daerah Khusus Ibukota Jakarta 13460
                            </p>
                        </a>
                    </div>
                    <div
                        class="flex-1 flex-col items-center md:items-start text-center md:text-left translate-y-0 md:translate-y-7"
                    >
                        <h1 class="font-bold text-lg mb-4">Kontak Kami</h1>
                        <div class="text-sm text-gray-300 space-y-2 mb-6">
                            <a
                                href="tel:+6287888814075"
                                class="block hover:underline"
                            >
                                +62 878 8881 4075
                            </a>
                            <a
                                href="mailto:malaccancoffee@gmail.com"
                                class="block hover:underline"
                            >
                                malaccancoffee@gmail.com
                            </a>
                        </div>
                        <a
                            href="https://wa.link/1x9qk8"
                            class="py-2.5 px-6 text-sm font-medium text-white bg-transparent rounded-full border border-white hover:bg-white/10 transition-colors"
                        >
                            mari bekerja sama
                        </a>
                    </div>
                </div>
                <div class="relative text-center py-8">
                    <p class="text-xs text-gray-400">
                        © Malacca Entreprise | All Rights Reserved
                    </p>
                </div>
            </section>
        </footer>
    </body>
</html>
