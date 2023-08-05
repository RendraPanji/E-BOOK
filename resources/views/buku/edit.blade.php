@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">Edit Buku</h1>
        <a href="{{ route('buku.index') }}" class="btn btn-info">
            <i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Judul Buku:</label>
                <input type="text" name="judul_buku" value="{{ $buku->judul_buku }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" rows="4" class="form-control" required>{{ $buku->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label>Author:</label>
                <input type="text" name="author" value="{{ $buku->author }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Gambar:</label>
                @if($buku->gambar)
                    <img src="{{ asset('gambar/' . $buku->gambar) }}" alt="{{ $buku->judul_buku }}" width="100">
                @else
                    <p>Tidak ada gambar</p>
                @endif
                <input type="file" name="gambar" class="form-control-file mt-2">
            </div>
            <div class="form-group">
                <label>File PDF:</label>
                <input type="file" name="pdf" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane mr-2"></i>Simpan Perubahan</button>
        </form>
    </div>
</div>

@endsection
