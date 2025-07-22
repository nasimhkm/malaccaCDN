<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login-Admin</title>
    {{-- PERBAIKAN: Menggunakan helper asset() --}}
    <link rel="icon" href="{{ asset('asset/logo/logoCompanyFavicon.svg') }}" type="image/svg+xml" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <style>
      body { font-family: "Montserrat", sans-serif; background-color: black; }
    </style>
</head>
<body>
    <section id="login" class="h-screen flex flex-col place-content-center">
      {{-- PERBAIKAN: Form dihubungkan ke Laravel --}}
      <form class="max-w-sm mx-auto" method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Menampilkan pesan eror jika login gagal --}}
        @error('email')
            <div class="p-4 mb-4 text-sm text-red-400 bg-gray-800 rounded-lg" role="alert">
                The provided credentials do not match our records.
            </div>
        @enderror
        
        <div class="mb-5">
          <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
          {{-- PERBAIKAN: Menambahkan atribut name="email" --}}
          <input
            type="email"
            id="email"
            name="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="name@malacca.com"
            value="{{ old('email') }}"
            required
            autofocus
          />
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-white">Your password</label>
          {{-- PERBAIKAN: Menambahkan atribut name="password" --}}
          <input
            type="password"
            id="password"
            name="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required
          />
        </div>
        <div class="flex items-start mb-5">
          <div class="flex items-center h-5">
            {{-- PERBAIKAN: Menambahkan name="remember" dan menghapus atribut required --}}
            <input
              id="remember"
              name="remember"
              type="checkbox"
              class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
            />
          </div>
          <label for="remember" class="ms-2 text-sm font-medium text-gray-300">Remember me</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Sign In
        </button>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Sign Up
        </button>
      </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>