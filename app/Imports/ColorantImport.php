<?php

namespace App\Imports;

use App\Models\Colorant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ColorantImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Colorant([
            'kota_id' => $row['kota_id'],
            'harga' => $row['harga'],
            'kode' => $row['kode'],
            'satuan' => $row['satuan'],
        ]);
    }
}
