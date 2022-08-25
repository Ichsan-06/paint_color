<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use Illuminate\Http\Request;
use App\Imports\FormulaImport;
use Maatwebsite\Excel\Facades\Excel;

class FormulaController extends Controller
{
    // Index
    public function index()
    {
        $formulas = Formula::with('warna','jenis')->get();
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
        // return $request;
        $request->validate([
            'warna_id' => 'required',
            'jenis_id' => 'required',
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
            'jenis_id' => 'required',
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

    // Import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('file');

        Excel::import(new FormulaImport, $path);

        return redirect()->route('formula.index')->with('success', 'Data formula berhasil diimport');
    }

}

