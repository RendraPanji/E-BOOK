@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Detail Buku</h1>
    <a href="{{ route('buku.index') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left mr-2"></i>Kembali</a>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Judul Buku:</strong> {{ $buku->judul_buku }}</p>
                <p><strong>Kategori:</strong> {{ $buku->kategori->nama_kategori }}</p>
                <p><strong>Penerbit:</strong> {{ $buku->penerbit->nama_penerbits }}</p>
                <p><strong>Deskripsi:</strong> {{ $buku->deskripsi }}</p>
                <p><strong>Author:</strong> {{ $buku->author }}</p>
                @if ($buku->gambar)
                    <img src="{{ asset('gambar/' . $buku->gambar) }}" alt="{{ $buku->judul_buku }}" width="200">
                @else
                    <p>Tidak ada gambar</p>
                @endif
                {{-- <p><strong>Kategori:</strong> {{ $buku->kategori->nama_kategori }}</p> --}}
                @if ($buku->pdf)
                    <p><a href="{{ asset('pdf/' . $buku->pdf) }}" target="_blank" class="btn btn-success mt-2">
                        <i class="fas fa-cloud-download-alt mr-2"></i>Unduh PDF</a></p>
                @else
                    <p>File PDF tidak tersedia</p>
                @endif
            </div>
        </div>
    </div>
@endsection
