<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornada;
use App\Models\Nivel;

class JornadasController extends Controller
{

    public function index()
    {
        //
    }

    public function selectJornadasDepto($id) //select de los filtros del modulo cobertura -> estadisticas
    {
        
        $niveles = Nivel::NivelDepto($id);
       //$jornadas = Jornada::NivelJornada($id);
       // $jornadas = $niveles->jornadas;

        return [
           "niveles" => $niveles,
           //"jornadas" => $jornadas
        ];
    }


}
