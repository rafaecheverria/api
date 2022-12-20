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
            [1,'Sala Cuna Menor'],
            [2,'Sala Cuna Mayor'],
            [3,'Sala Cuna'],
            [4,'Medio Menor'],
            [5,'Medio Mayor'],
            [6,'Medios'],
            [7,'Transicion Menor'],
            [8,'Transicion Mayor'],
            [9,'Transiciones'],
            [10,'Heterogeneo'],
        ];

        $niveles = array_map(function($nivel){
            return [
                'id' => $nivel[0],
                'nivel' => $nivel[1],
            ];
         }, $niveles);
         DB::table('niveles')->insert($niveles);
    }
}
