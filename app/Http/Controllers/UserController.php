<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // dashboard admin
    public function dashboard()
    {
        $totalProduk = \App\Models\Product::count();
        $totalUser = User::count();

        return view('dashboard', compact('totalProduk', 'totalUser'));
    }

    // tampilkan semua user
    public function index()
    {
        $users = User::all(); // ambil semua user

        return view('user.index', compact('users'));
    }

    // tampilkan form tambah user
    public function create()
    {
        return view('user.create');
    }

    // proses simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,user',
            'phone_number' => 'nullable',
            'member' => 'nullable|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone_number' => $request->phone_number,
            'member' => $request->member ?? 0,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    // tampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    // proses update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|in:admin,user',
            'phone_number' => 'nullable',
            'member' => 'nullable|boolean',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->phone_number = $request->phone_number;
        $user->member = $request->member ?? 0;

        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

    // hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}