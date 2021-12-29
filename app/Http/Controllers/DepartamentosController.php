<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentosController extends Controller
{

    public function selectDepartamentoReg($id)
    {
        $departamentos = Departamento::select('id', 'departamento')
                                    ->where("region_id", "=", $id)
                                    ->orderBy('departamento', 'ASC')
                                    ->get();

        return['departamentos' => $departamentos];

    }
}
