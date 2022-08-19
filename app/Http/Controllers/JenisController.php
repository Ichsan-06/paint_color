<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    // Index
    public function index()
    {
        $jenis = Jenis::all();
        return view('jenis.index', compact('jenis'));
    }

    // Create
    public function create()
    {
        return view('jenis.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:jenis',
        ]);
        Jenis::create($request->all());
        return redirect()->route('jenis.index')->with('status', 'Data berhasil ditambahkan!');
    }

    //Edit
    public function edit($jenis)
    {
        $jenis = Jenis::find($jenis);
        return view('jenis.edit', compact('jenis'));
    }

    // Update
    public function update(Request $request, $jenis)
    {
        $request->validate([
            'name' => 'required|unique:jenis',
        ]);
        Jenis::find($jenis)->update($request->all());
        return redirect()->route('jenis.index')->with('status', 'Data berhasil diubah!');
    }

    // Delete
    public function delete($jenis)
    {
        Jenis::find($jenis)->delete();
        return redirect()->route('jenis.index')->with('status', 'Data berhasil dihapus!');
    }

}
