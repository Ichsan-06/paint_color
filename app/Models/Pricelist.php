<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota_id',
        'type_id',
        'jenis_id',
        'galon',
        'pail',
    ];
    protected $table='pricelist';

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

}
