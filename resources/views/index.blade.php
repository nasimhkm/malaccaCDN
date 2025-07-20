<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <title>Malacca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P9RJKKCBGP"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag("js", new Date());
      gtag("config", "G-P9RJKKCBGP");
    </script>
    <link rel="icon" href="{{ asset('asset/logo/logoCompanyFavicon.svg') }}" type="image/svg+xml" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <style>
      body { font-family: "Montserrat", sans-serif; background-color: #000; }
      .line-clamp-3 { overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; }
    </style>
</head>
<body>
    <header>
      <nav id="main-nav" class="fixed top-0 left-0 w-full z-50 bg-transparent transition-colors duration-300">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center px-4 py-3 relative">
          <a href="#hero"><img src="{{ asset('asset/logo/logoCompany.svg') }}" class="h-12 hover:bg-[#6c0c0d] rounded-lg transition-colors md:-translate-x-6 md:translate-y-2" alt="Malacca Logo" /></a>
          <ul class="hidden md:flex items-center space-x-6 text-sm text-white font-medium">
            <li><a href="#tentang" class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors">tentang</a></li>
            <li><a href="#unit" class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors">unit</a></li>
            <li><a href="#showcase" class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors">tulisan</a></li>
            <li><a href="#kalibrasi" class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors">kalibrasi*</a></li>
            <li><a href="#kunjungi" class="nav-link hover:bg-[#6c0c0d] p-2 rounded-lg transition-colors">kunjungi</a></li>
          </ul>
          <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center justify-center w-12 h-12 rounded-lg hover:bg-[#6c0c0d] transition-colors" aria-controls="navbar-hamburger" aria-expanded="false"><svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/></svg></button>
          <div class="hidden absolute top-full right-4 mt-2 w-48" id="navbar-hamburger"><ul class="flex flex-col font-medium rounded-lg bg-white shadow-lg"><li><a href="#" class="block py-2 px-3 text-[#6c0c0d] rounded-t-lg" aria-current="page">malacca entreprise</a></li><li><a href="#" class="block py-2 px-3 text-black hover:bg-[#6c0c0d] hover:text-white transition-colors">coffeehouse</a></li><li><a href="{{ url('/') }}" class="block py-2 px-3 text-black rounded-b-lg hover:bg-[#6c0c0d] hover:text-white transition-colors">kalibrasi</a></li></ul></div>
        </div>
      </nav>
    </header>

    <main>
      <section id="hero" class="min-h-screen bg-cover bg-center flex flex-col items-center justify-center text-white p-4" style="background-image: url('{{ asset('asset/img/hero.png') }}')">
        <div class="flex flex-col md:flex-row items-center justify-center text-center md:text-left mb-8">
          <div class="pt-16 md:pt-0">
            <img src="{{ asset('asset/logo/logoCompany.svg') }}" class="w-24 md:w-36 mb-4 md:mb-0 md:mr-10 mx-auto" alt="Malacca Logo" />
          </div>
          <div>
            <h1 class="text-4xl md:text-5xl font-bold">
              once brew<br />
              we bro
            </h1>
          </div>
        </div>
        <div>
          <button type="button" class="py-2.5 px-6 text-xl text-sm font-medium text-white bg-transparent rounded-full border md:border-[3px] border-white hover:bg-white/10 transition-colors">
            kolaborasi bareng kita
          </button>
        </div>
      </section>

      <section id="tentang" class="min-h-screen flex flex-col md:flex-row bg-black">
        <div class="relative flex flex-col justify-center text-justify text-white w-full md:ml-[2.5rem] md:w-1/2 bg-black px-8 py-16 md:px-16 overflow-hidden">
          <h3 class="font-thin text-gray-300">tentang</h3>
          <h2 class="text-3xl md:text-4xl font-bold mb-6">cerita singkat <br />malacca</h2>
          <p class="text-gray-200 leading-relaxed mb-4">Kami adalah entitas yang berakar dari semangat untuk menghadirkan pengalaman kopi yang autentik di tengah dinamika Jakarta Timur. Kami lahir dari semangat kolaboratif untuk membangun ekosistem F&B yang lebih inovatif dan berkelanjutan.</p>
          <p class="text-gray-200 leading-relaxed">Dengan menggabungkan pendekatan kreatif, riset mendalam, dan nilai-nilai komunitas, kami berkomitmen menjadi mitra pertumbuhan yang adaptif dan relevan di tengah dinamika industri makanan dan minuman Indonesia.</p>
        </div>
        <div class="relative w-full md:w-1/2 h-96 md:h-screen">
          <img src="{{ asset('asset/img/tentang.png') }}" class="w-full h-full object-cover" alt="Owner of Malacca" />
        </div>
      </section>

      <section id="unit" class="min-h-screen flex flex-col justify-center bg-black text-white py-16 px-4">
        <div class="w-full max-w-4xl mx-auto text-left mb-8">
          <p class="font-thin text-gray-300">unit</p>
          <h2 class="text-3xl font-bold">unit bisnis & jasa</h2>
        </div>
        <div class="w-full max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-center gap-8">
          <div class="border border-dashed border-white p-6 rounded-3xl flex-1">
            <img src="{{ asset('asset/icon/coffeehouse.png') }}" alt="Coffeehouse icon" class="h-12 mb-4" />
            <h2 class="text-2xl font-bold mb-2">malacca coffeehouse</h2>
            <p class="text-sm text-gray-300 leading-relaxed"><span class="font-bold">Malacca Coffeehouse</span> membangun nilai pembeda melalui sajian berkualitas berbahan eksklusif yang dikemas secara sederhana. Hal ini menciptakan pengalaman yang autentik untuk konsumen. Kami menghadirkan ruang dengan nuansa homie dan pelayanan yang menjunjung kesetaraan, menjadikan setiap kunjungan terasa akrab dan nyaman.</p>
            <div class="border-b w-20 border-2 mt-4"></div>
          </div>
          <div class="border border-dashed border-white p-6 rounded-3xl flex-1">
            <img src="{{ asset('asset/icon/advisory.png') }}" alt="Advisory icon" class="h-12 mb-4" />
            <h2 class="text-2xl font-bold mb-2">malacca advisory</h2>
            <p class="text-sm text-gray-300 leading-relaxed"><span class="font-bold">Malacca Advisory</span> merupakan unit konsultasi yang berfokus pada pemberdayaan wirausahawan di sektor makanan dan minuman (F&B). Unit ini menyediakan layanan yang mencakup riset dan pengembangan (R&D), perumusan strategi bisnis, serta optimalisasi operasional, guna mendorong pertumbuhan usaha yang berkelanjutan dan kompetitif.</p>
            <div class="border-b w-20 border-2 mt-4"></div>
          </div>
        </div>
      </section>

      <section id="showcase" class="min-h-screen flex flex-col bg-black py-16">
        <div class="max-w-screen-xl mx-auto px-4">
          <div class="text-center text-white w-full max-w-4xl mx-auto mb-12">
            <h2 class="font-thin text-gray-300 tracking-wider">tulisan</h2>
            <h1 class="font-bold text-3xl md:text-4xl mt-2">beberapa tulisan yang kami sediakan</h1>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            @forelse ($articles as $article)
            <div class="bg-white rounded-3xl shadow-lg flex flex-col">
              <a href="{{ route('articles.show', $article->slug) }}">
                <img class="rounded-t-lg w-full h-[250px] object-cover" 
                     src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('asset/img/default-article.jpg') }}" 
                     alt="{{ $article->title }}">
              </a>
              <div class="p-5 flex flex-col flex-grow">
                <h6 class="text-[#6c0c0d] font-bold">{{ $article->category }}</h6>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">
                  <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                </h5>
                <p class="product-description line-clamp-3 mb-3 font-normal text-justify text-gray-700 flex-grow">
                  {!! Str::limit(strip_tags($article->content), 120) !!}
                </p>
                <a href="{{ route('articles.show', $article->slug) }}" class="read-more-btn text-blue-600 hover:underline self-start">
                  Read More
                </a>
              </div>
            </div>
            @empty
            <div class="col-span-4 text-center text-white">
                <p>No articles available at the moment.</p>
            </div>
            @endforelse

          </div>
        </div>
      </section>

      <section id="kalibrasi" class="relative min-h-screen bg-cover bg-center flex items-center justify-center text-white" style="background-image: url('{{ asset('asset/img/kalibrasi.png') }}')">
        <div class="absolute inset-0 bg-black/30 z-10"></div>
        <div class="relative text-center z-30 p-4">
          <h1 class="font-bold text-6xl md:text-8xl">kalibrasi</h1>
          <p class="font-thin text-lg md:text-xl">a brand activation by <span class="font-bold">malacca</span></p>
        </div>
        <a href="{{ url('/') }}" class="absolute bottom-8 right-8 flex items-center gap-3 text-white z-30 group">
          <p class="font-light group-hover:underline"><span class="font-bold">lihat</span> lebih lanjut</p>
          <img src="{{ asset('asset/icon/arrow-right.svg') }}" alt="arrow icon" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" />
        </a>
      </section>
    </main>

    <footer class="bg-black">
      <section id="kunjungi" class="relative bg-cover bg-center text-white" style="background-image: url('{{ asset('asset/img/kunjungi.png') }}')">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative max-w-screen-xl mx-auto px-8 py-20 flex flex-col md:flex-row gap-12 md:gap-8 items-center justify-between">
          <div class="flex-1 flex flex-col items-center text-justify md:items-start">
            <img src="{{ asset('asset/logo/logoCompany.svg') }}" alt="Logo Malacca" class="w-24 mb-4" />
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs mb-6">Malacca adalah ruang kopi yang tumbuh dari kolaborasi, riset, dan nilai komunitas, untuk menghadirkan ekosistem F&B yang kreatif dan berkelanjutan.</p>
            <div class="flex items-center gap-4">
              <a href="https://gofood.link/a/yM8W6YL" class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"><img src="{{ asset('asset/icon/gofood.png') }}" alt="GoFood" class="w-5 h-5" /></a>
              <a href="#" class="w-8 h-8 flex items-center justify-center bg-[#6c0c0d] rounded-full hover:opacity-80 transition-opacity"><img src="{{ asset('asset/icon/linktree.png') }}" alt="Linktree" class="w-5 h-5" /></a>
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
            <button type="button" class="py-2.5 px-6 text-sm font-medium text-white bg-transparent rounded-full border border-white hover:bg-white/10 transition-colors">mari bekerja sama</button>
          </div>
        </div>
        <div class="relative text-center py-8">
          <p class="text-xs text-gray-400">© Malacca Entreprise | All Rights Reserved</p>
        </div>
      </section>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('scripts/global.js') }}" defer></script>
    <script src="{{ asset('scripts/main-page.js') }}" defer></script>
  </body>
</html>