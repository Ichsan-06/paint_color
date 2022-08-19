<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use Illuminate\Http\Request;

class FormulaController extends Controller
{
    // Index
    public function index()
    {
        $formulas = Formula::with('warna')->get();
        return view('formula.index', compact('formulas'));
    }

    // Create
    public function create()
    {
        $warnas = \App\Models\Warna::all();
        return view('formula.create', compact('warnas'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'warna_id' => 'required',
            'kode_base' => 'required',
            'kode_formula' => 'required',
            'galon' => 'required|numeric',
            'pail' => 'required|numeric',
        ]);
        Formula::create($request->all());
        return redirect()->route('formula.index')->with('success', 'Data formula berhasil ditambahkan');
    }

    // Edit
    public function edit($formula)
    {
        $formula = Formula::find($formula);
        $warnas = \App\Models\Warna::all();
        return view('formula.edit', compact('formula', 'warnas'));
    }

    // Update
    public function update(Request $request, $formula)
    {
        $request->validate([
            'warna_id' => 'required',
            'kode_base' => 'required',
            'kode_formula' => 'required',
            'galon' => 'required|numeric',
            'pail' => 'required|numeric',
        ]);
        Formula::find($formula)->update($request->all());
        return redirect()->route('formula.index')->with('success', 'Data formula berhasil diubah');
    }

    // Delete
    public function delete($formula)
    {
        Formula::find($formula)->delete();
        return redirect()->route('formula.index')->with('success', 'Data formula berhasil dihapus');
    }

}

