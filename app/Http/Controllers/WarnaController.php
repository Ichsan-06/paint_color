<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarnaController extends Controller
{
    // Index
    public function index()
    {
        $warna = \App\Models\Warna::all();
        return view('warna.index', compact('warna'));
    }
    // Create
    public function create()
    {
        return view('warna.create');
    }

    // Store
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori'=> 'required',
            'kode_warna'=> 'required',
            'nama_label'=> 'required',
            'nama_warna'=>'required' ,
            'kode_hex'=>'required' ,
        ]);
        $warna = new \App\Models\Warna;
        $warna->kategori = $request->kategori;
        $warna->kode_warna = $request->kode_warna;
        $warna->nama_label = $request->nama_label;
        $warna->nama_warna = $request->nama_warna;
        $warna->kode_hex = $request->kode_hex;
        $warna->save();

        return redirect()->route('warna.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Edit
    public function edit($id)
    {
        $warna = \App\Models\Warna::find($id);
        return view('warna.edit', compact('warna'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kategori'=> 'required',
            'kode_warna'=> 'required',
            'nama_label'=> 'required',
            'nama_warna'=>'required' ,
            'kode_hex'=>'required' ,
        ]);
        $warna = \App\Models\Warna::find($id);
        $warna->kategori = $request->kategori;
        $warna->kode_warna = $request->kode_warna;
        $warna->nama_label = $request->nama_label;
        $warna->nama_warna = $request->nama_warna;
        $warna->kode_hex = $request->kode_hex;
        $warna->save();
        return redirect()->route('warna.index')->with('success', 'Data berhasil diubah');
    }

    // Delete
    public function delete($id)
    {
        $warna = \App\Models\Warna::find($id);
        $warna->delete();
        return redirect()->route('warna.index')->with('success', 'Data berhasil dihapus');
    }
}
