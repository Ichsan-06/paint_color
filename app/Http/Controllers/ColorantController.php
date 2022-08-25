<?php

namespace App\Http\Controllers;

use App\Imports\ColorantImport;
use App\Models\Kota;
use App\Models\Colorant;
use Illuminate\Http\Request;
use App\Imports\FormulaImport;
use Maatwebsite\Excel\Facades\Excel;

class ColorantController extends Controller
{
    // Index
    public function index()
    {
        $colorants = Colorant::with('kota')->get();
        $kotas = Kota::all();
        return view('colorant.index', compact('colorants','kotas'));
    }

    // Create
    public function create()
    {
        $kotas = Kota::all();
        return view('colorant.create', compact('kotas'));
    }

    // store
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:colorant',
        //     'kode' => 'required|unique:colorant',
        //     'satuan' => 'required',
        // ]);

        $colorant = Colorant::create($request->all());
        return redirect()->route('colorant.index')->with('success', 'Colorant created successfully');
    }

    // Edit
    public function edit($colorant)
    {
        $colorant = Colorant::find($colorant);
        return view('colorant.edit', compact('colorant'));
    }

    // Update
    public function update(Request $request, $colorant)
    {
        $colorant = Colorant::find($colorant);
        $colorant->update($request->all());
        return redirect()->route('colorant.index')->with('success', 'Colorant updated successfully');
    }

    // Delete
    public function delete($colorant)
    {
        $colorant = Colorant::find($colorant);
        $colorant->delete();
        return redirect()->route('colorant.index')->with('success', 'Colorant deleted successfully');
    }

    // Import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('file');

        Excel::import(new ColorantImport, $path);

        return redirect()->route('colorant.index')->with('success', 'Colorant imported successfully');

    }

}
