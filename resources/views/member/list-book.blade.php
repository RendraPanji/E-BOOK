@extends('layouts.app-member')

@section('title', 'List Buku')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Buku</h1>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card-body">
        <div class="row">
            @foreach ($buku as $item)
                <div class="col-md-4 mb-4 d-flex">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="card-image">
                                @if ($item->gambar)
                                    <img src="{{ asset('gambar/' . $item->gambar) }}" alt="{{ $item->judul_buku }}"
                                        class="img-fluid">
                                @else
                                    <div class="no-image">Tidak ada gambar</div>
                                @endif
                            </div>
                            <h3 class="card-title">{{ $item->judul_buku }}</h3>
                            <p><strong>Kategori: </strong> {{ $item->kategori->nama_kategori }}</p>
                            <p><strong>Penerbit: </strong> {{ $item->penerbit->nama_penerbits }}</p>
                            <p><strong>Author: </strong> {{ $item->author }}</p>
                            <p><strong>Deskripsi: </strong> {{ $item->deskripsi }}</p>
                            <div class="card-actions d-flex justify-content-between">
                                <a href="{{ url('unduh-buku', $item->id) }}" class="btn btn-info  mr-1">
                                    <i class="fas fa-eye mr-1"></i>Lihat</a>
                                <form action="{{ url('/favorites/add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger  mr-1">
                                        <i class="fas fa-heart mr-1"></i>Favorit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
