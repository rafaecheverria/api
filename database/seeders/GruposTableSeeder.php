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
            [1,'1'],
            [2,'2'],
            [3,'3'],
            [4,'4'],
        ];

        $grupos = array_map(function($grupo){
            return [
                'id' => $grupo[0],
                'grupo' => $grupo[1],
            ];
         }, $grupos);
         DB::table('grupos')->insert($grupos);
    }
}
