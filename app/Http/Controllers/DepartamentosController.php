<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use Illuminate\Support\Facades\Auth;

class DepartamentosController extends Controller
{

    public function selectDepartamentoReg($id)
    {
        $departamentos = Departamento::DeptoReg($id);
        return['departamentos' => $departamentos];

    }

    public function selectDepartamentoFiltros()
    {
        $departamentos = Departamento::select('id', 'departamento')->where("region_id", Auth::user()->region_id)->where('tipo_departamento_id', 1)->get();
        return['departamentos' => $departamentos];

    }
}