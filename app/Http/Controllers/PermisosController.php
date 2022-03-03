<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{

    public function index(Request $request)
    {
        $buscar = $request->buscar;

        if($buscar == ''){
            $permisos = Permission::orderBy('id', 'DESC')->paginate(2);
        }else{
            $permisos = Permission::where('name', 'like', '%' . $buscar . '%')->orderBy('id', 'DESC')->paginate(2);
        }

        return [
            'pagination' => [
                'total'        => $permisos->total(),
                'current_page' => $permisos->currentPage(),
                'per_page'     => $permisos->perPage(),
                'last_page'    => $permisos->lastPage(),
                'from'         => $permisos->firstItem(),
                'to'           => $permisos->lastItem(),
            ],
            'permisos' => $permisos
        ];
    }

    public function addPermiso(Request $request)
    {
        $permiso = new Permission();
        $permiso->name = $request->name;
        $permiso->save();
        return [
            'success' => true,
            'permiso' => $permiso
        ];
    }

    public function update(Request $request, $id)
    {
          $rol = Permission::findOrFail($id);
          $rol->name = $request->name;
          $rol->save();

        return[
            'success' =>  true,
        ];
    }

    public function getPermiso($id)
    {
         $permiso = Permission::findOrFail($id);
         return response()->json([
             'permiso' => $permiso,
         ]);
    }

    public function destroy($id)
    {
        Permission::destroy($id);
        return response()->json([
            'success' => true,
        ]);
    }
}
