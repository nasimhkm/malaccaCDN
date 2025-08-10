<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Kalibrasi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {{-- Path diubah menggunakan helper asset() --}}
        <link
            rel="icon"
            href="{{ asset('asset/logo/logoCompanyFavicon.svg') }}"
            type="image/svg+xml"
        />

        <!-- Tailwind CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
        <style>
            body {
                font-family: "Montserrat", sans-serif;
                background-color: #000; /* Set a default black background */
            }
        </style>
    </head>
    <body>
        <header>
            <nav
                id="main-nav"
                class="fixed top-0 left-0 w-full z-50 bg-transparent transition-colors duration-300"
             >
                <div
                    class="max-w-screen-xl mx-auto flex justify-between items-center px-4 py-3 relative"
                >
                    {{-- Path diubah menggunakan helper asset() --}}
                    <a href="{{ route('home') }}"
                        ><img
                            src="{{ asset('asset/logo/logoCompany.svg') }}"
                            class="h-12 hover:bg-[#6c0c0d] rounded-lg transition-colors md:-translate-x-6 md:translate-y-2"
                            alt="Malacca Logo"
                    /></a>
                    <ul
                        class="hidden md:flex items-center space-x-6 text-sm text-white font-medium"
                    >
                        <li>
                            <a
                                href="#tentang"
                                class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors"
                                >tentang</a
                            >
                        </li>
                        <li>
                            <a
                                href="#jurnal"
                                class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors"
                                >jurnal seduh</a
                            >
                        </li>
                        <li>
                            <a
                                href="#temurasa"
                                class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors"
                                >temu rasa</a
                            >
                        </li>
                        <li>
                            <a
                                href="#catatan"
                                class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors"
                                >catatan pinggir kali</a
                            >
                        </li>
                        <li>
                            <a
                                href="#ruang"
                                class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors"
                                >pang!</a
                            >
                        </li>
                        <li>
                            <a
                                href="#ruang"
                                class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors"
                                >kultum</a
                            >
                        </li>
                        <li>
                            <a
                                href="#ruang"
                                class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors"
                                >kerja klmpk</a
                            >
                        </li>
                    </ul>
                    <button
                        data-collapse-toggle="navbar-hamburger"
                        type="button"
                        class="inline-flex items-center justify-center w-12 h-12 rounded-lg hover:bg-[#6c0c0d] transition-colors"
                        aria-controls="navbar-hamburger"
                        aria-expanded="false"
                    >
                        <svg
                            class="w-5 h-5 text-white"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                    <div
                        class="hidden absolute top-full right-4 mt-2 w-48"
                        id="navbar-hamburger"
                    >
                        <ul
                            class="flex flex-col font-medium rounded-lg bg-white shadow-lg"
                        >
                            <li>
                                <a
                                    href="{{ route('home') }}"
                                    class="block py-2 px-3 text-[#6c0c0d] rounded-t-lg"
                                    aria-current="page"
                                    >malacca entreprise</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="block py-2 px-3 text-black hover:bg-[#6c0c0d] hover:text-white transition-colors"
                                    >coffeehouse</a
                                >
                            </li>
                            <li>
                                {{-- Link diubah ke route yang benar --}}
                                <a
                                    href="{{ route('kalibrasi') }}"
                                    class="block py-2 px-3 text-black rounded-b-lg hover:bg-[#6c0c0d] hover:text-white transition-colors"
                                    >kalibrasi</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <!--hero section-->
            <section
                id="hero"
                class="relative min-h-screen bg-cover bg-center flex items-center justify-center text-white"
                style="background-image: url('{{ asset('asset/img/kalibrasi.png') }}')"
             >
                <div class="absolute inset-0 bg-black/30 z-10"></div>
                <div class="relative text-center z-30 p-4">
                    <h1 class="font-bold text-6xl md:text-8xl">kalibrasi</h1>
                    <p class="font-thin text-lg md:text-xl">
                        a brand activation by
                        <span class="font-bold">malacca</span>
                    </p>
                </div>
            </section>
            <!--tentang section-->
            <section
                id="tentang"
                class="min-h-screen flex flex-col md:flex-row bg-[#6c0c0d] overflow-hidden"
             >
                <div
                    class="flex flex-col justify-center text-justify text-white w-full md:w-1/2 px-8 py-16 md:pl-10 lg:pl-20"
                >
                    <h1 class="font-extralight text-xl">tentang</h1>
                    <h2 class="font-bold text-4xl mb-6">pengantar</h2>
                    <p class="text-large">
                        Kalibrasi merupakan program aktivasi media sosial
                        Instagram Malacca yang dirancang untuk meningkatkan
                        brand awareness di kalangan konsumen. Melalui penetrasi
                        media sosial, program ini menjadi sarana perluasan
                        budaya digital dalam membentuk serta memperkuat
                        eksistensi dan identitas Malacca.
                        <br />
                        <br />
                        Kalibrasi tidak hanya berfungsi sebagai kanal
                        komunikasi, tetapi juga sebagai strategi membangun
                        jejaring komunitas yang relevan dan aktif. Relasi yang
                        terbangun melalui platform ini diharapkan dapat
                        dikonversi menjadi peningkatan trafik digital sekaligus
                        memperluas jangkauan pasar secara berkelanjutan.
                    </p>
                </div>

                <div
                    class="w-full md:w-1/2 grid grid-cols-2 md:grid-cols-3 grid-rows-3 md:grid-rows-2 gap-2 p-4 pb-10 md:pb-0 md:pr-8 place-items-center"
                >
                    <a
                        href="#jurnal"
                        class="w-[75%] h-auto md:transform md:translate-y-32 md:translate-x-2 md:scale-110"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/jurnalseduh.svg') }}"
                            alt="Jurnal Seduh"
                        />
                    </a>

                    <a
                        href="#temurasa"
                        class="w-[75%] h-auto md:transform md:translate-y-32 md:translate-x-2 md:scale-110"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/temurasa.svg') }}"
                            alt="Temurasa"
                        />
                    </a>

                    <a
                        href="#catatan"
                        class="w-[75%] h-auto md:transform md:translate-y-32 md:translate-x-2 md:scale-110"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/catatan.svg') }}"
                            alt="Catatan Pinggir Kali"
                        />
                    </a>

                    <a
                        href="#ruang"
                        class="w-[75%] h-auto md:transform md:-translate-y-20 md:translate-x-2 md:scale-110"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/kultum.svg') }}"
                            alt="Kultum"
                        />
                    </a>

                    <a
                        href="#ruang"
                        class="w-[75%] h-auto md:transform md:-translate-y-20 md:translate-x-2 md:scale-110"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/kerjaklmpk.svg') }}"
                            alt="Kerja Klmpk"
                        />
                    </a>

                    <a
                        href="#ruang"
                        class="w-[75%] h-auto md:transform md:-translate-y-20 md:translate-x-2 md:scale-110"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/pang.svg') }}"
                            alt="Pang"
                        />
                    </a>
                </div>
            </section>
            <!--jurnal section-->
            <section
                id="jurnal"
                class="bg-[url('{{ asset('asset/img/jurnalseduh.png') }}')] min-h-screen bg-cover bg-center"
             >
                <div class="flex flex-col md:flex-row">
                    <!--left side-->
                    <div
                        class="w-full md:w-1/2 flex flex-col justify-center px-8 py-16 md:pl-10 lg:pl-20"
                     >
                        <!--paragraph-->
                        <div class="mb-12 md:pt-10">
                            <p
                                class="text-justify text-white font-light text-base"
                            >
                                Malacca Coffee Konten micro-blog atau reels
                                berisi cerita dari individu dengan pengalaman
                                atau pemikiran yang inspiratif. Format narasi
                                personal ini membangun kedekatan emosional
                                antara cerita, ruang, dan pembaca. Konten kurasi
                                unggahan dari website resmi Malacca yang
                                menghimpun tulisan-tulisan panjang: mulai dari
                                esai ringan, ulasan, hingga refleksi tematik.
                            </p>
                        </div>
                        <!--article card-->
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
                         >
                            {{-- We use ->take(3) to only loop through the first 3 articles --}} 
                            @forelse ($articles->where('category', 'jurnal seduh')->take(3) as $article)
                            <a
                                href="{{ route('articles.show', $article->slug) }}"
                                class="relative block rounded-2xl shadow-lg h-[350px] bg-cover bg-center overflow-hidden group"
                                style="background-image: url('{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}');"
                            >
                                <div
                                    class="absolute inset-0 bg-black/60 group-hover:bg-transparent transition-colors duration-300"
                                ></div>
                                <div
                                    class="relative z-10 p-4 flex flex-col h-full justify-end"
                                >
                                    
                                    <h5
                                        class="mb-2 text-2xl md:text-base font-bold tracking-tight text-white pb-3"
                                    >
                                        {{ $article->title }}
                                    </h5>
                                    
                                    <span
                                        class="read-more-btn text-white text-sm md:text-xs font-semibold hover:underline self-start"
                                    >
                                        Read More
                                    </span>
                                </div>
                            </a>
                            @empty
                            <div class="col-span-full text-center text-white">
                                <p>belum ada tulisan saat ini</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!--section logo-->
                    <div
                        class="w-full md:w-1/2 flex items-center justify-center p-8"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/jurnalseduh.svg') }}"
                            alt="Jurnal Seduh"
                            class="hidden md:flex md:w-2/4"
                        />
                    </div>
                </div>
            </section>
            <!--temurasa section-->
            <section
                id="temurasa"
                class="bg-[url('{{ asset('asset/img/temurasa.png') }}')] min-h-screen bg-cover bg-center"
             >
                <div class="flex flex-col md:flex-row">
                    <!--section logo-->
                    <div
                        class="w-full md:w-1/2 flex items-center justify-center p-8"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/temurasa.svg') }}"
                            alt="Jurnal Seduh"
                            class="hidden md:flex md:w-2/4"
                        />
                    </div>
                    <!--right side-->
                    <div
                        class="w-full md:w-1/2 flex flex-col justify-center px-8 py-16 md:pl-10 lg:pl-20"
                     >
                        <!--paragraph-->
                        <div class="mb-12 md:pt-10">
                            <p
                                class="text-justify text-white font-light text-large"
                            >
                                Rubrik micro-blog yang menyuarakan opini,
                                refleksi, dan pandangan kritis terhadap isu-isu
                                sosial, budaya, maupun keseharian—ditulis dari
                                sudut pandang “orang biasa”. Menawarkan cara
                                pandang yang jujur, luwes, dan membumi, sebagai
                                bentuk dokumentasi gagasan dari tepian wacana
                                arus utama.
                            </p>
                        </div>
                        <!--article card-->
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
                        >
                            {{-- We use ->take(3) to only loop through the first
                            3 articles --}} 
                            @forelse ($articles->where('category', 'temu rasa')->take(3) as $article)
                            <a
                                href="{{ route('articles.show', $article->slug) }}"
                                class="relative block rounded-2xl shadow-lg h-[350px] bg-cover bg-center overflow-hidden group"
                                style="background-image: url('{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}');"
                            >
                                <div
                                    class="absolute inset-0 bg-black/60 group-hover:bg-transparent transition-colors duration-300"
                                ></div>
                                <div
                                    class="relative z-10 p-4 flex flex-col h-full justify-end"
                                >
                                    <h5
                                        class="mb-2 text-2xl md:text-base font-bold tracking-tight text-white pb-3"
                                    >
                                        {{ $article->title }}
                                    </h5>
                                    <span
                                        class="read-more-btn text-white text-sm md:text-xs font-semibold hover:underline self-start"
                                    >
                                        Read More
                                    </span>
                                </div>
                            </a>
                            @empty
                            <div class="col-span-full text-center text-white">
                                <p>belum ada tulisan saat ini</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
            <!--catatan section-->
            <section
                id="catatan"
                class="bg-[url('{{ asset('asset/img/catatan.png') }}')] min-h-screen bg-cover bg-center"
             >
                <div class="flex flex-col md:flex-row">
                    <!--left side-->
                    <div
                        class="w-full md:w-1/2 flex flex-col justify-center px-8 py-16 md:pl-10 lg:pl-20"
                    >
                        <!--paragraph-->
                        <div class="mb-12 md:pt-10">
                            <p
                                class="text-justify text-white font-light text-large"
                            >
                                Rubrik micro-blog yang menyuarakan opini,
                                refleksi, dan pandangan kritis terhadap isu-isu
                                sosial, budaya, maupun keseharian—ditulis dari
                                sudut pandang “orang biasa”. Menawarkan cara
                                pandang yang jujur, luwes, dan membumi, sebagai
                                bentuk dokumentasi gagasan dari tepian wacana
                                arus utama.
                            </p>
                        </div>
                        <!--article card-->
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
                         >
                            {{-- We use ->take(3) to only loop through the first
                            3 articles --}} 
                            @forelse ($articles->where('category', 'catatan pinggir kali')->take(3) as $article)
                            <a
                                href="{{ route('articles.show', $article->slug) }}"
                                class="relative block rounded-2xl shadow-lg h-[350px] bg-cover bg-center overflow-hidden group"
                                style="background-image: url('{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}');"
                            >
                                <div
                                    class="absolute inset-0 bg-black/60 group-hover:bg-transparent transition-colors duration-300"
                                ></div>
                                <div
                                    class="relative z-10 p-4 flex flex-col h-full justify-end"
                                >
                                    <h5
                                        class="mb-2 text-2xl md:text-base font-bold tracking-tight text-white pb-3"
                                    >
                                        {{ $article->title }}
                                    </h5>
                                    <span
                                        class="read-more-btn text-white text-sm md:text-xs font-semibold hover:underline self-start"
                                    >
                                        Read More
                                    </span>
                                </div>
                            </a>
                            @empty
                            <div class="col-span-full text-center text-white">
                                <p>belum ada tulisan saat ini</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!--section logo-->
                    <div
                        class="w-full md:w-1/2 flex items-center justify-center p-8"
                    >
                        <img
                            src="{{ asset('asset/kalibrasi/catatan.svg') }}"
                            alt="Jurnal Seduh"
                            class="hidden md:flex md:w-2/4"
                        />
                    </div>
                </div>
            </section>
            <!--ruang section-->
            <section id="ruang">
                <div class="flex flex-col md:flex-row">
                    <!--kultum section-->
                    <div
                      class="w-full md:w-1/3 bg-cover bg-center min-h-screen flex flex-col items-center justify-center p-8 gap-6"
                     >
                                <!-- logo and text-->
                                <img src="{{ asset('asset/kalibrasi/kultum.svg') }}" alt="Kultum Logo">
                                <p class="text-justify text-white font-light text-base">
                                   Sesi belajar santai lintas disiplin
                                   yang menghadirkan pemateri
                                   dari berbagai bidang. Tanpa
                                   beban akademik, tanpa tekanan
                                   formal, namun tetap menawarkan
                                   kedalaman gagasan.
                                   “Kultum” dirancang sebagai ruang
                                   temu wacana yang cair, terbuka,
                                   dan menumbuhkan.
                                </p>
                                <!--article card-->
                                <div
                                 class="grid grid-cols-1 gap-6"
                                 >
                                   {{-- We use ->take(3) to only loop through the first 1 articles --}} 
                                    @forelse ($articles->where('category', 'kultum')->take(3) as $article)
                                    <a
                                        href="{{ route('articles.show', $article->slug) }}"
                                        class="relative block rounded-2xl shadow-lg md:w-[25vw] h-[350px] bg-cover bg-center overflow-hidden group"
                                        style="background-image: url('{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}');"
                                    >
                                        <div
                                            class="absolute inset-0 bg-black/60 group-hover:bg-transparent transition-colors duration-300"
                                        ></div>
                                        <div
                                            class="relative z-10 p-4 flex flex-col h-full justify-end"
                                        >
                                            <h5
                                                class="mb-2 text-2xl md:text-base font-bold tracking-tight text-white pb-3"
                                            >
                                                {{ $article->title }}
                                            </h5>
                                            <span
                                                class="read-more-btn text-white text-sm md:text-xs font-semibold hover:underline self-start"
                                            >
                                                Read More
                                            </span>
                                        </div>
                                     </a>
                                    @empty
                                    <div class="col-span-full text-center text-white">
                                        <p>belum ada tulisan saat ini</p>
                                    </div>
                                    @endforelse
                                </div>
                    </div>
                    <!--pang section-->
                    <div
                      class="w-full md:w-1/3 bg-cover bg-center min-h-screen flex flex-col items-center justify-center p-8 gap-6"
                     >
                                <!--article card-->
                                <div
                                 class="grid grid-cols-1 gap-6 order-3 md:order-none"
                                 >
                                   {{-- We use ->take(3) to only loop through the first 1 articles --}} 
                                    @forelse ($articles->where('category', 'pang!')->take(3) as $article)
                                    <a
                                        href="{{ route('articles.show', $article->slug) }}"
                                        class="relative block rounded-2xl shadow-lg md:w-[25vw] h-[350px] bg-cover bg-center overflow-hidden group"
                                        style="background-image: url('{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}');"
                                    >
                                        <div
                                            class="absolute inset-0 bg-black/60 group-hover:bg-transparent transition-colors duration-300"
                                        ></div>
                                        <div
                                            class="relative z-10 p-4 flex flex-col h-full justify-end"
                                        >
                                            <h5
                                                class="mb-2 text-2xl md:text-base font-bold tracking-tight text-white pb-3"
                                            >
                                                {{ $article->title }}
                                            </h5>
                                            <span
                                                class="read-more-btn text-white text-sm md:text-xs font-semibold hover:underline self-start"
                                            >
                                                Read More
                                            </span>
                                        </div>
                                     </a>
                                    @empty
                                    <div class="col-span-full text-center text-white">
                                        <p>belum ada tulisan saat ini</p>
                                    </div>
                                    @endforelse
                                </div>
                                <!--Logo and Text-->
                                <p class="text-justify text-white font-light text-base order-2 md:order-none">
                                   “Pang!” hadir sebagai program rutin pagi hari yang 
                                   menghidupkan ruang produktif dengan obrolan
                                   ringan dan rutinitas harian. Mendorong produktivitas
                                   tanpa tekanan — cukup memulai pagi dengan hadir.
                                </p>
                                <img src="{{ asset('asset/kalibrasi/pang.svg') }}" alt="Pang Logo" class="order-1 md:order-none">
                    </div>
                    <!--kerjakelompok section-->
                    <div
                      class="w-full md:w-1/3 bg-cover bg-center min-h-screen flex flex-col items-center justify-center p-8 gap-6"
                     >
                                <!--Logo and Text-->
                                <img src="{{ asset('asset/kalibrasi/kerjaklmpk.svg') }}" alt="Kerja Kelompok Logo">
                                <p class="text-justify text-white font-light text-base bg-gray/60">
                                   Program lokakarya kolaboratif dengan
                                   tema besar yang cair dan terbuka. 
                                   “Kerja Kelompok” memberi ruang bagi
                                   pertukaran ide, kerja kreatif bersama,
                                   dan partisipasi lintas latar belakang.
                                   Fokus utamanya adalah keterlibatan
                                   aktif, bukan hasil akhir.
                                </p>
                                <!--article card-->
                                <div
                                 class="grid grid-cols-1 gap-6"
                                 >
                                   {{-- We use ->take(3) to only loop through the first 1 articles --}} 
                                    @forelse ($articles->where('category', 'kerja kelompok')->take(3) as $article)
                                    <a
                                        href="{{ route('articles.show', $article->slug) }}"
                                        class="relative block rounded-2xl shadow-lg md:w-[25vw] h-[350px] bg-cover bg-center overflow-hidden group"
                                        style="background-image: url('{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}');"
                                    >
                                        <div
                                            class="absolute inset-0 bg-black/60 group-hover:bg-transparent transition-colors duration-300"
                                        ></div>
                                        <div
                                            class="relative z-10 p-4 flex flex-col h-full justify-end"
                                        >
                                            <h5
                                                class="mb-2 text-2xl md:text-base font-bold tracking-tight text-white pb-3"
                                            >
                                                {{ $article->title }}
                                            </h5>
                                            <span
                                                class="read-more-btn text-white text-sm md:text-xs font-semibold hover:underline self-start"
                                            >
                                                Read More
                                            </span>
                                        </div>
                                     </a>
                                    @empty
                                    <div class="col-span-full text-center text-white">
                                        <p>belum ada tulisan saat ini</p>
                                    </div>
                                    @endforelse
                                </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="bg-black">
            <section
                id="kunjungi"
                class="relative bg-cover bg-center text-white"
                style="background-image: url('{{ asset('asset/img/kunjungi.png') }}')"
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
                                ><img
                                    src="{{ asset('asset/icon/gofood.png') }}"
                                    alt="GoFood"
                                    class="w-5 h-5"
                            /></a>
                            <a
                                href="https://linktr.ee/malaccaentreprise"
                                class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"
                                ><img
                                    src="{{ asset('asset/icon/linktree.png') }}"
                                    alt="Linktree"
                                    class="w-5 h-5"
                            /></a>
                            <a
                                href="https://wa.link/1x9qk8"
                                class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"
                                ><img
                                    src="{{ asset('asset/icon/whatsapp.png') }}"
                                    alt="WhatsApp"
                                    class="w-5 h-5"
                            /></a>
                        </div>
                    </div>
                    <div
                        class="flex-1 flex flex-col items-center md:items-start text-justify md:text-left"
                    >
                        <h1 class="font-bold text-lg mb-4">Kunjungi Kami</h1>
                        <a
                            href="https://maps.app.goo.gl/RWCwJ44ykzFxhxb96"
                            class="block hover:underline"
                            ><p
                                class="text-sm text-gray-300 leading-relaxed max-w-xs"
                            >
                                Jalan Jl. Kemuning 7 No.32, RT.1/RW.8, Malaka
                                Sari, Kec. Duren Sawit, Kota Jakarta Timur,
                                Daerah Khusus Ibukota Jakarta 13460
                            </p></a
                        >
                    </div>
                    <div
                        class="flex-1 flex-col items-center md:items-start text-center md:text-left translate-y-0 md:translate-y-7"
                    >
                        <h1 class="font-bold text-lg mb-4">Kontak Kami</h1>
                        <div class="text-sm text-gray-300 space-y-2 mb-6">
                            <a
                                href="tel:+6287888814075"
                                class="block hover:underline"
                                >+62 878 8881 4075</a
                            >
                            <a
                                href="mailto:malaccancoffee@gmail.com"
                                class="block hover:underline"
                                >malaccancoffee@gmail.com</a
                            >
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

        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        {{-- Path diubah menggunakan helper asset() --}}
        <script src="{{ asset('scripts/global.js') }}" defer></script>
        <script src="{{ asset('scripts/main-page.js') }}" defer></script>
    </body>
</html>
