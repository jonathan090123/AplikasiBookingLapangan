  <!DOCTYPE html>
  <html lang="id">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Pemesanan')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>

  <body class="bg-gray-100">
    <nav class="bg-white shadow mb-6">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-extrabold text-gray-800">Form Pemesanan Lapangan</h1>
        <div class="flex space-x-4">
          <a href="/" class="text-lg font-medium text-gray-700 hover:text-gray-900">Home</a>
          <a href="/pesanan/create" class="text-lg font-medium text-gray-700 hover:text-gray-900">Pesan Lapangan</a>
          <a href="/pesanan/index" class="text-lg font-medium text-gray-700 hover:text-gray-900">List Lapangan</a>
        </div>
      </div>
    </nav>

    <div class="container mx-auto p-6">
      <h1 class="text-2xl font-bold mb-4">@yield('title', '')</h1>
      @yield('content')
    </div>
  </body>
  </html>
