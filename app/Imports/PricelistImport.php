<?php

namespace App\Imports;

use App\Models\Pricelist;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PricelistImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pricelist([
            'kota_id' => $row['kota_id'],
            'type_id' => $row['type_id'],
            'jenis_id' => $row['jenis_id'],
            'galon' => $row['galon'],
            'pail' => $row['pail'],
        ]);
    }
}
