<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    protected $table = 'inmuebles';

    protected $fillable = [
        'titulo', 'descripcion', 'direccion', 'precio', 'estado', 'tipo', 'administrador_id'
    ];

    public function administrador()
    {
        return $this->belongsTo(Usuario::class, 'administrador_id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
