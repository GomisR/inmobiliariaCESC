<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Piso;
use App\Models\ComunidadAutonoma;

class PisoSeeder extends Seeder {
    public function run() {
        $comunidadAutonomaIds = ComunidadAutonoma::pluck('id')->toArray();

        Piso::create([
            'calle' => 'Calle Constitucion 1',
            'precio' => 180000,
            'descripcion' => 'Un piso céntrico con excelentes vistas. 3 habitaciones y 2 baños',
            'comunidad_autonoma_id' => $comunidadAutonomaIds[array_rand($comunidadAutonomaIds)]
        ]);

        Piso::create([
            'calle' => 'Calle Cuarta Casa 6',
            'precio' => 380000,
            'descripcion' => 'Chalet individual en Santa fe, a las afueras de Cuarte. 4 habitaciones 3 baños.',
            'comunidad_autonoma_id' => $comunidadAutonomaIds[array_rand($comunidadAutonomaIds)]
        ]);
    }
}

