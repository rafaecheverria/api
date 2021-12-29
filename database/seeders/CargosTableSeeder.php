<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = new Cargo;
        $cargo->nombre = "Director/a";
        $cargo->save();

        $cargo = new Cargo;
        $cargo->nombre = "Jefe";
        $cargo->save();

        $cargo = new Cargo;
        $cargo->nombre = "Profesional";
        $cargo->save();

        $cargo = new Cargo;
        $cargo->nombre = "Analista";
        $cargo->save();

        $cargo = new Cargo;
        $cargo->nombre = "Analista";
        $cargo->save();
    }
}
