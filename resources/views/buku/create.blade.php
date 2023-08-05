@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku</h1>
    <a href="{{ route('buku.index') }}" class="btn btn-info">
        <i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul_buku">Judul Buku:</label>
            <input type="text" name="judul_buku" id="judul_buku" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="nama_kategori" id="kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <select name="nama_penerbits" id="penerbit" class="form-control">
                <option value="">Pilih Penerbit</option>
                @foreach($penerbit as $pen)
                    <option value="{{ $pen->id }}">{{ $pen->nama_penerbits }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="pdf">File PDF:</label>
            <input type="file" name="pdf" id="pdf" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane mr-2"></i>Simpan</button>
    </form>
@endsection
