<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    protected $table = 'valoraciones';

    protected $fillable = [
        'usuario_id', 'puntuacion', 'comentario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
