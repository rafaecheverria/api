<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupos = [
            [1,'1', 1, 1, "12"],
            [2,'1', 2, 1, "12"],
            [3,'1', 3, 1, "18"],
            [4,'1', 4, 1, "28"],
            [5,'1', 10, 2, "28"]
        ];

        $grupos = array_map(function($grupo){
            return [
                'id' => $grupo[0],
                'grupo' => $grupo[1],
                'nivel_id' => $grupo[2],
                'jornada_id' => $grupo[3],
                'capacidad' => $grupo[4],
            ];
         }, $grupos);
         DB::table('grupos')->insert($grupos);
    }
}
