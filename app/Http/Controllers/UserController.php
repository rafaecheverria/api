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
        //$user2 = User::findOrFail($user->id);
        //$permisos = $user2->getAllPermissions();
        return response()->json([
            'email' => $user->email,
            'nombres' => $user->nombres,
            'apellidos' => $user->apellidos,
            //'permisos' => $permisos
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
    //         "A??o Proceso Desde"=> "2021",
    //         "Mes Proceso Desde"=> "7",
    //         "A??o Proceso Hasta"=> "2021",
    //         "Mes Proceso Hasta"=> "7",
    //         "Regi??n Geogr??fica"=> "16",
    //         "Nombre Regi??n"=> "XVI DEL ??UBLE",
    //         "Nombre Provincia"=> "DIGUILLIN",
    //         "Nombre Comuna"=> "CHILL??N",
    //         "Codigo Establecimiento"=> "170101",
    //         "Nombre Establecimiento"=> "EL OSITO",
    //         "Modalidad Atenci??n"=> "JARD??N INFANTIL",
    //         "Tipo Modalidad Atenci??n"=> "MENOR O IGUAL A 99 NI??OS",
    //         "C??digo Zona Ubicaci??n"=> "1",
    //         "Glosa Zona Ubicaci??n"=> "URBANO",
    //         "C??digo Nivel"=> "3",
    //         "Nombre Nivel"=> "SALA CUNA",
    //         "C??digo Grupo"=> "1",
    //         "Rut Ni??o"=> "26845742",
    //         "D.Verificador Ni??o"=> "9",
    //         "A.Paterno Ni??o"=> "FLORES",
    //         "A.Materno Ni??o"=> "ARAYA",
    //         "Nombres Ni??o"=> "SEBASTI??N AGUST??N",
    //         "Sexo Ni??o"=> "M",
    //         "D??a Nac."=> "24",
    //         "Mes Nac."=> "5",
    //         "A??o Nac."=> "2019",
    //         "Nacionalidad Ni??o"=> "1",
    //         "Descripci??n Nacionalidad"=> "CHILENA",
    //         "D??as Asistidos"=> "0",
    //         "M??xima de D??as a Asistir"=> "0",
    //         "Porcentaje Asist. Prom."=> "0",
    //         "D??a Ingreso a Integra"=> "15",
    //         "Mes Ingreso a Integra"=> "3",
    //         "A??o Ingreso a Integra"=> "2021",
    //         "Permanencia Ni??o"=> "1",
    //         "D??a Egreso Integra"=> "0",
    //         "Mes Egreso Integra"=> "0",
    //         "A??o Egreso Integra"=> "0",
    //         "N??mero integrantes FPS"=> "0",
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
