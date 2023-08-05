@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle mr-2"></i>Tambah Buku</a>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- <div class="card"> --}}
        <div class="card-body">
            <div class="row">
                @foreach ($buku as $item)
                    <div class="col-md-4 mb-4 d-flex">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="card-image ">
                                    @if ($item->gambar)
                                        <img src="{{ asset('gambar/' . $item->gambar) }}" alt="{{ $item->judul_buku }}"
                                            class="img-thumbnail ">
                                    @else
                                        <div class="no-image">Tidak ada gambar</div>
                                    @endif
                                </div>
                                <h3 class="card-title">{{ $item->judul_buku }}</h3>
                                <p class="card-text">Kategori: {{ $item->kategori->nama_kategori }}</p>
                                <p class="card-text">Penerbit: {{ $item->penerbit->nama_penerbits }}</p>
                                <p class="card-text">Author: {{ $item->author }}</p>
                                <p class="card-text">Deskripsi: {{ $item->deskripsi }}</p>
                                <div class="card-actions d-flex justify-content-between ">
                                    <a href="{{ route('buku.show', $item->id) }}" class="btn btn-info m-1">
                                        <i class="fas fa-eye mr-2"></i>Lihat</a>
                                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning m-1">
                                        <i class="fas fa-edit mr-2"></i>Edit</a>
                                    <form action="{{ route('buku.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1">
                                            <i class="fas fa-trash-alt mr-2"></i>Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    {{-- </div> --}}

@endsection
