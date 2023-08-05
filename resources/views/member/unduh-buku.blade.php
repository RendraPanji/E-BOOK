@extends('layouts.app-member')

@section('title', 'Detail Buku')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Buku</h1>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/member/buku') }}">Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $buku->judul_buku }}</li>
            </ol>
        </nav>

        <!-- Detail Buku -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $buku->judul_buku }}</h5>
                        <p><strong>Kategori: </strong> {{ $buku->kategori->nama_kategori }}</p>
                        <p><strong>Penerbit: </strong> {{ $buku->penerbit->nama_penerbits }}</p>
                        <p><strong>Author: </strong> {{ $buku->author }}</p>
                        <p><strong>Deskripsi: </strong>{{ $buku->deskripsi }}</p>
                        @if ($buku->gambar)
                            <img src="{{ asset('gambar/' . $buku->gambar) }}" alt="{{ $buku->judul_buku }}" width="200">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                        @if ($buku->pdf)
                            <p><a class="btn btn-danger mt-2" href="{{ asset('pdf/' . $buku->pdf) }}" target="_blank">
                                <i class="fas fa-cloud-download-alt mr-2"></i>Unduh PDF</a></p>
                        @else
                            <p>File PDF tidak tersedia</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
