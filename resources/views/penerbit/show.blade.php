<!DOCTYPE html>
<html>
<head>
    <title>Detail Penerbit</title>
</head>
<body>
    <h1>Detail Penerbit</h1>
    <a href="{{ route('penerbit.index') }}">Kembali</a>
    <p><strong>Nama Penerbit:</strong> {{ $penerbit->nama_penerbit }}</p>
</body>
</html>
