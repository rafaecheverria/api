<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jornada;

class JornadasController extends Controller
{

    public function index()
    {
        //
    }

    public function selectJornadasDepto($id) //select de los filtros del modulo cbertura -> estadisticas
    {
        $jornadas = Jornada::JornadaDepto($id);
        return['jornadas' => $jornadas];

    }


}
