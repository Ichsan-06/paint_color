<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Type;
use App\Models\Warna;
use App\Models\Formula;
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
        return view('price_kota', compact('kota', 'warna'));
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
        return view('price_warna', compact('getKota', 'warna', 'type','pricelists'));
    }

    // List Harga

    public function listHarga()
    {
        $kota = Kota::all();
        $warna = Warna::all();
        $type = Type::with(['pricelist' => function ($query) {
            $query->where('jenis_id', 1);
        }])->get();

        return view('list_harga', compact('kota', 'warna', 'type'));
    }
}
