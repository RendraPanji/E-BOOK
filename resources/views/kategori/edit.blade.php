@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>
    <a href="{{ route('kategori.index') }}" class="btn btn-info mb-3">
        <i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori:</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane mr-2"></i>Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
