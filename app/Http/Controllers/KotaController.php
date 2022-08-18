<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KotaController extends Controller
{
    // Index
    public function index()
    {
        $kota = \App\Models\Kota::all();
        return view('kota.index', compact('kota'));
    }

    // Create
    public function create()
    {
        return view('kota.create');
    }

    // store
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kota' => 'required|unique:kota,nama_kota',
        ]);
        $kota = new \App\Models\Kota;
        $kota->nama_kota= $request->nama_kota;
        $kota->save();

        return redirect()->route('kota.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Delete
    public function delete($id)
    {
        $kota = \App\Models\Kota::find($id);
        $kota->delete();
        return redirect()->route('kota.index')->with('success', 'Data berhasil dihapus');
    }

    // Edit
    public function edit($id)
    {
        $kota = \App\Models\Kota::find($id);
        return view('kota.edit', compact('kota'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kota' => 'required|unique:kota,nama_kota',
        ]);
        $kota = \App\Models\Kota::find($id);
        $kota->nama_kota= $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')->with('success', 'Data berhasil diubah');
    }
}
