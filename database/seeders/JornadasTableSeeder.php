<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JornadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jornadas = [
            [1,'Normal'],
            [2,'Extensión Horaria'],
            [3,'Normal Estacional'],
            [4,'Extensión Horaria Estacional'],
        ];

        $jornadas = array_map(function($jornada){
            return [
                'id' => $jornada[0],
                'jornada' => $jornada[1],
            ];
         }, $jornadas);
         DB::table('jornadas')->insert($jornadas);
    }
}
