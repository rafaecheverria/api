<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDepartamento;

class TipoDepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_departamento = new TipoDepartamento;
        $tipo_departamento->nombre = "Jardín Infantil";
        $tipo_departamento->save();

        $tipo_departamento = new TipoDepartamento;
        $tipo_departamento->nombre = "Oficina Regional";
        $tipo_departamento->save();
    }
}
