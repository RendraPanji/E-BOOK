<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::all();
        return view('penerbit.index', ['penerbits' => $penerbits]);
    }

    public function create()
    {
        return view('penerbit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerbits' => 'required|unique:penerbits',
        ]);

        Penerbit::create($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan!');
    }

    public function show($id)
    {
        $penerbit = Penerbit::find($id);
        return view('penerbit.show', ['penerbit' => $penerbit]);
    }

    public function edit($id)
    {
        $penerbit = Penerbit::find($id);
        return view('penerbit.edit', ['penerbit' => $penerbit]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penerbits' => 'required|unique:penerbits,nama_penerbits,' . $id,
        ]);

        $penerbit = Penerbit::find($id);
        $penerbit->update($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Penerbit::destroy($id);

        return redirect()->route('penerbit.index')->with('delete', 'Penerbit berhasil dihapus!');
    }
}
