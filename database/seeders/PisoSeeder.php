<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Piso;

class PisoSeeder extends Seeder
{
    public function run()
    {
        Piso::create([
            'calle' => 'Calle Constitucion 1',
            'precio' => 180000,
            'descripcion' => 'Un piso céntrico con excelentes vistas. 3 habitaciones y 2 baños'
        ]);

        Piso::create([
            'calle' => 'Calle Cuarta Casa 6',
            'precio' => 380000,
            'descripcion' => 'Chalet individual en Santa fe, a las afueras de Cuarte. 4 habitaciones 3 baños.'
        ]);
    }
}
