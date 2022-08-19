<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;

    protected $fillable = [
        'warna_id',
        'jenis_id',
        'kode_formula',
        'galon',
        'pail',
    ];
    protected $table = 'formula';

    public function warna()
    {
        return $this->belongsTo(Warna::class);
    }

    // Jenis
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
