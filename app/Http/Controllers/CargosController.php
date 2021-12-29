<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargosController extends Controller
{
    public function selectCargo()
    {
        $cargo = Cargo::select('id', 'nombre')->orderBy('nombre', 'ASC')->get();
        return['cargos' => $cargo];
    }
}
