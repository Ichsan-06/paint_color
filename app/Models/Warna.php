<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;
    protected $table = 'warna';
    protected $fillable = ['kategori', 'kode_warna', 'nama_label', 'nama_warna', 'kode_hex'];

    public function formula()
    {
        return $this->hasMany(Formula::class);
    }
}
