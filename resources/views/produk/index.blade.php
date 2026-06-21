<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen p-10">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-700">
                Daftar Produk
            </h1>
            <a href="{{ route('product.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                + Tambah Produk
            </a>
        </div>

        <div class="my-3">
            @if (session('success'))
                <div class="bg-green-100 text-green-900 p-3 rounded">
                    {{ session('success') }}
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
                                <tr class="border-t">
                                    <td class="p-3">{{ $index + 1 }}</td>
                                    <td class="p-3">{{ $product->nama_product }}</td>
                                    <td class="p-3">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td class="p-3">{{ $product->deskripsi }}</td>
                                    <td class="p-3 flex justify-center space-x-2">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route(
                        'product.destroy',
                        $product->id
                    ) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                onclick="return confirm('serius mau ngehapus? kata gue sih jangan yah tapi terserah')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
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

        <h2>Daftar User</h2>

        <a href="/user/create">
            <button>+ Tambah User</button>
        </a>
    </div>
</body>

</html>