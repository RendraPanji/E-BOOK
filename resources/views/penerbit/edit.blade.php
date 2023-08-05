@extends('layouts.app')

@section('title', 'Edit Penerbit')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Penerbit</h1>
        <a href="{{ route('penerbit.index') }}" class="btn btn-info">
            <i class="fas fa-arrow-left mr-2"></i>Kembali</a>

        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_penerbit">Nama Penerbit:</label>
                        <input type="text" name="nama_penerbits" id="nama_penerbit" class="form-control"
                            value="{{ $penerbit->nama_penerbits }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i>Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
