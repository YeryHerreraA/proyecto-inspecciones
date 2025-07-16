<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'area', 'fecha', 'tipo', 'observaciones'];

    // Relación uno a muchos con condiciones
    public function condiciones()
    {
        return $this->hasMany(Condicion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


