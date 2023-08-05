@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>
    <a href="{{ route('kategori.index') }}" class="btn btn-info">
        <i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <div class="card shadow mt-4">
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori:</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane mr-2"></i>Simpan</button>
            </form>
        </div>
    </div>
@endsection
