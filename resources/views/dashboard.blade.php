@extends('layouts.app')

@section('content')

<h2 class="mb-4 text-2xl font-bold">Dashboard</h2>
<p class="text-gray-600 mb-6">Selamat datang di Website Toko</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <!-- Card Produk -->
    <div class="card bg-red-500 text-white rounded-lg shadow p-5">
        <h5 class="text-lg font-semibold mb-2">Total Produk</h5>
        <h2 class="text-3xl font-bold">{{ $totalProduk }}</h2>
        <a href="{{ route('product.index') }}" class="mt-3 inline-block bg-white text-red-500 px-3 py-1 rounded">Kelola Produk</a>
    </div>

    <!-- Card User (admin only) -->
    @if(auth()->user()->role == 'admin')
    <div class="card bg-green-500 text-white rounded-lg shadow p-5">
        <h5 class="text-lg font-semibold mb-2">Total User</h5>
        <h2 class="text-3xl font-bold">{{ $totalUser }}</h2>
        <a href="{{ route('user.index') }}" class="mt-3 inline-block bg-white text-green-500 px-3 py-1 rounded">Kelola User</a>
    </div>
    @endif

    <!-- Card Info -->
    <div class="card bg-yellow-400 text-gray-900 rounded-lg shadow p-5">
        <h5 class="text-lg font-semibold mb-2">Info</h5>
        <p class="text-sm">Kelola data produk dan user di website toko ini.</p>
    </div>

</div>

@endsection