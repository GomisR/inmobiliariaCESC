<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'pisos';

    // Atributos que se pueden asignar de manera masiva
    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'direccion',
        'imagen'
    ];

    // Relación con usuarios (muchos a muchos para favoritos)
    public function usuariosFavoritos()
    {
        return $this->belongsToMany(User::class, 'favoritos');
    }
}
