<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'type';

    public function pricelist()
    {
        return $this->hasMany(Pricelist::class);
    }
}
