<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>product</title>
</head>
<body>
<h1>Tambah Produk</h1>
<form action="tambahproduct" method="POST">
    @csrf
    <label>nama : </label>
    <input type="text" name = "nama_product"> <br>
    <label>harga : </label>
    <input type="text" name = "harga"> <br>
    <label>deskripsi : </label>
    <input type="text" name = "deskripsi"> <br>
    <button value="submit">submit</button>
    <a href="/admin/dashboard"> kembali </a>
</form>