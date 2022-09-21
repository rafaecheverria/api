<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [
            [1,'Sala Cuna Menor', 1,1],
            [2,'Sala Cuna Mayor',1,1],
            [3,'Sala Cuna',1,1],
            [4,'Medio Menor',1,1],
            [5,'Medio Mayor',1,1],
            [6,'Medios',1,1],
            [7,'Transicion Menor',1,1],
            [8,'Transicion Mayor',1,1],
            [9,'Transiciones',1,1],
            [10,'Heterogeneo',1,1],
            [11,'Sala Cuna',2,1],
            [12,'Sala Cuna',2,2],
        ];

        $niveles = array_map(function($nivel){
            return [
                'id' => $nivel[0],
                'nivel' => $nivel[1],
                'jornada_id' => $nivel[2],
                'grupo_id' => $nivel[3],
            ];
         }, $niveles);
         DB::table('niveles')->insert($niveles);
    }
}
