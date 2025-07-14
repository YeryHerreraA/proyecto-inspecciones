<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    use HasFactory;

    protected $fillable = ['area', 'fecha', 'tipo', 'observaciones'];

    // Relación uno a muchos con condiciones
    public function condiciones()
    {
        return $this->hasMany(Condicion::class);
    }
}


