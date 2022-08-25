<?php

namespace App\Imports;

use App\Models\Formula;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FormulaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Formula([
            'warna_id' => $row['warna_id'],
            'jenis_id' => $row['jenis_id'],
            'kode_formula' => $row['kode_formula'],
            'galon' => $row['galon'],
            'pail' => $row['pail'],
        ]);
    }
}
