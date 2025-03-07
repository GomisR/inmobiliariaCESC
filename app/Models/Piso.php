<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model {
    use HasFactory;
    protected $fillable = ['calle', 'precio', 'descripcion', 'comunidad_autonoma_id'];
    public function comunidadAutonoma()
    {
        return $this->belongsTo(ComunidadAutonoma::class, 'comunidad_autonoma_id');
    }


}

