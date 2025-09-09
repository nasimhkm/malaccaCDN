<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <link
            rel="icon"
            href="{{ asset('asset/logo/logoCompanyFavicon.svg') }}"
            type="image/svg+xml"
        />

        <script src="https://cdn.tailwindcss.com"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
        <style>
            body {
                font-family: "Montserrat", sans-serif;
                background-color: black;
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
                    <button
                        type="button"
                        id="show-drawer-btn"
                        data-drawer-target="drawer-navigation"
                        data-drawer-show="drawer-navigation"
                        aria-controls="drawer-navigation"
                    >
                        <img
                            src="{{ asset('asset/logo/logoCompany.svg') }}"
                            class="h-12 hover:bg-[#6c0c0d] rounded-lg transition-colors md:-translate-x-6 md:translate-y-2"
                            alt="Malacca Logo"
                        />
                    </button>

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
                                <a
                                    href="{{ route('kalibrasi') }}"
                                    class="block py-2 px-3 text-black hover:bg-[#6c0c0d] hover:text-white transition-colors"
                                    >kalibrasi</a
                                >
                            </li>
                            <li>
                                <form
                                    action="{{ route('logout') }}"
                                    method="POST"
                                >
                                    @csrf
                                    <button
                                        type="submit"
                                        class="w-full text-left block py-2 px-3 text-black rounded-b-lg hover:bg-[#6c0c0d] hover:text-white transition-colors"
                                    >
                                        logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div id="sidebar" class="flex flex-col">
                <div
                    id="drawer-navigation"
                    class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-black pt-[50px]"
                    tabindex="-1"
                    aria-labelledby="drawer-navigation-label"
                 >
                    <div class="py-4 overflow-y-auto">
                        <ul class="space-y-2 font-medium">
                            <!-- analytics -->
                            <li>
                                <button type="button" class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-[#6c0c0d] " aria-controls="dropdown-dashboard" data-collapse-toggle="dropdown-dashboard">
                                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Analytics Dashboard</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>

                                <ul id="dropdown-dashboard" class="hidden py-2 space-y-2">
                                    <li>
                                        <a href="#dashboard" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg ps-11 group hover:bg-[#6c0c0d] ">Google Analytics</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg ps-11 group hover:bg-[#6c0c0d] ">Google Ads</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg ps-11 group hover:bg-[#6c0c0d] ">Google Search Console</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg ps-11 group hover:bg-[#6c0c0d] ">Instagram - Discovery</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg ps-11 group hover:bg-[#6c0c0d] ">Instagram - Audience</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- article -->
                            <li>
                                <a
                                    href="#article"
                                    class="flex items-center p-2 rounded-lg text-white hover:bg-[#6c0c0d] sidebar-link"
                                    ><span class="flex-1 ms-3 whitespace-nowrap"
                                        >Article Management</span
                                    ></a
                                >
                            </li>
                            <!-- task -->
                            <li>
                                <a
                                    href="#task"
                                    class="flex items-center p-2 rounded-lg text-white hover:bg-[#6c0c0d] sidebar-link"
                                    ><span class="flex-1 ms-3 whitespace-nowrap"
                                        >Task Management</span
                                    ></a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <section class="p-4 mt-16 text-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-400 bg-gray-800 rounded-lg" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!--Analytics Dashboard-->
                <section id="dashboard" class="content-section">
    <div class="mt-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-900/50 rounded-lg p-5">
                <h3 class="text-gray-400 text-sm font-medium">Sessions</h3>
                <p id="kpi-sessions" class="text-3xl font-bold mt-2">...</p>
            </div>
            <div class="bg-gray-900/50 rounded-lg p-5">
                <h3 class="text-gray-400 text-sm font-medium">Bounce Rate</h3>
                <p id="kpi-bounce-rate" class="text-3xl font-bold mt-2">...</p>
            </div>
            <div class="bg-gray-900/50 rounded-lg p-5">
                <h3 class="text-gray-400 text-sm font-medium">Page Views</h3>
                <p id="kpi-page-views" class="text-3xl font-bold mt-2">...</p>
            </div>
            <div class="bg-gray-900/50 rounded-lg p-5">
                <h3 class="text-gray-400 text-sm font-medium">Average Session Duration</h3>
                <p id="kpi-avg-duration" class="text-3xl font-bold mt-2">...</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-gray-900/50 rounded-lg p-6 h-80">
                <h3 class="font-semibold mb-4">Sessions</h3>
                <canvas id="sessions-chart"></canvas>
            </div>
            <div class="bg-gray-900/50 rounded-lg p-6 h-80">
                <h3 class="font-semibold mb-4">Total Users</h3>
                <canvas id="users-chart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
             <div class="bg-gray-900/50 rounded-lg p-6 h-80">
                <h3 class="font-semibold mb-4">Sessions by Channel</h3>
                <canvas id="sessions-by-channel-chart"></canvas>
            </div>
             <div class="bg-gray-900/50 rounded-lg p-6 h-80">
                <h3 class="font-semibold mb-4">Users by Channel</h3>
                <canvas id="users-by-channel-chart"></canvas>
            </div>
        </div>

        <div class="bg-gray-900/50 rounded-lg p-6">
            <h3 class="font-semibold mb-4">Most Visited Pages</h3>
            <div class="overflow-y-auto max-h-80">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs uppercase text-gray-400 sticky top-0 bg-gray-900/50">
                        <tr>
                            <th scope="col" class="py-3">Page Path</th>
                            <th scope="col" class="py-3 text-right">Page Views</th>
                        </tr>
                    </thead>
                    <tbody id="popular-pages-tbody">
                        <tr><td colspan="2" class="py-4 text-center">Loading...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

                <!--Article Management-->
                <section id="article" class="content-section hidden">
                    <!--Article Management Head-->
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 pb-4">
                        <h1 class="text-2xl font-bold self-start md:self-center">Article Management</h1>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <form method="GET" action="{{ url()->current() }}#article" class="w-full md:w-auto">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search" name="search" class="block w-full p-2.5 pl-10 text-sm rounded-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search for articles" value="{{ request('search') }}">
                                </div>
                            </form>

                            <a href="{{ route('admin.articles.create') }}" class="text-white bg-[#6c0c0d] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Add New
                            </a>
                        </div>
                    </div>

                    <!--Article Management Table-->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-400">
                            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2" />
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
                                    <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600 group">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-{{ $article->id }}" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-600 ring-offset-gray-800 focus:ring-2" />
                                                <label for="checkbox-table-search-{{ $article->id }}"
                                                    class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-white max-w-md">
                                            <div>
                                                <p class="truncate" title="{{ $article->title }}">{{ $article->title }}</p>
                                                <div
                                                    class="flex items-center space-x-2 text-xs text-gray-400 opacity-0 group-hover:opacity-100 mt-1 transition-opacity duration-300">
                                                    <a href="{{ route('admin.articles.edit', $article->id) }}"
                                                        class="hover:underline text-blue-500">Edit</a>
                                                    |
                                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                                        class="inline" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="hover:underline text-red-500">
                                                            Trash
                                                        </button>
                                                        |
                                                        <a href="{{ route('articles.show', $article->slug) }}" target="_blank"
                                                            class="hover:underline text-green-500">View</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $article->category }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $article->author }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $article->published_at->format('Y/m/d') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center">
                                            No articles found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!--Article Management Pagination-->
                    <nav class="flex items-center flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                        <form method="GET" action="{{ url()->current() }}#article">
                            <label for="per_page" class="text-sm font-normal text-gray-400 mr-2">Show</label>
                            <select name="per_page" id="per_page" onchange="this.form.submit()"
                                class="text-sm rounded-lg block p-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </form>

                        <span class="text-sm font-normal text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                            Showing
                            <span class="font-semibold text-white">{{ $articles->firstItem() }}-{{ $articles->lastItem() }}</span>
                            of
                            <span class="font-semibold text-white">{{ $articles->total() }}</span>
                        </span>

                        {{ $articles->appends(request()->except('page'))->fragment('article')->links() }}
                    </nav>
                </section>

                <!--Task Management-->
                <section id="task" class="content-section hidden">
                    <div class="mb-10 mt-6">
                        <h1 class="text-4xl font-bold tracking-tight">Task Board</h1>
                        <p class="text-gray-400 mt-2">The task board to keep track of your tasks.</p>
                        <hr class="border-gray-800 my-6">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        @php
                            // Define the columns to ensure they are always displayed in order
                            $columns = ['backlog', 'ongoing', 'done'];
                        @endphp

                        @foreach ($columns as $status)
                            <div class="bg-gray-900/50 rounded-lg p-4">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="font-bold capitalize">{{ $status }}</h2>
                                     {{-- PENYESUAIAN: Tombol diubah untuk membuka modal --}}
                                    <button 
                                        data-modal-target="create-task-modal" 
                                        data-modal-toggle="create-task-modal"
                                        data-status="{{ $status }}"
                                        class="add-task-btn text-gray-400 hover:text-white">+</button>
                                </div>

                                <div id="{{ $status }}-col" class="space-y-4 min-h-[200px]">
                                    @foreach ($tasks[$status] ?? [] as $task)
                                        @include('admin.partials.task-card', ['task' => $task])
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>

                {{-- PENAMBAHAN: Sertakan file modal di sini --}}
                @include('admin.partials.create-task-modal')
                @include('admin.partials.edit-task-modal')
            </section>
        </main>

        

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <script src="{{ asset('scripts/global.js') }}" defer></script>
        <script src="{{ asset('scripts/admin-script.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>
</html>