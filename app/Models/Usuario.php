<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'email', 'password', 'rol'
    ];

    protected $hidden = ['password'];

    public function inmuebles()
    {
        return $this->hasMany(Inmueble::class, 'administrador_id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'usuario_id');
    }

    public function citasComoAdmin()
    {
        return $this->hasMany(Cita::class, 'administrador_id');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'administrador_id');
    }
}
