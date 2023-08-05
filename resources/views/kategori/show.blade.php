<!DOCTYPE html>
<html>
<head>
    <title>Detail Kategori</title>
</head>
<body>
    <h1>Detail Kategori</h1>
    <a href="{{ route('kategori.index') }}">Kembali</a>
    <p><strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}</p>
</body>
</html>
