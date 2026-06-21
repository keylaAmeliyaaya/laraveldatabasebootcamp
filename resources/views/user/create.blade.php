@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Tambah User</h1>

<form action="{{ route('user.store') }}" method="POST" class="bg-white p-6 rounded shadow">

@csrf

<div class="mb-3">
<label>Nama</label>
<input type="text" name="name" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Role</label>
<select name="role" class="w-full border p-2 rounded">
    <option value="admin">Admin</option>
    <option value="user">User</option>
</select>
</div>

<div class="mt-4">
<button class="bg-green-500 text-white px-4 py-2 rounded">
Simpan
</button>

<a href="/user" class="bg-gray-400 text-white px-4 py-2 rounded">
Kembali
</a>
</div>

</form>

@endsection