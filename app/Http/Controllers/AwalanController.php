<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Type;
use App\Models\Warna;
use App\Models\Formula;
use App\Models\Jenis;
use App\Models\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AwalanController extends Controller
{
    //Kota

    public function kota($kota)
    {
        $kota = Kota::find($kota);
        $warna = Warna::all();
        $pricelists = Type::with('pricelist')->get();
        // return $pricelists;
        return view('price_kota', compact('kota', 'warna', 'pricelists'));
    }

    // Warna
    public function warna($kota, $warna)
    {
        $warna = Warna::find($warna);
        $formula = Formula::where("warna_id", $warna->id)->first();

        $type = Type::with(['pricelist' => function ($query) use ($formula, $kota) {
            $query->where('jenis_id', $formula->jenis_id);
            $query->where('kota_id', $kota);
        }, 'pricelist.kota', 'pricelist.type', 'pricelist.jenis.formula' => function ($query) use ($warna) {
            $query->where('warna_id', $warna->id);
        }])->get();

        $getKota = Kota::find($kota);
        $pricelists = Type::with('pricelist.jenis')->get();

        // return $type;
        return view('price_warna', compact('getKota', 'warna', 'type', 'pricelists'));
    }

    // List Harga

    public function listHarga($kota)
    {
        $kota = Kota::find($kota);
        $warnas = Warna::with(['formula.jenis.pricelist' => function ($query) use ($kota) {
            $query->where('kota_id', $kota->id);
        }])->get();

        // return $warnas;

        return view('list_harga', compact('kota', 'warnas'));
    }

    public function listFormula($kota)
    {
        $kota = Kota::find($kota);
        $warnas = Warna::with(['formula.jenis.pricelist' => function ($query) use ($kota) {
            $query->where('kota_id', $kota->id);
        }])->get();

        // return $warnas;

        return view('list_formula', compact('kota', 'warnas'));
    }

    public function listFormulaHarga($kota)
    {
        $kota = Kota::find($kota);
        $warnas = Warna::with(['formula.jenis.pricelist' => function ($query) use ($kota) {
            $query->where('kota_id', $kota->id);
        }])->get();


        return view('list_formula_harga', compact('kota', 'warnas'));
    }

    public function hitung($warna)
    {
        $warna = Warna::find($warna);
        return view('hitung', compact('warna'));
    }

    public function postHitung(Request $request, $warna)
    {
        // dd($request->all());
        $warna = Warna::find($warna);
        $formula = Formula::where("warna_id", $warna->id)->first();

        $type = Type::with(
            [
                'pricelist' => function ($query) use ($formula) {
                    $query->where('jenis_id', $formula->jenis_id);
                },
                'pricelist.kota',
                'pricelist.type',
                'pricelist.jenis.formula' => function ($query) use ($warna) {
                    $query->where('warna_id', $warna->id);
                }
        ])->first();

        // return $type;

        return view('hitung', compact('warna', 'type','request'));
    }
}
