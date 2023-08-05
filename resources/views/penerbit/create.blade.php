@extends('layouts.app')

@section('title', 'Tambah Penerbit')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Penerbit</h1>
    <a href="{{ route('penerbit.index') }}" class="btn btn-info">
        <i class="fas fa-arrow-left mr-2"></i>Kembali</a>

    <div class="card shadow mt-4">
        <div class="card-body">
            <form action="{{ url('penerbit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_penerbits">Nama Penerbit:</label>
                    <input type="text" class="form-control" id="nama_penerbits" name="nama_penerbits" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane mr-2"></i>Simpan</button>
            </form>
        </div>
    </div>
@endsection
