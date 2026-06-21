<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>


    <!-- Tailwind CDN (untuk belajar/praktik) -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>

</head>


<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">

            Tambah Produk

        </h1>
        <form action="{{ route('product.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Nama Produk
                </label>
                <input type="text" name="nama_product"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan nama produk">

                    @error('nama_product')
                <div class="mb-3">
                     <div class="bg-red-100 text-red-900 p-3 rounded">
                         {{ $message }}
                    </div>
                </div>
                @enderror
            </div>
            <div>

                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Harga
                </label>
                <input type="text" name="harga"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan harga">
                 @error('harga')
                <div class="mb-3">
                     <div class="bg-red-100 text-red-900 p-3 rounded">
                         {{ $message }}
                    </div>
                </div>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Deskripsi
                </label>
                <textarea name="deskripsi" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan deskripsi produk"></textarea>
                     @error('nama_product')
                    <div class="mb-3">
                         <div class="bg-red-100 text-red-900 p-3 rounded">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
                Simpan Produk
            </button>
        </form>
    </div>
</body>
</html>