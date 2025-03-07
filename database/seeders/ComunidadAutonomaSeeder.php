<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComunidadAutonoma;

class ComunidadAutonomaSeeder extends Seeder {
    public function run() {
        $comunidades = [
            'Andalucía', 'Aragón', 'Asturias', 'Baleares', 'Canarias', 'Cantabria',
            'Castilla-La Mancha', 'Castilla y León', 'Cataluña', 'Extremadura', 'Galicia',
            'Madrid', 'Murcia', 'Navarra', 'La Rioja', 'País Vasco', 'Valencia'
        ];

        foreach ($comunidades as $nombre) {
            ComunidadAutonoma::create(['nombre' => $nombre]);
        }
    }
}

