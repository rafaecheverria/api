<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Jornada;

class GruposController extends Controller
{
    public function selectGruposDepto($id) //select de los filtros del modulo cobertura -> estadisticas
    {
        $departamentos = Departamento::findOrFail($id);
        $grupos = $departamentos->grupos;
        $jornadas = $grupos->unique('jornada_id')->values(); // unique() no repite las jornadas de los nivele, Ej: tiene 2 nivles en jornada normal solo trae 1 jornada normal.

        $allJornadas = $jornadas->map(function ($item) {  
            $data = Jornada::select("jornadas.id", "jornadas.jornada")
                            ->where("jornadas.id", "=", $item->jornada_id)->get();
            return $data;
        });

        return [
           "grupos" => $grupos,
           'jornadas' => $allJornadas->flatten(), //Funcion flatten() aplana colección multidimensional que entrega map().
        ];
    }

    public function traerDatosFiltroEstadisticas(Request $request){

        

        return [
            'fecha' => $request->fecha,
            'jardin' => $request->departamento_id, 
            'jornada' => $request->jornada_id, 
         ];
    }
}
