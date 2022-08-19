<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;

    protected $fillable = [
        'warna_id',
        'kode_base',
        'kode_formula',
        'galon',
        'pail',
    ];
    protected $table = 'formula';

    public function warna()
    {
        return $this->belongsTo(Warna::class);
    }
}
