<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departamento;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $usuarios = User::traerTodosUsuarios($buscar);

        return [
            'pagination' => [
                'total'        => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page'     => $usuarios->perPage(),
                'last_page'    => $usuarios->lastPage(),
                'from'         => $usuarios->firstItem(),
                'to'           => $usuarios->lastItem(),
            ],
            'users' => $usuarios,
        ];
    }

    public function userAuth()
    {
        $user = Auth::user();
        $permisos = $user->permissions->pluck('name');
        return response()->json([
            'email' => $user->email,
            'nombres' => $user->nombres,
            'apellidos' => $user->apellidos,
            'permisos' => $permisos
        ]);
    }

    public function addUser(UserRequest $request)
    {
        $user = new User();
        $user->rut = $request->rut;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->fecha_nacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d');
        $user->genero = $request->genero;
        $user->direccion = $request->direccion;
        $user->departamento_id = $request->departamento_id;
        $user->region_id = $request->region_id;
        $user->cargo_id = $request->cargo_id;
        $user->pais = 1;
        $user->password = bcrypt('secret');
        $user->save();
        return [
            'success' => true,
            'user' => $user
        ];
    }

    public function AgregarRolUsuario(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncRoles($request->roles);
        $user->save();

        return[
            'success' => 'true',
        ];
    }

    public function getUser($id)
    {
         $user = User::findOrFail($id);
         $departamentos = Departamento::DeptoReg($user->region_id);
         return response()->json([
             'user' => $user,
             'departamentos' => $departamentos
         ]);
    }

    // public function getApi()
    // {
    //     return response()->json([
    //         "Año Proceso Desde"=> "2021",
    //         "Mes Proceso Desde"=> "7",
    //         "Año Proceso Hasta"=> "2021",
    //         "Mes Proceso Hasta"=> "7",
    //         "Región Geográfica"=> "16",
    //         "Nombre Región"=> "XVI DEL ÑUBLE",
    //         "Nombre Provincia"=> "DIGUILLIN",
    //         "Nombre Comuna"=> "CHILLÁN",
    //         "Codigo Establecimiento"=> "170101",
    //         "Nombre Establecimiento"=> "EL OSITO",
    //         "Modalidad Atención"=> "JARDÍN INFANTIL",
    //         "Tipo Modalidad Atención"=> "MENOR O IGUAL A 99 NIÑOS",
    //         "Código Zona Ubicación"=> "1",
    //         "Glosa Zona Ubicación"=> "URBANO",
    //         "Código Nivel"=> "3",
    //         "Nombre Nivel"=> "SALA CUNA",
    //         "Código Grupo"=> "1",
    //         "Rut Niño"=> "26845742",
    //         "D.Verificador Niño"=> "9",
    //         "A.Paterno Niño"=> "FLORES",
    //         "A.Materno Niño"=> "ARAYA",
    //         "Nombres Niño"=> "SEBASTIÁN AGUSTÍN",
    //         "Sexo Niño"=> "M",
    //         "Día Nac."=> "24",
    //         "Mes Nac."=> "5",
    //         "Año Nac."=> "2019",
    //         "Nacionalidad Niño"=> "1",
    //         "Descripción Nacionalidad"=> "CHILENA",
    //         "Días Asistidos"=> "0",
    //         "Máxima de Días a Asistir"=> "0",
    //         "Porcentaje Asist. Prom."=> "0",
    //         "Día Ingreso a Integra"=> "15",
    //         "Mes Ingreso a Integra"=> "3",
    //         "Año Ingreso a Integra"=> "2021",
    //         "Permanencia Niño"=> "1",
    //         "Día Egreso Integra"=> "0",
    //         "Mes Egreso Integra"=> "0",
    //         "Año Egreso Integra"=> "0",
    //         "Número integrantes FPS"=> "0",
    //         "Parentesco Con Jefe Fam"=> "0",
    //         "Valor Tramo CSE"=> "0"
    //     ]);
    // }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
          $user = User::findOrFail($id);
          $user->nombres = $request->nombres;
          $user->apellidos = $request->apellidos;
          $user->email = $request->email;
          $user->fecha_nacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d');
          $user->genero = $request->genero;
          $user->direccion = $request->direccion;
          $user->departamento_id = $request->departamento_id;
          $user->region_id = $request->region_id;
          $user->cargo_id = $request->cargo_id;
          $user->save();

        return[
            'success' =>  true,
        ];
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([
            'success' => true,
        ]);
    }
}
