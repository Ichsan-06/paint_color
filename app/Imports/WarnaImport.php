<?php

namespace App\Imports;

use App\Models\Warna;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WarnaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Warna([
            'kategori' => $row['kategori'],
            'kode_warna' => $row['kode_warna'],
            'nama_label' => $row['nama_label'],
            'nama_warna' => $row['nama_warna'],
            'kode_hex' => $row['kode_hex'],
        ]);
    }
}
