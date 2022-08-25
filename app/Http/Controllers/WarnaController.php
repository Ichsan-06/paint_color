<?php

namespace App\Http\Controllers;

use App\Imports\WarnaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WarnaController extends Controller
{
    // Index
    public function index()
    {
        $warna = \App\Models\Warna::orderBy('kode_warna', 'asc')->get();
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
            'kategori'=> 'string',
            'kode_warna'=> 'string',
            'nama_label'=> 'string',
            'nama_warna'=>'string' ,
            'kode_hex'=>'string' ,
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
            'kategori'=> 'string',
            'kode_warna'=> 'string',
            'nama_label'=> 'string',
            'nama_warna'=>'string' ,
            'kode_hex'=>'string' ,
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

    // IMport
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        Excel::import(new WarnaImport, $file);

        return redirect()->route('warna.index')->with('success', 'Data berhasil diimport');
    }
}
