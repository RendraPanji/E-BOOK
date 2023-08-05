@extends('layouts.app')

@section('title', 'Daftar Penerbit')

@section('content')
    <h1>Daftar Penerbit</h1>
    <a href="{{ route('penerbit.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle mr-2"></i>Tambah Penerbit</a>
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
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbits as $key => $penerbit)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $penerbit->nama_penerbits }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning m-1" href="{{ route('penerbit.edit', $penerbit->id) }}">
                                            <i class="fas fa-edit mr-2"></i>Edit</a>
                                        <form action="{{ route('penerbit.destroy', $penerbit->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus penerbit ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1">
                                                <i class="fas fa-trash-alt mr-2"></i>Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
