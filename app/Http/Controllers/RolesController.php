<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        if($buscar == ''){
            $roles = Role::orderBy('id', 'DESC')->paginate(10);
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

    public function addRol(Request $request)
    {
        $rol = new Role();
        $rol->name = $request->name;
        $rol->save();
        return [
            'success' => true,
            'rol' => $rol
        ];
    }

    public function update(Request $request, $id)
    {
          $rol = Role::findOrFail($id);
          $rol->name = $request->name;
          $rol->save();

        return[
            'success' =>  true,
        ];
    }

    public function getRol($id)
    {
         $role = Role::findOrFail($id);
         return response()->json([
             'role' => $role,
         ]);
    }

    public function AgregarPermisosRol(Request $request, $id)
    {
        $rol = Role::findOrFail($id);
        $rol->syncPermissions($request->permisos);
        $rol->save();

        return[
            'success' => 'true',
        ];
    }

    public function selectRoles(Request $request, $id)
    {
        $los_roles = Role::select('id', 'name')->orderBy('name', 'ASC')->get();

        if($id != 0){
            $el_user = User::findOrFail($id);
            $el_rol = Role::orderBy('name', 'DESC')->pluck('name', 'id');
            $my_roles = $el_user->roles->pluck('id')->ToArray();

        }

        return[
            'roles' => $los_roles,
            'my_roles' => $my_roles,
            'user' => $el_user->nombres.' '.$el_user->apellidos,
            'user_id' => $el_user->id

        ];
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return response()->json([
            'success' => true,
        ]);
    }
}
