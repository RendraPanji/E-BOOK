@extends('layouts.app-member')

@section('title', 'Daftar Favorit')

@section('content')
    <h1>Daftar Favorit</h1>
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (count($favorites) > 0)
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Deskripsi</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favorites as $index => $fav)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if ($fav->bukus->gambar)
                                    <img src="{{ asset('gambar/' . $fav->bukus->gambar) }}"
                                        alt="{{ $fav->bukus->judul_buku }}" class="img-thumbnail" width="100">
                                @else
                                    <div class="no-image">Tidak ada gambar</div>
                                @endif
                            </td>
                            <td>{{ $fav->bukus->judul_buku }}</td>
                            <td>{{ $fav->bukus->kategori->nama_kategori }}</td>
                            <td>{{ $fav->bukus->penerbit->nama_penerbits }}</td>
                            <td>{{ $fav->bukus->deskripsi }}</td>
                            <td>{{ $fav->bukus->author }}</td>
                            <td>
                                <form action="{{ url('/favorites/remove', $fav->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt mr-1"></i> Remove 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Tidak ada buku favorit.</p>
    @endif
@endsection
