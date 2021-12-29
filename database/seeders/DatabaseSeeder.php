<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // $this->call(EmpresaTableSeeder::class);
        $this->call(ComunasRegionesTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(2000)->create();
        // DB::table('users')->insert([
        //     'rut' => '16447779-7',
        //     'nombres' => 'Rafael Armando',
        //     'apellidos' => 'Echeverria Reyes',
        //     'email' => 'rafaecheverria@live.cl',
        //     'password' => bcrypt('raer2608'),
        //     'pais' => 'Chile',
        //     'cargo_id' => 1,
        //     'departamento_id' => 1
        // ]);
    }
}
