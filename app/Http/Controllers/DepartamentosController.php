<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentosController extends Controller
{

    public function selectDepartamentoReg($id)
    {
        $departamentos = Departamento::DeptoReg($id);

        return['departamentos' => $departamentos];

    }
}