<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inmueble;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class CalleCervantesSeeder extends Seeder
{
    public function run(): void
    {
        $direccion = 'Calle Miguel de Cervantes';
        $slug = Str::slug($direccion); // "calle-miguel-de-cervantes"

        // Obtener todas las imágenes desde la carpeta en el disco
        $archivos = Storage::disk('public')->files("images/{$slug}");

        $imagenes = array_map(fn($ruta) => '/storage/' . $ruta, $archivos);

        \App\Models\Inmueble::create([
            'titulo' => 'Piso reformado en Calle Cervantes',
            'descripcion' => 'Piso Reformado Integralmente en 2010 - 4ª Planta',
            'direccion' => $direccion,
            'precio' => 200000,
            'estado' => 'disponible',
            'tipo' => 'venta',
            'administrador_id' => 1,
            'imagenes' => $imagenes,
        ]);
    }
}
