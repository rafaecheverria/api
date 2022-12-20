<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornada;
use App\Models\Departamento;
use App\Models\Nivel;

class JornadasController extends Controller
{

    public function index()
    {
        //
    }

    public function selectJornadasDepto($id) //select de los filtros del modulo cobertura -> estadisticas
    {
        
        //$niveles = Nivel::NivelDepto($id);
        //$jornadas = Jornada::NivelJornada($id);
        //$jornadas = $niveles->jornadas;

        $departamentos = Departamento::findOrFail($id);
        $grupos = $departamentos->grupos;



        return [
           "grupos" => $grupos,
           //"jornadas" => $niveles["jornadas"]
        ];
    }


}
