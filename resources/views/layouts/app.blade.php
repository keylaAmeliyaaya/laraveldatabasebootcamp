<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Website Toko</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

<!-- SIDEBAR -->
<aside class="w-60 bg-gray-900 text-white p-5 flex flex-col">

    <h2 class="text-xl font-bold mb-6">Toko App</h2>

    <a href="{{ route('dashboard') }}"
       class="block py-2 px-3 rounded mb-2 hover:bg-gray-700
       {{ request()->is('/') ? 'bg-blue-500' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('product.index') }}"
       class="block py-2 px-3 rounded mb-2 hover:bg-gray-700
       {{ request()->is('product*') ? 'bg-blue-500' : '' }}">
        Produk
    </a>

    @if(auth()->user()->role == 'admin')
    <a href="{{ route('user.index') }}"
       class="block py-2 px-3 rounded mb-2 hover:bg-gray-700
       {{ request()->is('user*') ? 'bg-blue-500' : '' }}">
        User
    </a>
    @endif

    <hr class="my-4 border-gray-600">

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full py-2 px-3 bg-red-500 hover:bg-red-600 rounded text-center">
            Logout
        </button>
    </form>

</aside>

<!-- CONTENT -->
<main class="flex-1 p-8">

    @if(session('error'))
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @yield('content')

</main>

</body>
</html>