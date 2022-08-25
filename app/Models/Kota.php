<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table="kota";
    protected $fillable = ['nama_kota'];

    public function pricelist()
    {
        return $this->hasMany(Pricelist::class);
    }

    public function colorant()
    {
        return $this->hasMany(Colorant::class);
    }
}
