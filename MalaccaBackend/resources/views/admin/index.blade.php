<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="icon" href="{{ asset('asset/logo/logoCompanyFavicon.svg') }}" type="image/svg+xml" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <style>
      body { font-family: "Montserrat", sans-serif; background-color: black; }
    </style>
</head>
<body>
   <header>
    <nav id="main-nav" class="fixed top-0 left-0 w-full z-50 bg-black/50 backdrop-blur-sm transition-colors duration-300">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center px-4 py-3 relative">
            <button type="button" id="show-drawer-btn" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
                <img src="{{ asset('asset/logo/logoCompany.svg') }}" class="h-12 hover:bg-[#6c0c0d] rounded-lg transition-colors md:-translate-x-6 md:translate-y-2" alt="Malacca Logo" />
            </button>
            
            <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center justify-center w-12 h-12 rounded-lg hover:bg-[#6c0c0d] transition-colors" aria-controls="navbar-hamburger" aria-expanded="false">
                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            <div class="hidden absolute top-full right-4 mt-2 w-48" id="navbar-hamburger">
                <ul class="flex flex-col font-medium rounded-lg bg-white shadow-lg">
                    <li><a href="#" class="block py-2 px-3 text-[#6c0c0d] rounded-t-lg" aria-current="page">malacca entreprise</a></li>
                    <li><a href="#" class="block py-2 px-3 text-black hover:bg-[#6c0c0d] hover:text-white transition-colors">coffeehouse</a></li>
                    <li><a href="{{ url('/') }}" class="block py-2 px-3 text-black hover:bg-[#6c0c0d] hover:text-white transition-colors">kalibrasi</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left block py-2 px-3 text-black rounded-b-lg hover:bg-[#6c0c0d] hover:text-white transition-colors">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <main>
      <section id="sidebar" class="flex flex-col">
        <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-black pt-[50px]" tabindex="-1" aria-labelledby="drawer-navigation-label">
          <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
              <li><a href="#dashboard" class="flex items-center p-2 rounded-lg text-white hover:bg-[#6c0c0d] sidebar-link"><span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span></a></li>
              <li><a href="#article" class="flex items-center p-2 rounded-lg text-white hover:bg-[#6c0c0d] sidebar-link"><span class="flex-1 ms-3 whitespace-nowrap">Article</span></a></li>
            </ul>
          </div>
        </div>
      </section>

      <div class="p-4 sm:ml-64 mt-16 text-white">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-400 bg-gray-800 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <section id="dashboard" class="content-section">
          <h1 class="text-2xl font-bold">Admin Dashboard</h1>
          <p class="mt-2">Welcome to the control panel, {{ Auth::user()->name }}.</p>
        </section>

        <div id="article" class="content-section hidden">
          <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Article Management</h1>
            <a href="{{ route('admin.articles.create') }}" class="text-white bg-[#6c0c0d] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
              Add New
            </a>
          </div>

          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-400">
              {{-- Header Tabel dikembalikan sesuai template asli --}}
              <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                  <th scope="col" class="p-4">
                      <div class="flex items-center">
                          <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2" />
                          <label for="checkbox-all-search" class="sr-only">checkbox</label>
                      </div>
                  </th>
                  <th scope="col" class="px-6 py-3">Title</th>
                  <th scope="col" class="px-6 py-3">Categories</th>
                  <th scope="col" class="px-6 py-3">Author</th>
                  <th scope="col" class="px-6 py-3">Date</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($articles as $article)
                {{-- Menambahkan class 'group' untuk efek hover --}}
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600 group">
                  <td class="w-4 p-4">
                      <div class="flex items-center">
                          <input id="checkbox-table-search-{{ $article->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2" />
                          <label for="checkbox-table-search-{{ $article->id }}" class="sr-only">checkbox</label>
                      </div>
                  </td>
                  {{-- Kolom judul dengan tombol aksi hover --}}
                  <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                      <div>
                          <p>{{ $article->title }}</p>
                          <div class="flex items-center space-x-2 text-xs text-gray-400 hidden group-hover:block mt-1">
                              <a href="{{ route('admin.articles.edit', $article->id) }}" class="hover:underline text-blue-500">Edit</a>
                              <span>|</span>
                              <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="hover:underline text-red-500">Trash</button>
                              </form>
                              {{-- Link View bisa ditambahkan di sini jika ada halaman detail --}}
                          </div>
                      </div>
                  </th>
                  <td class="px-6 py-4">{{ $article->category }}</td>
                  <td class="px-6 py-4">{{ $article->author }}</td>
                  <td class="px-6 py-4">{{ $article->published_at->format('Y/m/d') }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="px-6 py-4 text-center">No articles found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          {{-- Paginasi --}}
          <nav class="flex items-center flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                Showing <span class="font-semibold text-white">{{ $articles->firstItem() }}-{{ $articles->lastItem() }}</span> 
                of <span class="font-semibold text-white">{{ $articles->total() }}</span>
            </span>
            {{ $articles->links() }}
          </nav>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('scripts/global.js') }}" defer></script>
    <script src="{{ asset('scripts/admin-script.js') }}" defer></script>
  </body>
</html>