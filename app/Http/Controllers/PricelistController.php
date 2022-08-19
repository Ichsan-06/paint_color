<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Http\Request;

class PricelistController extends Controller
{
    // Index
    public function index()
    {
        $pricelists = Pricelist::with([
            'kota',
            'type',
            'jenis',
        ])->get();
        // return $pricelists;
        return view('pricelist.index', compact('pricelists'));
    }

    // Create
    public function create()
    {
        $kotas = \App\Models\Kota::all();
        $types = \App\Models\Type::all();
        $jenis = \App\Models\Jenis::all();

        return view('pricelist.create', compact('kotas', 'types', 'jenis'));
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'kota_id' => 'required|exists:kota,id',
            'type_id' => 'required|exists:type,id',
            'jenis_id' => 'required|exists:jenis,id',
            'galon' => 'required',
            'pail' => 'required',
        ],
        [
            'kota_id.required' => 'Kota harus diisi!',
            'kota_id.exists' => 'Kota tidak ditemukan!',
            'type_id.required' => 'Type harus diisi!',
            'type_id.exists' => 'Type tidak ditemukan!',
            'jenis_id.required' => 'Jenis harus diisi!',
            'jenis_id.exists' => 'Jenis tidak ditemukan!',
            'galon.required' => 'Galon harus diisi!',
            'pail.required' => 'Pail harus diisi!',
        ]);

        $pricelist = new Pricelist();
        $pricelist->kota_id = $request->kota_id;
        $pricelist->type_id = $request->type_id;
        $pricelist->jenis_id = $request->jenis_id;
        $pricelist->galon = $request->galon;
        $pricelist->pail = $request->pail;

        $pricelist->save();
        return redirect()->route('pricelist.index');
    }

    // Edit
    public function edit($id)
    {
        $pricelist = Pricelist::find($id);
        $kotas = \App\Models\Kota::all();
        $types = \App\Models\Type::all();
        $jenis = \App\Models\Jenis::all();
        return view('pricelist.edit', compact('pricelist', 'kotas', 'types', 'jenis'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'kota_id' => 'required|exists:kota,id',
            'type_id' => 'required|exists:type,id',
            'jenis_id' => 'required|exists:jenis,id',
            'galon' => 'required',
            'pail' => 'required',
        ],
        [
            'kota_id.required' => 'Kota harus diisi!',
            'kota_id.exists' => 'Kota tidak ditemukan!',
            'type_id.required' => 'Type harus diisi!',
            'type_id.exists' => 'Type tidak ditemukan!',
            'jenis_id.required' => 'Jenis harus diisi!',
            'jenis_id.exists' => 'Jenis tidak ditemukan!',
            'galon.required' => 'Galon harus diisi!',
            'pail.required' => 'Pail harus diisi!',
        ]);
        $pricelist = Pricelist::find($id);
        $pricelist->kota_id = $request->kota_id;
        $pricelist->type_id = $request->type_id;
        $pricelist->jenis_id = $request->jenis_id;
        $pricelist->galon = $request->galon;
        $pricelist->pail = $request->pail;
        $pricelist->save();
        return redirect()->route('pricelist.index');
    }

    // Destroy
    public function delete($id)
    {
        $pricelist = Pricelist::find($id);
        $pricelist->delete();
        return redirect()->route('pricelist.index');
    }
}
