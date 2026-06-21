@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Daftar User</h1>

<a href="{{ route('user.create') }}"
class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
+ Tambah User
</a>

<table class="w-full mt-4 bg-white shadow rounded">

<thead class="bg-gray-200">
<tr>
<th class="p-3 text-left">No</th>
<th class="p-3 text-left">Nama</th>
<th class="p-3 text-left">Email</th>
<th class="p-3 text-left">Role</th>
<th class="p-3 text-center">Aksi</th>
</tr>
</thead>

<tbody>
@foreach($users as $index => $user)

<tr class="border-t">
<td class="p-3">{{ $index+1 }}</td>
<td class="p-3">{{ $user->name }}</td>
<td class="p-3">{{ $user->email }}</td>
<td class="p-3 capitalize">{{ $user->role }}</td>

<td class="p-3 text-center space-x-2">

<a href="{{ route('user.edit',$user->id) }}"
class="bg-yellow-400 px-3 py-1 rounded text-white">
Edit
</a>

<form action="{{ route('user.destroy',$user->id) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button class="bg-red-500 px-3 py-1 rounded text-white">
Hapus
</button>

</form>

</td>
</tr>

@endforeach
</tbody>

</table>

@endsection