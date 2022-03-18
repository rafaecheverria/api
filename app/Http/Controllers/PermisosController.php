<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosController extends Controller
{

    public function index(Request $request)
    {
        $buscar = $request->buscar;

        if($buscar == ''){
            $permisos = Permission::orderBy('id', 'DESC')->paginate(10);
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

    public function selectPermisos(Request $request, $id)
    {

        $los_permisos = Permission::select('id', 'name')->orderBy('name', 'ASC')->get();
        if($id != 0){
            $el_rol = Role::findOrFail($id);
            $el_permiso= Permission::orderBy('name', 'DESC')->pluck('name', 'id');
            $my_permisos = $el_rol->permissions->pluck('id')->ToArray();
        }
        return[
            'permisos' => $los_permisos,
            'my_permisos' => $my_permisos,
            'rol' => $el_rol,
        ];
    }

    public function destroy($id)
    {
        Permission::destroy($id);
        return response()->json([
            'success' => true,
        ]);
    }
}
