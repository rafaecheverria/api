<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        if($buscar == ''){
            $roles = Role::orderBy('id', 'DESC')->paginate(2);
        }else{
            $roles = Role::where('name', 'like', '%' . $buscar . '%')->orderBy('id', 'DESC')->paginate(2);
        }

        return [
            'pagination' => [
                'total'        => $roles->total(),
                'current_page' => $roles->currentPage(),
                'per_page'     => $roles->perPage(),
                'last_page'    => $roles->lastPage(),
                'from'         => $roles->firstItem(),
                'to'           => $roles->lastItem(),
            ],
            'roles' => $roles
        ];
    }
}
