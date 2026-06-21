<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Produk</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-8">

<div class="flex justify-between items-center mb-6">

<div class="flex items-center gap-4">

<a href="/" class="flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">

<svg xmlns="http://www.w3.org/2000/svg"
fill="none"
viewBox="0 0 24 24"
stroke-width="2"
stroke="currentColor"
class="w-5 h-5">

<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>

</svg>

Dashboard

</a>

<h1 class="text-2xl font-bold text-gray-700">
Daftar Produk
</h1>

</div>

<a href="{{ route('product.create') }}"
class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">

+ Tambah Produk

</a>

</div>


<div class="my-3">

@if (session('success_create'))
<div class="bg-green-100 text-green-900 p-3 rounded">
{{ session('success_create') }}
</div>
@endif

@if (session('success_update'))
<div class="bg-yellow-100 text-yellow-900 p-3 rounded">
{{ session('success_update') }}
</div>
@endif

@if (session('success_delete'))
<div class="bg-red-100 text-red-900 p-3 rounded">
{{ session('success_delete') }}
</div>
@endif

</div>


<table class="w-full border border-gray-200 rounded-lg overflow-hidden">

<thead class="bg-gray-200">

<tr>

<th class="p-3 text-left">No</th>
<th class="p-3 text-left">Nama Produk</th>
<th class="p-3 text-left">Harga</th>
<th class="p-3 text-left">Deskripsi</th>
<th class="p-3 text-center">Aksi</th>

</tr>

</thead>


<tbody>

@forelse ($products as $index => $product)

<tr class="border-t hover:bg-gray-50">

<td class="p-3">{{ $index + 1 }}</td>

<td class="p-3 font-medium text-gray-700">
{{ $product->nama_product }}
</td>

<td class="p-3 text-green-600 font-semibold">
Rp {{ number_format($product->harga,0,',','.') }}
</td>

<td class="p-3 text-gray-600">
{{ $product->deskripsi }}
</td>

<td class="p-3 text-center space-x-2">

<a href="{{ route('product.edit', $product->id) }}"
class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">

Edit

</a>

<form action="{{ route('product.destroy',$product->id) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button
onclick="return confirm('Yakin ingin menghapus data ini?')"
class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="5" class="p-4 text-center text-gray-500">
Data produk belum ada
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</body>
</html>