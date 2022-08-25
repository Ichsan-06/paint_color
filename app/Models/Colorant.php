<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colorant extends Model
{
    use HasFactory;
    protected $fillable = ['kota_id','kode', 'harga', 'satuan'];
    protected $table = 'colorant';

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

}
