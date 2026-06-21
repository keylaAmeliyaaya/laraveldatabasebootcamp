<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');          // wajib login
        $this->middleware('admin')->except(['index', 'show']); 
        // semua kecuali index & show → harus admin
    }

    // tampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    // form tambah produk
    public function create()
    {
        return view('product.create');
    }

    // simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable'
        ]);

        Product::create([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    // update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_product' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable'
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diupdate.');
    }

    // hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }

    // lihat detail produk (opsional)
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
}