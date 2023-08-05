<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;

class BukuController extends Controller
{
    
    public function index()
    {
        $buku = Buku::get();
        return view('buku.index', data: compact('buku'));
    }

    
    public function create()
    {
        $kategori = Kategori::get();
        $penerbit = Penerbit::get();
        return view('buku.create', ['kategori' => $kategori, 'penerbit' => $penerbit]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'nama_kategori' => 'required',
            'nama_penerbits' => 'required',
            'deskripsi' => 'required',
            'author' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:2048'
        ]);

        $pdfFileName = null;
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfFileName = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('pdf'), $pdfFileName);
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('gambar'), $gambarName);
        } else {
            $gambarName = null;
        }

        $buku = new Buku();
        $buku->judul_buku = $request->input('judul_buku');
        $buku->id_penerbit = $request->input('nama_penerbits');
        $buku->id_kategori = $request->input('nama_kategori');
        $buku->deskripsi = $request->input('deskripsi');
        $buku->author = $request->input('author');
        $buku->gambar = $gambarName;
        $buku->pdf = $pdfFileName;
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }
    
    public function show(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.show', ['buku' => $buku]);
    }

    
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', ['buku' => $buku]);
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_buku' => 'required',
            'deskripsi' => 'required',
            'author' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $buku = Buku::find($id);
        $pdfFileName = $buku->pdf;
        
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfFileName = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('pdf'), $pdfFileName);
            // Hapus file lama jika ada
            if ($buku->pdf) {
                unlink(public_path('pdf') . '/' . $buku->pdf);
            }
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('gambar'), $gambarName);
            $buku->gambar = $gambarName;
        }

        $buku->judul_buku = $request->input('judul_buku');
        $buku->deskripsi = $request->input('deskripsi');
        $buku->author = $request->input('author');
        $buku->pdf = $pdfFileName;
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    
    public function destroy(string $id)
    {
        $buku = Buku::find($id);

        
        if ($buku->gambar) {
            unlink(public_path('gambar') . '/' . $buku->gambar);
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('delete', 'Buku berhasil dihapus!');
    }

    public function favorites()
    {
        // Periksa apakah pengguna telah login
        if (auth()->check()) {
            // Dapatkan buku-buku yang ada di daftar favorit untuk pengguna yang terautentikasi
            $favoritBuku = auth()->user()->favorit;
            $favoritBuku = auth()->user() ? auth()->user()->favorit : [];

        } else {
            // Jika pengguna belum login, set variabel $favoritBuku sebagai array kosong
            $favoritBuku = [];
        }

        return redirect()->route('favorit.index', compact('favoritBuku'));
    }

    public function bukuMember()
    {
        $buku = Buku::get();
        return view('member.list-book', data: compact('buku'));
    }

    public function unduhBuku(string $id)
    {
        $buku = Buku::find($id);
        return view('member.unduh-buku', ['buku' => $buku]);
    }
}
